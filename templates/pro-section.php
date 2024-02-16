<?php
/*
 * Template Name: Organisation d'évènements
*/
get_header();
?>

<div class="pro-page">
    <?php get_template_part('template-parts/components/hero'); ?>

    <div class="py-8 relative">
        <div class="absolute z-[1] inset-0 opacity-20 bg-cover bg-center bg-no-repeat" style="background-image: url('<?= get_stylesheet_directory_uri() ?>/assets/img/patterns/background-pattern.webp')"></div>
        <?php
        if (have_rows('intro_group')) :
            while (have_rows('intro_group')) : the_row();
            $title = get_sub_field('title');
            $text = get_sub_field('text');
            ?>
            <div class="px-4 relative z-[2]">
                <h2 class="w-fit relative mx-auto block font-title text-deep-green text-center text-xl2 font-black uppercase leading-6 border-b-2 border-light-green"><?php if (!empty($title)) echo $title; ?></h2>
                <div class="font-sans text-center text-xs leading-5 my-4 block font-regular">
                    <?php if (!empty($text)) echo $text; ?>
                </div>
            </div>
            <?php
            endwhile;
        endif;
        ?>
        <div class="relative z-[2] flex flex-row justify-evenly flex-wrap">
            <?php
            $rows = count(get_field('pro-product-categories'));
            if (have_rows('pro-product-categories')) :
                while (have_rows('pro-product-categories')) : the_row();
                $productCategory = get_sub_field('pro-product-category');
                $description = get_sub_field('description');
                $image = get_sub_field('pro-product-category-image');
                $category = get_term($productCategory);
                ?>
                <div class="relative bg-light-grey p-8 border border-deep-grey transition-all duration-300 ease-in-out hover:border-transparent w-10/12 <?php if ($rows === 1) { echo 'lg:w-full'; } elseif ($rows === 2) { echo 'lg:w-1/2';  } else { echo 'lg:w-1/4'; } ?> mx-auto my-4 group hover:shadow-shadow-light">
                    <div class="absolute z-[1] -inset-1 bg-deep-green blur-sm opacity-0 transition-opacity duration-300 ease-in-out group-hover:opacity-100"></div>
                    <div class="relative z-[2] lg:h-full lg:flex lg:flex-col lg:justify-between">
                        <div>
                            <h3 class="font-title uppercase text-xl font-black *:font-light text-deep-green transition-colors duration-300 ease-in-out group-hover:text-white leading-6 mb-4 text-center"><?= $category->name ?></h3>
                            <p class="font-sans text-center text-xs text-deep-green transition-colors duration-300 ease-in-out group-hover:text-white font-regular"><?= $description ?></p>
                        </div>
                        <img class="w-auto block mx-auto my-8" src="<?= $image['url'] ?>" alt="<?= $image['alt'] ?>">
                        <a class="relative py-4 px-8 mt-4 block mx-auto w-fit font-title font-bold text-center bg-light-green text-white text-xxs uppercase before:content-[''] before:absolute before:inset-0 before:bg-transparent before:border before:border-light-green before:transition-transform before:duration-300 before:ease-in-out before:translate-x-1 before:translate-y-1 hover:before:translate-x-0 hover:before:translate-y-0" href="<?= get_term_link($productCategory) ?>">Découvrir</a>
                    </div>
                </div>
                <?php
                endwhile;
            endif;
            ?>
        </div>
    </div>

    <div class="flex flex-col lg:flex-row lg:justify-center px-4 py-8 bg-light-grey">
        <?php
        if (have_rows('accompagnement_group')) :
            while (have_rows('accompagnement_group')) : the_row();
            $title = get_sub_field('title');
            $text = get_sub_field('sub_title');
            ?>
            <div class="w-full lg:w-[350px] lg:flex lg:flex-col lg:justify-center lg:mr-8">
                <h2 class="font-title text-light-green text-xl uppercase leading-6 font-black pb-4 mb-8 border-b-2 border-deep-green w-[280px]"><?php if (!empty($title)) echo $title; ?></h2>
                <p class="font-sans text-sm text-black flex flex-row justify-between">
                    <span class="inline-block"><?php if (!empty($text)) echo $text; ?></span>
                    <img class="inline-block rotate-180" src="<?= get_stylesheet_directory_uri() ?>/assets/svg/arrow-green.svg" alt="icon de flêche">
                </p>
            </div>
            <div class="flex flex-col mt-8 lg:w-[450px]">
                <?php
                if (have_rows('ordered_list')) :
                    $index = 1;
                    while (have_rows('ordered_list')) : the_row();
                    $title = get_sub_field('line_title');
                    $text = get_sub_field('line_text');
                    ?>
                    <div class="accordeon flex flex-row my-4 justify-between border-b border-transparent bg-dashed-line bg-25x2 bg-bottom bg-repeat-x pb-4 last:bg-none">
                        <div class="cursor-pointer">
                            <p class="accordeon-head relative w-[25px] h-[25px] text-center font-title text-white text-xs before:content-[''] before:absolute before:inset-0 before:bg-light-green before:block clip-hexagon"><span class="relative z-[2] inline-block align-sub"><?php echo $index; ?></span></p>
                        </div>
                        <div class="w-10/12 px-2 cursor-pointer">
                            <h3 class="accordeon-head font-title text-l text-deep-green font-bold pb-2"><?php if ($title) echo $title; ?></h3>
                            <div class="accordeon-body font-sans text-black text-xs leading-4 overflow-hidden transition-all duration-300 ease-in-out h-0">
                                <?php if ($text) echo $text; ?>
                            </div>
                        </div>
                        <div class="cursor-pointer">
                            <img class="accordeon-head accordeon-arrow transition-all duration-300 ease-in-out rotate-180" src="<?= get_stylesheet_directory_uri() ?>/assets/svg/arrow-green.svg" alt="icon de flêche">
                        </div>
                    </div>
                    <?php
                    $index++;
                    endwhile;
                endif;
                ?>
            </div>
            <?php
            endwhile;
        endif;
        ?>
    </div>

    <div class="py-12 lg:pt-24 lg:pb-12 px-4 lg:px-[10%] relative lg:flex lg:flex-row-reverse bg-deep-green bg-cover bg-center bg-blend-difference" style="background-image: url('<?= get_stylesheet_directory_uri() ?>/assets/img/patterns/noise-background.webp');">
        <?php
        if (have_rows('interlocuteur_group')) :
            while (have_rows('interlocuteur_group')) : the_row();
                $imageLarge = get_sub_field('image_large');
                $imageMedium = get_sub_field('image_medium');
                $sticker = get_sub_field('image_sticker');
                $title = get_sub_field('title');
                $subTitle = get_sub_field('sub_title');
                $text = get_sub_field('text');
            ?>
                <div class="relative z-[3] lg:w-2/5 lg:left-[-8%]">
                    <h2 class="w-fit relative mx-auto block font-title text-light-green text-center lg:text-left text-xl2 font-black mb-1 leading-7 uppercase title-triangle-green-light"><?php if (!empty($title)) echo $title; ?></h2>
                    <h3 class="font-sans text-white text-l text-center leading-4"><?php if (!empty($subTitle)) echo $subTitle; ?></h3>
                    <div class="font-sans text-left text-xs text-white leading-5 my-8 font-thin text-margin">
                        <?php if (!empty($text)) echo $text; ?>
                    </div>
                </div>
                <div class="relative z-[2] mt-12 lg:w-7/12 -mb-28">
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

    <div class="pt-32 pb-8 px-4 bg-light-grey relative graphic-design-section">
        <?php
        if (have_rows('graphic_crea_group')) :
            while (have_rows('graphic_crea_group')) : the_row();
                $title = get_sub_field('title');
                $subTitle = get_sub_field('sub_title');
                $text = get_sub_field('text');
                $image = get_sub_field('image');
                $link = get_sub_field('link');
            ?>
            <div>
                <h2 class="w-fit mx-auto block font-title uppercase text-deep-green leading-6 text-xl font-black pb-2 mb-4 border-b-2 border-light-green"><?php if (!empty($title)) echo $title; ?></h2>
                <div class="font-sans text-center text-black leading-5 text-sm">
                    <?php if (!empty($subTitle)) echo $subTitle; ?>
                </div>
            </div>
            <div class="lg:flex lg:flex-row lg:justify-center">
                <div class="inline-block lg:w-[40%] lg:mr-16">
                    <div class="font-sans text-sm text-black leading-5 my-8 bideantrail-section-list">
                        <?php if (!empty($text)) echo $text; ?>
                    </div>
                    <div>
                        <?php if ($link) : ?>
                            <a class="relative py-4 px-8 mt-4 block mx-auto w-fit font-title text-center bg-deep-green text-white  uppercase before:content-[''] before:absolute before:inset-0 before:bg-transparent before:border before:border-deep-green before:transition-transform before:duration-300 before:ease-in-out before:translate-x-1 before:translate-y-1 hover:before:translate-x-0 hover:before:translate-y-0" href="<?= $link ?>">
                                <span class="block font-bold text-xs">Demande de devis</span>
                                <span class="block font-light text-xxs">Pour une création graphique</span>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
                <?php if ($image) :?>
                <div class="absolute lg:sticky bg-cover bg-center bg-no-repeat w-11/12 lg:w-[450px] h-[200px] lg:h-[300px] top-[450px] lg:top-auto lg:my-auto" style="background-image: url('<?= $image['url'] ?>');"></div>
                <?php endif; ?>
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
