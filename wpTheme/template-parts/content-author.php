<?php
/*

@package WordPress
@subpackage wpTheme
@since wpTheme

	========================================
		CONTENT - AUTHOR
	========================================
* This shows the content of author.php
*/
?>
<?php
// Start the loop
if ( have_posts() )
{
     the_post();
}
// Get the author detials
$description = esc_attr( get_the_author_meta('description') );
$user_url = get_the_author_meta('user_url');
?>
<!-- Open the section tag -->
<section class="author media">
     <!-- Display the avatar -->
     <div class="pull-left media-object">
          <?php echo get_avatar( get_the_author_meta('ID'), $size = '96' ); ?>
     </div>

     <div class="media-body">
          <!-- Display the author's name -->
          <h2 class="the_title media-heading">
               <?php the_author_meta('display_name') ?>
          </h2>
          <!-- Display the author's description -->
          <p>
               <?php
               if ( $description )
               {
                    echo wp_kses_post( $description ); ?><br />
               <?php
               }
               if ( $user_url )
               {
               ?>
                    <!-- Display the author's URL -->
                    <a href="<?php echo esc_url($user_url); ?>" rel="me"><?php _e('Website','wpTheme'); ?></a>
               <?php
               }
               ?>
          </p>
     </div>
</section>
<div class="spacer-10"></div>
<!-- Display the number of posts -->
<h3 class="alt">
     <?php echo esc_attr( sprintf( __( 'All posts by %s', 'wpTheme' ), get_the_author_meta('display_name') ) ); ?>
</h3>

<?php
     //Rewind the loop posts in order to re-use the same query in different locations on a page.
     rewind_posts();
     //Call the part that displays the actual posts
     get_template_part('template-parts/part', 'author');
?>
