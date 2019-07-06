<?php

namespace awpstt\Custom;

use awpstt\Api\Settings;
use awpstt\Api\Callbacks\SettingsCallback;

/**
 * Admin
 * use it to write your admin related methods by tapping the settings api class.
 */
class Admin
{
	/**
	 * Store a new instance of the Settings API Class
	 * @var class instance
	 */
	public $settings;

	/**
	 * Callback class
	 * @var class instance
	 */
	public $callback;

	/**
	 * Constructor
	 */
	public function __construct()
	{
		$this->settings = new Settings();

		$this->callback = new SettingsCallback();
	}

	/**
     * register default hooks and actions for WordPress
     * @return
     */
	public function register()
	{
		$this->enqueue()->pages()->settings()->sections()->fields()->register_settings();

		$this->enqueue_faq( new Settings() );
	}

	/**
	 * Trigger the register method of the Settings API Class
	 * @return
	 */
	private function register_settings() {
		$this->settings->register();
	}

	/**
	 * Enqueue scripts in specific admin pages
	 * @return $this
	 */
	private function enqueue()
	{
		// Scripts multidimensional array with styles and scripts
		$scripts = array(
			'script' => array( 
				'jquery', 
				'media_uploader',
				get_template_directory_uri() . '/assets/dist/js/admin.js'
			),
			'style' => array( 
				get_template_directory_uri() . '/assets/dist/css/admin.css',
				'wp-color-picker'
			)
		);

		// Pages array to where enqueue scripts
		$pages = array( 'toplevel_page_awpstt' );

		// Enqueue files in Admin area
		$this->settings->admin_enqueue( $scripts, $pages );

		return $this;
	}

	/**
	 * Enqueue only to a specific page different from the main enqueue
	 * @param  Settings $settings 	a new instance of the Settings API class
	 * @return
	 */
	private function enqueue_faq( Settings $settings )
	{
		// Scripts multidimensional array with styles and scripts
		$scripts = array(
			'style' => array( 
				get_template_directory_uri() . '/assets/dist/css/admin.css',
			)
		);

		// Pages array to where enqueue scripts
		$pages = array( 'awpstt_page_awpstt_faq' );

		// Enqueue files in Admin area
		$settings->admin_enqueue( $scripts, $pages )->register();
	}

	/**
	 * Register admin pages and subpages at once
	 * @return $this
	 */
	private function pages()
	{
		$admin_pages = array(
			array(
				'page_title' => 'AWPS Admin Page',
				'menu_title' => 'AWPS',
				'capability' => 'manage_options',
				'menu_slug' => 'awpstt',
				'callback' => array( $this->callback, 'admin_index' ),
				'icon_url' => get_template_directory_uri() . '/assets/dist/images/admin-icon.png',
				'position' => 110,
			)
		);

		$admin_subpages = array(
			array(
				'parent_slug' => 'awpstt',
				'page_title' => 'AWPS Test Theme FAQ',
				'menu_title' => 'FAQ',
				'capability' => 'manage_options',
				'menu_slug' => 'awpstt_faq',
				'callback' => array( $this->callback, 'admin_faq' )
			)
		);

		// Create multiple Admin menu pages and subpages
		$this->settings->addPages( $admin_pages )->withSubPage( 'Settings' )->addSubPages( $admin_subpages );

		return $this;
	}

	/**
	 * Register settings in preparation of custom fields
	 * @return $this
	 */
	private function settings()
	{
		// Register settings
		$args = array(
			array(
				'option_group' => 'awpstt_options_group',
				'option_name' => 'first_name',
				'callback' => array( $this->callback, 'awpstt_options_group' )
			),
			array(
				'option_group' => 'awpstt_options_group',
				'option_name' => 'awpstt_test2'
			)
		);

		$this->settings->add_settings( $args );

		return $this;
	}

	/**
	 * Register sections in preparation of custom fields
	 * @return $this
	 */
	private function sections()
	{
		// Register sections
		$args = array(
			array(
				'id' => 'awpstt_admin_index',
				'title' => 'Settings',
				'callback' => array( $this->callback, 'awpstt_admin_index' ),
				'page' => 'awpstt'
			)
		);

		$this->settings->add_sections( $args );

		return $this;
	}

	/**
	 * Register custom admin fields
	 * @return $this
	 */
	private function fields()
	{
		// Register fields
		$args = array(
			array(
				'id' => 'first_name',
				'title' => 'First Name',
				'callback' => array( $this->callback, 'first_name' ),
				'page' => 'awpstt',
				'section' => 'awpstt_admin_index',
				'args' => array(
					'label_for' => 'first_name',
					'class' => ''
				)
			)
		);

		$this->settings->add_fields( $args );

		return $this;
	}
}