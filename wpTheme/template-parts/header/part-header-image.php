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
     //we prepare the header,
     //get the theme options
     $options = get_option( 'wpTheme_options' );


     //if the header title is not being displayed
     //we prepare a funciotn so the heather will have a link for the homepage
     $ap_core_headerimg = null;
     if ( !isset( $options['site-title'] ) || $options['site-title'] == false ) {
          $ap_core_headerimg_before = '<a href="' . esc_url( home_url() ) . '" title="' . get_bloginfo('title') . '">';
          $ap_core_headerimg_after = '</a>';
     } else {
          $ap_core_headerimg_before = null;
          $ap_core_headerimg_after = null;
     }
?>
<!-- set the header image -->
<?php
     //get the image size
     $ap_core_header_image_width = get_theme_support( 'custom-header', 'width' );

     // Check if we display the thumbnail
     if ( is_singular() && current_theme_supports( 'post-thumbnails' ) && has_post_thumbnail( $post->ID ) && ( $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'post-thumbnail' ) ) &&
                    $image[1] >= $ap_core_header_image_width )
     {
          // there's a header image
          $ap_core_headerimg = true;
          
          ?>

          <div class="headerimg"> <!-- Header-img -->
               <!-- Display the thumbnail image-- >
               <?php echo wp_kses_post( $ap_core_headerimg_before ); ?>
               <?php echo get_the_post_thumbnail( $post->ID ); ?>
               <?php echo wp_kses_post( $ap_core_headerimg_after ); ?>

     <?php
     }
     // We don't have a thumbnail to display so we display the header image, if there is one
     else if ( get_header_image() )
     {
          $ap_core_headerimg = true;
          $ap_core_header_image_width = get_custom_header()->width;
          $ap_core_header_image_height = get_custom_header()->height;
          ?>

          <div class="headerimg"> <!-- Header-img -->
               <?php echo wp_kses_post( $ap_core_headerimg_before ); ?>
               <img src="<?php header_image(); ?>" width="<?php echo esc_attr( $ap_core_header_image_width ); ?>" height="<?php echo esc_attr( $ap_core_header_image_height ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" />
               <?php echo wp_kses_post( $ap_core_headerimg_after ); ?>
               <?php
     }
     ?>
          <hgroup class="siteinfo">
               <?php
               if ( isset( $options['alth1'] ) && $options['alth1'] == true)
               { ?>
                    <h2 class="alt">
                         <a href="<?php echo esc_url( home_url() ) ?>" title="<?php bloginfo('title'); ?>">
                              <?php bloginfo('title'); ?></a>
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
     if ( $ap_core_headerimg )
     { ?>
          </div> <!-- Header-img -->
     <?php
     }
     ?>
