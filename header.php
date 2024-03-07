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
        <?= do_shortcode('[quote_popup]'); ?>
        <?php
        if ( function_exists( 'the_widget' ) ) {
            $custom_args = array(
                'before_title' => '<h2 class="font-title text-black font-medium uppercase text-l py-4">',
                'after_title' => '</h2>',
            );
            the_widget( 'Cart_Sidebar_Widget', array('title' => 'Mon panier'), $custom_args );
        }
        ?>
        <div id="content">