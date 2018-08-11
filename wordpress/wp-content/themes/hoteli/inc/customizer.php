<?php
/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function hoteli_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';


	// View PRO Version
	$wp_customize->add_section( 'hoteli_style_view_pro', array(
		'title'       => '' . esc_html__( 'View PRO Version', 'hoteli' ),
		'priority'    => 2,
		'description' => sprintf(
			__( '<div class="upsell-container">
					<h2>Go PRO Today!</h2>
					<p>Take it to the next level. See the features below:</p>
					<ul class="upsell-features">
                            <li>
                            	<h4>Hotel PRO Plugin</h4>
                            	<div class="description">Create Rooms with different prices & features, add a full width template with gallery slider & amenities</div>
                            </li>

                            <li>
                            	<h4>Galleries & Albums</h4>
                            	<div class="description">Upload galleries/Albums in your rooms with a single click</div>
                            </li>
                            
                            <li>
                            	<h4>Homepage Contact</h4>
                            	<div class="description">Display your contact information & contact form on the homepage</div>
                            </li>

                            <li>
                            	<h4>One On One Email Support</h4>
                            	<div class="description">Get one on one email support from our experienced support stuff, we can also help you modify the theme to your liking</div>
                            </li>
                            
                    </ul> %s </div>', 'hoteli' ),
			sprintf( '<a href="%1$s" target="_blank" class="button button-primary">%2$s</a>', esc_url( hoteli_get_pro_link() ), esc_html__( 'View hoteli PRO', 'hoteli' ) )
		),
	) );

	$wp_customize->add_setting( 'hoteli_pro_desc', array(
		'default'           => '',
		'sanitize_callback' => 'hoteli_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'hoteli_pro_desc', array(
		'section' => 'hoteli_style_view_pro',
		'type'    => 'hidden',
	) );
}
add_action( 'customize_register', 'hoteli_customize_register' );
/**
 * hoteli Theme Customizer
 *
 * @package hoteli
 */
Hoteli_Kirki::add_config( 'hoteli', array(
	'capability'    => 'edit_theme_options',
	'option_type'   => 'theme_mod',
) );

Hoteli_Kirki::add_panel( 'front_section', array(
    'priority'    => 1,
    'title'       => __( 'Front Sections', 'hoteli' ),
    'description' => __( 'Edit front page sections', 'hoteli' ),
) );

//SECTIONS
Hoteli_Kirki::add_section( 'fonts', array(
    'title'          => __( 'Custom Fonts', 'hoteli' ),
    'description'    => __( 'Select Custom Fonts Here','hoteli' ),
    'panel'          => '', // Not typically needed.
    'priority'       => 3,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.
) );

Hoteli_Kirki::add_section( 'welcome', array(
    'title'          => __( 'welcome', 'hoteli' ),
    'description'    => __( 'welcome', 'hoteli' ),
    'panel'          => 'front_section', // Not typically needed.
    'priority'       => 1,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.

) );

Hoteli_Kirki::add_section( 'features', array(
    'title'          => __( 'Features', 'hoteli' ),
    'description'    => __( 'Hotel Features','hoteli' ),
    'panel'          => 'front_section', // Not typically needed.
    'priority'       => 3,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.

) );
Hoteli_Kirki::add_section( 'blog', array(
    'title'          => __( 'Blog', 'hoteli' ),
    'description'    => __( 'Blog Section' ,'hoteli'),
    'panel'          => 'front_section', // Not typically needed.
    'priority'       => 4,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.

) );

//SETTINGS
// typography
Hoteli_Kirki::add_field( 'hoteli', array(
	'type'        => 'typography',
	'settings'    => 'Header_Fonts',
	'label'       => esc_attr__( 'Heading Fonts', 'hoteli' ),
	'section'     => 'fonts',
	'default'     => array(
		'font-family'    => 'Playfair Display',
		'variant'        => 'bold',
	),
	'priority'    => 10,
	'output'      => array(
		array(
			'element' => 'h1,h2,h3,h4,h5,.main-navigation a',
		),
	),
) );


Hoteli_Kirki::add_field( 'hoteli', array(
	'type'        => 'typography',
	'settings'    => 'body_fonts',
	'label'       => esc_attr__( 'Body Font', 'hoteli' ),
	'section'     => 'fonts',
	'default'     => array(
		'font-family'    => 'Poppins',
		'variant'        => 'regular',
		'font-size'      => '14px',
		'line-height'    => '1.5',
		'letter-spacing' => '0',
	),
	'priority'    => 2,
	'output'      => array(
		array(
			'element' => 'body',
		),
	),
) );

