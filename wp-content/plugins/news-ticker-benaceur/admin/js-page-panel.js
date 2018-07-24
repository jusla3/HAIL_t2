// 1			
var elem = document.getElementById("NTBshowelemselect");
elem.onchange = function(){
    var hiddenDiv = document.getElementById("NTBshowdiv");
    hiddenDiv.style.display = (this.value != "theme_custom") ? "none":"block";
};
// 1			

// 2			
(function($) {
        $('#bt-ntbCat').click(function() {
                $('#sub-ntbCat').slideToggle("slow");
        });
})(jQuery);
	
(function($) {
        $('#bt-ntbMyplugins').click(function() {
                $('#sub-ntbMyplugins').slideToggle("slow");
        });
})(jQuery);
// 2			

// 3			
(function($) {
        $('#ntb1').submit(function() {
          $('#progress-ntb1').show();
        });
        $('#ntb2').submit(function() {
          $('#progress-ntb2').show();
        });
        $('#ntb3').submit(function() {
          $('#progress-ntb3').show();
        });
        $('#ntb4').submit(function() {
          $('#progress-ntb4').show();
        });
        $('#ntb5').submit(function() {
          $('#progress-ntb5').show();
        });
        $('#ntb6').submit(function() {
          $('#progress-ntb6').show();
        });
        $('#ntb7').submit(function() {
          $('#progress-ntb7').show();
        });
        $('#ntb8').submit(function() {
          $('#progress-ntb8').show();
        });
})(jQuery);
// 3			

// 0
  
(function($) {
        $('.submit-ntb0').click(function() {
          $('#progress-ntb0').show();
        });
})(jQuery);

(function($) {
  $('.submit-ntb0').click(function() {
        var $text = $("#progress-ntb0");
        var contentHeight = $text
        .addClass('heightAuto').height();
        $text.removeClass('heightAuto').animate({ 
            height: (contentHeight == $text.height() ? 20 : contentHeight)
        }, 500);
  });
})(jQuery);
// 0

// 4			
(function($) {
  $('form').submit(function() {
        var $text = $("#progress-ntb1,#progress-ntb2,#progress-ntb3,#progress-ntb4,#progress-ntb5,#progress-ntb6,#progress-ntb7,#progress-ntb8,#progress-ntb0");
        var contentHeight = $text
        .addClass('heightAuto').height();
        $text.removeClass('heightAuto').animate({ 
            height: (contentHeight == $text.height() ? 20 : contentHeight)
        }, 500);
  });
})(jQuery);
// 4			

// 5
(function($) {
    $("select.news-ticker-benaceur-color-inp.selAnim").change(function(){
        $(this).find("option:selected").each(function(){
            if($(this).attr("value")=="TickerNTB"){
                $(".box").not(".fsub-ntb").hide();
                $(".fsub-ntb").show(800);
            }
            else if($(this).attr("value")=="fadein"){
                $(".box").not(".thsub-ntb").hide();
                $(".thsub-ntb").show(900);
            }
            else if($(this).attr("value")=="Scroll_Up_NTB"){
                $(".box").not(".tsub-ntb").hide();
                $(".tsub-ntb").show(900);
            }
            else if($(this).attr("value")=="ScrollNTB"){
                $(".box").not(".sevsub-ntb").hide();
                $(".sevsub-ntb").show(800);
            }
            else if($(this).attr("value")=="typing_2"){
                $(".box").not(".anim-twoTy2-sub-ntb").hide();
                $(".anim-twoTy2-sub-ntb").show(800);
            }
            else if($(this).attr("value")=="shuffle" || $(this).attr("value")=="toss" || $(this).attr("value")=="turnUp" ||
			$(this).attr("value")=="turnDown" || $(this).attr("value")=="zoom" || $(this).attr("value")=="fadeZoom" ||
			$(this).attr("value")=="growX" || $(this).attr("value")=="growY" || $(this).attr("value")=="curtainX" ||
			$(this).attr("value")=="curtainY" || $(this).attr("value")=="slideX" || $(this).attr("value")=="turnLeft" ||
			$(this).attr("value")=="turnRight" || $(this).attr("value")=="fade" || $(this).attr("value")=="slideY" ||
			$(this).attr("value")=="blindZ" || $(this).attr("value")=="scrollLeft" || $(this).attr("value")=="scrollRight" ||
			$(this).attr("value")=="fadeUp" || $(this).attr("value")=="fadeLR" || $(this).attr("value")=="uncover" ||
			$(this).attr("value")=="simple"){
                $(".box").not(".anim-two-sub-ntb").hide();
                $(".anim-two-sub-ntb").show(800);
            }
        });
    }).change();
})(jQuery);
// 5			

