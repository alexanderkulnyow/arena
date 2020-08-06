<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package arena
 */
get_header();
?>
    <div id="primary" class="content-area container">
        <main id="main" class="site-main">


            <section class="error-404 not-found">
                <header class="page-header">
                    <h1 class="page-title text-center"><?php esc_html_e( 'Страница не найдена', 'arena' ); ?></h1>
                </header><!-- .page-header -->

                <div class="page-content">
                    <p class="text-center"><?php esc_html_e( 'По вашему запросу ничего не было найдено:', 'arena' ); ?></p>

                    <div class="text-center">
                        <a class="n404 text-center" href="/">404</a>
                    </div>

                    <div class="text-center">
                        <a href="/">Нажмите для перехода на главную страницу</a>
                    </div>


            </section><!-- .error-404 -->

        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_footer();
