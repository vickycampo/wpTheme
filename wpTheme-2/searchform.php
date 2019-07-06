<?php
/*

@package WordPress
@subpackage wpTheme
@since wpTheme

	=========================
		SEARCH FORM
	=========================
* Part that generates the search form.
*/
?>

<?php
     //Set a Variable with the search text
	$wpTheme_searchtext = __('Search this site', 'wpTheme');
?>
<!-- The Search form -->
<form method="get" role="form" class="form-inline" id="searchform" action="<?php echo esc_url( home_url() ); ?>/">
	<!-- Div to contain all the fields -->
	<div class="form-group">
		<label class="sr-only" for="search">
			<?php echo esc_attr( $wpTheme_searchtext ); ?>
		</label>
		<input type="search" class="form-control" placeholder="<?php echo esc_attr( $wpTheme_searchtext ); ?>" name="s" id="s" />
		<button type="submit" id="searchsubmit" class="btn btn-default"><?php esc_attr_e('Go', 'wpTheme'); ?></button>
	</div>
</form>
