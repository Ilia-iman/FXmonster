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

/*
 * Подключение генерации кода покупки
 */
require get_template_directory() . '-child/FXMIntegration.php';

?>