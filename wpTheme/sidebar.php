<?php
/*

@package WordPress
@subpackage wpTheme
@since wpTheme

	=========================
		SIDE-BAR
	=========================
* Part that generates the side bar.
*/
?>
<?php
echo ('-----------------------top of the sidebar------------------------------<br>');
echo ('sidebar_1 - ' . is_active_sidebar( 'sidebar_1' ) . '<br>');
echo ('sidebar_2 - ' . is_active_sidebar( 'sidebar_2' ) . '<br>');
?>
<div id="sidebar-primary" class="sidebar">
    <?php if ( is_active_sidebar( 'sidebar_1' ) ) : ?>
        <?php dynamic_sidebar( 'sidebar_1' ); ?>
    <?php else : ?>
      <aside id="search" class="widget widget_search">
         <?php get_search_form(); ?>
      </aside>
      <aside id="archives" class"widget">
          <h1 class="widget-title"><?php _e( 'Archives', 'shape' ); ?></h1>
          <ul>
              <?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
          </ul>
      </aside>
      <aside id="meta" class="widget">
          <h1 class="widget-title"><?php _e( 'Meta', 'shape' ); ?></h1>
          <ul>
              <?php wp_register(); ?>
              <li><?php wp_loginout(); ?></li>
              <?php wp_meta(); ?>
          </ul>
      </aside>
    <?php endif; ?>
</div>
<?php echo ('-----------------------bottom of the sidebar------------------------------<br>'); ?>
