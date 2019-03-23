<?php
/*

@package mkt-recipe-plugin

     ===================================
          ADMIN.PHP
     ===================================
*
*
*/
namespace Inc\Pages;

use \Inc\Api\SettingsApi;
use \Inc\Base\BaseController;
use \Inc\Api\Callbacks\AdminCallbacks;
/**
* Admin - adds the admin page
*/
class Admin extends BaseController
{
	public $settings;
	public $pages;
	public $subpages;
	public $callbacks;

	public function register ()
	{
		/* Initialize the class that will actually generate the menu pages and subpages */
		$this->settings = new SettingsApi();
		/* Initialize the class that manages the */
		$this->callbacks = new AdminCallbacks();
		/* Create the pages and Subpages arrays*/
		$this->setPages ();
		$this->setSubpages();

		/* Create the pages and subpages */
		$this->setSettings();
		$this->setSections();
		$this->setFields();

		$this->settings->addPages ( $this->pages )->withSubpage( 'Dashboard' )->addSubPages( $this->subpages )->register();
	}
	public function setPages ()
	{
		/* The main page of the plugin */
		$this->pages =
		[
			[
				'page_title' => 'MTK Recipe Plugin',
				'menu_title' => 'MTK Recipe Plugin',
				'capability' => 'manage_options',
				'menu_slug' => 'mtk_recipe_plugin',
				'callback' => array ($this->callbacks, 'adminDashboard'),
				'icon_url' => 'dashicons-carrot',
				'position' => '110'
			]

		];
	}
	public function setSubpages ()
	{
		$this->subpages =
		[
			/* The supbage where we manage the CPT */
			[
				'parent_slug' => $this->pages[0]['menu_slug'],
                    'page_title' => 'Custom Post Type',
				'menu_title' => 'CPT',
				'capability' => 'manage_options',
				'menu_slug' => 'mtk_cpt',
				'callback' => array ($this->callbacks, 'adminCPT')
			],
			/* The supbage where we manage the TAXONOMIES */
			[
				'parent_slug' => $this->pages[0]['menu_slug'],
                    'page_title' => 'Custom Taxonomies',
				'menu_title' => 'Taxonomies',
				'capability' => 'manage_options',
				'menu_slug' => 'mtk_taxonomies',
				'callback' => array ($this->callbacks, 'adminTaxonomy')
			],
			/* The supbage where we manage the WIDGETS */
			[
				'parent_slug' => $this->pages[0]['menu_slug'],
                    'page_title' => 'Custom Widgets',
				'menu_title' => 'Widgets',
				'capability' => 'manage_options',
				'menu_slug' => 'mtk_widgets',
				'callback' => array ($this->callbacks, 'adminWidgets')
			]
		];
	}
	/* Functions for the settings / Sections and Fields */
	public function setSettings ()
	{
		$args = array (
			array (
				'option_group' => 	'mtk_options_group',
				'option_name'	=> 	'text_example', //Id of the custom field
				'callback'	=>	array ( $this->callbacks , 'mtk_OptionsGroup')
			)
		);
		$this->settings->setSettings( $args );
	}
	public function setSections ()
	{
		$args = array (
			array (
				'id'			=>	'mtk_recipe_plugin_admin_index',
				'title'		=>	'Settings',
				'callback'	=>	array ( $this->callbacks , 'mtk_AdminSection'),
				'page'		=>	$this->pages[0]['menu_slug']
			)
		);
		$this->settings->setSections( $args );
	}
	public function setFields ()
	{
		$args = array (
			array (
				'id'			=>	'text_example', // has to be identical to the option_name in the settings
				'title'		=>	'Text Example',
				'callback'	=>	array ( $this->callbacks , 'mtk_textExample'),
				'page'		=>	$this->pages[0]['menu_slug'],
				'section'		=>	'mtk_recipe_plugin_admin_index',
				'args'		=>	array (
					'label_for'	=>	'text_example',
					'class'		=>	'example-class'
				)
			)
		);
		$this->settings->setFields( $args );
	}

}
