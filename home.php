<?php 
		if('page' == get_option('show_on_front')){ get_template_part('index');}

		else {get_header();
		
		//****** get index static banner  ********
		get_template_part('index', 'slider');
		
		//****** get index News  ********
		get_template_part('index', 'news');
				
		//****** Orange Sidebar Area ********
		get_sidebar('orange');
		//****** get index service  ********				
		get_template_part('index', 'service');
		
		//****** get index service  ********				
		get_template_part('index', 'team');

		//****** get Home call out
		get_template_part('index','home-callout'); 	

		get_footer();
		}
?>