<?php 

$atts = vc_map_get_attributes( 'dentalcare_offer_services', $atts );

	extract( $atts );
	$href = vc_build_link( $link );
	$output = '';
	
		$output .= '<div class="offer_services">
						<h4 class="tt-title h3">
						'.esc_attr($welcome_heading_one).'
								<span class="p_span_no">
									'.esc_attr($welcome_heading_one_section).'
								</span>
						</h4>
							<div class="tt-subtitle">
								'.esc_attr($welcome_desc_one).'
							</div>
						<div class="simple-text">

							'.esc_attr($welcome_desc_two).'
						</div>
						<div class="empty-space marg-lg-b30"></div>
						<a class="c-btn" href="'.esc_attr($href['url']).'">'.esc_attr($href['title']).'</a>

					</div>';
		
				wp_reset_postdata();

	echo  $output;

?>