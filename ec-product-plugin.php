<?php
/**
 * @package  Ec_product Plugin
 */
/*
Plugin Name: Ec_product Plugin
Plugin URI: http://ec_product.com/plugin
Description: This is my first attempt on writing a custom Plugin for this amazing tutorial series.
Version: 1.0.0
Author:  "Ec_product" 
Author URI: http://kennatech.com
License: GPLv2 or later
Text Domain: ec-product-plugin
*/


// If this file is called firectly, abort!!!
defined( 'ABSPATH' ) or die( 'Hey, what are you doing here? You silly human!' );

// Require once the Composer Autoload
if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
	require_once dirname( __FILE__ ) . '/vendor/autoload.php';
}

/**
 * The code that runs during plugin activation
 */
function activate_ec_product_plugin() {
	Inc\Base\Activate::activate();
}
register_activation_hook( __FILE__, 'activate_ec_product_plugin' );

/**
 * The code that runs during plugin deactivation
 */
function deactivate_ec_product_plugin() {
	Inc\Base\Deactivate::deactivate();
}
register_deactivation_hook( __FILE__, 'deactivate_ec_product_plugin' );

/**
 * Initialize all the core classes of the plugin
 */
if ( class_exists( 'Inc\\Init' ) ) {
	Inc\Init::register_services();
}