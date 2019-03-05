<?php
/*
@package WordPress
@subpackage wpTheme
@since wpTheme
	========================================
		TEMPLATE PART: CHILD HEADER IMAGE
	========================================
* Template part in charge of placing and styling the header image if ther is one.
*/
?>

<?php
     /* Include file template parts */
     if ( @ (include('part-header-image-options.php' ) ) )
     {

     }
     else
     {
          include(get_parent_theme_file_path()  . '/template-parts/header/part-header-image-options.php' );
     }
     $wpTheme_headerimg = false;
     /* Do we use the header image as a bacground */
     if ( $as_a_background )
     {
          /* We establish that we have opened a header image */
          $wpTheme_headerimg = true;
          ?>
          <div class="header-img as_background <?php echo esc_attr( $height ); ?>" style="background-image:url(<?php echo ( get_background_image () ); ?>); "> <!-- Header-img -->
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
     /* add site logo */
     if ( ( $show_site_logo ) && ( function_exists( 'the_custom_logo' ) ) )
     {

          $custom_logo_id = get_theme_mod( 'custom_logo' );
          $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
          /* we check if there is a logo file */
          if ( $logo )
          {
               ?>
                    <div class="header-site-logo-div">
                         <!-- Show Logo -->
                         <picture>
                              <?php echo wp_kses_post( $wpTheme_headerimg_before ); ?>
                              <img class="header-site-logo" src="<?php echo esc_url( $logo[0] );?>" alt="<?php bloginfo('title'); ?>-logo" >
                              <?php echo wp_kses_post( $wpTheme_headerimg_after ); ?>
                         </picture>
                    </div>
               <?php
          }

     }
     /* Add a div for the site-name & site-description */
     if ( $site_name || $site_description )
     {
          ?>
          <hgroup class="header_siteinfo">
          <?php
     }
     /* Display the site name and description */
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
          /* We close the div that contains the site name and description */
          ?>
          </hgroup>
          <?php
     }
     /* we create a div for the food image */
     $showFoodImage = false;
     if ( $showFoodImage )
     {
          if ( get_header_image() )
          {
               ?>
                    <div class="header-food-image-div">
                         <picture class="header-food-image">
                              <img src="<?php header_image(); ?>"></img>
                         </picture>
                    </div>
               <?php
          }
     }


     /* We close the div tghat contains the */
     if ( $wpTheme_headerimg )
     {
          /* We close the div that contains the image */
          ?>
          </div> <!-- Header-img -->
          <?php
     }
     ?>
