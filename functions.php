<?php
/**
 * arena functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package arena
 */

/*no updates*/
remove_action( 'load-update-core.php', 'wp_update_plugins' );
add_filter( 'pre_site_transient_update_plugins', function ( $a ) {
	return null;
} );
wp_clear_scheduled_hook( 'wp_update_plugins' );

add_filter( 'pre_site_transient_update_core', function ( $a ) {
	return null;
} );
wp_clear_scheduled_hook( 'wp_version_check' );


add_action( 'after_setup_theme', 'arena_setup' );
if ( ! function_exists( 'arena_setup' ) ) :

	function arena_setup() {

		load_theme_textdomain( 'arena', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		add_theme_support( 'title-tag' );

		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'Primary'          => esc_html__( 'Primary', 'arena' ),
			'footer__user'     => esc_html__( 'footer__user', 'arena' ),
			'footer__main'     => esc_html__( 'footer__main', 'arena' ),
			'footer__Politics' => esc_html__( 'footer__Politics', 'arena' ),

		) );

		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'arena_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );


		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
		update_option( 'medium_size_w', 800 );
		update_option( 'medium_size_h', 800 );
		update_option( 'medium_crop', 1 );
	}
endif;


add_action( 'after_setup_theme', 'arena_content_width', 0 );
function arena_content_width() {

	$GLOBALS['content_width'] = apply_filters( 'arena_content_width', 640 );
}


add_action( 'widgets_init', 'arena_widgets_init' );
function arena_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'arena' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'arena' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}


