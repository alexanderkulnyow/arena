<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package arena
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site container-fluid ">
    <!--	<a class="skip-link screen-reader-text" href="#content">-->
	<?php //esc_html_e( 'Skip to content', 'arena' ); ?><!--</a>-->

    <header id="masthead">
        <div class="container ">
            <div class="row site__header">
                <div class="site__branding col-4 col-md-3">
                    <a href="/">
                        <img class="img-fluid" src="<?php bloginfo( 'template_url' ); ?>/img/logo-last.svg"
                             alt="Танцы витебск">
                        <!--                        <p class="text-center">ресторан-клуб</p>-->
                    </a>

                </div><!-- .site-branding -->

                <div class="d-md-none col-6  text-right">
                    <button id="hamburger" class="hamburger hamburger--spring" type="button">
                        <div class="hamburger-box">
                            <div class="hamburger-inner"></div>
                        </div>
                    </button>
                </div>

                <nav id="menu" class="site__navigation col-12 menu d-md-none">
                    <!--			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">-->
					<?php //esc_html_e( 'Primary Menu', 'arena' ); ?><!--</button>-->

					<?php
					wp_nav_menu( array(
						'theme_location'  => 'Primary',
						'menu_id'         => 'Primary',
						'menu'            => '',
						'container'       => 'ul',
						'container_class' => 'mobile__menu',
						'menu_id'         => 'id-menu',
						'echo'            => true,
//				'items_wrap'      => '<li class="list-group-item list-group-item-action" > <a  href="">%3$s</a></li>',
//				'walker'=> new True_Walker_Nav_Menu()
					) );
					?>
                </nav><!-- #site-navigation -->
                <nav id="" class="site__navigation col-md-6 d-none d-md-block">
                    <!--			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">-->
					<?php //esc_html_e( 'Primary Menu', 'arena' ); ?><!--</button>-->

					<?php
					wp_nav_menu( array(
						'theme_location'  => 'Primary',
						'menu_id'         => 'Primary',
						'menu'            => 'menu-1',
						'container'       => 'ul',
						'container_class' => '',
						'menu_class'      => 'class-menu-ul',
						'menu_id'         => 'id-menu-ul',
						'echo'            => true,
					) );
					?>
                </nav><!-- #site-navigation -->

                <div class="site__login col-md-3 d-none d-md-flex text-right">

                    <div class="s-header__basket-wr woocommerce col-6">

						<?php
						global $woocommerce; ?>
                        <a href="<?php echo esc_url( wc_get_cart_url() ); ?>"
                           class="basket-btn d-flex justify-content-end basket-btn_fixed-xs align-items-center">
                            <span class="basket-btn__label"><i class="fas fa-shopping-bag fa-lg"
                                                               style="padding-right: 10px;"></i></span>
                            <span class="basket-btn__counter"><?php echo sprintf( $woocommerce->cart->cart_contents_count ); ?></span>
                        </a>
                    </div>

                    <div class="col-6">
						<?php
						if ( is_user_logged_in() ) {
							echo '<a href="/account/" class="d-flex justify-content-end align-items-center"><span class="d-none d-lg-inline" style="padding-right: 10px;">Hello</span><i class="fas fa-user fa-lg bg-none" aria-hidden="true"></i></a>';
						} else {
							echo '<a href="/account/" class="d-flex justify-content-end align-items-center"><span class="d-none d-lg-inline" style="padding-right: 10px;">Login</span><i class="fa fa-user-o fa-lg" aria-hidden="true"></i> </a>';
						}
						?>

                        <!--                    </div>-->

                    </div>
                </div>

            </div>


    </header><!-- #masthead -->

	<?php
	if ( is_front_page() ) :
	wc_get_template_part( 'content', 'mainproduct' );
	?>
<!--    <section class="row front__events">-->
<!--        <a href="https://tancy-club.by/category/menyu/menu/">-->
<!--            <img class="img-fluid" style="width: 100vw; height: auto;" src="--><?php //bloginfo( 'template_url' ); ?><!--/img/banner/banner_menu.jpg" alt="Ресторан-клуб Танцы">-->
<!--        </a>-->
<!--    </section>-->

    <div id="content" class="front__content">
		<?php else : ?>
        <div id="content" class="site__content">
			<?php
			//	        woocommerce_breadcrumb();
			endif; ?>
