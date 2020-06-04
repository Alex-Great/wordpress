<?php 

$atts = vc_map_get_attributes( 'dentalcare_section_three', $atts );

	extract( $atts );
	
	$href = vc_build_link( $link );
		$output = '<div class="success-box">
			<div class="simple-text">
						'.esc_attr($description_three).'

			</div>
		<a class="c-btn big white" href="'.esc_attr($href['url']).'">'.esc_attr($href['title']).'</a>

		</div>';
		

wp_reset_postdata();

	echo  $output;

?>