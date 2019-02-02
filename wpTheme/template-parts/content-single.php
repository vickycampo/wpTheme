<?php
/*

@package WordPress
@subpackage wpTheme
@since wpTheme

	========================================
		CONTENT - SINGLE
	========================================
* This shows the content of single.php
*/
?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

     <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
          <h1 class="the_title"><?php the_title(); ?></h1>

          <?php tha_entry_before(); ?>
          <?php get_template_part( 'template-parts/part', 'section' ); ?>
          <?php tha_entry_after(); ?>

          <?php get_template_part( 'parts/part', 'postmetadata' ); ?>
          <?php get_template_part( 'parts/part', 'navigation' ); ?>
          <!-- Comments Section -->
          <?php get_template_part( 'template-parts/part', 'comments' ); ?>


     </article>

<?php endwhile; endif; ?>