add_action( 'wp_enqueue_scripts', 'arena_scripts' );
function arena_scripts() {
//	styles
	wp_enqueue_style( 'load-fa', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' );
	wp_enqueue_style( 'dashicons' );
//	scripts
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.js', array(), '1', true );
	wp_enqueue_script( 'arena-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '1.1', true );
	wp_enqueue_script( 'arena-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '1.1', true );
//	various scripts
	if ( is_front_page() ) {
		wp_enqueue_style( 'arena__slicktheme-style', get_template_directory_uri() . '/libs/slick/slick-theme.css', array(), '1.42' );
		wp_enqueue_style( 'arena__slick-style', get_template_directory_uri() . '/libs/slick/slick.css', array(), '1.42' );
		wp_enqueue_script( 'arena__slick-script', get_template_directory_uri() . '/libs/slick/slick.min.js', array(), '1.43', true );
		wp_enqueue_script( 'arena__slick-init', get_template_directory_uri() . '/js/slick_init.js', array( 'arena__slick-script' ), '1.48', true );
	}
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	if ( is_category( array( 'menu', 'beverages', 'banketnoe-menu' ) ) ) {
		wp_enqueue_script( 'arena-mixitup', get_template_directory_uri() . '/libs/mixitup/mixitup.min.js', array(), '1.1', true );
		wp_enqueue_script( 'arena-mixitup_init', get_template_directory_uri() . '/js/mixitup_init.js', array( 'arena-mixitup' ), '1.1', true );
	}

	if ( in_category( array( 'photo', 'menyu' ) ) ) {
		wp_enqueue_style( 'arena__popup-style', get_template_directory_uri() . '/libs/magnific-popup/magnific-popup.css', array(), '1.42' );
		wp_enqueue_script( 'arena__popup', get_template_directory_uri() . '/libs/magnific-popup/jquery.magnific-popup.min.js', array( 'jquery' ), '1.0', true );
		wp_enqueue_script( 'arena__popup_init', get_template_directory_uri() . '/js/magnific-popup-init.js', array( 'arena__popup' ), '1.0', true );
	}

	wp_enqueue_style( 'arena-style', get_stylesheet_uri(), array(), '1.782' );
	wp_enqueue_script( 'index', get_template_directory_uri() . '/js/index.js', array(), '1.63', true );
}
function arena_adminpanel_styles(){
	wp_enqueue_style( 'style-admin-panel', get_template_directory_uri() . '/admin-panel.css' );

}
add_action( 'admin_enqueue_scripts', 'arena_adminpanel_styles' );
function arena_checker_user_css() {

	$user = wp_get_current_user();
	if ( in_array( 'checker', (array) $user->roles ) ) {
		echo '<style>

        #wpadminbar, #adminmenuback, #adminmenuwrap{
            display: none ;}
    </style>';
	}
}

add_action( 'admin_head', 'arena_checker_user_css' );

//add_action( 'after_setup_theme', 'mytheme_theme_setup' );
//if ( ! function_exists( 'mytheme_theme_setup' ) ) {
//	function mytheme_theme_setup() {
//		add_action( 'wp_enqueue_scripts', 'mytheme_scripts' );
//	}
//}

//if ( ! function_exists( 'mytheme_scripts' ) ) {
//	function mytheme_scripts() {
//		wp_enqueue_script( 'custom_js', get_template_directory_uri() . '/js/custom.js', array( 'jquery' ), '1.0.0', true );
//		wp_localize_script( 'custom_js', 'ajax_object', array(
//			'ajaxurl' => admin_url( 'admin-ajax.php' ),
//		) );
//	}
//}

require get_template_directory() . '/f/f__woo_functions.php';
require get_template_directory() . '/f/f__woo-remove.php';
require get_template_directory() . '/f/f__woo_hooks.php';
require get_template_directory() . '/f/wp-contacts-setting.php';

add_action( 'init', 'menu_taxonomy' );
function menu_taxonomy() {

	// список параметров: wp-kama.ru/function/get_taxonomy_labels
	register_taxonomy( 'Категории', [ 'post_type_name' ], [
		'label'              => '',
		// определяется параметром $labels->name
		'labels'             => [
			'name'              => 'Категории',
			'singular_name'     => 'Категории',
			'search_items'      => 'Поиск категории',
			'all_items'         => 'Все категории',
			'view_item '        => 'Просмотр категории',
			'parent_item'       => 'Родитель',
			'parent_item_colon' => 'Родительская категория:',
			'edit_item'         => 'Редактировать категорию',
			'update_item'       => 'Обновить',
			'add_new_item'      => 'Добавить категорию',
			'new_item_name'     => 'Новое имя',
			'menu_name'         => 'Категории',
		],
		'description'        => '',
		// описание таксономии
		'public'             => true,
		'publicly_queryable' => null,
		// равен аргументу public
		'show_in_nav_menus'  => true,
		// равен аргументу public
		'show_ui'            => true,
		// равен аргументу public
		'show_in_menu'       => true,
		// равен аргументу show_ui
		'show_tagcloud'      => true,
		// равен аргументу show_ui
		'show_in_quick_edit' => null,
		// равен аргументу show_ui
		'hierarchical'       => true,

		'rewrite'           => true,
//		'query_var'             => $taxonomy1, // название параметра запроса
		'capabilities'      => array(),
		'meta_box_cb'       => null,
		// html метабокса. callback: `post_categories_meta_box` или `post_tags_meta_box`. false — метабокс отключен.
		'show_admin_column' => false,
		// авто-создание колонки таксы в таблице ассоциированного типа записи. (с версии 3.5)
		'show_in_rest'      => null,
		// добавить в REST API
		'rest_base'         => null,
		// $taxonomy
		// '_builtin'              => false,
		//'update_count_callback' => '_update_post_term_count',
	] );
}


add_action( 'init', 'register_post_types' );
function register_post_types() {
	register_post_type( 'post_type_name', array(
		'label'              => null,
		'labels'             => array(
			'name'               => 'Меню', // основное название для типа записи
			'singular_name'      => 'Блюдо', // название для одной записи этого типа
			'add_new'            => 'Добавить блюдо', // для добавления новой записи
			'add_new_item'       => 'Добавление Блюд', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редактирование Блюда', // для редактирования типа записи
			'new_item'           => 'Новое блюдо', // текст новой записи
			'view_item'          => 'Смотреть блюдо', // для просмотра записи этого типа.
			'search_items'       => 'Искать ____', // для поиска по этим типам записи
			'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
			'menu_name'          => 'Меню', // название меню
		),
		'description'        => '',
		'public'             => true,
		'publicly_queryable' => true,
		// зависит от public
		// 'exclude_from_search' => null, // зависит от public
		'show_ui'            => true,
		// зависит от public
		// 'show_in_nav_menus'   => null, // зависит от public
		'show_in_menu'       => true,
		// показывать ли в меню адмнки
		// 'show_in_admin_bar'   => null, // зависит от show_in_menu
		'show_in_rest'       => null,
		// добавить в REST API. C WP 4.7
		'rest_base'          => null,
		// $post_type. C WP 4.7
		'menu_position'      => 4,
		'menu_icon'          => 'dashicons-clipboard',
		'capability_type'    => 'post',
//		'capabilities'      => 'menus', // массив дополнительных прав для этого типа записи
		'map_meta_cap'       => true,
		// Ставим true чтобы включить дефолтный обработчик специальных прав
		'hierarchical'       => false,
		'supports'           => [ 'title', 'editor', 'thumbnail' ],
		// 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'         => [ 'category', 'menu_taxonomy' ],
		'has_archive'        => true,
		'rewrite'            => true,
		'query_var'          => true,
	) );

}

function my_remove_wp_seo_meta_box() {
	remove_meta_box( 'wpseo_meta', 'post_type_name', 'normal' );
}

add_action( 'add_meta_boxes', 'my_remove_wp_seo_meta_box', 100 );

add_action( 'add_meta_boxes', 'menu_add_custom_box' );
function menu_add_custom_box() {
	$screens = array( 'post_type_name' );
	add_meta_box( 'menu_sectionid', 'Информация', 'menu_meta_box_callback', $screens );
}

function menu_meta_box_callback( $post ) {
	wp_nonce_field( 'menu_save_postdata', 'menu_noncename' );

	$key_menu_cost   = get_post_meta( $post->ID, 'menu-cost', 1 );
	$key_menu_weight = get_post_meta( $post->ID, 'menu-weight', 1 );
	?>
    <style>
        .queen__meta {
            display: block;
        }

        .queen__meta label {
            display: inline-block;
            width: 160px;
            text-align: left;
        }

        .queen__meta input {
            display: inline-block;
            width: 200px;
            text-align: left;
        }
    </style>
    <div class="queen__meta options_group">
        <p class="queen__meta-item">
            <label for="name_menu_cost">Стоимость:</label>
            <input id="name_menu_cost" type="text" name="name_menu_cost"
                   value="<?php echo $key_menu_cost; ?>"/>
        </p>
        <p class="queen__meta-item">
            <label for="name_menu_weight">Выход:</label>
            <input id="name_menu_weight" type="text" name="name_menu_weight"
                   value="<?php echo $key_menu_weight; ?>"/>
        </p>

    </div>
	<?php
}

## Сохраняем данные, когда пост сохраняется
add_action( 'save_post', 'menu_save_postdata' );
function menu_save_postdata( $post_id ) {
	// Убедимся что поле установлено.

	if ( ! isset( $_POST['menu_noncename'] ) ) {
		return;
	}
	if ( ! wp_verify_nonce( $_POST['menu_noncename'], 'menu_save_postdata' ) ) {
		return;
	}
	// если это автосохранение ничего не делаем
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// проверяем права юзера
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}
	if ( ! isset( $_POST['name_menu_cost'] ) ) {
		return;
	}
	if ( ! isset( $_POST['name_menu_weight'] ) ) {
		return;
	}

	$data_q_phone = sanitize_text_field( $_POST['name_menu_cost'] );
	$data_q_visit = sanitize_text_field( $_POST['name_menu_weight'] );

	update_post_meta( $post_id, 'menu-cost', $data_q_phone );
	update_post_meta( $post_id, 'menu-weight', $data_q_visit );
}

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

function portfolio_post_thumbnail() {
	if ( has_post_thumbnail() ) {
		$thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'thumbnail' );

		?>

        <a href="<?php the_permalink(); ?>" rel="nofollow noopener">
            <div class="col-12">
                <div class="card photo-card bg-dark text-white embed-responsive embed-responsive-1by1 mb-0">
                    <img class="photo-img-top img-fluid embed-responsive-item" src="<?php echo $thumb[0] ?>"
                         alt="" title="Клуб танцы"/>
                    <div class="card-img-overlay">
                        <h3 class="card-title" itemprop="name"><?php echo get_the_title(); ?></h3>
                    </div>
                </div>
            </div>
        </a>


		<?php
	}
}


