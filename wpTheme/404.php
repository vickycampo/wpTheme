<?php
/*

@package WordPress
@subpackage wpTheme
@since wpTheme

	===================================
		404 - PAGE NOT FOUND
	===================================
* This page contains is called when the URI is not found
*
*/
?>
<?php
get_header();
?>
  <div id="primary" class="content-area">
      <div id="content" class="site-content" role="main">

          <header class="page-header">
              <h1 class="page-title"><?php _e( 'Not Found', 'wpTheme' ); ?></h1>
          </header>

          <div class="page-wrapper">
              <div class="page-content">
                  <h2><?php _e( 'This is somewhat embarrassing, isn’t it?', 'wpTheme' ); ?></h2>
                  <p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'wpTheme' ); ?></p>

                  <?php get_search_form(); ?>
              </div><!-- .page-content -->
          </div><!-- .page-wrapper -->

      </div><!-- #content -->
  </div><!-- #primary -->
<?php
  get_sidebar();
  get_footer();
?>
