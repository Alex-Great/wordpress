<?php 
$atts = vc_map_get_attributes( 'dentalcare_about_us', $atts );

	extract( $atts );
	$output = '';
	
	if($main_image == ''){
		$main_image = get_template_directory_uri() . '/assets/images/bg/bg_1.jpg';
	}else{
		 
		$main_image = wp_get_attachment_url( $main_image );
	}
	$mainImage = 'style=background-image:url('. esc_attr($main_image) .');';
	
	if($responsive_image == ''){
		$responsive_image = get_template_directory_uri() . '/assets/images/bg/bg_1.jpg';
	}else{
		 
		$responsive_image = wp_get_attachment_url( $responsive_image );
	}
	
	if($first_sub_image == ''){
		$first_sub_image = get_template_directory_uri() . '/assets/images/feature/feature_1.png';
	}else{
		 
		$first_sub_image = wp_get_attachment_url( $first_sub_image );
	}
	
	if($second_sub_image == ''){
		$second_sub_image = get_template_directory_uri() . '/assets/images/feature/feature_2.png';
	}else{
		 
		$second_sub_image = wp_get_attachment_url( $second_sub_image );
	}
	
	if($third_sub_image == ''){
		$third_sub_image = get_template_directory_uri() . '/assets/images/feature/feature_3.png';
	}else{
		 
		$third_sub_image = wp_get_attachment_url( $third_sub_image );
	}
	
	if($fourth_sub_image == ''){
		$fourth_sub_image = get_template_directory_uri() . '/assets/images/feature/feature_4.png';
	}else{
		 
		$fourth_sub_image = wp_get_attachment_url( $fourth_sub_image );
	}
	
	$output .= '<div class="tt-image-row '. esc_attr($el_class).'">
            <div class="container">
                <div class="tt-image-row-bg" '.esc_attr($mainImage).'>
                    <img src="'.esc_attr($responsive_image).'" height="478" width="745" alt="">
                </div>
                <div class="empty-space marg-sm-b30"></div>
                <div class="row">
                    <div class="col-md-8 col-md-offset-4">
                        <!-- TT-TITLE -->
                        <h4 class="tt-title white h4 no-desc">'.wp_kses_post($about_heading).' <span> '.wp_kses_post($about_heading_two).'</span></h4>
                        <div class="empty-space marg-lg-b15"></div>
                        <div class="simple-text white">
                            <p>'.esc_attr($about_description).'</p>
                        </div>
                        <div class="empty-space marg-lg-b40"></div>
                        <div class="row">
                            <div class="col-sm-6 col-md-5">
                                <div class="tt-feature clearfix">
                                    <img class="tt-feature-img" src="'.esc_attr($first_sub_image).'" height="42" width="42" alt="">
                                    <a class="tt-feature-link h6" href="#">'.wp_kses_post($first_sub_heading).'</a>
                                </div>
                                <div class="empty-space marg-xs-b20"></div>
                            </div>
                            <div class="col-sm-6 col-md-5">
                                <div class="tt-feature clearfix">
                                    <img class="tt-feature-img" src="'.esc_attr($second_sub_image).'" height="42" width="42" alt="">
                                    <a class="tt-feature-link h6" href="#">'.wp_kses_post($second_sub_heading).'</a>
                                </div>                                
                            </div>
                        </div>
                        <div class="empty-space marg-xs-b20 marg-lg-b35"></div>
                        <div class="row">
                            <div class="col-sm-6 col-md-5">
                                <div class="tt-feature clearfix">
                                    <img class="tt-feature-img" src="'.esc_attr($third_sub_image).'" height="42" width="42" alt="">
                                    <a class="tt-feature-link h6" href="#">'.wp_kses_post($third_sub_heading).'</a>
                                </div>
                                <div class="empty-space marg-xs-b20"></div>
                            </div>
                            <div class="col-sm-6 col-md-5">
                                <div class="tt-feature clearfix">
                                    <img class="tt-feature-img" src="'.esc_attr($fourth_sub_image).'" height="42" width="42" alt="">
                                    <a class="tt-feature-link h6" href="#">'.wp_kses_post($fourth_sub_heading).'</a>
                                </div>                                
                            </div>
                        </div>                        
                    </div>
                </div>
            </div>
        </div>';
	
	echo $output;
	
?>