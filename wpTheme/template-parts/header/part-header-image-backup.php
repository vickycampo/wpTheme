<?php
/*
@package WordPress
@subpackage wpTheme
@since wpTheme
	===============================
		TEMPLATE PART: HEADER IMAGE
	===============================
* Template part in charge of placing and styling the header image if ther is one.
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
?>
<!-- set the header image -->
<?php
     //get the image size
          $width = get_theme_support( 'custom-header', 'width' );

     // Check if we display the thumbnail
     if ( is_singular() && current_theme_supports( 'post-thumbnails' ) && has_post_thumbnail( $post->ID ) && ( $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'post-thumbnail' ) ) &&
                    $image[1] >= $width )
     {
          // there's a header image
          $wpTheme_headerimg = true;
          ?>

          <div class="headerimg"> <!-- Header-img -->
               <!-- Display the thumbnail image-- >
               <?php echo wp_kses_post( $wpTheme_headerimg_before ); ?>
               <?php echo get_the_post_thumbnail( $post->ID ); ?>
               <?php echo wp_kses_post( $wpTheme_headerimg_after ); ?>

     <?php
     }
     // We don't have a thumbnail to display so we display the header image, if there is one
     // We check the options if we display the image as a background
     else if (( isset ( $options['big-header-image']['as_background'] ) && ( $options['big-header-image']['as_background'] ) ) || ( ( ! isset ( $options['big-header-image']['as_background'] )) && $defaults['big-header-image']['as_background'] ))
     {
          // there's a header image
          $wpTheme_headerimg = true;
          ?>
          <div class="as_background" style="background-image:url(<?php header_image(); ?>)"> <!-- Header-img -->
          <?php
     }
     else if ( get_header_image() )
     {
          // there's a header image
          $wpTheme_headerimg = true;
          $width = get_custom_header()->width;
          $height = get_custom_header()->height;
          ?>

          <div class="header-img"> <!-- Header-img -->
               <?php echo wp_kses_post( $wpTheme_headerimg_before ); ?>
               <img src="<?php header_image(); ?>" width="<?php echo esc_attr( $width ); ?>" height="<?php echo esc_attr( $height ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" />
               <?php echo wp_kses_post( $wpTheme_headerimg_after ); ?>
               <?php
     }
     /* Do we have to display the site title in the header image? */
     if (( isset ( $options['big-header-image']['site_name'] ) && ( $options['big-header-image']['site_name'] ) ) || ( ( ! isset ( $options['big-header-image']['site_name'] )) && $defaults['big-header-image']['site_name'] ))
     {
          ?>
               <hgroup class="siteinfo">
                    <?php
                    if ( isset( $options['alth1'] ) && $options['alth1'] == true)
                    { ?>
                         <h2 class="alt">
                              <a href="<?php echo esc_url( home_url() ) ?>" title="<?php bloginfo('title'); ?>">
                                   <?php bloginfo('title'); ?>
                              </a>
                         </h2>
                         <h3>
                              <?php bloginfo('description'); ?>
                         </h3>
                    <?php
                    }
                    else
                    { ?>
                         <h2>
                              <a href="<?php echo esc_url( home_url() ) ?>" title="<?php bloginfo('title'); ?>">
                                   <?php bloginfo('title'); ?>
                              </a>
                         </h2>
                         <h3 class="alt">
                              <?php bloginfo('description'); ?>
                         </h3>
                    <?php
                    }
                    ?>
               </hgroup>
          <?php
     }

     if ( $wpTheme_headerimg )
     { ?>
          </div> <!-- Header-img -->
     <?php
     }
     ?>
