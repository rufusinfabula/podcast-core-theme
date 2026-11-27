<?php
/**
 * Title: Listen on
 * Slug: podcast-core-studio/platform-links
 * Categories: podcast-core-studio, call-to-action
 * Keywords: spotify, apple, youtube, rss, listen
 * Description: Buttons to the platforms set in Podcast → Settings → Podcast.
 *
 * @package PodcastCoreTheme
 */

$pct_links = podcast_core_theme_platform_links();
if ( ! $pct_links ) {
	return;
}
?>
<!-- wp:buttons {"className":"pct-platform-links"} -->
<div class="wp-block-buttons pct-platform-links">
	<?php foreach ( $pct_links as $pct_link ) : ?>
	<!-- wp:button -->
	<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( $pct_link['url'] ); ?>"><?php echo esc_html( $pct_link['label'] ); ?></a></div>
	<!-- /wp:button -->
	<?php endforeach; ?>
</div>
<!-- /wp:buttons -->
