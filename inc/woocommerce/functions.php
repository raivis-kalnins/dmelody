<?php
/**
 * Blockpress: Woocommerce
 *
 * @since Blockpress 0.8.0
 */

//Helpers
function blockpress_get_ratings_counts( $product ) {
    global $wpdb;
    
    $counts     = array();
    $raw_counts = $wpdb->get_results( $wpdb->prepare("
            SELECT meta_value, COUNT( * ) as meta_value_count FROM $wpdb->commentmeta
            LEFT JOIN $wpdb->comments ON $wpdb->commentmeta.comment_id = $wpdb->comments.comment_ID
            WHERE meta_key = 'rating'
            AND comment_post_ID = %d
            AND comment_approved = '1'
            AND meta_value > 0
            GROUP BY meta_value
        ", $product->get_id() ) );
    
    foreach ( $raw_counts as $count ) {
        $counts[ $count->meta_value ] = $count->meta_value_count;
    }
    
    return $counts;
}	

function fr_woo_rating_icons_html($rating, $count){
	$html = '';
	if($rating > 0){
		$rating = round($rating, 2);
		for ($i = 1; $i <= 5; $i++){
	    	if ($i <= $rating){
	    		$active = ' active';
	    	}else{
	    		$half = $i - 0.5;
	    		if($half <= $rating){
		    		$active = ' halfactive';		    			
	    		}else{
	    			$active ='';
	    		}
	    	}
	        $html .= '<span class="frwoostar frwoostar'.$i.$active.'">&#9733;</span>';
		}
	}
	return $html;
}

// Remove Woo Tabs
function woo_remove_product_tabs( $tabs ) {
    unset( $tabs['description'] );          // Remove the description tab
    unset( $tabs['reviews'] );          // Remove the reviews tab
    unset( $tabs['additional_information'] );   // Remove the additional information tab
    return $tabs;
}
add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );

// Hide My Accounts items
function WOO_account_menu_items($items) {
    $items['orders'] = 'My Entries';
    $items['edit-address'] = 'My Address';
    $items['edit-account'] = 'Edit Account';
    $items['dashboard'] = 'Newsletter';
    unset($items['downloads']);
    return $items;            
}
add_filter ('woocommerce_account_menu_items', 'WOO_account_menu_items');

add_action( 'woocommerce_account_dashboard', 'custom_account_dashboard_content' );
function custom_account_dashboard_content(){
    echo '<div class="my-account-news">
    <hr />
    <h4>Subscribe / Unsubscribe from Newsletter</h4><br />
    <ul>
        <li><a href="*|UNSUB|*"><b>Unsubscribe from Newsletter<b></a></li>
        <li><a href="*|UNSUB|*"><b>Subscribe from Newsletter<b></a></li>
    </ul>
    </div>
    ';
}
remove_theme_support( 'wc-product-gallery-zoom' );