<?php
/**
 * Complete Product Filter
 * File: inc/product-filter.php
 */

function make_complete_filter($category) {
    // Get products from this category only
    $category_slugs = array_map('trim', explode(',', $category));
    
    // Get page config to check include_children setting
    $page_slug = get_post_field('post_name', get_post());
    $page_config = get_page_config();
    $include_children = isset($page_config[$page_slug]['include_children']) ? $page_config[$page_slug]['include_children'] : false;
    
    // Build proper tax query for category
    $args = array(
        'limit' => -1,
        'status' => 'publish',
        'tax_query' => array(
            array(
                'taxonomy' => 'product_cat',
                'field' => 'slug',
                'terms' => $category_slugs,
                'operator' => 'IN',
                'include_children' => $include_children
            )
        )
    );
    
    // Get products
    $products = wc_get_products($args);
        
    if (empty($products)) {
        echo '<div class="complete-filter">';
        echo '<p style="text-align: center; color: #86868b;">Нет товаров в этой категории</p>';
        echo '</div>';
        return;
    }
    
    // Get what user picked
    $min_price = $_GET['min_price'] ?? '';
    $max_price = $_GET['max_price'] ?? '';
    
    // Find all prices and attributes
    $prices = array();
    $all_attributes = array();
    
    foreach ($products as $product) {
        // Get price
        $price = $product->get_price();
        if ($price) {
            $prices[] = (float)$price;
        }
        
        // Get all attributes
        $attributes = $product->get_attributes();
        foreach ($attributes as $attr_name => $attribute) {
            if ($attribute->get_variation()) {
                continue; // Skip variation attributes
            }
            
            // Get the real attribute name (not slug)
            $attr_label = wc_attribute_label($attr_name);
            if (empty($attr_label)) {
                $attr_label = str_replace('pa_', '', $attr_name);
            }
            
            $values = $attribute->get_options();
            foreach ($values as $value_id) {
                $term = get_term($value_id);
                if ($term && !is_wp_error($term)) {
                    $all_attributes[$attr_label][$attr_name][] = $term->name;
                }
            }
        }
    }
    
    // Clean up attributes
    foreach ($all_attributes as $attr_label => $attr_data) {
        foreach ($attr_data as $attr_name => $values) {
            $all_attributes[$attr_label][$attr_name] = array_unique($values);
            sort($all_attributes[$attr_label][$attr_name]);
        }
    }
    
    // Get price range
    $min_product_price = !empty($prices) ? floor(min($prices)) : 0;
    $max_product_price = !empty($prices) ? ceil(max($prices)) : 100000;
    
    ?>
    
    <!-- CSS Styles -->
    <style>
        .complete-filter {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: saturate(180%) blur(20px);
            border: 1px solid rgba(0, 0, 0, 0.1);
            border-radius: 18px;
            padding: 20px;
            margin-bottom: 20px;
            color: #1d1d1f;
            font-family: "SF Pro Text", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
        }
        
        .filter-title {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 20px;
            color: #1d1d1f;
        }
        
        .filter-section {
            margin-bottom: 20px;
            padding-bottom: 16px;
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
        }
        
        .filter-section:last-child {
            border-bottom: none;
            margin-bottom: 0;
        }
        
        .filter-label {
            font-weight: 600;
            margin-bottom: 12px;
            display: block;
            font-size: 14px;
            color: #1d1d1f;
        }
        
        /* Price Input Styles */
        .price-inputs {
            display: flex;
            gap: 10px;
        }
        
        .price-input {
            flex: 1;
            padding: 8px 12px;
            border: 1px solid rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            font-size: 14px;
            background: rgba(255, 255, 255, 0.9);
            color: #1d1d1f;
        }
        
        .price-input:focus {
            outline: none;
            border-color: #0071e3;
            box-shadow: 0 0 0 3px rgba(0, 113, 227, 0.1);
        }
        
        .price-input::placeholder {
            color: #86868b;
        }
        
        /* Checkbox Styles */
        .checkbox-group {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }
        
        .checkbox-label {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 8px 12px;
            background: rgba(0, 0, 0, 0.03);
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .checkbox-label:hover {
            background: rgba(0, 113, 227, 0.1);
        }
        
        .attribute-checkbox {
            width: 16px;
            height: 16px;
            cursor: pointer;
            accent-color: #0071e3;
        }
        
        .checkbox-text {
            font-size: 14px;
            color: #1d1d1f;
            cursor: pointer;
            font-weight: 400;
        }
        
        /* Button Styles */
        .filter-buttons {
            margin-top: 20px;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        
        .filter-button {
            width: 100%;
            padding: 12px 16px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            font-weight: 600;
            font-size: 14px;
            transition: all 0.3s ease;
            text-decoration: none;
            text-align: center;
            display: block;
            font-family: -apple-system, BlinkMacSystemFont, "SF Pro Display", sans-serif;
        }
        
        .apply-button {
            background: #0071e3 !important;
            color: white !important;
            border: none !important;
        }
        
        .apply-button:hover {
            background: #0077ed !important;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0, 113, 227, 0.4);
        }
        
        .clear-button {
            background: white !important;
            color: #1d1d1f !important;
            border: 1px solid rgba(0, 0, 0, 0.1) !important;
        }
        
        .clear-button:hover {
            background: #f5f5f7 !important;
            transform: translateY(-2px);
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
        }
        
        /* Mobile styles */
        @media (max-width: 991px) {
            .complete-filter {
                padding: 16px;
            }
            
            .filter-title {
                font-size: 16px;
                margin-bottom: 16px;
            }
            
            .filter-section {
                margin-bottom: 16px;
                padding-bottom: 12px;
            }
            
            .checkbox-label {
                padding: 6px 10px;
            }
            
            .checkbox-text {
                font-size: 13px;
            }
        }
    </style>
    
    <!-- Filter HTML -->
    <div class="complete-filter">
        <div class="filter-title">Фильтры</div>
        
        <form method="get" id="complete-filter-form">
            
            <!-- Price Filter -->
            <?php if (!empty($prices)): ?>
            <div class="filter-section">
                <label class="filter-label">Цена</label>
                
                <div class="price-inputs">
                    <input type="number" 
                           class="price-input" 
                           name="min_price" 
                           placeholder="От <?php echo number_format($min_product_price, 0, '', ' '); ?>₽" 
                           value="<?php echo $min_price; ?>"
                           min="<?php echo $min_product_price; ?>"
                           max="<?php echo $max_product_price; ?>">
                    
                    <input type="number" 
                           class="price-input" 
                           name="max_price" 
                           placeholder="До <?php echo number_format($max_product_price, 0, '', ' '); ?>₽" 
                           value="<?php echo $max_price; ?>"
                           min="<?php echo $min_product_price; ?>"
                           max="<?php echo $max_product_price; ?>">
                </div>
            </div>
            <?php endif; ?>
            
            <!-- All Attributes -->
            <?php foreach ($all_attributes as $attr_label => $attr_data): ?>
                <?php foreach ($attr_data as $attr_name => $values): ?>
                    <?php if (!empty($values) && count($values) > 1): ?>
                    <div class="filter-section">
                        <label class="filter-label">
                            <?php echo esc_html($attr_label); ?>
                        </label>
                        
                        <div class="checkbox-group">
                            <?php foreach ($values as $value): ?>
                                <label class="checkbox-label">
                                    <input type="checkbox" 
                                           class="attribute-checkbox" 
                                           name="<?php echo esc_attr($attr_name); ?>[]" 
                                           value="<?php echo esc_attr($value); ?>"
                                           <?php 
                                           $selected_values = $_GET[$attr_name] ?? array();
                                           if (!is_array($selected_values)) {
                                               $selected_values = array($selected_values);
                                           }
                                           checked(in_array($value, $selected_values)); 
                                           ?>>
                                    <span class="checkbox-text"><?php echo esc_html($value); ?></span>
                                </label>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php endforeach; ?>
            
            <!-- Filter Buttons -->
            <div class="filter-buttons">
                <!-- Apply button - only shows on mobile -->
                <button type="submit" class="filter-button apply-button d-lg-none">
                    Применить фильтр
                </button>
                
                <!-- Clear button -->
                <a href="<?php echo get_permalink(); ?>" class="filter-button clear-button">
                    Сбросить фильтры
                </a>
            </div>
        </form>
    </div>
    
    <!-- JavaScript -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('complete-filter-form');
        const priceInputs = document.querySelectorAll('.price-input');
        const checkboxes = document.querySelectorAll('.attribute-checkbox');
        
        // Auto-submit on desktop only
        const isDesktop = window.innerWidth > 991;
        
        // Price inputs - auto submit only on desktop
        priceInputs.forEach(input => {
            input.addEventListener('change', function() {
                if (isDesktop) {
                    setTimeout(function() {
                        form.submit();
                    }, 500);
                }
            });
        });
        
        // Checkboxes - auto submit only on desktop
        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                if (isDesktop) {
                    setTimeout(function() {
                        form.submit();
                    }, 300);
                }
            });
        });
    });
    </script>
    
    <?php
}

