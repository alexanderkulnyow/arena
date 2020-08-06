<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


//add_action( 'after_setup_theme', 'remove_image_sizes' );
//function remove_image_sizes(){
//	remove_image_size( 'thumbnail' );
//	remove_image_size( 'single' );
//	remove_image_size( 'gallery_thumbnail' );
//}

function remove_extra_image_sizes() {
	foreach ( get_intermediate_image_sizes() as $size ) {
		if (
		in_array(
			$size, array(
				'woocommerce_thumbnail',
				'woocommerce_single',
				'woocommerce_gallery_thumbnail',
				'shop_catalog',
				'shop_single',
				'shop_thumbnail',
				'default_header_mail',
				'default_content_mail',
				'default_footer_mail',
			)
		)
		) {
			remove_image_size( $size );
		}
	}

//	add_image_size( 'thumbnail', 300, 300, true );
	add_image_size( 'medium', 800, 800, true );
//	add_image_size( 'large', 1400, 1400, false );
}

//add_action( 'intermediate_image_sizes', 'remove_extra_image_sizes' );

//add_action( 'after_setup_theme', 'remove_then_add_image_sizes' );
//function remove_then_add_image_sizes(){
//	add_image_size( 'image-name', 300, 300, true );
//}


//function replace_uploaded_image( $image_data ) {
//	// if there is no large image : return
//	if ( ! isset( $image_data['sizes']['large'] ) ) {
//		return $image_data;
//	}
//
//	// paths to the uploaded image and the large image
//	$upload_dir              = wp_upload_dir();
//	$uploaded_image_location = $upload_dir['basedir'] . '/' . $image_data['file'];
//	// $large_image_location = $upload_dir['path'] . '/'.$image_data['sizes']['large']['file']; // ** This only works for new image uploads - fixed for older images below.
//	$current_subdir       = substr( $image_data['file'], 0, strrpos( $image_data['file'], "/" ) );
//	$large_image_location = $upload_dir['basedir'] . '/' . $current_subdir . '/' . $image_data['sizes']['large']['file'];
//
//	// delete the uploaded image
//	unlink( $uploaded_image_location );
//
//	// rename the large image
//	rename( $large_image_location, $uploaded_image_location );
//
//	// update image metadata and return them
//	$image_data['width']  = $image_data['sizes']['large']['width'];
//	$image_data['height'] = $image_data['sizes']['large']['height'];
//	unset( $image_data['sizes']['large'] );
//
//	return $image_data;
//}
//
//add_filter( 'intermediate_image_sizes', 'replace_uploaded_image' );
//global $wpdb;
//
//$attachments = $wpdb->get_results( "
//     SELECT *
//     FROM $wpdb->postmeta
//     WHERE meta_key = '_thumbnail_id'
//" );
//
//foreach ( $attachments as $attachment ) {
//	wp_delete_attachment( $attachment->meta_value, true );
//}
//
//$wpdb->query( "
//    DELETE FROM $wpdb->postmeta
//    WHERE meta_key = '_thumbnail_id'
//" );
