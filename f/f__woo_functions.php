<?php


if ( ! function_exists( 'woocommerce_template_loop_product_title' ) ) {

	/**
	 * Show the product title in the product loop. By default this is an H2.
	 */
	function woocommerce_template_loop_product_title() {
		echo '<h3 class="card-title ' . esc_attr( apply_filters( 'woocommerce_product_loop_title_classes', 'woocommerce-loop-product__title' ) ) . '">' . get_the_title() . ' </h2>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
}
/**
 * Display the classes for the product div.
 *
 * @param string|array $class One or more classes to add to the class list.
 * @param int|WP_Post|WC_Product $product_id Product ID or product object.
 *
 * @since 3.4.0
 */
function wc_ticket_class( $class = '', $product_id = null ) {
	echo 'class="card col-3 ticket ' . esc_attr( implode( ' ', wc_get_product_class( $class, $product_id ) ) ) . '"';
}

if ( ! function_exists( 'woocommerce_template_loop_product_link_open' ) ) {
	/**
	 * Insert the opening anchor tag for products in the loop.
	 */
	function woocommerce_template_loop_product_link_open() {
		global $product;

		$link = apply_filters( 'woocommerce_loop_product_link', get_the_permalink(), $product );

		echo '<a href="' . esc_url( $link ) . '" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">';
	}
}

if ( ! function_exists( 'woocommerce_template_loop_product_link_close' ) ) {
	/**
	 * Insert the opening anchor tag for products in the loop.
	 */
	function woocommerce_template_loop_product_link_close() {
		echo '</a>';
	}
}

if ( ! function_exists( 'woocommerce_single_prod_thumb' ) ) {
	/**
	 * Insert the opening anchor tag for products in the loop.
	 */
	function woocommerce_single_prod_thumb() {
		if ( has_post_thumbnail() ) : ?>
            <div class="single__thumb-container">
                <img class="single__thumb-img" src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
            </div>

		<?php endif;
	}
}

if ( ! function_exists( 'arena_single_prod_thumb' ) ) {
	/**
	 * Insert the opening anchor tag for products in the loop.
	 */
	function arena_single_prod_thumb() {
		if ( has_post_thumbnail() ) : ?>
            <div class="single__thumb-container embed-responsive-1by1">
                <img class="single__thumb-img embed-responsive-item" src="<?php the_post_thumbnail_url(); ?>"
                     alt="<?php the_title(); ?>">
            </div>

		<?php endif;
	}
}

if ( ! function_exists( 'woocommerce_template_single_excerpt' ) ) {

	/**
	 * Output the product short description (excerpt).
	 */
	function woocommerce_template_single_excerpt() {
		wc_get_template( 'single-product/short-description.php' );
	}
}


add_filter( 'woocommerce_currencies', 'add_my_currency' );

function add_my_currency( $currencies ) {
	$currencies['BYN'] = __( 'Бел. руб.', 'woocommerce' );

	return $currencies;
}

add_filter( 'woocommerce_currency_symbol', 'add_my_currency_symbol', 10, 2 );

function add_my_currency_symbol( $currency_symbol, $currency ) {
	switch ( $currency ) {
		case 'BYN':
			$currency_symbol = 'BYN';
			break;
	}

	return $currency_symbol;
}

function arena__contacts() { ?>
    <div class="row align-content-center">
        <div class="col-12 col-md-5 text-center text-md-left pl-0">
            <ul class=" ">
                <li>
                    <a href="tel:<?php echo get_option( 'dds_options' )['my_tel']; ?>" class="pl-0" target="_blank"><i
                                class="fas fa-phone fa-lg"></i>
						<?php echo get_option( 'dds_options' )['my_tel']; ?>
                    </a>
                </li>
                <li>

                    <a href="tel:<?php echo get_option( 'dds_options' )['my_mail']; ?>" class="pl-0" target="_blank"><i
                                class="fas fa-envelope fa-lg"></i>
						<?php echo get_option( 'dds_options' )['my_mail']; ?>
                    </a>
                </li>
            </ul>

        </div>
        <div class="col-12 col-md-4 text-center text-md-left d-flex justify-content-center flex-column">
            <ul class="">
                <li>
                    <a href="#map" class="link__slow"><i class="fas fa-map-pin fa-lg"></i></i>
						<?php echo get_option( 'dds_options' )['my_adres']; ?>
                    </a>
                </li>
            </ul>
        </div>
        <div class="col-12 col-md-3 icons text-center text-md-left">
            <a href="https://vk.com/tancy_vitebsk" target="_blank"><i class="fab fa-vk fa-2x"></i></a>
            <a href="https://instagram.com/tancy_vitebsk"><i class="fab fa-instagram fa-2x" target="_blank"></i></a>


        </div>

    </div>
	<?php
}


//ordering
add_filter( 'woocommerce_get_catalog_ordering_args', 'enable_catalog_ordering_by_modified_date' );
function enable_catalog_ordering_by_modified_date( $args ) {
	if ( isset( $_GET['orderby'] ) ) {
		if ( 'modified_date' == $_GET['orderby'] ) {
			return array(
				'orderby' => 'Date',
				'order'   => 'ASC',
			);
		} // Make a clone of "menu_order" (the default option)
        elseif ( 'natural_order' == $_GET['orderby'] ) {
			return array( 'orderby' => 'menu_order title', 'order' => 'ASC' );
		}
	}

	return $args;
}

add_filter( 'woocommerce_catalog_orderby', 'add_catalog_orderby_modified_date' );
function add_catalog_orderby_modified_date( $orderby_options ) {
	// Insert "Sort by modified date" and the clone of "menu_order" adding after others sorting options
	return array(
		       'modified_date' => __( "Последний", "woocommerce" ),
		       'natural_order' => __( "Последний", "woocommerce" ), // <== To be renamed at your convenience
	       ) + $orderby_options;

	return $orderby_options;
}


add_filter( 'woocommerce_default_catalog_orderby', 'default_catalog_orderby_modified_date' );
function default_catalog_orderby_modified_date( $default_orderby ) {
	return 'modified';
}

add_action( 'woocommerce_product_query', 'product_query_by_modified_date' );
function product_query_by_modified_date( $q ) {
	if ( ! isset( $_GET['orderby'] ) && ! is_admin() ) {
		$q->set( 'orderby', 'Dete' );
		$q->set( 'order', 'ASC' );
	}
}

//end ordering


// Добавление колонки в аминке товара edata = дата меропиятия
add_filter( 'manage_product_posts_columns', 'add_edate_column', 4 );
function add_edate_column( $columns ) {

	$num         = 0; // после какой по счету колонки вставлять новые
	$new_columns = array(
		'edate' => 'Состоится',
	);
	unset( $columns['product_tag'] );
	unset( $columns['edate'] );

	return array_slice( $columns, 0, $num ) + $new_columns + array_slice( $columns, $num );
}

// заполнение колонки edata
add_action( 'manage_product_posts_custom_column', 'fill_edate_column', 5, 2 );
function fill_edate_column( $colname, $product ) {
	global $product;
	if ( $colname === 'edate' ) {
		$var  = yit_get_prop( $product, '_start_date_picker', true );
		$date = str_replace( '/', '-', $var );
		echo date( 'd.m.Y', strtotime( $date ) );
	}
}

// делаем колонку сортируемой
add_filter( 'manage_' . 'edit-product' . '_sortable_columns', 'add_views_sortable_column' );
function add_views_sortable_column( $sortable_columns ) {
	$sortable_columns['edate'] = [ 'edate_edate', false ];
	// false = asc (по умолчанию)
	// true  = desc
	return $sortable_columns;
}


if ( ! function_exists( 'woocommerce_arena_single_price' ) ) {

	/**
	 * Output the product price.
	 */
	function woocommerce_arena_single_price() {
		wc_get_template( 'single-product/arena_price.php' );
	}
}


if ( ! function_exists( 'woocommerce_product_loop_start1' ) ) {

	/**
	 * Output the start of a product loop. By default this is a UL.
	 *
	 * @param bool $echo Should echo?.
	 *
	 * @return string
	 */
	function woocommerce_product_loop_start1( $echo = true ) {
		ob_start();

		wc_set_loop_prop( 'loop', 0 );

		wc_get_template( 'loop/loop-start1.php' );

		$loop_start = apply_filters( 'woocommerce_product_loop_start', ob_get_clean() );

		if ( $echo ) {
			echo $loop_start; // WPCS: XSS ok.
		} else {
			return $loop_start;
		}
	}
}

//шорткод для карусели
// todo мне не нравится этот вывод
add_shortcode( 'custom_recent_products', 'custom_recent_products_FX' );
function custom_recent_products_FX( $atts ) {
	global $woocommerce_loop, $woocommerce;

	extract( shortcode_atts( array(
		'per_page' => '-1',
		'columns'  => '4',
		'orderby'  => 'date',
		'order'    => 'asc'
	), $atts ) );

	$meta_query = $woocommerce->query->get_meta_query();
	$args       = array(
		'post_type'           => 'product',
		'post_status'         => 'publish',
		'ignore_sticky_posts' => 1,
		'posts_per_page'      => $per_page,
		'orderby'             => $orderby,
		'order'               => $order,
		'meta_query'          => $meta_query
	);

	ob_start();

	$products = new WP_Query( $args );

	$woocommerce_loop['columns'] = $columns;

	if ( $products->have_posts() ) : ?>

		<?php woocommerce_product_loop_start1(); ?>

		<?php while ( $products->have_posts() ) : $products->the_post(); ?>

			<?php wc_get_template_part( 'content', 'slickproduct' ); ?>

		<?php endwhile; // end of the loop. ?>

		<?php woocommerce_product_loop_end(); ?>

	<?php endif;

	wp_reset_postdata();

	return '<div class="slick items">' . ob_get_clean() . '</div>';
}

//шорткод роззыгрыша
function arena_events_iphone() {
	global $product;
	$args = array(
		'post_type'      => 'product',
		'posts_per_page' => - 1,
		'product_cat'    => 'iphone_party',
		'orderby'          => 'date',
		'order'            => 'ASC',

	);

	?>

		<?php
		ob_start();
		$loop = new WP_Query( $args );
		while ( $loop->have_posts() ) : $loop->the_post();
		?>
        <li class="col-12 col-sm-6 col-md-4 col-lg-4 "><?php wc_get_template_part( 'card' ); ?></li>
            <?php

		endwhile;

		wp_reset_query();

		return '<ul class="products tickets row">' . ob_get_clean() . '</ul>';
		?>
	<?php
}
add_shortcode( 'event__iphone', 'arena_events_iphone' );


