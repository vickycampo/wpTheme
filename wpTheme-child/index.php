<?php
/*

@package WordPress
@subpackage wpTheme
@since wpTheme

	=========================
		INDEX
	=========================
* The main template file. It is required in all themes.
*/
?>
<?php
     //Get the standard header
     get_header();

     //we determine how many columns the content will ocuppy
     $wpTheme_content_columns = wptchild\Setup\Functions::get_content_columns('body'); ?>
     <!-- add the class to the content div-->
     <div class="row" >
          <?php
          //Add hook
          wptheme\Custom\Hooks::tha_content_before();
          ?>
          <div class="content <?php echo esc_attr( $wpTheme_content_columns ) ?> order-2 the_content">
               <!-- Add hook -->
               <?php wptheme\Custom\Hooks::tha_content_top(); ?>
               <!-- The loop -->

               <?php
               /* We get all the post types */
               if ( ! is_single () )
               {
                    $args = array(
                         'public'   => true,
                         '_builtin' => false,
                         'has_archive' => true
                    );
                    $output = 'names'; // names or objects, note names is the default
                    $operator = 'and'; // 'and' or 'or'
                    $post_types = get_post_types( $args, $output, $operator );

                    foreach ( $post_types  as $post_type )
                    {
                         $post_list[] = $post_type;
                    }
                    $post_list[] = 'post';
                    wp_reset_query();

                    $args = array(
                            'post_type' => $post_list,
                            'orderby' => 'date',
                        );
                    $my_query = new WP_Query( $args );

               }
               else
               {
                    $args = array(
                         'post_type' => get_post_type(),
                         'post_status' => 'publish',
                         'p' => get_the_ID(),   // id of the post you want to query
                    );
                    $my_query = new WP_Query( $args );
               }


               if( $my_query->have_posts() ) :
                    ?>
                    <div class="read-more-results">
                    <?php
                         while ( $my_query->have_posts() ) : $my_query->the_post();

                         //get template part depending on the template format we are displaying

                         if ( ( get_post_format() ) && ( locate_template( array( 'template-parts/post-' . get_post_format() . '.php' ) ) != '') )
                         {
                              get_template_part('template-parts/post', get_post_format());
                         }
                         else
                         {
                              get_template_part('template-parts/post', 'post');
                         }
                    endwhile;
                    ?>
                    </div>
                    <?php get_template_part('template-parts/part', 'navigation' ); ?>
               <?php
               endif;
               wp_reset_query();  // Restore global post data stomped by the_post().
               ?>

               <?php wptheme\Custom\Hooks::tha_content_bottom(); ?>
          </div>

          <?php wptheme\Custom\Hooks::tha_content_after(); ?>
          <?php get_sidebar('left'); ?>
          <?php get_sidebar('right'); ?>
     </div><!-- /Row -->

     <?php get_footer(); ?>
