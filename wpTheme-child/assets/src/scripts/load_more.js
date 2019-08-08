jQuery(document).ready( function($)
{
     $(document).on('click','.load-more-a', load_more);

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
}
