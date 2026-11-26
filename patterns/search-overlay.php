<?php
/**
 * Title: Search overlay
 * Slug: podcast-core-studio/search-overlay
 * Inserter: no
 *
 * @package PodcastCoreTheme
 */

?>
<!-- wp:html -->
<div id="pct-search-overlay" class="pct-search-overlay" role="dialog" aria-modal="true" aria-label="<?php esc_attr_e( 'Search', 'podcast-core-studio' ); ?>" hidden>
	<div class="pct-search-panel">
		<button type="button" class="pct-search-close" aria-label="<?php esc_attr_e( 'Close search', 'podcast-core-studio' ); ?>">&times;</button>
		<form role="search" method="get" class="pct-search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
			<label class="screen-reader-text" for="pct-search-input"><?php esc_html_e( 'Search for:', 'podcast-core-studio' ); ?></label>
			<input type="search" id="pct-search-input" name="s" placeholder="<?php esc_attr_e( 'Search episodes, news, pages…', 'podcast-core-studio' ); ?>" autocomplete="off" />
			<button type="submit"><?php esc_html_e( 'Search', 'podcast-core-studio' ); ?></button>
		</form>
	</div>
</div>
<!-- /wp:html -->
