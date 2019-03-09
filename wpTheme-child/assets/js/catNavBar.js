/*

@package WordPress
@subpackage wpChildTheme
@since wpTheme

	====================================
		CATEGORY NAVIGATION BAR JAVASCRIPT
	====================================
*
* Set the styles for the top navigation bar
*
*/
/* Variables for the */
/*** Adds events to the category bar dropdowns ***/
function ChanceCategory(target)
{

     /* We are here because a cat has been clicked */
     /* We determine the ids based on the taret we recieved */
     /* We devide the target by - */
     var ids = target.split("-");
     /* we place the ids in their variables */
     var numberOfIds = ids.length;
     if ( numberOfIds > 0)
     {
          var mainId = ids[0];
     }
     else
     {
          var mainId = 0;
     }
     if ( numberOfIds > 1)
     {
          var parentId = ids[1];
     }
     else
     {
          var parentId = 0;
     }
     if ( numberOfIds >2)
     {
          var kidId = ids[2];
     }
     else
     {
          var kidId = 0;
     }
     if ( numberOfIds >3)
     {
          var grandKid = ids[3];
     }
     else
     {
          var grandKid = 0;
     }
     /* Now that we have the ids we get the name of the categroy we want to filter */
     var filterId = target;
     /* We check if the filter exists we don't add it again */
     if ( document.getElementById(target + '_filter') )
     {

     }
     else
     {
          var targeted_link = document.getElementById( target );
          var filterElement = createFilterElementDiv ( filterId, targeted_link );
          document.getElementById('sub-cat-filters').appendChild(filterElement);

     }

}
function createFilterElementDiv (filterId , targeted )
{
     /* We get from the values we need for the filter */
     var text = targeted.lastChild.data;
     /* Create a div to add the filter info */
     var filterBoxDiv = document.createElement('div');
     filterBoxDiv.id = filterId + '_filter';

     filterBoxDiv.className = 'sub-cat-filters-element';

     /* Create a div where we are adding the text */
     filterName = document.createElement('div');
     filterName.className = 'sub-cat-filters-name';
     filterName.id = filterId + '_name';
     filterName.innerHTML = text;

     /* Create a div where we are adding the close cross */
     filterClose = document.createElement('div');
     filterClose.className = 'sub-cat-filters-close';
     filterClose.className += " fa fa-times";
     filterClose.id = filterId + '_close';
     filterClose.addEventListener("click", closeMe);
     //
     // filterClose.innerHTML = 'x';

     /* Add the other divs to the main div */

     filterBoxDiv.appendChild(filterClose);
     filterBoxDiv.appendChild(filterName);


     return (filterBoxDiv);
}
function closeMe(event)
{
     // console.log ('close me - ' , event.target.id);
     var toClose = event.target.id.replace("_close", "_filter");
     document.getElementById(toClose).parentElement.removeChild(document.getElementById(toClose));
}
