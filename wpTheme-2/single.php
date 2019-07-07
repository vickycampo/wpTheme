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
     //Get the standard header
     get_header();
     //we determine how many columns the content will ocuppy
     $wpTheme_content_columns = wpTheme_get_content_columns('body'); ?>
     <!-- add the class to the content div-->
     <div class="row" >
          <?php
          //Add hook
          wptheme\Custom\Hooks::tha_content_before();
          ?>
          <div class="content <?php echo esc_attr( $wpTheme_content_columns ) ?> order-2 the_content">
               <!-- Add hook -->
               <?php
               wptheme\Custom\Hooks::tha_content_top();
               if (have_posts()) :
                    ?>
                    <div class="read-more-results">
                    <?php
                         while (have_posts()) : the_post();
                         //get template part depending on the template format we are displaying

                         if ( ( get_post_format() ) && ( locate_template( array( 'template-parts/post-' . get_post_format() . '.php' ) ) != '') )
                         {
                              get_template_part('template-parts/post', get_post_format());
                         }
                         else
                         {
                              get_template_part('template-parts/post', 'post');
                         }
                    endwhile;
                    ?>
                    </div>
                    <?php get_template_part('template-parts/part', 'navigation' ); ?>
               <?php endif; ?>

               <?php wptheme\Custom\Hooks::tha_content_bottom(); ?>
          </div>

          <?php wptheme\Custom\Hooks::tha_content_after(); ?>
          <?php get_sidebar('left'); ?>
          <?php get_sidebar('right'); ?>
     </div><!-- /Row -->

     <?php get_footer(); ?>
