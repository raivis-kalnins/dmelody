<?php
/**
 * Title: Default Footer
 * Slug: footer-default
 * Categories: dp-patterns-main
 * Keywords: Default Footer
 */
$home_url = home_url();
$fields = get_fields('option');
//var_dump($fields['soc_fb']);
$fb = $fields['soc_fb'] ?? '';
$in = $fields['soc_in'] ?? '';
$ln = $fields['soc_ln'] ?? '';
$tw = $fields['soc_tw'] ?? '';
$yt = $fields['soc_yt'] ?? '';
$email = $fields['email'] ?? '';
$tel = $fields['tel'] ?? '';
$year = date("Y");

$dp_footer_menu = array(
	'theme_location' => 'dp-footer-menu',
	'container' => 'nav',
	'container_class' => 'dp-footer-menu-container--list',						
	'container_id' => 'dp-footer-menu',
	'menu_class' => 'dp-footer-menu-container',
	'fallback_cb' => '__return_false',
	'items_wrap' => '<ul id="%1$s" class="navbar-nav me-auto mb-2 mb-md-0 %2$s">%3$s</ul>',
	'depth' => 1, // 1 = no dropdowns, 2+ dropdowns
	'before' => '<input class="item-sub" type="checkbox" name="nav">',
	'after' => '',
	'link_before' => '',
	'link_after' => '',
	'walker' => new bootstrap_5_wp_nav_menu_walker()
) ?? '';
?>
<!-- wp:separator {"backgroundColor":"grey-light","className":"is-style-wide"} -->
<hr class="wp-block-separator has-text-color has-grey-light-color has-alpha-channel-opacity has-grey-light-background-color has-background is-style-wide"/>
<!-- /wp:separator -->
<!-- wp:dp/row-section {"childCount":5,"topPadding":"60","botPadding":"60","blockId":"af9d4443-cc89-45cf-b095-70ca0ac95598","className":"foo__top"} -->
<div class="wp-block-dp-row-section container-boxed pt-60 pb-60 foo__top" style="padding-top:60px;padding-bottom:60px;">
	<div class="row five-column-layout">
		<!-- wp:dp/column {"width":"quarter","verticalAlign":"align-self-start"} -->
		<div class="wp-block-dp-column align-self-start" style="">
			<!-- wp:dp/row-section {"contBoxed":"container-fluid","rowWidth":215,"childCount":1,"leftMargin":"1","blockId":"0a863d13-aec5-46a0-a06c-220cd18cd7f7"} -->
			<div class="wp-block-dp-row-section container-fluid w-215-px ml-1" style="margin-left:1px;max-width:215px;">
				<div class="row one-column-layout">
					<!-- wp:dp/column {"contentAlign":"float-left","width":"full"} -->
					<div class="wp-block-dp-column align-self-center float-left" style="">
						<!-- wp:site-logo {"width":70,"shouldSyncIcon":false} /-->
						<!-- wp:spacer {"height":"15px"} --><div style="height:15px" aria-hidden="true" class="wp-block-spacer"></div><!-- /wp:spacer -->
						<!-- wp:paragraph {"style":{"typography":{"fontSize":"12px"}},"textColor":"text"} -->
						<p class="has-text-color" style="font-size:12px">U.K. & International Office <br>Unit 7 College Farm Buildings <br>Barton Road, Pulloxhill <br>Beds. MK45 5HP <br>United Kingdom</p>
						<!-- /wp:paragraph -->
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
<!-- wp:dp/row-section {"contBoxed":"container-fluid","bgStyle":"#f0f0f0","childCount":1,"blockId":"62dee5d7-fdca-49a7-8c50-ad8b9e22a215","className":"foo__contacts"} -->
<div class="wp-block-dp-row-section container-fluid foo__contacts" style="background-color:#f0f0f0;background-size:cover;background-image:url();background-attachment:inherit">
	<div class="row one-column-layout">
		<!-- wp:dp/column {"width":"full"} -->
		<div class="wp-block-dp-column align-self-center" style="">
			<!-- wp:dp/row-section {"childCount":3,"blockId":"29083384-951d-443c-b68a-3eae40f14729"} -->
			<div class="wp-block-dp-row-section container-boxed" style="">
				<div class="row three-column-layout">
					<!-- wp:dp/column {"width":"half","sizeLargeTablet":"col-lg-4"} -->
					<div class="wp-block-dp-column align-self-center col-lg-4" style="">
						<?php wp_nav_menu( $dp_footer_menu ); ?>
					</div>
					<!-- /wp:dp/column -->
					<!-- wp:dp/column {"contentAlign":"text-right","width":"half","sizeLargeTablet":"col-lg-6"} -->
					<div class="wp-block-dp-column align-self-center col-lg-6 text-right" style=""><!-- wp:list {"className":"contact-details"} -->
						<ul class="contact-details">
							<!-- wp:list-item {"className":"contact-details_email"} -->
							<li class="contact-details_email"><a href="mailto: <?=$email?>"><?=$email?></a></li>
							<!-- /wp:list-item -->
							<!-- wp:list-item {"className":"contact-details_tel"} -->
							<li class="contact-details_tel"><a href="tel: <?=$tel?>" target="_blank" rel="noreferrer noopener"><?=$tel?></a></li>
							<!-- /wp:list-item -->
						</ul>
						<!-- /wp:list -->
					</div>
					<!-- /wp:dp/column -->
					<!-- wp:dp/column {"contentAlign":"text-right","width":"half","sizeLargeTablet":"col-lg-2"} -->
					<div class="wp-block-dp-column align-self-center col-lg-2 text-right" style="">
						<!-- wp:social-links {"iconColor":"foreground","iconColorValue":"#000000","openInNewTab":true,"size":"has-small-icon-size","align":"center","className":"is-style-logos-only","layout":{"type":"flex","justifyContent":"left","flexWrap":"wrap"}} -->
						<ul class="wp-block-social-links aligncenter has-small-icon-size has-icon-color is-style-logos-only">
							<!-- wp:social-link {"url":"<?=$yt?>","service":"youtube"} /-->
							<!-- wp:social-link {"url":"<?=$tw?>","service":"x"} /-->
							<!-- wp:social-link {"url":"<?=$fb?>","service":"facebook"} /-->
							<!-- wp:social-link {"url":"<?=$in?>","service":"instagram"} /-->
							<!-- wp:social-link {"url":"<?=$ln?>","service":"linkedin"} /-->
						</ul>
						<!-- /wp:social-links -->
					</div>
					<!-- /wp:dp/column -->
				</div>
			</div>
			<!-- /wp:dp/row-section -->
		</div>
		<!-- /wp:dp/column -->
	</div>
</div>
<!-- wp:dp/row-section {"contBoxed":"container-fluid","childCount":1,"blockId":"3566e140-7108-43b5-8384-f9736c87d00c","className":"foo__copy"} -->
<div class="wp-block-dp-row-section container-fluid foo__copy" style="">
	<div class="row one-column-layout">
		<!-- wp:dp/column {"width":"full"} -->
		<div class="wp-block-dp-column align-self-center" style="">
			<!-- wp:paragraph {"align":"center"} -->
			<p class="has-text-align-center">© <em>2023</em> DP. All Rights Reserved. | <a rel="noreferrer noopener" href="https://digitalpulse.click/" target="_blank">Design by DP</a></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:dp/column -->
	</div>
</div>
<!-- /wp:dp/row-section -->