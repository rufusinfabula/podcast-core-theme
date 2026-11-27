<?php
/**
 * Title: Header sign-up button
 * Slug: podcast-core-studio/header-signup
 * Inserter: no
 * Description: "Subscribe to the podcast" button, shown only when an Email sign-up address is set in Podcast → Settings → Podcast.
 *
 * @package PodcastCoreTheme
 */

$pct_signup = function_exists( 'podcast_core_get_setting' ) ? (string) podcast_core_get_setting( 'newsletter_url' ) : '';
if ( '' === $pct_signup ) {
	return;
}
?>
<!-- wp:buttons {"className":"pct-header-signup"} -->
<div class="wp-block-buttons pct-header-signup">
	<!-- wp:button {"className":"pct-signup-button"} -->
	<div class="wp-block-button pct-signup-button"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( $pct_signup ); ?>"><?php esc_html_e( 'Subscribe to the podcast', 'podcast-core-studio' ); ?></a></div>
	<!-- /wp:button -->
</div>
<!-- /wp:buttons -->
