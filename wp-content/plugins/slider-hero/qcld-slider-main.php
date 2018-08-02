<?php
/**
* Plugin Name: Slider Hero
* Plugin URI: https://wordpress.org/plugins/slider-hero
* Description: Slider Hero is a Unique Hero Slider Plugin with Background Animation Effects & Website Intro Builder. Create INCREDIBLE Adverts, Animation Slider Carousels, Animated Header with Text Carousel.
* Version: 4.5.0
* Author: QuantumCloud
* Author URI: https://www.quantumcloud.com/
* Requires at least: 4.0
* Tested up to: 4.9
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit

//define global variable
$qcld_sliderhero_admin_menu_pages;
//Define table names For Slider-Hero.
global $wpdb;
define( "QCLD_TABLE_SLIDERS", $wpdb->prefix . 'qcld_slider_hero_sliders', true );
define( "QCLD_TABLE_SLIDES", $wpdb->prefix . 'qcld_slider_hero_slides', true );

define( "QCLD_sliderhero_DEFAULT_IMAGES", plugins_url( 'default_images', __FILE__ ), true );
define( "QCLD_sliderhero_CSS", plugins_url( 'css', __FILE__ ), true );
define( "QCLD_sliderhero_js", plugins_url( 'js', __FILE__ ), true );

define( "QCLD_sliderhero_IMAGES", plugins_url( 'images', __FILE__ ), true );
define( "QCLD_sliderhero_gradient", plugins_url( 'gradient', __FILE__ ), true );
define( "QCLD_sliderhero_promo", plugins_url( 'qc-promo-page', __FILE__ ), true );

require_once( 'option-tree/ot-loader.php' );
require_once( "qc-fnc/qcld_sliderhero_helper_fnc.php" );
define('QCLD_SLIDER_HERO_DIR', dirname(__FILE__));
define('QCLD_sliderhero_view', QCLD_SLIDER_HERO_DIR . "/qc-view");


require_once( "qcld-hero-gradient.php" );
require_once( "qcld-slider-framework.php" );
require_once( "qc-fnc/qcld_sliderhero_ajax.php" );
require_once( "qc-fnc/qcld_sliderhero_ajax_prev.php" );
require_once('class-qc-free-plugin-upgrade-notice.php');
require_once( "qc-view/qcld_sliderhero_slider_create.php" );
//hooks
add_action( 'admin_menu', 'qcld_sliderhero_options_panels' );
add_action( 'admin_enqueue_scripts', 'qcld_sliderhero_admin_style_script' );
add_action( "wp_loaded", "qcld_sliderhero_loaded_slider_callback" );
add_action( "wp_loaded", "qc_slider_hero_duplicate" );
add_action( 'wp_ajax_qcld_sliderhero_actions', 'qcld_sliderhero_ajax_action_callback' );

add_action( 'wp_ajax_nopriv_qcld_sliderhero_actions', 'qcld_sliderhero_ajax_action_callback' );

//activation hook for Slider-Hero
register_activation_hook( __FILE__, 'qcld_sliderhero_slider_activate');

/**
 * shortcode hooks
 */
add_shortcode( 'qcld_hero', 'qcld_qchero_resliders_shortcode' );

/* Inserting jquery */
function hero_insert_jquery(){
wp_enqueue_script('jquery', false, array(), false, false);
}
add_filter('wp_enqueue_scripts','hero_insert_jquery',1);


/*TinyMCE button for Inserting Shortcode*/
/* Add Slider Shortcode Button on Post Visual Editor */
function qclider_tinymce_button_function() {
	add_filter ("mce_external_plugins", "qslider_sld_btn_js");
	add_filter ("mce_buttons", "qcheror_sld_btn");
}

function qslider_sld_btn_js($plugin_array) {
	$plugin_array['slider_short_btn'] = plugins_url('js/qcld-tinymce-button.js', __FILE__);
	return $plugin_array;
}

function qcheror_sld_btn($buttons) {
	array_push ($buttons, 'slider_short_btn');
	return $buttons;
}

