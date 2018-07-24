                        <?php if ($dir == 'auto') { ?>
		                <?php if (is_rtl()) { ?>
						<a title="<?php _e("prev",'news-ticker-benaceur'); ?>" href="#"><div id="next-button-ntb"></div></a>
						<a title="<?php _e("next",'news-ticker-benaceur'); ?>" href="#"><div id="prev-button-ntb"></div></a>
						<?php } else { ?>
						<a title="<?php _e("next",'news-ticker-benaceur'); ?>" href="#"><div id="next-button-ntb"></div></a>
						<a title="<?php _e("prev",'news-ticker-benaceur'); ?>" href="#"><div id="prev-button-ntb"></div></a>
						<?php } ?>
						<?php } elseif ($dir == 'ltr') { ?>
						<a title="<?php _e("next",'news-ticker-benaceur'); ?>" href="#"><div id="next-button-ntb"></div></a>
						<a title="<?php _e("prev",'news-ticker-benaceur'); ?>" href="#"><div id="prev-button-ntb"></div></a>
						<?php } elseif ($dir == 'rtl') { ?>	
						<a title="<?php _e("prev",'news-ticker-benaceur'); ?>" href="#"><div id="next-button-ntb"></div></a>
						<a title="<?php _e("next",'news-ticker-benaceur'); ?>" href="#"><div id="prev-button-ntb"></div></a>
						<?php } ?>	

						<ul id="ntbne" >
			<?php
			if($ntb_latest_p_c == 'latest_posts'){
			$recent_posts_ntb = wp_get_recent_posts( $lp );	
			foreach( $recent_posts_ntb as $recent_ntb ) : // foreach
			?>
				<li><a href="<?php echo get_permalink($recent_ntb["ID"]); ?>" title="<?php echo $recent_ntb["post_title"]; ?>">
				<?php
				$ntb_nm_expt_t = !empty($ntb_expt_txt_title) ? $ntb_expt_txt_title : 70 ;

				$user = get_user_by( 'id', $recent_ntb["post_author"] );
				$args = array($recent_ntb["post_date"], $user->display_name, $recent_ntb["post_modified"], $recent_ntb["comment_count"]);
                $filter_title_ntb = apply_filters( 'ntb_title_filter_ben', expt_title_text_NTB($recent_ntb["post_title"], $ntb_nm_expt_t), $args );				
				echo $filter_title_ntb;
				?>
				</a></li>
			<?php endforeach; // end foreach
			} elseif ($ntb_latest_p_c == 'latest_comments') {
if ( count( $comments_list ) > 0 ) {
$date_format = 'j F Y';
 foreach ( $comments_list as $comment ) {
$str = filter_var($comment->comment_content, FILTER_SANITIZE_STRING); 
$ntb_nm_expt = !empty($ntb_expt_txt_comm) ? $ntb_expt_txt_comm : 62 ;
 echo '<li><a href="'.esc_url(get_permalink($comment->comment_post_ID)).'#comment-'.$comment->comment_ID.'">'.expt_title_text_NTB( $str, $ntb_nm_expt ).'</a></li>';
 }
} else {
	echo '<p>';
   _e("No comments",'news-ticker-benaceur');
	echo '</p>';
}
	
			}	
			?>
</ul>
			</div>	


