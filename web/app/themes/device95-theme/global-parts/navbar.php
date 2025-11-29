<nav class="navbar navbar-expand-lg apple-navbar fixed-top">
    <div class="container-fluid navbar-container">
        <!-- Мобильная структура -->
        <div class="mobile-header d-lg-none">
            <!-- Бренд слева -->
            <a class="navbar-brand" href="/">Device95</a>
            
            <!-- Поиск и корзина в центре -->
            <div class="mobile-icons">
                <a class="nav-link" href="/search">
                    <i class="fa-solid fa-magnifying-glass" style="color: #1d1d1f; font-size: 18px;"></i>
                </a>
                <a class="nav-link cart-icon" href="/cart">
                    <i class="fas fa-shopping-bag" style="color: #1d1d1f; font-size: 18px;"></i>
                    <span class="cart-count-badge"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
                </a>
            </div>
            
            <!-- Гамбургер кнопка справа -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        
        <!-- Основное меню -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <!-- Домик (только на десктопе) -->
                <li class="nav-item d-none d-lg-block">
                    <a class="nav-link active" aria-current="page" href="/">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5z"/>
                        </svg>
                    </a>
                </li>
                
                <!-- Apple -->
                <li class="nav-item dropdown">
                    <a class="nav-link" href="/apple" id="navbarDropdownApple" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Apple
                    </a>
                    
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownApple">
                        <li class="d-lg-none"><a class="dropdown-item" href="/apple"><strong>Все продукты Apple</strong></a></li>
                        <li class="d-lg-none"><hr class="dropdown-divider"></li>
                        
                        <li><a class="dropdown-item" href="/iphones">iPhone</a></li>
                        <li><a class="dropdown-item" href="/macbook">Macbook</a></li>
                        <li><a class="dropdown-item" href="/imac">iMac</a></li>
                        <li><a class="dropdown-item" href="/ipad">iPad</a></li>
                        <li><a class="dropdown-item" href="/airpods">AirPods</a></li>
                        <li><a class="dropdown-item" href="/apple-watch">Apple Watch</a></li>
                        <li><a class="dropdown-item" href="/accessories-apple">Аксессуары</a></li>
                    </ul>
                </li>

                <!-- Samsung -->
                <li class="nav-item dropdown">
                    <a class="nav-link" href="/samsung" id="navbarDropdownSamsung" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Samsung
                    </a>
                    
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownSamsung">
                        <li class="d-lg-none"><a class="dropdown-item" href="/samsung"><strong>Все продукты Samsung</strong></a></li>
                        <li class="d-lg-none"><hr class="dropdown-divider"></li>
                        
                        <li><a class="dropdown-item" href="/samsung-smartphones">Смартфоны</a></li>
                        <li><a class="dropdown-item" href="/samsung-notebooks">Ноутбуки</a></li>
                        <li><a class="dropdown-item" href="/samsung-tablets">Планшеты</a></li>
                        <li><a class="dropdown-item" href="/samsung-tv">Телевизоры</a></li>
                        <li><a class="dropdown-item" href="/samsung-watch">Часы</a></li>
                        <li><a class="dropdown-item" href="/samsung-headphones">Наушники</a></li>
                        <li><a class="dropdown-item" href="/samsung-accessories">Аксессуары</a></li>
                    </ul>
                </li>

                <!-- Xiaomi -->
                <li class="nav-item dropdown">
                    <a class="nav-link" href="/xiaomi" id="navbarDropdownXiaomi" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Xiaomi
                    </a>
                    
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownXiaomi">
                        <li class="d-lg-none"><a class="dropdown-item" href="/xiaomi"><strong>Все продукты Xiaomi</strong></a></li>
                        <li class="d-lg-none"><hr class="dropdown-divider"></li>
                        
                        <li><a class="dropdown-item" href="/xiaomi-smartphones">Смартфоны</a></li>
                        <li><a class="dropdown-item" href="/xiaomi-notebooks">Ноутбуки</a></li>
                        <li><a class="dropdown-item" href="/xiaomi-tv">Телевизоры</a></li>
                        <li><a class="dropdown-item" href="/xiaomi-tablets">Планшеты</a></li>
                        <li><a class="dropdown-item" href="/xiaomi-watch">Часы</a></li>
                        <li><a class="dropdown-item" href="/xiaomi-headphones">Наушники</a></li>
                        <li><a class="dropdown-item" href="/xiaomi-accessories">Аксессуары</a></li>
                    </ul>
                </li>
                
                <!-- Dyson -->
                <li class="nav-item dropdown">
                    <a class="nav-link" href="/dyson" id="navbarDropdownDyson" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Dyson
                    </a>
                    
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownDyson">
                        <li class="d-lg-none"><a class="dropdown-item" href="/dyson"><strong>Все продукты Dyson</strong></a></li>
                        <li class="d-lg-none"><hr class="dropdown-divider"></li>
                        
                        <li><a class="dropdown-item" href="/dyson-vacuum-cleaners">Пылесосы</a></li>
                        <li><a class="dropdown-item" href="/dyson-hair-dryers">Фены</a></li>
                        <li><a class="dropdown-item" href="/dyson-air-purifiers">Очистители воздуха</a></li>
                        <li><a class="dropdown-item" href="/dyson-fans">Вентиляторы</a></li>
                        <li><a class="dropdown-item" href="/dyson-hair-stylers">Стайлеры для волос</a></li>
                        <li><a class="dropdown-item" href="/dyson-accessories">Аксессуары</a></li>
                    </ul>
                </li>

                <!-- Смартфоны -->
                <li class="nav-item dropdown">
                    <a class="nav-link" href="/smartphones" id="navbarDropdownSmartphones" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Смартфоны
                    </a>
                    
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownSmartphones">
                        <li class="d-lg-none"><a class="dropdown-item" href="/smartphones"><strong>Все смартфоны</strong></a></li>
                        <li class="d-lg-none"><hr class="dropdown-divider"></li>
                        
                        <li><a class="dropdown-item" href="/iphones">Apple</a></li>
                        <li><a class="dropdown-item" href="/samsung-smartphones">Samsung</a></li>
                        <li><a class="dropdown-item" href="/xiaomi-smartphones">Xiaomi</a></li>
                        <li><a class="dropdown-item" href="/huawei">Huawei</a></li>
                        <li><a class="dropdown-item" href="/oppo">Oppo</a></li>
                        <li><a class="dropdown-item" href="/smartphones-accessories">Аксессуары</a></li>
                    </ul>
                </li>
                
                <!-- Компьютеры -->
                <li class="nav-item dropdown">
                    <a class="nav-link" href="/computers" id="navbarDropdownComputers" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Компьютеры
                    </a>
                    
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownComputers">
                        <li class="d-lg-none"><a class="dropdown-item" href="/computers"><strong>Все компьютеры</strong></a></li>
                        <li class="d-lg-none"><hr class="dropdown-divider"></li>
                        
                        <li><a class="dropdown-item" href="/laptops">Ноутбуки</a></li>
                        <li><a class="dropdown-item" href="/пк">Настольные ПК</a></li>
                        <li><a class="dropdown-item" href="/мониторы">Мониторы</a></li>
                        <li><a class="dropdown-item" href="/комплектующие">Комплектующие для ПК</a></li>
                    </ul>
                </li>

                <!-- Фото и видео -->
                <li class="nav-item dropdown">
                    <a class="nav-link" href="/photo-video" id="navbarDropdownPhoto" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Фото и видео
                    </a>
                    
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownPhoto">
                        <li class="d-lg-none"><a class="dropdown-item" href="/photo-video"><strong>Фото и видео</strong></a></li>
                        <li class="d-lg-none"><hr class="dropdown-divider"></li>
                        
                        <li><a class="dropdown-item" href="/телевизоры">Телевизоры</a></li>
                        <li><a class="dropdown-item" href="/фотоаппараты">Фотоаппараты</a></li>
                        <li><a class="dropdown-item" href="/видеокамеры">Видеокамеры</a></li>
                        <li><a class="dropdown-item" href="/проекторы">Проекторы</a></li>
                    </ul>
                </li>
                
                <!-- Аудио -->
                <li class="nav-item dropdown">
                    <a class="nav-link" href="/audio" id="navbarDropdownAudio" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Аудио
                    </a>
                    
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownAudio">
                        <li class="d-lg-none"><a class="dropdown-item" href="/audio"><strong>Все аудио</strong></a></li>
                        <li class="d-lg-none"><hr class="dropdown-divider"></li>
                        
                        <li><a class="dropdown-item" href="/наушники">Наушники</a></li>
                        <li><a class="dropdown-item" href="/колонки">Колонки</a></li>
                        <li><a class="dropdown-item" href="/саундбары">Саундбары</a></li>
                        <li><a class="dropdown-item" href="/микрофоны">Микрофоны</a></li>
                        <li><a class="dropdown-item" href="/аудиосистемы">Аудиосистемы</a></li>
                    </ul>
                </li>
                
                <!-- Гаджеты -->
                <li class="nav-item dropdown">
                    <a class="nav-link" href="/gadgets" id="navbarDropdownGadgets" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Гаджеты
                    </a>
                    
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownGadgets">
                        <li class="d-lg-none"><a class="dropdown-item" href="/gadgets"><strong>Все гаджеты</strong></a></li>
                        <li class="d-lg-none"><hr class="dropdown-divider"></li>
                        
                        <li><a class="dropdown-item" href="/умные-часы">Умные часы</a></li>
                        <li><a class="dropdown-item" href="/планшеты">Планшеты</a></li>
                        <li><a class="dropdown-item" href="/игровые-консоли">Игровые консоли</a></li>
                        <li><a class="dropdown-item" href="/vr-устройства">VR-устройства</a></li>
                        <li><a class="dropdown-item" href="/повербанки">Повербанки</a></li>
                    </ul>
                </li>
                
                <!-- Техника для дома -->
                <li class="nav-item dropdown">
                    <a class="nav-link" href="/home-appliances" id="navbarDropdownHome" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Техника для дома
                    </a>
                    
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownHome">
                        <li class="d-lg-none"><a class="dropdown-item" href="/home-appliances"><strong>Вся техника для дома</strong></a></li>
                        <li class="d-lg-none"><hr class="dropdown-divider"></li>
                        
                        <li><a class="dropdown-item" href="/кофемашины">Кофемашины</a></li>
                        <li><a class="dropdown-item" href="/пылесосы">Пылесосы</a></li>
                        <li><a class="dropdown-item" href="/фены">Фены</a></li>
                        <li><a class="dropdown-item" href="/кухонная-техника">Кухонная техника</a></li>
                    </ul>
                </li>
                
                <!-- Поиск и корзина только на десктопе -->
                <li class="nav-item d-none d-lg-block">
                    <a class="nav-link" href="/search">
                        <i class="fas fa-magnifying-glass" style="color: #1d1d1f; font-size: 18px;"></i>
                    </a>
                </li>
                <li class="nav-item d-none d-lg-block">
                    <a class="nav-link" href="/cart">
                        <i class="fas fa-shopping-bag" style="color: #1d1d1f; font-size: 18px;"></i>
                        <span class="cart-count-badge"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