//function true_content_by_user_cap($capability, $attr, $content = null ) {
//	// массив со значениями по умолчанию, которые будут применяться, если в шорткоде не был указан параметр
//	$defaults = array(
//		'capability' => 'read'
//	);
//	extract( shortcode_atts( $defaults, $attr ) );
//	if ( current_user_can( $capability ) && ! is_null( $content ) && ! is_feed() ) {
//		return $content;
//	}
//
//	return ''; // указываем сообщение об ошибке если нужно
//}
//
//add_shortcode( 'access', 'true_content_by_user_cap' );

////////////////////////////////////////////////////////////////////////////
////                          шалонизаця постов
///////////////////////////////////////////////////////////////////////////
add_filter( 'single_template', function ( $template ) {
	// Get the current single post object
	$post = get_queried_object();
	// Set our 'constant' folder path
	$path = 'template-parts/';

	// Set our variable to hold our templates
	$templates = [];
//
	// Lets handle the custom post type section
	if ( 'post' !== $post->post_type ) {
		$templates[] = $path . 'single-' . $post->post_type . '-' . $post->post_name . '.php';
		$templates[] = $path . 'single-' . $post->post_type . '.php';
	}

	// Lets handle the post post type stuff
	if ( 'post' === $post->post_type ) {
		// Get the post categories
		$categories = get_the_category( $post->ID );
		// Just for incase, check if we have categories
		if ( $categories ) {
			foreach ( $categories as $category ) {
				// Create possible template names
				$templates[] = $path . 'single-cat-' . $category->slug . '.php';
				$templates[] = $path . 'single-cat-' . $category->term_id . '.php';
			} //endforeach
		} //endif $categories
	} // endif

	// Set our fallback templates
	$templates[] = $path . 'single.php';
	$templates[] = $path . 'default.php';
	$templates[] = 'index.php';

	/**
	 * Now we can search for our templates and load the first one we find
	 * We will use the array ability of locate_template here
	 */
	$template = locate_template( $templates );

//	 Return the template rteurned by locate_template
	return $template;
} );


