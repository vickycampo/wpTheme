<?php
/*

@package WordPress
@subpackage wpTheme
@since wpTheme

	========================================
		PART - LINK PAGES
	========================================
* This shows the navigation options for the pages
*/
?>
<?php
$args = array(
     'before' => '<ul class="pagination">',
     'after' => '</ul>',
     'before_link' => '<li>',
     'after_link' => '</li>',
     'current_before' => '<li class="active">', //custom option
     'current_after' => '</li>',
     'previouspagelink' => '&laquo;',
     'nextpagelink' => '&raquo;'
);
if ( function_exists( 'ap_core_link_pages' ) ) {
     ap_core_link_pages( $args );
} else {
     // fall back to default wp functionality if, for some reason, ap_core_link_pages is missing
     wp_link_pages( $args );
}
?>
