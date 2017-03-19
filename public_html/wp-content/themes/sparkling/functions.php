<?php
/**
 * Sparkling functions and definitions
 *
 * @package sparkling
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 648; /* pixels */
}

/**
 * Set the content width for full width pages with no sidebar.
 */
function sparkling_content_width() {
  if ( is_page_template( 'page-fullwidth.php' ) ) {
    global $content_width;
    $content_width = 1008; /* pixels */
  }
}
add_action( 'template_redirect', 'sparkling_content_width' );

if ( ! function_exists( 'sparkling_main_content_bootstrap_classes' ) ) :
/**
 * Add Bootstrap classes to the main-content-area wrapper.
 */
function sparkling_main_content_bootstrap_classes() {
	if ( is_page_template( 'page-fullwidth.php' ) ) {
		return 'col-sm-12 col-md-12';
	}
	return 'col-sm-12 col-md-8';
}
endif; // sparkling_main_content_bootstrap_classes

if ( ! function_exists( 'sparkling_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function sparkling_setup() {

  /*
   * Make theme available for translation.
   * Translations can be filed in the /languages/ directory.
   */
  load_theme_textdomain( 'sparkling', get_template_directory() . '/languages' );

  // Add default posts and comments RSS feed links to head.
  add_theme_support( 'automatic-feed-links' );

  /**
   * Enable support for Post Thumbnails on posts and pages.
   *
   * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
   */
  add_theme_support( 'post-thumbnails' );

  add_image_size( 'sparkling-featured', 750, 410, true );
  add_image_size( 'tab-small', 60, 60 , true); // Small Thumbnail

  // This theme uses wp_nav_menu() in one location.
  register_nav_menus( array(
    'primary'      => esc_html__( 'Primary Menu', 'sparkling' ),
    'footer-links' => esc_html__( 'Footer Links', 'sparkling' ) // secondary nav in footer
  ) );

  // Enable support for Post Formats.
  add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

  // Setup the WordPress core custom background feature.
  add_theme_support( 'custom-background', apply_filters( 'sparkling_custom_background_args', array(
    'default-color' => 'F2F2F2',
    'default-image' => '',
  ) ) );

  // Enable support for HTML5 markup.
  add_theme_support( 'html5', array(
    'comment-list',
    'search-form',
    'comment-form',
    'gallery',
    'caption',
  ) );

  /*
   * Let WordPress manage the document title.
   * By adding theme support, we declare that this theme does not use a
   * hard-coded <title> tag in the document head, and expect WordPress to
   * provide it for us.
   */
  add_theme_support( 'title-tag' );

}
endif; // sparkling_setup
add_action( 'after_setup_theme', 'sparkling_setup' );

/**
 * Register widgetized area and update sidebar with default widgets.
 */
function sparkling_widgets_init() {
  register_sidebar( array(
    'name'          => esc_html__( 'Sidebar', 'sparkling' ),
    'id'            => 'sidebar-1',
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
  ));

  register_sidebar(array(
    'id'            => 'home-widget-1',
    'name'          => esc_html__( 'Homepage Widget 1', 'sparkling' ),
    'description'   => esc_html__( 'Displays on the Home Page', 'sparkling' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="widgettitle">',
    'after_title'   => '</h3>',
  ));

  register_sidebar(array(
    'id'            => 'home-widget-2',
    'name'          => esc_html__( 'Homepage Widget 2', 'sparkling' ),
    'description'   => esc_html__( 'Displays on the Home Page', 'sparkling' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="widgettitle">',
    'after_title'   => '</h3>',
  ));

  register_sidebar(array(
    'id'            => 'home-widget-3',
    'name'          =>  esc_html__( 'Homepage Widget 3', 'sparkling' ),
    'description'   =>  esc_html__( 'Displays on the Home Page', 'sparkling' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="widgettitle">',
    'after_title'   => '</h3>',
  ));

  register_sidebar(array(
    'id'            => 'footer-widget-1',
    'name'          =>  esc_html__( 'Footer Widget 1', 'sparkling' ),
    'description'   =>  esc_html__( 'Used for footer widget area', 'sparkling' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="widgettitle">',
    'after_title'   => '</h3>',
  ));

  register_sidebar(array(
    'id'            => 'footer-widget-2',
    'name'          =>  esc_html__( 'Footer Widget 2', 'sparkling' ),
    'description'   =>  esc_html__( 'Used for footer widget area', 'sparkling' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="widgettitle">',
    'after_title'   => '</h3>',
  ));

  register_sidebar(array(
    'id'            => 'footer-widget-3',
    'name'          =>  esc_html__( 'Footer Widget 3', 'sparkling' ),
    'description'   =>  esc_html__( 'Used for footer widget area', 'sparkling' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="widgettitle">',
    'after_title'   => '</h3>',
  ));

  register_widget( 'sparkling_social_widget' );
  register_widget( 'sparkling_popular_posts' );
  register_widget( 'sparkling_categories' );

}
add_action( 'widgets_init', 'sparkling_widgets_init' );


/* --------------------------------------------------------------
       Theme Widgets
-------------------------------------------------------------- */
require_once(get_template_directory() . '/inc/widgets/widget-categories.php');
require_once(get_template_directory() . '/inc/widgets/widget-social.php');
require_once(get_template_directory() . '/inc/widgets/widget-popular-posts.php');


/**
 * This function removes inline styles set by WordPress gallery.
 */
function sparkling_remove_gallery_css( $css ) {
  return preg_replace( "#<style type='text/css'>(.*?)</style>#s", '', $css );
}

add_filter( 'gallery_style', 'sparkling_remove_gallery_css' );

/**
 * Enqueue scripts and styles.
 */
function sparkling_scripts() {

  // Add Bootstrap default CSS
  wp_enqueue_style( 'sparkling-bootstrap', get_template_directory_uri() . '/inc/css/bootstrap.min.css' );

  // Add Font Awesome stylesheet
  wp_enqueue_style( 'sparkling-icons', get_template_directory_uri().'/inc/css/font-awesome.min.css' );

  // Add Google Fonts
  wp_register_style( 'sparkling-fonts', '//fonts.googleapis.com/css?family=Open+Sans:400italic,400,600,700|Roboto+Slab:400,300,700');

  wp_enqueue_style( 'sparkling-fonts' );

  // Add slider CSS only if is front page ans slider is enabled
  if( ( is_home() || is_front_page() ) && of_get_option('sparkling_slider_checkbox') == 1 ) {
    wp_enqueue_style( 'flexslider-css', get_template_directory_uri().'/inc/css/flexslider.css' );
  }

  // Add main theme stylesheet
  wp_enqueue_style( 'sparkling-style', get_stylesheet_uri() );

  // Add Modernizr for better HTML5 and CSS3 support
  wp_enqueue_script('sparkling-modernizr', get_template_directory_uri().'/inc/js/modernizr.min.js', array('jquery') );

  // Add Bootstrap default JS
  wp_enqueue_script('sparkling-bootstrapjs', get_template_directory_uri().'/inc/js/bootstrap.min.js', array('jquery') );

  if( ( is_home() || is_front_page() ) && of_get_option('sparkling_slider_checkbox') == 1 ) {
    // Add slider JS only if is front page ans slider is enabled
    wp_enqueue_script( 'flexslider-js', get_template_directory_uri() . '/inc/js/flexslider.min.js', array('jquery'), '20140222', true );
    // Flexslider customization
    wp_enqueue_script( 'flexslider-customization', get_template_directory_uri() . '/inc/js/flexslider-custom.js', array('jquery', 'flexslider-js'), '20140716', true );
  }

  // Main theme related functions
  wp_enqueue_script( 'sparkling-functions', get_template_directory_uri() . '/inc/js/dev/functions.js', array('jquery') );

  // This one is for accessibility
  wp_enqueue_script( 'sparkling-skip-link-focus-fix', get_template_directory_uri() . '/inc/js/skip-link-focus-fix.js', array(), '20140222', true );

  // Treaded comments
  if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
    wp_enqueue_script( 'comment-reply' );
  }
}
add_action( 'wp_enqueue_scripts', 'sparkling_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Metabox additions.
 */
require get_template_directory() . '/inc/metaboxes.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load custom nav walker
 */
require get_template_directory() . '/inc/navwalker.php';

// /**
//  * TGMPA
//  */
// require get_template_directory() . '/inc/tgmpa/tgm-plugin-activation.php';

/**
 * Register Social Icon menu
 */
add_action( 'init', 'register_social_menu' );

function register_social_menu() {
	register_nav_menu( 'social-menu', _x( 'Social Menu', 'nav menu location', 'sparkling' ) );
}

/* Globals variables */
global $options_categories;
$options_categories = array();
$options_categories_obj = get_categories();
foreach ($options_categories_obj as $category) {
        $options_categories[$category->cat_ID] = $category->cat_name;
}

global $site_layout;
$site_layout = array('side-pull-left' => esc_html__('Right Sidebar', 'sparkling'),'side-pull-right' => esc_html__('Left Sidebar', 'sparkling'),'no-sidebar' => esc_html__('No Sidebar', 'sparkling'),'full-width' => esc_html__('Full Width', 'sparkling'));

// Typography Options
global $typography_options;
$typography_options = array(
        'sizes' => array( '6px' => '6px','10px' => '10px','12px' => '12px','14px' => '14px','15px' => '15px','16px' => '16px','18'=> '18px','20px' => '20px','24px' => '24px','28px' => '28px','32px' => '32px','36px' => '36px','42px' => '42px','48px' => '48px' ),
        'faces' => array(
                'arial'          => 'Arial',
                'verdana'        => 'Verdana, Geneva',
                'trebuchet'      => 'Trebuchet',
                'georgia'        => 'Georgia',
                'times'          => 'Times New Roman',
                'tahoma'         => 'Tahoma, Geneva',
                'Open Sans'      => 'Open Sans',
                'palatino'       => 'Palatino',
                'helvetica'      => 'Helvetica',
                'Helvetica Neue' => 'Helvetica Neue,Helvetica,Arial,sans-serif'
        ),
        'styles' => array( 'normal' => 'Normal','bold' => 'Bold' ),
        'color'  => true
);

/**
 * Helper function to return the theme option value.
 * If no value has been saved, it returns $default.
 * Needed because options are saved as serialized strings.
 *
 * Not in a class to support backwards compatibility in themes.
 */
if ( ! function_exists( 'of_get_option' ) ) :
function of_get_option( $name, $default = false ) {

	$option_name = '';
	// Get option settings from database
	$options = get_option( 'sparkling' );

	// Return specific option
	if ( isset( $options[$name] ) ) {
		return $options[$name];
	}

	return $default;
}
endif;

/* WooCommerce Support Declaration */
if ( ! function_exists( 'sparkling_woo_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function sparkling_woo_setup() {
	/*
	 * Enable support for WooCemmerce.
	*/
	add_theme_support( 'woocommerce' );

}
endif; // sparkling_woo_setup
add_action( 'after_setup_theme', 'sparkling_woo_setup' );

if ( ! function_exists( 'get_woocommerce_page_id' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function get_woocommerce_page_id() {
	if( is_shop() ){
        return get_option( 'woocommerce_shop_page_id' );
    }
    elseif( is_cart() ){
        return get_option( 'woocommerce_cart_page_id' );
    }
    elseif(is_checkout() ){
        return get_option( 'woocommerce_checkout_page_id' );
    }
    elseif(is_checkout_pay_page() ){
        return get_option( 'woocommerce_pay_page_id' );
    }
    elseif(is_account_page() ){
        return get_option( 'woocommerce_myaccount_page_id' );
    }
    return false;
}
endif;

/**
* is_it_woocommerce_page - Returns true if on a page which uses WooCommerce templates (cart and checkout are standard pages with shortcodes and which are also included)
*/
if ( ! function_exists( 'is_it_woocommerce_page' ) ) :

function is_it_woocommerce_page () {
        if(  function_exists ( "is_woocommerce" ) && is_woocommerce()){
                return true;
        }
        $woocommerce_keys   =   array ( "woocommerce_shop_page_id" ,
                                        "woocommerce_terms_page_id" ,
                                        "woocommerce_cart_page_id" ,
                                        "woocommerce_checkout_page_id" ,
                                        "woocommerce_pay_page_id" ,
                                        "woocommerce_thanks_page_id" ,
                                        "woocommerce_myaccount_page_id" ,
                                        "woocommerce_edit_address_page_id" ,
                                        "woocommerce_view_order_page_id" ,
                                        "woocommerce_change_password_page_id" ,
                                        "woocommerce_logout_page_id" ,
                                        "woocommerce_lost_password_page_id" ) ;
        foreach ( $woocommerce_keys as $wc_page_id ) {
                if ( get_the_ID () == get_option ( $wc_page_id , 0 ) ) {
                        return true ;
                }
        }
        return false;
}

endif;

/**
* get_layout_class - Returns class name for layout i.e full-width, right-sidebar, left-sidebar etc )
*/
if ( ! function_exists( 'get_layout_class' ) ) :

function get_layout_class () {
    global $post;
    if( is_singular() && get_post_meta($post->ID, 'site_layout', true) && !is_singular( array( 'product' ) ) ){
        $layout_class = get_post_meta($post->ID, 'site_layout', true);
    }
    elseif( function_exists ( "is_woocommerce" ) && function_exists ( "is_it_woocommerce_page" ) && is_it_woocommerce_page() && !is_search() ){// Check for WooCommerce
        $page_id = ( is_product() ) ? $post->ID : get_woocommerce_page_id();

        if( $page_id && get_post_meta($page_id, 'site_layout', true) ){
            $layout_class = get_post_meta( $page_id, 'site_layout', true);
        }
        else{
            $layout_class = of_get_option( 'woo_site_layout', 'full-width' );
        }
    }
    else{
        $layout_class = of_get_option( 'site_layout', 'side-pull-left' );
    }
    return $layout_class;
}

endif;

/**
* Training records form
*/
function tr_insert_into_db(){     
    global $wpdb;
    $table = $wpdb->prefix . "training_records"; 

    // starts output buffering
    ob_start();
    ?>
    <form action="#tr_form" method="post" id="tr_form">
  	<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
    	<script type="text/javascript">
    	$(document).ready(function(){
        	$('select[name="drill_name"]').change(function(){
            	$(this).find("option:selected").each(function(){
                	var optionValue = $(this).attr("value");
                	if(optionValue){
                    		$(".box").not("." + optionValue).hide();
                    		$("." + optionValue).show();
                	} else{
                    		$(".box").hide();
                	}
            		});
        	}).change();
    	});
    	</script>
	<style>
	.smallborder
	{
   	  padding: 20px;
   	  border: 1px solid #f0f0f0;
   	  border-bottom: 2px solid #ccc;
    	  -webkit-border-radius: 5px;
    	  -moz-border-radius: 5px;
    	  border-radius: 5px;
	}
	</style>
	<h3>Drill name</h3>
	<p><select id="drill_name" name="drill_name">
	<option value="" id=""></option>
	<option value="soletap" id="soletap">Sole Taps</option>
	<option value="shuffles" id="shuffles">Shuffles</option>
	<option value="shufflestop" id="shufflestop">Shuffle Stops</option>
	<option value="takestop" id="takestop">Take Stops</option>
	<option value="shufflestoptake" id="shufflestoptake">Shuffle Stop Take</option>
	<option value="shuffletake" id="shuffletake">Shuffle Take</option>
	<option value="shufflestopslide" id="shufflestopslide">Shuffle Take</option>
	<option value="slides" id="slides">Slides</option>
	<option value="rollupinside" id="rollupinside">Roll Up Inside</option>
	<option value="rollupoutside" id="rollupoutside">Roll Up Outside</option>
	</select></p>

	<div class="soletap box">
		<p><iframe src="https://www.youtube.com/embed/94KuOfMKG2Q" width="427" height="240" frameborder="0" allowfullscreen="allowfullscreen"></iframe></p>
		<p class="smallborder"><strong>Instructions</strong>
			<ul>
				<li>Begin with the ball at your feet.</li>
				<li>Rotate right and left foot with little touches on the ball.</li>
				<li>The ball should be stationary and moving very little.</li>
			</ul>
	</div>

	<div class="shuffles box">
		<p><iframe src="https://www.youtube.com/embed/dRpfwtPv5hA" width="427" height="240" frameborder="0" allowfullscreen="allowfullscreen"></iframe></p>
		<p class="smallborder"><strong>Instructions</strong>
			<ul>
				<li>Find an area about 4 yards wide.</li>
				<li>Bring the right foot up to half the height of the ball and touch the ball lightly with the inside of the foot to let the ball move to the other foot.</li>
				<li>The right foot is then placed on the ground again.</li>
				<li>The left foot should be up in the air before the ball arrives in order to give it a light touch to counteract its movement and to let the ball return to the right foot again.</li>
			</ul>
		</p>
		<p class="smallborder"><strong>Tips</strong>
			<ul>
				<li>Keep knees behind toes and tension in glutes</li>
				<li>Do not let feet come together</li>
				<li>Keep back flat</li>
			</ul>
		</p>
	</div>
		
	<div class="shufflestop box">		
	<p><iframe src="https://www.youtube.com/embed/15y7MGYKuN8" width="427" height="240" frameborder="0" allowfullscreen="allowfullscreen"></iframe></p>
		<p class="smallborder"><strong>Instructions</strong>
			<ul>
				<li>Starting with the right foot, shuffle the ball three times (in order to constantly switch feet) and on the fourth count, stop the ball with the left foot by means of a Toe Tap.</li>
				<li>The Shuffle starts again with the same left foot that stopped the ball.</li>
				<li>Now after three shuffles stop the ball on the fourth count with the right foot.</li>
				<li>The Shuffle starts again with the right foot and so on... (see step 1).</li>
			</ul>
		</p>
	</div>
		
	<div class="takestop box">
		<p><iframe src="https://www.youtube.com/embed/vkFlgOi4diQ" width="427" height="240" frameborder="0" allowfullscreen="allowfullscreen"></iframe></p>
		<p class="smallborder"><strong>Instructions</strong>
			<ul>
				<li>Clear an area of about 4 yards</li>
				<li>Standing lateral to the ball, push the ball about one yard using the outside of one foot</li>
				<li>Stop the ball's momentum by placing one foot over the ball</li>
				<li>Jump over the ball so the other foot is now lateral to the ball</li>
				<li>Alternate continuously froms side to side</li>
			</ul>
		</p>
	</div>
	
	<div class="shufflestoptake box">
		<p><iframe src="https://www.youtube.com/embed/J77JFvfdm4k" width="427" height="240" frameborder="0" allowfullscreen="allowfullscreen"></iframe></p>
		<p class="smallborder"><strong>Instructions</strong>
			<ul>
				<li>Starting with the right foot, shuffle the ball three times (in order to constantly switch feet) and on the fourth count, stop the ball with the left foot by means of a Toe Tap.</li>
				<li>Directly after the Toe Tap, take the ball sideways with the left foot.</li>
				<li>Stop the ball with the inside of the left foot. This counts as the first shuffle of the next sequence.</li>
				<li>On the fourth count, stop the ball with the right foot by means of a toe tap.</li>
				<li>Directly after, take the ball sideways with the right foot.</li>
				<li>Stop de ball with the inside of the right foot. This counts again as the first shuffle of the next sequence.</li>
				<li>The cycle repeats from here on (see step 1).</li>
			</ul>
		</p>
		<p class="smallborder"><strong>Tips</strong>
			<ul>
				<li>Take the ball with a light touch with the outside of the laces.</li>
				<li>Make sure there is enough space between the feet to take the ball to the side.</li>
				<li>Stay on a straight line while going sideways. Try not to move forwards or backwards.</li>
			</ul>
		</p>
	</div>
	
	<div class="shuffletake box">
		<p><iframe src="https://www.youtube.com/embed/WbLVKfdSMT0" width="427" height="240" frameborder="0" allowfullscreen="allowfullscreen"></iframe></p>
		<p class="smallborder"><strong>Instructions</strong>
			<ul>
				<li>Player should stand with ball betweeh their feet.</li>
				<li>Shuffle three times.</li>
				<li>Use toe tap to stop ball.</li>
				<li>The player now pushes the ball outwards while it is still moving after the 3-count shuffle. The challenge lies again in the correct guiding without kicking the ball and to stay on the sideways imaginary line without the player moving forward or backward.</li>
			</ul>
		</p>
	</div>
	
	<div class="shufflestopslide box">
		<p><iframe src="https://www.youtube.com/embed/owiNAbn2200" width="427" height="240" frameborder="0" allowfullscreen="allowfullscreen"></iframe></p>
		<p class="smallborder"><strong>Instructions</strong>
			<ul>
				<li>Player should stand with ball betweeh their feet.</li>
				<li>Starting with the right foot, shuffle the ball three times (in order to constantly switch feet) and on the fourth count, stop the ball with the left foot by means of a Toe Tap.</li>
				<li>Slide your foot down the side of the ball until it hits the ground.</li>
				<li>The Shuffle starts again with the same left foot that stopped the ball.</li>
				<li>Now after three shuffles stop the ball on the fourth count with the right foot and slide your foot to the ground again..</li>
				<li>The Shuffle starts again with the right foot and so on... (see step 1).</li>
			</ul>
		</p>
	</div>
	
	<div class="slides box">
		<p><iframe src="https://www.youtube.com/embed/z7TuoaA-WN4" width="427" height="240" frameborder="0" allowfullscreen="allowfullscreen"></iframe></p>
		<p class="smallborder"><strong>Instructions</strong>
			<ul>
				<li>Player should stand with ball between their feet.</li>
				<li>Bring the right foot on top of the ball and slide down until foot hits the ground.</li>
				<li>Repeat with left foot, and alternate continuously between the right and left foot.</li>
			</ul>
		</p>
	</div>
	
	<div class="rollupinside box">
		<p><iframe src="https://www.youtube.com/embed/em0ALzMSt6U" width="427" height="240" frameborder="0" allowfullscreen="allowfullscreen"></iframe></p>
		<p class="smallborder"><strong>Instructions</strong>
			<ul>
				<li>Player should stand with ball betweeh their feet.</li>
				<li>Place inside of right foot about half way up side of ball.</li>
				<li>Slide foot to top of ball.</li>
				<li>Slide foot back down to middle side of ball, and repeat with left foot.</li>
				<li>Alternate between right and left foot continuously.</li>
			</ul>
		</p>
	</div>
	
	<div class="rollupoutside box">
		<p><iframe src="https://www.youtube.com/embed/o5Yp2IMI5ZI" width="427" height="240" frameborder="0" allowfullscreen="allowfullscreen"></iframe></p>
		<p class="smallborder"><strong>Instructions</strong>
			<ul>
				<li>Player should stand with ball betweeh their feet.</li>
				<li>Place outside of right foot about half way up side of ball.</li>
				<li>Slide foot to top of ball.</li>
				<li>Slide foot back down to middle side of ball, and repeat with left foot.</li>
				<li>Alternate between right and left foot continuously.</li>
			</ul>
		</p>
	</div>


	<h3>Drill time duration</h3>
	<p><select name="drill_time" id="drill_time">
	<option value="" id=""></option>
	<option value="0.5">0:30</option>
	<option value="1.0">1:00</option>
	<option value="1.5">1:30</option>
	<option value="2.0">2:00</option>
	<option value="2.5">2:30</option>
	<option value="3.0">3:00</option>
	<option value="3.5">3:30</option>
	<option value="4.0">4:00</option>
	<option value="4.5">4:30</option>
	<option value="5.0">5:00</option>
	</select></p>
        <p><input type="submit" name="submit_form" value="submit" class= "button"/></p>
    </form>
	<script type="text/javascript" language="JavaScript"><!--
	function HideContent(d) {
	document.getElementById(d).style.display = "none";
	}
	function ShowContent(d) {
	document.getElementById(d).style.display = "block";
	}
	function ReverseDisplay(d) {
	if(document.getElementById(d).style.display == "none") { document.getElementById(d).style.display = "block"; }
	else { document.getElementById(d).style.display = "none"; }
	}
	//--></script>
	<a href="javascript:ShowContent('stopwatch')">Show stopwatch /</a>
	<a href="javascript:HideContent('stopwatch')">Hide stopwatch</a>
	<div id= "stopwatch" <div id="stopwatch" style="display:none;"><iframe src="http://ipadstopwatch.com/embed.html" frameborder="0" scrolling="no" width="391" height="140"></iframe></div>


    <?php
    $html = ob_get_clean();
    // does the inserting, in case the form is filled and submitted
    if ( isset( $_POST["submit_form"] ) && $_POST["drill_name"] != "" && $_POST["drill_time"] != "" ) {
        $table = $wpdb->prefix."training_records";
	// post info
        $drill_name = strip_tags($_POST["drill_name"], "");
        //$drill_time = strip_tags($_POST["drill_time"], "");
	$drill_time = $_POST["drill_time"];
	$current_user = wp_get_current_user();
	$username = $current_user->user_login;

        $wpdb->insert( 
            $table,
            array( 
		'username' => $username,
                'drill_time' => $drill_time,
		'drill_name' => $drill_name
            )
        );

	$html = "<p>Drill <strong>$drill_name</strong> was successfully recorded for <strong>$drill_time</strong> minutes. <form action='http://youthcoaching.x10host.com/training/'><input type='submit' value='Record another drill' /></form></p>";
    }
    // if the form is submitted but the name is empty
    if ( isset( $_POST["submit_form"] ) && $_POST["drill_name"] == "" && $_POST["drill_time"] == "" ) {
         $html .= "<p>Please fill out drill and time duration fields.</p>";
    }

    // outputs everything
     return $html;

}
// shortcode: [tr-db-insert]
add_shortcode('tr-db-insert', 'tr_insert_into_db');

// pop-up messages 
function alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
}

// only display register if not logged in 
function display_extra_login_info(){
    if ( is_user_logged_in() ) {}
    else {
	echo '<p>New here? Register as a <a href="http://youthcoaching.x10host.com/player-registration">player, </a><a href="http://youthcoaching.x10host.com/parent-registration">parent, </a><a href="http://youthcoaching.x10host.com/team-manager-registration">team manager, </a>or <a href="http://youthcoaching.x10host.com/coach-registration">coach.</a></p>';
    }
}
// shortcode: [display-extra-login-info]
add_shortcode('display-extra-login-info', 'display_extra_login_info');

// for debugging 
function debug_to_console( $data ) {
    $output = $data;
    if ( is_array( $output ) )
        $output = implode( ',', $output);

    echo "<script>console.log( 'Debug Objects: " . $output . "' );</script>";
}

// goto login if user is not logged in
add_action( 'template_redirect', function() {

    if( ( !is_page('user-login')) && ( !is_page('player-registration'))  && ( !is_page('parent-registration'))&& ( !is_page('coach-registration')) && ( !is_page('recover-password')) && ( !is_page('team-manager-registration'))) {

        if (!is_user_logged_in() ) {
            wp_redirect( site_url( '/user-login' ) );        // redirect all...
            exit();
        }

    }

});

function list_users () {
	$blogusers = get_users( 'blog_id=1&orderby=nicename&role=administrator' );
	ob_start ();
	// Array of WP_User objects.
	foreach ( $blogusers as $user ) {
		echo '<span>' . esc_html( $user->display_name ) . ' ' . esc_html( $user->user_email ) . '</span>';
		echo nl2br ( "\n" );
	}
	$output = ob_get_clean ();
	return $output;
}

add_shortcode ('list-users', 'list_users' );

function add_players_to_roster () {
	wp_dropdown_users ();
}

add_shortcode ( 'add-players' , 'add_players_to_roster' );

