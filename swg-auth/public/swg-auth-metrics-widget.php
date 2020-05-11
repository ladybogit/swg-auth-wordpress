<?php

// No Direct Access
if ( ! defined( 'ABSPATH' ) ) {
  die;
}

// This class builds the Server Metrics Widget
class SWG_AUTH_METRICS_WIDGET extends WP_Widget {

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
    // If the widget is to be displayed, enqueue the CSS that we'll need
    wp_enqueue_style( 'swg-auth-metrics-widget', plugins_url( 'swg-auth/public/css/swg-auth-metrics-widget.css' ) );
    // Include what will actually be displayed in the widget
    include( plugin_dir_path( __FILE__ ) . 'html/swg-auth-metrics-widget-html.php' );
  }

  public function form( $instance ) {
    // Get whatever settings have been set for this widget, or else use the defaults
    $title = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
    $hide_lights = isset( $instance['hide_lights'] ) ? (bool) $instance['hide_lights'] : false;
    // Display some input fields to change the settings
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
    // Start with the settings that already existed
    $instance = $old_instance;
    // Set the new name
    $instance['title'] = $new_instance['title'];
    // Set the new value for hiding lights
    $instance['hide_lights'] = isset( $new_instance['hide_lights'] ) ? (bool) $new_instance['hide_lights'] : false;
    // Done. Save settings
    return $instance;
  }

}

// Register the widget
add_action( 'widgets_init', 'swg_auth_register_metrics_widget' );
function swg_auth_register_metrics_widget() {
  register_widget( 'SWG_AUTH_METRICS_WIDGET' );
}
