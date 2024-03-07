<?php
get_header(); ?>

<div class="hero-container relative bg-cover bg-center bg-no-repeat flex flex-col justify-center px-4 py-8 lg:px-[10%] lg:py-20" style="background-image: url('<?= get_the_post_thumbnail_url('3080') ?>');">
    <div class="hero-overlay bg-black opacity-50 absolute inset-0 z-[1]"></div>
    <?php
    if (have_rows('hero_group', '3080')) :
        while (have_rows('hero_group', '3080')) : the_row();
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

<div class="px-4 lg:flex lg:flex-row lg:flex-wrap lg:justify-center">
    <?php
    $introduction = get_field('introduction_text', '3080');
    if ($introduction) :
    ?>
    <div class="w-4/5 mx-auto my-8 text-center font-sans text-xs">
        <?= $introduction ?>
    </div>
    <?php endif; ?>
    <div class="product-filters lg:w-1/4">
        <div class="product-filters-row flex flex-col py-4 border-b border-deep-green">
            <div class="hidden lg:flex lg:flex-row lg:justify-between lg:items-center">
                <p class="mb-2 font-title text-sm font-bold uppercase text-deep-green transition-colors duration-300 ease-in-out delay-150">Genre</p>
                <button class="product-filters-toggle inline-block group relative w-[20px] h-[20px] focus:outline-none" onclick="toggleFilterRow(this)">
                    <span class="block w-full h-[2px] bg-deep-green transition-transform duration-300 ease-in-out delay-150 absolute top-1/2 left-0"></span>
                    <span class="block w-full h-[2px] bg-deep-green transition-transform duration-300 ease-in-out delay-150 absolute top-1/2 left-0"></span>
                </button>
            </div>
            <div class="filter-options">
                <?php
                $sex_terms = get_terms([
                    'taxonomy' => 'pa_sexe',
                    'hide_empty' => true,
                ]);
                echo '<label class="filter-option-label m-1.5 py-2.5 px-5 border border-deep-green inline-block cursor-pointer overflow-hidden group relative before:content-[\'\'] before:block before:absolute before:inset-0 before:bg-light-green before:z-[-1] before:transition-all before:duration-300 before:delay-150 before:ease-in-out before:translate-y-[-105%] hover:before:translate-y-0" for="gender_all" onclick="toggleFilter(this)">';
                    echo '<input type="radio" id="gender_all" name="gender" value="all" class="filter-option-radio" checked>';
                    echo '<span class="filter-option-button font-title text-xxs uppercase text-deep-green transition-colors duration-300 ease-in-out delay-150 group-hover:text-white">Tous</span>';
                echo '</label>';
                foreach ($sex_terms as $term) {
                    echo '<label class="filter-option-label m-1.5 py-2.5 px-5 border border-deep-green inline-block cursor-pointer overflow-hidden group relative before:content-[\'\'] before:block before:absolute before:inset-0 before:bg-light-green before:z-[-1] before:transition-all before:duration-300 before:ease-in-out before:translate-y-[-105%] hover:before:translate-y-0" for="gender_' . $term->slug . '" onclick="toggleFilter(this)">';
                        echo '<input type="checkbox" id="gender_' . $term->slug . '" name="gender" value="' . $term->slug . '" class="filter-option-radio hidden">';
                        echo '<span class="filter-option-button font-title text-xxs uppercase text-deep-green transition-colors duration-300 ease-in-out delay-150 group-hover:text-white">' . $term->name . '</span>';
                    echo '</label>';
                }
                ?>
            </div>
        </div>
        <div class="product-filters-row flex flex-col py-4 border-b border-deep-green">
            <div class="hidden lg:flex lg:flex-row lg:justify-between lg:items-center">
                <p class="mb-2 font-title text-sm font-bold uppercase text-deep-green transition-colors duration-300 ease-in-out delay-150">Type de produit</p>
                <button class="product-filters-toggle inline-block group relative w-[20px] h-[20px]" onclick="toggleFilterRow(this)">
                    <span class="block w-full h-[2px] bg-deep-green transition-transform duration-300 ease-in-out delay-150 absolute top-1/2 left-0"></span>
                    <span class="block w-full h-[2px] bg-deep-green transition-transform duration-300 ease-in-out delay-150 absolute top-1/2 left-0"></span>
                </button>
            </div>
            <div class="filter-options">
                <?php
                $categories = get_terms([
                    'taxonomy' => 'product_cat',
                    'hide_empty' => true,
                ]);
                foreach ($categories as $category) {
                    echo '<label class="filter-option-label m-1.5 py-2.5 px-5 border border-deep-green inline-block cursor-pointer overflow-hidden group relative before:content-[\'\'] before:block before:absolute before:inset-0 before:bg-light-green before:z-[-1] before:transition-all before:duration-300 before:ease-in-out before:translate-y-[-105%] hover:before:translate-y-0" for="category_' . $category->slug . '" onclick="toggleFilter(this)">';
                        echo '<input type="checkbox" id="category_' . $category->slug . '" name="product_cat" value="' . $category->slug . '" class="filter-option-radio hidden">';
                        echo '<span class="filter-option-button font-title text-xxs uppercase text-deep-green transition-colors duration-300 ease-in-out delay-150 group-hover:text-white">' . $category->name . '</span>';
                    echo '</label>';
                }
                ?>
            </div>
        </div>
        <div class="product-filters-row flex flex-col py-4 border-b border-deep-green">
            <div class="hidden lg:flex lg:flex-row lg:justify-between lg:items-center">
                <p class="mb-2 font-title text-sm font-bold uppercase text-deep-green transition-colors duration-300 ease-in-out delay-150">Taille</p>
                <button class="product-filters-toggle inline-block group relative w-[20px] h-[20px]" onclick="toggleFilterRow(this)">
                    <span class="block w-full h-[2px] bg-deep-green transition-transform duration-300 ease-in-out delay-150 absolute top-1/2 left-0"></span>
                    <span class="block w-full h-[2px] bg-deep-green transition-transform duration-300 ease-in-out delay-150 absolute top-1/2 left-0"></span>
                </button>
            </div>
            <div class="filter-options">
                <?php
                $size_terms = get_terms([
                    'taxonomy' => 'pa_taille',
                    'hide_empty' => true,
                ]);
                foreach ($size_terms as $term) {
                    echo '<label class="filter-option-label m-1.5 py-2.5 px-5 border border-deep-green inline-block cursor-pointer overflow-hidden group relative before:content-[\'\'] before:block before:absolute before:inset-0 before:bg-light-green before:z-[-1] before:transition-all before:duration-300 before:ease-in-out before:translate-y-[-105%] hover:before:translate-y-0" for="size_' . $term->slug . '" onclick="toggleFilter(this)">';
                        echo '<input type="checkbox" id="size_' . $term->slug . '" name="size" value="' . $term->slug . '" class="filter-option-radio hidden">';
                        echo '<span class="filter-option-button font-title text-xxs uppercase text-deep-green transition-colors duration-300 ease-in-out delay-150 group-hover:text-white">' . $term->name . '</span>';
                    echo '</label>';
                }
                ?>
            </div>
        </div>
        <div class="product-filters-row flex flex-col py-4 border-b border-deep-green">
            <div class="hidden lg:flex lg:flex-row lg:justify-between lg:items-center">
                <p class="mb-2 font-title text-sm font-bold uppercase text-deep-green transition-colors duration-300 ease-in-out delay-150">Couleurs</p>
                <button class="product-filters-toggle inline-block group relative w-[20px] h-[20px]" onclick="toggleFilterRow(this)">
                    <span class="block w-full h-[2px] bg-deep-green transition-transform duration-300 ease-in-out delay-150 absolute top-1/2 left-0"></span>
                    <span class="block w-full h-[2px] bg-deep-green transition-transform duration-300 ease-in-out delay-150 absolute top-1/2 left-0"></span>
                </button>
            </div>
            <div class="filter-options">
                <?php
                $color_terms = get_terms([
                    'taxonomy' => 'pa_couleur',
                    'hide_empty' => true,
                ]);
                foreach ($color_terms as $term) {
                    $colorOne = get_field('color_rgb', $term->taxonomy . '_' . $term->term_id);
                    ?>
                    <label class="filter-option-label filter-option-color m-1.5 py-2.5 px-5 border border-deep-green inline-block cursor-pointer relative before:content-[''] before:block before:absolute before:inset-0 before:bg-light-green before:z-[-1] before:transition-all before:duration-300 before:ease-in-out hover:before:scale-x-125 hover:before:scale-y-150" for="color_<?= $term->slug ?>" onclick="toggleFilter(this)" style="<?php if ($colorOne) { echo 'background-color: ' . $colorOne . ';'; } ?>)">
                        <input type="checkbox" id="color_<?= $term->slug ?>" name="color" value="' . $term->slug . '" class="filter-option-radio">
                    </label>
                <?php
                }
                ?>
            </div>
        </div>
        <div class="product-filters-row flex flex-col py-4">
            <div class="filter-options filter-options-promo">
                <label class="filter-option-label m-1.5 py-2.5 px-5 border border-deep-green inline-block cursor-pointer overflow-hidden group relative before:content-[''] before:block before:absolute before:inset-0 before:bg-light-green before:z-[-1] before:transition-all before:duration-300 before:ease-in-out before:translate-y-[-105%] hover:before:translate-y-0" for="promoFilter" onclick="toggleFilter(this)">
                    <span class="filter-option-button inline-block font-title text-xxs uppercase text-deep-green transition-colors duration-300 ease-in-out delay-150 group-hover:text-white">Bon Plans</span>
                    <input type="radio" id="promoFilter" name="bon_plans" value="1" class="filter-option-radio hidden">
                </label>
            </div>
        </div>
        <div class="flex flex-col justify-start w-full mt-4">
            <button id="apply-filters" class="overflow-hidden w-full py-3 px-4 my-4 bg-deep-green text-white font-title uppercase text-xs group relative before:content-[''] before:block before:absolute before:inset-0 before:bg-light-green before:z-[1] before:transition-all before:duration-300 before:ease-in-out before:translate-y-[-105%] hover:before:translate-y-0">
                <span class="relative z-[2] transition-colors duration-300 ease-in-out delay-150 group-hover:text-deep-green">Appliquer les filtres</span>
            </button>
            <button id="reset-filters" class="font-title uppercase text-light-green underline text-xs transition-colors duration-300 ease-in-out delay-150 hover:text-deep-green">Réinitialiser les filtres</button>
        </div>
    </div>
    <div class="products-grid list-none lg:flex lg:flex-row lg:flex-wrap lg:flex-center lg:justify-evenly lg:w-3/4">
        <?php
        $args = array(
            'post_type' => 'product',
            'posts_per_page' => 9,
            'post_status' => 'publish',
        );
        $loop = new WP_Query($args);
        if ($loop->have_posts()) {
            while ($loop->have_posts()) : $loop->the_post();
                wc_get_template_part('content', 'product');
            endwhile;
        } else {
            echo __('Aucun produit trouvé');
        }
        wp_reset_postdata();
        ?>
        <button id="load-more-products" data-page="1" data-per-page="9" class="overflow-hidden w-11/12 lg:w-1/3 mx-auto my-8 py-4 px-20 text-center font-title text-sm font-bold uppercase text-light-green transition-colors duration-300 ease-in-out delay-150 bg-deep-green relative group before:content-[''] before:block before:absolute before:inset-0 before:z-[1] before:bg-light-green before:translate-y-[-110%] before:transition-transform before:duration-300 before:ease-in-out before:delay-150 hover:before:translate-y-0">
            <span class="relative z-[2] transition-colors duration-300 ease-in-out delay-150 group-hover:text-deep-green">Afficher plus</span>
        </button>
    </div>
</div>

<div id="ajaxLoader" class="loader-container" style="display: none;">
    <div class="wrapper">
        <img src="<?= get_stylesheet_directory_uri() ?>/assets/img/bideantrail-loader.webp" alt="Loading..." class="loader" />
    </div>
</div>

<?php get_footer(); ?>
