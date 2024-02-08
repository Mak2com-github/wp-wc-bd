<div class="py-8">
    <?php
    if (have_rows('references_group')) :
        while (have_rows('references_group')) : the_row();
        $title = get_sub_field('title');
        ?>
        <div class="mb-4">
            <h2 class="font-title text-deep-green font-black text-xl2 uppercase leading-6 block w-fit mx-auto text-center border-b-2 border-b-light-green pb-4 lg:pb-1 *:block lg:*:inline-block"><?php if (!empty($title)) echo $title; ?></h2>
        </div>
        <div class="swiper swiperPartners">
            <div class="swiper-wrapper cursor-grab">
                <?php
                if (have_rows('clients_repeater')) :
                    while (have_rows('clients_repeater')) : the_row();
                        $image = get_sub_field('logo');
                        ?>
                        <div class="swiper-slide w-[150px]">
                            <?php if (!empty($image)) { ?>
                                <img class="block m-auto w-auto h-[100px]" src="<?= $image['url'] ?>" alt="<?= $image['alt'] ?>">
                            <?php } ?>
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