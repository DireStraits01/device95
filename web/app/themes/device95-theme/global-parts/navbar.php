<!-- Top Bar with Home, Burger, Search, Orders, Cart -->
<div class="sticky-top-bar">
    <div class="top-bar-container">
        <button class="burger-menu-btn" id="burgerMenuBtn">
            <span class="burger-line"></span>
            <span class="burger-line"></span>
            <span class="burger-line"></span>
        </button>
        
        <!-- Search Field -->
        <div class="top-bar-search">
            <?php echo do_shortcode('[fibosearch]'); ?>
        </div>
        
        <!-- Home Icon -->
        <a href="<?php echo home_url('/'); ?>" class="top-bar-icon hide-icon">
            <i class="fa-solid fa-house"></i>
            <span class="icon-label">главаня</span>
        </a>

        <!-- Orders Link -->
        <a href="<?php echo home_url('/track-order'); ?>" class="top-bar-icon">
            <i class="fas fa-box"></i>
            <span class="icon-label">заказы</span>
        </a>
        
        <!-- Cart Icon -->
        <a href="<?php echo wc_get_cart_url(); ?>" class="top-bar-icon cart-icon">
            <i class="fas fa-shopping-bag"></i>
            <span class="cart-count-badge"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
            <span class="icon-label">Корзина</span>
        </a>

        <a href="/about" class="top-bar-icon hide-icon">
            <i class="fas fa-info-circle"></i>
            <span class="icon-label">О нас</span>
        </a>
    </div>
</div>

