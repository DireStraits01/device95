<?php
/**
 * Template Name: About Page
 */

get_header();
?>

<!-- About Hero Section with Background -->
<section class="about-hero" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/hero.jpg');">
    <div class="hero-overlay"></div>
    <div class="hero-content">
        <h1 class="about-hero-title">О нас</h1>
        <p class="about-hero-subtitle">Device95 — Ваш надежный магазин электроники</p>
    </div>
</section>

<!-- About Content -->
<section class="about-content">
    <div class="about-container">
        
        <!-- Company Info -->
        <div class="info-card">
            <div class="info-icon">🏢</div>
            <h2 class="info-title">О компании</h2>
            <p class="info-text">
                Device95 — это магазин техники с широким ассортиментом электроники от мировых брендов по самым выгодным ценам
            </p>
        </div>
        
        <!-- Contacts Section -->
        <div class="contacts-section">
            <h2 class="section-title">Контакты</h2>
            
            <div class="contacts-grid">
                <!-- Email -->
                <div class="contact-card">
                    <div class="contact-icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div class="contact-info">
                        <h3 class="contact-title">Email</h3>
                        <a href="mailto:d3vice95@yandex.ru" class="contact-link">
                            d3vice95@yandex.ru
                        </a>
                    </div>
                </div>
                
                <!-- Phone -->
                <div class="contact-card">
                    <div class="contact-icon">
                        <i class="fas fa-phone"></i>
                    </div>
                    <div class="contact-info">
                        <h3 class="contact-title">Телефон</h3>
                        <a href="tel:+79853155959" class="contact-link">
                            +7 (985) 315-59-59
                        </a>
                    </div>
                </div>
                
                <!-- Address -->
                <div class="contact-card">
                    <div class="contact-icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div class="contact-info">
                        <h3 class="contact-title">Офис</h3>
                        <p class="contact-text">
                            г. Москва<br>
                            Сущевский Вал 5с20, N-4
                        </p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Delivery Section -->
        <div class="delivery-info-section">
            <h2 class="section-title">Доставка</h2>
            
            <div class="delivery-cards">
                <!-- Moscow Delivery -->
                <div class="delivery-info-card">
                    <div class="delivery-badge">Москва</div>
                    <h3 class="delivery-card-title">Бесплатная доставка</h3>
                    <p class="delivery-card-text">
                        Бесплатная доставка по Москве на все товары
                    </p>
                    <div class="delivery-icon-large">🚚</div>
                </div>
                
                <!-- Beyond MKAD -->
                <div class="delivery-info-card">
                    <div class="delivery-badge">За пределами МКАД</div>
                    <h3 class="delivery-card-title">Доставка до 10 км — 700₽</h3>
                    <p class="delivery-card-text">
                        Для дальнейших расстояний стоимость обговаривается индивидуально
                    </p>
                    <div class="delivery-icon-large">📍</div>
                </div>
            </div>
        </div>
        
        <!-- Warranty Section -->
        <div class="warranty-section">
            <div class="warranty-card">
                <div class="warranty-icon">✓</div>
                <h2 class="warranty-title">Гарантия качества</h2>
                <p class="warranty-text">
                    Сроки гарантийных обязательств, установленные в магазине Device95:<br>
                    <strong>На всю электронику — 12 месяцев</strong>
                </p>
            </div>
        </div>
        
    </div>
</section>

<style>
/* ========================================
   ABOUT PAGE STYLING
   ======================================== */

/* Hero Section */
.about-hero {
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    padding: 120px 20px;
    position: relative;
    min-height: 400px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.hero-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(
        135deg,
        rgba(0, 0, 0, 0.7) 0%,
        rgba(0, 0, 0, 0.5) 100%
    );
    z-index: 1;
}

.hero-content {
    position: relative;
    z-index: 2;
    text-align: center;
}

.about-hero-title {
    font-size: 64px;
    font-weight: 700;
    color: #ffffff;
    margin-bottom: 16px;
    text-shadow: 0 4px 8px rgba(0, 0, 0, 0.4);
    font-family: -apple-system, BlinkMacSystemFont, "SF Pro Display", sans-serif;
}

.about-hero-subtitle {
    font-size: 24px;
    font-weight: 500;
    color: rgba(255, 255, 255, 0.95);
    text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
}

/* Content Section */
.about-content {
    background: #f5f5f7;
    padding: 80px 20px;
}

.about-container {
    max-width: 1200px;
    margin: 0 auto;
}

/* Info Card */
.info-card {
    background: white;
    border-radius: 20px;
    padding: 48px;
    text-align: center;
    margin-bottom: 60px;
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.08);
}

.info-icon {
    font-size: 64px;
    margin-bottom: 24px;
}

