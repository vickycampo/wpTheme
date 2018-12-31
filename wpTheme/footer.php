<?php
/*

@package WordPress
@subpackage wpTheme
@since wpTheme

	===================================
		FOOTER
	===================================
* This page generating the footer.
*
*/
?>

  </div><!-- .site-content -->
    <footer id="colophon" class="site-footer" role="contentinfo">
      <div class="site-info">
        <?php /** * Fires before the Twenty Fifteen footer text for footer customization. * * @since Twenty Fifteen 1.0 */ do_action( 'twentyfifteen_credits' ); ?>
        <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'twentyfifteen' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'twentyfifteen' ), 'WordPress' ); ?></a>
      </div><!-- .site-info -->
    </footer><!-- .site-footer -->
  </div><!-- .site -->
  <?php
  wp_nav_menu( 'footer_menu' ); ?>
  <?php wp_footer(); ?>
</body>
</html>
