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
     <header>
          <?php tha_header_top(); ?>
          <!-- this is where the header content should go -->
          <!-- Top Navitagion bar part -->
          <?php get_template_part( 'template-parts/header/part', 'navbar-top' ); ?>
          <!-- Header Image part -->
          <?php get_template_part( 'template-parts/header/part', 'header-image' ); ?>
          <!-- Main Navigation bar part -->
          <?php get_template_part( 'template-parts/header/part', 'navbar-main' ); ?>
          <?php tha_header_bottom(); ?>
     </header>
     <?php tha_header_after(); ?>
     <div class="container" id="wrap"> <!-- wrap div-->
