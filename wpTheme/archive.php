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
     //Add Hook
     tha_content_before();
     $ap_core_content = ap_core_get_which_content(); ?>
     <div class="content col-md-9 <?php echo esc_attr( $ap_core_content ) ?>">
     	<?php tha_content_top(); ?>

     	<?php get_template_part('template-parts/content','archive'); ?>

     	<?php tha_content_bottom(); ?>
     </div>
     <?php tha_content_after(); ?>
     <?php get_sidebar(); ?>
     <?php get_footer(); ?>
?>
