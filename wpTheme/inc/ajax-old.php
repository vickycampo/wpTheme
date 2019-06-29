<?php
/*

@package WordPress
@subpackage wpTheme
@since wpTheme

     ===================================
          AJAX PHP
     ===================================
*
*
*/
?>
<?php
/*

     ===================================
          READ MORE FUNCTION
     ===================================
* Contains the funcitons that will be needed for the ajax
* It is triggered when the load more posts button is pressed
*/
/* connects ajax.js to this functons*/
add_action( 'wp_ajax_nopriv_wpTheme_read_more', 'wpTheme_read_more' );
add_action( 'wp_ajax_wpTheme_read_more', 'wpTheme_read_more' );
/*** wpTheme_read_more () ***/
function wpTheme_read_more ()
{
     // error_log (__FILE__ . ' - ' . __LINE__ .' - ');
     // error_log (print_r ($_POST , true));
     // error_log ('-----------------------------------');
     $query = $_POST["query"];
     $post_type = $_POST["post_type"];
     $paged = $_POST["page"]+1;
     /* Convert the query string into an array */

     if ( $query != '' )
     {
          //category_name:template-2
     }
     /* We need to do an advanced search */
     

     if ( $post_type != '')
     {
          $args['post_type'] = $post_type;
     }
     $args['paged'] = $paged;


     $the_query = new WP_Query( $args );

     // echo ('<pre>');
     // print_r ($the_query->query);
     // echo ('</pre>');
     // The Loop
     if ( $the_query->have_posts() )
     {
          $max_num_pages = $the_query->max_num_pages;
          ?>
          <script>
          var max_num_pages = "<?php echo ($max_num_pages);?>";
          </script>
          <?php
          while ( $the_query->have_posts() )
          {
		     $the_query->the_post();
               if (locate_template( array( 'template-parts/post-' . get_post_format() . '.php' ) ) != '')
               {
                    get_template_part('template-parts/post', get_post_format());
               }
               else
               {
                    get_template_part('template-parts/post', 'post');
               }

          }
	/* Restore original Post Data */
	wp_reset_postdata();
     }
     else
     {
     	// no posts found
     }
     die ();
}


?>
