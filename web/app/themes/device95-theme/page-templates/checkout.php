<?php
/**
 * Template Name: Checkout
 */

// Process checkout form
if (isset($_POST['checkout_nonce']) && wp_verify_nonce($_POST['checkout_nonce'], 'custom_checkout_process')) {
    
    // Get form data
    $email = sanitize_email($_POST['billing_email']);
    $phone = sanitize_text_field($_POST['billing_phone']);
    $delivery_method = sanitize_text_field($_POST['delivery_method']);
    
    // Create order
    $order = wc_create_order();
    
    // Add cart items to order
    foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
        $product = $cart_item['data'];
        $order->add_product($product, $cart_item['quantity']);
    }
    
    // Set billing info
    $order->set_billing_email($email);
    $order->set_billing_phone($phone);
    
    if ($delivery_method === 'delivery') {
        // Delivery address
        $order->set_billing_first_name(sanitize_text_field($_POST['billing_first_name']));
        $order->set_billing_last_name(sanitize_text_field($_POST['billing_last_name']));
        $order->set_billing_city(sanitize_text_field($_POST['billing_city']));
        $order->set_billing_address_1(sanitize_text_field($_POST['billing_address_1']) . ', дом ' . sanitize_text_field($_POST['billing_house']));
        $order->set_billing_postcode(sanitize_text_field($_POST['billing_postcode']));
        $order->set_billing_country('RU');
        
        // Save shipping address
        $order->set_shipping_first_name(sanitize_text_field($_POST['billing_first_name']));
        $order->set_shipping_last_name(sanitize_text_field($_POST['billing_last_name']));
        $order->set_shipping_city(sanitize_text_field($_POST['billing_city']));
        $order->set_shipping_address_1(sanitize_text_field($_POST['billing_address_1']) . ', дом ' . sanitize_text_field($_POST['billing_house']));
        $order->set_shipping_postcode(sanitize_text_field($_POST['billing_postcode']));
        $order->set_shipping_country('RU');
        
        // Add note
        $order->add_order_note('🚚 Способ получения: ДОСТАВКА');
        
        // Save delivery method as meta data (THIS IS NEW!)
        $order->update_meta_data('_delivery_method', 'Доставка');
        $order->update_meta_data('_delivery_type', 'delivery');
        
    } else {
        // Pickup
        $pickup_name = sanitize_text_field($_POST['pickup_name']);
        $order->set_billing_first_name($pickup_name);
        $order->set_billing_address_1('Москва, Сущёвский Вал 5с20, офис N-4');
        $order->set_billing_city('Москва');
        $order->set_billing_postcode('127018');
        $order->set_billing_country('RU');
        
        // Add notes
        $order->add_order_note('📦 Способ получения: САМОВЫВОЗ');
        $order->add_order_note('Адрес самовывоза: г. Москва, Сущёвский Вал 5с20, офис N-4');
        $order->add_order_note('Имя получателя: ' . $pickup_name);
        
        // Save delivery method as meta data (THIS IS NEW!)
        $order->update_meta_data('_delivery_method', 'Самовывоз');
        $order->update_meta_data('_delivery_type', 'pickup');
    }
    
    // Calculate totals
    $order->calculate_totals();
    
    // Save order
    $order->save();
    
    // Get order ID
    $order_id = $order->get_id();
    
    // Clear cart
    WC()->cart->empty_cart();
    
    // Redirect to thank you page
    wp_redirect(home_url('/thank-you/?order=' . $order_id));
    exit;
}

get_header();
?>

