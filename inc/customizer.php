<?php
/**
 * arena Theme Customizer
 *
 * @package arena
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function arena_customize_register( $wp_customize ) {

//	$wp_customize->add_section( 'arena__schedule',
//		array(
//			'title'      => __( 'Расписание', 'arena' ),
//			'priority'   => 100,
//			'capability' => 'edit_theme_options'
//		)
//	);
//	$days = array( 'mon_st', 'mon_end', 'tue_st', 'tue_end', 'wed_st', 'wed_end', 'thu_st', 'thu_end', 'fri_st', 'fri_end', 'sat_st', 'sat_end', 'sun_st', 'sun_end');
//	foreach ( $days as $day ) {
//		$wp_customize->add_setting( arena__schedule, array(
//			'default'           => 'Редактируется в настройках темы.',
//			'sanitize_callback' => 'sanitize_textarea_field',
//			'transport'         => 'postMessage'
//		) );
//	}

	$wp_customize->add_section(
		'arena_shedule',
		array(
			'title'      => __( 'Расписание', 'arena' ),
			'priority'   => 101,
			'capability' => 'edit_theme_options'
		)
	);


	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'arena_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'arena_customize_partial_blogdescription',
		) );
	}
	/*
	 * Add custom setings
	 * */
	$i=0;
	$r_days = array(
		'ПН. начало',
		'ПН. конец',
		'ВТ. начало',
		'ВТ. конец',
		'СР. начало',
		'СР. конец',
		'ЧТ. начало',
		'ЧТ. конец',
		'ПТ. начало',
		'ПТ. конец',
		'СБ. начало',
		'СБ. конец',
		'ВС. начало',
		'ВС. конец',
	);
	$days = array( 'mon_st', 'mon_end', 'tue_st', 'tue_end', 'wed_st', 'wed_end', 'thu_st', 'thu_end', 'fri_st', 'fri_end', 'sat_st', 'sat_end', 'sun_st', 'sun_end');
	foreach ( $days as $day ) {

		$wp_customize->add_setting( $day, array(
			'default'           => '00:00',
			'sanitize_callback' => 'sanitize_textarea_field',
			'transport'         => 'postMessage'
		) );

		$wp_customize->add_control( $day, array(
			'section' => 'arena_shedule',
			'type'    => 'time',
			'label'   => $r_days[$i++],
		) );

		$wp_customize->selective_refresh->add_partial( $day, array(
			'selector'        => '.' . $day,
			'render_callback' => function () use ( $day ) {
				return nl2br( esc_html( get_theme_mod( $day ) ) );
			}
		) );
	}
}

add_action( 'customize_register', 'arena_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function arena_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function arena_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function arena_customize_preview_js() {
	wp_enqueue_script( 'arena-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}

add_action( 'customize_preview_init', 'arena_customize_preview_js' );
