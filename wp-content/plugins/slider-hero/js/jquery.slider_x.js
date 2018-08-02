/*
 * jQuery  Slider-X v1.0
 * Author : Quamtum Cloud
 * Copyright 2016, Quamtum Cloud
 */
function getOffset( el ) {
    var _x = 0;
    var _y = 0;
    while( el && !isNaN( el.offsetLeft ) && !isNaN( el.offsetTop ) ) {
        _x += el.offsetLeft - el.scrollLeft;
        _y += el.offsetTop - el.scrollTop;
        el = el.offsetParent;
    }
    return { top: _y, left: _x };
}
  function shuffle(a) {
    var j, x, i;
    for (i = a.length; i; i--) {
        j = Math.floor(Math.random() * i);
        x = a[i - 1];
        a[i - 1] = a[j];
        a[j] = x;
    }
}
(function($) {
    var functionSliderX = function(element, options){
        // Defaults are below
        var settings = $.extend({}, $.fn.sliderX.defaults, options);

        // Useful variables. Play carefully.
        var vars = {
            currentSlide: 0,
            //currentImage: '',
            currentBlock: '',
            totalSlides: 0,
            running: false,
            paused: false,
            stop: false,
            controlNavEl: false
        };
		var mhclicked = 0;
		var imgarray = [];

        // Get this slider
        var slider = $(element);
		//slider height width and backgroundcolor

		if(settings.fullScreen){
			
			var fullwidth = $("body").prop("clientWidth"); 
			var fullheight = window.innerHeight;
			var maindivcon = document.getElementById(settings.mainId);
			var getleft = getOffset(maindivcon);
			
			if(getleft.left>0){
				slider.css({
					'width':fullwidth+'px',
					'height':fullheight+'px',
					'left':'-'+getleft.left+'px',
				});
			}else{
				slider.css({
					'width':fullwidth+'px',
					'height':fullheight+'px',
				});
			}
			
			
			$('.slider-x-intro-img').each(function(){
				$(this).css('height',fullheight+'px');
			})
			
		}else if(settings.fullWidth){
			
			var fullwidth = $("body").prop("clientWidth"); 
			var maindivcon = document.getElementById(settings.mainId);
			var getleft = getOffset(maindivcon);
			console.log(getleft);
			if(getleft.left>10){
				slider.css({
					'width':fullwidth+'px',
					'height':settings.sliderHeight+'px',
					'left':'-'+(getleft.left)+'px',
				});
			}else{
				slider.css({
					'width':fullwidth+'px',
					'height':settings.sliderHeight+'px',
				});
			}
					
		}else if(settings.Screenauto){
			slider.css({
				'max-width':'100%',
				'height':settings.sliderHeight+'px',
				
			});			
		}
		else{
			slider.css({
				'max-width':settings.sliderWidth+'px',
				'height':settings.sliderHeight+'px',
				
			});
						
		}
		//getting slider data.
        slider.data('sliderXData', vars);
		
		
		//mh code for image container

		//mh code for title color & Font size
		$('.slider-x-lead-title').each(function(){
			
			$(this).css({"color":settings.titleTextColor,"font-size":settings.titleFontSize+'px',"width":"100%"});
		})
		
		//mh code for description color & Font size
		$('.slider-x-item-title').each(function(){
			$(this).css({"color":settings.descriptionTextColor,"font-size":settings.descriptionFontSize+'px'});
		})
		
        // Find our slider children
        var kids = slider.children(".qcld_hero_content_area");
		
		// Find our slider children
        var kids = slider.children(".qcld_hero_content_area");
		if(settings.randomslide){
			shuffle(kids);
		}
		
		//console.log(kids);
        kids.each(function() {
            var child = $(this);
			//console.log(child);
            child.css('display','none');
			if(typeof(child.attr('data-bg-image'))!='undefined' && child.attr('data-bg-image')!==''){
				imgarray.push(child.attr('data-bg-image'));
				
			}
            vars.totalSlides++;
        });
		if(imgarray.length>0){
			slider.css({
			   'background-image': 'url('+imgarray[0]+')',
		   })
		}

        //code for title animation mh//
		var titleanimation = slider.find(".slider-x-lead-title");
		titleanimation.each(function(){
			$(this).addClass('animated '+settings.titleAnimation);
		})
		//code for description animation mh//
		var desanimation = slider.find(".slider-x-item-title");
		desanimation.each(function(){
			$(this).addClass('animated '+settings.desAnimation);
		})
		
        // Set startSlide
        if(settings.startSlide > 0){
            if(settings.startSlide >= vars.totalSlides) { settings.startSlide = vars.totalSlides - 1; }
            vars.currentSlide = settings.startSlide;
        }
        
        // Get initial image
        if($(kids[vars.currentSlide]).is('.qcld_hero_content_area')){
            vars.currentBlock = $(kids[vars.currentSlide]).html();
        } else {
            vars.currentBlock = $(kids[vars.currentSlide]).find('.qcld_hero_content_area:first').html();
        }
		
        // Set first background
		setTimeout(function(){
          var sliderBlock = '<div class="qcld_hero_content_area">'+$(kids[vars.currentSlide]).html()+'</div>';
          slideExcute(slider, kids, settings, 'firstslide');
		}, 0);
		
        //Slider direction controller 
		if(settings.directionCon){
            slider.append('<div class="qc-sliderX-direction" style="width:100%"><a class="qc-sliderX-prev">'+ settings.prevSlideText +'</a><a class="qc-sliderX-next">'+ settings.nextSlideText +'</a></div>');
            
            $(slider).on('click', 'a.qc-sliderX-prev', function(){
				mhclicked = 1;
                slideExcute(slider, kids, settings, 'prev');
				setTimeout(
					function() {
					 mhclicked = 0;
					 console.log(mhclicked);
					}, 2000);				
            });
			
            $(slider).on('click', 'a.qc-sliderX-next', function(){
				mhclicked = 1;
                slideExcute(slider, kids, settings, 'next');
				setTimeout(
					function() {
					 mhclicked = 0;
					 console.log(mhclicked);
					}, 2000);
            });
        } 
		
		//Adding  bottom direction controller 
			if(settings.bottomCon){
				var bottomConDir = $('<div class="qc-sliderX-bottomCon" style="width:100%"></div>');
				slider.append(bottomConDir);
				for(var i = 0; i < kids.length; i++){
						bottomConDir.append('<a class="qc-sliderX-bottom-slide" data-slide="'+ i +'">'+ (i + 1) +'</a>');
				}
				
				if(settings.sliderestart){
					bottomConDir.append('<a class="hero_gslider_control" id="hero_ge_restart_button"><i class="fa fa-repeat" aria-hidden="true"></i></a>');
				}
				
				if(settings.sliderpause){
					bottomConDir.append('<a class="hero_gslider_control" id="hero_ge_pause_button"><i class="fa fa-pause" aria-hidden="true"></i></a><a class="hero_gslider_control" id="hero_ge_play_button" style="display:none"><i class="fa fa-play" aria-hidden="true"></i></a>');
				}
				
				//show the slide which is clicked from the bootom controll panel.
				$('.qc-sliderX-bottom-slide').on('click',function(){
				var flag= $(this).attr('data-slide');
				flag = parseInt(flag);
				mhclicked = 1;
				slideExcute(slider, kids, settings, flag);
				setTimeout(
					function() {
					 mhclicked = 0;
					 console.log(mhclicked);
					}, 2000);				
				});				
			}

			
		// To repeat every slide by interval.
        var timer = 0;
		
		function slideloop(){
			if(settings.slideStart!==false){
				countercount = 0;
				 timer = setInterval(function(){ 
					countercount++;
					if(mhclicked==0){
						if(vars.currentSlide==vars.totalSlides){
							if(settings.repeat!==false){
								slideExcute(slider, kids, settings, false); 
							}
							
						}else{
							slideExcute(slider, kids, settings, false); 
						}
						
					}
					
				 }, settings.pauseTime);
				 if(countercount===0){
					 
				 }
			}
		}
		
        if(kids.length > 0){
			slideloop();

        }
		
		
		
		
		$('#hero_ge_restart_button').on('click', function(){
			clearInterval(timer);
			slideExcute(slider, kids, settings, 0);
			slideloop();
			if(typeof(player)!='undefined'){
				player.seekTo(0);
			}
		})
		
		$('#hero_ge_pause_button').on('click', function(){
			clearInterval(timer);
			$(this).hide();
			$('#hero_ge_play_button').show();
			if(typeof(player)!='undefined'){
				player.pauseVideo();
			}
			

			
		})
		
		$('#hero_ge_play_button').on('click', function(){
			
			slideloop();
			$(this).hide();
			$('#hero_ge_pause_button').show();
			if(typeof(player)!='undefined'){
				player.playVideo();
			}

		})
		
		$(window).resize(function() {
			if(jQuery(window).width() < 767 || settings.contentposition=='center'){
				slider.find('.qcld_hero_content_area:visible').css('margin-top','-'+Math.round(slider.find('.qcld_hero_content_area:visible').height()/2)+'px');
			}
		})
        // Private run method
        var slideExcute = function(slider, kids, settings, flag){          
            // Get our vars
            var vars = slider.data('sliderXData');
           //console.log(vars.currentBlock);
			//sliderX next previous button controlling logic.
            if(typeof(flag)=='string') {
				
                if(flag === 'prev'){
                    //sliderImg.attr('src', vars.currentImage.attr('src'));
					vars.currentSlide = parseFloat(vars.currentSlide)-2;
					

					vars.currentBlock = $(kids[vars.currentSlide]).html();
                }
                if(flag === 'next'){
                    //sliderImg.attr('src', vars.currentImage.attr('src'));
					
				vars.currentBlock = $(kids[vars.currentSlide]).html();
                }
            }
           // Button slide controlling logic.
		   if(typeof(flag)=='number') {
			   vars.currentSlide = flag;
			  
			   vars.currentBlock = $(kids[vars.currentSlide]).html();
		   }
		  
			// Make bold of current slider number from bottom controller
			

			var titleanimation = $(kids[vars.currentSlide]).find(".slider-x-lead-title");
			titleanimation.each(function(){
				if(settings.titleoutAnimation!=''){
					$(this).removeClass(settings.titleoutAnimation);
				}
			})
			
			if(settings.titleoutAnimation!=''){
				 present_slide = slider.find('.qcld_hero_content_area:visible');
				 $(present_slide).find(".slider-x-lead-title").each(function(){// Title transaction out
					 $(this).removeClass(settings.titleAnimation);
						$(this).addClass(settings.titleoutAnimation);
				 })
			 }
			 
			 //code for description animation mh//
			var desanimation = $(kids[vars.currentSlide]).find(".slider-x-item-title");
			desanimation.each(function(){
				if(settings.desoutAnimation!=''){
					$(this).removeClass(settings.desoutAnimation);
				}
				$(this).addClass('animated '+settings.desAnimation);
			})
			 
			 if(settings.desoutAnimation!==''){
					 
					 $(present_slide).find(".slider-x-item-title").each(function(){// Description transaction out
						$(this).removeClass(settings.desAnimation);
						$(this).addClass(settings.desoutAnimation);
					 })
				 }
			
			//if(typeof(currentSlide)!=='undefined')
				
            // Trigger the slideshowEnd callback
            if(typeof(vars.currentSlide)!=='undefined' && vars.currentSlide >= vars.totalSlides){

				vars.currentSlide = 0;	

                //settings.slideshowEnd.call(this);
            }
			
			if(vars.currentSlide < 0) { vars.currentSlide = (vars.totalSlides - 1); }
			var activeSlideDom=$('.qc-sliderX-bottomCon').children('.qc-sliderX-bottom-slide');
			for( var j=0;j<=activeSlideDom.length;j++){
				if(j==vars.currentSlide){
					$(activeSlideDom[j]).addClass('qc-sliderx-bottom-current');
				}else{
					$(activeSlideDom[j]).removeClass('qc-sliderx-bottom-current');
				}
			}			
            // Set vars.currentBlock
			 vars.currentBlock = $(kids[vars.currentSlide]).html();
			 //alert(vars.currentSlide);
             //console.log($(kids[vars.currentSlide]).children().find('data-item').html());
			   //alert($(kids[vars.currentSlide]).attr('data-bg-image'));
			   
			   if(flag=='firstslide'){
					delayinit = 500;
				}else{
					delayinit = (settings.paddingTime<500?500:settings.paddingTime);
				}
			setTimeout(function(){
			   var url = $(kids[vars.currentSlide]).attr('data-bg-image');
			   $('#'+settings.mainId+' .qcld_hero_content_area:visible').last().remove();
			   if(typeof(url)!='undefined' && url!=''){
				  slider.css({
					   'background-image': 'url('+url+')'
				   })

			   }else{
				   slider.css({
					   'background-image': ''
				   })
			   }
			  
			  
			  
			  slider.append('<div class="qcld_hero_content_area">'+vars.currentBlock+'</div>');
			  
				if(jQuery(window).width() < 767 || settings.contentposition=='center'){
					
					slider.find('.qcld_hero_content_area:visible').css('margin-top','-'+Math.round(slider.find('.qcld_hero_content_area:visible').height()/2)+'px');
				}
			 
				vars.currentSlide++; 
			},delayinit)
        };
        return this;
    };
        
    $.fn.sliderX = function(options) {
        return this.each(function(key, value){
            var childSliderX = new functionSliderX(this, options);
        });
    };
    
    //Default settings


    //$.fn._reverse = [].reverse;
    
})(jQuery);