<?php 
if ( ! defined( 'ABSPATH' ) ) exit;
require(WDButton_PATH.'admin/includes/custom_setting_get.php');
?>
<div class="buton_layout_container">
	<input type="radio" name="button_layout" id="simple_button" data-wdbutton="buttons" value="simple_button" <?php echo  esc_attr(($custom_data['button_layout']=='simple_button'))?'checked':''; ?>>
	<label for="simple_button">
		<img src="<?php echo esc_url( WDButton_URL.'/images/layouts/button_layout_1.png'); ?>">
		<h2 align="center" class="h2"><?php echo __( 'Simple Button','button' ) ?></h2>
		<a href="<?php echo esc_url('http://webdzier.com/demo/plugins/wd-button-pro/'); ?>"><?php echo __( 'Demo','button' ) ?></a>
	</label>

	
	<label for="2d_transitions">
		<div class="wdbutton_ribbon"><a target="_blank" href="<?php echo esc_url('http://webdzier.com/'); ?>"><span><?php echo __( 'Available in Pro','button' ) ?></span></a></div>
		<img src="<?php echo esc_url( WDButton_URL.'/images/layouts/2d_transition_layout.png');?>">
		<h2 align="center" class="h2"><?php echo __( '2D Transitions','button' ) ?></h2>
		<a href="<?php echo esc_url('http://webdzier.com/demo/plugins/wd-button-pro/2d-transitions/'); ?>"><?php echo __( 'Demo','button' ) ?></a>
	</label>

	
	<label for="border_transitions">
		<div class="wdbutton_ribbon"><a target="_blank" href="<?php echo esc_url('http://webdzier.com/'); ?>"><span><?php echo __( 'Available in Pro','button' ) ?></span></a></div>
		<img src="<?php echo esc_url( WDButton_URL.'/images/layouts/border_transitions.png');?>">
		<h2 align="center" class="h2"><?php echo __( 'Border Transitions','button' ) ?></h2>
		<a href="<?php echo esc_url('http://webdzier.com/demo/plugins/wd-button-pro/border-transitions/'); ?>"><?php echo __( 'Demo','button' ) ?></a>
	</label>

	
	<label for="curl">
		<div class="wdbutton_ribbon"><a target="_blank" href="<?php echo esc_url('http://webdzier.com/'); ?>"><span><?php echo __( 'Available in Pro','button' ) ?></span></a></div>
		<img src="<?php echo esc_url( WDButton_URL.'/images/layouts/curl_layout.png');?>">
		<h2 align="center" class="h2"><?php echo __( 'Curl','button' ) ?></h2>
		<a href="<?php echo esc_url('http://webdzier.com/demo/plugins/wd-button-pro/curl/'); ?>"><?php echo __( 'Demo','button' ) ?></a>
	</label>

	
	<label for="speech_bubbles">
		<div class="wdbutton_ribbon"><a target="_blank" href="<?php echo esc_url('http://webdzier.com/'); ?>"><span><?php echo __( 'Available in Pro','button' ) ?></span></a></div>
		<img src="<?php echo esc_url( WDButton_URL.'/images/layouts/speech_bouble_layout.png');?>">
		<h2 align="center" class="h2"><?php echo __( 'Speech Bubble','button' ) ?></h2>
		<a href="<?php echo esc_url('http://webdzier.com/demo/plugins/wd-button-pro/speech-bubble/'); ?>"><?php echo __( 'Demo','button' ) ?></a>
	</label>

	
	<label for="background_transitions">
		<div class="wdbutton_ribbon"><a target="_blank" href="<?php echo esc_url('http://webdzier.com/'); ?>"><span><?php echo __( 'Available in Pro','button' ) ?></span></a></div>
		<img src="<?php echo esc_url( WDButton_URL.'/images/layouts/background_transition_layout.png');?>">
		<h2 align="center" class="h2"><?php echo __( 'BG Transition','button' ) ?></h2>
		<a href="<?php echo esc_url('http://webdzier.com/demo/plugins/wd-button-pro/bg-transition/'); ?>"><?php echo __( 'Demo','button' ) ?></a>
	</label>

	
	<label for="icons">
		<div class="wdbutton_ribbon"><a target="_blank" href="<?php echo esc_url('http://webdzier.com/'); ?>"><span><?php echo __( 'Available in Pro','button' ) ?></span></a></div>
		<img src="<?php echo esc_url( WDButton_URL.'/images/layouts/icon_simple.png');?>">
		<h2 align="center" class="h2"><?php echo __( 'Icon Button','button' ) ?></h2>
		<a href="<?php echo esc_url('http://webdzier.com/demo/plugins/wd-button-pro/icon-button/'); ?>"><?php echo __( 'Demo','button' ) ?></a>
	</label>	

	
	<label for="icon_with_text">
		<div class="wdbutton_ribbon"><a target="_blank" href="<?php echo esc_url('http://webdzier.com/'); ?>"><span><?php echo __( 'Available in Pro','button' ) ?></span></a></div>
		<img src="<?php echo esc_url( WDButton_URL.'/images/layouts/icon_with_text.png');?>">
		<h2 align="center" class="h2"><?php echo __( 'Icon With Text','button' ) ?></h2>
		<a href="<?php echo esc_url('http://webdzier.com/demo/plugins/wd-button-pro/icon-with-text/'); ?>"><?php echo __( 'Demo','button' ) ?></a>
	</label>	

	
	<label for="hexagons">
		<div class="wdbutton_ribbon"><a target="_blank" href="<?php echo esc_url('http://webdzier.com/'); ?>"><span><?php echo __( 'Available in Pro','button' ) ?></span></a></div>
		<img src="<?php echo esc_url( WDButton_URL.'/images/layouts/hexagons_layout.png');?>">
		<h2 align="center" class="h2"><?php echo __( 'Hexagon','button' ) ?></h2>
		<a href="<?php echo esc_url('http://webdzier.com/demo/plugins/wd-button-pro/hexagon/'); ?>"><?php echo __( 'Demo','button' ) ?></a>
	</label>
	
