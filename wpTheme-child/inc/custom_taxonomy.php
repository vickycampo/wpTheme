<?php
/*

@package WordPress
@subpackage wpChildTheme  Child Them
@since wpTheme

     ===================================
          CUSTOM TAXONOMY
     ===================================
* Register the custom Taxonomy needed for the recipes
* Probabley will be transfered to the plug in in the future
*/
?>
<?php
/*
     =====================
          RECIPE TAXONOMY
     =====================
*/
if ( ! ( function_exists ( 'wpChildTheme_recipe_taxonomy' ) ) )
{
     function wpChildTheme_recipe_taxonomy ()
     {
          /*** MTK categories ***/

          /* Name should only contain lowercase letters and the underscore character, and not be more than 32 characters long */
          $taxonomy = 'mtk_bycountryoforigin';
          /* Name of the object type for the taxonomy object. */
          //$object_type = 'mtk_recipe_cpt';
          $object_type = 'mtk_recipe_cpt';
          /* An array of Arguments.  */
          $args = array (
               'label' => __( 'By Country of origin' , 'wpTheme'),
               'rewrite' => array ( 'slug' => 'mtk_bycountryoforigin' ),
               'hierarchical'      => true
          );
          register_taxonomy( $taxonomy, $object_type, $args );



     }
     add_action ( 'init' , 'wpChildTheme_recipe_taxonomy' );
}
?>
