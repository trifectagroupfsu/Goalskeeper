jQuery(function(){

	jQuery(".wdbutton_preview_box").draggable({});	
	var WDButton_URL=php_vars.WDButton_URL;
	var myInterval;
	var button_layout;
	var button_layout_checked=jQuery('input[name=button_layout]:checked').val();
	

	myIntervalstart(button_layout_checked);

	jQuery('input[name=button_layout]').click(function(){
		button_layout=jQuery(this).val();
		myIntervalstop();
		if(button_layout!= undefined){
			myIntervalstart(button_layout);
		}		
	});	

	function myIntervalstart(button_layout) {
		myInterval=setInterval(function(){
			button_preview(button_layout);
		},500);
	}
	
	function myIntervalstop() {
		clearInterval(myInterval);
	}

	function button_preview(button_layout){
		var button_data=preview_data_store();
		button_effect(button_layout);

		if(button_layout=='simple_button'){				
			preview_button(button_data,button_layout);			
			hover_preview_button(button_data,button_layout);
		}	
	}

	
	function preview_button(button_data,button_layout){
		var button_html;		
		var style=wdbutton_data(button_data,button_layout);
		button_html=abc(button_layout,style,button_data);		
		jQuery(".wdbutton_preview_box .wdbutton_live").html(button_html);

	}

	function hover_preview_button(button_data,button_layout){		
		var button_hover_html;
		var hover_style=hover_data(button_data,button_layout);		
		button_hover_html=abc(button_layout,hover_style,button_data);
		jQuery(".wdbutton_preview_box .wdbutton_live_hover").html(button_hover_html);
			//myIntervalstop()

		}

		function abc(button_layout,style,button_data){
			var button_html;
			if(button_layout=='simple_button'){
				button_html='<a style="'+style+'">'+button_data['button_text']+'</a>';
			}

			return button_html;
		}

		function wdbutton_data(button_data,button_layout){
			var style;
			style='';			

			style+='width:'+ button_data['button_width'] +'px;';
			style+='height:'+ button_data['button_height'] +'px;';
			style+='padding-top:'+button_data['padding_top'] +'px;';
			style+='padding-right:'+button_data['padding_right'] +'px;';
			style+='padding-bottom:'+ button_data['padding_bottom'] +'px;';
			style+='padding-left:'+ button_data['padding_left'] +'px;';
			style+='font-size:'+ button_data['font_size'] +'px;';
			style+='text-align:'+ button_data['text_align'] +';';
			style+='font-family:'+ button_data['font_family'] +';';


			

			if(button_data['button_circle']==1 ){ 			
				style+='border-radius:50%;';

			}else{
				button_data['button_circle']="";
				style+='border-top-left-radius:'+ button_data['border_top_left'] +'px;';
				style+='border-top-right-radius:'+ button_data['border_top_right'] +'px;';
				style+='border-bottom-left-radius:'+ button_data['border_bottom_left'] +'px;';
				style+='border-bottom-right-radius:'+ button_data['border_bottom_right'] +'px;';
			}

			style+='color:'+ button_data['button_text_color'] +';';			

			if(button_data['text_bold']=='bold'){style+='font-weight:'+ button_data['text_bold'] +';';}
			if(button_data['text_italic']=='italic'){style+='font-style:'+ button_data['text_italic'] +';';}

			
			style+='text-shadow:'+ button_data['shadow_offset_left']+'px '+ button_data['shadow_offset_top']+'px '+ button_data['shadow_blur']+'px '+ button_data['shadow_color']+';';

			

			style+='box-shadow:'+ button_data['border_shadow_offset_left']+'px '+ button_data['border_shadow_offset_top']+'px '+ button_data['border_shadow_blur']+'px '+ button_data['border_shadow_color']+';';
			style+='border-style:'+ button_data['border_style'] +';';
			style+='border-width:'+ button_data['border_width'] +'px;';
			style+='border-color:'+ button_data['border_color'] +';';

			/*opacity color*/
			button_data['button_bg_color_start']=colorconvertHex(button_data['button_bg_color_start'],button_data['opacity_start']);
			button_data['button_bg_color_end']=colorconvertHex(button_data['button_bg_color_end'],button_data['opacity_end']);


			style+='background:-webkit-gradient(linear, left top, left bottom, color-stop('+ button_data['gradient_stop']+'%,'+button_data['button_bg_color_start']+'),color-stop(1,'+button_data['button_bg_color_end']+'));';
			style+='background:-moz-linear-gradient('+ button_data['button_bg_color_start']+' '+button_data['gradient_stop']+'%, '+button_data['button_bg_color_end']+');';
			style+='background:-o-linear-gradient('+ button_data['button_bg_color_start']+' '+button_data['gradient_stop']+'%, '+button_data['button_bg_color_end']+');';
			style+='background:linear-gradient('+ button_data['button_bg_color_start']+' '+button_data['gradient_stop']+'%, '+button_data['button_bg_color_end']+');';
			return style;
		}

		function hover_data(button_data,button_layout){

			button_data['button_text_color']=button_data['button_text_hover_color'];
			button_data['shadow_color']=button_data['shadow_hover_color'];
			button_data['border_color']=button_data['border_hover_color'];
			button_data['border_shadow_color']=button_data['border_shadow_hover_color'];
			button_data['button_bg_color_start']=button_data['button_bg_hover_color_start'];
			button_data['button_bg_color_end']=button_data['button_bg_hover_color_end'];
			button_data['opacity_start']=button_data['hover_opacity_start'];
			button_data['opacity_end']=button_data['hover_opacity_end'];

		//alert(button_data['border_transitions_width']button_data['border_transitions_color'])
		
		var hover_style=wdbutton_data(button_data,button_layout);
		return hover_style;
	}

	function hexagons_style(){
		var style;
	}

	function hexagons_hover_style(){
		var style;
	}

	function preview_data_store(){
		var myarr={};
		jQuery( ".wdbutton_settings_box input[type=text]" ).map(function(n,i) {		
			myarr[ this.name ] = jQuery(this).val(); 
		});

		jQuery( ".wdbutton_settings_box input[type=number]" ).map(function(n,i) {		
			myarr[ this.name ] = jQuery(this).val(); 
		});

		jQuery( ".wdbutton_settings_box input[type=checkbox]:checked" ).map(function(n,i) {		
			myarr[ this.name ] = jQuery(this).val(); 
		});

		jQuery( ".wdbutton_settings_box input[type=radio]:checked" ).map(function(n,i) {		
			myarr[ this.name ] = jQuery(this).val(); 
		});
		
		jQuery( ".wdbutton_settings_box select" ).map(function(n,i) {		
			myarr[ this.name ] = jQuery(this).val();
		});

		jQuery( ".button_effect_section input[type=number]" ).map(function(n,i) {		
			myarr[ this.name ] = jQuery(this).val(); 
		});

		jQuery( ".button_effect_section input[type=text]" ).map(function(n,i) {		
			myarr[ this.id ] = jQuery(this).val(); 
		});

		jQuery( ".button_effect_section input[type=radio]:checked" ).map(function(n,i) {		
			myarr[ this.name ] = jQuery(this).val(); 
		});

		jQuery( ".button_effect_section select" ).map(function(n,i) {		
			myarr[ this.name ] = jQuery(this).val();
		});

		return myarr;		
	}

	function colorconvertHex(hex,opacity){
		hex = hex.replace('#','');
		r = parseInt(hex.substring(0,2), 16);
		g = parseInt(hex.substring(2,4), 16);
		b = parseInt(hex.substring(4,6), 16);

		result = 'rgba('+r+','+g+','+b+','+opacity/100+')';
		return result;
	}

	function button_effect(button_layout){
		jQuery('.'+button_layout).change(function(){
			//myIntervalstart(button_layout);
			//button_preview(button_layout);
		});
	}

	function my_ajax(button_data,button_layout){

		jQuery.ajax({

			url:WDButton_URL+'user_view/button_layouts/'+button_layout+'/css/'+button_layout+'_hover.php',
			type:'POST',
			data:{'hover_class':button_data[button_layout]},
			beforeSend:function(){
				jQuery('.wdbutton_preview_style').html('');
			},
			success:function(res){
				//console.log();
				
				jQuery('.wdbutton_preview_style').html(res);
				//alert(res)				
				//myIntervalstop();
				
			},complete:function(){
				//alert('hello');
				//myIntervalstop();
			}
		});
	}	


});