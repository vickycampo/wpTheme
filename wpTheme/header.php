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
<?php
/* We prepare some values that we need */
     /* get the theme options */
     $options = get_option( 'wpTheme_options' );
     /* We get the defaults */
     $defaults = wpTheme_get_theme_defaults();
/* We check if the header image3 is set as a background */
     $as_a_background = false;
     if (( isset ( $options['big-header-image']['as_background'] ) && ( $options['big-header-image']['as_background'] ) ) || ( ( ! isset ( $options['big-header-image']['as_background'] )) && $defaults['big-header-image']['as_background'] ))
     {
          $as_a_background = true;
     }
/* We check if the height of the div */
     $height = $defaults['big-header-image']['percentage'] . '%';
     if ( isset ($options['big-header-image']['percentage']) )
     {
          $height = $options['big-header-image']['percentage'] . '%';
     }
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
     <?php $options = get_option( 'wpTheme_options' ); ?>
     <?php
          //Check $options['nav-menu']
          $fixed_nav = null;
     	if ( isset( $options['nav-menu'] ) && ( true == $options['nav-menu'] ) )
          {
     		$fixed_nav = 'bs-fixed-nav';
     	}

     ?>
     <!-- Set the page title -->
     <title><?php wp_title ();?></title>
     <?php tha_head_bottom(); ?>
     <?php wp_head(); ?>
</head>
<body <?php body_class( $fixed_nav ); ?>>
     <?php tha_body_top(); ?>
     <!-- Create a div that is going to wrap all the content -->
     <!-- Add the head part-->
     <?php tha_header_before(); ?>
     <?php tha_header_top(); ?>
     <!-- this is where the header content should go -->
     <?php

     /* if the image will be used as a background we need to create a div that contains it all */
     if ( $as_a_background )
     {
     ?>
     <div class="header-img as_background" style="background-image:url(<?php header_image(); ?>); max-height:<?php echo esc_attr( $height ); ?> !important"> <!-- Header-img -->
     <?php
     } ?>
     <!-- Top Navitagion bar part -->
     <?php get_template_part( 'template-parts/header/part', 'navbar-top' ); ?>
     <!-- Header Image part -->
     <?php get_template_part( 'template-parts/header/part', 'header-image' ); ?>

     <?php
     /* if the image will be used as a background we need to create a div that contains it all */
     if ( $as_a_background )
     {
     ?>
     </div> <!-- Header-img -->
     <?php
     } ?>

     <!-- Main Navigation bar part -->
     <?php get_template_part( 'template-parts/header/part', 'navbar-main' ); ?>

     <?php tha_header_bottom(); ?>
     <?php tha_header_after(); ?>
     <div class="container" id="wrap"> <!-- wrap div-->
