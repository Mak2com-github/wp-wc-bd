<?php
/*
 * Template Name: Qui Sommes-nous ?
*/
get_header();
?>

<div class="company-page">

    <?php get_template_part('template-parts/components/hero') ?>

    <div class="relative flex flex-col-reverse lg:flex-row lg:px-[5%] lg:py-12">
        <div class="absolute z-[1] inset-0 opacity-20 bg-cover bg-center bg-no-repeat" style="background-image: url('<?= get_stylesheet_directory_uri() ?>/assets/img/patterns/background-pattern.webp')"></div>
        <?php
        if (have_rows('section_1')) :
            while (have_rows('section_1')) : the_row();
            $image = get_sub_field('image');
            $title = get_sub_field('title');
            $text = get_sub_field('text');

            if (!empty($image['url'])) {
            ?>
            <div class="bg-cover bg-no-repeat bg-center w-full h-50vh relative z-[5] lg:my-auto" style="background-image: url('<?= $image['url'] ?>')"></div>
            <?php } ?>
            <div class="flex flex-col w-full px-4 py-8 relative z-[5] lg:ml-16">
                <h2 class="w-fit relative mx-auto lg:ml-0 mb-8 lg:mb-0 block font-title text-deep-green text-center lg:text-left text-xl2 font-black uppercase pb-1 leading-6 border-b-2 border-light-green span-light after:content-[''] after:absolute after:h-0 after:border-l-4 after:border-l-transparent after:border-r-4 after:border-r-transparent after:border-b-8 after:border-b-light-green after:right-0 after:top-0"><?php if (!empty($title)) echo $title; ?></h2>
                <div class="font-sans text-black text-xs text-center lg:text-left text-margin">
                    <?php if (!empty($text)) echo $text; ?>
                </div>
            </div>
            <?php
            endwhile;
        endif;
        ?>
    </div>

    <div class="relative z-[6] bg-deep-green bg-cover bg-center bg-blend-difference px-8 py-8 flex flex-col lg:flex-row lg:justify-between lg:px-[10%] lg:pt-20" style="background-image: url('<?= get_stylesheet_directory_uri() ?>/assets/img/patterns/noise-background.webp');">
        <?php
        if (have_rows('section_2')) :
            while (have_rows('section_2')) : the_row();
                $image = get_sub_field('image');
                $title = get_sub_field('title');
                $text = get_sub_field('text');
                ?>
                <div class="flex flex-col lg:w-2/3">
                    <h2 class="lg:w-[70%] text-left text-white font-title text-xl2 leading-7 mb-8 span-light font-black uppercase"><?php if (!empty($title)) echo $title; ?></h2>
                    <div class="lg:w-[90%] font-sans text-left text-xs mb-8 font-thin text-white">
                        <?php if (!empty($text)) echo $text; ?>
                    </div>
                </div>
            <?php if (!empty($image['url'])) : ?>
                <div class="bg-cover bg-no-repeat bg-center w-[230px] lg:w-1/3 h-[250px] lg:h-[350px] -mb-32" style="background-image: url('<?= $image['url'] ?>')"></div>
            <?php
                endif;
            endwhile;
        endif;
        ?>
    </div>

    <div class="relative z-[5] bg-light-grey flex flex-col-reverse pt-32">
        <?php
        if (have_rows('section_3')) :
            while (have_rows('section_3')) : the_row();
                $image = get_sub_field('image');
                $title = get_sub_field('title');
                $text = get_sub_field('text');

                if (!empty($image['url'])) {
                    ?>
                    <div class="absolute top-[222px] left-0 w-1/2 h-[250px] bg-cover bg-no-repeat bg-center" style="background-image: url('<?= $image['url'] ?>')"></div>
                <?php } ?>
                <div class="flex flex-col w-full px-4 py-8">
                    <h2 class="w-fit relative mx-auto mb-8 block font-title text-deep-green text-center text-xl2 font-black uppercase pb-1 leading-6 border-b-2 border-light-green span-light after:content-[''] after:absolute after:h-0 after:border-l-4 after:border-l-transparent after:border-r-4 after:border-r-transparent after:border-b-8 after:border-b-light-green after:right-0 after:top-0"><?php if (!empty($title)) echo $title; ?></h2>
                    <div class="font-sans text-black text-xs bideantrail-section-3-list">
                        <?php if (!empty($text)) echo $text; ?>
                    </div>
                </div>
            <?php
            endwhile;
        endif;
        ?>
    </div>

    <div class="py-8 px-4">
        <?php
        if (have_rows('section_4')) :
            while (have_rows('section_4')) : the_row();
            $image = get_sub_field('image');
            $title = get_sub_field('title');
            $text = get_sub_field('text');
            $textBeforeLink = get_sub_field('before_link_text');
            $link = get_sub_field('link');
            ?>
            <div>
                <h2 class="w-fit font-title text-deep-green font-black text-xl uppercase mb-8 pb-2 leading-7 border-b-2 border-b-light-green"><?php if (!empty($title)) echo $title; ?></h2>
            </div>
            <div class="flex flex-col-reverse">
                <?php if (!empty($image['url'])) { ?>
                <div class="bg-contain bg-no-repeat bg-center w-[200px] h-[180px] mx-auto my-8" style="background-image: url('<?= $image['url'] ?>')"></div>
                <?php } ?>
                <ul class="flex flex-col">
                    <?php
                    if (have_rows('list_repeater')) :
                        while (have_rows('list_repeater')) : the_row();
                        $line = get_sub_field('list_line');
                            if (!empty($line)) {
                            ?>
                            <li class="font-sans text-xs font-light leading-5 relative pl-12 my-4 before:content-[''] before:absolute before:left-4 before:top-[35%] before:h-[18px] before:w-[18px] before:bg-light-green clip-hexagon">
                                <p><?php echo $line; ?></p>
                            </li>
                            <?php
                            }
                        endwhile;
                    endif;
                    ?>
                </ul>
            </div>
            <div>
                <div class="font-sans text-center text-sm text-black">
                    <?php if (!empty($textBeforeLink)) echo $textBeforeLink; ?>
                </div>
                <a class="relative py-4 px-8 mt-4 block mx-auto w-fit font-title font-bold text-center bg-light-green text-white text-xxs uppercase before:content-[''] before:absolute before:inset-0 before:bg-transparent before:border before:border-light-green before:transition-transform before:duration-300 before:ease-in-out before:translate-x-1 before:translate-y-1 hover:before:translate-x-0 hover:before:translate-y-0" href="<?= $link ?>" target="produits organisations évènemnts">
                    Découvrir
                </a>
            </div>
            <?php
            endwhile;
        endif;
        ?>
    </div>

    <?php get_template_part('template-parts/components/reassurance'); ?>

    <div class="bg-white px-4 pt-8 pb-12 relative">
        <?php
        if (have_rows('collections_group')) :
            while (have_rows('collections_group')) : the_row();
            $image = get_sub_field('image');
            $title = get_sub_field('title');
            $link = get_sub_field('link');
            ?>
            <div class="absolute top-28 left-[10%] w-[80%] h-[200px] bg-cover bg-no-repeat bg-center" style="background-image: url('<?= $image['url'] ?>')"></div>
            <div>
                <h2 class="font-title w-fit mx-auto text-deep-green font-black text-xl uppercase mb-[250px] pb-2 text-center leading-7 *:block *:font-thin"><?php if (!empty($title)) echo $title; ?></h2>
                <div>
                    <a class="relative py-2 px-8 mt-4 block mx-auto w-fit font-title font-bold text-center bg-light-green text-white text-xxs uppercase before:content-[''] before:absolute before:inset-0 before:bg-transparent before:border before:border-light-green before:transition-transform before:duration-300 before:ease-in-out before:translate-x-1 before:translate-y-1 hover:before:translate-x-0 hover:before:translate-y-0" href="<?php if (!empty($link)) echo $link; ?>">Découvrir</a>
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
