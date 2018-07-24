(function( $ ) {
 
 	$('#sh_video').on('change', function(e){
		e.preventDefault();
		$('#sh_custom_video').hide();
		$('#sh_custom_video2').hide();
		$('#sh_youtube_video').hide();
		$('#sh_vimeo_video').hide();
		$('#sh_video_loop').hide();
		$('#sh_video_mute').hide();
		$('#sh_video_overlay').hide();
		$('#sh_video_overlay_color').hide();
		$('#sh_video_overlay_opacity').hide();
		
		if($(this).val()=='custom'){
			$('#sh_custom_video').show();
			$('#sh_custom_video2').show();
			$('#sh_video_loop').show();
			$('#sh_video_mute').show();
			$('#sh_video_overlay').show();
			$('#sh_video_overlay_color').show();
			$('#sh_video_overlay_opacity').show();
		}
		if($(this).val()=='youtube'){
			$('#sh_youtube_video').show();
			$('#sh_video_loop').show();
			$('#sh_video_mute').show();
			$('#sh_video_overlay').show();
			$('#sh_video_overlay_color').show();
			$('#sh_video_overlay_opacity').show();
		}
		if($(this).val()=='vimeo'){
			$('#sh_vimeo_video').show();
			$('#sh_video_loop').show();
			$('#sh_video_mute').hide();
			$('#sh_video_overlay').show();
			$('#sh_video_overlay_color').show();
			$('#sh_video_overlay_opacity').show();
		}
		

	})
		//Slider Preview Option//
	$('.qchero_preview').on ("click", function(e){
		e.preventDefault();
		jQuery(".qchero_save_all").click();
		id = $(this).data('id');
		setTimeout(
					function() {
					$.post(
						ajaxurl,
						{
							action : 'qcld_show_preview_items',
							sid : id,
							
						},
						function(data){
							
							$('#wpwrap').append(data);
							
						}
					)
		}, 1000);

	})
    // Add Color Picker to all inputs that have 'color-field' class
    $(function() {
        $('.color-field').wpColorPicker();
    });
	
	$('#qchero-fullwidth').on("click", function(){
		 $('#qchero-fullscreen').removeAttr('checked');
	})
	
	$('#qchero-fullscreen').on("click", function(){
		 $('#qchero-fullwidth').removeAttr('checked');
	})
	
	$(document).on( 'click', '.modal-content .close', function(){
        $(this).parent().parent().remove();
    });
	$(document).on( 'click', '.botmclose', function(){
        $(this).parent().parent().parent().parent().remove();
    });
	
/*	$('.myElements').each(function() {
	var elem = $(this);

	   // Save current value of element
	   elem.data('oldVal', elem.val());

	   // Look for changes in the value
	   elem.bind("propertychange change click keyup input paste", function(event){
		  // If value has changed...
		  if (elem.data('oldVal') != elem.val()) {
		   
			$('#preview_qchero').attr('needsave','1');   
		   
		   
		 }
	   });
	 });*/
//==============================================//	


	$(document).on( 'click', '.qcheroitem-stomp-config', function(){
		var ordering = $(this).attr('data-ordering');
		var selfelem = 'qcheroitem-stomp-value';
		var parelem = $(this).closest("li").prop("id");
		var slidid = $(this).closest("li").data("sid");
		var exdata = $('#'+parelem+' .qcheroitem-stomp-value').val();
		
		$.post(
			ajaxurl,
			
			{
				action : 'qcld_show_stomp_config',
				elem : parelem,
				selfelem : selfelem,
				slidid: slidid,
				btnval: exdata,
				ordering: ordering
				
			},
			function(data){
				
				if($('#sm-modal').length==0){
					$('#wpwrap').append(data);
					$('.color-field').wpColorPicker();
				}
				
			}
		)
		
	})
	 
	
	$(document).on( 'click', '.modal-content #add_configuration', function(){
		
		var hero_stomp_animation = $('#hero_stomp_animation').val();
		var hero_stomp_delay = $('#hero_stomp_delay').val();
		var hero_stomp_fontsize = $('#hero_stomp_fontsize').val();
		var hero_stomp_font_weight = $('#hero_stomp_font_weight').val();
		var hero_stomp_letter_spacing = $('#hero_stomp_letter_spacing').val();
		var hero_stomp_text_color = $('#hero_stomp_text_color').val();
		var hero_stomp_background_color = $('#hero_stomp_background_color').val();
		var hero_intro_font_family = $('#hero_intro_font_family').val();

		
		var data = {
			hero_stomp_animation : hero_stomp_animation,
			hero_stomp_delay : hero_stomp_delay,
			hero_stomp_fontsize : hero_stomp_fontsize,
			hero_stomp_font_weight : hero_stomp_font_weight,
			hero_stomp_letter_spacing : hero_stomp_letter_spacing,
			hero_stomp_text_color : hero_stomp_text_color,
			hero_stomp_background_color : hero_stomp_background_color,
			hero_intro_font_family : hero_intro_font_family
		}
	
		var d = JSON.stringify(data)
		
		
		
		
		var customHtml = '';
		if(hero_stomp_animation !== null && typeof hero_stomp_animation !== 'undefined' && hero_stomp_animation!==''){
			customHtml += '<div class="hero_config_item" style="margin-right: 3px;"><p><span>Animation: </span>'+hero_stomp_animation+'</p></div>';
		}
		if(hero_stomp_delay !== null && typeof hero_stomp_delay !== 'undefined' && hero_stomp_delay!==''){
			customHtml += '<div class="hero_config_item" style="margin-right: 3px;"><p><span>Delay: </span>'+hero_stomp_delay+'</p></div>';
		}
		if(hero_stomp_fontsize !== null && typeof hero_stomp_fontsize !== 'undefined' && hero_stomp_fontsize!==''){
			customHtml += '<div class="hero_config_item" style="margin-right: 3px;"><p><span>Font Size: </span>'+hero_stomp_fontsize+'</p></div>';
		}
		
		if(hero_stomp_text_color !== null && typeof hero_stomp_text_color !== 'undefined' && hero_stomp_text_color!==''){
			customHtml += '<div class="hero_config_item" style="margin-right: 3px;color:'+hero_stomp_text_color+'"><p><span>Font</span></p></div>';
		}
		if(hero_stomp_background_color !== null && typeof hero_stomp_background_color !== 'undefined' && hero_stomp_background_color!==''){
			customHtml += '<div class="hero_config_item" style="margin-right: 3px;color:'+hero_stomp_background_color+'"><p><span>Background</span></p></div>';
		}
		
		
		
		
		
		$('#'+$('.modal-content').data('elem')+' .'+$('.modal-content').data('self')).val(d);
		$('#'+$('.modal-content').data('elem')+' .hero_configuration_info').html(customHtml);
		
		btn = 'qcheroitem-stomp-config';
		$('#'+$('.modal-content').data('elem')+' .'+btn).val('Edit Configuration');
		
		$(this).parent().parent().parent().remove();

	})
	
	$(document).on('change','#hero_stomp_animation',function(e){
		e.preventDefault();
		var classname = $(this).val();
		if(classname!='none'){
			$('#hero_text_preview_animation').removeClass();
			$('#hero_text_preview_animation').addClass("animated "+classname);
		}else{
			$('#hero_text_preview_animation').removeClass();
		}
	})



//code for create button //
	$(document).on( 'click', '.qcheroitem-add-btn1', function(){
		
		var parelem = $(this).closest("li").prop("id");
		var exdata = $('#'+parelem+' .qcheroitem-add-btn').val();
		$.post(
			ajaxurl,
			{
				action : 'qcld_show_arrow_items',
				elem : parelem,
				btnval: exdata
			},
			function(data){
				
				$('#wpwrap').append(data);
				$('.color-field').wpColorPicker();
			}
		)
		
	 })
	 
	$(document).on( 'click', '.modal-content #cancel_the_button', function(){
		
		$('#'+$('.modal-content').data('elem')+' .qcheroitem-add-btn').val('');
		
		$('#'+$('.modal-content').data('elem')+' .qcheroitem-add-btn1').val('Add A Button');
		//alert($('.modal-content').data('self'));
		$(this).parent().parent().parent().parent().remove();
		
	})
	
	$(document).on( 'click', '.modal-content #add_the_button', function(){
		var btntxt = $('#hero_button_text').val();
		var btnurl = $('#hero_button_url').val();
		var tgt = $('#hero_button_target').val();

		var btnbdr = $('input[name=hero_button_border]:checked').val();
		var btnstyle = $('input[name=hero_button_style]:checked').val();
		var btnfontweight = $('#hero_button_font_weight').val();
		var btnfontsize = $('#hero_button_font_size').val();
		var btnletterspacing = $('#hero_button_letter_spacing').val();
		var btntcolor = $('#hero_button_text_color').val();
		var btnthovercolor = $('#hero_button_text_hover_color').val();
		var btnbgcolor = $('#hero_button_bg_color').val();
		var btnbghovercolor = $('#hero_button_bg_hover_color').val();
		
		var data = {
			button_text : btntxt,
			button_url : btnurl,
			button_target : tgt,
			button_border : btnbdr,
			button_style : btnstyle,
			button_font_weight : btnfontweight,
			button_font_size : btnfontsize,
			button_letter_spacing : btnletterspacing,
			button_color : btntcolor,
			button_hover_color : btnthovercolor,
			button_background_color : btnbgcolor,
			button_background_hover_color : btnbghovercolor
			
		}
	
		var d = JSON.stringify(data)
		
		
		$('#'+$('.modal-content').data('elem')+' .qcheroitem-add-btn1').val('Edit Button');
		$('#'+$('.modal-content').data('elem')+' .qcheroitem-add-btn').val(d);
		$(this).parent().parent().parent().parent().remove();
	})
	 

	
})( jQuery );

jQuery(window).scroll(function() {
    if (jQuery(this).scrollTop()) {
        jQuery('.hero_bottom_save_button').fadeIn();
    } else {
        jQuery('.hero_bottom_save_button').fadeOut();
    }
});