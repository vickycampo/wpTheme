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

</div> <!-- Close the row div that was opened in the header -->

<?php tha_footer_before(); ?>
<footer class="row">
     <?php tha_footer_top(); ?>
     <?php
     //ARRAY OF ALL POSSIBLE COMBINATIONS OF SIDEBARD FOR THE FOOTER
     $id = 'leftbox';
     $footer_sidebar[$id] = 'left-footer-box';
     $id = 'middlebox';
     $footer_sidebar[$id] = 'center-footer-box';
     $id = 'rightbox';
     $footer_sidebar[$id] = 'right-footer-box';
     ?>
     <!-- CREATE THE ELEMENT IF THE SIDE BAR IS ACTIVE -->
     <?php
     foreach ($footer_sidebar as $id => $name)
     {
          if ( is_active_sidebar( $name ) )
          { ?>
               <div class="col-sm-4" id="<?php echo ( $id );?>">
                    <ul>
                         <?php dynamic_sidebar( $name ); ?>
                    </ul>
               </div>
          <?php }
          else
          { ?>
               <div class="col-sm-4" id="<?php echo ( $id );?>">
                    <ul>

                    </ul>
               </div>
          <?php }
     }?>
     <div class="spacer-10"></div>
     <!-- Add the footer navigation menu-->
     <?php wp_nav_menu( array( 'container' => 'nav', 'container_class' => 'footernav', 'theme_location' => 'footer', 'fallback_cb' => false, 'depth' => 1 ) ); ?>
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
     </div>
     <?php tha_footer_bottom(); ?>
</footer>
<?php tha_footer_after(); ?>

</div><!-- closes .container -->

<?php tha_body_bottom(); ?>
<?php wp_footer(); ?>
</body>
</html>