Hoteli_Kirki::add_field( 'hoteli', array(
	'type'        => 'color',
	'settings'    => 'colors',
	'label'       => __( 'Primary Accent Color', 'hoteli' ),
	'section'     => 'colors',
	'default'     => '#1abc9c',
	'priority'    => 10,
	'choices'     => array(
		'alpha' => true,
	),
	'output' => array(
        array(
            'element'  => 'a.btn,button, input[type="button"], input[type="reset"], input[type="submit"]',
            'property' => 'background',
        ),
        array(
            'element'  => 'a:hover',
            'property' => 'color',
        ),
       ),
) );
//Welcome Message
Hoteli_Kirki::add_field( 'hoteli', array(
	'type'        => 'switch',
	'settings'    => 'welcome_switch',
	'label'       => __( 'Toggle this section ON/OFF', 'hoteli' ),
	'section'     => 'welcome',
	'default'     => '0',
	'priority'    => 1,
	'choices'     => array(
		'on'  => esc_attr__( 'Enable', 'hoteli' ),
		'off' => esc_attr__( 'Disable', 'hoteli' ),
	),
) );
Hoteli_Kirki::add_field( 'hoteli', array(
	'type'     => 'textarea',
	'settings' => 'welcome',
	'label'    => __( 'Welcome Section', 'hoteli' ),
	'section'  => 'welcome',
	//'default'  => esc_attr__( 'This is a defualt value', 'hoteli' ),
	'priority' => 1,
) );

//Features Select
Hoteli_Kirki::add_field( 'hoteli', array(
	'type'        => 'switch',
	'settings'    => 'features_switch',
	'label'       => __( 'Toggle this section ON/OFF', 'hoteli' ),
	'section'     => 'features',
	'default'     => '0',
	'priority'    => 1,
	'choices'     => array(
		'on'  => esc_attr__( 'Enable', 'hoteli' ),
		'off' => esc_attr__( 'Disable', 'hoteli' ),
	),
) );
Hoteli_Kirki::add_field( 'hoteli', array(
	'type'     => 'text',
	'settings' => 'sub_heading',
	'label'    => __( 'Section Sub Heading', 'hoteli' ),
	'section'  => 'features',
	//'default'  => esc_attr__( 'This is a defualt value', 'hoteli' ),
	'priority' => 1,
) );
Hoteli_Kirki::add_field( 'hoteli', array(
	'type'     => 'text',
	'settings' => 'heading',
	'label'    => __( 'Section Heading', 'hoteli' ),
	'section'  => 'features',
	//'default'  => esc_attr__( 'This is a defualt value', 'hoteli' ),
	'priority' => 1,
) );



Hoteli_Kirki::add_field( 'hoteli', array(
	'type'        => 'dropdown-pages',
	'settings'    => 'feature-2',
	'label'       => __( 'First Feature', 'hoteli' ),
	'section'     => 'features',
	'default'     => 42,
	'priority'    => 1,
) );
Hoteli_Kirki::add_field( 'hoteli', array(
	'type'        => 'dropdown-pages',
	'settings'    => 'feature-3',
	'label'       => __( 'Second Feature', 'hoteli' ),
	'section'     => 'features',
	'default'     => 42,
	'priority'    => 2,
) );
Hoteli_Kirki::add_field( 'hoteli', array(
	'type'        => 'dropdown-pages',
	'settings'    => 'feature-1',
	'label'       => __( 'Third Feature', 'hoteli' ),
	'section'     => 'features',
	'default'     => 42,
	'priority'    => 3,
) );

//blog section
Hoteli_Kirki::add_field( 'hoteli', array(
	'type'        => 'switch',
	'settings'    => 'blog_switch',
	'label'       => __( 'Toggle this section ON/OFF', 'hoteli' ),
	'section'     => 'blog',
	'default'     => '0',
	'priority'    => 1,
	'choices'     => array(
		'on'  => esc_attr__( 'Enable', 'hoteli' ),
		'off' => esc_attr__( 'Disable', 'hoteli' ),
	),
) );
Hoteli_Kirki::add_field( 'hoteli', array(
	'type'     => 'text',
	'settings' => 'blog_subheading',
	'label'    => __( 'Section Sub Heading', 'hoteli' ),
	'section'  => 'blog',
	//'default'  => esc_attr__( 'This is a defualt value', 'hoteli' ),
	'priority' => 1,
) );
Hoteli_Kirki::add_field( 'hoteli', array(
	'type'     => 'text',
	'settings' => 'blog_heading',
	'label'    => __( 'Section Heading', 'hoteli' ),
	'section'  => 'blog',
	//'default'  => esc_attr__( 'This is a defualt value', 'hoteli' ),
	'priority' => 1,
) );

//header text
Hoteli_Kirki::add_field( 'hoteli', array(
	'type'     => 'textarea',
	'settings' => 'header_welcome',
	'label'    => __( 'Header Text', 'hoteli' ),
	'section'  => 'header_image',
	//'default'  => esc_attr__( 'This is a defualt value', 'hoteli' ),
	'priority' => 1,
) );

Hoteli_Kirki::add_field( 'hoteli', array(
	'type'     => 'text',
	'settings' => 'header_sub_welcome',
	'label'    => __( 'Header Sub Text ', 'hoteli' ),
	'section'  => 'header_image',
	//'default'  => esc_attr__( 'This is a defualt value', 'hoteli' ),
	'priority' => 1,
) );





/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function hoteli_customize_preview_js() {
	wp_enqueue_script( 'hoteli_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'hoteli_customize_preview_js' );

/**
 * Admin CSS
 */
function hoteli_customizer_assets() {
    wp_enqueue_style( 'hoteli_customizer_style', get_template_directory_uri() . '/css/admin.css', null, '1.0.1', false );
}
add_action( 'customize_controls_enqueue_scripts', 'hoteli_customizer_assets' );
/**
 * Generate a link to the Noah Lite info page.
 */
function hoteli_get_pro_link() {
    return 'http://themespla.net/downloads/hoteli';
}