add_action ('init', 'qclider_tinymce_button_function'); 
//
add_action('wp_enqueue_scripts', 'slider_hero_font_awesome');
function slider_hero_font_awesome(){
	wp_enqueue_style( 'qcld-sliderhero-front-end-fontawesome-css', QCLD_sliderhero_CSS . '/font-awesome.min.css');
}
function qcld_sliderhero_admin_style_script($hook){
	global $qcld_sliderhero_admin_menu_pages;
	wp_enqueue_style( 'qcld_admin_slider_modal_css1', QCLD_sliderhero_CSS . "/shortcode.css");
	if(!isset($qcld_sliderhero_admin_menu_pages['main_page'])){
		return;
	}
	if (  $hook ==  $qcld_sliderhero_admin_menu_pages['main_page'] ) {
		wp_enqueue_media();
		wp_enqueue_style( 'qcld-sliderhero-admin-fontawesome-css', QCLD_sliderhero_CSS . '/font-awesome.min.css');
		
		wp_enqueue_style( 'qcld-sliderhero_gradient_css', QCLD_sliderhero_CSS . "/hero-gradient.css");
		wp_enqueue_style( 'qcld_slider_hero_css_animate', QCLD_sliderhero_CSS . "/animate.css");
	wp_enqueue_style( 'qcld_slider_hero_css', QCLD_sliderhero_CSS . "/slider_hero.css");
		wp_enqueue_script( 'qcld_hero_particles_js', QCLD_sliderhero_js . '/particles.js', array(), false, false );
	wp_enqueue_script( 'qcld_hero_particles_app_js', QCLD_sliderhero_js . "/particle_app.js", array('jquery'),$ver = false, $in_footer = false);
	
	wp_enqueue_script( 'qcld_hero_slider_app_js', QCLD_sliderhero_js . "/jquery.slider_x.js", array('jquery'));
	
	
	
	wp_enqueue_script( 'qcld_hero_slider_changeword_js', QCLD_sliderhero_js . "/jquery.changethewords2.js", array('jquery'));
		if ( ! wp_script_is( "thickbox" ) ) {
			add_thickbox();
		}
		if ( ! wp_script_is( 'jquery' ) ) {
			wp_enqueue_script( 'jquery' );
		}
		/*if ( ! wp_script_is( 'jquery-ui-sortable' ) ) {
			wp_enqueue_script( 'jquery-ui-sortable', false, array( 'jquery' ) );
		}*/
		

		wp_enqueue_script( 'qcld_sliderhero_helper_script', QCLD_sliderhero_js . '/helper.js' );
		
		wp_enqueue_script( 'qcld_sliderhero_add_slide_popups', QCLD_sliderhero_js . '/add_popup.js' );
		
		
		wp_localize_script( 'qcld_sliderhero_add_slide_popups', 'i18n_obj', array(
			'editslider_link' => admin_url( 'admin.php?page=Slider-Hero&task=editslider&id=1' ),
		) );
		
		wp_enqueue_script( 'qcld_sliderhero_ajax', QCLD_sliderhero_js . '/ajax.js' );
		wp_enqueue_script( 'qcld_sliderhero_admin_js', QCLD_sliderhero_js . '/admin.js' );
		wp_enqueue_script( 'qcld_sliderhero_gradient_js', QCLD_sliderhero_js . '/hero-gradient.js' );
		
		
		wp_enqueue_style( 'wp-color-picker' ); 
        wp_enqueue_script( 'slider_hero_custom-script-handle', QCLD_sliderhero_js . '/custom-script.js', array( 'wp-color-picker' ), false, true ); 
		//code for color picker//
		
       
		//popup script

		//popup script
		$ajax_object = array(
				'ajax_url'    => admin_url( 'admin-ajax.php' ),
				'plugin_name' => 'Slider-Hero',
				'images_url'  => untrailingslashit( QCLD_sliderhero_DEFAULT_IMAGES ),
			);
			
				if( isset($_GET['id']) ){
				$id = intval( $_GET['id'] );
				if(!$id) $id = 0;

				$ajax_object['editSlideNonce'] = wp_create_nonce('qchero_editslide_'.$id);
				$ajax_object['saveAllNonce'] = wp_create_nonce('qchero_save_all_'.$id);
				$ajax_object['saveImagesNonce'] = wp_create_nonce('qchero_save_images_'.$id);
				$ajax_object['saveImageNonce'] = wp_create_nonce('qchero_save_image_'.$id);
				$ajax_object['removeImageNonce'] = wp_create_nonce('qchero_remove_image_'.$id);
				$ajax_object['onImageNonce'] = wp_create_nonce('qchero_on_image_'.$id);
				$ajax_object['emptyNameAlert'] = __("Fill in the name before saving the slider.","qchero");
				$ajax_object['noImageAlert'] = __("Firstly add slides in your slider!","qchero");
			}
			wp_localize_script( 'qcld_sliderhero_ajax', 'qchero_ajax_object',$ajax_object);

	}
	wp_enqueue_style( 'qcld-sliderhero_admin_css', QCLD_sliderhero_CSS . "/admin.css");
}


function qcld_sliderhero_free_pop() {
?>

<script type="text/javascript">
var mainId = 'main_id';
</script>
<?php
}
add_action( 'admin_footer', 'qcld_sliderhero_free_pop');

