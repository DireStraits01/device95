<?php
/*
Template Name: iPhones Page
*/

get_header(); ?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="page-title">Iphones</h1>
            
            <?php
            // Query for iPhone products
            $args = array(
                'post_type' => 'product',
                'posts_per_page' => -1, // Show all iPhones
                'meta_query' => array(
                    array(
                        'key' => '_stock_status',
                        'value' => 'instock'
                    )
                ),
                'tax_query' => array(
                    array(
                        'taxonomy' => 'product_cat',
                        'field'    => 'slug',
                        'terms'    => 'iphones', // Assuming you have an iPhone category
                    ),
                ),
            );
            
            // Alternative: Search by product title containing "iPhone"
            // $args = array(
            //     'post_type' => 'product',
            //     'posts_per_page' => -1,
            //     's' => 'iPhone',
            //     'meta_query' => array(
            //         array(
            //             'key' => '_stock_status',
            //             'value' => 'instock'
            //         )
            //     )
            // );
            
            $iphone_query = new WP_Query($args);
            
            if ($iphone_query->have_posts()) : ?>
                <div class="products-grid row">
                    <?php while ($iphone_query->have_posts()) : $iphone_query->the_post(); ?>
                        <div class="col-md-4 col-sm-6 mb-4">
                            <div class="product-item">
                                <?php
                                global $product;
                                ?>
                                <div class="product-image">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php echo woocommerce_get_product_thumbnail(); ?>
                                    </a>
                                </div>
                                
                                <div class="product-info">
                                    <h3 class="product-title">
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </h3>
                                    
                                    <div class="product-price">
                                        <?php echo $product->get_price_html(); ?>
                                    </div>
                                    
                                    <div class="product-actions">
                                        <?php woocommerce_template_loop_add_to_cart(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
                
            <?php else : ?>
                <p>No iPhones found.</p>
            <?php endif;
            
            wp_reset_postdata();
            ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>