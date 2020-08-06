<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package arena
 */

get_header();
?>
    <div class="contacts__bg">
        <div class="contacts__bg-overlay">


            <main id="main" class="site-main container">
				<?php
				/**
				 * Hook: woocommerce_before_main_content.
				 *
				 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
				 * @hooked woocommerce_breadcrumb - 20
				 * @hooked WC_Structured_Data::generate_website_data() - 30
				 */
				//		do_action( 'woocommerce_before_main_content' );
				woocommerce_breadcrumb();

				?>

                <h1 style="font-weight: bold;"> Контакты</h1>
                <div class="row">
                    <div class="col-12 col-md-3 text-center text-md-left">
                        <ul class="page__contacts-list list__none">
                            <li>
                                <a href="tel:<?php echo get_option( 'dds_options' )['my_tel']; ?>" class="pl-0"
                                   target="_blank"><i
                                            class="fas fa-phone fa-lg"></i>
									<?php echo get_option( 'dds_options' )['my_tel']; ?>
                                </a>
                            </li>
                            <li>
                                <a href="tel:<?php echo get_option( 'dds_options' )['my_mail']; ?>" class="pl-0"
                                   target="_blank"><i
                                            class="fas fa-envelope fa-lg"></i>
									<?php echo get_option( 'dds_options' )['my_mail']; ?>
                                </a>
                            </li>
                            <li>
                                <a href="#map" class="link__slow"><i class="fas fa-map-pin fa-lg"></i></i>
									<?php echo get_option( 'dds_options' )['my_adres']; ?>
                                </a>
                            </li>
                            <li>
                                <a href="https://vk.com/tancy_vitebsk" target="_blank"><i
                                            class="fab fa-vk fa-2x"></i></a>


                                <a href="https://instagram.com/tancy_vitebsk"><i class="fab fa-instagram fa-2x"
                                                                                 target="_blank"></i></a>

                            </li>
                        </ul>


                    </div>
                    <div class="col-12 col-md-9">
						<?php echo do_shortcode( '[contact-form-7 id="285" title="main__feedback"]' ) ?>
                    </div>

                </div>


                </section>

            </main><!-- #main -->
        </div><!-- #primary -->
    </div>


<?php
get_sidebar();
get_footer();