//Add admin menu/sub-menu pages
function qcld_sliderhero_options_panels() {
	global $qcld_sliderhero_admin_menu_pages;
	add_menu_page( 'Slider Hero', 'Slider Hero', 'manage_options', 'Slider-Hero', 'qcld_sliderhero_sliders', 'dashicons-slides' );

	$qcld_sliderhero_admin_menu_pages['main_page']       = add_submenu_page( 'Slider-Hero', 'Manage Slider', 'Manage Slider', 'manage_options', 'Slider-Hero', 'qcld_sliderhero_sliders' );
	
	$qcld_sliderhero_admin_menu_pages['new_sliders'] = add_submenu_page( 'Slider-Hero', 'New Slider', 'New Slider', 'manage_options', 'New-Slider-Hero', 'qcld_sliderhero_sliders_type' );

	
	
	
	//add_submenu_page('Slider-Hero',)
	
}
require_once( 'qc-support-promo-page/class-qc-support-promo-page.php' );
function qcld_slider_hero_js()
{
	global $pagenow, $typenow;
	if (is_admin()):
		//script for daynight effect
		if(isset($_GET['type']) and $_GET['type']=='torus'):
			wp_enqueue_script( 'qcld_hero_torus_three_js', QCLD_sliderhero_js . "/three.js", array('jquery'), false, false);
			wp_enqueue_script( 'qcld_hero_torus_tweenmax_js', QCLD_sliderhero_js . "/tweenmax.js", array('jquery'), false, false);
			wp_enqueue_script( 'qcld_hero_torus_perlin_js', QCLD_sliderhero_js . "/perlin.js", array('jquery'), false, false);
		endif;	
		
		
	endif;
   
}
add_action('wp_loaded','qcld_slider_hero_js');

//shortcode setup//
function qcld_qchero_resliders_shortcode( $atts, $content, $tag ) {

	$atts = shortcode_atts( array(
		'id' => 'other'
		
	), $atts );

	return qcld_qchero_load_front_end_slider( $atts['id']);

}

/**
 * @param $id
 *
 * @return string
 */
function qcld_qchero_load_front_end_slider( $id ) {
	require_once( "qc-view/qcheror_front_end_view.php" );
	require_once( "qc-fnc/qcheror_front_end_func.php" );
	return qcld_slide_show_published_sliders( $id );
}

//hero duplicate function
function qc_slider_hero_duplicate() {

	global $wpdb;


	if(isset($_GET['page']) && $_GET['page'] == 'Slider-Hero') {
		if(isset($_GET['task']) && $_GET['task'] == 'heroduplicateslider'){
			$id       = absint($_GET['id']);
			if ( isset( $_REQUEST['slider_hero_duplicate_nonce'] ) ) {
				if ( ! wp_verify_nonce( $_REQUEST['slider_hero_duplicate_nonce'], 'slider_hero_duplicateslider_' . $id ) ) {
					die( __( 'Security check failed', 'reslide' ) );
				}
			}
			$table    = QCLD_TABLE_SLIDERS;
			$query    = $wpdb->prepare( "SELECT * FROM " . $table . " WHERE id=%d", $id );
			$r_slider = $wpdb->get_results( $query );
			$wpdb->insert(
				$table,
				array(
					'title'  => $r_slider[0]->title . ' Copy',
					'type'   => $r_slider[0]->type,
					'params' => $r_slider[0]->params,
					'time'   => $r_slider[0]->time,
					'slide'  => $r_slider[0]->slide,
					'style'  => $r_slider[0]->style,
					'custom' => $r_slider[0]->custom,
					'bg_image_url' => $r_slider[0]->bg_image_url,
					'bg_gradient' => $r_slider[0]->bg_gradient
					
				)
			);

			$last_key      = $wpdb->insert_id;
			$table         = QCLD_TABLE_SLIDES;
			$query         = $wpdb->prepare( "SELECT * FROM " . $table . " WHERE sliderid=%d", $id );
			$r_sliders     = $wpdb->get_results( $query );
			$r_slider_list = '';
			foreach ( $r_sliders as $key => $r_slider ) {
				$new_r_slider = "('";
				$new_r_slider .= $r_slider->title . "','" . $last_key . "','" . $r_slider->published . "','" . $r_slider->slide . "','" .
				                 $r_slider->description . "','" . $r_slider->image_link . "','" . $r_slider->image_link_new_tab . "','" . $r_slider->thumbnail . "','" . $r_slider->custom . "','" .
				                 $r_slider->ordering . "','" . $r_slider->type . "', '".$r_slider->btn."', '".$r_slider->stomp."')";
				$r_slider_list .= $new_r_slider . ",";
			}
			$r_slider_list = substr( $r_slider_list, 0, strlen( $r_slider_list ) - 1 );
			$query         = "INSERT into " . $table . " (title,sliderid,published,slide,description,image_link,image_link_new_tab,thumbnail,custom,ordering,type,btn,stomp)
			VALUES " . $r_slider_list;
			$wpdb->query( $query );

			wp_redirect( 'admin.php?page=Slider-Hero' );
			exit();
		}
	}

}


 // Handle adding new slider

