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
     get_header(); ?>
     <?php
          //Add hook
          wptheme\Custom\Hooks::tha_content_before();
          /* Do a query for single or all the posts types, included the custom */
          if ( ! is_single () )
          {
               $listType = 'section--list';
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
          else if ( is_single () )
          {
               $listType = 'section--single';
               $args = array(
                    'post_type' => get_post_type(),
                    'post_status' => 'publish',
                    'p' => get_the_ID(),   // id of the post you want to query
               );
               $my_query = new WP_Query( $args );
          }
          ?>

          <section class="the_content read-more-results <?php echo ($listType);?>">
          <!-- Add hook -->
          <?php wptheme\Custom\Hooks::tha_content_top(); ?>
          <!-- The loop -->

          <?php
          /* The Loop  */
               if( $my_query->have_posts() )
               {
                    /* The class read-more-results is for the jquery to get more posts */
                    ?>
                    <?php
                         while ( $my_query->have_posts() )
                         {
                              ?>
                              <?php
                                   $my_query->the_post();
                                   //get template part depending on the template format we are displaying
                                   if ( ( get_post_format() ) && ( locate_template( array( 'template-parts/post-' . get_post_format() . '.php' ) ) != '') )
                                   {
                                        get_template_part('template-parts/post', get_post_format());
                                   }
                                   else
                                   {
                                        get_template_part('template-parts/post', 'post');
                                   }
                              ?>
                              <?php
                         }
                    ?>
                    <?php get_template_part('template-parts/part', 'navigation' ); ?>
               <?php
               }
               wp_reset_query();  // Restore global post data stomped by the_post().
               ?>

               <?php wptheme\Custom\Hooks::tha_content_bottom(); ?>
          </section>
          <?php wptheme\Custom\Hooks::tha_content_after(); ?>
          <?php get_sidebar('left'); ?>
          <?php get_sidebar('right'); ?>

     <?php get_footer(); ?>
