<?php
/*

@package WordPress
@subpackage wpTheme
@since wpTheme

	=========================
		PAGE
	=========================
* The page template is used when visitors request individual pages,
* which are a built-in template.
*/
?>
<?php
     //Get the standard header
     get_header();

     //we determine how many columns the content will ocuppy
     $wpTheme_content_columns = wptheme\Core\Functions::get_content_columns('body'); ?>
     <!-- add the class to the content div-->
     <div class="row" >
          <?php
          //Add hook
          wptheme\Custom\Hooks::tha_content_before();
          ?>
          <div class="content <?php echo esc_attr( $wpTheme_content_columns ) ?> order-2 the_content">
               <!-- Add hook -->
               <?php wptheme\Custom\Hooks::tha_content_top(); ?>
               <!-- The Content -->
               <?php get_template_part('template-parts/content', 'page'); ?>

               <?php wptheme\Custom\Hooks::tha_content_bottom(); ?>
          </div>

          <?php wptheme\Custom\Hooks::tha_content_after(); ?>
          <?php get_sidebar('left'); ?>
          <?php get_sidebar('right'); ?>
     </div><!-- /Row -->
     <?php get_footer(); ?>
