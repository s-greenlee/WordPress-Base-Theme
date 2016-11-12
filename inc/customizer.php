<?php
/**
 * Base Theme Theme Customizer.
 *
 * @package Base_Theme
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function base_theme_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
    
    /*--------------------------------------------------------------
        # Logo
    --------------------------------------------------------------*/
    
    $wp_customize->add_section( 'basetheme_logo_section' , array(
        'title'       => __( 'Logo', 'basetheme' ),
        'priority'    => 30,
        'description' => 'Upload a logo to replace the default site name and description in the header',
    ) );
    $wp_customize->add_setting( 'basetheme_logo' );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'logo', array(
        'label'    => __( 'Logo', 'basetheme' ),
        'section'  => 'basetheme_logo_section',
        'settings' => 'basetheme_logo',
    ) ) );
    
    /*--------------------------------------------------------------
        # Colors
    --------------------------------------------------------------*/
    
    /* Footer Background Color */
    $wp_customize->add_setting( 'basetheme_footer_background_color', array(
        'title'       => 'Footer Background Color',
        'default'     => '#ffffff',
        'transport'   => 'postMessage',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_background_color', array(
        'label'    => __( 'Footer Background Color', 'basetheme' ),
        'section'  => 'colors',
        'settings' => 'basetheme_footer_background_color',
    ) ) );
    
    /* Link Color */
    $wp_customize->add_setting( 'basetheme_link_color' , array(
        'title'       => 'Link Color',
        'default'     => '#0084b5',
        'transport'   => 'postMessage',
        ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_color', array(
        'label'        => __( 'Link Color', 'basetheme' ),
        'section'    => 'colors',
        'settings'   => 'basetheme_link_color',
    ) ) );
    
    /* Link Hover Color */
    $wp_customize->add_setting( 'basetheme_link_hover_color' , array(
        'title'       => 'Link Hover Color',
        'default'     => '#bc007d',
        'transport'   => 'postMessage',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_hover_color', array(
        'label'        => __( 'Link Hover Color', 'basetheme' ),
        'section'    => 'colors',
        'settings'   => 'basetheme_link_hover_color',
    ) ) );
    
    /* Button Background Color */
    $wp_customize->add_setting( 'basetheme_button_background_color' , array(
        'title'       => 'Button Background Color',
        'default'     => '#ffffff',
        'transport'   => 'postMessage',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'button_background_color', array(
        'label'        => __( 'Button Background Color', 'basetheme' ),
        'section'    => 'colors',
        'settings'   => 'basetheme_button_background_color',
    ) ) );
    
    /* Button Hover Background Color */
    $wp_customize->add_setting( 'basetheme_button_hover_background_color' , array(
        'title'       => 'Button Hover Background Color',
        'default'     => '#20b2aa',
        'transport'   => 'postMessage',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'button_hover_background_color', array(
        'label'        => __( 'Button Hover Background Color', 'basetheme' ),
        'section'    => 'colors',
        'settings'   => 'basetheme_button_hover_background_color',
    ) ) );
    
    /*--------------------------------------------------------------
        # Font
    --------------------------------------------------------------*/
    
    /* Base Font Size */
    $wp_customize->add_section( 'font_section', array(
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'Font', 'basetheme' ),
		'description' => '',
    ) );
    $wp_customize->add_setting( 'basetheme_base_font_size' , array(
        'title'       => 'Base Font Size',
        'default'     => '16px',
        'transport'   => 'postMessage',
    ) );
    $wp_customize->add_control( 'base_font-size', array(
        'type'       => 'text',
        'label'      => __( 'Base Font Size', 'basetheme' ),
        'section'    => 'font_section',
        'settings'   => 'basetheme_base_font_size',
        'description'=> 'Recommended Base Font is 16px.',
    ) );
    
    /* Body Font Color */
    $wp_customize->add_setting( 'basetheme_body_font_color' , array(
        'title'       => 'Body Font Color',
        'default'     => '#333333',
        'transport'   => 'postMessage',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'body_font_color', array(
        'label'      => __( 'Body Font Color', 'basetheme' ),
        'section'    => 'font_section',
        'settings'   => 'basetheme_body_font_color',
    ) ) );
    
    
}
add_action( 'customize_register', 'base_theme_customize_register' );

function basetheme_customizer_css() {
    ?>
    <style type="text/css">
        body, button, input, select, textarea {
	       color: <?php echo get_theme_mod( 'basetheme_body_font_color' ); ?>;
	       font-family: 'PT Sans', sans-serif;
	       font-size: <?php echo get_theme_mod( 'basetheme_base_font_size' ); ?>;
        }
        .site-title .title { color: <?php echo get_theme_mod( 'basetheme_site_title_color' ); ?>;}
        a, a:visited { color: <?php echo get_theme_mod( 'basetheme_link_color' ); ?>; }
        a:hover { color: <?php echo get_theme_mod( 'basetheme_link_hover_color' ); ?>; }
        button, input[type="button"], input[type="reset"], input[type="submit"] { background-color: <?php echo get_theme_mod( 'basetheme_button_background_color' ); ?>; }
        a.button:hover, button:hover, input[type="button"]:hover, input[type="reset"]:hover, input[type="submit"]:hover { 
            background-color: <?php echo get_theme_mod( 'basetheme_button_hover_background_color' ); ?>;}
        .site-footer {background-color: <?php echo get_theme_mod('basetheme_footer_background_color'); ?>;}
        
    </style>
    <style id="wp-custom-css"><?php echo get_theme_mod( 'wp_custom_css', '' ); ?> </style>

    <?php
}
add_action( 'wp_head', 'basetheme_customizer_css' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function base_theme_customize_preview_js() {
	wp_enqueue_script( 'base_theme_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'base_theme_customize_preview_js' );
