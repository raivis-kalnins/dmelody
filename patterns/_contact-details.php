<?php
/**
 * Title: Contact Details
 * Slug: contact-details
 * Categories: dp-patterns-main
 * Keywords: Contact Details
 */
$fields = get_fields('option');
//var_dump($fields);
$place_url = $fields['map_url_place'] ?? '';
$loc = $fields['map_address'] ?? '';
$email = $fields['email'] ?? '';
$tel = $fields['tel'] ?? '';
?>
<!-- wp:list -->
<ul class="contact-details">
<!-- wp:list-item -->
<li class="contact-details_email"><a href="mailto:<?php echo antispambot( $email ); ?>"><?php echo antispambot( $email ); ?></a></li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li class="contact-details_tel"><a href="tel:<?=$tel?>" target="_blank" rel="noreferrer noopener"><?=$tel?></a></li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li class="contact-details_loc"><a href="<?=$place_url?>" target="_blank" rel="noreferrer noopener"><?=$loc?></a></li>
<!-- /wp:list-item -->
</ul>
<!-- /wp:list -->