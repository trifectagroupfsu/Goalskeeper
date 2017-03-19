<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<div class="container">
	<h2 class="home_title"><?php _e( 'Basic Settings', 'button' ); ?></h2>
	<div class="input_group icon_simple_none hexagons_none circle_icon_none">
		<div class="input_label">
			<label><?php _e( 'Text', 'button' ); ?></label>
		</div>
		<div class="input_field">
			<input type="text" class="input_box" id="" name="button_text" value="<?php echo esc_attr($custom_data['button_text']); ?>">
		</div>
		<div class="clear_fix"></div> 
	</div>

	<div class="input_group">
		<div class="input_label">
			<label><?php _e( 'URL', 'button' ); ?></label>
		</div>
		<div class="input_field">
			<input type="url" class="input_box" name="button_link" placeholder="http://" value="<?php echo esc_attr($custom_data['button_link']); ?>">
		</div>
		<div class="clear_fix"></div> 
	</div>
	
	<div class="input_group">
		<div class="input_label">
			<label><?php _e( 'Target', 'button' ); ?></label>
		</div>
		<div class="input_field">
			<input type="checkbox"  name="button_target" value="1" <?php if($custom_data['button_target']==1){echo "checked";} ?>>
			<label><?php _e( 'Open in new Window', 'button' ); ?></label>
		</div>
		<div class="clear_fix"></div> 
	</div>
	<div class="input_group padding_section icon_simple_none icon_with_text_none hexagons_none circle_icon_none">
		<div class="input_label">
			<label><?php _e( 'Padding', 'button' ); ?></label>
		</div>
		<div class="input_field">
			<div class="input input_inline button_padding_top">
				<label><?php _e( 'Top', 'button' ); ?></label>
				<input type="number" class="input_box" name="padding_top" value="<?php echo esc_attr($custom_data['padding_top']); ?>">
				<span class="px"><?php _e( 'PX', 'button' ); ?></span>
			</div>

			<div class="input input_inline button_padding_right" >
				<label><?php _e( 'Right', 'button' ); ?></label>
				<input type="number" class="input_box" name="padding_right" value="<?php echo esc_attr($custom_data['padding_right']); ?>">
				<span class="px"><?php _e( 'PX', 'button' ); ?></span>
			</div>

			<div class="input input_inline button_padding_bottom">
				<label><?php _e( 'Bottom', 'button' ); ?></label>
				<input type="number" class="input_box" name="padding_bottom" value="<?php echo esc_attr($custom_data['padding_bottom']); ?>">
				<span class="px"><?php _e( 'PX', 'button' ); ?></span>
			</div>

			<div class="input text_right input_inline button_padding_left">
				<label><?php _e( 'Left', 'button' ); ?></label>
				<input type="number" class="input_box" name="padding_left" value="<?php echo esc_attr($custom_data['padding_left']); ?>">
				<span class="px"><?php _e( 'PX', 'button' ); ?></span>
			</div>

		</div>
		<div class="clear_fix"></div> 
	</div>

	

	<div class="input_group button_section icon_simple_none hexagons_none circle_icon_none">
		<div class="input_label">
			<label><?php _e( 'Button', 'button' ); ?></label>
		</div>
		<div class="input_field">
			<div class="input two_col button_width">
				<label><?php _e( 'Width', 'button' ); ?></label>
				<input type="number" class="input_box" name="button_width" value="<?php echo esc_attr($custom_data['button_width']); ?>">
				<span class="px"><?php _e( 'PX', 'button' ); ?></span>
			</div>

			<div class="input text_right two_col button_height icon_with_text_none" >
				<label><?php _e( 'Height', 'button' ); ?></label>
				<input type="number" class="input_box" name="button_height" value="<?php echo esc_attr($custom_data['button_height']); ?>">
				<span class="px"><?php _e( 'PX', 'button' ); ?></span>
			</div>				

		</div>
		<div class="clear_fix"></div> 
	</div>

	<div class="input_group text_color_section">
		<div class="input_label">
			<label><?php _e( 'Text Color', 'button' ); ?></label>
		</div>
		<div class="input_field">
			<div class="input two_col">
				<label><?php _e( 'Color', 'button' ); ?></label>
				<input name="button_text_color" type="text" value="<?php echo esc_attr($custom_data['button_text_color']); ?>" class="button_color_field" data-default-color="#000000" />
			</div>

			<div class="input two_col" >
				<label><?php _e( 'Hover Color', 'button' ); ?></label>
				<input name="button_text_hover_color" type="text" value="<?php echo esc_attr($custom_data['button_text_hover_color']); ?>" class="button_color_field" data-default-color="#000000" />
			</div>				

		</div>
		<div class="clear_fix"></div> 
	</div>	

	<div class="input_group font_section border_none icon_simple_none hexagons_none circle_icon_none">
		<div class="input_label">
			<label><?php _e( 'Font', 'button' ); ?></label>
		</div>
		<div class="input_field">
			<div class="input three_col font_family">
				<select name="font_family">
					
					<?php 
					$font_deault=array('Arial','_arial_black','Courier New','georgia','grande','_helvetica_neue','_impact','_lucida','_OpenSansBold','_palatino','_sans','Sans-Serif','_tahoma','_times','_trebuchet','_verdana');
					$font_pro=array("Abel","Abril Fatface","Aclonica","Acme","Actor","Adamina", "Advent Pro", "Aguafina Script", "Aladin", "Aldrich", "Alegreya", "Alegreya SC", "Alex Brush", "Alfa Slab One", "Alice", "Alike", "Alike Angular", "Allan", "Allerta", "Allerta Stencil", "Allura", "Almendra", "Almendra SC","Amaranth", "Amethysta", "Andika", "Angkor", "Annie Use Your Telescope", "Anonymous Pro", "Antic","Antic Didone","Antic Slab","Anton", "Arapey","Arbutus","Architects Daughter", "Arimo","Arizonia", "Armata", "Artifika", "Arvo", "Asap", "Asset", "Astloch", "Asul", "Atomic Age","Aubrey","Audiowide","Average","Averia Gruesa Libre", "Averia Libre","Averia Sans Libre", "Averia Serif Libre", "Bad Script","Balthazar", "Bangers", "Basic","Battambang","Baumans","Bayon", "Belgrano","Belleza","Bentham", "Berkshire Swash", "Bevan", "Bigshot One", "Bilbo","Bilbo Swash Caps", "Bitter", "Black Ops One", "Bokor","Bonbon","Boogaloo", "Bowlby One","Bowlby One SC","Brawler", "Bree Serif", "Bubblegum Sans", "Buda","Buenard", "Butcherman", "Butterfly Kids", "Cabin", "Cabin Condensed", "Cabin Sketch","Caesar Dressing","Cagliostro","Calligraffitti", "Cambo", "Candal", "Cantarell", "Cantata One","Cardo","Carme", "Carter One", "Caudex", "Cedarville Cursive", "Ceviche One", "Changa One", "Chango", "Chau Philomene One","Chelsea Market", "Chenla", "Cherry Cream Soda", "Chewy", "Chicle", "Chivo", "Coda", "Coda Caption", "Codystar","Comfortaa", "Coming Soon", "Concert One","Condiment", "Content", "Contrail One", "Convergence", "Cookie","Copse", "Corben", "Courgette", "Cousine", "Coustard", "Covered By Your Grace", "Crafty Girls", "Creepster", "Crete Round", "Crimson Text", "Crushed", "Cuprum", "Cutive", "Damion", "Dancing Script", "Dangrek", "Dawning of a New Day", "Days One", "Delius", "Delius Swash Caps", "Delius Unicase", "Della Respira", "Devonshire", "Didact Gothic", "Diplomata", "Diplomata SC", "Doppio One", "Dorsa", "Dosis", "Dr Sugiyama", "Droid Sans", "Droid Sans Mono", "Droid Serif","Duru Sans", "Dynalight","EB Garamond", "Eater", "Economica", "Electrolize","Emblema One", "Emilys Candy", "Engagement", "Enriqueta", "Erica One", "Esteban", "Euphoria Script","Ewert","Exo", "Expletus Sans", "Fanwood Text", "Fascinate", "Fascinate Inline", "Federant", "Federo", "Felipa", "Fjord One", "Flamenco", "Flavors", "Fondamento", "Fontdiner Swanky", "Forum", "Francois One", "Fredericka the Great", "Fredoka One","Freehand","Fresca", "Frijole","Fugaz One", "GFS Didot","GFS Neohellenic","Galdeano", "Gentium Basic","Gentium Book Basic", "Geo", "Geostar", "Geostar Fill", "Germania One", "Give You Glory", "Glass Antiqua", "Glegoo", "Gloria Hallelujah", "Goblin One", "Gochi Hand","Gorditas", "Goudy Bookletter 1911", "Graduate", "Gravitas One", "Great Vibes","Gruppo","Gudea", "Habibi", "Hammersmith One", "Handlee", "Hanuman","Happy Monkey", "Henny Penny", "Herr Von Muellerhoff","Holtwood One SC","Homemade Apple","Homenaje","IM Fell DW Pica","IM Fell DW Pica SC", "IM Fell Double Pica","IM Fell Double Pica SC", "IM Fell English", "IM Fell English SC", "IM Fell French Canon", "IM Fell French Canon SC","IM Fell Great Primer", "IM Fell Great Primer SC", "Iceberg", "Iceland", "Imprima", "Inconsolata", "Inder", "Indie Flower", "Inika", "Irish Grover", "Istok Web", "Italiana", "Italianno", "Jim Nightshade", "Jockey One","Jolly Lodger","Josefin Sans", "Josefin Slab", "Judson", "Julee", "Junge","Jura","Just Another Hand", "Just Me Again Down Here","Kameron", "Karla", "Kaushan Script", "Kelly Slab","Kenia","Khmer", "Knewave","Kotta One", "Koulen", "Kranky", "Kreon", "Kristi", "Krona One", "La Belle Aurore","Lancelot", "Lato", "League Script", "Leckerli One", "Ledger", "Lekton","Lemon", "Lilita One", "Limelight", "Linden Hill", "Lobster","Lobster Two", "Londrina Outline","Londrina Shadow", "Londrina Sketch", "Londrina Solid", "Lora", "Love Ya Like A Sister","Loved by the King","Lovers Quarrel","Luckiest Guy","Lusitana","Lustria","Macondo","Macondo Swash Caps","Magra","Maiden Orange","Mako","Marck Script","Marko One","Marmelad","Marvel","Mate","Mate SC","Maven Pro" ,"Meddon","MedievalSharp","Medula One" ,"Megrim" ,"Merienda One","Merriweather","Metal","Metamorphous","Metrophobic" ,"Michroma" ,"Miltonian","Miltonian Tattoo","Miniver","Miss Fajardose","Modern Antiqua","Molengo" ,"Monofett","Monoton","Monsieur La Doulaise","Montaga","Montez","Montserrat" ,"Moul" ,"Moulpali" ,"Mountains of Christmas" ,"Mr Bedfort","Mr Dafoe","Mr De Haviland","Mrs Saint Delafield","Mrs Sheppards","Muli" ,"Mystery Quest","Neucha","Neuton","News Cycle","Niconne","Nixie One","Nobile" ,"Nokora","Norican" ,"Nosifer","Nothing You Could Do" ,"Noticia Text","Nova Cut" ,"Nova Flat" ,"Nova Mono","Nova Oval" ,"Nova Round" ,"Nova Script","Nova Slim" ,"Nova Square" ,"Numans" ,"Nunito","Odor Mean Chey" ,"Old Standard TT" ,"Oldenburg" ,"Oleo Script" ,"Open Sans" ,"Open Sans Condensed","Orbitron" ,"Original Surfer" ,"Oswald" ,"Over the Rainbow" ,"Overlock" ,"Overlock SC" ,"Ovo" ,"Oxygen" ,"PT Mono" ,"PT Sans" ,"PT Sans Caption","PT Sans Narrow" ,"PT Serif" ,"PT Serif Caption" ,"Pacifico","Parisienne","Passero One" ,"Passion One" ,"Patrick Hand","Patua One","Paytone One" ,"Permanent Marker" ,"Petrona" ,"Philosopher","Piedra" ,"Pinyon Script","Plaster","Play" ,"Playball" ,"Playfair Display","Podkova","Poiret One" ,"Poller One" ,"Poly","Pompiere","Pontano Sans","Port Lligat Sans","Port Lligat Slab" ,"Prata","Preahvihear","Press Start 2P","Princess Sofia","Prociono" ,"Prosto One" ,"Puritan","Quantico","Quattrocento" ,"Quattrocento Sans","Questrial","Quicksand","Qwigley","Radley","Raleway","Rammetto One","Rancho","Rationale","Redressed","Reenie Beanie","Revalia","Ribeye","Ribeye Marrow","Righteous","Rochester","Rock Salt", "Rokkitt","Ropa Sans","Rosario" ,"Rosarivo" ,"Rouge Script","Ruda" ,"Ruge Boogie" ,"Ruluko" ,"Ruslan Display" ,"Russo One","Ruthie","Sail" ,"Salsa","Sancreek","Sansita One","Sarina","Satisfy","Schoolbell","Seaweed Script","Sevillana","Shadows Into Light","Shadows Into Light Two","Shanti","Share","Shojumaru","Short Stack","Siemreap","Sigmar One","Signika","Signika Negative","Simonetta","Sirin Stencil","Six Caps","Slackey","Smokum","Smythe","Sniglet","Snippet","Sofia","Sonsie One","Sorts Mill Goudy","Special Elite","Spicy Rice","Spinnaker","Spirax" ,"Squada One","Stardos Stencil","Stint Ultra Condensed","Stint Ultra Expanded","Stoke","Sue Ellen Francisco" ,"Sunshiney","Supermercado One","Suwannaphum","Swanky and Moo Moo","Syncopate","Tangerine","Taprom","Telex","Tenor Sans","The Girl Next Door","Tienne","Tinos","Titan One" ,"Trade Winds","Trocchi","Trochut","Trykker","Tulpen One" ,"Ubuntu","Ubuntu Condensed","Ubuntu Mono","Ultra","Uncial Antiqua","UnifrakturCook","UnifrakturMaguntia","Unkempt","Unlock","Unna","VT323","Varela","Varela Round","Vast Shadow","Vibur","Vidaloka","Viga","Voces","Volkhov","Vollkorn","Voltaire","Waiting for the Sunrise","Wallpoet","Walter Turncoat","Wellfleet","Wire One","Yanone Kaffeesatz","Yellowtail","Yeseva One","Yesteryear","Zeyada" );
					foreach($font_deault as $val){
						?>
						<option value="<?php echo $val;?>" <?php selected($custom_data['font_family'],$val) ?>><?php echo ucfirst(trim(str_replace('_', " ", $val)));?></option>
						<?php
					}

					foreach($font_pro as $val){
						?>
						<option value="<?php echo $val;?>" <?php selected($custom_data['font_family'],$val) ?>><?php echo ucfirst(trim(str_replace('_', " ", $val)));?></option>
						<?php
					}
					?>

				</select>
				<input type="number" class="2 icon_with_text_none" name="font_size" value="<?php echo esc_attr($custom_data['font_size']); ?>">
				<span class="px icon_with_text_none"><?php _e( 'PX', 'button' ); ?></span>
			</div>

			<div class="input text_center three_col font_weight" >
				<input type="checkbox" id="text_bold" name="text_bold" value="bold" <?php if($custom_data['text_bold']=="bold"){echo "checked";} ?>>
				<label for="text_bold">
					<i class="dashicons dashicons-editor-bold"></i>
				</label>

				<input type="checkbox" id="text_italic" name="text_italic" value="italic" <?php if($custom_data['text_italic']=="italic"){echo "checked";} ?>>
				<label for="text_italic">
					<i class="dashicons dashicons-editor-italic"></i>
				</label>
			</div>

			<div class="input three_col font_weight icon_with_text_none">
				<input type="radio" id="text_alignleft" name="text_align" value="left" <?php if($custom_data['text_align']=="left"){echo "checked";} ?>>
				<label for="text_alignleft">
					<i class="dashicons dashicons-editor-alignleft"></i>
				</label>

				<input type="radio" id="text_aligncenter" name="text_align" value="center" <?php if($custom_data['text_align']=="center"){echo "checked";} ?>>
				<label for="text_aligncenter">
					<i class="dashicons dashicons-editor-aligncenter"></i>
				</label>

				<input type="radio" id="text_alignright" name="text_align" value="right" <?php if($custom_data['text_align']=="right"){echo "checked";} ?>>
				<label for="text_alignright">
					<i class="dashicons dashicons-editor-alignright"></i>
				</label>
			</div>			
		</div>
		<div class="clear_fix"></div> 
	</div>
</div>