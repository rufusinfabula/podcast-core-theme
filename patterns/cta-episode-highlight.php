<?php
/**
 * Title: Special episode
 * Slug: podcast-core-studio/cta-episode-highlight
 * Categories: podcast-core-studio, call-to-action, query
 * Keywords: episode, special, featured, highlight
 * Description: One episode in the spotlight with cover, title, excerpt and a listen button. By default the latest episode of a series; change the filter to pick another one.
 *
 * @package PodcastCoreTheme
 */

if ( ! podcast_core_theme_has_episodes() ) {
	return;
}
$pct_series = podcast_core_theme_featured_series();
$pct_query  = array(
	'perPage'  => 1,
	'pages'    => 0,
	'offset'   => 0,
	'postType' => 'podcast_episode',
	'order'    => 'desc',
	'orderBy'  => 'date',
	'inherit'  => false,
);
if ( $pct_series ) {
	$pct_query['taxQuery'] = array( 'podcast_series' => array( $pct_series->term_id ) );
}
$pct_section = podcast_core_theme_section( 'cta-section', array( 'align' => 'wide', 'className' => 'pct-cta pct-cta--episode' ) );
?>
<?php echo $pct_section[0]; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
	<!-- wp:query <?php echo wp_json_encode( array( 'query' => $pct_query ) ); ?> -->
	<div class="wp-block-query">
		<!-- wp:post-template -->
			<!-- wp:columns {"verticalAlignment":"center"} -->
			<div class="wp-block-columns are-vertically-aligned-center">
				<!-- wp:column {"verticalAlignment":"center","width":"50%"} -->
				<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:50%">
					<!-- wp:post-featured-image {"isLink":true,"aspectRatio":"16/9"} /-->
				</div>
				<!-- /wp:column -->

				<!-- wp:column {"verticalAlignment":"center","width":"50%"} -->
				<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:50%">
					<!-- wp:paragraph {"className":"pct-eyebrow"} -->
					<p class="pct-eyebrow"><?php esc_html_e( 'Special episode', 'podcast-core-studio' ); ?></p>
					<!-- /wp:paragraph -->
					<!-- wp:post-title {"isLink":true,"level":2} /-->
					<!-- wp:post-terms {"term":"podcast_series"} /-->
					<!-- wp:post-excerpt {"excerptLength":30} /-->
					<!-- wp:read-more {"content":"<?php echo esc_attr( __( 'Listen now →', 'podcast-core-studio' ) ); ?>","className":"pct-cta__more"} /-->
				</div>
				<!-- /wp:column -->
			</div>
			<!-- /wp:columns -->
		<!-- /wp:post-template -->
	</div>
	<!-- /wp:query -->
<?php echo $pct_section[1]; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
