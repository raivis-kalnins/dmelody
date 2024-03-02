<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
global $post;
$short_description = apply_filters( 'woocommerce_short_description', $post->post_excerpt );
$heading = apply_filters( 'woocommerce_product_description_heading', __( 'Description', 'woocommerce' ) );
$fields = get_fields();
//var_dump($fields);
$competition_content = $fields['competition_content'] ?? null;
//$product_gallery = $fields['product_gallery'] ?? null;
?>
<div class="container-single">
	<div id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>
		<div class="wrap-desc container-boxed">
			<div class="row">
				<div class="col col-12 col-lg-6 order-1 order-lg-0 position-relative">
					<?php do_action( 'woocommerce_before_single_product_summary' ); ?>
					<?php do_action( 'woocommerce_after_single_product_summary' ); ?>
					<?php the_content(); ?>
					<?php if( !empty( $competition_content ) ) : ?>
						<div class="woocommerce__competition-details container-boxed"><div class="h3">COMPETITION DETAILS</div><?=$competition_content?></div>
					<?php endif; ?>
				</div>
				<div class="col col-12 col-lg-6">
					<?php the_title( '<h1 class="h2 product_title entry-title">', '</h1>' ); ?>
					<?php do_action( 'woocommerce_single_product_summary' ); ?>
					<div style="height:30px" aria-hidden="true" class="wp-block-spacer"></div>
					<?php if( !empty( $short_description ) ) : ?>
						<div class="woocommerce__prize-details container-boxed"><div class="h3">PRIZE DETAILS</div><?=$short_description?></div>
					<?php endif; ?>
				</div>
			</div>
		</div>		
	</div>
</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>
