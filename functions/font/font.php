<?php

/*--------------------------------------------------------------------*/
/*     Register Google Fonts
/*--------------------------------------------------------------------*/
function appointment_archy_fonts_url() {
	
    $fonts_url = '';
		
    $font_families = array();
 
	// $font_families = array('Open Sans:300,400,600,700,800','italic','Courgette');
    // $query_args = array(
    //     'family' => urlencode( implode( '|', $font_families ) ),
    //     'subset' => urlencode( 'latin,latin-ext' ),
    // );
    $font_families = array('Roboto:bolf,medium,regular,light,thin');
 
        $query_args = array(
            'family' => urlencode( implode( '|', $font_families ) ),
        );
 
        $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );

    return $fonts_url;
}
function appointment_archy_scripts_styles() {
    wp_enqueue_style( 'appointment-archy-fonts', appointment_archy_fonts_url(), array(), null );
}
add_action( 'wp_enqueue_scripts', 'appointment_archy_scripts_styles' );
?>