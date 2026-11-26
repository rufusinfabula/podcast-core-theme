<?php
/**
 * Title: Footer credit
 * Slug: podcast-core-studio/footer-credit
 * Inserter: no
 *
 * @package PodcastCoreTheme
 */

?>
<!-- wp:paragraph {"className":"pct-footer__credit"} -->
<p class="pct-footer__credit">© <?php echo esc_html( wp_date( 'Y' ) ); ?> <?php echo esc_html( get_bloginfo( 'name' ) ); ?></p>
<!-- /wp:paragraph -->
