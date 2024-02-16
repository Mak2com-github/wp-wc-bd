<div class="pt-32 pb-8 px-4 bg-light-grey relative graphic-design-section">
    <?php
    if (have_rows('graphic_crea_group', 2315)) :
        while (have_rows('graphic_crea_group', 2315)) : the_row();
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