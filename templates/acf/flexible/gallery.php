<?php
	$settings = get_fields()['flex_layouts'] ?? '';
	$col_desk = $settings[0]['col_desk_gallery'] ?? '';
	$col_tab = $settings[0]['col_tab_gallery'] ?? '';
	$col_mob = $settings[0]['col_mob_gallery'] ?? '';
	$swiper = $settings[0]['truefalse_swiper_gallery'] ?? '';
	$load_more = $settings[0]['truefalse_loadmore_gallery'] ?? '';
	$gallery = $gallery;
	// echo '<pre>';
	// var_dump($gallery);
	// echo '</pre>';
?>
<div class="photo-gallery<?php if ($swiper == 'true'): ?> swiper-slider<?php endif; ?>">
	<div class="row photo-gallery-wrapper<?php if ($swiper == 'true'): ?> swiper-wrapper<?php endif; ?><?php if ($load_more == 'true'): ?> related__load-more--parent<?php endif; ?>">
		<?php foreach( $gallery as $image ) : 
			//var_dump($image);
			$imgURL = $image['url'];
			$imgWidth = $image['width'];
			$imgTitle = $image['title'];
			$imgDate = $image['date'];
			$data_type = $image['subtype'];
			//var_dump($data_type);
			if ($data_type == 'mp4') :
		?>
			<a href="<?=$imgURL?>" target="_blank" class="video col<?php if (!empty($col_mob)): ?> col-<?=$col_mob?><?php endif; ?><?php if (!empty($col_tab)): ?> col-sm-<?=$col_tab?><?php endif; ?><?php if (!empty($col_desk)): ?> col-lg-<?=$col_desk?><?php endif; ?><?php if ($load_more == 'true'): ?> gallery-wrapper--item<?php endif; ?><?php if ($swiper == 'true'): ?> swiper-slide<?php endif; ?><?php if ($load_more == 'true'): ?> related__load-more--item<?php endif; ?>" style="background:black;overflow:hidden;align-self:center"><video class="video-wrap-video" webkit-playsinline="true" playsinline="true" autoplay="true" muted="" loop="true" preload="auto" src="<?=$imgURL?>" style="width:100%;height:auto;margin-bottom:15px" controls></video></a>
				<?php else: ?>
					<a href="<?=$imgURL?>" target="_blank" class="fancybox image col<?php if (!empty($col_mob)): ?> col-<?=$col_mob?><?php endif; ?><?php if (!empty($col_tab)): ?> col-sm-<?=$col_tab?><?php endif; ?><?php if (!empty($col_desk)): ?> col-lg-<?=$col_desk?><?php endif; ?><?php if ($load_more == 'true'): ?> gallery-wrapper--item<?php endif; ?><?php if ($swiper == 'true'): ?> swiper-slide<?php endif; ?><?php if ($load_more == 'true'): ?>  related__load-more--item<?php endif; ?>" data-fancybox="gallery"><img src="<?=$imgURL?>" width="<?=$imgWidth?>" height="100%" alt="<?=$imgTitle?>" data-date="<?=$imgDate?>" /></a>
				<?php endif; ?>		
		<?php endforeach; ?>
	</div>
	<?php if ($swiper == 'true'): ?><div class="swiper-buttons"><div class="swiper-button-prev"></div><div class="swiper-button-next"></div><div class="swiper-pagination"></div></div><?php endif; ?>
</div>