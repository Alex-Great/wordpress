<?php
	class dentalcare_info extends WP_Widget 
	{
		public function __construct() 
		{
				$widget = array(
					'classname' => 'dentalcare_info',
					'description' => 'Widget that uses the built in Media library.'
			);
			parent::__construct( 'pu_media_upload', 'Dentalcare Info', $widget );
				add_action('admin_enqueue_scripts', array($this, 'upload_scripts'));
		}
		public function upload_scripts()
		{
			wp_enqueue_media();
			wp_enqueue_script( 'upload_media_widget', get_template_directory_uri() . '/assets/js/upload-media.js', array( 'jquery' ), DENTALCARE_THEME_VERSION, true );
		}
		public function form( $instance )
		{
			 $defaults = array(
            'image_uri'      => '',
            'text_content'     => '',
            'text_content1' => '',
			'fot_page'=>''
        );
			/* Set up default widget settings. */
			$instance         = wp_parse_args( (array) $instance, $defaults );
			
			$ind_pages = get_pages();
			$image = '';
			if(isset($instance['image']))
			{
				$image = $instance['image'];
			}
			
			$text_content = '';
			if ( isset( $instance[ 'text_content' ] ) ) 
			{
				$text_content = $instance[ 'text_content' ];
			} 
			else 
			{
				$text_content = '';
			}
			$text_content1 = '';
			if ( isset( $instance[ 'text_content1' ] ) ) 
			{
				$text_content1 = $instance[ 'text_content1' ];
			} 
			else 
			{
				$text_content1 = '';
			}
			
			$fot_page = '';
			if ( isset( $instance[ 'fot_page' ] ) ) 
			{
				$fot_page = $instance[ 'fot_page' ];
			} 
			else 
			{
				$fot_page = '';
			}
	?>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('image_uri')); ?>">
					<?php echo esc_html( 'Logo:', 'dentalcare' ); ?>
				</label>
				<br />
				<?php
					if ( $instance['image_uri'] != '' ) :
						$allowedTypes = array(IMAGETYPE_PNG, IMAGETYPE_JPEG, IMAGETYPE_GIF);
						if(isset($instance['image']))
						{
							$detectedType = exif_imagetype($instance['image']['tmp_name']);
						}
						else
						{
							$detectedType = '';
						}
						$error = !in_array($detectedType, $allowedTypes);			
							echo '<img class="custom_media_image" src="'.esc_url($instance['image_uri']).'" style="margin:0;padding:0;float:left;display:inline-block" width=100px; height=100px; /><br />';
					endif;
				?>
				<input type="text" class="widefat custom_media_url" name="<?php echo esc_attr($this->get_field_name('image_uri')); ?>" id="<?php echo esc_attr($this->get_field_id('image_uri')); ?>" value="<?php echo esc_url($instance['image_uri']); ?>" style="margin-top:5px;">

				<input type="button" class="button button-primary custom_media_button" id="custom_media_button" name="<?php echo esc_attr($this->get_field_name('image_uri')); ?>" value="Upload Image" style="margin-top:5px;" />
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('text_content')); ?>">
					<?php echo esc_html( 'Text:', 'dentalcare' ); ?>
				</label>	
				<textarea class="widefat" id="<?php echo esc_attr($this->get_field_id( 'text_content' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'text_content' )); ?>">
					<?php echo esc_attr( $text_content ); ?>
				</textarea>
			</p>
			
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('text_content1')); ?>">
					<?php echo esc_html( 'Read More link:', 'dentalcare' ); ?>
				</label>	
				<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id( 'text_content1' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'text_content1' )); ?>" value="<?php echo esc_attr( $text_content1 ); ?>">
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('fot_page')); ?>">
					<?php echo esc_html__( 'link Option:', 'dentalcare' ); ?>
				</label>
				<select name="<?php echo esc_attr($this->get_field_name('fot_page')); ?>" id="<?php echo esc_attr($this->get_field_id('fot_page')); ?>" class="widefat">

					<?php
					foreach($ind_pages AS $page=>$val)
					{
					?>
						<option value="<?php echo esc_attr($val->ID);?>"<?php selected( $instance['fot_page'], $val->ID ); ?>>	<?php echo esc_attr($val->post_name); ?>
						</option>
					<?php
					}
					?>	
				</select>
			</p>
			<?php 
		}
		public function update( $new_instance, $old_instance ) 
		{
			// processes widget options to be saved
			$instance = array();
			$instance['image_uri'] = strip_tags( $new_instance['image_uri'] );
			$instance[ 'text_content1' ]  	= $new_instance['text_content1'];
			$instance[ 'text_content' ]= $new_instance['text_content'];
			$instance['fot_page'] = $new_instance['fot_page'];
			return $instance;
		}
		public function widget( $args, $instance )
		{
				// Outputs the content of the widget
				extract( $args );
				global $resort_option;
				$textContent1     = apply_filters( 'text_content1', $instance['text_content1'] );
				$textContent      = apply_filters( 'text_content', $instance['text_content'] );
				echo $before_widget;
				
			if ($instance['image_uri']): ?>
				<div class="footer_logo">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
						<img src="<?php echo esc_url($instance['image_uri']); ?>"  alt="<?php bloginfo( 'name' ); ?>" />
					</a>
				</div>
				<?php else: ?>
				<div class="footer_logo">
					<a href="<?php echo esc_url( home_url( '/' ) ) ?>">
						<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>
					</a>
				</div>
				
			<?php endif; 
			if( $instance[ 'text_content' ]): ?>
				<div class="footer_text">
					<p class="about-us-widget">
						<?php echo esc_attr($instance[ 'text_content' ]);?>
					</p>
				</div>
			<?php endif; 
			if( $instance[ 'text_content1' ]):  ?>	
				<a class= "about-us-widget_a" href= "<?php echo get_permalink( $instance['fot_page'] ); ?>">
					<?php echo esc_attr($instance[ 'text_content1' ]);?> <i class="fa fa-angle-double-right"></i>
				</a>
			<?php endif;
			
				wp_reset_postdata();
				echo $after_widget;
		}
}
register_widget( 'dentalcare_info' );