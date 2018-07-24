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

			<ul id="ntbne_five">
			<?php
			if($ntb_latest_p_c == 'latest_posts'){
			$recent_posts_ntb = wp_get_recent_posts( $lp );	
			foreach( $recent_posts_ntb as $recent_ntb ) : // foreach
			?>
				<li><a href="<?php echo get_permalink($recent_ntb["ID"]); ?>" title="<?php echo $recent_ntb["post_title"]; ?>">
				<?php
				$ntb_nm_expt_t = !empty($ntb_expt_txt_title) ? $ntb_expt_txt_title : 62 ;
				
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

	$rtl = (is_rtl() && $dir != 'ltr' || !is_rtl() && $dir == 'rtl') ? true : false ;
	$rtl_ = $rtl ? 'right' : 'left' ;
			
			?>
</ul>
			</div>
			
<style>

<?php if ($ntb_enable_style_mobile) { ?>
@media only screen and (min-width: <?php echo $ntb_screen_min_width; ?>px) {
#ntbne_five {
margin-<?php echo $rtl_; ?>:<?php if ($ntb_disable_title) { echo $ntb_width_anms__two; } else { echo $ntb_width_title_background + $ntb_width_anms__two; } ?>px;
}
}

@media only screen and (max-width: <?php echo $ntb_screen_max_width; ?>px) {
#ntbne_five {
margin-<?php echo $rtl_; ?>:<?php echo $ntb_width_anms__two +5; ?>px;
}
}	
<?php } else { ?>
#ntbne_five {
margin-<?php echo $rtl_; ?>:<?php if ($ntb_disable_title) { echo $ntb_width_anms__two; } else { echo $ntb_width_title_background + $ntb_width_anms__two; } ?>px;
}
<?php } ?>

	<?php if ($ntb_st == 'fade') { ?>
    #ntbne_five li{right:0px;}
	<?php } ?>
	
	<?php if ($ntb_NP_img_anms_two == 'disable') { ?>	
    #next-button-ntb,#prev-button-ntb {display:none;}
	<?php } ?>	
	
	<?php if ($ntb_st != 'slideX') { ?>
	<?php if ($ntb_enable_style_mobile) { ?>
    @media only screen and (min-width: <?php echo $ntb_screen_min_width; ?>px) { #ntbne_five li{} }
		<?php } else { ?>
	#ntbne_five li{}
		<?php } } ?>

	#ntbne_five li {
		position:relative;
		}
		
<?php if ($ntb_disable_in_screen_max_width) { ?>
@media only screen and (max-width: <?php echo $ntb_v_screen_max_width; ?>px) {
	.news-ticker-ntb {
		display:none;
	}
}
<?php } ?>

	#ntbne_five {
	    color:<?php echo $f_ntb_color_text_back; ?>;
	}
	.news-ticker-ntb ul a {		
		display:block;
	    color:<?php echo $f_ntb_color_text_back; ?>;
		text-decoration: none!important;
	}
<?php if ($ntb_enable_style_mobile) { ?>
@media only screen and (min-width: <?php echo $ntb_screen_min_width; ?>px) {
<?php } ?>
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
    .news-ticker-ntb span {display:none; max-width:0px;}

	.news-ticker-ntb ul a{
		padding-top: <?php echo $ntb_padding_top_mobile; ?>px;
       }
}
@media only screen and (min-width: <?php echo $ntb_screen_min_width; ?>px) {
<?php } ?>
	.news-ticker-ntb span {
		position:absolute;
		z-index:2;
		color:<?php echo $f_ntb_color_text_title; ?>;
		background-color:<?php echo $f_ntb_color_back_title; ?>;
    	font-size:<?php echo $ntb_font_size_title; ?>px;
		display:block;
		padding:<?php echo $ntb_padding_top_title; ?>px 10px 2px;
		height:<?php echo $ntb_height; ?>px;
		width:<?php echo $ntb_width_title_background; ?>px;
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
	overflow:hidden;
	position:relative;	
	}
	
<?php if ($ntb_enable_style_mobile) { ?>
@media only screen and (max-width: <?php echo $ntb_screen_max_width; ?>px) {
	#ntbne_five {
    	min-height:<?php echo $ntb_min_height_mobile; ?>px;
	}
	

	#ntbne_five li {
		width:99%;
		overflow:hidden;
		list-style: none;
		margin-top:0px;
		display: block;
    	height:<?php echo $ntb_height_mobile; ?>px;
	}
	.news-ticker-ntb {
	height:<?php echo $ntb_height_mobile; ?>px;
	line-height:<?php echo $ntb_line_height_mobile; ?>px;
	}
	.news-ticker-ntb ul a {
		white-space:normal;
	}
	#ntbne_five  {
	width:99%;
	}
    #next-button-ntb,#prev-button-ntb {display:none;}
}
@media only screen and (min-width: <?php echo $ntb_screen_min_width; ?>px) {
<?php } ?>
	#ntbne_five li {
		overflow:hidden;
		list-style: none;
		margin-top:0px;
		display: block;
	}
	.news-ticker-ntb ul a {
		white-space:nowrap;
	}
	.news-ticker-ntb {
	height:<?php echo $ntb_height; ?>px;
	line-height:<?php echo $ntb_height; ?>px;
	}
<?php if ($ntb_enable_style_mobile) { ?>
}
<?php } ?>
    #next-button-ntb {
    position:absolute;
	z-index:99;
    cursor:pointer;
    -webkit-transition: opacity 1s ease-in-out;
    -moz-transition: opacity 0.3s ease-in-out;
    -ms-transition: opacity 0.3s ease-in-out;
    -o-transition: opacity 0.3s ease-in-out;
    transition: opacity 0.3s ease-in-out; 
	filter: alpha(opacity=70);
    opacity: 0.7;
	<?php if ($rtl) { ?>	
    left:30px;
	<?php } else { ?>
    right:6px;
	<?php } ?>
}
    #next-button-ntb:hover {
    filter: alpha(opacity=100);
    opacity: 1;
}
	
    #prev-button-ntb {
    position:absolute;
	z-index:99;
    cursor:pointer;
    -webkit-transition: opacity 1s ease-in-out;
    -moz-transition: opacity 0.3s ease-in-out;
    -ms-transition: opacity 0.3s ease-in-out;
    -o-transition: opacity 0.3s ease-in-out;
    transition: opacity 0.3s ease-in-out; 
	filter: alpha(opacity=70);
    opacity: 0.7;
	<?php if ($rtl) { ?>	
    left:6px;
	<?php } else { ?>
    right:30px;
	<?php } ?>
}
    #prev-button-ntb:hover {
    filter: alpha(opacity=100);
    opacity: 1;
}

