<?php
/**
 * Title: Special series banner
 * Slug: podcast-core-theme/cta-series-banner
 * Categories: podcast-core-theme, call-to-action, banner
 * Keywords: series, special, cta, banner, podcast
 * Description: Full-width banner promoting a special series, with a button to its archive.
 *
 * @package PodcastCoreTheme
 */

$pct_series = podcast_core_theme_featured_series();
$pct_link   = $pct_series ? get_term_link( $pct_series ) : get_post_type_archive_link( 'podcast_episode' );
$pct_name   = $pct_series ? $pct_series->name : __( 'Series name', 'podcast-core-theme' );
$pct_section = podcast_core_theme_section( 'cta-section', array( 'align' => 'full', 'className' => 'pct-cta pct-cta--banner', 'backgroundColor' => 'contrast', 'textColor' => 'base' ) );
?>
<?php echo $pct_section[0]; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
	<!-- wp:columns {"verticalAlignment":"center","align":"wide"} -->
	<div class="wp-block-columns alignwide are-vertically-aligned-center">
		<!-- wp:column {"verticalAlignment":"center","width":"58%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:58%">
			<!-- wp:paragraph {"className":"pct-eyebrow"} -->
			<p class="pct-eyebrow"><?php esc_html_e( 'Special series', 'podcast-core-theme' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"textColor":"base"} -->
			<h2 class="wp-block-heading has-base-color has-text-color"><?php echo esc_html( $pct_name ); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph -->
			<p><?php esc_html_e( 'A short series that goes deeper into one theme, episode after episode. Tell listeners why it is worth their time.', 'podcast-core-theme' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:buttons -->
			<div class="wp-block-buttons">
				<!-- wp:button {"backgroundColor":"accent","textColor":"contrast"} -->
				<div class="wp-block-button"><a class="wp-block-button__link has-contrast-color has-accent-background-color has-text-color has-background wp-element-button" href="<?php echo esc_url( (string) $pct_link ); ?>"><?php esc_html_e( 'Listen to the series', 'podcast-core-theme' ); ?></a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center","width":"42%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:42%">
			<!-- wp:image {"sizeSlug":"large","className":"pct-cta__image"} -->
			<figure class="wp-block-image size-large pct-cta__image"><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/hero.svg' ); ?>" alt=""/></figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
<?php echo $pct_section[1]; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
