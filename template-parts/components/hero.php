<div class="hero-container relative bg-cover bg-center bg-no-repeat flex flex-col justify-center px-4 py-8 lg:px-[10%] lg:py-20" style="background-image: url('<?= get_the_post_thumbnail_url() ?>');">
    <div class="hero-overlay bg-black opacity-50 absolute inset-0 z-[1]"></div>
    <?php
    if (have_rows('hero_group')) :
        while (have_rows('hero_group')) : the_row();
        $title = get_sub_field('title');
        $active = get_sub_field('active_btn');
        $text = get_sub_field('text');
        ?>
            <div class="<?php if ($text) { echo 'w-4/5'; } else { echo 'w-full';} ?> flex flex-col relative z-[2]">
                <h1 class="font-title max-w-[70%] text-white leading-7 mb-4 font-black text-xl lg:text-xl2 uppercase span-light"><?php if ( !empty( $title ) ) echo $title; ?></h1>
                <?php if ($active === true) : ?>
                <div class="font-sans text-white leading-5 font-thin text-xs">
                    <?php if ( !empty( $text ) ) echo $text; ?>
                </div>
                <?php endif; ?>
            </div>
        <?php
        endwhile;
    endif;
    ?>
</div>