<!-- Desktop Horizontal Menu (Below top bar) -->
<div class="desktop-menu" id="desktopMenu">
    <div class="desktop-menu-container">
        <nav class="desktop-nav">
            <ul>
                <!-- Apple -->
                <li class="has-submenu">
                    <a href="/apple">Apple</a>
                    <ul class="submenu">
                        <li><a href="/iphones">iPhone</a></li>
                        <li><a href="/macbooks">Macbook</a></li>
                        <li><a href="/imac">iMac</a></li>
                        <li><a href="/ipads">iPad</a></li>
                        <li><a href="/airpods">AirPods</a></li>
                        <li><a href="/apple-watches">Apple Watch</a></li>
                        <li><a href="/accessories-apple">Аксессуары</a></li>
                    </ul>
                </li>
                
                <!-- Samsung -->
                <li class="has-submenu">
                    <a href="/samsung">Samsung</a>
                    <ul class="submenu">
                        <li><a href="/samsung-smartphones">Смартфоны</a></li>
                        <li><a href="/samsung-notebooks">Ноутбуки</a></li>
                        <li><a href="/samsung-tablets">Планшеты</a></li>
                        <li><a href="/samsung-tv">Телевизоры</a></li>
                        <li><a href="/samsung-watch">Часы</a></li>
                        <li><a href="/samsung-headphones">Наушники</a></li>
                        <li><a href="/samsung-accessories">Аксессуары</a></li>
                    </ul>
                </li>
                
                <!-- Xiaomi -->
                <li class="has-submenu">
                    <a href="/xiaomi">Xiaomi</a>
                    <ul class="submenu">
                        <li><a href="/xiaomi-smartphones">Смартфоны</a></li>
                        <li><a href="/xiaomi-notebooks">Ноутбуки</a></li>
                        <li><a href="/xiaomi-tv">Телевизоры</a></li>
                        <li><a href="/xiaomi-tablets">Планшеты</a></li>
                        <li><a href="/xiaomi-watch">Часы</a></li>
                        <li><a href="/xiaomi-headphones">Наушники</a></li>
                        <li><a href="/xiaomi-accessories">Аксессуары</a></li>
                    </ul>
                </li>
                
                <!-- Dyson -->
                <li class="has-submenu">
                    <a href="/dyson">Dyson</a>
                    <ul class="submenu">
                        <li><a href="/dyson-vacuum-cleaners">Пылесосы</a></li>
                        <li><a href="/dyson-hair-dryers">Фены</a></li>
                        <li><a href="/dyson-air-purifiers">Очистители воздуха</a></li>
                        <li><a href="/dyson-fans">Вентиляторы</a></li>
                        <li><a href="/dyson-hair-stylers">Стайлеры для волос</a></li>
                        <li><a href="/dyson-accessories">Аксессуары</a></li>
                    </ul>
                </li>
                
                <!-- Смартфоны -->
                <li class="has-submenu">
                    <a href="/smartphones">Смартфоны</a>
                    <ul class="submenu">
                        <li><a href="/iphones">Apple</a></li>
                        <li><a href="/samsung-smartphones">Samsung</a></li>
                        <li><a href="/xiaomi-smartphones">Xiaomi</a></li>
                        <li><a href="/huawei">Huawei</a></li>
                        <li><a href="/oppo">Oppo</a></li>
                        <li><a href="/smartphones-other-brands">Остальные бренды</a></li>
                        <li><a href="/smartphones-accessories">Аксессуары</a></li>
                    </ul>
                </li>
                
                <!-- Компьютеры -->
                <li class="has-submenu">
                    <a href="/computers">Компьютеры</a>
                    <ul class="submenu">
                        <li><a href="/laptops">Ноутбуки</a></li>
                        <li><a href="/пк">Настольные ПК</a></li>
                        <li><a href="/мониторы">Мониторы</a></li>
                        <li><a href="/комплектующие">Комплектующие</a></li>
                    </ul>
                </li>
                
                <!-- Фото и видео -->
                <li class="has-submenu">
                    <a href="/photo-video">Фото и видео</a>
                    <ul class="submenu">
                        <li><a href="/телевизоры">Телевизоры</a></li>
                        <li><a href="/фотоаппараты">Фотоаппараты</a></li>
                        <li><a href="/видеокамеры">Видеокамеры</a></li>
                        <li><a href="/проекторы">Проекторы</a></li>
                    </ul>
                </li>
                
                <!-- Аудио -->
                <li class="has-submenu">
                    <a href="/audio">Аудио</a>
                    <ul class="submenu">
                        <li><a href="/audio/наушники">Наушники</a></li>
                        <li><a href="/audio/колонки">Колонки</a></li>
                        <li><a href="/audio/саундбары">Саундбары</a></li>
                        <li><a href="/audio/микрофоны">Микрофоны</a></li>
                        <li><a href="/audio/аудиосистемы">Аудиосистемы</a></li>
                    </ul>
                </li>
                
                <!-- Гаджеты -->
                <li class="has-submenu">
                    <a href="/gadgets">Гаджеты</a>
                    <ul class="submenu">
                        <li><a href="/gadgets/умные-часы">Умные часы</a></li>
                        <li><a href="/gadgets/планшеты">Планшеты</a></li>
                        <li><a href="/gadgets/игровые-консоли">Игровые консоли</a></li>
                        <li><a href="/gadgets/vr-устройства">VR-устройства</a></li>
                        <li><a href="/gadgets/повербанки">Повербанки</a></li>
                    </ul>
                </li>
                
                <!-- Техника для дома -->
                <li class="has-submenu">
                    <a href="/home-appliances">Техника для дома</a>
                    <ul class="submenu">
                        <li><a href="/home-appliances/кофемашины">Кофемашины</a></li>
                        <li><a href="/home-appliances/пылесосы">Пылесосы</a></li>
                        <li><a href="/home-appliances/фены">Фены</a></li>
                        <li><a href="/home-appliances/кухонная-техника">Кухонная техника</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</div>

