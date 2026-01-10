<?php

// No Direct Access
if ( ! defined( 'ABSPATH' ) ) {
  die;
}

// This class will build a virtual page
class SWG_AUTH_VIRTUAL_PAGE {

  function __construct( $args ) {
    // Make the arguments accessible for later
    $this->args = $args;
    // Filter the_posts
    add_filter( 'the_posts', array( $this, 'build_page' ) );
  }

  function build_page( $posts ) {
    global $wp, $wp_query, $post;
    // Is the user asking for the virtual page?
    if ( $wp->request === $this->args['slug'] || ( isset( $wp->query_vars['page_id'] ) && $wp->query_vars['page_id'] === $this->args['slug'] ) ) {
      // Build a WP_Post object for the virtual page
      $virtual_post = new WP_Post( (object) array(
        'ID' => -1,
        'post_author' => 1,
        'post_date' => current_time( 'mysql' ),
        'post_date_gmt' => current_time( 'mysql', true ),
        'post_content' => isset( $this->args['post_content'] ) ? $this->args['post_content'] : "This is not the content you're looking for.",
        'post_title' => isset( $this->args['post_title'] ) ? $this->args['post_title'] : 'No Title',
        'post_excerpt' => '',
        'post_status' => 'publish',
        'comment_status' => 'closed',
        'ping_status' => 'closed',
        'post_password' => '',
        'post_name' => $this->args['slug'],
        'to_ping' => '',
        'pinged' => '',
        'post_modified' => current_time( 'mysql' ),
        'post_modified_gmt' => current_time( 'mysql', true ),
        'post_content_filtered' => '',
        'post_parent' => 0,
        'guid' => get_site_url() . '/' . $this->args['slug'],
        'menu_order' => 0,
        'post_type' => 'page',
        'post_mime_type' => '',
        'comment_count' => 0,
        'filter' => 'raw',
      ) );

      // Set global post
      $post = $virtual_post;
      $GLOBALS['post'] = $virtual_post;

      // Discard whatever posts WordPress found and put the virtual page in there instead
      $posts = NULL;
      $posts[] = $virtual_post;

      // Let WordPress know what the query for the virtual page would have looked like
      $wp_query->is_page = true;
      $wp_query->is_singular = true;
      $wp_query->is_home = false;
      $wp_query->is_archive = false;
      $wp_query->is_category = false;
      $wp_query->post = $virtual_post;
      $wp_query->posts = $posts;
      $wp_query->queried_object = $virtual_post;
      $wp_query->queried_object_id = $virtual_post->ID;
      $wp_query->post_count = 1;
      $wp_query->found_posts = 1;
      $wp_query->max_num_pages = 1;
      // Assure WordPress that everything is A-Okay...
      unset( $wp_query->query['error'] );
      $wp_query->query_vars['error'] = '';
      $wp_query->is_404 = false;
    }
    // All done. You can have your $posts back now
    return $posts;
  }

}
