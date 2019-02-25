<?php
/*

@package WordPress
@subpackage wpTheme
@since wpTheme

	===================================
		FILTERS
	===================================
* This file contain filters to customize
*
*/
?>
<?php
/*
     ===================================
          CAPTION SHORTCODE FILTER
     ===================================
*/
     /* Remove the width from the caption short code */
     add_filter( 'img_caption_shortcode_width', '__return_false' );
?>
