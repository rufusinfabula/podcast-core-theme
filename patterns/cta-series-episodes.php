<?php
/**
 * Title: Series spotlight with episodes
 * Slug: podcast-core-theme/cta-series-episodes
 * Categories: podcast-core-theme, call-to-action, query
 * Keywords: series, special, episodes, spotlight
 * Description: Introduces a series and lists its latest episodes, with a button to the series archive.
 *
 * @package PodcastCoreTheme
 */

if ( ! podcast_core_theme_has_episodes() ) {
	return;
}
$pct_series = podcast_core_theme_featured_series();
$pct_link   = $pct_series ? get_term_link( $pct_series ) : get_post_type_archive_link( 'podcast_episode' );
$pct_name   = $pct_series ? $pct_series->name : __( 'Series name', 'podcast-core-theme' );
$pct_query  = array(
	'perPage'  => 3,
	'pages'    => 0,
	'offset'   => 0,
	'postType' => 'podcast_episode',
	'order'    => 'desc',
	'orderBy'  => 'date',
	'inherit'  => false,
);
if ( $pct_series ) {
	$pct_query['taxQuery'] = array( 'podcast_series' => array( $pct_series->term_id ) );
}
$pct_section = podcast_core_theme_section( 'cta-section', array( 'align' => 'wide', 'className' => 'pct-cta pct-cta--spotlight', 'backgroundColor' => 'surface' ) );
?>
<?php echo $pct_section[0]; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
	<!-- wp:columns {"align":"wide"} -->
	<div class="wp-block-columns alignwide">
		<!-- wp:column {"width":"34%"} -->
		<div class="wp-block-column" style="flex-basis:34%">
			<!-- wp:paragraph {"className":"pct-eyebrow"} -->
			<p class="pct-eyebrow"><?php esc_html_e( 'Series', 'podcast-core-theme' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:heading -->
			<h2 class="wp-block-heading"><?php echo esc_html( $pct_name ); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph -->
			<p><?php esc_html_e( 'Describe the series in one or two sentences: who you talk to and what listeners will discover.', 'podcast-core-theme' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:buttons -->
			<div class="wp-block-buttons">
				<!-- wp:button -->
				<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( (string) $pct_link ); ?>"><?php esc_html_e( 'All episodes of the series', 'podcast-core-theme' ); ?></a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"width":"66%"} -->
		<div class="wp-block-column" style="flex-basis:66%">
			<!-- wp:query <?php echo wp_json_encode( array( 'query' => $pct_query ) ); ?> -->
			<div class="wp-block-query">
				<!-- wp:post-template {"layout":{"type":"grid","columnCount":3}} -->
					<!-- wp:group {"className":"pct-card","layout":{"type":"flex","orientation":"vertical"}} -->
					<div class="wp-block-group pct-card">
						<!-- wp:post-featured-image {"isLink":true,"aspectRatio":"16/9"} /-->
						<!-- wp:paragraph {"metadata":{"bindings":{"content":{"source":"core/post-meta","args":{"key":"podcast_core_episode_number"}}}},"className":"pct-episode-number"} -->
						<p class="pct-episode-number"></p>
						<!-- /wp:paragraph -->
						<!-- wp:post-title {"isLink":true,"level":3,"fontSize":"medium"} /-->
					</div>
					<!-- /wp:group -->
				<!-- /wp:post-template -->

				<!-- wp:query-no-results -->
					<!-- wp:paragraph -->
					<p><?php esc_html_e( 'No episodes in this series yet.', 'podcast-core-theme' ); ?></p>
					<!-- /wp:paragraph -->
				<!-- /wp:query-no-results -->
			</div>
			<!-- /wp:query -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
<?php echo $pct_section[1]; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
