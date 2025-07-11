<?php
/**
 * Enqueue theme scripts and styles
 */

function propertynest_enqueue_assets() {
    $theme_version = wp_get_theme()->get('Version');

    // Google Fonts
    wp_enqueue_style('propertynest-google-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;700&family=Poppins:wght@400;600;700&display=swap', false);

    // Theme main stylesheet
    wp_enqueue_style('propertynest-style', get_stylesheet_uri(), [], $theme_version);

    // Theme custom stylesheet (optional)
    wp_enqueue_style('propertynest-main', get_template_directory_uri() . '/assets/css/main.css', [], $theme_version);

    // Scripts
    wp_enqueue_script('propertynest-scripts', get_template_directory_uri() . '/assets/js/main.js', ['jquery'], $theme_version, true);

    // WooCommerce support styles
    if (class_exists('WooCommerce')) {
        wp_enqueue_style('propertynest-woocommerce', get_template_directory_uri() . '/assets/css/woocommerce.css', [], $theme_version);
    }

    // Revolution Slider check
    if (function_exists('rev_slider_shortcode')) {
        wp_enqueue_style('propertynest-revslider', get_template_directory_uri() . '/assets/css/revslider.css', [], $theme_version);
    }
}
add_action('wp_enqueue_scripts', 'propertynest_enqueue_assets');
