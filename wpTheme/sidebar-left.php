<?php
/*

@package WordPress
@subpackage wpTheme
@since wpTheme

	=========================
		LEFT SIDE-BAR
	=========================
* Part that generates the side bar.
*/
?>

<?php tha_sidebars_before();
if ( is_active_sidebar( 'body-left-sidebar' ) )
{
?>
     <div class="sidebar body-left-sidebar col-sm-3 order-1">
      	<?php tha_sidebar_top(); ?>
          <?php

           ?>
               <ul id="sidebar">
                    <?php dynamic_sidebar( 'body-left-sidebar' ); ?>
               </ul>


          <?php tha_sidebar_bottom(); ?>
     </div>
<?php
}
?>
<?php tha_sidebars_after(); ?>
