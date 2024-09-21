<?php
/**
 * React Mimic Theme Customizer
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function react_mimic_theme_customize_register( $wp_customize ) {
    $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

    if ( isset( $wp_customize->selective_refresh ) ) {
        $wp_customize->selective_refresh->add_partial(
            'blogname',
            array(
                'selector'        => '.site-title a',
                'render_callback' => 'react_mimic_theme_customize_partial_blogname',
            )
        );
        $wp_customize->selective_refresh->add_partial(
            'blogdescription',
            array(
                'selector'        => '.site-description',
                'render_callback' => 'react_mimic_theme_customize_partial_blogdescription',
            )
        );
    }

    // Add a new section for theme options
    $wp_customize->add_section(
        'react_mimic_theme_options',
        array(
            'title'    => __( 'Theme Options', 'react-mimic-theme' ),
            'priority' => 130,
        )
    );

    // Add a color picker setting for the primary color
    $wp_customize->add_setting(
        'primary_color',
        array(
            'default'           => '#0073aa',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'primary_color',
            array(
                'label'    => __( 'Primary Color', 'react-mimic-theme' ),
                'section'  => 'react_mimic_theme_options',
                'settings' => 'primary_color',
            )
        )
    );
}
add_action( 'customize_register', 'react_mimic_theme_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function react_mimic_theme_customize_partial_blogname() {
    bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function react_mimic_theme_customize_partial_blogdescription() {
    bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function react_mimic_theme_customize_preview_js() {
    wp_enqueue_script( 'react-mimic-theme-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_
