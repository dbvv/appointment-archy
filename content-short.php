			<div class="col-md-6">
				<div class="blog-sm-area">
					<div class="media">
						<div class="blog-sm-box">
							<?php $defalt_arg =array('class' => "img-responsive"); ?>
							<?php if(has_post_thumbnail()): ?>
							<?php the_post_thumbnail('', $defalt_arg); ?>
							<?php endif; ?>
						</div>
						<div class="media-body">
							<?php $appointment_options=theme_setup_data();
							  $news_setting = wp_parse_args(  get_option( 'appointment_options', array() ), $appointment_options );
							if($news_setting['home_meta_section_settings'] == '' ) { ?>	
							<div class="blog-post-sm">
								<?php _e('By','appointment');?><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) );?>"><?php echo get_the_author();?></a>
								<a href="<?php echo get_month_link(get_post_time('Y'),get_post_time('m')); ?>">
								<?php echo get_the_date('M j, Y'); ?></a>
								<?php 	$tag_list = get_the_tag_list();
								if(!empty($tag_list)) ?>
								<div class="blog-tags-sm"><?php the_tags('', ', ', ''); ?></div>
							</div>
							<?php } ?>
							<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							<p><?php echo get_archy_home_blog_excerpt(); ?></p>
						</div>
					</div>
				</div>
			</div>
