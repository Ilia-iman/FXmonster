<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product, $post;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked wc_print_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}

?>


<div class="header_outspace"></div>
<div id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>

	<?php
	//echo wc_get_product_category_list($product->get_id());

/*	$product_categories = get_terms( 'product_cat' ,array(
    	'hide_empty' => true
	));*/

	//var_dump($product);exit;

	$getTermByPostID = get_the_terms( $post->ID, 'product_cat' );
	$saveParentCatID = 0;
	$globallyCatName = '';

	//1 array = lone global cat
	if(count($getTermByPostID) == 1){
		$saveParentCatID = $getTermByPostID[0]->term_id;
	}


	foreach ($getTermByPostID as $key) {
		if($key->parent){
			$saveParentCatID = $key->parent;
		}else{
			//no parent (globally)
			$globallyCatName = $key->name;
			//$saveParentCatID = $key->category_ids;
		}
	}	


$thumbnail_id = get_woocommerce_term_meta( $saveParentCatID, 'thumbnail_id', true );
$image = wp_get_attachment_url( $thumbnail_id );

  $args_cat_list = array(
    'taxonomy'     => 'product_cat',
    'orderby'      => '',
    'show_count'   => 0,
    'pad_counts'   => 0,
    'childless'    => 0,
    'child_of'     => 0,
    'title_li'     => '',
    'hide_empty'   => 0,
    'parent'	   => $saveParentCatID,

  );

	?>

	<div class="catSpecialHead">
<!--		<div class="left">-->
<!--			<img src='--><?// echo $image;?><!--' width="100px">-->
<!--		</div>-->
		<div class="left textHeadCatSide">
			<h4><a href="<?php echo get_term_link( $saveParentCatID );?>"><?php echo $globallyCatName;?></a></h4>
			<ul class="category_head_sets">
			<?php wp_list_categories( $args_cat_list );?>
			</ul>
		</div>
		<div class="clear"></div>
	</div>
	
	<?php
	//var_dump($product_categories);
	//echo $product_categories[1]['name'];

/*	$categories = get_terms( 'category', array(
		// 'orderby'    => 'count',
		'hide_empty' => 0,
	) );*/

/*	foreach( $product_categories as $cat ) {
		//echo $cat->name.'<br>';

		

		if($cat->parent == 22){
			echo $cat->name;
		}

	}*/

	//var_dump($product);

//get_term( 22 )->name   - FOUNDED


	//var_dump($product_categories);

	//parent
	//term_id

	
	//echo $product_categories[1]['name'];
	//echo 11;

	/**
	 * Hook: woocommerce_before_single_product_summary.
	 *
	 * @hooked woocommerce_show_product_sale_flash - 10
	 * @hooked woocommerce_show_product_images - 20
	 */
	?>
		<div class="customPriceAndOrderBtn">
			<?php
			woocommerce_template_single_price(); //Цена
 			woocommerce_template_single_add_to_cart();//Кнопка
			?>
		</div><br/>

	</div>
	<?php
		

	do_action( 'woocommerce_before_single_product_summary' ); //Отображение левой части (Ютуб)
	?>


		<?php
		/**
		 * Hook: woocommerce_single_product_summary.
		 *
		 * @hooked woocommerce_template_single_title - 5
		 * @hooked woocommerce_template_single_rating - 10
		 * @hooked woocommerce_template_single_price - 10
		 * @hooked woocommerce_template_single_excerpt - 20
		 * @hooked woocommerce_template_single_add_to_cart - 30
		 * @hooked woocommerce_template_single_meta - 40
		 * @hooked woocommerce_template_single_sharing - 50
		 * @hooked WC_Structured_Data::generate_product_data() - 60
		 */
		//do_action( 'woocommerce_single_product_summary' );

		//woocommerce_template_single_meta();

		
		?>



				<?php wc_display_product_attributes( $product );?>

	<div class="clear"></div>
	<div class="singleItemContentBox shadowBox">
		<h5><?php the_title();?></h5>
		<?php the_content();?>
	</div>

	<?php

	//var_dump( $product->attributes);
	//$productAttr = $product->attributes;
	// wc_display_product_attributes( $product );
/*	foreach ($productAttr as $key2 => $val2) {
		echo $val2['options'][0];
	}*/

	/**
	 * Hook: woocommerce_after_single_product_summary.
	 *
	 * @hooked woocommerce_output_product_data_tabs - 10
	 * @hooked woocommerce_upsell_display - 15
	 * @hooked woocommerce_output_related_products - 20
	 */

	//woocommerce_output_product_data_tabs();
	//do_action( 'woocommerce_after_single_product_summary' );
	?>

<?php do_action( 'woocommerce_after_single_product' ); ?>


<h2 class="recommendedSinglePage">Recommended</h2>

<?php

/*$args = array(
    'orderby' => 'modified',
    'order' => 'DESC',
    'limit' => 3,
);*/
/*$products = wc_get_products( $args );
var_dump($products);*/

/*$productxx = get_product(get_the_ID());

var_dump($productxx );*/

//woocommerce_product_loop_start();

//wc_get_template_part( 'content', 'widget-product' );

//add_action( 'custom_after_single_product_summary', 'woocommerce_output_related_products', 20 );

?>
<ul class="products">
    <?php
    $args = array(
        'post_type' => 'product',
        'posts_per_page' => 8,
        'tax_query' => array(
            array(
                'taxonomy' => 'product_cat',
                'field'    => 'term_id',
                'terms'    => array( $saveParentCatID )
            )
        )
    );

    $loop = new WP_Query( $args );

    if ( $loop->have_posts() ) {
        while ( $loop->have_posts() ) : $loop->the_post();
            wc_get_template_part( 'content', 'product' );
        endwhile;
    } else {
        echo __( 'No products found' );
    }
    wp_reset_postdata();
    ?>
</ul>
