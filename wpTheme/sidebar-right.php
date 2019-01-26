<?php
/*

@package WordPress
@subpackage wpTheme
@since wpTheme

	=========================
		RIGHT SIDE-BAR
	=========================
* Part that generates the side bar.
*/
?>

<?php tha_sidebars_before();
if ( is_active_sidebar( 'body-right-sidebar' ) )
{
?>
     <div class="sidebar body-right-sidebar col-sm-3 order-1">
      	<?php tha_sidebar_top(); ?>
          <?php

           ?>
               <ul id="sidebar">
                    <?php dynamic_sidebar( 'body-right-sidebar' ); ?>
               </ul>


          <?php tha_sidebar_bottom(); ?>
     </div>
<?php
}
?>
<?php tha_sidebars_after(); ?>
