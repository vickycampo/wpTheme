<?php
/*

@package WordPress
@subpackage wpTheme
@since wpTheme

	===================================
		TAXONOMY TEMPLATE
	===================================
* This page is to display the archives of posts
*
*/
?>
<?php
  get_header();
  ?>
  <p>
    This is some text that will display at the top of the Category page.
  </p>
  <?php if (is_category('Category A')) : ?>
      <p>This is the text to describe category A</p>
  <?php elseif (is_category('Category B')) : ?>
      <p>This is the text to describe category B</p>
  <?php else : ?>
      <p>This is some generic text to describe all other category pages,
  I could be left blank</p>
  <?php endif; ?>
  <?php
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
