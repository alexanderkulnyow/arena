<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package arena
 */

get_header();
?>


    <div id="primary" class="content-area" style="margin-bottom: 30px;">


        <main id="main" class="site-main container container-menu">
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
            <header class="page-header">
                <h1 class="" style="margin-top: 20px; margin-bottom: 20px;">Коктейли/Шоты</h1>
            </header><!-- .page-header -->
            <div class="col-12 order-md-0 order-1">
<!--                <nav class="d-block">-->
<!--                    <ul class="controls menu_controls">-->
<!--						--><?php
//						$all_categories = get_categories( array(
//							'child_of'   => 33,
//							'hide_empty' => false
//						) );
//						?>
<!---->
<!--						--><?php //foreach ( $all_categories as $category ): ?>
<!--                            <li data-filter=".--><?php //echo $category->slug; ?><!--">--><?php //echo $category->name; ?><!--</li>-->
<!--						--><?php //endforeach; ?>
<!--                    </ul>-->
<!--                </nav>-->
                <div class="row menu__container">
					<?php
					$args  = array(
						'numberposts'      => - 1,
						'category_name'    => 'kokteli',
						'orderby'          => 'date',
						'order'            => 'DESC',
						'include'          => array(),
						'exclude'          => array(),
						'meta_key'         => '',
						'meta_value'       => '',
						'post_type'        => 'post_type_name',
						'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
					);
					$posts = get_posts( $args );
					foreach (
						$posts

						as $post
					) {
						setup_postdata( $post );

						$categories  = get_the_category();
						$slugs       = wp_list_pluck( $categories, 'slug' );
						$class_names = join( ' ', $slugs );

						?>

                        <div class=" col-12 col-sm-6 col-md-4 col-lg-3 mix <?php if ( $class_names ) {
							echo ' ' . $class_names;
						} ?>">

                            <div class="card col-12">
                                <div class="card__header ">
                                    <div class="embed-responsive embed-responsive-1by1">
										<?php if ( has_post_thumbnail() ) {
										$thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'thumbnail' );
										?>
                                        <img class="photo-img-top img-fluid embed-responsive-item"
                                             src="<?php echo $thumb[0] ?>"
                                             alt="" title="Клуб танцы"/>
                                    </div>

									<?php } ?>
                                </div>


                                <div class="card-body card__body dish__body">
									<?php
									the_title( '<h2 class="product_title entry-title">', '</h2>' ); ?>
                                    <div class="dish__description"><?php the_content(); ?> </div>


                                </div>
                                <div class="card__footer dish__footer">
                                    <div class="card__price dish__price">

                                        <p><?php echo get_post_meta( $post->ID, 'menu-weight', true ); ?> ml</p>
                                        <p><?php echo get_post_meta( $post->ID, 'menu-cost', true ); ?> BYN</p>

                                    </div>


                                </div>
                            </div>


                        </div>
					<?php }
					wp_reset_postdata(); ?>
                </div>


            </div>


        </main><!-- #main -->
    </div><!-- #primary -->
    <script>
        jQuery(document).ready(function ($) {
            // микситап
            $(function () {
                let containerEl = document.querySelector('.menu__container');
                let mixer = mixitup(containerEl, {
                    controls: {
                        // toggleDefault: 'none'
                    },
                    animation: {
                        duration: 250,
                        // easing: 'ease-in-out'
                    }
                });
            })
        });

    </script>
<?php
get_footer();
