<?php
/**
 * device95-theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package device95-theme
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function device95_theme_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on device95-theme, use a find and replace
		* to change 'device95-theme' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'device95-theme', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'device95-theme' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'device95_theme_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'device95_theme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function device95_theme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'device95_theme_content_width', 640 );
}
add_action( 'after_setup_theme', 'device95_theme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function device95_theme_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'device95-theme' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'device95-theme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'device95_theme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function device95_theme_scripts() {
	wp_enqueue_style( 'device95-theme-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'device95-theme-style', 'rtl', 'replace' );

	wp_enqueue_script( 'device95-theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	// Adding Bootstrap to the Theme - Start

	wp_enqueue_style('bootstrap', get_stylesheet_directory_uri() . '/bootstrap/css/bootstrap.min.css');
	wp_enqueue_script('bootstrap', get_stylesheet_directory_uri() . '/bootstrap/js/bootstrap.bundle.min.js');

	// Adding Bootstrap to the Theme – Start

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'device95_theme_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

// Add Font Awsome
function enqueue_font_awesome() {
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css');
}
add_action('wp_enqueue_scripts', 'enqueue_font_awesome');

// Update cart count with AJAX
// Force cart count update on page load
add_action('wp_footer', 'force_cart_count_update');
function force_cart_count_update() {
    ?>
    <script>
    jQuery(document).ready(function($) {
        // Function to update cart
        function updateCartCount() {
            $.post('<?php echo admin_url('admin-ajax.php'); ?>', {
                action: 'get_cart_count'
            }, function(count) {
                $('.cart-count-badge').text(count);
                console.log("Cart updated to:", count);
            });
        }
        
        // Update when page loads
        updateCartCount();
        
        // Update when cart changes
        $(document.body).on('added_to_cart removed_from_cart updated_wc_div updated_cart_totals', function() {
            console.log("Cart changed!");
            updateCartCount();
        });
        
        // Also check every 1 seconds (backup)
        setInterval(updateCartCount, 1000);
    });
    </script>
    <?php
}

// Get cart count
add_action('wp_ajax_get_cart_count', 'ajax_get_cart_count');
add_action('wp_ajax_nopriv_get_cart_count', 'ajax_get_cart_count');
function ajax_get_cart_count() {
    echo WC()->cart->get_cart_contents_count();
    die();
}

// Show delivery method in SHIPPING section (after address)
add_action('woocommerce_admin_order_data_after_shipping_address', 'show_delivery_method_in_order');
function show_delivery_method_in_order($order) {
    $delivery_method = $order->get_meta('_delivery_method');
    
    if ($delivery_method) {
        echo '<div style="margin-top: 20px; padding: 15px; background: #f0f0f1; border-left: 4px solid #2271b1;">';
        echo '<h3 style="margin: 0 0 10px 0;">Способ получения</h3>';
        echo '<p style="margin: 0; font-size: 16px; font-weight: bold;">';
        
        if ($delivery_method == 'Доставка') {
            echo '🚚 ' . $delivery_method;
        } else {
            echo '📦 ' . $delivery_method;
        }
        
        echo '</p>';
        echo '</div>';
    }
}

// Remove billing address from payment section
add_filter('woocommerce_order_formatted_billing_address', 'remove_billing_address_display', 10, 2);
function remove_billing_address_display($address, $order) {
    // Return empty array to hide address
    return array();
}

// ========================================
// CUSTOM ORDER STATUSES
// ========================================

// 1. Register custom order statuses
add_action('init', 'register_custom_order_statuses');
function register_custom_order_statuses() {
    register_post_status('wc-awaiting-confirm', array(
        'label' => 'Ожидается подтверждения',
        'public' => true,
        'show_in_admin_status_list' => true,
        'label_count' => _n_noop('Ожидается подтверждения <span class="count">(%s)</span>', 'Ожидается подтверждения <span class="count">(%s)</span>')
    ));
    
    register_post_status('wc-preparing', array(
        'label' => 'Собираем заказ',
        'public' => true,
        'show_in_admin_status_list' => true,
        'label_count' => _n_noop('Собираем заказ <span class="count">(%s)</span>', 'Собираем заказ <span class="count">(%s)</span>')
    ));
    
    register_post_status('wc-courier', array(
        'label' => 'Курьер в пути',
        'public' => true,
        'show_in_admin_status_list' => true,
        'label_count' => _n_noop('Курьер в пути <span class="count">(%s)</span>', 'Курьер в пути <span class="count">(%s)</span>')
    ));
    
    register_post_status('wc-ready-pickup', array(
        'label' => 'Ожидает выдачи',
        'public' => true,
        'show_in_admin_status_list' => true,
        'label_count' => _n_noop('Ожидает выдачи <span class="count">(%s)</span>', 'Ожидает выдачи <span class="count">(%s)</span>')
    ));
}

// 2. Add custom statuses to order status list
add_filter('wc_order_statuses', 'add_custom_order_statuses');
function add_custom_order_statuses($order_statuses) {
    $order_statuses['wc-awaiting-confirm'] = 'Заказ в обработке, ожидайте звонок от менеджера';
    $order_statuses['wc-preparing'] = 'Собираем заказ';
    $order_statuses['wc-courier'] = 'Курьер в пути';
    $order_statuses['wc-ready-pickup'] = 'Заказ ожидает выдачи';
    
    return $order_statuses;
}

// 3. Set default status for new orders - UPDATED VERSION
add_action('woocommerce_new_order', 'set_default_order_status_awaiting_confirm', 20, 1);
function set_default_order_status_awaiting_confirm($order_id) {
    $order = wc_get_order($order_id);
    
    if (!$order) {
        return;
    }
    
    // Force change status to awaiting-confirm
    $order->set_status('awaiting-confirm', 'Новый заказ - ожидается подтверждение от менеджера', true);
    $order->save();
}

// 4. Add custom statuses to bulk actions (optional)
add_filter('bulk_actions-edit-shop_order', 'add_custom_status_bulk_actions');
function add_custom_status_bulk_actions($bulk_actions) {
    $bulk_actions['mark_awaiting-confirm'] = 'Изменить статус на "Ожидается подтверждения"';
    $bulk_actions['mark_preparing'] = 'Изменить статус на "Собираем заказ"';
    $bulk_actions['mark_courier'] = 'Изменить статус на "Курьер в пути"';
    $bulk_actions['mark_ready-pickup'] = 'Изменить статус на "Ожидает выдачи"';
    
    return $bulk_actions;
}

// 5. Make custom statuses count as "paid" (optional - if orders are already paid)
add_filter('woocommerce_order_is_paid_statuses', 'add_custom_statuses_to_paid');
function add_custom_statuses_to_paid($statuses) {
    $statuses[] = 'awaiting-confirm';
    $statuses[] = 'preparing';
    $statuses[] = 'courier';
    $statuses[] = 'ready-pickup';
    
    return $statuses;
}


// Track order AJAX
add_action('wp_ajax_track_order', 'ajax_track_order');
add_action('wp_ajax_nopriv_track_order', 'ajax_track_order');

function ajax_track_order() {
    // Check if order_id exists
    if (!isset($_POST['order_id'])) {
        wp_send_json_error(array('message' => 'Номер заказа не указан'));
        return;
    }
    
    $order_id = intval($_POST['order_id']);
    
    // Check if valid number
    if ($order_id <= 0) {
        wp_send_json_error(array('message' => 'Неверный формат номера заказа'));
        return;
    }
    
    // Try to get order
    $order = wc_get_order($order_id);
    
    if (!$order) {
        wp_send_json_error(array('message' => 'Заказ #' . $order_id . ' не найден'));
        return;
    }
    
    // Success!
    $status_names = array(
        'pending' => 'Ожидается оплата',
        'processing' => 'Обработка',
        'awaiting-confirm' => 'Ожидается подтверждения',
        'preparing' => 'Собираем заказ',
        'courier' => 'Курьер в пути',
        'ready-pickup' => 'Ожидает выдачи',
        'completed' => 'Выполнен',
        'cancelled' => 'Отменён'
    );
    
    $status = $order->get_status();
    $delivery_method = $order->get_meta('_delivery_method');
    
    // Get address
    $address = '';
    if ($delivery_method === 'Доставка') {
        // Get shipping address
        $address_parts = array();
        if ($order->get_shipping_city()) {
            $address_parts[] = 'г. ' . $order->get_shipping_city();
        }
        if ($order->get_shipping_address_1()) {
            $address_parts[] = $order->get_shipping_address_1();
        }
        if ($order->get_shipping_postcode()) {
            $address_parts[] = 'Индекс: ' . $order->get_shipping_postcode();
        }
        $address = implode(', ', $address_parts);
    } else {
        // Pickup address
        $address = $order->get_billing_address_1();
    }
    
    // Get doorbell code and notes
    $doorbell_code = $order->get_meta('_doorbell_code');
    $delivery_notes = $order->get_meta('_delivery_notes');
    
    wp_send_json_success(array(
        'id' => $order_id,
        'status' => $status,
        'status_name' => isset($status_names[$status]) ? $status_names[$status] : ucfirst($status),
        'date' => $order->get_date_created()->date('d.m.Y H:i'),
        'total' => strip_tags(wc_price($order->get_total())),
        'delivery_method' => $delivery_method ? $delivery_method : 'Не указан',
        'address' => $address ? $address : 'Не указан',
        'doorbell_code' => $doorbell_code ? $doorbell_code : '',
        'delivery_notes' => $delivery_notes ? $delivery_notes : ''
    ));
}

// Remove default sorting dropdown
remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);

// Add filter tabs to category pages
add_action('woocommerce_before_shop_loop', 'add_category_filter_tabs', 25);
function add_category_filter_tabs() {
    if (!is_product_category()) {
        return;
    }
    ?>
    <div class="category-filter-tabs">
        <div class="filter-tabs-container">
            <button class="filter-tab-btn <?php echo !isset($_GET['orderby']) ? 'active' : ''; ?>" 
                    onclick="window.location.href='<?php echo get_term_link(get_queried_object()); ?>'">
                Все товары
            </button>
            <button class="filter-tab-btn <?php echo (isset($_GET['orderby']) && $_GET['orderby'] == 'popularity') ? 'active' : ''; ?>"
                    onclick="window.location.href='<?php echo add_query_arg('orderby', 'popularity'); ?>'">
                Популярные
            </button>
            <button class="filter-tab-btn <?php echo (isset($_GET['orderby']) && $_GET['orderby'] == 'date') ? 'active' : ''; ?>"
                    onclick="window.location.href='<?php echo add_query_arg('orderby', 'date'); ?>'">
                Новинки
            </button>
            <button class="filter-tab-btn <?php echo (isset($_GET['orderby']) && $_GET['orderby'] == 'price') ? 'active' : ''; ?>"
                    onclick="window.location.href='<?php echo add_query_arg('orderby', 'price'); ?>'">
                Дешевле
            </button>
            <button class="filter-tab-btn <?php echo (isset($_GET['orderby']) && $_GET['orderby'] == 'price-desc') ? 'active' : ''; ?>"
                    onclick="window.location.href='<?php echo add_query_arg('orderby', 'price-desc'); ?>'">
                Дороже
            </button>
        </div>
    </div>
    <?php
}
