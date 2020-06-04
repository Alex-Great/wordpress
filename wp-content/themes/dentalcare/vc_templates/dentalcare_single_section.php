<?php 

$atts = vc_map_get_attributes( 'dentalcare_single_section', $atts );

	extract( $atts );
	$href = vc_build_link( $link );
	$output = '';
	if($layout == 'advance_technology')
	{
		$output = '<div class="advanced">
					<div class="icon">
						<img class="alignnone size-full wp-image-612" src="'.wp_get_attachment_url($image).'" alt="" width="56" height="64" />
					</div>
					<div class="content">
						<h3>'.esc_attr($title).'</h3>
						<div class="simple-text">
							'.esc_attr($description).'
						</div>
					</div>
				</div>';
	}
	elseif($layout == 'appointment')
	{
		$output = '<div class="appointment">
						<div class="icon">
						<img class="alignnone size-full wp-image-613" src="'.wp_get_attachment_url($image).'" alt="" width="60" height="64" />
						</div>
					<div class="content">
						<h3>'.esc_attr($title).'</h3>
							<div class="simple-text">
								'.esc_attr($description).'
							</div>
						<a class="c-btn" href="'.esc_attr($href['url']).'">'.esc_attr($href['title']).'</a>
					</div>
				</div>';
	}
	else
	{
	$output = '<div class="hour">
						<div class="icon">
						<img class="alignnone size-full wp-image-614" src="'.wp_get_attachment_url($image).'" alt="" width="58" height="64" />
						</div>
						<div class="content">
							<h3>'.esc_attr($title).'</h3>
								<ul>
									<li class="clearfix">'.esc_attr($monday_friday).'
										<div class="value pull-right">'.esc_attr($timing).'</div>
									</li>
									<li class="clearfix">'.esc_attr($saturday).'
										<div class="value pull-right">'.esc_attr($closed).'</div>
									</li>
									<li class="clearfix">'.esc_attr($sunday).'
										<div class="value pull-right">'.esc_attr($closed).'</div>
									</li>
									<li></li>
									<li></li>
								</ul>
						</div>
					</div>';		
	}


	wp_reset_postdata();

	echo  $output;

?>	
	
