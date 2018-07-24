<!-- Typing -->
<div class="fsub-ntb box">
<table class="form-table">
                <tr valign="top">
                    <th style="font-size: 13px;font-weight:normal;" scope="row"><?php _e('TimeOut', 'news-ticker-benaceur'); ?></th>
                    <td>
					<div class="sm_benaceurlist_caps_input-ntb"><input style="font-weight:bold;max-width:100px;text-align:center;" type="text" name="news_ticker_benaceur_timeout_no_scr_typ" value="<?php echo $ntb_timeout_no_scr_typ; ?>" /></div>
                   </td>
                </tr>
                <tr valign="top">
                    <th style="font-size: 13px;font-weight:normal;" scope="row"><?php _e('Speed', 'news-ticker-benaceur'); ?></th>
                    <td>
					<div class="sm_benaceurlist_caps_input-ntb"><input style="font-weight:bold;max-width:100px;text-align:center;" type="text" name="news_ticker_benaceur_speed_no_scr_typ" value="<?php echo $ntb_speed_no_scr_typ; ?>" /></div>
                   </td>
                </tr>
                <tr valign="top">
                    <th style="font-size: 13px;font-weight:normal;" scope="row"><?php _e('padding top', 'news-ticker-benaceur'); ?></th>
                    <td>
					<div class="sm_benaceurlist_caps_input-ntb"><input style="font-weight:bold;max-width:100px;text-align:center;" type="text" name="news_ticker_benaceur_margin_top_no_scr_typ" value="<?php echo $ntb_margin_top_no_scr_typ; ?>" /></div>
                   </td>
                </tr>
                <tr valign="top">
                    <th style="font-size: 13px;font-weight:normal;" scope="row"><?php _e('margin left (ltr)', 'news-ticker-benaceur'); ?></th>
                    <td>
					<div class="sm_benaceurlist_caps_input-ntb"><input style="font-weight:bold;max-width:100px;text-align:center;" type="text" name="news_ticker_benaceur_margin_left_ltr_no_scr_typ" value="<?php echo $ntb_margin_left_ltr_no_scr_typ; ?>" /></div>
                   </td>
                </tr>
                <tr valign="top">
                    <th style="font-size: 13px;font-weight:normal;" scope="row"><?php _e('margin right (rtl)', 'news-ticker-benaceur'); ?></th>
                    <td>
					<div class="sm_benaceurlist_caps_input-ntb"><input style="font-weight:bold;max-width:100px;text-align:center;" type="text" name="news_ticker_benaceur_margin_right_ltr_no_scr_typ" value="<?php echo $ntb_margin_right_ltr_no_scr_typ; ?>" /></div>
                   </td>
                </tr>
                <tr valign="top">
                    <th style="font-size: 13px;font-weight:normal;" scope="row"><?php _e('padding top (cursor below the title)', 'news-ticker-benaceur'); ?></th>
                    <td>
					<div class="sm_benaceurlist_caps_input-ntb"><input style="font-weight:bold;max-width:100px;text-align:center;" type="text" name="news_ticker_benaceur_cursor_no_scr_typ" value="<?php echo $ntb_cursor_no_scr_typ; ?>" /></div>
                   </td>
                </tr>
                <tr valign="top">
                    <th style="font-size: 13px;font-weight:normal;" scope="row"><?php _e('top (cursor)', 'news-ticker-benaceur'); ?></th>
                    <td>
					<div class="sm_benaceurlist_caps_input-ntb"><input style="font-weight:bold;max-width:100px;text-align:center;" type="text" name="news_ticker_benaceur_cursor_top_no_scr_typ_" value="<?php echo $ntb_cursor_top_no_scr_typ; ?>" /></div>
                   </td>
                </tr>
                <tr valign="top">
                    <th style="font-size: 13px;font-weight:normal;" scope="row"><?php _e('margin left/right (cursor)', 'news-ticker-benaceur'); ?></th>
                    <td>
					<div class="sm_benaceurlist_caps_input-ntb"><input style="font-weight:bold;max-width:100px;text-align:center;" type="text" name="news_ticker_benaceur_cursor_margin_left_right_no_scr_typ" value="<?php echo $ntb_cursor_margin_left_right_no_scr_typ; ?>" /></div>
                   </td>
                </tr>
                <tr>  
                    <th style="font-size: 13px;font-weight:normal;" scope="row"><div class="dd"><?php _e('Pause on hover', 'news-ticker-benaceur'); ?></div></th>
                    <td> 
					<label class="switch-nab">				
	                    <input type="checkbox" class="switch-input" name="news_ticker_benaceur_pause_typing" value="1" <?php if( !empty($ntb_pause_typing)) { echo 'checked="checked"'; } ?>/>
                        <span class="switch-label" data-on="On" data-off="Off"></span>
                        <span class="switch-handle"></span>
                   </label>
				   </td>
                </tr>
					<tr>
						<td>
                   <input type="radio" name="news_ticker_benaceur_ENABLE_curs_no_scr_typ" value="enable" <?php if( $ntb_ENABLE_curs_no_scr_typ == 'enable')echo 'checked';?> >
                    <td><?php _e("Enable cursor",'news-ticker-benaceur'); ?></td>
						</td>
					</tr>
					<tr> 
						<td>
                   <input type="radio" name="news_ticker_benaceur_ENABLE_curs_no_scr_typ" value="disable" <?php if( $ntb_ENABLE_curs_no_scr_typ == 'disable')echo 'checked';?> >
                   <td><?php _e("Disable cursor",'news-ticker-benaceur'); ?></td>
						</td>
					</tr>
					<tr>
						<td>
                   <input type="radio" name="news_ticker_benaceur_NP_img_no_scr_typ" value="enable" <?php if( $ntb_NP_img_no_scr_typ == 'enable')echo 'checked';?> >
                    <td><?php _e("Enable img next/prev",'news-ticker-benaceur'); ?></td>
						</td>
					</tr>
					<tr> 
						<td>
                   <input type="radio" name="news_ticker_benaceur_NP_img_no_scr_typ" value="disable" <?php if( $ntb_NP_img_no_scr_typ == 'disable')echo 'checked';?> >
                   <td><?php _e("Disable img next/prev",'news-ticker-benaceur'); ?></td>
						</td>
					</tr>
