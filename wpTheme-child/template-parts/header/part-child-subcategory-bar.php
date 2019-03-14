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
/* We only show the subcategory bar in the category page */
if (is_category())
{
     wp_reset_query();
     include('subcategories-functions.php' );
     //firstly, load data for your child category
     $categories_values = wpChildTheme_get_catValues ();
     $buttons = $categories_values ['buttons'];
     $this_categories = $categories_values ['this_categories'];

     if ($buttons != '')
     {
          /* we prepare the values we want to sent to the javascript */
          // echo ('<pre>');
          // var_dump ($this_categories);
          // echo ('</pre>');
          ?>
          <script>
               var main_category = "<?php echo ($this_categories->term_id);?>"
               var admin_url  = "<?php echo admin_url('admin-ajax.php'); ?>";
          </script>
          <div class="sub-cat-div" id="sub-cat-div">

               <?php echo ( $buttons ); ?>
          </div>
          <div id="sub-cat-filters" class="sub-cat-filters">
          </div>
          <?php
     }
}
else
{
     /* No Subcategory bar */

}
?>
