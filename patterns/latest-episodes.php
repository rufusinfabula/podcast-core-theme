<?php
/**
 * Title: Latest episodes
 * Slug: podcast-core-theme/latest-episodes
 * Categories: podcast-core-theme, query
 * Keywords: episodes, latest, podcast
 * Description: The three most recent episodes with a link to the archive.
 *
 * @package PodcastCoreTheme
 */

if ( ! podcast_core_theme_has_episodes() ) {
	return;
}
$pct_section = podcast_core_theme_section( 'episodes-section', array( 'align' => 'wide', 'className' => 'pct-section' ) );
?>
<?php echo $pct_section[0]; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
	<!-- wp:group {"className":"pct-section__header","layout":{"type":"flex","justifyContent":"space-between","flexWrap":"wrap"}} -->
	<div class="wp-block-group pct-section__header">
		<!-- wp:heading -->
		<h2 class="wp-block-heading"><?php esc_html_e( 'Latest episodes', 'podcast-core-theme' ); ?></h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph -->
		<p><a href="<?php echo esc_url( (string) get_post_type_archive_link( 'podcast_episode' ) ); ?>"><?php esc_html_e( 'All episodes →', 'podcast-core-theme' ); ?></a></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<!-- wp:query {"query":{"perPage":3,"pages":0,"offset":0,"postType":"podcast_episode","order":"desc","orderBy":"date","inherit":false}} -->
	<div class="wp-block-query">
		<!-- wp:post-template {"layout":{"type":"grid","columnCount":3}} -->
			<!-- wp:group {"className":"pct-card","layout":{"type":"flex","orientation":"vertical"}} -->
			<div class="wp-block-group pct-card">
				<!-- wp:post-featured-image {"isLink":true,"aspectRatio":"16/9"} /-->
				<!-- wp:paragraph {"metadata":{"bindings":{"content":{"source":"core/post-meta","args":{"key":"podcast_core_episode_number"}}}},"className":"pct-episode-number"} -->
				<p class="pct-episode-number"></p>
				<!-- /wp:paragraph -->
				<!-- wp:post-title {"isLink":true,"level":3} /-->
				<!-- wp:post-date /-->
			</div>
			<!-- /wp:group -->
		<!-- /wp:post-template -->

		<!-- wp:query-no-results -->
			<!-- wp:paragraph -->
			<p><?php esc_html_e( 'No episodes published yet.', 'podcast-core-theme' ); ?></p>
			<!-- /wp:paragraph -->
		<!-- /wp:query-no-results -->
	</div>
	<!-- /wp:query -->
<?php echo $pct_section[1]; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
