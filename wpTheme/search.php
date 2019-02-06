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
//Get the standard header
get_header();

//we determine how many columns the content will ocuppy
$wpTheme_content_columns = wpTheme_get_content_columns('body'); ?>
<div class="row" >
	<?php
	//Add hook
	tha_content_before();
	?>
	<div class="content col-md-9 <?php echo esc_attr( $ap_core_content ) ?>">
		<?php tha_content_top(); ?>

		<?php get_template_part('template-parts/content','search'); ?>

		<?php tha_content_bottom(); ?>
	</div>
     <?php tha_content_after(); ?>
     <?php get_sidebar('left'); ?>
     <?php get_sidebar('right'); ?>
</div><!--sidebar and content row-->
<?php get_footer(); ?>
