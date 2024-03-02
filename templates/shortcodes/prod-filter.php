<?php
// filter_prod
// filter_prod_cat
// filter_prod_tag
// filter_prod_color
// filter_prod_price
// filter_prod_material
// filter_prod_origin
// filter_prod_brand
// filter_prod_weight
// filter_prod_size
// filter_prod_shipping
// filter_prod_search
// filter_prod_tech

// sort_prod
// sort_prod_price_low
// sort_prod_popular
// sort_prod_latest
// sort_prod_id
// sort_prod_title
// sort_prod_rating
?>
<!-- wp:search {"label":"Search","placeholder":"Search products...","buttonText":"Search","buttonPosition":"button-inside","query":{"post_type":"product"},"align":"left"} /-->

<!-- wp:woocommerce/product-new {"columns":4,"rows":2} /-->

<select id="wc-block-components-sort-select__select-0" class="wc-block-sort-select__select wc-block-components-sort-select__select">
	<option value="menu_order">Default sorting</option>
	<option value="popularity">Popularity</option>
	<option value="rating">Average rating</option>
	<option value="date">Latest</option>
	<option value="price">Price: low to high</option>
	<option value="price-desc">Price: high to low</option>
</select>