<?php
/*
 * Menu part for WooCommerce things
 */
?>
<div class="flex flex-row justify-center">
    <div id="headerAccountNav">
        <a id="headerAccountLink" class="header-account" href="<?= get_permalink(3083) ?>">
            <img class="w-[18px] h-auto cart-black block" src="<?= get_stylesheet_directory_uri() ?>/assets/svg/account-icon.svg" alt="icone du panier">
            <p>
                <?php if (!is_user_logged_in()) { ?>
                    <span><?php _e('Connexion','mak2com'); ?></span>
                <?php } else { ?>
                    <span><?php _e('Mon compte','mak2com'); ?></span>
                <?php } ?>
            </p>
        </a>
    </div>
    <button id="headerDevisBtn" class="header-devis block" href="<?= get_permalink(3083) ?>">
        <img class="h-[20px] cart-black block" src="<?= get_stylesheet_directory_uri() ?>/assets/svg/devis-icon.svg" alt="icone du panier">
        <span class="hidden"><?php _e('Devis','mak2com'); ?></span>
    </button>
    <a id="headerCartLink" class="header-cart" href="<?= wc_get_cart_url() ?>">
        <img class="h-[20px] cart-black block" src="<?= get_stylesheet_directory_uri() ?>/assets/svg/cart-icon.svg" alt="icone du panier">
        <p class="hidden">
            <span><?php _e('Panier','mak2com'); ?></span>
            <span>
            <?php
            $count = WC()->cart->get_cart_contents_count();
            ?>
        </span>
        </p>
    </a>
</div>