<?php
function appointment_team_customizer( $wp_customize ) {
 
//Service section panel
$wp_customize->add_panel( 'appointment_team_options', array(
		'priority'       => 570,
		'capability'     => 'edit_theme_options',
		'title'      => __('Настройки команды', 'appointment'),
	) );

	
	$wp_customize->add_section( 'team_section_head' , array(
		'title'      => __('Section Heading','appointment'),
		'panel'  => 'appointment_team_options',
		'priority'   => 50,
   	) );
	
	
	//Hide Index Service Section
	
	$wp_customize->add_setting(
    'appointment_options[team_section_enabled]',
    array(
        'default' => '',
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option'
    )	
	);
	$wp_customize->add_control(
    'appointment_options[team_section_enabled]',
    array(
        'label' => __('Спрятать команду с главной страницы','appointment'),
        'section' => 'team_section_head',
        'type' => 'checkbox',
    )
	);
    
    //Callout Background image
	/* logo option */
    $wp_customize->add_setting( 'appointment_options[team_section_background]', array(
        'sanitize_callback' => 'esc_url_raw',
        'type' => 'option',
        
      ) );
      
      $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'appointment_options[team_section_background]', array(
        'label'    => __('Background Image', 'appointment' ),
        'section'  => 'team_section_head',
        'settings' => 'appointment_options[team_section_background]',
      ) ) );
       
