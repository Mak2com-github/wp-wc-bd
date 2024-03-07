<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}

$displayTitle = get_field('product_title', $product->ID);
$displaySubTitle = get_field('product_sub_title', $product->ID);
$image_url = wp_get_attachment_image_url( $product->get_image_id(), 'large' );
$image_borders = get_field('transparent_borders_image', $product->ID);

$lowest_regular_price = null;
$lowest_sale_price = null;
if ($product->is_type('variable')) {
    foreach ($product->get_available_variations() as $variation) {
        $variation_obj = wc_get_product($variation['variation_id']);
        $regular_price = floatval($variation_obj->get_regular_price());
        $sale_price = floatval($variation_obj->get_sale_price());
        if (is_null($lowest_regular_price) || $regular_price < $lowest_regular_price) {
            $lowest_regular_price = $regular_price;
        }
        if (!empty($sale_price) && (is_null($lowest_sale_price) || $sale_price < $lowest_sale_price)) {
            $lowest_sale_price = $sale_price;
        }
    }
} else {
    $lowest_regular_price = $wcProduct->get_regular_price();
    $lowest_sale_price = $wcProduct->get_sale_price();
}
?>
<li <?php wc_product_class( 'bg-white overflow-hidden w-1/2 lg:w-[330px] p-2 lg:p-4 lg:mx-4', $product ); ?>>
    <a class="block group eyed-cursor" href="<?php echo esc_url( $product->get_permalink() ); ?>">
        <div class="w-full h-[45vw] lg:w-[300px] lg:h-[300px] relative overflow-hidden border border-light-green">
            <p class="hidden lg:block product-error-msg font-sans text-xxs text-white font-medium text-center bg-red-500 absolute z-[5] top-0 left-0 right-0 leading-5 px-4 py-2 transition-transform duration-300 ease-in-out delay-150 translate-y-[-105%]">
            </p>
            <?php if ( $image_url ): ?>
                <div class="absolute inset-0 bg-cover bg-center bg-no-repeat" style="background-image: url('<?php echo esc_url( $image_url ); ?>')"></div>
            <?php
            endif;
            if ($image_borders) :
            ?>
            <div class="absolute z-[3] inset-0 transform-all ease-in-out duration-300 opacity-0 group-hover:opacity-100">
                <div class="absolute inset-0 bg-cover bg-center bg-no-repeat z-[2]" style="background-image: url('<?= $image_borders['url'] ?>')"></div>
                <div class="absolute inset-0 bg-light-green z-[1]"></div>
            </div>
            <?php
            endif;
            if ($product->is_type('variable')) :
            $available_variations = $product->get_available_variations();
            ?>
            <div class="hidden lg:block absolute cursor-auto z-[5] left-0 bottom-0 right-0 bg-white-opacity-70 transition-transform duration-300 ease-in-out delay-150 translate-y-[105%] group-hover:translate-y-0">
                <form class="rapid_variations_form" data-product_id="<?php echo absint($product->get_id()); ?>">
                    <p class="font-sans text-black text-xxs text-center font-bold">Choisir la taille</p>
                    <div class="flex flex-row justify-center">
                        <?php foreach ($available_variations as $variation) : ?>
                            <?php
                            $variation_obj = wc_get_product($variation['variation_id']);
                            $size = $variation_obj->get_attribute('pa_taille');
                            if (!empty($size)) : ?>
                                <label for="variation_<?php echo esc_attr($variation['variation_id']); ?>" class="rapid-filter-cart mx-2 cursor-pointer hover:*:font-bold" onclick="toggleRapidFilters(this)">
                                    <input type="radio" name="variation_size" class="rapid-filter-size hidden" value="<?php echo esc_attr($variation['variation_id']); ?>" data-variation_id="<?php echo esc_attr($variation['variation_id']); ?>" id="variation_<?php echo esc_attr($variation['variation_id']); ?>">
                                    <span class="font-sans text-black uppercase font-thin text-xs transition-all duration-300 ease-in-out"><?php echo esc_html($size); ?></span>
                                </label>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                    <input type="hidden" name="add_to_cart_nonce" value="<?php echo wp_create_nonce('add-to-cart-nonce'); ?>">
                    <input type="hidden" name="product_id" value="<?php echo esc_attr($product->get_id()); ?>">
                    <input type="hidden" name="variation_id" class="variation_id" value="">
                    <button type="submit" class="add_to_cart_button button alt w-full px-4 py-2 !bg-deep-green !text-light-green !rounded-none font-sans font-bold uppercase !text-xs">Ajout rapide au panier</button>
                </form>
            </div>
            <?php endif; ?>
        </div>
        <div class="flex flex-row justify-between mt-2">
            <div class="w-2/3 lg:w-4/5 lg:pr-4 flex flex-col justify-start">
                <?php if ($displayTitle) : ?>
                <h3 class="inline-block font-title font-black text-xxs lg:text-base text-deep-green leading-[13px] lg:leading-5 uppercase span-thin span-block *:text-xs"><?php echo $displayTitle; ?></h3>
                <?php endif; ?>
                <?php if ($displaySubTitle) : ?>
                    <p class="inline-block font-title font-regular lg:font-thin text-xs3 lg:text-xs text-deep-green leading-[13px] lg:leading-5 uppercase span-thin span-block *:text-xs"><?php echo $displaySubTitle; ?></p>
                <?php endif; ?>
            </div>
            <div class="w-1/3 lg:w-1/5 flex flex-col justify-start">
                <p class="inline-block *:block font-title text-xxs lg:text-xs text-light-green leading-[15px] lg:leading-5">
                    <?php
                    if (!empty($lowest_sale_price) && $lowest_sale_price < $lowest_regular_price) {
                        echo "<span class='font-black'>" . wc_price($lowest_sale_price) . "</span><del class='opacity-60 text-xxs'>" . wc_price($lowest_regular_price) . "</del>";
                    } else {
                        echo "<span class='font-black'>" . wc_price($lowest_regular_price) . "</span>";
                    }
                    ?>
                </p>
            </div>
        </div>
    </a>
</li>
