<?php

/**
 * Process a settings export that generates a .xml file.
 */
function ntb_process_settings_export() {
	if( empty( $_POST['ntb_action'] ) || 'export_settings' != $_POST['ntb_action'] )
		return;
	if( ! wp_verify_nonce( $_POST['ntb_export_nonce'], 'ntb_export_nonce' ) )
		return;
	//date_i18n( 'Y-m-d__H:i:s', current_time( 'timestamp', 0 ) )
    $filename = 'news-ticker-benaceur-settings-export-' . date("d-M-Y__H-i",time() + ( get_option( 'gmt_offset' ) *60*60*get_option( 'news_ticker_benaceur_time_export_sett_gmt' ) )) . '.xml';
 
	nocache_headers(); 
	header( 'Content-Type: text/xml; charset='. get_option( 'blog_charset') .'' );
	header( 'Content-disposition: attachment; filename='.$filename.'' );
	// cache
    header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1
    header("Pragma: no-cache"); // HTTP 1.0
    header("Expires: 0"); // Proxies
	
   
   global $AllOptionsNTB,$AllOptionssNTB,$AllOptions_anim_NTB;
   $AllOptions_ie_ntb = array (array("",$AllOptionsNTB),array("",$AllOptionssNTB),array("",$AllOptions_anim_NTB),
   array("",array('news_ticker_benaceur_delete_all_options','news_ticker_benaceur_ntb_st_code'))
   );
  
  foreach($AllOptions_ie_ntb as $inner) {
	
	if (is_array($inner)) {
	foreach ($inner[1] as $optionN_ntb) {	
	$options = array($optionN_ntb => get_option($optionN_ntb));
	foreach ($options as $key => $value) {
            $value = maybe_unserialize($value);
            $need_options[$key] = $value;
        }
    $xml_file = json_encode($need_options);
  }
  }
  }
  
    echo $xml_file;
  	
	exit;
}
add_action( 'admin_init', 'ntb_process_settings_export' );
/**
 * Process a settings import from a xml file.
 */
function ntb_process_settings_import() {
	global $themename;
	if( empty( $_POST['ntb_action'] ) || 'import_settings' != $_POST['ntb_action'] )
		return;
	if( ! wp_verify_nonce( $_POST['ntb_import_nonce'], 'ntb_import_nonce' ) )
		return;
	if( ! current_user_can( 'manage_options' ) )
		return;
	$extension = end( explode( '.', $_FILES['NTB_import_file']['name'] ) );
	if( $extension != 'xml' ) {
		wp_die( __( 'Please upload a valid .xml file' ) );
	}
	$import_file = $_FILES['NTB_import_file']['tmp_name'];
	if( empty( $import_file ) ) {
		wp_die( __( 'Please upload a file to import' ) );
	}
	// Retrieve the settings from the file and convert the xml object to an array.
	
// Lit ligne par ligne

$file_impor = file_get_contents($import_file);
                        $options = json_decode($file_impor, true);
                        foreach ($options as $key => $value) {
                            update_option($key, $value);
                        }
	 
	
	wp_safe_redirect( admin_url( NTB_BEN_O_G.'?page='.NS_TR_BEN.'#ntb-top-import-setts' ) );
	exit;
}
add_action( 'admin_init', 'ntb_process_settings_import' );
