<?php
/*

@package WordPress
@subpackage wpTheme
@since wpTheme

	========================================
		PART - THE TITLE
	========================================
* This section adds the title to a post
*/
?>

<h2 class="the_date alt">
     <small>
          <time datetime="<?php the_time('Y-m-d'); ?>">
               <?php the_time(get_option('date_format')) ?>
          </time>
     </small>
</h2>

<?php
$is_title_set = get_the_title();
if ( empty( $is_title_set ) )
{ ?>
	<h1 class="the_title">
          <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php echo esc_attr( sprintf( __('Permanent Link to %s','wpTheme'), the_title_attribute( 'echo=0' ) ) ); ?>">
               <?php _e('(no title)', 'wpTheme'); ?>
          </a>
     </h1>
<?php } else { ?>
	<h1 class="the_title">
          <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php echo esc_attr( sprintf( __('Permanent Link to %s','wpTheme'), the_title_attribute( 'echo=0' ) ) ); ?>">
               <?php the_title(); ?>
          </a>
     </h1>
<?php
}
?>
