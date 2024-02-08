<?php
/*
 * Template Name: Expertise
*/
get_header();
?>

<div class="expertise-page pt-16 lg:pt-28 pb-16">
    <?php get_template_part('template-parts/components/hero'); ?>

    <div id="accompagnement" class="flex flex-col">
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
            <div>
                <h2><?php if (!empty($title)) echo $title; ?></h2>
                <p><?php if (!empty($subTitle)) echo $subTitle; ?></p>
            </div>
            <div id="textSection">

            </div>
            <div id="imageSection" class="bg-center bg-no-repeat bg-cover relative" style="background-image: url('<?= $image['url'] ?>');">
                <?php if (!empty($imageSticker['url'])) { ?>
                <img src="<?= $imageSticker['url'] ?>" alt="<?= $imageSticker['alt'] ?>">
                <?php } ?>
                <div>
                    <?php if (!empty($imageDescription)) echo $imageDescription; ?>
                </div>
            </div>
            <?php
            endwhile;
        endif;
        ?>
    </div>

    <div class="bg-deep-green" style="background-image: url('<?= get_stylesheet_directory_uri() ?>')">
        <h2 class="font-title text-white text-sm w-fit mx-auto block">Nos Créations</h2>
        <div class="flex flex-row justify-between">
            <?php
            if (have_rows('creations_repeater')) :
                while (have_rows('creations_repeater')) : the_row();
                $image = get_sub_field('image');
                if (!empty($image['url'])) {
                    ?>
                    <div class="w-full h-50vh bg-cover bg-center bg-no-repeat" style="background-image: url('<?= $image['url'] ?>');"></div>
                    <?php
                }
                endwhile;
            endif;
            ?>
        </div>
    </div>
</div>

<?php
get_footer();