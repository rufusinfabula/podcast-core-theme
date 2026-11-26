<?php
/**
 * Title: Search results grouped by type
 * Slug: podcast-core-studio/search-results
 * Inserter: no
 *
 * @package PodcastCoreTheme
 */

$pct_term   = get_search_query( false );
$pct_groups = array();

if ( podcast_core_theme_has_episodes() ) {
	$pct_groups['podcast_episode'] = array(
		'label'   => get_post_type_object( 'podcast_episode' )->labels->name,
		'archive' => get_post_type_archive_link( 'podcast_episode' ),
	);
}
$pct_posts_page   = (int) get_option( 'page_for_posts' );
$pct_groups['post'] = array(
	'label'   => $pct_posts_page ? get_the_title( $pct_posts_page ) : __( 'News', 'podcast-core-studio' ),
	'archive' => $pct_posts_page ? get_permalink( $pct_posts_page ) : '',
);
$pct_groups['page'] = array(
	'label'   => __( 'Pages', 'podcast-core-studio' ),
	'archive' => '',
);

/**
 * Filters the groups shown on the search results page.
 *
 * @param array $pct_groups post_type => [label, archive].
 */
$pct_groups = apply_filters( 'podcast_core_theme_search_groups', $pct_groups );
$pct_total  = 0;

ob_start();
if ( '' !== $pct_term ) {
	foreach ( $pct_groups as $pct_type => $pct_group ) {
		$pct_query = new WP_Query(
			array(
				'post_type'      => $pct_type,
				's'              => $pct_term,
				'posts_per_page' => 10,
				'post_status'    => 'publish',
				'no_found_rows'  => false,
			)
		);
		if ( ! $pct_query->have_posts() ) {
			continue;
		}
		$pct_total += $pct_query->found_posts;
		?>
		<section class="pct-search-group">
			<h2 class="pct-search-group__title"><?php echo esc_html( $pct_group['label'] ); ?> <span class="pct-search-group__count">(<?php echo esc_html( number_format_i18n( $pct_query->found_posts ) ); ?>)</span></h2>
			<?php
			while ( $pct_query->have_posts() ) :
				$pct_query->the_post();
				?>
				<article class="pct-search-result">
					<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					<p><?php echo esc_html( wp_trim_words( get_the_excerpt(), 24 ) ); ?></p>
				</article>
			<?php endwhile; ?>
			<?php if ( $pct_query->found_posts > 10 && $pct_group['archive'] ) : ?>
				<p class="pct-search-group__more"><a href="<?php echo esc_url( $pct_group['archive'] ); ?>"><?php esc_html_e( 'See all', 'podcast-core-studio' ); ?></a></p>
			<?php endif; ?>
		</section>
		<?php
		wp_reset_postdata();
	}
}
$pct_html = ob_get_clean();

if ( 0 === $pct_total ) {
	$pct_html = '<p class="pct-search-empty">' . esc_html(
		'' === $pct_term
			? __( 'Type something to search.', 'podcast-core-studio' )
			/* translators: %s: search term */
			: sprintf( __( 'No results for “%s”.', 'podcast-core-studio' ), $pct_term )
	) . '</p>';
}
?>
<!-- wp:html -->
<div class="pct-search-results"><?php echo $pct_html; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped above. ?></div>
<!-- /wp:html -->
