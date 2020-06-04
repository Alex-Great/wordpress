<?php 

$atts = vc_map_get_attributes( 'dentalcare_home_four_our_clinic_strip', $atts );

	extract( $atts );
	$href = vc_build_link( $link );
	$output = '';
	
		$output .= '<div class="row vertical-middle">
						<div class="col-md-8 col-lg-9">
							<h4 class="tt-banner-label">
								'.esc_attr($welcome_heading).'
								<span class="none">
									'.esc_attr($welcome_heading_two).'
								</span>
							</h4>
								<div class="tt-banner-desc">
								'.esc_attr($welcome_heading_three).'
									<a href="tel:'.esc_attr($welcome_call).'">
										'.esc_attr($welcome_call).'
									</a>
								</div>
								<div class="empty-space marg-sm-b30"></div>
						</div>
						<div class="col-md-4 col-lg-3">
							<a class="c-btn big white" href="'.esc_attr($href['url']).'">'.esc_attr($href['title']).'</a>
						</div>
					</div>';
		
		
				wp_reset_postdata();

	echo  $output;

?>