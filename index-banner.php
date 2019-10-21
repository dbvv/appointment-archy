<?php 
    $self_post_type=get_post_type();
	if ($self_post_type == 'product')
		$url_bg_img= '/wp-content/uploads/2018/06/bg4.png';
	else
 		$url_bg_img= wp_get_attachment_image_src( get_post_thumbnail_id(), 'large')[0];
?>

<!-- Page Title Section -->
<div class="page-title-section">		
	<div class="overlay" style="background-image:  url(<?php echo $url_bg_img; ?>);background-size: cover;">
		<div class="container">
			<div class="row" style="background-color: rgba(45, 47, 49, 0.2);">
				<div class="col-md-6">
					<div class="page-title"><h1><?php the_title(); ?></h1></div>
				</div>
				<div class="col-md-6">
					<ul class="page-breadcrumb">
						<?php if (function_exists('archy_qt_custom_breadcrumbs')) archy_qt_custom_breadcrumbs();?>
					</ul>
				</div>
			</div>
		</div>	
	</div>
</div>
<!-- /Page Title Section -->
<div class="clearfix"></div>