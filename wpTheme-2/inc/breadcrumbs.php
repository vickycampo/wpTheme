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
?>
<?php
if ( !function_exists( 'wpTheme_breadcrumbs' ) )
{

     /* We get the defaults and the options values */
     $options = get_option( 'wpTheme_options' );
     function wpTheme_breadcrumbs()
     {
          global $post, $paged;
          ?>
          <nav class="my-breadcrumbs" aria-label="breadcrumb">
               <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                         <a href="<?php echo (home_url()); ?>">
                              <i class="fa fa-home"></i>
                         </a>
                    </li>

          <?php
          /**/
          /* if is a category of a single page we put the category */
          if ( is_category() || is_single() )
          {
               if (is_category())
               {
                    /* Get the current Category */
                    $categories = get_queried_object();
                    // echo ('<pre>');
                    // var_dump ($categories);
                    // echo ('</pre>');
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
     if ( isset( $options['breadcrumbs'] )  && ( true == $options['breadcrumbs'] ) )
     {
          add_action( 'wptheme\Custom\Hooks::tha_content_top', 'wpTheme_breadcrumbs' );
     }
}
 ?>
