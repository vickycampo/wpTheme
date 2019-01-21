<?php tha_header_before(); ?>
<header>
     <?php tha_header_top(); ?>
     <div class="navbar-header"> <!-- navbar-header-->
          <?php
          //CHECK WHICH NAVBAR HAS CONTENT, IF TOP OR MAIN
          $nav_1 = has_nav_menu( 'top' );
          $nav_2 = has_nav_menu( 'main' );
          //DEPENDING ON WHICH BAR WE ARE SHOWING WE ARE GOING TO COLLAPSE THAT ONE
          $data_target = null;
          if ( !empty( $nav_1 ) )
          {
               $data_target = '.navbar-1-collapse';
          }
          else if ( !empty( $nav_2 ) )
          {
               $data_target = '.navbar-2-collapse';
          }
          //add the colapse option of the nav
          if ( !is_null( $data_target ) ) : ?>
               <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="<?php echo $data_target; ?>">
                    <i class="fas fa-igloo" title="Menu"></i>
               </button>
          <?php endif; ?>
     </div><!-- navbar-header-->
     <?php
          $ap_core_navbar_default = array( 'container' => 'nav', 'container_class' => 'topnav ' . $ap_core_navbar_inverse . ' collapse navbar-collapse navbar-1-collapse', 'theme_location' => 'top', 'fallback_cb' => false, 'menu_class' => 'nav navbar-nav', 'walker' => new AP_Core_WP_Bootstrap_Navwalker() );
          $ap_core_navbar_fixed = array( 'container' => 'nav', 'container_class' => 'topnav ' . $ap_core_navbar_inverse . ' navbar navbar-collapse collapse navbar-1-collapse navbar-default navbar-fixed-top', 'theme_location' => 'top', 'fallback_cb' => false, 'menu_class' => 'nav navbar-nav', 'walker' => new AP_Core_WP_Bootstrap_Navwalker() );
     if ( $ap_core_fixed_nav ) {
          // if the nav menu is fixed
          wp_nav_menu( $ap_core_navbar_fixed );
     } else {
          wp_nav_menu( $ap_core_navbar_default );
     } ?>
     <?php
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