// 6
(function($) {
    $("select.news-ticker-benaceur-styl-tit").change(function(){
        $(this).find("option:selected").each(function(){
            if($(this).attr("value")=="simpleTileSt"){
                $(".boxTS").not(".DivChecksimpleTileSt").hide();
                $(".DivChecksimpleTileSt").show(500);
            } 
			else if($(this).attr("value")=="radiusTileSt") {
                $(".boxTS").not(".DivCheckradiusTileSt").hide();
                $(".DivCheckradiusTileSt").show(500);
			}
        });
    }).change();
})(jQuery);
// 6	

// hise update message succes
(function($) {
  $('#message.updated').delay(4000).fadeOut();
})(jQuery);
// hise update message succes

// go top page
(function($) {
    $("#NTB-up-page").click(function (){
 $('html, body').animate({scrollTop: 0}, 1500);
    });
})(jQuery);
// go top page

// accordion-NTB

// add display none to accordion-NTB
(function($) {
    $('.koalapse__title-NTB.op1').click(function() {$('.koalapse__content-NTB.op1').slideToggle("slow");});
	$(".koalapse__title-NTB.op2,.koalapse__title-NTB.op3,.koalapse__title-NTB.op4,.koalapse__title-NTB.op5").click(function(){$(".koalapse__content-NTB.op1").slideUp("slow");});

    $('.koalapse__title-NTB.op2').click(function() {$('.koalapse__content-NTB.op2').slideToggle("slow");});
	$(".koalapse__title-NTB.op1,.koalapse__title-NTB.op3,.koalapse__title-NTB.op4,.koalapse__title-NTB.op5").click(function(){$(".koalapse__content-NTB.op2").slideUp("slow");});

    $('.koalapse__title-NTB.op3').click(function() {$('.koalapse__content-NTB.op3').slideToggle("slow");});
	$(".koalapse__title-NTB.op1,.koalapse__title-NTB.op2,.koalapse__title-NTB.op4,.koalapse__title-NTB.op5").click(function(){$(".koalapse__content-NTB.op3").slideUp("slow");});

    $('.koalapse__title-NTB.op4').click(function() {$('.koalapse__content-NTB.op4').slideToggle("slow");});
	$(".koalapse__title-NTB.op1,.koalapse__title-NTB.op2,.koalapse__title-NTB.op3,.koalapse__title-NTB.op5").click(function(){$(".koalapse__content-NTB.op4").slideUp("slow");});
	
    $('.koalapse__title-NTB.op5').click(function() {$('.koalapse__content-NTB.op5').slideToggle("slow");});
	$(".koalapse__title-NTB.op1,.koalapse__title-NTB.op2,.koalapse__title-NTB.op3,.koalapse__title-NTB.op4").click(function(){$(".koalapse__content-NTB.op5").slideUp("slow");});
})(jQuery);
// add display none to accordion-NTB

