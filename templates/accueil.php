<?php
/*
 * Template Name: Accueil
*/
get_header();
?>

<div class="accueil-page pt-16 lg:pt-28 pb-16">

    <div class="hero-banner bg-cover bg-center bg-no-repeat flex flex-col justify-center py-8 px-4" style="background-image: url('<?= get_the_post_thumbnail_url() ?>');">
        <?php
        if (have_rows('hero_group')) :
            while (have_rows('hero_group')) : the_row();
            $title = get_sub_field('title');
            $text = get_sub_field('text');
            ?>
            <div class="w-2/3 flex flex-col">
                <h1 class="font-title text-white leading-7 mb-4 font-bold text-xl span-light"><?php if ( !empty( $title ) ) echo $title; ?></h1>
                <div class="font-sans text-white leading-5 font-light">
                    <?php if ( !empty( $text ) ) echo $text; ?>
                </div>
            </div>
            <?php
            endwhile;
        endif;
        ?>
    </div>

    <div class="flex flex-col">
        <?php
        if (have_rows('left_group')) :
            while (have_rows('left_group')) : the_row();
            $image = get_sub_field('image');
            $title = get_sub_field('title');
            $text = get_sub_field('text');
            $link = get_sub_field('link');
            ?>
            <div class="p-8 relative bg-deep-green">
                <div class="flex flex-col justify-center w-2/3 relative z-[2]">
                    <h2 class="font-title text-light-green font-bold text-xl uppercase leading-6 border-b-2 border-white"><?php if (!empty($title)) echo $title; ?></h2>
                    <div class="font-sans text-white text-xs leading-5 my-4"><?php if (!empty($text)) echo $text; ?></div>
                    <?php if (!empty($link)) { ?>
                        <a class="relative py-4 px-6 font-title text-white text-xs uppercase before:content-[''] before:absolute before:inset-0 before:bg-transparent before:border before:border-light-green before:transition-transform before:duration-300 before:ease-in-out before:translate-x-2 before:translate-y-2 hover:before:translate-x-0 hover:before:translate-y-0" href="<?= $link ?>">Découvrir</a>
                    <?php } ?>
                </div>
                <?php if (!empty($image)) { ?>
                    <img class="absolute right-0 top-[20%] w-[180px] z-[1]" src="<?= $image['url'] ?>" alt="<?= $image['alt'] ?>">
                <?php } ?>
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
            <div class="p-8 relative bg-deep-green">
                <div class="flex flex-col justify-center w-2/3 relative z-[2]">
                    <h2 class="font-title text-light-green font-bold text-xl uppercase leading-6 border-b-2 border-white"><?php if (!empty($title)) echo $title; ?></h2>
                    <div class="font-sans text-white text-xs leading-5 my-4"><?php if (!empty($text)) echo $text; ?></div>
                    <?php if (!empty($link)) { ?>
                        <a class="relative py-4 px-6 font-title text-white text-xs uppercase bg-light-green before:content-[''] before:absolute before:inset-0 before:bg-transparent before:border before:border-light-green before:transition-transform before:duration-300 before:ease-in-out before:translate-x-2 before:translate-y-2 hover:before:translate-x-0 hover:before:translate-y-0" href="<?= $link ?>">Découvrir</a>
                    <?php } ?>
                </div>
                <?php if (!empty($image)) { ?>
                    <img class="absolute right-0 top-[20%] w-[180px] z-[1]" src="<?= $image['url'] ?>" alt="<?= $image['alt'] ?>">
                <?php } ?>
            </div>
            <?php
            endwhile;
        endif;
        ?>
    </div>

    <div class="py-12 px-4 bg-cover bg-center bg-no-repeat" style="background-image: url('<?= get_stylesheet_directory_uri() ?>/assets/img/patterns/background-pattern.webp')">
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
        <div class="relative z-[2]">
            <h2 class="w-fit relative mx-auto block font-title text-deep-green text-center text-xl uppercase title-triangle-green-light"><?php if (!empty($title)) echo $title; ?></h2>
            <div class="font-sans text-center text-xs leading-5 my-4">
                <?php if (!empty($text)) echo $text; ?>
            </div>
            <?php if (!empty($link)) { ?>
                <a class="relative py-4 px-6 font-title text-white text-xs uppercase bg-deep-green before:content-[''] before:absolute before:inset-0 before:bg-transparent before:border before:border-deep-green before:transition-transform before:duration-300 before:ease-in-out before:translate-x-2 before:translate-y-2 hover:before:translate-x-0 hover:before:translate-y-0" href="<?= $link ?>">En savoir plus</a>
            <?php } ?>
        </div>
        <div class="relative z-[1]">
            <?php if (!empty($imageLarge)) { ?>
                <img class="block relative z-[2]" src="<?= $imageLarge['url'] ?>" alt="<?= $imageLarge['alt'] ?>">
            <?php } ?>
            <?php if (!empty($sticker)) { ?>
                <img src="<?= $sticker['url'] ?>" alt="<?= $sticker['alt'] ?>">
            <?php } ?>
            <?php if (!empty($imageMedium)) { ?>
                <img src="<?= $imageMedium['url'] ?>" alt="<?= $imageMedium['alt'] ?>">
            <?php } ?>
        </div>
        <?php
        endwhile;
    endif;
    ?>
    </div>

    <div class="flex flex-col">
        <?php
        if (have_rows('products_highlights')) :
            while (have_rows('products_highlights')) : the_row();
            $title = get_sub_field('title');
            $text = get_sub_field('text');
            ?>
            <div class="px-4 my-8">
                <h2 class="w-fit relative mx-auto block font-title text-deep-green text-center text-xl uppercase title-triangle-green-light"><?php if (!empty($title)) echo $title; ?></h2>
                <div class="font-sans text-center text-xs leading-5 my-4 block">
                <?php if (!empty($text)) echo $text; ?>
                </div>
            </div>
            <div class="swiper hightlightSwiper">
                <p class="relative title-triangle-green-light font-sans text-black text-xs">La sélection du moment</p>
                <div class="swiper-wrapper">
                    <?php
                    if (have_rows('products_selection')) :
                        while (have_rows('products_selection')) : the_row();
                            $product = get_sub_field('product');
                            $wcProduct = wc_get_product( $product->ID );
                            var_dump($wcProduct);
                            ?>
                            <div>
                                <div></div>
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

</div>

<?php
get_footer();
