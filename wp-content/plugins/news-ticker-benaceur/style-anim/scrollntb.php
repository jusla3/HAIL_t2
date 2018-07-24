<?php if ($dir == 'auto' && !is_rtl() || $dir == 'ltr') { $ori = "left"; } else { $ori = "right"; } ?>	  

				  <div class="n_t_ntb_b"><div class="n_t_ntb_b2">
	   <?php if (!$ntb_disable_title) { ?>			  
       <span class="n_t_ntb_b-name"><?php if (!empty($ntb_title_ltr) && !is_rtl()) { echo $ntb_title_ltr; } elseif (!empty($ntb_title_rtl) && is_rtl()) { echo $ntb_title_rtl; } else { if (!is_rtl()) { echo 'Latest news'; } else { echo 'آخر الأخبار'; } } ?></span>
	   <?php } ?>
        <div style="position:relative; overflow:hidden;" id="scroll-ntb">
		<div style="position:absolute; white-space:nowrap;" id="scroll-ntb-elem">
			      	<?php
			$getID_attachment = get_option( 'ntb_media_selector_attachment_id' );
			$img_attachment = $getID_attachment ? wp_get_attachment_url( $getID_attachment ) : plugins_url('img/ntb-topics.jpeg',dirname(__FILE__)) ;
			if($ntb_latest_p_c == 'latest_posts'){
			$recent_posts_ntb = wp_get_recent_posts( $lp );	
			foreach( $recent_posts_ntb as $recent_ntb ) : // foreach
				    ?>
			<span class="ntb_img_post_t_scrollntb">		
			<div><a href="<?php echo get_permalink($recent_ntb["ID"]); ?>" title="<?php echo $recent_ntb["post_title"]; ?>">
			<?php
				$user = get_user_by( 'id', $recent_ntb["post_author"] );
				$args = array($recent_ntb["post_date"], $user->display_name, $recent_ntb["post_modified"], $recent_ntb["comment_count"]);
                $filter_title_ntb = apply_filters( 'ntb_title_filter_ben', $recent_ntb["post_title"], $args );				
				echo $filter_title_ntb;
			?>
			</a></div>
		    </span>
		 <?php endforeach; // end foreach 
			} elseif ($ntb_latest_p_c == 'latest_comments') {
if ( count( $comments_list ) > 0 ) {
$date_format = 'j F Y';
 foreach ( $comments_list as $comment ) {

$ti = 1379; // minutes
$tim    = $ti * 60; // result time
$date_diff = time() - mysql2date('U',$comment->comment_date_gmt);
$ymd = $date_diff <= $tim ? "H-i" : "Y/m/d" ;
	 
$comment_content = filter_var($comment->comment_content, FILTER_SANITIZE_STRING); 
$ntb_nm_expt = !empty($ntb_expt_txt_comm) ? $ntb_expt_txt_comm : 62 ;
$ntb_nm_expt_title = !empty($ntb_expt_title_scrollntb) ? $ntb_expt_title_scrollntb : 28 ;

if ($ntb_all_scrollntb) {	 
 echo '<span class="ntb_img_post_t_scrollntb"><div>'.$comment->comment_author.' :</div><div><a href="'.esc_url(get_permalink($comment->comment_post_ID)).'#comment-'.$comment->comment_ID.'">'.expt_title_text_NTB( $comment_content, $ntb_nm_expt ).'</a></div>/&nbsp;&nbsp;<div><i>'.date( $ymd, strtotime( $comment->comment_date ) ).'</i></div>/&nbsp;&nbsp;<div><i><a href="'.esc_url(get_permalink( $comment->comment_post_ID )).'" title="'.get_the_title( $comment->comment_post_ID ).'"> '.expt_title_text_NTB(get_the_title( $comment->comment_post_ID ), $ntb_nm_expt_title ).'</a></i></div></span>';
} else {
 echo '<span class="ntb_img_post_t_scrollntb"><div>'.$comment->comment_author.' :</div><div><a href="'.esc_url(get_permalink($comment->comment_post_ID)).'#comment-'.$comment->comment_ID.'">'.expt_title_text_NTB( $comment_content, $ntb_nm_expt ).'</a></div>&nbsp;&nbsp;</span>';
}	
 }
} else {
	echo '<p>';
   _e("No comments",'news-ticker-benaceur');
	echo '</p>';
}
			}	
		 ?>
         </div>
        </div>
      </div></div>

	
<style type="text/css">
span.ntb_img_post_t_scrollntb {
margin:0 <?php echo $ntb_dist_between_scrollntb; ?>px;
}
.ntb_img_post_t_scrollntb {
background:url(<?php echo $img_attachment; ?>) no-repeat <?php echo $ori; ?>;
<?php if ($dir == 'auto' && !is_rtl() || $dir == 'ltr') { $ori_padd1 = $ntb_ri_le_img_scrollntb; $ori_padd2 = $ntb_le_ri_img_scrollntb; } else { $ori_padd1 = $ntb_le_ri_img_scrollntb; $ori_padd2 = $ntb_ri_le_img_scrollntb; } ?>
padding:0px <?php echo $ori_padd1; ?>px 0px <?php echo $ori_padd2; ?>px;
background-size: <?php echo $ntb_w_img_scrollntb; ?>px <?php echo $ntb_h_img_scrollntb; ?>px;
margin:auto;
}
.ntb_img_post_t_scrollntb div {
display:inline-block;	
}

