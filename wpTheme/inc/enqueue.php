<?php
/*

@package WordPress
@subpackage wpTheme
@since wpTheme

===================================
ENQUEUE SCRIPTS AND STYLES
===================================
* .
*
*/
?>
<?php
/*
==========================
SCRIPTS AND TYLESHEETS
==========================

* Sets up theme style sheets and scripts
* * Note that this function is hooked into the wp_enqueue_scripts hook.
*/
if ( ! function_exists( 'wpTheme_scripts' ) )
{
     function wpTheme_scripts()
     {
          if (! is_admin()) //Instruction to only load if it is not the admin area
          {
               //Information of the current active theme
               $theme = wp_get_theme ();
               //we get all the files in the css folder
               $files = scandir ( get_parent_theme_file_path() . '/assets/css');

               //generate an array for all the media types
               $mediaType = array ('all' , 'screen' , 'print' , 'handheld');
               //go through all the files in the css folder
               foreach ($files as $i => $file_name)
               {
                    if ( ( $file_name != '.' ) && ($file_name != '..') )
                    {
                         //we are going to use the file name as a handle so we need to remove extension
                         $file_short_name = str_replace(".css","",$file_name);
                         $handle = $file_short_name; //is simply the name of the stylesheet.
                         $src = get_template_directory_uri() . '/assets/css/' . $file_name; //is where it is located. The rest of the parameters are optional.
                         $deps = false; //this stylesheet is dependent on another stylesheet.
                         $ver =  $theme['version']; //sets the version number.

                         //we have to see if the name is a media type
                         if (array_search ( $file_short_name , $mediaType) > -1)
                         {
                              $media = $file_short_name; //‘all’, ‘screen’, ‘print’ or ‘handheld’
                         }
                         else
                         {
                              $media = 'all'; //‘all’, ‘screen’, ‘print’ or ‘handheld’
                         }
                         wp_enqueue_style( $handle , $src , $deps , $ver , $media );

                    }
               }
               //we gather all the files in the script folder that we will put in the header
               unset ($files);
               $files = scandir ( get_parent_theme_file_path() . '/assets/js/header');
               foreach ($files as $i => $file_name)
               {
                    if ( ( $file_name != '.' ) && ($file_name != '..') )
                    {
                         //we are going to use the file name as a handle so we need to remove extension
                         $file_short_name = str_replace(".js","",$file_name);
                         $handle = $file_short_name; //is the name for the script.
                         $src = get_template_directory_uri() . '/assets/js/header/' . $file_name; //defines where the script is located.
                         $deps = array ( 'jquery' ); //is an array that can handle any script that your new script depends on, such as jQuery.
                         $ver = '1.1'; //sets the version number.
                         $in_footer = false; //allows you to place your scripts in the footer

                         wp_enqueue_script( $handle, $src, $deps, $ver, $in_footer);

                    }
               }
               //we gather all the files in the script folder that we will put in the footer
               unset ($files);
               $files = scandir ( get_parent_theme_file_path() . '/assets/js/footer');
               foreach ($files as $i => $file_name)
               {
                    if ( ( $file_name != '.' ) && ($file_name != '..') )
                    {
                         //we are going to use the file name as a handle so we need to remove extension
                         $file_short_name = str_replace(".js","",$file_name);
                         $handle = $file_short_name; //is the name for the script.
                         $src = get_template_directory_uri() . '/assets/js/footer/' . $file_name; //defines where the script is located.
                         $deps = array ( 'jquery' ); //is an array that can handle any script that your new script depends on, such as jQuery.
                         $ver = '1.1'; //sets the version number.
                         $in_footer = true; //allows you to place your scripts in the footer

                         wp_enqueue_script( $handle, $src, $deps, $ver, $in_footer);
                    }
               }
               //enqueue main style.css
               wp_register_style('corecss', get_stylesheet_uri(),false,$theme['Version']);
               wp_enqueue_style('corecss');
          }


     }
     add_action( 'wp_enqueue_scripts', 'wpTheme_scripts' );
}
if ( ! function_exists( 'wpTheme_enqueue_fonts' ) )
{
     function wpTheme_enqueue_fonts ()
     {
          if (! is_admin()) //Instruction to only load if it is not the admin area
          {
               //check the browser
               global $is_IE;
               //Information of the current active theme
               $theme = wp_get_theme ();
               //The first specific theme helper, load the theme options and defaults
               $defaults = wpTheme_get_theme_defaults ();
               //Fetch options from the database table
               $options = get_option ('ap_core_theme_options');
               if ( isset( $options['font_subset'] ) ) {
                    $font_subset = $options['font_subset'];
               } else {
                    $font_subset = $defaults['font_subset'];
               }
               // register fonts
               // we create an array with all the possible fonts.
               $i = 0;
               $fonts_array[$i]['handle'] = 'droidsans';
               $fonts_array[$i]['src'] = '//fonts.googleapis.com/css?family=Droid+Sans&subset=' . $font_subset;
               $fonts_array[$i]['deps'] = false;
               $fonts_array[$i]['ver'] = $theme['Version'];
               $fonts_array[$i]['media'] = 'all';
               $i ++;
               $fonts_array[$i]['handle'] = 'ptserif';
               $fonts_array[$i]['src'] = '//fonts.googleapis.com/css?family=PT+Serif&subset=' . $font_subset;
               $fonts_array[$i]['deps'] = false;
               $fonts_array[$i]['ver'] = $theme['Version'];
               $fonts_array[$i]['media'] = 'all';
               $i ++;
               $fonts_array[$i]['handle'] = 'inconsolata';
               $fonts_array[$i]['src'] = '//fonts.googleapis.com/css?family=Inconsolata&subset=' . $font_subset;
               $fonts_array[$i]['deps'] = false;
               $fonts_array[$i]['ver'] = $theme['Version'];
               $fonts_array[$i]['media'] = 'all';
               $i ++;
               $fonts_array[$i]['handle'] = 'ubuntu';
               $fonts_array[$i]['src'] = '//fonts.googleapis.com/css?family=Ubuntu&subset=' . $font_subset;
               $fonts_array[$i]['deps'] = false;
               $fonts_array[$i]['ver'] = $theme['Version'];
               $fonts_array[$i]['media'] = 'all';
               $i ++;
               $fonts_array[$i]['handle'] = 'lato';
               $fonts_array[$i]['src'] = '//fonts.googleapis.com/css?family=Lato&subset=' . $font_subset;
               $fonts_array[$i]['deps'] = false;
               $fonts_array[$i]['ver'] = $theme['Version'];
               $fonts_array[$i]['media'] = 'all';
               $i ++;
               $fonts_array[$i]['handle'] = 'notoserif';
               $fonts_array[$i]['src'] = '//fonts.googleapis.com/css?family=Noto+Serif&subset=' . $font_subset;
               $fonts_array[$i]['deps'] = false;
               $fonts_array[$i]['ver'] = $theme['Version'];
               $fonts_array[$i]['media'] = 'all';
               $i ++;
               $fonts_array[$i]['handle'] = 'opensans';
               $fonts_array[$i]['src'] = '//fonts.googleapis.com/css?family=Open+Sans&subset=' . $font_subset;
               $fonts_array[$i]['deps'] = false;
               $fonts_array[$i]['ver'] = $theme['Version'];
               $fonts_array[$i]['media'] = 'all';
               $i ++;

               foreach ($fonts_array as $i => $SingleFont)
               {
                    $handle = $SingleFont['handle'];
                    $src = $SingleFont['src'];
                    $deps = $SingleFont['deps'];
                    $ver = $SingleFont['ver'];
                    $media = $SingleFont['media'];
                    wp_register_style( $handle, $src, $deps, $ver, $media );

               }

               // only enqueue fonts that are actually being used
               $heading = ( isset( $options['heading'] ) ) ? $options['heading'] : $defaults['heading'];
               $body = ( isset( $options['body'] ) ) ? $options['body'] : $defaults['body'];
               $alt = ( isset( $options['alt'] ) ) ? $options['alt'] : $defaults['alt'];
               $corefonts = array( $heading, $body, $alt );
               // if any of these fonts are selected, load their stylesheets
               foreach ($fonts_array as $i => $SingleFont)
               {
                    $handle = $SingleFont['handle'];
                    if ( in_array( $handle, $corefonts ) ) {
                         wp_enqueue_style( $handle );
                    }
               }

               //this loads the icon set
               $handle = 'fontawesome';
               $src = get_template_directory_uri() . '/assets/fontawesome/css/fontawesome.min.css';
               $deps = false;
               $ver = $theme['version'];
               wp_register_style( $handle, $src, $deps, $ver );
               //echo ('<br>' . $src . '<br>');
               wp_enqueue_style ('fontawesome');
               // wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css', false, $theme['Version'] );



          }
     }
     add_action( 'wp_enqueue_scripts', 'wpTheme_enqueue_fonts' );
}


