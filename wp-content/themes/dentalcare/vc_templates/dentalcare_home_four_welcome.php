<?php 

$atts = vc_map_get_attributes( 'dentalcare_home_four_welcome', $atts );

	extract( $atts );
	$href = vc_build_link( $link );
	$output = '';
	
		$output .= '<h4 class="tt-title h3">
							'.esc_attr($welcome_heading).'
							<span class="none">
							'.esc_attr($welcome_heading_color).'
							</span>
							</h4>
						<div class="tt-subtitle">
							'.esc_attr($welcome_desc).'
						</div>
						<div class="empty-space marg-lg-b30"></div>
							<div class="simple-text">
							'.esc_attr($welcome_desc_two).'

							</div>
							<div class="empty-space marg-lg-b30"></div>
								<a class="c-btn" href="'.esc_attr($href['url']).'">'.esc_attr($href['title']).'</a>
							<div class="empty-space marg-sm-b40"></div>';

		wp_reset_postdata();

	echo  $output;

?>