function arena_card_ad_to_cart( $args = array() ) {

	global $product;

	if ( $product ) {
		$defaults = array(
			'quantity'   => 1,
			'class'      => implode(
				' ',
				array_filter(
					array(
						'button',
						'product_type_' . $product->get_type(),
						$product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
						$product->supports( 'ajax_add_to_cart' ) && $product->is_purchasable() && $product->is_in_stock() ? 'ajax_add_to_cart' : '',
					)
				)
			),
			'attributes' => array(
				'data-product_id'  => $product->get_id(),
				'data-product_sku' => $product->get_sku(),
				'aria-label'       => $product->add_to_cart_description(),
				'rel'              => 'nofollow',
			),
		);

		$args = apply_filters( 'woocommerce_loop_add_to_cart_args', wp_parse_args( $args, $defaults ), $product );

		if ( isset( $args['attributes']['aria-label'] ) ) {
			$args['attributes']['aria-label'] = wp_strip_all_tags( $args['attributes']['aria-label'] );
		}

		wc_get_template( 'loop/card_add-to-cart.php', $args );
	}

}


function rdate( $param, $time = 0 ) {
	if ( intval( $time ) == 0 ) {
		$time = time();
	}
	$MonthNames = array( "Янв", "Фев", "Мар", "Апр", "Маq", "Июн", "Июл", "Авг", "Сен", "Окт", "Ноя", "Дек" );
	if ( strpos( $param, 'M' ) === false ) {
		return date( $param, $time );
	} else {
		return date( str_replace( 'M', $MonthNames[ date( 'n', $time ) - 1 ], $param ), $time );
	}
}

function arena_budge() {
	global $product;
// Ensure visibility.
	if ( empty( $product ) || ! $product->is_visible() ) {
		return;
	}
	?>
    <div class="badge-ticket">

        <div class="badge-ticket-top">
			<?php

			$var = yit_get_prop( $product, '_start_date_picker', true );
			//			echo date( 'd.m.Y', strtotime( $date ) );
			?>
            <span>
                                 <?php echo date( 'd', strtotime( $var ) ); ?>
                        </span>
        </div>
        <div class="badge-ticket-bottom">
                        <span>
                            <?php echo rdate( 'M', strtotime( $var ) ); ?>
                        </span>
        </div>
        <div class="bagre-right"></div>
        <div class="bagre-left"></div>
    </div>
	<?php
}

;
function arena_budge__small() {
	global $product;
// Ensure visibility.
	if ( empty( $product ) || ! $product->is_visible() ) {
		return;
	}
	?>
    <div class="badge-ticket__small">

        <div class="badge-ticket-top">
			<?php
			$var = yit_get_prop( $product, '_start_date_picker', true );

			?>
            <span>
                                 <?php echo date( 'd', strtotime( $var ) ); ?>
                        </span>
        </div>
        <div class="badge-ticket-bottom">
                        <span>
                            <?php echo rdate( 'M', strtotime( $var ) ); ?>
                        </span>
        </div>
        <div class="bagre-right"></div>
        <div class="bagre-left"></div>
    </div>
	<?php
}

