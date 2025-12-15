<?php
/**
 * Template Name: Track Order
 */

get_header();
?>

<!-- Track Order Section with Background -->
<div class="track-order-hero" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/order-status.png');">
    <div class="track-overlay"></div>
    <div class="track-hero-content">
        <h1 class="track-title">Отслеживание заказа</h1>
        <p class="track-subtitle">Введите номер заказа для проверки статуса</p>
    </div>
</div>

<!-- Form Section (below hero) -->
<div class="track-form-section">
    <div class="track-form-container">
        <div class="track-form">
            <form id="track-order-form">
                <div class="form-group">
                    <label>Номер заказа</label>
                    <input type="text" id="order_number" placeholder="Например: 192" required>
                </div>
                
                <button type="submit" class="track-button">
                    Проверить статус
                </button>
            </form>
            
            <div id="order-result" style="display: none;" class="order-result">
                <!-- Results will appear here -->
            </div>
        </div>
    </div>
</div>

<script>
jQuery(document).ready(function($) {
    var ajaxUrl = '<?php echo admin_url('admin-ajax.php'); ?>';
    
    console.log('Track order page loaded');
    console.log('AJAX URL:', ajaxUrl);
    
    $('#track-order-form').on('submit', function(e) {
        e.preventDefault();
        
        var orderNumber = $('#order_number').val().replace('#', '').trim();
        
        if (!orderNumber) {
            alert('Введите номер заказа');
            return;
        }
        
        console.log('Searching for order:', orderNumber);
        
        $.ajax({
            url: ajaxUrl,
            type: 'POST',
            dataType: 'json',
            data: {
                action: 'track_order',
                order_id: orderNumber
            },
            beforeSend: function() {
                $('.track-button').text('Поиск...').prop('disabled', true);
            },
            success: function(response) {
                console.log('Response:', response);
                
                $('.track-button').text('Проверить статус').prop('disabled', false);
                
                if (response.success && response.data) {
                    var order = response.data;
                    var statusClass = 'status-' + order.status;
                    
                    var html = '';
                    html += '<span class="order-status ' + statusClass + '">' + order.status_name + '</span>';
                    html += '<div class="order-info">';
                    
                    // Order number
                    html += '<div class="order-info-item">';
                    html += '<span class="order-info-label">Номер заказа:</span>';
                    html += '<span class="order-info-value">#' + order.id + '</span>';
                    html += '</div>';
                    
                    // Date
                    html += '<div class="order-info-item">';
                    html += '<span class="order-info-label">Дата:</span>';
                    html += '<span class="order-info-value">' + order.date + '</span>';
                    html += '</div>';
                    
                    // Total
                    html += '<div class="order-info-item">';
                    html += '<span class="order-info-label">Сумма:</span>';
                    html += '<span class="order-info-value">' + order.total + '</span>';
                    html += '</div>';
                    
                    // Delivery method
                    html += '<div class="order-info-item">';
                    html += '<span class="order-info-label">Способ получения:</span>';
                    html += '<span class="order-info-value">' + order.delivery_method + '</span>';
                    html += '</div>';
                    
                    // Address
                    html += '<div class="order-info-item">';
                    html += '<span class="order-info-label">Адрес:</span>';
                    html += '<span class="order-info-value">' + order.address + '</span>';
                    html += '</div>';
                    
                    // Doorbell code (if exists)
                    if (order.doorbell_code) {
                        html += '<div class="order-info-item">';
                        html += '<span class="order-info-label">Домофон:</span>';
                        html += '<span class="order-info-value">' + order.doorbell_code + '</span>';
                        html += '</div>';
                    }
                    
                    // Delivery notes (if exists)
                    if (order.delivery_notes) {
                        html += '<div class="order-info-item">';
                        html += '<span class="order-info-label">Комментарий:</span>';
                        html += '<span class="order-info-value">' + order.delivery_notes + '</span>';
                        html += '</div>';
                    }
                    
                    html += '</div></div>';
                    
                    $('#order-result').html(html).fadeIn();
                } else {
                    var message = response.data && response.data.message ? response.data.message : 'Заказ не найден';
                    $('#order-result').html('<div class="order-result"><p style="color: #dc3545; text-align: center; font-size: 16px;">❌ ' + message + '</p></div>').fadeIn();
                }
            },
                        error: function(xhr, status, error) {
                console.error('AJAX Error:', error);
                console.error('Response:', xhr.responseText);
                
                $('.track-button').text('Проверить статус').prop('disabled', false);
                $('#order-result').html('<div class="order-result"><p style="color: #dc3545; text-align: center;">Ошибка подключения. Попробуйте позже.</p></div>').fadeIn();
            }
        });
    });
});
</script>

<?php get_footer(); ?>