function qcld_sliderhero_loaded_slider_callback() {
	if ( ! is_admin() ) {
		return;
	}
	if ( isset( $_GET['page'] ) && $_GET['page'] == "Slider-Hero" ) {
		if ( isset( $_GET['task'] ) ) {
			$task = sanitize_text_field($_GET['task']);
		} else {
			return;
		}
		if ( isset( $_GET["id"] ) ) {
			$id = intval( ( $_GET["id"] ) );
		} else {
			$id = 0;
		}
		require_once( "qc-fnc/qcld_sliderhero_slider_func.php" );
		
		switch ( $task ) {
			case "addslider":
				
				if ( isset( $_GET['type'] ) && $_GET['type']!='' ) {
					$type = sanitize_text_field($_GET['type']);
					qcld_sliderhero_add_slider( $type );
				}
				break;
			
		}
	} else {
		return;
	}
}

function qcld_sliderhero_sliders() {
	require_once( "qc-view/qcld_sliderhero_slider_view.php" );
	require_once( "qc-fnc/qcld_sliderhero_slider_func.php" );
	require_once( "qc-view/qcld_sliderhero_slide_edit_view.php" );
	require_once( "qc-fnc/qcld_sliderhero_slide_func.php" );
	require_once( "qc-view/qcld_sliderhero_slider_create.php" );

	if ( isset( $_GET["page"] ) ) {
		if ( isset( $_GET["task"] ) ) {
			$task = sanitize_text_field( $_GET["task"] );
			$task = esc_html( $_GET["task"] );
		} else {
			$task = '';
		}

		if ( isset( $_GET["id"] ) ) {
			$id = intval( ( $_GET["id"] ) );
		} else {
			$id = 0;
		}
		if ( isset( $_GET["slideid"] ) ) {
			$slideid = intval( ( $_GET["slideid"] ) );
		} else {
			$slideid = 0;
		}
		
		switch ( $task ) {
			case 'editslider':
				if( isset( $_GET['_wpnonce'] ) && wp_verify_nonce( $_GET['_wpnonce'], 'sliderhero_editslider_'.$id ) ){
					qcld_sliderhero_edit_slider( $id );
				}else{
					wp_die( __('<h2>Security check failed</h2>', 'qchero') );
				}
				break;
			case 'removeslider':
				if ( isset( $_GET['_wpnonce'] ) && wp_verify_nonce( $_GET['_wpnonce'], 'qcld_sliderhero_removeslider_'.$id ) ) {
					qchero_remove_slider( $id );
				}else{
					wp_die( __('<h2>Security check failed</h2>', 'qchero') );
				}
				break;
			case 'editslide':
				if ( isset( $_GET['_wpnonce'] ) && wp_verify_nonce( $_GET['_wpnonce'], 'qchero_editslide_'.$id ) ) {
					
					qchero_edit_slide( $slideid, $id );
				}else{
					wp_die( __('<h2>Security check failed</h2>', 'qchero') );
				}
				break;
			case "slidertype":
					qcld_sliderhero_sliders_type();
				
				break;
			default:
				qcld_sliderhero_sliders_list_func();
				break;
		}
	}
}



