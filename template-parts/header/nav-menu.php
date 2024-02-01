<?php
// Obtenir l'ID de la page actuelle
$current_page_id = get_the_ID();
// Obtenir l'ID de la page parente
$parent_id = wp_get_post_parent_id($current_page_id);
?>
<div class="py-1 px-4">
    <div id="mobileSearchForm"></div>
    <div class="overflow-hidden">
        <?php if ( has_nav_menu( 'primary' ) ) : ?>
            <nav id="site-navigation" aria-label="primary-menu">
                <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
            </nav>
        <?php endif; ?>
    </div>
    <div>
        <nav id="site-navigation" aria-label="primary-menu">
            <?php wp_nav_menu( array( 'menu' => 'Secondaire' ) ); ?>
            <div class="my-1 py-3">
                <button id="headerDevisBtn" class="header-devis block relative w-full text-left font-title font-bold text-sm text-light-green uppercase" href="<?= get_permalink(3083) ?>">
                    <span class="inline-block"><?php _e('Demander un devis','mak2com'); ?></span>
                    <img class="w-[16px] h-auto inline-block align-sub" src="<?= get_stylesheet_directory_uri() ?>/assets/svg/devis-icon.svg" alt="icone du panier">
                    <span class="nav-triangle-green-light"></span>
                </button>
            </div>
        </nav>
    </div>
    <div id="mobileAccountNav"></div>
</div>