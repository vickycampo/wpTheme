<?php
/*

@package WordPress
@subpackage wpTheme
@since wpTheme

	========================================
		CONTENT - PAGE
	========================================
* This shows the content of page.php
*/
?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

     <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

          <time datetime=<?php the_time('Y-m-d'); ?>></time>
          <h1 class="the_title"><?php the_title(); ?></h1>

          <?php wptheme\Custom\Hooks::tha_entry_before(); ?>
          <?php get_template_part( 'template-parts/part', 'section' ); ?>
          <?php wptheme\Custom\Hooks::tha_entry_after(); ?>

          <?php get_template_part('template-parts/part', 'postmetadata' ); ?>
          <!-- Comments Section -->
          <?php get_template_part( 'template-parts/part', 'comments' ); ?>
          

     </article>

<?php endwhile; endif; ?>
