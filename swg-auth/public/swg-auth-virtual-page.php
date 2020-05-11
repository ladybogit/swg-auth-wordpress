<?php

// No Direct Access
if ( ! defined( 'ABSPATH' ) ) {
  die;
}

// This class will build a virtual page
class SWG_AUTH_VIRTUAL_PAGE {

  function __construct( $args ) {
    // Filter the_posts. TODO: Should I be intercepting the WordPress query earlier?
    add_filter( 'the_posts', array( $this, 'build_page' ) );
    // Make the arguments accessible for later
    $this->args = $args;
  }

  function build_page( $posts ) {
    global $wp, $wp_query;
    // Is the user asking for the virtual page?
    if ( $wp->request === $this->args['slug'] || ( isset( $wp->query_vars['page_id'] ) && $wp->query_vars['page_id'] === $this->args['slug'] ) ) {
      // Build a post object for the virtual page
      $post = new stdClass;
      $post->ID = -1;
      $post->post_author = 1;
      $post->post_date = current_time( 'mysql' );
      $post->post_date_gmt = current_time( 'mysql', true );
      $post->post_content = "This is not the content you're looking for.";
      $post->post_title = 'No Title';
      $post->post_excerpt = '';
      $post->post_status = 'publish';
      $post->comment_status = 'closed';
      $post->ping_status = 'closed';
      $post->post_password = '';
      $post->post_name = $this->args['slug'];
      $post->to_ping = '';
      $post->pinged = '';
      $post->post_modified = current_time( 'mysql' );
      $post->post_modified_gmt = current_time( 'mysql', true );
      $post->post_content_filtered = '';
      $post->post_parent = 0;
      $post->guid = get_site_url() . '/?page_id=' . $this->args['slug'];
      $post->menu_order = 0;
      $post->post_type = 'page';
      $post->post_mime_type = '';
      $post->comment_count = 0;
      $post->filter = 'raw';

      // Merge any arguments provided into my post object
      $post = (object) array_merge( (array) $post, (array) $this->args);
      // Discard whatever posts WordPress found and put the virtual page in there instead
      $posts = NULL;
      $posts[] = $post;

      // Let WordPress know what the query for the virtual page would have looked like
      $wp_query->is_page = true;
      $wp_query->is_singular = true;
      $wp_query->is_home = false;
      $wp_query->is_archive = false;
      $wp_query->is_category = false;
      // Assure WordPress that everything is A-Okay...
      unset( $wp_query->query['error'] );
      $wp_query->query_vars['error'] = '';
      $wp_query->is_404 = false;
    }
    // All done. You can have your $posts back now
    return $posts;
  }

}
