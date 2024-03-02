<?php
/**
 * Title: Products Menu
 * Slug: products-menu
 * Categories: dp-patterns-main
 * Keywords: Products Menu
 */
/*
$loop = new WP_Query( array( 'post_type' => 'products', 'orderby' => 'menu_order' ),  );
$pathUrl = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
if ($loop ->have_posts()) {
	echo '<ul class="prod-menu_list">';
    while (  $loop->have_posts() ) : $loop->post();
		$postID = get_the_ID();
		$isParent = get_post(get_post_ancestors($postID));
		$idParent = wp_get_post_parent_id();
		$hasChild = get_children( $loop->the_post() );		
		$postTitle = get_the_title(); 
		$postUri = get_page_uri(); 
		$postLink = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]/products/".$postUri."/";
	?>
	<li class="prod-menu_list--item <?php if ( !$isParent ) { echo 'prod-menu_list--item_is-parent parent-id-'. $idParent.' '; } if ( !empty($hasChild) ) { echo 'prod-menu_list--item_has-child'; } if ($pathUrl == $postLink) { echo ' prod-menu_list--item_current'; } ?>" id="post-<?php the_ID(); ?>">
		<a href="<?=$postLink?>"><?=$postTitle?></a>
	</li>
<?php endwhile;
	echo '</ul>';
}
wp_reset_postdata();
*/
?>
<!-- wp:shortcode -->[pmenu]<!-- /wp:shortcode -->