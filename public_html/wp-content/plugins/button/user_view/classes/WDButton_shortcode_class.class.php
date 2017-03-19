<?php 
/**
* 
*/
if ( ! defined( 'ABSPATH' ) ) exit;
class WDButton_shortcode_class
{
	
	function __construct()
	{
		add_shortcode( 'WD_Button', array(&$this, 'WD_Button_shortcode') );
		
	}
	

	function WD_Button_shortcode($post){
		ob_start();
		$id=$post['id'];
		$ids=explode(",", $id);
		?><script src="https://ajax.googleapis.com/ajax/libs/webfont/1.5.10/webfont.js"></script><?php
		foreach ($ids as $id) {
			if(isset($id)){
				$custom_data = unserialize(get_post_meta($id,'button_custom_setting_'.$id, true));


				require(WDButton_PATH.'user_view/includes/font_family.php');
				require_once(WDButton_PATH.'user_view/includes/rgba_color.php');	

				/**bg color**/
				$button_bg_color_start=WDButton_rgba( $custom_data['button_bg_color_start'], $custom_data['opacity_start']);
				$button_bg_color_end=WDButton_rgba( $custom_data['button_bg_color_end'], $custom_data['opacity_end']);
				$button_bg_hover_color_start=WDButton_rgba( $custom_data['button_bg_hover_color_start'], $custom_data['hover_opacity_start']);
				$button_bg_hover_color_end=WDButton_rgba( $custom_data['button_bg_hover_color_end'], $custom_data['hover_opacity_end']);

				?> <style type="text/css"><?php echo $custom_data['custom_css']; ?></style><?php
				
				if($custom_data['button_layout']=="simple_button"){
					require(WDButton_PATH.'user_view/button_layouts/simple_button/simple_button.php');
				}
			}		
		}	
		
		return ob_get_clean();
	}
}
?>