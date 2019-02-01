<?php
/*

@package WordPress
@subpackage wpTheme
@since wpTheme

	========================================
		VIDEO POST FORMATING
	========================================
* The main template file. It is required in all themes.
*/
?>
<!--  -->
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
	<?php get_template_part( 'template-parts/part', 'title' ); ?>
	<?php tha_entry_before(); ?>
		<?php get_template_part( 'template-parts/part', 'section' ); ?>
	<?php tha_entry_after(); ?>

	<div class="icon icon-film pull-left" title="<?php esc_attr_e( 'Audio', 'wpTheme' ); ?>"></div>
	<?php get_template_part( 'template-parts/part', 'postmetadata' ); ?>

</article>
