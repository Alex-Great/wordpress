<?php 

$atts = vc_map_get_attributes( 'dentalcare_get_touch', $atts );

	extract( $atts );
	
	$href = vc_build_link( $link );
	
	$output .= '<div class="row vertical-middle">
					<div class="col-md-8 col-lg-9">
						<h4 class="tt-banner-label Raleway ml70">'.esc_attr($get_touch_desc).'</h4>
						<div class="empty-space marg-sm-b30"></div>
					</div>
					<div class="col-md-4 col-lg-3">
						<a class="c-btn big white" href="'.esc_attr($href['url']).'">'.esc_attr($href['title']).'</a>	
					</div>
			</div>';
	
wp_reset_postdata();

	echo  $output;

?>