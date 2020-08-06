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

$args  = array(
	'numberposts'      => 1,
	'category_name'    => 'events',
	'orderby'          => 'date',
	'order'            => 'DESC',
	'include'          => array(),
	'exclude'          => array(),
	'meta_key'         => '',
	'meta_value'       => '',
	'post_type'        => 'post',
	'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
);
$posts = get_posts( $args );
foreach ( $posts as $post ) {
	setup_postdata( $post );
	?>
    <section class="row front__events">
        <div class="" style="overflow: hidden;">
            <div class="container">
                <div class="event-caption">
                    <style>
                        .event-caption {
                            position: absolute;
                            z-index: 999;
                            top: 40%;
                            transform: translateY(-50%);
                        }

                        .event-caption a:hover {
                            text-decoration: none;
                        }

                        @media only screen and (max-device-width: 786px) {
                            .event-caption {
                                top: 28%;
                            }

                            h1 {
                                font-size: 1.8rem;
                            }

                        }
                    </style>
                    <a href="<?php echo get_permalink(); ?>">
                        <h1><?php echo get_the_title(); ?></h1></a>
                    <h5><?php echo get_the_excerpt(); ?></h5>
                    <a href="<?php echo get_permalink(); ?>">
                        <button class="arena__button mt-4">
							<?php echo get_post_meta( get_the_ID(), 'main_button', true ); ?>
                        </button>
                </div>
            </div>
            <img class="img-fluid" style="width: 100vw; height: auto;"
                 srcset="
                     <?php echo get_the_post_thumbnail_url( $post, 'full' ); ?> 1920w,
                     <?php echo get_the_post_thumbnail_url( $post, 'shop_catalog' ); ?> 768w"
                 src="<?php echo get_the_post_thumbnail_url( $post, 'full' ); ?>"
                 sizes="(max-width: 800px) 768w, (min-width: 801px) 1920px">


            </a>

        </div>
    </section>

	<?php
}
?>

<?php
wp_reset_postdata();
?>




<?php


	dds__banner();




