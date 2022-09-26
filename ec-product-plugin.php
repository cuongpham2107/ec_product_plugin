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
Domain Path: /languages
*/


// If this file is called firectly, abort!!!
defined( 'ABSPATH' ) or die( 'Hey,' );


add_action( 'login_enqueue_scripts', 'my_login_logo' );

/**
 * 
 * get_optin của logo và bg để chèn vào trang login
 */
function my_login_logo() { 
	$active = get_option('active_theme_login');
	$logo = get_option('custom_login_logo_'.$active);
	$bg = get_option('custom_login_bg_'.$active);
	if(isset( $logo ) && isset( $bg )){
		?> 
		<style type="text/css">
			#login h1 a, .login h1 a {
				background-image: url(<?php echo $logo; ?>);
				height:65px;
				width:320px;
				background-size: 190px 100px;
				background-repeat: no-repeat;
				padding-bottom: 30px;
			}
			body.login.js.login-action-login.wp-core-ui.locale-vi {
				background: <?php echo $bg ?>;
			}
		</style>
	<?php 
	}
}


function plugin_load_textdomain() {
	load_plugin_textdomain( 'ec-product-plugin', false, basename( dirname( __FILE__ ) ) . '/languages/' );
}
add_action( 'init', 'plugin_load_textdomain' );

add_shortcode('loginform', 'pippin_login_form_shortcode');

function pippin_login_form_shortcode( $atts, $content = null ) {
 
	extract( shortcode_atts( array(
      'redirect' => ''
      ), $atts ) );
 
	if (!is_user_logged_in()) 
	{
		if($redirect) {
			$redirect_url = $redirect;
		} else {
			$redirect_url = get_permalink();
		}
		$args = array() ;
		$defaults = array(
	                'echo'           => true,
	                // Default 'redirect' value takes the user back to the request URI.
               'redirect'       => ( is_ssl() ? 'https://' : 'http://' ) . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'],
	                'form_id'        => 'loginform',
	                'label_username' => __( 'Username or Email Address' ),
	                'label_password' => __( 'Password' ),
	                'label_remember' => __( 'Remember Me' ),
	                'label_log_in'   => __( 'Log In' ),
	                'id_username'    => 'user_login',
	                'id_password'    => 'user_pass',
	                'id_remember'    => 'rememberme',
	                'id_submit'      => 'wp-submit',
               'remember'       => true,
	                'value_username' => '',
	                // Set 'value_remember' to true to default the "Remember me" checkbox to checked.
	                'value_remember' => false,
	        );
		$args = wp_parse_args( $args, apply_filters( 'login_form_defaults', $defaults ) );
		$login_form_top = apply_filters( 'login_form_top', '', $args );
		$login_form_middle = apply_filters( 'login_form_middle', '', $args );
		$login_form_bottom = apply_filters( 'login_form_bottom', '', $args );
		$form =
			sprintf(
					'<form name="%1$s" id="%1$s" action="%2$s" method="post">',
					esc_attr( $args['form_id'] ),
					esc_url( site_url( 'wp-login.php', 'login_post' ) )
			) .
		$login_form_top .
			sprintf(
					'<p class="login-username">
							<label for="%1$s">%2$s</label>
							<input type="text" name="log" id="%1$s" autocomplete="username" class="input" value="%3$s" size="20" />
					</p>',
					esc_attr( $args['id_username'] ),
					esc_html( $args['label_username'] ),
					esc_attr( $args['value_username'] )
			) .
		sprintf(
					'<p class="login-password">
							<label for="%1$s">%2$s</label>
							<input type="password" name="pwd" id="%1$s" autocomplete="current-password" class="cuong" value="" size="20" />
					</p>',
					esc_attr( $args['id_password'] ),
					esc_html( $args['label_password'] )
			) .
			$login_form_middle .
			( $args['remember'] ?
					sprintf(
						'<p class="login-remember"><label><input name="rememberme" type="checkbox" id="%1$s" value="forever"%2$s /> %3$s</label></p>',
							esc_attr( $args['id_remember'] ),
							( $args['value_remember'] ? ' checked="checked"' : '' ),
							esc_html( $args['label_remember'] )
					) : ''
			) .
			sprintf(
					'<p class="login-submit">
							<input type="submit" name="wp-submit" id="%1$s" class="button button-primary" value="%2$s" />
							<input type="hidden" name="redirect_to" value="%3$s" />
				</p>',
					esc_attr( $args['id_submit'] ),
					esc_attr( $args['label_log_in'] ),
					esc_url( $args['redirect'] )
			) .
			$login_form_bottom .
			'</form>';
	} 
	else
	{
		$form = "Bạn đã đăng nhập rồi !";
	}
	return $form;
}

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
if ( is_admin() ) {
    if ( class_exists( 'Inc\\Init' ) ) {
		Inc\Init::register_services();
	}
}
