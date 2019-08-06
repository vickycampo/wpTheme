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
     /* Include file template parts */
     include('part-header-image-options.php' );
     /* Do we have to display the site title in the header image? */
     /* add site logo */
     ?>

     <div class="header header__content">
          <div class="header header__spacerDiv">

          </div>
     <?php
     if ( ( $show_site_logo ) && ( function_exists( 'the_custom_logo' ) ) )
     {
          /* we check if there is a logo file */
          if ( $logo )
          {
               ?>
                    <div class="header header__logo--div<?php echo ($ExtraClasses);?>">
                         <!-- Show Logo -->
                         <?php echo wp_kses_post( $wpTheme_headerimg_before ); ?>
                         <img class=" header header__logo--image" src="<?php echo esc_url( $logo[0] );?>" alt="<?php bloginfo('title'); ?>-logo" >
                         <?php echo wp_kses_post( $wpTheme_headerimg_after ); ?>
                    </div>
               <?php
          }

     }
     /* Add a div for the site-name & site-description */
     if ( $site_name || $site_description )
     {
          ?>
          <div class="header header__info--div">
          <?php
          /* Display the site name and description */
          if ( isset( $options['alth1'] ) && $options['alth1'] == true)
          {
               /* Show the site name */
               if ( $site_name )
               {
                    ?>
                    <div class="header header__title--div">
                         <h1 class="alt header__title">
                         <a href="<?php echo esc_url( home_url() ) ?>" title="<?php bloginfo('title'); ?>">
                              <?php bloginfo('title'); ?>
                         </a>
                         </h1>
                    </div>
                    <?php
               }
               /* Show the site description */
               if ( $site_description )
               {
                    ?>
                    <div class="header header__description--div">
                         <h2 class="alt header__description">
                              <?php bloginfo('description'); ?>
                         </h2>
                    </div>
                    <?php
               }
          }
          else
          {
               /* Show the site name */
               if ( $site_name )
               {
                    ?>
                    <div class="header header__title--div">
                         <h1 class="header header__title">
                              <a href="<?php echo esc_url( home_url() ) ?>" title="<?php bloginfo('title'); ?>">
                                   <?php bloginfo('title'); ?>
                              </a>
                         </h1>
                    </div>
                    <?php
               }
               ?>
               <?php

               /* Show the site description */
               if ( $site_description )
               {
                    ?>
                    <div class="header header__description--div">
                         <h2 class="header header__description">
                              <?php bloginfo('description'); ?>
                         </h2>
                    </div>
                    <?php
               }
          }
          /* We close the div that contains the site name and description */
          ?>
          </div>
          <?php
     }
     ?>
     </div> <!-- header-content -->