// Build filtered product shortcode  
function build_filtered_shortcode($category) {
    // Get page config
    $page_slug = get_post_field('post_name', get_post());
    $page_config = get_page_config();
    $include_children = isset($page_config[$page_slug]['include_children']) ? $page_config[$page_slug]['include_children'] : false;
    
    // Check if filters are applied
    $has_filters = false;
    foreach ($_GET as $key => $value) {
        if (!empty($value) && $key !== 'min_price' && $key !== 'max_price') {
            $has_filters = true;
            break;
        }
    }
    
    // If no filters, show all products from category
    if (!$has_filters && empty($_GET['min_price']) && empty($_GET['max_price'])) {
        return '[products category="' . $category . '" limit="12" columns="3"]';
    }
    
    // Build tax query
    $tax_query = array('relation' => 'AND');
    
    // Add category filter
    $category_slugs = array_map('trim', explode(',', $category));
    $tax_query[] = array(
        'taxonomy' => 'product_cat',
        'field' => 'slug',
        'terms' => $category_slugs,
        'operator' => 'IN',
        'include_children' => $include_children
    );
    
    // Add attribute filters
    foreach ($_GET as $key => $value) {
        if (!empty($value) && $key !== 'min_price' && $key !== 'max_price') {
            if (is_array($value)) {
                $terms = array_map('sanitize_text_field', $value);
                $tax_query[] = array(
                    'taxonomy' => $key,
                    'field' => 'name',
                    'terms' => $terms,
                    'operator' => 'IN'
                );
            }
        }
    }
    
    // Get products
    $args = array(
        'post_type' => 'product',
        'posts_per_page' => 12,
        'post_status' => 'publish',
        'tax_query' => $tax_query
    );
    
    // Add price filter
    if (!empty($_GET['min_price']) || !empty($_GET['max_price'])) {
        $meta_query = array();
        
        if (!empty($_GET['min_price'])) {
            $meta_query[] = array(
                'key' => '_price',
                'value' => sanitize_text_field($_GET['min_price']),
                'compare' => '>=',
                'type' => 'NUMERIC'
            );
        }
        
        if (!empty($_GET['max_price'])) {
            $meta_query[] = array(
                'key' => '_price',
                'value' => sanitize_text_field($_GET['max_price']),
                'compare' => '<=',
                'type' => 'NUMERIC'
            );
        }
        
        if (count($meta_query) > 1) {
            $meta_query['relation'] = 'AND';
        }
        
        $args['meta_query'] = $meta_query;
    }
    
    $products = get_posts($args);
    
    if (empty($products)) {
        return '<div style="text-align: center; padding: 60px 20px;">
                    <p style="font-size: 18px; color: #86868b; margin-bottom: 20px;">
                        😔 Товары не найдены
                    </p>
                    <p style="font-size: 14px; color: #86868b;">
                        Попробуйте изменить фильтры или <a href="' . get_permalink() . '" style="color: #0071e3;">сбросить все фильтры</a>
                    </p>
                </div>';
    }
    
    $product_ids = array();
    foreach ($products as $product) {
        $product_ids[] = $product->ID;
    }
    
    return '[products ids="' . implode(',', $product_ids) . '" limit="12" columns="3"]';
}
?>