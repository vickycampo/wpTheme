<?php
/**
* @package mkt-recipe-plugin
*/
/*
     ===================================
          ADMIN PAGE - DASHBOARD PAGE
     ===================================
*
*
*/
?>
<div class="wrap">
	<h1>MTK Recipe Plugin</h1>
	<?php settings_errors(); ?>

	<form method="post" action="options.php">
		<?php
			settings_fields( 'mtk_options_group' );
			do_settings_sections( 'mtk_plugin' );
			submit_button();
		?>
	</form>
</div>
