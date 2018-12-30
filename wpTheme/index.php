<?php
/*

@package WordPress
@subpackage wpTheme
@since wpTheme

	=========================
		INDEX
	=========================
* The main template file. It is required in all themes.
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
