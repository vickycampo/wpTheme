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
                $ver = '1.1'; //sets the version number.

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
                $src = get_template_directory_uri() . '/assets/js/header' . $file_name; //defines where the script is located.
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
                $src = get_template_directory_uri() . '/assets/js/footer' . $file_name; //defines where the script is located.
                $deps = array ( 'jquery' ); //is an array that can handle any script that your new script depends on, such as jQuery.
                $ver = '1.1'; //sets the version number.
                $in_footer = true; //allows you to place your scripts in the footer

                wp_enqueue_script( $handle, $src, $deps, $ver, $in_footer);
           }
      }
 }
 add_action( 'wp_enqueue_scripts', 'wpTheme_scripts' );
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
      if( is_singular() && comments_open() && ( get_option( 'thread_comments' ) == 1) ) {
          // Load comment-reply.js (into footer)
          wp_enqueue_script( 'comment-reply', 'wp-includes/js/comment-reply', array(), false, true );
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
    //add style sheet so bootstrap can work
    $handle = 'bootstrap-4.2.1-css'; //is simply the name of the stylesheet.
    $src = get_template_directory_uri() . '/assets/bootstrap-4.2.1/css/bootstrap.css'; //is where it is located. The rest of the parameters are optional.
    $deps = false; //this stylesheet is dependent on another stylesheet.
    $ver = '4.2.1'; //sets the version number.
    $media = 'all';
    wp_enqueue_style( $handle , $src , $deps , $ver , $media );

    //add scripts so bootstrap can work
    $handle= 'bootstrap-4.2.1-css'; //is simply the name of the stylesheet.
    $src = get_template_directory_uri() . '/assets/bootstrap-4.2.1/js/bootstrap.js';
    $deps = array('jquery');
    $ver = '4.2.1'; //sets the version number.
    $in_footer = true;
    wp_enqueue_script( $handle, $src, $deps, $ver, $in_footer);

  }
  add_action(  'wp_enqueue_scripts', 'wpTheme_enqueue_bootstrap' );
}

?>