</table>
</br>
-------------</br>
<?php _e('if style mobile is enable:', 'news-ticker-benaceur'); ?>				
<table class="form-table">
                <tr valign="top">
                    <th style="font-size: 13px;font-weight:normal;" scope="row"><?php _e('TimeOut', 'news-ticker-benaceur'); ?></th>
                    <td>
					<div class="sm_benaceurlist_caps_input-ntb"><input style="font-weight:bold;max-width:100px;text-align:center;" type="text" name="news_ticker_benaceur_timeout_tickerntb" value="<?php echo $ntb_timeout_tickerntb; ?>" /></div>
                   </td>
                </tr>
</table>
</br>
</div>
<!-- Typing -->

<!-- Fade -->
<div class="fvsub-ntb box">
</br>
</div>
<!-- Fade -->

<!-- Slide -->
<div class="sxsub-ntb box">
</br>
</div>
<!-- Slide -->

<!-- Slide-Up-Down -->
<div class="tsub-ntb box">
<table class="form-table">
					<tr>
						<td>
                   <input type="radio" name="news_ticker_benaceur_disa_img_n_scrollup" value="enable_img_n_scrollup" <?php if( $ntb_disa_img_n_scrollup == 'enable_img_n_scrollup')echo 'checked';?> >
                    <td><?php _e("Enable img next/prev",'news-ticker-benaceur'); ?></td>
						</td>
					</tr>
					<tr> 
						<td>
                   <input type="radio" name="news_ticker_benaceur_disa_img_n_scrollup" value="disable_img_n_scrollup" <?php if( $ntb_disa_img_n_scrollup == 'disable_img_n_scrollup')echo 'checked';?> >
                   <td><?php _e("Disable img next/prev",'news-ticker-benaceur'); ?></td>
						</td>
					</tr>
<tr><td style="padding-top:0;padding-bottom:0;">------------</tr>
					<tr>
						<td>
                   <input type="radio" name="news_ticker_benaceur_updown_slide_up_down" value="up_slide_u_d" <?php if( $ntb_updown_slide_up_down == 'up_slide_u_d')echo 'checked';?> >
                    <td><?php _e("Up",'news-ticker-benaceur'); ?></td>
						</td>
					</tr>
					<tr> 
						<td>
                   <input type="radio" name="news_ticker_benaceur_updown_slide_up_down" value="down_slide_u_d" <?php if( $ntb_updown_slide_up_down == 'down_slide_u_d')echo 'checked';?> >
                   <td><?php _e("Down",'news-ticker-benaceur'); ?></td>
						</td>
					</tr>
