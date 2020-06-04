<?php 

$atts = vc_map_get_attributes( 'dentalcare_special_offer', $atts );

	extract( $atts );
	$href = vc_build_link( $link );
	$output = '';
	
		$output .= '<h4 class="tt-title h3"><b>'
							.esc_attr($welcome_heading).'</b>'
							.esc_attr($welcome_heading_one).' <span class="c_p_span">'
							.esc_attr($welcome_heading_one_section).'</span></h4>
					<div class="simple-text">
						'.esc_attr($welcome_desc).'
					</div>
					<div class="empty-space marg-lg-b40"></div>
					<a class="c-btn" href="'.esc_attr($href['url']).'">'.esc_attr($href['title']).'</a>';

			wp_reset_postdata();

	echo  $output;

?>