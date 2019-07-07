<?php
/*
@package WordPress
@subpackage wpChildTheme
@since wpTheme
	========================================
		TEMPLATE PART: CHILD HEADER IMAGE
	========================================
* Template part in charge of placing and styling the header image if ther is one.
*/
?>

<?php
     /* Include file template parts */
     include('part-header-image-options.php' );
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
     ?>
