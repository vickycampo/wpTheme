<?php
/*

@package WordPress
@subpackage wpTheme
@since wpTheme

	========================================
		PART - AUTHOR
	========================================
* This section displays the posts for an author
*/
?>
<!-- The Loop -->
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
     <!-- The Article Tag -->
	<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

		<?php
          /* Get the title part */
          get_template_part( 'template-parts/part', 'title' );
          ?>

		<?php
          /* Add the hook */
          tha_entry_before(); ?>
          <!-- The Section Tag -->
		<section class="entry media">

			<?php
               /* Add the hook */
               tha_entry_top(); ?>

			<?php
               /* If the post has no excerpts, we display the content */
			if ( wpTheme_blog_excerpts() == false )
               {
				the_content(__('Read more &raquo;','wpTheme'));
			}
               else
               {
                    /* We Display the thumnail */
				if(has_post_thumbnail())
                    { ?>
					<div class="pull-left">
                              <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">
                                   <?php the_post_thumbnail( 'thumbnail', array( 'class' => 'img-thumbnail media-object' ) ); ?>
                              </a>
                         </div>
				<?php
                    }
                    ?>
                    <!-- Display the Excerpt -->
				<div class="media-body">
					<?php the_excerpt(); ?>
				</div>
			<?php } ?>
               <!-- Display the Icon and postmetadata-->
			<div class="icon icon-user pull-left" title="<?php esc_attr_e( 'Author', 'wpTheme' ); ?>">
               </div><?php get_template_part( 'template-parts/part', 'postmetadata' ); ?>

			<?php
               /* Add the hook */
               tha_entry_bottom();
               ?>
		</section>
	</article>
	<?php
     /* Add the hook */
     tha_entry_after();
     ?>

	<?php
	endwhile;
     /* display the navigation */
	get_template_part( 'template-parts/part', 'navigation' );
endif; ?>
