<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

function mc_generate() {
	if ( isset( $_POST['generator'] ) ) {
		$nonce = $_POST['_wpnonce'];
		if ( ! wp_verify_nonce( $nonce, 'my-calendar-generator' ) ) {
			wp_die( "Invalid nonce" );
		}		
		$string = '';
		$output = apply_filters( 'mc_shortcode_generator', false, $_POST );
		if ( !$output ) {
			switch ( $_POST['shortcode'] ) {
				case 'main':
					$shortcode = 'my_calendar';
					break;
				case 'upcoming':
					$shortcode = 'my_calendar_upcoming';
					break;
				case 'today':
					$shortcode = 'my_calendar_today';
					break;
				default:
					$shortcode = 'my_calendar';
			}
			foreach ( $_POST as $key => $value ) {
				if ( $key != 'generator' && $key != 'shortcode' && $key != '_wpnonce' ) {
					if ( is_array( $value ) ) {		
						if ( in_array( 'all', $value ) ) {
							unset( $value[0] );
						}
						$v = implode( ',', $value );
					} else {
						$v = $value;
					}
					if ( $v != '' ) {
						$string .= " $key=&quot;$v&quot;";
					}
				}
			}
			$output = esc_html( $shortcode . $string );	
		}
		$return = "<div class='updated'><textarea readonly='readonly' class='large-text readonly'>[$output]</textarea></div>";
		echo $return;
	}
}

