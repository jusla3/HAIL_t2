<?php
	// Save attachment ID
	if ( isset( $_POST['ntb_submit_image_selector'] ) && isset( $_POST['ntb_image_attachment_id'] ) ) :
		update_option( 'ntb_media_selector_attachment_id', absint( $_POST['ntb_image_attachment_id'] ) );
	endif;
	wp_enqueue_media();
	if ( isset( $_POST['reset_image_selector_ntb'] ) ) :
		delete_option( 'ntb_media_selector_attachment_id' );
	endif;
	?>
<div class="sevsub-ntb box">	
	<form method='post'>
		<div class='image-preview-wrapper'>
		    <?php
			$ntb_media_selector_attachment_id = get_option( 'ntb_media_selector_attachment_id' );
			$getID_attachment_view = wp_get_attachment_url( $ntb_media_selector_attachment_id );
			$img_attachment_view = $ntb_media_selector_attachment_id ? $getID_attachment_view : NTB_BEN_URL . '/img/ntb-topics.jpeg' ;
		    ?>
			<img id='ntb_image-preview' src='<?php echo $img_attachment_view; ?>' height='60'>
		</div>
		<input id="ntb_upload_image_button" type="button" class="button" value="<?php _e( 'Upload image', 'news-ticker-benaceur' ); ?>" />
		<input type='hidden' name='ntb_image_attachment_id' id='ntb_image_attachment_id' value='<?php echo get_option( 'ntb_media_selector_attachment_id' ); ?>'>
		<input type="submit" name="ntb_submit_image_selector" value="<?php _e( 'Save image', 'news-ticker-benaceur' ); ?>" class="button-primary">
		<input type="submit" name="reset_image_selector_ntb" value="<?php _e( 'Reset default image', 'news-ticker-benaceur' ); ?>" class="button-primary">
	</form>
	<br />
</div>
<?php
	$ntb_saved_attachment_post_id = get_option( 'ntb_media_selector_attachment_id', 0 );
	?>
<script type='text/javascript'>
jQuery( document ).ready( function($) {
			// Uploading files
			var file_frame;
			var wp_media_post_id = wp.media.model.settings.post.id; // Store the old id
			var set_to_post_id = <?php echo $ntb_saved_attachment_post_id; ?>; // Set this
			jQuery('#ntb_upload_image_button').on('click', function( event ){
				event.preventDefault();
				// If the media frame already exists, reopen it.
				if ( file_frame ) {
					// Set the post ID to what we want
					file_frame.uploader.uploader.param( 'post_id', set_to_post_id );
					// Open frame
					file_frame.open();
					return;
				} else {
					// Set the wp.media post id so the uploader grabs the ID we want when initialised
					wp.media.model.settings.post.id = set_to_post_id;
				}
				// Create the media frame.
				file_frame = wp.media.frames.file_frame = wp.media({
					title: 'Select a image to upload',
					button: {
						text: 'Use this image',
					},
					multiple: false	// Set to true to allow multiple files to be selected
				});
				// When an image is selected, run a callback.
				file_frame.on( 'select', function() {
					// We set multiple to false so only get one image from the uploader
					attachment = file_frame.state().get('selection').first().toJSON();
					// Do something with attachment.id and/or attachment.url here
					jQuery( '#ntb_image-preview' ).attr( 'src', attachment.url ).css( 'width', 'auto' );
					jQuery( '#ntb_image_attachment_id' ).val( attachment.id );
					// Restore the main post ID
					wp.media.model.settings.post.id = wp_media_post_id;
				});
					// Finally, open the modal
					file_frame.open();
			});
			// Restore the main ID when the add media button is pressed
			jQuery( 'a.add_media' ).on( 'click', function() {
				wp.media.model.settings.post.id = wp_media_post_id;
			});
});
</script>
