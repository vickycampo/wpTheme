<?php
/*
@package WordPress
@subpackage wpTheme
@since wpTheme
	===============================
		TEMPLATE PART: HEADER IMAGE OPTIONS
	===============================
*
*/
?>

<?php
     /* we prepare the header */
     //get the theme options
          $options = get_option( 'wpTheme_options' );
          /* We get the defaults */
          $defaults = wpTheme_get_theme_defaults();

     //if the header title is not being displayed
     //we prepare a funciotn so the heather will have a link for the homepage
          $wpTheme_headerimg = null;
          if ( !isset( $options['site-title'] ) || $options['site-title'] == false ) {
               $wpTheme_headerimg_before = '<a href="' . esc_url( home_url() ) . '" title="' . get_bloginfo('title') . '">';
               $wpTheme_headerimg_after = '</a>';
          } else {
               $wpTheme_headerimg_before = null;
               $wpTheme_headerimg_after = null;
          }
     //get the image size
          $width = get_theme_support( 'custom-header', 'width' );
     // Set the image as a background
          $as_a_background = false;
          if (( isset ( $options['big-header-image']['as_background'] ) && ( $options['big-header-image']['as_background'] ) ) || ( ( ! isset ( $options['big-header-image']['as_background'] )) && $defaults['big-header-image']['as_background'] ))
          {
               $as_a_background = true;
          }
     // Show site logo
          $show_site_logo = false;
          if (( isset ( $options['big-header-image']['show_site_logo'] ) && ( $options['big-header-image']['show_site_logo'] ) ) || ( ( ! isset ( $options['big-header-image']['show_site_logo'] )) && $defaults['big-header-image']['show_site_logo'] ))
          {
               $show_site_logo = true;
          }
     // Show site Name
          $site_name = false;
          if (( isset ( $options['big-header-image']['site_name'] ) && ( $options['big-header-image']['site_name'] ) ) || ( ( ! isset ( $options['big-header-image']['site_name'] )) && $defaults['big-header-image']['site_name'] ))
          {
               $site_name = true;
          }
     // Show site Description
          $site_description = false;
          if (( isset ( $options['big-header-image']['site_description'] ) && ( $options['big-header-image']['site_description'] ) ) || ( ( ! isset ( $options['big-header-image']['site_description'] )) && $defaults['big-header-image']['site_description'] ))
          {
               $site_description = true;
          }

?>
