<?php

function register_cart_sidebar_widget() {
    register_widget( 'Cart_Sidebar_Widget' );
}

add_action( 'widgets_init', 'register_cart_sidebar_widget' );

class Cart_Sidebar_Widget extends WP_Widget {

    public function __construct() {
        $widget_options = array(
            'classname' => 'cart_sidebar_widget fixed top-0 right-0 bottom-0 left-0 w-full z-[70] white-opacity-20 backdrop-blur-sm flex flex-col justify-between py-12 px-8 translate-y-[-110%] opacity-0 shadow-none delay-150 transition-all duration-300 ease-in-out',
            'description' => 'Un widget qui affiche le contenu du panier',
        );
        parent::__construct( 'cart_sidebar_widget', 'Contenu du Panier', $widget_options );
    }

    public function widget( $args, $instance ) {
        extract( $args );
        $title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

        echo $before_widget;
        echo '<div class="flex flex-row justify-between items-center">';
        if ( !empty( $title ) ) {
            echo $before_title . $title . $after_title;
        }
        echo '<div class="sidecart-close-button relative z-[20] cursor-pointer w-[60px] text-center">';
        echo '<button class="block h-[20px] w-[20px] mx-auto">';
        echo '<span></span>';
        echo '<span></span>';
        echo '</button>';
        echo '</div>';
        echo '</div>';
        if ( function_exists( 'WC' ) ) {
            if ( ! WC()->cart->is_empty() ) {
                echo '<div class="cart-contents max-h-[300px] lg:max-h-[400px] pr-1.5">';
                foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
                    $_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
                    $product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );
                    $product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
                    $thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
                    $product_name = apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key );
                    $product_display_title = get_field('main_title', $product_id);
                    $product_variations = '';
                    if (!empty($cart_item['variation'])) {
                        foreach ($cart_item['variation'] as $attribute => $value) {
                            $product_variations .= $attribute . ': ' . $value . ', ';
                        }
                        $product_variations = rtrim($product_variations, ', ');
                    }
                    $quantity = 'Quantité: ' . $cart_item['quantity'];

                    echo '<div class="cart-item flex flex-row my-4">';
                    echo '<div class="w-[70px] flex flex-col justify-center mr-2 *:rounded-xl">';
                    echo $thumbnail;
                    echo '</div>';
                    echo '<div>';
                    $dataTitle = esc_attr__( 'Product', 'woocommerce' );
                    echo '<div class="product-name" data-title="'. $dataTitle .'">';
                    if ( ! $product_permalink ) {
                        echo wp_kses_post( $product_display_title . '&nbsp;' );
                    } else {
                        echo '<a class="font-title uppercase text-l lg:text-xl text-black font-medium leading-7" href="'.esc_url( $product_permalink ).'">'. $product_display_title .'</a>';
                    }
                    do_action( 'woocommerce_after_cart_item_name', $cart_item, $cart_item_key );
                    if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
                        echo wp_kses_post( apply_filters( 'woocommerce_cart_item_backorder_notification', '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'woocommerce' ) . '</p>', $product_id ) );
                    }
                    echo '</div>';
                    echo '<div class="cart-item-variations">';
                    foreach ( $cart_item['variation'] as $attribute_name => $attribute_value ) {
                        echo '<div class="flex flex-row flex-wrap justify-start" id="'. $attribute_name .'">';
                        if ( 'attribute_pa_dimensions' === $attribute_name ) {
                            $attribute_slug = $cart_item['variation']['attribute_pa_dimensions'];
                            $term = get_term_by('slug', $attribute_slug, 'pa_dimensions');
                            if ($term) {
                                $term_id = $term->term_id;
                                $hauteur = get_field('dimension_h', 'pa_coloris_' . $term_id);
                                $largeur = get_field('dimension_l', 'pa_coloris_' . $term_id);
                                $profondeur = get_field('dimension_p', 'pa_coloris_' . $term_id);
                                echo '<p class="font-sans text-black text-xxs lg:text-xs mr-2"><span>Dimensions: </span><span>' . $hauteur . '" x ' . $largeur . '" x ' . $profondeur . '"</span></p>';
                                $attribute_name_clean = str_replace( 'attribute_', '', $attribute_name );
                                $pre_order = get_field('pre_order', 'term_' . $term->term_id);
                                ?>
                                <p class="font-sans text-black text-xxs lg:text-xs"><span>Taille </span><span class="font-bold uppercase"><?= $attribute_value ?></span><?php if ($pre_order === true) { ?><span class="ml-1">en pré-commande</span><?php } ?></p>
                                <?php
                            }
                        }
                        if ( 'attribute_pa_coloris' === $attribute_name ) {
                            $attribute_name_clean = str_replace( 'attribute_', '', $attribute_name );
                            echo '<p class="font-sans text-black text-xxs lg:text-xs"><span>Couleur: </span><span>' . $attribute_value . '</span></p>';
                        }
                        echo '</div>';
                    }
                    echo '</div>';
                    echo '<p class="product-quantity font-sans text-black text-xxs lg:text-xs">' . $quantity . '</p>';
                    echo '</div>';
                    echo '<div class="product-remove ml-auto my-auto">';
                    echo apply_filters(
                        'woocommerce_cart_item_remove_link',
                        sprintf(
                            '<a href="%s" class="remove !flex flex-row justify-center align-middle !bg-light-red !rounded-md lg:!h-8 lg:!w-8" aria-label="%s" data-product_id="%s" data-product_sku="%s"><img class="w-[13px] lg:w-[15px] inline-block" src="'. get_stylesheet_directory_uri() .'/assets/images/icons/trash-icon.svg" alt="icone de corbeille"></a>',
                            esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
                            /* translators: %s is the product name */
                            esc_attr( sprintf( __( 'Remove %s from cart', 'woocommerce' ), wp_strip_all_tags( $product_name ) ) ),
                            esc_attr( $product_id ),
                            esc_attr( $_product->get_sku() )
                        ),
                        $cart_item_key
                    );
                    echo '</div>';
                    echo '</div>';
                }
                echo '</div>';
                $cartProductsCount = WC()->cart->get_cart_contents_count();
                echo '<div class="cart-subtotal flex flex-row justify-between">';
                echo '<p class="font-sans text-middle-grey text-sm">';
                if (!empty($cartProductsCount)) {
                    echo $cartProductsCount;
                }
                echo ' ';
                if ($cartProductsCount > 1) {
                    echo 'Articles';
                } else {
                    echo 'Article';
                }
                echo '</p>';
                echo '<p class="font-title text-black text-sm" data-title="' . esc_attr__( 'Subtotal', 'woocommerce' ) . '">';
                wc_cart_totals_subtotal_html();
                echo '</p></div>';
                echo '<div class="flex flex-row justify-center items-center">';
                echo '<a href="' . esc_url( wc_get_cart_url() ) . '" class="wc-forward !block !mx-auto lg:h-[40px] !float-none !rounded-full !bg-white !text-black !font-sans !font-light !text-xs !py-2 lg:py-1.5 !px-8 !border-black !border transition-colors duration-300 ease-in-out hover:!text-white hover:!bg-black">Voir le panier</a>';
                echo '<a href="' . esc_url( wc_get_checkout_url() ) . '" class="checkout wc-forward !block !mx-auto lg:h-[40px] !float-none !rounded-full !bg-white !text-black !font-sans !font-light !text-xs !py-2 lg:py-1.5 !px-8 !border-black !border transition-colors duration-300 ease-in-out hover:!text-white hover:!bg-black">Commander</a>';
                echo '</div>';
            } else {
                echo '<div class="cart-contents">';
                echo '<p>Votre panier est vide.</p>';
                echo '</div>';
            }
        }

        echo $args['after_widget'];
    }

    public function form( $instance ) {
        $title = ! empty( $instance['title'] ) ? $instance['title'] : 'Nouveau titre'; ?>
        <p>
        <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">Titre :</label>
        <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p><?php
    }

    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = !empty( $new_instance['title'] ) ? strip_tags( $new_instance['title'] ) : '';
        return $instance;
    }
}
