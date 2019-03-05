<?php
/*
@package WordPress
@subpackage wpTheme
@since wpTheme
	================================================
		TEMPLATE PART: CHILD MAIN NAVIGATION BAR
	================================================
* Template part in charge of placing and styling the main navigation bar.
*/
?>
<?php
wp_reset_query();
include('subcategories-functions.php' );
//firstly, load data for your child category
$categories_values = wpTheme_get_catValues ();
// echo ('<pre>');
// print_r ($categories_values);
// echo ('</pre>');
?>
<nav class="">
     <div class="dropdown m-1">
          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               Dropdown button
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
               <a class="dropdown-item" href="#">Action</a>
               <a class="dropdown-item" href="#">Another action</a>
               <a class="dropdown-item" href="#">Something else here</a>
          </div>
     </div>
</nav>
