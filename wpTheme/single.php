<?php
/*

@package WordPress
@subpackage wpTheme
@since wpTheme

	=========================
		SINGLE
	=========================
* The single post template is used when a visitor requests a single post.
*/
?>
<?php
     //Get the standard header
     get_header();

     //we determine how many columns the content will ocuppy
     $wpTheme_content_columns = wpTheme_get_content_columns('body');
?>
     <!-- add the class to the content div-->
     <div class="row" >
          <?php
          //Add hook
          tha_content_before();
          ?>
          <div class="content <?php echo esc_attr( $wpTheme_content_columns ) ?> order-2 the_content">
               <!-- Add hook -->
               <?php tha_content_top(); ?>
               <!-- The post -->
               <?php get_template_part('template-parts/content','single'); ?>
               <!-- Add hook -->
               <?php tha_content_bottom(); ?>
          </div>

          <?php tha_content_after(); ?>
          <?php get_sidebar('left'); ?>
          <?php get_sidebar('right'); ?>
     </div><!-- /Row -->
     <?php get_footer(); ?>
