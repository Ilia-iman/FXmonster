<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class WL_Product_Stock_Element extends Widget_Base {

    public function get_name() {
        return 'wl-single-product-stock';
    }

    public function get_title() {
        return __( 'WL: Product Stock', 'woolentor' );
    }

    public function get_icon() {
        return 'eicon-product-stock';
    }

    public function get_categories() {
        return array( 'woolentor-addons' );
    }

    protected function _register_controls() {

        // Product Price Style
        $this->start_controls_section(
            'product_stock_style_section',
            array(
                'label' => __( 'Style', 'woolentor' ),
                'tab' => Controls_Manager::TAB_STYLE,
            )
        );
            $this->add_control(
                'stock_text_color',
                [
                    'label' => __( 'Text Color', 'woolentor' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '.woocommerce {{WRAPPER}} .stock' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'stock_text_typography',
                    'label' => __( 'Typography', 'woolentor' ),
                    'selector' => '.woocommerce {{WRAPPER}} .stock',
                ]
            );

            $this->add_responsive_control(
                'stock_margin',
                [
                    'label' => __( 'Margin', 'woolentor' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .stock' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

        $this->end_controls_section();

    }


    protected function render( $instance = [] ) {

        $settings   = $this->get_settings_for_display();
        global $product;
        $product = wc_get_product();
        
        if( Plugin::instance()->editor->is_edit_mode() ){
            echo '<p>'.__('Product Stock','woolentor').'</p>';
        } else{
            if ( empty( $product ) ) { return; }
            echo wc_get_stock_html( $product );
        }
        

    }

}
Plugin::instance()->widgets_manager->register_widget_type( new WL_Product_Stock_Element() );
