<?php
/**
 * Title: Hero
 * Slug: podcast-core-theme/hero
 * Categories: podcast-core-theme, banner, featured
 * Keywords: hero, podcast, intro
 * Description: Show title, tagline, platform buttons and one or more images. Add several images to get a crossfade slideshow.
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
			<!-- wp:heading {"level":1,"className":"pct-hero__title"} -->
			<h1 class="wp-block-heading pct-hero__title"><?php esc_html_e( 'Stories worth listening to', 'podcast-core-theme' ); ?></h1>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"className":"pct-hero__subtitle"} -->
			<p class="pct-hero__subtitle"><?php esc_html_e( 'A new episode every week.', 'podcast-core-theme' ); ?></p>
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
