<?php
/*

@package WordPress
@subpackage wpTheme
@since wpTheme

	========================================
		POST PART FOR A STANDARD POSTTYPE
	========================================
* The main template file. It is required in all themes.
*/
?>
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
	<?php
	get_template_part( 'template-parts/part', 'title' );
	wptheme\Custom\Hooks::tha_entry_before(); ?>
	<section class="entry media">
		<?php
		wptheme\Custom\Hooks::tha_entry_top();
		if ( is_single() )
		{
		?>
			<div class="the_content">
			<?php the_content();?>
			</div>
			<div class="the_comments">
			<?php get_template_part( 'template-parts/part', 'comments' );;?>
			</div>
		<?php
		}
		else if ( function_exists( 'wpTheme_blog_excerpts' ) && wpTheme_blog_excerpts() == false ) {
			the_content(__('Read more &raquo;','wpTheme'));
		}
		else
		{
			if ( has_post_thumbnail () )
			{
			?>
				<div class="pull-left"><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail( 'thumbnail', array( 'class' => 'img-thumbnail media-object' ) ); ?></a></div>
			<?php
			}
			?>
			<div class="media-body">
				<?php the_excerpt(); ?>
			</div>
		<?php
		}
		?>
		<?php
		get_template_part( 'template-parts/part', 'link-pages' );
		wptheme\Custom\Hooks::tha_entry_bottom();
		?>
	</section>
	<?php
	wptheme\Custom\Hooks::tha_entry_after();
	?>
	<div class="icon icon-post pull-left"></div><?php get_template_part( 'template-parts/part', 'postmetadata' ); ?>

</article>
