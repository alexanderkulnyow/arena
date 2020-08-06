<?php

get_header();
?>

    <section class="row home__page home__afisha">
        <div class="container">
            <div class="row">
                <div class="description col-6 col-md-5 mt-5">
                    <h2 style="font-weight: bold;">Афиша</h2>
                </div>
                <div class=" description col-6 text-right">
                    <button class="buton-galery ">
                        <a href="/afisha/">К афише</a>
                    </button>
                </div>

                <div class="w-100"></div>
                <div class="tickets w-100">
                    <!--				--><?php
					echo do_shortcode( '[custom_recent_products]' );
					//				?>
                </div>
            </div>

        </div>

    </section>

    <section class="row home__page home__photo">
        <div class="container">

            <div class="row">
                <div class="description  col-6 col-md-5">
                    <h2 style="font-weight: bold;"> Галерея</h2>
                </div>
                <div class=" description col-6 text-right">
                    <button class="buton-galery ">
                        <a href="/category/photo/">В галерею</a>
                    </button>
                </div>

                <div class="w-100"></div>
				<?php

				// параметры по умолчанию
				$args = array(
					'numberposts'      => 4,
					'category_name'    => 'photo',
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
					setup_postdata( $post ); ?>
                    <div class="col-6 col-md-3 galery__item">
						<?php portfolio_post_thumbnail(); ?>
                    </div>

				<?php }
				wp_reset_postdata();
				?>

            </div>
        </div>

    </section>
    <div class="w-100"></div>
    <section class="row home__page home__contacts">
        <div class="container">
            <div class="description  text-center text-md-left">
                <h2 style="font-weight: bold;"> Контакты</h2>
                <p>Всегда на связи с вами</p>
            </div>

			<?php arena__contacts(); ?>
        </div>
    </section>
    <div class="w-100"></div>
    <section id="map">
        <script type="text/javascript" charset="utf-8" async
                src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A54cf691b32696c5ed7e558b94d089b2e3f4b02d71d02ad36b6a97ad6496f78fb&amp;width=100%25&amp;height=450&amp;lang=ru_RU&amp;scroll=false"></script>

    </section>


    <!---->
    <!--    <script type="text/javascript">-->
    <!--        jQuery(document).ready(function ($) {-->
    <!--            if (document.cookie.indexOf('alert18') < 1) {-->
    <!--                $('#alert18').modal({backdrop: 'static', keyboard: false})-->
    <!--                $("#alert18").modal("show");-->
    <!--                $("#alert18Accept").click(function () {-->
    <!--                    $("#alert18").modal("hide");-->
    <!--                    document.cookie = "alert18=true; max-age=720000; path=/";-->
    <!--                });-->
    <!--            } else {-->
    <!--                return false;-->
    <!--            }-->
    <!--        })-->
    <!--    </script>-->
<?php
//get_sidebar();
get_footer();

return coocie18();
