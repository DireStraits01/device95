<?php
/**
 * The template for displaying product archives
 */

get_header();
?>

<main id="primary" class="site-main">
    
    <?php if (apply_filters('woocommerce_show_page_title', true)) : ?>
        <h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1>
    <?php endif; ?>

    <?php
    if (woocommerce_product_loop()) {
        woocommerce_product_loop_start();
        
        while (have_posts()) {
            the_post();
            wc_get_template_part('content', 'product');
        }
        
        woocommerce_product_loop_end();
        woocommerce_pagination();
    } else {
        do_action('woocommerce_no_products_found');
    }
    ?>

</main>

<?php get_footer(); ?>