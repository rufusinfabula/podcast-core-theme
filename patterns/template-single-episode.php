<?php
/**
 * Title: Episode content
 * Slug: podcast-core-studio/template-single-episode
 * Inserter: no
 *
 * @package PodcastCoreTheme
 */

// The video goes after the episode text (Episode Video block), with a "Watch the video" card after the
// second block of text; with an older plugin it stays in the player.
$pct_video_block = WP_Block_Type_Registry::get_instance()->is_registered( 'podcast-core/episode-video' );
?>
<!-- wp:post-terms {"term":"podcast_series","prefix":"<?php echo esc_attr( __( 'Series:', 'podcast-core-studio' ) . ' ' ); ?>"} /-->
<!-- wp:post-title {"level":1} /-->
<!-- wp:post-date /-->
<?php if ( $pct_video_block ) : ?>
<!-- wp:podcast-core/episode-player {"align":"wide","showVideo":false,"videoLinkStyle":"card","videoLinkPosition":"content","videoLinkAfter":2} /-->
<!-- wp:post-content {"layout":{"type":"constrained"}} /-->
<!-- wp:podcast-core/episode-video {"align":"wide"} /-->
<?php else : ?>
<!-- wp:podcast-core/episode-player {"align":"wide"} /-->
<!-- wp:post-content {"layout":{"type":"constrained"}} /-->
<?php endif; ?>
<!-- wp:pattern {"slug":"podcast-core-studio/post-navigation"} /-->
