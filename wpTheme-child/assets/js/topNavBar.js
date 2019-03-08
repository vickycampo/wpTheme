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


function scrollFunction()
{
     /* We get the elements that we need */
     var topBar_obj = document.getElementById('theme_location_top_nav');
     var topHeaderImg = document.getElementById('header-img');
     /* get the scroll */
     var scrollLeft = window.pageXOffset || document.documentElement.scrollLeft;
     var scrollTop = window.pageYOffset || document.documentElement.scrollTop;
     /* If the scroll is the same as the div height, we change the div background color */
     if ( scrollTop >= topHeaderImg.offsetHeight - topBar_obj.offsetHeight)
     {
          // console.log ('div-height - ' , topHeaderImg.offsetHeight);
          // console.log('postion -' , scrollTop);
          // console.log('topBar_obj -' , topBar_obj.offsetHeight);
          if ( topBar_obj.classList )
          {
               topBar_obj.classList.add("topNav_afterHeaderImage");
          }
          else if (arr.indexOf('topNav_afterHeaderImage') == -1)
          {
              topBar_obj.className += " " + 'topNav_afterHeaderImage';
          }
     }
     else
     {
          if ( topBar_obj.classList )
          {
               topBar_obj.classList.remove("topNav_afterHeaderImage");
          }
          else
          {
               topBar_obj.className = element.className.replace(/\btopNav_afterHeaderImage\b/g, "");
          }
     }




}
