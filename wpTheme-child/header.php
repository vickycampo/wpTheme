<?php
/*

@package WordPress
@subpackage wpChildTheme
@since wpTheme

     =========================
          CHILD HEADER
     =========================
* This page contains the header part ot the template.
* Must be referenced with the get_header (); command.
*/
?>
<!DOCTYPE html>
<?php wptheme\Custom\Hooks::tha_html_before(); ?>
<html <?php language_attributes();  ?> dir="ltr" class="no-js">
<head>
     <?php wptheme\Custom\Hooks::tha_head_top (); ?>
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
     <?php
     //get the theme options
          $options = get_option( 'wpTheme_options' );
     /* We get the defaults */
          $defaults = wptchild\Setup\Functions::get_theme_defaults();
     ?>
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
     <?php wptheme\Custom\Hooks::tha_head_bottom(); ?>
     <?php wp_head(); ?>
</head>
<body <?php body_class( $fixed_nav ); ?>>

     <?php wptheme\Custom\Hooks::tha_body_top(); ?>
     <!-- Create a div that is going to wrap all the content -->
     <!-- Add the head part-->
     <?php wptheme\Custom\Hooks::tha_header_before(); ?>

          <?php
          wptheme\Custom\Hooks::tha_header_top();
          /* Do we have a fixed hight */
          $height = 'fixed-height-' . $defaults['big_header_image']['percentage'];
          if ( isset ($options['big_header_image']['percentage']) )
          {
               $height = 'fixed-height-' . $options['big_header_image']['percentage'];
          }
          /* do we have a file for the background */

          $as_background = '';
          $class = '';
          if ( isset ($options['big_header_image']['as_background']) )
          {
               error_log (__FILE__ . ' - ' . __LINE__);
               error_log ( print_r ( $options['big_header_image'] , true) );

               $as_background = 'style="background-image:url('.$options['big_header_image']['as_background'].');"';
               $class = ' as_background';
          }
          else if ( get_custom_header() )
          {
               $custom_header = get_custom_header();
               $url = $custom_header -> url;
               $width = $custom_header -> width;
               $as_background = 'style="background-image:url('.$url.');"';
               /*we check the size of the image */
               if ( $width < 900)
               {
                    $class = ' as_background_tile';
               }
               else
               {
                    $class = ' as_background';
               }


          }

          ?>

     <header id="header" class="header <?php echo esc_attr( $class ); ?> <?php echo esc_attr( $height ); ?>" <?php echo ( $as_background ); ?> ">
          <!-- Top Navitagion bar part -->
          <?php get_template_part( 'template-parts/header/part', 'navbar-top' ); ?>
          <!-- Header Image part -->
          <?php get_template_part( 'template-parts/header/part', 'header-image' ); ?>

     </header> <!-- Header-img -->
     <!-- Main Navigation bar part -->
     <?php get_template_part( 'template-parts/header/part', 'subcategory-bar' ); ?>
          <?php wptheme\Custom\Hooks::tha_header_bottom(); ?>
     <?php wptheme\Custom\Hooks::tha_header_after(); ?>
     <main class="container" id="wrap"> <!-- wrap div-->
