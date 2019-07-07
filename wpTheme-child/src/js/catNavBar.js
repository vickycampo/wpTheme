/*

@package WordPress
@subpackage wpChildTheme
@since wpTheme

	==========================================
		CATEGORY NAVIGATION BAR JAVASCRIPT
	==========================================
*
*    The functions for when the category / taxonomy bar is activated.
*/
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
	var TaxonomyName = '';
	var PostType = '';
	var ajaxurl = '';
	var CurrentPage = 0;
	var maxnumpages;

     addEventListeners ();
	/*** Categories ***/
	/* Add Event Listeners */
     function addEventListeners ()
     {
          /* Add the event listener to the Category Drop down */
          $('#sub-cat-div').on('click', '.dropdown-item', addCategoryFilter);
          /* Add the event listener to the closButtons*/
          $(document).on('click', '.sub-cat-filters-close', removeCategoryFilter);
          /* add the event Listener for the Load More button */
     	if ( $('.sub-cat-main-div').length > 0)
     	{
     		$('.load-more-a').unbind('click');
     		$(document).on('click','.load-more-a', load_more);
     	}
     }

	/* create a function to add filter to div */
	function addCategoryFilter(event)
	{
		/* Get the main category fron the page */
		MainCategoryId = main_category;
		TaxonomyName = taxonomyName;
		PostType = thisPostType;
		CurrentPage = 0;

		/* The url that processes the ajax */
		ajaxurl = admin_url;
		/* Get the main Category */

		if (MainCategoryId != '')
		{
			ActiveFilterList[0] = MainCategoryId;
		}
		else if (TaxonomyName != '')
		{
			ActiveFilterList[0] = TaxonomyName;
		}

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
			CurrentPage = 0;
			trigger_content_change ();

		}
	}
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
			CurrentPage = 0;
			/* Change the content that is being filter */
			trigger_content_change ();

		}
	}
	/* Change the content that is being filter */
	function trigger_content_change ()
	{
		var filter_categories = new Array;
		/* Check how many items we have to filter */

		var ListOfitems = '';
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
			for (i in filter_categories )
			{
				/* We don't add the main category, if we have more than one */
				if ( ( filter_categories.length > 1 ) && ( i == 0) )
				{

				}
				else
				{
					ListOfitems += filter_categories[i] + '-';
				}

			}
		}

		/* if we have filters_categories, we go and get results */
		/* Prepare the sting to send the values */


		if ( MainCategoryId != '' )
		{
			var queryType = 'CATEGORY';
			var name = MainCategoryId;
			var field= 'category_id';
			if ( ListOfitems == '')
			{
				ListOfitems = MainCategoryId;
			}
		}
		else if ( TaxonomyName != '' )
		{

			var queryType = 'TAXONOMY';
			var name = TaxonomyName;
			var field= 'term_id';
			if ( ListOfitems == TaxonomyName + '-')
			{

				ListOfitems = TaxonomyName;

			}
		}

		if ( ListOfitems != '')
		{

			$('#load_more_icon').removeClass('fa-sync-alt');
			$('#load_more_icon').addClass('fa-spinner');
			$('#load_more_icon').addClass('fa-spin');
			$.ajax
	          ({
				url : ajaxurl,   //The url for the ajax file
				type : 'post',   //The method that we are going to use
				data :           //Send values to the ajax function
	               {
					page : CurrentPage,   //Sending the variable page
					queryType : queryType, //Sending the previous query
					name: name,
					field: field,
					ListOfitems: ListOfitems,
					post_type : PostType, //Sending the previous query
					action: 'wpTheme_read_more' //The name of the funciton that we want to call
				},
				error : function( response )    //return on error
	               {
					$('#load_more_icon').addClass('fa-exclamation-circle');
					$('#load_more_icon').removeClass('fa-spinner');
					$('#load_more_icon').removeClass('fa-spin');
				},
				success : function( response )  //return on success
	               {
					/* if the current page is 0 we reset the previous content */
					if ( CurrentPage == 0 )
					{
						$('.read-more-results').empty();
					}

					$('.read-more-results').append( response );

					$('#load_more_icon').addClass('fa-sync-alt');
					$('#load_more_icon').removeClass('fa-spinner');
					$('#load_more_icon').removeClass('fa-spin');

					if ( max_num_pages > 1 )
					{
						$('.load-more-div').addClass('show_element');
					}
					else
					{
						$('.load-more-div').addClass('hide_element');
						$('.load-more-div').removeClass('show_element');

					}
				}
	          });

		}

	}

     function load_more ()
     {
          MainCategoryId = main_category;
          TaxonomyName = taxonomyName;
          PostType = thisPostType;
          ajaxurl = admin_url;
          maxnumpages = max_num_pages;


          trigger_content_change ();
          if ( CurrentPage == max_num_pages -1 )
          {

               $('.load-more-div').addClass('hide_element');
               $('.load-more-div').removeClass('show_element');
          }
          CurrentPage++;

     }


});
