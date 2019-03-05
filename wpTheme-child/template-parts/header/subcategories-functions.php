<?php
/*
@package WordPress
@subpackage wpTheme
@since wpTheme
	================================================
		TEMPLATE PART: SUBCATEGORY FUNCTIONS
	================================================
* The functions necesaries to generate the subcatgegory menu
*/
?>
<?php
/*** Get the values for the main menu ***/
function wpTheme_get_catValues ()
{
     if ( is_category() || is_single() )
     {

          if ( is_single() )
          {
               $this_categories = get_the_category();
               foreach ($this_categories as $i => $cat_details)
               {
                    /* We get the Top Category */
                    $main_category = wpTheme_get_topcategory ($cat_details);
                    $ID = $main_category->term_id;
                    /* We get the sub categories of the top category */
                    $sub_categories = wpTheme_get_subcategories ($ID);
               }

          }
          if ( is_category() )
          {
               $this_categories = get_queried_object();
               /* We get the Top Category */
               $main_category = wpTheme_get_topcategory ($this_categories);
               $ID = $main_category->term_id;
               $sub_categories = wpTheme_get_subcategories ($ID);
          }

          $return_values['this_categories'] = $this_categories;
          $return_values['main_category'] = $main_category;
          $return_values['sub_categories'] = $sub_categories;
          return ( $return_values );
     }
}
/*** GET ALL THE SUB-CATEGORIES ***/
function wpTheme_get_subcategories ( $ID )
{

     $args = array('child_of' => $ID );
     $categories = get_categories( $args );


     /* Order the subcategories */
     foreach ( $categories as $i => $single_sub )
     {
          $allkids[ $single_sub->term_id ] =  $single_sub->parent;
          /* Check if the pareng is the same as the id */
          if ( $ID == $single_sub->parent )
          {
               $mainArray[$ID][$single_sub->term_id][0] =  $single_sub;
          }
          else /* We create an array with all the sub categories */
          {
               $subArray[$single_sub->parent][$single_sub->term_id] =  $single_sub;
          }
     }
     /* We add to the main array all the categories that were not included in the main array */
     if (isset ($subArray))
     {
          foreach ( $subArray as $parent => $single_cat )
          {
               foreach ( $single_cat as $term_id => $single_sub )
               {
                    if ( isset ( $mainArray[$ID][$parent] ) )
                    {
                         $mainArray[$ID][$parent][$term_id] = $single_sub;
                    }
                    else
                    {

                         /* Get the grandparent category */
                         if ( isset ( $allkids[$parent] ) )
                         {
                              $grandparent = $allkids[$parent];
                              if ( isset ( $mainArray[$ID][$grandparent][$parent] ) )
                              {
                                   /* change to an array */
                                   if ( ! ( is_array ( $mainArray[$ID][$grandparent][$parent] ) ) )
                                   {

                                        $parentName = $mainArray[$ID][$grandparent][$parent];
                                        unset ( $mainArray[$ID][$grandparent][$parent]);
                                        $mainArray[$ID][$grandparent][$parent][0] = $parentName;
                                   }

                                   $mainArray[$ID][$grandparent][$parent][$term_id] = $single_sub;

                              }
                              else
                              {

                              }
                         }
                    }
               }
          }
     }
     return ( $mainArray );


     // echo ('<pre>');
     // print_r ($mainArray);
     // echo ('</pre>');

}
?>
<?php
/*** GET THE TOP LEVEL CATEGORY ***/
function wpTheme_get_topcategory ($cat_details)
{

     while ($cat_details -> parent != 0)
     {
          // echo ('<pre>');
          // print_r ($cat_details);
          // echo ('</pre>');
          $cat_details = get_term( $cat_details -> parent );

     }
     return ($cat_details);
}
?>
