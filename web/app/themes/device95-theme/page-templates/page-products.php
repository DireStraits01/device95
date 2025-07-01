<?php 
/* Template Name: Products Universal */

// Include the filter file
require_once(get_template_directory() . '/inc/product-filter.php');
require_once(get_template_directory() . '/inc/page-config.php');

get_header(); 

// Get category and page info
$category = '';
$page_title = '';
$page_description = '';

if (isset($_GET['category'])) {
    $category = sanitize_text_field($_GET['category']);
}

if (empty($category)) {
    $page_slug = get_post_field('post_name', get_post());
    
    $category_map = get_page_config();
    
    if (isset($category_map[$page_slug])) {
        $category = $category_map[$page_slug]['category'];
        $page_title = $category_map[$page_slug]['title'];
        $page_description = $category_map[$page_slug]['description'];
    }
}

if (empty($page_title)) {
    $page_title = get_the_title();
    $page_description = 'Выберите лучшие товары';
}
?>

<div class="container" style="max-width: 1200px; margin: 0 auto; padding: 40px 20px;">
    
    <!-- Page Title -->
    <div style="text-align: center; margin-bottom: 60px;">
        <h1 style="font-size: 48px; font-weight: 600; color: #1d1d1f; margin-bottom: 16px;">
            <?php echo esc_html($page_title); ?>
        </h1>
        <p style="color: #86868b; font-size: 16px;">
            <?php echo esc_html($page_description); ?>
        </p>
    </div>
    
    <!-- Mobile Filter Button (only on phones) -->
    <div class="mobile-filter-button d-lg-none">
        <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#mobileFilter" aria-expanded="false">
            Фильтры
        </button>
    </div>
    
    <div class="row">
        
        <!-- Filter Sidebar -->
        <div class="col-md-3">
            <!-- Show always on desktop, hide on mobile until button click -->
            <div class="collapse d-lg-block" id="mobileFilter">
                <!-- Close button for mobile only -->
                <div class="mobile-close-btn d-lg-none">
                    <button class="btn btn-light" type="button" data-bs-toggle="collapse" data-bs-target="#mobileFilter">
                        ✕ Закрыть
                    </button>
                </div>
                
                <?php 
                if (!empty($category) && function_exists('make_complete_filter')) {
                    make_complete_filter($category);
                } else {
                    echo "<p>Фильтр недоступен</p>";
                }
                ?>
            </div>
        </div>
        
        <!-- Products Grid -->
        <div class="col-md-9">
            <?php if (!empty($category)) : ?>
                <?php 
                if (function_exists('build_filtered_shortcode')) {
                    $products_shortcode = build_filtered_shortcode($category);
                    echo do_shortcode($products_shortcode);
                } else {
                    echo do_shortcode('[products category="' . $category . '" limit="12" columns="3"]');
                }
                ?>
            <?php else : ?>
                <p style="text-align: center; color: #86868b;">
                    Товары не найдены.
                </p>
            <?php endif; ?>
        </div>
    </div>
</div>


<?php get_footer(); ?>