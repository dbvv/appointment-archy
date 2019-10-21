<?php
function appointment_archy_remover( $wp_customize ) {
    
    $wp_customize->remove_section( 'theme_style' );
    $wp_customize->remove_section( 'appointment_pro_section' );
    $wp_customize->remove_section( 'appointment_email_course_section' );
    $wp_customize->remove_panel( 'appointment_project_setting' );
    $wp_customize->remove_panel( 'appointment_footer_callout_setting' );
    $wp_customize->remove_panel( 'appointment_template' );
    $wp_customize->remove_panel( 'appointment_test_setting' );
    $wp_customize->remove_panel( 'appointment_client_setting' );
    
}

remove_action( 'customize_register', 'appointment_style_customizer',997);
remove_action( 'customize_register', 'appointment_pro_customizer',997);
remove_action( 'customize_register', 'appointment_project_customizer',997);
remove_action( 'customize_register', 'appointment_footer_callout_customizer',997);
remove_action( 'customize_register', 'appointment_join_email_course_customizer',997);
remove_action( 'customize_register', 'appointment_template_customizer',997);
remove_action( 'customize_register', 'appointment_testimonial_customizer',997);
remove_action( 'customize_register', 'appointment_client_customizer',997);
add_action( 'customize_register', 'appointment_archy_remover',998 );

?>