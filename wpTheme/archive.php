<?php
/*

@package WordPress
@subpackage wpTheme
@since wpTheme

	===================================
		ARCHIVE
	===================================
* This page is to display the archives of posts
*
*/
?>
<?php
     get_header();
     if ( have_posts() ) :
      while ( have_posts() ) :
        the_post();
        the_content();
      endwhile;
     else :
        _e( 'Sorry, no posts matched your criteria.', 'textdomain' );
     endif;
     get_sidebar();
     get_footer();
?>
