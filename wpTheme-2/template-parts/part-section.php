<?php
/*

@package WordPress
@subpackage wpTheme
@since wpTheme

	========================================
		PART - THE SECTION
	========================================
* This section works for all post formats
*/
$attachments = get_children( array('post_parent' => get_the_ID(), 'post_type' => 'attachment', 'post_mime_type' => 'image') );

if ( $attachments )
{
     // echo ('<pre>');
     // print_r ($attachments);
     // echo ('</pre>');
}
?>
<section class="entry">
     <?php tha_entry_top(); ?>
     <?php the_content(__('Read more &raquo;','wpTheme')); ?>
     <?php get_template_part( 'template-parts/part', 'link-pages' ); ?>
     <?php tha_entry_bottom(); ?>
</section>
