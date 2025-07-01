<?php
/**
 * Complete Product Filter
 * File: inc/product-filter.php
 */

function make_complete_filter($category) {
    // Get products from this page only
    $category_slugs = array_map('trim', explode(',', $category));
    
    // Find products by category
    $tax_query = array();
    foreach ($category_slugs as $cat_slug) {
        $tax_query[] = array(
            'taxonomy' => 'product_cat',
            'field'    => 'slug',
            'terms'    => $cat_slug,
        );
    }
    
    $products = wc_get_products(array(
        'tax_query' => array(
            'relation' => 'AND',
            $tax_query
        ),
        'limit' => -1,
        'status' => 'publish'
    ));
    
    if (empty($products)) {
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
    $max_product_price = !empty($prices) ? ceil(max($prices)) : 1000;
    
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
            border-color: #007aff;
            box-shadow: 0 0 0 3px rgba(0, 122, 255, 0.1);
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
            background: rgba(0, 0, 0, 0.05);
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .checkbox-label:hover {
            background: rgba(0, 122, 255, 0.1);
            color: #007aff;
        }
        
        .attribute-checkbox {
            width: 16px;
            height: 16px;
            cursor: pointer;
            accent-color: #007aff;
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
            padding: 10px 16px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 500;
            font-size: 14px;
            transition: all 0.3s ease;
            text-decoration: none;
            text-align: center;
            display: block;
        }
        
        .apply-button {
            background: #e3f2fd !important;
            color: #1976d2 !important;
            border: 1px solid #bbdefb !important;
        }
        
        .apply-button:hover {
            background: #bbdefb !important;
            color: #0d47a1 !important;
            transform: translateY(-1px);
            box-shadow: 0 4px 16px rgba(25, 118, 210, 0.2);
        }
        
        .clear-button {
            background: white !important;
            color: #666 !important;
            border: 1px solid #ddd !important;
        }
        
        .clear-button:hover {
            background: #f5f5f5 !important;
            color: #333 !important;
            transform: translateY(-1px);
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
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
                           placeholder="От <?php echo $min_product_price; ?>₽" 
                           value="<?php echo $min_price; ?>"
                           min="<?php echo $min_product_price; ?>"
                           max="<?php echo $max_product_price; ?>">
                    
                    <input type="number" 
                           class="price-input" 
                           name="max_price" 
                           placeholder="До <?php echo $max_product_price; ?>₽" 
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
                                           name="<?php echo $attr_name; ?>[]" 
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
        
        // Price inputs - auto submit only on desktop
        priceInputs.forEach(input => {
            input.addEventListener('change', function() {
                if (window.innerWidth > 991) {
                    setTimeout(function() {
                        form.submit();
                    }, 500);
                }
            });
        });
        
        // Checkboxes - auto submit only on desktop
        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                if (window.innerWidth > 991) {
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
    // If no filters selected, show all products
    $has_filters = false;
    foreach ($_GET as $key => $value) {
        if (!empty($value) && $key !== 'min_price' && $key !== 'max_price') {
            $has_filters = true;
            break;
        }
    }
    
    if (!$has_filters && empty($_GET['min_price']) && empty($_GET['max_price'])) {
        return '[products category="' . $category . '" limit="12" columns="3"]';
    }
    
    // Build tax query for complex filtering
    $tax_query = array('relation' => 'AND');
    
    // Add category
    $category_slugs = array_map('trim', explode(',', $category));
    foreach ($category_slugs as $cat_slug) {
        $tax_query[] = array(
            'taxonomy' => 'product_cat',
            'field'    => 'slug',
            'terms'    => $cat_slug,
        );
    }
    
    // Add attribute filters
    foreach ($_GET as $key => $value) {
        if (!empty($value) && $key !== 'min_price' && $key !== 'max_price') {
            if (is_array($value)) {
                $terms = array_map('sanitize_text_field', $value);
                $tax_query[] = array(
                    'taxonomy' => $key,
                    'field'    => 'name',
                    'terms'    => $terms,
                    'operator' => 'IN'
                );
            } else {
                $tax_query[] = array(
                    'taxonomy' => $key,
                    'field'    => 'name',
                    'terms'    => sanitize_text_field($value),
                    'operator' => 'IN'
                );
            }
        }
    }
    
    // Get products with complex query
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
    
    // Get products and create shortcode with IDs
    $products = get_posts($args);
    
    if (empty($products)) {
        return '<p>No products found.</p>';
    }
    
    $product_ids = array();
    foreach ($products as $product) {
        $product_ids[] = $product->ID;
    }
    
    return '[products ids="' . implode(',', $product_ids) . '" limit="12" columns="3"]';
}
?>