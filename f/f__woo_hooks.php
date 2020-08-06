<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

add_action('arena__single-product', 'woocommerce_template_single_title', 10);
add_action('arena__single-product', 'woocommerce_template_single_excerpt', 10);

//add_action('arena__single-product', 'the_content', 20);

//add_action('arena__single-product', 'woocommerce_template_single_meta', 40);
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 20 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );

add_action( 'woocommerce_single_product_summary', 'woocommerce_arena_single_price', 10 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_simple_add_to_cart', 30 );
