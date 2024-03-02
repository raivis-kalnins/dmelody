<?php
/**
 * Title: Posts query
 * Slug: posts-query
 */
?>
<!-- wp:dp/row-section {"childCount":1,"topPadding":"100","botPadding":"100","blockId":"10c4795e-8bed-42d4-b7dd-cfc49c0bd241"} -->
<div class="wp-block-dp-row-section container-boxed" style="padding-top:100px;padding-bottom:100px;">
	<div class="row one-column-layout">
		<!-- wp:dp/column {"width":"full"} -->
		<div class="wp-block-dp-column align-self-center" style="">
			<!-- wp:query {"queryId":0,"query":{"perPage":3,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false}} -->
			<div class="wp-block-query">
				<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"0","right":"0"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"default"}} -->
				<div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--50);padding-right:0;padding-bottom:var(--wp--preset--spacing--50);padding-left:0">
					<!-- wp:post-template {"align":"full","style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"grid","columnCount":3}} -->
						<!-- wp:post-featured-image {"isLink":true,"aspectRatio":"3/4","style":{"spacing":{"margin":{"bottom":"0"},"padding":{"bottom":"var:preset|spacing|20"}}}} /-->
						<!-- wp:group {"style":{"spacing":{"blockGap":"10px","margin":{"top":"var:preset|spacing|20"},"padding":{"top":"0"}}},"layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap"}} -->
						<div class="wp-block-group post-content" style="margin-top:var(--wp--preset--spacing--20);padding-top:0">
							<!-- wp:post-title {"className":"h3","isLink":true} /-->
							<!-- wp:template-part {"slug":"post-meta","theme":"dp"} /-->
							<!-- wp:post-excerpt {"style":{"layout":{"flexSize":"min(2.5rem, 3vw)","selfStretch":"fixed"}},"textColor":"contrast-2","fontSize":"small"} /-->
							<!-- wp:post-date /-->
							<!-- wp:spacer {"height":"15px","style":{"layout":{"flexSize":"min(2.5rem, 3vw)","selfStretch":"fixed"}}} -->
								<div style="height:15px" aria-hidden="true" class="wp-block-spacer"></div>
							<!-- /wp:spacer -->
							<ul class="tax-list"><li><strong>Tags:&nbsp;</strong></li><li><!-- wp:post-terms {"term":"post_tag"} /--></li></ul>
							<ul class="tax-list"><li><strong>Cat:&nbsp;</strong></li><li><!-- wp:post-terms {"term":"category"} /--></li></ul>
						</div>
						<!-- /wp:group -->
					<!-- /wp:post-template -->
					<!-- wp:spacer {"height":"var:preset|spacing|40","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
						<div style="margin-top:0;margin-bottom:0;height:var(--wp--preset--spacing--40)" aria-hidden="true" class="wp-block-spacer"></div>
					<!-- /wp:spacer -->
					<!-- wp:query-pagination {"paginationArrow":"arrow","layout":{"type":"flex","justifyContent":"space-between"}} -->
						<!-- wp:query-pagination-previous /-->
						<!-- wp:query-pagination-next /-->
					<!-- /wp:query-pagination -->
				</div>
				<!-- /wp:group -->
				<!-- wp:query-no-results -->
					<!-- wp:paragraph {"placeholder":"Add text or blocks that will display when a query returns no results."} --><p></p><!-- /wp:paragraph -->
				<!-- /wp:query-no-results -->
			</div>
			<!-- /wp:query -->
		</div>
	<!-- /wp:dp/column -->
	</div>
</div>
<!-- /wp:dp/row-section -->
