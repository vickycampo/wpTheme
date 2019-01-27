<?php
/*

@package WordPress
@subpackage wpTheme
@since wpTheme

	=========================
		PAGE
	=========================
* The page template is used when visitors request individual pages,
* which are a built-in template.
*/
?>
<div>page.php</div>
<?php
     global $wp_query;
     echo ('<pre>');
     print_r ($wp_query);
     echo ('</pre>');
?>
