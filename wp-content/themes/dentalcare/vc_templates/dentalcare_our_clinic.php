<?php 

$atts = vc_map_get_attributes( 'dentalcare_our_clinic', $atts );

	extract( $atts );
	
	$output .= '<div class="col-md-6 pl0">
					<h5>Our Philosophy</h5>
					<div class="simple-text">

						vitae dict eaque ipsa quae ab.Teritatis et quasi architecto. Sed ut perspi ciatis unde omnis iste natus error sit volu ptatem accusantium dolore mque. Totam rem aperiam.

					</div>
				</div>
				<div class="col-md-6 pr0">
					<h5>Our Philosophy</h5>
					<div class="simple-text">

						vitae dict eaque ipsa quae ab.Teritatis et quasi architecto. Sed ut perspi ciatis unde omnis iste natus error sit volu ptatem accusantium dolore mque. Totam rem aperiam.

					</div>
			</div>';
	
	
	wp_reset_postdata();

	echo  $output;

?>