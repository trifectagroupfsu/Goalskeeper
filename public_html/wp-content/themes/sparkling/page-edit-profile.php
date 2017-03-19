<?php
ob_start();
// Display header
get_header(); 
?>

<?php
/**
 * Tracy Dash
 * Template for displaying the front end edit-profile page
 *
*/

/* Get user info. */
global $current_user, $wp_roles, $error;					
$error = array();    

/* If profile was saved, update profile. */
if ( 'POST' == $_SERVER['REQUEST_METHOD'] && !empty( $_POST['action'] ) && $_POST['action'] == 'update-user' ) {

    /* Update user information. */
		// Username
		if (isset( $_POST['username'])) {
				// check if user is really updating the value
				if ($user_login != $_POST['username']) { 
					// ensure appropiate length
					//if((strlen($_POST['username']) > 4) {
						// update username
						$ID = $current_user->ID;
						$username = $_POST['username'];
						$wpdb->update($wpdb->users, array('user_login' => $username), array('ID' => $ID));
						// update nicename
						$wpdb->update($wpdb->users, array('user_nicename' => $username), array('ID' => $ID));
						// update nick name
						update_user_meta($current_user->ID, 'nickname', $username );
					//}
				}
		}
		
		// Email
		if (isset( $_POST['email'])) {
				// check if user is really updating the value
				if ($user_email != $_POST['email']) {       
						// check if email is free to use
						if (email_exists( $_POST['email'] )){
							//echo "email exists\n";
								// Email exists, do not update value.
							echo '<div style="margin-bottom: 6px" class="btn btn-block btn-lg btn-danger">';
							echo '<strong>Email already exists.</strong>';
							echo '</div>';
								$error[] = __('This email is already in use.', 'profile');
						} 
						else if (!is_email( $_POST['email'] )){
							//echo "email bad format\n";
							// Not correct email format.
							echo '<div style="margin-bottom: 6px" class="btn btn-block btn-lg btn-danger">';
							echo '<strong>Email is in incorrect format.</strong>';
							echo '</div>';
							$error[] = __('This is not an email.', 'profile');
						} 
						else {
							$ID = $current_user->ID;
							$email = sanitize_email($_POST['email']);
							debug_to_console($ID);
							debug_to_console($email);
							$wpdb->update($wpdb->users, array('user_email' => $email), array('ID' => $ID));
					 }   
			 }
		}  
		
		// Password
		if (!empty($_POST['pass1'] ) && !empty( $_POST['pass2'] ) ) {

        if ( $_POST['pass1'] != $_POST['pass2'] ) {
						echo '<div style="margin-bottom: 6px" class="btn btn-block btn-lg btn-danger">';
						echo '<strong>The passwords do not match.</strong>';
						echo '</div>';
            $error = 'The passwords do not match.';
        } elseif ( strlen($_POST['pass1']) < 4 ) {
						echo '<div style="margin-bottom: 6px" class="btn btn-block btn-lg btn-danger">';
						echo '<strong>Password is too short.</strong>';
						echo '</div>';
            $error = 'Password is too short.';
        } elseif ( false !== strpos( wp_unslash($_POST['pass1']), "" ) ) {
						echo '<div style="margin-bottom: 6px" class="btn btn-block btn-lg btn-danger">';
						echo '<strong>Password may not contain the character "" (backslash).</strong>';
						echo '</div>';
            $error = 'Password may not contain the character "" (backslash).';
        } else {
            wp_set_password( $_POST['pass1'], $current_user->ID );
				}
		}
		
		// First name
    if ( !empty( $_POST['first-name'] ) ){
        update_user_meta( $current_user->ID, 'first_name', esc_attr( $_POST['first-name'] ) );
		}
		
		// Last name
    if ( !empty( $_POST['last-name'] ) )
        update_user_meta($current_user->ID, 'last_name', esc_attr( $_POST['last-name'] ) );
			
		// Birth year
    if ( !empty( $_POST['birth_year'] ) ) {
			// Make sure it's all numbers
				if($_POST['birth_year']>1000 && $_POST['birth_year']<2100){
					update_user_meta($current_user->ID, 'birth_year', esc_attr( $_POST['birth_year'] ) );
				}
				else{
					echo '<div style="margin-bottom: 6px" class="btn btn-block btn-lg btn-danger">';
					echo '<strong>Birth year must be a four digit year.</strong>';
					echo '</div>';
					$error[] = __('Birth year must be a four digit year.', 'profile');
			}
		}
			
		// Phone
    if ( !empty( $_POST['phone'] ) ){
			// Validate phone number is in correct style
			$numbersOnly = ereg_replace("[^0-9]", "", $_POST['phone']);
			$numberOfDigits = strlen($numbersOnly);
			if ($numberOfDigits == 7 or $numberOfDigits == 10) {
        update_user_meta($current_user->ID, 'phone', esc_attr( $_POST['phone'] ) );
			}
			else {
				echo '<div style="margin-bottom: 6px" class="btn btn-block btn-lg btn-danger">';
				echo '<strong>Phone number should be in xxx-xxx-xxxx format.</strong>';
				echo '</div>';
        $error[] = __('Phone number should be in xxx-xxx-xxxx format.', 'profile');
			}
		}
			
		// Street address
    if ( !empty( $_POST['address'] ) )
        update_user_meta($current_user->ID, 'street_address', esc_attr( $_POST['address'] ) );
			
		// City
    if ( !empty( $_POST['city'] ) )
        update_user_meta($current_user->ID, 'city', esc_attr( $_POST['city'] ) );
			
		// State
    if ( !empty( $_POST['state'] ) )
        update_user_meta($current_user->ID, 'state', esc_attr( $_POST['state'] ) );
			
		// Parent's first name
    if ( !empty( $_POST['p_first_name'] ) )
        update_user_meta($current_user->ID, 'player_parent_first_name', esc_attr( $_POST['p_first_name'] ) );
			
		// Parent's last name
    if ( !empty( $_POST['p_last_name'] ) )
        update_user_meta($current_user->ID, 'player_parent_last_name', esc_attr( $_POST['p_last_name'] ) );
			
		// Parent's email
		if (isset( $_POST['p_email'])) {
		// check if user is really updating the value
			if ($user_email != $_POST['p_email']) { 		
					if (!is_email( $_POST['p_email'] )){
						// Not correct email format.
						echo '<div style="margin-bottom: 6px" class="btn btn-block btn-lg btn-danger">';
						echo '<strong>Parent email is in incorrect format.</strong>';
						echo '</div>';
						$error[] = __('Parent email is in incorrect format.', 'profile');
					}
					else
						update_user_meta($current_user->ID, 'player_parent_email', esc_attr( $_POST['p_email'] ) );
			}
		}
			
		// Parent's phone
	 if ( !empty( $_POST['p_phone'] ) ){
			// Validate phone number is in correct style
			$numbersOnly = ereg_replace("[^0-9]", "", $_POST['p_phone']);
			$numberOfDigits = strlen($numbersOnly);
			if ($numberOfDigits == 7 or $numberOfDigits == 10) {
				 update_user_meta($current_user->ID, 'player_parent_phone', esc_attr( $_POST['p_phone'] ) );
			}
			else {
				echo '<div style="margin-bottom: 6px" class="btn btn-block btn-lg btn-danger">';
				echo '<strong>Parent phone number should be in xxx-xxx-xxxx format.</strong>';
				echo '</div>';
				$error[] = __('Parent phone number should be in xxx-xxx-xxxx format.', 'profile');
			}
		}
			
    /* Redirect so the page will show updated info.*/
    if ( count($error) == 0 ) {
				wp_redirect( get_permalink().'?updated=true' );
        exit;
    }	
}
?>


	<div id="primary" class="content-area">

		<main id="main" class="site-main" role="main">
			<?php $error = array(); ?>
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<div id="post-<?php the_ID(); ?>">
							<div class="entry-content entry">
									<?php the_content(); ?>
									<?php if ( !is_user_logged_in() ) : ?>
													<p class="warning">
															<?php _e('You must be logged in to edit your profile.', 'profile'); ?>
													</p><!-- .warning -->
									<?php else : ?>
											<?php if ( count($error) > 0 ) echo '<p class="error">' . implode("<br />", $error) . '</p>'; ?>
											<head>
													<style type="text/css">
														td
														{
																padding:0 15px 0 15px;
														}
													</style>
											</head>
											<form method="post" id="adduser" action="<?php the_permalink(); ?>">
											<table>
												<colgroup><col align="right"></col><col align="left"></col></colgroup>
												
													<tr><th><label for="username"><?php _e('Username *', 'profile'); ?></label></th>
													<td><input class="text-input" name="username" type="text" id="username" style="width: 500px;"  value="<?php the_author_meta( 'user_login', $current_user->ID ); ?>" /><td></tr>
													
													<tr><th><label for="first-name"><?php _e('First Name *', 'profile'); ?></label></th>
													<td><input class="text-input" name="first-name" type="text" id="first-name" style="width: 500px;"  value="<?php the_author_meta( 'first_name', $current_user->ID ); ?>" /><td></tr>
													
													<p class="form-username">
															<tr><th><label for="last-name"><?php _e('Last Name *', 'profile'); ?></label></th>
															<td><span><input class="text-input" name="last-name" type="text" id="last-name" style="width: 500px;" value="<?php the_author_meta( 'last_name', $current_user->ID ); ?>" /></span><td></tr>
													</p><!-- .form-username -->
													
													<p class="form-email">
															<tr><th><label for="email"><?php _e('E-mail *  ', 'profile'); ?></label></th>
															<td><span><input class="text-input" name="email" type="text" id="email" style="width: 500px;" value="<?php the_author_meta( 'user_email', $current_user->ID ); ?>" /></span><td></tr>
													</p><!-- .form-email -->
													
													<p class="form-password">
															<tr><th><label for="pass1"><?php _e('Password *', 'profile'); ?> </label></th>
															<td><span><input class="text-input" name="pass1" type="password" id="pass1" style="width: 500px;"/></span><td></tr>
													</p><!-- .form-password -->
													
													<p class="form-password">
															<tr><th><label for="pass2"><?php _e('Repeat Password *', 'profile'); ?></label></th>
															<td><span><input class="text-input" name="pass2" type="password" id="pass2" style="width: 500px;"/></span><td></tr>
													</p><!-- .form-password -->
													
													<tr><th><label for="phone"><?php _e('Phone', 'profile'); ?></label></th>
													<td><span><input class="text-input" name="phone" type="text" id="phone" style="width: 500px;" value="<?php the_author_meta( 'phone', $current_user->ID ); ?>"/></span><td></tr>
													
													<tr><th><label for="address"><?php _e('Street address', 'profile'); ?></label></th>
													<td><span><input class="text-input" name="address" type="text" id="address" style="width: 500px;" value="<?php the_author_meta( 'street_address', $current_user->ID ); ?>"/></span><td></tr>
													
													<tr><th><label for="city"><?php _e('City', 'profile'); ?></label></th>
													<td><span><input class="text-input" name="city" type="text" id="city" style="width: 500px;" value="<?php the_author_meta( 'city', $current_user->ID ); ?>"/></span><td></tr>
													
													<tr><th><label for="state"><?php _e('State', 'profile'); ?></label></th>
													<td><span><input class="text-input" name="state" type="text" id="state" style="width: 500px;" value="<?php the_author_meta( 'state', $current_user->ID ); ?>"/></span><td></tr>
												
													<?php if(get_user_meta($current_user->ID, 'team_role', true) == "player")  : ?>														
														<tr><th><label for="birth_year"><?php _e('Birth year *', 'profile'); ?></label></th>
														<td><span><input class="text-input" name="birth_year" type="text" id="birth_year" style="width: 500px;" value="<?php the_author_meta( 'birth_year', $current_user->ID ); ?>"/></span><td></tr>
														
														<tr><th><label for="p_first_name"><?php _e('Parent first name', 'profile'); ?></label></th>
														<td><span><input class="text-input" name="p_first_name" type="text" id="p_first_name" style="width: 500px;" value="<?php the_author_meta( 'player_parent_first_name', $current_user->ID ); ?>"/></span><td></tr>
														
														<tr><th><label for="p_last_name"><?php _e('Parent last name', 'profile'); ?></label></th>
														<td><span><input class="text-input" name="p_last_name" type="text" id="p_last_name" style="width: 500px;" value="<?php the_author_meta( 'player_parent_last_name', $current_user->ID ); ?>"/></span><td></tr>
														
														<tr><th><label for="p_email"><?php _e('Parent email', 'profile'); ?></label></th>
														<td><span><input class="text-input" name="p_email" type="text" id="p_email" style="width: 500px;" value="<?php the_author_meta( 'player_parent_email', $current_user->ID ); ?>"/></span><td></tr>
														
														<tr><th><label for="p_phone"><?php _e('Parent phone', 'profile'); ?></label></th>
														<td><span><input class="text-input" name="p_phone" type="text" id="p_phone" style="width: 500px;" value="<?php the_author_meta( 'player_parent_phone', $current_user->ID ); ?>"/></span><td></tr>																				
													<?php endif; ?>


													<tr><th>
													<p class="form-submit">
															<?php echo $referer; ?>
															<input name="updateuser" type="submit" id="updateuser" class="submit button" value="<?php _e('Update', 'profile'); ?>" />
															<?php wp_nonce_field( 'update-user' ) ?>
															<input name="action" type="hidden" id="action" value="update-user" />
													</p><!-- .form-submit --></th></tr>
													
												</table>
											</form><!-- #adduser -->
									<?php endif; ?>
							</div><!-- .entry-content -->
					</div><!-- .hentry .post -->
					<?php endwhile; ?>
			<?php else: ?>
					<p class="no-data">
							<?php _e('Sorry, no page matched your criteria.', 'profile'); ?>
					</p><!-- .no-data -->
			<?php endif; ?>


		</main><!-- #main -->
	</div><!-- #primary -->
	
<?php get_sidebar(); ?>
<?php get_footer(); ?>
<?php ob_end_flush();?>


