<?php
function appointment_archy_service_customizer( $wp_customize ) {
    $wp_customize->remove_panel( 'appointment_service_options');
    //Service section panel
    $wp_customize->add_panel( 'appointment_service_options', array(
        'priority'       => 560,
		'capability'     => 'edit_theme_options',
		'title'      => __('Service settings', 'appointment'),
        ) );
        
    $wp_customize->remove_section( 'service_section_head');
    $wp_customize->remove_section( 'service_section_pro');
    $wp_customize->remove_section( 'service_section_one');
    $wp_customize->remove_section( 'service_section_two');
    $wp_customize->remove_section( 'service_section_three');
    $wp_customize->remove_section( 'service_section_four');
    $wp_customize->remove_section( 'service_section_five');
    $wp_customize->remove_section( 'service_section_six');
        
    $wp_customize->add_section( 'service_section_head' , array(
        'title'      => __('Section Heading','appointment'),
        'panel'  => 'appointment_service_options',
        'priority'   => 50,
    ) );
            
	
	//Hide Index Service Section
	
	$wp_customize->add_setting(
        'appointment_options[service_section_enabled]',
        array(
            'default' => '',
            'capability'     => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field',
            'type' => 'option'
            )	
        );
        $wp_customize->add_control(
            'appointment_options[service_section_enabled]',
            array(
                'label' => __('Hide service section from homepage','appointment'),
                'section' => 'service_section_head',
                'type' => 'checkbox',
                )
            );
            
    //Callout Background image
	/* logo option */
    $wp_customize->add_setting( 'appointment_options[service_section_background]', array(
        'sanitize_callback' => 'esc_url_raw',
        'type' => 'option',
        
      ) );
      
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'appointment_options[service_section_background]', array(
        'label'    => __('Background Image', 'appointment' ),
        'section'  => 'service_section_head',
        'settings' => 'appointment_options[service_section_background]',
      ) ) );
       

    // Courses
    $wp_customize->add_setting(
    'appointment_options[service_courses_title]',
    array(
        'default' => __('Курсы AutoCad Civil 3D','appointment'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'appointment_archy_service_sanitize_html',
		'type' => 'option'
    )	
	);
	$wp_customize->add_control(
    'appointment_options[service_courses_title]',
    array(
        'label' => __('Title','appointment'),
        'section' => 'service_section_head',
        'type' => 'text',
    )
	);
	
	$wp_customize->add_setting(
    'appointment_options[service_courses_description]',
    array(
        'default' => 'Duis aute irure dolor in reprehenderit in voluptate velit cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupid non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
		'sanitize_callback' => 'appointment_archy_service_sanitize_html',
		'type' => 'option'
    )	
	);
	$wp_customize->add_control(
    'appointment_options[service_courses_description]',
    array(
        'label' => __('Description','appointment'),
        'section' => 'service_section_head',
        'type' => 'text',
		'sanitize_callback' => 'appointment_archy_service_sanitize_html',
    )
    );
    
    //course section one
	$wp_customize->add_section( 'service_courses_section_one' , array(
		'title'      => __('Курс 1', 'appointment'),
		'panel'  => 'appointment_service_options',
		'priority'   => 100,
		'sanitize_callback' => 'sanitize_text_field',
   	) );
    $wp_customize->add_setting( 'appointment_options[service_courses_one_icon]', array(
        'sanitize_callback' => 'esc_url_raw',
        'type' => 'option',
    ));
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'appointment_options[service_courses_one_icon]', array(
        'label'    => __('Image', 'appointment' ),
        'section'  => 'service_courses_section_one',
        'settings' => 'appointment_options[service_courses_one_icon]',
    )));
		
	$wp_customize->add_setting(
    'appointment_options[service_courses_one_title]',
    array(
        'default' => __('Базовый курс бесплатно','appointment'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'appointment_archy_service_sanitize_html',
		'type' => 'option'
    ));
	$wp_customize->add_control(
    'appointment_options[service_courses_one_title]',
    array(
        'label' => __('Title','appointment'),
        'section' => 'service_courses_section_one',
        'type' => 'text',
    ));

	$wp_customize->add_setting(
    'appointment_options[service_courses_one_description]',
    array(
        'default' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consec tetur adipisicing elit dignissim dapib tumst',
		 'capability'     => 'edit_theme_options',
		 'sanitize_callback' => 'appointment_archy_service_sanitize_html',
		 'type' => 'option'
    ));
	$wp_customize->add_control(
    'appointment_options[service_courses_one_description]',
    array(
        'label' => __('Description','appointment'),
        'section' => 'service_courses_section_one',
        'type' => 'text',	
    ));

	$wp_customize->add_setting(
        'appointment_options[service_courses_one_link]',
        array(
            'default' => '',
             'capability'     => 'edit_theme_options',
             'sanitize_callback' => 'appointment_archy_service_sanitize_html',
             'type' => 'option'
    ));
    $wp_customize->add_control(
        'appointment_options[service_courses_one_link]',
        array(
            'label' => __('Link','appointment'),
            'section' => 'service_courses_section_one',
            'type' => 'text',	
    ));    

    //course section second
	$wp_customize->add_section( 'service_courses_section_second' , array(
		'title'      => __('Курс 2', 'appointment'),
		'panel'  => 'appointment_service_options',
		'priority'   => 100,
		'sanitize_callback' => 'sanitize_text_field',
   	) );
    $wp_customize->add_setting( 'appointment_options[service_courses_second_icon]', array(
        'sanitize_callback' => 'esc_url_raw',
        'type' => 'option',
    ));
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'appointment_options[service_courses_second_icon]', array(
        'label'    => __('Image', 'appointment' ),
        'section'  => 'service_courses_section_second',
        'settings' => 'appointment_options[service_courses_second_icon]',
    )));
		
	$wp_customize->add_setting(
    'appointment_options[service_courses_second_title]',
    array(
        'default' => __('Продвинутый базовый курс','appointment'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'appointment_archy_service_sanitize_html',
		'type' => 'option'
    ));
	$wp_customize->add_control(
    'appointment_options[service_courses_second_title]',
    array(
        'label' => __('Title','appointment'),
        'section' => 'service_courses_section_second',
        'type' => 'text',
    ));

	$wp_customize->add_setting(
    'appointment_options[service_courses_second_description]',
    array(
        'default' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consec tetur adipisicing elit dignissim dapib tumst',
		 'capability'     => 'edit_theme_options',
		 'sanitize_callback' => 'appointment_archy_service_sanitize_html',
		 'type' => 'option'
    ));
	$wp_customize->add_control(
    'appointment_options[service_courses_second_description]',
    array(
        'label' => __('Description','appointment'),
        'section' => 'service_courses_section_second',
        'type' => 'text',	
    ));

	$wp_customize->add_setting(
        'appointment_options[service_courses_second_link]',
        array(
            'default' => '',
             'capability'     => 'edit_theme_options',
             'sanitize_callback' => 'appointment_archy_service_sanitize_html',
             'type' => 'option'
    ));
    $wp_customize->add_control(
        'appointment_options[service_courses_second_link]',
        array(
            'label' => __('Link','appointment'),
            'section' => 'service_courses_section_second',
            'type' => 'text',	
    ));    
    //course section third
	$wp_customize->add_section( 'service_courses_section_third' , array(
		'title'      => __('Курс 3', 'appointment'),
		'panel'  => 'appointment_service_options',
		'priority'   => 100,
		'sanitize_callback' => 'sanitize_text_field',
   	) );
    $wp_customize->add_setting( 'appointment_options[service_courses_third_icon]', array(
        'sanitize_callback' => 'esc_url_raw',
        'type' => 'option',
    ));
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'appointment_options[service_courses_third_icon]', array(
        'label'    => __('Image', 'appointment' ),
        'section'  => 'service_courses_section_third',
        'settings' => 'appointment_options[service_courses_third_icon]',
    )));
		
	$wp_customize->add_setting(
    'appointment_options[service_courses_third_title]',
    array(
        'default' => __('Специализированный курс','appointment'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'appointment_archy_service_sanitize_html',
		'type' => 'option'
    ));
	$wp_customize->add_control(
    'appointment_options[service_courses_third_title]',
    array(
        'label' => __('Title','appointment'),
        'section' => 'service_courses_section_third',
        'type' => 'text',
    ));

	$wp_customize->add_setting(
    'appointment_options[service_courses_third_description]',
    array(
        'default' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consec tetur adipisicing elit dignissim dapib tumst',
		 'capability'     => 'edit_theme_options',
		 'sanitize_callback' => 'appointment_archy_service_sanitize_html',
		 'type' => 'option'
    ));
	$wp_customize->add_control(
    'appointment_options[service_courses_third_description]',
    array(
        'label' => __('Description','appointment'),
        'section' => 'service_courses_section_third',
        'type' => 'text',	
    ));

	$wp_customize->add_setting(
        'appointment_options[service_courses_third_link]',
        array(
            'default' => '',
             'capability'     => 'edit_theme_options',
             'sanitize_callback' => 'appointment_archy_service_sanitize_html',
             'type' => 'option'
    ));
    $wp_customize->add_control(
        'appointment_options[service_courses_third_link]',
        array(
            'label' => __('Link','appointment'),
            'section' => 'service_courses_section_third',
            'type' => 'text',	
    ));    

// Servises
	$wp_customize->add_setting(
    'appointment_options[service_title]',
    array(
        'default' => __('Our services','appointment'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'appointment_archy_service_sanitize_html',
		'type' => 'option'
    )	
	);
	$wp_customize->add_control(
    'appointment_options[service_title]',
    array(
        'label' => __('Title','appointment'),
        'section' => 'service_section_head',
        'type' => 'text',
    )
	);
	
	$wp_customize->add_setting(
    'appointment_options[service_description]',
    array(
        'default' => 'Duis aute irure dolor in reprehenderit in voluptate velit cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupid non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
		'sanitize_callback' => 'appointment_archy_service_sanitize_html',
		'type' => 'option'
    )	
	);
	$wp_customize->add_control(
    'appointment_options[service_description]',
    array(
        'label' => __('Description','appointment'),
        'section' => 'service_section_head',
        'type' => 'text',
		'sanitize_callback' => 'appointment_archy_service_sanitize_html',
    )
	);	
	
//service section one
	$wp_customize->add_section( 'service_section_one' , array(
		'title'      => __('Service section one', 'appointment'),
		'panel'  => 'appointment_service_options',
		'priority'   => 100,
		'sanitize_callback' => 'sanitize_text_field',
   	) );
	$wp_customize->add_setting(
		'appointment_options[service_one_icon]', array(
		 'sanitize_callback' => 'sanitize_text_field',
        'default'        => 'fa-mobile',
        'capability'     => 'edit_theme_options',
		'type' => 'option',
    ));
	
	$wp_customize->add_control( 'appointment_options[service_one_icon]', array(
        'label'   => __('Icon', 'appointment'),
		'style' => 'background-color: red',
        'section' => 'service_section_one',
        'type'    => 'text',
    ));		
		
	$wp_customize->add_setting(
    'appointment_options[service_one_title]',
    array(
        'default' => __('Easy to use','appointment'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'appointment_archy_service_sanitize_html',
		'type' => 'option'
    )	
	);
	$wp_customize->add_control(
    'appointment_options[service_one_title]',
    array(
        'label' => __('Title','appointment'),
        'section' => 'service_section_one',
        'type' => 'text',
    )
	);

	$wp_customize->add_setting(
    'appointment_options[service_one_description]',
    array(
        'default' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consec tetur adipisicing elit dignissim dapib tumst',
		 'capability'     => 'edit_theme_options',
		 'sanitize_callback' => 'appointment_archy_service_sanitize_html',
		 'type' => 'option'
    )	
	);
	$wp_customize->add_control(
    'appointment_options[service_one_description]',
    array(
        'label' => __('Description','appointment'),
        'section' => 'service_section_one',
        'type' => 'text',	
    )
);

//Second service

$wp_customize->add_section( 'service_section_two' , array(
		'title'      => __('Service section two', 'appointment'),
		'panel'  => 'appointment_service_options',
		'priority'   => 200,
   	) );


$wp_customize->add_setting(
    'appointment_options[service_two_icon]',
    array(
        'type' =>'option',
		'default' => 'fa-bell',
		 'capability'     => 'edit_theme_options',
		 'sanitize_callback' => 'sanitize_text_field',
		 
    )	
);
$wp_customize->add_control(
    'appointment_options[service_two_icon]',
    array(
        'label' => __('Icon','appointment'),
        'section' => 'service_section_two',
        'type' => 'text',
    )
);

$wp_customize->add_setting(
    'appointment_options[service_two_title]',
    array(
        'default' => __('Easy to use','appointment'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'appointment_archy_service_sanitize_html',
		'type' => 'option',
    )	
);
$wp_customize->add_control(
    'appointment_options[service_two_title]',
    array(
        'label' => __('Title' ,'appointment'),
        'section' => 'service_section_two',
        'type' => 'text',
    )
);

$wp_customize->add_setting(
    'appointment_options[service_two_description]',
    array(
        'default' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consec tetur adipisicing elit dignissim dapib tumst.',
		 'capability'     => 'edit_theme_options',
		 'sanitize_callback' => 'appointment_archy_service_sanitize_html',
		 'type' => 'option',
    )	
);
$wp_customize->add_control(
		'appointment_options[service_two_description]',
		array(
        'label' => __('Description','appointment'),
        'section' => 'service_section_two',
        'type' => 'text',
    )
);
//Third Service section
$wp_customize->add_section( 'service_section_three' , array(
		'title'      => __('Service section three', 'appointment'),
		'panel'  => 'appointment_service_options',
		'priority'   => 300,
   	) );


$wp_customize->add_setting(
    'appointment_options[service_three_icon]',
    array(
        'default' => 'fa-laptop',
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
		
    )	
);
$wp_customize->add_control(
'appointment_options[service_three_icon]',
    array(
        'label' => __('Icon','appointment'),
        'section' => 'service_section_three',
        'type' => 'text',
		
    )
);

$wp_customize->add_setting(
    'appointment_options[service_three_title]',
    array(
        'default' => __('Easy to use','appointment'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'appointment_archy_service_sanitize_html',
		'type' =>'option',
    )	
);
$wp_customize->add_control(
    'appointment_options[service_three_title]',
    array(
        'label' => __('Title','appointment'),
        'section' => 'service_section_three',
        'type' => 'text',
    )
);

$wp_customize->add_setting(
    'appointment_options[service_three_description]',
    array(
        'default' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consec tetur adipisicing elit dignissim dapib tumst.',
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'appointment_archy_service_sanitize_html',
		'type' =>'option',
    )	
);
$wp_customize->add_control(
    'appointment_options[service_three_description]',
    array(
        'label' => __('Description','appointment'),
        'section' => 'service_section_three',
        'type' => 'text',
    )
);
//Four Service section

$wp_customize->add_section( 'service_section_four' , array(
		'title'      => __('Service section four', 'appointment'),
		'panel'  => 'appointment_service_options',
		'priority'   => 400,
   	) );

$wp_customize->add_setting(
    'appointment_options[service_four_icon]',
    array(
        'default' => 'fa-support',
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' =>'option',
    )	
);
$wp_customize->add_control(
    'appointment_options[service_four_icon]',
    array(
        'label' => __('Icon','appointment'),
        'section' => 'service_section_four',
        'type' => 'text',
    )
);

$wp_customize->add_setting(
    'appointment_options[service_four_title]',
    array(
        'default' => __('Easy to use','appointment'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'appointment_archy_service_sanitize_html',
		'type' => 'option'
    )	
);
$wp_customize->add_control(
    'appointment_options[service_four_title]',
    array(
        'label' => __('Title','appointment'),
        'section' => 'service_section_four',
        'type' => 'text',
    )
);

$wp_customize->add_setting(
   'appointment_options[service_four_description]',
    array(
        'default' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consec tetur adipisicing elit dignissim dapib tumst.',
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'appointment_archy_service_sanitize_html',
		'type' => 'option'
    )	
);
$wp_customize->add_control(
    'appointment_options[service_four_description]',
    array(
        'label' => __('Description','appointment'),
        'section' => 'service_section_four',
        'type' => 'text',
		'sanitize_callback' => 'sanitize_text_field',
    )
);
//Five service section
$wp_customize->add_section( 'service_section_five' , array(
		'title'      => __('Service section five', 'appointment'),
		'panel'  => 'appointment_service_options',
		'priority'   => 500,
   	) );


$wp_customize->add_setting(
    'appointment_options[service_five_icon]',
    array(
        'default' => 'fa-code',
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    )	
);
$wp_customize->add_control(
    'appointment_options[service_five_icon]',
    array(
        'label' => __('Icon','appointment'),
        'section' => 'service_section_five',
        'type' => 'text',
    )
);

$wp_customize->add_setting(
    'appointment_options[service_five_title]',
    array(
        'default' => __('Easy to use','appointment'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'appointment_archy_service_sanitize_html',
		'type' => 'option',
    )	
);
$wp_customize->add_control(
    'appointment_options[service_five_title]',
    array(
        'label' => __('Title','appointment'),
        'section' => 'service_section_five',
        'type' => 'text',
		
    )
);

$wp_customize->add_setting(
    'appointment_options[service_five_description]',
    array(
        'default' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consec tetur adipisicing elit dignissim dapib tumst.',
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'appointment_archy_service_sanitize_html',
		'type' => 'option'
    )	
);
$wp_customize->add_control(
    'appointment_options[service_five_description]',
    array(
        'label' => __('Description','appointment'),
        'section' => 'service_section_five',
        'type' => 'text',
    )
);
//Six service section
$wp_customize->add_section( 'service_section_six' , array(
		'title'      => __('Service section six', 'appointment'),
		'panel'  => 'appointment_service_options',
		'priority'   => 600,
		
   	) );

	
$wp_customize->add_setting(
    'appointment_options[service_six_icon]',
    array(
        'default' => 'fa-cog',
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    )	
);
$wp_customize->add_control(
    'appointment_options[service_six_icon]',
    array(
        'label' => __('Icon','appointment'),
        'section' => 'service_section_six',
        'type' => 'text',
    )
);

$wp_customize->add_setting(
    'appointment_options[service_six_title]',
    array(
        'default' => __('Easy to use','appointment'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'appointment_archy_service_sanitize_html',
		'type' => 'option',
    )	
);
$wp_customize->add_control(
    'appointment_options[service_six_title]',
    array(
        'label' => __('Title','appointment'),
        'section' => 'service_section_six',
        'type' => 'text',
		
    )
);

$wp_customize->add_setting(
    'appointment_options[service_six_description]',
    array(
        'default' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consec tetur adipisicing elit dignissim dapib tumst.',
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'appointment_archy_service_sanitize_html',
		'type' => 'option',
    )	
);
$wp_customize->add_control(
    'appointment_options[service_six_description]',
    array(
        'label' => __('Description','appointment'),
        'section' => 'service_section_six',
        'type' => 'text',
    )
);

function appointment_archy_service_sanitize_html( $input ) {
    return force_balance_tags( $input );
	}

}
remove_action( 'customize_register', 'appointment_service_customizer',999 );
add_action( 'customize_register', 'appointment_archy_service_customizer',999 );

?>