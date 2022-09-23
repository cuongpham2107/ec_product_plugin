<?php 
/**
 * @package  EC_Product Plugin
 */
namespace Inc\Base;

use Inc\Api\SettingsApi;
use Inc\Base\BaseController;
use Inc\Api\Callbacks\LoginCallbacks;

/**
* 
*/
class CustomLoginController extends BaseController
{
    public $settings;

    public $loginCallbacks;

	public $callbacks;

	public $subpages = array();

	public function register()
	{
		if ( ! $this->activated( 'custom_login' ) ) return;
        
		$this->settings = new SettingsApi();

        $this->loginCallbacks = new LoginCallbacks();

		$this->setSubpages();
        
		$this->setSettings();

		$this->setSections();
		
		// $this->setFields();

		
		$this->settings->addSubPages( $this->subpages )->register();

	}
	
    /**
     * Thêm Sub Menu
     */
	public function setSubpages()
	{
		$this->subpages = array(
			array(
				'parent_slug' => 'ec_product_plugin', 
				'page_title' => __('Custom Login','ec-product-plugin'), 
				'menu_title' => __('Custom Login','ec-product-plugin'), 
				'capability' => 'manage_options', 
				'menu_slug' => 'ec_product_custom_login', 
				'callback' => array( $this->loginCallbacks, 'adminCustomLogin' )
			)
		);
	}
   

    public function setSettings()
    {
       
        $settings = array(
			array(
				'option_group'		=>	'custom_login_settings',
				'option_name'		=>	'custom_login_logo_one',
				// 'callback'			=>	array($this->loginCallbacks,'loginSanitize')
            ),
            array(
				'option_group'		=>	'custom_login_settings',
				'option_name'		=>	'custom_login_bg_one',
				// 'callback'			=>	array($this->loginCallbacks,'loginSanitize')
			),
			array(
				'option_group'		=>	'custom_login_settings',
				'option_name'		=>	'custom_login_logo_two',
				// 'callback'			=>	array($this->loginCallbacks,'loginSanitize')
            ),
            array(
				'option_group'		=>	'custom_login_settings',
				'option_name'		=>	'custom_login_bg_two',
				// 'callback'			=>	array($this->loginCallbacks,'loginSanitize')
			),
			array(
				'option_group'		=>	'custom_login_settings',
				'option_name'		=>	'custom_login_logo_three',
				// 'callback'			=>	array($this->loginCallbacks,'loginSanitize')
            ),
            array(
				'option_group'		=>	'custom_login_settings',
				'option_name'		=>	'custom_login_bg_three',
				// 'callback'			=>	array($this->loginCallbacks,'loginSanitize')
			),
			array(
				'option_group'		=>	'custom_login_settings',
				'option_name'		=>	'active_theme_login',
				// 'callback'			=>	array($this->loginCallbacks,'loginSanitize')
			),

		);
       
		$this->settings->setSettings($settings);
    }
     /**
     * Thêm Sections cho Custom Login 
     */
    public function setSections()
    {
        $sections = array(
            array(
                'id'            => 'custom_login_section',
                'title'   		=> __('Settings Login','ec-product-plugin'),
                'callback'      => array( $this->loginCallbacks, 'sectionCustomLogin' ),
                'page'          =>'custom_login_page'
            )
        );
        $this->settings->setSections( $sections );
    }
    /**
     * Thêm Fields cho Custom Login 
     */
    // public function setFields()
    // {
    //     $fields = array(
            
    //         array(
    //             'id' =>  'logo_login',
	// 			'title' =>  __('Logo Login','ec-product-plugin'),
	// 			'callback' => array( $this->loginCallbacks, 'logo_login' ),
	// 			'page' => 'custom_login_page',
	// 			'section' => 'custom_login_section',
	// 			'args' => array(
    //                 'option_name'		=>	'custom_login_logo',
	// 				'label_for' =>  'logo_login',
	// 			)
    //         ),
	// 		array(
    //             'id' =>  'background_color_login',
	// 			'title' =>  __('Background Color Login','ec-product-plugin'),
	// 			'callback' => array( $this->loginCallbacks,'background_color_login'),
	// 			'page' => 'custom_login_page',
	// 			'section' => 'custom_login_section',
	// 			'args' => array(
    //                 'option_name'		=>	'custom_login_bg',
	// 				'label_for' =>  'background_color_login',
	// 			)
    //         ),
			
    //     );
    //     $this->settings->setFields( $fields );
    // }
	
}