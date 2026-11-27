<?php
/**
 * Podcast Core Studio functions.
 *
 * @package PodcastCoreTheme
 */

defined( 'ABSPATH' ) || exit;

define( 'PODCAST_CORE_THEME_VERSION', wp_get_theme( 'podcast-core-studio' )->get( 'Version' ) );

/**
 * Theme setup: translations and editor styles.
 */
add_action(
	'after_setup_theme',
	function () {
		load_theme_textdomain( 'podcast-core-studio', get_template_directory() . '/languages' );
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
		// Version + file time: browsers fetch the stylesheet again whenever it changes.
		wp_enqueue_style( 'podcast-core-studio', get_template_directory_uri() . '/style.css', array(), PODCAST_CORE_THEME_VERSION . '.' . filemtime( get_template_directory() . '/style.css' ) );
		wp_enqueue_script(
			'podcast-core-studio',
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
			'podcast-core-studio',
			array( 'label' => __( 'Podcast', 'podcast-core-studio' ) )
		);
	}
);

/**
 * Whether Podcast Core Engine is active (episodes available).
 */
function podcast_core_theme_has_episodes(): bool {
	return post_type_exists( 'podcast_episode' );
}

/**
 * Platform links configured in Podcast Core Engine (Podcast → Settings → Podcast), in display order.
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
					'label' => __( 'Highlighted line', 'podcast-core-studio' ),
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
 * Search and "Subscribe to the podcast" inside the mobile menu: on small screens the header search
 * button and sign-up button are hidden and appear at the end of the menu overlay instead (sign-up
 * button, then a search field). Only navigation blocks with a mobile overlay, so footer menus are not
 * touched; both items are hidden when the menu is not an open overlay.
 */
add_filter(
	'render_block_core/navigation',
	function ( string $html, array $block ): string {
		if ( 'never' === ( $block['attrs']['overlayMenu'] ?? 'mobile' ) ) {
			return $html;
		}
		$end = strrpos( $html, '</ul>' ); // closing tag of the top-level list (sub-menus close before it).
		if ( false === $end ) {
			return $html;
		}
		$items = '';
		$url   = function_exists( 'podcast_core_get_setting' ) ? (string) podcast_core_get_setting( 'newsletter_url' ) : '';
		if ( '' !== $url ) {
			$items .= sprintf(
				'<li class="wp-block-navigation-item pct-nav-signup"><a class="wp-block-navigation-item__content" href="%1$s"><span class="wp-block-navigation-item__label">%2$s</span></a></li>',
				esc_url( $url ),
				esc_html__( 'Subscribe to the podcast', 'podcast-core-studio' )
			);
		}
		$items .= sprintf(
			'<li class="wp-block-navigation-item pct-nav-search"><form role="search" method="get" action="%1$s"><label class="screen-reader-text" for="pct-nav-search-input">%2$s</label><input type="search" id="pct-nav-search-input" name="s" placeholder="%3$s"><button type="submit" aria-label="%2$s"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg></button></form></li>',
			esc_url( home_url( '/' ) ),
			esc_attr__( 'Search', 'podcast-core-studio' ),
			esc_attr__( 'Search episodes, news, pages…', 'podcast-core-studio' )
		);
		return substr_replace( $html, $items, $end, 0 );
	},
	10,
	2
);

/**
 * Hero images chosen in Podcast → Settings → Styles replace the images placed in the hero's
 * image column (.pct-hero__media). With more than one image the slideshow (theme.js) crossfades
 * them. Nothing changes when none is chosen.
 */
add_filter(
	'render_block_core/column',
	function ( string $html, array $block ): string {
		if ( ! function_exists( 'podcast_core_hero_images' ) || false === strpos( (string) ( $block['attrs']['className'] ?? '' ), 'pct-hero__media' ) ) {
			return $html;
		}
		$ids   = podcast_core_hero_images();
		$open  = strpos( $html, '>' );
		$close = strrpos( $html, '</div>' );
		if ( ! $ids || false === $open || false === $close ) {
			return $html;
		}
		$figures = '';
		foreach ( $ids as $i => $id ) {
			$figures .= '<figure class="wp-block-image size-large">' . wp_get_attachment_image(
				$id,
				'large',
				false,
				0 === $i ? array( 'fetchpriority' => 'high', 'loading' => 'eager' ) : array( 'loading' => 'lazy' )
			) . '</figure>';
		}
		return substr( $html, 0, $open + 1 ) . $figures . substr( $html, $close );
	},
	10,
	2
);