(function($){
    $.fn.accordion_NTB=function(options){

        // variables used in the plugin
        var defaults = {
                "parentSelector": ".koalapse-NTB",
                "panelSelector": ".koalapse__content-NTB",
                "headingSelector": ".koalapse__title-NTB",
                "closeOthers": true,
                "animated": false,
                "showContentOnFocus": false,
                "showFirst": false
            },
            parameters = $.extend(defaults, options),
            $_that = this;


        //
        $_that.each(function(){
            // variables attached to the element
            var kParent = $(this),
                kHeading = kParent.find(parameters.headingSelector);


            // Link title and panel together with ID and ARIA attributes.
            kHeading.each(function(i){
                var id = "koalapse-" + kParent.index() + $(this).index(),
                    kPanel = $(this).next(parameters.panelSelector);

                // Add WAI-ARIA attributes and make it focusable
                $(this).attr({
                    'aria-expanded': false,
                    'aria-controls': id,
                    'tabindex': -1
                });

                // Add WAI-ARIA attributes to the content related to the title
                kPanel.attr({
                    'id': id,
                    'aria-hidden': true
                });

                // If "showFirst" is true - show first
                if( parameters.showFirst && i === 0){
                    $(this).attr({
                        'aria-expanded': true,
                        'tabindex': 0
                    });

                    $('#'+ $(this).attr("aria-controls")).attr('aria-hidden', false);
                }
            });
        });


        /**
        * Function that update tabindex on heading
        */
        var updateTabindex = function( showTab, parent ){
            // Remove all heading from the tab order
            $(parameters.headingSelector, parent).attr('tabIndex', -1);

            // Add showTab in the tab order
            $(showTab).attr('tabindex', 0);
        };


        // Events
        $('body').on('click', parameters.headingSelector, function(){
            var $_this = $(this),
                state = $_this.attr('aria-expanded') === 'false' ? true : false,
                controledEl = $('#' + $_this.attr('aria-controls')),
                parent = $_this.parents(parameters.parentSelector);

            // Close others - if options is set to true
            if( parameters.closeOthers === true ){
                $(parameters.headingSelector, parent).attr('aria-expanded', false);
                $(parameters.panelSelector, parent).attr('aria-hidden', true);
            }

            // Show the selected content
            $_this.attr('aria-expanded', state);
            controledEl.attr('aria-hidden', !state);

            updateTabindex($_this, parent);

        }).on('keydown', parameters.headingSelector, function(e){
            var $_this = $(this),
                activeEl = $(document.activeElement),
                parent = activeEl.parents(parameters.parentSelector);

                // Enter and Space toggle the panel
                if( e.keyCode === 13  || e.keyCode === 32 ){
                    $(this).click();
                }

                // Left and Up arrows : focus the next heading
                if( e.keyCode === 37 || e.keyCode === 38 ){
                    // If it's first heading - focus on last
                    if( activeEl[0] == parent.find(parameters.headingSelector).first()[0] ){
                        activeEl.nextAll(parameters.headingSelector).last().focus();

                        // If "showContentOnFocus" : show content
                        if( parameters.showContentOnFocus ){
                            activeEl.nextAll(parameters.headingSelector).last().click();
                        } else {
                            // Else updateTabindex of heading
                            updateTabindex( activeEl.nextAll(parameters.headingSelector).last(), parent );
                        }
                    } else {
                        activeEl.prevAll(parameters.headingSelector).first().focus();

                        // If "showContentOnFocus" : show content
                        if( parameters.showContentOnFocus ){
                            activeEl.prevAll(parameters.headingSelector).first().click();
                        } else {
                            // Else updateTabindex of heading
                            updateTabindex( activeEl.prevAll(parameters.headingSelector).first(), parent );
                        }
                    }
                }

                // Right and Down arrows : focus the next heading
                if( e.keyCode === 39 || e.keyCode === 40 ){
                    // If it's last heading - focus on first
                    if( activeEl[0] == parent.find(parameters.headingSelector).last()[0] ){
                        activeEl.prevAll(parameters.headingSelector).last().focus();

                        // If "showContentOnFocus" : show content
                        if( parameters.showContentOnFocus ){
                            activeEl.prevAll(parameters.headingSelector).last().click();
                        } else {
                            // Else updateTabindex of heading
                            updateTabindex( activeEl.prevAll(parameters.headingSelector).last(), parent );
                        }
                    } else {
                        activeEl.nextAll(parameters.headingSelector).first().focus();

                        // If "showContentOnFocus" : show content
                        if( parameters.showContentOnFocus ){
                            activeEl.nextAll(parameters.headingSelector).first().click();
                        } else {
                            // Else updateTabindex of heading
                            updateTabindex( activeEl.nextAll(parameters.headingSelector).first(), parent );
                        }
                    }
                }

                // Home : focus the first heading
                if( e.keyCode === 36 ){
                    parent.find(parameters.headingSelector).first()[0].focus();

                    // Update tabindex
                    updateTabindex( parent.find(parameters.headingSelector).first()[0], parent );
                }

                // End : focus the last heading
                if( e.keyCode === 35 ){
                    parent.find(parameters.headingSelector).last()[0].focus();

                    // Update tabindex
                    updateTabindex( parent.find(parameters.headingSelector).last()[0], parent );
                }

        }).on('keydown', parameters.panelSelector, function(e){
            var $_this = $(this),
                activeEl = $(document.activeElement),
                panel = activeEl.parents(parameters.panelSelector),
                panelID = panel.attr('id'),
                parent = activeEl.parents(parameters.parentSelector),
                heading = $(parameters.headingSelector + '[aria-controls='+ panelID +']');


            // CTRL + Left or Up arrows : focus on heading of the "active" panel
            if( (e.keyCode === 37 || e.keyCode === 38) && e.ctrlKey ){
                heading.focus();
            }

            // CTRL + Page Up : show previous tab and focus previous heading
            if( e.keyCode === 33 && e.ctrlKey ){
                // If it's first heading - focus on last
                if( heading[0] == parent.find(parameters.headingSelector).first()[0] ){
                    heading.nextAll(parameters.headingSelector).last().focus();

                    // If "showContentOnFocus" : show content
                    if( parameters.showContentOnFocus ){
                        heading.nextAll(parameters.headingSelector).last().click();
                    } else {
                        // Else updateTabindex of heading
                        updateTabindex( heading.nextAll(parameters.headingSelector).last(), parent );
                    }

                } else {
                    heading.prevAll(parameters.headingSelector).first().focus();

                    // If "showContentOnFocus" : show content
                    if( parameters.showContentOnFocus ){
                        heading.prevAll(parameters.headingSelector).first().click();
                    } else {
                        // Else updateTabindex of heading
                        updateTabindex( heading.prevAll(parameters.headingSelector).first(), parent );
                    }

                }
            }

            // CTRL + Page Down : show next tab and focus previous heading
            if( e.keyCode === 34 && e.ctrlKey ){
                // If it's first heading - focus on last
                if( heading[0] == parent.find(parameters.headingSelector).last()[0] ){
                    heading.prevAll(parameters.headingSelector).last().focus();

                    // If "showContentOnFocus" : show content
                    if( parameters.showContentOnFocus ){
                        heading.prevAll(parameters.headingSelector).last().click();
                    } else {
                        // Else updateTabindex of heading
                        updateTabindex( heading.prevAll(parameters.headingSelector).last(), parent );
                    }

                } else {
                    heading.nextAll(parameters.headingSelector).first().focus();

                    // If "showContentOnFocus" : show content
                    if( parameters.showContentOnFocus ){
                        heading.nextAll(parameters.headingSelector).first().click();
                    } else {
                        // Else updateTabindex of heading
                        updateTabindex( heading.nextAll(parameters.headingSelector).first(), parent );
                    }

                }
            }
        });


        // Return the element for jQuery chaining
        return $_that;

    };
})(jQuery);