;
add_filter( 'yith_plugin_fw_show_eciton_esnecil_etavitca', '__return_false' );


function my_price_replace( $price, $product ) {
	if ( $product->get_price() == 0 ) {
		return __( 'Вход свободный' );
	}
	if ( $product->get_price() == - 1 ) {
		return __( 'Закрытое мероприятие' );
	}
	if ( $product->get_price() == - 1 ) {
		return __( 'Продажа билетов завершена' );
	}

	return $price;
}

add_filter( 'woocommerce_get_price_html', 'my_price_replace', 1, 2 );

function make_not_purchasable( $purchasable, $product ) {

	if ( $product->get_price() == 0 ) {
		$purchasable = false;

		remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
		remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
		remove_action( 'woocommerce_simple_add_to_cart', 'woocommerce_simple_add_to_cart', 30 );
		remove_action( 'woocommerce_single_product_summary', 'woocommerce_simple_add_to_cart', 30 );
		remove_action( 'woocommerce_grouped_add_to_cart', 'woocommerce_grouped_add_to_cart', 30 );
		remove_action( 'woocommerce_single_product_summary', 'woocommerce_arena_single_price', 10 );
		remove_action( 'woocommerce_single_product_summary', 'woocommerce_simple_add_to_cart', 30 );

	} elseif ( $product->get_price() == - 1 ) {
		$purchasable = false;
		remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
		remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
		remove_action( 'woocommerce_single_product_summary', 'woocommerce_simple_add_to_cart', 30 );
		remove_action( 'woocommerce_simple_add_to_cart', 'woocommerce_simple_add_to_cart', 30 );
		remove_action( 'woocommerce_grouped_add_to_cart', 'woocommerce_grouped_add_to_cart', 30 );
		remove_action( 'woocommerce_single_product_summary', 'woocommerce_arena_single_price', 10 );
		remove_action( 'woocommerce_single_product_summary', 'woocommerce_simple_add_to_cart', 30 );

	} else {
		$purchasable = true;
	}

	return $purchasable;
}

add_filter( 'woocommerce_is_purchasable', 'make_not_purchasable', 10, 2 );


//remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
//remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
//remove_action( 'woocommerce_simple_add_to_cart', 'woocommerce_simple_add_to_cart', 30 );
//remove_action( 'woocommerce_grouped_add_to_cart', 'woocommerce_grouped_add_to_cart', 30 );
//remove_action( 'woocommerce_single_product_summary', 'woocommerce_simple_add_to_cart', 30 );

require get_template_directory() . '/f/f__image-size.php';

function coocie18() {
	if ( isset( $_COOKIE["alert18"] ) ) {
		return false;
	} else {
		?>
        <div id="alert18" class="modal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">ЗДРАВСТВУЙТЕ!</h5>
                    </div>
                    <div class="modal-body">
                        <p>Вам уже исполнилось 18 лет?</p>
                        <label for="">
                            <p>Я прочитал(а) и соглашаюсь с
                                <a href="/oferta">правилами сайта </a> и
                                <a href="/pravila-kluba">правилами клуба</a></p>&nbsp;
                        </label>
                        <input type="hidden" name="terms-field" value="1"/>
                    </div>
                    <div class="modal-footer justify-content-around">
                        <a href="/pravila-kluba" class="arena__button-danger">НЕТ</a>
                        <button id="alert18Accept" type="button" class="arena__button" data-dismiss="modal">ДА</button>
                    </div>
                </div>
            </div>
        </div>

        <script>
            jQuery(document).ready(function ($) {
                $('#alert18').modal({backdrop: 'static', keyboard: false})
                $("#alert18").modal("show");
                $("#alert18Accept").click(function () {
                    $("#alert18").modal("hide");
                    document.cookie = "alert18=true; max-age=720000; path=/";
                });
            });
        </script>
		<?php
	}
}

function wpb_image_editor_default_to_gd( $editors ) {
	$gd_editor = 'WP_Image_Editor_GD';
	$editors   = array_diff( $editors, array( $gd_editor ) );
	array_unshift( $editors, $gd_editor );

	return $editors;
}

add_filter( 'wp_image_editors', 'wpb_image_editor_default_to_gd' );
