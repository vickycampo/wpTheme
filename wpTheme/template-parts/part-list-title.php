<?php
/*

@package WordPress
@subpackage wpTheme
@since wpTheme

	========================================
		PART - LIST TITLE
	========================================
* This shows the title of the pages that are lists of posts
*/
?>
<?php
/* If this is a category archive */
if ( is_category() )
{
     $category = single_cat_title( '', false ); ?>
    <h2 class="the_title">
         <?php echo esc_attr( sprintf( __( 'Posts filed under %s','wpTheme'), $category ) ); ?>
    </h2>

<?php
}
/* If this is a tag archive */
else if( is_tag() )
{
     $tags = get_the_tags();
     $tag_name = array();
     foreach ( $tags as $tag )
     {
          $tag_name = $tag->name; // only one should get pulled
     } ?>
     <h2 class="the_title">
          <?php echo esc_attr( sprintf( __('Posts filed under %s','wpTheme'), $tag_name ) ); ?>
     </h2>

<?php /* If this is a daily archive */
} elseif ( is_day() ) { ?>
     <h2 class="the_title"><?php echo esc_attr( sprintf( __('Archive for %1$s','wpTheme'), get_the_time('j F Y') ) ); ?></h2>

<?php /* If this is a monthly archive */
} elseif ( is_month() ) { ?>
     <h2 class="the_title"><?php echo esc_attr( sprintf( __('Archive for %1$s','wpTheme'), get_the_time('F Y') ) ); ?></h2>

<?php /* If this is a yearly archive */
} elseif ( is_year() ) { ?>
     <h2 class="the_title"><?php echo esc_attr( sprintf( __('Archive for %1$s','wpTheme'), get_the_time('Y') ) ); ?></h2>

<?php /* If this is an author archive */
} elseif ( is_author() ) { ?>
     <h2 class="the_title"><?php _e('Author Archive','wpTheme'); ?></h2>

<?php /* All other archives */
} else { ?>
     <h2 class="the_title"><?php _e('Blog Archives','wpTheme'); ?></h2>
<?php } ?>
