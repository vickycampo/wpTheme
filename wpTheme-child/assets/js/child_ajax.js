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
	/*** Global Variables ***/
	var ActiveFilterList = new Array;
	var MainCategoryId = '';
	var ajax_url = '';
	// var wp_query_string;
	/*** Categories ***/
	/* Add Event Listener to add filters */
	$('#sub-cat-div').on('click', '.dropdown-item', addCategoryFilter);
	/* create a function to add filter to div */
	function addCategoryFilter(event)
	{
		/* Get the main category fron the page */
		MainCategoryId = main_category;
		/* The url that processes the ajax */
		ajaxurl = admin_url;
		/* Get the main Category */
		ActiveFilterList[0] = MainCategoryId;

		//console.log ('MainCategoryId - ' + MainCategoryId);
		/* Get the id of the element clicked */
		var target_id = event.target.id;
		var target_txt = $(event.target).text();
		/* Check if the id exists in the array */
		if ( ActiveFilterList.indexOf ( target_id ) == -1 )
		{

			/* Before we add we need to check if it exists */
			$('#sub-cat-filters').append('<div class="sub-cat-filters-element" id="' + target_id + '_filter">');
			$('#sub-cat-filters').find('#' + target_id + '_filter').append('<div class="sub-cat-filters-close fa fa-times" id="' + target_id + '_close">');
			$('#sub-cat-filters').find('#' + target_id + '_filter').append('<div class="sub-cat-filters-name" id="' + target_id + '_name">');
			/* Add the filter name */
			$('#' + target_id + '_name').append(target_txt);
			/* We add the new id to the array */
			ActiveFilterList.push (target_id);
			/* Change the content that is being filter */
			trigger_content_change ();
		}
	}
	/* Add Event Listener to remove filters */
	$(document).on('click', '.sub-cat-filters-close', removeCategoryFilter);
	function removeCategoryFilter(event)
	{
		/* Get the id of the element clicked */

		var target_id = event.target.id.replace("_close", "");
		/* Check if the id exists in the array */
		if ( ActiveFilterList.indexOf ( target_id ) > -1 )
		{
			/* Remove the item from the array */
			var index = ActiveFilterList.indexOf ( target_id );
			$( '#' + target_id + '_filter' ).remove();
			/* We remove the id of the array */
			ActiveFilterList.splice(index, 1);
			//console.log ('Active_filters ' + ActiveFilterList.length)
			/* Change the content that is being filter */
			trigger_content_change ();
		}
	}
	/* Change the content that is being filter */
	function trigger_content_change ()
	{
		var filter_categories = new Array;
		/* Check how many items we have to filter */
		if ( ActiveFilterList.length > 0)
		{
			/* Since we have at least one category we apply the filter */
			for (var i in ActiveFilterList)
			{
				/* we check if we have one category or many in the same id */
				if ( ActiveFilterList[i].indexOf('-') > -1 )
				{

					/* Split the string into an array */
					var thisValues = ActiveFilterList[i].split("-");
					/* get the last category */
					var j = thisValues.length-1;
					if ( filter_categories.indexOf( thisValues[j] ) == -1 )
					{
						filter_categories.push( thisValues[j] );
					}
				}
				else
				{
					/* Check if the category exists */
					if ( filter_categories.indexOf( ActiveFilterList[i] ) == -1 )
					{
						filter_categories.push( ActiveFilterList[i] );
					}

				}
			}
			/* if we have filters_categories, we go and get results */
			/* Prepare the sting to send the values */
			wp_query_string = 'cat:array( ';
			/* Add the categories of the filters to the array */

			/* If the list is longer than 1, means we have more than the main category */

			for (i in filter_categories )
			{
				/* We don't add the main category, if we have more than one */
				if ( ( filter_categories.length > 1 ) && ( i == 0) )
				{

				}
				else
				{
					wp_query_string += filter_categories[i] + '-';
				}

			}
			wp_query_string += '),';

			//console.log ('filter_categories ' + filter_categories);
			//console.log ('We have stopped in line 104 ');
			if ( filter_categories.length > 0 )
			{
				$.ajax
		          ({
					url : ajaxurl,   //The url for the ajax file
					type : 'post',   //The method that we are going to use
					data :           //Send values to the ajax function
		               {
						page : '0',   //Sending the variable page
						query : wp_query_string, //Sending the previous query
						action: 'wpTheme_read_more' //The name of the funciton that we want to call
					},
					error : function( response )    //return on error
		               {
						//console.log('Line 33 or the ajax file - ' , response);
					},
					success : function( response )  //return on success
		               {
		                    //console.log ('wp_query_string - ' + wp_query_string);

						$('.read-more-results').empty();
						$('.read-more-results').append( response );
						//console.log ('max_num_pages 01 - ' + max_num_pages);
						if ( max_num_pages == 1)
						{
							//console.log ('Hide Load more');
							$('.load-more-div').addClass('.hide_element');

						}
						else
						{
							//console.log ('Show Load more');
							$('.load-more-div').addClass('.show_element');
						}
					}
		          });

			}
		}
	}
	/* Scroll */
	/* Set Variables */
	var header_img_height = $('#header-img').outerHeight(true);
	var top_bar_height = $('#theme_location_top_nav').outerHeight(true);
	var top = header_img_height - top_bar_height;
	console.log (header_img_height + ' - ' +  top_bar_height + ' - ' + top );

	$(window).scroll(function()
	{
		console.log ($(window).scrollTop() + ' - ' + top);
		if ($(window).scrollTop() > top  )
		{

			console.log ('addClass');
			if ( ! ( $('#theme_location_top_nav').hasClass( "topNav_afterHeaderImage" ) ) )
			{
				$('#theme_location_top_nav').addClass( "topNav_afterHeaderImage" );
			}

		}
		else if ($(window).scrollTop() < top  )
		{

			console.log ('removeClass');
			if ( ( $('#theme_location_top_nav').hasClass( "topNav_afterHeaderImage" ) ) )
			{
				$('#theme_location_top_nav').removeClass( "topNav_afterHeaderImage" );
			}

		}

	});
});
