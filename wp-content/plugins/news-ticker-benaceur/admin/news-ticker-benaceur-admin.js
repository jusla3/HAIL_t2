/*-- Admin Script
------------------------------------------*/
var $jntb = jQuery.noConflict();
$jntb(document).ready(function(){

	$jntb('#news-ticker-benaceur-font .handlediv,.hndle').click(function(){
		$jntb(this).parent().find('.inside').slideToggle("fast");
	});
	
	if ($jntb("#news-ticker-benaceur-font").length){
		$jntb('.news-ticker-benaceur-colorScheme_a').farbtastic('#news-ticker-benaceur-colorScheme_a');
		$jntb('.news-ticker-benaceur-txtclr_a').farbtastic('#news-ticker-benaceur-txtclr_a');
		$jntb('.news-ticker-benaceur-borderclr_a').farbtastic('#news-ticker-benaceur-borderclr_a');
		$jntb('.news-ticker-benaceur-background2clr_a').farbtastic('#news-ticker-benaceur-background2clr_a');
		$jntb('.news-ticker-benaceur-textshadowclr_a').farbtastic('#news-ticker-benaceur-textshadowclr_a');
		$jntb('.news-ticker-benaceur-boxshadowclr_a').farbtastic('#news-ticker-benaceur-boxshadowclr_a');
		$jntb('.news-ticker-benaceur-TextTitleclr_a').farbtastic('#news-ticker-benaceur-TextTitleclr_a');
		$jntb('.news-ticker-benaceur-hoverclr_a').farbtastic('#news-ticker-benaceur-hoverclr_a');
		$jntb('.news-ticker-benaceur-cust-color-back_a').farbtastic('#news-ticker-benaceur-cust-color-back_a');
		$jntb('.news-ticker-benaceur-cust-color-font_a').farbtastic('#news-ticker-benaceur-cust-color-font_a');
		$jntb('.news-ticker-benaceur-color-back-input_a').farbtastic('#news-ticker-benaceur-color-back-input_a');
		$jntb('.news-ticker-benaceur-cust-color-back-msg_a').farbtastic('#news-ticker-benaceur-cust-color-back-msg_a');
		$jntb('.news-ticker-benaceur-cust-color-switch-input_a').farbtastic('#news-ticker-benaceur-cust-color-switch-input_a');
		$jntb('.news-ticker-benaceur-borderclr-title_a').farbtastic('#news-ticker-benaceur-borderclr-title_a');
		$jntb('.news-ticker-benaceur-PrevNext-color_a').farbtastic('#news-ticker-benaceur-PrevNext-color_a');
	}
	$jntb('html').click(function() {$jntb("#news-ticker-benaceur-font .farbtastic").fadeOut('fast');});
	
	$jntb('#news-ticker-benaceur-font .news-ticker-benaceur-colsel').click(function(event){
		$jntb("#news-ticker-benaceur-font .farbtastic").hide();
		$jntb(this).find(".farbtastic").fadeIn('fast');event.stopPropagation();
	});
	
});

// style select for opera (nab)			
var isOpera_ntb = !!window.opera || navigator.userAgent.indexOf(" OPR/") >= 0;
if (isOpera_ntb) {
document.write("<style>#wpcontent-benaceur-nab select {color:#000;background-color:#909090;}</style>");
}
// style select for opera (nab)			
