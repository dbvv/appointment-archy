<?php
$current_user = wp_get_current_user();
if ( 0 == $current_user->ID ) {
	$lk_link='/account/' ;
	$lk_text="Войти";
} else {
	$lk_link="/account/";
	$lk_text=$current_user->user_login;
}
$cart_url=wc_get_cart_url();
// $cart_text=sprintf( _n( '%d курс', '%d курсов', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ).' - '.WC()->cart->get_cart_total();
$cart_text='<i class="fa fa-shopping-cart"></i>';
$cart_style='';
$cart_count= WC()->cart->get_cart_contents_count();
if ($cart_count>0){
	$cart_text.=' ('.$cart_count.')';
	$cart_style=' style="color: red;"';
}
// $cart_title=_e( 'Посмотреть корзину' );
$cart_title='Посмотреть корзину';
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> >
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php 
	$appointment_options=theme_setup_data(); 
	$header_setting = wp_parse_args(  get_option( 'appointment_options', array() ), $appointment_options);
	if($header_setting['upload_image_favicon']!=''){ ?>
	<link rel="shortcut icon" href="<?php  echo $header_setting['upload_image_favicon']; ?>" /> 
	<?php } ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?> >

<?php if ( get_header_image() != '') {?>
<div class="header-img">
	<div class="header-content">
		<?php if($header_setting['header_one_name'] != '') { ?>
		<h1><?php echo $header_setting['header_one_name'];?></h1>
		<?php }  if($header_setting['header_one_text'] != '') { ?>
		<h3><?php echo $header_setting['header_one_text'];?></h3>
		<?php } ?>
	</div>
	<img class="img-responsive" src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" />
</div>
<?php } ?>
<!--Logo & Menu Section-->	

<nav class="navbar navbar-default">
	<div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
				<?php if($header_setting['text_title'] == 1) { ?>
				<h1><a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="Appointment">
				<?php
					 if($header_setting['enable_header_logo_text'] == 1) 
					{ echo "<div class=appointment_title_head>" . get_bloginfo( ). "</div>"; }
					elseif($header_setting['upload_image_logo']!='') 
					{ ?>
					<img class="img-responsive" src="<?php echo $header_setting['upload_image_logo']; ?>" style="height:<?php echo $header_setting['height']; ?>px; width:<?php echo $header_setting['width']; ?>px;"/>
					<?php } else { ?>
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/bluedark.png">
					<?php } ?>
				</a></h1>
				<?php } ?>	
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only"><?php _e('Toggle navigation','appointment-blue'); ?></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>
		
		<?php 
				$facebook = $header_setting['social_media_facebook_link'];
				$twitter = $header_setting['social_media_twitter_link'];
				$linkdin = $header_setting['social_media_linkedin_link'];
				$social.='<ul class="nav navbar-nav navbar-right"><li><a href="'.$lk_link.'">'.$lk_text.'</a></li>
				<li><a class="cart-contents" href="'.$cart_url.'" title="'.$cart_title.'"'.$cart_style.'>'.$cart_text.'</a></li>
				</ul>';
				
				$social .= '<ul id="%1$s" class="%2$s">%3$s';
				if($header_setting['header_social_media_enabled'] == 0 )
				{
					$social .= '<ul class="head-contact-social">';

					if($header_setting['social_media_facebook_link'] != '') {
					$social .= '<li class="facebook"><a href="'.$facebook.'"';
						if($header_setting['facebook_media_enabled']==1)
						{
						 $social .= 'target="_blank"';
						}
					$social .='><i class="fa fa-facebook"></i></a></li>';
					}
					if($header_setting['social_media_twitter_link']!='') {
					$social .= '<li class="twitter"><a href="'.$twitter.'"';
						if($header_setting['twitter_media_enabled']==1)
						{
						 $social .= 'target="_blank"';
						}
					$social .='><i class="fa fa-twitter"></i></a></li>';
					
					}
					if($header_setting['social_media_linkedin_link']!='') {
					$social .= '<li class="linkedin"><a href="'.$linkdin.'"';
						if($header_setting['linkedin_media_enabled']==1)
						{
						 $social .= 'target="_blank"';
						}
						$social .='><i class="fa fa-linkedin"></i></a></li>';
					}
					$social .='</ul>'; 
			}
			$social .='</ul>'; 
		
		?>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<?php wp_nav_menu( array(  
				'theme_location' => 'primary',
				'container'  => '',
				'menu_class' => 'nav navbar-nav navbar-left',
				'fallback_cb' => 'webriti_fallback_page_menu',
				'items_wrap'  => $social,
				'walker' => new webriti_nav_walker()
				 ) );
				?>
<!--             <ul class="nav navbar-nav navbar-right">
				<li><a href="#">Войти</a></li>
	            <li><a href="#">Регистрация</a></li>
            </ul> -->
		</div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
</nav>	
<!--/Logo & Menu Section-->	
<div class="clearfix"></div>