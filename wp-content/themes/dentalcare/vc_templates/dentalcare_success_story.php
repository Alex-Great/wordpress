<?php 

$atts = vc_map_get_attributes( 'dentalcare_success_story', $atts );

	extract( $atts );
		
	$output .= '<h5>'.esc_attr($our_clinic).'</h5>
				<div class="simple-text">

					'.esc_attr($our_desc).'
<br><br>
					<div class="simple-text">
					'.esc_attr($our_desc_two).'

					</div>
				</div>';

			
	
		wp_reset_postdata();

	echo  $output;

?>