<?php /* Template Name: iPhones Page */
get_header(); ?>

<div class="container" style="max-width: 1200px; margin: 0 auto; padding: 40px 20px;">
    <div style="text-align: center; margin-bottom: 60px;">
        <h1 style="font-size: 48px; font-weight: 600; color: #1d1d1f; margin-bottom: 16px;">Телефоны Apple</h1>
        <p style="color: #86868b; font-size: 16px;">Выберите свой идеальный iPhone</p>
    </div>
    
    <div class="row">
        <!-- Filter on Left Side -->
        <div class="col-md-3">
            <div class="filters-sidebar" style="background: rgba(251, 251, 253, 0.8); backdrop-filter: saturate(180%) blur(20px); border: 1px solid rgba(0, 0, 0, 0.1); border-radius: 18px; padding: 20px; margin-bottom: 20px;">
                <h3 style="color: #1d1d1f; font-size: 18px; font-weight: 600; margin-bottom: 16px;">Фильтры</h3>
                <?php echo do_shortcode('[wpf-filters id=4]'); ?>
            </div>
        </div>
        
        <!-- Products on Right Side -->
        <div class="col-md-9">
            <?php echo do_shortcode('[products category="iphones" limit="8" columns="3"]'); ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>