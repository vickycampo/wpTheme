<?php
/*

@package WordPress
@subpackage wpTheme
@since wpTheme

	========================================
		CONTENT - SEARCH
	========================================
* This shows the search results on the search.php page
*/
?>
<?php
//The search query
global $wp_query;
//The number of results
$total_results = $wp_query->found_posts;
?>
<!-- Display the number of results text -->
<h1 class="searchresults the_title">
     <?php echo wp_kses_post( sprintf( __( 'We found %1$s results for <q>%2$s</q>', 'wpTheme' ), $total_results, get_search_query() ) ); ?>
</h1>
<!-- If the result was not found, display the search form -->
<section class="searchform">
	<h3 class="alt"><?php _e( 'Not what you were looking for?  Enter your search terms to try again.', 'wpTheme' ); ?></h3>
	<?php
     //Get the Search Form
     get_search_form();
     ?>
</section>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<!-- An article tag for each element found -->
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
     <!-- Get the Template part for the title -->
	<?php get_template_part( 'template-parts/part', 'title' ); ?>

	<?php
     //Add Hook
     tha_entry_before();
     ?>
	<section class="entry media">
		<?php
          //Add Hook
          tha_entry_top();
          ?>

		<?php
          //Display the thumbnail
          if( has_post_thumbnail() )
          { ?>
			<div class="pull-left">
                    <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">
                         <?php the_post_thumbnail( 'thumbnail', array( 'class' => 'img-thumbnail media-object' ) ); ?>
                    </a>
               </div>
		<?php
          }
          ?>

		<div class="media-body">
			<?php the_excerpt(); ?>
		</div>

		<?php tha_entry_bottom(); ?>
	</section>
	<?php tha_entry_after(); ?>

	<div class="icon icon-search pull-left" title="<?php esc_attr_e( 'Search', 'wpTheme' ); ?>">
     </div>
     <?php get_template_part( 'template-parts/part', 'postmetadata' ); ?>

</article>

<?php endwhile; ?>
<?php get_template_part( 'template-parts/part', 'navigation' ); ?>
<?php endif; ?>
