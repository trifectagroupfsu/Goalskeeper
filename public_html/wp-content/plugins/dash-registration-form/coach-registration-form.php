<?php

/*
  Plugin Name: Coach Registration Form
  Tracy Dash
 */


class Coach_registration_form
{

    private $username;
    private $email;
    private $password;
    private $first_name;
    private $last_name;
    private $phone;
    private $street_address;
    private $city;
    private $state;


    function __construct()
    {

        add_shortcode('coach_registration_form', array($this, 'shortcode'));
        add_action('wp_enqueue_scripts', array($this, 'flat_ui_kit'));
    }


    public function registration_form()
    {

        ?>

        <form method="post" action="<?php echo esc_url($_SERVER['REQUEST_URI']); ?>">
            <div class="login-form">

                <div class="form-group">
                    <input name="reg_name" type="text" class="form-control login-field"
                           value="<?php echo(isset($_POST['reg_name']) ? $_POST['reg_name'] : null); ?>"
                           placeholder="Username" id="reg-name" required/>
                    <label class="login-field-icon fui-user" for="reg-name"></label>
                </div>

                <div class="form-group">
                    <input name="reg_email" type="email" class="form-control login-field"
                           value="<?php echo(isset($_POST['reg_email']) ? $_POST['reg_email'] : null); ?>"
                           placeholder="Email" id="reg-email" required/>
                    <label class="login-field-icon fui-mail" for="reg-email"></label>
                </div>

                <div class="form-group">
                    <input name="reg_password" type="password" class="form-control login-field"
                           value="<?php echo(isset($_POST['reg_password']) ? $_POST['reg_password'] : null); ?>"
                           placeholder="Password" id="reg-pass" required/>
                    <label class="login-field-icon fui-lock" for="reg-pass"></label>
                </div>

                <div class="form-group">
                    <input name="reg_fname" type="text" class="form-control login-field"
                           value="<?php echo(isset($_POST['reg_fname']) ? $_POST['reg_fname'] : null); ?>"
                           placeholder="First Name" id="reg-fname"/>
                    <label class="login-field-icon fui-user" for="reg-fname"></label>
                </div>

                <div class="form-group">
                    <input name="reg_lname" type="text" class="form-control login-field"
                           value="<?php echo(isset($_POST['reg_lname']) ? $_POST['reg_lname'] : null); ?>"
                           placeholder="Last Name" id="reg-lname"/>
                    <label class="login-field-icon fui-user" for="reg-lname"></label>
                </div>

                <div class="form-group">
                    <input name="reg_phone" type="tel" class="form-control login-field"
                           value="<?php echo(isset($_POST['reg_phone']) ? $_POST['reg_phone'] : null); ?>"
                           placeholder="Phone" id="reg-phone"/>
                    <label class="login-field-icon fui-user" for="reg-phone"></label>
                </div>

                <div class="form-group">
                    <input name="reg_street_address" type="text" class="form-control login-field"
                           value="<?php echo(isset($_POST['reg_street_address']) ? $_POST['reg_street_address'] : null); ?>"
                           placeholder="Street address" id="reg-street_address"/>
                    <label class="login-field-icon fui-user" for="reg-street_address"></label>
                </div>

                <div class="form-group">
                    <input name="reg_city" type="text" class="form-control login-field"
                           value="<?php echo(isset($_POST['reg_city']) ? $_POST['reg_city'] : null); ?>"
                           placeholder="City" id="reg-city"/>
                    <label class="login-field-icon fui-user" for="reg-city"></label>
                </div>

                <div class="form-group">
                    <input name="reg_state" type="text" class="form-control login-field"
                           value="<?php echo(isset($_POST['reg_state']) ? $_POST['reg_state'] : null); ?>"
                           placeholder="State" id="reg-state"/>
                    <label class="login-field-icon fui-user" for="reg-state"></label>
                </div>

                <input class="btn btn-primary btn-lg btn-block" type="submit" name="reg_submit" value="Register"/>
        </form>
        </div>
    <?php
    }

