/*

@package WordPress
@subpackage wpTheme
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
	$(document).on('click','.load-more-a', function()
	/* Add the event listener to the link with this class */
     {
		var that = $(this);
		var page = $(this).data('page');      //The current page
		var maxnumpages = max_num_pages;

		//console.log ('maxnumpages - ' + maxnumpages);
		if ( page < maxnumpages )
		{
			var newPage = page+1;                 //Next page
			var ajaxurl = that.data('url');       //Get the wordrpess ajax
			$('#load_more_icon').removeClass('fa-sync-alt');
			$('#load_more_icon').addClass('fa-spinner');
			$('#load_more_icon').addClass('fa-spin');
			$.ajax
	          ({
				url : ajaxurl,   //The url for the ajax file
				type : 'post',   //The method that we are going to use
				data :           //Send values to the ajax function
	               {
					page : page,   //Sending the variable page
					query : wp_query_string, //Sending the previous query
					action: 'wpTheme_read_more' //The name of the funciton that we want to call
				},
				error : function( response )    //return on error
	               {
					//console.log('Line 33 or the ajax file - ' , response);
					$('#load_more_icon').addClass('fa-exclamation-circle');
					$('#load_more_icon').removeClass('fa-spinner');
					$('#load_more_icon').removeClass('fa-spin');
				},
				success : function( response )  //return on success
	               {
					that.data('page', newPage);
					$('.read-more-results').append( response );
					$('#load_more_icon').addClass('fa-sync-alt');
					$('#load_more_icon').removeClass('fa-spinner');
					$('#load_more_icon').removeClass('fa-spin');
					//console.log ('wp_query_string - ' + wp_query_string);
					page ++;
				}

	          });
			/* check if we need to hide the button */
			if ( newPage == maxnumpages )
			{
				/* We remove the button because we have reached the max limit of pages */
				//console.log ('Hide Load more');
				$('.load-more-div').addClass('.hide_element');
			}
			else
			{
				//console.log ( newPage + ' - ' + maxnumpages );
			}
		}
		else
		{
			//console.log ('Hide Load more');
			$('.load-more-div').addClass('.hide_element');
		}


	});


});
