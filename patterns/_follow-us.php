<?php
/**
 * Title: Follow Us
 * Slug: follow-us
 * Categories: dp-patterns-main
 * Keywords: Follow Us
 */
$fields = get_fields('option');
//var_dump($fields['soc_fb']);
$fb = $fields['soc_fb'] ?? '';
$in = $fields['soc_in'] ?? '';
$ln = $fields['soc_ln'] ?? '';
$tw = $fields['soc_tw'] ?? '';
$yt = $fields['soc_yt'] ?? '';
?>
<!-- wp:social-links {"iconColor":"foreground","openInNewTab":true,"iconColorValue":"#000000","size":"has-small-icon-size","align":"center","className":"is-style-logos-only","layout":{"type":"flex","justifyContent":"left","flexWrap":"wrap"}} -->
<ul class="wp-block-social-links aligncenter has-small-icon-size has-icon-color is-style-logos-only">
    <!-- wp:social-link {"url":"<?=$fb?>","service":"facebook"} /-->
    <!-- wp:social-link {"url":"<?=$in?>","service":"instagram"} /-->
    <!-- wp:social-link {"url":"<?=$ln?>","service":"linkedin"} /-->
    <!-- wp:social-link {"url":"<?=$tw?>","service":"twitter"} /-->
    <!-- wp:social-link {"url":"<?=$yt?>","service":"youtube"} /-->
</ul>
<!-- /wp:social-links -->