</div>

<!--------------button sets------------>

<div class="buton_layout_container buton_sets_container">
	<h2><?php echo __( 'Button Sets','button' ) ?></h2>
	

	<label for="social_button_set_with_icon">
		<div class="wdbutton_ribbon"><a target="_blank" href="<?php echo esc_url('http://webdzier.com/'); ?>"><span><?php echo __( 'Available in Pro','button' ) ?></span></a></div>
		<img src="<?php echo esc_url( WDButton_URL.'/images/button_sets/button_sets.png');?>">		
		<a href="<?php echo esc_url('http://webdzier.com/demo/plugins/wd-button-pro/social-button-sets/'); ?>"><?php echo __( 'Demo','button' ) ?></a>
	</label>

	
	<label for="social_model_1">
		<div class="wdbutton_ribbon"><a target="_blank" href="<?php echo esc_url('http://webdzier.com/'); ?>"><span><?php echo __( 'Available in Pro','button' ) ?></span></a></div>
		<img src="<?php echo esc_url( WDButton_URL.'/images/button_sets/social_model_1.png');?>">		
		<a href="<?php echo esc_url('http://webdzier.com/demo/plugins/wd-button-pro/social-button-sets/'); ?>"><?php echo __( 'Demo','button' ) ?></a>
	</label>
	

	
	<label for="social_model_2">
		<div class="wdbutton_ribbon"><a target="_blank" href="<?php echo esc_url('http://webdzier.com/'); ?>"><span><?php echo __( 'Available in Pro','button' ) ?></span></a></div>
		<img src="<?php echo esc_url( WDButton_URL.'/images/button_sets/social_model_2.png');?>">		
		<a href="<?php echo esc_url('http://webdzier.com/demo/plugins/wd-button-pro/social-button-sets/'); ?>"><?php echo __( 'Demo','button' ) ?></a>
	</label>

	
	<label for="social_model_3">
		<div class="wdbutton_ribbon"><a target="_blank" href="<?php echo esc_url('http://webdzier.com/'); ?>"><span><?php echo __( 'Available in Pro','button' ) ?></span></a></div>
		<img src="<?php echo esc_url( WDButton_URL.'/images/button_sets/social_model_3.png');?>">		
		<a href="<?php echo esc_url('http://webdzier.com/demo/plugins/wd-button-pro/social-button-sets/'); ?>"><?php echo __( 'Demo','button' ) ?></a>
	</label>
	
	<label for="social_model_4">
		<div class="wdbutton_ribbon"><a target="_blank" href="<?php echo esc_url('http://webdzier.com/'); ?>"><span><?php echo __( 'Available in Pro','button' ) ?></span></a></div>
		<img src="<?php echo esc_url( WDButton_URL.'/images/button_sets/social_model_4.png');?>">		
		<a href="<?php echo esc_url('http://webdzier.com/demo/plugins/wd-button-pro/social-button-sets/'); ?>"><?php echo __( 'Demo','button' ) ?></a>
	</label>
	
	<label for="social_model_5">
		<div class="wdbutton_ribbon"><a target="_blank" href="<?php echo esc_url('http://webdzier.com/'); ?>"><span><?php echo __( 'Available in Pro','button' ) ?></span></a></div>
		<img src="<?php echo esc_url( WDButton_URL.'/images/button_sets/social_model_5.png');?>">		
		<a href="<?php echo esc_url('http://webdzier.com/demo/plugins/wd-button-pro/social-button-sets/'); ?>"><?php echo __( 'Demo','button' ) ?></a>
	</label>
	
	<label for="social_model_6">
		<div class="wdbutton_ribbon"><a target="_blank" href="<?php echo esc_url('http://webdzier.com/'); ?>"><span><?php echo __( 'Available in Pro','button' ) ?></span></a></div>
		<img src="<?php echo esc_url( WDButton_URL.'/images/button_sets/social_model_6.png');?>">		
		<a href="<?php echo esc_url('http://webdzier.com/demo/plugins/wd-button-pro/social-button-sets/'); ?>"><?php echo __( 'Demo','button' ) ?></a>
	</label>	
</div>