<?php
// Enqueue styles and scripts
function mak2com_theme_enqueue_styles() {
    wp_enqueue_style('font-new-hero', 'https://use.typekit.net/ytk3nbd.css');
    wp_enqueue_style('font-commuters-sans', 'https://use.typekit.net/ytk3nbd.css');
    wp_enqueue_style('swipercss', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css');
    wp_enqueue_style('mak2com-style', get_stylesheet_uri());
    wp_enqueue_script('swiperjs', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js');
    wp_enqueue_script('mak2com-script', get_template_directory_uri() . '/assets/js/script.js', array('jquery'), '1.0', true);
    wp_enqueue_script('mak2com-swipers', get_stylesheet_directory_uri() . '/assets/js/swipers.js', array('jquery'), '1.0', true);
    wp_enqueue_script('mak2com-ajax', get_stylesheet_directory_uri() . '/assets/js/ajax.js', array(), '1.0', true);
}
add_action('wp_enqueue_scripts', 'mak2com_theme_enqueue_styles');

// Add theme support
function mak2com_theme_setup() {
    // Add post thumbnail support
    add_theme_support('post-thumbnails');

    // Add custom logo support
    add_theme_support('custom-logo');

    // Add custom menu support
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'mak2com'),
        'footer' => __('Footer Menu', 'mak2com'),
    ));
}
add_action('after_setup_theme', 'mak2com_theme_setup');

add_theme_support( 'title-tag' );