<!-- Mobile Fullscreen Menu -->
<div class="mobile-fullscreen-menu" id="mobileMenu">
    <div class="mobile-menu-content">
        <nav class="mobile-nav">
            <ul>
                <li><a href="/">Главная</a></li>
                <!-- Apple -->
                <li class="has-submenu">
                    <a href="/apple">Apple <i class="fas fa-chevron-down"></i></a>
                    <ul class="submenu">
                        <li><a href="/iphones">iPhone</a></li>
                        <li><a href="/macbook">Macbook</a></li>
                        <li><a href="/imac">iMac</a></li>
                        <li><a href="/ipad">iPad</a></li>
                        <li><a href="/airpods">AirPods</a></li>
                        <li><a href="/apple-watch">Apple Watch</a></li>
                        <li><a href="/accessories-apple">Аксессуары</a></li>
                    </ul>
                </li>
                
                <!-- Samsung -->
                <li class="has-submenu">
                    <a href="/samsung">Samsung <i class="fas fa-chevron-down"></i></a>
                    <ul class="submenu">
                        <li><a href="/samsung-smartphones">Смартфоны</a></li>
                        <li><a href="/samsung-laptops">Ноутбуки</a></li>
                        <li><a href="/samsung-tablets">Планшеты</a></li>
                        <li><a href="/samsung-tv">Телевизоры</a></li>
                        <li><a href="/samsung-watches">Часы</a></li>
                        <li><a href="/samsung-headphones">Наушники</a></li>
                        <li><a href="/samsung-accessories">Аксессуары</a></li>
                    </ul>
                </li>
                
                <!-- Xiaomi -->
                <li class="has-submenu">
                    <a href="/xiaomi">Xiaomi <i class="fas fa-chevron-down"></i></a>
                    <ul class="submenu">
                        <li><a href="/xiaomi-smartphones">Смартфоны</a></li>
                        <li><a href="/xiaomi-laptops">Ноутбуки</a></li>
                        <li><a href="/xiaomi-tv">Телевизоры</a></li>
                        <li><a href="/xiaomi-tablets">Планшеты</a></li>
                        <li><a href="/xiaom-watches">Часы</a></li>
                        <li><a href="/xiaomi-headphones">Наушники</a></li>
                        <li><a href="/xiaomi-accessories">Аксессуары</a></li>
                    </ul>
                </li>
                
                <!-- Dyson -->
                <li class="has-submenu">
                    <a href="/dyson">Dyson <i class="fas fa-chevron-down"></i></a>
                    <ul class="submenu">
                        <li><a href="/dyson-vacuum-cleaners">Пылесосы</a></li>
                        <li><a href="/dyson-hair-dryers">Фены</a></li>
                        <li><a href="/dyson-air-purifiers">Очистители воздуха</a></li>
                        <li><a href="/dyson-fans">Вентиляторы</a></li>
                        <li><a href="/dyson-hair-stylers">Стайлеры для волос</a></li>
                        <li><a href="/dyson-accessories">Аксессуары</a></li>
                    </ul>
                </li>
                
                <!-- Смартфоны -->
                <li class="has-submenu">
                    <a href="/smartphones">Смартфоны <i class="fas fa-chevron-down"></i></a>
                    <ul class="submenu">
                        <li><a href="/iphones-smartphones">Apple</a></li>
                        <li><a href="/samsung-smartphones">Samsung</a></li>
                        <li><a href="/xiaomi-smartphones">Xiaomi</a></li>
                        <li><a href="/huawei-smartphones">Huawei</a></li>
                        <li><a href="/oppo-smartphones">Oppo</a></li>
                         <li><a href="/other-smartphones">Остальные бренды</a></li>
                        <li><a href="/smartphones/smartphones-accessories">Аксессуары</a></li>
                    </ul>
                </li>
                
                <!-- Компьютеры -->
                <li class="has-submenu">
                    <a href="/computers">Компьютеры <i class="fas fa-chevron-down"></i></a>
                    <ul class="submenu">
                        <li><a href="/laptops">Ноутбуки</a></li>
                        <li><a href="/pc">Настольные ПК</a></li>
                        <li><a href="/monitors">Мониторы</a></li>
                        <li><a href="/components">Комплектующие</a></li>
                    </ul>
                </li>
                
                <!-- Фото и видео -->
                <li class="has-submenu">
                    <a href="/photo-video">Фото и видео <i class="fas fa-chevron-down"></i></a>
                    <ul class="submenu">
                        <li><a href="/tv">Телевизоры</a></li>
                        <li><a href="/cameras">Фотоаппараты</a></li>
                        <li><a href="/video-cameras">Видеокамеры</a></li>
                        <li><a href="/projectors">Проекторы</a></li>
                    </ul>
                </li>
                
                <!-- Аудио -->
                <li class="has-submenu">
                    <a href="/audio">Аудио <i class="fas fa-chevron-down"></i></a>
                    <ul class="submenu">
                        <li><a href="/headphones">Наушники</a></li>
                        <li><a href="/speakers">Колонки</a></li>
                        <li><a href="/audio-systems">Аудиосистемы</a></li>
                    </ul>
                </li>
                
                <!-- Гаджеты -->
                <li class="has-submenu">
                    <a href="/gadgets">Гаджеты <i class="fas fa-chevron-down"></i></a>
                    <ul class="submenu">
                        <li><a href="/smart-watches">Умные часы</a></li>
                        <li><a href="/tablets">Планшеты</a></li>
                        <li><a href="/game-consoles">Игровые консоли</a></li>
                        <li><a href="/vr-devices">VR-устройства</a></li>
                        <li><a href="/powerbanks">Повербанки</a></li>
                    </ul>
                </li>
                
                <!-- Техника для дома -->
                <li class="has-submenu">
                    <a href="/home-appliances">Техника для дома <i class="fas fa-chevron-down"></i></a>
                    <ul class="submenu">
                        <li><a href="/coffee-machines">Кофемашины</a></li>
                        <li><a href="/vacuum-cleaners">Пылесосы</a></li>
                        <li><a href="/hair-dryers">Фены</a></li>
                        <li><a href="/kitchen-appliances">Кухонная техника</a></li>
                    </ul>
                </li>
                 <li><a href="/about">О нас</a></li>
            </ul>
        </nav>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const burgerBtn = document.getElementById('burgerMenuBtn');
    const desktopMenu = document.getElementById('desktopMenu');
    const mobileMenu = document.getElementById('mobileMenu');
    
    // Toggle menu based on screen size
    burgerBtn.addEventListener('click', function() {
        this.classList.toggle('active');
        
        if (window.innerWidth <= 768) {
            // Mobile: show fullscreen menu
            mobileMenu.classList.toggle('active');
            document.body.classList.toggle('menu-open');
        } else {
            // Desktop: show horizontal menu
            desktopMenu.classList.toggle('active');
        }
    });
    
    // Mobile submenu toggle
    const mobileSubmenuToggles = document.querySelectorAll('.mobile-nav .has-submenu > a');
    mobileSubmenuToggles.forEach(item => {
        item.addEventListener('click', function(e) {
            e.preventDefault();
            this.parentElement.classList.toggle('active');
        });
    });
    
    // Close mobile menu on outside click
    mobileMenu.addEventListener('click', function(e) {
        if (e.target === this) {
            burgerBtn.classList.remove('active');
            this.classList.remove('active');
            document.body.classList.remove('menu-open');
        }
    });
    
    // Handle window resize
    let wasDesktop = window.innerWidth > 768;
    window.addEventListener('resize', function() {
        const isDesktop = window.innerWidth > 768;
        
        if (wasDesktop !== isDesktop) {
            // Close all menus when switching between mobile/desktop
            burgerBtn.classList.remove('active');
            desktopMenu.classList.remove('active');
            mobileMenu.classList.remove('active');
            document.body.classList.remove('menu-open');
        }
        
        wasDesktop = isDesktop;
    });
});
</script>
