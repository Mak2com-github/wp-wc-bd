<?php
get_header();
$current_term = get_queried_object();
?>

<div data-product-id="<?= get_the_ID() ?>" class="pro-single-page lg:pt-12 lg:overflow-hidden">
    <div id="productProHead" class="flex flex-col lg:w-4/5 lg:mx-auto lg:flex-row lg:flex-wrap lg:justify-center lg:mb-4 lg:pb-4 lg:relative lg:after:content-[''] lg:after:block lg:after:w-full lg:after:h-px lg:after:bg-deep-grey lg:after:opacity-40">
        <div class="w-[300px] h-[350px] mx-auto bg-light-grey flex flex-col justify-center lg:mx-8">
            <img class="mx-auto" src="<?php the_post_thumbnail_url(); ?>" alt="Image du produit <?= the_title() ?>">
        </div>
        <div class="w-11/12 lg:w-2/5 my-8 mx-auto lg:my-0 lg:mx-8 border-b border-medium-grey lg:border-none pb-4">
            <h1 class="w-fit relative mx-auto lg:ml-0 mb-8 block font-title text-deep-green text-center lg:text-left text-xl2 font-black uppercase pb-1 pr-2 leading-6 border-b-2 border-light-green span-light after:content-[''] after:absolute after:h-0 after:border-l-4 after:border-l-transparent after:border-r-4 after:border-r-transparent after:border-b-8 after:border-b-light-green after:right-0 after:top-0"><?php the_title() ?></h1>
            <?php
            if (have_rows('intro_group')) :
                while (have_rows('intro_group')) : the_row();
                $introduction = get_sub_field('introduction');
                ?>
                <div class="font-sans text-xs text-black font-regular mb-12">
                    <?php if ($introduction) { echo $introduction; } ?>
                </div>
                <?php
                endwhile;
            endif;
            ?>
            <div class="px-2">
                <h2 class="font-sans text-sm text-deep-green font-bold mb-4 uppercase">Options & Caractéristiques</h2>
                <ul>
                    <?php
                    if (have_rows('technical_details_repeater')) :
                        while (have_rows('technical_details_repeater')) : the_row();
                        $option = get_sub_field('technical_detail');
                        ?>
                        <li class="pl-4 my-1 relative after:content-[''] after:absolute after:h-0 after:border-l-4 after:border-l-transparent after:border-r-4 after:border-r-transparent after:border-b-8 after:border-b-deep-green after:left-0 after:top-1">
                            <p class="font-sans text-xs leading-5"><?php if ($option) echo $option; ?></p>
                        </li>
                        <?php
                        endwhile;
                    endif;
                    ?>
                </ul>
            </div>
        </div>
    </div>
    <div id="optionsConfig" class="px-4 lg:w-4/5 lg:mx-auto">
        <h2 class="w-fit relative mr-auto lg:ml-0 mb-4 lg:mb-0 block font-title text-deep-green text-left lg:text-left text-sm font-bold uppercase pb-1 pr-2 leading-6 after:content-[''] after:absolute after:h-0 after:border-l-4 after:border-l-transparent after:border-r-4 after:border-r-transparent after:border-b-8 after:border-b-light-green after:right-0 after:top-0">Je choisis mes options</h2>

        <form id="proProductOptions" action="" class="flex flex-col">
            <?php
            if (have_rows('options')) :
                while (have_rows('options')) : the_row();
                $optionName = get_sub_field('option_name');
                $infosPopup = get_sub_field('info_bubble');
                $numberField = get_sub_field('numbers_fields');
                $textField = get_sub_field('texts_fields');
                ?>
                <div class="form-row py-2 my-2 lg:relative">
                    <div class="transition-all duration-300 ease-in-out lg:border lg:border-white lg:focus:border-light-green lg:hover:border-light-green lg:w-4/6 lg:p-4">
                        <label class="relative pr-6 w-fit font-title text-deep-green text-base font-regular" for="<?php echo sanitize_title($optionName) ?>"><?php if ($optionName) echo $optionName; ?><span class="infos-button absolute -top-1 right-0 cursor-pointer"><img src="<?= get_stylesheet_directory_uri() ?>/assets/img/icons/infos-icon.png" alt="icone d'informations"></span></label>
                        <div id="<?php echo sanitize_title($optionName) ?>" class="fields-input flex flex-col lg:flex-row lg:flex-wrap">
                            <?php
                            if ($numberField) :
                                if (have_rows('option_group_numbers')) :
                                    while (have_rows('option_group_numbers')) : the_row();
                                    if (have_rows('value_repeater')) :
                                        while (have_rows('value_repeater')) : the_row();
                                        $bidimensionnal = get_sub_field('bidimensionnal');
                                        $tridimensionnal = get_sub_field('tridimensionnal');
                                        $value = '';
                                        if ($bidimensionnal) :
                                            $h = get_sub_field('hauteur');
                                            $w = get_sub_field('largeur');
                                            $value = $h . ' x ' . $w;
                                        endif;
                                        if ($tridimensionnal) :
                                            $h = get_sub_field('hauteur');
                                            $w = get_sub_field('largeur');
                                            $p = get_sub_field('profondeur');
                                            $value = $h . ' x ' . $w . ' x ' . $p;
                                        endif;
                                        echo '<div class="p-1 lg:w-fit">';
                                            echo '<label for="'. sanitize_title($value) .'" class="form-option relative cursor-pointer group border border-light-green py-2 px-8 lg:pl-12 flex flex-row transition-colors duration-300 ease-in-out hover:bg-light-green-opacity"><span class="font-sans text-sm text-deep-green font-bold block w-fit mx-auto">'. $value .' Cm</span> <input class="opacity-0 absolute" name="'. sanitize_title($optionName) .'" id="'. sanitize_title($value) .'" type="radio" value="'. $value .'"><span class="checkmark transition-all duration-300 ease-in-out w-[20px] h-[20px] bg-light-green opacity-20 group-hover:opacity-100 absolute left-4 top-[25%] rounded-full"></span></label>';
                                        echo '</div>';
                                        endwhile;
                                    endif;
                                    endwhile;
                                endif;
                            endif;
                            if ($textField) :
                                if (have_rows('option_group_texts')) :
                                    while (have_rows('option_group_texts')) : the_row();
                                        if (have_rows('value_repeater')) :
                                            while (have_rows('value_repeater')) : the_row();
                                                $value = get_sub_field('text');
                                                echo '<div class="p-1 lg:w-fit">';
                                                    echo '<label for="'. sanitize_title($value) .'" class="form-option relative cursor-pointer group border border-light-green py-2 px-8 lg:pl-12 flex flex-row transition-colors duration-300 ease-in-out hover:bg-light-green-opacity"><span class="font-sans text-sm text-deep-green font-bold block w-fit mx-auto">'. $value .'</span> <input class="opacity-0 absolute" name="'. sanitize_title($optionName) .'" id="'. sanitize_title($value) .'" type="radio" value="'. $value .'"><span class="checkmark transition-all duration-300 ease-in-out w-[20px] h-[20px] bg-light-green opacity-20 group-hover:opacity-100 absolute left-4 top-[25%] rounded-full"></span></label>';
                                                echo '</div>';
                                            endwhile;
                                        endif;
                                    endwhile;
                                endif;
                            endif;
                            ?>
                        </div>
                    </div>
                    <div class="field-infos fixed lg:absolute lg:w-2/5 bottom-0 left-0 lg:left-[inherit] right-0 lg:right-[-10%] bg-white z-[20] transition-transform duration-300 ease-in-out translate-y-[100%] lg:translate-y-0 lg:translate-x-[150%]">
                    <?php
                    if ($infosPopup) :
                        if (have_rows('info_bulle_group')) :
                            while (have_rows('info_bulle_group')) : the_row();
                            $text = get_sub_field('infos_text');
                            ?>
                            <div>
                                <div class="bg-deep-green px-4 py-2 relative lg:pl-8">
                                    <span class="hidden lg:block absolute left-1 top-[10%] cursor-pointer">
                                        <img class="p-1" src="<?= get_stylesheet_directory_uri() ?>/assets/svg/infos-icon-white.svg" alt="icone d'informations">
                                    </span>
                                    <p class="font-sans text-white font-medium text-sm leading-5"><?= $optionName ?></p>
                                    <span class="close-info-btn absolute right-4 top-[20%] cursor-pointer border border-white rounded-full">
                                        <img class="p-1" src="<?= get_stylesheet_directory_uri() ?>/assets/svg/cross-white.svg" alt="close infos icon">
                                    </span>
                                </div>
                                <div class="px-8 py-4 *:font-sans *:text-xs *:text-deep-green lg:shadow-shadow-light lg:w-[98%] lg:ml-auto">
                                    <?php if ($text) echo $text; ?>
                                </div>
                            </div>
                            <?php
                            endwhile;
                        endif;
                    endif;
                    ?>
                    </div>
                </div>
                <?php
                endwhile;
            endif;
            ?>
            <div class="form-row py-2 my-2">
                <label class="relative pr-6 w-fit font-title text-deep-green text-base font-regular" for="quantity">Quantité</label>
                <div id="<?php echo sanitize_title($optionName) ?>" class="fields-input flex flex-col">
                    <div class="p-1">
                        <input class="w-[150px] border border-light-green py-2 px-2 font-sans font-xs text-deep-green" name="quantity" id="quantity" type="number" value="" placeholder="100">
                    </div>
                </div>
            </div>
            <div class="submit-buttons py-2 lg:py-20 my-4 lg:flex lg:flex-row lg:justify-center">
                <button id="addToQuote" data-product-id="<?php echo get_the_ID(); ?>" data-product-name="<?php echo get_the_title(); ?>" data-product-image="<?php echo get_the_post_thumbnail_url(); ?>" data-product-link="<?php echo get_the_permalink(); ?>" class="relative py-4 px-8 mt-4 lg:mt-0 block mx-auto lg:mx-4 w-fit font-title font-bold text-center bg-light-green text-white text-xxs uppercase before:content-[''] before:absolute before:inset-0 before:bg-transparent before:border before:border-light-green before:transition-transform before:duration-300 before:ease-in-out before:translate-x-1 before:translate-y-1 hover:before:translate-x-0 hover:before:translate-y-0">
                    Ajouter au devis
                </button>
                <a class="relative py-4 px-8 mt-4 lg:mt-0 block mx-auto lg:mx-4 w-fit font-title font-bold text-center bg-deep-green text-white text-xxs uppercase before:content-[''] before:absolute before:inset-0 before:bg-transparent before:border before:border-deep-green before:transition-transform before:duration-300 before:ease-in-out before:translate-x-1 before:translate-y-1 hover:before:translate-x-0 hover:before:translate-y-0" href="<?= home_url() ?>/contact/?object=advice&product=<?= $post->ID ?>">
                    Demander un conseil
                </a>
            </div>
        </form>
    </div>
    <div class="relative z-[2] bg-light-grey py-4">
        <?php
        $terms = get_terms(array(
            'taxonomy' => 'category-pro',
            'hide_empty' => true,
            'parent' => 0,
        ));

        if (!empty($terms) && !is_wp_error($terms)) : ?>
            <div class="px-4 xl:max-w-[90%] 2xl:max-w-[70%] xl:mx-auto">
                <h2 class="w-fit relative mx-auto lg:ml-0 lg:my-8 block font-title text-deep-green text-center text-sm lg:text-l lg:text-left font-black uppercase leading-6 border-b-2 border-light-green">Vous pourriez être intéressé par</h2>
                <div class="flex flex-col lg:flex-row lg:flex-wrap lg:justify-between">
                    <?php foreach ($terms as $term) : ?>
                        <div class="relative group my-8 w-full lg:w-1/4">
                            <div class="relative bg-light-grey h-auto lg:h-[400px] p-8 border border-deep-grey transition-all duration-300 ease-in-out group-hover:border-transparent w-10/12 mx-auto my-4  group-hover:shadow-shadow-light">
                                <div class="absolute z-[1] -inset-1 bg-deep-green blur-sm opacity-0 transition-opacity duration-300 ease-in-out group-hover:opacity-100"></div>
                                <div class="relative h-full lg:h-4/5 z-[2] lg:flex lg:flex-col lg:justify-between">
                                    <h2 class="font-title uppercase text-xl lg:text-l font-black *:font-light text-deep-green transition-colors duration-300 ease-in-out group-hover:text-white leading-6 mb-4 text-center"><?= $term->name ?></h2>
                                    <div class="flex flex-col mx-auto justify-center h-[80%] lg:h-auto lg:block my-auto *:max-h-[190px] max-w-[230px] lg:max-w-full lg:*:max-w-[200px] *:w-auto *:mx-auto">
                                        <?php
                                        $thumbnail = get_field('category-thumbnail', 'term_' . $term->term_id);
                                        if ($thumbnail) :
                                            ?>
                                            <img class="block relative z-[2] w-auto lg:max-w-full lg:w-full h-auto lg:max-h-full lg:mx-auto" src="<?= $thumbnail['url'] ?>" alt="<?= $thumbnail['url'] ?>">
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="my-8 relative z-[3]">
                                    <a class="relative py-4 px-16 lg:px-12 mt-8 block mx-auto lg:mx-auto w-fit font-title font-bold text-center bg-light-green text-white text-xxs uppercase before:content-[''] before:absolute before:inset-0 before:bg-transparent before:border before:border-light-green before:transition-transform before:duration-300 before:ease-in-out before:translate-x-1 before:translate-y-1 hover:before:translate-x-0 hover:before:translate-y-0" href="<?php echo esc_url(get_term_link($term)); ?>">Configurer</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <?php get_template_part('template-parts/components/contact-details'); ?>
</div>

<?php
get_footer(); ?>