(function($) {
$('.koalapse-NTB').accordion_NTB();
})(jQuery);
	
// accordion-NTB

// go to section
(function($) {
    $("#click-setting-ntb1").click(function (){
      $('html, body').animate({scrollTop: $("#go1-setting-ntb").offset().top}, 1500);
    });
    $("#click-setting-ntb1a").click(function (){
      $('html, body').animate({scrollTop: $("#go1a-setting-ntb").offset().top}, 1500);
    });
    $("#click-setting-ntb1b").click(function (){
      $('html, body').animate({scrollTop: $("#go1b-setting-ntb").offset().top}, 1500);
    });
    $("#click-setting-ntb2").click(function (){
      $('html, body').animate({scrollTop: $("#go2-setting-ntb").offset().top}, 1500);
    });
    $("#click-setting-ntb3").click(function (){
      $('html, body').animate({scrollTop: $("#go3-setting-ntb").offset().top}, 1500);
    });
    $("#click-setting-ntb4").click(function (){
      $('html, body').animate({scrollTop: $("#go4-setting-ntb").offset().top}, 1500);
    });
    $("#click-setting-ntb5").click(function (){
      $('html, body').animate({scrollTop: $("#go5-setting-ntb").offset().top}, 1500);
    });
})(jQuery);
// go to section

