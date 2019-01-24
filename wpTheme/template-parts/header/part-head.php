<?php tha_header_before(); ?>
<header>
     <?php tha_header_top(); ?>
     <?php
     $nav_1 = has_nav_menu( 'top' );
     $nav_2 = has_nav_menu( 'main' );
     ?>

     <?php

          //we create a variable that contains the container class depending on which settings are set in the options
          if ( $ap_core_fixed_nav ) {
               // if the nav menu is fixed
               $container_class = 'topnav ' . $ap_core_navbar_inverse . ' collapse navbar-collapse navbar-1-collapse';
          } else {
               $container_class =  'topnav ' . $ap_core_navbar_inverse . ' navbar navbar-collapse collapse navbar-1-collapse navbar-default navbar-fixed-top';
          }
          //Collapse target name
          $data_target = 'theme_location_top';
          //create the parameters for the navigation menu
          $navbar = array (
               'menu_class' => 'navbar-nav mr-auto',
               'container' => 'false',
               'theme_location' => 'top',
               'fallback_cb' => false,
               'add_li_class'  => 'nav-item',
               'walker' => new AP_Core_WP_Bootstrap_Navwalker()
          );
          //<li class="nav-item active">

     ?>
     <!-- prepare the bootstrap nav-menu -->
     <!-- wrapping .navbar / .navbar-expand{-sm|-md|-lg|-xl} / Color Scheme -->
     <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <!-- Toggler -->
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#<?php echo ( $data_target );?>" aria-controls="navbar-content" aria-expanded="false" aria-label="<?php esc_html_e( 'Toggle Navigation', 'wpTheme' ); ?>">
               <span class="navbar-toggler-icon"></span>
          </button>
          <!-- /Toggler -->
          <!-- grouping and hiding navbar contents by a parent breakpoint -->
          <div class="<?php echo ($container_class);?>" id="<?php echo ( $data_target );?>">
               <?php
               //Displays a navigation menu.
               wp_nav_menu($navbar );
               ?>
          </div>
          <!-- grouping -->
     </nav>
     <!-- set the header image -->
     <?php
     //get the image size
     $ap_core_header_image_width = get_theme_support( 'custom-header', 'width' );
     // Check if this is a post or page, if it has a thumbnail, and if it's a big one
     if ( is_singular() && current_theme_supports( 'post-thumbnails' ) && has_post_thumbnail( $post->ID ) && ( $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'post-thumbnail' ) ) &&
                         $image[1] >= $ap_core_header_image_width ) :
          // there's a header image
          $ap_core_headerimg = true;
          ?>

          <div class="headerimg">

               <?php echo wp_kses_post( $ap_core_headerimg_before ); ?>
               <?php echo get_the_post_thumbnail( $post->ID ); ?>
               <?php echo wp_kses_post( $ap_core_headerimg_after ); ?>


     <?php elseif ( get_header_image() ) :

          $ap_core_headerimg = true;
          $ap_core_header_image_width = get_custom_header()->width;
          $ap_core_header_image_height = get_custom_header()->height;
          ?>

          <div class="headerimg">

               <?php echo wp_kses_post( $ap_core_headerimg_before ); ?>
               <img src="<?php header_image(); ?>" width="<?php echo esc_attr( $ap_core_header_image_width ); ?>" height="<?php echo esc_attr( $ap_core_header_image_height ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" />
               <?php echo wp_kses_post( $ap_core_headerimg_after ); ?>

     <?php endif; ?>

     <hgroup class="siteinfo">
          <?php if ( isset( $options['alth1'] ) && $options['alth1'] == true) { ?>
               <h2 class="alt"><a href="<?php echo esc_url( home_url() ) ?>" title="<?php bloginfo('title'); ?>"><?php bloginfo('title'); ?></a></h2>
               <h3><?php bloginfo('description'); ?></h3>
          <?php } else { ?>
               <h2><a href="<?php echo esc_url( home_url() ) ?>" title="<?php bloginfo('title'); ?>"><?php bloginfo('title'); ?></a></h2>
               <h3 class="alt"><?php bloginfo('description'); ?></h3>
          <?php } ?>
     </hgroup>

     <?php if ( $ap_core_headerimg ) { ?>
          </div>
     <?php } ?>

     <?php wp_nav_menu( array( 'container' => 'nav', 'container_class' => 'mainnav collapse navbar-collapse navbar-2-collapse', 'theme_location' => 'main', 'fallback_cb' => false, 'menu_class' => 'nav navbar-nav', 'walker' => new AP_Core_WP_Bootstrap_Navwalker() ) ); ?>
     <?php tha_header_bottom(); ?>
</header>
<?php tha_header_after(); ?>
