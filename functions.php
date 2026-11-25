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
