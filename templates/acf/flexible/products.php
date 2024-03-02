<?php
$id = 1;
//var_dump($products);
$productsCat = $products['prod_category_name'];
$productsCatClass = strtolower(preg_replace('/[^a-zA-Z0-9-_\.]/','', $productsCat));
$productsDesc = $products['prod_group_description'];
$productsItems = $products['product_items'];
?>
<!-- acf flexible - products -->
	<div class="products-section products-section-<?=$productsCatClass?>" catitem="<?=$productsCatClass?>" prodname="<?=$productsCat?>">
		<?php if (!empty($productsCat)): ?><h3 class="prod-group-name"><?=$productsCat?></h3><?php endif; ?>
		<?php if (!empty($productsDesc)): ?><p class="prod-group-description"><?=$productsDesc?></p><?php endif; ?>
		<div class="products-section-cat-row row">
			<?php foreach($productsItems as $item): //var_dump($item);
				$image = $item['product_image'];
				$imageBg = wp_get_attachment_image_src($image,'full');
				$imageMeta = get_post_meta( $image );
				$imageAlt = $imageMeta['_wp_attachment_image_alt'][0];
				$productCaption = $item['product_description']['product_caption'];
				$fauxUrl = $item['product_description']['product_link'];
				//var_dump($imageAlt);
			?>
				<div class="products-section-cat-row-col col-sm-4 col-12 faux-link__element">
					<div class="products-section-cat-row-col-wrap">
						<?php if (!empty($imageBg)): ?><img src="<?=$imageBg[0]?>" alt="<?php if (!empty($imageBg)): ?><?=$imageAlt?><?php endif; ?>" class="products-section-cat-row-col-wrap-img" /><?php endif; ?>
						<div class="products-section-cat-row-col-wrap-desc overlay">
							<?php if (!empty($productCaption)): ?><h4><?=$productCaption?></h4><?php endif; ?>
							<?php if (!empty($fauxUrl['url'])): ?>
								<a href="<?=$fauxUrl['url']?>" <?php if (!empty($fauxUrl['target'])): ?>target="<?=$fauxUrl['target']?>"<?php endif; ?> class="shop-now above-faux">Shop now</a>
								<a href="<?=$fauxUrl['url']?>" <?php if (!empty($fauxUrl['target'])): ?>target="<?=$fauxUrl['target']?>"<?php endif; ?> class="faux-link__overlay-link"></a>
							<?php endif; ?>
						</div>
					</div>
				</div>
			<?php endforeach; ?> 
		</div>
	</div>
<!-- acf flexible - products -->