// Team
$wp_customize->add_setting(
    'appointment_options[team_title]',
    array(
        'default' => __('Наша команда','appointment'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'appointment_team_sanitize_html',
		'type' => 'option'
    )	
	);
	$wp_customize->add_control(
    'appointment_options[team_title]',
    array(
        'label' => __('Title','appointment'),
        'section' => 'team_section_head',
        'type' => 'text',
    )
	);
	
	$wp_customize->add_setting(
    'appointment_options[team_description]',
    array(
        'default' => '',
		'sanitize_callback' => 'appointment_team_sanitize_html',
		'type' => 'option'
    )	
	);
	$wp_customize->add_control(
    'appointment_options[team_description]',
    array(
        'label' => __('Description','appointment'),
        'section' => 'team_section_head',
        'type' => 'text',
		'sanitize_callback' => 'appointment_team_sanitize_html',
    )
    );
    
    //team section one
	$wp_customize->add_section( 'team_section_one' , array(
		'title'      => __('Сотрудник 1', 'appointment'),
		'panel'  => 'appointment_team_options',
		'priority'   => 100,
		'sanitize_callback' => 'sanitize_text_field',
   	) );
    $wp_customize->add_setting( 'appointment_options[team_one_icon]', array(
        'sanitize_callback' => 'esc_url_raw',
        'type' => 'option',
    ));
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'appointment_options[team_one_icon]', array(
        'label'    => __('Image', 'appointment' ),
        'section'  => 'team_section_one',
        'settings' => 'appointment_options[team_one_icon]',
    )));
		
	$wp_customize->add_setting(
    'appointment_options[team_one_title]',
    array(
        'default' => __('','appointment'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'appointment_team_sanitize_html',
		'type' => 'option'
    ));
	$wp_customize->add_control(
    'appointment_options[team_one_title]',
    array(
        'label' => __('Name','appointment'),
        'section' => 'team_section_one',
        'type' => 'text',
    ));

	$wp_customize->add_setting(
    'appointment_options[team_one_description]',
    array(
        'default' => '',
		 'capability'     => 'edit_theme_options',
		 'sanitize_callback' => 'appointment_team_sanitize_html',
		 'type' => 'option'
    ));
	$wp_customize->add_control(
    'appointment_options[team_one_description]',
    array(
        'label' => __('Description','appointment'),
        'section' => 'team_section_one',
        'type' => 'text',	
    ));

	$wp_customize->add_setting(
        'appointment_options[team_one_link]',
        array(
            'default' => '',
             'capability'     => 'edit_theme_options',
             'sanitize_callback' => 'appointment_team_sanitize_html',
             'type' => 'option'
    ));
    $wp_customize->add_control(
        'appointment_options[team_one_link]',
        array(
            'label' => __('Link','appointment'),
            'section' => 'team_section_one',
            'type' => 'text',	
    ));    

    //team section second
	$wp_customize->add_section( 'team_section_second' , array(
		'title'      => __('Сотрудник 2', 'appointment'),
		'panel'  => 'appointment_team_options',
		'priority'   => 200,
		'sanitize_callback' => 'sanitize_text_field',
   	) );
    $wp_customize->add_setting( 'appointment_options[team_second_icon]', array(
        'sanitize_callback' => 'esc_url_raw',
        'type' => 'option',
    ));
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'appointment_options[team_second_icon]', array(
        'label'    => __('Image', 'appointment' ),
        'section'  => 'team_section_second',
        'settings' => 'appointment_options[team_second_icon]',
    )));
		
	$wp_customize->add_setting(
    'appointment_options[team_second_title]',
    array(
        'default' => __('','appointment'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'appointment_team_sanitize_html',
		'type' => 'option'
    ));
	$wp_customize->add_control(
    'appointment_options[team_second_title]',
    array(
        'label' => __('Name','appointment'),
        'section' => 'team_section_second',
        'type' => 'text',
    ));

	$wp_customize->add_setting(
    'appointment_options[team_second_description]',
    array(
        'default' => '',
		 'capability'     => 'edit_theme_options',
		 'sanitize_callback' => 'appointment_team_sanitize_html',
		 'type' => 'option'
    ));
	$wp_customize->add_control(
    'appointment_options[team_second_description]',
    array(
        'label' => __('Description','appointment'),
        'section' => 'team_section_second',
        'type' => 'text',	
    ));

	$wp_customize->add_setting(
        'appointment_options[team_second_link]',
        array(
            'default' => '',
             'capability'     => 'edit_theme_options',
             'sanitize_callback' => 'appointment_team_sanitize_html',
             'type' => 'option'
    ));
    $wp_customize->add_control(
        'appointment_options[team_second_link]',
        array(
            'label' => __('Link','appointment'),
            'section' => 'team_section_second',
            'type' => 'text',	
    ));    
    //team section third
	$wp_customize->add_section( 'team_section_third' , array(
		'title'      => __('Сотрудник 3', 'appointment'),
		'panel'  => 'appointment_team_options',
		'priority'   => 300,
		'sanitize_callback' => 'sanitize_text_field',
   	) );
    $wp_customize->add_setting( 'appointment_options[team_third_icon]', array(
        'sanitize_callback' => 'esc_url_raw',
        'type' => 'option',
    ));
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'appointment_options[team_third_icon]', array(
        'label'    => __('Image', 'appointment' ),
        'section'  => 'team_section_third',
        'settings' => 'appointment_options[team_third_icon]',
    )));
		
	$wp_customize->add_setting(
    'appointment_options[team_third_title]',
    array(
        'default' => __('','appointment'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'appointment_team_sanitize_html',
		'type' => 'option'
    ));
	$wp_customize->add_control(
    'appointment_options[team_third_title]',
    array(
        'label' => __('Name','appointment'),
        'section' => 'team_section_third',
        'type' => 'text',
    ));

	$wp_customize->add_setting(
    'appointment_options[team_third_description]',
    array(
        'default' => '',
		 'capability'     => 'edit_theme_options',
		 'sanitize_callback' => 'appointment_team_sanitize_html',
		 'type' => 'option'
    ));
	$wp_customize->add_control(
    'appointment_options[team_third_description]',
    array(
        'label' => __('Description','appointment'),
        'section' => 'team_section_third',
        'type' => 'text',	
    ));

	$wp_customize->add_setting(
        'appointment_options[team_third_link]',
        array(
            'default' => '',
             'capability'     => 'edit_theme_options',
             'sanitize_callback' => 'appointment_team_sanitize_html',
             'type' => 'option'
    ));
    $wp_customize->add_control(
        'appointment_options[team_third_link]',
        array(
            'label' => __('Link','appointment'),
            'section' => 'team_section_third',
            'type' => 'text',	
    ));    

    //team section four
	$wp_customize->add_section( 'team_section_four' , array(
		'title'      => __('Сотрудник 4', 'appointment'),
		'panel'  => 'appointment_team_options',
		'priority'   => 400,
		'sanitize_callback' => 'sanitize_text_field',
   	) );
    $wp_customize->add_setting( 'appointment_options[team_four_icon]', array(
        'sanitize_callback' => 'esc_url_raw',
        'type' => 'option',
    ));
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'appointment_options[team_four_icon]', array(
        'label'    => __('Image', 'appointment' ),
        'section'  => 'team_section_four',
        'settings' => 'appointment_options[team_four_icon]',
    )));
		
	$wp_customize->add_setting(
    'appointment_options[team_four_title]',
    array(
        'default' => __('','appointment'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'appointment_team_sanitize_html',
		'type' => 'option'
    ));
	$wp_customize->add_control(
    'appointment_options[team_four_title]',
    array(
        'label' => __('Name','appointment'),
        'section' => 'team_section_four',
        'type' => 'text',
    ));

	$wp_customize->add_setting(
    'appointment_options[team_four_description]',
    array(
        'default' => '',
		 'capability'     => 'edit_theme_options',
		 'sanitize_callback' => 'appointment_team_sanitize_html',
		 'type' => 'option'
    ));
	$wp_customize->add_control(
    'appointment_options[team_four_description]',
    array(
        'label' => __('Description','appointment'),
        'section' => 'team_section_four',
        'type' => 'text',	
    ));

	$wp_customize->add_setting(
        'appointment_options[team_four_link]',
        array(
            'default' => '',
             'capability'     => 'edit_theme_options',
             'sanitize_callback' => 'appointment_team_sanitize_html',
             'type' => 'option'
    ));
    $wp_customize->add_control(
        'appointment_options[team_four_link]',
        array(
            'label' => __('Link','appointment'),
            'section' => 'team_section_four',
            'type' => 'text',	
    ));    


function appointment_team_sanitize_html( $input ) {
    return force_balance_tags( $input );
	}


}
add_action( 'customize_register', 'appointment_team_customizer' );
?>