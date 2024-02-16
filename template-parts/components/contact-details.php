<div class="contact-details-section py-8 px-4 lg:px-20">
    <div class="lg:w-4/5 lg:mx-auto flex flex-col lg:flex-row justify-between">
        <div class="w-full lg:w-2/5 lg:flex lg:flex-col lg:justify-center">
            <h2 class="font-title text-deep-green text-xl3 leading-8 uppercase"><span class="block font-black">Une question ?</span><span class="block font-thin">Un conseil ?</span></h2>
            <p class="font-sans text-light-green text-base leading-5 mt-4">Contactez-nous</p>
        </div>
        <div class="w-full lg:w-2/5 my-8">
            <?php
            if (have_rows('company_informations_group', 'options')) :
                while (have_rows('company_informations_group', 'options')) : the_row();
                    $mail = get_sub_field('contact_mail', 'option');
                    $phone = get_sub_field('phone_number', 'option')
                    ?>
                    <ul class="flex flex-col">
                        <li class="my-4 text-center lg:text-left">
                            <img class="inline-block align-middle mr-2" src="<?= get_stylesheet_directory_uri() ?>/assets/img/icons/mail.png" alt="icone de mail">
                            <a class="font-sans font-bold text-light-green inline-block align-middle border-b-2 border-deep-green" href="mailto:<?php if ($mail) { echo $mail; } ?>?subject=Question%20sur%20<?= get_bloginfo('name') ?>"><?php if ($mail) { echo $mail; } ?></a>
                        </li>
                        <li class="my-4 text-center lg:text-left">
                            <img class="inline-block align-middle mr-2" src="<?= get_stylesheet_directory_uri() ?>/assets/img/icons/phone.png" alt="icone de mail">
                            <a class="font-sans font-bold text-light-green inline-block align-middle border-b-2 border-deep-green" href="tel:<?php if ($phone) { echo $phone; } ?>"><?php if ($phone) { echo $phone; } ?></a>
                        </li>
                    </ul>
                <?php
                endwhile;
            endif;
            ?>
        </div>
    </div>
</div>