<?php
/*

@package WordPress
@subpackage wpTheme
@since wpTheme

	========================================
		PART - COMMENTS
	========================================
* This shows the comments section
*/
?>

<?php wptheme\Custom\Hooks::tha_comments_before(); ?>
<section id="comments">
     <?php
     // If comments are open or we have at least one comment, load up the comment template.
     if ( comments_open() || get_comments_number() ) :
         comments_template();
     endif;
     ?>
</section>
<?php wptheme\Custom\Hooks::tha_comments_after(); ?>
