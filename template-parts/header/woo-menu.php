<?php
/*
 * Menu part for WooCommerce things
 */
?>
<div class="flex flex-row justify-evenly my-auto w-[100px] lg:w-auto">
    <div id="headerAccountNav" class="lg:mx-2">
        <a id="headerAccountLink" class="header-account mt-auto block" href="<?= get_permalink(3083) ?>">
            <img class="w-[18px] h-auto cart-black inline-block" src="<?= get_stylesheet_directory_uri() ?>/assets/svg/account-icon.svg" alt="icone du panier">
            <p class="inline-block font-title text-xs lg:text-xxs text-black font-regular ml-4 lg:ml-0">
                <?php if (!is_user_logged_in()) { ?>
                    <span><?php _e('Connexion','mak2com'); ?></span>
                <?php } else { ?>
                    <span><?php _e('Mon compte','mak2com'); ?></span>
                <?php } ?>
            </p>
        </a>
    </div>
    <button id="headerDevisBtn" onclick="togglePopupDevis()" class="header-devis transition-opacity duration-300 ease-in-out block lg:mx-2" href="<?= get_permalink(3083) ?>">
        <img class="w-[16px] lg:h-[20px] cart-black block lg:inline-block" src="<?= get_stylesheet_directory_uri() ?>/assets/svg/devis-icon.svg" alt="icone du panier">
        <span class="hidden lg:inline-block lg:font-title lg:text-xxs lg:text-black lg:font-regular""><?php _e('Devis','mak2com'); ?></span>
    </button>
    <button id="headerCartLink" class="header-cart lg:mx-2" onclick="toggleSideCart(this)" aria-label="Panier" aria-selected="false">
        <img class="w-[16px] lg:h-[20px] cart-black block lg:inline-block" src="<?= get_stylesheet_directory_uri() ?>/assets/svg/cart-icon.svg" alt="icone du panier">
        <span class="hidden lg:inline-block lg:font-title lg:text-xxs lg:text-black lg:font-regular">
            <span><?php _e('Panier','mak2com'); ?></span>
            <span>
            <?php
            $count = WC()->cart->get_cart_contents_count();
            ?>
        </span>
        </span>
    </button>
</div>