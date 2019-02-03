<?php
/*

@package WordPress
@subpackage wpTheme
@since wpTheme

	========================================
		PART - POSTMETADATA - ATTACHMENT
	========================================
* This section adds the postmetadata content for posts that are attachments
*/
?>
<?php
//Get the values we will display
//Get the image meta data
$imagemeta = wp_get_attachment_metadata();
//Set the time string
$time = '<time datetime=' . get_the_time('Y-m-d') . '>' . get_the_time('j F Y') . '</time>';
//Get the URL of the imagea
$image_url = wp_get_attachment_url();
//Get the title of the post that contains this attachment
$parent_title = get_the_title( $post->post_parent );
//Get the link for the parent post
$parent_link = '<a href="' . get_permalink( $post->post_parent ) . '" title="' . sprintf( __( 'Permalink to %s', 'wpTheme' ), esc_attr( $parent_title ) ) . '">' . esc_attr( $parent_title ) . '</a>';
//Display the link to the parent post and the time
printf( __( 'Attached to %1$s which was posted on %2$s.' , 'wpTheme' ), $parent_link, $time );
echo '<br />';
//Display the link to the image
echo '<a href="' . esc_url_raw( $image_url ) . '" title="' . __( 'Link to full-size image.', 'wpTheme' ) . '">';
_e( 'View full image.', 'wpTheme' );
echo '</a>';
?>
