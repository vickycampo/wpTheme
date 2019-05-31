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

     $query = $_POST["query"];
     $paged = $_POST["page"]+1;
     /* Convert the query string into an array */

     if ( $query != '' )
     {
          $FirstArray = explode (',', $query);
          // print_r ($FirstArray);
          foreach ($FirstArray as $i => $single)
          {
               if ( $single != '')
               {
                    if ( strpos ( $single , 'array' ) > -1 )
                    {
                         $singleArray = explode (':', $single);
                         /* Since is an array we need to divide the elemnts that come separated by - */
                         /* First remove the extra elements */
                         $singleArray[1] = str_replace("array(","",$singleArray[1]);
                         $singleArray[1] = str_replace(")","",$singleArray[1]);
                         $subArray = explode ('-', $singleArray[1]);
                         // echo ('$subArray<pre>');
                         // print_r ($subArray);
                         // echo ('</pre>');
                         if ( count ($subArray) > 0 )
                         {
                              foreach ( $subArray as $i => $value)
                              {
                                   if ($value != '')
                                   {
                                        $args[$singleArray[0]][$i] = $value;
                                   }

                              }
                         }

                    }
                    else
                    {
                         $singleArray = explode (':', $single);
                          // print_r ($singleArray);
                         $args[$singleArray[0]] = $singleArray[1];
                    }
               }


          }
     }
     /* We need to do an advanced search */


     $args['post_type'] = 'post';
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
