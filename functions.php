<?php
/**
 * Podcast Core Theme functions.
 *
 * @package PodcastCoreTheme
 */

defined( 'ABSPATH' ) || exit;

add_action(
	'wp_enqueue_scripts',
	function () {
		wp_enqueue_style(
			'podcast-core-theme',
			get_stylesheet_uri(),
			array(),
			wp_get_theme()->get( 'Version' )
		);
	}
);
