<?php
/*

@package WordPress
@subpackage wpTheme
@since wpTheme

	=========================
		SEARCH
	=========================
* The search results template is used to display a visitor’s search results.
*/
?>
<?php
get_header();

$ap_core_content = ap_core_get_which_content(); ?>
<div class="row" >
	<?php
	//Add hook
	tha_content_before();
	?>
	<div class="content col-md-9 <?php echo esc_attr( $ap_core_content ) ?>">
		<?php tha_content_top(); ?>

		<?php get_template_part('parts/content','search'); ?>

		<?php tha_content_bottom(); ?>
	</div>
     <?php tha_content_after(); ?>
     <?php get_sidebar('left'); ?>
     <?php get_sidebar('right'); ?>
</div><!--sidebar and content row-->
<?php get_sidebar(); ?>
<?php get_footer(); ?>
