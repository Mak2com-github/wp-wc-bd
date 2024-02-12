<div class="footer-nav flex flex-col-reverse mt-12 lg:mt-0 lg:pt-8 mb-4 lg:flex-row lg:justify-between lg:w-11/12 lg:mx-auto relative lg:before:content-[''] lg:before:absolute lg:before:top-0 lg:before:left-0 lg:before:right-0 lg:before:h-px lg:before:bg-light-green lg:before:opacity-40">
    <div class="socials-links my-4 lg:w-1/4">
        <p class="hidden lg:block">Lorem ipsum dolor sit amet, consectur adipiscing elit. <a href="#">Suivez-nous</a></p>
        <ul class="flex flex-row justify-center lg:justify-start lg:mt-4">
            <li class="mx-2">
                <a class="block transition-shadow duration-300 ease-in-out hover:drop-shadow" href="https://www.instagram.com/bideantrail/">
                    <img src="<?= get_stylesheet_directory_uri() ?>/assets/img/icons/facebook-icon.png" alt="icone facebook">
                </a>
            </li>
            <li class="mx-2">
                <a class="block transition-shadow duration-300 ease-in-out hover:drop-shadow" href="https://www.facebook.com/BIDEANTrail/">
                    <img src="<?= get_stylesheet_directory_uri() ?>/assets/img/icons/instagram-icon.png" alt="icone instagram">
                </a>
            </li>
        </ul>
    </div>
    <div class="footer-nav-section flex flex-col px-4 lg:flex-row lg:justify-between lg:w-4/6">
        <div class="accordeon flex flex-col justify-start">
            <p class="relative accordeon-head transition-colors duration-300 ease-in-out font-sans text-base lg:text-xs text-deep-green hover:text-light-green lg:hover:text-deep-green leading-7 lg:leading-5 py-2 font-bold capitalize px-2 mb-2 border-b lg:border-0 border-light-green cursor-pointer lg:cursor-auto">Pour Organisateurs <span class="absolute accordeon-arrow transition-all duration-300 ease-in-out h-0 border-l-8 border-l-transparent border-r-8 border-r-transparent border-b-[14px] border-b-deep-green right-2 top-1/3 rotate-180 lg:hidden"></span></p>
            <div class="accordeon-body *:font-sans *:text-xxs *:text-deep-grey *:font-regular *:leading-5 px-2 footer-nav-container transition-opacity duration-300 ease-in-out h-0 lg:h-auto opacity-0 lg:opacity-100 overflow-hidden">
                <?php wp_nav_menu( array( 'menu' => 'Footer - Organisateurs' ) ); ?>
            </div>
        </div>
        <div class="accordeon flex flex-col justify-start">
            <p class="relative accordeon-head transition-colors duration-300 ease-in-out font-sans text-base lg:text-xs text-deep-green hover:text-light-green lg:hover:text-deep-green leading-7 lg:leading-5 py-2 font-bold capitalize px-2 mb-2 border-b lg:border-0 border-light-green cursor-pointer lg:cursor-auto">Pour Runners <span class="absolute accordeon-arrow transition-all duration-300 ease-in-out h-0 border-l-8 border-l-transparent border-r-8 border-r-transparent border-b-[14px] border-b-deep-green right-2 top-1/3 rotate-180 lg:hidden"></span></p>
            <div class="accordeon-body *:font-sans *:text-xxs *:text-deep-grey *:font-regular *:leading-5 px-2 footer-nav-container transition-opacity duration-300 ease-in-out h-0 lg:h-auto opacity-0 lg:opacity-100 overflow-hidden">
                <?php wp_nav_menu( array( 'menu' => 'Footer - Runners' ) ); ?>
            </div>
        </div>
        <div class="accordeon flex flex-col justify-start">
            <p class="relative accordeon-head transition-colors duration-300 ease-in-out font-sans text-base lg:text-xs text-deep-green hover:text-light-green lg:hover:text-deep-green leading-7 lg:leading-5 py-2 font-bold capitalize px-2 mb-2 border-b lg:border-0 border-light-green cursor-pointer lg:cursor-auto">BideanTrail <span class="absolute accordeon-arrow transition-all duration-300 ease-in-out h-0 border-l-8 border-l-transparent border-r-8 border-r-transparent border-b-[14px] border-b-deep-green right-2 top-1/3 rotate-180 lg:hidden"></span></p>
            <div class="accordeon-body *:font-sans *:text-xxs *:text-deep-grey *:font-regular *:leading-5 px-2 footer-nav-container transition-opacity duration-300 ease-in-out h-0 lg:h-auto opacity-0 lg:opacity-100 overflow-hidden">
                <?php wp_nav_menu( array( 'menu' => 'Footer - Bideantrail' ) ); ?>
            </div>
        </div>
        <div class="accordeon flex flex-col justify-start">
            <p class="relative accordeon-head transition-colors duration-300 ease-in-out font-sans text-base lg:text-xs text-deep-green hover:text-light-green lg:hover:text-deep-green leading-7 lg:leading-5 py-2 font-bold capitalize px-2 mb-2 border-b lg:border-0 border-light-green cursor-pointer lg:cursor-auto">Compte Client <span class="absolute accordeon-arrow transition-all duration-300 ease-in-out h-0 border-l-8 border-l-transparent border-r-8 border-r-transparent border-b-[14px] border-b-deep-green right-2 top-1/3 rotate-180 lg:hidden"></span></p>
            <div class="accordeon-body *:font-sans *:text-xxs *:text-deep-grey *:font-regular *:leading-5 px-2 footer-nav-container transition-opacity duration-300 ease-in-out h-0 lg:h-auto opacity-0 lg:opacity-100 overflow-hidden">
                <ul>
                    <li class="menu-item">
                        <a href="<?= get_permalink(3083) ?>">Connexion</a>
                    </li>
                    <li class="menu-item">
                        <a href="<?= get_permalink(3083) ?>">Création</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>