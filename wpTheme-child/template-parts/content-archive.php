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

<div id="ajax-posts" class="row">
<?php
//check if we have any posts to display
if ( have_posts() ) : ?>

     <?php
     //set the listing the_title
     //use the part-list-title.php
     get_template_part( 'template-parts/part', 'list-title' );
     ?>
     <?php
     //The Loop
     while ( have_posts() ) : the_post();
          ?>
               <div class="col-8 offset-2 border">
                    <h1><?php the_title(); ?></h1>
                    <?php the_content(); ?>
               </div>
          <?php
     endwhile;
     get_template_part( 'template-part', 'navigation' );
endif; ?>
</div>
<div id="ajax-posts" class="row">
     <div class="container text-center load-more-span-div">
          <a class="btn btn-lg btn-default load-more-span-a" data-page="1" data-url="<?php echo admin_url('admin-ajax.php'); ?>">
               <span class="load-more-span"></span> Load More
          </a>
     </div>
</div>
