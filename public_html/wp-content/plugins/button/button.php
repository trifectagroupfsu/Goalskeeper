<?php 
/*
Plugin Name: Button
Plugin URI: http://webdzier.com
Description: WordPress button generator plugin.You can create any type of button. <a href="http://webdzier.com">Get Pro version</a>.
Version: 1.0.0
Author: webdzier
Author URI: http://webdzier.com
Text Domain: button 
Domain Path: /languages
*/


if ( ! defined( 'ABSPATH' ) ) exit;

define("WDButton_URL", plugin_dir_url(__FILE__));
define('WDButton_PATH',plugin_dir_path(__FILE__));


add_action('plugins_loaded', 'WDButton_GetReadyTranslation');
function WDButton_GetReadyTranslation() {
	load_plugin_textdomain('button', FALSE, dirname( plugin_basename(__FILE__)).'/languages/' );
}

register_activation_hook(__FILE__, 'WDButton_activation_setting');	
function WDButton_activation_setting(){
	require_once(WDButton_PATH.'admin/includes/button_default_setting.php');
}

register_deactivation_hook(__FILE__,'WDButton_deactivation_setting');
function WDButton_deactivation_setting(){
	delete_option('button_Default_Setting');
}

add_action('wp_enqueue_scripts', 'WDButton_default_style');
function WDButton_default_style(){		
	wp_enqueue_style('wd_default_style',WDButton_URL.'/user_view/coman_css/wd_default_style.css');
}

function WDbutton_current_user(){
	if ( current_user_can( 'administrator' ) ) {
		if(is_admin()){	
			require_once(WDButton_PATH.'admin/classes/WDButton_CPT_class.class.php');	
			require_once(WDButton_PATH.'admin/classes/WDButton_admin_style_script.class.php');	
			require_once(WDButton_PATH.'admin/classes/WDButton_metaboxes_class.class.php');

			new WDButton_CPT_class();
			new WDButton_admin_style_script();	
			new WDButton_metaboxes_class();	
		}	
	}	
}
add_action( 'plugins_loaded', 'WDbutton_current_user');

require_once(WDButton_PATH.'user_view/classes/WDButton_shortcode_class.class.php');	
new WDButton_shortcode_class();
require_once(WDButton_PATH.'admin/classes/widget/button_widget.php');

?>