// go from section to setting
(function($) {
    $("#up-sec-sett1,#up-sec-sett2,#up-sec-sett3,#up-sec-sett4,#up-sec-sett5,#up-sec-sett6").click(function (){
      $('html, body').animate({scrollTop: $(".koalapse__title-NTB.op4").offset().top}, 1500);
    });
})(jQuery);
// go from section to setting

// version plugin
(function($) {
var $divNTBvers = $("#ntb-mm411112-divtoBlink"); 
var backgroundInterval = setInterval(function(){
    $divNTBvers.toggleClass("ntb-mm411112-backgroundRed");
 },1000)	
})(jQuery);
// version plugin


(function($) {
    $('.fsub_tax-ntb').hide(); 
    $('.news-ticker-benaceur-color-tax,.form-table-lat-com-pos').change(function(){
        if($('.news-ticker-benaceur-color-tax').val() == 'category' && $('.form-table-lat-com-pos').val() == 'latest_posts' || $('.form-table-lat-com-pos').val() == 'latest_comments' ) {
            $('.fsub_tax-ntb').show(); 
        } else {
            $('.fsub_tax-ntb').hide(); 
        } 
    });
})(jQuery);

(function($) {
	$('.fsub_lat-pos-ntb_hide-sel').hide();
    $('.form-table-lat-com-pos').change(function(){
        if($('.form-table-lat-com-pos').val() == 'latest_posts' ) {
			$('.fsub_lat-pos-ntb_hide-sel').show(500);
        } else {
			$('.fsub_lat-pos-ntb_hide-sel').hide();
        } 
    });
})(jQuery);

(function($) {
    $("select.form-table-lat-com-pos").change(function(){
        $(this).find("option:selected").each(function(){
            if($(this).attr("value")=="latest_posts"){
                $(".box_lat-com").not(".fsub_lat-pos-ntb").hide();
                $(".fsub_lat-pos-ntb").show(500);
            }
            else if($(this).attr("value")=="latest_comments"){
                $(".box_lat-com").not(".fsub_lat-com-ntb").hide();
                $(".fsub_lat-com-ntb").show(500);
            }
        });
    }).change();
})(jQuery);

(function($) {
    $("select.news-ticker-benaceur-color-tax").change(function(){
        $(this).find("option:selected").each(function(){
            if($(this).attr("value")=="category"){
                $(".box_cat-tax").not(".fsub_cat-or-tax-ntb").hide();
                $(".fsub_cat-or-tax-ntb").show();
            }
            else{
                $(".box_cat-tax").not(".fsub_tax-or-cat-ntb").hide();
                $(".fsub_tax-or-cat-ntb").show();
            }
        });
    }).change();
})(jQuery);

