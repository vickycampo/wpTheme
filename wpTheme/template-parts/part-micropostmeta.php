<?php
/*

@package WordPress
@subpackage wpTheme
@since wpTheme

	========================================
		PART - MICROPOSTMETA
	========================================
* This section adds the micropostmeta after a post
*/
?>

<section class="postmetadata">
	<?php
	//we prepare the title
	$is_title_set = get_the_title();
	if ( empty( $is_title_set ) )
	{
	?>
		<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php esc_attr_e( 'Permanent Link to post', 'wpTheme' ); ?>">
			<?php _e( '(no title)', 'wpTheme' ) ?>
		</a>
	<?php
	}
	else
	{
	?>
		<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php echo esc_attr( sprintf( __('Permanent Link to %s','wpTheme'), the_title_attribute( 'echo=0' ) ) ); ?>">
			<?php the_title(); ?>
		</a>
	<?php
	}
	?>

	<span class="human-time-diff alt">
		<?php echo esc_attr( sprintf(__('%1$s ago','wpTheme'), human_time_diff( get_the_time('U'), current_time('timestamp') )) ); ?>
	</span>
	<br />
</section>
