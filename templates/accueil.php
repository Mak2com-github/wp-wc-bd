<?php
/*
 * Template Name: Accueil
*/
get_header();
?>

<div class="accueil-page">

    <?php get_template_part('template-parts/components/hero'); ?>

    <div class="flex flex-col lg:flex-row">
        <?php
        if (have_rows('left_group')) :
            while (have_rows('left_group')) : the_row();
            $image = get_sub_field('image');
            $title = get_sub_field('title');
            $text = get_sub_field('text');
            $link = get_sub_field('link');
            ?>
            <div class="p-8 lg:pl-20 lg:pt-20 lg:pb-20 pr-0 lg:pr-8 relative overflow-hidden flex flex-row justify-between bg-deep-green bg-cover bg-center bg-blend-difference lg:w-1/2" style="background-image: url('<?= get_stylesheet_directory_uri() ?>/assets/img/patterns/noise-background.webp');">
                <div class="flex flex-col justify-center w-2/3 relative z-[2]">
                    <h2 class="w-fit flex flex-col relative font-title text-light-green font-black text-xl2 uppercase leading-6 pb-2 before:content-[''] before:absolute before:h-0.5 before:bottom-0 before:left-0 before:right-0 before:bg-white"><?php if (!empty($title)) echo $title; ?></h2>
                    <div class="font-sans text-white text-xs leading-5 my-4"><?php if (!empty($text)) echo $text; ?></div>
                    <?php if (!empty($link)) { ?>
                        <a class="relative py-4 px-6 w-fit font-title font-bold text-center bg-light-green text-white text-xxs uppercase before:content-[''] before:absolute before:inset-0 before:bg-transparent before:border before:border-light-green before:transition-transform before:duration-300 before:ease-in-out before:translate-x-1 before:translate-y-1 hover:before:translate-x-0 hover:before:translate-y-0" href="<?= $link ?>">Découvrir</a>
                    <?php } ?>
                </div>
                <div class="flex flex-col justify-center w-auto relative -ml-4 lg:ml-0 z-[1]">
                    <?php if (!empty($image)) { ?>
                        <img class="w-[150px] lg:w-[300px] max-w-max" src="<?= $image['url'] ?>" alt="<?= $image['alt'] ?>">
                    <?php } ?>
                </div>
            </div>
            <?php
            endwhile;
        endif;

        if (have_rows('right_group')) :
            while (have_rows('right_group')) : the_row();
            $image = get_sub_field('image');
            $title = get_sub_field('title');
            $text = get_sub_field('text');
            $link = get_sub_field('link');
            ?>
            <div class="p-8 lg:pl-8 lg:pt-20 lg:pb-20 pr-0 lg:pr-8 relative flex flex-row lg:flex-row-reverse justify-between bg-light-green lg:w-1/2">
                <div class="flex flex-col justify-center w-2/3 relative z-[2]">
                    <h2 class="w-fit flex flex-col lg:flex-row lg:flex-wrap lg:*:mr-2 relative font-title text-deep-green font-black text-xl2 uppercase leading-6 pb-2 before:content-[''] before:absolute before:h-0.5 before:bottom-0 before:left-0 before:right-0 before:bg-white"><?php if (!empty($title)) echo $title; ?></h2>
                    <div class="font-sans text-white text-xs leading-5 my-4"><?php if (!empty($text)) echo $text; ?></div>
                    <?php if (!empty($link)) { ?>
                        <a class="relative py-4 px-6 w-fit font-title font-bold text-center text-white text-xxs uppercase bg-deep-green before:content-[''] before:absolute before:inset-0 before:bg-transparent before:border before:border-deep-green before:transition-transform before:duration-300 before:ease-in-out before:translate-x-1 before:translate-y-1 hover:before:translate-x-0 hover:before:translate-y-0" href="<?= $link ?>">Découvrir</a>
                    <?php } ?>
                </div>
                <div class="flex flex-col justify-center w-auto relative z-[1]">
                    <?php if (!empty($image)) { ?>
                        <img class="w-[150px] lg:w-[250px] max-w-max" src="<?= $image['url'] ?>" alt="<?= $image['alt'] ?>">
                    <?php } ?>
                </div>
            </div>
            <?php
            endwhile;
        endif;
        ?>
    </div>

    <div class="py-12 lg:pt-24 lg:pb-12 px-4 lg:px-[10%] relative lg:flex lg:flex-row-reverse">
        <div class="absolute z-[1] inset-0 opacity-20 bg-cover bg-center bg-no-repeat" style="background-image: url('<?= get_stylesheet_directory_uri() ?>/assets/img/patterns/background-pattern.webp');"></div>
        <?php
        if (have_rows('expertise_group')) :
            while (have_rows('expertise_group')) : the_row();
            $imageLarge = get_sub_field('image_large');
            $imageMedium = get_sub_field('image_medium');
            $sticker = get_sub_field('image_sticker');
            $title = get_sub_field('title');
            $text = get_sub_field('text');
            $link = get_sub_field('link');
            ?>
            <div class="relative z-[3] lg:w-2/5 lg:left-[-8%]">
                <h2 class="w-fit relative mx-auto block font-title text-deep-green text-center lg:text-left text-xl2 font-black leading-7 *:block lg:*:inline-block lg:*:mr-2 uppercase title-triangle-green-light mb-8 lg:mb-2 lg:ml-0 lg:border-b-2 lg:border-b-light-green"><?php if (!empty($title)) echo $title; ?></h2>
                <div class="font-sans text-center lg:text-left text-xs leading-5 my-4 text-margin">
                    <?php if (!empty($text)) echo $text; ?>
                </div>
                <?php if (!empty($link)) { ?>
                    <a class="relative block w-fit mx-auto lg:ml-0 py-3 px-4 font-title text-white text-xxs font-bold uppercase bg-deep-green before:content-[''] before:absolute before:inset-0 before:bg-transparent before:border before:border-deep-green before:transition-transform before:duration-300 before:ease-in-out before:translate-x-1 before:translate-y-1 hover:before:translate-x-0 hover:before:translate-y-0" href="<?= $link ?>">En savoir plus</a>
                <?php } ?>
            </div>
            <div class="relative z-[2] mt-12 lg:w-7/12">
                <?php if (!empty($imageLarge)) { ?>
                    <div class="block relative z-[7] bg-cover bg-center bg-no-repeat w-[80%] h-50vw lg:h-[25vw]" style="background-image: url('<?= $imageLarge['url'] ?>')"></div>
                <?php } ?>
                <?php if (!empty($sticker)) { ?>
                    <div class="absolute top-[40%] left-[40%] w-[15vw] lg:w-[8vw] h-[15vw] lg:h-[8vw] bg-cover bg-no-repeat bg-center z-[10]" style="background-image: url('<?= $sticker['url'] ?>')"></div>
                <?php } ?>
                <?php if (!empty($imageMedium)) { ?>
                    <div class="block relative z-[8] bg-cover bg-center bg-no-repeat w-[55%] h-[35vw] lg:h-[15vw] -mt-20 lg:-mt-28 ml-auto" style="background-image: url('<?= $imageMedium['url'] ?>')"></div>
                <?php } ?>
            </div>
            <?php
            endwhile;
        endif;
        ?>
    </div>

    <div class="bg-light-grey py-8">
        <?php
        if (have_rows('products_highlights')) :
            while (have_rows('products_highlights')) : the_row();
            $title = get_sub_field('title');
            $text = get_sub_field('text');
            ?>
            <div class="px-4">
                <h2 class="w-fit relative mx-auto block font-title text-light-green text-center text-xl2 font-black uppercase leading-6 border-b-2 border-deep-green"><?php if (!empty($title)) echo $title; ?></h2>
                <div class="font-sans text-center text-xs leading-5 my-4 block font-regular">
                    <?php if (!empty($text)) echo $text; ?>
                </div>
            </div>
            <div id="productsHighlight" class="swiperHighlightProducts swiper px-4">
                <div class="w-full lg:w-10/12 lg:mx-auto xl:w-9/12 2xl:w-3/5">
                    <p class="relative title-triangle-green-light font-title text-light-dark text-xxs mb-2 mt-8 px-4 w-fit after:content-[''] after:absolute after:h-0 after:border-l-4 after:border-l-transparent after:border-r-4 after:border-r-transparent after:border-b-8 after:border-b-light-green after:right-0 after:top-0">La sélection du moment</p>
                </div>
                <div id="productsHighlightWrapper" class="swiper-wrapper lg:justify-center">
                    <?php
                    if (have_rows('products_selection')) :
                        while (have_rows('products_selection')) : the_row();
                            $product = get_sub_field('product');
                            $animeActive = get_sub_field('anime_version_active');
                            $wcProduct = wc_get_product( $product->ID );
                            $image_id = $wcProduct->get_image_id();
                            $imageProductUrl = wp_get_attachment_url($image_id);
                            $imageBorders = get_sub_field('transparent_borders_image');
                            $imageSimple = get_sub_field('transparent_simple_image');
                            $title = get_field('libelle_du_produit', $product->ID);
                            $product_url = get_permalink($product->ID);
                            // Initialisation des variables pour les prix
                            $lowest_regular_price = null;
                            $lowest_sale_price = null;
                            if ($wcProduct->is_type('variable')) {
                                foreach ($wcProduct->get_available_variations() as $variation) {
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
                            <div class="product-highlight-block swiper-slide w-[280px] lg:mx-4">
                                <a class="block group eyed-cursor" href="<?= esc_url($product_url); ?>">
                                    <div class="w-[280px] h-[300px] relative overflow-hidden border border-light-green">
                                        <?php
                                        if ($animeActive === true) :
                                            if (!empty($imageBorders) && !empty($imageSimple)) :
                                                ?>
                                                <div class="absolute inset-0 bg-cover bg-center bg-no-repeat" style="background-image: url('<?= $imageSimple['url'] ?>')"></div>
                                                <div class="absolute inset-0 transform-all ease-in-out duration-300 opacity-0 group-hover:opacity-100">
                                                    <div class="absolute inset-0 bg-cover bg-center bg-no-repeat z-[2]" style="background-image: url('<?= $imageBorders['url'] ?>')"></div>
                                                    <div class="absolute inset-0 bg-light-green z-[1]"></div>
                                                </div>
                                            <?php
                                            endif;
                                        else :
                                            if ($imageProductUrl) :
                                                ?>
                                                <div class="absolute inset-0 bg-cover bg-center bg-no-repeat" style="background-image: url('<?= $imageProductUrl ?>')"></div>
                                            <?php
                                            endif;
                                        endif;
                                        ?>
                                    </div>
                                    <h3 class="inline-block w-8/9 font-title font-black text-base text-deep-green leading-5 uppercase span-thin span-block mt-4 *:text-xs"><?= $title ?></h3>
                                    <p class="inline-block *:block font-title text-xs text-light-green leading-4">
                                        <?php
                                        if (!empty($lowest_sale_price) && $lowest_sale_price < $lowest_regular_price) {
                                            echo "<span class='font-black'>" . wc_price($lowest_sale_price) . "</span><del class='opacity-60 text-xxs'>" . wc_price($lowest_regular_price) . "</del>";
                                        } else {
                                            echo "<span class='font-black'>" . wc_price($lowest_regular_price) . "</span>";
                                        }
                                        ?>
                                    </p>
                                </a>
                            </div>
                        <?php
                        endwhile;
                    endif;
                    ?>
                </div>
            </div>
            <?php
            endwhile;
        endif;
        ?>
    </div>

    <?php get_template_part('template-parts/components/partners') ?>

</div>

<?php
get_footer();
