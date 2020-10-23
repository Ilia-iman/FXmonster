<?php
/**
 * @Author: FXMONSTER
 * @Date:   2020-06-27 00:35:19
 * @Last Modified by:   Iman
 * @Last Modified time: 2020-06-27 00:47:19
 */
 

/**

 * Custom template for product

 *

 * This template can be overridden by copying it to yourtheme/woocommerce/content-widget-product.php.

 * HOWEVER, on occasion WooCommerce will need to update template files and you

 * (the theme developer) will need to copy the new files to your theme to

 * maintain compatibility. We try to do this as little as possible, but it does

 * happen. When this occurs the version of the template file will be bumped and

 * the readme will list any important changes.

 *

 * @see     https://docs.woocommerce.com/document/template-structure/

 * @package WooCommerce/Templates

 * @version 3.5.5

 * @author FXMONSTER

 */



if ( ! defined( 'ABSPATH' ) ) {

	exit;

}

global $product;

if ( ! is_a( $product, 'WC_Product' ) ) {

	return;

}
$gif = get_field('gif', $product->get_id());
?>

<li class="mainWidgetProducts">
	<?php do_action( 'woocommerce_widget_product_item_start', $args ); ?>
		<a class="<?php echo ($gif['id'] > 0) ? 'product-preview-image' : ''; ?>" href="<?php echo esc_url( $product->get_permalink() ); ?>">
            <span class="image-preview"/>
			    <?php echo $product->get_image(); // PHPCS:Ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
            </span>

            <?php if ($gif['url']) :?>
                <span class="gif-preview">
                    <img src="<?php echo $gif['url'];?>" alt="" />
                </span>
            <?php endif?>
		</a>
		<?php //if ( ! empty( $show_rating ) ) : ?>

			<?php //echo wc_get_rating_html( $product->get_average_rating() ); // PHPCS:Ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>

		<?php //endif; ?>

	<div class="productHeadingWd">
		
		<span class="product-cat"><?php echo get_the_terms( $product->term_id, 'product_cat' )[0]->name; ?></span>		
		<span class="product-title"><?php echo wp_kses_post( $product->get_name() ); ?></span>

		

		<?php //echo $product->get_price_html(); // PHPCS:Ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>

 	</div>

 	<? //woocommerce_template_single_add_to_cart();?>

 	<!-- Button Buy --> 


	
	<form class="cart clearfix" action="<?php echo esc_url( $product->product_url ); ?>" method="get" enctype='multipart/form-data'>
		<div style="float:left;padding:2px;">
<a href="<?php echo esc_url( $product->get_permalink() ); ?>" class="single_add_to_cart_button button details">Learn More</a>
		</div>
		
		<div style="float:right;padding:2px;">
		<?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>
		<button type="submit" name="add-to-cart" value="<?php echo esc_attr( $product->get_id() ); ?>" class="single_add_to_cart_button button alt"><?php echo esc_html( $product->single_add_to_cart_text().' $'.$product->price); ?></button>
		<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>
		</div>
		
	</form>

	<?php do_action( 'woocommerce_widget_product_item_end', $args ); ?>

</li>