<?php if ($ntb_disable_in_screen_max_width) { ?>
@media only screen and (max-width: <?php echo $ntb_v_screen_max_width; ?>px) {
	.n_t_ntb_b {
		display:none;
	}
}
<?php } ?>
	.n_t_ntb_b {
		font-family:<?php echo $ntb_font_family; ?>, Tahoma;
		font-size:<?php echo $ntb_font_size; ?>px;
		font-weight:<?php echo $ntb_font_weight ;?>;
		background:<?php echo $ntb_color_back; ?>;
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
    	text-shadow:<?php echo $ntb_text_shadow; ?> <?php echo $ntb_text_shadow_color; ?>;
		width:<?php echo $ntb_width; ?>;
		height:<?php echo $ntb_height; ?>px;
    	margin-top:<?php echo $ntb_margin_top; ?>px;
    	margin-bottom:<?php echo $ntb_margin_bottom; ?>px;
    	opacity:<?php echo $ntb_opacity; ?>;
		overflow:hidden;
		position:relative;	
        line-height:<?php echo $ntb_height; ?>px;
	}
	#scroll-ntb {
        <?php if (!is_rtl() && $dir == 'rtl') { ?>
		direction:rtl;
        <?php } elseif (is_rtl() && $dir == 'ltr') { ?>
		direction:ltr;
        <?php } ?>
		color:<?php echo $f_ntb_color_text_back; ?>!important;
		height:<?php echo $ntb_height; ?>px;
	}
	#scroll-ntb a {
		color:<?php echo $f_ntb_color_text_back; ?>!important;
		text-decoration: none!important;
	   -webkit-transition: all 0.5s ease-out;
	   -moz-transition: all 0.5s ease-out;
	   -o-transition: all 0.5s ease-out;
	    transition: all 0.5s ease-out;
	}
	#scroll-ntb a:hover {
		color:<?php echo $ntb_a_hover; ?>!important;
		text-decoration: none!important;
	   -webkit-transition: all 0.5s ease-out;
	   -moz-transition: all 0.5s ease-out;
	   -o-transition: all 0.5s ease-out;
	    transition: all 0.5s ease-out;
		}
	.n_t_ntb_b .n_t_ntb_b-name {
		font-family:<?php echo $ntb_title_font_family; ?>, Tahoma;
		color:<?php echo $f_ntb_color_text_title; ?>;
		background-color:<?php echo $f_ntb_color_back_title; ?>;
    	font-size:<?php echo $ntb_font_size_title; ?>px;
		<?php if ($dir == 'auto') { ?>
		<?php if (is_rtl()) { ?>
		float:right;
		margin-left: <?php echo $ntb_dist_from_left_right_scrollntb; ?>px;
		<?php } else { ?>
		float:left;
		margin-right: <?php echo $ntb_dist_from_left_right_scrollntb; ?>px;
		<?php } ?>
	    <?php } elseif ($dir == 'ltr') { ?>
		float:left;
		margin-right: <?php echo $ntb_dist_from_left_right_scrollntb; ?>px;
		<?php } elseif ($dir == 'rtl') { ?>
		float:right;
		margin-left: <?php echo $ntb_dist_from_left_right_scrollntb; ?>px;
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

	#scroll-ntb div {
		margin-top:<?php echo $ntb_padding_top; ?>px;
        margin-bottom:<?php echo $ntb_padding_bottom; ?>;
		<?php if ($dir == 'auto') { ?>
		<?php if (is_rtl()) { ?>
		margin-left: 10px;
		<?php } else { ?>
		margin-right: 10px;
		<?php } ?>
	    <?php } elseif ($dir == 'ltr') { ?>
		margin-right: 10px;
		<?php } elseif ($dir == 'rtl') { ?>
		margin-left: 10px;
		<?php } ?>
	}
	
		<?php if ($dir == 'auto') { ?>
		<?php if (is_rtl()) { ?>
	.n_t_ntb_b2 { padding-left:10px;
	 <?php if ($ntb_disable_title) {echo "padding-right: 10px;";} ?>
	}
		<?php } else { ?>
	.n_t_ntb_b2 { padding-right:10px;
	 <?php if ($ntb_disable_title) {echo "padding-left: 10px;";} ?>
	}
		<?php } ?>
    <?php } elseif ($dir == 'ltr') { ?>					
	.n_t_ntb_b2 { padding-right:10px;
	 <?php if ($ntb_disable_title) {echo "padding-left: 10px;";} ?>
	}
    <?php } elseif ($dir == 'rtl') { ?>
	.n_t_ntb_b2 { padding-left:10px;
	 <?php if ($ntb_disable_title) {echo "padding-right: 10px;";} ?>
	}
<?php } ?>
</style>

<script type="text/javascript">
!function(a){function b(b,c,d){b.bind("marquee",function(b,e){var f=a(this),g=parseInt(f.parent().width()),h=parseInt(f.width()),i=parseInt(f.position().left),j=c;switch(d){case"right":"undefined"==typeof e?(f.css({left:g}),g=-h):g=i-(h+g);break;default:"undefined"==typeof e?f.css({left:-h}):g+=i+h}f.animate({left:g},{duration:j,easing:"linear",complete:function(){f.trigger("marquee")},step:function(){"right"==d?parseInt(f.position().left)<-parseInt(f.width())&&(f.stop(),f.trigger("marquee")):parseInt(f.position().left)>parseInt(f.parent().width())&&(f.stop(),f.trigger("marquee"))}})}).trigger("marquee");var e=ntb_scr_js.mouse;1==e&&(b.mouseover(function(){a(this).stop()}),b.mouseout(function(){a(this).trigger("marquee",["resume"])}))}var c=a("#scroll-ntb-elem"),d=4e3*ntb_scr_js.speed_scr,e=ntb_scr_js.ori_scr;b(c,d,e)}(jQuery);
</script>
