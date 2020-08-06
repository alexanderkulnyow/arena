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
            <header class="page-header">
                <h1 class="" style="margin-top: 20px; margin-bottom: 20px;">Фотоотчеты мероприятий</h1>
            </header><!-- .page-header -->
            <div class="col-12 order-md-0 order-1">
                <div class="row">
					<?php
					// параметры по умолчанию
					$args  = array(
						'numberposts'      => - 1,
						'category_name'    => 'photo',
						'orderby'          => 'date',
						'order'            => 'DESC',
						'post_type'        => 'post',
						'post_status'      => 'publish',
						'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
					);
					$posts = get_posts( $args );
					foreach ( $posts as $post ) {
						setup_postdata( $post ); ?>
                        <div class="col-6 col-md-3 galery__item">
							<?php portfolio_post_thumbnail(); ?>
                        </div>
					<?php }
					wp_reset_postdata();
					?>
                </div>
            </div>
        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_footer();