// Plugin activation function
function qcld_sliderhero_slider_activate(){
	
	global $wpdb;
	$collate = '';

	if ( $wpdb->has_cap( 'collation' ) ) {
		if ( ! empty( $wpdb->charset ) ) {
			$collate .= "DEFAULT CHARACTER SET $wpdb->charset";
		}
		if ( ! empty( $wpdb->collate ) ) {
			$collate .= " COLLATE $wpdb->collate";
		}
	}
	
	$table             = QCLD_TABLE_SLIDERS;
	$sql_sliders_Table = "
CREATE TABLE IF NOT EXISTS `$table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `type` varchar(30) NOT NULL,
  `params` mediumtext NOT NULL,
  `time` datetime NOT NULL,
  `slide` longtext,
  `style` text NOT NULL,
  `custom` text NOT NULL,
  `bg_image_url` text NOT NULL,
  `bg_gradient` text NOT NULL,
  PRIMARY KEY (`id`)
)  $collate AUTO_INCREMENT=1 ";
	$table             = QCLD_TABLE_SLIDES;
	$sql_slides_Table  = "
CREATE TABLE IF NOT EXISTS  `$table`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `sliderid` int(11) NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '1',
  `slide` longtext,
  `description` text NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `custom` text NOT NULL,
  `ordering` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `btn` text NOT NULL,
  `stomp` text NOT NULL,
  PRIMARY KEY (`id`)
)   $collate AUTO_INCREMENT = 1";
	$table             = QCLD_TABLE_SLIDERS;

/**
* default values for slider and slides *
*/	
	$table                  = QCLD_TABLE_SLIDES;
	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	dbDelta( $sql_sliders_Table );
	dbDelta( $sql_slides_Table );
	
	if ( ! $wpdb->get_var( "select count(*) from " . QCLD_TABLE_SLIDERS ) ) {
		$wpdb->insert(
			QCLD_TABLE_SLIDERS,
			array(
				'title'=>'First Slider',
				'type'=>'particle',
				'params'=>'{"autoplay":1,"pauseonhover":1,"effect":{"interval":13000},"titleffect":"bounceInLeft","deseffect":"bounceInRight","custom":{"type":"text"},"title":{"show":1,"position":"1","align":"center","style":{"width":213,"height":61,"left":"0%","top":"10%","color":"FFFFFF","opacity":0,"font":{"size":18},"border":{"color":"FFFFFF","width":1,"radius":2},"background":{"color":"FFFFFF","hover":"30FF4F"}}},"button1":{"show":1,"position":"1","align":"center","style":{"width":213,"height":61,"left":"0%","top":"60%"}},"description":{"show":1,"position":"1","align":"center","style":{"width":213,"height":61,"left":"0%","top":"30%","color":"FFFFFF","opacity":80,"font":{"size":14},"border":{"color":"3478FF","width":0,"radius":2},"background":{"color":"000000","hover":"000000"}}},"arrows":{"show":2,"type":1,"style":{"background":{"width":"49","height":"49","left":"91px 46px","right":"-44px 1px","hover":{"left":"91px 46px","right":"-44px 1px"}}}},"bullets":{"show":0,"type":"0","position":0,"autocenter":"0","rows":1,"s_x":10,"s_y":10,"orientation":1,"style":{"background":{"width":"60","height":"60","color":{"hover":"646464","active":"30FF4F","link":"CCCCCC"}},"position":{"top":"16px","left":"10px"}}}}',
				'time'=>'2016-05-02 10:58:58',
				'slide'=>'NULL',
				'style'=>'{"background":"blue;","border":"1px solid red;","color":"yellow","width":"800","height":"480","marginLeft":"0","marginRight":"0","marginTop":"0","marginBottom":"0"}',
				'custom'=>'{}'
			),
			array('%s','%s','%s','%s','%s','%s','%s')
		);
		if ( ! $wpdb->get_var( "select count(*) from " . QCLD_TABLE_SLIDES ) ) {
			//$wpdb->query( $sql_slides_Table_init );
		}
	}

    
    
    
    if(!function_exists('qcld_sliderhero_isset_table_column')) {
		function qcld_sliderhero_isset_table_column($table_name, $column_name)
		{
			global $wpdb;
			$columns = $wpdb->get_results("SHOW COLUMNS FROM  " . $table_name, ARRAY_A);
			foreach ($columns as $column) {
				if ($column['Field'] == $column_name) {
					return true;
				}
			}
		}
	}

	if ( ! @qcld_sliderhero_isset_table_column( QCLD_TABLE_SLIDES, 'stomp' ) ) {
		$table                     = QCLD_TABLE_SLIDES;
		$sql_slides_Table_update_1 = "ALTER TABLE `$table` ADD `stomp` TEXT NOT NULL;";
		@$wpdb->query( $sql_slides_Table_update_1 );
	}
	
	if ( ! qcld_sliderhero_isset_table_column( QCLD_TABLE_SLIDES, 'image_link' ) ) {
		$table                     = QCLD_TABLE_SLIDES;
		$sql_slides_Table_update_0 = "ALTER TABLE `$table` ADD `image_link` TEXT NOT NULL AFTER `description`, ADD `image_link_new_tab` BOOLEAN NOT NULL AFTER `image_link` ";
		$wpdb->query( $sql_slides_Table_update_0 );

		$table                     = QCLD_TABLE_SLIDES;
		$wpdb->update(
			$table,
			array(
				'image_link' => '',
				'image_link_new_tab' => 1,
			),
			array('id' => 1, 'sliderid' => 1)
		);
		$wpdb->update(
			$table,
			array(
				'image_link' => '',
				'image_link_new_tab' => 1,
			),
			array('id' => 2, 'sliderid' => 1)
		);
		$wpdb->update(
			$table,
			array(
				'image_link' => '',
				'image_link_new_tab' => 1,
			),
			array('id' => 3, 'sliderid' => 1)
		);
		$wpdb->update(
			$table,
			array(
				'image_link' => '',
				'image_link_new_tab' => 1,
			),
			array('id' => 4, 'sliderid' => 1)
		);
		$wpdb->update(
			$table,
			array(
				'image_link' => '',
				'image_link_new_tab' => 1,
			),
			array('id' => 5, 'sliderid' => 1)
		);
	}

}


function recursive_sanitize_text_field($array) {
    foreach ( $array as $key => &$value ) {
        if ( is_array( $value ) ) {
            $value = recursive_sanitize_text_field($value);
        }
        else {
            $value = esc_html( $value );
            
        }
    }

    return $array;
}



function qcld_sliderhero_ajax_action_callback() {

	global $wpdb;

	if ( isset( $_POST['qchero_do'] ) ) {
		$qchero_do = sanitize_text_field( $_POST['qchero_do'] );
		$qchero_do = esc_html( $_POST['qchero_do'] );

		if ( $qchero_do == 'qchero_save_all' ) {
			
			if ( isset( $_POST['id'] ) ) {
				$id = wp_kses_stripslashes( $_POST['id'] );
				$id = trim( $id, '"' );
				$id = intval( $id );
				if ( $id <= 0 ) {
					die(__( 'Invalid ID', 'qchero' ));
				}
			} else {
				die(__( 'Invalid ID', 'qchero' ));
			}

			if( !isset( $_REQUEST['nonce'] ) || ! wp_verify_nonce( $_REQUEST['nonce'], 'qchero_save_all_'.$id ) ){
				die(__( 'Security check failed', 'qchero' ));
			}

			$arrayForupdate           = array();
			$arrayForupdateFormatting = array();
			if ( isset( $_POST['custom'] ) ) {
				$custom = wp_kses_stripslashes( $_POST['custom'] );

				$arrayForupdate = array_merge( $arrayForupdate, array( 'custom' => $custom ) );
				array_push( $arrayForupdateFormatting, '%s' );
			}
			if ( isset( $_POST['style'] ) ) {
				$style = wp_kses_stripslashes( $_POST['style'] );

				$arrayForupdate = array_merge( $arrayForupdate, array( 'style' => $style ) );
				array_push( $arrayForupdateFormatting, '%s' );
			}
			if ( isset( $_POST['params'] ) ) {
				$params = wp_kses_stripslashes( $_POST['params'] );

				$arrayForupdate = array_merge( $arrayForupdate, array( 'params' => $params ) );
				array_push( $arrayForupdateFormatting, '%s' );
			}
			if ( isset( $_POST['name'] ) ) {
				$name = sanitize_text_field($_POST['name']);
				$name = wp_kses_stripslashes( $name );
				$name = trim( $name, '"' );
				$name = esc_html( $name );
			} else {
				$name = __("New Slider","Slider-Hero");
			}
			if(isset($_POST['bg_image_url'])){
				$bgurl = sanitize_text_field($_POST['bg_image_url']);
				$bgurl = wp_kses_stripslashes( $bgurl );
				$bgurl = trim( $bgurl, '"' );
				$bgurl = esc_html( $bgurl );
			}else{
				$bgurl = '';
			}
			
			if(isset($_POST['bg_gradient'])){
				$bgradient = sanitize_text_field($_POST['bg_gradient']);
				$bgradient = wp_kses_stripslashes( $bgradient );
				
			}else{
				$bgradient = '';
			}
			
			$arrayForupdate = array_merge( $arrayForupdate, array( 
				'title' => $name,
				'bg_image_url'=>$bgurl,
				'bg_gradient'=>$bgradient
			) );
			
			array_push( $arrayForupdateFormatting, '%s' );
			$wpdb->update(
				QCLD_TABLE_SLIDERS,
				$arrayForupdate,
				array( 'id' => $id ),
				$arrayForupdateFormatting,
				array( '%d' )
			);

			wp_die();
		} elseif ( $qchero_do == 'qchero_save_images' ) {
			
			if ( isset( $_POST['id'] ) ) {
				$id = wp_kses_stripslashes( $_POST['id'] );
				$id = trim( $id, '"' );
				$id = intval( $id );
				if ( $id <= 0 ) {
					die(__('Invalid ID','qchero'));
				}
			} else {
				die(__('Invalid ID','qchero'));
			}

			if( !isset( $_REQUEST['nonce'] ) || ! wp_verify_nonce( $_REQUEST['nonce'], 'qchero_save_images_'.$id ) ){
				die(__( 'Security check failed', 'qchero' ));
			}

			if ( isset( $_POST['images'] ) && ! empty( $_POST['images'] ) ) {
				$images = recursive_sanitize_text_field($_POST['images']);
			}
			
			if ( isset( $_POST['slides'] ) && ! empty( $_POST['slides'] ) && is_array( $_POST['slides'] ) ) {
				$slides = recursive_sanitize_text_field($_POST['slides']);
				
			}
			
			if ( isset( $images ) && $images != "none" ) {
				$images = array_reverse( $images );
				foreach ( $images as $image ) {
					
					$title    = sanitize_text_field( $image['title'] );
					$url    = esc_html( $image['url'] );
					
					$ordering = intval( $image['ordering'] );
					
					$wpdb->insert(
						QCLD_TABLE_SLIDES,
						array(
							'title'     => $title,
							'thumbnail' => '',
							'sliderid'  => $id,
							'custom'    => '{}',
							'image_link'    => $url,
							'ordering'  => $ordering
						),
						array(
							'%s',
							'%s',
							'%d',
							'%s',
							'%s',
							'%d'

						)
					);
				};
			}

			if ( isset( $slides ) ) {
				
				if(isset($_POST['deleteditem']) and $_POST['deleteditem']!=''){
					$delids = explode(',',sanitize_text_field($_POST['deleteditem']));
					foreach($delids as $delid){
						$wpdb->delete(
						QCLD_TABLE_SLIDES,
							array( 'id' => $delid ),
							array( '%d' )
						);
					}
				}
				
				
				foreach ( $slides as $slide ) {
					
					$image_link = esc_html( $slide['image_link'] );
					$image_link_new_tab = esc_html( $slide['image_link_new_tab'] );
					$description = esc_html( $slide['description'] );
					$btn = esc_html($slide['btn']);
					$stomp = esc_html($slide['stomp']);
					
					$title       = esc_html( $slide['title'] );
					$ordering    = intval( $slide['ordering'] );
					$wpdb->update(
						QCLD_TABLE_SLIDES,

						array(
							'title'       => $title,
							'description' => $description,
							'btn' => $btn,
							'image_link'         => $image_link,
							'image_link_new_tab' => $image_link_new_tab,
							'thumbnail'   => $slide['url'],
							'ordering'    => $ordering,
							'stomp'		=> $stomp

						),
						array( 'sliderid' => $id, 'id' => $slide['id'] ),
						array(
							'%s',
							'%s',
							'%s',
							'%s',
							'%s',
							'%s',
							'%d',
							'%s'

						),
						array( '%d', '%d' )
					);
				}
			}
			$myrows = $wpdb->get_results( "SELECT * FROM " . QCLD_TABLE_SLIDES . " WHERE sliderid = " . $id . " order by ordering desc" );
			$str    = array();
			foreach ( $myrows as $row ) {
				$st                        = '{"description":"' . wp_unslash( esc_js( $row->description ) ) . '","btn":"'.wp_unslash( esc_js( $row->btn ) ).'","id":"' . $row->id . '","title":"' . wp_unslash( esc_js( $row->title ) ) . '","image_link":"' . wp_unslash( esc_js( $row->image_link ) ). '","image_link_new_tab":"' . wp_unslash( esc_js( $row->image_link_new_tab ) ) . '","type":"' . $row->type . '","url":"' . $row->thumbnail . '","ordering":' . $row->ordering . ',"stomp":"'.wp_unslash( esc_js( $row->stomp ) ).'","published":' . $row->published . '}';
				$str[ 'slide' . $row->id ] = $st;
			};
			echo json_encode( $str );

			wp_die();
			
			//end of save images//
		} elseif ( $qchero_do == 'qchero_save_image' ) {
			if ( isset( $_POST['id'] ) ) {
				$id = wp_kses_stripslashes( $_POST['id'] );
				$id = trim( $id, '"' );
				$id = intval( $id );
				if ( $id <= 0 ) {
					die(__("Invalid ID","qchero"));
				}
			} else {
				die(__("Invalid ID","qchero"));
			}

			if( !isset( $_REQUEST['nonce'] ) || ! wp_verify_nonce( $_REQUEST['nonce'], 'qchero_save_image_'.$id ) ){
				die(__( 'Security check failed', 'qchero' ));
			}

			if ( isset( $_POST['slide'] ) ) {
				$slide = wp_kses_stripslashes( $_POST['slide'] );
				$slide = trim( $slide, '"' );
				$slide = intval( $slide );
				if ( $slide <= 0 ) {
					$slide = 1;
				}
			} else {
				$slide = 1;
			}
			if ( isset( $_POST['custom'] ) ) {
				$custom = wp_kses_stripslashes( $_POST['custom'] );
			} else {
				$custom = '{}';
			}
			if ( isset( $_POST['title'] ) ) {
				$title = sanitize_text_field( $_POST['title'] );
			} else {
				$title = "";
			}
			if ( isset( $_POST['description'] ) ) {
				$description = sanitize_text_field( $_POST['description'] );
			} else {
				$description = "";
			}
			if ( isset( $_POST['image_link'] ) ) {
				$image_link = sanitize_text_field( $_POST['image_link'] );
			} else {
				$image_link = "";
			}
			if ( isset( $_POST['image_link_new_tab'] ) ) {
				$image_link_new_tab = sanitize_text_field( $_POST['image_link_new_tab'] );
			} else {
				$image_link_new_tab = "";
			}
			$wpdb->update(
				QCLD_TABLE_SLIDES,

				array(
					'custom'      => $custom,
					'title'       => $title,
					'description' => $description,
					'image_link'         => $image_link,
					'image_link_new_tab' => $image_link_new_tab
				),
				array( 'sliderid' => $id, 'id' => $slide ),
				array(
					'%s',
					'%s',
					'%s',
					'%s',
					'%s'
				),
				array( '%d', '%d' )
			);
			wp_die();

		} elseif ( $qchero_do == 'qchero_remove_image' ) {
			if ( isset( $_POST['id'] ) ) {
				$id = wp_kses_stripslashes( $_POST['id'] );
				$id = trim( $id, '"' );
				$id = intval( $id );
				if ( $id <= 0 ) {
					die(__("Invalid ID","qchero"));
				}
			} else {
				die(__("Invalid ID","qchero"));
			}

			if( !isset( $_REQUEST['nonce'] ) || ! wp_verify_nonce( $_REQUEST['nonce'], 'qchero_remove_image_'.$id ) ){
				die(__( 'Security check failed', 'qchero' ));
			}

			if ( isset( $_POST['slide'] ) ) {
				$slide = wp_kses_stripslashes( $_POST['slide'] );
				$slide = trim( $slide, '"' );
				$slide = intval( $slide );
				if ( $slide <= 0 ) {
					die(__("Invalid Slide","qchero"));
				}
			} else {
				die(__("Invalid Slide","qchero"));
			}
			
			//removing all flip images//
			$squery   = $wpdb->prepare( "SELECT * FROM " . QCLD_TABLE_SLIDES . " WHERE id = '%d' ORDER BY ordering DESC", $slide );
			$qcherodata = $wpdb->get_results( $squery );
			
			$getthumb = $qcherodata[0]->thumbnail;
			//qcld_remove_flip_image($getthumb);
			
			if( !$wpdb->delete( QCLD_TABLE_SLIDES, array( 'id' => $slide ), array( '%d' ) ) ){
				echo json_encode(array("error"=>"Error while deleting image"));
				die;
			}
			echo json_encode(array("success"=>1,'slide'=>$slide));
			die;

		} elseif ( $qchero_do == 'qchero_on_image' ) {
			if ( isset( $_POST['id'] ) ) {
				$id = intval( $_POST['id'] );
				if ( $id <= 0 ) {
					$id = 1;
				}
			} else {
				$id = 1;
			}

			if( !isset( $_REQUEST['nonce'] ) || ! wp_verify_nonce( $_REQUEST['nonce'], 'qchero_on_image_'.$id ) ){
				die(__( 'Security check failed', 'qchero' ));
			}

			if ( isset( $_POST['slide'] ) ) {
				$slide = intval( $_POST['slide'] );
				if ( $slide <= 0 ) {
					$slide = 1;
				}
			} else {
				$slide = 1;
			}
			if ( isset( $_POST['published'] ) ) {
				$published = intval( $_POST['published'] );
			} else {
				$published = 0;
			}
			$wpdb->update(
				QCLD_TABLE_SLIDES,

				array(
					'published' => $published
				),
				array( 'id' => $slide ),
				array( '%d' )
			);
			echo $slide;
			wp_die();

		}
	}
}
add_action('admin_enqueue_scripts', 'qc_slider_hero_admin_css');
function qc_slider_hero_admin_css(){
	wp_enqueue_style( 'qcpnd-slider_hero-custom-css', QCLD_sliderhero_CSS . '/admin_style.css');
}

add_action( 'admin_menu' , 'qc_hero_help_link_submenu', 20 );
function qc_hero_help_link_submenu(){
	global $submenu;
	
	$link_text = "Help";
	$submenu["Slider-Hero"][250] = array( $link_text, 'activate_plugins' , admin_url('admin.php?page=sh-options-page#section_help') );
	ksort($submenu["Slider-Hero"]);
	
	return ($submenu);
}
