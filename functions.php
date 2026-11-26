<?php
/**
 * Podcast Core Theme functions.
 *
 * @package PodcastCoreTheme
 */

defined( 'ABSPATH' ) || exit;

define( 'PODCAST_CORE_THEME_VERSION', wp_get_theme( 'podcast-core-theme' )->get( 'Version' ) );

/**
 * Theme setup: translations and editor styles.
 */
add_action(
	'after_setup_theme',
	function () {
		load_theme_textdomain( 'podcast-core-theme', get_template_directory() . '/languages' );
		add_theme_support( 'editor-styles' );
		add_editor_style( 'style.css' );
	}
);

/**
 * Front-end assets. Child themes add their own stylesheet after this one.
 */
add_action(
	'wp_enqueue_scripts',
	function () {
		wp_enqueue_style( 'podcast-core-theme', get_template_directory_uri() . '/style.css', array(), PODCAST_CORE_THEME_VERSION );
		wp_enqueue_script(
			'podcast-core-theme',
			get_template_directory_uri() . '/assets/js/theme.js',
			array(),
			PODCAST_CORE_THEME_VERSION,
			array(
				'in_footer' => true,
				'strategy'  => 'defer',
			)
		);
	}
);

/**
 * Pattern category for the theme's patterns.
 */
add_action(
	'init',
	function () {
		register_block_pattern_category(
			'podcast-core-theme',
			array( 'label' => __( 'Podcast', 'podcast-core-theme' ) )
		);
	}
);

/**
 * Whether Podcast Core Plugin is active (episodes available).
 */
function podcast_core_theme_has_episodes(): bool {
	return post_type_exists( 'podcast_episode' );
}

/**
 * Platform links configured in Podcast Core Plugin (Settings → Podcast), in display order.
 *
 * @return array<string, array{label: string, url: string}>
 */
function podcast_core_theme_platform_links(): array {
	if ( ! function_exists( 'podcast_core_get_setting' ) ) {
		return array();
	}
	$platforms = array(
		'spotify_url' => 'Spotify',
		'apple_url'   => 'Apple Podcasts',
		'youtube_url' => 'YouTube',
		'rss_url'     => 'RSS',
	);
	$links     = array();
	foreach ( $platforms as $key => $label ) {
		$url = podcast_core_get_setting( $key );
		if ( $url ) {
			$links[ $key ] = array(
				'label' => $label,
				'url'   => $url,
			);
		}
	}
	return $links;
}

/**
 * Series used to pre-fill the call-to-action patterns: the one with most episodes.
 * Editors change the link, the filter and the texts after inserting the pattern.
 *
 * @return WP_Term|null
 */
function podcast_core_theme_featured_series() {
	if ( ! taxonomy_exists( 'podcast_series' ) ) {
		return null;
	}
	$terms = get_terms(
		array(
			'taxonomy'   => 'podcast_series',
			'hide_empty' => false,
			'orderby'    => 'count',
			'order'      => 'DESC',
			'number'     => 1,
		)
	);
	return ( ! is_wp_error( $terms ) && $terms ) ? $terms[0] : null;
}

/**
 * Block style "Highlighted line" for paragraphs and headings: big bold text on a
 * coloured band, one block per line (as in the hero). The band colour is picked from
 * the palette, so it follows the active style variation; the text colour adapts to it.
 */
add_action(
	'init',
	function () {
		foreach ( array( 'core/paragraph', 'core/heading' ) as $block ) {
			register_block_style(
				$block,
				array(
					'name'  => 'pct-line',
					'label' => __( 'Highlighted line', 'podcast-core-theme' ),
				)
			);
		}
	}
);

/**
 * Opening and closing markup of a page section. Uses the Podcast Core section block
 * (podcast-core/{$section}) when the plugin is active, so its spacing and colours can be
 * set in Design → Styles → Blocks; falls back to a Group otherwise.
 *
 * @param string $section   hero | episodes-section | news-section | cta-section.
 * @param array  $attrs     Block attributes (align, className, backgroundColor, textColor).
 * @return array{0: string, 1: string} Opening and closing markup.
 */
function podcast_core_theme_section( string $section, array $attrs = array() ): array {
	$block = 'podcast-core/' . $section;
	if ( WP_Block_Type_Registry::get_instance()->is_registered( $block ) ) {
		$name  = $block;
		$class = 'wp-block-podcast-core-' . $section;
	} else {
		$name  = 'group';
		$class = 'wp-block-group';
	}
	$attrs   += array( 'layout' => array( 'type' => 'constrained' ) );
	$classes  = array( $class );
	if ( ! empty( $attrs['align'] ) ) {
		$classes[] = 'align' . $attrs['align'];
	}
	if ( ! empty( $attrs['className'] ) ) {
		$classes[] = $attrs['className'];
	}
	if ( ! empty( $attrs['textColor'] ) ) {
		$classes[] = 'has-' . $attrs['textColor'] . '-color';
		$classes[] = 'has-text-color';
	}
	if ( ! empty( $attrs['backgroundColor'] ) ) {
		$classes[] = 'has-' . $attrs['backgroundColor'] . '-background-color';
		$classes[] = 'has-background';
	}
	return array(
		sprintf( "<!-- wp:%s %s -->\n<div class=\"%s\">", $name, wp_json_encode( $attrs, JSON_UNESCAPED_SLASHES ), esc_attr( implode( ' ', $classes ) ) ),
		sprintf( "</div>\n<!-- /wp:%s -->", $name ),
	);
}

/**
 * Homepage as a page: when Settings → Reading shows a static page on the front,
 * skip the front-page template so the page itself is displayed (with its own page
 * template, e.g. "Page without title"). Its content is edited in Design → Pages.
 */
add_filter(
	'frontpage_template_hierarchy',
	function ( $templates ) {
		if ( 'page' === get_option( 'show_on_front' ) && (int) get_option( 'page_on_front' ) ) {
			return array();
		}
		return $templates;
	}
);
