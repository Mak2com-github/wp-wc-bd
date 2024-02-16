<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
        <header id="header" class="relative top-0 left-0 right-0 z-[999] lg:bg-white transition-all duration-300 ease-in-out">
            <?php get_template_part('template-parts/header/header-banner'); ?>
            <?php get_template_part('template-parts/header/header-main'); ?>
            <?php get_template_part('template-parts/header/header-sub'); ?>
        </header>
        <?php get_template_part('template-parts/components/quote'); ?>
        <div id="content">