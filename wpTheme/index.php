<?php
/*

@package WordPress
@subpackage wpTheme
@since wpTheme

	=========================
		INDEX
	=========================
* The main template file. It is required in all themes.
*/
?>
<?php
     //We get the header.php at the moment we are not using a special header, just the standard one.
     get_header();
     //Add hook
     tha_content_before();
     //We determine which side we need to place the content
     //based on which side the sidebar is located at
     $wpTheme_content = wpTheme_get_content_side(); ?>
     <!-- add the class to the content div-->
     <div class="content col-md-9 <?php echo esc_attr( $wpTheme_content ) ?>">
          <!-- Add hook -->
          <?php tha_content_top(); ?>
          <!-- The loop -->
          <?php if (have_posts()) :
                    while (have_posts()) : the_post();
                    //get template part depending on the template format we are displaying
                    if (locate_template( 'template-parts/post/part', get_post_format()))
                    {
                         get_template_part('template-parts/post/part', get_post_format());
                    }
                    else
                    {
                         get_template_part('template-parts/post/part', 'post');
                    }

               endwhile; ?>
               <?php get_template_part( 'parts/part', 'navigation' ); ?>
          <?php endif; ?>

          <?php tha_content_bottom(); ?>
     </div>
<?php tha_content_after(); ?>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
