<?php
// Obtenir l'ID de la page actuelle
$current_page_id = get_the_ID();
// Obtenir l'ID de la page parente
$parent_id = wp_get_post_parent_id($current_page_id);
?>
<div>
    <div id="mobileSearchForm"></div>
    <div>
        <?php if ( has_nav_menu( 'primary' ) ) : ?>
            <nav id="site-navigation" aria-label="primary-menu">
                <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
            </nav>
        <?php endif; ?>
    </div>
    <div>
        <nav id="site-navigation" aria-label="primary-menu">
            <?php wp_nav_menu( array( 'menu' => 'Secondaire' ) ); ?>
            <div>
                <button id="headerDevisBtn" class="header-devis" href="<?= get_permalink(3083) ?>">
                    <img class="w-[18px] h-auto cart-black block" src="<?= get_stylesheet_directory_uri() ?>/assets/svg/devis-icon.svg" alt="icone du panier">
                    <span><?php _e('Demander un devis','mak2com'); ?></span>
                </button>
            </div>
        </nav>
    </div>
    <div id="mobileAccountNav"></div>
</div>