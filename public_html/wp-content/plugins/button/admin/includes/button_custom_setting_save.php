<?php 
if ( ! defined( 'ABSPATH' ) ) exit;
if(isset($post) && isset($_POST['button_layout']))
{
	$wdbtn_array =array();
	$key_array=array(
		'button_layout',
		'button_text',
		'button_link',		
		'button_target',
		'padding_top',
		'padding_right',
		'padding_bottom',
		'padding_left',
		'button_width',
		'button_height',
		'button_text_color',
		'button_text_hover_color',
		'font_family',
		'font_size',
		'text_bold',
		'text_italic',
		'text_align',
		'button_circle',
		'border_top_left',
		'border_top_right',
		'border_bottom_left',
		'border_bottom_right',
		'border_style',
		'border_width',
		'border_color',
		'border_hover_color',
		'border_shadow_color',
		'border_shadow_hover_color',
		'border_shadow_offset_left',
		'border_shadow_offset_top',
		'border_shadow_blur',
		'button_bg_color_start',
		'button_bg_color_end',
		'button_bg_hover_color_start',
		'button_bg_hover_color_end',
		'opacity_start',
		'opacity_end',
		'hover_opacity_start',
		'hover_opacity_end',
		'gradient_stop',
		'container_use',
		'container_center',
		'container_width',
		'button_align',
		'margin_top',
		'margin_right',
		'margin_bottom',
		'margin_left',
		'shadow_offset_left',
		'shadow_offset_top',
		'shadow_blur',
		'shadow_color',
		'shadow_hover_color',
		'custom_css',);
	foreach ($key_array as $value) 
	{
		$wdbtn_array[$value] =sanitize_text_field($_POST[$value]);
	}
	$wdbtn_array = serialize($wdbtn_array);			
	update_post_meta($post,'button_custom_setting_'.$post,$wdbtn_array);
}
?>