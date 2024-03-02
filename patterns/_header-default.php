<?php
/**
 * Title: Default Header
 * Slug: header-default
 * Categories: dp-patterns-main
 * Keywords: Default Header
 */
?>
<!-- wp:dp/row-section {"contBoxed":"container-fluid","childCount":1,"blockId":"4439df4c-e64a-4551-b906-eecc6656765e"} -->
<div class="wp-block-dp-row-section container-fluid" style="">
	<div class="row one-column-layout">
		<!-- wp:dp/column {"width":"full"} -->
		<div class="wp-block-dp-column align-self-center" style="">
			<!-- wp:dp/row-section {"childCount":1,"blockId":"a5f08642-bd1e-4b84-8656-66701c0c9810"} -->
			<div class="wp-block-dp-row-section container-boxed" style="">
				<div class="row two-column-layout container-top-menu">
					
					<!-- wp:dp/column {"width":"half","sizeTablet":"col-md-2","sizeMob":"col-sm-6"} -->
					<div class="wp-block-dp-column align-self-center block-account" style="opacity:0">
						<!-- wp:button -->
						<div class="wp-block-button"><a href="<?php echo esc_url( home_url( '/my-account' ) ); ?>" class="wp-block-button__link wp-element-button"><?php  esc_html_e( 'My Account', 'wc-booster' ); ?></a></div>
						<!-- /wp:button -->
					</div>
					<!-- /wp:dp/column -->

					<!-- wp:dp/column {"width":"half","sizeTablet":"col-md-2","sizeMob":"col-sm-6"} -->
					<div class="wp-block-dp-column align-self-center block-cart" style="opacity:0">
						<!-- wp:woocommerce/mini-cart /-->
					</div>
					<!-- /wp:dp/column -->

					<!-- wp:dp/column {"width":"half","sizeTablet":"col-md-2","sizeMob":"col-sm-6"} -->
					<div class="wp-block-dp-column align-self-center block-polylang" style="opacity:0">
						<?php echo do_shortcode( '[POLYLANG]' ); ?>
					</div>
					<!-- /wp:dp/column -->
					
				</div>
			</div>
			<!-- /wp:dp/row-section -->
			<!-- wp:dp/row-section {"childCount":2,"blockId":"a5f08642-bd1e-4b84-8656-66701c0c9810"} -->
			<div class="wp-block-dp-row-section container-boxed" style="">
				<div class="row two-column-layout">
					<!-- wp:dp/column {"width":"half","sizeLargeTablet":"col-lg-2","sizeTablet":"col-md-6","sizeMob":"col-sm-6"} -->
					<div class="wp-block-dp-column align-self-center col-lg-2 col-md-6 col-sm-6" style="">
						<!-- wp:site-logo {"width":70,"align":"left"} /-->
					</div>
					<!-- /wp:dp/column -->
					<!-- wp:dp/column {"width":"half","sizeLargeTablet":"col-lg-10","sizeTablet":"col-md-6","sizeMob":"col-sm-6"} -->
					<div class="wp-block-dp-column align-self-center col-lg-10 col-md-6 col-sm-6" style="">
						<!-- wp:pattern {"slug":"header-menu"} /-->
					</div>
					<!-- /wp:dp/column -->
				</div>
			</div>
			<!-- /wp:dp/row-section -->
		</div>
		<!-- /wp:dp/column -->
	</div>
</div>
<!-- /wp:dp/row-section -->