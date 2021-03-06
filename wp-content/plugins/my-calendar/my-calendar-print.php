<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

add_action( 'template_redirect', 'my_calendar_print_view' );
function my_calendar_print_view() {
	if ( isset( $_GET['cid'] ) && $_GET['cid'] == 'mc-print-view' ) {
		echo my_calendar_print();
		exit;
	}
}
	
	
function my_calendar_print() {
	$url      = plugin_dir_url( __FILE__ );
	$time     = ( isset( $_GET['time'] ) ) ? $_GET['time'] : 'month';
	$category = ( isset( $_GET['mcat'] ) ) ? $_GET['mcat'] : ''; // these are sanitized elsewhere
	$ltype    = ( isset( $_GET['ltype'] ) ) ? $_GET['ltype'] : '';
	$lvalue   = ( isset( $_GET['lvalue'] ) ) ? $_GET['lvalue'] : '';
	header( 'Content-Type: ' . get_bloginfo( 'html_type' ) . '; charset=' . get_bloginfo( 'charset' ) );
	if ( mc_file_exists( 'css/mc-print.css' ) ) {
		$stylesheet = mc_get_file( 'css/mc-print.css', 'url' );
	} else {
		$stylesheet = $url . "css/mc-print.css";
	}	
	$rtl = ( is_rtl() ) ? 'rtl' : 'ltr';
	$head = '<!DOCTYPE html>
<html dir="' . $rtl . '" lang="' . get_bloginfo( 'language' ) . '">
<!--<![endif]-->
<head>
<meta charset="' . get_bloginfo( 'charset' ) . '" />
<meta name="viewport" content="width=device-width" />
<title>' . get_bloginfo( 'name' ) . ' - ' . __( 'Calendar: Print View', 'my-calendar' ) . '</title>
<meta name="generator" content="My Calendar for WordPress" />
<meta name="robots" content="noindex,nofollow" />
<!-- Copy mc-print.css to your theme directory if you wish to replace the default print styles -->
<link rel="stylesheet" href="' . $stylesheet. '" type="text/css" media="screen,print" />
</head>
<body>';
echo $head;
	echo my_calendar( 'print', 'calendar', $category, $time, $ltype, $lvalue, 'mc-print-view', '', '', null, null, 'none', 'none' );
	$return_url = ( get_option( 'mc_uri' ) != '' && ! is_numeric( get_option( 'mc_uri' ) ) ) ? get_option( 'mc_uri' ) : home_url();
	$return_url = apply_filters( 'mc_print_return_url', $return_url, $category, $time, $ltype, $lvalue );
	
	if ( isset( $_GET['href'] ) ) {
		$ref_url = esc_url( urldecode( $_GET['href'] ) );
		if ( $ref_url ) {
			$return_url = $ref_url;
		}
	}
	
	$add        = array_map( 'esc_sql', $_GET );
	unset( $add['cid'] );
	unset( $add['feed'] );
	unset( $add['href'] );
	$return_url = mc_build_url( $add, array( 'feed', 'cid', 'href' ), $return_url );
	echo "<p class='return'><a href='$return_url'>" . __( 'Return to calendar', 'my-calendar' ) . "</a></p>";
	echo '
</body>
</html>';
}