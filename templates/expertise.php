<?php
/*
 * Template Name: Expertise
*/
get_header();
?>

<div class="expertise-page lg:pt-28 pb-16">
    <?php get_template_part('template-parts/components/hero'); ?>

    <div id="accompagnement" class="flex flex-col relative">
        <div class="absolute z-[1] inset-0 opacity-20 bg-contain bg-center bg-repeat" style="background-image: url('<?= get_stylesheet_directory_uri() ?>/assets/img/patterns/background-pattern.webp')"></div>
        <div class="relative z-[2] py-8">
            <?php
            if (have_rows('presentation_group')) :
                while (have_rows('presentation_group')) : the_row();
                    $title = get_sub_field('title');
                    $subTitle = get_sub_field('sub_title');
                    $text1 = get_sub_field('text_1');
                    $text2 = get_sub_field('text_2');
                    $image = get_sub_field('image');
                    $imageDescription = get_sub_field('image_over_text');
                    $imageSticker = get_sub_field('image_sticker');
                    ?>
                    <div class="px-4 mb-8 relative z-[2] lg:w-1/3 lg:mx-auto">
                        <h2 class="w-fit relative mx-auto block font-title text-deep-green text-center text-l font-black uppercase leading-6 border-b-2 border-light-green"><?php if (!empty($title)) echo $title; ?></h2>
                        <div class="font-sans text-center text-xs leading-5 my-4 block font-regular">
                            <p><?php if (!empty($subTitle)) echo $subTitle; ?></p>
                        </div>
                    </div>
                    <div class="px-4 relative lg:flex lg:flex-row lg:justify-center">
                        <div id="textSection" class="lg:w-1/3 lg:pt-12">
                            <div class="mb-4 font-sans text-xs text-black text-center lg:text-left">
                                <?php if ($text1) { echo $text1; } ?>
                            </div>
                            <div class="mt-4 font-sans text-xs text-black text-center lg:text-left">
                                <?php if ($text2) { echo $text2; } ?>
                            </div>
                        </div>
                        <div id="imageSection" class="relative flex flex-col justify-end bg-center bg-no-repeat bg-cover w-[330px] h-[420px] mx-auto lg:mx-8 lg:w-[30%] lg:h-[500px] lg:-mb-20" style="background-image: url('<?= $image['url'] ?>');">
                            <?php if (!empty($imageSticker['url'])) { ?>
                                <img class="hidden lg:block absolute -top-4 -right-8 w-[150px] h-auto lg:rotate-[20deg]" src="<?= $imageSticker['url'] ?>" alt="<?= $imageSticker['alt'] ?>">
                            <?php } ?>
                            <div class="font-sans text-black text-xs relative backdrop-blur-sm">
                                <div class="absolute inset-0 bg-white opacity-60 z-[1]"></div>
                                <div class="relative z-[2] custom-hexagon-list *:font-sans *text-black *:text-xs py-8 px-4">
                                    <?php if (!empty($imageDescription)) echo $imageDescription; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                endwhile;
            endif;
            ?>
        </div>
    </div>

    <div class="bg-deep-green py-8 px-4 lg:pt-32 lg:px-[10%]" style="background-image: url('<?= get_stylesheet_directory_uri() ?>')">
        <div class="lg:w-10/12 lg:mx-auto">
            <h2 class="font-title relative text-white text-xl2 mx-auto lg:ml-12 w-fit block font-black uppercase after:content-[''] after:absolute after:h-0 after:border-l-4 after:border-l-transparent after:border-r-4 after:border-r-transparent after:border-b-8 after:border-b-light-green after:-right-2 after:top-0">Nos Créations</h2>
            <div class="flex flex-col lg:flex-row justify-between lg:justify-center">
                <?php
                if (have_rows('creations_repeater')) :
                    while (have_rows('creations_repeater')) : the_row();
                        $image = get_sub_field('image');
                        if (!empty($image['url'])) {
                            ?>
                            <div class="w-auto lg:w-[350px] my-4 mx-4 h-40vh lg:h-[320px] bg-cover bg-center bg-no-repeat" style="background-image: url('<?= $image['url'] ?>');"></div>
                            <?php
                        }
                    endwhile;
                endif;
                ?>
            </div>
        </div>
    </div>
</div>

<?php
get_footer();