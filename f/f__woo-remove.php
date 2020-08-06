<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


add_filter( 'woocommerce_checkout_fields', 'custom_override_checkout_fields' );

function custom_override_checkout_fields( $fields ) {
	unset($fields['billing']['billing_company']);
	unset($fields['billing']['billing_address_1']);
	unset($fields['billing']['billing_address_2']);
	unset($fields['billing']['billing_postcode']);
	unset($fields['billing']['billing_country']);
	unset($fields['billing']['billing_state']);
	unset($fields['billing']['billing_city']);
	unset($fields['order']['order_comments']);
	return $fields;
}


remove_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form', 10 );


add_filter( 'woocommerce_checkout_fields' , 'no_required_checkout_fields' );
function no_required_checkout_fields( $fields ) {
	$fields['billing']['billing_last_name']['required'] = false;
	return $fields;
}


////todo эта штука выдает ошибку временно отключен
//if ( ! function_exists( 'woocommerce_product_loop_start1' ) ) {
//
//	/**
//	 * Output the start of a product loop. By default this is a UL.
//	 *
//	 * @param bool $echo Should echo?.
//	 * @return string
//	 */
//	function woocommerce_product_loop_start1( $echo = true ) {
//		ob_start();
//
//		wc_set_loop_prop( 'loop', 0 );
//
//		wc_get_template( 'loop/loop-start1.php' );
//
//		$loop_start = apply_filters( 'woocommerce_product_loop_start', ob_get_clean() );
//
//		if ( $echo ) {
//			echo $loop_start; // WPCS: XSS ok.
//		} else {
//			return $loop_start;
//		}
//	}
//}
//add_action( 'load-edit.php', 'posts_for_current_contributor' );

//todo мне это не нравится
function custom_recent_products_RELATED($atts) {
	global $woocommerce_loop, $woocommerce;

	extract(shortcode_atts(array(
		'per_page'  => '2',
		'columns'   => '1',
		'orderby' => 'date',
		'order' => 'DESC'
	), $atts));

	$meta_query = $woocommerce->query->get_meta_query();

	$args = array(
		'post_type' => 'product',
		'post_status' => 'publish',
		'ignore_sticky_posts'   => 1,
		'posts_per_page' => $per_page,
		'orderby' => $orderby,
		'order' => $order,
		'meta_query' => $meta_query
	);

	ob_start();

	$products = new WP_Query( $args );

	$woocommerce_loop['columns'] = $columns;

	if ( $products->have_posts() ) : ?>

			<?php woocommerce_product_loop_start1(); ?>

			<?php while ( $products->have_posts() ) : $products->the_post(); ?>

				<?php wc_get_template_part( 'card' ); ?>

			<?php endwhile; // end of the loop. ?>

			<?php woocommerce_product_loop_end(); ?>

		<?php endif;

	wp_reset_postdata();

	return '<li class="col-6 col-md-12 d-none d-md-block" > ' . ob_get_clean() . '</li>';
}
add_shortcode('custom_RELATED_products','custom_recent_products_RELATED');
