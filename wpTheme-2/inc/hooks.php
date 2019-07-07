<?php
/**
* Theme Hook Alliance hook stub list.
*
* @package 		themehookalliance
* @version		1.0-draft
* @since		1.0-draft
* @license		http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License, v2 (or newer)
*
* This program is free software; you can redistribute it and/or modify
* it under the terms of the GNU General Public License as published by
* the Free Software Foundation; either version 2 of the License, or
* (at your option) any later version.
*
* This program is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
* GNU General Public License for more details.
*/

/**
 * Define the version of THA support, in case that becomes useful down the road.
 */
define( 'wptheme\Custom\Hooks::tha_HOOKS_VERSION', '1.0-draft' );

/**
 * Themes and Plugins can check for wptheme\Custom\Hooks::tha_hooks using current_theme_supports( 'wptheme\Custom\Hooks::tha_hooks', $hook )
 * to determine whether a theme declares itself to support this specific hook type.
 *
 * Example:
 * <code>
 * 		// Declare support for all hook types
 * 		add_theme_support( 'wptheme\Custom\Hooks::tha_hooks', array( 'all' ) );
 *
 * 		// Declare support for certain hook types only
 * 		add_theme_support( 'wptheme\Custom\Hooks::tha_hooks', array( 'header', 'content', 'footer' ) );
 * </code>
 */
add_theme_support( 'wptheme\Custom\Hooks::tha_hooks', array(

	/**
	 * As a Theme developer, use the 'all' parameter, to declare support for all
	 * hook types.
	 * Please make sure you then actually reference all the hooks in this file,
	 * Plugin developers depend on it!
	 */
	'all',

	/**
	 * Themes can also choose to only support certain hook types.
	 * Please make sure you then actually reference all the hooks in this type
	 * family.
	 *
	 * When the 'all' parameter was set, specific hook types do not need to be
	 * added explicitly.
	 */
	'html',
	'body',
	'head',
	'header',
	'content',
	'entry',
	'comments',
	'sidebars',
	'sidebar',
	'footer',

	/**
	 * If/when WordPress Core implements similar methodology, Themes and Plugins
	 * will be able to check whether the version of THA supplied by the theme
	 * supports Core hooks.
	 */
//	'core'
) );

/**
 * Determines, whether the specific hook type is actually supported.
 *
 * Plugin developers should always check for the support of a <strong>specific</strong>
 * hook type before hooking a callback function to a hook of this type.
 *
 * Example:
 * <code>
 * 		if ( current_theme_supports( 'wptheme\Custom\Hooks::tha_hooks', 'header' ) )
 * 	  		add_action( 'wptheme\Custom\Hooks::tha_head_top', 'prefix_header_top' );
 * </code>
 *
 * @param bool $bool true
 * @param array $args The hook type being checked
 * @param array $registered All registered hook types
 *
 * @return bool
 */
function wptheme\Custom\Hooks::tha_current_theme_supports( $bool, $args, $registered )
{
	return in_array( $args[0], $registered[0] ) || in_array( 'all', $registered[0] );
}
add_filter( 'current_theme_supports-wptheme\Custom\Hooks::tha_hooks', 'wptheme\Custom\Hooks::tha_current_theme_supports', 10, 3 );

/**
 * HTML <html> hook
 * Special case, useful for <DOCTYPE>, etc.
 * $wptheme\Custom\Hooks::tha_supports[] = 'html;
 */
 function wptheme\Custom\Hooks::tha_html_before() {
	 do_action( 'wptheme\Custom\Hooks::tha_html_before' );
 }
/**
 * HTML <body> hooks
 * $wptheme\Custom\Hooks::tha_supports[] = 'body';
 */
 function wptheme\Custom\Hooks::tha_body_top() {
	 do_action( 'wptheme\Custom\Hooks::tha_body_top' );
	 do_action( 'body_open' );
	 do_action( 'before' );
 }

 function wptheme\Custom\Hooks::tha_body_bottom() {
	 do_action( 'wptheme\Custom\Hooks::tha_body_bottom' );
 }

/**
* HTML <head> hooks
*
* $wptheme\Custom\Hooks::tha_supports[] = 'head';
*/
function wptheme\Custom\Hooks::tha_head_top() {
	do_action( 'wptheme\Custom\Hooks::tha_head_top' );
}

