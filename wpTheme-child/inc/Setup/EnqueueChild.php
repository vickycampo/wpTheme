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

		$BASE = get_stylesheet_directory_uri();
		wp_enqueue_style( 'child-style', $BASE .'/assets/dist/css/style.css', array(), null, 'all' );

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