<style>

	<?php if ($ntb_disa_img_n_fadein == 'disable_img_n_fadein') { ?>	
    #next-button-ntb,#prev-button-ntb {display:none;}
	<?php } ?>	

    #next-button-ntb {
    position:absolute;
    cursor:pointer;
    -webkit-transition: opacity 1s ease-in-out;
    -moz-transition: opacity 0.3s ease-in-out;
    -ms-transition: opacity 0.3s ease-in-out;
    -o-transition: opacity 0.3s ease-in-out;
    transition: opacity 0.3s ease-in-out; 
	filter: alpha(opacity=70);
    opacity: 0.7;
	<?php if ($dir == 'auto') { ?>
	<?php if (is_rtl()) { ?>
    left:30px;
	<?php } else { ?>
    right:6px;
	<?php } ?>
    <?php } elseif ($dir == 'ltr') { ?>	
    right:6px;
    <?php } elseif ($dir == 'rtl') { ?>	
    left:30px;
    <?php } ?>	
}
    #next-button-ntb:hover {
    filter: alpha(opacity=100);
    opacity: 1;
}
	
    #prev-button-ntb {
    position:absolute;
    cursor:pointer;
    -webkit-transition: opacity 1s ease-in-out;
    -moz-transition: opacity 0.3s ease-in-out;
    -ms-transition: opacity 0.3s ease-in-out;
    -o-transition: opacity 0.3s ease-in-out;
    transition: opacity 0.3s ease-in-out; 
	filter: alpha(opacity=70);
    opacity: 0.7;
	<?php if ($dir == 'auto') { ?>
	<?php if (is_rtl()) { ?>
    left:6px;
	<?php } else { ?>
    right:30px;
	<?php } ?>
    <?php } elseif ($dir == 'ltr') { ?>	
    right:30px;
    <?php } elseif ($dir == 'rtl') { ?>	
    left:6px;
    <?php } ?>	
}
    #prev-button-ntb:hover {
    filter: alpha(opacity=100);
    opacity: 1;
}

<?php if ($ntb_disable_in_screen_max_width) { ?>
@media only screen and (max-width: <?php echo $ntb_v_screen_max_width; ?>px) {
	.news-ticker-ntb {
		display:none;
	}
}
<?php } ?>
	#ntbne {
		<?php if ($dir == 'auto') { ?>
		<?php if (is_rtl()) { ?>
		float: right;
		margin-right: 0;
		<?php } else { ?>
		float: left;
		margin-left: 0;
		<?php } ?>
		<?php } elseif ($dir == 'ltr') { ?>
		float: left;
		margin-left: 0;
		<?php } elseif ($dir == 'rtl') { ?>
		float: right;
		margin-right: 0;
		<?php } ?>
	    color:<?php echo $f_ntb_color_text_back; ?>;
	}
	#ntbne li {
		list-style: none;
		margin-top:0px;
		display: block;
	}
	.news-ticker-ntb ul a {
		display:block;
	    color:<?php echo $f_ntb_color_text_back; ?>;
		text-decoration: none!important;
	}

<?php if ($ntb_enable_style_mobile) { ?>
@media only screen and (min-width: <?php echo $ntb_screen_min_width; ?>px) {
<?php } ?>
	.news-ticker-ntb ul a {
		<?php if ($dir == 'auto') { 
		 if (is_rtl()) { 
		 if ($ntb_disable_title) {echo "padding-right: 10px;";}
         } else { 
		 if ($ntb_disable_title) {echo "padding-left: 10px;";}
		 }
	     } elseif ($dir == 'ltr') { 
		 if ($ntb_disable_title) {echo "padding-left: 10px;";}
		 } elseif ($dir == 'rtl') { 
		 if ($ntb_disable_title) {echo "padding-right: 10px;";}
		 } ?>
	}
<?php if ($ntb_enable_style_mobile) { ?>
}
<?php } ?>

		 .news-ticker-ntb ul a:hover {
		color:<?php echo $ntb_a_hover; ?>;
		text-decoration: none!important;
	   -webkit-transition: all 0.5s ease-out;
	   -moz-transition: all 0.5s ease-out;
	   -o-transition: all 0.5s ease-out;
	    transition: all 0.5s ease-out;
	}
