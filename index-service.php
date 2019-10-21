<?php 
$appointment_options=theme_setup_data(); 
$service_setting = wp_parse_args(  get_option( 'appointment_options', array() ), $appointment_options );
if($service_setting['service_section_enabled'] == 0 ) {
	$imgURL = $service_setting['service_section_background'];
 if($imgURL != '') { ?>
<div class="Service-section" style="background-image:url('<?php echo $imgURL;?>');">
<?php } 
else
{ ?> 
<div class="Service-section" style="background-color:#fff;">
<?php } ?>

	<div class="container">
	
		<div class="row">
			<div class="col-md-12">
			
				<div class="section-heading-title">
					<h1> <?php echo $service_setting['service_courses_title']; ?></h1>
					<p><?php echo $service_setting['service_courses_description']; ?> </p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<a href="<?php echo $service_setting['service_courses_one_link']; ?> ">
					<div class="course-area">
						<div class="media">
							<div class="course-icon">
								<img src="<?php echo $service_setting['service_courses_one_icon']; ?>"/>
							</div>
							<div class="media-body">
								<h3><?php echo $service_setting['service_courses_one_title']; ?></h3>
								<p><?php echo $service_setting['service_courses_one_description']; ?></p>
								<p>подробнее...</p>
							</div>
						</div>
					</div>
				</a>
			</div>
			<div class="col-md-4">
			<a href="<?php echo $service_setting['service_courses_second_link']; ?> ">
					<div class="course-area">
						<div class="media">
							<div class="course-icon">
								<img src="<?php echo $service_setting['service_courses_second_icon']; ?>"/>
							</div>
							<div class="media-body">
								<h3><?php echo $service_setting['service_courses_second_title']; ?></h3>
								<p><?php echo $service_setting['service_courses_second_description']; ?></p>
								<p>подробнее...</p>
							</div>
						</div>
					</div>
				</a>
			</div>
			<div class="col-md-4">
			<a href="<?php echo $service_setting['service_courses_third_link']; ?> ">
					<div class="course-area">
						<div class="media">
							<div class="course-icon">
								<img src="<?php echo $service_setting['service_courses_third_icon']; ?>"/>
							</div>
							<div class="media-body">
								<h3><?php echo $service_setting['service_courses_third_title']; ?></h3>
								<p><?php echo $service_setting['service_courses_third_description']; ?></p>
								<p>подробнее...</p>
							</div>
						</div>
					</div>
				</a>
			</div>

			<div class="clearfix"></div>
		</div>
	</div>		
	<br>
	<br>
	<div class="container">
	
	<div class="row">
		<div class="col-md-12">
		
			<div class="section-heading-title">
				<h1> <?php echo $service_setting['service_title']; ?></h1>
				<p><?php echo $service_setting['service_description']; ?> </p>
			</div>
		</div>
	</div>
	<div class="row">
			<div class="col-md-4">
				<div class="service-area">
					<div class="media">
						<div class="service-icon">
							<i class="fa <?php echo $service_setting['service_one_icon']; ?>"></i>
						</div>
						<div class="media-body">
							<h3><?php echo $service_setting['service_one_title']; ?></h3>
							<p><?php echo $service_setting['service_one_description']; ?></p>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="service-area">
					<div class="media">
						<div class="service-icon">
							<i class="fa <?php echo $service_setting['service_two_icon']; ?>"></i>
						</div>
						<div class="media-body">
							<h3><?php echo $service_setting['service_two_title']; ?></h3>
							<p><?php echo $service_setting['service_two_description']; ?></p>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="service-area">
					<div class="media">
						<div class="service-icon">
							<i class="fa <?php echo $service_setting['service_three_icon']; ?>"></i>
						</div>
						<div class="media-body">
							<h3><?php echo $service_setting['service_three_title']; ?></h3>
							<p><?php echo $service_setting['service_three_description']; ?></p>
						</div>
					</div>
				</div>
			</div>
			<div class="clearfix"></div>
			<div class="col-md-4">
				<div class="service-area">
					<div class="media">
						<div class="service-icon">
							<i class="fa <?php echo $service_setting['service_four_icon']; ?>"></i>
						</div>
						<div class="media-body">
							<h3><?php echo $service_setting['service_four_title']; ?></h3>
							<p><?php echo $service_setting['service_four_description']; ?></p>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="service-area">
					<div class="media">
						<div class="service-icon">
							<i class="fa <?php echo $service_setting['service_five_icon']; ?>"></i>
						</div>
						<div class="media-body">
							<h3><?php echo $service_setting['service_five_title']; ?></h3>
							<p><?php echo $service_setting['service_five_description']; ?></p>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="service-area">
					<div class="media">
						<div class="service-icon">
							<i class="fa <?php echo $service_setting['service_six_icon']; ?>"></i>
						</div>
						<div class="media-body">
							<h3><?php echo $service_setting['service_six_title']; ?></h3>
							<p><?php echo $service_setting['service_six_description']; ?></p>
						</div>
					</div>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<!-- /HomePage Service Section -->
<?php } ?>