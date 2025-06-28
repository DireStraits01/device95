<?php 
/* Template Name: Products Universal */
get_header(); 

// Get category from URL parameter or page slug
$category = '';
$brand = '';
$page_title = '';
$page_description = '';
$filter_id = 1; // Default filter ID

// Check URL parameters first
if (isset($_GET['category'])) {
    $category = sanitize_text_field($_GET['category']);
}

// If no URL parameter, try to detect from page slug
if (empty($category)) {
    $page_slug = get_post_field('post_name', get_post());
    
    // Map page slugs to categories
    $category_map = array(
        'smartphones' => array(
            'category' => 'smartphones',
            'title' => 'Смартфоны',
            'description' => 'Выберите свой идеальный смартфон',
            'filter_id' => 1
        ),
        'iphones' => array(
            'category' => 'smartphones',
            'brand' => 'Apple',
            'title' => 'Телефоны Apple',
            'description' => 'Выберите свой идеальный iPhone',
            'filter_id' => 4
        ),
        'samsung-smartphones' => array(
            'category' => 'smartphones',
            'brand' => 'Samsung',
            'title' => 'Телефоны Samsung', 
            'description' => 'Выберите свой идеальный Samsung',
            'filter_id' => 1
        ),
        'headphones' => array(
            'category' => 'headphones',
            'title' => 'Наушники',
            'description' => 'Лучшие наушники для вас',
            'filter_id' => 3
        ),
        'laptops' => array(
            'category' => 'laptops',
            'title' => 'Ноутбуки',
            'description' => 'Мощные ноутбуки для работы',
            'filter_id' => 4
        )
    );
    
    if (isset($category_map[$page_slug])) {
        $category = $category_map[$page_slug]['category'];
        $bran = $category_map[$page_slug]['brand'];
        $page_title = $category_map[$page_slug]['title'];
        $page_description = $category_map[$page_slug]['description'];
        $filter_id = $category_map[$page_slug]['filter_id'];
    }
}

// Fallback to page title if not set
if (empty($page_title)) {
    $page_title = get_the_title();
    $page_description = 'Выберите лучшие товары';
}
?>

<div class="container" style="max-width: 1200px; margin: 0 auto; padding: 40px 20px;">
    <div style="text-align: center; margin-bottom: 60px;">
        <h1 style="font-size: 48px; font-weight: 600; color: #1d1d1f; margin-bottom: 16px;">
            <?php echo esc_html($page_title); ?>
        </h1>
        <p style="color: #86868b; font-size: 16px;">
            <?php echo esc_html($page_description); ?>
        </p>
    </div>
    
    <div class="row">
        <!-- Filter Sidebar -->
        <div class="col-md-3">
            <div class="filters-sidebar" style="background: rgba(251, 251, 253, 0.8); backdrop-filter: saturate(180%) blur(20px); border: 1px solid rgba(0, 0, 0, 0.1); border-radius: 18px; padding: 20px; margin-bottom: 20px;">
                <h3 style="color: #1d1d1f; font-size: 18px; font-weight: 600; margin-bottom: 16px;">Фильтры</h3>
                <?php echo do_shortcode('[wpf-filters id=' . $filter_id . ']'); ?>
            </div>
        </div>
        
        <!-- Products Grid -->
        <div class="col-md-9">
            <?php if (!empty($category)) : ?>
                <?php 
                if (!empty($brand)) {
                    echo do_shortcode('[products category="' . $category . '" attribute="brand" terms="' . strtolower($brand) . '" limit="12" columns="3"]');
                } else {
                    echo do_shortcode('[products category="' . $category . '" limit="12" columns="3"]');
                }
                ?>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>