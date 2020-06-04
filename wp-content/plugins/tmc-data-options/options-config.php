<?php

/* ------------------------------------------------------------------------ */
/* Redux Configuration
/* ------------------------------------------------------------------------ */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }

    // This is your option name where all the Redux data is stored.
    $opt_name = "dentalcare_option";
	global $logo_tmp_src;
    $theme = wp_get_theme(); // For use with some settings. Not necessary.

	$args = array(
        'opt_name'          => 'tmc_options',       // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'      => $theme->get('Name'),     // Name that appears at the top of your panel
        'display_version'   => $theme->get('Version'),  // Version that appears at the top of your panel
        'menu_type'         => 'submenu',               //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'    => false,                   // Show the sections below the admin menu item or not
        'menu_title'        => __('Theme Options', 'dentalcare'),
        'page_title'        => __('Theme Options', 'dentalcare'),
        'save_defaults'     => true,
        'async_typography'  => true,                    // Use a asynchronous font on the front end or font string
        'admin_bar'         => false,                    // Show the panel pages on the admin bar
        'global_variable'   => 'dentalcare_option',        // Set a different name for your global variable other than the opt_name
        'dev_mode'          => false,                    // Show the time the page took to load, etc
        'customizer'        => false,                    // Enable basic customizer support
        'page_slug'         => 'dentalcare_options',
        'system_info'       => false,
        'disable_save_warn' => true,                    // Disable the save warning when a user changes a field
    );

	 
	
    Redux::setArgs( $opt_name, $args, $logo_tmp_src  );

    /* Set Extensions /-------------------------------------------------- */
    Redux::setExtensions( $opt_name, dirname( __FILE__ ) . '/extensions/' );

    /* General /--------------------------------------------------------- */
    Redux::setSection( $opt_name, array(
        'title'     => __('General', 'dentalcare'),
		'desc'   => '',
        'icon'      => 'el-icon-home',
		'class'     => 'main_background',
		'submenu' => true, // Setting submenu to false on a given section will hide it from the WordPress sidebar menu!
        'fields'    => array(

			array(
                'id'       => 'switch_comments',
                'type'     => 'switch', 
                'title'    => __('Global Page Comments', 'dentalcare'),
                'subtitle' => __('You can globally disable the Page Comments.', 'dentalcare'),
                'default'  => true,
            ),
			array(
				'id'       => 'rtl_switch',
				'type'     => 'switch',
				'title'    => esc_html__('Enable RTL.', 'dentalcare'),
				'subtitle' => __('Enable / Disable RTL', 'dentalcare'),
				'default'  => false,
			),
		),
    ) );
	/* Layout  */
	
		Redux::setSection( $opt_name, array(
			'title'     => esc_html__('Layout', 'dentalcare'),
			'desc'   => '',
			'class'     => 'main_background',
			'icon'   => 'el el-th',
			'submenu' => true,
			'fields'    => array(	
			array(
				'id'       => 'top_back_button_one',
				'type'     => 'select',
				'title'    => __('Back to Top Button', 'dentalcare'),
				'subtitle' => esc_html__('Enable / Disable Back to Top Button.', 'dentalcare'),
				'options'  => array(
									'1' => 'Enable on All Devices',
									'2' => 'Enable on Desktop Only',
									'3' => 'Enable on Mobile Only',
									'4' => 'Disable'
								),
				'default'  => '1',
			),
			array(
				'id'       => 'layout_style',
				'type'     => 'select',
				'title'    => __('Layout Style', 'dentalcare'),
				'subtitle' => esc_html__('Choose your Layout Style.', 'dentalcare'),
				'options'  => array(
									'1' => 'Fullwidth',
									'2' => 'Boxed Layout',
								),
				'default'  => '1',
			), 
			array(
				'id'       => 'boxed_bg',
				'type'     => 'background',
				'compiler' => true,
				'output'   => array('body'),
				'title'    => esc_html__('Body Background', 'dentalcare'),
				'required' => array('layout_style','=','2', ),
				'default'  => ''
			),
		)
	) );
	
	/* Header /--------------------------------------------------------- */
	 
    Redux::setSection( $opt_name, array(
        'title'     => esc_html__('Header', 'dentalcare'),
		'desc'   => '',
		'class'     => 'main_background',
        'icon'   => 'el el-credit-card',
		'submenu' => true,
        'fields'    => array(
		
        array(
			'id'       => 'header_style',
			'type'     => 'image_select',
			'title'    => __('Header Layout', 'dentalcare'), 
			'subtitle' => __('Select the header Layout', 'dentalcare'),
			'description' => __('Note: Only Header 3 & 5 can be transparent.', 'dentalcare'),
			'options'  => array(
				'dentalcare_header_1'      => array(
					'alt'   => 'Header 1', 
					'img'   => plugin_dir_url( __FILE__ ) .'/images/headers/header_1.png'
				),
				
				'dentalcare_header_2'      => array(
					'alt'   => 'Header 2', 
					'img'   => plugin_dir_url( __FILE__ ) .'/images/headers/header_2.png'
				),
				'dentalcare_header_3'      => array(
					'alt'   => 'Header 3', 
					'img'   => plugin_dir_url( __FILE__ ) .'/images/headers/header_3.png'
				),
				'dentalcare_header_4'      => array(
					'alt'   => 'Header 4', 
					'img'   => plugin_dir_url( __FILE__ ) .'/images/headers/header_4.png'
				),
				'dentalcare_header_5'      => array(
					'alt'   => 'Header 5', 
					'img'   => plugin_dir_url( __FILE__ ) .'/images/headers/header_5.png'
				),
			),
			'default' => 'dentalcare_header_1'
		),
		array(
			'id'       => 'top_icon',
			'title'   => esc_html__( 'Top Bar', 'dentalcare' ),
			'type'    => 'text',
			'class'    => 'background_color',
		),
		array(
			'id'       => 'top_bar',
			'type'     => 'switch',
			'title'    => esc_html__('Enable Top Bar', 'dentalcare'),
			'default'  => true,
		),
		array(
			'id'       => 'topbar_address',
			'type'     => 'text',
			'title'    => esc_html__('Top Bar Address', 'dentalcare'),
			'default'  => esc_html__( "562, Mallin Street, New York, NY 100 254", 'dentalcare' ),
			'required' => array(
								array('top_bar','=','1', ),
								array('header_style','!=','dentalcare_header_2', ),
							)
		),
		array(
			'id'       => 'topbar_phoneText',
			'type'     => 'text',
			'title'    => esc_html__('Top Bar Phone Text', 'dentalcare'),
			'default'  => esc_html__( "Call Us Today:", 'dentalcare' ),
			'required' => array(
								array('top_bar','=','1', ),
								array('header_style','!=','dentalcare_header_2', ),
							)
		),
		array(
			'id'       => 'topbar_phone',
			'type'     => 'text',
			'title'    => esc_html__('Top Bar Phone Number', 'dentalcare'),
			'default'  => esc_html__( "(990) 654-1547 ", 'dentalcare' ),
			'required' => array(
								array('top_bar','=','1', ),
								array('header_style','!=','dentalcare_header_2', ),
							)
		),
		array(
			'id' => 'topbar_background',
			'type' => 'color_rgba',
			'title' => esc_html__('Background Color', 'dentalcare'),
			'default' => array(''),
			'output' => array( 'background' => '.index4header .top-line, #header .top_bar'),
			'required' => array(
								array('top_bar','=','1', ),
								array('header_style','!=','dentalcare_header_3'),
								array('header_style','!=','dentalcare_header_4'),
								array('header_style','!=','dentalcare_header_5'),
							)
		),
		array(
			'id' => 'tobar_text_color',
			'type' => 'color',
			'title' => esc_html__('Text color', 'dentalcare'),
			'output' => array('.tt-header .top-info, .index4header .top-info a, .top_bar p, #header .social_icon ul li i'),
			'default' => '',
			'required' => array(
								array('top_bar','=','1', ),
								array('header_style','!=','dentalcare_header_3'),
								array('header_style','!=','dentalcare_header_4'),
								array('header_style','!=','dentalcare_header_5'),
							)
		),
		array(
			'id'       => 'header_two_message',
			'type'     => 'text',
			'title'    => esc_html__('Top bar message', 'dentalcare'),
			'default'  => esc_html__( 'Welcome to Dental Care', 'dentalcare' ),
			'required' => array(
								array('top_bar','=','1', ),
								array('header_style','=','dentalcare_header_2', ),
							)
		),	
		array(
			'id'       => 'header_social',
			'type'     => 'switch',
			'title'    => esc_html__('Enable Top Bar connect social icon', 'dentalcare'),
			'required' => array('top_bar','=','1', ),
			'default'  => true,
		),
		array(
				'id'       => 'seprater_two',
				'url'      => false,
				'type'     => 'text',
				'class'    => 'background_color',
				'title'    => esc_html__('Header Settings', 'dentalcare'),
			
		),
		array(
			'id'       =>'logo_header_one',
			'url'      => false,
			'type'     => 'media',
			'title'    => esc_html__('Header One Logo', 'dentalcare'),
			'default'  => array( 'url' => plugin_dir_url( __FILE__ ) .'/images/logo/logo1.png' ),
			'required' => array('header_style','=','dentalcare_header_1', ),
			'subtitle' => esc_html__('Upload your logo here.', 'dentalcare'),
		),
		array(
			'id'       =>'logo_header_two',
			'url'      => false,
			'type'     => 'media',
			'title'    => esc_html__('Header Two Logo', 'dentalcare'),
			'default'  => array( 'url' => plugin_dir_url( __FILE__ ) .'/images/logo/logo1.png' ),
			'required' => array('header_style','=','dentalcare_header_2', ),
			'subtitle' => esc_html__('Upload your logo here.', 'dentalcare'),
		),	
		array(
			'id'       =>'logo_header_three',
			'url'      => false,
			'type'     => 'media',
			'title'    => esc_html__('Header Three Logo', 'dentalcare'),
			'default'  => array( 'url' => plugin_dir_url( __FILE__ ) .'/images/logo/logo2.png' ),
			'required' => array('header_style','=','dentalcare_header_3', ),
			'subtitle' => esc_html__('Upload your logo here.', 'dentalcare'),
		),
		array(
			'id'       =>'logo_header_four',
			'url'      => false,
			'type'     => 'media',
			'title'    => esc_html__('Header Four Logo', 'dentalcare'),
			'default'  => array( 'url' => plugin_dir_url( __FILE__ ) .'/images/logo/logo.png' ),
			'required' => array('header_style','=','dentalcare_header_4', ),
			'subtitle' => esc_html__('Upload your logo here.', 'dentalcare'),
		),
		array(
			'id'       =>'logo_header_five',
			'url'      => false,
			'type'     => 'media',
			'title'    => esc_html__('Header Five Logo', 'dentalcare'),
			'default'  => array( 'url' => plugin_dir_url( __FILE__ ) .'/images/logo/logo2.png' ),
			'required' => array('header_style','=','dentalcare_header_5', ),
			'subtitle' => esc_html__('Upload your logo here.', 'dentalcare'),
		),
		array(
			'id'       =>'mobile_logo',
			'url'      => false,
			'type'     => 'media',
			'title'    => esc_html__('Mobile Logo', 'dentalcare'),
			'default'  => array( 'url' => plugin_dir_url( __FILE__ ) .'/images/logo/logo1.png' ),
			'subtitle' => esc_html__('Upload your mobile logo here.', 'dentalcare'),
			'required' => array(
							array('header_style','!=','dentalcare_header_3'),
							array('header_style','!=','dentalcare_header_4'),
							array('header_style','!=','dentalcare_header_5'),
						)
		),
		array(
			'id'       =>'mobile_logo_two',
			'url'      => false,
			'type'     => 'media',
			'title'    => esc_html__('Mobile Logo', 'dentalcare'),
			'default'  => array( 'url' => plugin_dir_url( __FILE__ ) .'/images/logo/logo2.png' ),
			'subtitle' => esc_html__('Upload your mobile logo here.', 'dentalcare'),
			'required' => array(
							array('header_style','!=','dentalcare_header_1'),
							array('header_style','!=','dentalcare_header_2'),
							array('header_style','!=','dentalcare_header_4'),
						)
		),
		array(
			'id'       =>'mobile_logo_three',
			'url'      => false,
			'type'     => 'media',
			'title'    => esc_html__('Mobile Logo', 'dentalcare'),
			'default'  => array( 'url' => plugin_dir_url( __FILE__ ) .'/images/logo/logo.png' ),
			'subtitle' => esc_html__('Upload your mobile logo here.', 'dentalcare'),
			'required' => array(
							array('header_style','=','dentalcare_header_4')
						)
		),
		array(
			'id'       => 'header_height',
			'type'    =>  'dimensions',
			'units'    => array('em','px','%'),
			'width'   => false,
			'output'  => array('.tt-header, #header'),
			'title'   => esc_html__( 'Header Height', 'dentalcare' ),
			'subtitle' => esc_html__('Enter Header Height.', 'dentalcare'),
			'default'  => array(
								'Width'   => '', 
								'Height'  => '',
								'units'   => 'px'
							)
		),
		array(
			'id'       => 'logo_margin',
			'type'           => 'spacing',
			'output'         => array('.tt-header .top-inner, #header .header_top .logo.pull-left'),
			'mode'           => 'margin',
			'units'          => array('em','px','%'),
			'units_extended' => 'false',
			'title'   => esc_html__( 'Logo Margin', 'dentalcare' ),
			'subtitle' => esc_html__('Enter your top margin value for the logo.', 'dentalcare'),
			'default'        => array(
										'units'  => 'px',
									)
		),
		array(
			'id'       => 'nav_margin',
			'type'           => 'spacing',
			'output'         => array('.main-nav, #header .nav_bg'),
			'mode'           => 'margin',
			'units'          => array('em','px','%'),
			'units_extended' => 'false',
			'title'   => esc_html__( 'Navigation Margin', 'dentalcare' ),
			'default'        => array(
										'units'  => 'px',
									)
		),
		array(
			'id'       => 'header_pointer',
			'title'   => esc_html__( 'Address Icon', 'dentalcare' ),
			'type'    => 'text',
			'default' => esc_html__( "icon icon-Pointer", 'dentalcare' ),
			'required' => array('header_style','=','dentalcare_header_2', ),
		),
		array(
			'id'       => 'top_address_one',
			'type'     => 'text',
			'title'    => esc_html__('Header address one', 'dentalcare'),
			'required' => array('header_style','=','dentalcare_header_2', ),
			'default'  => esc_html__( '13005 Greenville Avenue', 'dentalcare' ),
		),
		array(
			'id'       => 'top_address_two',
			'type'     => 'text',
			'title'    => esc_html__('Header address two', 'dentalcare'),
			'required' => array('header_style','=','dentalcare_header_2', ),
			'default'  => esc_html__( 'California, TX 70240', 'dentalcare' ),
		),
		array(
			'id'       => 'header_phone_icon',
			'title'   => esc_html__( 'Phone Icon', 'dentalcare' ),
			'type'    => 'text',
			'default' => esc_html__( "icon icon-Phone2", 'dentalcare' ),
			'required' => array('header_style','=','dentalcare_header_2', ),
		),
		array(
			'id'       => 'top_contact_num',
			'type'     => 'text',
			'title'    => esc_html__('Header contact number', 'dentalcare'),
			'required' => array('header_style','=','dentalcare_header_2', ),
			'default'  => esc_html__( '(1800) 456 7890', 'dentalcare' ),
		),
		array(
			'id'       => 'top_contact_text',
			'type'     => 'text',
			'title'    => esc_html__('Header contact text', 'dentalcare'),
			'required' => array('header_style','=','dentalcare_header_2', ),
			'default'  => esc_html__( 'Toll Free', 'dentalcare' ),
		),
		array(
			'id'       => 'header_working_icon',
			'title'   => esc_html__( 'Working Icon', 'dentalcare' ),
			'type'    => 'text',
			'default' => esc_html__( "icon icon-Timer", 'dentalcare' ),
			'required' => array('header_style','=','dentalcare_header_2', ),
		),
		array(
			'id'       => 'top_open_time',
			'type'     => 'text',
			'title'    => esc_html__('Header opening time', 'dentalcare'),
			'required' => array('header_style','=','dentalcare_header_2', ),
			'default'  => esc_html__( 'Mon - Sat 9.00 - 19.00', 'dentalcare' ),
		),
		array(
			'id'       => 'top_open_text',
			'type'     => 'text',
			'title'    => esc_html__('Header opening text', 'dentalcare'),
			'required' => array('header_style','=','dentalcare_header_2', ),
			'default'  => esc_html__( 'Sunday CLOSED', 'dentalcare' ),
		),
		array(
				'id'       => 'seprater_one',
				'url'      => false,
				'type'     => 'text',
				'class'    => 'background_color',
				'title'    => esc_html__('Button', 'dentalcare'),
			
		),
		array(
			'id'       => 'get-a-quote',
			'type'     => 'select',
			'title'    => __( 'Get a appointment', 'dentalcare' ), 
			'data'     => 'pages',
			'default'  => '366',
		),
		array(
			'id' => 'Menu_background',
			'type' => 'color_rgba',
			'title' => esc_html__('Background Color.', 'dentalcare'),
			'default' => array(''),
			'output' => array( 'background' => '.tt-header .c-btn, .index4header .c-btn:focus,  #header .nav-search ul li a'),
		),
		array(
			'id' => 'menu_background_hover',
			'type' => 'color_rgba',
			'title' => esc_html__('Background hover color.', 'dentalcare'),
			'default' => array(''),
			'output' => array( 'background' => '.tt-header .c-btn:before,  #header .nav-search ul li a:hover'),
		),
		array(
			'id' => 'Menu_text_color',
			'type' => 'color',
			'title' => esc_html__('Text color.', 'dentalcare'),
			'output' => array('.tt-header .c-btn, #header .nav-search ul li a'),
			'default' => ''
		),
		array(
			'id' => 'text_hover_color',
			'type' => 'color',
			'title' => esc_html__('Text hover color.', 'dentalcare'),
			'output' => array('.tt-header .c-btn:hover , #header .nav-search ul li a:hover'),
			'default' => ''
		),
		array(
			'id'       => 'Sticky_info',
			'title'   => esc_html__( 'Sticky Information', 'dentalcare' ),
			'type'    => 'text',
			'class'    => 'background_color',
		),				
		array(
			'id'       => 'sticky_menu',
			'type'     => 'switch',
			'title'    => esc_html__('Sticky Header', 'dentalcare'),
			'subtitle' => __('Enable / Disable Sticky Header', 'dentalcare'),
			'default'  => true,
		),
        ),
    ) );
	 /* Menu Styling /--------------------------------------------------------- */
    Redux::setSection( $opt_name, array(
        'title'     => __('Menu', 'dentalcare'),
		'desc'   	=> '',
        'icon'      => 'el el-th-list',
		'class'     => 'main_background',
		'submenu'   => true, // Setting submenu to false on a given section will hide it from the WordPress sidebar menu!
        'fields'    => array(

		
			array(
				'id' => 'border_menu_color',
				'type' => 'color_rgba',
				'title' => esc_html__('Menu Separator Color- First level', 'dentalcare'),
				'subtitle' => '',
				'default' => array(
									'color'     => '',
								),
				'output' => array( 'border-color' => '.nav-t-holder .nav-t-footer ul.nav > li > a'),
				'required' => array(
								array('header_style','=','dentalcare_header_2')
							)
			),
			array(
				'id' => 'menu_padding_first_level',
				'title' => 'Menu Padding - First Level',
				'type' => 'spacing',
				'mode' => 'padding',
				'units' => array('px','%','em'),
				'output' => array('.nav-t-holder .nav-t-footer ul.nav > li, .tt-header .main-nav > ul > li > a'),
				'default' => array(
									'padding-top' => '', 
									'padding-right' => '', 
									'padding-bottom' => '', 
									'padding-left' => ''
								),
			),
			array(
				'id' => 'menu_margin_first_level',
				'title' => 'Menu Margin - First Level',
				'output' => array('.nav-t-holder .nav-t-footer ul.nav > li, .tt-header .main-nav > ul > li > a'),
				'type' => 'spacing',
				'mode' => 'margin',
				'units' => array('px', '%', 'em'),
			),
			array(
				'id'          => 'menu_fontsize_first_level',
				'type'        => 'typography', 
				'title'       => __('Menu- First Level', 'dentalcare'),
				'google'      => true, 
				'font-backup' => true,
				'line-height' => false,
				'output'      => array('.nav-t-holder .nav-t-footer ul.nav > li > a, .index3header .main-nav > ul > li > a, .index4header .main-nav > ul > li > a, .tt-header .main-nav > ul > li > a'),
				'units'       =>array('px','%','em'),
				'default'     => array(
										'color'       => '', 
										'font-style'  => '', 
										'font-family' => '', 
										'google'      => true,
										'font-size'   => ''
									),
			),
			array(
				'id' 		=> 'menu_bg',
				'type' 		=> 'color_rgba',
				'title' 	=> esc_html__('Menu Background Color', 'dentalcare'),
				'subtitle' 	=> '',
				'default' 	=> array(
									'color'     => '',
									'alpha'     => 1
								),
				'output' 	=> array( 'background' => '#header .nav_bg, #header .nav-search'),
				'required' 	=> array(
								array('header_style','=','dentalcare_header_2')
							)
			),
		   array(
				'id' => 'menu_color_first_level_hover',
				'type' => 'color',
				'title' => esc_html__('Menu Hover color  - First level', 'dentalcare'),
				'output' => array('.nav-t-holder .nav-t-footer ul.nav > li:hover a, .nav-t-holder .nav-t-footer ul.nav > li.active a, .tt-header .main-nav > ul > li.active > a, .tt-header .main-nav > ul > li:hover > a'),
				'default' => ''
			),
		    array(
				'id' => 'menu_active_color_first_level',
				'type' => 'color',
				'title' => esc_html__('Menu Active Color - First level', 'dentalcare'),
				'output' => array('.nav-t-holder .nav-t-footer ul.nav > li.current_page_item a, .nav-t-holder .nav-t-footer ul.nav > li.current_page_item a, .index3header .main-nav > ul > li.current-menu-item > a, .tt-header .main-nav > ul > li.current-menu-item > a'),
				'default' => ''
			),
			array(
				'id'       => 'seprater',
				'url'      => false,
				'type'     => 'text',
				'class'    => 'background_color',
				'title'    => esc_html__('Sub Menu', 'dentalcare'),    
			),
			array(
				'id' => 'sub_menu_bg',
				'type' => 'color_rgba',
				'title' => esc_html__('Sub Menu Background Color', 'dentalcare'),
				'default' => array(
									'color'     => '',
									'alpha'     => 1
								),
				'output' => array( 'background' => '.nav-t-holder .nav-t-footer ul.nav > li ul.sub-menu li, .tt-header .main-nav > ul > li > ul, .tt-header .main-nav > ul > li > ul > li > ul'),
			), 
			 array(
				'id' => 'sub_menu_bg_hover',
				'type' => 'color_rgba',
				'title' => esc_html__('Sub Menu Background Color On Hover', 'dentalcare'),
				'default' => array(
									'color'     => '',
									'alpha'     => 1
								),
				'output' => array( 'background' => '.nav-t-holder .nav-t-footer ul.nav > li ul.sub-menu li:hover > a, .tt-header .main-nav > ul > li > ul > li > a:hover, .tt-header .main-nav > ul > li > ul > li > ul > li > a:hover'),
			),
			array(
				'id'          => 'menu_fontsize_sub_level',
				'type'        => 'typography', 
				'title'       => __('Menu- Sub Level', 'dentalcare'),
				'google'      => true, 
				'font-backup' => true,
				'line-height' => false,
				'output'      => array('.nav-t-holder .nav-t-footer ul.nav > li ul.sub-menu li a, .tt-header .main-nav > ul > li > ul > li > a, .tt-header .main-nav > ul > li > ul > li > ul > li > a'),
				'units'       =>array('px','%','em'),
				'default'     => array(
										'color'       => '', 
										'font-style'  => '', 
										'font-family' => '', 
										'google'      => true,
										'font-size'   => '', 
										'line-height' => ''
									),
			),
			array(
				'id' => 'menu_color_sub_hover',
				'type' => 'color',
				'title' => esc_html__('Menu Color Hover - Sub level', 'dentalcare'),
				'output' => array('.nav-t-holder .nav-t-footer ul.nav > li ul.sub-menu li:hover > a, .tt-header .main-nav > ul > li > ul > li > a:hover, .tt-header .main-nav > ul > li > ul > li > ul > li > a:hover'),
				'default' => ''
			),
			array(
				'id' => 'sub_active_color_level',
				'type' => 'color',
				'title' => esc_html__('Menu Active Color - Sub level', 'dentalcare'),
				'output' => array('.nav-t-holder .nav-t-footer ul.nav > li ul.sub-menu li.current-menu-item > a, .tt-header .main-nav > ul > li > ul > li.current-menu-item > a'),
				'default' => ''
			),
			array(
				'id'       => 'seprater_sticky',
				'url'      => false,
				'type'     => 'text',
				'class'    => 'background_color',
				'title'    => esc_html__('Sticky Menu', 'dentalcare'),    
			   ),
			array(
				'id' => 'sticky_menu_bg',
				'type' => 'color_rgba',
				'title' => esc_html__('Sticky Menu Background Color', 'dentalcare'),
				'output' => array( 'background' => '.tt-header.stick, .fixed1, .fixed1 #header .nav_bg, .fixed1 #header .nav-search, .index3header.stick, #header .fixed1 .nav_bg'),
				'default' => array(
									'color'     => '',
									'alpha'     => 1
								),
			),
			array(
				'id'          => 'sticky_menu_color_first_level',
				'type'        => 'typography', 
				'title'       => __('Sticky Menu - first level', 'dentalcare'),
				'google'      => true, 
				'font-backup' => true,
				'output'      => array('.tt-header.stick .main-nav > ul > li > a, .fixed1 .nav-t-holder .nav-t-footer ul.nav > li > a, .tt-header.stick .main-nav > ul > li > a'),
				'units'       =>array('px','%','em'),
				'default'     => array(
										'color'       => '', 
										'font-style'  => '', 
										'font-family' => '', 
										'google'      => true,
										'font-size'   => '', 
										'line-height' => ''
									),
			),
			array(
				'id' => 'sticky_menu_color_first_level_hover',
				'type' => 'color',
				'title' => esc_html__('Sticky Menu color hover - first level', 'dentalcare'),
				'output' => '.tt-header.stick .main-nav > ul > li:hover > a, .fixed1 .nav-t-holder .nav-t-footer ul.nav > li:hover a, .tt-header.stick .main-nav > ul > li:hover > a',
				'default' => ''
			),
			array(
				'id' => 'sticky_active_color_level',
				'type' => 'color',
				'title' => esc_html__('Sticky Menu Color Active - first level', 'dentalcare'),
				'output' => array('.tt-header.stick .main-nav > ul > li.current-menu-item > a, .fixed1 .nav-t-holder .nav-t-footer ul.nav > li.current-menu-item a, .tt-header.stick .main-nav > ul > li.current-menu-item > a'),
				'default' => ''
			),
			array(
				'id'       => 'mobile-menu-seprater',
				'url'      => false,
				'type'     => 'text',
				'class'    => 'background_color',
				'title'    => esc_html__('Mobile Menu', 'dentalcare'), 	   
			),
			array(
				'id' => 'mobile_inner_background',
				'type' => 'color_rgba',
				'title' => esc_html__('Menu background color.', 'dentalcare'),
				'default' => array(''),
				'output' => array( 'background' => '.MobileHeader .tt-header .toggle-block, .MobileHeader .nav-t-holder > .nav-t-footer, .MobileHeader .tt-header .main-nav > ul > li.select > a, .MobileHeader .tt-header .main-nav > ul > li.select > a::before, .MobileHeader .tt-header .main-nav > ul > li.select > a::after'),
			),
			array(
				'id' => 'mobile_active_background',
				'type' => 'color_rgba',
				'title' => esc_html__('Active Menu background color.', 'dentalcare'),
				'default' => array(''),
				'output' => array( 'background' => '.MobileHeader .tt-header .main-nav > ul > li.current-menu-item, .MobileHeader .tt-header .main-nav > ul > li.current-menu-item > a, .MobileHeader .tt-header .main-nav > ul > li.current-menu-item > a:before, .MobileHeader .tt-header .main-nav > ul > li.current-menu-item > a:after'),
			),
			array(
				'id' => 'mobile_text_color',
				'type' => 'color',
				'title' => esc_html__('Menu text color.', 'dentalcare'),
				'output' => array('.MobileHeader .tt-header .main-nav > ul > li > a, .MobileHeader .tt-header .main-nav > ul > li > a:focus, .MobileHeader .nav-t-holder .nav-t-footer ul.nav > li > a'),
				'default' => ''
			),
			array(
				'id' => 'mobile_text_hover_color',
				'type' => 'color',
				'title' => esc_html__('Menu text hover color.', 'dentalcare'),
				'output' => array('.MobileHeader .tt-header .main-nav > ul > li:hover > a, .MobileHeader  .main_menu .nav-menu .nav-t-holder > .nav-t-footer ul.nav > li:hover > a'),
				'default' => ''
			),
			array(
				'id' => 'mobile_background_hover',
				'type' => 'color_rgba',
				'title' => esc_html__('Menu background hover color.', 'dentalcare'),
				'default' => array(''),
				'output' => array( 'background' => '.MobileHeader .tt-header .main-nav > ul > li > a:hover, .MobileHeader .tt-header .main-nav > ul > li:hover > a::before, .MobileHeader .tt-header .main-nav > ul > li:hover > a::after, .MobileHeader .nav-t-holder > .nav-t-footer ul.nav > li:hover > a, .MobileHeader .tt-header .main-nav > ul > li.select:hover > a'),
			),
			array(
				'id' => 'mobile_active_background_hover',
				'type' => 'color_rgba',
				'title' => esc_html__('Active Menu background Hover color.', 'dentalcare'),
				'default' => array(''),
				'output' => array( 'background' => '.MobileHeader .tt-header .main-nav > ul > li.current-menu-item:hover, .MobileHeader .tt-header .main-nav > ul > li.current-menu-item:hover > a, .MobileHeader .tt-header .main-nav > ul > li.current-menu-item:hover > a:before, .MobileHeader .tt-header .main-nav > ul > li.current-menu-item:hover > a:after'),
			),
			array( 
				'id'       => 'mobile_border_color',
				'type'     => 'border',
				'top'    => false, 
				'right'  => false, 
				'left'   => false,
				'title'    => __('Menu Border.', 'dentalcare'),
				'output'   => array('.MobileHeader .tt-header .main-nav > ul > li, .MobileHeader .main_menu .nav-menu .nav-t-holder > .nav-t-footer ul.nav > li > a'),
				'default'  => array(
									 'border-color'  => '', 
									 'border-style'  => 'solid', 
									 'border-top'    => '', 
									 'border-right'  => '', 
									 'border-bottom' => '', 
									 'border-left'   => ''
								)
			),
			array(
				'id'       => 'mobile-sub-menu-seprater',
				'url'      => false,
				'type'     => 'text',
				'class'    => 'background_color',
				'title'    => esc_html__('Mobile Sub Menu.', 'dentalcare'),    
			),
			array(
				'id' => 'mobile_sub_menu_background',
				'type' => 'color_rgba',
				'title' => esc_html__('Sub Menu Background Color.', 'dentalcare'),
				'default' => array(''),
				'output' => array( 'background' => '.MobileHeader .tt-header .main-nav > ul > li > ul, .MobileHeader .nav-t-holder .nav-t-footer ul.nav > li ul.sub-menu li'),
			),
			array(
				'id' => 'mobile_sub_menu_text_color',
				'type' => 'color',
				'title' => esc_html__('Sub Menu text color.', 'dentalcare'),
				'output' => array('.MobileHeader .tt-header .main-nav > ul > li > ul > li > a, .MobileHeader .nav-t-holder .nav-t-footer ul.nav > li ul.sub-menu li a'),
				'default' => ''
			),
			array(
				'id' => 'mobile_sub_menu_text_hover_color',
				'type' => 'color',
				'title' => esc_html__('Sub Menu text hover color.', 'dentalcare'),
				'output' => array('.MobileHeader .tt-header .main-nav > ul > li > ul > li:hover > a, .MobileHeader .nav-t-holder .nav-t-footer ul.nav > li ul.sub-menu li:hover > a'),
				'default' => ''
			),
			array(
				'id' => 'mobile_sub_menu_background_hover',
				'type' => 'color_rgba',
				'title' => esc_html__('Sub Menu background hover color.', 'dentalcare'),
				'default' => array(''),
				'output' => array( 'background' => '.MobileHeader .tt-header .main-nav > ul > li > ul > li > a:hover, .MobileHeader .tt-header .main-nav > ul > li > ul > li > a:hover::before, .MobileHeader .tt-header .main-nav > ul > li > ul > li > a:hover::after, .MobileHeader .nav-t-holder .nav-t-footer ul.nav > li ul.sub-menu li:hover > a'),
			),
			array( 
				'id'       => 'mobile_sub_menu_border_color',
				'type'     => 'border',
				'top'    => false, 
				'right'  => false, 
				'left'   => false,
				'title'    => __('Sub Menu Border.', 'dentalcare'),
				'output'   => array('.MobileHeader .tt-header .main-nav > ul > li > ul > li, .MobileHeader .nav-t-holder .nav-t-footer ul.nav > li ul.sub-menu li a'),
				'default'  => array(
									 'border-color'  => '', 
									 'border-style'  => 'solid', 
									 'border-top'    => '', 
									 'border-right'  => '', 
									 'border-bottom' => '', 
									 'border-left'   => ''
								)
			),
        ),
    ) );

	/* Titlebar  */
	
		Redux::setSection( $opt_name, array(
			'title'     => esc_html__('Titlebar', 'dentalcare'),
			'desc'   => '',
			'class'     => 'main_background',
			'icon'   => 'el el-text-width',
			'submenu' => true,
			'fields'    => array(

			array(
				'id'       => 'tilebar_layout_main',
				'type'     => 'switch',
				'title'    => esc_html__('Titlebar', 'dentalcare'),
				'subtitle' => esc_html__('Enable / Disable Title', 'dentalcare'),
				'default'  => true,
				),
			array(
				'id'       => 'tilebar_layout',
				'type'     => 'switch',
				'title'    => esc_html__('Background', 'dentalcare'),
				'subtitle' => esc_html__('Enable / Disable Title', 'dentalcare'),
				'default'  => true,
				'required' => array('tilebar_layout_main','=',true),
				),
			array(
				'id'       => 'title_background',
				'type'    => 'background',				
				'title'   => esc_html__( 'Title Background', 'dentalcare' ),
				'output'  => array('.tt-heading-cell'),
				'required' => array(
										array('tilebar_layout','=',true),
										array('tilebar_layout_main','=',true)
									),
				'default'  => array(
									'background-color' => '',
									'background-image' => get_template_directory_uri() . '/assets/images/tmp/inner_header.jpg'
								)
			),
			array(
				'id'       => 'seprater_eight',
				'url'      => false,
				'type'     => 'text',
				'class'    => 'background_color',
				'title'    => esc_html__('Titlebar Text', 'dentalcare'),
				'required' => array('tilebar_layout_main','=',true),
			),	
			
			array(
				'id'       => 'title_switch',
				'type'     => 'switch',
				'title'    => esc_html__('Title ', 'dentalcare'),
				'subtitle' => esc_html__('Enable / Disable Title', 'dentalcare'),
				'default'  => true,
				'required' => array('tilebar_layout_main','=',true),
				),
			array(
				'id'       => 'tilebar_tag',
				'type'     => 'select',
				'title'    => __('Default Title Tag', 'dentalcare'),
				'options'  => array(
									'h1' => 'h1',
									'h2' => 'h2',
									'h3' => 'h3',
									'h4' => 'h4',
									'h5' => 'h5',
									'h6' => 'h6',
								),
				'default'  => 'h1',
				'required' => array(
									array('title_switch','=',true),
									array('tilebar_layout_main','=',true)
									),
			),
			array(
				'id'          => 'typography_title',
				'type'        => 'typography', 
				'title'       => __('Title Text And Color', 'dentalcare'),
				'google'      => true, 
				'font-backup' => false,
				'output'      => array('.tt-heading-title.h1'),
				'units'       =>'px',
				'required' => array(
									array('title_switch','=',true),
									array('tilebar_layout_main','=',true)
									),
				'default'     => array(
										'color'       => '', 
										'google'      => true
									)
			),
		)
	) );
		
	 /* Typography  /--------------------------------------------------------- */
	
	Redux::setSection( $opt_name, array(
        'title'     => __('Typography', 'dentalcare'),
		'header'     => '',
		'desc'       => '',
		'icon_class' => 'el-icon-large',
		'icon'       => 'el-icon-font',
		'submenu'    => true,
        'fields'    => array(
							array(
									'id'             =>'typography_body',
									'type'           => 'typography',
									'title'          => esc_html__('Body', 'dentalcare'),
									'compiler'       =>true,
									'google'         =>true,
									'font-backup'    =>false,
									'font-weight'    =>true,
									'all_styles'     =>true,
									'font-style'     =>false,
									'subsets'        =>true,
									'font-size'      =>true,
									'line-height'    =>true,
									'word-spacing'   =>false,
									'letter-spacing' =>true,
									'color'          =>true,
									'preview'        =>true,
									'output'         => array('body'),
									'units'          =>'px',
									'subtitle'       => esc_html__('Select custom font for your main body text.', 'dentalcare'),
									'default'        => array(
										'font-family'=> '',
										'font-weight'=> '', 
										'height'=>'',
										'overflow-x'=> '',
										'letter-spacing'=> ''								
									)
							),
							array(
								'id'             =>'typography_p',
								'type'           => 'typography',
								'title'          => esc_html__('Paragraph', 'dentalcare'),
								'compiler'       =>true,
								'google'         =>true,
								'font-backup'    =>false,
								'font-weight'    =>true,
								'all_styles'     =>true,
								'font-style'     =>false,
								'subsets'        =>true,
								'font-size'      =>true,
								'line-height'    =>true,
								'word-spacing'   =>false,
								'letter-spacing' =>true,
								'color'          =>true,
								'preview'        =>true,
								'output'         => array('p, .slider_bottom .content .simple-text, .successful_story .success-box .simple-text, .top_bar p, #header .header-right-info ul li .single-header-right-info .text-box p, .welcomeindex3 .simple-text, .text_block.wpb_text_column p, .offer_services .simple-text, .welcome5 .tt-subtitle, .special5 .simple-text, .vc_tta.vc_general.tt-accordeon.type-1 .vc_tta-panel-body .simple-text, .dental_practice .simple-text, .book_appointment .vc_tta-panel-body .simple-text'),
								'units'          =>'px',
								'subtitle'       => esc_html__('Select custom font for your Paragraph text.', 'dentalcare'),
								'default'        => array(
									'font-family'=> '',
									'font-weight'=> '', 
									'height'=>'',
									'overflow-x'=> '',
									'letter-spacing'=> ''								
								)
							),
							array(
								'id'             =>'typography_h1',
								'type'           => 'typography',
								'title'          => esc_html__('Heading H1', 'dentalcare'),
								'compiler'       =>true,
								'google'         =>true,
								'font-backup'    =>false,
								'all_styles'     =>true,
								'font-weight'    =>true,
								'font-style'     =>false,
								'subsets'        =>true,
								'font-size'      =>true,
								'line-height'    =>true,
								'word-spacing'   =>false,
								'letter-spacing' =>true,
								'color'          =>true,
								'preview'        =>true,
								'output'         => array('h1, .h1, .simple-text.style-2 h1'),
								'units'          =>'px',
								'subtitle'       => esc_html__('Select custom font for heading h1', 'dentalcare'),
								'default'        => array(
									'color'       =>'',
									'font-family' =>'',
								)
							),
							array(
								'id'             =>'typography_h2',
								'type'           => 'typography',
								'title'          => esc_html__('Heading H2', 'dentalcare'),
								'compiler'       =>true,
								'google'         =>true,
								'font-backup'    =>false,
								'all_styles'     =>true,
								'font-weight'    =>true,
								'font-style'     =>false,
								'subsets'        =>true,
								'font-size'      =>true,
								'line-height'    =>true,
								'word-spacing'   =>false,
								'letter-spacing' =>true,
								'color'          =>true,
								'preview'        =>true,
								'output'         => array('h2, .h2, .simple-text.style-2 h2, .tt-blog-title.h5.a-color a, .tt-subtitle'),
								'units'          =>'px',
								'subtitle'       => esc_html__('Select custom font for heading h2', 'dentalcare'),
								'default'        => array(
									'color'       =>'',
									'font-family' =>'',
								)
							),
							array(
								'id'             =>'typography_h3',
								'type'           => 'typography',
								'title'          => esc_html__('Heading H3', 'dentalcare'),
								'compiler'       =>true,
								'google'         =>true,
								'font-backup'    =>false,
								'all_styles'     =>true,
								'font-weight'    =>true,
								'font-style'     =>false,
								'subsets'        =>true,
								'font-size'      =>true,
								'line-height'    =>true,
								'word-spacing'   =>false,
								'letter-spacing' =>true,
								'color'          =>true,
								'preview'        =>true,
								'output'         => array('h3, .h3, .slider_bottom .content h3, .dental_practice .content h3, .welcome5 h3, .tt-doctor-title, .simple-text.style-2 h3, .tt-featured .simple-text a, .tt-post-title, .comment-reply-title'),
								'units'          =>'px',
								'subtitle'       => esc_html__('Select custom font for heading h3 ...', 'dentalcare'),
								'default'        => array(
									'color'       =>'',
									'font-family' =>'',
								)
							),
							array(
								'id'             =>'typography_h4',
								'type'           => 'typography',
								'title'          => esc_html__('Heading H4', 'dentalcare'),
								'compiler'       =>true,
								'google'         =>true,
								'font-backup'    =>false,
								'all_styles'     =>true,
								'font-weight'    =>true,
								'font-style'     =>false,
								'subsets'        =>true,
								'font-size'      =>true,
								'line-height'    =>true,
								'word-spacing'   =>false,
								'letter-spacing' =>true,
								'color'          =>true,
								'preview'        =>true,
								'output'         => array('h4, .h4, h4.tt-banner-label, .index3welcome_side h4, .dental_impact h4, .tt-accordeon.type-1 .vc_tta-panel-heading h4.vc_tta-panel-title span, .simple-text.style-2 h4, .tt-accordeon.type-2 .vc_tta-panel-heading h4.vc_tta-panel-title span, .questions .tt-accordeon.type-2 .vc_tta-panel-heading h4.vc_tta-panel-title a span'),
								'units'          =>'px',
								'subtitle'       => esc_html__('Select custom font for heading h4 ...', 'dentalcare'),
								'default'        => array(
									'color'       =>'',
									'font-family' =>'',
								)
							),
							array(
								'id'             =>'typography_h5',
								'type'           => 'typography',
								'title'          => esc_html__('Heading H5', 'dentalcare'),
								'compiler'       =>true,
								'google'         =>true,
								'font-backup'    =>false,
								'all_styles'     =>true,
								'font-weight'    =>true,
								'font-style'     =>false,
								'subsets'        =>true,
								'font-size'      =>true,
								'line-height'    =>true,
								'word-spacing'   =>false,
								'letter-spacing' =>true,
								'color'          =>true,
								'preview'        =>true,
								'output'         => array('h5, .h5, #header .header-right-info ul li .single-header-right-info .text-box h5, .meet_section h5, .success_story h5, .simple-text.style-2 h5'),
								'units'          =>'px',
								'subtitle'       => esc_html__('Select custom font for heading h5', 'dentalcare'),
								'default'        => array(
									'color'       =>'',
									'font-family' =>'',
								)
							),
							array(
								'id'             =>'typography_h6',
								'type'           => 'typography',
								'title'          => esc_html__('Heading H6', 'dentalcare'),
								'compiler'       =>true,
								'google'         =>true,
								'font-backup'    =>false,
								'all_styles'     =>true,
								'font-weight'    =>true,
								'font-style'     =>false,
								'subsets'        =>true,
								'font-size'      =>true,
								'line-height'    =>false,
								'word-spacing'   =>false,
								'letter-spacing' =>true,
								'color'          =>true,
								'preview'        =>true,
								'output'         => array('h6, .h6, .simple-text.style-2 h6, .tt-advantage-title'),
								'units'          =>'px',
								'subtitle'       => esc_html__('Select custom font for heading h6', 'dentalcare'),
								'default'        => array(
									'color'       =>'',
									'font-family' =>'',
								)
							),
					),
		
    ) );

	  /* Social Media /--------------------------------------------------------- */
    Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Social Media', 'dentalcare' ),
		'desc'   => 'Enter social url here and then active them in footer or header options. Please add full URLs include http://',
		'icon'   => 'el el-twitter',
		'class'     => 'main_background',
		'submenu' => true,
        'fields'    => array(

				array(
					'id'       => 'enable_social',
					'type'     => 'switch',
					'title'    => esc_html__('Enable social icon', 'dentalcare'),
					'subtitle'       => esc_html__('Enable / Disable Social Icons', 'dentalcare'),
					'default'  => true,
				),
				array(
					'id'       =>'twitter-value',
					'type'     => 'text',
					'title'    => esc_html__('Twitter', 'dentalcare'),
					'subtitle' => '',
					'desc'     => esc_html__('Enter your Twitter URL.', 'dentalcare'),					'default'  => '#',
					'required' => array('enable_social','=',true)
					           
				),
				array(
					'id'       =>'facebook-value',
					'type'     => 'text',
					'title'    => esc_html__('Facebook', 'dentalcare'),
					'subtitle' => '',
					'desc'     => esc_html__('Enter your Facebook URL.', 'dentalcare'),					'default'  => '#',
					'required' => array('enable_social','=',true)
					           
				),
				array(
					'id'       =>'linkedin-value',
					'type'     => 'text',
					'title'    => esc_html__('Linkedin', 'dentalcare'),
					'subtitle' => '',
					'desc'     => esc_html__('Enter your Linkedin URL.', 'dentalcare'),					'default'  => '#',
					'required' => array('enable_social','=',true)
					           
				),
				array(
					'id'       =>'pinterest-value',
					'type'     => 'text',
					'title'    => esc_html__('Pinterest', 'dentalcare'),
					'subtitle' => '',
					'desc'     => esc_html__('Enter your Pinterest URL.', 'dentalcare'),
					'required' => array('enable_social','=',true)
					           
				),
				array(
					'id'       =>'google-value',
					'type'     => 'text',
					'title'    => esc_html__('Google', 'dentalcare'),
					'subtitle' => '',
					'desc'     => esc_html__('Enter your Google URL.', 'dentalcare'),					'default'  => '#',
					'required' => array('enable_social','=',true)
					           
				),
				
				array(
					'id'       =>'instagram-value',
					'type'     => 'text',
					'title'    => esc_html__('Instagram', 'dentalcare'),
					'subtitle' => '',
					'desc'     => esc_html__('Enter your Instagram URL.', 'dentalcare'),
					'required' => array('enable_social','=',true)
					           
				),				
				array(
					'id'       =>'yelp-value',
					'type'     => 'text',
					'title'    => esc_html__('Yelp', 'dentalcare'),
					'subtitle' => '',
					'desc'     => esc_html__('Enter your Yelp URL.', 'dentalcare'),
					'required' => array('enable_social','=',true)
					           
				),
				
				array(
					'id'       =>'foursquare-value',
					'type'     => 'text',
					'title'    => esc_html__('Foursquare', 'dentalcare'),
					'subtitle' => '',
					'desc'     => esc_html__('Enter your Foursquare URL.', 'dentalcare'),
					'required' => array('enable_social','=',true)
					           
				),
				array(
					'id'       =>'flickr-value',
					'type'     => 'text',
					'title'    => esc_html__('Flickr', 'dentalcare'),
					'subtitle' => '',
					'desc'     => esc_html__('Enter your Flickr URL.', 'dentalcare'),
					'required' => array('enable_social','=',true)
					           
				),

				array(
					'id'       =>'youtube-value',
					'type'     => 'text',
					'title'    => esc_html__('Youtube', 'dentalcare'),
					'subtitle' => '',
					'desc'     => esc_html__('Enter your Youtube URL.', 'dentalcare'),
					'required' => array('enable_social','=',true)
					           
				),

				array(
					'id'       =>'email-value',
					'type'     => 'text',
					'title'    => esc_html__('Email', 'dentalcare'),
					'subtitle' => '',
					'desc'     => esc_html__('Enter your Email URL.', 'dentalcare'),
					'required' => array('enable_social','=',true)
					           
				),
				array(
					'id'       =>'rss-value',
					'type'     => 'text',
					'title'    => esc_html__('Rss', 'dentalcare'),
					'subtitle' => '',
					'desc'     => esc_html__('Enter your Rss URL.', 'dentalcare'),
					'required' => array('enable_social','=',true)
					           
				),			
        ),
    ) );

	/* Blog Pages Layout /--------------------------------------------------------- */
	
		Redux::setSection( $opt_name, array(
			'title'     => esc_html__('Blog', 'dentalcare'),
			'desc'   => '',
			'class'     => 'main_background',
			'icon'   => 'el el-globe',
			'submenu' => true,
			'fields'    => array(
			array(
				'id'       => 'blog_background',
				'type'    => 'background',				
				'title'   => esc_html__( 'Background', 'dentalcare' ),
				'output'  => array('.blog .tt-heading-cell'),
				'default'  => array(
									'background-color' => '',
									'background-image' => get_template_directory_uri() . '/assets/images/tmp/inner_header.jpg'
								)
			),
			array(
				'id'       => 'blog_title',
				'title'   => esc_html__( 'Blog Title', 'dentalcare' ),
				'subtitle' => esc_html__('Title for the blog page.', 'dentalcare'),
				'type'    => 'text',
				'default' => esc_html__( 'Blog', 'dentalcare' )
			),
			array(
				'id'       => 'blog_metadata',
				'type'     => 'switch',
				'title'    => esc_html__('Metadata on Blog Posts', 'dentalcare'),
				'subtitle'       => esc_html__('Enable / Disable Metadata on Blog Posts.', 'dentalcare'),
				'default'  => true,
			),
			array(
				'id'       => 'blog_multi_checkbox',
				'type'     => 'checkbox',
				'title'    => __('Metadata Options', 'dentalcare'), 
				'subtitle' => __('Check the Metadata you want to show on Blog Posts.', 'dentalcare'),
				'options'  => array(
					'1' => 'Date',
					'2' => 'Author',
					'3' => 'Comments',
					'4' => 'Tags(Only on Blog Post Details.)'
				),
				'default' => array(
					'1' => '1', 
					'2' => '1', 
					'3' => '1',
					'4' => '1'
				),
				'required' => array('blog_metadata','=',true)
			),
			
			array(
				'id'       => 'blog_sidebar_type',
				'type'    => 'button_set',
				'title'   => esc_html__( 'Sidebar Type', 'dentalcare' ),
				'options' => array(
					'wp' => esc_html__( 'Wordpress Sidebars', 'dentalcare' ),
					'vc' => esc_html__( 'VC Sidebars', 'dentalcare' )
				),
				'default' => 'wp'
			),
			
			array(
				'id'       => 'blog_wp_sidebar',
				'type'      => 'select',
				'data' => 'sidebars',
				'title'     => esc_html__( 'Wordpress Sidebar', 'dentalcare' ),
				'default'   => 'dentalcare-right-sidebar',
				'required'  => array('blog_sidebar_type','=','wp')
			),
			 array(
			'id'       => 'blog_vc_sidebar',
			'type'     => 'select',
			'multi'    => false,
			'data'     => 'posts',
			'args'     => array( 'post_type' =>  array( 'sidebar', 'nyheter_forbundet', 'stup' ), 'numberposts' => -1 ),
			'title'    => esc_html__( 'VC Sidebar', 'dentalcare' ),
			'required' => array('blog_sidebar_type','=','vc', ),
			),
			array(
				'id'       => 'blog_sidebar_position',
				'type'    => 'image_select',
				'title'   => esc_html__( 'Blog Layout', 'dentalcare' ),
				'subtitle' => __('Select the Sidebar Position for Blog Pages.', 'dentalcare'),
				'options' => array(
					'left'  => array(
									'alt'   => '1', 
									'img'   => plugin_dir_url( __FILE__ ) .'/images/blogLayout/layout-1.jpg'
								),
					'right' => array(
									'alt'   => '2', 
									'img'   => plugin_dir_url( __FILE__ ) .'/images/blogLayout/layout-2.jpg'
								)
				),
				'default' => 'right'
			),
			array(
				'id'       => 'blog_pagination',
				'type'     => 'switch',
				'title'    => esc_html__('Previous / Next Pagination', 'dentalcare'),
				'subtitle'       => esc_html__('Enable / Disable pagination for Blog Pages.', 'dentalcare'),
				'default'  => true,
			),
			array(
				'id'       => 'seprater_blog_one',
				'url'      => false,
				'type'     => 'text',
				'class'    => 'background_color',
				'title'    => esc_html__('Blog Post Detail Page', 'dentalcare'),
				
			),
			array(
				'id'       => 'detail_sidebar_position',
				'type'    => 'image_select',
				'title'   => esc_html__( 'Blog Detail Layout', 'dentalcare' ),
				'subtitle' => __('Select the Sidebar Position for Blog Detail Pages.', 'dentalcare'),
				'options' => array(
					'left'  => array(
									'alt'   => '1', 
									'img'   => plugin_dir_url( __FILE__ ) .'/images/blogLayout/layout-1.jpg'
								),
					'right' => array(
									'alt'   => '2', 
									'img'   => plugin_dir_url( __FILE__ ) .'/images/blogLayout/layout-2.jpg'
								)
				),
				'default' => 'right'
			),
			array(
				'id'       => 'blogdetail_metadata',
				'type'     => 'switch',
				'title'    => esc_html__('Metadata on Blog Detail Posts', 'dentalcare'),
				'subtitle'       => esc_html__('Enable / Disable Metadata on Blog Detail Pages.', 'dentalcare'),
				'default'  => true,
			),
			array(
				'id'       => 'blogdetail_multi_checkbox',
				'type'     => 'checkbox',
				'title'    => __('Metadata Options Of Blog Detail Page', 'dentalcare'), 
				'subtitle' => __('Check the Metadata you want to show on Blog Detail Pages.', 'dentalcare'),
				'options'  => array(
					'date' => 'Date',
					'author' => 'Author',
					'comment' => 'Comments',
					'tag' => 'Tags(Only on Blog Post Details.)'
				),
				'default' => array(
					'date'    => '1', 
					'author'  => '1', 
					'comment' => '1',
					'tag'     => '1'
				),
				'required' => array('blogdetail_metadata','=',true)
			),
		)
	) );
		/* Lightbox  */
	
		Redux::setSection( $opt_name, array(
			'title'     => esc_html__('Lightbox', 'dentalcare'),
			'desc'   => '',
			'icon'   => 'el el-idea',
			'class'     => 'main_background',
			'submenu' => true,
			'fields'    => array(
				
			array(
				'id'       => 'lightbox_mobile',
				'type'     => 'switch',
				'title'    => esc_html__('Lightbox on Smartphones', 'dentalcare'),
				'subtitle' => esc_html__('Enable / Disable Lightbox Icon on small devices (under 500px width).', 'dentalcare'),
				'default'  => true,
				),
			
			array(
				'id'       => 'light_title',
				'type'     => 'switch',
				'title'    => esc_html__('Show Title', 'dentalcare'),
				'subtitle' => esc_html__('Enable / Disable to show the Title.', 'dentalcare'),
				'default'  => true,
			),
			
		)
	) );
	
		 /* Footer /--------------------------------------------------------- */
		 
		 
		 Redux::setSection( $opt_name, array(
        'title'     => __('Footer', 'dentalcare'),
		'header'     => '',
		'desc'       => '',
		'icon'       => 'el-icon-photo',
		'class'     => 'main_background',
		'submenu'    => true,
        'fields'    =>  array(

				
	
				array(
				'id'       => 'footer_widget',
				'type'     => 'switch',
				'title'    => esc_html__('Footer Widget Area', 'dentalcare'),
				'subtitle' => __('Enable / Disable Widgetzed Footer Area', 'dentalcare'),
				'default'  => true,
			    ),
				
				array(
					'id'       => 'footer_sidebar_count',
					'type'     => 'image_select',
					'title'    => __('Footer Widget Columns', 'dentalcare'), 
					'subtitle' => __('Select Footer Columns', 'dentalcare'),
					'description' => __('', 'dentalcare'),
					'options'  => array(
						'1'      => array(
							'alt'   => '1', 
							'img'   => plugin_dir_url( __FILE__ ) .'/images/footers/col-1.jpg'
						),
						
						'2'      => array(
							'alt'   => '2', 
							'img'   => plugin_dir_url( __FILE__ ) .'/images/footers/col-2.jpg'
						),
						'3'      => array(
							'alt'   => '3', 
							'img'   => plugin_dir_url( __FILE__ ) .'/images/footers/col-3.jpg'
						),
						'4'      => array(
							'alt'   => '4', 
							'img'   => plugin_dir_url( __FILE__ ) .'/images/footers/col-4.jpg'
						)
					),
					'default' => '3',
					'required' => array('footer_widget','=',true)
				),
				array(
					'id'       => 'footer_widget_bg',
					'type'     => 'background',
					'compiler' => true,
					'output'   => array('.tt-footer'),
					'title'    => esc_html__('Footer Widget Background', 'dentalcare'),
					'default'  => array( ),
					'required' => array('footer_widget','=',true)
				),
				array(
					'id' => 'footer_widget_color',
					'type' => 'color',
					'title' => esc_html__('Heading color.', 'dentalcare'),
					'output' => array('.tt-foooter-title'),
					'default' => '',
					'required' => array('footer_widget','=',true)
				),
				array(
					'id' => 'footer_text_color',
					'type' => 'color',
					'title' => esc_html__('Text color.', 'dentalcare'),
					'output' => array('p.about-us-widget, footer .simple-text.dark, .footer-2 #menu-custom a'),
					'default' => '',
					'required' => array('footer_widget','=',true)
				),
				array(
					'id'       => 'footer_social_enable',
					'type'     => 'switch',
					'title'    => esc_html__('Enable Footer connect social icon', 'dentalcare'),
					'default'  => true,
					'required' => array('footer_widget','=',true)
				),
				array(
					'id'       => 'seprater_three',
					'url'      => false,
					'type'     => 'text',
					'class'    => 'background_color',
					'title'    => esc_html__('Copyright', 'dentalcare'),
				
				),
					
				array(
				'id'       => 'copyright_switch',
				'type'     => 'switch',
				'title'    => esc_html__('Copyright Area', 'dentalcare'),
				'subtitle' => __('Enable / Disable Copyright Area', 'dentalcare'),
				'default'  => true,
			    ),
				array(
					'id'       => 'footer_copyright_bg',
					'type'     => 'background',
					'compiler' => true,
					'output'   => array('.tt-copy'),
					'title'    => esc_html__('Footer Copyright Background', 'dentalcare'),
					'default'  => array( ),
					'required' => array('copyright_switch','=',true, )
				),
				array(
					'id' => 'footer_copyright_color',
					'type' => 'color',
					'title' => esc_html__('Text color.', 'dentalcare'),
					'output' => array('.tt-copy'),
					'default' => '',
					'required' => array('copyright_switch','=',true)
				),
				array(
					'id'       => 'footer_copyright',
					'type'     => 'textarea',
					'title'    => esc_html__('Copyright Text', 'dentalcare'),
					'subtitle' => __('Enter your Copyright Text (HTML allowed).', 'dentalcare'),
					'default'  => esc_html__( 'Copyright © Dental Care '.date("Y").'. All rights reserved.', 'dentalcare'),
					'required' => array('copyright_switch','=',true, )
			    ),
				array(
					'id'       => 'copyright_right_switch',
					'type'     => 'switch',
					'title'    => esc_html__('Copyright Right Area', 'dentalcare'),
					'subtitle' => __('Enable / Disable Copyright Right Area', 'dentalcare'),
					'default'  => true,
					'required' => array('copyright_switch','=',true, )
			    ),
				array(
					'id'       => 'copy_right_first',
					'type'      => 'text',
					'title'     => esc_html__( 'Copyright Author Info', 'dentalcare' ),
					'default'   => esc_html__('Developed by:', 'dentalcare'),
					'required' => array('copyright_right_switch','=',true, )
				),
				array(
					'id'       => 'copy_right',
					'type'      => 'text',
					'title'     => esc_html__( 'Copyright Right Content', 'dentalcare' ),
					'default'   => esc_html__('DesignArc', 'dentalcare'),
					'required' => array('copyright_right_switch','=',true, )
				),
				array(
					'id'       => 'copy_right_link',
					'type'      => 'text',
					'title'     => esc_html__( 'Copyright Right Content Link', 'dentalcare' ),
					'default'   => esc_html__('https://themeforest.net/user/designarc', 'dentalcare'),
					'required' => array('copyright_right_switch','=',true, )
				),
				
		)
			) );
/* ------------------------------------------------------------------------ */
/* Custom function for dentalcare theme's own CSS
/* ------------------------------------------------------------------------ */

function tmc_option_styles() {
    $plugin_url =  plugins_url('', __FILE__);
    wp_enqueue_style( 'admin-styles', $plugin_url . '/style.css', null, null, 'all' );
}

add_action( 'admin_enqueue_scripts', 'tmc_option_styles' );