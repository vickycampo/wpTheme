<?php
/*

@package WordPress
@subpackage wpTheme
@since wpTheme

=========================
HEADER
=========================
* This page contains the header part ot the template.
* Must be referenced with the get_header (); command.
*/
?>
<!DOCTYPE html>
<?php tha_html_before (); ?>
<html <?php language_attributes(); ?> class="no-js">
<head>
     <?php tha_head_top (); ?>
     <!-- Set the metas -->
     <meta charset="<?php bloginfo( 'charset' ); ?>">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="profile" href="http://gmpg.org/xfn/11">
     <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
     <!--[if lt IE 9]>
     <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
     <![endif]-->
     <!-- Set the meta for the site description -->
     <meta name="description" content="<?php
     if ( is_single() )
     {
          single_post_title('', true);
     }
     else
     {
          bloginfo('name');
          echo " - ";
          bloginfo('description');
     } ?>" />
     <?php $options = get_option( 'ap_core_theme_options' ); ?>
     <?php
          //we prepare the header,
          //if the header title is not being displayed
          //we prepare a funciotn so the heather will have a link for the homepage
          $ap_core_headerimg = null;
          if ( !isset( $options['site-title'] ) || $options['site-title'] == false ) {
               $ap_core_headerimg_before = '<a href="' . esc_url( home_url() ) . '" title="' . get_bloginfo('title') . '">';
               $ap_core_headerimg_after = '</a>';
          } else {
               $ap_core_headerimg_before = null;
               $ap_core_headerimg_after = null;
          }
          //Checks if there is a Nav-Menu to set the class of the body based on this
          $ap_core_fixed_nav = null;
     	if ( isset( $options['nav-menu'] ) && ( true == $options['nav-menu'] ) ) {
     		$ap_core_fixed_nav = 'bs-fixed-nav';
     	}
          //Check the option of the nav bar to see which we are going to use
          $ap_core_navbar_inverse = null;
     	if ( isset( $options['navbar-inverse'] ) && ( true == $options['navbar-inverse'] ) ) {
     		$ap_core_navbar_inverse = 'navbar-inverse';
     	} else {
     		$ap_core_navbar_inverse = 'navbar-default';
     	}
     ?>
     <!-- Set the page title -->
     <title><?php wp_title ();?></title>
     <?php tha_head_bottom(); ?>
     <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
     <?php tha_body_top(); ?>
     <!-- Create a div that is going to wrap all the content -->
	<div class="container" id="wrap">
