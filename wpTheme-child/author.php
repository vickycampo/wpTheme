<?php
/*

@package WordPress
@subpackage wpTheme
@since wpTheme

	=========================
		AUTHOR
	=========================
* This is the author page template
*/
?>


<?php
     //Calls the header.php
     get_header();
     //we determine how many columns the content will ocuppy
     $wptheme\Core\Functions::get_content_columns = wptheme\Core\Functions::get_content_columns('body');
     //Add Hook


?>
<div class="row" >
     <?php wptheme\Custom\Hooks::tha_content_before(); ?>
     <!-- The Content Div -->
     <div class="content <?php echo esc_attr( $wptheme\Core\Functions::get_content_columns ) ?> order-2 the_content">
     	<?php wptheme\Custom\Hooks::tha_content_top(); ?>

     	<?php
          //Get the Template part
          get_template_part('template-parts/content','author'); ?>

     	<?php wptheme\Custom\Hooks::tha_content_bottom(); ?>
     </div> <!-- /content -->
     <?php wptheme\Custom\Hooks::tha_content_after(); ?>
     <?php get_sidebar('left'); ?>
     <?php get_sidebar('right'); ?>
</div><!--row-->
<?php get_footer(); ?>
