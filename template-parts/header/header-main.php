<div class="header-main bg-white flex flex-row justify-between items-center py-1 px-4 relative z-[5] before:content-[''] before:absolute before:bottom-0 before:left-8 before:right-8 before:h-px before:bg-black before:opacity-20">
    <div class="header-logo w-[200px] *:block *:w-full *:outline-none *:focus:outline-none">
        <?= get_custom_logo() ?>
    </div>
    <div id="headerSearchForm" class="w-3/5">
        <?php get_search_form(); ?>
    </div>
    <div class="flex flex-row justify-between items-baseline">
        <?php get_template_part('template-parts/header/woo-menu'); ?>
        <div class="mobile-toggle-menu flex flex-col justify-start mx-2 lg:hidden">
            <button id="toggleMenuBtn" class="toggle-menu-btn relative w-[27px] h-[27px]">
                <img class="burger-icon transition-opacity duration-300 ease-in-out absolute top-[6px] left-[2px] w-[23px] opacity-1" src="<?= get_stylesheet_directory_uri() ?>/assets/img/icons/menu-burger.png" alt="menu icon">
                <img class="close-icon transition-opacity duration-300 ease-in-out absolute left-[7px] top-0 h-auto w-[13px] opacity-0" src="<?= get_stylesheet_directory_uri() ?>/assets/img/icons/menu-cross.png" alt="close menu icon">
                <span class="close-text transition-opacity duration-300 ease-in-out absolute bottom-0 left-0 right-0 uppercase font-sans text-[7px] text-deep-green text-center opacity-0">Fermer</span>
            </button>
        </div>
    </div>
</div>