<?php
/**
 * "Order received" message.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/thankyou.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 8.1.0
 *
 * @var WC_Order|false $order
 */

defined( 'ABSPATH' ) || exit;
?>

<p class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received">
	<?php
	/**
	 * Filter the message shown after a checkout is complete.
	 *
	 * @since 2.2.0
	 *
	 * @param string         $message The message.
	 * @param WC_Order|false $order   The order created during checkout, or false if order data is not available.
	 */
	$message = apply_filters(
		'woocommerce_thankyou_order_received_text',
		__( 'ORDER CONFIRMED', 'woocommerce' ),
		$order
	);
	$current_user = wp_get_current_user();
	echo '<center style="padding:200px 0 80px 0;min-height:calc(100vh - 450px)"><div class="h1">'.esc_html( $message ).'</div><br><div class="h4" style="color:#DB0F30;font-size:30px">You will receive your email shortly with your unique ticket.</div><br><div class="h4">Good luck '.$current_user->display_name.'!</div><a href="'. get_home_url() .'/giveways/" class="btn btn-primary" style="max-width:320px;margin: 35px auto">Back to Giveaways</a></center>';
	?>
</p>
