/*

@package WordPress
@subpackage wpChildTheme  Child Them
@since wpTheme

     ===================================
          JQUERY AND AJAX FUNCTION
     ===================================
* Contains the javascript for jquery and ajax
*
*/
jQuery(document).ready( function($)
{
     /* Ajax functions */
	$(document).on('click','.read-more-link', function() /* Add the event listener to the link with this class */
          {
     		var that = $(this);
     		var page = $(this).data('page');      //The current page
     		var newPage = page+1;                 //Next page
     		var ajaxurl = that.data('url');       //Get the wordrpess ajax
     		$.ajax
               ({
     			url : ajaxurl,   //The url for the ajax file
     			type : 'post',   //The method that we are going to use
     			data :           //Send values to the ajax function
                    {
     				page : page,   //Sending the variable page
     				action: 'wpTheme_read_more' //The name of the funciton that we want to call
     			},
     			error : function( response )    //return on error
                    {
     				console.log('Line 33 or the ajax file - ' , response);
     			},
     			success : function( response )  //return on success
                    {
                         console.log (response);
     				that.data('page', newPage);
     				$('.archive-results').append( response );
     			}
	          });

     	}
     );
});
