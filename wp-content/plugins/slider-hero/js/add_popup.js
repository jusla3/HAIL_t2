jQuery(function ($) {
    /*** Pro ***/

    $(document).ready(function () {


        function initSave() {
            jQuery('input.text').each(function () {
                var val = jQuery(this).val();
                val = val.ReslideReplaceAll('"', '&#34;');
                val = val.ReslideReplaceAll("'", '&#39;');
                val = val.ReslideReplaceAll("\\", '');
                jQuery(this).val(val);
            })
        }
        initSave();
        jQuery('#qchero_sliders_list .delete').click(function () {
            var t = confirm("You are going to permanently delete this slider...");
            if (!t)
                return false;
        });

        jQuery('.qchero-nodisplay').submit(function () {
            return false;
        });
		jQuery('#qchero_slider_images_list').on('click','.qcheroitem .edit-image',function(){
			var $this = jQuery(this);
			var slideId = $this.parents('.qcheroitem').attr('id');
			open_media_window.apply($this,['image',{'slide_image':slideId}]);
			return false;

		});
        $('#qchero_slider_insert_popup select').change(function () {
            var id = $(this).find('option:selected').val();
            id = parseInt(id);
            if (id) {
                add_shortcode($(this).find('option:selected').val());
                jQuery('#R-slider option:first-child').attr('selected', 'selected');
            }
        });
        //jQuery('#add_image').click(open_media_window);

//slide image upload script//		
jQuery('#qchero_slider_images_list').on('click','.qchero_slide_image_upload',function(e){
	e.preventDefault();
	var slideid = jQuery(this).attr('data-slide-id');
        var image = wp.media({ 
            title: 'Slide Image Uploader',
            // mutiple: true if you want to upload multiple files at once
            multiple: false
        }).open()
        .on('select', function(e){
            // This will return the selected image from the Media Uploader, the result is an object
            var uploaded_image = image.state().get('selection').first();
            var image_url = uploaded_image.toJSON().url;
            // Let's assign the url value to the input field
			
			var parentid = 'qcheroitem_'+slideid;
			$('#'+parentid).find('.qcheroitem-add-url').val(image_url);
			jQuery('.qchero_save_all').click();
        });
})
//slide image remove script//

jQuery('#qchero_slider_images_list').on('click','.qchero_slide_image_remove',function(e){
	e.preventDefault();
	var slideid = jQuery(this).attr('data-slide-id');
	var parentid = 'qcheroitem_'+slideid;
	$('#'+parentid).find('.qcheroitem-add-url').val('');
	jQuery('.qchero_save_all').click();
})

        jQuery('#add_image').on ("click", function(){
			ordering = jQuery('.qcheroitem').length;
			ordering++;
			 jQuery('#qchero_slider_images_list').prepend(['<li class="qcheroitem add">',
				'<form style="display:block;">',
				'<input type = "hidden" class="qcheroitem-edit-title" value="Default Title">',
				'<textarea class="qcheroitem-edit-description">Subtitle</textarea>',
				'<input type = "hidden" class="qcheroitem-add-url" value="">',
				'<input type = "hidden" class="qcheroitem-add-btn" value="" placeholder="Click To Add Button">',
				'<input type = "hidden" class="qcheroitem-ordering" value="' + (ordering) + '">',
				'</form>',
				'</li>'
			].join(""));
			jQuery('#qchero_slider_images_list .noimage').hide();
			jQuery('.qchero_save_all').click();
		});
        /****    edit items ***/

        jQuery('#qchero_slider_images_list ').on('click', '.quick_edit', function () {
            var form = jQuery(this).parents('.qcheroitem').find('form');
            form.toggle(218);
            return false;
        })

        jQuery('#qchero_slider_images_list form').on('click', '.quick_edit', function () {
            var form = jQuery(this).parents('.qcheroitem').find('form');
            form.toggle(218);
            return false;
        })
    });

    /*** sortable ***/
	if(jQuery("#qchero_slider_images_list").length) {
		var minHeight = jQuery('#qchero_slider_images_list').height();
        if( jQuery("#qchero_slider_images_list li").length > 1 ){
            jQuery("#qchero_slider_images_list").sortable({
                start: function () {
                    jQuery('#qchero_slider_images_list').css('min-height', minHeight + 'px');
                },
                stop: function () {
                    var allSlidesCount = jQuery('.qcheroitem').length, i = 0;
                    jQuery('.qcheroitem').each(function () {
						jQuery(this).find('.qcheroitem-ordering').val(allSlidesCount - i);
                       jQuery(this).find('.slide-order-number').html(allSlidesCount - i);
                        i++;
                    })
                },
                revert: true
            }); 
        }

	}

});
function open_media_window() {
    var type = '', ordering = 0;
	var globalArguments = arguments;
    arguments.indexOf = [].indexOf;
    if (arguments.indexOf("image") > -1)
        type = 'qchero_image';
    var t = _qchero();
	
    if (this.window === undefined) {
        this.window = wp.media({
            title: 'Insert a media',
            multiple: true,
            button: {text: 'Insert'}
        });

        var self = this; // Needed to retrieve our variable in the anonymous function below
		
        if (!type) {
			
            self.window.on('select', function () {
                var attachment = self.window.state().get('selection').toJSON();
                ordering = jQuery('.qcheroitem').length;
				alert(attachment.length);
                attachment.forEach(function (item) {
					
                    if (item.type != 'video') {
                        ordering++;
						
						jQuery('#qchero_slider_images_list').prepend(['<li class="qcheroitem add">',
							'<form style="display:block;">',
							'<input type = "hidden" class="qcheroitem-edit-title" value="Default Title">',
							'<textarea class="qcheroitem-edit-description">Subtitle</textarea>',
							'<input type = "hidden" class="qcheroitem-add-url" value="' + item.url + '">',
							'<input type = "hidden" class="qcheroitem-add-btn" value="" placeholder="Click To Add Button">',
							'<input type = "hidden" class="qcheroitem-ordering" value="' + (ordering) + '">',
							'</form>',
							'</li>'
						].join(""));
						jQuery('#qchero_slider_images_list .noimage').hide();
						jQuery('.qchero_save_all').click();
					
                    }
                });
				
                //jQuery('.qchero_save_all').click();
            });
        }
        self.window.open();
    }
    else {
        if (this.window) {
            this.window.open();
        }
    }
    return false;
}
function getAddedImages() {
    var slides = {};
    var i = 0;
    jQuery('.qcheroitem.add form').each(function () {
        var slide = {};
        slide.title = jQuery(this).find('.qcheroitem-edit-title').val();
        slide.description = jQuery(this).find('.qcheroitem-edit-description').val();
        slide.url = jQuery(this).find('.qcheroitem-add-url').val();
        slide.type = jQuery(this).find('.qcheroitem-add-type').val();
        slide.ordering = jQuery(this).find('.qcheroitem-ordering').val();
        slides['slide' + i] = slide;
        i++;
    });
    if (i)
        return slides;
    return "none";
}
function getExistImagesId() {
    var ids = [];
    for (var slide in qcheror.slides) {
        ids.push(qcheror.slides[slide]['id']);
    }
    ids = ids.join();
    ids = "(" + ids + ")";
    return ids;
}

function getSlidesInput() {
    jQuery('#qchero_slider_images_list li.qcheroitem').not('.add').each(function () {
        var id = jQuery(this).attr('id'), type, title, description, image_link, url, ordering;
        id = id.replace('qcheroitem_', '');
        title = jQuery(this).find('.qcheroitem-edit-title').val();
        //description = jQuery(this).find('.qcheroitem-edit-description').val();
        description = jQuery(this).find('.qcheroitem-edit-description').val();
        //console.log(title);
		buttondata = jQuery(this).find('.qcheroitem-add-btn').val();
        ordering = jQuery(this).find('.qcheroitem-ordering').val();
        url = jQuery(this).find('.qcheroitem-add-url').val();
		stomp = jQuery(this).find('.qcheroitem-stomp-value').val();
		
        qcheror['slides']['slide' + id]['title'] = title;
        qcheror['slides']['slide' + id]['description'] = description;  
        qcheror['slides']['slide' + id]['id'] = id;
        qcheror['slides']['slide' + id]['btn'] = buttondata;
       qcheror['slides']['slide' + id]['ordering'] = ordering;
       qcheror['slides']['slide' + id]['image_link'] = url;
	   qcheror['slides']['slide' + id]['stomp'] = stomp;
		
    })
	
}