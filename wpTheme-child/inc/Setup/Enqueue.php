<?php

namespace wptchild\Setup;

/**
 * Enqueue.
 */
class Enqueue
{
	/**
	 * register default hooks and actions for WordPress
	 * @return
	 */
	public function register()
	{

		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
	}

	/**
	 * Notice the mix() function in wp_enqueue_...
	 * It provides the path to a versioned asset by Laravel Mix using querystring-based
	 * cache-busting (This means, the file name won't change, but the md5. Look here for
	 * more information: https://github.com/JeffreyWay/laravel-mix/issues/920 )
	 */
	public function enqueue_scripts()
	{
		// CSS

		wp_enqueue_style( 'body', get_stylesheet_uri('/assets/dist/css/body.css'), array(), '1.0.0', 'all' );
		wp_enqueue_style( 'bootstrap', get_stylesheet_uri('/assets/dist/css/bootstrap.css'), array(), '1.0.0', 'all' );
		wp_enqueue_style( 'breadcrumbs', get_stylesheet_uri('/assets/dist/css/breadcrumbs.css'), array(), '1.0.0', 'all' );
		wp_enqueue_style( 'child-style', get_stylesheet_uri('/assets/dist/css/child-style.css'), array(), '1.0.0', 'all' );
		wp_enqueue_style( 'header', get_stylesheet_uri('/assets/dist/css/header.css'), array(), '1.0.0', 'all' );
		wp_enqueue_style( 'style', get_stylesheet_uri('/assets/dist/css/style.css'), array(), '1.0.0', 'all' );
		wp_enqueue_style( 'subCat_nav', get_stylesheet_uri('/assets/dist/css/subCat_nav.css'), array(), '1.0.0', 'all' );
		wp_enqueue_style( 'top-nav', get_stylesheet_uri('/assets/dist/css/top-nav.css'), array(), '1.0.0', 'all' );

		// JS
		//wp_enqueue_script( 'app', ('js/app.js'), array(), '1.0.0', true );
		wp_enqueue_script( 'catNavBar', get_stylesheet_uri('/assets/dist/js/catNavBar.js'), array(), '1.0.0', true );
		wp_enqueue_script( 'child_ajax', get_stylesheet_uri('/assets/dist/js/child_ajax.js'), array(), '1.0.0', true );
		wp_enqueue_script( 'child_ajax', get_stylesheet_uri('/assets/dist/js/bootstrap.js'), array(), '1.0.0', true );
		wp_enqueue_script( 'topNavBar', get_stylesheet_uri('/assets/dist/js/topNavBar.js'), array(), '1.0.0', true );
		wp_enqueue_script( 'wpChildTheme', get_stylesheet_uri('/assets/dist/js/wpChildTheme.js'), array(), '1.0.0', true );

	}
}
