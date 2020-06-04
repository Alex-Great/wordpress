<?php 

$atts = vc_map_get_attributes( 'dentalcare_dental_practice', $atts );

	extract( $atts );
	$output = '<h4 class="tt-title h3 font-32 acolor">'.esc_attr($title).' <span class="c_span_no">'.esc_attr($title1).'</span></h4>
	<div class="simple-text">
		'.wp_kses_post($description).'
	</div>
	<div class="row">
		<div class="col-md-9 col-sm-8">
			<div class="single_text">
				<div class="icon">
					<img class="alignnone size-full wp-image-624" src="'.wp_get_attachment_url($image_home).'" alt="" width="23" height="22" />
				</div>
				<div class="content">
					<h3>'.esc_attr($subtitle).'</h3>
					'.wp_kses_post($subtitle_description).'

				</div>
			</div>
			<div class="single_text">
				<div class="icon">
					<img class="alignnone size-full wp-image-624" src="'.wp_get_attachment_url($image_home_two).'" alt="" width="23" height="22" />
				</div>
				<div class="content">
					<h3>'.esc_attr($subtitle_two).'</h3>
					'.wp_kses_post($subtitle_description_two).'

				</div>
			</div>
			<div class="single_text">
				<div class="icon">
					<img class="alignnone size-full wp-image-624" src="'.wp_get_attachment_url($image_home_three).'" alt="" width="23" height="22" />
				</div>
				<div class="content">
					<h3>'.esc_attr($subtitle_three).'</h3>
					'.wp_kses_post($subtitle_description_three).'

				</div>
			</div>
	</div>
	<div class="col-md-3 col-sm-4">
		<img class="alignnone size-full wp-image-625" src="'.wp_get_attachment_url($image_home_right).'" alt="" width="176" height="236" />
	</div>
</div>';
	

	wp_reset_postdata();

	echo  $output;

?>