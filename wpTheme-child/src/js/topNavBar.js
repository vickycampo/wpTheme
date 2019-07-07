/*

@package WordPress
@subpackage wpChildTheme
@since wpTheme

	====================================
		TOP NAVIGATION BAR JAVASCRIPT
	====================================
*
* Set the styles for the top navigation bar
*
*/
/* Scroll */
jQuery(document).ready( function($)
{
     /* Set Variables */
     var header_img_height = $('#header-img').outerHeight(true);
     var top_bar_height = $('#theme_location_top_nav').outerHeight(true);
     var top = header_img_height - top_bar_height;


     $(window).scroll(function()
     {

          if ($(window).scrollTop() > top  )
          {


               if ( ! ( $('#theme_location_top_nav').hasClass( "topNav_afterHeaderImage" ) ) )
               {
                    $('#theme_location_top_nav').addClass( "topNav_afterHeaderImage" );
               }

          }
          else if ($(window).scrollTop() < top  )
          {


               if ( ( $('#theme_location_top_nav').hasClass( "topNav_afterHeaderImage" ) ) )
               {
                    $('#theme_location_top_nav').removeClass( "topNav_afterHeaderImage" );
               }

          }

     });
});
