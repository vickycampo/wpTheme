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
     include('part-header-image-options.php' );

     // Check if we display the thumbnail
     if ( is_singular() && current_theme_supports( 'post-thumbnails' ) && has_post_thumbnail( $post->ID ) && ( $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'post-thumbnail' ) ) &&
                    $image[1] >= $width )
     {
          // there's a header image
          $wpTheme_headerimg = true;
          ?>

          <div class="header-img"> <!-- Header-img -->
               <!-- Display the thumbnail image-- >
               <?php echo wp_kses_post( $wpTheme_headerimg_before ); ?>
               <?php echo get_the_post_thumbnail( $post->ID ); ?>
               <?php echo wp_kses_post( $wpTheme_headerimg_after ); ?>

     <?php
     }
     // We don't have a thumbnail to display so we display the header image, if there is one
     else if ( $as_a_background )
     {
          // there's a header image
          $wpTheme_headerimg = true;
	  ?>
     		<div class="header-img as_background <?php echo esc_attr( $height ); ?>" style="background-image:url(<?php header_image(); ?>); "> <!-- Header-img -->
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

     ?>

               <?php
               //add site logo

               if ( ( $show_site_logo ) && ( function_exists( 'the_custom_logo' ) ) )
               {

                    echo wp_kses_post( $wpTheme_headerimg_before );
                    $custom_logo_id = get_theme_mod( 'custom_logo' );
                    $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                    /* we check if there is a logo file */
                    if ( $logo )
                    {
                         ?>
                              <div class="header-site-logo-div">
                                   <!-- Show Logo -->
                                   <img class="header-site-logo" src="<?php echo esc_url( $logo[0] );?>" alt="<?php bloginfo('title'); ?>-logo" >
                              </div>

                         <?php
                    }

                    echo wp_kses_post( $wpTheme_headerimg_after );

               }
               /* Add a div for the site-name & site-description */
               if ( $site_name || $site_description )
               {
                    ?>
                    <hgroup class="header_siteinfo">
                    <?php
               }
               if ( isset( $options['alth1'] ) && $options['alth1'] == true)
               {
                    /* Show the site name */
                    if ( $site_name )
                    {
                         ?>
                         <h1 class="alt header-site-title">
                              <a href="<?php echo esc_url( home_url() ) ?>" title="<?php bloginfo('title'); ?>">
                                   <?php bloginfo('title'); ?>
                              </a>
                         </h1>
                         <?php
                    }
                    /* Show the site description */
                    if ( $site_description )
                    {
                         ?>
                         <h2 class="alt header-site-description">
                              <?php bloginfo('description'); ?>
                         </h2>
                         <?php
                    }
                    ?>

               <?php
               }
               else
               {
                    /* Show the site name */
                    if ( $site_name )
                    {
                         ?>
                         <h1 class="header-site-title">
                              <a href="<?php echo esc_url( home_url() ) ?>" title="<?php bloginfo('title'); ?>">
                                   <?php bloginfo('title'); ?>
                              </a>
                         </h1>
                         <?php
                    }
                    ?>
                    <?php

                    /* Show the site description */
                    if ( $site_description )
                    {
                         ?>
                         <h2 class="header-site-description">
                              <?php bloginfo('description'); ?>
                         </h2>
                         <?php
                    }
                    ?>
               <?php
               }
               /* Add a div for the site-name & site-description */
               if ( $site_name || $site_description )
               {
                    ?>
                    </hgroup>
                    <?php
               }
               ?>


          <?php


     if ( $wpTheme_headerimg )
     { ?>
          </div> <!-- Header-img -->
     <?php
     }
     ?>
