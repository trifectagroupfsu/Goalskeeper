<?php 
if ( ! defined( 'ABSPATH' ) ) exit;
require(WDButton_PATH.'admin/includes/custom_setting_get.php');
?>

<div class="wdbutton_preview_box">
	<h2 class="header">Live Preview</h2>
	<div class="wdbutton_preview_style"></div>	
	<div class="wdbutton_live">
		
	</div>
	<h3 class="header_hover">Hover</h3>
	<div class="wdbutton_live_hover"></div>	
</div>
<div class="wdbutton_settings_box">
	<div class="wrapper buttons"><?php  
	require_once(WDButton_PATH.'admin/setting_UI/button_setting_basic.php');
	require_once(WDButton_PATH.'admin/setting_UI/button_setting_text_shadow.php');
	require_once(WDButton_PATH.'admin/setting_UI/button_setting_border.php'); 
	require_once(WDButton_PATH.'admin/setting_UI/button_setting_background.php'); 
	require_once(WDButton_PATH.'admin/setting_UI/button_setting_container.php'); 
	?></div>
	
</div>