</style>

<script type="text/javascript">
	<?php
	$ocf = $rtl ? 'opts.cssFirst.right' : 'opts.cssFirst.left' ; 
	$ocb = $rtl ? 'opts.cssBefore.right' : 'opts.cssBefore.left' ;
	$oai = $rtl ? 'opts.animIn.right' : 'opts.animIn.left' ; 
	$oao = $rtl ? 'opts.animOut.right' : 'opts.animOut.left' ; 
	
    $Vex_st = ($ntb_st == 'turnLeft' || $ntb_st == 'turnRight') ? '5' : '' ;	
	?>

<?php if (!$ntb_ena_js_scrollntb) { ?>
!function(a,b){"use strict";function d(b){a.fn.cycle.debug&&e(b)}function e(){window.console&&console.log&&console.log("[cycle] "+Array.prototype.join.call(arguments," "))}function f(b,c,d){var e=a(b).data("cycle.opts");if(e){var f=!!b.cyclePause;f&&e.paused?e.paused(b,e,c,d):!f&&e.resumed&&e.resumed(b,e,c,d)}}function g(c,d,g){function k(b,c,d){if(!b&&c===!0){var f=a(d).data("cycle.opts");if(!f)return e("options not found, can not resume"),!1;d.cycleTimeout&&(clearTimeout(d.cycleTimeout),d.cycleTimeout=0),n(f.elements,f,1,!f.backwards)}}if(c.cycleStop===b&&(c.cycleStop=0),d!==b&&null!==d||(d={}),d.constructor==String){switch(d){case"destroy":case"stop":var h=a(c).data("cycle.opts");return!!h&&(c.cycleStop++,c.cycleTimeout&&clearTimeout(c.cycleTimeout),c.cycleTimeout=0,h.elements&&a(h.elements).stop(),a(c).removeData("cycle.opts"),"destroy"==d&&i(c,h),!1);case"toggle":return c.cyclePause=1===c.cyclePause?0:1,k(c.cyclePause,g,c),f(c),!1;case"pause":return c.cyclePause=1,f(c),!1;case"resume":return c.cyclePause=0,k(!1,g,c),f(c),!1;case"prev":case"next":return(h=a(c).data("cycle.opts"))?("string"==typeof g&&(h.oneTimeFx=g),a.fn.cycle[d](h),!1):(e('options not found, "prev/next" ignored'),!1);default:d={fx:d}}return d}if(d.constructor==Number){var j=d;return(d=a(c).data("cycle.opts"))?j<0||j>=d.elements.length?(e("invalid slide index: "+j),!1):(d.nextSlide=j,c.cycleTimeout&&(clearTimeout(c.cycleTimeout),c.cycleTimeout=0),"string"==typeof g&&(d.oneTimeFx=g),n(d.elements,d,1,j>=d.currSlide),!1):(e("options not found, can not advance slide"),!1)}return d}function h(b,c){if(!a.support.opacity&&c.cleartype&&b.style.filter)try{b.style.removeAttribute("filter")}catch(a){}}function i(b,c){c.next&&a(c.next).unbind(c.prevNextEvent),c.prev&&a(c.prev).unbind(c.prevNextEvent),(c.pager||c.pagerAnchorBuilder)&&a.each(c.pagerAnchors||[],function(){this.unbind().remove()}),c.pagerAnchors=null,a(b).unbind("mouseenter.cycle mouseleave.cycle"),c.destroy&&c.destroy(c)}function j(c,d,g,i,j){var o,s=a.extend({},a.fn.cycle.defaults,i||{},a.metadata?c.metadata():a.meta?c.data():{}),t=a.isFunction(c.data)?c.data(s.metaAttr):null;t&&(s=a.extend(s,t)),s.autostop&&(s.countdown=s.autostopCount||g.length);var u=c[0];if(c.data("cycle.opts",s),s.$cont=c,s.stopCount=u.cycleStop,s.elements=g,s.before=s.before?[s.before]:[],s.after=s.after?[s.after]:[],!a.support.opacity&&s.cleartype&&s.after.push(function(){h(this,s)}),s.continuous&&s.after.push(function(){n(g,s,0,!s.backwards)}),k(s),a.support.opacity||!s.cleartype||s.cleartypeNoBg||r(d),"static"==c.css("position")&&c.css("position","relative"),s.width&&c.width(s.width),s.height&&"auto"!=s.height&&c.height(s.height),s.startingSlide!==b?(s.startingSlide=parseInt(s.startingSlide,10),s.startingSlide>=g.length||s.startSlide<0?s.startingSlide=0:o=!0):s.backwards?s.startingSlide=g.length-1:s.startingSlide=0,s.random){s.randomMap=[];for(var v=0;v<g.length;v++)s.randomMap.push(v);if(s.randomMap.sort(function(a,b){return Math.random()-.5}),o)for(var w=0;w<g.length;w++)s.startingSlide==s.randomMap[w]&&(s.randomIndex=w);else s.randomIndex=1,s.startingSlide=s.randomMap[1]}else s.startingSlide>=g.length&&(s.startingSlide=0);s.currSlide=s.startingSlide||0;var x=s.startingSlide;d.css({position:"absolute",top:0,left:0}).hide().each(function(b){var c;c=s.backwards?x?b<=x?g.length+(b-x):x-b:g.length-b:x?b>=x?g.length-(b-x):x-b:g.length-b,a(this).css("z-index",c)}),a(g[x]).css("opacity",1).show(),h(g[x],s),s.fit&&(s.aspect?d.each(function(){var b=a(this),c=s.aspect===!0?b.width()/b.height():s.aspect;s.width&&b.width()!=s.width&&(b.width(s.width),b.height(s.width/c)),s.height&&b.height()<s.height&&(b.height(s.height),b.width(s.height*c))}):(s.width&&d.width(s.width),s.height&&"auto"!=s.height&&d.height(s.height))),!s.center||s.fit&&!s.aspect||d.each(function(){var b=a(this);b.css({"margin-left":s.width?(s.width-b.width())/2+"px":0,"margin-top":s.height?(s.height-b.height())/2+"px":0})}),!s.center||s.fit||s.slideResize||d.each(function(){var b=a(this);b.css({"margin-left":s.width?(s.width-b.width())/2+"px":0,"margin-top":s.height?(s.height-b.height())/2+"px":0})});var y=(s.containerResize||s.containerResizeHeight)&&c.innerHeight()<1;if(y){for(var z=0,A=0,B=0;B<g.length;B++){var C=a(g[B]),D=C[0],E=C.outerWidth(),F=C.outerHeight();E||(E=D.offsetWidth||D.width||C.attr("width")),F||(F=D.offsetHeight||D.height||C.attr("height")),z=E>z?E:z,A=F>A?F:A}s.containerResize&&z>0&&A>0&&c.css({width:z+"px",height:A+"px"}),s.containerResizeHeight&&A>0&&c.css({height:A+"px"})}var G=!1;if(s.pause&&c.bind("mouseenter.cycle",function(){G=!0,this.cyclePause++,f(u,!0)}).bind("mouseleave.cycle",function(){G&&this.cyclePause--,f(u,!0)}),l(s)===!1)return!1;var H=!1;if(i.requeueAttempts=i.requeueAttempts||0,d.each(function(){var b=a(this);if(this.cycleH=s.fit&&s.height?s.height:b.height()||this.offsetHeight||this.height||b.attr("height")||0,this.cycleW=s.fit&&s.width?s.width:b.width()||this.offsetWidth||this.width||b.attr("width")||0,b.is("img")){var c=0===this.cycleH&&0===this.cycleW&&!this.complete;if(c){if(j.s&&s.requeueOnImageNotLoaded&&++i.requeueAttempts<100)return e(i.requeueAttempts," - img slide not loaded, requeuing slideshow: ",this.src,this.cycleW,this.cycleH),setTimeout(function(){a(j.s,j.c).cycle(i)},s.requeueTimeout),H=!0,!1;e("could not determine size of image: "+this.src,this.cycleW,this.cycleH)}}return!0}),H)return!1;if(s.cssBefore=s.cssBefore||{},s.cssAfter=s.cssAfter||{},s.cssFirst=s.cssFirst||{},s.animIn=s.animIn||{},s.animOut=s.animOut||{},d.not(":eq("+x+")").css(s.cssBefore),a(d[x]).css(s.cssFirst),s.timeout){s.timeout=parseInt(s.timeout,10),s.speed.constructor==String&&(s.speed=a.fx.speeds[s.speed]||parseInt(s.speed,10)),s.sync||(s.speed=s.speed/2);for(var I="none"==s.fx?0:"shuffle"==s.fx?500:250;s.timeout-s.speed<I;)s.timeout+=s.speed}if(s.easing&&(s.easeIn=s.easeOut=s.easing),s.speedIn||(s.speedIn=s.speed),s.speedOut||(s.speedOut=s.speed),s.slideCount=g.length,s.currSlide=s.lastSlide=x,s.random?(++s.randomIndex==g.length&&(s.randomIndex=0),s.nextSlide=s.randomMap[s.randomIndex]):s.backwards?s.nextSlide=0===s.startingSlide?g.length-1:s.startingSlide-1:s.nextSlide=s.startingSlide>=g.length-1?0:s.startingSlide+1,!s.multiFx){var J=a.fn.cycle.transitions[s.fx];if(a.isFunction(J))J(c,d,s);else if("custom"!=s.fx&&!s.multiFx)return e("unknown transition: "+s.fx,"; slideshow terminating"),!1}var K=d[x];return s.skipInitializationCallbacks||(s.before.length&&s.before[0].apply(K,[K,K,s,!0]),s.after.length&&s.after[0].apply(K,[K,K,s,!0])),s.next&&a(s.next).bind(s.prevNextEvent,function(){return p(s,1)}),s.prev&&a(s.prev).bind(s.prevNextEvent,function(){return p(s,0)}),(s.pager||s.pagerAnchorBuilder)&&q(g,s),m(s,g),s}function k(b){b.original={before:[],after:[]},b.original.cssBefore=a.extend({},b.cssBefore),b.original.cssAfter=a.extend({},b.cssAfter),b.original.animIn=a.extend({},b.animIn),b.original.animOut=a.extend({},b.animOut),a.each(b.before,function(){b.original.before.push(this)}),a.each(b.after,function(){b.original.after.push(this)})}function l(b){var c,f,g=a.fn.cycle.transitions;if(b.fx.indexOf(",")>0){for(b.multiFx=!0,b.fxs=b.fx.replace(/\s*/g,"").split(","),c=0;c<b.fxs.length;c++){var h=b.fxs[c];f=g[h],f&&g.hasOwnProperty(h)&&a.isFunction(f)||(e("discarding unknown transition: ",h),b.fxs.splice(c,1),c--)}if(!b.fxs.length)return e("No valid transitions named; slideshow terminating."),!1}else if("all"==b.fx){b.multiFx=!0,b.fxs=[];for(var i in g)g.hasOwnProperty(i)&&(f=g[i],g.hasOwnProperty(i)&&a.isFunction(f)&&b.fxs.push(i))}if(b.multiFx&&b.randomizeEffects){var j=Math.floor(20*Math.random())+30;for(c=0;c<j;c++){var k=Math.floor(Math.random()*b.fxs.length);b.fxs.push(b.fxs.splice(k,1)[0])}d("randomized fx sequence: ",b.fxs)}return!0}function m(b,c){b.addSlide=function(d,e){var f=a(d),g=f[0];b.autostopCount||b.countdown++,c[e?"unshift":"push"](g),b.els&&b.els[e?"unshift":"push"](g),b.slideCount=c.length,b.random&&(b.randomMap.push(b.slideCount-1),b.randomMap.sort(function(a,b){return Math.random()-.5})),f.css("position","absolute"),f[e?"prependTo":"appendTo"](b.$cont),e&&(b.currSlide++,b.nextSlide++),a.support.opacity||!b.cleartype||b.cleartypeNoBg||r(f),b.fit&&b.width&&f.width(b.width),b.fit&&b.height&&"auto"!=b.height&&f.height(b.height),g.cycleH=b.fit&&b.height?b.height:f.height(),g.cycleW=b.fit&&b.width?b.width:f.width(),f.css(b.cssBefore),(b.pager||b.pagerAnchorBuilder)&&a.fn.cycle.createPagerAnchor(c.length-1,g,a(b.pager),c,b),a.isFunction(b.onAddSlide)?b.onAddSlide(f):f.hide()}}function n(c,e,f,g){function q(){var a=0;e.timeout;e.timeout&&!e.continuous?(a=o(c[e.currSlide],c[e.nextSlide],e,g),"shuffle"==e.fx&&(a-=e.speedOut)):e.continuous&&h.cyclePause&&(a=10),a>0&&(h.cycleTimeout=setTimeout(function(){n(c,e,0,!e.backwards)},a))}var h=e.$cont[0],i=c[e.currSlide],j=c[e.nextSlide];if(f&&e.busy&&e.manualTrump&&(d("manualTrump in go(), stopping active transition"),a(c).stop(!0,!0),e.busy=0,clearTimeout(h.cycleTimeout)),e.busy)return void d("transition active, ignoring new tx request");if(h.cycleStop==e.stopCount&&(0!==h.cycleTimeout||f)){if(!f&&!h.cyclePause&&!e.bounce&&(e.autostop&&--e.countdown<=0||e.nowrap&&!e.random&&e.nextSlide<e.currSlide))return void(e.end&&e.end(e));var k=!1;if(!f&&h.cyclePause||e.nextSlide==e.currSlide)q();else{k=!0;var l=e.fx;i.cycleH=i.cycleH||a(i).height(),i.cycleW=i.cycleW||a(i).width(),j.cycleH=j.cycleH||a(j).height(),j.cycleW=j.cycleW||a(j).width(),e.multiFx&&(g&&(e.lastFx===b||++e.lastFx>=e.fxs.length)?e.lastFx=0:!g&&(e.lastFx===b||--e.lastFx<0)&&(e.lastFx=e.fxs.length-1),l=e.fxs[e.lastFx]),e.oneTimeFx&&(l=e.oneTimeFx,e.oneTimeFx=null),a.fn.cycle.resetState(e,l),e.before.length&&a.each(e.before,function(a,b){h.cycleStop==e.stopCount&&b.apply(j,[i,j,e,g])});var m=function(){e.busy=0,a.each(e.after,function(a,b){h.cycleStop==e.stopCount&&b.apply(j,[i,j,e,g])}),h.cycleStop||q()};d("tx firing("+l+"); currSlide: "+e.currSlide+"; nextSlide: "+e.nextSlide),e.busy=1,e.fxFn?e.fxFn(i,j,e,m,g,f&&e.fastOnEvent):a.isFunction(a.fn.cycle[e.fx])?a.fn.cycle[e.fx](i,j,e,m,g,f&&e.fastOnEvent):a.fn.cycle.custom(i,j,e,m,g,f&&e.fastOnEvent)}if(k||e.nextSlide==e.currSlide){var p;e.lastSlide=e.currSlide,e.random?(e.currSlide=e.nextSlide,++e.randomIndex==c.length&&(e.randomIndex=0,e.randomMap.sort(function(a,b){return Math.random()-.5})),e.nextSlide=e.randomMap[e.randomIndex],e.nextSlide==e.currSlide&&(e.nextSlide=e.currSlide==e.slideCount-1?0:e.currSlide+1)):e.backwards?(p=e.nextSlide-1<0,p&&e.bounce?(e.backwards=!e.backwards,e.nextSlide=1,e.currSlide=0):(e.nextSlide=p?c.length-1:e.nextSlide-1,e.currSlide=p?0:e.nextSlide+1)):(p=e.nextSlide+1==c.length,p&&e.bounce?(e.backwards=!e.backwards,e.nextSlide=c.length-2,e.currSlide=c.length-1):(e.nextSlide=p?0:e.nextSlide+1,e.currSlide=p?c.length-1:e.nextSlide-1))}k&&e.pager&&e.updateActivePagerLink(e.pager,e.currSlide,e.activePagerClass)}}function o(a,b,c,e){if(c.timeoutFn){for(var f=c.timeoutFn.call(a,a,b,c,e);"none"!=c.fx&&f-c.speed<250;)f+=c.speed;if(d("calculated timeout: "+f+"; speed: "+c.speed),f!==!1)return f}return c.timeout}function p(b,c){var d=c?1:-1,e=b.elements,f=b.$cont[0],g=f.cycleTimeout;if(g&&(clearTimeout(g),f.cycleTimeout=0),b.random&&d<0)b.randomIndex--,--b.randomIndex==-2?b.randomIndex=e.length-2:b.randomIndex==-1&&(b.randomIndex=e.length-1),b.nextSlide=b.randomMap[b.randomIndex];else if(b.random)b.nextSlide=b.randomMap[b.randomIndex];else if(b.nextSlide=b.currSlide+d,b.nextSlide<0){if(b.nowrap)return!1;b.nextSlide=e.length-1}else if(b.nextSlide>=e.length){if(b.nowrap)return!1;b.nextSlide=0}var h=b.onPrevNextEvent||b.prevNextClick;return a.isFunction(h)&&h(d>0,b.nextSlide,e[b.nextSlide]),n(e,b,1,c),!1}function q(b,c){var d=a(c.pager);a.each(b,function(e,f){a.fn.cycle.createPagerAnchor(e,f,d,b,c)}),c.updateActivePagerLink(c.pager,c.startingSlide,c.activePagerClass)}function r(b){function c(a){return a=parseInt(a,10).toString(16),a.length<2?"0"+a:a}function e(b){for(;b&&"html"!=b.nodeName.toLowerCase();b=b.parentNode){var d=a.css(b,"background-color");if(d&&d.indexOf("rgb")>=0){var e=d.match(/\d+/g);return"#"+c(e[0])+c(e[1])+c(e[2])}if(d&&"transparent"!=d)return d}return"#ffffff"}d("applying clearType background-color hack"),b.each(function(){a(this).css("background-color",e(this))})}var c="3.0.3";a.expr[":"].paused=function(a){return a.cyclePause},a.fn.cycle=function(b,c){var f={s:this.selector,c:this.context};return 0===this.length&&"stop"!=b?!a.isReady&&f.s?(e("DOM not ready, queuing slideshow"),a(function(){a(f.s,f.c).cycle(b,c)}),this):(e("terminating; zero elements found by selector"+(a.isReady?"":" (DOM not ready)")),this):this.each(function(){var h=g(this,b,c);if(h!==!1){h.updateActivePagerLink=h.updateActivePagerLink||a.fn.cycle.updateActivePagerLink,this.cycleTimeout&&clearTimeout(this.cycleTimeout),this.cycleTimeout=this.cyclePause=0,this.cycleStop=0;var i=a(this),k=h.slideExpr?a(h.slideExpr,this):i.children(),l=k.get();if(l.length<2)return void e("terminating; too few slides: "+l.length);var m=j(i,k,l,h,f);if(m!==!1){var p=m.continuous?10:o(l[m.currSlide],l[m.nextSlide],m,!m.backwards);p&&(p+=m.delay||0,p<10&&(p=10),d("first timeout: "+p),this.cycleTimeout=setTimeout(function(){n(l,m,0,!h.backwards)},p))}}})},a.fn.cycle.resetState=function(b,c){c=c||b.fx,b.before=[],b.after=[],b.cssBefore=a.extend({},b.original.cssBefore),b.cssAfter=a.extend({},b.original.cssAfter),b.animIn=a.extend({},b.original.animIn),b.animOut=a.extend({},b.original.animOut),b.fxFn=null,a.each(b.original.before,function(){b.before.push(this)}),a.each(b.original.after,function(){b.after.push(this)});var d=a.fn.cycle.transitions[c];a.isFunction(d)&&d(b.$cont,a(b.elements),b)},a.fn.cycle.updateActivePagerLink=function(b,c,d){a(b).each(function(){a(this).children().removeClass(d).eq(c).addClass(d)})},a.fn.cycle.next=function(a){p(a,1)},a.fn.cycle.prev=function(a){p(a,0)},a.fn.cycle.createPagerAnchor=function(b,c,e,g,h){var i;if(a.isFunction(h.pagerAnchorBuilder)?(i=h.pagerAnchorBuilder(b,c),d("pagerAnchorBuilder("+b+", el) returned: "+i)):i='<a href="#">'+(b+1)+"</a>",i){var j=a(i);if(0===j.parents("body").length){var k=[];e.length>1?(e.each(function(){var b=j.clone(!0);a(this).append(b),k.push(b[0])}),j=a(k)):j.appendTo(e)}h.pagerAnchors=h.pagerAnchors||[],h.pagerAnchors.push(j);var l=function(c){c.preventDefault(),h.nextSlide=b;var d=h.$cont[0],e=d.cycleTimeout;e&&(clearTimeout(e),d.cycleTimeout=0);var f=h.onPagerEvent||h.pagerClick;a.isFunction(f)&&f(h.nextSlide,g[h.nextSlide]),n(g,h,1,h.currSlide<b)};/mouseenter|mouseover/i.test(h.pagerEvent)?j.hover(l,function(){}):j.bind(h.pagerEvent,l),/^click/.test(h.pagerEvent)||h.allowPagerClickBubble||j.bind("click.cycle",function(){return!1});var m=h.$cont[0],o=!1;h.pauseOnPagerHover&&j.hover(function(){o=!0,m.cyclePause++,f(m,!0,!0)},function(){o&&m.cyclePause--,f(m,!0,!0)})}},a.fn.cycle.hopsFromLast=function(a,b){var c,d=a.lastSlide,e=a.currSlide;return c=b?e>d?e-d:a.slideCount-d:e<d?d-e:d+a.slideCount-e},a.fn.cycle.commonReset=function(b,c,d,e,f,g){a(d.elements).not(b).hide(),"undefined"==typeof d.cssBefore.opacity&&(d.cssBefore.opacity=1),d.cssBefore.display="block",d.slideResize&&e!==!1&&c.cycleW>0&&(d.cssBefore.width=c.cycleW),d.slideResize&&f!==!1&&c.cycleH>0&&(d.cssBefore.height=c.cycleH),d.cssAfter=d.cssAfter||{},d.cssAfter.display="none",a(b).css("zIndex",d.slideCount+(g===!0?1:0)),a(c).css("zIndex",d.slideCount+(g===!0?0:1))},a.fn.cycle.custom=function(b,c,d,e,f,g){var h=a(b),i=a(c),j=d.speedIn,k=d.speedOut,l=d.easeIn,m=d.easeOut,n=d.animInDelay,o=d.animOutDelay;i.css(d.cssBefore),g&&(j=k="number"==typeof g?g:1,l=m=null);var p=function(){i.delay(n).animate(d.animIn,j,l,function(){e()})};h.delay(o).animate(d.animOut,k,m,function(){h.css(d.cssAfter),d.sync||p()}),d.sync&&p()},a.fn.cycle.transitions={fade:function(b,c,d){c.not(":eq("+d.currSlide+")").css("opacity",0),d.before.push(function(b,c,d){a.fn.cycle.commonReset(b,c,d),d.cssBefore.opacity=0}),d.animIn={opacity:1},d.animOut={opacity:0},d.cssBefore={top:0,left:0}}},a.fn.cycle.ver=function(){return c},a.fn.cycle.defaults={activePagerClass:"activeSlide",after:null,allowPagerClickBubble:!1,animIn:null,animInDelay:0,animOut:null,animOutDelay:0,aspect:!1,autostop:0,autostopCount:0,backwards:!1,before:null,center:null,cleartype:!a.support.opacity,cleartypeNoBg:!1,containerResize:1,containerResizeHeight:0,continuous:0,cssAfter:null,cssBefore:null,delay:0,easeIn:null,easeOut:null,easing:null,end:null,fastOnEvent:0,fit:0,fx:"fade",fxFn:null,height:"auto",manualTrump:!0,metaAttr:"cycle",next:null,nowrap:0,onPagerEvent:null,onPrevNextEvent:null,pager:null,pagerAnchorBuilder:null,pagerEvent:"click.cycle",pause:0,pauseOnPagerHover:0,prev:null,prevNextEvent:"click.cycle",random:0,randomizeEffects:1,requeueOnImageNotLoaded:!0,requeueTimeout:250,rev:0,shuffle:null,skipInitializationCallbacks:!1,slideExpr:null,slideResize:1,speed:1e3,speedIn:null,speedOut:null,startingSlide:b,sync:1,timeout:4e3,timeoutFn:null,updateActivePagerLink:null,width:null}}(jQuery);
<?php } ?>

