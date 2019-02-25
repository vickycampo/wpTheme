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
?>
<nav class="navigation clearfix">
	<ul class="pager">
		<?php
		if ( is_singular() )
		{ ?>
			<li class="previous"><?php next_post_link( '%link', '&larr; %title' ); ?></li>
			<li class="next"><?php previous_post_link( '%link', '%title &rarr;' ); ?></li>
		<?php
		}
		else
		{
			if (function_exists('wp_pagenavi'))
			{
				wp_pagenavi();
			}
			else
			{
				?>
				<li class="previous"><?php next_posts_link(__('&larr; Older Entries','wpTheme')); ?></li>
				<li class="next"><?php previous_posts_link(__('Newer Entries &rarr;','wpTheme')); ?></li>
			<?php
			}
		}
		?>
	</ul>
</nav>
