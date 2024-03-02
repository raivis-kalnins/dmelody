<?php
/**
 * Title: Google Map
 * Slug: google-map
 * Categories: dp-patterns-main
 * Keywords: Google Map
 */
$fields = get_fields('option');
//var_dump($fields);
$url = $fields['map_url'] ?? '';
$zoom = $fields['map_zoom'] ?? '';
$height = $fields['map_height'] ?? '';
?>
<!-- wp:paragraph -->
<p><iframe src="<?=$url?>&amp;t=m&amp;z=<?=$zoom?>&amp;output=embed&amp;iwloc=near" width="100%" height="<?=$height?>" style="border:0;margin-bottom:-15px" allowfullscreen="" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></p>
<!-- /wp:paragraph -->