<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

//function arena_scripts() {
////	styles
//	wp_enqueue_style( 'load-fa', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' );
//	wp_enqueue_style( 'dashicons' );
////	scripts
//	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.js', array(), '1', true );
//	wp_enqueue_script( 'arena-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '1.1', true );
//	wp_enqueue_script( 'arena-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '1.1', true );
////	various scripts
//	if ( is_front_page() ) {
//		wp_enqueue_style( 'arena__slicktheme-style', get_template_directory_uri() . '/libs/slick/slick-theme.css', array(), '1.42' );
//		wp_enqueue_style( 'arena__slick-style', get_template_directory_uri() . '/libs/slick/slick.css', array(), '1.42' );
//		wp_enqueue_script( 'arena__slick-script', get_template_directory_uri() . '/libs/slick/slick.min.js', array(), '1.43', true );
//		wp_enqueue_script( 'arena__slick-init', get_template_directory_uri() . '/js/slick_init.js', array( 'arena__slick-script' ), '1.48', true );
//	}
//	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
//		wp_enqueue_script( 'comment-reply' );
//	}
//	if ( is_category( array( 'menu', 'beverages', 'banketnoe-menu' ) ) ) {
//		wp_enqueue_script( 'arena-mixitup', get_template_directory_uri() . '/libs/mixitup/mixitup.min.js', array(), '1.1', true );
//		wp_enqueue_script( 'arena-mixitup_init', get_template_directory_uri() . '/js/mixitup_init.js', array( 'arena-mixitup' ), '1.1', true );
//	}
//
//	if ( in_category( array( 'photo', 'menyu' ) ) ) {
//		wp_enqueue_style( 'arena__popup-style', get_template_directory_uri() . '/libs/magnific-popup/magnific-popup.css', array(), '1.42' );
//		wp_enqueue_script( 'arena__popup', get_template_directory_uri() . '/libs/magnific-popup/jquery.magnific-popup.min.js', array( 'jquery' ), '1.0', true );
//		wp_enqueue_script( 'arena__popup_init', get_template_directory_uri() . '/js/magnific-popup-init.js', array( 'arena__popup' ), '1.0', true );
//	}
//
//	wp_enqueue_style( 'arena-style', get_stylesheet_uri(), array(), '1.776' );
//	wp_enqueue_script( 'index', get_template_directory_uri() . '/js/index.js', array(), '1.63', true );
//}
//
//add_action( 'wp_enqueue_scripts', 'arena_scripts' );
//function admin_style() {
//	wp_enqueue_script( 'bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css', array(), '1', true );
//
//}
//add_action('admin_enqueue_scripts', 'admin_style');
//gender
// ---- Save user input into database.
//add_action( 'woocommerce_save_account_details', 'custom_woocommerce_save_account_details' );
//function custom_woocommerce_save_account_details( $user_id ) {
//	if ( $user_id ) {
//		if ( isset( $_POST['gender'] ) ) {
//			if ( $_POST['gender'] == 'Male' || $_POST['gender'] == 'Female' ) {
//				update_user_meta( $user_id, 'gender', $_POST['gender'] );
//			}
//		}
//	}
//}

function arena_checker_user_css() {
	$user = wp_get_current_user();
	if ( in_array( 'checker', (array) $user->roles ) ) {
		echo '<style> 
#wpadminbar{display: none ;}
#adminmenuback{display: none ;}
#adminmenuwrap{display: none ;}
 </style>';
	}
}

add_action( 'admin_head', 'arena_checker_user_css' );
