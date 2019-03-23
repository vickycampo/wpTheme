<?php
/**
* @package mkt-recipe-plugin
*/
/*
     ===================================
          ADMIN PAGE - DASHBOARD PAGE
     ===================================
*
*
*/
?>
<div class="wrap">
     <h1>My Tiny Kitchen - Recipe Plugin</h1>
     <?php settings_errors (); ?>
     <form methot="post" action="options.php">
          <?php
               /* Print the settings fields */
               settings_fields ( 'mtk_options_group' ); // From the settings -> option_group
               /* Do the settings section that we did before */
               do_settings_sections ( 'mtk_recipe_plugin' ); //From the pages -> menu_slug
               /* Generate the submit button, no parameters */
               submit_button ();
          ?>
     </form>
</div>
