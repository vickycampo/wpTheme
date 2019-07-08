<?php
/*

@package WordPress
@subpackage wpTheme
@since wpTheme

	========================================
		CONTENT - ARCHIVE
	========================================
* This shows the content of archive.php
*/
?>

<?php
//check if we have any posts to display
if ( have_posts() ) : ?>
     <div id="ajax-posts" class="row read-more-results">
     <?php
     //set the listing the_title
     //use the part-list-title.php
     get_template_part( 'template-parts/part', 'list-title' );
     ?>
     <?php
     //The Loop
     while ( have_posts() ) : the_post();
          $wpTheme_post_format = get_post_format();
          //We check if there is a format
          if ( $wpTheme_post_format )
          {
               get_template_part('template-parts/post', $wpTheme_post_format);
          }
          //there is no format, we do a standard layout
          else
          { ?>

               <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
                    <?php get_template_part( 'template-parts/post', 'title' ); ?>
                    <?php wptheme\Custom\Hooks::tha_entry_before(); ?>
                    <?php get_template_part( 'template-parts/part', 'media-section' ); ?>
                    <?php wptheme\Custom\Hooks::tha_entry_after(); ?>

                    <div class="icon icon-archive pull-left" title="<?php esc_attr_e( 'Archive', 'wpTheme' ); ?>">
                    </div>
                    <?php get_template_part( 'template-parts', 'postmetadata' ); ?>
               </article>
               <div class="spacer-10"></div>
          <?php }
     endwhile;
     ?>
     </div> <!-- ajax-posts -->
     <?php
     get_template_part('template-parts/part', 'navigation' );

endif; ?>