.info-title {
    font-size: 36px;
    font-weight: 700;
    color: #1d1d1f;
    margin-bottom: 20px;
    font-family: -apple-system, BlinkMacSystemFont, "SF Pro Display", sans-serif;
}

.info-text {
    font-size: 20px;
    line-height: 1.6;
    color: #1d1d1f;
}

/* Section Title */
.section-title {
    font-size: 40px;
    font-weight: 700;
    color: #1d1d1f;
    text-align: center;
    margin-bottom: 48px;
    font-family: -apple-system, BlinkMacSystemFont, "SF Pro Display", sans-serif;
}

/* Contacts Section */
.contacts-section {
    margin-bottom: 60px;
}

.contacts-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 24px;
}

.contact-card {
    background: white;
    border-radius: 16px;
    padding: 32px;
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.08);
    transition: all 0.3s ease;
}

.contact-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.12);
}

.contact-icon {
    width: 64px;
    height: 64px;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border-radius: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 20px;
}

.contact-icon i {
    font-size: 28px;
    color: white;
}

.contact-title {
    font-size: 18px;
    font-weight: 600;
    color: #1d1d1f;
    margin-bottom: 8px;
}

.contact-link {
    font-size: 16px;
    font-weight: 500;
    color: #0071e3;
    text-decoration: none;
    transition: color 0.3s ease;
}

.contact-link:hover {
    color: #0077ed;
    text-decoration: underline;
}

.contact-text {
    font-size: 16px;
    color: #1d1d1f;
    line-height: 1.6;
}

/* Delivery Info Section */
.delivery-info-section {
    margin-bottom: 60px;
}

.delivery-cards {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 24px;
}

.delivery-info-card {
    background: white;
    border-radius: 20px;
    padding: 40px;
    position: relative;
    overflow: hidden;
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.08);
    transition: all 0.3s ease;
}

.delivery-info-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.12);
}

.delivery-badge {
    display: inline-block;
    padding: 8px 16px;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    border-radius: 20px;
    font-size: 14px;
    font-weight: 600;
    margin-bottom: 16px;
}

.delivery-card-title {
    font-size: 24px;
    font-weight: 700;
    color: #1d1d1f;
    margin-bottom: 12px;
}

.delivery-card-text {
    font-size: 16px;
    line-height: 1.6;
    color: #86868b;
    margin-bottom: 20px;
}

.delivery-icon-large {
    font-size: 48px;
    position: absolute;
    bottom: 20px;
    right: 30px;
    opacity: 0.3;
}

/* Warranty Section */
.warranty-section {
    margin-bottom: 40px;
}

.warranty-card {
    background: linear-gradient(135deg, #34c759 0%, #30d158 100%);
    border-radius: 20px;
    padding: 48px;
    text-align: center;
    box-shadow: 0 8px 24px rgba(52, 199, 89, 0.3);
}

.warranty-icon {
    width: 80px;
    height: 80px;
    background: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 40px;
    font-weight: 700;
    color: #34c759;
    margin: 0 auto 24px;
}

.warranty-title {
    font-size: 36px;
    font-weight: 700;
    color: white;
    margin-bottom: 16px;
    font-family: -apple-system, BlinkMacSystemFont, "SF Pro Display", sans-serif;
}

.warranty-text {
    font-size: 18px;
    line-height: 1.8;
    color: rgba(255, 255, 255, 0.95);
}

/* Responsive Design */
@media (max-width: 1024px) {
    .contacts-grid {
        grid-template-columns: repeat(2, 1fr);
    }
    
    .contacts-grid .contact-card:last-child {
        grid-column: 1 / -1;
    }
}

@media (max-width: 768px) {
    .about-hero {
        padding: 80px 20px;
        min-height: 300px;
    }
    
    .about-hero-title {
        font-size: 40px;
    }
    
    .about-hero-subtitle {
        font-size: 18px;
    }
    
    .about-content {
        padding: 60px 20px;
    }
    
    .info-card {
        padding: 32px;
    }
    
    .info-title {
        font-size: 28px;
    }
    
    .info-text {
        font-size: 16px;
    }
    
    .section-title {
        font-size: 28px;
        margin-bottom: 32px;
    }
    
    .contacts-grid,
    .delivery-cards {
        grid-template-columns: 1fr;
    }
    
    .contacts-grid .contact-card:last-child {
        grid-column: auto;
    }
    
    .contact-card {
        padding: 24px;
    }
    
    .delivery-info-card {
        padding: 32px;
    }
    
    .warranty-card {
        padding: 32px;
    }
    
    .warranty-title {
        font-size: 24px;
    }
    
    .warranty-text {
        font-size: 16px;
    }
}
</style>

<?php get_footer(); ?>