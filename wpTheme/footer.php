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


</div> <!-- /wrap div-->

<?php tha_footer_before(); ?>
<footer class="row">
     <?php tha_footer_top(); ?>
     <?php
          //add the widget part of the template
          get_template_part( '\template-parts\footer\part', 'widgets' );
     ?>
     <div class="spacer-10"></div><!-- /spacer div-->
     <?php
          //add the footer navigation bar
          get_template_part( '\template-parts\footer\part', 'navbar-footer' );
     ?>
     <div class="spacer-10"></div><!-- /spacer div-->
     <?php
          //add the footer credits
          get_template_part( '\template-parts\footer\part', 'credit' );
     ?>
     <?php tha_footer_bottom(); ?>
</footer>
<?php tha_footer_after(); ?>
<?php tha_body_bottom(); ?>
<?php wp_footer(); ?>
</body>
</html>
