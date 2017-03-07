<?php 
if ( ! defined( 'ABSPATH' ) ) exit;
$default_setting=serialize(array(
	'button_layout'=>'simple_button',
	'button_text'=>'Your Text',	
	'button_link'=>'',	
	'button_target'=>1,
	'padding_top'=>10,
	'padding_right'=>10,
	'padding_bottom'=>10,
	'padding_left'=>10,
	'button_width'=>140,
	'button_height'=>45,
	'button_text_color'=>'#ffffff',
	'button_text_hover_color'=>'#823aa0',
	'font_family'=>'Arial',
	'font_size'=>15,
	'text_bold'=>'',
	'text_italic'=>'',
	'text_align'=>'center',
	'button_circle'=>0,
	'border_top_left'=>10,
	'border_top_right'=>10,
	'border_bottom_left'=>10,
	'border_bottom_right'=>10,
	'border_style'=>'solid',
	'border_width'=>1,
	'border_color'=>'#823aa0',
	'border_hover_color'=>'#823aa0',
	'border_shadow_color'=>'#b5b5b5',
	'border_shadow_hover_color'=>'#b5b5b5',
	'border_shadow_offset_left'=>0,
	'border_shadow_offset_top'=>0,
	'border_shadow_blur'=>0,
	'button_bg_color_start'=>'#823aa0',
	'button_bg_color_end'=>'#823aa0',
	'button_bg_hover_color_start'=>'#ffffff',
	'button_bg_hover_color_end'=>'#ffffff',
	'opacity_start'=>100,
	'opacity_end'=>100,
	'hover_opacity_start'=>100,
	'hover_opacity_end'=>100,
	'gradient_stop'=>45,
	'container_use'=>0,
	'container_center'=>1,
	'container_width'=>140,
	'button_align'=>'center',
	'margin_top'=>10,
	'margin_right'=>10,
	'margin_bottom'=>10,
	'margin_left'=>10,
	'shadow_offset_left'=>0,
	'shadow_offset_top'=>0,
	'shadow_blur'=>0,
	'shadow_color'=>'#ffffff',
	'shadow_hover_color'=>'#ffffff',
	'custom_css'=>'',
	));

add_option("button_Default_Setting",$default_setting);
?>