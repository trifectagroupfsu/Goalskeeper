<?php
if ( ! defined( 'ABSPATH' ) ) exit;
require(WDButton_PATH.'user_view/coman_css/custom_css.php');
if($custom_data['button_target']==1){$button_target="_blank";}else{$button_target="_self";}
?>
<div class="button_wrapper_id_<?php echo $id; ?>">
	<div class="button_container button_container_id_<?php echo esc_attr($id); ?>">	
		<a href="<?php echo esc_url($custom_data['button_link']); ?>" target="<?php echo esc_attr($button_target); ?>" id="wd_button" class="wd-hvr-simple wd_button_<?php echo esc_attr($id);?>"><?php echo esc_attr($custom_data['button_text']); ?></a>	
		<div class="clear_fix"></div>
	</div>
</div>