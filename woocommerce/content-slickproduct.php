<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>

    <div class="card card__afisha" style="margin: 0 10px;">

        <div class="card__header ">
			<?php woocommerce_template_loop_product_link_open(); ?>
            <div class="embed-responsive embed-responsive-1by1">
				<?php
				$args = array(
					'size'  => 'thumbnail',
					'class' => ' img-fluid embed-responsive-item'
				);
				echo get_the_post_thumbnail( $id, 'thumbnail', array('class' => 'img-fluid embed-responsive-item') );
				//			the_post_thumbnail( $args );
				?>
            </div>

			<?php arena_budge__small();
			woocommerce_template_loop_product_link_close(); ?>
        </div>


        <div class="card-body card__body">
			<?php
			woocommerce_template_loop_product_link_open();
			the_title( '<h2 class="product_title entry-title">', '</h2>' );
			?>
            <span><?php global $product;
				echo yit_get_prop( $product, '_start_time_picker', true ); ?> - <?php echo yit_get_prop( $product, '_end_time_picker', true ); ?>
        </span>
			<?php
			woocommerce_template_single_excerpt();
			woocommerce_template_loop_product_link_close();
			?>
        </div>
        <div class="card__footer">
            <div class="card__price">

				<?php woocommerce_template_loop_price(); ?>

            </div>

            <div class="card__button">
                <span class="INFO">info</span>
                <img class="arrow" src="<?php bloginfo( 'template_url' ); ?>/img/arrow.png" height="7px"
                     alt="Клуб Танцы">
				<?php
				$args = array(
					'class' == 'classname'
				);
				arena_card_ad_to_cart(); ?>
            </div>
        </div>
    </div>
