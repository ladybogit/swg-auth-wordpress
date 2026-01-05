<?php

// No Direct Access
if ( ! defined( 'ABSPATH' ) ) {
  die;
}

add_action( 'admin_init', 'swg_auth_settings' );
function swg_auth_settings() {

  // === GENERAL SETTINGS TAB ===
  add_settings_section(
    'swg-auth-general-settings',
    'General Settings',
    'swg_auth_general_settings_html',
    'swg-auth-settings-general'
  );

  register_setting(
    'swg-auth-settings-general',
    'swg-auth-approval-required',
    array(
      'type' => 'boolean',
      'description' => 'Whether approval is required for game access.',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => false
    )
  );

  add_settings_field(
    'swg-auth-approval-required',
    'Account Approval Required',
    'swg_auth_approval_required_html',
    'swg-auth-settings-general',
    'swg-auth-general-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-settings-general',
    'swg-auth-auth-type',
    array(
      'type' => 'string',
      'description' => 'What type of auth is to be used.',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => 'WebAPI'
    )
  );

  add_settings_field(
    'swg-auth-auth-type',
    'Auth Type',
    'swg_auth_auth_type_html',
    'swg-auth-settings-general',
    'swg-auth-general-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  // === DATABASE SETTINGS TAB ===
  add_settings_section(
    'swg-auth-odb-settings',
    'Oracle Database Connection Settings',
    'swg_auth_odb_settings_html',
    'swg-auth-settings-database'
  );

  register_setting(
    'swg-auth-settings-database',
    'swg-auth-odb-username',
    array(
      'type' => 'string',
      'description' => 'Oracle Username',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => 'swg'
    )
  );

  add_settings_field(
    'swg-auth-odb-username',
    'Oracle Username',
    'swg_auth_odb_username_html',
    'swg-auth-settings-database',
    'swg-auth-odb-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-settings-database',
    'swg-auth-odb-password',
    array(
      'type' => 'string',
      'description' => 'Oracle Password',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => 'swg'
    )
  );

  add_settings_field(
    'swg-auth-odb-password',
    'Oracle Password',
    'swg_auth_odb_password_html',
    'swg-auth-settings-database',
    'swg-auth-odb-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-settings-database',
    'swg-auth-odb-sid',
    array(
      'type' => 'string',
      'description' => 'Oracle SID',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => 'swg'
    )
  );

  add_settings_field(
    'swg-auth-odb-sid',
    'Oracle SID',
    'swg_auth_odb_sid_html',
    'swg-auth-settings-database',
    'swg-auth-odb-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-settings-database',
    'swg-auth-odb-ip',
    array(
      'type' => 'string',
      'description' => 'Oracle IP Address',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => 'localhost'
    )
  );

  add_settings_field(
    'swg-auth-odb-ip',
    'Oracle IP Address',
    'swg_auth_odb_ip_html',
    'swg-auth-settings-database',
    'swg-auth-odb-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-settings-database',
    'swg-auth-odb-port',
    array(
      'type' => 'string',
      'description' => 'Oracle Port',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '1521'
    )
  );

  add_settings_field(
    'swg-auth-odb-port',
    'Oracle Port',
    'swg_auth_odb_port_html',
    'swg-auth-settings-database',
    'swg-auth-odb-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  // === SECRET KEYS TAB ===
  add_settings_section(
    'swg-auth-secret-keys',
    'Secret Keys',
    'swg_auth_secret_keys_html',
    'swg-auth-settings-keys'
  );

  register_setting(
    'swg-auth-settings-keys',
    'swg-auth-loginserver-key',
    array(
      'type' => 'string',
      'description' => 'LoginServer Key',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => ''
    )
  );

  add_settings_field(
    'swg-auth-loginserver-key',
    'LoginServer Key',
    'swg_auth_loginserver_key_html',
    'swg-auth-settings-keys',
    'swg-auth-secret-keys',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-settings-keys',
    'swg-auth-serverutility-key',
    array(
      'type' => 'string',
      'description' => 'ServerUtility Key',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => ''
    )
  );

  add_settings_field(
    'swg-auth-serverutility-key',
    'ServerUtility Key',
    'swg_auth_serverutility_key_html',
    'swg-auth-settings-keys',
    'swg-auth-secret-keys',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-settings-keys',
    'swg-auth-centralserver-key',
    array(
      'type' => 'string',
      'description' => 'CentralServer Key',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => ''
    )
  );

  add_settings_field(
    'swg-auth-centralserver-key',
    'CentralServer Key',
    'swg_auth_centralserver_key_html',
    'swg-auth-settings-keys',
    'swg-auth-secret-keys',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  // === CSS SETTINGS TAB ===
  add_settings_section(
    'swg-auth-css-settings',
    'CSS Settings',
    'swg_auth_css_settings_html',
    'swg-auth-settings-css'
  );

  register_setting(
    'swg-auth-settings-css-all',
    'swg-auth-match-theme',
    array(
      'type' => 'boolean',
      'description' => 'Match WordPress theme styles',
      'sanitize_callback' => 'swg_auth_sanitize_checkbox',
      'show_in_rest' => false,
      'default' => true
    )
  );

  add_settings_field(
    'swg-auth-match-theme',
    'Match Theme',
    'swg_auth_match_theme_html',
    'swg-auth-settings-css',
    'swg-auth-css-settings',
    array(
      //'label_for' => '',
      //'class' => '',
    )
  );

  register_setting(
    'swg-auth-settings-css-all',
    'swg-auth-global-style',
    array(
      'type' => 'boolean',
      'description' => 'Apply styles globally',
      'sanitize_callback' => 'swg_auth_sanitize_checkbox',
      'show_in_rest' => false,
      'default' => true
    )
  );

  add_settings_field(
    'swg-auth-global-style',
    'Global Style',
    'swg_auth_global_style_html',
    'swg-auth-settings-css',
    'swg-auth-css-settings',
    array(
      'class' => 'swg-auth-css-option',
    )
  );

  register_setting(
    'swg-auth-settings-css-all',
    'swg-auth-primary-color',
    array(
      'type' => 'string',
      'description' => 'Primary color',
      'sanitize_callback' => 'sanitize_hex_color',
      'show_in_rest' => false,
      'default' => '#2271b1'
    )
  );

  add_settings_field(
    'swg-auth-primary-color',
    'Primary Color',
    'swg_auth_primary_color_html',
    'swg-auth-settings-css',
    'swg-auth-css-settings',
    array(
      'class' => 'swg-auth-advanced-css-option',
    )
  );

  register_setting(
    'swg-auth-settings-css-all',
    'swg-auth-background-color',
    array(
      'type' => 'string',
      'description' => 'Background color',
      'sanitize_callback' => 'sanitize_hex_color',
      'show_in_rest' => false,
      'default' => '#ffffff'
    )
  );

  add_settings_field(
    'swg-auth-background-color',
    'Background Color',
    'swg_auth_background_color_html',
    'swg-auth-settings-css',
    'swg-auth-css-settings',
    array(
      'class' => 'swg-auth-advanced-css-option',
    )
  );

  register_setting(
    'swg-auth-settings-css-all',
    'swg-auth-text-color',
    array(
      'type' => 'string',
      'description' => 'Text color',
      'sanitize_callback' => 'sanitize_hex_color',
      'show_in_rest' => false,
      'default' => '#23282d'
    )
  );

  add_settings_field(
    'swg-auth-text-color',
    'Text Color',
    'swg_auth_text_color_html',
    'swg-auth-settings-css',
    'swg-auth-css-settings',
    array(
      'class' => 'swg-auth-advanced-css-option',
    )
  );

  register_setting(
    'swg-auth-settings-css-all',
    'swg-auth-border-color',
    array(
      'type' => 'string',
      'description' => 'Border color',
      'sanitize_callback' => 'sanitize_hex_color',
      'show_in_rest' => false,
      'default' => '#dddddd'
    )
  );

  add_settings_field(
    'swg-auth-border-color',
    'Border Color',
    'swg_auth_border_color_html',
    'swg-auth-settings-css',
    'swg-auth-css-settings',
    array(
      'class' => 'swg-auth-advanced-css-option',
    )
  );

  register_setting(
    'swg-auth-settings-css-all',
    'swg-auth-font-family',
    array(
      'type' => 'string',
      'description' => 'Font family',
      'sanitize_callback' => 'sanitize_text_field',
      'show_in_rest' => false,
      'default' => 'inherit'
    )
  );

  add_settings_field(
    'swg-auth-font-family',
    'Font Family',
    'swg_auth_font_family_html',
    'swg-auth-settings-css',
    'swg-auth-css-settings',
    array(
      'class' => 'swg-auth-advanced-css-option',
    )
  );

  register_setting(
    'swg-auth-settings-css-all',
    'swg-auth-padding',
    array(
      'type' => 'string',
      'description' => 'Padding',
      'sanitize_callback' => 'sanitize_text_field',
      'show_in_rest' => false,
      'default' => '20px'
    )
  );

  add_settings_field(
    'swg-auth-padding',
    'Padding',
    'swg_auth_padding_html',
    'swg-auth-settings-css',
    'swg-auth-css-settings',
    array(
      'class' => 'swg-auth-advanced-css-option',
    )
  );

  register_setting(
    'swg-auth-settings-css-all',
    'swg-auth-border-size',
    array(
      'type' => 'string',
      'description' => 'Border size',
      'sanitize_callback' => 'sanitize_text_field',
      'show_in_rest' => false,
      'default' => '1px'
    )
  );

  add_settings_field(
    'swg-auth-border-size',
    'Border Size',
    'swg_auth_border_size_html',
    'swg-auth-settings-css',
    'swg-auth-css-settings',
    array(
      'class' => 'swg-auth-advanced-css-option',
    )
  );

  register_setting('swg-auth-settings-css-all', 'swg-auth-border-radius', array('type' => 'string', 'sanitize_callback' => 'sanitize_text_field', 'default' => '8px'));
  add_settings_field('swg-auth-border-radius', 'Border Radius', 'swg_auth_border_radius_html', 'swg-auth-settings-css', 'swg-auth-css-settings', array('class' => 'swg-auth-advanced-css-option'));

  register_setting('swg-auth-settings-css-all', 'swg-auth-box-shadow', array('type' => 'string', 'sanitize_callback' => 'sanitize_text_field', 'default' => '0 2px 4px rgba(0,0,0,0.1)'));
  add_settings_field('swg-auth-box-shadow', 'Box Shadow', 'swg_auth_box_shadow_html', 'swg-auth-settings-css', 'swg-auth-css-settings', array('class' => 'swg-auth-advanced-css-option'));

  register_setting('swg-auth-settings-css-all', 'swg-auth-margin', array('type' => 'string', 'sanitize_callback' => 'sanitize_text_field', 'default' => '0'));
  add_settings_field('swg-auth-margin', 'Margin', 'swg_auth_margin_html', 'swg-auth-settings-css', 'swg-auth-css-settings', array('class' => 'swg-auth-advanced-css-option'));

  register_setting('swg-auth-settings-css-all', 'swg-auth-font-size', array('type' => 'string', 'sanitize_callback' => 'sanitize_text_field', 'default' => '14px'));
  add_settings_field('swg-auth-font-size', 'Font Size', 'swg_auth_font_size_html', 'swg-auth-settings-css', 'swg-auth-css-settings', array('class' => 'swg-auth-advanced-css-option'));

  register_setting('swg-auth-settings-css-all', 'swg-auth-font-weight', array('type' => 'string', 'sanitize_callback' => 'sanitize_text_field', 'default' => 'normal'));
  add_settings_field('swg-auth-font-weight', 'Font Weight', 'swg_auth_font_weight_html', 'swg-auth-settings-css', 'swg-auth-css-settings', array('class' => 'swg-auth-advanced-css-option'));

  register_setting('swg-auth-settings-css-all', 'swg-auth-line-height', array('type' => 'string', 'sanitize_callback' => 'sanitize_text_field', 'default' => '1.5'));
  add_settings_field('swg-auth-line-height', 'Line Height', 'swg_auth_line_height_html', 'swg-auth-settings-css', 'swg-auth-css-settings', array('class' => 'swg-auth-advanced-css-option'));

  register_setting('swg-auth-settings-css-all', 'swg-auth-letter-spacing', array('type' => 'string', 'sanitize_callback' => 'sanitize_text_field', 'default' => 'normal'));
  add_settings_field('swg-auth-letter-spacing', 'Letter Spacing', 'swg_auth_letter_spacing_html', 'swg-auth-settings-css', 'swg-auth-css-settings', array('class' => 'swg-auth-advanced-css-option'));

  register_setting('swg-auth-settings-css-all', 'swg-auth-opacity', array('type' => 'string', 'sanitize_callback' => 'sanitize_text_field', 'default' => '1'));
  add_settings_field('swg-auth-opacity', 'Opacity', 'swg_auth_opacity_html', 'swg-auth-settings-css', 'swg-auth-css-settings', array('class' => 'swg-auth-advanced-css-option'));

  // === CSS GENERAL PAGES SUB-TAB ===
  add_settings_section(
    'swg-auth-css-general-settings',
    'General Pages CSS',
    'swg_auth_css_general_settings_html',
    'swg-auth-settings-css-general'
  );

  // General Pages - Primary Color
  register_setting('swg-auth-settings-css-all', 'swg-auth-general-primary-color', array('type' => 'string', 'sanitize_callback' => 'sanitize_hex_color', 'default' => '#2271b1'));
  add_settings_field('swg-auth-general-primary-color', 'Primary Color', 'swg_auth_general_primary_color_html', 'swg-auth-settings-css-general', 'swg-auth-css-general-settings');

  // General Pages - Background Color
  register_setting('swg-auth-settings-css-all', 'swg-auth-general-background-color', array('type' => 'string', 'sanitize_callback' => 'sanitize_hex_color', 'default' => '#ffffff'));
  add_settings_field('swg-auth-general-background-color', 'Background Color', 'swg_auth_general_background_color_html', 'swg-auth-settings-css-general', 'swg-auth-css-general-settings');

  // General Pages - Text Color
  register_setting('swg-auth-settings-css-all', 'swg-auth-general-text-color', array('type' => 'string', 'sanitize_callback' => 'sanitize_hex_color', 'default' => '#23282d'));
  add_settings_field('swg-auth-general-text-color', 'Text Color', 'swg_auth_general_text_color_html', 'swg-auth-settings-css-general', 'swg-auth-css-general-settings');

  // General Pages - Border Color
  register_setting('swg-auth-settings-css-all', 'swg-auth-general-border-color', array('type' => 'string', 'sanitize_callback' => 'sanitize_hex_color', 'default' => '#dddddd'));
  add_settings_field('swg-auth-general-border-color', 'Border Color', 'swg_auth_general_border_color_html', 'swg-auth-settings-css-general', 'swg-auth-css-general-settings');

  // General Pages - Font Family
  register_setting('swg-auth-settings-css-all', 'swg-auth-general-font-family', array('type' => 'string', 'sanitize_callback' => 'sanitize_text_field', 'default' => 'inherit'));
  add_settings_field('swg-auth-general-font-family', 'Font Family', 'swg_auth_general_font_family_html', 'swg-auth-settings-css-general', 'swg-auth-css-general-settings');

  // General Pages - Padding
  register_setting('swg-auth-settings-css-all', 'swg-auth-general-padding', array('type' => 'string', 'sanitize_callback' => 'sanitize_text_field', 'default' => '20px'));
  add_settings_field('swg-auth-general-padding', 'Padding', 'swg_auth_general_padding_html', 'swg-auth-settings-css-general', 'swg-auth-css-general-settings');

  // General Pages - Border Size
  register_setting('swg-auth-settings-css-all', 'swg-auth-general-border-size', array('type' => 'string', 'sanitize_callback' => 'sanitize_text_field', 'default' => '1px'));
  add_settings_field('swg-auth-general-border-size', 'Border Size', 'swg_auth_general_border_size_html', 'swg-auth-settings-css-general', 'swg-auth-css-general-settings');

  register_setting('swg-auth-settings-css-all', 'swg-auth-general-border-radius', array('type' => 'string', 'sanitize_callback' => 'sanitize_text_field', 'default' => '8px'));
  add_settings_field('swg-auth-general-border-radius', 'Border Radius', 'swg_auth_general_border_radius_html', 'swg-auth-settings-css-general', 'swg-auth-css-general-settings');

  register_setting('swg-auth-settings-css-all', 'swg-auth-general-box-shadow', array('type' => 'string', 'sanitize_callback' => 'sanitize_text_field', 'default' => '0 2px 4px rgba(0,0,0,0.1)'));
  add_settings_field('swg-auth-general-box-shadow', 'Box Shadow', 'swg_auth_general_box_shadow_html', 'swg-auth-settings-css-general', 'swg-auth-css-general-settings');

  register_setting('swg-auth-settings-css-all', 'swg-auth-general-margin', array('type' => 'string', 'sanitize_callback' => 'sanitize_text_field', 'default' => '0'));
  add_settings_field('swg-auth-general-margin', 'Margin', 'swg_auth_general_margin_html', 'swg-auth-settings-css-general', 'swg-auth-css-general-settings');

  register_setting('swg-auth-settings-css-all', 'swg-auth-general-font-size', array('type' => 'string', 'sanitize_callback' => 'sanitize_text_field', 'default' => '14px'));
  add_settings_field('swg-auth-general-font-size', 'Font Size', 'swg_auth_general_font_size_html', 'swg-auth-settings-css-general', 'swg-auth-css-general-settings');

  register_setting('swg-auth-settings-css-all', 'swg-auth-general-font-weight', array('type' => 'string', 'sanitize_callback' => 'sanitize_text_field', 'default' => 'normal'));
  add_settings_field('swg-auth-general-font-weight', 'Font Weight', 'swg_auth_general_font_weight_html', 'swg-auth-settings-css-general', 'swg-auth-css-general-settings');

  register_setting('swg-auth-settings-css-all', 'swg-auth-general-line-height', array('type' => 'string', 'sanitize_callback' => 'sanitize_text_field', 'default' => '1.5'));
  add_settings_field('swg-auth-general-line-height', 'Line Height', 'swg_auth_general_line_height_html', 'swg-auth-settings-css-general', 'swg-auth-css-general-settings');

  register_setting('swg-auth-settings-css-all', 'swg-auth-general-letter-spacing', array('type' => 'string', 'sanitize_callback' => 'sanitize_text_field', 'default' => 'normal'));
  add_settings_field('swg-auth-general-letter-spacing', 'Letter Spacing', 'swg_auth_general_letter_spacing_html', 'swg-auth-settings-css-general', 'swg-auth-css-general-settings');

  register_setting('swg-auth-settings-css-all', 'swg-auth-general-opacity', array('type' => 'string', 'sanitize_callback' => 'sanitize_text_field', 'default' => '1'));
  add_settings_field('swg-auth-general-opacity', 'Opacity', 'swg_auth_general_opacity_html', 'swg-auth-settings-css-general', 'swg-auth-css-general-settings');

  // General Pages - Custom CSS
  register_setting('swg-auth-settings-css-all', 'swg-auth-general-custom-css', array('type' => 'string', 'sanitize_callback' => 'wp_strip_all_tags', 'default' => '.swg-auth-page { padding: 20px 0; max-width: 1200px; margin: 0 auto; }'));
  add_settings_field('swg-auth-general-custom-css', 'Custom CSS', 'swg_auth_general_custom_css_html', 'swg-auth-settings-css-general', 'swg-auth-css-general-settings');

  // === CSS RESOURCES PAGE SUB-TAB ===
  add_settings_section(
    'swg-auth-css-resources-settings',
    'Resources Page CSS',
    'swg_auth_css_resources_settings_html',
    'swg-auth-settings-css-resources'
  );

  // Resources - Primary Color
  register_setting('swg-auth-settings-css-all', 'swg-auth-resources-primary-color', array('type' => 'string', 'sanitize_callback' => 'sanitize_hex_color', 'default' => '#2271b1'));
  add_settings_field('swg-auth-resources-primary-color', 'Primary Color', 'swg_auth_resources_primary_color_html', 'swg-auth-settings-css-resources', 'swg-auth-css-resources-settings');

  // Resources - Background Color
  register_setting('swg-auth-settings-css-all', 'swg-auth-resources-background-color', array('type' => 'string', 'sanitize_callback' => 'sanitize_hex_color', 'default' => '#ffffff'));
  add_settings_field('swg-auth-resources-background-color', 'Background Color', 'swg_auth_resources_background_color_html', 'swg-auth-settings-css-resources', 'swg-auth-css-resources-settings');

  // Resources - Text Color
  register_setting('swg-auth-settings-css-all', 'swg-auth-resources-text-color', array('type' => 'string', 'sanitize_callback' => 'sanitize_hex_color', 'default' => '#23282d'));
  add_settings_field('swg-auth-resources-text-color', 'Text Color', 'swg_auth_resources_text_color_html', 'swg-auth-settings-css-resources', 'swg-auth-css-resources-settings');

  // Resources - Border Color
  register_setting('swg-auth-settings-css-all', 'swg-auth-resources-border-color', array('type' => 'string', 'sanitize_callback' => 'sanitize_hex_color', 'default' => '#dddddd'));
  add_settings_field('swg-auth-resources-border-color', 'Border Color', 'swg_auth_resources_border_color_html', 'swg-auth-settings-css-resources', 'swg-auth-css-resources-settings');

  // Resources - Font Family
  register_setting('swg-auth-settings-css-all', 'swg-auth-resources-font-family', array('type' => 'string', 'sanitize_callback' => 'sanitize_text_field', 'default' => 'inherit'));
  add_settings_field('swg-auth-resources-font-family', 'Font Family', 'swg_auth_resources_font_family_html', 'swg-auth-settings-css-resources', 'swg-auth-css-resources-settings');

  // Resources - Padding
  register_setting('swg-auth-settings-css-all', 'swg-auth-resources-padding', array('type' => 'string', 'sanitize_callback' => 'sanitize_text_field', 'default' => '20px'));
  add_settings_field('swg-auth-resources-padding', 'Padding', 'swg_auth_resources_padding_html', 'swg-auth-settings-css-resources', 'swg-auth-css-resources-settings');

  // Resources - Border Size
  register_setting('swg-auth-settings-css-all', 'swg-auth-resources-border-size', array('type' => 'string', 'sanitize_callback' => 'sanitize_text_field', 'default' => '1px'));
  add_settings_field('swg-auth-resources-border-size', 'Border Size', 'swg_auth_resources_border_size_html', 'swg-auth-settings-css-resources', 'swg-auth-css-resources-settings');

  register_setting('swg-auth-settings-css-all', 'swg-auth-resources-border-radius', array('type' => 'string', 'sanitize_callback' => 'sanitize_text_field', 'default' => '8px'));
  add_settings_field('swg-auth-resources-border-radius', 'Border Radius', 'swg_auth_resources_border_radius_html', 'swg-auth-settings-css-resources', 'swg-auth-css-resources-settings');

  register_setting('swg-auth-settings-css-all', 'swg-auth-resources-box-shadow', array('type' => 'string', 'sanitize_callback' => 'sanitize_text_field', 'default' => '0 2px 4px rgba(0,0,0,0.1)'));
  add_settings_field('swg-auth-resources-box-shadow', 'Box Shadow', 'swg_auth_resources_box_shadow_html', 'swg-auth-settings-css-resources', 'swg-auth-css-resources-settings');

  register_setting('swg-auth-settings-css-all', 'swg-auth-resources-margin', array('type' => 'string', 'sanitize_callback' => 'sanitize_text_field', 'default' => '0'));
  add_settings_field('swg-auth-resources-margin', 'Margin', 'swg_auth_resources_margin_html', 'swg-auth-settings-css-resources', 'swg-auth-css-resources-settings');

  register_setting('swg-auth-settings-css-all', 'swg-auth-resources-font-size', array('type' => 'string', 'sanitize_callback' => 'sanitize_text_field', 'default' => '14px'));
  add_settings_field('swg-auth-resources-font-size', 'Font Size', 'swg_auth_resources_font_size_html', 'swg-auth-settings-css-resources', 'swg-auth-css-resources-settings');

  register_setting('swg-auth-settings-css-all', 'swg-auth-resources-font-weight', array('type' => 'string', 'sanitize_callback' => 'sanitize_text_field', 'default' => 'normal'));
  add_settings_field('swg-auth-resources-font-weight', 'Font Weight', 'swg_auth_resources_font_weight_html', 'swg-auth-settings-css-resources', 'swg-auth-css-resources-settings');

  register_setting('swg-auth-settings-css-all', 'swg-auth-resources-line-height', array('type' => 'string', 'sanitize_callback' => 'sanitize_text_field', 'default' => '1.5'));
  add_settings_field('swg-auth-resources-line-height', 'Line Height', 'swg_auth_resources_line_height_html', 'swg-auth-settings-css-resources', 'swg-auth-css-resources-settings');

  register_setting('swg-auth-settings-css-all', 'swg-auth-resources-letter-spacing', array('type' => 'string', 'sanitize_callback' => 'sanitize_text_field', 'default' => 'normal'));
  add_settings_field('swg-auth-resources-letter-spacing', 'Letter Spacing', 'swg_auth_resources_letter_spacing_html', 'swg-auth-settings-css-resources', 'swg-auth-css-resources-settings');

  register_setting('swg-auth-settings-css-all', 'swg-auth-resources-opacity', array('type' => 'string', 'sanitize_callback' => 'sanitize_text_field', 'default' => '1'));
  add_settings_field('swg-auth-resources-opacity', 'Opacity', 'swg_auth_resources_opacity_html', 'swg-auth-settings-css-resources', 'swg-auth-css-resources-settings');

  // Resources - Custom CSS
  register_setting('swg-auth-settings-css-all', 'swg-auth-resources-custom-css', array('type' => 'string', 'sanitize_callback' => 'wp_strip_all_tags', 'default' => 'table.swg-auth-resource-page { margin: 0; padding: 0; border: 0; width: 100%; }'));
  add_settings_field('swg-auth-resources-custom-css', 'Custom CSS', 'swg_auth_resources_custom_css_html', 'swg-auth-settings-css-resources', 'swg-auth-css-resources-settings');

  // === CSS WIDGET SUB-TAB ===
  add_settings_section(
    'swg-auth-css-widget-settings',
    'Metrics Widget CSS',
    'swg_auth_css_widget_settings_html',
    'swg-auth-settings-css-widget'
  );

  // Widget - Primary Color
  register_setting('swg-auth-settings-css-all', 'swg-auth-widget-primary-color', array('type' => 'string', 'sanitize_callback' => 'sanitize_hex_color', 'default' => '#2271b1'));
  add_settings_field('swg-auth-widget-primary-color', 'Primary Color', 'swg_auth_widget_primary_color_html', 'swg-auth-settings-css-widget', 'swg-auth-css-widget-settings');

  // Widget - Background Color
  register_setting('swg-auth-settings-css-all', 'swg-auth-widget-background-color', array('type' => 'string', 'sanitize_callback' => 'sanitize_hex_color', 'default' => '#ffffff'));
  add_settings_field('swg-auth-widget-background-color', 'Background Color', 'swg_auth_widget_background_color_html', 'swg-auth-settings-css-widget', 'swg-auth-css-widget-settings');

  // Widget - Text Color
  register_setting('swg-auth-settings-css-all', 'swg-auth-widget-text-color', array('type' => 'string', 'sanitize_callback' => 'sanitize_hex_color', 'default' => '#23282d'));
  add_settings_field('swg-auth-widget-text-color', 'Text Color', 'swg_auth_widget_text_color_html', 'swg-auth-settings-css-widget', 'swg-auth-css-widget-settings');

  // Widget - Border Color
  register_setting('swg-auth-settings-css-all', 'swg-auth-widget-border-color', array('type' => 'string', 'sanitize_callback' => 'sanitize_hex_color', 'default' => '#dddddd'));
  add_settings_field('swg-auth-widget-border-color', 'Border Color', 'swg_auth_widget_border_color_html', 'swg-auth-settings-css-widget', 'swg-auth-css-widget-settings');

  // Widget - Font Family
  register_setting('swg-auth-settings-css-all', 'swg-auth-widget-font-family', array('type' => 'string', 'sanitize_callback' => 'sanitize_text_field', 'default' => 'inherit'));
  add_settings_field('swg-auth-widget-font-family', 'Font Family', 'swg_auth_widget_font_family_html', 'swg-auth-settings-css-widget', 'swg-auth-css-widget-settings');

  // Widget - Padding
  register_setting('swg-auth-settings-css-all', 'swg-auth-widget-padding', array('type' => 'string', 'sanitize_callback' => 'sanitize_text_field', 'default' => '20px'));
  add_settings_field('swg-auth-widget-padding', 'Padding', 'swg_auth_widget_padding_html', 'swg-auth-settings-css-widget', 'swg-auth-css-widget-settings');

  // Widget - Border Size
  register_setting('swg-auth-settings-css-all', 'swg-auth-widget-border-size', array('type' => 'string', 'sanitize_callback' => 'sanitize_text_field', 'default' => '1px'));
  add_settings_field('swg-auth-widget-border-size', 'Border Size', 'swg_auth_widget_border_size_html', 'swg-auth-settings-css-widget', 'swg-auth-css-widget-settings');

  register_setting('swg-auth-settings-css-all', 'swg-auth-widget-border-radius', array('type' => 'string', 'sanitize_callback' => 'sanitize_text_field', 'default' => '8px'));
  add_settings_field('swg-auth-widget-border-radius', 'Border Radius', 'swg_auth_widget_border_radius_html', 'swg-auth-settings-css-widget', 'swg-auth-css-widget-settings');

  register_setting('swg-auth-settings-css-all', 'swg-auth-widget-box-shadow', array('type' => 'string', 'sanitize_callback' => 'sanitize_text_field', 'default' => '0 2px 4px rgba(0,0,0,0.1)'));
  add_settings_field('swg-auth-widget-box-shadow', 'Box Shadow', 'swg_auth_widget_box_shadow_html', 'swg-auth-settings-css-widget', 'swg-auth-css-widget-settings');

  register_setting('swg-auth-settings-css-all', 'swg-auth-widget-margin', array('type' => 'string', 'sanitize_callback' => 'sanitize_text_field', 'default' => '0'));
  add_settings_field('swg-auth-widget-margin', 'Margin', 'swg_auth_widget_margin_html', 'swg-auth-settings-css-widget', 'swg-auth-css-widget-settings');

  register_setting('swg-auth-settings-css-all', 'swg-auth-widget-font-size', array('type' => 'string', 'sanitize_callback' => 'sanitize_text_field', 'default' => '14px'));
  add_settings_field('swg-auth-widget-font-size', 'Font Size', 'swg_auth_widget_font_size_html', 'swg-auth-settings-css-widget', 'swg-auth-css-widget-settings');

  register_setting('swg-auth-settings-css-all', 'swg-auth-widget-font-weight', array('type' => 'string', 'sanitize_callback' => 'sanitize_text_field', 'default' => 'normal'));
  add_settings_field('swg-auth-widget-font-weight', 'Font Weight', 'swg_auth_widget_font_weight_html', 'swg-auth-settings-css-widget', 'swg-auth-css-widget-settings');

  register_setting('swg-auth-settings-css-all', 'swg-auth-widget-line-height', array('type' => 'string', 'sanitize_callback' => 'sanitize_text_field', 'default' => '1.5'));
  add_settings_field('swg-auth-widget-line-height', 'Line Height', 'swg_auth_widget_line_height_html', 'swg-auth-settings-css-widget', 'swg-auth-css-widget-settings');

  register_setting('swg-auth-settings-css-all', 'swg-auth-widget-letter-spacing', array('type' => 'string', 'sanitize_callback' => 'sanitize_text_field', 'default' => 'normal'));
  add_settings_field('swg-auth-widget-letter-spacing', 'Letter Spacing', 'swg_auth_widget_letter_spacing_html', 'swg-auth-settings-css-widget', 'swg-auth-css-widget-settings');

  register_setting('swg-auth-settings-css-all', 'swg-auth-widget-opacity', array('type' => 'string', 'sanitize_callback' => 'sanitize_text_field', 'default' => '1'));
  add_settings_field('swg-auth-widget-opacity', 'Opacity', 'swg_auth_widget_opacity_html', 'swg-auth-settings-css-widget', 'swg-auth-css-widget-settings');

  // Widget - Custom CSS
  register_setting('swg-auth-settings-css-all', 'swg-auth-widget-custom-css', array('type' => 'string', 'sanitize_callback' => 'wp_strip_all_tags', 'default' => '.widget_swg-auth-metrics { background: #fff; border: 1px solid #ddd; border-radius: 8px; padding: 20px; }'));
  add_settings_field('swg-auth-widget-custom-css', 'Custom CSS', 'swg_auth_widget_custom_css_html', 'swg-auth-settings-css-widget', 'swg-auth-css-widget-settings');

}

function swg_auth_general_settings_html( $args ) {
  echo '';
}

// Sanitize checkbox values
function swg_auth_sanitize_checkbox( $input ) {
  return ( $input === 'on' ) ? 'on' : 'off';
}

function swg_auth_approval_required_html( $args ) {
  ?>
  <label for="swg-auth-approval-required">
  <input type="checkbox" name="swg-auth-approval-required" <?php echo ( get_option( 'swg-auth-approval-required' ) === 'on' ) ? 'checked' : ''; ?>>
  Require new accounts to be manually approved before they can login to the game.
  </label>
  <?php
}

function swg_auth_auth_type_html( $args ) {
  $current_value = get_option( 'swg-auth-auth-type' );
  ?>
  <select name="swg-auth-auth-type">
    <option value="WebAPI" <?php echo ( $current_value === 'WebAPI' ) ? 'selected="selected"' : ''; ?>>WebAPI</option>
    <option value="JsonWebAPI" <?php echo ( $current_value === 'JsonWebAPI' ) ? 'selected="selected"' : ''; ?>>JsonWebAPI</option>
  </select>
  <?php
}

function swg_auth_odb_settings_html( $args ) {
  ?>
  <p>The PHP OCI8 extension is <strong><?php echo extension_loaded( 'OCI8' ) ? 'loaded' : 'NOT loaded'; ?></strong>.</p>
  <p>The connection to Oracle is <strong><?php echo swg_auth_oci_connect() ? 'working' : 'NOT working'; ?></strong>.</p>
  <?php
}

function swg_auth_odb_username_html( $args ) {
  ?>
  <input type="text" name="swg-auth-odb-username" value="<?php echo esc_attr( get_option( 'swg-auth-odb-username' ) ); ?>">
  <?php
}

function swg_auth_odb_password_html( $args ) {
  ?>
  <input type="text" name="swg-auth-odb-password" value="<?php echo esc_attr( get_option( 'swg-auth-odb-password' ) ); ?>">
  <?php
}

function swg_auth_odb_sid_html( $args ) {
  ?>
  <input type="text" name="swg-auth-odb-sid" value="<?php echo esc_attr( get_option( 'swg-auth-odb-sid' ) ); ?>">
  <?php
}

function swg_auth_odb_ip_html( $args ) {
  ?>
  <input type="text" name="swg-auth-odb-ip" value="<?php echo esc_attr( get_option( 'swg-auth-odb-ip' ) ); ?>">
  <?php
}

function swg_auth_odb_port_html( $args ) {
  ?>
  <input type="text" name="swg-auth-odb-port" value="<?php echo esc_attr( get_option( 'swg-auth-odb-port' ) ); ?>">
  <?php
}

function swg_auth_secret_keys_html( $args ) {
  echo '';
}

function swg_auth_loginserver_key_html( $args ) {
  ?>
  <input type="text" name="swg-auth-loginserver-key" id="swg-auth-loginserver-key" size="40" value="<?php echo esc_attr( get_option( 'swg-auth-loginserver-key' ) ); ?>"> <button type="button" onClick="swg_auth_generate_secret_key( 'swg-auth-loginserver-key' );">Generate New Key</button>
  <?php
}

function swg_auth_serverutility_key_html( $args ) {
  ?>
  <input type="text" name="swg-auth-serverutility-key" id="swg-auth-serverutility-key" size="40" value="<?php echo esc_attr( get_option( 'swg-auth-serverutility-key' ) ); ?>"> <button type="button" onClick="swg_auth_generate_secret_key( 'swg-auth-serverutility-key' );">Generate New Key</button>
  <?php
}

function swg_auth_centralserver_key_html( $args ) {
  ?>
  <input type="text" name="swg-auth-centralserver-key" id="swg-auth-centralserver-key" size="40" value="<?php echo esc_attr( get_option( 'swg-auth-centralserver-key' ) ); ?>"> <button type="button" onClick="swg_auth_generate_secret_key( 'swg-auth-centralserver-key' );">Generate New Key</button>
  <?php
}

function swg_auth_css_settings_html( $args ) {
  ?>
  <p>Configure CSS options for SWG Auth frontend pages.</p>
  <?php
}

function swg_auth_match_theme_html( $args ) {
  $checked = ( get_option( 'swg-auth-match-theme', 'on' ) === 'on' ) ? 'checked' : '';
  ?>
  <input type="hidden" name="swg-auth-match-theme" value="off">
  <label for="swg-auth-match-theme">
  <input type="checkbox" name="swg-auth-match-theme" id="swg-auth-match-theme" value="on" <?php echo $checked; ?>>
  Automatically match the active WordPress theme's styling
  </label>
  <?php
}

function swg_auth_global_style_html( $args ) {
  $checked = ( get_option( 'swg-auth-global-style', 'on' ) === 'on' ) ? 'checked' : '';
  ?>
  <input type="hidden" name="swg-auth-global-style" value="off">
  <label for="swg-auth-global-style">
  <input type="checkbox" name="swg-auth-global-style" id="swg-auth-global-style" value="on" <?php echo $checked; ?>>
  Apply SWG Auth styles globally across the entire site
  </label>
  <?php
}

function swg_auth_primary_color_html( $args ) {
  ?>
  <input type="color" name="swg-auth-primary-color" value="<?php echo esc_attr( get_option( 'swg-auth-primary-color', '#2271b1' ) ); ?>">
  <p class="description">Primary accent color for buttons and links</p>
  <?php
}

function swg_auth_background_color_html( $args ) {
  ?>
  <input type="color" name="swg-auth-background-color" value="<?php echo esc_attr( get_option( 'swg-auth-background-color', '#ffffff' ) ); ?>">
  <p class="description">Background color for content areas</p>
  <?php
}

function swg_auth_text_color_html( $args ) {
  ?>
  <input type="color" name="swg-auth-text-color" value="<?php echo esc_attr( get_option( 'swg-auth-text-color', '#23282d' ) ); ?>">
  <p class="description">Main text color</p>
  <?php
}

function swg_auth_border_color_html( $args ) {
  ?>
  <input type="color" name="swg-auth-border-color" value="<?php echo esc_attr( get_option( 'swg-auth-border-color', '#dddddd' ) ); ?>">
  <p class="description">Border and separator color</p>
  <?php
}

function swg_auth_font_family_html( $args ) {
  ?>
  <input type="text" name="swg-auth-font-family" value="<?php echo esc_attr( get_option( 'swg-auth-font-family', 'inherit' ) ); ?>" class="regular-text">
  <p class="description">Font family (e.g., Arial, Helvetica, sans-serif or inherit)</p>
  <?php
}

function swg_auth_padding_html( $args ) {
  ?>
  <input type="text" name="swg-auth-padding" value="<?php echo esc_attr( get_option( 'swg-auth-padding', '20px' ) ); ?>" class="regular-text">
  <p class="description">Padding (e.g., 20px, 1em, 10px 20px)</p>
  <?php
}

function swg_auth_border_size_html( $args ) {
  ?>
  <input type="text" name="swg-auth-border-size" value="<?php echo esc_attr( get_option( 'swg-auth-border-size', '1px' ) ); ?>" class="regular-text">
  <p class="description">Border size (e.g., 1px, 2px, 0)</p>
  <?php
}

function swg_auth_border_radius_html( $args ) {
  echo '<input type="text" name="swg-auth-border-radius" value="' . esc_attr( get_option( 'swg-auth-border-radius', '8px' ) ) . '" class="regular-text"><p class="description">Border radius (e.g., 8px, 4px, 50%)</p>';
}

function swg_auth_box_shadow_html( $args ) {
  echo '<input type="text" name="swg-auth-box-shadow" value="' . esc_attr( get_option( 'swg-auth-box-shadow', '0 2px 4px rgba(0,0,0,0.1)' ) ) . '" class="large-text"><p class="description">Box shadow (e.g., 0 2px 4px rgba(0,0,0,0.1), none)</p>';
}

function swg_auth_margin_html( $args ) {
  echo '<input type="text" name="swg-auth-margin" value="' . esc_attr( get_option( 'swg-auth-margin', '0' ) ) . '" class="regular-text"><p class="description">Margin (e.g., 10px, 10px 20px, 0 auto)</p>';
}

function swg_auth_font_size_html( $args ) {
  echo '<input type="text" name="swg-auth-font-size" value="' . esc_attr( get_option( 'swg-auth-font-size', '14px' ) ) . '" class="regular-text"><p class="description">Font size (e.g., 14px, 1em, 16px)</p>';
}

function swg_auth_font_weight_html( $args ) {
  echo '<select name="swg-auth-font-weight"><option value="normal" ' . selected( get_option( 'swg-auth-font-weight', 'normal' ), 'normal', false ) . '>Normal</option><option value="bold" ' . selected( get_option( 'swg-auth-font-weight', 'normal' ), 'bold', false ) . '>Bold</option><option value="100" ' . selected( get_option( 'swg-auth-font-weight', 'normal' ), '100', false ) . '>100</option><option value="200" ' . selected( get_option( 'swg-auth-font-weight', 'normal' ), '200', false ) . '>200</option><option value="300" ' . selected( get_option( 'swg-auth-font-weight', 'normal' ), '300', false ) . '>300</option><option value="400" ' . selected( get_option( 'swg-auth-font-weight', 'normal' ), '400', false ) . '>400</option><option value="500" ' . selected( get_option( 'swg-auth-font-weight', 'normal' ), '500', false ) . '>500</option><option value="600" ' . selected( get_option( 'swg-auth-font-weight', 'normal' ), '600', false ) . '>600</option><option value="700" ' . selected( get_option( 'swg-auth-font-weight', 'normal' ), '700', false ) . '>700</option><option value="800" ' . selected( get_option( 'swg-auth-font-weight', 'normal' ), '800', false ) . '>800</option><option value="900" ' . selected( get_option( 'swg-auth-font-weight', 'normal' ), '900', false ) . '>900</option></select>';
}

function swg_auth_line_height_html( $args ) {
  echo '<input type="text" name="swg-auth-line-height" value="' . esc_attr( get_option( 'swg-auth-line-height', '1.5' ) ) . '" class="regular-text"><p class="description">Line height (e.g., 1.5, 20px, 1.8)</p>';
}

function swg_auth_letter_spacing_html( $args ) {
  echo '<input type="text" name="swg-auth-letter-spacing" value="' . esc_attr( get_option( 'swg-auth-letter-spacing', 'normal' ) ) . '" class="regular-text"><p class="description">Letter spacing (e.g., normal, 1px, 0.05em)</p>';
}

function swg_auth_opacity_html( $args ) {
  echo '<input type="number" name="swg-auth-opacity" value="' . esc_attr( get_option( 'swg-auth-opacity', '1' ) ) . '" min="0" max="1" step="0.1" class="small-text"><p class="description">Opacity (0 to 1)</p>';
}

// === CSS SUB-TAB HTML FUNCTIONS ===

// General Pages
function swg_auth_css_general_settings_html( $args ) {
  echo '<p>Customize CSS for general SWG Auth pages.</p>';
}
function swg_auth_general_primary_color_html( $args ) {
  echo '<input type="color" name="swg-auth-general-primary-color" value="' . esc_attr( get_option( 'swg-auth-general-primary-color', '#2271b1' ) ) . '"><p class="description">Primary accent color</p>';
}
function swg_auth_general_background_color_html( $args ) {
  echo '<input type="color" name="swg-auth-general-background-color" value="' . esc_attr( get_option( 'swg-auth-general-background-color', '#ffffff' ) ) . '"><p class="description">Background color</p>';
}
function swg_auth_general_text_color_html( $args ) {
  echo '<input type="color" name="swg-auth-general-text-color" value="' . esc_attr( get_option( 'swg-auth-general-text-color', '#23282d' ) ) . '"><p class="description">Text color</p>';
}
function swg_auth_general_border_color_html( $args ) {
  echo '<input type="color" name="swg-auth-general-border-color" value="' . esc_attr( get_option( 'swg-auth-general-border-color', '#dddddd' ) ) . '"><p class="description">Border color</p>';
}
function swg_auth_general_font_family_html( $args ) {
  echo '<input type="text" name="swg-auth-general-font-family" value="' . esc_attr( get_option( 'swg-auth-general-font-family', 'inherit' ) ) . '" class="regular-text"><p class="description">Font family</p>';
}
function swg_auth_general_padding_html( $args ) {
  echo '<input type="text" name="swg-auth-general-padding" value="' . esc_attr( get_option( 'swg-auth-general-padding', '20px' ) ) . '" class="regular-text"><p class="description">Padding (e.g., 20px, 1em)</p>';
}
function swg_auth_general_border_size_html( $args ) {
  echo '<input type="text" name="swg-auth-general-border-size" value="' . esc_attr( get_option( 'swg-auth-general-border-size', '1px' ) ) . '" class="regular-text"><p class="description">Border size</p>';
}
function swg_auth_general_border_radius_html( $args ) {
  echo '<input type="text" name="swg-auth-general-border-radius" value="' . esc_attr( get_option( 'swg-auth-general-border-radius', '8px' ) ) . '" class="regular-text"><p class="description">Border radius</p>';
}
function swg_auth_general_box_shadow_html( $args ) {
  echo '<input type="text" name="swg-auth-general-box-shadow" value="' . esc_attr( get_option( 'swg-auth-general-box-shadow', '0 2px 4px rgba(0,0,0,0.1)' ) ) . '" class="large-text"><p class="description">Box shadow</p>';
}
function swg_auth_general_margin_html( $args ) {
  echo '<input type="text" name="swg-auth-general-margin" value="' . esc_attr( get_option( 'swg-auth-general-margin', '0' ) ) . '" class="regular-text"><p class="description">Margin</p>';
}
function swg_auth_general_font_size_html( $args ) {
  echo '<input type="text" name="swg-auth-general-font-size" value="' . esc_attr( get_option( 'swg-auth-general-font-size', '14px' ) ) . '" class="regular-text"><p class="description">Font size</p>';
}
function swg_auth_general_font_weight_html( $args ) {
  echo '<select name="swg-auth-general-font-weight"><option value="normal">Normal</option><option value="bold">Bold</option><option value="100">100</option><option value="200">200</option><option value="300">300</option><option value="400">400</option><option value="500">500</option><option value="600">600</option><option value="700">700</option><option value="800">800</option><option value="900">900</option></select>';
}
function swg_auth_general_line_height_html( $args ) {
  echo '<input type="text" name="swg-auth-general-line-height" value="' . esc_attr( get_option( 'swg-auth-general-line-height', '1.5' ) ) . '" class="regular-text"><p class="description">Line height</p>';
}
function swg_auth_general_letter_spacing_html( $args ) {
  echo '<input type="text" name="swg-auth-general-letter-spacing" value="' . esc_attr( get_option( 'swg-auth-general-letter-spacing', 'normal' ) ) . '" class="regular-text"><p class="description">Letter spacing</p>';
}
function swg_auth_general_opacity_html( $args ) {
  echo '<input type="number" name="swg-auth-general-opacity" value="' . esc_attr( get_option( 'swg-auth-general-opacity', '1' ) ) . '" min="0" max="1" step="0.1" class="small-text"><p class="description">Opacity</p>';
}
function swg_auth_general_custom_css_html( $args ) {
  $custom_css = get_option( 'swg-auth-general-custom-css', '.swg-auth-page { padding: 20px 0; max-width: 1200px; margin: 0 auto; }' );
  echo '<textarea name="swg-auth-general-custom-css" rows="10" cols="50" class="large-text code">' . esc_textarea( $custom_css ) . '</textarea><p class="description">Add custom CSS for general pages. Do not include &lt;style&gt; tags.</p>';
}

// Resources Page
function swg_auth_css_resources_settings_html( $args ) {
  echo '<p>Customize CSS for the Resources page.</p>';
}
function swg_auth_resources_primary_color_html( $args ) {
  echo '<input type="color" name="swg-auth-resources-primary-color" value="' . esc_attr( get_option( 'swg-auth-resources-primary-color', '#2271b1' ) ) . '"><p class="description">Primary accent color</p>';
}
function swg_auth_resources_background_color_html( $args ) {
  echo '<input type="color" name="swg-auth-resources-background-color" value="' . esc_attr( get_option( 'swg-auth-resources-background-color', '#ffffff' ) ) . '"><p class="description">Background color</p>';
}
function swg_auth_resources_text_color_html( $args ) {
  echo '<input type="color" name="swg-auth-resources-text-color" value="' . esc_attr( get_option( 'swg-auth-resources-text-color', '#23282d' ) ) . '"><p class="description">Text color</p>';
}
function swg_auth_resources_border_color_html( $args ) {
  echo '<input type="color" name="swg-auth-resources-border-color" value="' . esc_attr( get_option( 'swg-auth-resources-border-color', '#dddddd' ) ) . '"><p class="description">Border color</p>';
}
function swg_auth_resources_font_family_html( $args ) {
  echo '<input type="text" name="swg-auth-resources-font-family" value="' . esc_attr( get_option( 'swg-auth-resources-font-family', 'inherit' ) ) . '" class="regular-text"><p class="description">Font family</p>';
}
function swg_auth_resources_padding_html( $args ) {
  echo '<input type="text" name="swg-auth-resources-padding" value="' . esc_attr( get_option( 'swg-auth-resources-padding', '20px' ) ) . '" class="regular-text"><p class="description">Padding</p>';
}
function swg_auth_resources_border_size_html( $args ) {
  echo '<input type="text" name="swg-auth-resources-border-size" value="' . esc_attr( get_option( 'swg-auth-resources-border-size', '1px' ) ) . '" class="regular-text"><p class="description">Border size</p>';
}
function swg_auth_resources_border_radius_html( $args ) {
  echo '<input type="text" name="swg-auth-resources-border-radius" value="' . esc_attr( get_option( 'swg-auth-resources-border-radius', '8px' ) ) . '" class="regular-text"><p class="description">Border radius</p>';
}
function swg_auth_resources_box_shadow_html( $args ) {
  echo '<input type="text" name="swg-auth-resources-box-shadow" value="' . esc_attr( get_option( 'swg-auth-resources-box-shadow', '0 2px 4px rgba(0,0,0,0.1)' ) ) . '" class="large-text"><p class="description">Box shadow</p>';
}
function swg_auth_resources_margin_html( $args ) {
  echo '<input type="text" name="swg-auth-resources-margin" value="' . esc_attr( get_option( 'swg-auth-resources-margin', '0' ) ) . '" class="regular-text"><p class="description">Margin</p>';
}
function swg_auth_resources_font_size_html( $args ) {
  echo '<input type="text" name="swg-auth-resources-font-size" value="' . esc_attr( get_option( 'swg-auth-resources-font-size', '14px' ) ) . '" class="regular-text"><p class="description">Font size</p>';
}
function swg_auth_resources_font_weight_html( $args ) {
  echo '<select name="swg-auth-resources-font-weight"><option value="normal">Normal</option><option value="bold">Bold</option><option value="100">100</option><option value="200">200</option><option value="300">300</option><option value="400">400</option><option value="500">500</option><option value="600">600</option><option value="700">700</option><option value="800">800</option><option value="900">900</option></select>';
}
function swg_auth_resources_line_height_html( $args ) {
  echo '<input type="text" name="swg-auth-resources-line-height" value="' . esc_attr( get_option( 'swg-auth-resources-line-height', '1.5' ) ) . '" class="regular-text"><p class="description">Line height</p>';
}
function swg_auth_resources_letter_spacing_html( $args ) {
  echo '<input type="text" name="swg-auth-resources-letter-spacing" value="' . esc_attr( get_option( 'swg-auth-resources-letter-spacing', 'normal' ) ) . '" class="regular-text"><p class="description">Letter spacing</p>';
}
function swg_auth_resources_opacity_html( $args ) {
  echo '<input type="number" name="swg-auth-resources-opacity" value="' . esc_attr( get_option( 'swg-auth-resources-opacity', '1' ) ) . '" min="0" max="1" step="0.1" class="small-text"><p class="description">Opacity</p>';
}
function swg_auth_resources_custom_css_html( $args ) {
  $custom_css = get_option( 'swg-auth-resources-custom-css', 'table.swg-auth-resource-page { margin: 0; padding: 0; border: 0; width: 100%; }' );
  echo '<textarea name="swg-auth-resources-custom-css" rows="10" cols="50" class="large-text code">' . esc_textarea( $custom_css ) . '</textarea><p class="description">Add custom CSS for resources page. Do not include &lt;style&gt; tags.</p>';
}

// Metrics Widget
function swg_auth_css_widget_settings_html( $args ) {
  echo '<p>Customize CSS for the Metrics Widget.</p>';
}
function swg_auth_widget_primary_color_html( $args ) {
  echo '<input type="color" name="swg-auth-widget-primary-color" value="' . esc_attr( get_option( 'swg-auth-widget-primary-color', '#2271b1' ) ) . '"><p class="description">Primary accent color</p>';
}
function swg_auth_widget_background_color_html( $args ) {
  echo '<input type="color" name="swg-auth-widget-background-color" value="' . esc_attr( get_option( 'swg-auth-widget-background-color', '#ffffff' ) ) . '"><p class="description">Background color</p>';
}
function swg_auth_widget_text_color_html( $args ) {
  echo '<input type="color" name="swg-auth-widget-text-color" value="' . esc_attr( get_option( 'swg-auth-widget-text-color', '#23282d' ) ) . '"><p class="description">Text color</p>';
}
function swg_auth_widget_border_color_html( $args ) {
  echo '<input type="color" name="swg-auth-widget-border-color" value="' . esc_attr( get_option( 'swg-auth-widget-border-color', '#dddddd' ) ) . '"><p class="description">Border color</p>';
}
function swg_auth_widget_font_family_html( $args ) {
  echo '<input type="text" name="swg-auth-widget-font-family" value="' . esc_attr( get_option( 'swg-auth-widget-font-family', 'inherit' ) ) . '" class="regular-text"><p class="description">Font family</p>';
}
function swg_auth_widget_padding_html( $args ) {
  echo '<input type="text" name="swg-auth-widget-padding" value="' . esc_attr( get_option( 'swg-auth-widget-padding', '20px' ) ) . '" class="regular-text"><p class="description">Padding</p>';
}
function swg_auth_widget_border_size_html( $args ) {
  echo '<input type="text" name="swg-auth-widget-border-size" value="' . esc_attr( get_option( 'swg-auth-widget-border-size', '1px' ) ) . '" class="regular-text"><p class="description">Border size</p>';
}
function swg_auth_widget_border_radius_html( $args ) {
  echo '<input type="text" name="swg-auth-widget-border-radius" value="' . esc_attr( get_option( 'swg-auth-widget-border-radius', '8px' ) ) . '" class="regular-text"><p class="description">Border radius</p>';
}
function swg_auth_widget_box_shadow_html( $args ) {
  echo '<input type="text" name="swg-auth-widget-box-shadow" value="' . esc_attr( get_option( 'swg-auth-widget-box-shadow', '0 2px 4px rgba(0,0,0,0.1)' ) ) . '" class="large-text"><p class="description">Box shadow</p>';
}
function swg_auth_widget_margin_html( $args ) {
  echo '<input type="text" name="swg-auth-widget-margin" value="' . esc_attr( get_option( 'swg-auth-widget-margin', '0' ) ) . '" class="regular-text"><p class="description">Margin</p>';
}
function swg_auth_widget_font_size_html( $args ) {
  echo '<input type="text" name="swg-auth-widget-font-size" value="' . esc_attr( get_option( 'swg-auth-widget-font-size', '14px' ) ) . '" class="regular-text"><p class="description">Font size</p>';
}
function swg_auth_widget_font_weight_html( $args ) {
  echo '<select name="swg-auth-widget-font-weight"><option value="normal">Normal</option><option value="bold">Bold</option><option value="100">100</option><option value="200">200</option><option value="300">300</option><option value="400">400</option><option value="500">500</option><option value="600">600</option><option value="700">700</option><option value="800">800</option><option value="900">900</option></select>';
}
function swg_auth_widget_line_height_html( $args ) {
  echo '<input type="text" name="swg-auth-widget-line-height" value="' . esc_attr( get_option( 'swg-auth-widget-line-height', '1.5' ) ) . '" class="regular-text"><p class="description">Line height</p>';
}
function swg_auth_widget_letter_spacing_html( $args ) {
  echo '<input type="text" name="swg-auth-widget-letter-spacing" value="' . esc_attr( get_option( 'swg-auth-widget-letter-spacing', 'normal' ) ) . '" class="regular-text"><p class="description">Letter spacing</p>';
}
function swg_auth_widget_opacity_html( $args ) {
  echo '<input type="number" name="swg-auth-widget-opacity" value="' . esc_attr( get_option( 'swg-auth-widget-opacity', '1' ) ) . '" min="0" max="1" step="0.1" class="small-text"><p class="description">Opacity</p>';
}
function swg_auth_widget_custom_css_html( $args ) {
  $custom_css = get_option( 'swg-auth-widget-custom-css', '.widget_swg-auth-metrics { background: #fff; border: 1px solid #ddd; border-radius: 8px; padding: 20px; }' );
  echo '<textarea name="swg-auth-widget-custom-css" rows="10" cols="50" class="large-text code">' . esc_textarea( $custom_css ) . '</textarea><p class="description">Add custom CSS for metrics widget. Do not include &lt;style&gt; tags.</p>';
}

add_action( 'admin_enqueue_scripts', 'swg_auth_enqueue_admin_scripts' );
function swg_auth_enqueue_admin_scripts( $hook ) {
  wp_enqueue_script( 'swg-auth-generate-secret-key', plugin_dir_url( __FILE__ ) . 'js/swg-auth-generate-secret-key.js' );
  
  // Only load on settings page
  if ( $hook === 'toplevel_page_swg-auth-settings' ) {
    wp_enqueue_script( 'swg-auth-settings-toggle', plugin_dir_url( __FILE__ ) . 'js/swg-auth-settings-toggle.js', array('jquery'), '1.0', true );
  }
}
