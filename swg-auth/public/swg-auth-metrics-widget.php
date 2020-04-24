<?php

class swg_auth_metrics_widget extends WP_Widget {

  public function __construct() {
    parent::__construct(
      'swg-auth-metrics',
      'SWG Server Metrics',
      array(
        'description' => 'Display information about your server status.',
      )
    );
  }

  public function widget( $args, $instance ) {
    include( plugin_dir_path( __FILE__ ) . 'html/swg-auth-metrics-widget-html.php' );
  }

  public function form( $instance ) {
    $instance = wp_parse_args( (array) $instance, array( 'title' => '' ) );
    ?>

    <p>
      <label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>
      <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $instance[ 'title' ] ); ?>" />
    </p>

    <?php
  }

  public function update( $new_instance, $old_instance ) {
    $instance = $old_instance;
    $instance[ 'title' ] = $new_instance[ 'title' ];
    return $instance;
  }

}
