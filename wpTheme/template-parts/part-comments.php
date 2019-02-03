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

<?php tha_comments_before(); ?>
<section id="comments">
     <?php comments_template(); ?>
</section>
<?php tha_comments_after(); ?>
