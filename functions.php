<?php
/**
 * PropertyNest functions and definitions
 */

define('PROPERTYNEST_VERSION', '1.0.0');

// Load required files
require_once get_template_directory() . '/inc/enqueue.php';
require_once get_template_directory() . '/inc/theme-options.php';
require_once get_template_directory() . '/inc/custom-post-types.php';
require_once get_template_directory() . '/inc/woocommerce.php';
require_once get_template_directory() . '/inc/tgmpa.php';

// Theme setup
function propertynest_setup() {
    // Translation ready
    load_theme_textdomain('propertynest', get_template_directory() . '/languages');

    // Theme support
    add_theme_support('automatic-feed-links');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
    add_theme_support('woocommerce');
    add_theme_support('html5', ['search-form', 'comment-form', 'comment-list', 'gallery', 'caption']);
    add_theme_support('align-wide');

    // Register menus
    register_nav_menus([
        'primary' => __('Primary Menu', 'propertynest'),
        'footer'  => __('Footer Menu', 'propertynest'),
    ]);
}
add_action('after_setup_theme', 'propertynest_setup');

// Elementor support
function propertynest_elementor_support() {
    add_theme_support('elementor');
}
add_action('after_setup_theme', 'propertynest_elementor_support');

// Register widget areas
function propertynest_widgets_init() {
    register_sidebar([
        'name'          => __('Sidebar', 'propertynest'),
        'id'            => 'sidebar-1',
        'description'   => __('Add widgets here.', 'propertynest'),
        'before_widget' => '<section class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ]);
}
add_action('widgets_init', 'propertynest_widgets_init');

// Disable emoji script
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

// Register ACF Options Page
if (function_exists('acf_add_options_page')) {
    acf_add_options_page([
        'page_title' => 'Theme Settings',
        'menu_title' => 'Theme Settings',
        'menu_slug'  => 'theme-settings',
        'capability' => 'edit_posts',
        'redirect'   => false
    ]);
}
