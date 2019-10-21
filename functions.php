<?php

// add_action('after_setup_theme', function(){
// //    if ( ! is_admin() && ! current_user_can('manage_options') )
// //		show_admin_bar( false );
//     if ( ! is_admin() && ! current_user_can('manage_options') )
//         add_filter( 'show_admin_bar', '__return_false' );
//     else
//         add_filter( 'show_admin_bar', '__return_true' );
// // 	show_admin_bar( is_admin() ||  current_user_can('manage_options'));
// },999);

define('ARCHY_TEMPLATE_DIR' , get_stylesheet_directory());
define('ARCHY_THEME_FUNCTIONS_PATH' , ARCHY_TEMPLATE_DIR.'/functions');
require_once( ARCHY_THEME_FUNCTIONS_PATH . '/customizer/customizer-remover.php');
require_once( ARCHY_THEME_FUNCTIONS_PATH . '/customizer/customizer-team.php');
require_once( ARCHY_THEME_FUNCTIONS_PATH . '/customizer/customizer-service.php');
require_once( ARCHY_THEME_FUNCTIONS_PATH . '/customizer/customizer-copyright.php');
require_once( ARCHY_THEME_FUNCTIONS_PATH . '/font/font.php');
require_once( ARCHY_THEME_FUNCTIONS_PATH . '/widgets/sidebars.php');
require_once( ARCHY_THEME_FUNCTIONS_PATH . '/widgets/archy-subscribe.php');
require_once( ARCHY_THEME_FUNCTIONS_PATH . '/breadcrumbs/breadcrumbs.php');
require_once( ARCHY_THEME_FUNCTIONS_PATH . '/rss/archy-rss.php');
require_once( ARCHY_TEMPLATE_DIR . '/includes/custom-function.php');
require_once( ARCHY_THEME_FUNCTIONS_PATH . '/woo/woo.php');


add_action( 'wp_enqueue_scripts', 'appointment_archy_theme_css',999);

function appointment_archy_theme_css() {
    wp_enqueue_style( 'bootstrap-style', 		get_template_directory_uri() . '/css/bootstrap.css' );
    wp_dequeue_style( 'parent-style', 			get_template_directory_uri() . '/style.css' );
	wp_dequeue_style( 'theme-menu', 			get_template_directory_uri() . '/css/theme-menu.css' );
	wp_dequeue_style( 'appointment-default', 	get_template_directory_uri() . '/css/default.css');
	wp_dequeue_style( 'element-style', 			get_template_directory_uri() . '/css/element.css' );
	wp_dequeue_style( 'media-responsive', 		get_template_directory_uri() . '/css/media-responsive.css');

	wp_enqueue_style( 'child-style', 			get_stylesheet_directory_uri() . '/style.css' );
	wp_enqueue_style( 'child-theme-menu', 		get_stylesheet_directory_uri() . '/css/theme-menu.css' );
	wp_enqueue_style( 'child-default-css', 		get_stylesheet_directory_uri() . '/css/default.css' );
	wp_enqueue_style( 'child-element-style', 	get_stylesheet_directory_uri() . '/css/element.css' );
	wp_enqueue_style( 'child-media-responsive', get_stylesheet_directory_uri() . '/css/media-responsive.css');
	wp_enqueue_style( 'child-custom', 			get_stylesheet_directory_uri() . '/css/custom.css');

}

/*
 * Let WordPress manage the document title.
 */
function appointment_archy_setup() {
	add_theme_support( 'title-tag' );
}

add_action( 'after_setup_theme', 'appointment_archy_setup' );

if (!is_admin()) {
        wp_deregister_script('jquery');
        wp_register_script('jquery', ("https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"), false, '1.12.4');
        wp_enqueue_script('jquery');
}

function wsl_use_fontawesome_icons( $provider_id, $provider_name, $authenticate_url )
{
	$id= strtolower( $provider_id );
    ?>
        <a 
           rel           = "nofollow"
           href          = "<?php echo $authenticate_url; ?>"
           data-provider = "<?php echo $provider_id ?>"
           class         = "wp-social-login-provider wp-social-login-provider-<?php echo $id; ?>" 
         >
            <span>
				<i class="fa fa-<?php 
				if ($id=='vkontakte')
					echo 'vk';
				else
					echo $id;
				 ?>"></i> <?php echo $provider_name; ?>
            </span>
        </a>
    <?php
}
  
add_filter( 'wsl_render_auth_widget_alter_provider_icon_markup', 'wsl_use_fontawesome_icons', 10, 3 );

add_action( 'wsl_hook_process_login_after_wp_insert_user', 'archy_wsl_hook_process_login_after_wp_insert_user', 9, 3 );

function archy_wsl_hook_process_login_after_wp_insert_user($user_id, $provider, $hybridauth_user_profile){
	$email=$hybridauth_user_profile->email;
	$fname=$hybridauth_user_profile->firstName;
	$lname=$hybridauth_user_profile->lastName;
	mc_addtolist($email,false,$fname,$lname);
}

// add_action( 'wsl_hook_process_login_before_wp_set_auth_cookie', 'archy_wsl_hook_process_login_before_wp_set_auth_cookie', 9, 4 );

// function archy_wsl_hook_process_login_before_wp_set_auth_cookie($user_id, $provider, $hybridauth_user_profile, $redirect_to){
// 	$email=$hybridauth_user_profile->email;
// 	$fname=$hybridauth_user_profile->firstName;
// 	$lname=$hybridauth_user_profile->lastName;
// 	mc_addtolist($email,false,$fname,$lname);
// }

function get_archy_home_blog_excerpt()
{
	global $post;
	$excerpt = get_the_content();
	$excerpt = strip_tags(preg_replace(" (\[.*?\])",'',$excerpt));
	$excerpt = strip_shortcodes($excerpt);		
	// $original_len = strlen($excerpt);
	$excerpt = substr($excerpt, 0, 145);		
	// $excerpt_len = strlen($excerpt);
	// $len=strlen($excerpt);	 
	// if($original_len>145 || $excerpt_len<145) {
	// $excerpt = $excerpt;
	return $excerpt . '<div class="blog-btn-area-sm"><a href="' . get_permalink() . '" class="blog-btn-sm">'.__("Read More","appointment").'</a></div>';
	// }
	// else
	// { return $excerpt; }
}
?>