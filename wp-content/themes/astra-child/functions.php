<?php

add_action( 'wp_enqueue_scripts', 'bento_child_enqueue_styles' );
add_action( 'wp_enqueue_scripts', 'Scripts' );

function Scripts () {
//        wp_enqueue_script( 'lazyload', 'https://cdn.jsdelivr.net/npm/lazyload@2.0.0-rc.2/lazyload.js' );
        wp_enqueue_script( 'scripts', get_template_directory_uri() . '-child/js/scripts.js' );
}

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
 * Подключение Carbon Feilds
 */
require get_template_directory() . '-child/FXMIntegration.php';
require get_template_directory() . '-child/inc/carbon-fields/carbon-fields-plugin.php';

add_action( 'carbon_fields_register_fields', 'crb_attach_custom_fields' );
  function crb_attach_custom_fields() {
    require_once __DIR__ . '/inc/custom-fields/custom-fields.php';
    require_once __DIR__ . '/inc/custom-fields/gif-grid.php';
  }
?>