<?php
/*

@package WordPress
@subpackage wpTheme
@since wpTheme

	========================================
		PART - POSTMETADATA
	========================================
* This section adds the postmetadata after a post
*/
?>
<section class="postmetadata clearfix">
     <?php
     // echo ('<pre>is_page<br>');
     // var_dump (is_page());
     // echo ('</pre>');
     if ( !is_page() && !is_attachment() )
     {
          get_template_part( 'template-parts/part-postmetadata', 'other' );
     }
     else if ( is_attachment() )
     {
          get_template_part( 'template-parts/part-postmetadata', 'attachment' );
     }
     if ( is_singular() || is_page() )
     {
          get_template_part( 'template-parts/part-postmetadata', 'single' );
     }
     ?>
</section>
