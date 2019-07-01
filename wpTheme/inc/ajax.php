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
     /* old query string */
     if ( ( isset ( $_POST['query'] ) ) && ( $_POST['query'] != '' ) )
     {

     }
     else
     {
          $paged = $_POST["page"]+1;
          /* Create the arguments for query */
          if ( $_POST['queryType'] == 'TAXONOMY' )
          {
               if ($_POST['name'] != $_POST['ListOfitems']) // has a term Id
               {
                    $ListOfitems = explode( '-' , $_POST['ListOfitems'] );
                    $args = array(
                        'post_type' => $_POST['post_type'],
                        'tax_query' => array(
                            array(
                                'taxonomy' => $_POST['name'],
                                'field'    => 'term_id',
                                'terms'    => $ListOfitems
                            ),
                        ),
                    );
               }
               else
               {
                    /* we get all the posts of a custom type */
                    /* since there is no taxonomy filter */

                    $args = array(
                        'post_type' => $_POST['post_type'],
                        'post_status' => 'publish'
                    );
                    // error_log (__FILE__ . ' - ' . __LINE__ .' - ');
                    // error_log (print_r ($args , true));
                    // error_log ('-----------------------------------');
               }

          }
          else if ( $_POST['queryType'] == 'CATEGORY' )
          {
               $ListOfitems = explode( '-' , $_POST['ListOfitems'] );
               $args = array( 'cat' => $ListOfitems );
          }
     }

     $args['paged'] = $paged;
     $the_query = new WP_Query( $args );
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
