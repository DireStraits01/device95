<?php
/**
 * The template for displaying single products
 */

get_header();
?>

<main id="primary" class="site-main">
    <?php
    while (have_posts()) {
        the_post();
        wc_get_template_part('content', 'single-product');
    }
    ?>
</main>

<?php
get_footer();