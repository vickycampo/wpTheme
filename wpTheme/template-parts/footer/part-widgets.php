<?php
/*
@package WordPress
@subpackage wpTheme
@since wpTheme
	============================================
		TEMPLATE PART: FOOTER WIDGETS
	============================================
* Template part in charge of placing and styling the footer navigation bar.
*/
?>
<?php
     //The first specific theme helper, load the theme options and defaults
     $defaults = wpTheme_get_theme_defaults ();
     //Fetch options from the database table
     $options = get_option ('wpTheme_options');
     /* We determine which screen size we are using*/
     if ( isset ( $options['bs-screen-size'] ) )
     {
          $screen_size = $options['bs-screen-size'];
     }
     else
     {
          $screen_size = $defaults['bs-screen-size'];
     }
?>
<?php
     //ARRAY OF ALL POSSIBLE COMBINATIONS OF SIDEBARD FOR THE FOOTER
     $id = 'footer-left-box';
     $footer_sidebar[$id] = 'Footer - Left side box';
     $id = 'footer-middle-box';
     $footer_sidebar[$id] = 'Footer - Center box';
     $id = 'footer-right-box';
     $footer_sidebar[$id] = 'Footer - Right side box';
     //we cound how many elements we are using
     $num_sidebars = count ($footer_sidebar);
     //we calculate how many cols we need per element
     $cols = floor ( 12 / $num_sidebars );
     $cols_class = "col" . $screen_size . $cols;

     foreach ($footer_sidebar as $id => $name)
     {

          if ( is_active_sidebar( $id ) )
          { ?>
               <div class="<?php echo ($cols_class);?> <?php echo ($id);?>" id="<?php echo ( $id );?>">
                    <ul>
                         <?php dynamic_sidebar( $id ); ?>
                    </ul>
               </div><!-- /<?php echo ( $id );?>-->
          <?php }
          else
          { ?>
               <div class="<?php echo ($cols_class);?>" id="<?php echo ( $id );?>">
               </div><!-- /<?php echo ( $id );?>-->
          <?php }
     }

?>
