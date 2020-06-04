<?php 

$atts = vc_map_get_attributes( 'dentalcare_home_five_single_section', $atts );

	extract( $atts );
	
		$output .= '<div class="image1">
						<img class="alignnone size-full wp-image-708" src="'.wp_get_attachment_url($image).'" alt="" width="64" height="64" />
					</div>
					<div class="empty-space marg-lg-b30"></div>
					<h3>'.esc_attr($title).'</h3>
					<div class="empty-space marg-lg-b15"></div>
					<div class="simple-text">'.esc_attr($welcome_desc_two).'
					</div>';
		
		
		wp_reset_postdata();

	echo  $output;

?>