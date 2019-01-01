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
      ?>
      <!-- Add the pagination functions here. -->
      <div class="nav-previous alignleft"><?php next_posts_link( 'Older posts' ); ?></div>
      <div class="nav-next alignright"><?php previous_posts_link( 'Newer posts' ); ?></div>
 
      <?php
     else :
        _e( 'Sorry, no posts matched your criteria.', 'textdomain' );
     endif;
     get_sidebar(  );
     get_footer();
?>
