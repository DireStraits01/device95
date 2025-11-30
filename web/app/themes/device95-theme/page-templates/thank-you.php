<?php
/**
 * Template Name: Thank You
 */

get_header();

// Get order ID from URL
$order_id = isset($_GET['order']) ? intval($_GET['order']) : 0;

// Get the order
$order = wc_get_order($order_id);
?>

<div style="max-width: 800px; margin: 80px auto; padding: 40px; text-align: center;">
    
    <?php if ($order && $order->get_id()): ?>
        
        <!-- Order found! -->
        <div style="font-size: 60px; margin-bottom: 20px;">✅</div>
        
        <h1 style="font-size: 36px; margin-bottom: 20px;">Спасибо за заказ!</h1>
        
        <p style="font-size: 20px; color: #667eea; margin-bottom: 30px;">
            Номер вашего заказа: <strong>#<?php echo $order->get_id(); ?></strong>
        </p>
        
        <p style="font-size: 18px; color: #666; line-height: 1.6;">
            Наш менеджер свяжется с вами в ближайшее время<br>
            по указанному телефону <strong><?php echo $order->get_billing_phone(); ?></strong><br>
            для подтверждения заказа.
        </p>
        
        <!-- Order details -->
        <div style="background: #f5f5f7; padding: 30px; border-radius: 16px; margin-top: 40px; text-align: left;">
            <h3 style="margin-bottom: 20px;">Детали заказа:</h3>
            
            <?php foreach ($order->get_items() as $item): ?>
                <div style="display: flex; justify-content: space-between; padding: 10px 0; border-bottom: 1px solid #ddd;">
                    <span><?php echo $item->get_name(); ?> × <?php echo $item->get_quantity(); ?></span>
                    <span><?php echo wc_price($item->get_total()); ?></span>
                </div>
            <?php endforeach; ?>
            
            <div style="display: flex; justify-content: space-between; padding: 20px 0; font-size: 20px; font-weight: bold; border-top: 2px solid #000; margin-top: 10px;">
                <span>Итого:</span>
                <span><?php echo wc_price($order->get_total()); ?></span>
            </div>
        </div>
        
        <a href="<?php echo home_url(); ?>" style="display: inline-block; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 16px 40px; border-radius: 12px; text-decoration: none; font-weight: 600; margin-top: 40px;">
            Вернуться на главную
        </a>
        
    <?php else: ?>
        
        <!-- Order not found -->
        <h1>Заказ не найден</h1>
        <p>К сожалению, мы не смогли найти ваш заказ.</p>
        <a href="<?php echo home_url(); ?>">Вернуться на главную</a>
        
    <?php endif; ?>
    
</div>

<?php get_footer(); ?>