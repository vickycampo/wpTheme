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

if (is_category() || is_archive() || is_single ())
{

     wp_reset_query();
     include('subcategories-functions.php' );
     //firstly, load data for your child category
     $categories_values = wpChildTheme_get_catValues ();
     // var_dump ($categories_values);
     // var_dump ($categories_values);
     if ( ! empty ($categories_values) )
     {
          $thisPostType = $categories_values ['thisPostType'];
          $buttons = $categories_values ['buttons'];
          $this_categories = $categories_values ['this_categories'];
     }
     else
     {
          $buttons = '';
          $this_categories = '';
     }


     if ($buttons != '')
     {
          /* we prepare the values we want to sent to the javascript */
          if (is_array ($this_categories)) /* Is not a category, is a taxonomy */
          {
               $taxName = $this_categories['term_id'];
               $term_id = '';
          }
          else if (gettype ( $this_categories )  == 'object') /* Category object */
          {
               $taxName = '';
               $term_id = $this_categories->term_id;
          }
          ?>
          <script>
               var main_category = "<?php echo ( $term_id );?>"
               var taxonomyName = "<?php echo ( $taxName );?>"
               var thisPostType = "<?php echo ( $thisPostType );?>"
               var admin_url  = "<?php echo admin_url('admin-ajax.php'); ?>";
          </script>
          <div class="sub-cat-main-div">
               <div class="sub-cat-div" id="sub-cat-div">

                    <?php echo ( $buttons ); ?>
               </div> <!-- sub-cat-div -->
               <div id="sub-cat-filters" class="sub-cat-filters">
               </div> <!-- sub-cat-filters -->
          </div> <!-- sub-cat-main-div -->
          <?php
     }
}
else
{
     /* No Subcategory bar */

}
?>
