<?php
	$settings = get_fields()['flex_layouts'] ?? '';
	//var_dump($settings);
	$col_desk = $settings[0]['col_desk_related_posts'] ?? '';
	$col_tab = $settings[0]['col_tab_related_posts'] ?? '';
	$col_mob = $settings[0]['col_mob_related_posts'] ?? '';
	$swiper = $settings[0]['truefalse_swiper_related_posts'] ?? '';
	$load_more = $settings[0]['truefalse_loadmore_related_posts'] ?? '';
	$apply = $settings[0]['truefalse_form_related_posts'] ?? '';
	$read_more = $settings[0]['truefalse_learnmore_related_posts'] ?? '';
	$read_more_txt = $settings[0]['txt_learnmore_related_page'] ?? '';
	//var_dump($swiper);
?>
<!-- acf flexible - related posts -->
<div class="related-posts<?php if ($swiper == 'true'): ?> swiper-slider<?php endif; ?>">
	<div class="row related-posts-wrapper<?php if ($swiper == 'true'): ?> swiper-wrapper<?php endif; ?><?php if ($load_more == 'true'): ?> related__load-more--parent<?php endif; ?>">
		<?php
			foreach( $related_posts as $post ): //var_dump($post); 
				$post_id = $post->ID; 
				$bg = get_the_post_thumbnail_url( $post_id, 'hd' );
				$img_url = get_the_post_thumbnail_url('full');
				$permalink = get_permalink( $post->ID );
				$title = get_the_title( $post->ID );
				$cats = get_the_category( $post->ID  );
				$tags = get_the_tags();
				$f = get_fields( $post->ID ) ?? '';
				$text = $f['hero_excerpt'] ?? '';
				$card_img = $f['card_image'] ?? '';
				$cardImgBg = wp_get_attachment_image_src($card_img,'full');
				//var_dump($f);
		?>
			<div class="col<?php if (!empty($col_mob)): ?> col-<?=$col_mob?><?php endif; ?><?php if (!empty($col_tab)): ?> col-sm-<?=$col_tab?><?php endif; ?><?php if (!empty($col_desk)): ?> col-lg-<?=$col_desk?><?php endif; ?><?php if ($load_more == 'true'): ?> related-posts-wrapper--item<?php endif; ?><?php if ($swiper == 'true'): ?> swiper-slide<?php endif; ?><?php if ($load_more == 'true'): ?>  related__load-more--item<?php endif; ?>">
				<div class="blog-post-wrap wp-block-dp-cta-card faux-link__element">
					<div class="img-box"><?php if (!empty($cardImgBg)): ?><img src="<?=$cardImgBg[0]?>" width="100%" height="100%" alt="card" /><?php elseif (!empty($bg)): ?><img src="<?=$bg?>" width="100%" height="100%" alt="card" /><?php else: ?><img src="data:image/png;base64,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" width="100%" height="100%" alt="card" /><?php endif; ?></div>
					<div class="desc">
						<div class="h3"><a href="<?php echo get_permalink( $post_id ); ?>"><?php echo esc_html( $title ); ?></a></div>
						<div class="cat-list"><?php if ($cats) { echo '<i class="cat-ico"></i> '; echo join(' ', array_map(function($cats) { echo '<a href="' . esc_url( get_permalink( $post_id ) ) . '">' . $cats->name . '</a> '; }, get_the_category())); } ?></div>
						<?php if (!empty($text)): ?><p><?=$text?></p><?php endif; ?>
						<?php if ($read_more == 'true') : ?><a href="<?php echo get_permalink( $post_id ); ?>" class="btnon btn btn-more"><?php if (!empty($read_more_txt)): ?><?=$read_more_txt?><?php else: ?><?php if (get_locale() == 'lv') { ?>Lasīt vēl<?php } if (get_locale() == 'en_GB') { ?>Read more<?php } ?><?php endif; ?></a><?php endif; ?>
						<?php if ($apply == 'true') : ?><a href="#apply-form" class="btnon btn btn-more btn-more__apply fancybox-inline" style="right:20px;z-index:7!important"><?php if (get_locale() == 'lv') { ?>Pieteikties<?php } else { ?>Apply<?php } ?></a><?php endif; ?>
					</div>
					<a href="<?php echo get_permalink( $post_id ); ?>" class="faux-link__overlay-link"></a>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
	<?php if ($swiper == 'true'): ?><div class="swiper-buttons"><div class="swiper-button-prev"></div><div class="swiper-button-next"></div><div class="swiper-pagination"></div></div><?php endif; ?>
</div>
<!-- /acf flexible - related posts -->
