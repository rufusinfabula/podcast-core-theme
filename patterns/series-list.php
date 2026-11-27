<?php
/**
 * Title: Series list
 * Slug: podcast-core-studio/series-list
 * Categories: podcast-core-studio
 * Keywords: series, sub-series, specials, shows, icons
 * Description: The podcast's series, or the sub-series of one series (block settings → Series to show), with icon and number of episodes, under an editable title.
 *
 * @package PodcastCoreTheme
 */

if ( ! WP_Block_Type_Registry::get_instance()->is_registered( 'podcast-core/series-list' ) ) {
	return;
}
$pct_section = podcast_core_theme_section( 'cta-section', array( 'align' => 'wide', 'className' => 'pct-section pct-section--series', 'layout' => array( 'type' => 'default' ) ) );
?>
<?php echo $pct_section[0]; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
	<!-- wp:heading -->
	<h2 class="wp-block-heading"><?php esc_html_e( 'Our series', 'podcast-core-studio' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:podcast-core/series-list {"columns":3} /-->
<?php echo $pct_section[1]; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
