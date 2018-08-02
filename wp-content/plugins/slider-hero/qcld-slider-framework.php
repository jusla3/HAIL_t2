<?php



add_filter( 'ot_show_pages', '__return_false' );
add_filter( 'ot_show_new_layout', '__return_false' );

function qcld_slider_remove_ot_menu () {
    remove_submenu_page( 'themes.php', 'ot-theme-options' );
}

add_action( 'admin_init', 'qcld_slider_remove_ot_menu' );

add_filter( 'ot_header_version_text', 'sliderhero_ot_version_text_custom' );

function sliderhero_ot_version_text_custom()
{
	$text = 'Developed by <a href="http://www.quantumcloud.com" target="_blank">Web Design Company - QuantumCloud</a>';
	
	return $text;
}


  add_action( 'admin_bar_menu', 'sh_remove_wp_nodes', 9999 );
  function sh_remove_wp_nodes() 
  {
      global $wp_admin_bar;   
      $wp_admin_bar->remove_node( 'ot-theme-options' );
      
  }


/**
 * Hook to register admin pages 
 */
add_action( 'init', 'sliderhero_register_options_pages' );

/**
 * Registers all the required admin pages.
 */

function sliderhero_register_options_pages() {

  // Only execute in admin & if OT is installed
  if ( is_admin() && function_exists( 'ot_register_settings' ) ) {

    // Register the pages
    ot_register_settings( 
      array(
        array( 
          'id'              => 'sh_plugin_options',
          'pages'           => array(
            array(
              'id'              => 'sliderhero_options',
              'parent_slug'     => 'Slider-Hero',
              'page_title'      => 'Settings',
              'menu_title'      => 'Settings',
              'capability'      => 'edit_theme_options',
              'menu_slug'       => 'sh-options-page',
              'icon_url'        => null,
              'position'        => null,
              'updated_message' => 'Hero Options Updated.',
              'reset_message'   => 'Hero Options Reset.',
              'button_text'     => 'Save Changes',
              'show_buttons'    => true,
              'screen_icon'     => 'options-general',
              'contextual_help' => null,
			  
    'sections'        => array( 
      
      array(
        'id'          => 'custom_css',
        'title'       => __( 'Custom CSS', 'theme-text-domain' )
      ),
	  array(
        'id'          => 'custom_js',
        'title'       => __( 'Custom JS', 'theme-text-domain' )
      ),
      array(
        'id'          => 'help',
        'title'       => __( 'Help', 'theme-text-domain' )
      )
    ),
    'settings'        => array( 
      
	array(
		'label'       => 'Custom CSS',
		'id'          => 'sh_custom_style',
		'type'        => 'css',
		'desc'        => __('Write your custom CSS here.'),
		'std'         => '',
		'rows'        => '',
		'post_type'   => '',
		'taxonomy'    => '',
		'class'       => '',
		'section'     => 'custom_css'
	),
	array(
		'label'       => 'Custom Javascript',
		'id'          => 'sh_custom_js',
		'type'        => 'javascript',
		'desc'        => __('Write your custom javascript here. No need any script tag.'),
		'std'         => '',
		'rows'        => '',
		'post_type'   => '',
		'taxonomy'    => '',
		'class'       => '',
		'section'     => 'custom_js'
	),
	array(
		'label'       => __('Help'),
		'id'          => 'aid',
		'type'        => 'Textblock',
		'desc'        => '<div>
							<h3>General Settings</h3>
							<p>
								<strong><u>Custom:</u></strong>
								<br>
									This option will allow you to provide custom width and height for your slider.
								<br>
								<br>
								<strong><u>Full Width:</u></strong>
								<br>
								Provide a custom height in px for your slider. Width will be automatically calculated depending on your screen size.
								<br>
								<br>
								<strong><u>Full Screen:</u></strong>
								<br>
								
								No need to provide any width & height. It will automatically fit any screen size and auto-calculate necessary width and height.
								<br>
								<br>
								<strong><u>Auto:</u></strong>
								<br>
								
								Slider size will fit according to container width. You can define custom height.
							</p>
						</div>',
		'std'         => '',
		'rows'        => '',
		'post_type'   => '',
		'taxonomy'    => '',
		'class'       => '',
		'section'     => 'help'
	),
    )
            )
          )
        )
      )
    );

  }

}