// Register widget areas
function mak2com_theme_widgets_init() {
    register_sidebar(array(
        'name' => __('Sidebar', 'mak2com'),
        'id' => 'sidebar-1',
        'description' => __('Add widgets here to appear in the sidebar.', 'mak2com'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
}
add_action('widgets_init', 'mak2com_theme_widgets_init');

include get_template_directory() . '/includes/class-cart-sidebar-widget.php';

// Hooks
add_filter( 'upload_mimes', 'mak2com_mime_types' );
add_filter( 'wp_check_filetype_and_ext', 'mak2com_file_types', 10, 4 );

// Autoriser l'import des fichiers SVG et WEBP
function mak2com_mime_types( $mimes ){
	$mimes['svg'] = 'image/svg+xml';
	$mimes['webp'] = 'image/webp';
	return $mimes;
}

// Contrôle de l'import d'un WEBP
function mak2com_file_types( $types, $file, $filename, $mimes ) {
	if ( false !== strpos( $filename, '.webp' ) ) {
		$types['ext'] = 'webp';
		$types['type'] = 'image/webp';
	}
	return $types;
}

add_action( 'init', 'remove_wc_breadcrumbs' );
function remove_wc_breadcrumbs() {
    remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
}

add_theme_support( 'woocommerce' );

function recursive_acf_search($value, $search_keywords, &$found, &$content): void {
    if (is_array($value)) {
        foreach ($value as $sub_value) {
            recursive_acf_search($sub_value, $search_keywords, $found, $content);
        }
    } elseif (is_string($value)) {
        // Convertir la valeur en minuscules pour la comparaison
        $lower_value = strtolower($value);
        // Vérifier si tous les mots-clés sont présents dans la valeur
        $all_keywords_found = true;
        foreach ($search_keywords as $keyword) {
            if (!str_contains($lower_value, strtolower($keyword)) && !str_contains($lower_value, ucfirst($keyword))) {
                $all_keywords_found = false;
                break; // Un mot-clé est manquant, pas besoin de vérifier les autres
            }
        }
        if ($all_keywords_found && !preg_match('/\.(jpg|jpeg|png|gif|bmp|svg|webp|mp4|mp3|wav|avi|mov|wmv|flv)$/i', $value)) {
            $content[] = $value;
            $found = true;
        }
    }
}

function search_and_display_acf_content($post_id, $search_query, &$resultsCount): void {
    $fields = get_fields($post_id);
    $found = false;
    $content = [];
    $postsIds = array($post_id);
    $maxWords = 20;
    $search_keywords = explode(' ', $search_query);

    if ($fields) {
        foreach ($fields as $field_name => $value) {
            $field_object = get_field_object($field_name, $post_id);
            if ($field_object['type'] == 'group') {
                foreach ($field_object['value'] as $sub_value) {
                    if (!is_array($sub_value)) {
                        recursive_acf_search($sub_value, $search_keywords, $found, $content);
                    }
                }
            }
        }
    } else {
        $found = true;
        foreach ($postsIds as $post) {
            $content[] = get_post($post);
        }
    }

    if ($found) {
        foreach ($content as $content_value) {
            $resultsCount++;
            echo '<div class="block w-full p-8 relative last:after:hidden after:content-[\'\'] after:absolute after:bottom-0 after:left-0 after:right-0 after:h-[1px] after:bg-classic-green">';
            echo '<h2 class="font-sans text-xl2 font-medium text-classic-green spanHandwritingCapitalizeInlineBlock spanFontSize40">' . get_the_title($post_id) . '</h2>';
            if (gettype($content_value) === "string") {
                $wordArray = explode(' ', $content_value);
            } else {
                $wordArray = explode(' ', $content_value->post_content);
            }
            if ( count($wordArray) > $maxWords) {
                $wordArray = array_slice($wordArray, 0, $maxWords);
                $truncatedContent = implode(' ', $wordArray) . '...';
            } else {
                $truncatedContent = $content_value;
            }

            echo '<div class="font-sans text-sm leading-5 text-classic-green font-regular my-4"><p>' . $truncatedContent . '</p></div>';
            echo '<a class="font-title uppercase text-sm text-light-gold bg-classic-green font-regular rounded-xl py-2 px-8 mt-4 block w-fit ml-auto border border-classic-green transition duration-300 hover:bg-transparent hover:text-classic-green" href="' . esc_url(get_permalink($post_id)) . '">Découvrir</a>';
            echo '</div>';
        }
    }
}

function custom_search_pagination(): void {
    global $wp_query;

    // Construire les liens de pagination
    $pages = paginate_links( array(
        'total'        => $wp_query->max_num_pages,
        'current'      => max(1, get_query_var('paged')),
        'format'       => '?paged=%#%',
        'show_all'     => false,
        'end_size'     => 2,
        'mid_size'     => 1,
        'prev_next'    => true,
        'prev_text'    => __('<span>Préc</span>'),
        'next_text'    => __('<span>Suiv</span>'),
        'type'         => 'array',
        'add_args'     => false,
    ));

    if (is_array($pages)) {
        $paged = (get_query_var('paged') == 0) ? 1 : get_query_var('paged');

        echo '<div class="search-pagination-wrap"><ul class="pagination">';
        foreach ($pages as $page) {
            echo "<li class='pagination-link'>$page</li>";
        }
        echo '</ul></div>';
    }
}

function custom_breadcrumb($param = '') {
    echo '<div class="breadcrumb flex flex-row justify-start items-center my-8 px-4 lg:px-[10%]">';
    echo '<a class="bg-white w-[25px] h-[25px] rounded-full shadow-simple-25 flex flex-row justify-center items-center cursor-pointer mr-4" href="javascript:history.back()"><img class="rotate-180 w-[10px]" src="'. get_stylesheet_directory_uri() .'/assets/images/icons/arrow-right.svg" alt="flêche de retour"></a> ';
    if (is_front_page() || is_home()) {
        return;
    } else {
        echo '<a href="' . home_url() . '" class="font-sans text-xs text-black mx-1 my-0 px-2 py-0 border-b-2 border-black">Accueil</a>';
    }
    if (is_category() || is_single()) {
        if ( 'artworks' == get_post_type() ) {
            echo '<a href="' . get_permalink( 20 ) . '" class="font-sans text-xs text-black mx-1 my-0 px-2 py-0 border-b-2 border-black">Artworks</a>';
        }
        if ( is_single() ) {
            if (is_product()) {
                $categories = get_the_terms(get_the_ID(), 'product_cat');
                echo '<a href="' . home_url() . '/categorie-produit/' . $categories[0]->slug . '" class="font-sans text-xs text-black mx-1 my-0 px-2 py-0 border-b-2 border-black">' . $categories[0]->name . '</a>';
            }
            if (!empty(get_field('main_title'))) {
                echo '<p class="font-sans text-xs text-black mx-1 my-0 px-2 py-0 border-b-2 border-black">' . get_field('main_title') . '</p>';
            } else {
                echo '<p class="font-sans text-xs text-black mx-1 my-0 px-2 py-0 border-b-2 border-black">' . get_the_title() . '</p>';
            }
        }
    } elseif (is_product_category()) {
        global $wp_query;
        $cat = $wp_query->get_queried_object();
        echo '<p class="font-sans text-xs text-black mx-1 my-0 px-2 py-0 border-b-2 border-black">' . $cat->name . '</p>';
    } elseif (is_page()) {
        global $post;
        if ($post->post_parent) {
            $ancestors = get_post_ancestors($post->ID);
            $ancestors = array_reverse($ancestors);
            foreach ($ancestors as $ancestor) {
                if (get_the_title($ancestor) === 'Boutique') {
                    echo '<a href="' . get_permalink($ancestor) . '" class="font-sans text-xs text-black mx-1 my-0 px-2 py-0 border-b-2 border-black">Nos Produits</a>';
                } else {
                    echo '<a href="' . get_permalink($ancestor) . '" class="font-sans text-xs text-text-black-green mx-1 my-0 px-2 py-0 border-b-2 border-black">' . get_the_title($ancestor) . '</a>';
                }
            }
        }
        echo '<p class="font-sans text-xs text-black mx-1 my-0 px-2 py-0 border-b-2 border-black">' . get_the_title() .'</p>';
    } elseif (is_search()) {
        echo '<p class="font-sans text-xs text-black mx-1 my-0 px-2 py-0 border-b-2 border-black"> Résultats de recherche pour "' . get_search_query() . '"</p>';
    } elseif (is_404()) {
        echo '<p class="font-sans text-xs text-black mx-1 my-0 px-2 py-0 border-b-2 border-black"> 404 Non trouvé</p>';
    }
    echo '</div>';
}

function filter_products() {
    $filters = json_decode(stripslashes($_POST['filters']), true);
    $paged = isset($_POST['page']) ? absint($_POST['page']) : 1;
    $args = [
        'post_type' => 'product',
        'posts_per_page' => 9,
        'post_status' => 'publish',
        'paged' => $paged,
        'tax_query' => [
            'relation' => 'OR',
        ]
    ];

    if (!empty($filters['gender']) && $filters['gender'] !== 'all') {
        $args['tax_query'][] = [
            'taxonomy' => 'pa_sexe',
            'field'    => 'slug',
            'terms'    => $filters['gender'],
            'operator' => 'IN',
        ];
    }
    if (!empty($filters['product_cat'])) {
        $categories = is_array($filters['product_cat']) ? $filters['product_cat'] : [$filters['product_cat']];
        $args['tax_query'][] = [
            'taxonomy' => 'product_cat',
            'field'    => 'slug',
            'terms'    => $categories,
            'operator' => 'IN',
        ];
    }
    if (!empty($filters['size'])) {
        $args['tax_query'][] = [
            'taxonomy' => 'pa_taille',
            'field'    => 'slug',
            'terms'    => $filters['size'],
            'operator' => 'IN',
        ];
    }
    if (!empty($filters['color'])) {
        $args['tax_query'][] = [
            'taxonomy' => 'pa_couleur',
            'field'    => 'slug',
            'terms'    => $filters['color'],
            'operator' => 'IN',
        ];
    }


    $query = new WP_Query($args);
    $html = '';

    if ($query->have_posts()) :
        while ($query->have_posts()): $query->the_post();
            ob_start();
            wc_get_template_part('content', 'product');
            $html .= ob_get_clean();
        endwhile;
    endif;
    wp_reset_postdata();

    $maxPages = $query->max_num_pages;
    echo json_encode(['html' => $html, 'maxPages' => $maxPages]);
    wp_die();
}

add_action('wp_ajax_filter_products', 'filter_products');
add_action('wp_ajax_nopriv_filter_products', 'filter_products');

function load_more_products(){
    $paged = $_POST['page'] + 1;

    $args = array(
        'post_type' => 'product',
        'paged' => $paged,
        'posts_per_page' => 6,
    );

    $query = new WP_Query($args);

    if($query->have_posts()) :
        while($query->have_posts()): $query->the_post();
            wc_get_template_part('content', 'product');
        endwhile;
    endif;
    die;
}

add_action('wp_ajax_load_more_products', 'load_more_products');
add_action('wp_ajax_nopriv_load_more_products', 'load_more_products');

function custom_ajax_add_to_cart_handler() {
    if (!wp_verify_nonce($_POST['add_to_cart_nonce'], 'add-to-cart-nonce')) {
        wp_send_json_error('Nonce verification failed', 400);
        return;
    }
    $product_id = isset($_POST['product_id']) ? intval($_POST['product_id']) : 0;
    $variation_id = isset($_POST['variation_id']) ? intval($_POST['variation_id']) : 0;
    if (!$product_id) {
        wp_send_json_error('Invalid product ID', 400);
        return;
    }
    $quantity = 1;

    $cart = WC()->cart;
    $cart_item_key = $cart->add_to_cart($product_id, $quantity, $variation_id);
    if ($cart_item_key) {
        wp_send_json_success(['message' => 'Product successfully added to cart']);
    } else {
        wp_send_json_error('Failed to add the product to the cart', 400);
    }
}
add_action('wp_ajax_woocommerce_ajax_add_to_cart', 'custom_ajax_add_to_cart_handler');
add_action('wp_ajax_nopriv_woocommerce_ajax_add_to_cart', 'custom_ajax_add_to_cart_handler');