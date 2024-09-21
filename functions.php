<?php
function react_mimic_theme_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    register_nav_menus( array(
        'primary' => esc_html__( 'Primary Menu', 'react-mimic-theme' ),
    ) );
}
add_action( 'after_setup_theme', 'react_mimic_theme_setup' );

function react_mimic_theme_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'react-mimic-theme' ),
        'id'            => 'sidebar-1',
        'description'   => esc_html__( 'Add widgets here.', 'react-mimic-theme' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'react_mimic_theme_widgets_init' );

function react_mimic_theme_scripts() {
    wp_enqueue_style( 'react-mimic-theme-style', get_stylesheet_uri() );
    wp_enqueue_style( 'bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' );
}
add_action( 'wp_enqueue_scripts', 'react_mimic_theme_scripts' );
