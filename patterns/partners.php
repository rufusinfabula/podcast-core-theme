<?php
/**
 * Title: Partners
 * Slug: podcast-core-studio/partners
 * Categories: podcast-core-studio
 * Keywords: partners, sponsors, supporters, friends, logos
 * Description: Logos, names and short texts of partners, sponsors or friends (Podcast → Partners), with an editable title.
 *
 * @package PodcastCoreTheme
 */

if ( ! WP_Block_Type_Registry::get_instance()->is_registered( 'podcast-core/partners' ) ) {
	return;
}
$pct_section = podcast_core_theme_section( 'partners-section', array( 'align' => 'wide', 'className' => 'pct-section pct-section--partners', 'layout' => array( 'type' => 'default' ) ) );
?>
<?php echo $pct_section[0]; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
	<!-- wp:heading -->
	<h2 class="wp-block-heading"><?php esc_html_e( 'Our partners', 'podcast-core-studio' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:podcast-core/partners {"columns":3} /-->
<?php echo $pct_section[1]; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
