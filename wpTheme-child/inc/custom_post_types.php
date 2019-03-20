<?php
/*

@package WordPress
@subpackage wpChildTheme  Child Them
@since wpTheme

     ===================================
          CUSTOM POST TYPES
     ===================================
* Contains the funcitons that will be needed for the ajax
*
*/
?>
<?php
/*
     =====================
          BOOK TYPE
     =====================
*/
if ( ! ( function_exists ( 'wpChildTheme_books' ) ) )
{
     function wpChildTheme_books ()
     {
     }
}
?>
<?php
/*
     =====================
          RECIPE TYPE
     =====================
*/
if ( ! ( function_exists ( 'wpChildTheme_recipes' ) ) )
{
     function wpChildTheme_recipes ()
     {
          // $CPT_name = 'mtk_recipe_cpt';
          // $CPT_settings['public'] = true;
          // $CPT_settings['label'] = 'Recipes';
          // register_post_type ( $CPT_name , $CPT_settings );
     }
     // add_action ( 'init' , 'wpChildTheme_recipes' );
}
?>
