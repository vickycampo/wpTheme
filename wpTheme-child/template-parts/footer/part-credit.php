<?php
/*
@package WordPress
@subpackage wpTheme
@since wpTheme
	=====================================
		TEMPLATE PART: FOOTER CREDITS
	=====================================
* Template part in charge of placing and styling the footer navigation bar.
*/
?>
<?php
//get the theme options and defaults
$ap_options = get_option( 'wpTheme_options' );
$ap_defaults = wptchild\Setup\Functions::get_theme_defaults();
?>

<!-- Add the credit part of the theme-->
<div class="credit">
     <?php
     if ( isset( $ap_options['footer'] ) && $ap_options['footer'] != '' )
     {
          echo wp_kses_post( stripcslashes( $ap_options['footer'] ) );
     }
     else
     {
          echo wp_kses_post( $ap_defaults['footer'] );
     } ?>
</div><!-- /credit -->
