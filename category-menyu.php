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
                <h1 class="" style="margin-top: 20px; margin-bottom: 20px;">Меню</h1>
            </header><!-- .page-header -->
            <div class="main__menu-list">
				<?php
				$args = array(
					'show_option_all'    => '',
					'show_option_none'   => __('No categories'),
					'orderby'            => 'date',
					'order'              => 'DESC',
					'style'              => 'none',
					'show_count'         => 0,
					'hide_empty'         => 1,
					'use_desc_for_title' => 1,
					'child_of'           => 38,
					'feed'               => '',
					'feed_type'          => '',
					'feed_image'         => '',
					'exclude'            => '',
					'exclude_tree'       => '',
					'include'            => '',
					'hierarchical'       => true,
					'title_li'           => 0,
					'number'             => NULL,
					'echo'               => 1,
					'depth'              => 1,
					'current_category'   => 0,
					'pad_counts'         => 0,
					'taxonomy'           => 'category',
					'walker'             => 'Walker_Category',
					'hide_title_if_empty' => false,
					'separator'          => '<br />',
				);

				echo '<div>';
				wp_list_categories( $args );
				echo '</div>';
				?>


            </div>


        </main><!-- #main -->
    </div><!-- #primary -->


<?php
get_footer();
