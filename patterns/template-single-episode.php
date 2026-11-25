<?php
/**
 * Title: Episode content
 * Slug: podcast-core-theme/template-single-episode
 * Inserter: no
 *
 * @package PodcastCoreTheme
 */

?>
<!-- wp:group {"tagName":"main","className":"pct-main pct-section","layout":{"type":"constrained"}} -->
<main class="wp-block-group pct-main pct-section">
	<!-- wp:post-terms {"term":"podcast_series","prefix":"<?php echo esc_attr( __( 'Series:', 'podcast-core-theme' ) . ' ' ); ?>"} /-->
	<!-- wp:post-title {"level":1} /-->
	<!-- wp:post-date /-->
	<!-- wp:podcast-core/episode-player {"align":"wide"} /-->
	<!-- wp:post-content {"layout":{"type":"constrained"}} /-->
	<!-- wp:pattern {"slug":"podcast-core-theme/post-navigation"} /-->
</main>
<!-- /wp:group -->
