<?php
/**
 * Title: Episode archive content
 * Slug: podcast-core-theme/template-archive-episodes
 * Inserter: no
 *
 * @package PodcastCoreTheme
 */

?>
<!-- wp:group {"tagName":"main","className":"pct-main pct-section","layout":{"type":"constrained"}} -->
<main class="wp-block-group pct-main pct-section">
	<!-- wp:query-title {"type":"archive","showPrefix":false,"align":"wide"} /-->
	<!-- wp:term-description {"align":"wide"} /-->
	<!-- wp:query {"query":{"inherit":true},"align":"wide"} -->
	<div class="wp-block-query alignwide">
		<!-- wp:post-template {"layout":{"type":"grid","columnCount":3}} -->
			<!-- wp:group {"className":"pct-card","layout":{"type":"flex","orientation":"vertical"}} -->
			<div class="wp-block-group pct-card">
				<!-- wp:post-featured-image {"isLink":true,"aspectRatio":"16/9"} /-->
				<!-- wp:paragraph {"metadata":{"bindings":{"content":{"source":"core/post-meta","args":{"key":"podcast_core_episode_number"}}}},"className":"pct-episode-number"} -->
				<p class="pct-episode-number"></p>
				<!-- /wp:paragraph -->
				<!-- wp:post-title {"isLink":true,"level":2,"fontSize":"large"} /-->
				<!-- wp:post-date /-->
				<!-- wp:post-excerpt {"excerptLength":24} /-->
			</div>
			<!-- /wp:group -->
		<!-- /wp:post-template -->

		<!-- wp:query-pagination {"layout":{"type":"flex","justifyContent":"center"}} -->
			<!-- wp:query-pagination-previous /-->
			<!-- wp:query-pagination-numbers /-->
			<!-- wp:query-pagination-next /-->
		<!-- /wp:query-pagination -->

		<!-- wp:query-no-results -->
			<!-- wp:paragraph -->
			<p><?php esc_html_e( 'Nothing found here yet.', 'podcast-core-theme' ); ?></p>
			<!-- /wp:paragraph -->
		<!-- /wp:query-no-results -->
	</div>
	<!-- /wp:query -->
</main>
<!-- /wp:group -->
