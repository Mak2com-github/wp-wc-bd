<?php
get_header();
$current_term = get_queried_object();

?>

<div class="pro-taxonomy-page">
    <div class="pt-8 relative">
        <div class="absolute z-[1] inset-0 opacity-20 bg-contain bg-center bg-repeat" style="background-image: url('<?= get_stylesheet_directory_uri() ?>/assets/img/patterns/background-pattern.webp')"></div>
        <div class="px-4 relative z-[2] lg:w-3/5 lg:mx-auto">
            <h1 class="w-fit relative mx-auto block font-title text-deep-green text-center text-xl2 font-black uppercase leading-6 border-b-2 border-light-green"><?= $current_term->name ?></h1>
            <div class="font-sans text-center text-xs leading-5 my-4 block font-regular">
                <p><?php if ($current_term->description) { echo $current_term->description; } ?></p>
            </div>
        </div>

        <div class="relative z-[2] flex flex-row justify-evenly lg:justify-start flex-wrap lg:px-[5%]">
            <?php
            $args = array(
                'post_type' => 'produit-pro',
                'posts_per_page' => -1,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'category-pro',
                        'field'    => 'term_id',
                        'terms'    => $current_term->term_id,
                    ),
                ),
                'order_by' => 'date',
                'order' => 'ASC'
            );
            $query = new WP_Query($args);
            if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post(); ?>
                    <div class="relative group my-8 w-[320px] lg:w-1/3 xl:w-1/4">
                        <div class="relative bg-light-grey h-[350px] lg:h-[30vw] xl:h-[23vw] p-8 border border-deep-grey transition-all duration-300 ease-in-out group-hover:border-transparent w-10/12 mx-auto my-4  group-hover:shadow-shadow-light">
                            <div class="absolute z-[1] -inset-1 bg-deep-green blur-sm opacity-0 transition-opacity duration-300 ease-in-out group-hover:opacity-100"></div>
                            <div class="relative h-full z-[2] lg:flex lg:flex-col lg:justify-between">
                                <h2 class="font-title uppercase text-xl font-black *:font-light text-deep-green transition-colors duration-300 ease-in-out group-hover:text-white leading-6 mb-4 text-center"><?php the_title(); ?></h2>
                                <div class="flex flex-col justify-center h-[80%] xl:w-full lg:h-auto lg:block my-auto *:max-h-[190px] max-w-[230px] lg:*:max-w-[200px] xl:max-w-[100%] *:w-auto *:mx-auto">
                                    <?php the_post_thumbnail('medium') ?>
                                </div>
                            </div>
                        </div>
                        <div class="px-8 my-8">
                            <ul class="">
                                <?php
                                if (have_rows('details_excerpt')) :
                                    while (have_rows('details_excerpt')) : the_row();
                                        $listDetail = get_sub_field('detail');
                                        ?>
                                        <li class="font-sans text-xs text-black leading-5 text-center lg:text-left my-2"><span class="relative w-[16px] h-[16px] inline-block align-middle mr-2 before:content-[''] before:absolute before:inset-0 before:h-[16px] before:w-[16px] before:bg-light-green clip-hexagon"></span><span><?= $listDetail ?></span></li>
                                    <?php
                                    endwhile;
                                endif;
                                ?>
                            </ul>
                            <a class="relative py-4 px-16 mt-8 block mx-auto lg:mr-auto lg:ml-0 w-fit font-title font-bold text-center bg-deep-green text-white text-xxs uppercase before:content-[''] before:absolute before:inset-0 before:bg-transparent before:border before:border-deep-green before:transition-transform before:duration-300 before:ease-in-out before:translate-x-1 before:translate-y-1 hover:before:translate-x-0 hover:before:translate-y-0" href="<?php the_permalink(); ?>">Configurer</a>
                        </div>
                    </div>
                <?php
                endwhile;
                wp_reset_postdata();
            else : ?>
                <p>Aucun produit trouvé dans cette catégorie.</p>
            <?php endif; ?>
        </div>

        <div class="relative z-[2] bg-white py-8">
            <?php
            $terms = get_terms(array(
                'taxonomy' => 'category-pro',
                'exclude' => array($current_term->term_id),
                'hide_empty' => true,
                'parent' => 0,
            ));

            if (!empty($terms) && !is_wp_error($terms)) : ?>
                <div class="px-20 xl:max-w-[90%] 2xl:max-w-[70%] xl:mx-auto">
                    <h2 class="w-fit relative mx-auto lg:ml-0 lg:my-8 block font-title text-deep-green text-center text-xl lg:text-l lg:text-left font-black uppercase leading-6 border-b-2 border-light-green">Vous pourriez être intéressé par</h2>
                    <div class="flex flex-col lg:flex-row lg:flex-wrap lg:justify-between">
                        <?php foreach ($terms as $term) : ?>
                        <div class="w-[280px] mx-auto my-8 lg:mx-4 lg:my-4">
                            <a class="block group eyed-cursor" href="<?php echo esc_url(get_term_link($term)); ?>">
                                <div class="w-auto relative lg:w-[280px] h-fit lg:h-[250px] lg:flex lg:flex-col lg:justify-center p-8 overflow-hidden border border-light-green">
                                    <div class="absolute inset-0 bg-light-green z-[1] opacity-0 transition-opacity duration-300 ease-in-out group-hover:opacity-100"></div>
                                    <?php
                                    $thumbnail = get_field('category-thumbnail', 'term_' . $term->term_id);
                                    if ($thumbnail) :
                                    ?>
                                    <img class="block relative z-[2] w-auto lg:max-w-full h-auto lg:max-h-full lg:mx-auto" src="<?= $thumbnail['url'] ?>" alt="<?= $thumbnail['url'] ?>">
                                    <?php endif; ?>
                                </div>
                                <h3 class="inline-block w-8/9 font-title font-black text-base text-deep-green leading-5 uppercase span-thin span-block mt-4 *:text-xs"><?= $term->name ?></h3>
                            </a>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <?php get_template_part('template-parts/components/graphic-creation'); ?>

    <?php get_template_part('template-parts/components/partners'); ?>
</div>

<?php
get_footer(); ?>
