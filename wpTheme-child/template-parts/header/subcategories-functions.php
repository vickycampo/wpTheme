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
     if ( is_category() || is_single() || is_archive())
     {
          /* If is a single page we get the categories of that page */
          if ( is_single() )
          {
               $thisPostType = get_post_type();
               $this_Multiple_categories = get_the_category();

               foreach ($this_Multiple_categories as $i => $cat_details)
               {
                    /* We get the Top Category */
                    $main_category = wpChildTheme_get_topcategory ($cat_details);
                    $ID = $main_category->term_id;
                    /* We get the sub categories of the top category */
                    $sub_categories = wpChildTheme_get_subcategories ($ID);
                    /* We just keep the main category */
                    if ( $i == 0 )
                    {
                         $this_categories = $cat_details;
                    }
               }
          }
          /* If is category, we get all the sub categores */
          else if ( is_category() )
          {
               $thisPostType = '';
               /* We get the current category */
               $this_categories = get_queried_object();
               /* We get the Top Category */
               $main_category = wpChildTheme_get_topcategory ($this_categories);
               $ID = $main_category->term_id;
               $sub_categories = wpChildTheme_get_subcategories ($ID);

          }
          else if ( is_archive() )
          {
               /* We get the current category */
               /* if you're on an archive page, it will return the post type object */
               $PostTypeObject = get_queried_object();
               //var_dump ($PostTypeObject);
               /* for custom post type archives */
               /* Custom Post Type */
               if (isset ( $PostTypeObject ) && (get_class  ( $PostTypeObject ) == 'WP_Post_Type' ))
               {

                    $thisPostType = $PostTypeObject->name;
                    $taxonomies = get_object_taxonomies( $PostTypeObject->name );
                    if ( count  ($taxonomies) == 0)
                    {
                         echo (__FILE__ . ' - ' . __LINE__);
                         echo ('<h1>no taxonomies</h1>');
                    }
                    else
                    {
                         foreach ($taxonomies as $i => $taxName)
                         {
                              /* Create the variables we need to match the categories */
                              $this_categories = array
                              (
                                   'term_id' => $taxName,
                                   'name' => $taxName,
                                   'slug' => $taxName,
                                   'term_group' => '0',
                                   'term_taxonomy_id' => $taxName,
                                   'taxonomy' => $taxName,
                                   'description' => $taxName,
                                   'parent' => '0',
                                   'count' => '0',
                                   'filter' => 'raw',
                                   'cat_ID' => $taxName,
                                   'category_count' => '12',
                                   'category_description' => $taxName,
                                   'cat_name' => $taxName,
                                   'category_nicename' => $taxName,
                                   'category_parent' => '0'
                              );
                              $main_category = $taxName;
                              /* We don't use the regular ones */
                              if (( $taxName != 'category' ) && ( $taxName != 'post_tag' ))
                              {
                                   /* get the terms */
                                   $sub_categories = wpChildTheme_get_subcategories ($taxName);

                              }
                         }
                    }

               }
               /* Regular archive - no category in common */
               else  if (get_class  ( $PostTypeObject ) != 'WP_Post_Type' )
               {
                    error_log (__FILE__ . ' - ' . __LINE__ .' - Unknown Object');
                    error_log ( get_class  ( $PostTypeObject ) );
                    error_log (print_r ($taxonomies , true));
                    error_log ('-----------------------------------');
               }
               else {
                    error_log (__FILE__ . ' - ' . __LINE__ .' - Unknown Object');
               }

          }
          /* We prepare the values to send back */
          if ( isset ( $this_categories ))
          {


               $return_values['thisPostType'] = $thisPostType;
               $return_values['this_categories'] = $this_categories;
               $return_values['main_category'] = $main_category;
               /* Once we have the sub_Categories, we prepare the buttons for the menu */
               $subcategories_buttons = wpChildTheme_subcat_buttons ( $sub_categories );
               $return_values['buttons'] = $subcategories_buttons;

               // echo ('<pre>');
               // print_r ($return_values);
               // echo ('-------------------------<br>');
               // echo ('</pre>');
          }
          else
          {
               $return_values = [];
          }


          return ( $return_values );
     }
}
/**** Get the Taxonomy Terms ****/
function wpChildTheme_get_taxTerms ($taxName)
{


}
/*** GET ALL THE SUB-CATEGORIES ***/
function wpChildTheme_get_subcategories ( $ID )
{
     if (gettype ( $ID ) === 'string')
     {
          $categories = get_terms (
               array (
                   'taxonomy' => $ID,
                   'hide_empty' => false,
               )
          );
     }
     else if (gettype ( $ID ) === 'integer')
     {
          $args = array('child_of' => $ID );
          $categories = get_categories( $args );
     }

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
                    $ThisElementId = "'".$main_id.'-'.$parent_id."'";
                    $return_string .= '<div class="btn-group" id='. $ThisElementId .'>';
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
                                        $ThisElementId = "'".$main_id.'-'.$parent_id.'-'.$child_id."'";
                                        $return_string .= '<span ';
                                        $return_string .= 'id='. $ThisElementId .' ';
                                        $return_string .= 'class="dropdown-item" ';
                                        // $return_string .= 'onclick="ChanceCategory('. $ThisElementId .')" ';
                                        // $return_string .= 'href="' . get_category_link( $child_id ) . '">';
                                        $return_string .= '>';
                                        $return_string .= $child_cat->name;
                                        $return_string .= '</span> ';
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
                                                  $ThisElementId = "'".$main_id.'-'.$parent_id.'-'.$child_id."'";
                                                  $return_string .= '<div class="dropdown-divider"></div> ';
                                                  $return_string .= '<span ';
                                                  $return_string .= 'id='. $ThisElementId .' ';
                                                  $return_string .= 'class="dropdown-item dropdown-has-subitem" ';
                                                  // $return_string .= 'onclick="ChanceCategory('.$ThisElementId.')" ';
                                                  // $return_string .= 'href="' . get_category_link( $child_id ) . '">';
                                                  $return_string .= '>';
                                                  $return_string .= $grandkid->name ;
                                                  $return_string .= '</span> ';

                                             }
                                             else
                                             {
                                                  $ThisElementId = "'".$main_id.'-'.$parent_id.'-'.$child_id.'-'.$grandkid_id."'";
                                                  $return_string .= '<span ';
                                                  $return_string .= 'id='. $ThisElementId .' ';
                                                  $return_string .= 'class="dropdown-item  dropdown-subitem"  ';
                                                  // $return_string .= 'onclick="ChanceCategory('."'".$main_id.'-'.$parent_id.'-'.$child_id.'-'.$grandkid_id."'".')" ';
                                                  // $return_string .= 'href="' . get_category_link( $grandkid_id ) . '">';
                                                  $return_string .= '>';
                                                  $return_string .= $grandkid->name;
                                                  $return_string .= '</span> ';
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
