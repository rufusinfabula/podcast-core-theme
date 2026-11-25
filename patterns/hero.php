<?php
/**
 * Title: Hero
 * Slug: podcast-core-theme/hero
 * Categories: podcast-core-theme, banner, featured
 * Keywords: hero, podcast, intro
 * Description: Tagline on coloured lines (Highlighted line style), subtitle, platform buttons and one or more images. Add several images to get a crossfade slideshow.
 *
 * @package PodcastCoreTheme
 */

?>
<!-- wp:group {"align":"full","className":"pct-hero","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull pct-hero">
	<!-- wp:columns {"verticalAlignment":"center","align":"wide"} -->
	<div class="wp-block-columns alignwide are-vertically-aligned-center">
		<!-- wp:column {"verticalAlignment":"center","width":"55%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:55%">
			<!-- wp:site-title {"level":1,"isLink":false,"className":"screen-reader-text"} /-->

			<!-- wp:group {"className":"pct-lines","style":{"spacing":{"blockGap":"0.3rem"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"left"}} -->
			<div class="wp-block-group pct-lines">
				<!-- wp:paragraph {"className":"is-style-pct-line","backgroundColor":"contrast"} -->
				<p class="is-style-pct-line has-contrast-background-color has-background"><?php esc_html_e( 'Real stories,', 'podcast-core-theme' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"className":"is-style-pct-line","backgroundColor":"accent"} -->
				<p class="is-style-pct-line has-accent-background-color has-background"><?php esc_html_e( 'real people,', 'podcast-core-theme' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"className":"is-style-pct-line","backgroundColor":"base"} -->
				<p class="is-style-pct-line has-base-background-color has-background"><?php esc_html_e( 'every week.', 'podcast-core-theme' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:paragraph {"className":"pct-hero__subtitle"} -->
			<p class="pct-hero__subtitle"><?php esc_html_e( 'The podcast that tells the people behind the stories.', 'podcast-core-theme' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:pattern {"slug":"podcast-core-theme/platform-links"} /-->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center","width":"45%","className":"pct-hero__media"} -->
		<div class="wp-block-column is-vertically-aligned-center pct-hero__media" style="flex-basis:45%">
			<!-- wp:image {"sizeSlug":"large"} -->
			<figure class="wp-block-image size-large"><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/hero.svg' ); ?>" alt=""/></figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->
