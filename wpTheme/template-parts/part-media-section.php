<?php
/*

@package WordPress
@subpackage wpTheme
@since wpTheme

	========================================
		PART - MEDIA SECTION
	========================================
* This shows thumbnail and exceprt of a post in the archives
*/
?>
<section class="entry media">
     <?php tha_entry_top(); ?>
     <?php
     if ( ap_core_archive_excerpts() == false )
     {
          the_content(__('Read more &raquo;','wpTheme'));
     }
     else
     {
          if ( has_post_thumbnail() )
          {
               ?>
               <div class="pull-left">
                    <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">
                         <?php the_post_thumbnail( 'thumbnail', array( 'class' => 'img-thumbnail media-object' ) ); ?>
                    </a>
               </div>

               <?php
          } ?>
          <div class="media-body">
               <?php the_excerpt(); ?>
          </div>

          <?php
     } ?>
     <?php tha_entry_bottom(); ?>
</section>
