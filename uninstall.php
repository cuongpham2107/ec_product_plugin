<?php

/**
 * Trigger this file on Plugin uninstall
 *
 * @package  AlecadddPlugin
 */

if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	die;
}


// Xóa dữ liệu được lưu trữ trên Cơ sở dữ liệu
$books = get_posts( array( 'post_type' => 'book', 'numberposts' => -1 ) );

foreach( $books as $book ) {
	wp_delete_post( $book->ID, true );
}
if(get_option('ec_product_plugin_cpt')){
	delete_option('ec_product_plugin_cpt');
}
if(get_option('custom_login_logo_one')){
	delete_option('custom_login_logo_one');
}
if(get_option('custom_login_bg_one')){
	delete_option('custom_login_bg_one');
}
if(get_option('custom_login_logo_two')){
	delete_option('custom_login_logo_two');
}
if(get_option('custom_login_logo_three')){
	delete_option('custom_login_logo_three');
}
if(get_option('ec_product_plugin')){
	delete_option('ec_product_plugin');
}

// Truy cập cơ sở dữ liệu qua SQL
global $wpdb;
$wpdb->query( "DELETE FROM wp_posts WHERE post_type = 'book'" );
$wpdb->query( "DELETE FROM wp_postmeta WHERE post_id NOT IN (SELECT id FROM wp_posts)" );
$wpdb->query( "DELETE FROM wp_term_relationships WHERE object_id NOT IN (SELECT id FROM wp_posts)" );