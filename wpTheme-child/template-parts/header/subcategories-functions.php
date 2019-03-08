<?php
/*
@package WordPress
@subpackage wpChildTheme
@since wpChildTheme
	================================================
		TEMPLATE PART: SUBCATEGORY FUNCTIONS
	================================================
* The functions necesaries to generate the subcatgegory menu
*/
?>
<?php
/*** Get the values for the main menu ***/
function wpChildTheme_get_catValues ()
{
     /* We add the category menu if is a category or a single page */
     if ( is_category() || is_single() )
     {
          /* If is a single page we get the categories of that page */
          if ( is_single() )
          {
               $this_categories = get_the_category();
               foreach ($this_categories as $i => $cat_details)
               {
                    /* We get the Top Category */
                    $main_category = wpChildTheme_get_topcategory ($cat_details);
                    $ID = $main_category->term_id;
                    /* We get the sub categories of the top category */
                    $sub_categories = wpChildTheme_get_subcategories ($ID);
               }

          }
          /* If is category, we get all the sub categores */
          if ( is_category() )
          {
               /* We get the current category */
               $this_categories = get_queried_object();
               /* We get the Top Category */
               $main_category = wpChildTheme_get_topcategory ($this_categories);
               $ID = $main_category->term_id;
               $sub_categories = wpChildTheme_get_subcategories ($ID);
          }
          /* We prepare the values to send back */
          $return_values['this_categories'] = $this_categories;
          $return_values['main_category'] = $main_category;
          /* Once we have the sub_Categories, we prepare the buttons for the menu */
          $subcategories_buttons = wpChildTheme_subcat_buttons ( $sub_categories );
          $return_values['buttons'] = $subcategories_buttons;

          return ( $return_values );
     }
}
/*** GET ALL THE SUB-CATEGORIES ***/
function wpChildTheme_get_subcategories ( $ID )
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
     if ( isset ( $mainArray ) )
     {
          return ( $mainArray );
     }
     else
     {
          return ( '' );
     }



     // echo ('<pre>');
     // print_r ($mainArray);
     // echo ('</pre>');

}
?>
<?php
/*** GET THE TOP LEVEL CATEGORY ***/
function wpChildTheme_get_topcategory ($cat_details)
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
<?php
/*** Get the subcat buttons ***/
function wpChildTheme_subcat_buttons ( $sub_categories )
{
     if ($sub_categories != "")
     {
          /* We set the previous and post button text */
          $return_string = '';

          foreach ($sub_categories as $main_id => $grandparent_cat)
          {
               foreach ($grandparent_cat as $parent_id => $parent_cat)
               {

                    $return_string .= '<div class="btn-group">';
                         $return_string .= '<button type="button" ';
                         $return_string .= 'class="btn dropdown-toggle sub-cat-button" ';
                         $return_string .= 'data-toggle="dropdown" ';
                         $return_string .= 'aria-haspopup="true" ';
                         $return_string .= 'aria-expanded="false"><span> ';
                         $return_string .= $parent_cat[0]->name;
                         $return_string .= '</span></button> ';
                         $return_string .= '<div class="dropdown-menu sub-cat-menu"> ';
                         foreach ($parent_cat as $child_id => $child_cat)
                         {


                              if ($child_id != 0)
                              {
                                   if ( isset ( $child_cat->term_id ) )
                                   {

                                        $return_string .= '<a ';
                                        $return_string .= 'class="dropdown-item" ';
                                        $return_string .= 'onclick="ChanceCategory('."'".$main_id.'-'.$parent_id.'-'.$child_id."'".')" ';
                                        // $return_string .= 'href="' . get_category_link( $child_id ) . '">';
                                        $return_string .= 'href="#">';
                                        $return_string .= $child_cat->name;
                                        $return_string .= '</a> ';
                                        // $return_string .= '<a class="dropdown-item" href="#">Separated link</a> ';
                                   }
                                   else
                                   {
                                        // echo ('<pre>');
                                        // print_r ($child_cat);
                                        // echo ('</pre>');
                                        foreach ($child_cat as $grandkid_id => $grandkid)
                                        {
                                             if ($grandkid_id == 0)
                                             {
                                                  $return_string .= '<a ';
                                                  $return_string .= 'id="child_id-'.$child_id.'" ';
                                                  $return_string .= 'class="dropdown-item" ';
                                                  $return_string .= 'onclick="ChanceCategory('."'".$main_id.'-'.$parent_id.'-'.$child_id.'-'.$grandkid_id."'".')" ';
                                                  // $return_string .= 'href="' . get_category_link( $child_id ) . '">';
                                                  $return_string .= 'href="#">';
                                                  $return_string .= $grandkid->name ;
                                                  $return_string .= '</a> ';
                                                  $return_string .= '<div class="dropdown-divider"></div> ';
                                             }
                                             else
                                             {
                                                  $return_string .= '<a  ';
                                                  $return_string .= 'class="dropdown-item"  ';
                                                  $return_string .= 'onclick="ChanceCategory('."'".$main_id.'-'.$parent_id.'-'.$child_id.'-'.$grandkid_id."'".')" ';
                                                  // $return_string .= 'href="' . get_category_link( $grandkid_id ) . '">';
                                                  $return_string .= 'href="#">';
                                                  $return_string .= $grandkid->name;
                                                  $return_string .= '</a> ';
                                             }

                                        }
                                        /* has another level of categories */
                                   }

                              }

                         }
                         $return_string .= '</div><!-- dropdown-menu -->';
                    $return_string .= '</div> <!-- btn-group -->';
               }
          }
          /* We do the first levet of sub-categories */

          return ($return_string);
     }
     else
     {
          /* We return nothing because they are not categories to generate the buttons for */
          return ("");
     }
}
?>
