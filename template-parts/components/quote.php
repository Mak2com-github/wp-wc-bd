<div id="quotePopup" class="fixed z-[70] backdrop-blur-sm bg-black-opacity-20 top-0 right-0 bottom-0 left-0 transition-transform duration-300 ease-in-out translate-x-full px-4 pt-20 pb-8">
    <div class="relative px-4 py-8 bg-white">
        <h2 class="w-fit relative mx-auto lg:ml-0 mb-8 block font-title text-deep-green text-center lg:text-left text-xl2 font-black uppercase pb-1 pr-2 leading-6 border-b-2 border-light-green span-light after:content-[''] after:absolute after:h-0 after:border-l-4 after:border-l-transparent after:border-r-4 after:border-r-transparent after:border-b-8 after:border-b-light-green after:right-0 after:top-0">Devis</h2>
        <button id="closePopup" class="absolute top-0 right-0" onclick="togglePopupDevis()">
            <img class="duration-300 ease-in-out h-auto w-[13px]" src="<?= get_stylesheet_directory_uri() ?>/assets/img/icons/menu-cross.png" alt="close menu icon">
        </button>
        <div id="devisItems" class="flex flex-col"></div>
    </div>
</div>