<?php
/**
 * Title: Page not found content
 * Slug: podcast-core-theme/template-404
 * Inserter: no
 *
 * @package PodcastCoreTheme
 */

?>
<!-- wp:group {"tagName":"main","className":"pct-main pct-section","layout":{"type":"constrained"}} -->
<main class="wp-block-group pct-main pct-section">
	<!-- wp:heading {"level":1} -->
	<h1 class="wp-block-heading"><?php esc_html_e( 'Page not found', 'podcast-core-theme' ); ?></h1>
	<!-- /wp:heading -->
	<!-- wp:paragraph -->
	<p><?php esc_html_e( 'The page you are looking for does not exist or has moved. Try a search:', 'podcast-core-theme' ); ?></p>
	<!-- /wp:paragraph -->
	<!-- wp:search {"label":"<?php echo esc_attr__( 'Search', 'podcast-core-theme' ); ?>","showLabel":false,"buttonText":"<?php echo esc_attr__( 'Search', 'podcast-core-theme' ); ?>"} /-->
</main>
<!-- /wp:group -->
