<?php
/*

@package WordPress
@subpackage wpTheme
@since wpTheme

	===================================
		ARCHIVE
	===================================
* This is the archives template
*
*/
?>

<?php
     //Calls the header.php
     get_header();
     //we determine how many columns the content will ocuppy
     $wpTheme_content_columns = wpTheme_get_content_columns('body');
     //Add Hook


?>
<?php
     //Get the standard header
     get_header();
     /* Since we are in the archive we are going to add the Taxonomy menu */

     //we determine how many columns the content will ocuppy
     $wpTheme_content_columns = wpTheme_get_content_columns('body'); ?>
     <!-- add the class to the content div-->
     <div class="row" >
          <?php
          //Add hook
          tha_content_before();
          ?>
          <div class="content <?php echo esc_attr( $wpTheme_content_columns ) ?> order-2 the_content">
               <!-- Add hook -->
               <?php tha_content_top(); ?>
               <!-- The loop -->
               <?php if (have_posts()) :
                    ?>
                    <div class="read-more-results">
                    <?php
                         while (have_posts()) : the_post();
                         //get template part depending on the template format we are displaying

                         get_template_part('template-parts/post', 'archive');
                    endwhile;
                    ?>
                    </div>
                    <?php get_template_part('template-parts/part', 'navigation' ); ?>
               <?php endif; ?>

               <?php tha_content_bottom(); ?>
          </div>

          <?php tha_content_after(); ?>
          <?php get_sidebar('left'); ?>
          <?php get_sidebar('right'); ?>
     </div><!-- /Row -->

     <?php get_footer(); ?>