function wptheme\Custom\Hooks::tha_head_bottom() {
	do_action( 'wptheme\Custom\Hooks::tha_head_bottom' );
}

/**
* Semantic <header> hooks
*
* $wptheme\Custom\Hooks::tha_supports[] = 'header';
*/
function wptheme\Custom\Hooks::tha_header_before() {
	do_action( 'wptheme\Custom\Hooks::tha_header_before' );
}

function wptheme\Custom\Hooks::tha_header_after() {
	do_action( 'wptheme\Custom\Hooks::tha_header_after' );
}

function wptheme\Custom\Hooks::tha_header_top() {
	do_action( 'wptheme\Custom\Hooks::tha_header_top' );
}

function wptheme\Custom\Hooks::tha_header_bottom() {
	do_action( 'wptheme\Custom\Hooks::tha_header_bottom' );
}

/**
* Semantic <content> hooks
*
* $wptheme\Custom\Hooks::tha_supports[] = 'content';
*/
function wptheme\Custom\Hooks::tha_content_before() {
	do_action( 'wptheme\Custom\Hooks::tha_content_before' );
}

function wptheme\Custom\Hooks::tha_content_after() {
	do_action( 'wptheme\Custom\Hooks::tha_content_after' );
}

function wptheme\Custom\Hooks::tha_content_top() {
	do_action( 'wptheme\Custom\Hooks::tha_content_top' );
}

function wptheme\Custom\Hooks::tha_content_bottom() {
	do_action( 'wptheme\Custom\Hooks::tha_content_bottom' );
}

/**
* Semantic <entry> hooks
*
* $wptheme\Custom\Hooks::tha_supports[] = 'entry';
*/
function wptheme\Custom\Hooks::tha_entry_before() {
	do_action( 'wptheme\Custom\Hooks::tha_entry_before' );
}

function wptheme\Custom\Hooks::tha_entry_after() {
	do_action( 'wptheme\Custom\Hooks::tha_entry_after' );
}

function wptheme\Custom\Hooks::tha_entry_top() {
	do_action( 'wptheme\Custom\Hooks::tha_entry_top' );
}

function wptheme\Custom\Hooks::tha_entry_bottom() {
	do_action( 'wptheme\Custom\Hooks::tha_entry_bottom' );
}

/**
* Comments block hooks
*
* $wptheme\Custom\Hooks::tha_supports[] = 'comments';
*/
function wptheme\Custom\Hooks::tha_comments_before() {
	do_action( 'wptheme\Custom\Hooks::tha_comments_before' );
}

function wptheme\Custom\Hooks::tha_comments_after() {
	do_action( 'wptheme\Custom\Hooks::tha_comments_after' );
}

/**
* Semantic <sidebar> hooks
*
* $wptheme\Custom\Hooks::tha_supports[] = 'sidebar';
*/
function wptheme\Custom\Hooks::tha_sidebars_before() {
	do_action( 'wptheme\Custom\Hooks::tha_sidebars_before' );
}

function wptheme\Custom\Hooks::tha_sidebars_after() {
	do_action( 'wptheme\Custom\Hooks::tha_sidebars_after' );
}

function wptheme\Custom\Hooks::tha_sidebar_top() {
	do_action( 'wptheme\Custom\Hooks::tha_sidebar_top' );
}

function wptheme\Custom\Hooks::tha_sidebar_bottom() {
	do_action( 'wptheme\Custom\Hooks::tha_sidebar_bottom' );
}

/**
* Semantic <footer> hooks
*
* $wptheme\Custom\Hooks::tha_supports[] = 'footer';
*/
function wptheme\Custom\Hooks::tha_footer_before() {
	do_action( 'wptheme\Custom\Hooks::tha_footer_before' );
}

function wptheme\Custom\Hooks::tha_footer_after() {
	do_action( 'wptheme\Custom\Hooks::tha_footer_after' );
}

function wptheme\Custom\Hooks::tha_footer_top() {
	do_action( 'wptheme\Custom\Hooks::tha_footer_top' );
}

function wptheme\Custom\Hooks::tha_footer_bottom() {
	do_action( 'wptheme\Custom\Hooks::tha_footer_bottom' );
}
