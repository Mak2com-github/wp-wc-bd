<?php
/*
 * Template Name: Devis Pro
 */
get_header();
?>
<div class="devis-pro-page">

    <div class="hidden">
        <h1 class="w-fit relative mx-auto my-8 block font-title text-deep-green text-center lg:text-left text-xl2 font-black uppercase pb-1 pr-2 leading-6 border-b-2 border-light-green span-light after:content-[''] after:absolute after:h-0 after:border-l-4 after:border-l-transparent after:border-r-4 after:border-r-transparent after:border-b-8 after:border-b-light-green after:right-0 after:top-0">Demande de devis</h1>
    </div>

    <div>
        <?= do_shortcode('[quote_form]'); ?>
    </div>

</div>
<?php
get_footer();