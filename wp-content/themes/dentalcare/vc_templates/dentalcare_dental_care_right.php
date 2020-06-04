<?php 

$atts = vc_map_get_attributes( 'dentalcare_dental_care_right', $atts );

	extract( $atts );
	
		$output .= '<div class="index3welcome_side">
						<div class="border">
							<h4>'.esc_attr($welcome_heading_one).'<span class="e_no_spa">
							'.esc_attr($welcome_heading_one_section).' </span></h4>
								<p>'.esc_attr($welcome_desc_one).'</p>
							<h4>'.esc_attr($welcome_heading_two).' <span class="e_no_spa"> 
							'.esc_attr($welcome_heading_two_section).' </span></h4>
								<p>'.esc_attr($welcome_desc_two).'</p>
								
							<h4>'.esc_attr($welcome_heading_three).'<span class="e_no_spa">'.esc_attr($welcome_heading_three_section).'</span></h4>
								<p>'.esc_attr($welcome_desc_three).'</p>

						</div>
					</div>';
		
				
		wp_reset_postdata();

	echo  $output;

?>