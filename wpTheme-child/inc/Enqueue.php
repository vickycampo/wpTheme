<?php

namespace wptchild;

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
		wp_enqueue_style( 'main', Childmix('css/body.css'), array(), '1.0.0', 'all' );
		wp_enqueue_style( 'main', Childmix('css/breadcrumbs.css'), array(), '1.0.0', 'all' );
		wp_enqueue_style( 'main', Childmix('css/child-style.css'), array(), '1.0.0', 'all' );
		wp_enqueue_style( 'main', Childmix('css/header.css'), array(), '1.0.0', 'all' );
		wp_enqueue_style( 'main', Childmix('css/style.css'), array(), '1.0.0', 'all' );
		wp_enqueue_style( 'main', Childmix('css/subCat_nav.css'), array(), '1.0.0', 'all' );
		wp_enqueue_style( 'main', Childmix('css/top-nav.css'), array(), '1.0.0', 'all' );

		// JS
		wp_enqueue_script( 'main', Childmix('js/app.js'), array(), '1.0.0', true );
		wp_enqueue_script( 'main', Childmix('js/catNavBar.js'), array(), '1.0.0', true );
		wp_enqueue_script( 'main', Childmix('js/child_ajax.js'), array(), '1.0.0', true );
		wp_enqueue_script( 'main', Childmix('js/topNavBar.js'), array(), '1.0.0', true );
		wp_enqueue_script( 'main', Childmix('js/wpChildTheme.js'), array(), '1.0.0', true );

	}
}
