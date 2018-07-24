<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function qchero_text_sanitize($_str ) {
	$d = html_entity_decode( $_str );
	$d = wp_kses_stripslashes( $d );
	$d = str_replace( "\n", "<br>", $d );
	$d = stripslashes( $d );

	return $d;
}

 function render_shortcode_modal_slider() {
global $wpdb;
	?>

	<div id="sm-modal" class="slidermodal">

		<!-- Modal content -->
		<div class="modal-content">
			<span class="close">×</span>
			<h3>Slider-Hero<?php _e( ' - Shortcode Maker' , 'Slider-Hero' ); ?></h3>
			<hr/>
			<div class="sm_shortcode_list">
			<div class="ilist_single_field_shortcode">
				<label style="width: 200px;display: inline-block;">Select Slider</label>
				
					<select id="slidergenerate">
						<option value="">Please select one</option>
					<?php
						$s       = 1;
						$table   = QCLD_TABLE_SLIDERS;
						$sliders = array();
						$row = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM $table WHERE %d", $s ) );
						foreach($row as $rows){
							echo $rows->id.' '.$rows->title.'</br>';
							echo '<option value="'.esc_attr($rows->id).'">'.esc_html($rows->title).'</option>';
						}
					?>
					</select>
				</div>
				<div class="ilist_single_field_shortcode">
					<label style="width: 200px;display: inline-block;"></label><input type="button" id="add_shortcode" value="Add Shortcode" />
				</div>
			</div>
		</div>

	</div>
	<?php
	exit;
}
add_action( 'wp_ajax_show_shortcodes_slider', 'render_shortcode_modal_slider');