function mc_generator( $type ) {
	?>
<form action="<?php echo admin_url( 'admin.php?page=my-calendar-help' ); ?>" method="POST" id="my-calendar-generate">
	<fieldset>
		<legend><strong><?php echo ucfirst( $type ); ?></strong>: <?php _e( 'Shortcode Attributes', 'my-calendar' ); ?>
		</legend>
		<div id="mc-generator" class="generator">
			<div><input type="hidden" name="_wpnonce" value="<?php echo wp_create_nonce( 'my-calendar-generator' ); ?>"/></div>		
			<input type='hidden' name='shortcode' value='<?php esc_attr_e( $type ); ?>'/>
			<?php // Common Elements to all Shortcodes ?>
			<p><?php echo my_calendar_categories_list( 'select', 'admin' ); ?></p>

			<p>
				<label for="ltype"><?php _e( 'Location filter type:', 'my-calendar' ); ?></label>
				<select name="ltype" id="ltype">
					<option value="" selected="selected"><?php _e( 'All locations', 'my-calendar' ); ?></option>
					<option value='event_label'><?php _e( 'Location Name', 'my-calendar' ); ?></option>
					<option value='event_city'><?php _e( 'City', 'my-calendar' ); ?></option>
					<option value='event_state'><?php _e( 'State', 'my-calendar' ); ?></option>
					<option value='event_postcode'><?php _e( 'Postal Code', 'my-calendar' ); ?></option>
					<option value='event_country'><?php _e( 'Country', 'my-calendar' ); ?></option>
					<option value='event_region'><?php _e( 'Region', 'my-calendar' ); ?></option>
				</select>
			</p>
			<p>
				<label for="lvalue" id='lval'><?php _e( 'Location filter value:', 'my-calendar' ); ?></label>
				<input type="text" name="lvalue" id="lvalue" aria-labelledby='lval location-info' />
			</p>

			<p id='location-info'>
				<?php _e( '<strong>Note:</strong> If you provide a location filter value, it must be an exact match for that information as saved with your events. (e.g. "Saint Paul" is not equivalent to "saint paul" or "St. Paul")', 'my-calendar' ); ?>
			</p>
			<?php
			// Grab users and list them
			$users   = mc_get_users();
			$options = '';
			foreach ( $users as $u ) {
				$options .= '<option value="' . $u->ID . '">' . esc_html( $u->display_name ) . "</option>\n";
			} ?>
			<p>
				<label for="author"><?php _e( 'Limit by Author', 'my-calendar' ); ?></label>
				<select name="author[]" id="author" multiple="multiple">
					<option value="all"><?php _e( 'All authors', 'my-calendar' ); ?></option>
					<option value="current"><?php _e( 'Currently logged-in user', 'my-calendar' ); ?></option>
					<?php echo $options; ?>
				</select>
			</p>
			<p>
				<label for="host"><?php _e( 'Limit by Host', 'my-calendar' ); ?></label>
				<select name="host[]" id="host" multiple="multiple">
					<option value="all"><?php _e( 'All hosts', 'my-calendar' ); ?></option>
					<option value="current"><?php _e( 'Currently logged-in user', 'my-calendar' ); ?></option>
					<?php echo $options; ?>
				</select>
			</p>
			<?php
			// Main shortcode only
			if ( $type == 'main' ) {
				?>
				<p>
					<label for="format"><?php _e( 'Format', 'my-calendar' ); ?></label>
					<select name="format" id="format">
						<option value="calendar" selected="selected"><?php _e( 'Grid', 'my-calendar' ); ?></option>
						<option value="list"><?php _e( 'List', 'my-calendar' ); ?></option>
						<option value="mini"><?php _e( 'Mini', 'my-calendar' ); ?></option>
					</select>
				</p>
				<p>
					<label for="time"><?php _e( 'Time Segment', 'my-calendar' ); ?></label>
					<select name="time" id="time">
						<option value="month" selected="selected"><?php _e( 'Month', 'my-calendar' ); ?></option>
						<option value="month+1"><?php _e( 'Next Month', 'my-calendar' ); ?></option>
						<option value="week"><?php _e( 'Week', 'my-calendar' ); ?></option>
						<option value="day"><?php _e( 'Day', 'my-calendar' ); ?></option>
					</select>
				</p>
				<p>
					<label for="year"><?php _e( 'Year', 'my-calendar' ); ?></label>
					<select name="year" id="year">
						<option value=''><?php _e( 'Default', 'my-calendar' ); ?></option>					
						<?php
						global $wpdb;
						$mcdb = $wpdb;
						$query  = "SELECT event_begin FROM " . my_calendar_table() . " WHERE event_approved = 1 AND event_flagged <> 1 ORDER BY event_begin ASC LIMIT 0 , 1";
						$year1  = date( 'Y', strtotime( $mcdb->get_var( $query ) ) );
						$diff1  = date( 'Y' ) - $year1;
						$past   = $diff1;
						$future = apply_filters( 'mc_jumpbox_future_years', 5, false );
						$fut    = 1;
						$f      = '';
						$p      = '';
						$offset = ( 60 * 60 * get_option( 'gmt_offset' ) );
						while ( $past > 0 ) {
							$p .= '<option value="';
							$p .= date( "Y", time() + ( $offset ) ) - $past;
							$p .= '">';
							$p .= date( "Y", time() + ( $offset ) ) - $past . "</option>\n";
							$past = $past - 1;
						}
						while ( $fut < $future ) {
							$f .= '<option value="';
							$f .= date( "Y", time() + ( $offset ) ) + $fut;
							$f .= '">';
							$f .= date( "Y", time() + ( $offset ) ) + $fut . "</option>\n";
							$fut = $fut + 1;
						}
						echo $p . '<option value="' . date( "Y" ) . '">' . date( "Y" ) . "</option>\n" . $f;
						?>
					</select>
					</p>
					<p>
					<label for="month"><?php _e( 'Month', 'my-calendar' ); ?></label>
					<select name="month" id="month">
						<option value=''><?php _e( 'Default', 'my-calendar' ); ?></option>					
						<?php
							$months = '';
							for ( $i = 1; $i <= 12; $i ++ ) {
								$months .= "<option value='$i'>" . date_i18n( 'F', mktime( 0, 0, 0, $i, 1 ) ) . '</option>' . "\n";
							}
							echo $months;
						?>
					</select>
					</p>
					<p>
					<label for="day"><?php _e( 'Day', 'my-calendar' ); ?></label>
					<select name="day" id="day">
						<option value=''><?php _e( 'Default', 'my-calendar' ); ?></option>
						<?php
							$days = '';
							for ( $i = 1; $i <= 31; $i++ ) {
								$days .= "<option value='$i'>" . $i . '</option>' . "\n";
							}
							echo $days;
						?>
					</select>
				</p>				
				<p id='navigation-info'>
					<?php printf( __( "Navigation above and below the calendar: your <a href='%s'>settings</a> if this is left blank. Use <code>none</code> to hide all navigation.", 'my-calendar' ), admin_url( 'admin.php?page=my-calendar-config#mc-output' ) ); ?>
				</p>
				<p>
					<label for="above" id='labove'><?php _e( 'Navigation above calendar', 'my-calendar' ); ?></label>
					<input type="text" name="above" id="above" value="nav,toggle,jump,print,timeframe"
					       aria-labelledby='labove navigation-info' /><br/>
				</p>
				<p>
					<label for="below" id='lbelow'><?php _e( 'Navigation below calendar', 'my-calendar' ); ?></label>
					<input type="text" name="below" id="below" value="key,feeds"
					       aria-labelledby='lbelow navigation-info' /><br/>
				</p>
			<?php
			}
			if ( $type == 'upcoming' || $type == 'today' ) {
				// Upcoming Events & Today's Events shortcodes
				?>
				<p>
					<label for="fallback"><?php _e( 'Fallback Text', 'my-calendar' ); ?></label>
					<input type="text" name="fallback" id="fallback" value="" />
				</p>
				<p>
					<label for="template"><?php _e( 'Template', 'my-calendar' ); ?></label>
					<textarea cols="40" rows="4" name="template"
					          id="template"><?php echo htmlentities( "<strong>{date}</strong>, {time}: {link_title}" ); ?></textarea>
				</p>
			<?php
			}
			if ( $type == 'upcoming' ) {
				// Upcoming events only
				?>
				<p>
					<label for="before"><?php _e( 'Events/Days Before Current Day', 'my-calendar' ); ?></label>
					<input type="number" name="before" id="before" value="" />
				</p>
				<p>
					<label for="after"><?php _e( 'Events/Days After Current Day', 'my-calendar' ); ?></label>
					<input type="number" name="after" id="after" value="" />
				</p>
				<p>
					<label for="skip"><?php _e( 'Events/Days to Skip', 'my-calendar' ); ?></label>
					<input type="number" name="skip" id="skip" value="" />
				</p>
				<p>
					<label for="show_today"><?php _e( "Show Today's Events", 'my-calendar' ); ?></label>
					<input type="checkbox" name="show_today" id="show_today" value="yes"/>
				</p>
				<p>
					<label for="type"><?php _e( 'Type of Upcoming Events List', 'my-calendar' ); ?></label>
					<select name="type" id="type">
						<option value="event" selected="selected"><?php _e( 'Events', 'my-calendar' ); ?></option>
						<option value="year"><?php _e( 'Current Year', 'my-calendar' ); ?></option>
						<option value="days"><?php _e( 'Days', 'my-calendar' ); ?></option>
						<option value="custom"><?php _e( 'Custom Dates', 'my-calendar' ); ?></option>
						<option value="month"><?php _e( 'Current Month', 'my-calendar' ); ?></option>
						<option value="month+1"><?php _e( 'Next Month', 'my-calendar' ); ?></option>
						<option value="month+2"><?php _e( '2nd Month Out', 'my-calendar' ); ?></option>
						<option value="month+3"><?php _e( '3rd Month Out', 'my-calendar' ); ?></option>
						<option value="month+4"><?php _e( '4th Month Out', 'my-calendar' ); ?></option>
						<option value="month+5"><?php _e( '5th Month Out', 'my-calendar' ); ?></option>
						<option value="month+6"><?php _e( '6th Month Out', 'my-calendar' ); ?></option>
						<option value="month+7"><?php _e( '7th Month Out', 'my-calendar' ); ?></option>
						<option value="month+8"><?php _e( '8th Month Out', 'my-calendar' ); ?></option>
						<option value="month+9"><?php _e( '9th Month Out', 'my-calendar' ); ?></option>
						<option value="month+10"><?php _e( '10th Month Out', 'my-calendar' ); ?></option>
						<option value="month+11"><?php _e( '11th Month Out', 'my-calendar' ); ?></option>
						<option value="month+12"><?php _e( '12th Month Out', 'my-calendar' ); ?></option>
					</select>
				</p>
				<div class='custom'>
					<p>
						<label for='from'><?php _e( 'Starting Date', 'my-calendar' ); ?></label> <input type='text' name='from' id='from' />
					</p>
					<p>
						<label for='to'><?php _e( 'End Date', 'my-calendar' ); ?></label> <input type='text' name='to' id='to' />
					</p>
				</div>
				<p>
					<label for="order"><?php _e( 'Event Order', 'my-calendar' ); ?></label>
					<select name="order" id="order">
						<option value="asc" selected="selected"><?php _e( 'Ascending', 'my-calendar' ); ?></option>
						<option value="desc"><?php _e( 'Descending', 'my-calendar' ); ?></option>
					</select>
				</p>
			<?php } ?>
		</div>
	</fieldset>
	<p>
		<input type="submit" class="button-primary" name="generator"
		       value="<?php _e( 'Generate Shortcode', 'my-calendar' ); ?>"/>
	</p>
	</form><?php
}