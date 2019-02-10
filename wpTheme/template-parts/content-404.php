<?php
/*

@package WordPress
@subpackage wpTheme
@since wpTheme

	========================================
		CONTENT - 404
	========================================
* This shows 404 result page
*/
?>

<article class="post">

     <h2 class="the_title">
          <?php _e('Whoops! I couldn\'t find the page you were looking for.','wpTheme'); ?>
          <span frown>:(</span>
     </h2>

     <!-- Add a search bar -->
     <p><?php _e('Try a search or one of the links below.','wpTheme'); ?></p>
     <p><?php get_search_form(); ?>

     <div class="spacer-10"></div>
     <div class = "row">
          <!-- Add Montly Archives  -->
          <nav class="col-md-6" id="month">
               <h2><?php _e('Archives by Month','wpTheme'); ?></h2>
               <ul>
                    <?php wp_get_archives('type=monthly'); ?>
               </ul>
          </nav>
          <!-- Add Subject Archives  -->
          <nav class="col-md-6" id="categories">
               <h2><?php _e('Archives by Subject','wpTheme'); ?></h2>
               <ul>
                     <?php wp_list_categories( 'title_li=' ); ?>
               </ul>
          </nav>
     </div

</article>