<tr><td style="padding-top:0;padding-bottom:0;">------------</tr>
                <tr>  
                    <th style="font-size: 13px;font-weight:normal;" scope="row"><div class="dd"><?php _e('Pause on hover', 'news-ticker-benaceur'); ?></div></th>
                    <td> 
					<label class="switch-nab">				
	                    <input type="checkbox" class="switch-input" name="news_ticker_benaceur_pause_slide_up_down" value="1" <?php if( !empty($ntb_pause_slide_up_down)) { echo 'checked="checked"'; } ?>/>
                        <span class="switch-label" data-on="On" data-off="Off"></span>
                        <span class="switch-handle"></span>
                   </label>
				   </td>
                </tr>
                <tr>  
                    <th style="font-size: 13px;font-weight:normal;" scope="row"><div class="dd"><?php _e('Disable autostart', 'news-ticker-benaceur'); ?></div></th>
                    <td> 
					<label class="switch-nab">				
	                    <input type="checkbox" class="switch-input" name="news_ticker_benaceur_autostart_slide_up_down" value="1" <?php if( !empty($ntb_autostart_slide_up_down)) { echo 'checked="checked"'; } ?>/>
                        <span class="switch-label" data-on="On" data-off="Off"></span>
                        <span class="switch-handle"></span>
                   </label>
				   </td>
                </tr>
                <tr valign="top">
                    <th style="font-size: 13px;font-weight:normal;" scope="row"><?php _e('TimeOut', 'news-ticker-benaceur'); ?></th>
                    <td>
					<div class="sm_benaceurlist_caps_input-ntb"><input style="font-weight:bold;max-width:100px;text-align:center;" type="text" name="news_ticker_benaceur_timeout_slide_up_down" value="<?php echo $ntb_timeout_slide_up_down; ?>" /></div>
                   </td>
                </tr>
                <tr valign="top">
                    <th style="font-size: 13px;font-weight:normal;" scope="row"><?php _e('Speed', 'news-ticker-benaceur'); ?></th>
                    <td>
					<div class="sm_benaceurlist_caps_input-ntb"><input style="font-weight:bold;max-width:100px;text-align:center;" type="text" name="news_ticker_benaceur_speed_slide_up_down" value="<?php echo $ntb_speed_slide_up_down; ?>" /></div>
                   </td>
                </tr>
                <tr valign="top">
				<?php if (is_rtl() && $dir != 'ltr' || !is_rtl() && $dir == 'rtl') { ?>
                    <th style="font-size: 13px;font-weight:normal;" scope="row"><?php _e('Distance from the right', 'news-ticker-benaceur'); ?></th>
				<?php } else { ?>
                    <th style="font-size: 13px;font-weight:normal;" scope="row"><?php _e('Distance from the left', 'news-ticker-benaceur'); ?></th>
				<?php } ?>
					<td>
					<div class="sm_benaceurlist_caps_input-ntb"><input style="font-weight:bold;max-width:100px;text-align:center;" type="text" name="news_ticker_benaceur_dist_from_left_right_scrollup" value="<?php echo $ntb_dist_from_left_right_scrollup; ?>" /></div>
                   </td>
                </tr>
</table>
</br>
</div>
<!-- Slide-Up-Down -->

<!-- FadeIn -->
<div class="thsub-ntb box">
<table class="form-table">
					<tr>
						<td>
                   <input type="radio" name="news_ticker_benaceur_disa_img_n_fadein" value="enable_img_n_fadein" <?php if( $ntb_disa_img_n_fadein == 'enable_img_n_fadein')echo 'checked';?> >
                    <td><?php _e("Enable img next/prev",'news-ticker-benaceur'); ?></td>
						</td>
					</tr>
					<tr> 
						<td>
                   <input type="radio" name="news_ticker_benaceur_disa_img_n_fadein" value="disable_img_n_fadein" <?php if( $ntb_disa_img_n_fadein == 'disable_img_n_fadein')echo 'checked';?> >
						</td>
                   <td><?php _e("Disable img next/prev",'news-ticker-benaceur'); ?></td>
					</tr>