(function($) {
"use strict";

$(document).ready(NTBresizefun1);
$(window).on('resize',NTBresizefun1);
function NTBresizefun1() {
$("#ntbne_five").css({"overflow": "hidden"});
var width_NTBf = $('#ntbne_five').width();
var f = $(".news-ticker-ntb").width();

<?php if ($ntb_enable_style_mobile) { // $ntb_dis_fin_img_scrollntb +35-5 ?>
if( window.innerWidth > <?php echo $ntb_screen_min_width; ?> ) {
$("#ntbne_five").css("maxWidth", f -<?php $ntb_dis_fin = $ntb_NP_img_anms_two == 'enable' ? $ntb_dis_fin_img_scrollntb +$ntb_width_anms__two - $Vex_st : $ntb_dis_fin_no_img_scrollntb - $Vex_st ; echo $ntb_dis_fin; ?>  <?php if (!$ntb_disable_title) { echo '-' .$ntb_width_title_background; } ?> );
} else {
$("#ntbne_five").css("maxWidth", f -15-<?php echo $ntb_width_anms__two; ?>  );
}
<?php } else { ?>
$("#ntbne_five").css("maxWidth", f -<?php $ntb_dis_fin = $ntb_NP_img_anms_two == 'enable' ? $ntb_dis_fin_img_scrollntb +$ntb_width_anms__two - $Vex_st : $ntb_dis_fin_no_img_scrollntb - $Vex_st ; echo $ntb_dis_fin; ?>  <?php if (!$ntb_disable_title) { echo '-' .$ntb_width_title_background; } ?> );
<?php } ?>
}

<?php
switch ($ntb_st) {
    case 'curtainY':
?>	
$.fn.cycle.transitions.curtainY = function($cont, $slides, opts) {
	$slides.css({"<?php echo $rtl_; ?>": "0px"});
	opts.before.push(function(curr, next, opts) {
		$.fn.cycle.commonReset(curr,next,opts,true,false,true);
		opts.cssBefore.top = next.cycleH;
		opts.animIn.top = 0;
		opts.animIn.height = next.cycleH;
		opts.animOut.top = curr.cycleH;
		opts.animOut.height = 0;
	});
	opts.cssBefore.height = 0;
	<?php echo $ocb; ?> = 0;
};
<?php		
        break;
    case 'curtainX':
?>	
$.fn.cycle.transitions.curtainX = function($cont, $slides, opts) {
	$slides.css({"<?php echo $rtl_; ?>": "0px"});
	opts.before.push(function(curr, next, opts) {
		$.fn.cycle.commonReset(curr,next,opts,false,true,true);
		<?php echo $ocb; ?> = next.cycleW;
		<?php echo $oai; ?> = 0;
		opts.animIn.width = this.cycleW;
		<?php echo $oao; ?> = curr.cycleW;
		opts.animOut.width = 0;
	});
	opts.cssBefore.top = 0;
	opts.cssBefore.width = 0;
};
<?php		
        break;
    case 'turnUp':
?>	
$.fn.cycle.transitions.turnUp = function($cont, $slides, opts) {
	$slides.css({"<?php echo $rtl_; ?>": "0px"});
	opts.before.push(function(curr, next, opts) {
		$.fn.cycle.commonReset(curr,next,opts,true,false);
		opts.cssBefore.top = next.cycleH;
		opts.animIn.height = next.cycleH;
		opts.animOut.width = next.cycleW;
	});
	opts.cssFirst.top = 0;
	opts.cssBefore.left = 0;
	opts.cssBefore.height = 0;
	opts.animIn.top = 0;
	opts.animOut.height = 0;
};
<?php		
        break;
    case 'turnDown':
?>	
$.fn.cycle.transitions.turnDown = function($cont, $slides, opts) {
	$slides.css({"<?php echo $rtl_; ?>": "0px"});
	opts.before.push(function(curr, next, opts) {
		$.fn.cycle.commonReset(curr,next,opts,true,false);
		opts.animIn.height = next.cycleH;
		opts.animOut.top   = curr.cycleH;
	});
	opts.cssFirst.top = 0;
	opts.cssBefore.left = 0;
	opts.cssBefore.top = 0;
	opts.cssBefore.height = 0;
	opts.animOut.height = 0;
};
<?php		
        break;
    case 'turnLeft':
?>	
$.fn.cycle.transitions.turnLeft = function($cont, $slides, opts) {
	$slides.css({"<?php echo $rtl_; ?>": "0px"});
	opts.before.push(function(curr, next, opts) {
		$.fn.cycle.commonReset(curr,next,opts,false,true);
		<?php echo $ocb; ?> = next.cycleW;
		opts.animIn.width = next.cycleW;
	});
	opts.cssBefore.top = 0;
	opts.cssBefore.width = 0;
	<?php echo $oai; ?> = 0;
	opts.animOut.width = 0;
};
<?php		
        break;
    case 'turnRight':
?>	
$.fn.cycle.transitions.turnRight = function($cont, $slides, opts) {
	$slides.css({"<?php echo $rtl_; ?>": "0px"});
	opts.before.push(function(curr, next, opts) {
		$.fn.cycle.commonReset(curr,next,opts,false,true);
		opts.animIn.width = next.cycleW;
		<?php echo $oao; ?> = curr.cycleW;
	});
	$.extend(opts.cssBefore, { top: 0, <?php echo $rtl_; ?>: 0, width: 0 });
	<?php echo $oai; ?> = 0;
	opts.animOut.width = 0;
};
<?php		
        break;
    case 'slideY':
?>	
$.fn.cycle.transitions.slideY = function($cont, $slides, opts) {
	$slides.css({"<?php echo $rtl_; ?>": "0px"});
	opts.before.push(function(curr, next, opts) {
		$(opts.elements).not(curr).hide();
		$.fn.cycle.commonReset(curr,next,opts,true,false);
		opts.animIn.height = next.cycleH;
	});
	opts.cssBefore.left = 0;
	opts.cssBefore.top = 0;
	opts.cssBefore.height = 0;
	opts.animIn.height = 'show';
	opts.animOut.height = 0;
};
<?php		
        break;
    case 'slideX':
?>	
$.fn.cycle.transitions.slideX = function($cont, $slides, opts) {
	$slides.css({"<?php echo $rtl_; ?>": "0px"});
	opts.before.push(function(curr, next, opts) {
		$(opts.elements).not(curr).hide();
		$.fn.cycle.commonReset(curr,next,opts,false,true);
		opts.animIn.width = next.cycleW;
	});
	<?php echo $ocb; ?> = 0;
	opts.cssBefore.top = 0;
	opts.cssBefore.width = 0;
	opts.animIn.width = 'show';
	opts.animOut.width = 0;
};
<?php		
        break;
    case 'growX':
?>	
$.fn.cycle.transitions.growX = function($cont, $slides, opts) {
	$slides.css({"<?php echo $rtl_; ?>": "0px"});
	opts.before.push(function(curr, next, opts) {
		$.fn.cycle.commonReset(curr,next,opts,false,true);
		opts.cssBefore.left = this.cycleW/2;
		opts.animIn.left = 0;
		opts.animIn.width = this.cycleW;
		opts.animOut.left = 0;
	});
	opts.cssBefore.top = 0;
	opts.cssBefore.width = 0;
};
<?php		
        break;
    case 'growY':
?>	
$.fn.cycle.transitions.growY = function($cont, $slides, opts) {
	$slides.css({"<?php echo $rtl_; ?>": "0px"});
	opts.before.push(function(curr, next, opts) {
		$.fn.cycle.commonReset(curr,next,opts,true,false);
		opts.cssBefore.top = this.cycleH/2;
		opts.animIn.top = 0;
		opts.animIn.height = this.cycleH;
		opts.animOut.top = 0;
	});
	opts.cssBefore.height = 0;
	opts.cssBefore.left = 0;
};
<?php		
        break;
    case 'scrollLeft':
?>	
$.fn.cycle.transitions.scrollLeft = function($cont, $slides, opts) {
    $cont.css({'z-index': '1'});
	$slides.css({"<?php echo $rtl_; ?>": "0px"});
	opts.before.push($.fn.cycle.commonReset);
	var w = $cont.width();
    //var n = $('.news-ticker-ntb span').width()<?php if (!$ntb_disable_title) { ?> +5 <?php } ?>; 
	<?php echo $ocf; ?> = 0;
	<?php echo $ocb; ?> = w;
	opts.cssBefore.top = 0;
	<?php echo $oai; ?> = 0;
	<?php echo $oao; ?> = 0-w;
};
<?php		
        break;
    case 'scrollRight':
?>	
$.fn.cycle.transitions.scrollRight = function($cont, $slides, opts) {
	$cont.css({'overflow': 'hidden'});
	//$('#ntbne_five li').css({"margin-right": "0px"});
	//$("#ntbne_five li").css({"<?php echo $rtl_; ?>": n1});
	//$(".news-ticker-ntb").css({"padding-<?php echo $rtl_; ?>": "50px"});
	//$cont.css('float','<?php echo $rtl_; ?>');
	$slides.css({"<?php echo $rtl_; ?>": "0px"});
	opts.before.push($.fn.cycle.commonReset);
	var w = $cont.width();
    //var n = $('.news-ticker-ntb span').width()<?php if (!$ntb_disable_title) { ?> +5 <?php } ?>; 
	//$("#ntbne_five li").css({"<?php echo $rtl_; ?>": n});
	<?php echo $ocf; ?> = 0;
	<?php echo $ocb; ?> = -w;
	opts.cssBefore.top = 0;
	<?php echo $oai; ?> = 0 ;
	<?php echo $oao; ?> = w;
};
<?php		
        break;
    case 'fadeUp':
?>	
$.fn.cycle.transitions.fadeUp = function($cont, $slides, opts) {
	$slides.css({"<?php echo $rtl_; ?>": "0px"});
	opts.before.push(function(curr, next, opts) {
		$.fn.cycle.commonReset(curr,next,opts,false,false);
		<?php echo $ocb; ?> = next.cycleW/2;
		opts.cssBefore.top = next.cycleH;
		$.extend(opts.animIn, { top: 0, <?php echo $rtl_; ?>: 0, width: next.cycleW, height: next.cycleH });
	});
	opts.cssBefore.width = 0;
	opts.cssBefore.height = 0;
	opts.animOut.opacity = 0;
};
<?php		
        break;
    case 'fadeLR':
?>	
$.fn.cycle.transitions.fadeLR = function($cont, $slides, opts) {
	$slides.css({"<?php echo $rtl_; ?>": "0px"});
	opts.before.push(function(curr, next, opts) {
		$.fn.cycle.commonReset(curr,next,opts,false,false);
		<?php echo $ocb; ?> = next.cycleW;
		opts.cssBefore.top = next.cycleH;
		$.extend(opts.animIn, { top: 0, <?php echo $rtl_; ?>: 0, width: next.cycleW, height: next.cycleH });
	});
	opts.cssBefore.width = 0;
	opts.cssBefore.height = 0;
	opts.animOut.opacity = 0;
};
<?php		
        break;
    case 'fadeZoom':
?>	
$.fn.cycle.transitions.fadeZoom = function($cont, $slides, opts) {
	$slides.css({"<?php echo $rtl_; ?>": "0px"});
	opts.before.push(function(curr, next, opts) {
		$.fn.cycle.commonReset(curr,next,opts,false,false);
		<?php echo $ocb; ?> = next.cycleW/2;
		opts.cssBefore.top = next.cycleH/2;
		$.extend(opts.animIn, { top: 0, <?php echo $rtl_; ?>: 0, width: next.cycleW, height: next.cycleH });
	});
	opts.cssBefore.width = 0;
	opts.cssBefore.height = 0;
	opts.animOut.opacity = 0;
};
<?php		
        break;
    case 'zoom':
?>	
$.fn.cycle.transitions.zoom = function($cont, $slides, opts) {
	$slides.css({"<?php echo $rtl_; ?>": "0px"});
	opts.before.push(function(curr, next, opts) {
		$.fn.cycle.commonReset(curr,next,opts,false,false,true);
		opts.cssBefore.top = next.cycleH/2;
		<?php echo $ocb; ?> = next.cycleW/2;
		$.extend(opts.animIn, { top: 0, <?php echo $rtl_; ?>: 0, width: next.cycleW, height: next.cycleH });
		$.extend(opts.animOut, { width: 0, height: 0, top: curr.cycleH/2, <?php echo $rtl_; ?>: curr.cycleW/2 });
	});
	opts.cssFirst.top = 0;
	<?php echo $ocf; ?> = 0;
	opts.cssBefore.width = 0;
	opts.cssBefore.height = 0;
};
<?php		
        break;
    case 'shuffle':
?>	
$.fn.cycle.transitions.shuffle = function($cont, $slides, opts) {
	$slides.css({"<?php echo $rtl_; ?>": "0px"});
	var i, w = $cont.css('overflow', 'visible').width();
	$slides.css({left: 0, top: 0});
	opts.before.push(function(curr,next,opts) {
		$.fn.cycle.commonReset(curr,next,opts,true,true,true);
	});
	// only adjust speed once!
	if (!opts.speedAdjusted) {
		opts.speed = opts.speed / 2; // shuffle has 2 transitions
		opts.speedAdjusted = true;
	}
	opts.random = 0;
	opts.shuffle = opts.shuffle || {left:0, top:15};
	opts.els = [];
	for (i=0; i < $slides.length; i++)
		opts.els.push($slides[i]);

	for (i=0; i < opts.currSlide; i++)
		opts.els.push(opts.els.shift());

	// custom transition fn (hat tip to Benjamin Sterling for this bit of sweetness!)
	opts.fxFn = function(curr, next, opts, cb, fwd) {
		if (opts.rev)
			fwd = !fwd;
		var $el = fwd ? $(curr) : $(next);
		$(next).css(opts.cssBefore);
		var count = opts.slideCount;
		$el.animate(opts.shuffle, opts.speedIn, opts.easeIn, function() {
			var hops = $.fn.cycle.hopsFromLast(opts, fwd);
			for (var k=0; k < hops; k++) {
				if (fwd)
					opts.els.push(opts.els.shift());
				else
					opts.els.unshift(opts.els.pop());
			}
			if (fwd) {
				for (var i=0, len=opts.els.length; i < len; i++)
					$(opts.els[i]).css('z-index', len-i+count);
			}
			else {
				var z = $(curr).css('z-index');
				$el.css('z-index', parseInt(z,10)+1+count);
			}
			$el.animate({left:0, top:0}, opts.speedOut, opts.easeOut, function() {
				$(fwd ? this : curr).hide();
				if (cb) cb();
			});
		});
	};
	$.extend(opts.cssBefore, { display: 'block', opacity: 1, top: 0, left: 0 });
};
<?php		
        break;
    case 'toss':
?>	
$.fn.cycle.transitions.toss = function($cont, $slides, opts) {
	$slides.css({"<?php echo $rtl_; ?>": "0px"});
	var w = $cont.css('overflow','visible').width();
	var h = $cont.height();
	opts.before.push(function(curr, next, opts) {
		$.fn.cycle.commonReset(curr,next,opts,true,true,true);
		// provide default toss settings if animOut not provided
		if (!opts.animOut.left && !opts.animOut.top)
			$.extend(opts.animOut, { left: 0, top: 0, opacity: 0 });
		else
			opts.animOut.opacity = 0;
	});
	opts.cssBefore.left = 0;
	opts.cssBefore.top = 0;
	opts.animIn.left = 0;
};
<?php		
        break;
    case 'blindZ':
?>	
$.fn.cycle.transitions.blindZ = function($cont, $slides, opts) {
	$slides.css({"<?php echo $rtl_; ?>": "0px"});
	var h = $cont.css('overflow','hidden').height();
	var w = $cont.width();
	opts.before.push(function(curr, next, opts) {
		$.fn.cycle.commonReset(curr,next,opts);
		opts.animIn.height = next.cycleH;
		opts.animOut.top   = curr.cycleH;
	});
	opts.cssBefore.top = h;
	<?php echo $ocb; ?> = w;
	opts.animIn.top = 0;
	<?php echo $oai; ?> = 0;
	opts.animOut.top = h;
	<?php echo $oao; ?> = w;
};
<?php		
        break;
    case 'uncover':
?>	
$.fn.cycle.transitions.uncover = function($cont, $slides, opts) {
	$slides.css({"<?php echo $rtl_; ?>": "0px"});
	var w = $cont.css('z-index','1').width();
	var h = $cont.height();
	opts.before.push(function(curr, next, opts) {
		$.fn.cycle.commonReset(curr,next,opts,true,true,true);
			<?php echo $oao; ?> = -w;
	});
	opts.animIn.top = 0;
	opts.cssBefore.top = 0;
	<?php echo $oai; ?> = 0;
	<?php echo $ocb; ?> = 0;
};
<?php		
        break;
    case 'simple':
?>	
$.fn.cycle.transitions.simple = function($cont, $slides, opts) {
	$slides.css({"<?php echo $rtl_; ?>": "0px"});
	opts.fxFn = function(curr,next,opts,after){
		$(next).show();
		$(curr).hide();
		after();
	};
};
<?php		
        break;

default:
?>	
$.fn.cycle.transitions.slideY = function($cont, $slides, opts) {
	$slides.css({"<?php echo $rtl_; ?>": "0px"});
	opts.before.push(function(curr, next, opts) {
		$(opts.elements).not(curr).hide();
		$.fn.cycle.commonReset(curr,next,opts,true,false);
		opts.animIn.height = next.cycleH;
	});
	opts.cssBefore.left = 0;
	opts.cssBefore.top = 0;
	opts.cssBefore.height = 0;
	opts.animIn.height = 'show';
	opts.animOut.height = 0;
};
<?php		
}
?>

})(jQuery);


(function($) {
	
	$('#ntbne_five').cycle({ 
	 speed: <?php echo $ntb_anim_speed_anms_two; ?>,
	 timeout: <?php echo $ntb_anim_timeout_anms_two; ?>,
	 height: '100%',		 
	 fx: '<?php echo $ntb_st; ?>',
	 pause: <?php $ntb_pause_anms_two ? print 1 : print 0 ; ?>,
	 containerResize: 1,
	 <?php if (is_rtl() && $dir != 'ltr') { ?> 
	 next: '#prev-button-ntb',
     prev: '#next-button-ntb',
	 <?php } else { ?> 
	 next: '#next-button-ntb',
     prev: '#prev-button-ntb',
	 <?php } ?>
     fit:              1,   
     <?php
     $anim_two__if = array('fade','fadeZoom','turnDown','turnUp','curtainX','curtainY','scrollLeft','scrollRight','blindZ');
     if ( !in_array($ntb_st, $anim_two__if) ) {
     ?>   
     sync:             0,       
     <?php } ?>  
     width:            '99%' 
  });

})(jQuery);
	
</script>