/*
==========================
ENQUEUE COMMENTS REPLY
==========================

* Add .js script if "Enable threaded comments" is activated in Admin
* Codex: {@link https://developer.wordpress.org/reference/functions/wp_enqueue_script/}
*/
if ( ! function_exists( 'wpTheme_enqueue_comments_reply' ) )
{
     function wpTheme_enqueue_comments_reply()
     {
          if (! is_admin()) //Instruction to only load if it is not the admin area
          {
               if( is_singular() && comments_open() && ( get_option( 'thread_comments' ) == 1) ) {
                    // Load comment-reply.js (into footer)
                    $handle = 'comment-reply';
                    $src = 'wp-includes/js/comment-reply';
                    $deps = 'array()';
                    $ver = false;
                    $in_footer = true;
                    wp_enqueue_script( $handle , $src , $deps, $ver , $in_footer );
                    wp_enqueue_script( 'comment-reply', 'wp-includes/js/comment-reply', array(), false, true );
               }
          }
     }
     add_action(  'wp_enqueue_scripts', 'wpTheme_enqueue_comments_reply' );
}
/*
==========================
ENQUEUE BOOTSTRAP FILES
==========================

*
*/
if ( ! function_exists( 'wpTheme_enqueue_bootstrap' ) )
{
     function wpTheme_enqueue_bootstrap()
     {
          if (! is_admin()) //Instruction to only load if it is not the admin area
          {
               //add scripts so bootstrap can work
               $handle= 'bootstrap-4.2.1-css'; //is simply the name of the stylesheet.
               $src = get_template_directory_uri() . '/assets/bootstrap-4.2.1/js/bootstrap.js';
               $deps = array('jquery');
               $ver = '4.2.1'; //sets the version number.
               $in_footer = true;
               wp_enqueue_script( $handle, $src, $deps, $ver, $in_footer);

               //add style sheet so bootstrap can work
               $handle = 'bootstrap-4.2.1-css'; //is simply the name of the stylesheet.
               $src = get_template_directory_uri() . '/assets/bootstrap-4.2.1/css/bootstrap.css'; //is where it is located. The rest of the parameters are optional.
               $deps = false; //this stylesheet is dependent on another stylesheet.
               $ver = '4.2.1'; //sets the version number.
               $media = 'all';
               wp_enqueue_style( $handle , $src , $deps , $ver , $media );


          }

     }
     add_action(  'wp_enqueue_scripts', 'wpTheme_enqueue_bootstrap' );
}

?>