<tr><td style="padding-top:0;padding-bottom:0;">------------</tr>
                <tr valign="top">
                    <th style="font-size: 13px;font-weight:normal;" scope="row"><?php _e('TimeOut', 'news-ticker-benaceur'); ?></th>
                    <td>
					<div class="sm_benaceurlist_caps_input-ntb"><input style="font-weight:bold;max-width:100px;text-align:center;" type="text" name="news_ticker_benaceur_timeout_fadein" value="<?php echo $ntb_timeout_fadein; ?>" /></div>
                   </td>
                </tr>
                <tr valign="top">
				<?php if (is_rtl() && $dir != 'ltr' || !is_rtl() && $dir == 'rtl') { ?>
                    <th style="font-size: 13px;font-weight:normal;" scope="row"><?php _e('Distance from the right', 'news-ticker-benaceur'); ?></th>
				<?php } else { ?>
                    <th style="font-size: 13px;font-weight:normal;" scope="row"><?php _e('Distance from the left', 'news-ticker-benaceur'); ?></th>
				<?php } ?>
					<td>
					<div class="sm_benaceurlist_caps_input-ntb"><input style="font-weight:bold;max-width:100px;text-align:center;" type="text" name="news_ticker_benaceur_dist_from_left_right_fadein" value="<?php echo $ntb_dist_from_left_right_fadein; ?>" /></div>
                   </td>
                </tr>
                <tr>  
                    <th style="font-size: 13px;font-weight:normal;" scope="row"><div class="dd"><?php _e('Pause on hover', 'news-ticker-benaceur'); ?></div></th>
                    <td> 
					<label class="switch-nab">				
	                    <input type="checkbox" class="switch-input" name="news_ticker_benaceur_pause_fadein" value="1" <?php if( !empty($ntb_pause_fadein)) { echo 'checked="checked"'; } ?>/>
                        <span class="switch-label" data-on="On" data-off="Off"></span>
                        <span class="switch-handle"></span>
                   </label>
				   </td>
                </tr>
                <tr>  
                    <th style="font-size: 13px;font-weight:normal;" scope="row"><div class="dd"><?php _e('Disable autostart', 'news-ticker-benaceur'); ?></div></th>
                    <td> 
					<label class="switch-nab">				
	                    <input type="checkbox" class="switch-input" name="news_ticker_benaceur_autostart_fadein" value="1" <?php if( !empty($ntb_autostart_fadein)) { echo 'checked="checked"'; } ?>/>
                        <span class="switch-label" data-on="On" data-off="Off"></span>
                        <span class="switch-handle"></span>
                   </label>
				   </td>
                </tr>
</table>
</br>
</div>
<!-- FadeIn -->

