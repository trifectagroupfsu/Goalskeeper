<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<div class="container">
	<h2 class="home_title"><?php _e( 'Border', 'button' ); ?></h2>
	<div class="input_group button_circle">
		<div class="input_label">
			<label><?php _e( 'Button Circle', 'button' ); ?></label>
		</div>
		<div class="input_field">
			<input type="checkbox" name="button_circle" value="1" <?php if($custom_data['button_circle']==1){echo "checked";} ?>>
		</div>		
		<div class="clear_fix"></div> 
		<p>Note :-  Button height and width should be same.</p>	
	</div>
	<div class="input_group radius_section hexagons_none circle_icon_none">
		<div class="input_label">
			<label><?php _e( 'Radius', 'button' ); ?></label>
		</div>
		<div class="input_field">
			<div class="input two_col button_radius">
				<label><?php _e( 'Top Left', 'button' ); ?></label>
				<input type="number" class="input_box" name="border_top_left" value="<?php echo esc_attr($custom_data['border_top_left']); ?>">
				<span class="px"><?php _e( 'PX', 'button' ); ?></span>
				<span class="dashicons dashicons-arrow-left-alt2 top_left"></span>
			</div>

			<div class="input two_col button_radius">
				<span class="dashicons dashicons-arrow-left-alt2 top_right"></span>
				<input type="number" class="input_box" name="border_top_right" value="<?php echo esc_attr($custom_data['border_top_right']); ?>">
				<span class="px"><?php _e( 'PX', 'button' ); ?></span>				
				<label><?php _e( 'Top Right', 'button' ); ?></label>
			</div>

			<div class="input two_col button_radius">
				<label><?php _e( 'Bootom Left', 'button' ); ?></label>
				
				<input type="number" class="input_box" name="border_bottom_left" value="<?php echo esc_attr($custom_data['border_bottom_left']); ?>">
				<span class="px"><?php _e( 'PX', 'button' ); ?></span>
				<span class="dashicons dashicons-arrow-left-alt2 bottom_left"></span>
				
			</div>

			<div class="input two_col button_radius">
				<span class="dashicons dashicons-arrow-left-alt2 bottom_right"></span>
				<input type="number" class="input_box" name="border_bottom_right" value="<?php echo esc_attr($custom_data['border_bottom_right']); ?>">
				<span class="px"><?php _e( 'PX', 'button' ); ?></span>
				<label><?php _e( 'Bootom Right', 'button' ); ?></label>
				
			</div>
		</div>
		<div class="clear_fix"></div> 
	</div>

	<div class="input_group style_section border_transitions_none curl_none">
		<div class="input_label">
			<label><?php _e( 'Style', 'button' ); ?></label>
		</div>
		<div class="input_field">
			<div class="input two_col border_style">
				<?php $border_style=array('none','solid','double','dashed','dotted','inset','groove','ridge','outset'); ?>				
				<select name="border_style">
					<?php 
					foreach ($border_style as $val ) {
						?>
						<option value="<?php echo $val;?>" <?php selected($custom_data['border_style'],$val) ?>><?php echo esc_attr($val); ?></option>
						<?php
					}
					?>													
				</select>
			</div>

			<div class="input text_right two_col border_style hexagons_none" >
				<label><?php _e( 'Width', 'button' ); ?></label>
				<input type="number" class="input_box" name="border_width" value="<?php echo esc_attr($custom_data['border_width']); ?>">
				<span class="px"><?php _e( 'PX', 'button' ); ?></span>
			</div>	
		</div>
		<div class="clear_fix"></div> 
	</div>

	<div class="input_group border_color_section border_transitions_none curl_none">
		<div class="input_label">
			<label><?php _e( 'Border', 'button' ); ?></label>
		</div>
		<div class="input_field">
			<div class="input two_col">
				<label><?php _e( 'Color', 'button' ); ?></label>
				<input name="border_color" type="text" value="<?php echo esc_attr($custom_data['border_color']); ?>" class="button_color_field" data-default-color="#000000" />
			</div>

			<div class="input two_col" >
				<label><?php _e( 'Hover Color', 'button' ); ?></label>
				<input name="border_hover_color" type="text" value="<?php echo esc_attr($custom_data['border_hover_color']); ?>" class="button_color_field" data-default-color="#000000" />
			</div>				

		</div>
		<div class="clear_fix"></div> 
	</div>

	<div class="input_group border_shadow_section hexagons_none">
		<div class="input_label">
			<label><?php _e( 'Border Shadow', 'button' ); ?></label>
		</div>
		<div class="input_field">
			<div class="input two_col">
				<label><?php _e( 'Color', 'button' ); ?></label>
				<input name="border_shadow_color" type="text" value="<?php echo esc_attr($custom_data['border_shadow_color']); ?>" class="button_color_field" data-default-color="#000000" />
			</div>

			<div class="input two_col" >
				<label><?php _e( 'Hover Color', 'button' ); ?></label>
				<input name="border_shadow_hover_color" type="text" value="<?php echo esc_attr($custom_data['border_shadow_hover_color']); ?>" class="button_color_field" data-default-color="#000000" />
			</div>				

		</div>
		<div class="clear_fix"></div> 
	</div>

	<div class="input_group shadow_offset_section hexagons_none">
		<div class="input_label">
			<label><?php _e( 'Shadow Offset', 'button' ); ?> </label>
		</div>
		<div class="input_field">
			<div class="input two_col">
				<label><?php _e( 'Left', 'button' ); ?></label>
				<input type="number" class="input_box" name="border_shadow_offset_left" value="<?php echo esc_attr($custom_data['border_shadow_offset_left']); ?>">
			</div>

			<div class="input two_col" >
				<label><?php _e( 'Top', 'button' ); ?></label>
				<input type="number" class="input_box" name="border_shadow_offset_top" value="<?php echo esc_attr($custom_data['border_shadow_offset_top']); ?>">
			</div>				

		</div>
		<div class="clear_fix"></div> 
	</div>

	<div class="input_group shadow_blur_section border_none hexagons_none">
		<div class="input_label">
			<label><?php _e( 'Shadow Blur', 'button' ); ?> </label>
		</div>
		<div class="input_field">
			<div class="input two_col">				
				<input type="number" class="input_box" name="border_shadow_blur" value="<?php echo esc_attr($custom_data['border_shadow_blur']); ?>">
			</div>
		</div>
		<div class="clear_fix"></div> 
	</div>
</div>