<?php


add_action( 'wp_enqueue_scripts', 'bento_child_enqueue_styles' );
function bento_child_enqueue_styles() {
	$parent_style = 'bento-theme-styles';
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
} 

add_filter('acf/settings/remove_wp_meta_box', '__return_false');

/*function wpse240457_add_class($html) {
  $html = '<ul class="product_list_widget your-new-class">XXX</ul>';
  return $html;
}
add_filter('woocommerce_before_widget_product_list', 'wpse240457_add_class', 1, 15);*/


/**
 * FXM Integration WP Woocommerce - gen.purchase codes
 * @author aniom
 * @version 1.1
 * @api 1.0
 */
add_action('woocommerce_add_order_item_meta','fxm_extension_gen_key_integration', 10, 3 );
function fxm_extension_gen_key_integration( $item_id, $values, $cart_item_key ) {
	//Set custom row with title in [Order Details] if you wish
	$title_with_purchase_key = 'FxMonster Purchase Code';
	$test_mode = false;
	//DO NOT EDIT CODE BELOW
	$order_id_by_item_id = wc_get_order_id_by_order_item_id($item_id);
	$order = wc_get_order($order_id_by_item_id);
	//if order exists (right id)
	if($order){
		$get_order_charkey = $order->get_order_key();
		$product_id = $values[ 'product_id' ];
		$product = wc_get_product($product_id);
		//check product - is the Atom package or not? If yes - generate special code and send to our server.
		foreach ($product->get_meta_data() as $meta) {
			$meta_key = $meta->key;//meta key
			$meta_val = $meta->value;//meta value
			if($meta_key && $meta_key == 'fxm_extension_package'){
				$generated_code_md = md5($product_id.':'.$get_order_charkey.':'.$meta_val);
				//Insert order product Purchase code
				wc_add_order_item_meta($item_id, $title_with_purchase_key, $generated_code_md, true);
				if(!$test_mode){
					//CURL - Send data to Atom Core server (API v1)
					$handle = curl_init('http://api.fxmonster.net/fxm_core.php?act=wc_action');
					$data = [
						'wc_order_key' => $get_order_charkey,
						'order_id_one' => $item_id,//equal $order->get_id()
						'order_id_global' => $order_id_by_item_id, 
						'product_id' => $product_id,
						'fxm_package' => $meta_val,
						'status' => $order->get_status(),
						'generated_purchase_code' => $generated_code_md,
						'currency' => $order->get_currency(),
						'billing_firstname' => $order->get_billing_first_name(),
						'billing_lastname' => $order->get_billing_last_name(),
						'billing_company' => $order->get_billing_company(),
						'billing_email' => $order->get_billing_email()
					];
					$encodedData = json_encode($data);
					curl_setopt($handle, CURLOPT_POST, 1);
					curl_setopt($handle, CURLOPT_POSTFIELDS, $encodedData);
					curl_setopt($handle, CURLOPT_HTTPHEADER, [
						'Content-Type: application/json', 
						'WC-AtomX-Source: '.get_site_url()
					]);
					curl_exec($handle);
				}
			}
		}
	}
}

?>