<!-- Scroll-H -->
<div class="sevsub-ntb box">
<table class="form-table">
                <tr valign="top">
                    <th style="font-size: 13px;font-weight:normal;" scope="row"><?php _e('Speed', 'news-ticker-benaceur'); ?></th>
                    <td>
					<div class="sm_benaceurlist_caps_input-ntb"><input style="font-weight:bold;max-width:100px;text-align:center;" type="text" name="news_ticker_benaceur_speed_scrollntb_" value="<?php echo $ntb_speed_scrollntb; ?>" /></div>
                   </td>
                </tr>
                <tr class="fsub_lat-com-ntb box_lat-com" valign="top">
                    <th style="font-size: 13px;font-weight:normal;" scope="row"><?php _e('Number of title characters', 'news-ticker-benaceur'); ?></th>
                    <td>
					<div class="sm_benaceurlist_caps_input-ntb"><input style="font-weight:bold;max-width:100px;text-align:center;" type="text" name="news_ticker_benaceur_expt_title_scrollntb" value="<?php echo $ntb_expt_title_scrollntb; ?>" /></div>
                   </td>
                </tr>
                <tr valign="top">
				<?php if (is_rtl() && $dir != 'ltr' || !is_rtl() && $dir == 'rtl') { ?>
                    <th style="font-size: 13px;font-weight:normal;" scope="row"><?php _e('Distance from the right', 'news-ticker-benaceur'); ?></th>
				<?php } else { ?>
                    <th style="font-size: 13px;font-weight:normal;" scope="row"><?php _e('Distance from the left', 'news-ticker-benaceur'); ?></th>
				<?php } ?>
					<td>
					<div class="sm_benaceurlist_caps_input-ntb"><input style="font-weight:bold;max-width:100px;text-align:center;" type="text" name="news_ticker_benaceur_dist_from_left_right_scrollntb" value="<?php echo $ntb_dist_from_left_right_scrollntb; ?>" /></div>
                   </td>
                </tr>
                <tr valign="top">
                    <th style="font-size: 13px;font-weight:normal;" scope="row"><?php _e('The distance between elements', 'news-ticker-benaceur'); ?></th>
					<td>
					<div class="sm_benaceurlist_caps_input-ntb"><input style="font-weight:bold;max-width:100px;text-align:center;" type="text" name="news_ticker_benaceur_dist_between_scrollntb" value="<?php echo $ntb_dist_between_scrollntb; ?>" /></div>
                   </td>
                </tr>
                <tr valign="top">
                    <th style="font-size: 13px;font-weight:normal;" scope="row"><?php _e('Image dimensions', 'news-ticker-benaceur'); ?></th>
					<td>
					<div class="sm_benaceurlist_caps_input-ntb">
					<input style="font-weight:bold;max-width:70px;text-align:center;" type="text" name="news_ticker_benaceur_w_img_scrollntb" value="<?php echo $ntb_w_img_scrollntb; ?>" /> x
					<input style="font-weight:bold;max-width:70px;text-align:center;" type="text" name="news_ticker_benaceur_h_img_scrollntb" value="<?php echo $ntb_h_img_scrollntb; ?>" />
					</div>
                   </td>
                </tr>
                <tr valign="top">
                    <th style="font-size: 13px;font-weight:normal;" scope="row"><?php _e('Distance from the right/left of the image', 'news-ticker-benaceur'); ?></th>
					<td>
					<div class="sm_benaceurlist_caps_input-ntb">
					<input style="font-weight:bold;max-width:70px;text-align:center;" type="text" name="news_ticker_benaceur_ri_le_img_scrollntb" value="<?php echo $ntb_ri_le_img_scrollntb; ?>" /> /
					<input style="font-weight:bold;max-width:70px;text-align:center;" type="text" name="news_ticker_benaceur_le_ri_img_scrollntb" value="<?php echo $ntb_le_ri_img_scrollntb; ?>" />
					</div>
                   </td>
                </tr>
                <tr>  
                    <th style="font-size: 13px;font-weight:normal;" scope="row"><div class="dd"><?php _e('Pause on hover', 'news-ticker-benaceur'); ?></div></th>
                    <td> 
					<label class="switch-nab">				
	                    <input type="checkbox" class="switch-input" name="news_ticker_benaceur_pause_scrollntb" value="1" <?php if( !empty($ntb_pause_scrollntb)) { echo 'checked="checked"'; } ?>/>
                        <span class="switch-label" data-on="On" data-off="Off"></span>
                        <span class="switch-handle"></span>
                   </label>
				   </td>
                </tr>
                <tr class="fsub_lat-com-ntb box_lat-com">  
                    <th style="font-size: 13px;font-weight:normal;" scope="row"><div class="dd"><?php _e('+ date and title', 'news-ticker-benaceur'); ?></div></th>
                    <td> 
					<label class="switch-nab">				
	                    <input type="checkbox" class="switch-input" name="news_ticker_benaceur_all_scrollntb" value="1" <?php if( !empty($ntb_all_scrollntb)) { echo 'checked="checked"'; } ?>/>
                        <span class="switch-label" data-on="On" data-off="Off"></span>
                        <span class="switch-handle"></span>
                   </label>
				   </td>
                </tr>
</table>
</br>
</div>
<!-- Scroll-H -->

