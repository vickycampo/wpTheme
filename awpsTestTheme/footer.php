<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package awpstt
 */

?>

	</div><!-- #content -->

	<?php
	if ( is_customize_preview() ) {
		echo '<div id="awpstt-footer-control" style="margin-top:-30px;position:absolute;"></div>';
	}
	?>

	<footer id="colophon" class="site-footer container-fluid" role="contentinfo">

		<div class="site-info">
			<?php
				printf(
					'<a %s href="%s">%s</a>',
					is_customize_preview() ? 'id="awpstt-footer-copy-control"' : '',
					esc_url( __( 'https://github.com/Alecaddd/awpstt', 'awpstt' ) ),
					esc_html( awpstt\Api\Customizer::text( 'awpstt_footer_copy_text' ) )
				);
			?>
			<span class="sep"> | </span>
			<?php
				/* translators: %1: Theme name. */

				/* translators: %2: Author name. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'awpstt' ), 'AWPS', '<a href="http://alecaddd.com/" rel="designer">Alecaddd</a>' );
			?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
