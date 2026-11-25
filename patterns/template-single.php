<?php
/**
 * Title: Post content
 * Slug: podcast-core-theme/template-single
 * Inserter: no
 *
 * @package PodcastCoreTheme
 */

?>
<!-- wp:group {"tagName":"main","className":"pct-main pct-section","layout":{"type":"constrained"}} -->
<main class="wp-block-group pct-main pct-section">
	<!-- wp:post-title {"level":1} /-->
	<!-- wp:group {"layout":{"type":"flex","flexWrap":"wrap"}} -->
	<div class="wp-block-group">
		<!-- wp:post-date /-->
		<!-- wp:post-terms {"term":"category"} /-->
	</div>
	<!-- /wp:group -->
	<!-- wp:post-featured-image {"align":"wide","aspectRatio":"16/9"} /-->
	<!-- wp:post-content {"layout":{"type":"constrained"}} /-->
	<!-- wp:post-terms {"term":"post_tag","prefix":"<?php echo esc_attr( __( 'Tags:', 'podcast-core-theme' ) . ' ' ); ?>"} /-->
	<!-- wp:pattern {"slug":"podcast-core-theme/post-navigation"} /-->
</main>
<!-- /wp:group -->
