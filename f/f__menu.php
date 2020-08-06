<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
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
		'supports'           => [ 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ],
		// 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'         => [ 'category' ],
		'has_archive'        => true,
		'rewrite'            => true,
		'query_var'          => true,
	) );
}

