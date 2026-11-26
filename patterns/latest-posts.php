<?php
/**
 * Title: Latest news
 * Slug: podcast-core-theme/latest-posts
 * Categories: podcast-core-theme, query
 * Keywords: news, blog, posts
 * Description: The three most recent blog posts.
 *
 * @package PodcastCoreTheme
 */

$pct_section = podcast_core_theme_section( 'news-section', array( 'align' => 'wide', 'className' => 'pct-section pct-section--news' ) );
?>
<?php echo $pct_section[0]; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
	<!-- wp:heading -->
	<h2 class="wp-block-heading"><?php esc_html_e( 'Latest news', 'podcast-core-theme' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:query {"query":{"perPage":3,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","inherit":false}} -->
	<div class="wp-block-query">
		<!-- wp:post-template {"layout":{"type":"grid","columnCount":3}} -->
			<!-- wp:group {"className":"pct-card","layout":{"type":"flex","orientation":"vertical"}} -->
			<div class="wp-block-group pct-card">
				<!-- wp:post-featured-image {"isLink":true,"aspectRatio":"16/9"} /-->
				<!-- wp:post-title {"isLink":true,"level":3} /-->
				<!-- wp:post-excerpt {"excerptLength":20} /-->
			</div>
			<!-- /wp:group -->
		<!-- /wp:post-template -->

		<!-- wp:query-no-results -->
			<!-- wp:paragraph -->
			<p><?php esc_html_e( 'No news published yet.', 'podcast-core-theme' ); ?></p>
			<!-- /wp:paragraph -->
		<!-- /wp:query-no-results -->
	</div>
	<!-- /wp:query -->
<?php echo $pct_section[1]; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
