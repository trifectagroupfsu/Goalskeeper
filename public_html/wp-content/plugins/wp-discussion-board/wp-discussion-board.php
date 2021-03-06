<?php
/* 
Plugin Name: Discussion Board
Plugin URI: https://discussionboard.pro/
Description: Provide a simple discussion board for your site
Version: 2.2.2
Author: Catapult Themes
Author URI: https://catapultthemes.com/
Text Domain: wp-discussion-board
Domain Path: /languages
*/

// Exit if accessed directly

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function ctdb_load_plugin_textdomain() {
    load_plugin_textdomain( 'wp-discussion-board', FALSE, basename( dirname( __FILE__ ) ) . '/languages/' );
}
add_action( 'plugins_loaded', 'ctdb_load_plugin_textdomain' );

/**
 * Define constants
 **/
if ( ! defined( 'DB_PLUGIN_URL' ) ) {
	define( 'DB_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
}
if ( ! defined( 'DB_PLUGIN_DIR' ) ) {
	define( 'DB_PLUGIN_DIR', dirname( __FILE__ ) );
}
if ( ! defined( 'DB_PLUGIN_VERSION' ) ) {
	define( 'DB_PLUGIN_VERSION', '2.2.2' );
}
// Plugin Root File.
if ( ! defined( 'DB_PLUGIN_FILE' ) ) {
	define( 'DB_PLUGIN_FILE', __FILE__ );
}

/**
 * Load her up.
 **/
require_once dirname( __FILE__ ) . '/includes/install.php';
require_once dirname( __FILE__ ) . '/includes/customizer.php';

if( is_admin() ) {
	require_once dirname( __FILE__ ) . '/includes/admin/admin-settings.php';
	require_once dirname( __FILE__ ) . '/includes/admin/class-ct-db-admin.php';
	require_once dirname( __FILE__ ) . '/includes/admin/class-ct-db-admin-notices.php';
	require_once dirname( __FILE__ ) . '/includes/admin/class-ct-db-admin-upgrades.php';
}
require_once dirname( __FILE__ ) . '/includes/classes/class-ct-db-public.php';
require_once dirname( __FILE__ ) . '/includes/classes/class-ct-db-front-end.php';
require_once dirname( __FILE__ ) . '/includes/classes/class-ct-db-notifications.php';
require_once dirname( __FILE__ ) . '/includes/classes/class-ct-db-template-loader.php';
require_once dirname( __FILE__ ) . '/includes/classes/class-ct-db-registration.php';
require_once dirname( __FILE__ ) . '/includes/classes/class-ct-db-skins.php';
require_once dirname( __FILE__ ) . '/includes/classes/class-ct-db-user.php';
require_once dirname( __FILE__ ) . '/includes/functions/functions-layout.php';
require_once dirname( __FILE__ ) . '/includes/functions/functions-skins.php';
require_once dirname( __FILE__ ) . '/includes/functions/functions-user.php';

function ctdb_public_init() {
	global $CT_DB_Public;
	$CT_DB_Public = new CT_DB_Public();
	$CT_DB_Public -> init();
	// Make this global
	global $CT_DB_Skins;
	$CT_DB_Skins = new CT_DB_Skins();
	$CT_DB_Skins->init();
	do_action( 'ct_db_public_init' );
}
add_action( 'plugins_loaded', 'ctdb_public_init' );

/**
 * This function allows you to track usage of your plugin
 * Place in your main plugin file
 * Refer to https://wisdomplugin.com/support for help
 */
if( ! class_exists( 'Plugin_Usage_Tracker') ) {
	require_once dirname( __FILE__ ) . '/tracking/class-plugin-usage-tracker.php';
}
if( ! function_exists( 'wp_discussion_board_start_plugin_tracking' ) ) {
	function wp_discussion_board_start_plugin_tracking() {
		$wisdom = new Plugin_Usage_Tracker(
			__FILE__,
			'https://wisdomplugin.com',
			array('ctdb_options_settings','ctdb_design_settings','ctdb_user_settings'),
			true,
			true,
			1
		);
	}
	wp_discussion_board_start_plugin_tracking();
}
