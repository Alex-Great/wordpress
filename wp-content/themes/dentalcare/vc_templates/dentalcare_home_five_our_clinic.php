<?php 

$atts = vc_map_get_attributes( 'dentalcare_home_five_our_clinic', $atts );

	extract( $atts );
	
	$href = vc_build_link( $link );
	
		$output .= '<div class="tt-subtitle">'.esc_attr($welcome_desc).'</div>
		<div class="empty-space marg-lg-b30"></div>
			<div class="simple-text">'.esc_attr($welcome_desc_two).'</div>
			<div class="empty-space marg-lg-b30"></div>
				<a class="c-btn" href="'.esc_attr($href['url']).'">'.esc_attr($href['title']).'</a>
			<div class="empty-space marg-sm-b40"></div>';
		
		
		wp_reset_postdata();

	echo  $output;

?>