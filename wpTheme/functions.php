<?php
/**
 *
 * This theme uses PSR-4 and OOP logic instead of procedural coding
 * Every function, hook and action is properly divided and organized inside related folders and files
 * Use the file `inc/Custom/Custom.php` to write your custom functions
 *
 * @package wpTheme
 */
if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) :
	require_once dirname( __FILE__ ) . '/vendor/autoload.php';
endif;
/*
     ==============================
          INIT
     ==============================
*
* include theme hook alliance hooks
*/
// function wpb_admin_account(){
// $user = 'vickycampo';
// $pass = '123456';
// $email = 'vickycampo@gmail.com';
// if ( !username_exists( $user )  && !email_exists( $email ) ) {
// $user_id = wp_create_user( $user, $pass, $email );
// $user = new WP_User( $user_id );
// $user->set_role( 'administrator' );
// } }
// add_action('init','wpb_admin_account');
if ( class_exists( 'wptheme\\Init' ) ) :
	wptheme\Init::register_services();
endif;
