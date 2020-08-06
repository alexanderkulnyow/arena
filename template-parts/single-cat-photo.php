<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package arena
 */

get_header();
?>

    <div id="primary" class="content-area container">
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
        <main id="main" class="site-main">

			<?php
			while ( have_posts() ) :
				the_post(); ?>

                <article id="post-<?php the_ID(); ?>" class="single-cat-photo">
                    <header class="entry-header">
						<?php
						if ( is_singular() ) :
							the_title( '<h1 class="entry-title">', '</h1>' );
						else :
							the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
						endif;

						?>
                    </header><!-- .entry-header -->

                    <div class="entry-content">
						<?php
						the_content();
						?>
                    </div><!-- .entry-content -->

                </article>
			<?php
			endwhile; // End of the loop.
			?>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php
//get_sidebar();
get_footer();
