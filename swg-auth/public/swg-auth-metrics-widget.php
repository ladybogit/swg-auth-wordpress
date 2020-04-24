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
    $title = isset( $instance[ 'title' ] ) ? esc_attr( $instance[ 'title' ] ) : '';
    $hide_lights = isset( $instance[ 'hide_lights' ] ) ? (bool) $instance[ 'hide_lights' ] : false;
    ?>

    <p>
      <label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>
      <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" />
    </p>

    <p>
      <input class="checkbox" id="<?php echo $this->get_field_id( 'hide_lights' ); ?>" name="<?php echo $this->get_field_name( 'hide_lights' ); ?>" type="checkbox" <?php checked( $hide_lights ); ?> />
      <label for="<?php echo $this->get_field_id( 'hide_lights' ); ?>">Hide LED Indicator Lights</label>
    </p>

    <?php
  }

  public function update( $new_instance, $old_instance ) {
    $instance = $old_instance;
    $instance[ 'title' ] = $new_instance[ 'title' ];
    $instance[ 'hide_lights' ] = isset( $new_instance[ 'hide_lights' ] ) ? (bool) $new_instance[ 'hide_lights' ] : false;
    return $instance;
  }

}
