<?php
/**
 * Title: Hero Default
 * Slug: hero-default
 * Categories: dp-patterns-main
 * Keywords: hero
 */
$hero_pre = get_fields()['hero_section'] ?? null;
$hero_desc = get_fields()['hero_desc'] ?? null;
?>
<!-- wp:group {"className":"container-boxed"} -->
<div class="wp-block-group container-boxed hero-wrap"><!-- wp:shortcode -->[seo-title]<!-- /wp:shortcode --></div>
<!-- /wp:group -->