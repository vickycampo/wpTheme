<?php
/*

@package WordPress
@subpackage wpTheme
@since wpTheme

	========================================
		PART - POSTMETADATA - OTHER
	========================================
* This section adds the postmetadata content for posts that are not single or attachments
*/
?>

<?php
//create variables that will be needed after
//Get the options
$options = get_option( 'ap_core_theme_options' );
//Set the time string
$time = '<time datetime=' . get_the_time('Y-m-d') . '>' . get_the_time('j F Y') . '</time>';
//Get a string with the categories of the post
$categories = get_the_category_list( __(', ', 'wpTheme') );
//Get a string whith the tags of the post
$tags = get_the_tag_list( __('and tagged ', 'wpTheme'),', ' );
//Get the author display name
$author_name = get_the_author_meta('display_name');
//Get the id of the author
$author_ID = get_the_author_meta('ID');
//With the previous information create a link for the Author page
$author_link = '<a href="' . get_author_posts_url($author_ID) . '">' . $author_name . '</a>';
//Format the author link
$author = sprintf( __( 'by %s', 'wpTheme' ), $author_link );
//If we have set options for the author, we use them

// echo ('<pre>is_singular<br>');
// var_dump (is_singular());
// echo ('</pre>');
if ( isset( $options['post-author'] ) && $options['post-author'] )
{
     if ( is_singular() )
     {
          $postmeta = __('Posted in %1$s on %2$s %3$s %4$s', 'wpTheme');
     }
     elseif ( 'chat' == get_post_format() )
     {
          $postmeta = __( 'Filed under %1$s %2$s %3$s', 'wpTheme' );
     }
     elseif ( 'gallery' == get_post_format() || 'image' == get_post_format() )
     {
          $postmeta = __( 'Displayed in %1$s %2$s %3$s', 'wpTheme' );
     } else
     {
          $postmeta = __('Posted in %1$s %2$s %3$s', 'wpTheme');
     }
}
else
{
     if ( is_singular() )
     {
          $postmeta = __('Posted in %1$s on %2$s %3$s', 'wpTheme');
     }
     elseif ( 'chat' == get_post_format() )
     {
          $postmeta = __( 'Filed under %1$s %2$s', 'wpTheme' );
     }
     elseif ( 'gallery' == get_post_format() || 'image' == get_post_format() )
     {
          $postmeta = __( 'Displayed in %1$s %2$s', 'wpTheme' );
     } else
     {
          $postmeta = __('Posted in %1$s %2$s', 'wpTheme');
     }
}
if ( is_singular() )
{
     printf( $postmeta, $categories, $time, $tags, $author );
}
else
{
     printf( $postmeta, $categories, $tags, $author );
}
?>
<br />
<?php comments_popup_link(__('No Comments &#187;','wpTheme'), __('One Comment &#187;','wpTheme'), __('% Comments &#187;','wpTheme')); ?>
<?php
