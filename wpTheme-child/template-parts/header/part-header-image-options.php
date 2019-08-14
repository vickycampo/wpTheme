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
          $defaults = wptchild\Setup\Functions::get_theme_defaults();

     //if the header title is not being displayed
     //we prepare a funciotn so the heather will have a link for the homepage
          $wpTheme_headerimg = null;
          /* Do we add a link to the header image */
          $isOptionsSet = ( isset ( $options['big_header_image']['site_name'] ) && ( $options['big_header_image']['site_name'] == false ) );
          $isDefaultsSet = (! ( isset ( $options['big_header_image']['site_name'] ) )
          && ( $defaults['big_header_image']['site_name'] == false ) );
          $isSiteTitleSet = ( ( ! ( isset ( $options['site-title'] ) ) ) || ( ! ( $options['site-title'] ) ) );
          if ( $isOptionsSet || $isDefaultsSet || $isSiteTitleSet)
          {
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
          if (( isset ( $options['big_header_image']['as_background'] ) && ( $options['big_header_image']['as_background'] ) ) || ( ( ! isset ( $options['big_header_image']['as_background'] )) && $defaults['big_header_image']['as_background'] ))
          {
               $as_a_background = true;
          }
     // Show site logo
          $show_site_logo = false;
          if (( isset ( $options['big_header_image']['show_site_logo'] ) && ( $options['big_header_image']['show_site_logo'] ) ) || ( ( ! isset ( $options['big_header_image']['show_site_logo'] )) && $defaults['big_header_image']['show_site_logo'] ))
          {
               $show_site_logo = true;
          }
     // Show site Name
          $site_name = false;
          if (( isset ( $options['big_header_image']['site_name'] ) && ( $options['big_header_image']['site_name'] ) ) || ( ( ! isset ( $options['big_header_image']['site_name'] )) && $defaults['big_header_image']['site_name'] ))
          {
               $site_name = true;
          }
     // Show site Description
          $site_description = false;
          if (( isset ( $options['big_header_image']['site_description'] ) && ( $options['big_header_image']['site_description'] ) ) || ( ( ! isset ( $options['big_header_image']['site_description'] )) && $defaults['big_header_image']['site_description'] ))
          {
               $site_description = true;
          }
     //Height
          // echo ('<pre>');
          // var_dump ($options['big_header_image']);
          // echo ('</pre>');
          $height = 'fixed-height-' . $defaults['big_header_image']['percentage'];
          if ( isset ($options['big_header_image']['percentage']) )
          {
               $height = 'fixed-height-' . $options['big_header_image']['percentage'];
          }
          if ( ( $show_site_logo ) && ( function_exists( 'the_custom_logo' ) ) )
          {
               $custom_logo_id = get_theme_mod( 'custom_logo' );


               $sizes_array = array ( 'thumbnail' , 'medium' , 'large' , 'full');
               foreach ( $sizes_array as $i => $size )
               {
                    $logo[$size] = wp_get_attachment_image_src( $custom_logo_id , $size );
               }

               if ( $logo )
               {
                    /* check if we will aslo add name and description */
                    $ExtraClasses = '';
                    if ( $site_name )
                    {
                         $ExtraClasses = '--has-name';
                    }
                    else if ( $site_description )
                    {
                         $ExtraClasses = '--has-description';
                    }
                    if ( $site_name && $site_description )
                    {
                         $ExtraClasses = '--has-name-description';
                    }
               }
          }



?>
