<?php 

$atts = vc_map_get_attributes( 'dentalcare_our_clinic_image_gallery', $atts );

	extract( $atts );
	
	$output .= '<div class="tt-block no-bottom">
					<h4 class="tt-title h4 no-desc">
						'.esc_attr($welcome_heading).'
					<span class="none">
						'.esc_attr($welcome_heading_color).'
					</span>
					</h4>
						<div class="empty-space marg-lg-b25"></div>
							<div class="simple-text">
								'.esc_attr($welcome_desc).'
							</div>
						<div class="empty-space marg-lg-b60 marg-sm-b40"></div>
				</div>';
	
			wp_reset_postdata();

	echo  $output;

?>
