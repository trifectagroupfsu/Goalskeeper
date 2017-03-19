<?php 

/**
* 
*/
if ( ! defined( 'ABSPATH' ) ) exit;
class WDButton_metaboxes_class
{
	
	function __construct()
	{
		add_action('add_meta_boxes',array(&$this, 'WDButton_meta_box_function'));
		add_action('save_post',array(&$this,'WDButton_custom_setting_save'));		
	}

	function WDButton_meta_box_function(){

		add_meta_box('layout_metabox',  __('Button Layouts', 'button'),array(&$this, 'WDButton_layout_select'),
			'wd_button','normal','low');
		
		add_meta_box('WDButton_setting_metabox', __('Button Settings', 'button'),array(&$this, 'WDButton_setting_metabox'),
			'wd_button','normal','low');

		
		add_meta_box('WD_shortcode_meta_box', __('Shortcode', 'button'),array(&$this, 'WD_shortcode_meta_box'),
			'wd_button','side','low');

		add_meta_box('WDbutton_rateus', __('Rate Us If You Like This Plugin', 'button'), array(&$this, 'WDbutton_rateus_function'), 'wd_button', 'side', 'low');
	}	

	function WDButton_layout_select($post){ 
		require_once(WDButton_PATH.'admin/setting_UI/layouts.php');
	}

	function WDButton_setting_metabox($post){ 
		require(WDButton_PATH.'admin/includes/setting_button.php');		
	}	

	function WDButton_custom_setting_save($post){
		require_once(WDButton_PATH.'admin/includes/button_custom_setting_save.php');
	}

	function WD_shortcode_meta_box($post){
		?>	
		<div class="shortcode_meta_box">
			<input type="text" value="<?php echo "[WD_Button id=".get_the_ID()."]"; ?>" onclick="<?php echo esc_js( 'jQuery(this).select()' ); ?>" readonly/>
		</div>
		<?php 
	}

	function WDbutton_rateus_function(){
		require_once(WDButton_PATH.'admin/includes/rate_us.php');		
	}


}
?>