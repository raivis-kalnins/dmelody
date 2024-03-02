<?php
	$id = 0;
	$heroID = $id + 1;
	$heroItems = $hero['hero_items'];
?>
<div class="hero-slider" id="hero_<?=$heroID ?>">
	<div class="hero-slider-container swiper-wrapper">
		<?php 
			foreach( $heroItems as $heroItem ): //var_dump($heroItem);
				$heroItemImg = $heroItem['hero_settings']['hero_image'];
				$heroItemImgBg = wp_get_attachment_image_src($heroItemImg,'full');
				$heroItemContent = $heroItem['hero_content'];
				$heroItemBtn = $heroItem['hero_settings']['hero_link'];
				$heroItemBtnTitle = $heroItem['hero_settings']['hero_link']['title'];
				$heroItemBtnUrl = $heroItem['hero_settings']['hero_link']['url'];
				$heroItemBtnTarget = $heroItem['hero_settings']['hero_link']['target'];
				$id++;
		?>
			<div class="hero-slide swiper-slide" id="hero-slide-<?=$id?>" <?php if( !empty( $heroItemImg ) ) : ?>style="background-image: url('<?=$heroItemImgBg[0]?>')"<?php endif; ?> >
				<div class="dark-overlay"></div>
				<?php if( !empty( $heroItemContent ) ) : ?>
					<div class="hero-body boxed">
						<?=$heroItemContent?>
						<?php if( !empty( $heroItemBtn ) ) : ?>
							<a href="<?=$heroItemBtnUrl?>" <?php if( !empty( $heroItemBtnTarget ) ) : ?>target="<?=$heroItemBtnTarget?>" <?php endif; ?>class="btn btn-outline-light"><?=$heroItemBtnTitle?></a>
						<?php endif; ?>
					</div>
				<?php endif; ?>
			</div>
		<?php endforeach; ?>
	</div>
	<div class="swiper-button-prev"></div><div class="swiper-button-next"></div><div class="swiper-pagination"></div>
</div>
