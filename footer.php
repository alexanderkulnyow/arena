<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package arena
 */

?>


</div><!-- #content -->

<footer id="colophon" class="row site__footer">
    <div class="container">
        <div class="row">
            <div class="site__branding col-12 col-md-3 col-sm-6 order-4 order-md-0 text-center text-md-left">
                <a href="/">
                    <img class="img-fluid" src="<?php bloginfo( 'template_url' ); ?>/img/logo-last.svg"
                         alt="Танцы витебск">
                </a>

                <p style="color: #5F7393;">
                    ООО «Арена-пицца» <br>
                    УНП 391272611<br>
                    tantsy.klub@mail.ru<br>
                    Регистрация в Торговом реестре РБ <br>
                    № 458996 от 28.08.2019 <br>
                    Юридический адрес: Чапаева 9-114, г. Витебск<br>
                </p>
            </div>
            <div class="footer__menu col-12 col-md-3 col-sm-6 order-1 order-md-2 text-center text-md-left align-content-center">
                <h4>Режим работы</h4>
                <table class="timetable mx-auto mx-md-0">
                    <tbody class="text-center">
					<?php
					$days = array(
						array( 'ПН.', 'ВТ.', 'СР.', 'ЧТ.', 'ПТ.', 'СБ.', 'ВС.' ),
						array( 'mon_st', 'tue_st', 'wed_st', 'thu_st', 'fri_st', 'sat_st', 'sun_st' ),
						array(
							'mon_end',
							'tue_end',
							'wed_and',
							'thu_end',
							'fri_end',
							'sat_end',
							'sun_end'
						),
					);
					?>
                    <tr>
                        <td class="timetable__day"> ПН.</td>
                        <td class="timetable__start-time mon_st"><?php echo nl2br( esc_html( get_theme_mod( 'mon_st' ) ) )?></td>
                        <td>-</td>
                        <td class="timetable__end-time mon_end"><?php echo nl2br( esc_html( get_theme_mod( 'mon_end' ) ) )?></td>
                    </tr>
                    <tr>
                        <td class="timetable__day"> ВТ.</td>
                        <td class="timetable__start-time tue_st"><?php echo nl2br( esc_html( get_theme_mod( 'tue_st' ) ) )?></td>
                        <td>-</td>
                        <td class="timetable__end-time tue_end"><?php echo nl2br( esc_html( get_theme_mod( 'tue_end' ) ) )?></td>
                    </tr>
                    <tr>
                        <td class="timetable__day"> СР.</td>
                        <td class="timetable__start-time wed_st"><?php echo nl2br( esc_html( get_theme_mod( 'wed_st' ) ) )?></td>
                        <td>-</td>
                        <td class="timetable__end-time wed_end"><?php echo nl2br( esc_html( get_theme_mod( 'wed_end' ) ) )?></td>
                    </tr>
                    <tr>
                        <td class="timetable__day"> ЧТ.</td>
                        <td class="timetable__start-time thu_st"><?php echo nl2br( esc_html( get_theme_mod( 'thu_st' ) ) )?></td>
                        <td>-</td>
                        <td class="timetable__end-time thu_end"><?php echo nl2br( esc_html( get_theme_mod( 'thu_end' ) ) )?></td>
                    </tr>
                    <tr>
                        <td class="timetable__day"> ПТ.</td>
                        <td class="timetable__start-time fri_st"><?php echo nl2br( esc_html( get_theme_mod( 'fri_st' ) ) )?></td>
                        <td>-</td>
                        <td class="timetable__end-time fri_end"><?php echo nl2br( esc_html( get_theme_mod( 'fri_end' ) ) )?></td>
                    </tr>
                    <tr>
                        <td class="timetable__day"> СБ.</td>
                        <td class="timetable__start-time sat_st"><?php echo nl2br( esc_html( get_theme_mod( 'sat_st' ) ) )?></td>
                        <td>-</td>
                        <td class="timetable__end-time sat_end"><?php echo nl2br( esc_html( get_theme_mod( 'sat_end' ) ) )?></td>
                    </tr>
                    <tr>
                        <td class="timetable__day"> ВС.</td>
                        <td class="timetable__start-time sun_st"><?php echo nl2br( esc_html( get_theme_mod( 'sun_st' ) ) )?></td>
                        <td>-</td>
                        <td class="timetable__end-time sun_end"><?php echo nl2br( esc_html( get_theme_mod( 'sun_end' ) ) )?></td>
                    </tr>

                    </tbody>
                </table>
                <!--                <h4>Меню пользователя</h4>-->
                <!--				--><?php
				//				wp_nav_menu( array(
				//					'theme_location'  => 'footer__user',
				//					'menu_id'         => 'footer__user',
				//					'menu'            => '',
				//					'container'       => 'ul',
				//					'container_class' => '',
				//					'menu_class'      => 'class-menu-ul',
				//					'menu_id'         => 'id-menu-ul',
				//					'echo'            => true,
				//				) );
				//				?>
            </div>
            <div class="footer__menu col-12 col-md-3 col-sm-6 order-2 order-md-3 text-center text-md-left">
                <h4>Меню сайта</h4>
				<?php
				wp_nav_menu( array(
					'theme_location'  => 'footer__main',
					'menu_id'         => 'footer__main',
					'menu'            => '',
					'container'       => 'ul',
					'container_class' => '',
					'menu_class'      => 'class-menu-ul',
					'menu_id'         => 'id-menu-ul',
					'depth'           => 1,
					'echo'            => true,
				) );
				?>
            </div>
            <div class="footer__menu col-12 col-md-3 col-sm-6 order-3 order-md-4 text-center text-md-left">
                <h4>Наши контакты:</h4>
                <ul class="">

                    <li>
                        <a href="tel:<?php echo get_option( 'dds_options' )['my_tel']; ?> " target="_blank">
                            <i class="fas fa-phone"></i><?php echo get_option( 'dds_options' )['my_tel']; ?>
                        </a>
                    </li>
                    <li>
                        <a href="mailto:<?php echo get_option( 'dds_options' )['my_mail']; ?>" target="_blank">
                            <i class="fas fa-envelope"></i> <?php echo get_option( 'dds_options' )['my_mail']; ?>
                        </a>

                    </li>
                    <li>
                        <a href="">
                            <i class="fas fa-map-pin"></i> <?php echo get_option( 'dds_options' )['my_adres']; ?>
                        </a>

                    </li>
                    <li class="footer__so text-center text-md-left">
                        <a href="https://vk.com/tancy_vitebsk" target="_blank"><i class="fab fa-vk fa-2x"></i></a>
                        <a href="https://instagram.com/tancy_vitebsk" target="_blank"><i
                                    class="fab fa-instagram fa-2x"></i></a>
                    </li>
                </ul>


            </div>
        </div>


        <div class="row justify-content-center footer_pay_caonainer">
            <img src="<?php bloginfo( 'template_url' ); ?>/img/pay/MC_SC.png" alt="">
            <img src="<?php bloginfo( 'template_url' ); ?>/img/pay/MC_Visa.png" alt="">
            <img src="<?php bloginfo( 'template_url' ); ?>/img/pay/VbV.png" alt="">
        </div>
        <div class="row justify-content-center footer_politics_caonainer">
			<?php
			wp_nav_menu( array(
				'theme_location'  => 'footer__Politics',
				'menu_id'         => 'footer__Politics',
				'menu'            => '',
				'container'       => 'none',
				'container_class' => '',
				'menu_class'      => 'd-flex flex-sm-row flex-column align-items-center justify-content-between w-100',
				'menu_id'         => 'id-menu-ul',
				'depth'           => 1,
				'echo'            => true,
			) );
			?>
        </div>
    </div>

    <div class="footer_login fixed-bottom d-row d-md-none">
        <div class="site__login row justify-content-center align-content-center">

            <div class="s-header__basket-wr woocommerce col-6 text-center">
				<?php
				global $woocommerce; ?>
                <a href="<?php echo esc_url( wc_get_cart_url() ); ?>"
                   class="basket-btn basket-btn_fixed-xs p-0">
                    <span class="basket-btn__label"><i class="fas fa-shopping-bag fa-2x"></i></span>
                    <span class="basket-btn__counter">
    	<?php echo sprintf( $woocommerce->cart->cart_contents_count ); ?></span>
                </a>
            </div>

            <div class="col-6 text-center mt-1">
				<?php
				if ( is_user_logged_in() ) {
					echo '<a href="/account/"><i class="fas fa-user fa-2x bg-none"></i></a>';
				} else {
					echo '<a href="/account/"><i class="far fa-user fa-2x"></i> </a>';
				}
				?>
            </div>


        </div>
    </div>
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
<script>
    console.log('Designed by https://dds.by');
</script>
</body>
</html>
