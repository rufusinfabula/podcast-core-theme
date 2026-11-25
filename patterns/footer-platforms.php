<?php
/**
 * Title: Footer platform icons
 * Slug: podcast-core-theme/footer-platforms
 * Inserter: no
 *
 * @package PodcastCoreTheme
 */

$pct_services = array(
	'spotify_url' => 'spotify',
	'youtube_url' => 'youtube',
	'rss_url'     => 'feed',
);
$pct_links    = array_intersect_key( podcast_core_theme_platform_links(), $pct_services );
if ( ! $pct_links ) {
	return;
}
?>
<!-- wp:social-links {"openInNewTab":true,"className":"is-style-logos-only"} -->
<ul class="wp-block-social-links is-style-logos-only">
	<?php foreach ( $pct_links as $pct_key => $pct_link ) : ?>
	<!-- wp:social-link <?php echo wp_json_encode( array( 'url' => esc_url_raw( $pct_link['url'] ), 'service' => $pct_services[ $pct_key ] ), JSON_UNESCAPED_SLASHES | JSON_HEX_TAG | JSON_HEX_AMP ); ?> /-->
	<?php endforeach; ?>
</ul>
<!-- /wp:social-links -->
