<?php
/*

@package WordPress
@subpackage wpTheme
@since wpTheme

	========================================
		PART - NAVIGATION
	========================================
* This part displays the next and previous options
*/


global $wp_query;
$max_num_pages = $wp_query->max_num_pages;

?>
<script>
var max_num_pages = "<?php echo ($max_num_pages);?>";
<?php
if ( ( count ( $wp_query->query ) ) > 0 )
{
	?>
	var wp_query_string='';
	<?php
	/* Send the query values to the jquery */
	foreach ( $wp_query->query as $filter_tag => $filter_value )
	{
		?>
		if (wp_query_string != '')
		{
			wp_query_string += ',';
		}

		wp_query_string += "<?php echo ($filter_tag); ?>:<?php echo ($filter_value); ?>";
		<?php
	}

}
else
{
	?>
	var wp_query_string = '';
	<?php
}
?>
</script>
<?php
// echo ('max_num_pages - ' . $max_num_pages . '<br>');
if ( $max_num_pages > 1 )
{
	?>
	<div class="container text-center load-more-div">
		<a class="btn btn-lg btn-default load-more-a" data-page="1" data-url="<?php echo admin_url('admin-ajax.php'); ?>">
			<span id="load_more_icon" class="fas fa-sync-alt"></span> Load More
		</a>
	</div>
	<?php
}?>
