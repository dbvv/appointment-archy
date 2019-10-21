<!-- Footer Section -->
<?php 
$appointment_options=theme_setup_data();
$footer_setting = wp_parse_args(  get_option( 'appointment_options', array() ), $appointment_options );
if ( is_active_sidebar( 'archy_footer-widget-area' ) ) { ?>
<div class="footer-section">
	<div class="container">	
		<div class="row footer-widget-section">
			<?php  dynamic_sidebar( 'archy_footer-widget-area' );	} ?>	
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<!-- /Footer Section -->
<div class="clearfix"></div>
<!-- Footer Copyright Section -->
<div class="footer-copyright-section">
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<?php if($footer_setting['text_title'] == 1) { ?>
				<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<?php
					 if($footer_setting['enable_header_logo_text'] == 1) 
					{ echo "<div class=appointment_title_head>" . get_bloginfo( ). "</div>"; }
					elseif($footer_setting['upload_image_logo']!='') 
					{ ?>
					<img class="img-responsive" src="<?php echo $footer_setting['upload_image_logo']; ?>" style="height:<?php echo $footer_setting['height']; ?>px; width:<?php echo $footer_setting['width']; ?>px;"/>
					<?php } else { ?>
					<img src="<?php echo WEBRITI_TEMPLATE_DIR_URI; ?>/images/logo.png">
					<?php } ?>
				</a>
				<?php } ?>
			</div>
			<div class="col-md-4">
				<div class="footer-copyright">
					<?php if( $footer_setting['footer_menu_bar_enabled'] == 0) { ?>
					<?php echo $footer_setting[ 'footer_copyright_text']; ?>
					<!-- </a> -->
					<?php if( $footer_setting['footer_copyright_email'] !== '') { ?>
					<br><i class="fa fa-envelope"></i>     <a href="mailto:<?php echo $footer_setting[ 'footer_copyright_email']; ?>" target="_blank" style="color: white;"><?php echo $footer_setting[ 'footer_copyright_email']; ?></a>
					<?php } // end if ?>
					<?php if( $footer_setting['footer_copyright_tel'] !== '') { ?>
					<br><i class="fa fa-phone"></i>    <?php echo $footer_setting[ 'footer_copyright_tel']; ?>
					<?php } // end if ?>
					<?php if( $footer_setting['footer_copyright_text2'] !== '') { ?>
					<br><?php echo $footer_setting[ 'footer_copyright_text2']; ?>
					<?php } // end if ?>
					<?php } // end if ?>

				</div>
			</div>
				<?php if($footer_setting['footer_social_media_enabled'] == 0 ) { 
			    $footer_facebook = $footer_setting['footer_social_media_facebook_link'];
				$footer_twitter = $footer_setting['footer_social_media_twitter_link'];
				$footer_linkdin = $footer_setting['footer_social_media_linkedin_link'];
				$footer_googleplus = $footer_setting['footer_social_media_googleplus_link'];
				$footer_skype = $footer_setting['footer_social_media_skype_link'];
				$footer_vkontakte = $footer_setting['footer_social_media_vkontakte_link'];
				$footer_telegram = $footer_setting['footer_social_media_telegram_link'];
				?>
			<div class="col-md-4">
			<ul class="footer-contact-social">
					<?php if($footer_setting['footer_social_media_facebook_link']!='') { ?>
					<li class="facebook"><a href="<?php echo esc_url($footer_facebook); ?>" <?php if($footer_setting['footer_facebook_media_enabled']==1){ echo "target='_blank'"; } ?> ><i class="fa fa-facebook"></i></a></li>
					<?php } if($footer_setting['footer_social_media_twitter_link']!='') { ?>
					<li class="twitter"><a href="<?php echo esc_url($footer_twitter); ?>" <?php if($footer_setting['footer_twitter_media_enabled']==1){ echo "target='_blank'"; } ?> ><i class="fa fa-twitter"></i></a></li>
					<?php } if($footer_setting['footer_social_media_linkedin_link']!='') { ?>
					<li class="linkedin"><a href="<?php echo esc_url($footer_linkdin); ?>" <?php if($footer_setting['footer_linkedin_media_enabled']==1){ echo "target='_blank'"; } ?> ><i class="fa fa-linkedin"></i></a></li>
					<?php } if($footer_setting['footer_social_media_googleplus_link']!='') { ?>
					<li class="googleplus"><a href="<?php echo esc_url($footer_googleplus); ?>" <?php if($footer_setting['footer_googleplus_media_enabled']==1){ echo "target='_blank'"; } ?> ><i class="fa fa-google-plus"></i></a></li>
					<?php } if($footer_setting['footer_social_media_skype_link']!='') { ?>
					<li class="skype"><a href="<?php echo ($footer_skype); ?>" <?php if($footer_setting['footer_skype_media_enabled']==1){ echo "target='_blank'"; } ?> ><i class="fa fa-skype"></i></a></li>
					<?php } if($footer_setting['footer_social_media_vkontakte_link']!='') { ?>
					<li class="vkontakte"><a href="<?php echo esc_url($footer_vkontakte); ?>" <?php if($footer_setting['footer_vkontakte_media_enabled']==1){ echo "target='_blank'"; } ?> ><i class="fa fa-vk"></i></a></li>
					<?php } if($footer_setting['footer_social_media_telegram_link']!='') { ?>
					<li class="telegram"><a href="<?php echo esc_url($footer_telegram); ?>" <?php if($footer_setting['footer_telegram_media_enabled']==1){ echo "target='_blank'"; } ?> ><i class="fa fa-telegram"></i></a></li>
					<?php } ?>
				</ul>
				<br />Все права защищены. Использование материалов данного сайта разрешено только с согласия правообладателей.<br /><a href="/оферта/">Договор оферта</a> <br /><a href="/политика-конфиденциальности/">Политика конфиденциальности</a>
			</div>
			<?php } ?>
		</div>
	</div>
</div>
<!-- /Footer Copyright Section -->
<!--Scroll To Top--> 
<a href="#" class="hc_scrollup"><i class="fa fa-chevron-up"></i></a>
<!--/Scroll To Top--> 
<?php wp_footer(); ?>
</body>
</html>