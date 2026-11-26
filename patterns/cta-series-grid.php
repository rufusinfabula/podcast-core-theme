<?php
/**
 * Title: All series
 * Slug: podcast-core-theme/cta-series-grid
 * Categories: podcast-core-theme, call-to-action
 * Keywords: series, shows, archive, grid
 * Description: One card per series with description, number of episodes and a link to its archive. Cards are created from the series that exist when the pattern is inserted.
 *
 * @package PodcastCoreTheme
 */

if ( ! taxonomy_exists( 'podcast_series' ) ) {
	return;
}
$pct_terms = get_terms(
	array(
		'taxonomy'   => 'podcast_series',
		'hide_empty' => false,
		'number'     => 6,
	)
);
if ( is_wp_error( $pct_terms ) || ! $pct_terms ) {
	return;
}
$pct_columns = min( 3, count( $pct_terms ) );
$pct_section = podcast_core_theme_section( 'cta-section', array( 'align' => 'wide', 'className' => 'pct-section pct-series-grid' ) );
?>
<?php echo $pct_section[0]; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
	<!-- wp:heading -->
	<h2 class="wp-block-heading"><?php esc_html_e( 'Our series', 'podcast-core-theme' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:group {"layout":{"type":"grid","columnCount":<?php echo (int) $pct_columns; ?>}} -->
	<div class="wp-block-group">
		<?php foreach ( $pct_terms as $pct_term ) : ?>
		<!-- wp:group {"className":"pct-series-card","backgroundColor":"surface","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
		<div class="wp-block-group pct-series-card has-surface-background-color has-background">
			<!-- wp:heading {"level":3} -->
			<h3 class="wp-block-heading"><?php echo esc_html( $pct_term->name ); ?></h3>
			<!-- /wp:heading -->

			<!-- wp:paragraph -->
			<p><?php echo esc_html( $pct_term->description ? wp_trim_words( $pct_term->description, 24 ) : __( 'Add a short description of this series.', 'podcast-core-theme' ) ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"className":"pct-series-card__count"} -->
			<p class="pct-series-card__count">
				<?php
				/* translators: %s: number of episodes */
				echo esc_html( sprintf( _n( '%s episode', '%s episodes', $pct_term->count, 'podcast-core-theme' ), number_format_i18n( $pct_term->count ) ) );
				?>
			</p>
			<!-- /wp:paragraph -->

			<!-- wp:buttons -->
			<div class="wp-block-buttons">
				<!-- wp:button {"className":"is-style-outline"} -->
				<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( (string) get_term_link( $pct_term ) ); ?>"><?php esc_html_e( 'Listen', 'podcast-core-theme' ); ?></a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:group -->
		<?php endforeach; ?>
	</div>
	<!-- /wp:group -->
<?php echo $pct_section[1]; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
