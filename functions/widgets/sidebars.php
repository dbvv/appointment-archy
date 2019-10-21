<?php	
add_action( 'widgets_init', 'appointment_archy_widgets_init');
function appointment_archy_widgets_init() {

	/*sidebar*/
	register_sidebar( array(
		'name' => __( 'ArchyStudio Footer widget area', 'appointment' ),
		'id' => 'archy_footer-widget-area',
		'description' => __('ArchyStudio Footer widget area', 'appointment' ),
		'before_widget' => '<div class="footer-widget-column">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="footer-widget-title">',
		'after_title' => '</h3>',
	) );

}	                     
?>