<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
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

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked wc_print_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.

	return;
}
?>

<div id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>


    <div class="row">
        <div class="col-12">
            <div class="single-product__header">
                <!--                h1 + except-->
				<?php do_action( 'arena__single-product' ); ?>
            </div>
        </div>
        <div class="col-12 col-lg-9 single-product">

            <!--            end product__header-->
            <div class="w-100 "></div>
            <!--                <div class="col-12 col-lg-9">-->
            <div class="single__prod-thumbnail">
				<?php
				//	            $attr = array(
				//		            'src'   => $src,
				//		            'class' => "attachment-$size img-fluid",
				//		            'alt'   => trim(strip_tags( $wp_postmeta->_wp_attachment_image_alt )),
				//	            );
				echo get_the_post_thumbnail( $id, 'medium', array( 'class' => 'img-fluid' ) ); ?>
            </div>
            <div class="single-product__location">
                <div class="row">
                    <div class="col-12 col-md-4 ">
                        <div class="col-12 single-product__location-item">
                            <div class="loc__icon">
                                <img src="<?php bloginfo( 'template_url' ); ?>/img/sp/day.png"
                                     alt="Танцы витебск">
                            </div>
                            <div class="loc__text">
                                <span>Дата</span>
                                <span>
                                                <?php

                                                $var  = yit_get_prop( $product, '_start_date_picker', true );
                                                $date = str_replace( '/', '-', $var );
                                                echo date( 'd.m.Y', strtotime( $date ) );

                                                ?>
                                            </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 ">
                        <div class="col-12 single-product__location-item">
                            <div class="loc__icon">
                                <img src="<?php bloginfo( 'template_url' ); ?>/img/sp/time.png"
                                     alt="Танцы витебск">
                            </div>
                            <div class="loc__text">
                                <span>Время</span>
                                <span>
											<?php
											$time = yit_get_prop( $product, '_start_time_picker', true );
											echo $time
											?>
                                             </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 ">
                        <div class="col-12 single-product__location-item">
                            <div class="loc__icon">
                                <img src="<?php bloginfo( 'template_url' ); ?>/img/sp/location.png"
                                     alt="Танцы витебск">
                            </div>
                            <div class="loc__text">
                                <span>Место</span>
                                <span>Клуб Танцы</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--Место для табов-->
            <ul class="nav nav-tabs sp__check-nav" id="myTab" role="tablist">
                <li class="nav-item sp__check-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#description"
                       role="tab"
                       aria-controls="home" aria-selected="true">Описание</a>
                </li>
				<?php

				if ( current_user_can( 'level_3' ) ) {
					?>
                    <li class="nav-item sp__check-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#check" role="tab"
                           aria-controls="profile" aria-selected="false">Проверка билетов</a>
                    </li>
					<?php
				}
				?>
            </ul>
            <!--            end tab navigation-->

            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="description" role="tabpanel"
                     aria-labelledby="home-tab">

                    <div class="summary entry-summary">

                        <div class="sp__description">
							<?php the_content(); ?>
                        </div>
                        <div class="table__reservation">
                            <!--										--><?php //arena_tables(); ?>
                        </div>
						<?php
						/**
						 * Hook: woocommerce_after_single_product_summary.
						 *
						 * @hooked woocommerce_output_product_data_tabs - 10
						 * @hooked woocommerce_upsell_display - 15
						 * @hooked woocommerce_output_related_products - 20
						 */
						remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
						remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
						do_action( 'woocommerce_after_single_product_summary' );
						?>
                    </div>
                    <div class="summary entry-summary">
						<?php


						/**
						 * Hook: woocommerce_single_product_summary.
						 *
						 * @hooked woocommerce_template_single_title - 5
						 * @hooked woocommerce_template_single_rating - 10
						 * @hooked woocommerce_template_single_price - 10
						 * @hooked woocommerce_template_single_excerpt - 20
						 * @hooked woocommerce_template_single_add_to_cart - 30
						 * @hooked woocommerce_template_single_meta - 40
						 * @hooked woocommerce_template_single_sharing - 50
						 * @hooked WC_Structured_Data::generate_product_data() - 60
						 */
						date_default_timezone_set( 'Europe/Moscow' );

						$end_date        = yit_get_prop( $product, '_end_date_picker', true );
						$end_time        = yit_get_prop( $product, '_end_time_picker', true );
						$right_now       = date( "Y-m-d H:i:s" );
						$right_now__glob = strtotime( $right_now );
						$end_time1       = date( "Y-m-d H:i:s", strtotime( $end_date . $end_time ) );
						$end_time__glob  = strtotime( $end_time1 );
						if ( $end_time__glob > $right_now__glob ) {
							woocommerce_simple_add_to_cart();
						} else {
							echo '<h4 class="text-center">Мероприятие завершено</h4>';
						}
						?>

                    </div>
                </div>
                <div class="tab-pane fade" id="check" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="row">
                        <div class="item_check col-12">
                            <style>
                                .yith_wcevti_check_in {
                                    width: 100%;
                                }
                            </style>
							<?php

							if ( current_user_can( 'level_3' ) ) {
								echo do_shortcode( '[check_in_event id =' . get_the_ID() . ']' );
							}

							?>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <!--        end single-product-->
        <div class="d-none d-lg-block col-lg-3 tickets__same">
            <!--				--><?php
			echo do_shortcode( '[custom_RELATED_products]' );
			//				?>
			<?php woocommerce_related_products(); ?>
			<?php do_action( 'woocommerce_after_single_product' ); ?>
        </div>

    </div>
    <!--    end row-->
</div>
<!--end product-->


