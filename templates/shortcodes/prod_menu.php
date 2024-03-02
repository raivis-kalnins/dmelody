<?php
// Add short code pmenu app for [pmenu]
function pmenuShortcode() {
	$loop = new WP_Query( array( 'post_type' => 'products','post_status' => 'publish','orderby' => 'menu_order','order' => 'ASC' ) );
	$pathUrl = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	function has_children() {
		global $post;
		return count( get_posts( array('post_parent' => $post->ID, 'post_type' => $post->post_type) ) );
	}
	if ($loop ->have_posts()) {
		while (  $loop->have_posts() ) : $loop->the_post();
			$postID = get_the_ID();
			$postParent = get_post(get_post_ancestors($postID));
			$idParent = wp_get_post_parent_id();
			$postTitle = get_the_title($postID); 
			$postUri = get_page_uri($postID); 
			$postLink = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]/products/".$postUri."/";
			if ( $postParent !== 0 ) { $pID = 'parent-id-'. $idParent .''; } else { $idParent = ''; }
			if ( has_children() ) { $child = ' prod-menu_list--item_has-child'; } else { $child = ''; }
			if ($pathUrl == $postLink) { $current = ' prod-menu_list--item_current'; } else { $current = ''; }
			$postnav = $postnav ?? '';
			$postnav .= '<li class="prod-menu_list--item '.$pID .''.$child.''.$current.'" id="post-'.$postID.'" data-post="'.$postID.'" data-parent="'.$idParent.'"><a href="'.$postLink.'">'.$postTitle.'</a></li>';
		endwhile;
	}
	return '<ul class="prod-menu_list">'. $postnav .'</ul>';
}
add_shortcode('pmenu', 'pmenuShortcode');
?>