	// this performs some checks
    function validation()
    {

        if (empty($this->username) || empty($this->password) || empty($this->email) || empty($this->first_name) || empty($this->last_name)) {
            return new WP_Error('field', 'Required form field is missing');
        }

        if (strlen($this->username) < 4) {
            return new WP_Error('username_length', 'Username too short. At least 4 characters is required');
        }

        if (strlen($this->password) < 5) {
            return new WP_Error('password', 'Password length must be greater than 5');
        }

        if (!is_email($this->email)) {
            return new WP_Error('email_invalid', 'Email is not valid');
        }

        if (email_exists($this->email)) {
            return new WP_Error('email', 'Email Already in use');
        }
				
				if(!empty($this->phone)){
					$numbersOnly = ereg_replace("[^0-9]", "", $this->phone);
					$numberOfDigits = strlen($numbersOnly);
					if (!($numberOfDigits == 7 or $numberOfDigits == 10))
						return new WP_Error('phone', 'Phone number should be in xxx-xxx-xxxx format.');
				}

    }

    function registration()
    {

	// creating array to add using wp_insert_user
        $userdata = array(
            'user_login' => esc_attr($this->username),
            'user_email' => esc_attr($this->email),
            'user_pass' => esc_attr($this->password),
            'first_name' => esc_attr($this->first_name),
            'last_name' => esc_attr($this->last_name),
						'role' => 'administrator',
						'display_name' => esc_attr($this->username),
        );


        if (is_wp_error($this->validation())) {
            echo '<div style="margin-bottom: 6px" class="btn btn-block btn-lg btn-danger">';
            echo '<strong>' . $this->validation()->get_error_message() . '</strong>';
            echo '</div>';
        } else {
	    // this adds the standard fields to the user table
            $register_user = wp_insert_user($userdata);

	    // this adds the extra fields to the usermeta table
	    add_user_meta( $register_user, 'team_role', coach);
	    add_user_meta( $register_user, 'phone', $this->phone);
	    add_user_meta( $register_user, 'address', $this->street_address);
	    add_user_meta( $register_user, 'city', $this->city);
	    add_user_meta( $register_user, 'state', $this->state);


            if (!is_wp_error($register_user)) {

                echo '<div style="margin-bottom: 6px" class="btn btn-block btn-lg btn-danger">';
                echo '<strong>Registration complete. Goto <a href="http://youthcoaching.x10host.com/user-login/">login page</a></strong>';
                //echo '<strong>Registration complete. Goto <a href="' . wp_login_url() . '">login page</a></strong>';
                echo '</div>';
            } else {
                echo '<div style="margin-bottom: 6px" class="btn btn-block btn-lg btn-danger">';
                echo '<strong>' . $register_user->get_error_message() . '</strong>';
                echo '</div>';
            }
        }

    }

    function flat_ui_kit()
    {
        wp_enqueue_style('bootstrap-css', plugins_url('bootstrap/css/bootstrap.css', __FILE__));
        wp_enqueue_style('flat-ui-kit', plugins_url('css/flat-ui.css', __FILE__));

    }

    function shortcode()
    {

        ob_start();

        if ($_POST['reg_submit']) {
            $this->username = $_POST['reg_name'];
            $this->email = $_POST['reg_email'];
            $this->password = $_POST['reg_password'];
            $this->first_name = $_POST['reg_fname'];
            $this->last_name = $_POST['reg_lname'];
            $this->phone = $_POST['reg_phone'];
            $this->street_address = $_POST['reg_street_address'];
            $this->city = $_POST['reg_city'];
            $this->state = $_POST['reg_state'];

            $this->validation();
            $this->registration();
	    // header('Location: http://youthcoaching.x10host.com/home/');
        }

        $this->registration_form();
        return ob_get_clean();
    }

}

new Coach_registration_form;
