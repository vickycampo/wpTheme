<?php
/*
@package WordPress
@subpackage wpChildTheme
@since wpTheme
	================================================
		TEMPLATE PART: CHILD MAIN NAVIGATION BAR
	================================================
* Template part in charge of placing and styling the main navigation bar.
*/
?>
<?php
wp_reset_query();
include('subcategories-functions.php' );
//firstly, load data for your child category
$categories_values = wpChildTheme_get_catValues ();
$buttons = $categories_values ['buttons'];
$this_categories = $categories_values ['this_categories'];
if ($buttons != '')
{
     ?>
     <div class="sub-cat-div">
          <?php echo ( $buttons ); ?>
     </div>
     <?php
}?>