<!-- Two Typing 2 -->
<div class="anim-twoTy2-sub-ntb box">
<table class="form-table">
                <tr valign="top">
                    <th style="font-size: 13px;font-weight:normal;" scope="row"><?php _e('Speed', 'news-ticker-benaceur'); ?></th>
                    <td>
					<div class="sm_benaceurlist_caps_input-ntb"><input style="font-weight:bold;max-width:100px;text-align:center;" type="text" name="news_ticker_benaceur_speedIn_typing_2" value="<?php echo $ntb_speedIn_typing_2; ?>" /></div>
                   </td>
                </tr>
                <tr valign="top">
                    <th style="font-size: 13px;font-weight:normal;" scope="row"><?php _e('TimeOut', 'news-ticker-benaceur'); ?></th>
                    <td>
					<div class="sm_benaceurlist_caps_input-ntb"><input style="font-weight:bold;max-width:100px;text-align:center;" type="text" name="news_ticker_benaceur_anim_timeout_typing_2" value="<?php echo $ntb_anim_timeout_typing_2; ?>" /></div>
                   </td>
                </tr>
                <tr valign="top">
				<?php if (is_rtl() && $dir != 'ltr' || !is_rtl() && $dir == 'rtl') { ?>
                    <th style="font-size: 13px;font-weight:normal;" scope="row"><?php _e('Distance from the right', 'news-ticker-benaceur'); ?></th>
				<?php } else { ?>
                    <th style="font-size: 13px;font-weight:normal;" scope="row"><?php _e('Distance from the left', 'news-ticker-benaceur'); ?></th>
				<?php } ?>
					<td>
					<div class="sm_benaceurlist_caps_input-ntb"><input style="font-weight:bold;max-width:100px;text-align:center;" type="text" name="news_ticker_benaceur_width_typing__2" value="<?php echo $ntb_width_typing__2; ?>" /></div>
                   </td>
                </tr>
					<tr>
						<td>
                   <input type="radio" name="news_ticker_benaceur_NP_img_typing_2" value="enable" <?php if( $ntb_NP_img_typing_2 == 'enable')echo 'checked';?> >
                    <td><?php _e("Enable img next/prev",'news-ticker-benaceur'); ?></td>
						</td>
					</tr>
					<tr> 
						<td>
                   <input type="radio" name="news_ticker_benaceur_NP_img_typing_2" value="disable" <?php if( $ntb_NP_img_typing_2 == 'disable')echo 'checked';?> >
                   <td><?php _e("Disable img next/prev",'news-ticker-benaceur'); ?></td>
						</td>
					</tr>
                <tr>  
                    <th style="font-size: 13px;font-weight:normal;" scope="row"><div class="dd"><?php _e('Pause on hover', 'news-ticker-benaceur'); ?></div></th>
                    <td> 
					<label class="switch-nab">				
	                    <input type="checkbox" class="switch-input" name="news_ticker_benaceur_pause_typing_2" value="1" <?php if( !empty($ntb_pause_typing_2)) { echo 'checked="checked"'; } ?>/>
                        <span class="switch-label" data-on="On" data-off="Off"></span>
                        <span class="switch-handle"></span>
                   </label>
				   </td>
                </tr>
</table>
</div>
<!-- Two Typing 2 -->

