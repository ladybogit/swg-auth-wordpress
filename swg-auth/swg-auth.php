<?php
/**
  * Plugin Name: SWG Auth
  * Plugin URI: https://tekaohswg.github.io/swg-auth-wordpress.html
  * Description: Star Wars Galaxies Authentication for WordPress
  * Version: 0.15
  * Author: Tekaoh
  * Author URI: https://tekaohswg.github.io
  * Requires at least: 5.0
  * Requires PHP: 7.4
  * Tested up to: 6.9
*/

// No Direct Access
if ( ! defined( 'ABSPATH' ) ) {
  die;
}

// Helper function to extract theme colors
function swg_auth_get_theme_color( $type = 'primary' ) {
  // Try to get CSS custom properties from the active theme
  $theme_mods = get_theme_mods();
  
  switch ( $type ) {
    case 'primary':
      // Check common theme mod names for primary color
      if ( isset( $theme_mods['primary_color'] ) ) return $theme_mods['primary_color'];
      if ( isset( $theme_mods['link_color'] ) ) return $theme_mods['link_color'];
      if ( isset( $theme_mods['accent_color'] ) ) return $theme_mods['accent_color'];
      return '#2271b1';
      
    case 'background':
      if ( isset( $theme_mods['background_color'] ) ) return '#' . $theme_mods['background_color'];
      return '#ffffff';
      
    case 'text':
      if ( isset( $theme_mods['text_color'] ) ) return $theme_mods['text_color'];
      return '#23282d';
      
    case 'border':
      if ( isset( $theme_mods['border_color'] ) ) return $theme_mods['border_color'];
      return '#dddddd';
      
    default:
      return '';
  }
}

// Helper function to get theme font family
function swg_auth_get_theme_font() {
  $theme_mods = get_theme_mods();
  
  // Check common theme mod names for font
  if ( isset( $theme_mods['font_family'] ) ) return $theme_mods['font_family'];
  if ( isset( $theme_mods['body_font'] ) ) return $theme_mods['body_font'];
  if ( isset( $theme_mods['typography_body_font'] ) ) return $theme_mods['typography_body_font'];
  
  return 'inherit';
}

// Include some includes
include( plugin_dir_path( __FILE__ ) . 'includes/swg-auth-oci.php' );

// Run when WordPress is loaded
add_action( 'wp_loaded', 'swg_auth_run' );
function swg_auth_run() {
  include( plugin_dir_path( __FILE__ ) . 'includes/swg-auth-check.php' );
  include( plugin_dir_path( __FILE__ ) . 'includes/swg-auth-admin-level-check.php' );
  include( plugin_dir_path( __FILE__ ) . 'includes/swg-auth-metrics-listener.php' );
  include( plugin_dir_path( __FILE__ ) . 'includes/swg-auth-webcfg.php' );
}

// Run Admin Stuff
include( plugin_dir_path( __FILE__ ) . 'admin/swg-auth-admin-menus.php' );
include( plugin_dir_path( __FILE__ ) . 'admin/swg-auth-settings.php' );
include( plugin_dir_path( __FILE__ ) . 'admin/swg-auth-server-settings.php' );
include( plugin_dir_path( __FILE__ ) . 'admin/swg-auth-user-settings.php' );

// Run Public Stuff
include( plugin_dir_path( __FILE__ ) . 'public/swg-auth-virtual-page.php' );
include( plugin_dir_path( __FILE__ ) . 'public/swg-auth-resources.php' );
include( plugin_dir_path( __FILE__ ) . 'public/swg-auth-metrics-widget.php' );

// Enqueue frontend CSS
add_action( 'wp_enqueue_scripts', 'swg_auth_enqueue_public_styles' );
function swg_auth_enqueue_public_styles() {
  wp_enqueue_style( 
    'swg-auth-public', 
    plugin_dir_url( __FILE__ ) . 'public/css/swg-auth-public.css',
    array(),
    '0.15'
  );
}

