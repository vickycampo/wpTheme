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
<div class="row" >
     <?php tha_content_before(); ?>
     <!-- The Content Div -->
     <div class="content <?php echo esc_attr( $wpTheme_content_columns ) ?> order-2 the_content archive-results">
     	<?php tha_content_top(); ?>
          <?php
          //Get the Template part
          get_template_part('template-parts/content','archive');
          /* Adding the read more option */
          ?>
          <div class="container text-center read-more-div">
			<a class="btn btn-lg btn-default read-more-link" data-page="1" data-url="<?php echo admin_url('admin-ajax.php'); ?>">
				<span class="fas fa-sync-alt"></span>
                    Load More
			</a>
		</div><!-- .container -->

     	<?php tha_content_bottom(); ?>
     </div> <!-- /content -->
     <?php tha_content_after(); ?>
     <?php get_sidebar('left'); ?>
     <?php get_sidebar('right'); ?>
</div><!--row-->
<?php get_footer(); ?>