<!-- Two -->
<div class="anim-two-sub-ntb box">
<table class="form-table">
                <tr valign="top">
                    <th style="font-size: 13px;font-weight:normal;" scope="row"><?php _e('Speed', 'news-ticker-benaceur'); ?></th>
                    <td>
					<div class="sm_benaceurlist_caps_input-ntb"><input style="font-weight:bold;max-width:100px;text-align:center;" type="text" name="news_ticker_benaceur_anim_speed_anms_two" value="<?php echo $ntb_anim_speed_anms_two; ?>" /></div>
                   </td>
                </tr>
                <tr valign="top">
                    <th style="font-size: 13px;font-weight:normal;" scope="row"><?php _e('TimeOut', 'news-ticker-benaceur'); ?></th>
                    <td>
					<div class="sm_benaceurlist_caps_input-ntb"><input style="font-weight:bold;max-width:100px;text-align:center;" type="text" name="news_ticker_benaceur_anim_timeout_anms_two" value="<?php echo $ntb_anim_timeout_anms_two; ?>" /></div>
                   </td>
                </tr>
                <tr valign="top">
				<?php if (is_rtl() && $dir != 'ltr' || !is_rtl() && $dir == 'rtl') { ?>
                    <th style="font-size: 13px;font-weight:normal;" scope="row"><?php _e('Distance from the right', 'news-ticker-benaceur'); ?></th>
				<?php } else { ?>
                    <th style="font-size: 13px;font-weight:normal;" scope="row"><?php _e('Distance from the left', 'news-ticker-benaceur'); ?></th>
				<?php } ?>
					<td>
					<div class="sm_benaceurlist_caps_input-ntb"><input style="font-weight:bold;max-width:100px;text-align:center;" type="text" name="news_ticker_benaceur_width_anms__two" value="<?php echo $ntb_width_anms__two; ?>" /></div>
                   </td>
                </tr>
                <tr valign="top">
				<?php if (is_rtl() && $dir != 'ltr' || !is_rtl() && $dir == 'rtl') { ?>
                    <th style="font-size: 13px;font-weight:normal;" scope="row"><?php _e('padding left (img next/prev enabled)', 'news-ticker-benaceur'); ?></th>
				<?php } else { ?>
                    <th style="font-size: 13px;font-weight:normal;" scope="row"><?php _e('padding right (img next/prev enabled)', 'news-ticker-benaceur'); ?></th>
				<?php } ?>
					<td>
					<div class="sm_benaceurlist_caps_input-ntb"><input style="font-weight:bold;max-width:100px;text-align:center;" type="text" name="news_ticker_benaceur_dis_fin_img_scrollntb" value="<?php echo $ntb_dis_fin_img_scrollntb; ?>" /></div>
                   </td>
                </tr>
                <tr valign="top">
				<?php if (is_rtl() && $dir != 'ltr' || !is_rtl() && $dir == 'rtl') { ?>
                    <th style="font-size: 13px;font-weight:normal;" scope="row"><?php _e('padding left (img next/prev disabled)', 'news-ticker-benaceur'); ?></th>
				<?php } else { ?>
                    <th style="font-size: 13px;font-weight:normal;" scope="row"><?php _e('padding right (img next/prev disabled)', 'news-ticker-benaceur'); ?></th>
				<?php } ?>
					<td>
					<div class="sm_benaceurlist_caps_input-ntb"><input style="font-weight:bold;max-width:100px;text-align:center;" type="text" name="news_ticker_benaceur_dis_fin_no_img_scrollntb" value="<?php echo $ntb_dis_fin_no_img_scrollntb; ?>" /></div>
                   </td>
                </tr>
					<tr>
						<td>
                   <input type="radio" name="news_ticker_benaceur_NP_img_anms_two" value="enable" <?php if( $ntb_NP_img_anms_two == 'enable')echo 'checked';?> >
                    <td><?php _e("Enable img next/prev",'news-ticker-benaceur'); ?></td>
						</td>
					</tr>
					<tr> 
						<td>
                   <input type="radio" name="news_ticker_benaceur_NP_img_anms_two" value="disable" <?php if( $ntb_NP_img_anms_two == 'disable')echo 'checked';?> >
                   <td><?php _e("Disable img next/prev",'news-ticker-benaceur'); ?></td>
						</td>
					</tr>
                <tr>  
                    <th style="font-size: 13px;font-weight:normal;" scope="row"><div class="dd"><?php _e('Pause on hover', 'news-ticker-benaceur'); ?></div></th>
                    <td> 
					<label class="switch-nab">				
	                    <input type="checkbox" class="switch-input" name="news_ticker_benaceur_pause_anms_two" value="1" <?php if( !empty($ntb_pause_anms_two)) { echo 'checked="checked"'; } ?>/>
                        <span class="switch-label" data-on="On" data-off="Off"></span>
                        <span class="switch-handle"></span>
                   </label>
				   </td>
                </tr>
                <tr>  
                    <th style="font-size: 13px;font-weight:normal;" scope="row"><div class="dd"><?php _e('Use java in js file (outside php file)', 'news-ticker-benaceur'); ?></div></th>
                    <td> 
					<label class="switch-nab">				
	                    <input type="checkbox" class="switch-input" name="news_ticker_benaceur_ena_js_scrollntb" value="1" <?php if( !empty($ntb_ena_js_scrollntb)) { echo 'checked="checked"'; } ?>/>
                        <span class="switch-label" data-on="On" data-off="Off"></span>
                        <span class="switch-handle"></span>
                   </label>
				   </td>
                </tr>
</table>
</br>
</div>
<!-- Two -->
