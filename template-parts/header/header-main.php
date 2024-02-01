<div class="header-main flex flex-row justify-between items-center">
    <div class="w-[120px]">
        <a class="block w-full outline-none focus:outline-none" href="<?= home_url() ?>">
            <?= get_custom_logo() ?>
        </a>
    </div>
    <div id="headerSearchForm" class="">
        <?php get_search_form(); ?>
    </div>
    <div>
        <?php get_template_part('template-parts/header/woo-menu'); ?>
    </div>
</div>