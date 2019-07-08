<?php
/*

@package WordPress
@subpackage wpTheme
@since wpTheme

	=========================
		SEARCH
	=========================
* The search results template is used to display a visitor’s search results.
*/
?>
<?php
//The first specific theme helper, load the theme options and defaults
$defaults = wpTheme_get_theme_defaults ();
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
//Get the standard header
get_header();

//we determine how many columns the content will ocuppy
$wptheme\Core\Functions::get_content_columns = wptheme\Core\Functions::get_content_columns('body'); ?>
<div class="row" >
	<?php
	//Add hook
	wptheme\Custom\Hooks::tha_content_before();
	?>
	<div class="content col<?php echo ( $screen_size );?>9 <<?php echo esc_attr( $wptheme\Core\Functions::get_content_columns ) ?>">
		<?php wptheme\Custom\Hooks::tha_content_top(); ?>

		<?php get_template_part('template-parts/content','search'); ?>

		<?php wptheme\Custom\Hooks::tha_content_bottom(); ?>
	</div>
     <?php wptheme\Custom\Hooks::tha_content_after(); ?>
     <?php get_sidebar('left'); ?>
     <?php get_sidebar('right'); ?>
</div><!--sidebar and content row-->
<?php get_footer(); ?>