// Add custom CSS based on settings
add_action( 'wp_head', 'swg_auth_custom_styles_output' );
function swg_auth_custom_styles_output() {
  // Only apply custom styles if "Match Theme" is not enabled
  if ( get_option( 'swg-auth-match-theme' ) !== 'on' ) {
    $global_style = get_option( 'swg-auth-global-style' ) === 'on';
    
    ?>
    <style type="text/css">
      <?php if ( $global_style ) : 
        // Use global CSS options for all components
        $primary_color = get_option( 'swg-auth-primary-color', swg_auth_get_theme_color('primary') );
        $background_color = get_option( 'swg-auth-background-color', swg_auth_get_theme_color('background') );
        $text_color = get_option( 'swg-auth-text-color', swg_auth_get_theme_color('text') );
        $border_color = get_option( 'swg-auth-border-color', swg_auth_get_theme_color('border') );
        $font_family = get_option( 'swg-auth-font-family', swg_auth_get_theme_font() );
        $font_size = get_option( 'swg-auth-font-size', '' );
        $font_weight = get_option( 'swg-auth-font-weight', '' );
        $line_height = get_option( 'swg-auth-line-height', '' );
        $letter_spacing = get_option( 'swg-auth-letter-spacing', '' );
        $padding = get_option( 'swg-auth-padding', '' );
        $margin = get_option( 'swg-auth-margin', '' );
        $border_size = get_option( 'swg-auth-border-size', '' );
        $border_radius = get_option( 'swg-auth-border-radius', '' );
        $box_shadow = get_option( 'swg-auth-box-shadow', '' );
        $opacity = get_option( 'swg-auth-opacity', '' );
      ?>
      .swg-auth-page,
      table.swg-auth-resource-page,
      .widget_swg-auth-metrics {
        <?php if ( $background_color ) : ?>background-color: <?php echo esc_attr( $background_color ); ?>;<?php endif; ?>
        <?php if ( $text_color ) : ?>color: <?php echo esc_attr( $text_color ); ?>;<?php endif; ?>
        <?php if ( $font_family && $font_family !== 'inherit' ) : ?>font-family: <?php echo esc_attr( $font_family ); ?>;<?php endif; ?>
        <?php if ( $font_size ) : ?>font-size: <?php echo esc_attr( $font_size ); ?>px;<?php endif; ?>
        <?php if ( $font_weight ) : ?>font-weight: <?php echo esc_attr( $font_weight ); ?>;<?php endif; ?>
        <?php if ( $line_height ) : ?>line-height: <?php echo esc_attr( $line_height ); ?>;<?php endif; ?>
        <?php if ( $letter_spacing ) : ?>letter-spacing: <?php echo esc_attr( $letter_spacing ); ?>px;<?php endif; ?>
        <?php if ( $padding ) : ?>padding: <?php echo esc_attr( $padding ); ?>px;<?php endif; ?>
        <?php if ( $margin ) : ?>margin: <?php echo esc_attr( $margin ); ?>px;<?php endif; ?>
        <?php if ( $border_size ) : ?>border: <?php echo esc_attr( $border_size ); ?>px solid <?php echo esc_attr( $border_color ); ?>;<?php endif; ?>
        <?php if ( $border_radius ) : ?>border-radius: <?php echo esc_attr( $border_radius ); ?>px;<?php endif; ?>
        <?php if ( $box_shadow ) : ?>box-shadow: <?php echo esc_attr( $box_shadow ); ?>;<?php endif; ?>
        <?php if ( $opacity ) : ?>opacity: <?php echo esc_attr( $opacity ); ?>;<?php endif; ?>
      }
      
      .swg-auth-page a,
      table.swg-auth-resource-page a,
      .widget_swg-auth-metrics a {
        <?php if ( $primary_color ) : ?>color: <?php echo esc_attr( $primary_color ); ?>;<?php endif; ?>
      }
      
      <?php else : 
        // Use sub-tab specific CSS options
        
        // General Pages CSS
        $gen_primary = get_option( 'swg-auth-general-primary-color', '' );
        $gen_bg = get_option( 'swg-auth-general-background-color', '' );
        $gen_text = get_option( 'swg-auth-general-text-color', '' );
        $gen_border = get_option( 'swg-auth-general-border-color', '' );
        $gen_font = get_option( 'swg-auth-general-font-family', '' );
        $gen_font_size = get_option( 'swg-auth-general-font-size', '' );
        $gen_font_weight = get_option( 'swg-auth-general-font-weight', '' );
        $gen_line_height = get_option( 'swg-auth-general-line-height', '' );
        $gen_letter_spacing = get_option( 'swg-auth-general-letter-spacing', '' );
        $gen_padding = get_option( 'swg-auth-general-padding', '' );
        $gen_margin = get_option( 'swg-auth-general-margin', '' );
        $gen_border_size = get_option( 'swg-auth-general-border-size', '' );
        $gen_border_radius = get_option( 'swg-auth-general-border-radius', '' );
        $gen_box_shadow = get_option( 'swg-auth-general-box-shadow', '' );
        $gen_opacity = get_option( 'swg-auth-general-opacity', '' );
      ?>
      .swg-auth-page {
        <?php if ( $gen_bg ) : ?>background-color: <?php echo esc_attr( $gen_bg ); ?>;<?php endif; ?>
        <?php if ( $gen_text ) : ?>color: <?php echo esc_attr( $gen_text ); ?>;<?php endif; ?>
        <?php if ( $gen_font && $gen_font !== 'inherit' ) : ?>font-family: <?php echo esc_attr( $gen_font ); ?>;<?php endif; ?>
        <?php if ( $gen_font_size ) : ?>font-size: <?php echo esc_attr( $gen_font_size ); ?>px;<?php endif; ?>
        <?php if ( $gen_font_weight ) : ?>font-weight: <?php echo esc_attr( $gen_font_weight ); ?>;<?php endif; ?>
        <?php if ( $gen_line_height ) : ?>line-height: <?php echo esc_attr( $gen_line_height ); ?>;<?php endif; ?>
        <?php if ( $gen_letter_spacing ) : ?>letter-spacing: <?php echo esc_attr( $gen_letter_spacing ); ?>px;<?php endif; ?>
        <?php if ( $gen_padding ) : ?>padding: <?php echo esc_attr( $gen_padding ); ?>px;<?php endif; ?>
        <?php if ( $gen_margin ) : ?>margin: <?php echo esc_attr( $gen_margin ); ?>px;<?php endif; ?>
        <?php if ( $gen_border_size && $gen_border ) : ?>border: <?php echo esc_attr( $gen_border_size ); ?>px solid <?php echo esc_attr( $gen_border ); ?>;<?php endif; ?>
        <?php if ( $gen_border_radius ) : ?>border-radius: <?php echo esc_attr( $gen_border_radius ); ?>px;<?php endif; ?>
        <?php if ( $gen_box_shadow ) : ?>box-shadow: <?php echo esc_attr( $gen_box_shadow ); ?>;<?php endif; ?>
        <?php if ( $gen_opacity ) : ?>opacity: <?php echo esc_attr( $gen_opacity ); ?>;<?php endif; ?>
      }
      
      <?php if ( $gen_primary ) : ?>
      .swg-auth-page a {
        color: <?php echo esc_attr( $gen_primary ); ?>;
      }
      <?php endif; ?>
      
      <?php
        // Resources Page CSS
        $res_primary = get_option( 'swg-auth-resources-primary-color', '' );
        $res_bg = get_option( 'swg-auth-resources-background-color', '' );
        $res_text = get_option( 'swg-auth-resources-text-color', '' );
        $res_border = get_option( 'swg-auth-resources-border-color', '' );
        $res_font = get_option( 'swg-auth-resources-font-family', '' );
        $res_font_size = get_option( 'swg-auth-resources-font-size', '' );
        $res_font_weight = get_option( 'swg-auth-resources-font-weight', '' );
        $res_line_height = get_option( 'swg-auth-resources-line-height', '' );
        $res_letter_spacing = get_option( 'swg-auth-resources-letter-spacing', '' );
        $res_padding = get_option( 'swg-auth-resources-padding', '' );
        $res_margin = get_option( 'swg-auth-resources-margin', '' );
        $res_border_size = get_option( 'swg-auth-resources-border-size', '' );
        $res_border_radius = get_option( 'swg-auth-resources-border-radius', '' );
        $res_box_shadow = get_option( 'swg-auth-resources-box-shadow', '' );
        $res_opacity = get_option( 'swg-auth-resources-opacity', '' );
      ?>
      table.swg-auth-resource-page {
        <?php if ( $res_bg ) : ?>background-color: <?php echo esc_attr( $res_bg ); ?>;<?php endif; ?>
        <?php if ( $res_text ) : ?>color: <?php echo esc_attr( $res_text ); ?>;<?php endif; ?>
        <?php if ( $res_font && $res_font !== 'inherit' ) : ?>font-family: <?php echo esc_attr( $res_font ); ?>;<?php endif; ?>
        <?php if ( $res_font_size ) : ?>font-size: <?php echo esc_attr( $res_font_size ); ?>px;<?php endif; ?>
        <?php if ( $res_font_weight ) : ?>font-weight: <?php echo esc_attr( $res_font_weight ); ?>;<?php endif; ?>
        <?php if ( $res_line_height ) : ?>line-height: <?php echo esc_attr( $res_line_height ); ?>;<?php endif; ?>
        <?php if ( $res_letter_spacing ) : ?>letter-spacing: <?php echo esc_attr( $res_letter_spacing ); ?>px;<?php endif; ?>
        <?php if ( $res_padding ) : ?>padding: <?php echo esc_attr( $res_padding ); ?>px;<?php endif; ?>
        <?php if ( $res_margin ) : ?>margin: <?php echo esc_attr( $res_margin ); ?>px;<?php endif; ?>
        <?php if ( $res_border_size && $res_border ) : ?>border: <?php echo esc_attr( $res_border_size ); ?>px solid <?php echo esc_attr( $res_border ); ?>;<?php endif; ?>
        <?php if ( $res_border_radius ) : ?>border-radius: <?php echo esc_attr( $res_border_radius ); ?>px;<?php endif; ?>
        <?php if ( $res_box_shadow ) : ?>box-shadow: <?php echo esc_attr( $res_box_shadow ); ?>;<?php endif; ?>
        <?php if ( $res_opacity ) : ?>opacity: <?php echo esc_attr( $res_opacity ); ?>;<?php endif; ?>
      }
      
      <?php if ( $res_primary ) : ?>
      table.swg-auth-resource-page a {
        color: <?php echo esc_attr( $res_primary ); ?>;
      }
      <?php endif; ?>
      
      <?php
        // Metrics Widget CSS
        $wid_primary = get_option( 'swg-auth-widget-primary-color', '' );
        $wid_bg = get_option( 'swg-auth-widget-background-color', '' );
        $wid_text = get_option( 'swg-auth-widget-text-color', '' );
        $wid_border = get_option( 'swg-auth-widget-border-color', '' );
        $wid_font = get_option( 'swg-auth-widget-font-family', '' );
        $wid_font_size = get_option( 'swg-auth-widget-font-size', '' );
        $wid_font_weight = get_option( 'swg-auth-widget-font-weight', '' );
        $wid_line_height = get_option( 'swg-auth-widget-line-height', '' );
        $wid_letter_spacing = get_option( 'swg-auth-widget-letter-spacing', '' );
        $wid_padding = get_option( 'swg-auth-widget-padding', '' );
        $wid_margin = get_option( 'swg-auth-widget-margin', '' );
        $wid_border_size = get_option( 'swg-auth-widget-border-size', '' );
        $wid_border_radius = get_option( 'swg-auth-widget-border-radius', '' );
        $wid_box_shadow = get_option( 'swg-auth-widget-box-shadow', '' );
        $wid_opacity = get_option( 'swg-auth-widget-opacity', '' );
      ?>
      .widget_swg-auth-metrics {
        <?php if ( $wid_bg ) : ?>background-color: <?php echo esc_attr( $wid_bg ); ?>;<?php endif; ?>
        <?php if ( $wid_text ) : ?>color: <?php echo esc_attr( $wid_text ); ?>;<?php endif; ?>
        <?php if ( $wid_font && $wid_font !== 'inherit' ) : ?>font-family: <?php echo esc_attr( $wid_font ); ?>;<?php endif; ?>
        <?php if ( $wid_font_size ) : ?>font-size: <?php echo esc_attr( $wid_font_size ); ?>px;<?php endif; ?>
        <?php if ( $wid_font_weight ) : ?>font-weight: <?php echo esc_attr( $wid_font_weight ); ?>;<?php endif; ?>
        <?php if ( $wid_line_height ) : ?>line-height: <?php echo esc_attr( $wid_line_height ); ?>;<?php endif; ?>
        <?php if ( $wid_letter_spacing ) : ?>letter-spacing: <?php echo esc_attr( $wid_letter_spacing ); ?>px;<?php endif; ?>
        <?php if ( $wid_padding ) : ?>padding: <?php echo esc_attr( $wid_padding ); ?>px;<?php endif; ?>
        <?php if ( $wid_margin ) : ?>margin: <?php echo esc_attr( $wid_margin ); ?>px;<?php endif; ?>
        <?php if ( $wid_border_size && $wid_border ) : ?>border: <?php echo esc_attr( $wid_border_size ); ?>px solid <?php echo esc_attr( $wid_border ); ?>;<?php endif; ?>
        <?php if ( $wid_border_radius ) : ?>border-radius: <?php echo esc_attr( $wid_border_radius ); ?>px;<?php endif; ?>
        <?php if ( $wid_box_shadow ) : ?>box-shadow: <?php echo esc_attr( $wid_box_shadow ); ?>;<?php endif; ?>
        <?php if ( $wid_opacity ) : ?>opacity: <?php echo esc_attr( $wid_opacity ); ?>;<?php endif; ?>
      }
      
      <?php if ( $wid_primary ) : ?>
      .widget_swg-auth-metrics a {
        color: <?php echo esc_attr( $wid_primary ); ?>;
      }
      <?php endif; ?>
      
      <?php 
        // Custom CSS from sub-tabs
        $general_custom = get_option( 'swg-auth-general-custom-css', '' );
        if ( ! empty( $general_custom ) ) {
          echo wp_strip_all_tags( $general_custom ) . "\n";
        }
        
        $resources_custom = get_option( 'swg-auth-resources-custom-css', '' );
        if ( ! empty( $resources_custom ) ) {
          echo wp_strip_all_tags( $resources_custom ) . "\n";
        }
        
        $widget_custom = get_option( 'swg-auth-widget-custom-css', '' );
        if ( ! empty( $widget_custom ) ) {
          echo wp_strip_all_tags( $widget_custom ) . "\n";
        }
      ?>
      <?php endif; ?>
    </style>
    <?php
  }
}
