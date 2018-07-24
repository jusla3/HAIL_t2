(function( $ ) {
 $(function() {
	function qchero_loading() {
		var popup = jQuery('#qchero_loading_overlay');
		if(arguments[0] === false)
			popup.css('display','none');
		else 
			popup.css('display','block');
	}
	
	jQuery('.qchero_save_all2').on('click', function(e){
		jQuery('.qchero_save_all').click();
	})
	
	jQuery('.qchero_save_all').on('click',function(e){
		
		$('#preview_qchero').removeAttr('needsave');
		
		var allSlidesCount = jQuery('.qcheroitem').length, i = 0;
		jQuery('.qcheroitem').each(function () {
			jQuery(this).find('.qcheroitem-ordering').val(allSlidesCount - i);
		    jQuery(this).find('.slide-order-number').html(allSlidesCount - i);
			i++;
		})
		
		jQuery("#save_slider").click();
        /*if(jQuery('input.qcheroitem-edit-title').val() == ''){
            alert(qchero_ajax_object.emptyNameAlert);
            return false;
        }*/
		/*if(!_qchero._('.qcheroitem').length) {
			alert(qchero_ajax_object.noImageAlert);
			return false;
		}*/
		
		
		jQuery('#qchero_preview').click();
		qcheroGetSliderParams('custom');
		qcheroGetSliderMainOptions();
		qcheroGetSliderParams();
		qcheroGetSliderStyles();
		
		var data = {
			'action': 'qcld_sliderhero_actions',
			'qchero_do' : 'qchero_save_all',
			'nonce' : qchero_ajax_object.saveAllNonce
		};
		
		var allData = _qchero.parseJSON(qcheror);
		
		data = Object.assign(allData,data);
		//console.log(data);
		$.ajax({
			url: qchero_ajax_object.ajax_url,
			data:data, method:'POST',
			beforeSend: function(){
			   //qchero_loading();
		   }
		});
		return false;
	});
//background image upload configuration//


    $('#bg-upload-btn').click(function(e) {
        e.preventDefault();
        var image = wp.media({ 
            title: 'Upload Background Image',
            // mutiple: true if you want to upload multiple files at once
            multiple: false
        }).open()
        .on('select', function(e){
            // This will return the selected image from the Media Uploader, the result is an object
            var uploaded_image = image.state().get('selection').first();
            // We convert uploaded_image to a JSON object to make accessing it easier
            // Output to the console uploaded_image
            //console.log(uploaded_image);
            var image_url = uploaded_image.toJSON().url;
            // Let's assign the url value to the input field
            $('#bg_image_url').val(image_url);
			var html = ['<span class="remove_bg_image">X</span>',
				'<img src="'+image_url+'" alt="" />'
			].join("");
			$('#bg_preview_img').prepend(html);
        });
    });
//image remove function//
$(document).on( 'click', '.remove_bg_image', function(){
	
	$('#bg_preview_img').html('');
	$('#bg_image_url').val('');
})

	
	/***  add images on slider ***/
	jQuery('#save_slider').on('click', function (e) {
		
		if (!_qchero._('.qcheroitem').length) {
			return false;
		}
		getSlidesInput();
		
		var data = {
			'action': 'qcld_sliderhero_actions',
			'nonce': qchero_ajax_object.saveImagesNonce,
			'qchero_do': 'qchero_save_images',
			'id': qcheror.id,
			'existitems': getExistImagesId(),
			'deleteditem': qcheror.deleteslide,
			'slides': qcheror['slides']
		};
		var allImages = {'images': (getAddedImages())};
		//console.log(allImages);
		
		var data = Object.assign(allImages, data);
		//console.log(data);
		
		$.ajax({
			url: qchero_ajax_object.ajax_url, data: (data), method: 'POST', beforeSend: function () {
				qchero_loading();
			},
			complete: function () {
				qchero_loading(false);
			}, success: function (result) {
				
				var newresult = JSON.parse(result);
				
				if (newresult.error) {
					alert(newresult.error);
					return false;
				}
				qcheror.slides = {};
				var result = JSON.parse(result);
				
				var appendHTML = '', published = ' value="0" ';
				var i = 0, j = 0;
				for (var res in result) {
					result[res] = JSON.parse(result[res]);
				}
				qcheror['slides'] = result;

				result = qcheror['slides'];

				for (var res in result) {
					i++;
					if (result[res]['published'] == '1') {
						j++;
					}
					var html;
					qcheror['slides'][res] = result[res];
					//console.log(result[res]['btn']);
					var condhtml = '';
					
					if(result[res]["image_link"]!=''){
						condhtml = '<div class="qcheroitem-image"><div class="slide_image_container"><img src="'+result[res]["image_link"]+'" /><span class="qchero_slide_image_remove" data-slide-id="' + result[res]["id"] + '">X</span></div></div>';
					}else{
						condhtml = '<div class="qcheroitem-image"><div class="slide_image_container"><button class="qchero_slide_image_upload" data-slide-id="' + result[res]["id"] + '">browse</button></div></div>';
					}
					if(result[res]["stomp"] !== null && typeof result[res]["stomp"] !== 'undefined' && result[res]["stomp"] !== ''){
						var config = JSON.parse(result[res]["stomp"].replace(/&quot;/g,'"'));
					}else{
						var config = {};
					}
					
					
					var customHtml = '<div class="hero_configuration_info">';
					if(config.hero_stomp_animation !== null && typeof config.hero_stomp_animation !== 'undefined' && config.hero_stomp_animation !== ''){
						customHtml += '<div class="hero_config_item" style="margin-right: 3px;"><p><span>Animation: </span>'+config.hero_stomp_animation+'</p></div>';
					}
					if(config.hero_stomp_delay !== null && typeof config.hero_stomp_delay !== 'undefined' && config.hero_stomp_delay !== ''){
						
						customHtml += '<div class="hero_config_item" style="margin-right: 3px;"><p><span>Delay: </span>'+config.hero_stomp_delay+'</p></div>';
					}
					if(config.hero_stomp_fontsize !== null && typeof config.hero_stomp_fontsize !== 'undefined' && config.hero_stomp_fontsize !== ''){
						customHtml += '<div class="hero_config_item" style="margin-right: 3px;"><p><span>Font Size: </span>'+config.hero_stomp_fontsize+'</p></div>';
					}
					
					if(config.hero_stomp_text_color !== null && typeof config.hero_stomp_text_color !== 'undefined' && config.hero_stomp_text_color !== ''){
						customHtml += '<div class="hero_config_item" style="margin-right: 3px;color:'+config.hero_stomp_text_color+'"><p><span>Font</span></p></div>';
					}
					if(config.hero_stomp_background_color !== null && typeof config.hero_stomp_background_color !== 'undefined' && config.hero_stomp_background_color !== ''){
						customHtml += '<div class="hero_config_item" style="color:'+config.hero_stomp_background_color+'"><p><span>Background</span></p></div>';
					}
					customHtml +='</div>';
					
					html = ['<li id="qcheroitem_' + result[res]["id"] + '" class="qcheroitem">',
						'<div class="qcheroitem-img-container">',
							condhtml,
							'<div class="slider-hero-slide-number"><span class="slide-number-title">Slide</span><span class="slide-order-number">'+ result[res]["ordering"] +'</span></div>',
							'<div class="qcheroitem-properties">',
								'<b><a href="#" class="quick_edit" data-slide-id="' + result[res]["id"] + '"><i class="fa fa-compress" aria-hidden="true"></i><span>collapse</span></a></b>',
								'<b><a href="#" class="qchero_remove_image" data-slide-id="' + result[res]["id"] + '"><i class="fa fa-remove" aria-hidden="true"></i><span>Remove</span></a></b>',
								'<b><label href="#" class="qchero_on_off_image"><input style="margin-top: 0px;" value="' + result[res]["published"] + '"' + ((parseInt(result[res]["published"])) && ' checked') + ' data-slide-id="' + result[res]["id"] + '" class="slide-checkbox" type="checkbox"><span style="margin-top: 2px;">Published</span></label></b>',
								'<b style="width: 10%;margin-right: 0px;cursor:move"><i class="fa fa-arrows" aria-hidden="true"></i></b>',
								
							'</div>',
							'<form class="qchero-nodisplay">',
								'<input type="text" class="qcheroitem-edit-title" value="' + result[res]["title"] + '">',
								'<textarea class="qcheroitem-edit-description" placeholder="Subtitle">' + (result[res]["description"]==''?'':result[res]["description"]) + '</textarea>',
								customHtml,
								'<input type="hidden" class="qcheroitem-add-btn" placeholder="Add Button" value="'+ result[res]["btn"] +'">',
								'<input type="button" class="qcheroitem-add-btn1" style="width: 99%;border: 1px solid #ddd;" value="'+((result[res]['btn'].length>10)?'Edit Button':'Add A Button')+'" />',
								'<input type="hidden" class="qcheroitem-edit-type" value="">',
								
								'<input type="button" data-ordering="'+result[res]["ordering"]+'" class="qcheroitem-stomp-config" style="width: 99%;border: 1px solid #ddd;" value="'+((result[res]['stomp'].length>10)?'Edit Configuration':'Add Configuration')+'" />',
								
								'<input type="hidden" class="qcheroitem-stomp-value" value="'+ result[res]["stomp"] +'" />',
								'<input type="hidden" class="qcheroitem-add-url" value="'+ result[res]["image_link"] +'">',
								'<input type="hidden" class="qcheroitem-ordering" value="' + result[res]["ordering"] + '">',
							'</form>',
						'</div>',
						'</li>'].join("");
					appendHTML += html;
					
				}
				jQuery('#qchero_slider_images_list .qcheroitem.add').remove();
				jQuery('#qchero_slider_images_list').html('');
				jQuery('#qchero_slider_images_list').prepend(appendHTML);
				
				qcheror.length = i;
				qcheror.count = j;
				
			}
		});
		return false;
	});

	 jQuery('#save_custom_slide').on('click', function (e) {
		 var slide = 'slide' + getparamsFromUrl('slideid', location.href);

		 qcheroGetSlideParams(slide);
		 var data = {
			 'action': 'qcld_sliderhero_actions',
			 'nonce': qchero_ajax_object.saveImageNonce,
			 'qchero_do': 'qchero_save_image',
			 'id': qcheror.id,
			 'custom': _qchero.parseJSON(qcheror['slides'][slide])['custom'],
			 'title': qcheror['slides'][slide]['title'],
			 'description': qcheror['slides'][slide]['description'],
			 'image_link': qcheror['slides'][slide]['image_link'],
			 'image_link_new_tab': qcheror['slides'][slide]['image_link_new_tab'],
			 'slide': getparamsFromUrl('slideid', location.href)
		 };
		 $.ajax({
			 url: qchero_ajax_object.ajax_url,
			 data: (data),
			 method: 'POST',
			 beforeSend: function () {
				 qchero_loading();
			 },
			 success: function (result) {
				 qchero_loading(false);
			 }
		 });
		 return false;
	 });
	
	/***  remove images from slider ***/
	jQuery('#qchero_slider_images_list').on('click','.qchero_remove_image',function(e){
		var t = confirm("Are you sure you want to delete this item?");
			if(!t)
				return false;		
		var slideid = jQuery(this).attr('data-slide-id');
		var data = {
			'action': 'qcld_sliderhero_actions',
			'nonce' : qchero_ajax_object.removeImageNonce,
			'qchero_do' : 'qchero_remove_image',
			'id' : qcheror.id,
			'slide' : slideid	
		};
		//console.log(qcheror.deleteslide);
		if(qcheror.deleteslide!=''){
			ids = qcheror.deleteslide+','+slideid;
		}else{
			ids = slideid;
		}
		qcheror.deleteslide = ids;
		//console.log(qcheror);
		jQuery('#qcheroitem_' + slideid).remove();
		if (!jQuery('#qchero_slider_images_list .qcheroitem').length)
			jQuery('#qchero_slider_images_list .noimage').show();
		delete qcheror['slides']['slide' + slideid];
		qcheror.length--;
		
		//Remove and save data
		/*$.ajax({
			url: qchero_ajax_object.ajax_url,
			data:data,
			method:'POST',
			dataType: 'json',
			beforeSend: function () {
				qchero_loading();
			},
			complete: function () {
				qchero_loading(false);
				// Handle the complete event
			},
			success: function (result) {
				if (result.error) {
					console.log(result.error);
					return false;
				}
				
				jQuery('#qcheroitem_' + result.slide).remove();
				if (!jQuery('#qchero_slider_images_list .qcheroitem').length)
					jQuery('#qchero_slider_images_list .noimage').show();
				delete qcheror['slides']['slide' + result.slide];
				qcheror.length--;
			}
		});*/
		return false;
	
	
	});

//function for image upload end	
	jQuery('#qchero_slider_images_list').on('change','.slide-checkbox',function(e){
		
		(jQuery(this).attr('checked'))?(jQuery(this).val(1)):(jQuery(this).val(0));
		
		function AllSlidesUnPublished() {
			var sumPublishSlides = 0;
				jQuery('.slide-checkbox').each(function(){
				if(parseInt(jQuery(this).val()))sumPublishSlides++;
				});
			return 	sumPublishSlides;
		} 
		if(!AllSlidesUnPublished()) {
			jQuery(this).attr('checked','checked');
			alert('Slider must contain minimum one published slide...');
			qcheror.count = 1;
			return false;
		}
		qcheror.count = AllSlidesUnPublished();	
		var slideid = jQuery(this).attr('data-slide-id');
		var published = (jQuery(this).val());
		var data = {
			'action': 'qcld_sliderhero_actions',
			'nonce' : qchero_ajax_object.onImageNonce,
			'qchero_do' : 'qchero_on_image',
			'id' : qcheror.id,
			'slide' : slideid,
			'published' : published	
		}
		$.ajax({url: qchero_ajax_object.ajax_url,data:data, method:'POST',  beforeSend: function(){
			qchero_loading();
   },
   complete: function(){
		qchero_loading(false);
   }, success: function(result){
			var newresult = JSON.parse(result);
			if(newresult.error) {
				alert(newresult.error);
				return false;
			}	   
			 qcheror['slides']['slide'+result]['published'] = +published;
		}});
		return false;
	
	
	});	
	
$('input[name="style[fullwidth]"]').click(function(){
    
   if($('input:radio[name="style[fullwidth]"]:checked').val()==0){
	   $("#qcslide-width").prop("readonly", false); 
	   $("#qcslide-height").prop("readonly", false); 
   }
   if($('input:radio[name="style[fullwidth]"]:checked').val()==1){
	  
	  $("#qcslide-width").prop("readonly", true);
	  $("#qcslide-height").prop("readonly", false); 
   }
   if($('input:radio[name="style[fullwidth]"]:checked').val()==2){
	  
	  $("#qcslide-width").prop("readonly", true);
	  
	  $("#qcslide-height").prop("readonly", true);
   }
   if($('input:radio[name="style[fullwidth]"]:checked').val()==3){
	  
	  $("#qcslide-width").prop("readonly", true);
	  $("#qcslide-height").prop("readonly", false); 
   }
});

   if($('input:radio[name="style[fullwidth]"]:checked').val()==0){
	   $("#qcslide-width").prop("readonly", false); 
	   $("#qcslide-height").prop("readonly", false); 
   }
   if($('input:radio[name="style[fullwidth]"]:checked').val()==1){
	  
	  $("#qcslide-width").prop("readonly", true);
	  $("#qcslide-height").prop("readonly", false); 
   }
   if($('input:radio[name="style[fullwidth]"]:checked').val()==2){
	  
	  $("#qcslide-width").prop("readonly", true);
	  
	  $("#qcslide-height").prop("readonly", true);
   }
   if($('input:radio[name="style[fullwidth]"]:checked').val()==3){
	  
	  $("#qcslide-width").prop("readonly", true);
	  $("#qcslide-height").prop("readonly", false); 
   }


})




})( jQuery );


