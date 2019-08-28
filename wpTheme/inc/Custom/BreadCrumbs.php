<?php
/*

@package WordPress
@subpackage wpTheme
@since wpTheme

     ===================================
          BREADCRUMBS FUNCTION
     ===================================
* Creates the element for the breadcrumbs and place it at the top of the file
*
*/
namespace wptheme\Custom;
class BreadCrumbs
{
     public function register()
     {
          $options = get_option( 'wpTheme_options' );
          if ( isset( $options['breadcrumbs'] )  && ( true == $options['breadcrumbs'] ) )
          {
               add_action( 'wp_enqueue_scripts', array( $this , 'load_dashicons_front_end' ) );
               add_action( 'tha_content_before', array ( $this , 'breadcrumbs') );
          }
     }
     function load_dashicons_front_end()
     {
          wp_enqueue_style( 'dashicons' );
     }
     public function breadcrumbs()
     {
          global $post, $paged;
          ?>
          <nav class="my-breadcrumbs" aria-label="breadcrumb">
               <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                         <a href="<?php echo (home_url()); ?>">
                              <span class="breadcrumb-home"></span>
                         </a>
                    </li>

          <?php
          /*
          error_log (__FILE__ . ' - ' . __LINE__);
          error_log (print_r ( $categories , true) );
          error_log ('-------------------------------------------------------------');
          */

          /* if is a category of a single page we put the category */
          if ( is_category() || is_single() )
          {
               if (is_category())
               {
                    /* Get the current Category */
                    $categories = get_queried_object();
               }
               else
               {
                    $categories = get_the_category()[0];
               }
               /* The cagetory has a parent? */
               if ( ! empty( $categories ) )
               {
                    /* Has parent? */
                    if ($categories->parent != 0)
                    {
                         $parentCat = get_category( $categories->parent );

                         ?>
                         <li class="breadcrumb-item">
                              <?php
                              ?>
                              <a href="<?php echo (get_category_link($parentCat->cat_ID));?>">
                                   <?php echo ($parentCat->name);?>
                              </a>
                         </li>
                         <?php
                    }

               }
               /* Check if the post or page has a category */
               if ( ! empty( $categories ) )
               {
                   ?>
                  <li class="breadcrumb-item">
                       <a href="<?php echo (get_category_link($categories->cat_ID));?>">
                            <?php echo ($categories->name);?>
                       </a>
                  </li>
                  <?php
               }

               if (is_single())
               {
                    ?>
                    <li class="breadcrumb-item">
                         <a href="<?php echo (get_permalink());?>">
                              <?php echo (the_title());?>
                         </a>
                    </li>
                    <?php

               }
          }
          elseif (is_page())
          {
               ?>
               <li class="breadcrumb-item">
                    <?php
                    the_title();
                    ?>
               </li>
               <?php
          }
          elseif (is_search())
          {
               ?>
               <li class="breadcrumb-item">
                    <?php
                    the_search_query();
                    ?>
               </li>
               <?php
          }

          ?>
               </ol>
          </nav>
          <?php
     }
}
