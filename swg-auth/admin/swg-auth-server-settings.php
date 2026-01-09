<?php
/**
 * SWG Auth Server Settings Configuration
 *
 * @package SWG_Auth
 * @since 1.0.0
 */

// No Direct Access.
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

add_action( 'admin_init', 'swg_auth_server_settings' );
/**
 * Register all server settings
 *
 * @since 1.0.0
 */
function swg_auth_server_settings() {

	add_settings_section(
		'swg-auth-server-settings',
		'General',
		'swg_auth_server_settings_section_html',
		'swg-auth-general-server-settings'
	);

	register_setting(
		'swg-auth-general-server-settings',
		'swg-auth-cluster-name',
		array(
			'type'              => 'string',
			'description'       => 'Cluster Name',
			'sanitize_callback' => 'sanitize_text_field',
			'show_in_rest'      => false,
			'default'           => 'swg',
		)
	);

  add_settings_field(
    'swg-auth-cluster-name',
    'Cluster Name',
    'swg_auth_cluster_name_html',
    'swg-auth-general-server-settings',
    'swg-auth-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

	register_setting(
		'swg-auth-general-server-settings',
		'swg-auth-server-ip',
		array(
			'type'              => 'string',
			'description'       => 'Server IP Address',
			'sanitize_callback' => 'sanitize_text_field',
			'show_in_rest'      => false,
			'default'           => '192.168.0.0',
		)
	);

  add_settings_field(
    'swg-auth-server-ip',
    'Server IP',
    'swg_auth_server_ip_html',
    'swg-auth-general-server-settings',
    'swg-auth-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

	register_setting(
		'swg-auth-general-server-settings',
		'swg-auth-webUpdateIntervalSeconds',
		array(
			'type'              => 'integer',
			'description'       => 'Web update interval in seconds',
			'sanitize_callback' => 'absint',
			'show_in_rest'      => false,
			'default'           => 10,
		)
	);

  add_settings_field(
    'swg-auth-webUpdateIntervalSeconds',
    'Metrics Update Interval',
    'swg_auth_webUpdateIntervalSeconds_html',
    'swg-auth-general-server-settings',
    'swg-auth-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

	register_setting(
		'swg-auth-general-server-settings',
		'swg-auth-easyExternalAccess',
		array(
			'type'              => 'boolean',
			'description'       => 'Enable easy external access',
			'sanitize_callback' => 'swg_auth_sanitize_checkbox',
			'show_in_rest'      => false,
			'default'           => '',
		)
	);

  add_settings_field(
    'swg-auth-easyExternalAccess',
    'Easy External Access',
    'swg_auth_easyExternalAccess_html',
    'swg-auth-general-server-settings',
    'swg-auth-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

	register_setting(
		'swg-auth-general-server-settings',
		'swg-auth-useExternalAuth',
		array(
			'type'              => 'boolean',
			'description'       => 'Use external authentication',
			'sanitize_callback' => 'swg_auth_sanitize_checkbox',
			'show_in_rest'      => false,
			'default'           => 'on',
		)
	);

  add_settings_field(
    'swg-auth-useExternalAuth',
    'External Auth',
    'swg_auth_useExternalAuth_html',
    'swg-auth-general-server-settings',
    'swg-auth-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

	register_setting(
		'swg-auth-general-server-settings',
		'swg-auth-externalAdminLevelsEnabled',
		array(
			'type'              => 'boolean',
			'description'       => 'Enable external admin levels',
			'sanitize_callback' => 'swg_auth_sanitize_checkbox',
			'show_in_rest'      => false,
			'default'           => 'on',
		)
	);

  add_settings_field(
    'swg-auth-externalAdminLevelsEnabled',
    'External Admin Levels',
    'swg_auth_externalAdminLevelsEnabled_html',
    'swg-auth-general-server-settings',
    'swg-auth-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

	register_setting(
		'swg-auth-general-server-settings',
		'swg-auth-reverseEngineeringBonusMultiplier',
		array(
			'type'              => 'number',
			'description'       => 'Reverse engineering bonus multiplier',
			'sanitize_callback' => 'floatval',
			'show_in_rest'      => false,
			'default'           => 1.0,
		)
	);

  add_settings_field(
    'swg-auth-reverseEngineeringBonusMultiplier',
    'RE Bonus Multiplier',
    'swg_auth_reverseEngineeringBonusMultiplier_html',
    'swg-auth-general-server-settings',
    'swg-auth-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

	register_setting(
		'swg-auth-general-server-settings',
		'swg-auth-chroniclesXpModifier',
		array(
			'type'              => 'number',
			'description'       => 'Chronicles experience modifier',
			'sanitize_callback' => 'floatval',
			'show_in_rest'      => false,
			'default'           => 1.0,
		)
	);

  add_settings_field(
    'swg-auth-chroniclesXpModifier',
    'Chronicles XP Modifier',
    'swg_auth_chroniclesXpModifier_html',
    'swg-auth-general-server-settings',
    'swg-auth-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-general-server-settings',
    'swg-auth-gcwPointBonus',
    array(
      'type' => 'number',
      'description' => 'gcwPointBonus',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '5.0'
    )
  );

  add_settings_field(
    'swg-auth-gcwPointBonus',
    'GCW Point Bonus',
    'swg_auth_gcwPointBonus_html',
    'swg-auth-general-server-settings',
    'swg-auth-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-general-server-settings',
    'swg-auth-gcwTokenBonus',
    array(
      'type' => 'number',
      'description' => 'gcwTokenBonus',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '5.0'
    )
  );

  add_settings_field(
    'swg-auth-gcwTokenBonus',
    'GCW Token Bonus',
    'swg_auth_gcwTokenBonus_html',
    'swg-auth-general-server-settings',
    'swg-auth-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-general-server-settings',
    'swg-auth-harvesterExtractionRateMultiplier',
    array(
      'type' => 'number',
      'description' => 'harvesterExtractionRateMultiplier',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '5.0'
    )
  );

  add_settings_field(
    'swg-auth-harvesterExtractionRateMultiplier',
    'Harvester Extraction Rate Multiplier',
    'swg_auth_harvesterExtractionRateMultiplier_html',
    'swg-auth-general-server-settings',
    'swg-auth-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-general-server-settings',
    'swg-auth-xpMultiplier',
    array(
      'type' => 'number',
      'description' => 'xpMultiplier',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '3'
    )
  );

  add_settings_field(
    'swg-auth-xpMultiplier',
    'XP Multiplier',
    'swg_auth_xpMultiplier_html',
    'swg-auth-general-server-settings',
    'swg-auth-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  add_settings_section(
    'swg-auth-vendor-timer-settings',
    'Vendor Timers',
    'swg_auth_vendor_timer_html',
    'swg-auth-general-server-settings'
  );

  register_setting(
    'swg-auth-general-server-settings',
    'swg-auth-minutesActiveToUnaccessed',
    array(
      'type' => 'integer',
      'description' => 'minutesActiveToUnaccessed',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '43200'
    )
  );

  add_settings_field(
    'minutesActiveToUnaccessed',
    'Active -> Unaccessed',
    'swg_auth_minutesActiveToUnaccessed_html',
    'swg-auth-general-server-settings',
    'swg-auth-vendor-timer-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-general-server-settings',
    'swg-auth-minutesUnaccessedToEndangered',
    array(
      'type' => 'integer',
      'description' => 'minutesUnaccessedToEndangered',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '7200'
    )
  );

  add_settings_field(
    'minutesUnaccessedToEndangered',
    'Unaccessed -> Endangered',
    'swg_auth_minutesUnaccessedToEndangered_html',
    'swg-auth-general-server-settings',
    'swg-auth-vendor-timer-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-general-server-settings',
    'swg-auth-minutesEmptyToEndangered',
    array(
      'type' => 'integer',
      'description' => 'minutesEmptyToEndangered',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '21600'
    )
  );

  add_settings_field(
    'minutesEmptyToEndangered',
    'Empty -> Endangered',
    'swg_auth_minutesEmptyToEndangered_html',
    'swg-auth-general-server-settings',
    'swg-auth-vendor-timer-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-general-server-settings',
    'swg-auth-minutesEndangeredToRemoved',
    array(
      'type' => 'integer',
      'description' => 'minutesEndangeredToRemoved',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '21600'
    )
  );

  add_settings_field(
    'minutesEndangeredToRemoved',
    'Endangered -> Removed',
    'swg_auth_minutesEndangeredToRemoved_html',
    'swg-auth-general-server-settings',
    'swg-auth-vendor-timer-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-general-server-settings',
    'swg-auth-minutesVendorAuctionTimer',
    array(
      'type' => 'integer',
      'description' => 'minutesVendorAuctionTimer',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '43200'
    )
  );

  add_settings_field(
    'minutesVendorAuctionTimer',
    'Auction Timer',
    'swg_auth_minutesVendorAuctionTimer_html',
    'swg-auth-general-server-settings',
    'swg-auth-vendor-timer-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-general-server-settings',
    'swg-auth-minutesVendorItemTimer',
    array(
      'type' => 'integer',
      'description' => 'minutesVendorItemTimer',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '43200'
    )
  );

  add_settings_field(
    'minutesVendorItemTimer',
    'Item Timer',
    'swg_auth_minutesVendorItemTimer_html',
    'swg-auth-general-server-settings',
    'swg-auth-vendor-timer-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  add_settings_section(
    'swg-auth-character-builder-settings',
    'Character Builder',
    'swg_auth_character_builder_html',
    'swg-auth-general-server-settings'
  );

  register_setting(
    'swg-auth-general-server-settings',
    'swg-auth-armorEnabled',
    array(
      'type' => 'boolean',
      'description' => 'armorEnabled',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => 'on'
    )
  );

  add_settings_field(
    'swg-auth-armorEnabled',
    'Armor',
    'swg_auth_armorEnabled_html',
    'swg-auth-general-server-settings',
    'swg-auth-character-builder-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-general-server-settings',
    'swg-auth-BestResourcesEnabled',
    array(
      'type' => 'boolean',
      'description' => 'BestResourcesEnabled',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => 'on'
    )
  );

  add_settings_field(
    'swg-auth-BestResourcesEnabled',
    'Best Resources',
    'swg_auth_BestResourcesEnabled_html',
    'swg-auth-general-server-settings',
    'swg-auth-character-builder-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-general-server-settings',
    'swg-auth-buffsEnabled',
    array(
      'type' => 'boolean',
      'description' => 'buffsEnabled',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => 'on'
    )
  );

  add_settings_field(
    'swg-auth-buffsEnabled',
    'Buffs',
    'swg_auth_buffsEnabled_html',
    'swg-auth-general-server-settings',
    'swg-auth-character-builder-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-general-server-settings',
    'swg-auth-builderEnabled',
    array(
      'type' => 'boolean',
      'description' => 'builderEnabled',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => 'on'
    )
  );

  add_settings_field(
    'swg-auth-builderEnabled',
    'Builder',
    'swg_auth_builderEnabled_html',
    'swg-auth-general-server-settings',
    'swg-auth-character-builder-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-general-server-settings',
    'swg-auth-commandsEnabled',
    array(
      'type' => 'boolean',
      'description' => 'commandsEnabled',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => 'on'
    )
  );

  add_settings_field(
    'swg-auth-commandsEnabled',
    'Commands',
    'swg_auth_commandsEnabled_html',
    'swg-auth-general-server-settings',
    'swg-auth-character-builder-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-general-server-settings',
    'swg-auth-craftingEnabled',
    array(
      'type' => 'boolean',
      'description' => 'craftingEnabled',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => 'on'
    )
  );

  add_settings_field(
    'swg-auth-craftingEnabled',
    'Crafting',
    'swg_auth_craftingEnabled_html',
    'swg-auth-general-server-settings',
    'swg-auth-character-builder-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-general-server-settings',
    'swg-auth-creditsEnabled',
    array(
      'type' => 'boolean',
      'description' => 'creditsEnabled',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => 'on'
    )
  );

  add_settings_field(
    'swg-auth-creditsEnabled',
    'Credits',
    'swg_auth_creditsEnabled_html',
    'swg-auth-general-server-settings',
    'swg-auth-character-builder-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-general-server-settings',
    'swg-auth-deedsEnabled',
    array(
      'type' => 'boolean',
      'description' => 'deedsEnabled',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => 'on'
    )
  );

  add_settings_field(
    'swg-auth-deedsEnabled',
    'Deeds',
    'swg_auth_deedsEnabled_html',
    'swg-auth-general-server-settings',
    'swg-auth-character-builder-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-general-server-settings',
    'swg-auth-devEnabled',
    array(
      'type' => 'boolean',
      'description' => 'devEnabled',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => 'on'
    )
  );

  add_settings_field(
    'swg-auth-devEnabled',
    'Dev',
    'swg_auth_devEnabled_html',
    'swg-auth-general-server-settings',
    'swg-auth-character-builder-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-general-server-settings',
    'swg-auth-DraftSchematicsEnabled',
    array(
      'type' => 'boolean',
      'description' => 'DraftSchematicsEnabled',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => 'on'
    )
  );

  add_settings_field(
    'swg-auth-DraftSchematicsEnabled',
    'Draft Schematics',
    'swg_auth_DraftSchematicsEnabled_html',
    'swg-auth-general-server-settings',
    'swg-auth-character-builder-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-general-server-settings',
    'swg-auth-factionEnabled',
    array(
      'type' => 'boolean',
      'description' => 'factionEnabled',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => 'on'
    )
  );

  add_settings_field(
    'swg-auth-factionEnabled',
    'Faction',
    'swg_auth_factionEnabled_html',
    'swg-auth-general-server-settings',
    'swg-auth-character-builder-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-general-server-settings',
    'swg-auth-HeroicFlagEnabled',
    array(
      'type' => 'boolean',
      'description' => 'HeroicFlagEnabled',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => 'on'
    )
  );

  add_settings_field(
    'swg-auth-HeroicFlagEnabled',
    'Heroic Flag',
    'swg_auth_HeroicFlagEnabled_html',
    'swg-auth-general-server-settings',
    'swg-auth-character-builder-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-general-server-settings',
    'swg-auth-jediEnabled',
    array(
      'type' => 'boolean',
      'description' => 'jediEnabled',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => 'on'
    )
  );

  add_settings_field(
    'swg-auth-jediEnabled',
    'Jedi',
    'swg_auth_jediEnabled_html',
    'swg-auth-general-server-settings',
    'swg-auth-character-builder-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-general-server-settings',
    'swg-auth-miscitemEnabled',
    array(
      'type' => 'boolean',
      'description' => 'miscitemEnabled',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => 'on'
    )
  );

  add_settings_field(
    'swg-auth-miscitemEnabled',
    'Misc Item',
    'swg_auth_miscitemEnabled_html',
    'swg-auth-general-server-settings',
    'swg-auth-character-builder-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-general-server-settings',
    'swg-auth-pahallEnabled',
    array(
      'type' => 'boolean',
      'description' => 'pahallEnabled',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => 'on'
    )
  );

  add_settings_field(
    'swg-auth-pahallEnabled',
    'PA Hall',
    'swg_auth_pahallEnabled_html',
    'swg-auth-general-server-settings',
    'swg-auth-character-builder-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-general-server-settings',
    'swg-auth-petsEnabled',
    array(
      'type' => 'boolean',
      'description' => 'petsEnabled',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => 'on'
    )
  );

  add_settings_field(
    'swg-auth-petsEnabled',
    'Pets',
    'swg_auth_petsEnabled_html',
    'swg-auth-general-server-settings',
    'swg-auth-character-builder-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-general-server-settings',
    'swg-auth-questEnabled',
    array(
      'type' => 'boolean',
      'description' => 'questEnabled',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => 'on'
    )
  );

  add_settings_field(
    'swg-auth-questEnabled',
    'Quest',
    'swg_auth_questEnabled_html',
    'swg-auth-general-server-settings',
    'swg-auth-character-builder-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-general-server-settings',
    'swg-auth-resourcesEnabled',
    array(
      'type' => 'boolean',
      'description' => 'resourcesEnabled',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => 'on'
    )
  );

  add_settings_field(
    'swg-auth-resourcesEnabled',
    'Resources',
    'swg_auth_resourcesEnabled_html',
    'swg-auth-general-server-settings',
    'swg-auth-character-builder-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-general-server-settings',
    'swg-auth-shipsEnabled',
    array(
      'type' => 'boolean',
      'description' => 'shipsEnabled',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => 'on'
    )
  );

  add_settings_field(
    'swg-auth-shipsEnabled',
    'Ships',
    'swg_auth_shipsEnabled_html',
    'swg-auth-general-server-settings',
    'swg-auth-character-builder-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-general-server-settings',
    'swg-auth-skillsEnabled',
    array(
      'type' => 'boolean',
      'description' => 'skillsEnabled',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => 'on'
    )
  );

  add_settings_field(
    'swg-auth-skillsEnabled',
    'Skills',
    'swg_auth_skillsEnabled_html',
    'swg-auth-general-server-settings',
    'swg-auth-character-builder-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-general-server-settings',
    'swg-auth-vehiclesEnabled',
    array(
      'type' => 'boolean',
      'description' => 'vehiclesEnabled',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => 'on'
    )
  );

  add_settings_field(
    'swg-auth-vehiclesEnabled',
    'Vehicles',
    'swg_auth_vehiclesEnabled_html',
    'swg-auth-general-server-settings',
    'swg-auth-character-builder-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-general-server-settings',
    'swg-auth-warpsEnabled',
    array(
      'type' => 'boolean',
      'description' => 'warpsEnabled',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => 'on'
    )
  );

  add_settings_field(
    'swg-auth-warpsEnabled',
    'Warps',
    'swg_auth_warpsEnabled_html',
    'swg-auth-general-server-settings',
    'swg-auth-character-builder-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-general-server-settings',
    'swg-auth-weaponsEnabled',
    array(
      'type' => 'boolean',
      'description' => 'weaponsEnabled',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => 'on'
    )
  );

  add_settings_field(
    'swg-auth-weaponsEnabled',
    'Weapons',
    'swg_auth_weaponsEnabled_html',
    'swg-auth-general-server-settings',
    'swg-auth-character-builder-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  add_settings_section(
    'swg-auth-zones-settings',
    'Zones',
    'swg_auth_zones_settings_html',
    'swg-auth-zones-settings'
  );

  register_setting(
    'swg-auth-zones-settings',
    'swg-auth-enable-corellia',
    array(
      'type' => 'boolean',
      'description' => 'Enable Corellia',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => 'on'
    )
  );

  add_settings_field(
    'swg-auth-enable-corellia',
    'Corellia',
    'swg_auth_enable_corellia_html',
    'swg-auth-zones-settings',
    'swg-auth-zones-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-zones-settings',
    'swg-auth-enable-dantooine',
    array(
      'type' => 'boolean',
      'description' => 'Enable Dantooine',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => 'on'
    )
  );

  add_settings_field(
    'swg-auth-enable-dantooine',
    'Dantooine',
    'swg_auth_enable_dantooine_html',
    'swg-auth-zones-settings',
    'swg-auth-zones-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-zones-settings',
    'swg-auth-enable-dathomir',
    array(
      'type' => 'boolean',
      'description' => 'Enable Dathomir',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => 'on'
    )
  );

  add_settings_field(
    'swg-auth-enable-dathomir',
    'Dathomir',
    'swg_auth_enable_dathomir_html',
    'swg-auth-zones-settings',
    'swg-auth-zones-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-zones-settings',
    'swg-auth-enable-endor',
    array(
      'type' => 'boolean',
      'description' => 'Enable Endor',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => 'on'
    )
  );

  add_settings_field(
    'swg-auth-enable-endor',
    'Endor',
    'swg_auth_enable_endor_html',
    'swg-auth-zones-settings',
    'swg-auth-zones-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-zones-settings',
    'swg-auth-enable-lok',
    array(
      'type' => 'boolean',
      'description' => 'Enable Lok',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => 'on'
    )
  );

  add_settings_field(
    'swg-auth-enable-lok',
    'Lok',
    'swg_auth_enable_lok_html',
    'swg-auth-zones-settings',
    'swg-auth-zones-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-zones-settings',
    'swg-auth-enable-kashyyyk-dead-forest',
    array(
      'type' => 'boolean',
      'description' => 'Enable Kashyyyk Dead Forest',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => 'on'
    )
  );

  add_settings_field(
    'swg-auth-enable-kashyyyk-dead-forest',
    'Kashyyyk Dead Forest',
    'swg_auth_enable_kashyyyk_dead_forest_html',
    'swg-auth-zones-settings',
    'swg-auth-zones-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-zones-settings',
    'swg-auth-enable-kashyyyk-hunting',
    array(
      'type' => 'boolean',
      'description' => 'Enable Kashyyyk Hunting',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => 'on'
    )
  );

  add_settings_field(
    'swg-auth-enable-kashyyyk-hunting',
    'Kashyyyk Hunting',
    'swg_auth_enable_kashyyyk_hunting_html',
    'swg-auth-zones-settings',
    'swg-auth-zones-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-zones-settings',
    'swg-auth-enable-kashyyyk-main',
    array(
      'type' => 'boolean',
      'description' => 'Enable Kashyyyk Main',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => 'on'
    )
  );

  add_settings_field(
    'swg-auth-enable-kashyyyk-main',
    'Kashyyyk Main',
    'swg_auth_enable_kashyyyk_main_html',
    'swg-auth-zones-settings',
    'swg-auth-zones-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-zones-settings',
    'swg-auth-enable-kashyyyk-north-dungeons',
    array(
      'type' => 'boolean',
      'description' => 'Enable Kashyyyk North Dungeons',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => 'on'
    )
  );

  add_settings_field(
    'swg-auth-enable-kashyyyk-north-dungeons',
    'Kashyyyk North Dungeons',
    'swg_auth_enable_kashyyyk_north_dungeons_html',
    'swg-auth-zones-settings',
    'swg-auth-zones-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-zones-settings',
    'swg-auth-enable-kashyyyk-pob-dungeons',
    array(
      'type' => 'boolean',
      'description' => 'Enable Kashyyyk POB Dungeons',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => 'on'
    )
  );

  add_settings_field(
    'swg-auth-enable-kashyyyk-pob-dungeons',
    'Kashyyyk POB Dungeons',
    'swg_auth_enable_kashyyyk_pob_dungeons_html',
    'swg-auth-zones-settings',
    'swg-auth-zones-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-zones-settings',
    'swg-auth-enable-kashyyyk-rryatt-trail',
    array(
      'type' => 'boolean',
      'description' => 'Enable Kashyyyk Rryatt Trail',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => 'on'
    )
  );

  add_settings_field(
    'swg-auth-enable-kashyyyk-rryatt-trail',
    'Kashyyyk Rryatt Trail',
    'swg_auth_enable_kashyyyk_rryatt_trail_html',
    'swg-auth-zones-settings',
    'swg-auth-zones-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-zones-settings',
    'swg-auth-enable-kashyyyk-south-dungeons',
    array(
      'type' => 'boolean',
      'description' => 'Enable Kashyyyk South Dungeons',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => 'on'
    )
  );

  add_settings_field(
    'swg-auth-enable-kashyyyk-south-dungeons',
    'Kashyyyk South Dungeons',
    'swg_auth_enable_kashyyyk_south_dungeons_html',
    'swg-auth-zones-settings',
    'swg-auth-zones-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-zones-settings',
    'swg-auth-enable-mustafar',
    array(
      'type' => 'boolean',
      'description' => 'Enable Mustafar',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => 'on'
    )
  );

  add_settings_field(
    'swg-auth-enable-mustafar',
    'Mustafar',
    'swg_auth_enable_mustafar_html',
    'swg-auth-zones-settings',
    'swg-auth-zones-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-zones-settings',
    'swg-auth-enable-naboo',
    array(
      'type' => 'boolean',
      'description' => 'Enable Naboo',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => 'on'
    )
  );

  add_settings_field(
    'swg-auth-enable-naboo',
    'Naboo',
    'swg_auth_enable_naboo_html',
    'swg-auth-zones-settings',
    'swg-auth-zones-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-zones-settings',
    'swg-auth-enable-rori',
    array(
      'type' => 'boolean',
      'description' => 'Enable Rori',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => 'on'
    )
  );

  add_settings_field(
    'swg-auth-enable-rori',
    'Rori',
    'swg_auth_enable_rori_html',
    'swg-auth-zones-settings',
    'swg-auth-zones-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-zones-settings',
    'swg-auth-enable-talus',
    array(
      'type' => 'boolean',
      'description' => 'Enable Talus',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => 'on'
    )
  );

  add_settings_field(
    'swg-auth-enable-talus',
    'Talus',
    'swg_auth_enable_talus_html',
    'swg-auth-zones-settings',
    'swg-auth-zones-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-zones-settings',
    'swg-auth-enable-tatooine',
    array(
      'type' => 'boolean',
      'description' => 'Enable Tatooine',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => 'on'
    )
  );

  add_settings_field(
    'swg-auth-enable-tatooine',
    'Tatooine',
    'swg_auth_enable_tatooine_html',
    'swg-auth-zones-settings',
    'swg-auth-zones-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-zones-settings',
    'swg-auth-enable-yavin4',
    array(
      'type' => 'boolean',
      'description' => 'Enable Yavin IV',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => 'on'
    )
  );

  add_settings_field(
    'swg-auth-enable-yavin4',
    'Yavin IV',
    'swg_auth_enable_yavin4_html',
    'swg-auth-zones-settings',
    'swg-auth-zones-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-zones-settings',
    'swg-auth-enable-space-corellia',
    array(
      'type' => 'boolean',
      'description' => 'Enable Space Corellia',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => 'on'
    )
  );

  add_settings_field(
    'swg-auth-enable-space-corellia',
    'Space Corellia',
    'swg_auth_enable_space_corellia_html',
    'swg-auth-zones-settings',
    'swg-auth-zones-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-zones-settings',
    'swg-auth-enable-space-dantooine',
    array(
      'type' => 'boolean',
      'description' => 'Enable Space Dantooine',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => 'on'
    )
  );

  add_settings_field(
    'swg-auth-enable-space-dantooine',
    'Space Dantooine',
    'swg_auth_enable_space_dantooine_html',
    'swg-auth-zones-settings',
    'swg-auth-zones-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-zones-settings',
    'swg-auth-enable-space-dathomir',
    array(
      'type' => 'boolean',
      'description' => 'Enable Space Dathomir',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => 'on'
    )
  );

  add_settings_field(
    'swg-auth-enable-space-dathomir',
    'Space Dathomir',
    'swg_auth_enable_space_dathomir_html',
    'swg-auth-zones-settings',
    'swg-auth-zones-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-zones-settings',
    'swg-auth-enable-space-endor',
    array(
      'type' => 'boolean',
      'description' => 'Enable Space Endor',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => 'on'
    )
  );

  add_settings_field(
    'swg-auth-enable-space-endor',
    'Space Endor',
    'swg_auth_enable_space_endor_html',
    'swg-auth-zones-settings',
    'swg-auth-zones-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-zones-settings',
    'swg-auth-enable-space-lok',
    array(
      'type' => 'boolean',
      'description' => 'Enable Space Lok',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => 'on'
    )
  );

  add_settings_field(
    'swg-auth-enable-space-lok',
    'Space Lok',
    'swg_auth_enable_space_lok_html',
    'swg-auth-zones-settings',
    'swg-auth-zones-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-zones-settings',
    'swg-auth-enable-space-kashyyyk',
    array(
      'type' => 'boolean',
      'description' => 'Enable Space Kashyyyk',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => 'on'
    )
  );

  add_settings_field(
    'swg-auth-enable-space-kashyyyk',
    'Space Kashyyyk',
    'swg_auth_enable_space_kashyyyk_html',
    'swg-auth-zones-settings',
    'swg-auth-zones-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-zones-settings',
    'swg-auth-enable-space-naboo',
    array(
      'type' => 'boolean',
      'description' => 'Enable Space Naboo',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => 'on'
    )
  );

  add_settings_field(
    'swg-auth-enable-space-naboo',
    'Space Naboo',
    'swg_auth_enable_space_naboo_html',
    'swg-auth-zones-settings',
    'swg-auth-zones-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-zones-settings',
    'swg-auth-enable-space-nova-orion',
    array(
      'type' => 'boolean',
      'description' => 'Enable Space Nova Orion',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => 'on'
    )
  );

  add_settings_field(
    'swg-auth-enable-space-nova-orion',
    'Space Nova Orion',
    'swg_auth_enable_space_nova_orion_html',
    'swg-auth-zones-settings',
    'swg-auth-zones-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-zones-settings',
    'swg-auth-enable-space-tatooine',
    array(
      'type' => 'boolean',
      'description' => 'Enable Space Tatooine',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => 'on'
    )
  );

  add_settings_field(
    'swg-auth-enable-space-tatooine',
    'Space Tatooine',
    'swg_auth_enable_space_tatooine_html',
    'swg-auth-zones-settings',
    'swg-auth-zones-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-zones-settings',
    'swg-auth-enable-space-yavin4',
    array(
      'type' => 'boolean',
      'description' => 'Enable Space Yavin IV',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => 'on'
    )
  );

  add_settings_field(
    'swg-auth-enable-space-yavin4',
    'Space Yavin IV',
    'swg_auth_enable_space_yavin4_html',
    'swg-auth-zones-settings',
    'swg-auth-zones-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-zones-settings',
    'swg-auth-enable-space-heavy1',
    array(
      'type' => 'boolean',
      'description' => 'Enable Space Heavy 1',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => 'on'
    )
  );

  add_settings_field(
    'swg-auth-enable-space-heavy1',
    'Space Heavy 1',
    'swg_auth_enable_space_heavy1_html',
    'swg-auth-zones-settings',
    'swg-auth-zones-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-zones-settings',
    'swg-auth-enable-space-light1',
    array(
      'type' => 'boolean',
      'description' => 'Enable Space Light 1',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => 'on'
    )
  );

  add_settings_field(
    'swg-auth-enable-space-light1',
    'Space Light 1',
    'swg_auth_enable_space_light1_html',
    'swg-auth-zones-settings',
    'swg-auth-zones-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-zones-settings',
    'swg-auth-enable-tutorial',
    array(
      'type' => 'boolean',
      'description' => 'Enable Tutorial',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => 'on'
    )
  );

  add_settings_field(
    'swg-auth-enable-tutorial',
    'Tutorial',
    'swg_auth_enable_tutorial_html',
    'swg-auth-zones-settings',
    'swg-auth-zones-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-zones-settings',
    'swg-auth-enable-dungeon1',
    array(
      'type' => 'boolean',
      'description' => 'Enable Dungeon 1',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => 'on'
    )
  );

  add_settings_field(
    'swg-auth-enable-dungeon1',
    'Dungeon 1',
    'swg_auth_enable_dungeon1_html',
    'swg-auth-zones-settings',
    'swg-auth-zones-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-zones-settings',
    'swg-auth-enable-adventure1',
    array(
      'type' => 'boolean',
      'description' => 'Enable Adventure 1',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => 'on'
    )
  );

  add_settings_field(
    'swg-auth-enable-adventure1',
    'Adventure 1',
    'swg_auth_enable_adventure1_html',
    'swg-auth-zones-settings',
    'swg-auth-zones-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-zones-settings',
    'swg-auth-enable-adventure2',
    array(
      'type' => 'boolean',
      'description' => 'Enable Adventure 2',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => 'on'
    )
  );

  add_settings_field(
    'swg-auth-enable-adventure2',
    'Adventure 2',
    'swg_auth_enable_adventure2_html',
    'swg-auth-zones-settings',
    'swg-auth-zones-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-zones-settings',
    'swg-auth-enable-space-npe-falcon',
    array(
      'type' => 'boolean',
      'description' => 'Enable Space NPE Falcon',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => 'on'
    )
  );

  add_settings_field(
    'swg-auth-enable-space-npe-falcon',
    'Space NPE Falcon',
    'swg_auth_enable_space_npe_falcon_html',
    'swg-auth-zones-settings',
    'swg-auth-zones-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-zones-settings',
    'swg-auth-enable-space-npe-falcon-2',
    array(
      'type' => 'boolean',
      'description' => 'Enable Space NPE Falcon 2',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => 'on'
    )
  );

  add_settings_field(
    'swg-auth-enable-space-npe-falcon-2',
    'Space NPE Falcon 2',
    'swg_auth_enable_space_npe_falcon_2_html',
    'swg-auth-zones-settings',
    'swg-auth-zones-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-zones-settings',
    'swg-auth-enable-space-npe-falcon-3',
    array(
      'type' => 'boolean',
      'description' => 'Enable Space NPE Falcon 3',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => 'on'
    )
  );

  add_settings_field(
    'swg-auth-enable-space-npe-falcon-3',
    'Space NPE Falcon 3',
    'swg_auth_enable_space_npe_falcon_3_html',
    'swg-auth-zones-settings',
    'swg-auth-zones-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-zones-settings',
    'swg-auth-enable-space-ord-mantell',
    array(
      'type' => 'boolean',
      'description' => 'Enable Space Ord Mantell',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => 'on'
    )
  );

  add_settings_field(
    'swg-auth-enable-space-ord-mantell',
    'Space Ord Mantell',
    'swg_auth_enable_space_ord_mantell_html',
    'swg-auth-zones-settings',
    'swg-auth-zones-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  add_settings_section(
    'swg-auth-dungeons-settings',
    'Dungeons',
    'swg_auth_dungeons_settings_html',
    'swg-auth-zones-settings'
  );

  register_setting(
    'swg-auth-zones-settings',
    'swg-auth-Corellian_Corvette_Imperial',
    array(
      'type' => 'boolean',
      'description' => 'Corellian_Corvette_Imperial',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => 'on'
    )
  );

  add_settings_field(
    'swg-auth-Corellian_Corvette_Imperial',
    'Corellian Corvette Imperial',
    'swg_auth_Corellian_Corvette_Imperial_html',
    'swg-auth-zones-settings',
    'swg-auth-dungeons-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-zones-settings',
    'swg-auth-Corellian_Corvette_Neutral',
    array(
      'type' => 'boolean',
      'description' => 'Corellian_Corvette_Neutral',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => 'on'
    )
  );

  add_settings_field(
    'swg-auth-Corellian_Corvette_Neutral',
    'Corellian Corvette Neutral',
    'swg_auth_Corellian_Corvette_Neutral_html',
    'swg-auth-zones-settings',
    'swg-auth-dungeons-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-zones-settings',
    'swg-auth-Corellian_Corvette_Rebel',
    array(
      'type' => 'boolean',
      'description' => 'Corellian_Corvette_Rebel',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => 'on'
    )
  );

  add_settings_field(
    'swg-auth-Corellian_Corvette_Rebel',
    'Corellian Corvette Rebel',
    'swg_auth_Corellian_Corvette_Rebel_html',
    'swg-auth-zones-settings',
    'swg-auth-dungeons-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-zones-settings',
    'swg-auth-Death_Watch',
    array(
      'type' => 'boolean',
      'description' => 'Death_Watch',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => 'on'
    )
  );

  add_settings_field(
    'swg-auth-Death_Watch',
    'Death Watch',
    'swg_auth_Death_Watch_html',
    'swg-auth-zones-settings',
    'swg-auth-dungeons-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-zones-settings',
    'swg-auth-Geonosian',
    array(
      'type' => 'boolean',
      'description' => 'Geonosian',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => 'on'
    )
  );

  add_settings_field(
    'swg-auth-Geonosian',
    'Geonosian',
    'swg_auth_Geonosian_html',
    'swg-auth-zones-settings',
    'swg-auth-dungeons-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  add_settings_section(
    'swg-auth-events-settings',
    'Events',
    'swg_auth_events_settings_html',
    'swg-auth-events-settings'
  );

  register_setting(
    'swg-auth-events-settings',
    'swg-auth-MuseumEventDuration',
    array(
      'type' => 'integer',
      'description' => 'MuseumEventDuration',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '1209600'
    )
  );

  add_settings_field(
    'swg-auth-MuseumEventDuration',
    'Museum Event Duration',
    'swg_auth_MuseumEventDuration_html',
    'swg-auth-events-settings',
    'swg-auth-events-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-events-settings',
    'swg-auth-PoliticianEventDuration',
    array(
      'type' => 'integer',
      'description' => 'PoliticianEventDuration',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '2592000'
    )
  );

  add_settings_field(
    'swg-auth-PoliticianEventDuration',
    'Politician Event Duration',
    'swg_auth_PoliticianEventDuration_html',
    'swg-auth-events-settings',
    'swg-auth-events-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-events-settings',
    'swg-auth-anniversary',
    array(
      'type' => 'boolean',
      'description' => 'anniversary',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => 'on'
    )
  );

  add_settings_field(
    'swg-auth-anniversary',
    'Anniversary',
    'swg_auth_anniversary_html',
    'swg-auth-events-settings',
    'swg-auth-events-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-events-settings',
    'swg-auth-forceFoolsDay',
    array(
      'type' => 'boolean',
      'description' => 'forceFoolsDay',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => ''
    )
  );

  add_settings_field(
    'swg-auth-forceFoolsDay',
    'Force Fools Day',
    'swg_auth_forceFoolsDay_html',
    'swg-auth-events-settings',
    'swg-auth-events-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-events-settings',
    'swg-auth-gcwraid',
    array(
      'type' => 'boolean',
      'description' => 'gcwraid',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => 'on'
    )
  );

  add_settings_field(
    'swg-auth-gcwraid',
    'GCW Raids',
    'swg_auth_gcwraid_html',
    'swg-auth-events-settings',
    'swg-auth-events-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-events-settings',
    'swg-auth-goldenTicket',
    array(
      'type' => 'boolean',
      'description' => 'goldenTicket',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => 'on'
    )
  );

  add_settings_field(
    'swg-auth-goldenTicket',
    'Golden Ticket',
    'swg_auth_goldenTicket_html',
    'swg-auth-events-settings',
    'swg-auth-events-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-events-settings',
    'swg-auth-goldenTicketDropChance',
    array(
      'type' => 'integer',
      'description' => 'goldenTicketDropChance',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '2'
    )
  );

  add_settings_field(
    'swg-auth-goldenTicketDropChance',
    'Golden Ticket Drop Chance',
    'swg_auth_goldenTicketDropChance_html',
    'swg-auth-events-settings',
    'swg-auth-events-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-events-settings',
    'swg-auth-goldenTicketsAvailable',
    array(
      'type' => 'integer',
      'description' => 'goldenTicketsAvailable',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '10'
    )
  );

  add_settings_field(
    'swg-auth-goldenTicketsAvailable',
    'Golden Tickets Available',
    'swg_auth_goldenTicketsAvailable_html',
    'swg-auth-events-settings',
    'swg-auth-events-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-events-settings',
    'swg-auth-restussEvent',
    array(
      'type' => 'boolean',
      'description' => 'restussEvent',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => ''
    )
  );

  add_settings_field(
    'swg-auth-restussEvent',
    'Restuss Event',
    'swg_auth_restussEvent_html',
    'swg-auth-events-settings',
    'swg-auth-events-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-events-settings',
    'swg-auth-restussPhase',
    array(
      'type' => 'integer',
      'description' => 'restussPhase',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '2'
    )
  );

  add_settings_field(
    'swg-auth-restussPhase',
    'Restuss Phase',
    'swg_auth_restussPhase_html',
    'swg-auth-events-settings',
    'swg-auth-events-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-events-settings',
    'swg-auth-restussProgressionOn',
    array(
      'type' => 'boolean',
      'description' => 'restussProgressionOn',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => 'on'
    )
  );

  add_settings_field(
    'swg-auth-restussProgressionOn',
    'Restuss Progression On',
    'swg_auth_restussProgressionOn_html',
    'swg-auth-events-settings',
    'swg-auth-events-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-events-settings',
    'swg-auth-empireday_ceremony',
    array(
      'type' => 'boolean',
      'description' => 'empireday_ceremony',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => ''
    )
  );

  add_settings_field(
    'swg-auth-empireday_ceremony',
    'Empire Day Ceremony',
    'swg_auth_empireday_ceremony_html',
    'swg-auth-events-settings',
    'swg-auth-events-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-events-settings',
    'swg-auth-foolsDay',
    array(
      'type' => 'boolean',
      'description' => 'foolsDay',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => ''
    )
  );

  add_settings_field(
    'swg-auth-foolsDay',
    'Fools Day',
    'swg_auth_foolsDay_html',
    'swg-auth-events-settings',
    'swg-auth-events-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-events-settings',
    'swg-auth-halloween',
    array(
      'type' => 'boolean',
      'description' => 'halloween',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => ''
    )
  );

  add_settings_field(
    'swg-auth-halloween',
    'Halloween',
    'swg_auth_halloween_html',
    'swg-auth-events-settings',
    'swg-auth-events-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-events-settings',
    'swg-auth-lifeday',
    array(
      'type' => 'boolean',
      'description' => 'lifeday',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => ''
    )
  );

  add_settings_field(
    'swg-auth-lifeday',
    'Life Day',
    'swg_auth_lifeday_html',
    'swg-auth-events-settings',
    'swg-auth-events-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-events-settings',
    'swg-auth-loveday',
    array(
      'type' => 'boolean',
      'description' => 'loveday',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => ''
    )
  );

  add_settings_field(
    'swg-auth-loveday',
    'Love Day',
    'swg_auth_loveday_html',
    'swg-auth-events-settings',
    'swg-auth-events-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  add_settings_section(
    'swg-auth-advanced-server-settings',
    'Advanced',
    'swg_auth_advanced_server_settings_html',
    'swg-auth-advanced-server-settings'
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-chatServiceBindInterface',
    array(
      'type' => 'string',
      'description' => 'chatServiceBindInterface',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => 'eth0'
    )
  );

  add_settings_field(
    'swg-auth-chatServiceBindInterface',
    'chatServiceBindInterface',
    'swg_auth_chatServiceBindInterface_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-customerServiceBindInterface',
    array(
      'type' => 'string',
      'description' => 'customerServiceBindInterface',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => 'eth0'
    )
  );

  add_settings_field(
    'swg-auth-customerServiceBindInterface',
    'customerServiceBindInterface',
    'swg_auth_customerServiceBindInterface_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-developmentMode',
    array(
      'type' => 'boolean',
      'description' => 'developmentMode',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => 'on'
    )
  );

  add_settings_field(
    'swg-auth-developmentMode',
    'developmentMode',
    'swg_auth_developmentMode_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-newbieTutorialEnabled',
    array(
      'type' => 'boolean',
      'description' => 'newbieTutorialEnabled',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => 'on'
    )
  );

  add_settings_field(
    'swg-auth-newbieTutorialEnabled',
    'newbieTutorialEnabled',
    'swg_auth_newbieTutorialEnabled_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-itvMinUsageLevel',
    array(
      'type' => 'integer',
      'description' => 'itvMinUsageLevel',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '0'
    )
  );

  add_settings_field(
    'swg-auth-itvMinUsageLevel',
    'itvMinUsageLevel',
    'swg_auth_itvMinUsageLevel_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-gatewayServerIP',
    array(
      'type' => 'string',
      'description' => 'gatewayServerIP',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '127.0.0.1'
    )
  );

  add_settings_field(
    'swg-auth-gatewayServerIP',
    'gatewayServerIP',
    'swg_auth_gatewayServerIP_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-gatewayServerPort',
    array(
      'type' => 'integer',
      'description' => 'gatewayServerPort',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '5001'
    )
  );

  add_settings_field(
    'swg-auth-gatewayServerPort',
    'gatewayServerPort',
    'swg_auth_gatewayServerPort_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-registrarHost',
    array(
      'type' => 'string',
      'description' => 'registrarHost',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '127.0.0.1'
    )
  );

  add_settings_field(
    'swg-auth-registrarHost',
    'registrarHost',
    'swg_auth_registrarHost_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-registrarPort',
    array(
      'type' => 'integer',
      'description' => 'registrarPort',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '5000'
    )
  );

  add_settings_field(
    'swg-auth-registrarPort',
    'registrarPort',
    'swg_auth_registrarPort_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-clientOverflowLimit',
    array(
      'type' => 'integer',
      'description' => 'clientOverflowLimit',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '5242880'
    )
  );

  add_settings_field(
    'swg-auth-clientOverflowLimit',
    'clientOverflowLimit',
    'swg_auth_clientOverflowLimit_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-disableWorldSnapshot',
    array(
      'type' => 'boolean',
      'description' => 'disableWorldSnapshot',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => ''
    )
  );

  add_settings_field(
    'swg-auth-disableWorldSnapshot',
    'disableWorldSnapshot',
    'swg_auth_disableWorldSnapshot_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-pingPort',
    array(
      'type' => 'integer',
      'description' => 'pingPort',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '44462'
    )
  );

  add_settings_field(
    'swg-auth-pingPort',
    'pingPort',
    'swg_auth_pingPort_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-validateClientVersion',
    array(
      'type' => 'boolean',
      'description' => 'validateClientVersion',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => ''
    )
  );

  add_settings_field(
    'swg-auth-validateClientVersion',
    'validateClientVersion',
    'swg_auth_validateClientVersion_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-validateStationKey',
    array(
      'type' => 'boolean',
      'description' => 'validateStationKey',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => ''
    )
  );

  add_settings_field(
    'swg-auth-validateStationKey',
    'validateStationKey',
    'swg_auth_validateStationKey_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-dailyMissionXpLimit',
    array(
      'type' => 'integer',
      'description' => 'dailyMissionXpLimit',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '10'
    )
  );

  add_settings_field(
    'swg-auth-dailyMissionXpLimit',
    'dailyMissionXpLimit',
    'swg_auth_dailyMissionXpLimit_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-grantElderBuff',
    array(
      'type' => 'boolean',
      'description' => 'grantElderBuff',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => ''
    )
  );

  add_settings_field(
    'swg-auth-grantElderBuff',
    'grantElderBuff',
    'swg_auth_grantElderBuff_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-databaseProtocol',
    array(
      'type' => 'string',
      'description' => 'databaseProtocol',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => 'OCI'
    )
  );

  add_settings_field(
    'swg-auth-databaseProtocol',
    'databaseProtocol',
    'swg_auth_databaseProtocol_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-DSN',
    array(
      'type' => 'string',
      'description' => 'DSN',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '//127.0.0.1/swg'
    )
  );

  add_settings_field(
    'swg-auth-DSN',
    'DSN',
    'swg_auth_DSN_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-loaderThreads',
    array(
      'type' => 'integer',
      'description' => 'loaderThreads',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '1'
    )
  );

  add_settings_field(
    'swg-auth-loaderThreads',
    'loaderThreads',
    'swg_auth_loaderThreads_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-persisterThreads',
    array(
      'type' => 'integer',
      'description' => 'persisterThreads',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '1'
    )
  );

  add_settings_field(
    'swg-auth-persisterThreads',
    'persisterThreads',
    'swg_auth_persisterThreads_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-sharedLoginMode',
    array(
      'type' => 'boolean',
      'description' => 'sharedLoginMode',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => ''
    )
  );

  add_settings_field(
    'swg-auth-sharedLoginMode',
    'sharedLoginMode',
    'swg_auth_sharedLoginMode_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-useTemplates',
    array(
      'type' => 'boolean',
      'description' => 'useTemplates',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => 'on'
    )
  );

  add_settings_field(
    'swg-auth-useTemplates',
    'useTemplates',
    'swg_auth_useTemplates_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-serverSwitch',
    array(
      'type' => 'boolean',
      'description' => 'serverSwitch',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => 'on'
    )
  );

  add_settings_field(
    'swg-auth-serverSwitch',
    'serverSwitch',
    'swg_auth_serverSwitch_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-adminGodToAll',
    array(
      'type' => 'boolean',
      'description' => 'adminGodToAll',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => ''
    )
  );

  add_settings_field(
    'swg-auth-adminGodToAll',
    'adminGodToAll',
    'swg_auth_adminGodToAll_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-adminGodToAllGodLevel',
    array(
      'type' => 'integer',
      'description' => 'adminGodToAllGodLevel',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '50'
    )
  );

  add_settings_field(
    'swg-auth-adminGodToAllGodLevel',
    'adminGodToAllGodLevel',
    'swg_auth_adminGodToAllGodLevel_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-aiLoggingEnabled',
    array(
      'type' => 'boolean',
      'description' => 'aiLoggingEnabled',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => ''
    )
  );

  add_settings_field(
    'swg-auth-aiLoggingEnabled',
    'aiLoggingEnabled',
    'swg_auth_aiLoggingEnabled_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-allowMasterObjectCreation',
    array(
      'type' => 'boolean',
      'description' => 'allowMasterObjectCreation',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => 'on'
    )
  );

  add_settings_field(
    'swg-auth-allowMasterObjectCreation',
    'allowMasterObjectCreation',
    'swg_auth_allowMasterObjectCreation_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-allowPlayersToPackVendors',
    array(
      'type' => 'boolean',
      'description' => 'allowPlayersToPackVendors',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => 'on'
    )
  );

  add_settings_field(
    'swg-auth-allowPlayersToPackVendors',
    'allowPlayersToPackVendors',
    'swg_auth_allowPlayersToPackVendors_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-chroniclesChroniclerGoldTokenChanceOverride',
    array(
      'type' => 'integer',
      'description' => 'chroniclesChroniclerGoldTokenChanceOverride',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '15'
    )
  );

  add_settings_field(
    'swg-auth-chroniclesChroniclerGoldTokenChanceOverride',
    'chroniclesChroniclerGoldTokenChanceOverride',
    'swg_auth_chroniclesChroniclerGoldTokenChanceOverride_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-chroniclesChroniclerSilverTokenNumModifier',
    array(
      'type' => 'integer',
      'description' => 'chroniclesChroniclerSilverTokenNumModifier',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '2'
    )
  );

  add_settings_field(
    'swg-auth-chroniclesChroniclerSilverTokenNumModifier',
    'chroniclesChroniclerSilverTokenNumModifier',
    'swg_auth_chroniclesChroniclerSilverTokenNumModifier_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-chroniclesQuestorGoldTokenChanceOverride',
    array(
      'type' => 'integer',
      'description' => 'chroniclesQuestorGoldTokenChanceOverride',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '15'
    )
  );

  add_settings_field(
    'swg-auth-chroniclesQuestorGoldTokenChanceOverride',
    'chroniclesQuestorGoldTokenChanceOverride',
    'swg_auth_chroniclesQuestorGoldTokenChanceOverride_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-chroniclesQuestorSilverTokenNumModifier',
    array(
      'type' => 'integer',
      'description' => 'chroniclesQuestorSilverTokenNumModifier',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '2'
    )
  );

  add_settings_field(
    'swg-auth-chroniclesQuestorSilverTokenNumModifier',
    'chroniclesQuestorSilverTokenNumModifier',
    'swg_auth_chroniclesQuestorSilverTokenNumModifier_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-combatUpgradeReward',
    array(
      'type' => 'boolean',
      'description' => 'combatUpgradeReward',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => 'on'
    )
  );

  add_settings_field(
    'swg-auth-combatUpgradeReward',
    'combatUpgradeReward',
    'swg_auth_combatUpgradeReward_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-commoditiesMarketEnabled',
    array(
      'type' => 'boolean',
      'description' => 'commoditiesMarketEnabled',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => 'on'
    )
  );

  add_settings_field(
    'swg-auth-commoditiesMarketEnabled',
    'commoditiesMarketEnabled',
    'swg_auth_commoditiesMarketEnabled_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-createAppearances',
    array(
      'type' => 'boolean',
      'description' => 'createAppearances',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => 'on'
    )
  );

  add_settings_field(
    'swg-auth-createAppearances',
    'createAppearances',
    'swg_auth_createAppearances_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-createZoneObjects',
    array(
      'type' => 'boolean',
      'description' => 'createZoneObjects',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => 'on'
    )
  );

  add_settings_field(
    'swg-auth-createZoneObjects',
    'createZoneObjects',
    'swg_auth_createZoneObjects_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-debugMode',
    array(
      'type' => 'boolean',
      'description' => 'debugMode',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => 'on'
    )
  );

  add_settings_field(
    'swg-auth-debugMode',
    'debugMode',
    'swg_auth_debugMode_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-deleteEventProps',
    array(
      'type' => 'boolean',
      'description' => 'deleteEventProps',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => ''
    )
  );

  add_settings_field(
    'swg-auth-deleteEventProps',
    'deleteEventProps',
    'swg_auth_deleteEventProps_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-disableResources',
    array(
      'type' => 'boolean',
      'description' => 'disableResources',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => ''
    )
  );

  add_settings_field(
    'swg-auth-disableResources',
    'disableResources',
    'swg_auth_disableResources_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-drainRate',
    array(
      'type' => 'number',
      'description' => 'drainRate',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '0.00065'
    )
  );

  add_settings_field(
    'swg-auth-drainRate',
    'drainRate',
    'swg_auth_drainRate_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-enableCovertImperialMercenary',
    array(
      'type' => 'boolean',
      'description' => 'enableCovertImperialMercenary',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => 'on'
    )
  );

  add_settings_field(
    'swg-auth-enableCovertImperialMercenary',
    'enableCovertImperialMercenary',
    'swg_auth_enableCovertImperialMercenary_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-enableCovertRebelMercenary',
    array(
      'type' => 'boolean',
      'description' => 'enableCovertRebelMercenary',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => 'on'
    )
  );

  add_settings_field(
    'swg-auth-enableCovertRebelMercenary',
    'enableCovertRebelMercenary',
    'swg_auth_enableCovertRebelMercenary_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-enableOvertImperialMercenary',
    array(
      'type' => 'boolean',
      'description' => 'enableOvertImperialMercenary',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => 'on'
    )
  );

  add_settings_field(
    'swg-auth-enableOvertImperialMercenary',
    'enableOvertImperialMercenary',
    'swg_auth_enableOvertImperialMercenary_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-enableOvertRebelMercenary',
    array(
      'type' => 'boolean',
      'description' => 'enableOvertRebelMercenary',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => 'on'
    )
  );

  add_settings_field(
    'swg-auth-enableOvertRebelMercenary',
    'enableOvertRebelMercenary',
    'swg_auth_enableOvertRebelMercenary_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-enablePreload',
    array(
      'type' => 'boolean',
      'description' => 'enablePreload',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => ''
    )
  );

  add_settings_field(
    'swg-auth-enablePreload',
    'enablePreload',
    'swg_auth_enablePreload_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-fatalOnGoldPobChange',
    array(
      'type' => 'boolean',
      'description' => 'fatalOnGoldPobChange',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => ''
    )
  );

  add_settings_field(
    'swg-auth-fatalOnGoldPobChange',
    'fatalOnGoldPobChange',
    'swg_auth_fatalOnGoldPobChange_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-flashSpeederReward',
    array(
      'type' => 'boolean',
      'description' => 'flashSpeederReward',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => 'on'
    )
  );

  add_settings_field(
    'swg-auth-flashSpeederReward',
    'flashSpeederReward',
    'swg_auth_flashSpeederReward_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-gcwcitybestine',
    array(
      'type' => 'boolean',
      'description' => 'gcwcitybestine',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => 'on'
    )
  );

  add_settings_field(
    'swg-auth-gcwcitybestine',
    'gcwcitybestine',
    'swg_auth_gcwcitybestine_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-gcwcitydearic',
    array(
      'type' => 'boolean',
      'description' => 'gcwcitydearic',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => 'on'
    )
  );

  add_settings_field(
    'swg-auth-gcwcitydearic',
    'gcwcitydearic',
    'swg_auth_gcwcitydearic_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-gcwcitykeren',
    array(
      'type' => 'boolean',
      'description' => 'gcwcitykeren',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => 'on'
    )
  );

  add_settings_field(
    'swg-auth-gcwcitykeren',
    'gcwcitykeren',
    'swg_auth_gcwcitykeren_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-gcwInvasionCityMaximumRunning',
    array(
      'type' => 'integer',
      'description' => 'gcwInvasionCityMaximumRunning',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '1'
    )
  );

  add_settings_field(
    'swg-auth-gcwInvasionCityMaximumRunning',
    'gcwInvasionCityMaximumRunning',
    'swg_auth_gcwInvasionCityMaximumRunning_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-gcwInvasionCycleTime',
    array(
      'type' => 'integer',
      'description' => 'gcwInvasionCycleTime',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '1'
    )
  );

  add_settings_field(
    'swg-auth-gcwInvasionCycleTime',
    'gcwInvasionCycleTime',
    'swg_auth_gcwInvasionCycleTime_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-grantGift',
    array(
      'type' => 'boolean',
      'description' => 'grantGift',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => 'on'
    )
  );

  add_settings_field(
    'swg-auth-grantGift',
    'grantGift',
    'swg_auth_grantGift_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-hibernateDistance',
    array(
      'type' => 'number',
      'description' => 'hibernateDistance',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '65.0'
    )
  );

  add_settings_field(
    'swg-auth-hibernateDistance',
    'hibernateDistance',
    'swg_auth_hibernateDistance_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-hibernateEnabled',
    array(
      'type' => 'boolean',
      'description' => 'hibernateEnabled',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => 'on'
    )
  );

  add_settings_field(
    'swg-auth-hibernateEnabled',
    'hibernateEnabled',
    'swg_auth_hibernateEnabled_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-hibernateProxies',
    array(
      'type' => 'boolean',
      'description' => 'hibernateProxies',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => 'on'
    )
  );

  add_settings_field(
    'swg-auth-hibernateProxies',
    'hibernateProxies',
    'swg_auth_hibernateProxies_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-idleLogoutTimeSec',
    array(
      'type' => 'integer',
      'description' => 'idleLogoutTimeSec',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '300'
    )
  );

  add_settings_field(
    'swg-auth-idleLogoutTimeSec',
    'idleLogoutTimeSec',
    'swg_auth_idleLogoutTimeSec_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-javaConsoleDebugMessages',
    array(
      'type' => 'boolean',
      'description' => 'javaConsoleDebugMessages',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => ''
    )
  );

  add_settings_field(
    'swg-auth-javaConsoleDebugMessages',
    'javaConsoleDebugMessages',
    'swg_auth_javaConsoleDebugMessages_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-javaEngineProfiling',
    array(
      'type' => 'boolean',
      'description' => 'javaEngineProfiling',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => ''
    )
  );

  add_settings_field(
    'swg-auth-javaEngineProfiling',
    'javaEngineProfiling',
    'swg_auth_javaEngineProfiling_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-javaLocalRefLimit',
    array(
      'type' => 'integer',
      'description' => 'javaLocalRefLimit',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '16'
    )
  );

  add_settings_field(
    'swg-auth-javaLocalRefLimit',
    'javaLocalRefLimit',
    'swg_auth_javaLocalRefLimit_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-javaVMName',
    array(
      'type' => 'string',
      'description' => 'javaVMName',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => 'sun'
    )
  );

  add_settings_field(
    'swg-auth-javaVMName',
    'javaVMName',
    'swg_auth_javaVMName_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-maxGoldNetworkId',
    array(
      'type' => 'integer',
      'description' => 'maxGoldNetworkId',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '10000000'
    )
  );

  add_settings_field(
    'swg-auth-maxGoldNetworkId',
    'maxGoldNetworkId',
    'swg_auth_maxGoldNetworkId_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-maxItemAttribBonus',
    array(
      'type' => 'integer',
      'description' => 'maxItemAttribBonus',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '250'
    )
  );

  add_settings_field(
    'swg-auth-maxItemAttribBonus',
    'maxItemAttribBonus',
    'swg_auth_maxItemAttribBonus_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-maxObjectSkillModBonus',
    array(
      'type' => 'integer',
      'description' => 'maxObjectSkillModBonus',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '999'
    )
  );

  add_settings_field(
    'swg-auth-maxObjectSkillModBonus',
    'maxObjectSkillModBonus',
    'swg_auth_maxObjectSkillModBonus_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-maxRespecCount',
    array(
      'type' => 'integer',
      'description' => 'maxRespecCount',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '0'
    )
  );

  add_settings_field(
    'swg-auth-maxRespecCount',
    'maxRespecCount',
    'swg_auth_maxRespecCount_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-maxSocketSkillModBonus',
    array(
      'type' => 'integer',
      'description' => 'maxSocketSkillModBonus',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '999'
    )
  );

  add_settings_field(
    'swg-auth-maxSocketSkillModBonus',
    'maxSocketSkillModBonus',
    'swg_auth_maxSocketSkillModBonus_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-minRespecIntervalInSeconds',
    array(
      'type' => 'integer',
      'description' => 'minRespecIntervalInSeconds',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '43200'
    )
  );

  add_settings_field(
    'swg-auth-minRespecIntervalInSeconds',
    'minRespecIntervalInSeconds',
    'swg_auth_minRespecIntervalInSeconds_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-mountsEnabled',
    array(
      'type' => 'boolean',
      'description' => 'mountsEnabled',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => 'on'
    )
  );

  add_settings_field(
    'swg-auth-mountsEnabled',
    'mountsEnabled',
    'swg_auth_mountsEnabled_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-nameValidationAcceptAll',
    array(
      'type' => 'boolean',
      'description' => 'nameValidationAcceptAll',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => 'on'
    )
  );

  add_settings_field(
    'swg-auth-nameValidationAcceptAll',
    'nameValidationAcceptAll',
    'swg_auth_nameValidationAcceptAll_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-regenActionScale',
    array(
      'type' => 'number',
      'description' => 'regenActionScale',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '1.75'
    )
  );

  add_settings_field(
    'swg-auth-regenActionScale',
    'regenActionScale',
    'swg_auth_regenActionScale_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-regenBase',
    array(
      'type' => 'number',
      'description' => 'regenBase',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '0.999'
    )
  );

  add_settings_field(
    'swg-auth-regenBase',
    'regenBase',
    'swg_auth_regenBase_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-regenConstant',
    array(
      'type' => 'number',
      'description' => 'regenConstant',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '0'
    )
  );

  add_settings_field(
    'swg-auth-regenConstant',
    'regenConstant',
    'swg_auth_regenConstant_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-regenerationRate',
    array(
      'type' => 'number',
      'description' => 'regenerationRate',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '0.0064'
    )
  );

  add_settings_field(
    'swg-auth-regenerationRate',
    'regenerationRate',
    'swg_auth_regenerationRate_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-regenHealthScale',
    array(
      'type' => 'number',
      'description' => 'regenHealthScale',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '6'
    )
  );

  add_settings_field(
    'swg-auth-regenHealthScale',
    'regenHealthScale',
    'swg_auth_regenHealthScale_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-regenMindScale',
    array(
      'type' => 'number',
      'description' => 'regenMindScale',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '0.5'
    )
  );

  add_settings_field(
    'swg-auth-regenMindScale',
    'regenMindScale',
    'swg_auth_regenMindScale_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-regenScale',
    array(
      'type' => 'number',
      'description' => 'regenScale',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '2.5'
    )
  );

  add_settings_field(
    'swg-auth-regenScale',
    'regenScale',
    'swg_auth_regenScale_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-reservedObjectIds',
    array(
      'type' => 'integer',
      'description' => 'reservedObjectIds',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '1000000'
    )
  );

  add_settings_field(
    'swg-auth-reservedObjectIds',
    'reservedObjectIds',
    'swg_auth_reservedObjectIds_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-respecDurationAllowedInSeconds',
    array(
      'type' => 'integer',
      'description' => 'respecDurationAllowedInSeconds',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '2419200'
    )
  );

  add_settings_field(
    'swg-auth-respecDurationAllowedInSeconds',
    'respecDurationAllowedInSeconds',
    'swg_auth_respecDurationAllowedInSeconds_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-rlsDropChance',
    array(
      'type' => 'number',
      'description' => 'rlsDropChance',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '0.5'
    )
  );

  add_settings_field(
    'swg-auth-rlsDropChance',
    'rlsDropChance',
    'swg_auth_rlsDropChance_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-rlsEnabled',
    array(
      'type' => 'boolean',
      'description' => 'rlsEnabled',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => 'on'
    )
  );

  add_settings_field(
    'swg-auth-rlsEnabled',
    'rlsEnabled',
    'swg_auth_rlsEnabled_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-rlsExceptionalDropChance',
    array(
      'type' => 'integer',
      'description' => 'rlsExceptionalDropChance',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '25'
    )
  );

  add_settings_field(
    'swg-auth-rlsExceptionalDropChance',
    'rlsExceptionalDropChance',
    'swg_auth_rlsExceptionalDropChance_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-rlsLegendaryDropChance',
    array(
      'type' => 'integer',
      'description' => 'rlsLegendaryDropChance',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '5'
    )
  );

  add_settings_field(
    'swg-auth-rlsLegendaryDropChance',
    'rlsLegendaryDropChance',
    'swg_auth_rlsLegendaryDropChance_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-rlsMaxLevelsAbovePlayerLevel',
    array(
      'type' => 'integer',
      'description' => 'rlsMaxLevelsAbovePlayerLevel',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '6'
    )
  );

  add_settings_field(
    'swg-auth-rlsMaxLevelsAbovePlayerLevel',
    'rlsMaxLevelsAbovePlayerLevel',
    'swg_auth_rlsMaxLevelsAbovePlayerLevel_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-rlsMaxLevelsBelowPlayerLevel',
    array(
      'type' => 'integer',
      'description' => 'rlsMaxLevelsBelowPlayerLevel',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '6'
    )
  );

  add_settings_field(
    'swg-auth-rlsMaxLevelsBelowPlayerLevel',
    'rlsMaxLevelsBelowPlayerLevel',
    'swg_auth_rlsMaxLevelsBelowPlayerLevel_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-rlsMinDistanceFromLastLoot',
    array(
      'type' => 'integer',
      'description' => 'rlsMinDistanceFromLastLoot',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '5'
    )
  );

  add_settings_field(
    'swg-auth-rlsMinDistanceFromLastLoot',
    'rlsMinDistanceFromLastLoot',
    'swg_auth_rlsMinDistanceFromLastLoot_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-rlsMinTimeBetweenAwards',
    array(
      'type' => 'integer',
      'description' => 'rlsMinTimeBetweenAwards',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '900'
    )
  );

  add_settings_field(
    'swg-auth-rlsMinTimeBetweenAwards',
    'rlsMinTimeBetweenAwards',
    'swg_auth_rlsMinTimeBetweenAwards_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-rlsRareDropChance',
    array(
      'type' => 'integer',
      'description' => 'rlsRareDropChance',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '70'
    )
  );

  add_settings_field(
    'swg-auth-rlsRareDropChance',
    'rlsRareDropChance',
    'swg_auth_rlsRareDropChance_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-scriptPath',
    array(
      'type' => 'string',
      'description' => 'scriptPath',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '../../data/sku.0/sys.server/compiled/game/'
    )
  );

  add_settings_field(
    'swg-auth-scriptPath',
    'scriptPath',
    'swg_auth_scriptPath_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-scriptWatcherInterruptTime',
    array(
      'type' => 'integer',
      'description' => 'scriptWatcherInterruptTime',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '0'
    )
  );

  add_settings_field(
    'swg-auth-scriptWatcherInterruptTime',
    'scriptWatcherInterruptTime',
    'swg_auth_scriptWatcherInterruptTime_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-scriptWatcherWarnTime',
    array(
      'type' => 'integer',
      'description' => 'scriptWatcherWarnTime',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '5000'
    )
  );

  add_settings_field(
    'swg-auth-scriptWatcherWarnTime',
    'scriptWatcherWarnTime',
    'swg_auth_scriptWatcherWarnTime_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-scriptWatcherWarnTime',
    array(
      'type' => 'boolean',
      'description' => 'scriptWatcherWarnTime',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => 'on'
    )
  );

  add_settings_field(
    'swg-auth-scriptWatcherWarnTime',
    'scriptWatcherWarnTime',
    'swg_auth_scriptWatcherWarnTime_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-sendBreadcrumbs',
    array(
      'type' => 'boolean',
      'description' => 'sendBreadcrumbs',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => 'on'
    )
  );

  add_settings_field(
    'swg-auth-sendBreadcrumbs',
    'sendBreadcrumbs',
    'swg_auth_sendBreadcrumbs_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-sendPlayerTransform',
    array(
      'type' => 'boolean',
      'description' => 'sendPlayerTransform',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => 'on'
    )
  );

  add_settings_field(
    'swg-auth-sendPlayerTransform',
    'sendPlayerTransform',
    'swg_auth_sendPlayerTransform_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-serverLoadLevel',
    array(
      'type' => 'string',
      'description' => 'serverLoadLevel',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => 'heavy'
    )
  );

  add_settings_field(
    'swg-auth-serverLoadLevel',
    'serverLoadLevel',
    'swg_auth_serverLoadLevel_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-serverSpawnLimit',
    array(
      'type' => 'integer',
      'description' => 'serverSpawnLimit',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '60000'
    )
  );

  add_settings_field(
    'swg-auth-serverSpawnLimit',
    'serverSpawnLimit',
    'swg_auth_serverSpawnLimit_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-spaceGcwCorelliaActive',
    array(
      'type' => 'boolean',
      'description' => 'spaceGcwCorelliaActive',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => 'on'
    )
  );

  add_settings_field(
    'swg-auth-spaceGcwCorelliaActive',
    'spaceGcwCorelliaActive',
    'swg_auth_spaceGcwCorelliaActive_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-spaceGcwCorelliaDelay',
    array(
      'type' => 'integer',
      'description' => 'spaceGcwCorelliaDelay',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '3'
    )
  );

  add_settings_field(
    'swg-auth-spaceGcwCorelliaDelay',
    'spaceGcwCorelliaDelay',
    'swg_auth_spaceGcwCorelliaDelay_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-spaceGcwCorelliaStagger',
    array(
      'type' => 'integer',
      'description' => 'spaceGcwCorelliaStagger',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '2'
    )
  );

  add_settings_field(
    'swg-auth-spaceGcwCorelliaStagger',
    'spaceGcwCorelliaStagger',
    'swg_auth_spaceGcwCorelliaStagger_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-spaceGcwDantooineActive',
    array(
      'type' => 'boolean',
      'description' => 'spaceGcwDantooineActive',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => 'on'
    )
  );

  add_settings_field(
    'swg-auth-spaceGcwDantooineActive',
    'spaceGcwDantooineActive',
    'swg_auth_spaceGcwDantooineActive_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-spaceGcwDantooineDelay',
    array(
      'type' => 'integer',
      'description' => 'spaceGcwDantooineDelay',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '3'
    )
  );

  add_settings_field(
    'swg-auth-spaceGcwDantooineDelay',
    'spaceGcwDantooineDelay',
    'swg_auth_spaceGcwDantooineDelay_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-spaceGcwDantooineStagger',
    array(
      'type' => 'integer',
      'description' => 'spaceGcwDantooineStagger',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '0'
    )
  );

  add_settings_field(
    'swg-auth-spaceGcwDantooineStagger',
    'spaceGcwDantooineStagger',
    'swg_auth_spaceGcwDantooineStagger_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-spaceGcwGunshipPlayerCeiling',
    array(
      'type' => 'integer',
      'description' => 'spaceGcwGunshipPlayerCeiling',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '10'
    )
  );

  add_settings_field(
    'swg-auth-spaceGcwGunshipPlayerCeiling',
    'spaceGcwGunshipPlayerCeiling',
    'swg_auth_spaceGcwGunshipPlayerCeiling_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-spaceGcwLengthOfBattle',
    array(
      'type' => 'number',
      'description' => 'spaceGcwLengthOfBattle',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '3600.0'
    )
  );

  add_settings_field(
    'swg-auth-spaceGcwLengthOfBattle',
    'spaceGcwLengthOfBattle',
    'swg_auth_spaceGcwLengthOfBattle_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-spaceGcwLokActive',
    array(
      'type' => 'boolean',
      'description' => 'spaceGcwLokActive',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => 'on'
    )
  );

  add_settings_field(
    'swg-auth-spaceGcwLokActive',
    'spaceGcwLokActive',
    'swg_auth_spaceGcwLokActive_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-spaceGcwLokDelay',
    array(
      'type' => 'integer',
      'description' => 'spaceGcwLokDelay',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '3'
    )
  );

  add_settings_field(
    'swg-auth-spaceGcwLokDelay',
    'spaceGcwLokDelay',
    'swg_auth_spaceGcwLokDelay_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-spaceGcwLokStagger',
    array(
      'type' => 'integer',
      'description' => 'spaceGcwLokStagger',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '2'
    )
  );

  add_settings_field(
    'swg-auth-spaceGcwLokStagger',
    'spaceGcwLokStagger',
    'swg_auth_spaceGcwLokStagger_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-spaceGcwLossPointModifier',
    array(
      'type' => 'number',
      'description' => 'spaceGcwLossPointModifier',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '1.0'
    )
  );

  add_settings_field(
    'swg-auth-spaceGcwLossPointModifier',
    'spaceGcwLossPointModifier',
    'swg_auth_spaceGcwLossPointModifier_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-spaceGcwLossTokenModifier',
    array(
      'type' => 'number',
      'description' => 'spaceGcwLossTokenModifier',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '1.0'
    )
  );

  add_settings_field(
    'swg-auth-spaceGcwLossTokenModifier',
    'spaceGcwLossTokenModifier',
    'swg_auth_spaceGcwLossTokenModifier_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-spaceGcwMaxSupportShips',
    array(
      'type' => 'integer',
      'description' => 'spaceGcwMaxSupportShips',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '30'
    )
  );

  add_settings_field(
    'swg-auth-spaceGcwMaxSupportShips',
    'spaceGcwMaxSupportShips',
    'swg_auth_spaceGcwMaxSupportShips_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-spaceGcwNabooActive',
    array(
      'type' => 'boolean',
      'description' => 'spaceGcwNabooActive',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => 'on'
    )
  );

  add_settings_field(
    'swg-auth-spaceGcwNabooActive',
    'spaceGcwNabooActive',
    'swg_auth_spaceGcwNabooActive_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-spaceGcwNabooDelay',
    array(
      'type' => 'integer',
      'description' => 'spaceGcwNabooDelay',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '3'
    )
  );

  add_settings_field(
    'swg-auth-spaceGcwNabooDelay',
    'spaceGcwNabooDelay',
    'swg_auth_spaceGcwNabooDelay_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-spaceGcwNabooStagger',
    array(
      'type' => 'integer',
      'description' => 'spaceGcwNabooStagger',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '4'
    )
  );

  add_settings_field(
    'swg-auth-spaceGcwNabooStagger',
    'spaceGcwNabooStagger',
    'swg_auth_spaceGcwNabooStagger_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-spaceGcwPobPlayerCeiling',
    array(
      'type' => 'integer',
      'description' => 'spaceGcwPobPlayerCeiling',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '4'
    )
  );

  add_settings_field(
    'swg-auth-spaceGcwPobPlayerCeiling',
    'spaceGcwPobPlayerCeiling',
    'swg_auth_spaceGcwPobPlayerCeiling_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-spaceGcwPointAward',
    array(
      'type' => 'integer',
      'description' => 'spaceGcwPointAward',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '2500'
    )
  );

  add_settings_field(
    'swg-auth-spaceGcwPointAward',
    'spaceGcwPointAward',
    'swg_auth_spaceGcwPointAward_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-spaceGcwPrepatoryTime',
    array(
      'type' => 'number',
      'description' => 'spaceGcwPrepatoryTime',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '900.0'
    )
  );

  add_settings_field(
    'swg-auth-spaceGcwPrepatoryTime',
    'spaceGcwPrepatoryTime',
    'swg_auth_spaceGcwPrepatoryTime_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-spaceGcwPvEPointModifier',
    array(
      'type' => 'number',
      'description' => 'spaceGcwPvEPointModifier',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '1.0'
    )
  );

  add_settings_field(
    'swg-auth-spaceGcwPvEPointModifier',
    'spaceGcwPvEPointModifier',
    'swg_auth_spaceGcwPvEPointModifier_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-spaceGcwPvETokenModifier',
    array(
      'type' => 'number',
      'description' => 'spaceGcwPvETokenModifier',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '1.0'
    )
  );

  add_settings_field(
    'swg-auth-spaceGcwPvETokenModifier',
    'spaceGcwPvETokenModifier',
    'swg_auth_spaceGcwPvETokenModifier_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-spaceGcwPvPPointModifier',
    array(
      'type' => 'number',
      'description' => 'spaceGcwPvPPointModifier',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '2.0'
    )
  );

  add_settings_field(
    'swg-auth-spaceGcwPvPPointModifier',
    'spaceGcwPvPPointModifier',
    'swg_auth_spaceGcwPvPPointModifier_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-spaceGcwPvPTokenModifier',
    array(
      'type' => 'number',
      'description' => 'spaceGcwPvPTokenModifier',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '2.0'
    )
  );

  add_settings_field(
    'swg-auth-spaceGcwPvPTokenModifier',
    'spaceGcwPvPTokenModifier',
    'swg_auth_spaceGcwPvPTokenModifier_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-spaceGcwTatooineActive',
    array(
      'type' => 'boolean',
      'description' => 'spaceGcwTatooineActive',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => 'on'
    )
  );

  add_settings_field(
    'swg-auth-spaceGcwTatooineActive',
    'spaceGcwTatooineActive',
    'swg_auth_spaceGcwTatooineActive_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-spaceGcwTatooineDelay',
    array(
      'type' => 'integer',
      'description' => 'spaceGcwTatooineDelay',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '3'
    )
  );

  add_settings_field(
    'swg-auth-spaceGcwTatooineDelay',
    'spaceGcwTatooineDelay',
    'swg_auth_spaceGcwTatooineDelay_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-spaceGcwTatooineStagger',
    array(
      'type' => 'integer',
      'description' => 'spaceGcwTatooineStagger',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '0'
    )
  );

  add_settings_field(
    'swg-auth-spaceGcwTatooineStagger',
    'spaceGcwTatooineStagger',
    'swg_auth_spaceGcwTatooineStagger_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-spaceGcwTokenAward',
    array(
      'type' => 'integer',
      'description' => 'spaceGcwTokenAward',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '25'
    )
  );

  add_settings_field(
    'swg-auth-spaceGcwTokenAward',
    'spaceGcwTokenAward',
    'swg_auth_spaceGcwTokenAward_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-spaceGcwTotalSupportSpawn',
    array(
      'type' => 'integer',
      'description' => 'spaceGcwTotalSupportSpawn',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '60'
    )
  );

  add_settings_field(
    'swg-auth-spaceGcwTotalSupportSpawn',
    'spaceGcwTotalSupportSpawn',
    'swg_auth_spaceGcwTotalSupportSpawn_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-spaceGcwWinPointModifier',
    array(
      'type' => 'number',
      'description' => 'spaceGcwWinPointModifier',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '2.0'
    )
  );

  add_settings_field(
    'swg-auth-spaceGcwWinPointModifier',
    'spaceGcwWinPointModifier',
    'swg_auth_spaceGcwWinPointModifier_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-spaceGcwWinTokenModifier',
    array(
      'type' => 'number',
      'description' => 'spaceGcwWinTokenModifier',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '2.0'
    )
  );

  add_settings_field(
    'swg-auth-spaceGcwWinTokenModifier',
    'spaceGcwWinTokenModifier',
    'swg_auth_spaceGcwWinTokenModifier_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-spawnAllResources',
    array(
      'type' => 'boolean',
      'description' => 'spawnAllResources',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => 'on'
    )
  );

  add_settings_field(
    'swg-auth-spawnAllResources',
    'spawnAllResources',
    'swg_auth_spawnAllResources_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-startX',
    array(
      'type' => 'number',
      'description' => 'startX',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '3585.0'
    )
  );

  add_settings_field(
    'swg-auth-startX',
    'startX',
    'swg_auth_startX_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-startY',
    array(
      'type' => 'number',
      'description' => 'startY',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '10.0'
    )
  );

  add_settings_field(
    'swg-auth-startY',
    'startY',
    'swg_auth_startY_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-startZ',
    array(
      'type' => 'number',
      'description' => 'startZ',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '2578.0'
    )
  );

  add_settings_field(
    'swg-auth-startZ',
    'startZ',
    'swg_auth_startZ_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-suiListLimit',
    array(
      'type' => 'integer',
      'description' => 'suiListLimit',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '50'
    )
  );

  add_settings_field(
    'swg-auth-suiListLimit',
    'suiListLimit',
    'swg_auth_suiListLimit_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-veteranDebugEnableOverrideAccountAge',
    array(
      'type' => 'integer',
      'description' => 'veteranDebugEnableOverrideAccountAge',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '9999'
    )
  );

  add_settings_field(
    'swg-auth-veteranDebugEnableOverrideAccountAge',
    'veteranDebugEnableOverrideAccountAge',
    'swg_auth_veteranDebugEnableOverrideAccountAge_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-veteranDebugTriggerAll',
    array(
      'type' => 'boolean',
      'description' => 'veteranDebugTriggerAll',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => ''
    )
  );

  add_settings_field(
    'swg-auth-veteranDebugTriggerAll',
    'veteranDebugTriggerAll',
    'swg_auth_veteranDebugTriggerAll_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-passthroughMode',
    array(
      'type' => 'boolean',
      'description' => 'passthroughMode',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => ''
    )
  );

  add_settings_field(
    'swg-auth-passthroughMode',
    'passthroughMode',
    'swg_auth_passthroughMode_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-loadWholePlanet',
    array(
      'type' => 'boolean',
      'description' => 'loadWholePlanet',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => 'on'
    )
  );

  add_settings_field(
    'swg-auth-loadWholePlanet',
    'loadWholePlanet',
    'swg_auth_loadWholePlanet_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-numTutorialServers',
    array(
      'type' => 'integer',
      'description' => 'numTutorialServers',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '1'
    )
  );

  add_settings_field(
    'swg-auth-numTutorialServers',
    'numTutorialServers',
    'swg_auth_numTutorialServers_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-CommunityCraftingLimit',
    array(
      'type' => 'integer',
      'description' => 'CommunityCraftingLimit',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '200'
    )
  );

  add_settings_field(
    'swg-auth-CommunityCraftingLimit',
    'CommunityCraftingLimit',
    'swg_auth_CommunityCraftingLimit_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-CraftingContract',
    array(
      'type' => 'boolean',
      'description' => 'CraftingContract',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => 'on'
    )
  );

  add_settings_field(
    'swg-auth-CraftingContract',
    'CraftingContract',
    'swg_auth_CraftingContract_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-CrowdPleaser',
    array(
      'type' => 'boolean',
      'description' => 'CrowdPleaser',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => 'on'
    )
  );

  add_settings_field(
    'swg-auth-CrowdPleaser',
    'CrowdPleaser',
    'swg_auth_CrowdPleaser_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-liveSpaceServer',
    array(
      'type' => 'boolean',
      'description' => 'liveSpaceServer',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => 'on'
    )
  );

  add_settings_field(
    'swg-auth-liveSpaceServer',
    'liveSpaceServer',
    'swg_auth_liveSpaceServer_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-npeSequencersActive',
    array(
      'type' => 'boolean',
      'description' => 'npeSequencersActive',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => 'on'
    )
  );

  add_settings_field(
    'swg-auth-npeSequencersActive',
    'npeSequencersActive',
    'swg_auth_npeSequencersActive_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-spawnersOn',
    array(
      'type' => 'boolean',
      'description' => 'spawnersOn',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => 'on'
    )
  );

  add_settings_field(
    'swg-auth-spawnersOn',
    'spawnersOn',
    'swg_auth_spawnersOn_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-metricsServerPort',
    array(
      'type' => 'integer',
      'description' => 'metricsServerPort',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '0'
    )
  );

  add_settings_field(
    'swg-auth-metricsServerPort',
    'metricsServerPort',
    'swg_auth_metricsServerPort_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-searchPath0',
    array(
      'type' => 'string',
      'description' => 'searchPath0',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '../../data/sku.0/sys.client/compiled/clientdata/'
    )
  );

  add_settings_field(
    'swg-auth-searchPath0',
    'searchPath0',
    'swg_auth_searchPath0_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-searchPath1a',
    array(
      'type' => 'string',
      'description' => 'searchPath1a',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '../../data/sku.0/sys.server/built/game/'
    )
  );

  add_settings_field(
    'swg-auth-searchPath1a',
    'searchPath1',
    'swg_auth_searchPath1a_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-searchPath1b',
    array(
      'type' => 'string',
      'description' => 'searchPath1b',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '../../data/sku.0/sys.shared/built/game/'
    )
  );

  add_settings_field(
    'swg-auth-searchPath1b',
    'searchPath1',
    'swg_auth_searchPath1b_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-searchPath2a',
    array(
      'type' => 'string',
      'description' => 'searchPath2a',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '../../data/sku.0/sys.server/compiled/game/'
    )
  );

  add_settings_field(
    'swg-auth-searchPath2a',
    'searchPath2',
    'swg_auth_searchPath2a_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-searchPath2b',
    array(
      'type' => 'string',
      'description' => 'searchPath2b',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '../../data/sku.0/sys.shared/compiled/game/'
    )
  );

  add_settings_field(
    'swg-auth-searchPath2b',
    'searchPath2',
    'swg_auth_searchPath2b_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-debugReportLongFrames',
    array(
      'type' => 'boolean',
      'description' => 'debugReportLongFrames',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => ''
    )
  );

  add_settings_field(
    'swg-auth-debugReportLongFrames',
    'debugReportLongFrames',
    'swg_auth_debugReportLongFrames_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-fatalCallStackDepth',
    array(
      'type' => 'integer',
      'description' => 'fatalCallStackDepth',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '10'
    )
  );

  add_settings_field(
    'swg-auth-fatalCallStackDepth',
    'fatalCallStackDepth',
    'swg_auth_fatalCallStackDepth_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-frameRateLimit',
    array(
      'type' => 'integer',
      'description' => 'frameRateLimit',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '10'
    )
  );

  add_settings_field(
    'swg-auth-frameRateLimit',
    'frameRateLimit',
    'swg_auth_frameRateLimit_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-warningCallStackDepth',
    array(
      'type' => 'integer',
      'description' => 'warningCallStackDepth',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '-1'
    )
  );

  add_settings_field(
    'swg-auth-warningCallStackDepth',
    'warningCallStackDepth',
    'swg_auth_warningCallStackDepth_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-byteCountWarnThreshold',
    array(
      'type' => 'integer',
      'description' => 'byteCountWarnThreshold',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '1000000'
    )
  );

  add_settings_field(
    'swg-auth-byteCountWarnThreshold',
    'byteCountWarnThreshold',
    'swg_auth_byteCountWarnThreshold_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-congestionWindowMinimum',
    array(
      'type' => 'integer',
      'description' => 'congestionWindowMinimum',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '0'
    )
  );

  add_settings_field(
    'swg-auth-congestionWindowMinimum',
    'congestionWindowMinimum',
    'swg_auth_congestionWindowMinimum_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-enableFlushAndConfirmAllData',
    array(
      'type' => 'boolean',
      'description' => 'enableFlushAndConfirmAllData',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => ''
    )
  );

  add_settings_field(
    'swg-auth-enableFlushAndConfirmAllData',
    'enableFlushAndConfirmAllData',
    'swg_auth_enableFlushAndConfirmAllData_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-fragmentSize',
    array(
      'type' => 'integer',
      'description' => 'fragmentSize',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '500'
    )
  );

  add_settings_field(
    'swg-auth-fragmentSize',
    'fragmentSize',
    'swg_auth_fragmentSize_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-incomingBufferSize',
    array(
      'type' => 'integer',
      'description' => 'incomingBufferSize',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '4194304'
    )
  );

  add_settings_field(
    'swg-auth-incomingBufferSize',
    'incomingBufferSize',
    'swg_auth_incomingBufferSize_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-logBackloggedPacketThreshold',
    array(
      'type' => 'integer',
      'description' => 'logBackloggedPacketThreshold',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '0'
    )
  );

  add_settings_field(
    'swg-auth-logBackloggedPacketThreshold',
    'logBackloggedPacketThreshold',
    'swg_auth_logBackloggedPacketThreshold_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-maxOutstandingBytes',
    array(
      'type' => 'integer',
      'description' => 'maxOutstandingBytes',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '4194304'
    )
  );

  add_settings_field(
    'swg-auth-maxOutstandingBytes',
    'maxOutstandingBytes',
    'swg_auth_maxOutstandingBytes_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-maxOutstandingPackets',
    array(
      'type' => 'integer',
      'description' => 'maxOutstandingPackets',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '400'
    )
  );

  add_settings_field(
    'swg-auth-maxOutstandingPackets',
    'maxOutstandingPackets',
    'swg_auth_maxOutstandingPackets_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-maxRawPacketSize',
    array(
      'type' => 'integer',
      'description' => 'maxRawPacketSize',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '500'
    )
  );

  add_settings_field(
    'swg-auth-maxRawPacketSize',
    'maxRawPacketSize',
    'swg_auth_maxRawPacketSize_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-noDataTimeout',
    array(
      'type' => 'integer',
      'description' => 'noDataTimeout',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '1000000'
    )
  );

  add_settings_field(
    'swg-auth-noDataTimeout',
    'noDataTimeout',
    'swg_auth_noDataTimeout_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-oldestUnacknowledgedTimeout',
    array(
      'type' => 'integer',
      'description' => 'oldestUnacknowledgedTimeout',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '0'
    )
  );

  add_settings_field(
    'swg-auth-oldestUnacknowledgedTimeout',
    'oldestUnacknowledgedTimeout',
    'swg_auth_oldestUnacknowledgedTimeout_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-outgoingBufferSize',
    array(
      'type' => 'integer',
      'description' => 'outgoingBufferSize',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '4194304'
    )
  );

  add_settings_field(
    'swg-auth-outgoingBufferSize',
    'outgoingBufferSize',
    'swg_auth_outgoingBufferSize_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-overflowLimit',
    array(
      'type' => 'integer',
      'description' => 'overflowLimit',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '0'
    )
  );

  add_settings_field(
    'swg-auth-overflowLimit',
    'overflowLimit',
    'swg_auth_overflowLimit_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-packetHistoryMax',
    array(
      'type' => 'integer',
      'description' => 'packetHistoryMax',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '512'
    )
  );

  add_settings_field(
    'swg-auth-packetHistoryMax',
    'packetHistoryMax',
    'swg_auth_packetHistoryMax_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-pooledPacketMax',
    array(
      'type' => 'integer',
      'description' => 'pooledPacketMax',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '32000'
    )
  );

  add_settings_field(
    'swg-auth-pooledPacketMax',
    'pooledPacketMax',
    'swg_auth_pooledPacketMax_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-pooledPacketSize',
    array(
      'type' => 'integer',
      'description' => 'pooledPacketSize',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '256'
    )
  );

  add_settings_field(
    'swg-auth-pooledPacketSize',
    'pooledPacketSize',
    'swg_auth_pooledPacketSize_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-reportMessages',
    array(
      'type' => 'boolean',
      'description' => 'reportMessages',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => ''
    )
  );

  add_settings_field(
    'swg-auth-reportMessages',
    'reportMessages',
    'swg_auth_reportMessages_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-reservedPorta',
    array(
      'type' => 'integer',
      'description' => 'reservedPorta',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '44451'
    )
  );

  add_settings_field(
    'swg-auth-reservedPorta',
    'reservedPort',
    'swg_auth_reservedPorta_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-reservedPortb',
    array(
      'type' => 'integer',
      'description' => 'reservedPortb',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '44452'
    )
  );

  add_settings_field(
    'swg-auth-reservedPortb',
    'reservedPort',
    'swg_auth_reservedPortb_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-reservedPortc',
    array(
      'type' => 'integer',
      'description' => 'reservedPortc',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '44455'
    )
  );

  add_settings_field(
    'swg-auth-reservedPortc',
    'reservedPort',
    'swg_auth_reservedPortc_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-reservedPortd',
    array(
      'type' => 'integer',
      'description' => 'reservedPortd',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '44459'
    )
  );

  add_settings_field(
    'swg-auth-reservedPortd',
    'reservedPort',
    'swg_auth_reservedPortd_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-reservedPorte',
    array(
      'type' => 'integer',
      'description' => 'reservedPorte',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '44463'
    )
  );

  add_settings_field(
    'swg-auth-reservedPorte',
    'reservedPort',
    'swg_auth_reservedPorte_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-reservedPortf',
    array(
      'type' => 'integer',
      'description' => 'reservedPortf',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '44464'
    )
  );

  add_settings_field(
    'swg-auth-reservedPortf',
    'reservedPort',
    'swg_auth_reservedPortf_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-reservedPortg',
    array(
      'type' => 'integer',
      'description' => 'reservedPortg',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '44467'
    )
  );

  add_settings_field(
    'swg-auth-reservedPortg',
    'reservedPort',
    'swg_auth_reservedPortg_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-reservedPorth',
    array(
      'type' => 'integer',
      'description' => 'reservedPorth',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '44480'
    )
  );

  add_settings_field(
    'swg-auth-reservedPorth',
    'reservedPort',
    'swg_auth_reservedPorth_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-reservedPorti',
    array(
      'type' => 'integer',
      'description' => 'reservedPorti',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '50001'
    )
  );

  add_settings_field(
    'swg-auth-reservedPorti',
    'reservedPort',
    'swg_auth_reservedPorti_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-reservedPortj',
    array(
      'type' => 'integer',
      'description' => 'reservedPortj',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '60000'
    )
  );

  add_settings_field(
    'swg-auth-reservedPortj',
    'reservedPort',
    'swg_auth_reservedPortj_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-reservedPortk',
    array(
      'type' => 'integer',
      'description' => 'reservedPortk',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '60001'
    )
  );

  add_settings_field(
    'swg-auth-reservedPortk',
    'reservedPort',
    'swg_auth_reservedPortk_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-reservedPortl',
    array(
      'type' => 'integer',
      'description' => 'reservedPortl',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '60002'
    )
  );

  add_settings_field(
    'swg-auth-reservedPortl',
    'reservedPort',
    'swg_auth_reservedPortl_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-reservedPortm',
    array(
      'type' => 'integer',
      'description' => 'reservedPortm',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '61000'
    )
  );

  add_settings_field(
    'swg-auth-reservedPortm',
    'reservedPort',
    'swg_auth_reservedPortm_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-reservedPortn',
    array(
      'type' => 'integer',
      'description' => 'reservedPortn',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '61222'
    )
  );

  add_settings_field(
    'swg-auth-reservedPortn',
    'reservedPort',
    'swg_auth_reservedPortn_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-reservedPorto',
    array(
      'type' => 'integer',
      'description' => 'reservedPorto',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '61232'
    )
  );

  add_settings_field(
    'swg-auth-reservedPorto',
    'reservedPort',
    'swg_auth_reservedPorto_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-reservedPortp',
    array(
      'type' => 'integer',
      'description' => 'reservedPortp',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '61242'
    )
  );

  add_settings_field(
    'swg-auth-reservedPortp',
    'reservedPort',
    'swg_auth_reservedPortp_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-environmentVariablea',
    array(
      'type' => 'string',
      'description' => 'environmentVariablea',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => 'NLS_LANG=american_america.utf8'
    )
  );

  add_settings_field(
    'swg-auth-environmentVariablea',
    'environmentVariable',
    'swg_auth_environmentVariablea_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-environmentVariableb',
    array(
      'type' => 'string',
      'description' => 'environmentVariableb',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => 'PATH+=/usr/lib/jvm/java-11-openjdk/bin:./'
    )
  );

  add_settings_field(
    'swg-auth-environmentVariableb',
    'environmentVariable',
    'swg_auth_environmentVariableb_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-advanced-server-settings',
    'swg-auth-environmentVariablec',
    array(
      'type' => 'string',
      'description' => 'environmentVariablec',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => 'LD_LIBRARY_PATH+=/usr/lib/jvm/java-11-openjdk/lib:/usr/lib/jvm/java-11-openjdk/lib/server:./'
    )
  );

  add_settings_field(
    'swg-auth-environmentVariablec',
    'environmentVariable',
    'swg_auth_environmentVariablec_html',
    'swg-auth-advanced-server-settings',
    'swg-auth-advanced-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  add_settings_section(
    'swg-auth-custom-server-settings',
    '',
    'swg_auth_custom_server_settings_html',
    'swg-auth-custom-server-settings'
  );

  register_setting(
    'swg-auth-custom-server-settings',
    'swg-auth-custom-server-setting',
    array(
      'type' => 'string',
      'description' => 'Custom',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => ''
    )
  );

  add_settings_field(
    'swg-auth-custom-server-setting',
    '',
    'swg_auth_custom_server_setting_html',
    'swg-auth-custom-server-settings',
    'swg-auth-custom-server-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

}

/**
 * Sanitize checkbox values
 * This function is shared between settings files
 *
 * @since 1.0.0
 * @param mixed $input Input value to sanitize.
 * @return string Returns 'on' or 'off'.
 */
if ( ! function_exists( 'swg_auth_sanitize_checkbox' ) ) {
	function swg_auth_sanitize_checkbox( $input ) {
		return ( 'on' === $input ) ? 'on' : 'off';
	}
}

function swg_auth_server_settings_section_html( $args ) {
  echo '';
}

function swg_auth_cluster_name_html( $args ) {
  ?>
  <input type="text" name="swg-auth-cluster-name" value="<?php echo esc_attr( get_option( 'swg-auth-cluster-name' ) ); ?>">
  <?php
}

function swg_auth_server_ip_html( $args ) {
  ?>
  <input type="text" name="swg-auth-server-ip" value="<?php echo esc_attr( get_option( 'swg-auth-server-ip' ) ); ?>">
  <?php
}

function swg_auth_webUpdateIntervalSeconds_html( $args ) {
  ?>
  <input type="text" name="swg-auth-webUpdateIntervalSeconds" value="<?php echo esc_attr( get_option( 'swg-auth-webUpdateIntervalSeconds' ) ); ?>"> (In Seconds)
  <?php
}

function swg_auth_easyExternalAccess_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-easyExternalAccess" <?php echo ( get_option( 'swg-auth-easyExternalAccess' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_useExternalAuth_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-useExternalAuth" <?php echo ( get_option( 'swg-auth-useExternalAuth' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_externalAdminLevelsEnabled_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-externalAdminLevelsEnabled" <?php echo ( get_option( 'swg-auth-externalAdminLevelsEnabled' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_reverseEngineeringBonusMultiplier_html( $args ) {
  ?>
  <input type="text" name="swg-auth-reverseEngineeringBonusMultiplier" value="<?php echo esc_attr( get_option( 'swg-auth-reverseEngineeringBonusMultiplier' ) ); ?>">
  <?php
}

function swg_auth_chroniclesXpModifier_html( $args ) {
  ?>
  <input type="text" name="swg-auth-chroniclesXpModifier" value="<?php echo esc_attr( get_option( 'swg-auth-chroniclesXpModifier' ) ); ?>">
  <?php
}

function swg_auth_gcwPointBonus_html( $args ) {
  ?>
  <input type="text" name="swg-auth-gcwPointBonus" value="<?php echo esc_attr( get_option( 'swg-auth-gcwPointBonus' ) ); ?>">
  <?php
}

function swg_auth_gcwTokenBonus_html( $args ) {
  ?>
  <input type="text" name="swg-auth-gcwTokenBonus" value="<?php echo esc_attr( get_option( 'swg-auth-gcwTokenBonus' ) ); ?>">
  <?php
}

function swg_auth_harvesterExtractionRateMultiplier_html( $args ) {
  ?>
  <input type="text" name="swg-auth-harvesterExtractionRateMultiplier" value="<?php echo esc_attr( get_option( 'swg-auth-harvesterExtractionRateMultiplier' ) ); ?>">
  <?php
}

function swg_auth_xpMultiplier_html( $args ) {
  ?>
  <input type="text" name="swg-auth-xpMultiplier" value="<?php echo esc_attr( get_option( 'swg-auth-xpMultiplier' ) ); ?>">
  <?php
}

function swg_auth_vendor_timer_html( $args ) {
  echo 'All values are in minutes.';
}

function swg_auth_minutesActiveToUnaccessed_html( $args ) {
  ?>
  <input type="text" name="swg-auth-minutesActiveToUnaccessed" value="<?php echo esc_attr( get_option( 'swg-auth-minutesActiveToUnaccessed' ) ); ?>">
  <?php
}

function swg_auth_minutesUnaccessedToEndangered_html( $args ) {
  ?>
  <input type="text" name="swg-auth-minutesUnaccessedToEndangered" value="<?php echo esc_attr( get_option( 'swg-auth-minutesUnaccessedToEndangered' ) ); ?>">
  <?php
}

function swg_auth_minutesEmptyToEndangered_html( $args ) {
  ?>
  <input type="text" name="swg-auth-minutesEmptyToEndangered" value="<?php echo esc_attr( get_option( 'swg-auth-minutesEmptyToEndangered' ) ); ?>">
  <?php
}

function swg_auth_minutesEndangeredToRemoved_html( $args ) {
  ?>
  <input type="text" name="swg-auth-minutesEndangeredToRemoved" value="<?php echo esc_attr( get_option( 'swg-auth-minutesEndangeredToRemoved' ) ); ?>">
  <?php
}

function swg_auth_minutesVendorAuctionTimer_html( $args ) {
  ?>
  <input type="text" name="swg-auth-minutesVendorAuctionTimer" value="<?php echo esc_attr( get_option( 'swg-auth-minutesVendorAuctionTimer' ) ); ?>">
  <?php
}

function swg_auth_minutesVendorItemTimer_html( $args ) {
  ?>
  <input type="text" name="swg-auth-minutesVendorItemTimer" value="<?php echo esc_attr( get_option( 'swg-auth-minutesVendorItemTimer' ) ); ?>">
  <?php
}

function swg_auth_character_builder_html( $args ) {
  echo 'Enable or Disable various features of the Character Builder Terminal.';
}

function swg_auth_armorEnabled_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-armorEnabled" <?php echo ( get_option( 'swg-auth-armorEnabled' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_BestResourcesEnabled_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-BestResourcesEnabled" <?php echo ( get_option( 'swg-auth-BestResourcesEnabled' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_buffsEnabled_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-buffsEnabled" <?php echo ( get_option( 'swg-auth-buffsEnabled' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_builderEnabled_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-builderEnabled" <?php echo ( get_option( 'swg-auth-builderEnabled' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_commandsEnabled_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-commandsEnabled" <?php echo ( get_option( 'swg-auth-commandsEnabled' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_craftingEnabled_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-craftingEnabled" <?php echo ( get_option( 'swg-auth-craftingEnabled' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_creditsEnabled_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-creditsEnabled" <?php echo ( get_option( 'swg-auth-creditsEnabled' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_deedsEnabled_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-deedsEnabled" <?php echo ( get_option( 'swg-auth-deedsEnabled' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_devEnabled_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-devEnabled" <?php echo ( get_option( 'swg-auth-devEnabled' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_DraftSchematicsEnabled_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-DraftSchematicsEnabled" <?php echo ( get_option( 'swg-auth-DraftSchematicsEnabled' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_factionEnabled_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-factionEnabled" <?php echo ( get_option( 'swg-auth-factionEnabled' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_HeroicFlagEnabled_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-HeroicFlagEnabled" <?php echo ( get_option( 'swg-auth-HeroicFlagEnabled' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_jediEnabled_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-jediEnabled" <?php echo ( get_option( 'swg-auth-jediEnabled' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_miscitemEnabled_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-miscitemEnabled" <?php echo ( get_option( 'swg-auth-miscitemEnabled' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_pahallEnabled_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-pahallEnabled" <?php echo ( get_option( 'swg-auth-pahallEnabled' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_petsEnabled_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-petsEnabled" <?php echo ( get_option( 'swg-auth-petsEnabled' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_questEnabled_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-questEnabled" <?php echo ( get_option( 'swg-auth-questEnabled' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_resourcesEnabled_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-resourcesEnabled" <?php echo ( get_option( 'swg-auth-resourcesEnabled' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_shipsEnabled_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-shipsEnabled" <?php echo ( get_option( 'swg-auth-shipsEnabled' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_skillsEnabled_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-skillsEnabled" <?php echo ( get_option( 'swg-auth-skillsEnabled' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_vehiclesEnabled_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-vehiclesEnabled" <?php echo ( get_option( 'swg-auth-vehiclesEnabled' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_warpsEnabled_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-warpsEnabled" <?php echo ( get_option( 'swg-auth-warpsEnabled' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_weaponsEnabled_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-weaponsEnabled" <?php echo ( get_option( 'swg-auth-weaponsEnabled' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_zones_settings_html( $args ) {
  echo 'Turn planets and other zones on and off.';
}

function swg_auth_enable_corellia_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-enable-corellia" <?php echo ( get_option( 'swg-auth-enable-corellia' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_enable_dantooine_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-enable-dantooine" <?php echo ( get_option( 'swg-auth-enable-dantooine' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_enable_dathomir_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-enable-dathomir" <?php echo ( get_option( 'swg-auth-enable-dathomir' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_enable_endor_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-enable-endor" <?php echo ( get_option( 'swg-auth-enable-endor' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_enable_lok_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-enable-lok" <?php echo ( get_option( 'swg-auth-enable-lok' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_enable_kashyyyk_dead_forest_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-enable-kashyyyk-dead-forest" <?php echo ( get_option( 'swg-auth-enable-kashyyyk-dead-forest' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_enable_kashyyyk_hunting_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-enable-kashyyyk-hunting" <?php echo ( get_option( 'swg-auth-enable-kashyyyk-hunting' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_enable_kashyyyk_main_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-enable-kashyyyk-main" <?php echo ( get_option( 'swg-auth-enable-kashyyyk-main' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_enable_kashyyyk_north_dungeons_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-enable-kashyyyk-north-dungeons" <?php echo ( get_option( 'swg-auth-enable-kashyyyk-north-dungeons' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_enable_kashyyyk_pob_dungeons_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-enable-kashyyyk-pob-dungeons" <?php echo ( get_option( 'swg-auth-enable-kashyyyk-pob-dungeons' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_enable_kashyyyk_rryatt_trail_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-enable-kashyyyk-rryatt-trail" <?php echo ( get_option( 'swg-auth-enable-kashyyyk-rryatt-trail' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_enable_kashyyyk_south_dungeons_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-enable-kashyyyk-south-dungeons" <?php echo ( get_option( 'swg-auth-enable-kashyyyk-south-dungeons' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_enable_mustafar_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-enable-mustafar" <?php echo ( get_option( 'swg-auth-enable-mustafar' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_enable_naboo_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-enable-naboo" <?php echo ( get_option( 'swg-auth-enable-naboo' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_enable_rori_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-enable-rori" <?php echo ( get_option( 'swg-auth-enable-rori' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_enable_talus_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-enable-talus" <?php echo ( get_option( 'swg-auth-enable-talus' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_enable_tatooine_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-enable-tatooine" <?php echo ( get_option( 'swg-auth-enable-tatooine' ) === 'on' ) ? 'checked' : ''; ?>> Turning off Tatooine may have unexpected consequences.
  <?php
}

function swg_auth_enable_yavin4_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-enable-yavin4" <?php echo ( get_option( 'swg-auth-enable-yavin4' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_enable_space_corellia_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-enable-space-corellia" <?php echo ( get_option( 'swg-auth-enable-space-corellia' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_enable_space_dantooine_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-enable-space-dantooine" <?php echo ( get_option( 'swg-auth-enable-space-dantooine' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_enable_space_dathomir_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-enable-space-dathomir" <?php echo ( get_option( 'swg-auth-enable-space-dathomir' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_enable_space_endor_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-enable-space-endor" <?php echo ( get_option( 'swg-auth-enable-space-endor' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_enable_space_lok_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-enable-space-lok" <?php echo ( get_option( 'swg-auth-enable-space-lok' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_enable_space_kashyyyk_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-enable-space-kashyyyk" <?php echo ( get_option( 'swg-auth-enable-space-kashyyyk' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_enable_space_naboo_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-enable-space-naboo" <?php echo ( get_option( 'swg-auth-enable-space-naboo' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_enable_space_nova_orion_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-enable-space-nova-orion" <?php echo ( get_option( 'swg-auth-enable-space-nova-orion' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_enable_space_tatooine_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-enable-space-tatooine" <?php echo ( get_option( 'swg-auth-enable-space-tatooine' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_enable_space_yavin4_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-enable-space-yavin4" <?php echo ( get_option( 'swg-auth-enable-space-yavin4' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_enable_space_heavy1_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-enable-space-heavy1" <?php echo ( get_option( 'swg-auth-enable-space-heavy1' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_enable_space_light1_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-enable-space-light1" <?php echo ( get_option( 'swg-auth-enable-space-light1' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_enable_tutorial_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-enable-tutorial" <?php echo ( get_option( 'swg-auth-enable-tutorial' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_enable_dungeon1_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-enable-dungeon1" <?php echo ( get_option( 'swg-auth-enable-dungeon1' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_enable_adventure1_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-enable-adventure1" <?php echo ( get_option( 'swg-auth-enable-adventure1' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_enable_adventure2_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-enable-adventure2" <?php echo ( get_option( 'swg-auth-enable-adventure2' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_enable_space_npe_falcon_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-enable-space-npe-falcon" <?php echo ( get_option( 'swg-auth-enable-space-npe-falcon' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_enable_space_npe_falcon_2_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-enable-space-npe-falcon-2" <?php echo ( get_option( 'swg-auth-enable-space-npe-falcon-2' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_enable_space_npe_falcon_3_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-enable-space-npe-falcon-3" <?php echo ( get_option( 'swg-auth-enable-space-npe-falcon-3' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_enable_space_ord_mantell_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-enable-space-ord-mantell" <?php echo ( get_option( 'swg-auth-enable-space-ord-mantell' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_dungeons_settings_html( $args ) {
  echo '';
}

function swg_auth_Corellian_Corvette_Imperial_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-Corellian_Corvette_Imperial" <?php echo ( get_option( 'swg-auth-Corellian_Corvette_Imperial' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_Corellian_Corvette_Neutral_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-Corellian_Corvette_Neutral" <?php echo ( get_option( 'swg-auth-Corellian_Corvette_Neutral' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_Corellian_Corvette_Rebel_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-Corellian_Corvette_Rebel" <?php echo ( get_option( 'swg-auth-Corellian_Corvette_Rebel' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_Death_Watch_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-Death_Watch" <?php echo ( get_option( 'swg-auth-Death_Watch' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_Geonosian_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-Geonosian" <?php echo ( get_option( 'swg-auth-Geonosian' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_events_settings_html( $args ) {
  echo '';
}

function swg_auth_MuseumEventDuration_html( $args ) {
  ?>
  <input type="text" name="swg-auth-MuseumEventDuration" value="<?php echo esc_attr( get_option( 'swg-auth-MuseumEventDuration' ) ); ?>">
  <?php
}

function swg_auth_PoliticianEventDuration_html( $args ) {
  ?>
  <input type="text" name="swg-auth-PoliticianEventDuration" value="<?php echo esc_attr( get_option( 'swg-auth-PoliticianEventDuration' ) ); ?>">
  <?php
}

function swg_auth_anniversary_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-anniversary" <?php echo ( get_option( 'swg-auth-anniversary' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_forceFoolsDay_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-forceFoolsDay" <?php echo ( get_option( 'swg-auth-forceFoolsDay' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_gcwraid_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-gcwraid" <?php echo ( get_option( 'swg-auth-gcwraid' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_goldenTicket_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-goldenTicket" <?php echo ( get_option( 'swg-auth-goldenTicket' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_goldenTicketDropChance_html( $args ) {
  ?>
  <input type="text" name="swg-auth-goldenTicketDropChance" value="<?php echo esc_attr( get_option( 'swg-auth-goldenTicketDropChance' ) ); ?>">
  <?php
}

function swg_auth_goldenTicketsAvailable_html( $args ) {
  ?>
  <input type="text" name="swg-auth-goldenTicketsAvailable" value="<?php echo esc_attr( get_option( 'swg-auth-goldenTicketsAvailable' ) ); ?>">
  <?php
}

function swg_auth_restussEvent_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-restussEvent" <?php echo ( get_option( 'swg-auth-restussEvent' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_restussPhase_html( $args ) {
  ?>
  <select id="swg-auth-restussPhase">
    <option value="0"<?php echo get_option( 'swg-auth-restussPhase' ) === '0' ? ' selected="selected"' : ''; ?>>0</option>
    <option value="1"<?php echo get_option( 'swg-auth-restussPhase' ) === '1' ? ' selected="selected"' : ''; ?>>1</option>
    <option value="2"<?php echo get_option( 'swg-auth-restussPhase' ) === '2' ? ' selected="selected"' : ''; ?>>2</option>
  </select>
  <?php
}

function swg_auth_restussProgressionOn_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-restussProgressionOn" <?php echo ( get_option( 'swg-auth-restussProgressionOn' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_empireday_ceremony_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-empireday_ceremony" <?php echo ( get_option( 'swg-auth-empireday_ceremony' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_foolsDay_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-foolsDay" <?php echo ( get_option( 'swg-auth-foolsDay' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_halloween_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-halloween" <?php echo ( get_option( 'swg-auth-halloween' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_lifeday_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-lifeday" <?php echo ( get_option( 'swg-auth-lifeday' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_loveday_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-loveday" <?php echo ( get_option( 'swg-auth-loveday' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_advanced_server_settings_html( $args ) {
  echo "You should know what you're doing before changing these.";
}

function swg_auth_chatServiceBindInterface_html( $args ) {
  ?>
  <input type="text" name="swg-auth-chatServiceBindInterface" value="<?php echo esc_attr( get_option( 'swg-auth-chatServiceBindInterface' ) ); ?>">
  <?php
}

function swg_auth_customerServiceBindInterface_html( $args ) {
  ?>
  <input type="text" name="swg-auth-customerServiceBindInterface" value="<?php echo esc_attr( get_option( 'swg-auth-customerServiceBindInterface' ) ); ?>">
  <?php
}

function swg_auth_developmentMode_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-developmentMode" <?php echo ( get_option( 'swg-auth-developmentMode' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_newbieTutorialEnabled_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-newbieTutorialEnabled" <?php echo ( get_option( 'swg-auth-newbieTutorialEnabled' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_itvMinUsageLevel_html( $args ) {
  ?>
  <input type="text" name="swg-auth-itvMinUsageLevel" value="<?php echo esc_attr( get_option( 'swg-auth-itvMinUsageLevel' ) ); ?>">
  <?php
}

function swg_auth_gatewayServerIP_html( $args ) {
  ?>
  <input type="text" name="swg-auth-gatewayServerIP" value="<?php echo esc_attr( get_option( 'swg-auth-gatewayServerIP' ) ); ?>">
  <?php
}

function swg_auth_gatewayServerPort_html( $args ) {
  ?>
  <input type="text" name="swg-auth-gatewayServerPort" value="<?php echo esc_attr( get_option( 'swg-auth-gatewayServerPort' ) ); ?>">
  <?php
}

function swg_auth_registrarHost_html( $args ) {
  ?>
  <input type="text" name="swg-auth-registrarHost" value="<?php echo esc_attr( get_option( 'swg-auth-registrarHost' ) ); ?>">
  <?php
}

function swg_auth_registrarPort_html( $args ) {
  ?>
  <input type="text" name="swg-auth-registrarPort" value="<?php echo esc_attr( get_option( 'swg-auth-registrarPort' ) ); ?>">
  <?php
}

function swg_auth_clientOverflowLimit_html( $args ) {
  ?>
  <input type="text" name="swg-auth-clientOverflowLimit" value="<?php echo esc_attr( get_option( 'swg-auth-clientOverflowLimit' ) ); ?>">
  <?php
}

function swg_auth_disableWorldSnapshot_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-disableWorldSnapshot" <?php echo ( get_option( 'swg-auth-disableWorldSnapshot' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_pingPort_html( $args ) {
  ?>
  <input type="text" name="swg-auth-pingPort" value="<?php echo esc_attr( get_option( 'swg-auth-pingPort' ) ); ?>">
  <?php
}

function swg_auth_validateClientVersion_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-validateClientVersion" <?php echo ( get_option( 'swg-auth-validateClientVersion' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_validateStationKey_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-validateStationKey" <?php echo ( get_option( 'swg-auth-validateStationKey' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_dailyMissionXpLimit_html( $args ) {
  ?>
  <input type="text" name="swg-auth-dailyMissionXpLimit" value="<?php echo esc_attr( get_option( 'swg-auth-dailyMissionXpLimit' ) ); ?>">
  <?php
}

function swg_auth_grantElderBuff_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-grantElderBuff" <?php echo ( get_option( 'swg-auth-grantElderBuff' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_databaseProtocol_html( $args ) {
  ?>
  <input type="text" name="swg-auth-databaseProtocol" value="<?php echo esc_attr( get_option( 'swg-auth-databaseProtocol' ) ); ?>">
  <?php
}

function swg_auth_DSN_html( $args ) {
  ?>
  <input type="text" name="swg-auth-DSN" value="<?php echo esc_attr( get_option( 'swg-auth-DSN' ) ); ?>">
  <?php
}

function swg_auth_loaderThreads_html( $args ) {
  ?>
  <input type="text" name="swg-auth-loaderThreads" value="<?php echo esc_attr( get_option( 'swg-auth-loaderThreads' ) ); ?>">
  <?php
}

function swg_auth_persisterThreads_html( $args ) {
  ?>
  <input type="text" name="swg-auth-persisterThreads" value="<?php echo esc_attr( get_option( 'swg-auth-persisterThreads' ) ); ?>">
  <?php
}

function swg_auth_sharedLoginMode_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-sharedLoginMode" <?php echo ( get_option( 'swg-auth-sharedLoginMode' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_useTemplates_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-useTemplates" <?php echo ( get_option( 'swg-auth-useTemplates' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_serverSwitch_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-serverSwitch" <?php echo ( get_option( 'swg-auth-serverSwitch' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_adminGodToAll_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-adminGodToAll" <?php echo ( get_option( 'swg-auth-adminGodToAll' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_adminGodToAllGodLevel_html( $args ) {
  ?>
  <input type="text" name="swg-auth-adminGodToAllGodLevel" value="<?php echo esc_attr( get_option( 'swg-auth-adminGodToAllGodLevel' ) ); ?>">
  <?php
}

function swg_auth_aiLoggingEnabled_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-aiLoggingEnabled" <?php echo ( get_option( 'swg-auth-aiLoggingEnabled' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_allowMasterObjectCreation_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-allowMasterObjectCreation" <?php echo ( get_option( 'swg-auth-allowMasterObjectCreation' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_allowPlayersToPackVendors_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-allowPlayersToPackVendors" <?php echo ( get_option( 'swg-auth-allowPlayersToPackVendors' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_chroniclesChroniclerGoldTokenChanceOverride_html( $args ) {
  ?>
  <input type="text" name="swg-auth-chroniclesChroniclerGoldTokenChanceOverride" value="<?php echo esc_attr( get_option( 'swg-auth-chroniclesChroniclerGoldTokenChanceOverride' ) ); ?>">
  <?php
}

function swg_auth_chroniclesChroniclerSilverTokenNumModifier_html( $args ) {
  ?>
  <input type="text" name="swg-auth-chroniclesChroniclerSilverTokenNumModifier" value="<?php echo esc_attr( get_option( 'swg-auth-chroniclesChroniclerSilverTokenNumModifier' ) ); ?>">
  <?php
}

function swg_auth_chroniclesQuestorGoldTokenChanceOverride_html( $args ) {
  ?>
  <input type="text" name="swg-auth-chroniclesQuestorGoldTokenChanceOverride" value="<?php echo esc_attr( get_option( 'swg-auth-chroniclesQuestorGoldTokenChanceOverride' ) ); ?>">
  <?php
}

function swg_auth_chroniclesQuestorSilverTokenNumModifier_html( $args ) {
  ?>
  <input type="text" name="swg-auth-chroniclesQuestorSilverTokenNumModifier" value="<?php echo esc_attr( get_option( 'swg-auth-chroniclesQuestorSilverTokenNumModifier' ) ); ?>">
  <?php
}

function swg_auth_combatUpgradeReward_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-combatUpgradeReward" <?php echo ( get_option( 'swg-auth-combatUpgradeReward' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_commoditiesMarketEnabled_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-commoditiesMarketEnabled" <?php echo ( get_option( 'swg-auth-commoditiesMarketEnabled' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_createAppearances_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-createAppearances" <?php echo ( get_option( 'swg-auth-createAppearances' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_createZoneObjects_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-createZoneObjects" <?php echo ( get_option( 'swg-auth-createZoneObjects' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_debugMode_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-debugMode" <?php echo ( get_option( 'swg-auth-debugMode' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_deleteEventProps_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-deleteEventProps" <?php echo ( get_option( 'swg-auth-deleteEventProps' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_disableResources_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-disableResources" <?php echo ( get_option( 'swg-auth-disableResources' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_drainRate_html( $args ) {
  ?>
  <input type="text" name="swg-auth-drainRate" value="<?php echo esc_attr( get_option( 'swg-auth-drainRate' ) ); ?>">
  <?php
}

function swg_auth_enableCovertImperialMercenary_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-enableCovertImperialMercenary" <?php echo ( get_option( 'swg-auth-enableCovertImperialMercenary' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_enableCovertRebelMercenary_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-enableCovertRebelMercenary" <?php echo ( get_option( 'swg-auth-enableCovertRebelMercenary' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_enableOvertImperialMercenary_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-enableOvertImperialMercenary" <?php echo ( get_option( 'swg-auth-enableOvertImperialMercenary' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_enableOvertRebelMercenary_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-enableOvertRebelMercenary" <?php echo ( get_option( 'swg-auth-enableOvertRebelMercenary' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_enablePreload_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-enablePreload" <?php echo ( get_option( 'swg-auth-enablePreload' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_fatalOnGoldPobChange_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-fatalOnGoldPobChange" <?php echo ( get_option( 'swg-auth-fatalOnGoldPobChange' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_flashSpeederReward_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-flashSpeederReward" <?php echo ( get_option( 'swg-auth-flashSpeederReward' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_gcwcitybestine_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-gcwcitybestine" <?php echo ( get_option( 'swg-auth-gcwcitybestine' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_gcwcitydearic_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-gcwcitydearic" <?php echo ( get_option( 'swg-auth-gcwcitydearic' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_gcwcitykeren_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-gcwcitykeren" <?php echo ( get_option( 'swg-auth-gcwcitykeren' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_gcwInvasionCityMaximumRunning_html( $args ) {
  ?>
  <input type="text" name="swg-auth-gcwInvasionCityMaximumRunning" value="<?php echo esc_attr( get_option( 'swg-auth-gcwInvasionCityMaximumRunning' ) ); ?>">
  <?php
}

function swg_auth_gcwInvasionCycleTime_html( $args ) {
  ?>
  <input type="text" name="swg-auth-gcwInvasionCycleTime" value="<?php echo esc_attr( get_option( 'swg-auth-gcwInvasionCycleTime' ) ); ?>">
  <?php
}

function swg_auth_grantGift_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-grantGift" <?php echo ( get_option( 'swg-auth-grantGift' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_hibernateDistance_html( $args ) {
  ?>
  <input type="text" name="swg-auth-hibernateDistance" value="<?php echo esc_attr( get_option( 'swg-auth-hibernateDistance' ) ); ?>">
  <?php
}

function swg_auth_hibernateEnabled_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-hibernateEnabled" <?php echo ( get_option( 'swg-auth-hibernateEnabled' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_hibernateProxies_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-hibernateProxies" <?php echo ( get_option( 'swg-auth-hibernateProxies' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_idleLogoutTimeSec_html( $args ) {
  ?>
  <input type="text" name="swg-auth-idleLogoutTimeSec" value="<?php echo esc_attr( get_option( 'swg-auth-idleLogoutTimeSec' ) ); ?>">
  <?php
}

function swg_auth_javaConsoleDebugMessages_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-javaConsoleDebugMessages" <?php echo ( get_option( 'swg-auth-javaConsoleDebugMessages' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_javaEngineProfiling_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-javaEngineProfiling" <?php echo ( get_option( 'swg-auth-javaEngineProfiling' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_javaLocalRefLimit_html( $args ) {
  ?>
  <input type="text" name="swg-auth-javaLocalRefLimit" value="<?php echo esc_attr( get_option( 'swg-auth-javaLocalRefLimit' ) ); ?>">
  <?php
}

function swg_auth_javaVMName_html( $args ) {
  ?>
  <input type="text" name="swg-auth-javaVMName" value="<?php echo esc_attr( get_option( 'swg-auth-javaVMName' ) ); ?>">
  <?php
}

function swg_auth_maxGoldNetworkId_html( $args ) {
  ?>
  <input type="text" name="swg-auth-maxGoldNetworkId" value="<?php echo esc_attr( get_option( 'swg-auth-maxGoldNetworkId' ) ); ?>">
  <?php
}

function swg_auth_maxItemAttribBonus_html( $args ) {
  ?>
  <input type="text" name="swg-auth-maxItemAttribBonus" value="<?php echo esc_attr( get_option( 'swg-auth-maxItemAttribBonus' ) ); ?>">
  <?php
}

function swg_auth_maxObjectSkillModBonus_html( $args ) {
  ?>
  <input type="text" name="swg-auth-maxObjectSkillModBonus" value="<?php echo esc_attr( get_option( 'swg-auth-maxObjectSkillModBonus' ) ); ?>">
  <?php
}

function swg_auth_maxRespecCount_html( $args ) {
  ?>
  <input type="text" name="swg-auth-maxRespecCount" value="<?php echo esc_attr( get_option( 'swg-auth-maxRespecCount' ) ); ?>">
  <?php
}

function swg_auth_maxSocketSkillModBonus_html( $args ) {
  ?>
  <input type="text" name="swg-auth-maxSocketSkillModBonus" value="<?php echo esc_attr( get_option( 'swg-auth-maxSocketSkillModBonus' ) ); ?>">
  <?php
}

function swg_auth_minRespecIntervalInSeconds_html( $args ) {
  ?>
  <input type="text" name="swg-auth-minRespecIntervalInSeconds" value="<?php echo esc_attr( get_option( 'swg-auth-minRespecIntervalInSeconds' ) ); ?>">
  <?php
}

function swg_auth_mountsEnabled_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-mountsEnabled" <?php echo ( get_option( 'swg-auth-mountsEnabled' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_nameValidationAcceptAll_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-nameValidationAcceptAll" <?php echo ( get_option( 'swg-auth-nameValidationAcceptAll' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_regenActionScale_html( $args ) {
  ?>
  <input type="text" name="swg-auth-regenActionScale" value="<?php echo esc_attr( get_option( 'swg-auth-regenActionScale' ) ); ?>">
  <?php
}

function swg_auth_regenBase_html( $args ) {
  ?>
  <input type="text" name="swg-auth-regenBase" value="<?php echo esc_attr( get_option( 'swg-auth-regenBase' ) ); ?>">
  <?php
}

function swg_auth_regenConstant_html( $args ) {
  ?>
  <input type="text" name="swg-auth-regenConstant" value="<?php echo esc_attr( get_option( 'swg-auth-regenConstant' ) ); ?>">
  <?php
}

function swg_auth_regenerationRate_html( $args ) {
  ?>
  <input type="text" name="swg-auth-regenerationRate" value="<?php echo esc_attr( get_option( 'swg-auth-regenerationRate' ) ); ?>">
  <?php
}

function swg_auth_regenHealthScale_html( $args ) {
  ?>
  <input type="text" name="swg-auth-regenHealthScale" value="<?php echo esc_attr( get_option( 'swg-auth-regenHealthScale' ) ); ?>">
  <?php
}

function swg_auth_regenMindScale_html( $args ) {
  ?>
  <input type="text" name="swg-auth-regenMindScale" value="<?php echo esc_attr( get_option( 'swg-auth-regenMindScale' ) ); ?>">
  <?php
}

function swg_auth_regenScale_html( $args ) {
  ?>
  <input type="text" name="swg-auth-regenScale" value="<?php echo esc_attr( get_option( 'swg-auth-regenScale' ) ); ?>">
  <?php
}

function swg_auth_reservedObjectIds_html( $args ) {
  ?>
  <input type="text" name="swg-auth-reservedObjectIds" value="<?php echo esc_attr( get_option( 'swg-auth-reservedObjectIds' ) ); ?>">
  <?php
}

function swg_auth_respecDurationAllowedInSeconds_html( $args ) {
  ?>
  <input type="text" name="swg-auth-respecDurationAllowedInSeconds" value="<?php echo esc_attr( get_option( 'swg-auth-respecDurationAllowedInSeconds' ) ); ?>">
  <?php
}

function swg_auth_rlsDropChance_html( $args ) {
  ?>
  <input type="text" name="swg-auth-rlsDropChance" value="<?php echo esc_attr( get_option( 'swg-auth-rlsDropChance' ) ); ?>">
  <?php
}

function swg_auth_rlsEnabled_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-rlsEnabled" <?php echo ( get_option( 'swg-auth-rlsEnabled' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_rlsExceptionalDropChance_html( $args ) {
  ?>
  <input type="text" name="swg-auth-rlsExceptionalDropChance" value="<?php echo esc_attr( get_option( 'swg-auth-rlsExceptionalDropChance' ) ); ?>">
  <?php
}

function swg_auth_rlsLegendaryDropChance_html( $args ) {
  ?>
  <input type="text" name="swg-auth-rlsLegendaryDropChance" value="<?php echo esc_attr( get_option( 'swg-auth-rlsLegendaryDropChance' ) ); ?>">
  <?php
}

function swg_auth_rlsMaxLevelsAbovePlayerLevel_html( $args ) {
  ?>
  <input type="text" name="swg-auth-rlsMaxLevelsAbovePlayerLevel" value="<?php echo esc_attr( get_option( 'swg-auth-rlsMaxLevelsAbovePlayerLevel' ) ); ?>">
  <?php
}

function swg_auth_rlsMaxLevelsBelowPlayerLevel_html( $args ) {
  ?>
  <input type="text" name="swg-auth-rlsMaxLevelsBelowPlayerLevel" value="<?php echo esc_attr( get_option( 'swg-auth-rlsMaxLevelsBelowPlayerLevel' ) ); ?>">
  <?php
}

function swg_auth_rlsMinDistanceFromLastLoot_html( $args ) {
  ?>
  <input type="text" name="swg-auth-rlsMinDistanceFromLastLoot" value="<?php echo esc_attr( get_option( 'swg-auth-rlsMinDistanceFromLastLoot' ) ); ?>">
  <?php
}

function swg_auth_rlsMinTimeBetweenAwards_html( $args ) {
  ?>
  <input type="text" name="swg-auth-rlsMinTimeBetweenAwards" value="<?php echo esc_attr( get_option( 'swg-auth-rlsMinTimeBetweenAwards' ) ); ?>">
  <?php
}

function swg_auth_rlsRareDropChance_html( $args ) {
  ?>
  <input type="text" name="swg-auth-rlsRareDropChance" value="<?php echo esc_attr( get_option( 'swg-auth-rlsRareDropChance' ) ); ?>">
  <?php
}

function swg_auth_scriptPath_html( $args ) {
  ?>
  <input type="text" name="swg-auth-scriptPath" value="<?php echo esc_attr( get_option( 'swg-auth-scriptPath' ) ); ?>">
  <?php
}

function swg_auth_scriptWatcherInterruptTime_html( $args ) {
  ?>
  <input type="text" name="swg-auth-scriptWatcherInterruptTime" value="<?php echo esc_attr( get_option( 'swg-auth-scriptWatcherInterruptTime' ) ); ?>">
  <?php
}

function swg_auth_scriptWatcherWarnTime_html( $args ) {
  ?>
  <input type="text" name="swg-auth-scriptWatcherWarnTime" value="<?php echo esc_attr( get_option( 'swg-auth-scriptWatcherWarnTime' ) ); ?>">
  <?php
}

function swg_auth_sendBreadcrumbs_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-sendBreadcrumbs" <?php echo ( get_option( 'swg-auth-sendBreadcrumbs' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_sendPlayerTransform_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-sendPlayerTransform" <?php echo ( get_option( 'swg-auth-sendPlayerTransform' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_serverLoadLevel_html( $args ) {
  ?>
  <select id="swg-auth-serverLoadLevel">
    <option value="light"<?php echo get_option( 'swg-auth-serverLoadLevel' ) === 'light' ? ' selected="selected"' : ''; ?>>light</option>
    <option value="medium"<?php echo get_option( 'swg-auth-serverLoadLevel' ) === 'medium' ? ' selected="selected"' : ''; ?>>medium</option>
    <option value="heavy"<?php echo get_option( 'swg-auth-serverLoadLevel' ) === 'heavy' ? ' selected="selected"' : ''; ?>>heavy</option>
  </select>
  <?php
}

function swg_auth_serverSpawnLimit_html( $args ) {
  ?>
  <input type="text" name="swg-auth-serverSpawnLimit" value="<?php echo esc_attr( get_option( 'swg-auth-serverSpawnLimit' ) ); ?>">
  <?php
}

function swg_auth_spaceGcwCorelliaActive_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-spaceGcwCorelliaActive" <?php echo ( get_option( 'swg-auth-spaceGcwCorelliaActive' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_spaceGcwCorelliaDelay_html( $args ) {
  ?>
  <input type="text" name="swg-auth-spaceGcwCorelliaDelay" value="<?php echo esc_attr( get_option( 'swg-auth-spaceGcwCorelliaDelay' ) ); ?>">
  <?php
}

function swg_auth_spaceGcwCorelliaStagger_html( $args ) {
  ?>
  <input type="text" name="swg-auth-spaceGcwCorelliaStagger" value="<?php echo esc_attr( get_option( 'swg-auth-spaceGcwCorelliaStagger' ) ); ?>">
  <?php
}

function swg_auth_spaceGcwDantooineActive_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-spaceGcwDantooineActive" <?php echo ( get_option( 'swg-auth-spaceGcwDantooineActive' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_spaceGcwDantooineDelay_html( $args ) {
  ?>
  <input type="text" name="swg-auth-spaceGcwDantooineDelay" value="<?php echo esc_attr( get_option( 'swg-auth-spaceGcwDantooineDelay' ) ); ?>">
  <?php
}

function swg_auth_spaceGcwDantooineStagger_html( $args ) {
  ?>
  <input type="text" name="swg-auth-spaceGcwDantooineStagger" value="<?php echo esc_attr( get_option( 'swg-auth-spaceGcwDantooineStagger' ) ); ?>">
  <?php
}

function swg_auth_spaceGcwGunshipPlayerCeiling_html( $args ) {
  ?>
  <input type="text" name="swg-auth-spaceGcwGunshipPlayerCeiling" value="<?php echo esc_attr( get_option( 'swg-auth-spaceGcwGunshipPlayerCeiling' ) ); ?>">
  <?php
}

function swg_auth_spaceGcwLengthOfBattle_html( $args ) {
  ?>
  <input type="text" name="swg-auth-spaceGcwLengthOfBattle" value="<?php echo esc_attr( get_option( 'swg-auth-spaceGcwLengthOfBattle' ) ); ?>">
  <?php
}

function swg_auth_spaceGcwLokActive_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-spaceGcwLokActive" <?php echo ( get_option( 'swg-auth-spaceGcwLokActive' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_spaceGcwLokDelay_html( $args ) {
  ?>
  <input type="text" name="swg-auth-spaceGcwLokDelay" value="<?php echo esc_attr( get_option( 'swg-auth-spaceGcwLokDelay' ) ); ?>">
  <?php
}

function swg_auth_spaceGcwLokStagger_html( $args ) {
  ?>
  <input type="text" name="swg-auth-spaceGcwLokStagger" value="<?php echo esc_attr( get_option( 'swg-auth-spaceGcwLokStagger' ) ); ?>">
  <?php
}

function swg_auth_spaceGcwLossPointModifier_html( $args ) {
  ?>
  <input type="text" name="swg-auth-spaceGcwLossPointModifier" value="<?php echo esc_attr( get_option( 'swg-auth-spaceGcwLossPointModifier' ) ); ?>">
  <?php
}

function swg_auth_spaceGcwLossTokenModifier_html( $args ) {
  ?>
  <input type="text" name="swg-auth-spaceGcwLossTokenModifier" value="<?php echo esc_attr( get_option( 'swg-auth-spaceGcwLossTokenModifier' ) ); ?>">
  <?php
}

function swg_auth_spaceGcwMaxSupportShips_html( $args ) {
  ?>
  <input type="text" name="swg-auth-spaceGcwMaxSupportShips" value="<?php echo esc_attr( get_option( 'swg-auth-spaceGcwMaxSupportShips' ) ); ?>">
  <?php
}

function swg_auth_spaceGcwNabooActive_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-spaceGcwNabooActive" <?php echo ( get_option( 'swg-auth-spaceGcwNabooActive' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_spaceGcwNabooDelay_html( $args ) {
  ?>
  <input type="text" name="swg-auth-spaceGcwNabooDelay" value="<?php echo esc_attr( get_option( 'swg-auth-spaceGcwNabooDelay' ) ); ?>">
  <?php
}

function swg_auth_spaceGcwNabooStagger_html( $args ) {
  ?>
  <input type="text" name="swg-auth-spaceGcwNabooStagger" value="<?php echo esc_attr( get_option( 'swg-auth-spaceGcwNabooStagger' ) ); ?>">
  <?php
}

function swg_auth_spaceGcwPobPlayerCeiling_html( $args ) {
  ?>
  <input type="text" name="swg-auth-spaceGcwPobPlayerCeiling" value="<?php echo esc_attr( get_option( 'swg-auth-spaceGcwPobPlayerCeiling' ) ); ?>">
  <?php
}

function swg_auth_spaceGcwPointAward_html( $args ) {
  ?>
  <input type="text" name="swg-auth-spaceGcwPointAward" value="<?php echo esc_attr( get_option( 'swg-auth-spaceGcwPointAward' ) ); ?>">
  <?php
}

function swg_auth_spaceGcwPrepatoryTime_html( $args ) {
  ?>
  <input type="text" name="swg-auth-spaceGcwPrepatoryTimespaceGcwPrepatoryTime" value="<?php echo esc_attr( get_option( 'swg-auth-spaceGcwPrepatoryTime' ) ); ?>">
  <?php
}

function swg_auth_spaceGcwPvEPointModifier_html( $args ) {
  ?>
  <input type="text" name="swg-auth-spaceGcwPvEPointModifier" value="<?php echo esc_attr( get_option( 'swg-auth-spaceGcwPvEPointModifier' ) ); ?>">
  <?php
}

function swg_auth_spaceGcwPvETokenModifier_html( $args ) {
  ?>
  <input type="text" name="swg-auth-spaceGcwPvETokenModifier" value="<?php echo esc_attr( get_option( 'swg-auth-spaceGcwPvETokenModifier' ) ); ?>">
  <?php
}

function swg_auth_spaceGcwPvPPointModifier_html( $args ) {
  ?>
  <input type="text" name="swg-auth-spaceGcwPvPPointModifier" value="<?php echo esc_attr( get_option( 'swg-auth-spaceGcwPvPPointModifier' ) ); ?>">
  <?php
}

function swg_auth_spaceGcwPvPTokenModifier_html( $args ) {
  ?>
  <input type="text" name="swg-auth-spaceGcwPvPTokenModifier" value="<?php echo esc_attr( get_option( 'swg-auth-spaceGcwPvPTokenModifier' ) ); ?>">
  <?php
}

function swg_auth_spaceGcwTatooineActive_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-spaceGcwTatooineActive" <?php echo ( get_option( 'swg-auth-spaceGcwTatooineActive' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_spaceGcwTatooineDelay_html( $args ) {
  ?>
  <input type="text" name="swg-auth-spaceGcwTatooineDelay" value="<?php echo esc_attr( get_option( 'swg-auth-spaceGcwTatooineDelay' ) ); ?>">
  <?php
}

function swg_auth_spaceGcwTatooineStagger_html( $args ) {
  ?>
  <input type="text" name="swg-auth-spaceGcwTatooineStagger" value="<?php echo esc_attr( get_option( 'swg-auth-spaceGcwTatooineStagger' ) ); ?>">
  <?php
}

function swg_auth_spaceGcwTokenAward_html( $args ) {
  ?>
  <input type="text" name="swg-auth-spaceGcwTokenAward" value="<?php echo esc_attr( get_option( 'swg-auth-spaceGcwTokenAward' ) ); ?>">
  <?php
}

function swg_auth_spaceGcwTotalSupportSpawn_html( $args ) {
  ?>
  <input type="text" name="swg-auth-spaceGcwTotalSupportSpawn" value="<?php echo esc_attr( get_option( 'swg-auth-spaceGcwTotalSupportSpawn' ) ); ?>">
  <?php
}

function swg_auth_spaceGcwWinPointModifier_html( $args ) {
  ?>
  <input type="text" name="swg-auth-spaceGcwWinPointModifier" value="<?php echo esc_attr( get_option( 'swg-auth-spaceGcwWinPointModifier' ) ); ?>">
  <?php
}

function swg_auth_spaceGcwWinTokenModifier_html( $args ) {
  ?>
  <input type="text" name="swg-auth-spaceGcwWinTokenModifier" value="<?php echo esc_attr( get_option( 'swg-auth-spaceGcwWinTokenModifier' ) ); ?>">
  <?php
}

function swg_auth_spawnAllResources_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-spawnAllResources" <?php echo ( get_option( 'swg-auth-spawnAllResources' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_startX_html( $args ) {
  ?>
  <input type="text" name="swg-auth-startX" value="<?php echo esc_attr( get_option( 'swg-auth-startX' ) ); ?>">
  <?php
}

function swg_auth_startY_html( $args ) {
  ?>
  <input type="text" name="swg-auth-startY" value="<?php echo esc_attr( get_option( 'swg-auth-startY' ) ); ?>">
  <?php
}

function swg_auth_startZ_html( $args ) {
  ?>
  <input type="text" name="swg-auth-startZ" value="<?php echo esc_attr( get_option( 'swg-auth-startZ' ) ); ?>">
  <?php
}

function swg_auth_suiListLimit_html( $args ) {
  ?>
  <input type="text" name="swg-auth-suiListLimit" value="<?php echo esc_attr( get_option( 'swg-auth-suiListLimit' ) ); ?>">
  <?php
}

function swg_auth_veteranDebugEnableOverrideAccountAge_html( $args ) {
  ?>
  <input type="text" name="swg-auth-veteranDebugEnableOverrideAccountAge" value="<?php echo esc_attr( get_option( 'swg-auth-veteranDebugEnableOverrideAccountAge' ) ); ?>">
  <?php
}

function swg_auth_veteranDebugTriggerAll_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-veteranDebugTriggerAll" <?php echo ( get_option( 'swg-auth-veteranDebugTriggerAll' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_passthroughMode_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-passthroughMode" <?php echo ( get_option( 'swg-auth-passthroughMode' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_loadWholePlanet_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-loadWholePlanet" <?php echo ( get_option( 'swg-auth-loadWholePlanet' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_numTutorialServers_html( $args ) {
  ?>
  <input type="text" name="swg-auth-numTutorialServers" value="<?php echo esc_attr( get_option( 'swg-auth-numTutorialServers' ) ); ?>">
  <?php
}

function swg_auth_CommunityCraftingLimit_html( $args ) {
  ?>
  <input type="text" name="swg-auth-CommunityCraftingLimit" value="<?php echo esc_attr( get_option( 'swg-auth-CommunityCraftingLimit' ) ); ?>">
  <?php
}

function swg_auth_CraftingContract_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-CraftingContract" <?php echo ( get_option( 'swg-auth-CraftingContract' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_CrowdPleaser_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-CrowdPleaser" <?php echo ( get_option( 'swg-auth-CrowdPleaser' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_liveSpaceServer_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-liveSpaceServer" <?php echo ( get_option( 'swg-auth-liveSpaceServer' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_npeSequencersActive_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-npeSequencersActive" <?php echo ( get_option( 'swg-auth-npeSequencersActive' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_spawnersOn_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-spawnersOn" <?php echo ( get_option( 'swg-auth-spawnersOn' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_metricsServerPort_html( $args ) {
  ?>
  <input type="text" name="swg-auth-metricsServerPort" value="<?php echo esc_attr( get_option( 'swg-auth-metricsServerPort' ) ); ?>">
  <?php
}

function swg_auth_searchPath0_html( $args ) {
  ?>
  <input type="text" name="swg-auth-searchPath0" value="<?php echo esc_attr( get_option( 'swg-auth-searchPath0' ) ); ?>">
  <?php
}

function swg_auth_searchPath1a_html( $args ) {
  ?>
  <input type="text" name="swg-auth-searchPath1a" value="<?php echo esc_attr( get_option( 'swg-auth-searchPath1a' ) ); ?>">
  <?php
}

function swg_auth_searchPath1b_html( $args ) {
  ?>
  <input type="text" name="swg-auth-searchPath1b" value="<?php echo esc_attr( get_option( 'swg-auth-searchPath1b' ) ); ?>">
  <?php
}

function swg_auth_searchPath2a_html( $args ) {
  ?>
  <input type="text" name="swg-auth-searchPath2a" value="<?php echo esc_attr( get_option( 'swg-auth-searchPath2a' ) ); ?>">
  <?php
}

function swg_auth_searchPath2b_html( $args ) {
  ?>
  <input type="text" name="swg-auth-searchPath2b" value="<?php echo esc_attr( get_option( 'swg-auth-searchPath2b' ) ); ?>">
  <?php
}

function swg_auth_debugReportLongFrames_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-debugReportLongFrames" <?php echo ( get_option( 'swg-auth-debugReportLongFrames' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_fatalCallStackDepth_html( $args ) {
  ?>
  <input type="text" name="swg-auth-fatalCallStackDepth" value="<?php echo esc_attr( get_option( 'swg-auth-fatalCallStackDepth' ) ); ?>">
  <?php
}

function swg_auth_frameRateLimit_html( $args ) {
  ?>
  <input type="text" name="swg-auth-frameRateLimit" value="<?php echo esc_attr( get_option( 'swg-auth-frameRateLimit' ) ); ?>">
  <?php
}

function swg_auth_warningCallStackDepth_html( $args ) {
  ?>
  <input type="text" name="swg-auth-warningCallStackDepth" value="<?php echo esc_attr( get_option( 'swg-auth-warningCallStackDepth' ) ); ?>">
  <?php
}

function swg_auth_byteCountWarnThreshold_html( $args ) {
  ?>
  <input type="text" name="swg-auth-byteCountWarnThreshold" value="<?php echo esc_attr( get_option( 'swg-auth-byteCountWarnThreshold' ) ); ?>">
  <?php
}

function swg_auth_congestionWindowMinimum_html( $args ) {
  ?>
  <input type="text" name="swg-auth-congestionWindowMinimum" value="<?php echo esc_attr( get_option( 'swg-auth-congestionWindowMinimum' ) ); ?>">
  <?php
}

function swg_auth_enableFlushAndConfirmAllData_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-enableFlushAndConfirmAllData" <?php echo ( get_option( 'swg-auth-enableFlushAndConfirmAllData' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_fragmentSize_html( $args ) {
  ?>
  <input type="text" name="swg-auth-fragmentSize" value="<?php echo esc_attr( get_option( 'swg-auth-fragmentSize' ) ); ?>">
  <?php
}

function swg_auth_incomingBufferSize_html( $args ) {
  ?>
  <input type="text" name="swg-auth-incomingBufferSize" value="<?php echo esc_attr( get_option( 'swg-auth-incomingBufferSize' ) ); ?>">
  <?php
}

function swg_auth_logBackloggedPacketThreshold_html( $args ) {
  ?>
  <input type="text" name="swg-auth-logBackloggedPacketThreshold" value="<?php echo esc_attr( get_option( 'swg-auth-logBackloggedPacketThreshold' ) ); ?>">
  <?php
}

function swg_auth_maxOutstandingBytes_html( $args ) {
  ?>
  <input type="text" name="swg-auth-maxOutstandingBytes" value="<?php echo esc_attr( get_option( 'swg-auth-maxOutstandingBytes' ) ); ?>">
  <?php
}

function swg_auth_maxOutstandingPackets_html( $args ) {
  ?>
  <input type="text" name="swg-auth-maxOutstandingPackets" value="<?php echo esc_attr( get_option( 'swg-auth-maxOutstandingPackets' ) ); ?>">
  <?php
}

function swg_auth_maxRawPacketSize_html( $args ) {
  ?>
  <input type="text" name="swg-auth-maxRawPacketSize" value="<?php echo esc_attr( get_option( 'swg-auth-maxRawPacketSize' ) ); ?>">
  <?php
}

function swg_auth_noDataTimeout_html( $args ) {
  ?>
  <input type="text" name="swg-auth-noDataTimeout" value="<?php echo esc_attr( get_option( 'swg-auth-noDataTimeout' ) ); ?>">
  <?php
}

function swg_auth_oldestUnacknowledgedTimeout_html( $args ) {
  ?>
  <input type="text" name="swg-auth-oldestUnacknowledgedTimeout" value="<?php echo esc_attr( get_option( 'swg-auth-oldestUnacknowledgedTimeout' ) ); ?>">
  <?php
}

function swg_auth_outgoingBufferSize_html( $args ) {
  ?>
  <input type="text" name="swg-auth-outgoingBufferSize" value="<?php echo esc_attr( get_option( 'swg-auth-outgoingBufferSize' ) ); ?>">
  <?php
}

function swg_auth_overflowLimit_html( $args ) {
  ?>
  <input type="text" name="swg-auth-overflowLimit" value="<?php echo esc_attr( get_option( 'swg-auth-overflowLimit' ) ); ?>">
  <?php
}

function swg_auth_packetHistoryMax_html( $args ) {
  ?>
  <input type="text" name="swg-auth-packetHistoryMax" value="<?php echo esc_attr( get_option( 'swg-auth-packetHistoryMax' ) ); ?>">
  <?php
}

function swg_auth_pooledPacketMax_html( $args ) {
  ?>
  <input type="text" name="swg-auth-pooledPacketMax" value="<?php echo esc_attr( get_option( 'swg-auth-pooledPacketMax' ) ); ?>">
  <?php
}

function swg_auth_pooledPacketSize_html( $args ) {
  ?>
  <input type="text" name="swg-auth-pooledPacketSize" value="<?php echo esc_attr( get_option( 'swg-auth-pooledPacketSize' ) ); ?>">
  <?php
}

function swg_auth_reportMessages_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-reportMessages" <?php echo ( get_option( 'swg-auth-reportMessages' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_reservedPorta_html( $args ) {
  ?>
  <input type="text" name="swg-auth-reservedPorta" value="<?php echo esc_attr( get_option( 'swg-auth-reservedPorta' ) ); ?>">
  <?php
}

function swg_auth_reservedPortb_html( $args ) {
  ?>
  <input type="text" name="swg-auth-reservedPortb" value="<?php echo esc_attr( get_option( 'swg-auth-reservedPortb' ) ); ?>">
  <?php
}

function swg_auth_reservedPortc_html( $args ) {
  ?>
  <input type="text" name="swg-auth-reservedPortc" value="<?php echo esc_attr( get_option( 'swg-auth-reservedPortc' ) ); ?>">
  <?php
}

function swg_auth_reservedPortd_html( $args ) {
  ?>
  <input type="text" name="swg-auth-reservedPortd" value="<?php echo esc_attr( get_option( 'swg-auth-reservedPortd' ) ); ?>">
  <?php
}

function swg_auth_reservedPorte_html( $args ) {
  ?>
  <input type="text" name="swg-auth-reservedPorte" value="<?php echo esc_attr( get_option( 'swg-auth-reservedPorte' ) ); ?>">
  <?php
}

function swg_auth_reservedPortf_html( $args ) {
  ?>
  <input type="text" name="swg-auth-reservedPortf" value="<?php echo esc_attr( get_option( 'swg-auth-reservedPortf' ) ); ?>">
  <?php
}

function swg_auth_reservedPortg_html( $args ) {
  ?>
  <input type="text" name="swg-auth-reservedPortg" value="<?php echo esc_attr( get_option( 'swg-auth-reservedPortg' ) ); ?>">
  <?php
}

function swg_auth_reservedPorth_html( $args ) {
  ?>
  <input type="text" name="swg-auth-reservedPorth" value="<?php echo esc_attr( get_option( 'swg-auth-reservedPorth' ) ); ?>">
  <?php
}

function swg_auth_reservedPorti_html( $args ) {
  ?>
  <input type="text" name="swg-auth-reservedPorti" value="<?php echo esc_attr( get_option( 'swg-auth-reservedPorti' ) ); ?>">
  <?php
}

function swg_auth_reservedPortj_html( $args ) {
  ?>
  <input type="text" name="swg-auth-reservedPortj" value="<?php echo esc_attr( get_option( 'swg-auth-reservedPortj' ) ); ?>">
  <?php
}

function swg_auth_reservedPortk_html( $args ) {
  ?>
  <input type="text" name="swg-auth-reservedPortk" value="<?php echo esc_attr( get_option( 'swg-auth-reservedPortk' ) ); ?>">
  <?php
}

function swg_auth_reservedPortl_html( $args ) {
  ?>
  <input type="text" name="swg-auth-reservedPortl" value="<?php echo esc_attr( get_option( 'swg-auth-reservedPortl' ) ); ?>">
  <?php
}

function swg_auth_reservedPortm_html( $args ) {
  ?>
  <input type="text" name="swg-auth-reservedPortm" value="<?php echo esc_attr( get_option( 'swg-auth-reservedPortm' ) ); ?>">
  <?php
}

function swg_auth_reservedPortn_html( $args ) {
  ?>
  <input type="text" name="swg-auth-reservedPortn" value="<?php echo esc_attr( get_option( 'swg-auth-reservedPortn' ) ); ?>">
  <?php
}

function swg_auth_reservedPorto_html( $args ) {
  ?>
  <input type="text" name="swg-auth-reservedPorto" value="<?php echo esc_attr( get_option( 'swg-auth-reservedPorto' ) ); ?>">
  <?php
}

function swg_auth_reservedPortp_html( $args ) {
  ?>
  <input type="text" name="swg-auth-reservedPortp" value="<?php echo esc_attr( get_option( 'swg-auth-reservedPortp' ) ); ?>">
  <?php
}

function swg_auth_environmentVariablea_html( $args ) {
  ?>
  <input type="text" name="swg-auth-environmentVariablea" value="<?php echo esc_attr( get_option( 'swg-auth-environmentVariablea' ) ); ?>">
  <?php
}

function swg_auth_environmentVariableb_html( $args ) {
  ?>
  <input type="text" name="swg-auth-environmentVariableb" value="<?php echo esc_attr( get_option( 'swg-auth-environmentVariableb' ) ); ?>">
  <?php
}

function swg_auth_environmentVariablec_html( $args ) {
  ?>
  <input type="text" name="swg-auth-environmentVariablec" value="<?php echo esc_attr( get_option( 'swg-auth-environmentVariablec' ) ); ?>">
  <?php
}

function swg_auth_custom_server_settings_html( $args ) {
  echo '';
}

function swg_auth_custom_server_setting_html( $args ) {
  ?>
  Arbitraty text entered here will be appended to the generated config file. Please be careful.<hr />
  <textarea rows="10" name="swg-auth-custom-server-setting"><?php echo get_option( 'swg-auth-custom-server-setting' ); ?></textarea>
  <?php
}
