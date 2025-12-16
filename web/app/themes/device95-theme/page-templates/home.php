<?php
/**
 * Template Name: Home page
 *
 * Template for displaying a blank page.
 *
 * @package Understrap
 */

// Exit if accessed directly.s
defined( 'ABSPATH' ) || exit;
get_header(); ?>

<!-- Hero with Background Image -->
<section class="hero-section-minimal" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/hero.jpg');">
    <div class="hero-container">
        <p class="hero-eyebrow">Новая коллекция</p>
        <h1 class="hero-title">Device95</h1>
        <p class="hero-subtitle">Премиум гаджеты.<br>По честным ценам.</p>
        <a href="<?php echo home_url('/shop?scroll=products'); ?>" class="hero-btn-minimal">Купить</a>
    </div>
</section>

<!-- Delivery -->
<section class="delivery-section">
    <div class="delivery-container">
        <h2 class="section-title">Доставка и самовывоз</h2>
        
        <div class="delivery-grid">
            <!-- Delivery Card -->
            <div class="delivery-card" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/delivery.jpg');">
                <div class="card-overlay"></div>
                <div class="card-content">
                    <h3 class="delivery-title">Доставка по Москве</h3>
                    <p class="delivery-text">
                        Быстрая доставка в день заказа или на следующий день
                    </p>
                </div>
            </div>
            
            <!-- Pickup Card -->
            <div class="delivery-card" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/order.jpg');">
                <div class="card-overlay"></div>
                <div class="card-content">
                    <h3 class="delivery-title">Самовывоз</h3>
                    <p class="delivery-text">
                        г. Москва, Сущёвский Вал 5с20, офис N-4<br>
                        Метро Савёловская<br>
                        +7 (985) 315-59-59
                    </p>
                </div>
            </div>
            
            <!-- Payment Card -->
            <div class="delivery-card" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/pay.jpg');">
                <div class="card-overlay"></div>
                <div class="card-content">
                    <h3 class="delivery-title">Оплата наличными</h3>
                    <p class="delivery-text">
                        Оплата при получении<br>
                        Наличными курьеру или в офисе
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Carousel Section -->
<section class="carousel-section">
    <div class="carousel-container">
        <?php echo do_shortcode('[metaslider id="196"]'); ?>
    </div>
</section>

<!-- Popular Products -->
<section class="products-section" id="popular-products">
      <?php woocommerce_product_loop_start(); ?>
    <h2 class="section-title">Популярные товары</h2>
    
    <div class="products-grid">
        <?php
        $args = array(
            'post_type' => 'product',
            'posts_per_page' => 8,
            'orderby' => 'date',
            'order' => 'DESC',
        );
        
        $products = new WP_Query($args);
        
        while ($products->have_posts()): $products->the_post();
            global $product;
        ?>
            <a href="<?php the_permalink(); ?>" class="product-card">
                <?php if (has_post_thumbnail()): ?>
                    <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'medium'); ?>" 
                         alt="<?php the_title(); ?>" 
                         class="product-image">
                <?php else: ?>
                    <div class="product-image" style="background: #f5f5f7; display: flex; align-items: center; justify-content: center; font-size: 48px;">
                        📦
                    </div>
                <?php endif; ?>
                
                <h3 class="product-name"><?php the_title(); ?></h3>
                <div class="product-price"><?php echo $product->get_price_html(); ?></div>
            </a>
        <?php 
        endwhile;
        wp_reset_postdata();
        ?>
    </div>
</section>

<!-- New Products -->
<section class="products-section">
    <h2 class="section-title">Новые поступления</h2>
    
    <div class="products-grid">
        <?php
        $args = array(
            'post_type' => 'product',
            'posts_per_page' => 8,
            'orderby' => 'date',
            'order' => 'DESC',
        );
        
        $new_products = new WP_Query($args);
        
        while ($new_products->have_posts()): $new_products->the_post();
            global $product;
        ?>
            <a href="<?php the_permalink(); ?>" class="product-card">
                <?php if (has_post_thumbnail()): ?>
                    <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'medium'); ?>" 
                         alt="<?php the_title(); ?>" 
                         class="product-image">
                <?php else: ?>
                    <div class="product-image" style="background: #f5f5f7; display: flex; align-items: center; justify-content: center; font-size: 48px;">
                        📦
                    </div>
                <?php endif; ?>
                
                <h3 class="product-name"><?php the_title(); ?></h3>
                <div class="product-price"><?php echo $product->get_price_html(); ?></div>
            </a>
        <?php 
        endwhile;
        wp_reset_postdata();
        ?>
    </div>
</section>

<?php get_footer(); ?>

<?php get_footer(); ?>