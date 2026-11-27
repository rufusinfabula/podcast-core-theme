<?php
/**
 * Title: Email sign-up
 * Slug: podcast-core-studio/newsletter
 * Categories: podcast-core-studio, call-to-action
 * Keywords: newsletter, subscribe, email, sign up, updates
 * Description: A banner inviting listeners to get new episodes by email. The button uses the Email sign-up address in Podcast → Settings → Podcast.
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
		<h3 class="wp-block-heading"><?php esc_html_e( 'Get new episodes in your inbox', 'podcast-core-studio' ); ?></h3>
		<!-- /wp:heading -->

		<!-- wp:paragraph -->
		<p><?php esc_html_e( 'Sign up and get every new episode by email, as soon as it is out.', 'podcast-core-studio' ); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<!-- wp:buttons -->
	<div class="wp-block-buttons">
		<!-- wp:button -->
		<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( $pct_newsletter ? $pct_newsletter : '#' ); ?>"><?php esc_html_e( 'Sign up', 'podcast-core-studio' ); ?></a></div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->
</div>
<!-- /wp:group -->
