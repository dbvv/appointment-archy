<?php 
$appointment_options=theme_setup_data(); 
$team_setting = wp_parse_args(  get_option( 'appointment_options', array() ), $appointment_options );
$col_style='col-md-3 col-sm-6';
if($team_setting['team_section_enabled'] == 0 ) {
	$imgURL = $team_setting['team_section_background'];
 if($imgURL != '') { ?>
<div class="Team-section" style="background-image:url('<?php echo $imgURL;?>');background-repeat: no-repeat;background-position-y: center;">
<?php } 
else
{ ?> 
<div class="Team-section" style="background-color:#fff;">
<?php } ?>

	<div class="container">
	
		<div class="row">
			<div class="col-md-12">
			
				<div class="section-heading-title">
					<h1> <?php echo $team_setting['team_title']; ?></h1>
					<p><?php echo $team_setting['team_description']; ?> </p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="<?php echo $col_style; ?>">
				<a href="<?php echo $team_setting['team_one_link']; ?> ">
					<div class="team-area">
						<div class="media">
							<div class="team-icon">
								<img src="<?php echo $team_setting['team_one_icon']; ?>"/>
							</div>
							<div class="media-body">
								<h3><?php echo $team_setting['team_one_title']; ?></h3>
								<p><?php echo $team_setting['team_one_description']; ?><br/><br/><span class="link">подробнее...</span></p>
							</div>
						</div>
					</div>
				</a>
			</div>
			<div class="<?php echo $col_style; ?>">
			<a href="<?php echo $team_setting['team_second_link']; ?> ">
					<div class="team-area">
						<div class="media">
							<div class="team-icon">
								<img src="<?php echo $team_setting['team_second_icon']; ?>"/>
							</div>
							<div class="media-body">
								<h3><?php echo $team_setting['team_second_title']; ?></h3>
								<p><?php echo $team_setting['team_second_description']; ?><br/><br/><span class="link">подробнее...</span></p>
							</div>
						</div>
					</div>
				</a>
			</div>
			<div class="<?php echo $col_style; ?>">
			<a href="<?php echo $team_setting['team_third_link']; ?> ">
					<div class="team-area">
						<div class="media">
							<div class="team-icon">
								<img src="<?php echo $team_setting['team_third_icon']; ?>"/>
							</div>
							<div class="media-body">
								<h3><?php echo $team_setting['team_third_title']; ?></h3>
								<p><?php echo $team_setting['team_third_description']; ?><br/><br/><span class="link">подробнее...</span></p>
								
							</div>
						</div>
					</div>
				</a>
			</div>
			<div class="<?php echo $col_style; ?>">
			<a href="<?php echo $team_setting['team_four_link']; ?> ">
					<div class="team-area">
						<div class="media">
							<div class="team-icon">
								<img src="<?php echo $team_setting['team_four_icon']; ?>"/>
							</div>
							<div class="media-body">
								<h3><?php echo $team_setting['team_four_title']; ?></h3>
								<p><?php echo $team_setting['team_four_description']; ?><br/><br/><span class="link">подробнее...</span></p>
								
							</div>
						</div>
					</div>
				</a>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>		
</div>
<!-- /HomePage Team Section -->
<?php } ?>