<div class="custom-checkout-container">
    <h1 class="checkout-title">Оформление заказа</h1>
    
    <div class="checkout-grid">
        <!-- Left Column: Form -->
        <div class="checkout-form">
            <form id="custom-checkout-form" method="post">
                
                <!-- Contact Information -->
                <div class="form-section">
                    <h2 class="section-title">Контактная информация</h2>
                    
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="billing_email">
                    </div>
                    
                    <div class="form-group">
                        <label>Телефон <span class="required">*</span></label>
                        <input type="tel" name="billing_phone" required placeholder="+7 (___) ___-__-__">
                    </div>
                </div>
                
                <!-- Delivery Method -->
                <div class="form-section">
                    <h2 class="section-title">Способ получения</h2>
                    
                    <div class="delivery-tabs">
                        <button type="button" class="tab-button active" data-tab="delivery">
                            Доставка
                        </button>
                        <button type="button" class="tab-button" data-tab="pickup">
                            Самовывоз
                        </button>
                    </div>
                    
                    <!-- Delivery Tab -->
                    <div id="delivery-tab" class="tab-content active">
                        <div class="form-group">
                            <label>Имя <span class="required">*</span></label>
                            <input type="text" name="billing_first_name" required>
                        </div>
                        
                        <div class="form-group">
                            <label>Фамилия <span class="required">*</span></label>
                            <input type="text" name="billing_last_name" required>
                        </div>
                        
                        <div class="form-group">
                            <label>Город <span class="required">*</span></label>
                            <input type="text" name="billing_city" required>
                        </div>
                        
                        <div class="form-group">
                            <label>Улица <span class="required">*</span></label>
                            <input type="text" name="billing_address_1" required placeholder="Название улицы">
                        </div>
                        
                        <div class="form-group">
                            <label>Номер дома <span class="required">*</span></label>
                            <input type="text" name="billing_house" required>
                        </div>
                        
                        <div class="form-group">
                            <label>Почтовый индекс</label>
                            <input type="text" name="billing_postcode">
                        </div>
                    </div>
                    
                    <!-- Pickup Tab -->
                    <div id="pickup-tab" class="tab-content">
                        <div class="pickup-address-box">
                            <h3>📍 Адрес самовывоза</h3>
                            <p><strong>Москва, метро Савёловская</strong></p>
                            <p>г. Москва, Сущёвский Вал 5с20, офис N-4</p>
                            <p style="margin-top: 20px; font-size: 14px; opacity: 0.9;">
                                Режим работы: Пн-Пт 10:00-19:00
                            </p>
                        </div>
                        
                        <div class="form-group" style="margin-top: 20px;">
                            <label>Имя <span class="required">*</span></label>
                            <input type="text" name="pickup_name">
                        </div>
                    </div>
                </div>
                
                <input type="hidden" name="delivery_method" id="delivery-method" value="delivery" formnovalidate>
                
                <button type="submit" class="submit-button" >
                    Оформить заказ
                </button>
                
                <?php wp_nonce_field('custom_checkout_process', 'checkout_nonce'); ?>
            </form>
        </div>
        
        <!-- Right Column: Order Summary -->
        <div class="order-summary">
            <h2>Ваш заказ</h2>
            
            <?php
            foreach (WC()->cart->get_cart() as $cart_item) {
                $product = $cart_item['data'];
                $product_id = $product->get_id();
                $thumbnail = get_the_post_thumbnail_url($product_id, 'thumbnail');
                ?>
                <div class="cart-item">
                    <img src="<?php echo $thumbnail; ?>" alt="<?php echo $product->get_name(); ?>">
                    <div class="cart-item-info">
                        <h4><?php echo $product->get_name(); ?></h4>
                        <p>Количество: <?php echo $cart_item['quantity']; ?></p>
                        <div class="cart-item-price">
                            <?php echo wc_price($product->get_price() * $cart_item['quantity']); ?>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
            
            <div class="order-total">
                <span>Итого:</span>
                <span><?php echo WC()->cart->get_total(); ?></span>
            </div>
        </div>
    </div>
</div>

<script>
jQuery(document).ready(function($) {
    // Tab switching
    $('.tab-button').on('click', function() {
        var tab = $(this).data('tab');
        
        $('.tab-button').removeClass('active');
        $(this).addClass('active');
        
        $('.tab-content').removeClass('active');
        $('#' + tab + '-tab').addClass('active');
        
        $('#delivery-method').val(tab);
        
        // Toggle required fields
        if (tab === 'delivery') {
            $('input[name="billing_first_name"], input[name="billing_last_name"], input[name="billing_city"], input[name="billing_address_1"], input[name="billing_house"], input[name="billing_postcode"]').prop('required', true);
            $('input[name="pickup_name"]').prop('required', false);
        } else {
            $('input[name="billing_first_name"], input[name="billing_last_name"], input[name="billing_city"], input[name="billing_address_1"], input[name="billing_house"], input[name="billing_postcode"]').prop('required', false);
            $('input[name="pickup_name"]').prop('required', true);
        }
    });
});
</script>

<?php get_footer(); ?>