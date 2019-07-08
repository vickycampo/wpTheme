<?php
/*

@package WordPress
@subpackage wpTheme
@since wpTheme

	===================================
		404 - PAGE NOT FOUND
	===================================
* This page contains is called when the URI is not found
*
*/
?>

<?php
     //Calls the header.php
     get_header();
     //we determine how many columns the content will ocuppy
     $wpTheme_content_columns = wptheme\Core\Functions::get_content_columns('body');
     //Add Hook


?>
<div class="row" >
     <?php wptheme\Custom\Hooks::tha_content_before(); ?>
     <!-- The Content Div -->
     <div class="content <?php echo esc_attr( $wpTheme_content_columns ) ?> order-2 the_content">
     	<?php wptheme\Custom\Hooks::tha_content_top(); ?>

     	<?php
          //Get the Template part
          get_template_part('template-parts/content','404'); ?>

     	<?php wptheme\Custom\Hooks::tha_content_bottom(); ?>
     </div> <!-- /content -->
     <?php wptheme\Custom\Hooks::tha_content_after(); ?>
     <?php get_sidebar('left'); ?>
     <?php get_sidebar('right'); ?>
</div><!--row-->
<?php get_footer(); ?>
