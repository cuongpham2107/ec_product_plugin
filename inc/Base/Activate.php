<?php
/**
 * @package  ec_productPlugin
 */
namespace Inc\Base;

class Activate
{
	public static function activate() {
		flush_rewrite_rules();

		if ( get_option( 'ec_product_plugin' ) ) {
			return;
		}

		$default = array();

		update_option( 'ec_product_plugin', $default );
	}
}