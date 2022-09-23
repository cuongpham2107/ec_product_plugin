<?php 
/**
 * @package  ec_productPlugin
 */
namespace Inc\Base;

class BaseController
{
	public $plugin_path;

	public $plugin_url;

	public $plugin;

	public $managers = array();

	public function __construct() {
		$this->plugin_path = plugin_dir_path( dirname( __FILE__, 2 ) );
		$this->plugin_url = plugin_dir_url( dirname( __FILE__, 2 ) );
		$this->plugin = plugin_basename( dirname( __FILE__, 3 ) ) . '/ec-product-plugin.php';

		$this->managers = array(
			'custom_login' 		=> __('Activate Custom Login','ec-product-plugin'),
			'cpt_manager' 		=> __('Activate CPT Manager','ec-product-plugin'),
		);
	}

	public function activated( string $key )
	{
		$option = get_option( 'ec_product_plugin' );

		return isset( $option[ $key ] ) ? $option[ $key ] : false;
	}
}