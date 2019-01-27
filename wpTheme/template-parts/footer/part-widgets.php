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
     $cols_class = "col-sm-" . $cols;

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
