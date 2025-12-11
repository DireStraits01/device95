<?php
/**
 * Page Configuration
 * File: inc/page-config.php
 */

function get_page_config() {
    return array(
        // ========================================
        // APPLE PRODUCTS
        // ========================================
        
        // Level 1: All Apple products
        'apple' => array(
            'category' => 'apple',
            'title' => 'Продукция Apple',
            'description' => 'Вся техника Apple в одном месте',
            'include_children' => true
        ),
        
        // Level 2: Specific Apple products
        'iphones' => array(
            'category' => 'iphones',
            'title' => 'iPhone',
            'description' => 'Смартфоны Apple последнего поколения',
            'include_children' => false
        ),
        'macbooks' => array(
            'category' => 'macbooks',
            'title' => 'MacBook',
            'description' => 'Ноутбуки Apple для работы и творчества',
            'include_children' => false
        ),
        'imac' => array(
            'category' => 'imac',
            'title' => 'iMac',
            'description' => 'Моноблоки Apple для профессионалов',
            'include_children' => false
        ),
        'ipad' => array(
            'category' => 'ipad',
            'title' => 'iPad',
            'description' => 'Планшеты Apple для работы и развлечений',
            'include_children' => false
        ),
        'airpods' => array(
            'category' => 'airpods',
            'title' => 'AirPods',
            'description' => 'Беспроводные наушники от Apple',
            'include_children' => false
        ),
        'apple-watch' => array(
            'category' => 'apple-watch',
            'title' => 'Apple Watch',
            'description' => 'Умные часы для здоровья и фитнеса',
            'include_children' => false
        ),
        'accessories-apple' => array(
            'category' => 'accessories-apple',
            'title' => 'Аксессуары Apple',
            'description' => 'Оригинальные аксессуары для техники Apple',
            'include_children' => false
        ),
        
        // ========================================
        // SAMSUNG PRODUCTS
        // ========================================
        
        // Level 1: All Samsung products
        'samsung' => array(
            'category' => 'samsung',
            'title' => 'Продукция Samsung',
            'description' => 'Вся техника Samsung в одном месте',
            'include_children' => true
        ),
        
        // Level 2: Specific Samsung products
        'samsung-smartphones' => array(
            'category' => 'samsung-smartphones',
            'title' => 'Samsung Смартфоны',
            'description' => 'Смартфоны Galaxy от Samsung',
            'include_children' => false
        ),
        'samsung-laptops' => array(
            'category' => 'samsung-laptops',
            'title' => 'Samsung Ноутбуки',
            'description' => 'Ноутбуки Galaxy Book от Samsung',
            'include_children' => false
        ),
        'samsung-tablets' => array(
            'category' => 'samsung-tablets',
            'title' => 'Samsung Планшеты',
            'description' => 'Планшеты Galaxy Tab от Samsung',
            'include_children' => false
        ),
        'samsung-tv' => array(
            'category' => 'samsung-tv',
            'title' => 'Samsung Телевизоры',
            'description' => 'Телевизоры Samsung с технологией QLED',
            'include_children' => false
        ),
        'samsung-watch' => array(
            'category' => 'samsung-watch',
            'title' => 'Samsung Часы',
            'description' => 'Умные часы Galaxy Watch',
            'include_children' => false
        ),
        'samsung-headphones' => array(
            'category' => 'samsung-headphones',
            'title' => 'Samsung Наушники',
            'description' => 'Наушники Galaxy Buds от Samsung',
            'include_children' => false
        ),
        'samsung-accessories' => array(
            'category' => 'samsung-accessories',
            'title' => 'Samsung Аксессуары',
            'description' => 'Оригинальные аксессуары Samsung',
            'include_children' => false
        ),
        
        // ========================================
        // XIAOMI PRODUCTS
        // ========================================
        
        // Level 1: All Xiaomi products
        'xiaomi' => array(
            'category' => 'xiaomi',
            'title' => 'Продукция Xiaomi',
            'description' => 'Вся техника Xiaomi в одном месте',
            'include_children' => true
        ),
        
        // Level 2: Specific Xiaomi products
        'xiaomi-smartphones' => array(
            'category' => 'xiaomi-smartphones',
            'title' => 'Xiaomi Смартфоны',
            'description' => 'Смартфоны от Xiaomi и Redmi',
            'include_children' => false
        ),
        'xiaomi-laptops' => array(
            'category' => 'xiaomi-laptops',
            'title' => 'Xiaomi Ноутбуки',
            'description' => 'Ноутбуки Xiaomi для работы и учебы',
            'include_children' => false
        ),
        'xiaomi-tv' => array(
            'category' => 'xiaomi-tv',
            'title' => 'Xiaomi Телевизоры',
            'description' => 'Умные телевизоры Xiaomi',
            'include_children' => false
        ),
        'xiaomi-tablets' => array(
            'category' => 'xiaomi-tablets',
            'title' => 'Xiaomi Планшеты',
            'description' => 'Планшеты Xiaomi Pad',
            'include_children' => false
        ),
        'xiaomi-watch' => array(
            'category' => 'xiaomi-watch',
            'title' => 'Xiaomi Часы',
            'description' => 'Умные часы и фитнес-браслеты Xiaomi',
            'include_children' => false
        ),
        'xiaomi-headphones' => array(
            'category' => 'xiaomi-headphones',
            'title' => 'Xiaomi Наушники',
            'description' => 'Наушники и гарнитуры Xiaomi',
            'include_children' => false
        ),
        'xiaomi-accessories' => array(
            'category' => 'xiaomi-accessories',
            'title' => 'Xiaomi Аксессуары',
            'description' => 'Аксессуары и умные устройства Xiaomi',
            'include_children' => false
        ),
        
        // ========================================
        // DYSON PRODUCTS
        // ========================================
        
        // Level 1: All Dyson products
        'dyson' => array(
            'category' => 'dyson',
            'title' => 'Продукция Dyson',
            'description' => 'Вся техника Dyson в одном месте',
            'include_children' => true
        ),
        
        // Level 2: Specific Dyson products
        'dyson-vacuum-cleaners' => array(
            'category' => 'dyson-vacuum-cleaners',
            'title' => 'Dyson Пылесосы',
            'description' => 'Беспроводные пылесосы Dyson',
            'include_children' => false
        ),
        'dyson-hair-dryers' => array(
            'category' => 'dyson-hair-dryers',
            'title' => 'Dyson Фены',
            'description' => 'Профессиональные фены Dyson Supersonic',
            'include_children' => false
        ),
        'dyson-air-purifiers' => array(
            'category' => 'dyson-air-purifiers',
            'title' => 'Dyson Очистители воздуха',
            'description' => 'Очистители и увлажнители воздуха Dyson',
            'include_children' => false
        ),
        'dyson-fans' => array(
            'category' => 'dyson-fans',
            'title' => 'Dyson Вентиляторы',
            'description' => 'Вентиляторы и обогреватели Dyson',
            'include_children' => false
        ),
        'dyson-hair-stylers' => array(
            'category' => 'dyson-hair-stylers',
            'title' => 'Dyson Стайлеры',
            'description' => 'Стайлеры Dyson Airwrap для волос',
            'include_children' => false
        ),
        'dyson-accessories' => array(
            'category' => 'dyson-accessories',
            'title' => 'Dyson Аксессуары',
            'description' => 'Насадки и аксессуары для техники Dyson',
            'include_children' => false
        ),
        
        // ========================================
        // COMPUTERS & COMPONENTS
        // ========================================
        
        // Level 1: All computers
        'computers' => array(
            'category' => 'computers',
            'title' => 'Компьютеры',
            'description' => 'Ноутбуки, ПК, мониторы и комплектующие',
            'include_children' => true
        ),
        
        // Level 2: Laptops (includes all brands)
        'laptops' => array(
            'category' => 'laptops',
            'title' => 'Ноутбуки',
            'description' => 'Ноутбуки от ведущих производителей',
            'include_children' => true  // Shows MacBook, Samsung, Xiaomi
        ),
        
        // Level 2: Desktop PCs
        'desktop-pc' => array(
            'category' => 'desktop-pc',
            'title' => 'Настольные ПК',
            'description' => 'Компьютеры для дома и офиса',
            'include_children' => true
        ),
        
        // Level 2: Monitors
        'monitors' => array(
            'category' => 'monitors',
            'title' => 'Мониторы',
            'description' => 'Мониторы для работы и игр',
            'include_children' => true
        ),
        
        // Level 2: Components
        'components' => array(
            'category' => 'components',
            'title' => 'Комплектующие',
            'description' => 'Комплектующие для сборки ПК',
            'include_children' => true
        ),
        
        // ========================================
        // SMARTPHONES (All brands)
        // ========================================
        
        'smartphones' => array(
            'category' => 'smartphones',
            'title' => 'Смартфоны',
            'description' => 'Смартфоны от всех производителей',
            'include_children' => true
        ),
        
        // Other smartphone brands
        'huawei' => array(
            'category' => 'huawei',
            'title' => 'Huawei',
            'description' => 'Смартфоны Huawei',
            'include_children' => false
        ),
        'oppo' => array(
            'category' => 'oppo',
            'title' => 'Oppo',
            'description' => 'Смартфоны Oppo',
            'include_children' => false
        ),
        'smartphones-accessories' => array(
            'category' => 'smartphones-accessories',
            'title' => 'Аксессуары для смартфонов',
            'description' => 'Чехлы, защитные стекла и аксессуары',
            'include_children' => false
        ),
        'smartphones-other-brands' => array(
            'category' => 'smartphones-other-brands',
            'title' => 'Смартфоны разных брендов',
            'description' => 'Чехлы, защитные стекла и аксессуары',
            'include_children' => false
        ),
        
        // ========================================
        // PHOTO & VIDEO
        // ========================================
        
        'photo-video' => array(
            'category' => 'photo-video',
            'title' => 'Фото и видео',
            'description' => 'Камеры, телевизоры и видеотехника',
            'include_children' => true
        ),
        'cameras' => array(
            'category' => 'cameras',
            'title' => 'Фотоаппараты',
            'description' => 'Фотоаппараты и объективы',
            'include_children' => false
        ),
        'video-cameras' => array(
            'category' => 'video-cameras',
            'title' => 'Видеокамеры',
            'description' => 'Видеокамеры и экшн-камеры',
            'include_children' => false
        ),
        'tvs' => array(
            'category' => 'tvs',
            'title' => 'Телевизоры',
            'description' => 'Телевизоры всех брендов',
            'include_children' => true
        ),
        'projectors' => array(
            'category' => 'projectors',
            'title' => 'Проекторы',
            'description' => 'Проекторы для дома и офиса',
            'include_children' => false
        ),
        
        // ========================================
        // AUDIO
        // ========================================
        
        'audio' => array(
            'category' => 'audio',
            'title' => 'Аудио',
            'description' => 'Наушники, колонки и аудиосистемы',
            'include_children' => true
        ),
        'headphones' => array(
            'category' => 'headphones',
            'title' => 'Наушники',
            'description' => 'Наушники всех брендов',
            'include_children' => true
        ),
        'speakers' => array(
            'category' => 'speakers',
            'title' => 'Колонки',
            'description' => 'Портативные и домашние колонки',
            'include_children' => false
        ),
        'soundbars' => array(
            'category' => 'soundbars',
            'title' => 'Саундбары',
            'description' => 'Саундбары для домашнего кинотеатра',
            'include_children' => false
        ),
        'microphones' => array(
            'category' => 'microphones',
            'title' => 'Микрофоны',
            'description' => 'Микрофоны для стриминга и записи',
            'include_children' => false
        ),
        'audio-systems' => array(
            'category' => 'audio-systems',
            'title' => 'Аудиосистемы',
            'description' => 'Акустические системы Hi-Fi',
            'include_children' => false
        ),
        
        // ========================================
        // GADGETS
        // ========================================
        
        'gadgets' => array(
            'category' => 'gadgets',
            'title' => 'Гаджеты',
            'description' => 'Умные часы, планшеты и другие гаджеты',
            'include_children' => true
        ),
        'smart-watches' => array(
            'category' => 'smart-watches',
            'title' => 'Умные часы',
            'description' => 'Умные часы всех брендов',
            'include_children' => true
        ),
        'tablets' => array(
            'category' => 'tablets',
            'title' => 'Планшеты',
            'description' => 'Планшеты всех производителей',
            'include_children' => true
        ),
        'gaming-consoles' => array(
            'category' => 'gaming-consoles',
            'title' => 'Игровые консоли',
            'description' => 'PlayStation, Xbox, Nintendo',
            'include_children' => false
        ),
        'vr-devices' => array(
            'category' => 'vr-devices',
            'title' => 'VR-устройства',
            'description' => 'Устройства виртуальной реальности',
            'include_children' => false
        ),
        'powerbanks' => array(
            'category' => 'powerbanks',
            'title' => 'Повербанки',
            'description' => 'Портативные зарядные устройства',
            'include_children' => false
        ),
        
        // ========================================
        // HOME APPLIANCES
        // ========================================
        
        'home-appliances' => array(
            'category' => 'home-appliances',
            'title' => 'Техника для дома',
            'description' => 'Бытовая техника для дома',
            'include_children' => true
        ),
        'coffee-machines' => array(
            'category' => 'coffee-machines',
            'title' => 'Кофемашины',
            'description' => 'Кофемашины и кофеварки',
            'include_children' => false
        ),
        'vacuum-cleaners' => array(
            'category' => 'vacuum-cleaners',
            'title' => 'Пылесосы',
            'description' => 'Пылесосы всех типов',
            'include_children' => true
        ),
        'hair-dryers' => array(
            'category' => 'hair-dryers',
            'title' => 'Фены',
            'description' => 'Фены для волос',
            'include_children' => true
        ),
        'kitchen-appliances' => array(
            'category' => 'kitchen-appliances',
            'title' => 'Кухонная техника',
            'description' => 'Техника для кухни',
            'include_children' => true
        ),
    );
}
?>