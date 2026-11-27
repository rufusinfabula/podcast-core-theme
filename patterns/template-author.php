<?php
/**
 * Title: Author content
 * Slug: podcast-core-studio/template-author
 * Inserter: no
 * Description: Author page: profile picture, name and biography (Users → Profile), then the author's posts as a compact list.
 *
 * @package PodcastCoreTheme
 */

?>
<!-- wp:group {"align":"wide","className":"pct-author-header","layout":{"type":"flex","flexWrap":"wrap","verticalAlignment":"center"}} -->
<div class="wp-block-group alignwide pct-author-header">
	<!-- wp:avatar {"size":160} /-->
	<!-- wp:group {"className":"pct-author-header__text","layout":{"type":"flex","orientation":"vertical"}} -->
	<div class="wp-block-group pct-author-header__text">
		<!-- wp:query-title {"type":"archive","showPrefix":false} /-->
		<!-- wp:post-author-biography /-->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->

<!-- wp:heading {"align":"wide","className":"pct-author-posts-title"} -->
<h2 class="wp-block-heading alignwide pct-author-posts-title"><?php esc_html_e( 'Articles', 'podcast-core-studio' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:query {"query":{"inherit":true},"align":"wide","className":"pct-post-list"} -->
<div class="wp-block-query alignwide pct-post-list">
	<!-- wp:post-template -->
		<!-- wp:group {"className":"pct-post-list__row","layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
		<div class="wp-block-group pct-post-list__row">
			<!-- wp:post-featured-image {"isLink":true,"aspectRatio":"16/9","width":"160px"} /-->
			<!-- wp:group {"className":"pct-post-list__text","layout":{"type":"flex","orientation":"vertical"}} -->
			<div class="wp-block-group pct-post-list__text">
				<!-- wp:post-title {"isLink":true,"level":3} /-->
				<!-- wp:post-date /-->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->
	<!-- /wp:post-template -->

	<!-- wp:query-pagination {"layout":{"type":"flex","justifyContent":"center"}} -->
		<!-- wp:query-pagination-previous /-->
		<!-- wp:query-pagination-numbers /-->
		<!-- wp:query-pagination-next /-->
	<!-- /wp:query-pagination -->

	<!-- wp:query-no-results -->
		<!-- wp:paragraph -->
		<p><?php esc_html_e( 'Nothing found here yet.', 'podcast-core-studio' ); ?></p>
		<!-- /wp:paragraph -->
	<!-- /wp:query-no-results -->
</div>
<!-- /wp:query -->
