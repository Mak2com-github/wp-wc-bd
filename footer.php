<?php
/*
 * The main footer
 */
?>
            </div>
        <footer id="footer" class="footer relative flex flex-col pt-8 lg:clear-both">
            <div class="absolute inset-0 bg-cover bg-no-repeat bg-center z-[-1] opacity-30" style="background-image: url('<?= get_stylesheet_directory_uri() ?>/assets/img/patterns/footer-background-mountains.webp');"></div>
            <?php get_template_part('template-parts/footer/footer-pre'); ?>
	        <?php get_template_part('template-parts/footer/footer-nav'); ?>
	        <?php get_template_part('template-parts/footer/footer-sub'); ?>
        </footer>
        <?php wp_footer(); ?>
    </body>
</html>