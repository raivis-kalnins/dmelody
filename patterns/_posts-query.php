<?php
/**
 * Title: Archive Posts Query
 * Slug: posts-query
 * Block Types: core/query
 */
?>
<!-- wp:query {"query":{"perPage":9,"pages":0,"offset":"0","postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true},"align":"wide","layout":{"type":"default"}} -->
<!-- wp:query-no-results --><!-- wp:pattern {"slug":"hidden-no-results"} /--><!-- /wp:query-no-results -->
<div class="wp-block-query">
	<!-- wp:post-template {"layout":{"type":"grid","columnCount":2}} -->
		<!-- wp:post-featured-image {"isLink":true,"width":"100%","height":"max(15vw, 30vh)","align":"wide"} /-->
		<div class="post-content" style="padding:20px">
			<!-- wp:post-title {"isLink":true,"className":"h3"} /-->
			<!-- wp:post-excerpt /-->
			<!-- wp:spacer {"height":"20px"} --><div style="height:20px" aria-hidden="true" class="wp-block-spacer"></div><!-- /wp:spacer -->
			<!-- wp:post-date {"isLink":true} /-->
			<!-- wp:spacer {"height":"20px"} --><div style="height:20px" aria-hidden="true" class="wp-block-spacer"></div><!-- /wp:spacer -->
			<!-- wp:post-terms {"term":"category","prefix":"Category: "} /-->
			<!-- wp:post-terms {"term":"post_tag","prefix":"Tags: "} /-->						
		</div>
	<!-- /wp:post-template -->
</div>
<!-- /wp:query -->