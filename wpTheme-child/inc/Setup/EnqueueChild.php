<?php

namespace wptchild\Setup;

/**
 * Enqueue.
 */
class EnqueueChild
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
		error_log (__LINE__ . ' - '. get_stylesheet_uri());
		//error_log (__LINE__ . ' - '. get_template_directory_uri());
		// error_log (__LINE__ . ' - '. plugin_dir_path( dirname( __FILE__, 2 )));
		// error_log (__LINE__ . ' - '. plugin_dir_url( dirname( __FILE__, 2 )));
		//error_log (__LINE__ . ' - '. plugin_basename ( dirname ( __FILE__ , 3 ) ));



		$BASE = get_stylesheet_directory_uri();

		wp_enqueue_style( 'body', $BASE .'/assets/dist/css/body.css', array(), null, 'all' );
		wp_enqueue_style( 'bootstrap', $BASE .'/assets/dist/css/bootstrap.css', array(), null, 'all' );
		wp_enqueue_style( 'breadcrumbs', $BASE .'/assets/dist/css/breadcrumbs.css', array(), null, 'all' );
		wp_enqueue_style( 'child-style-extra', $BASE .'/assets/dist/css/child-style.css', array(), null, 'all' );
		wp_enqueue_style( 'header', $BASE .'/assets/dist/css/header.css', array(), null, 'all' );
		wp_enqueue_style( 'child-style', $BASE .'/assets/dist/css/style.css', array(), null, 'all' );
		wp_enqueue_style( 'subCat_nav', $BASE .'/assets/dist/css/subCat_nav.css', array(), null, 'all' );
		wp_enqueue_style( 'top-nav', $BASE .'/assets/dist/css/top-nav.css', array(), null, 'all' );

		// JS
		//wp_enqueue_script( 'app', ('js/app.js', array(), null, true );
		// echo ($BASE .'/assets/dist/js/catNavBar.js<br>');
		// echo ($BASE .'/assets/dist/js/child_ajax.js<br>');
		wp_enqueue_script( 'catNavBar', $BASE .'/assets/dist/js/catNavBar.js', array(), null, true );
		wp_enqueue_script( 'child_ajax', $BASE .'/assets/dist/js/child_ajax.js', array( ), null, true );
		wp_enqueue_script( 'bootstrap_js', $BASE .'/assets/dist/js/bootstrap.js', array( ), null, true );
		wp_enqueue_script( 'popper_js', $BASE .'/assets/dist/js/popper.js', array( ), null, true );
		wp_enqueue_script( 'topNavBar', $BASE .'/assets/dist/js/topNavBar.js', array( ), null, true );
		wp_enqueue_script( 'wpChildTheme', $BASE .'/assets/dist/js/wpChildTheme.js', array( ), null, true );

	}


}
