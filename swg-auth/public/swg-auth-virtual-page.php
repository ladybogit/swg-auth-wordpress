<?php

class swg_auth_virtual_page {

  function __construct( $args ) {
    add_filter( 'the_posts', array( $this, 'build_page' ) );
    $this->args = $args;
  }

  function build_page( $posts ) {
    global $wp, $wp_query;
    if ( $wp->request === $this->args[ 'slug' ] || ( isset( $wp->query_vars[ 'page_id' ] ) && $wp->query_vars[ 'page_id' ] === $this->args[ 'slug' ] ) ) {
      $post = new stdClass;
      $post->ID = -1;
      $post->post_author = 1;
      $post->post_date = current_time( 'mysql' );
      $post->post_date_gmt = current_time( 'mysql' ,1 );
      $post->post_content = "This is not the content you're looking for.";
      $post->post_title = 'No Title';
      $post->post_excerpt = '';
      $post->post_status = 'publish';
      $post->comment_status = 'closed';
      $post->ping_status = 'closed';
      $post->post_password = '';
      $post->post_name = $this->args[ 'slug' ];
      $post->to_ping = '';
      $post->pinged = '';
      $post->post_modified = current_time( 'mysql' );
      $post->post_modified_gmt = current_time( 'mysql' ,1 );
      $post->post_content_filtered = '';
      $post->post_parent = 0;
      $post->guid = get_site_url() . '/?page_id=' . $this->args[ 'slug' ];
      $post->menu_order = 0;
      $post->post_type = 'page';
      $post->post_mime_type = '';
      $post->comment_count = 0;
      $post->filter = 'raw';

      $post = (object) array_merge( (array) $post, (array) $this->args);
      $posts = NULL;
      $posts[] = $post;

      $wp_query->is_page = true;
      $wp_query->is_singular = true;
      $wp_query->is_home = false;
      $wp_query->is_archive = false;
      $wp_query->is_category = false;
      unset( $wp_query->query[ 'error' ] );
      $wp_query->query_vars[ 'error' ] = '';
      $wp_query->is_404 = false;
    }
    return $posts;
  }

}