<?php if ($ntb_enable_style_mobile) { ?>
@media only screen and (max-width: <?php echo $ntb_screen_max_width; ?>px) { 
    .news-ticker-ntb span {display:none;}
	
	.news-ticker-ntb ul a {
		padding-top: <?php echo $ntb_padding_top_mobile; ?>px;
		<?php if ($dir == 'auto') { ?>
		<?php if (is_rtl()) { ?>
		padding-right: <?php echo $ntb_padding_right_left_mobile ?>px;
		<?php } else { ?>
		padding-left: <?php echo $ntb_padding_right_left_mobile ?>px;
		<?php } ?>
		<?php } elseif ($dir == 'ltr') { ?>
		padding-left: <?php echo $ntb_padding_right_left_mobile ?>px;
		<?php } elseif ($dir == 'rtl') { ?>
		padding-right: <?php echo $ntb_padding_right_left_mobile ?>px;
		<?php } ?>
       }
}

@media only screen and (min-width: <?php echo $ntb_screen_min_width; ?>px) {
<?php }	?>
	.news-ticker-ntb span {
		color:<?php echo $f_ntb_color_text_title; ?>;
		background-color:<?php echo $f_ntb_color_back_title ?>;
    	font-size:<?php echo $ntb_font_size_title; ?>px;
		display:block;
		<?php if ($dir == 'auto') { ?>
		<?php if (is_rtl()) { ?>
		float:right;
		margin-left: <?php echo $ntb_dist_from_left_right_fadein; ?>px;
		<?php } else { ?>
		float:left;
		margin-right: <?php echo $ntb_dist_from_left_right_fadein; ?>px;
		<?php } ?>
    	<?php } elseif ($dir == 'ltr') { ?>
		float:left;
		margin-right: <?php echo $ntb_dist_from_left_right_fadein; ?>px;
		<?php } elseif ($dir == 'rtl') { ?>
		float:right;
		margin-left: <?php echo $ntb_dist_from_left_right_fadein; ?>px;
		<?php } ?>
		padding:<?php echo $ntb_padding_top_title; ?>px 10px 2px;
		height:<?php echo $ntb_height; ?>px;
		min-width:<?php echo $ntb_width_title_background; ?>px;
		text-align:center;
		<?php if ($ntb_title_anim_pulsate) {  ?>
        animation: pulsateNTB 1.2s linear infinite;
		-webkit-animation: pulsateNTB 1.2s linear infinite;
        <?php } ?>
    	line-height:<?php echo $ntb_line_height_title; ?>px;
	    border:<?php echo $ntb_border_title; ?>px solid <?php echo $ntb_color_border_title; ?>;
	    box-sizing:border-box;
        -moz-box-sizing:border-box;
        -webkit-box-sizing:border-box;
		
<?php if ($ntb_title_styles == 'radiusTileSt') { ?>	
<?php if (!is_rtl() && $dir != 'rtl' || is_rtl() && $dir == 'ltr') { ?>
-moz-border-radius-topleft: <?php echo $ntb_title_styles_topleft_le; ?>px;
-webkit-border-top-left-radius: <?php echo $ntb_title_styles_topleft_le; ?>px;
 border-top-left-radius: <?php echo $ntb_title_styles_topleft_le; ?>px;
-moz-border-radius-topright: <?php echo $ntb_title_styles_topright_le; ?>px;
-webkit-border-top-right-radius: <?php echo $ntb_title_styles_topright_le; ?>px;
border-top-right-radius: <?php echo $ntb_title_styles_topright_le; ?>px;
<?php } else { ?>	
-moz-border-radius-topleft: <?php echo $ntb_title_styles_topleft_ri; ?>px;
-webkit-border-top-left-radius: <?php echo $ntb_title_styles_topleft_ri; ?>px;
 border-top-left-radius: <?php echo $ntb_title_styles_topleft_ri; ?>px;
-moz-border-radius-topright: <?php echo $ntb_title_styles_topright_ri; ?>px;
-webkit-border-top-right-radius: <?php echo $ntb_title_styles_topright_ri; ?>px;
border-top-right-radius: <?php echo $ntb_title_styles_topright_ri; ?>px;
<?php } ?>	
-moz-border-radius-bottomright: <?php echo $ntb_title_styles_bottomright; ?>px;
-webkit-border-bottom-right-radius: <?php echo $ntb_title_styles_bottomright; ?>px;
border-bottom-right-radius: <?php echo $ntb_title_styles_bottomright; ?>px;
-moz-border-radius-bottomleft: <?php echo $ntb_title_styles_bottomleft; ?>px;
-webkit-border-bottom-left-radius: <?php echo $ntb_title_styles_bottomleft; ?>px;
border-bottom-left-radius: <?php echo $ntb_title_styles_bottomleft; ?>px;
<?php } ?>	

	}
    @-webkit-keyframes pulsateNTB
    {
	0%   { color: #ddd; text-shadow: 0 -1px 0 #000; }
	50%  { color: #fff; text-shadow: 0 -1px 0 #444, 0 0 5px #ffd, 0 0 8px #fff; }
	100% { color: #ddd; text-shadow: 0 -1px 0 #000; }
    }
    @keyframes pulsateNTB
    {
	0%   { color: #ddd; text-shadow: 0 -1px 0 #000; }
	50%  { color: #fff; text-shadow: 0 -1px 0 #444, 0 0 5px #ffd, 0 0 8px #fff; }
	100% { color: #ddd; text-shadow: 0 -1px 0 #000; }
    }
	
<?php if ($ntb_enable_style_mobile) { ?>
}
<?php } ?>
	.news-ticker-ntb {
	font-family:<?php echo $ntb_font_family; ?>;
	font-size:<?php echo $ntb_font_size; ?>px;
	font-weight:<?php echo $ntb_font_weight ;?>;
	background:<?php echo $ntb_color_back;  ?>;
	border-top:<?php echo $ntb_border_top; ?>px solid <?php echo $f_ntb_color_border; ?>;
	border-bottom:<?php echo $ntb_border_bottom; ?>px solid <?php echo $f_ntb_color_border; ?>;
	border-right:<?php echo $ntb_border_right; ?>px solid <?php echo $f_ntb_color_border; ?>;
	border-left:<?php echo $ntb_border_left; ?>px solid <?php echo $f_ntb_color_border; ?>;
    border-radius:<?php echo $ntb_border_radius; ?>px;
    -moz-border-radius:<?php echo $ntb_border_radius; ?>px;
    -webkit-border-radius:<?php echo $ntb_border_radius; ?>px;
	box-shadow:<?php echo $ntb_box_shadow; ?> <?php echo $ntb_box_shadow_v; ?>px <?php echo $ntb_box_shadow_color; ?>;
	-moz-box-shadow:<?php echo $ntb_box_shadow; ?> <?php echo $ntb_box_shadow_v; ?>px <?php echo $ntb_box_shadow_color; ?>;
	-webkit-box-shadow:<?php echo $ntb_box_shadow; ?> <?php echo $ntb_box_shadow_v; ?>px <?php echo $ntb_box_shadow_color; ?>;
	text-shadow:<?php echo $ntb_text_shadow; ?> <?php echo $ntb_text_shadow_color ; ?>;
	width:<?php echo $ntb_width; ?>;
	margin-top:<?php echo $ntb_margin_top; ?>px;
	margin-bottom:<?php echo $ntb_margin_bottom; ?>px;
	opacity:<?php echo $ntb_opacity; ?>;
	position:relative;	
	}
<?php if ($ntb_enable_style_mobile) { ?>
@media only screen and (max-width: <?php echo $ntb_screen_max_width; ?>px) {
	.news-ticker-ntb {
	height:<?php echo $ntb_height_mobile; ?>px;
	line-height:<?php echo $ntb_line_height_mobile; ?>px;
	overflow:hidden;
	word-wrap: break-word;
	}
	.news-ticker-ntb ul a {
		white-space:normal;
	}
	#ntbne {width:98%;}
    #next-button-ntb,#prev-button-ntb {display:none;}
}

@media only screen and (min-width: <?php echo $ntb_screen_min_width; ?>px) {
<?php } ?>
	.news-ticker-ntb ul a {
		white-space:nowrap;
	}
	.news-ticker-ntb {
	height:<?php echo $ntb_height; ?>px;
	line-height:<?php echo $ntb_height; ?>px;
	overflow:hidden;
	}
<?php if ($ntb_enable_style_mobile) { ?>
}
<?php } ?>

</style>

<script>
(function($) {

    $.fn.newsTicker = function (options) {
        var options = $.extend({}, $.fn.newsTicker.config, options);
		
		/* check that the passed element is actually in the DOM */
		if ($(this).length == 0) {
			if (window.console && window.console.log) {
				window.console.log('Element does not exist in DOM!');
			}
			else {
				alert('Element does not exist in DOM!');		
			}
			return false;
		}
		
		/* ID of the identifier */
		var newsID = '#' + $(this).attr('id');
		$(newsID).hide();
		
        return this.each(function () {
            /* initialize the elements in the collection */
			var settings = {				
				count: 0,
				newsArr: {},
				play: true,
				contentLoaded: false,
				interval:'',
				clearIntrvl:0
			};
			
			/* Next button click button handler */
			$(options.nextBtnDiv).click(function() {
				settings.clearIntrvl = 1;
				putNews();
			});
			
			/* Prev button click button handler */
			$(options.prevBtnDiv).click(function() {
				if (settings.count == 0) {
					settings.count = countSize(settings.newsArr) -2;
				}
				else if (settings.count == 1) {
					settings.count = countSize(settings.newsArr) -1;
				}
				else {
					settings.count = settings.count - 2;
				}
				
				if (settings.count < 0) {
					settings.count = countSize(settings.newsArr)-1;
				}
				settings.clearIntrvl = 1;
				putNews();
			});
			
			/* Play/Pause button click button handler */
			$(options.playPauseID).click(function() {
				if(settings.play == true)
				{
					if(settings.interval)
					{
						settings.clearIntrvl = 1;
						clearInterval(settings.interval);
					}
					settings.play= false;
					debugError('Paused:'+settings.count);
				}
				else				
				{
					debugError('Play :'+settings.count);
					settings.play= true;
					putNews();
				}
			});
			
			initPage();
			
			function initPage()
			{
				populateNews();
				
				if(settings.contentLoaded)
				{
					settings.clearIntrvl = 1;
					putNews();
				}
			}
            <?php if( empty($ntb_autostart_fadein)) {  ?>
			function runIntervals()
			{
				settings.clearIntrvl=0;	
				settings.interval = setInterval(function(){ putNews() }, options.interval);
					
				$(options.newsData).hover(function() {
						if(settings.interval)
						{
							settings.clearIntrvl = 1;
                            <?php if( !empty($ntb_pause_fadein)) {  ?>
							clearInterval(settings.interval);
                            <?php } ?>
						}
					 }, function(){
						putNews();
					 });
			}
            <?php } ?>
			/* Function to get the size of an Object*/
			function countSize(obj) {
			    var size = 0, key;
			    for (key in obj) {
			        if (obj.hasOwnProperty(key)) size++;
			    }
			    return size;
			};

			/* This function populates news from the array to newsData div */
			function putNews()
			{
				debugError('in News putting :'+settings.count);
				if(settings.clearIntrvl == 1)
				{
					if(settings.interval)
						clearInterval(settings.interval);
						
				}
			
				$(options.newsData).fadeOut('slow',function(){
					var news = settings.newsArr[settings.count].content;
					
					$(options.newsData).html(news).fadeIn('slow');
					settings.count++;
					if (settings.count == countSize(settings.newsArr) ) {
						settings.count = 0;
					}
				});
				
				if(settings.clearIntrvl == 1)
				{
					runIntervals();
				}
			}	
			
			/* This function populates news array from the UL list */
			function populateNews()
			{
				var tagType = $(newsID).get(0).tagName; 
				
				if (tagType != 'UL' ) {
					debugError('Cannot use <' + tagType.toLowerCase() + '> type of element for this plugin - must of type <ul> or <ol>');
					return false;
				}
				
				if($(newsID + ' LI').length > 0) {
					$(newsID + ' LI').each(function (i) {
						// Populating the news array from LI elements
						settings.newsArr[i] = { type: options.titleText, content: $(this).html()};
					});		
				}	
				else {
					debugError('There are no news in UL tag!');
					return false;
				}
				
				if (countSize(settings.newsArr < 1)) {
					debugError('Couldn\'t find any content from the UL news!');
					return false;
				}
				settings.contentLoaded = true;
			}
			
			/* Function for handling debug and error messages */ 
			function debugError(obj) {
				if (options.debugMode) {
					if (window.console && window.console.log) {
						window.console.log(obj);
					}
					else {
						alert(obj);			
					}
				}
			}
        });
    };

    $.fn.newsTicker.config = {
        // set values and custom functions
		interval: <?php echo $ntb_timeout_fadein; ?>,
		newsData: "#ntbne",
		<?php if (is_rtl() && $dir != 'ltr') { ?> 
		prevBtnDiv: "#next-button-ntb",
		nextBtnDiv: "#prev-button-ntb",
		<?php } else { ?> 
		prevBtnDiv: "#prev-button-ntb",
		nextBtnDiv: "#next-button-ntb",
		<?php } ?> 
		playPauseID: "#play-pause",
		effect: "fadeIn",
		debugMode:0
    };

})(jQuery);

// second function
(function($) {
	$('#ntbne').newsTicker();
})(jQuery);

</script>
