<?php
$atts = vc_map_get_attributes( 'dentalcare_home_five_welcome', $atts );
	extract( $atts );
		$output .= '<h4 class="tt-title h3">
					'.esc_attr($welcome_heading_two).'<span class="c_span_n"> '.esc_attr($welcome_heading_three).'</span></h4>
					<div class="tt-subtitle">
						'.wp_kses_post($welcome_desc_two).'
					</div>
					<div class="empty-space marg-lg-b30"></div>
					<div class="empty-space marg-lg-b30"></div>';
		wp_reset_postdata();
	echo  $output;

?>