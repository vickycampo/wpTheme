<?php
/*

@package WordPress
@subpackage wpTheme
@since wpTheme

===================================
FOOTER
===================================
* This page generating the footer.
*
*/
?>

<?php
//get the theme options and defaults
$ap_options = get_option( 'ap_core_theme_options' );
$ap_defaults = ap_core_get_theme_defaults();
?>

</div> <!-- /wrap div-->

<?php tha_footer_before(); ?>
<footer class="row">
     <?php tha_footer_top(); ?>
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
     ?>
     <!-- CREATE THE ELEMENT IF THE SIDE BAR IS ACTIVE -->
     <?php

     foreach ($footer_sidebar as $id => $name)
     {

          if ( is_active_sidebar( $id ) )
          { ?>
               <div class="<?php echo ($cols_class);?>" id="<?php echo ( $id );?>">
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
     }?>
     <div class="spacer-10"></div><!-- /spacer div-->
     <!-- Add the footer navigation menu-->

     <?php
     echo ('missing widgets / sidebars part');
     //Top Navitagion bar part
     get_template_part( '\template-parts\footer\part', 'navbar-footer' )
     echo ('missing credit part');

     ?>
     <!-- Add the credit part of the theme-->
     <div class="credit">
          <?php
          if ( isset( $ap_options['footer'] ) && $ap_options['footer'] != '' )
          {
               echo wp_kses_post( stripcslashes( $ap_options['footer'] ) );
          }
          else
          {
               echo wp_kses_post( $ap_defaults['footer'] );
          } ?>
     </div><!-- /credit -->
     <?php tha_footer_bottom(); ?>
</footer>
<?php tha_footer_after(); ?>
<?php tha_body_bottom(); ?>
<?php wp_footer(); ?>
</body>
</html>
