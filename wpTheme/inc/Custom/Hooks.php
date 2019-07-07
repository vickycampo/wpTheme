<?php
/*
	@package wpTheme

     ==============================
          THE HOOK ALLIANCE
     ==============================
*
* 	Include hooks to acces any parto of the theme
*/

<?php

namespace wptheme\Hooks;
class Hooks
{
	/**
     * register default hooks and actions for WordPress
     * @return
     */
	public function register()
	{
		define( 'THA_HOOKS_VERSION', '1.0-draft' );
		add_theme_support( 'tha_hooks', array(
			'all',
			'html',
			'body',
			'head',
			'header',
			'content',
			'entry',
			'comments',
			'sidebars',
			'sidebar',
			'footer'
		));
		add_filter( 'current_theme_supports-tha_hooks', array ( $this , 'tha_current_theme_supports' ), 10, 3 );
	}

	public function tha_current_theme_supports( $bool, $args, $registered )
	{
		return in_array( $args[0], $registered[0] ) || in_array( 'all', $registered[0] );
	}
	/**
	* HTML <html> hook
	* Special case, useful for <DOCTYPE>, etc.
	* $tha_supports[] = 'html;
	*/
	//wptheme\Custom\Hooks::tha_html_before()
	public function tha_html_before()
	{
		do_action( 'tha_html_before' );
	}
	/**
	* HTML <body> hooks
	* $tha_supports[] = 'body';
	*/
	public function tha_body_top()
	{
		do_action( 'tha_body_top' );
		do_action( 'body_open' );
		do_action( 'before' );
	}
	/**
	* HTML <body> hooks
	* $tha_supports[] = 'body';
	*/
	public function tha_body_top()
	{
		do_action( 'tha_body_top' );
		do_action( 'body_open' );
		do_action( 'before' );
	}



	public function tha_body_bottom()
	{
		do_action( 'tha_body_bottom' );
	}

	/**
	* HTML <head> hooks
	*
	* $tha_supports[] = 'head';
	*/
	public function tha_head_top()
	{
		do_action( 'tha_head_top' );
	}

	public function tha_head_bottom()
	{
		do_action( 'tha_head_bottom' );
	}

	/**
	* Semantic <header> hooks
	*
	* $tha_supports[] = 'header';
	*/
	public function tha_header_before()
	{
		do_action( 'tha_header_before' );
	}

	public function tha_header_after()
	{
		do_action( 'tha_header_after' );
	}

	public function tha_header_top()
	{
		do_action( 'tha_header_top' );
	}

	public function tha_header_bottom()
	{
		do_action( 'tha_header_bottom' );
	}

	/**
	* Semantic <content> hooks
	*
	* $tha_supports[] = 'content';
	*/
	public function tha_content_before()
	{
		do_action( 'tha_content_before' );
	}

	public function tha_content_after()
	{
		do_action( 'tha_content_after' );
	}

	public function tha_content_top()
	{
		do_action( 'tha_content_top' );
	}

	public function tha_content_bottom()
	{
		do_action( 'tha_content_bottom' );
	}

	/**
	* Semantic <entry> hooks
	*
	* $tha_supports[] = 'entry';
	*/
	public function tha_entry_before()
	{
		do_action( 'tha_entry_before' );
	}

	public function tha_entry_after()
	{
		do_action( 'tha_entry_after' );
	}

	public function tha_entry_top()
	{
		do_action( 'tha_entry_top' );
	}

	public function tha_entry_bottom()
	{
		do_action( 'tha_entry_bottom' );
	}

	/**
	* Comments block hooks
	*
	* $tha_supports[] = 'comments';
	*/
	public function tha_comments_before()
	{
		do_action( 'tha_comments_before' );
	}

	public function tha_comments_after()
	{
		do_action( 'tha_comments_after' );
	}

	/**
	* Semantic <sidebar> hooks
	*
	* $tha_supports[] = 'sidebar';
	*/
	public function tha_sidebars_before()
	{
		do_action( 'tha_sidebars_before' );
	}

	public function tha_sidebars_after()
	{
		do_action( 'tha_sidebars_after' );
	}

	public function tha_sidebar_top()
	{
		do_action( 'tha_sidebar_top' );
	}

	public function tha_sidebar_bottom()
	{
		do_action( 'tha_sidebar_bottom' );
	}

	/**
	* Semantic <footer> hooks
	*
	* $tha_supports[] = 'footer';
	*/
	public function tha_footer_before()
	{
		do_action( 'tha_footer_before' );
	}

	public function tha_footer_after()
	{
		do_action( 'tha_footer_after' );
	}

	public function tha_footer_top()
	{
		do_action( 'tha_footer_top' );
	}

	public function tha_footer_bottom()
	{
		do_action( 'tha_footer_bottom' );
	}

}
