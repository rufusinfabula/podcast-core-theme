<?php
/**
 * Title: Post content
 * Slug: podcast-core-studio/template-single
 * Inserter: no
 *
 * @package PodcastCoreTheme
 */

?>
<!-- wp:post-title {"level":1} /-->
<!-- wp:group {"className":"pct-post-meta","layout":{"type":"flex","flexWrap":"wrap"}} -->
<div class="wp-block-group pct-post-meta">
	<!-- wp:post-author-name {"isLink":true} /-->
	<!-- wp:post-date /-->
	<!-- wp:post-terms {"term":"category"} /-->
</div>
<!-- /wp:group -->
<!-- wp:post-featured-image {"align":"wide","aspectRatio":"16/9"} /-->
<!-- wp:post-content {"layout":{"type":"constrained"}} /-->
<!-- wp:post-terms {"term":"post_tag","prefix":"<?php echo esc_attr( __( 'Tags:', 'podcast-core-studio' ) . ' ' ); ?>"} /-->
<!-- wp:pattern {"slug":"podcast-core-studio/post-navigation"} /-->
