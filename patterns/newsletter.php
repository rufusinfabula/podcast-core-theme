<?php
/**
 * Title: Newsletter call to action
 * Slug: podcast-core-theme/newsletter
 * Categories: podcast-core-theme, call-to-action
 * Keywords: newsletter, subscribe, email
 * Description: A banner inviting visitors to subscribe to the newsletter. The button uses the Newsletter address in Settings → Podcast.
 *
 * @package PodcastCoreTheme
 */

$pct_newsletter = function_exists( 'podcast_core_get_setting' ) ? (string) podcast_core_get_setting( 'newsletter_url' ) : '';
?>
<!-- wp:group {"align":"wide","className":"pct-newsletter","style":{"border":{"radius":"12px"},"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|50","right":"var:preset|spacing|50"}}},"backgroundColor":"secondary","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
<div class="wp-block-group alignwide pct-newsletter has-secondary-background-color has-background" style="border-radius:12px;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--50)">
	<!-- wp:group {"layout":{"type":"constrained","contentSize":"560px","justifyContent":"left"}} -->
	<div class="wp-block-group">
		<!-- wp:heading {"level":3} -->
		<h3 class="wp-block-heading"><?php esc_html_e( 'Get new episodes in your inbox', 'podcast-core-theme' ); ?></h3>
		<!-- /wp:heading -->

		<!-- wp:paragraph -->
		<p><?php esc_html_e( 'Subscribe to the newsletter: episodes, behind the scenes and stories.', 'podcast-core-theme' ); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<!-- wp:buttons -->
	<div class="wp-block-buttons">
		<!-- wp:button -->
		<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( $pct_newsletter ? $pct_newsletter : '#' ); ?>"><?php esc_html_e( 'Subscribe', 'podcast-core-theme' ); ?></a></div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->
</div>
<!-- /wp:group -->
