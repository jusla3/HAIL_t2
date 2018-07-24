<?php if (get_option('news_ticker_benaceur_styles_options_p') == 'theme_custom'  ) { ?>
					<tr>
						<td>
							<div class="colwrap-display"><div class="news-ticker-benaceur-colwrap">
								<input type="text" id="news-ticker-benaceur-cust-color-back_a" class="news-ticker-benaceur-color-inp" value="<?php echo $ntb_cust_color_back; ?>" name="news_ticker_benaceur_cust_color_back" />
								<div class="news-ticker-benaceur-colsel news-ticker-benaceur-cust-color-back_a"></div>
							</div></div>
						</td>
						<div class="colwrap-display"><td><?php _e("Background color",'news-ticker-benaceur'); ?> </td></div></br>
					</tr>
					<tr>
						<td>
							<div class="colwrap-display"><div class="news-ticker-benaceur-colwrap">
								<input type="text" id="news-ticker-benaceur-cust-color-font_a" class="news-ticker-benaceur-color-inp" value="<?php echo $ntb_cust_color_font; ?>" name="news_ticker_benaceur_cust_color_font" />
								<div class="news-ticker-benaceur-colsel news-ticker-benaceur-cust-color-font_a"></div>
							</div></div>
						</td>
						<div class="colwrap-display"><td><?php _e("Text color",'news-ticker-benaceur'); ?> </td></div></br>
					</tr>
					<tr>
						<td>
							<div class="colwrap-display"><div class="news-ticker-benaceur-colwrap">
								<input type="text" id="news-ticker-benaceur-color-back-input_a" class="news-ticker-benaceur-color-inp" value="<?php echo $ntb_cust_color_back_input; ?>" name="news_ticker_benaceur_cust_color_back_input" />
								<div class="news-ticker-benaceur-colsel news-ticker-benaceur-color-back-input_a"></div>
							</div></div>
						</td>
						<div class="colwrap-display"><td><?php _e("Background color of the input boxes",'news-ticker-benaceur'); ?> </td></div></br>
					</tr>
					<tr>
						<td>
							<div class="colwrap-display"><div class="news-ticker-benaceur-colwrap">
								<input type="text" id="news-ticker-benaceur-cust-color-back-msg_a" class="news-ticker-benaceur-color-inp" value="<?php echo $ntb_cust_color_back_msg; ?>" name="news_ticker_benaceur_cust_color_back_msg" />
								<div class="news-ticker-benaceur-colsel news-ticker-benaceur-cust-color-back-msg_a"></div>
							</div></div>
						</td>
						<div class="colwrap-display"><td><?php _e("Background color settings saved message",'news-ticker-benaceur'); ?> </td></div></br>
					</tr>
					<tr>
						<td>
							<div class="colwrap-display"><div class="news-ticker-benaceur-colwrap">
								<input type="text" id="news-ticker-benaceur-cust-color-switch-input_a" class="news-ticker-benaceur-color-inp" value="<?php echo $ntb_cust_color_switch_input; ?>" name="news_ticker_benaceur_cust_color_switch_input" />
								<div class="news-ticker-benaceur-colsel news-ticker-benaceur-cust-color-switch-input_a"></div>
							</div></div>
						</td>
						<div class="colwrap-display"><td><?php _e("Background on/off color",'news-ticker-benaceur'); ?> </td></div></br>
					</tr>
<?php } else { ?>
<div id="NTBshowdiv">
					<tr>
						<td>
							<div class="colwrap-display"><div class="news-ticker-benaceur-colwrap">
								<input type="text" id="news-ticker-benaceur-cust-color-back_a" class="news-ticker-benaceur-color-inp" value="<?php echo $ntb_cust_color_back; ?>" name="news_ticker_benaceur_cust_color_back" />
								<div class="news-ticker-benaceur-colsel news-ticker-benaceur-cust-color-back_a"></div>
							</div></div>
						</td>
						<div class="colwrap-display"><td><?php _e("Background color",'news-ticker-benaceur'); ?> </td></div></br>
					</tr>
					<tr>
						<td>
							<div class="colwrap-display"><div class="news-ticker-benaceur-colwrap">
								<input type="text" id="news-ticker-benaceur-cust-color-font_a" class="news-ticker-benaceur-color-inp" value="<?php echo $ntb_cust_color_font; ?>" name="news_ticker_benaceur_cust_color_font" />
								<div class="news-ticker-benaceur-colsel news-ticker-benaceur-cust-color-font_a"></div>
							</div></div>
						</td>
						<div class="colwrap-display"><td><?php _e("Text color",'news-ticker-benaceur'); ?> </td></div></br>
					</tr>
					<tr>
						<td>
							<div class="colwrap-display"><div class="news-ticker-benaceur-colwrap">
								<input type="text" id="news-ticker-benaceur-color-back-input_a" class="news-ticker-benaceur-color-inp" value="<?php echo $ntb_cust_color_back_input; ?>" name="news_ticker_benaceur_cust_color_back_input" />
								<div class="news-ticker-benaceur-colsel news-ticker-benaceur-color-back-input_a"></div>
							</div></div>
						</td>
						<div class="colwrap-display"><td><?php _e("Background color of the input boxes",'news-ticker-benaceur'); ?> </td></div></br>
					</tr>
					<tr>
						<td>
							<div class="colwrap-display"><div class="news-ticker-benaceur-colwrap">
								<input type="text" id="news-ticker-benaceur-cust-color-back-msg_a" class="news-ticker-benaceur-color-inp" value="<?php echo $ntb_cust_color_back_msg; ?>" name="news_ticker_benaceur_cust_color_back_msg" />
								<div class="news-ticker-benaceur-colsel news-ticker-benaceur-cust-color-back-msg_a"></div>
							</div></div>
						</td>
						<div class="colwrap-display"><td><?php _e("Background color settings saved message",'news-ticker-benaceur'); ?> </td></div></br>
					</tr>
					<tr>
						<td>
							<div class="colwrap-display"><div class="news-ticker-benaceur-colwrap">
								<input type="text" id="news-ticker-benaceur-cust-color-switch-input_a" class="news-ticker-benaceur-color-inp" value="<?php echo $ntb_cust_color_switch_input; ?>" name="news_ticker_benaceur_cust_color_switch_input" />
								<div class="news-ticker-benaceur-colsel news-ticker-benaceur-cust-color-switch-input_a"></div>
							</div></div>
						</td>
						<div class="colwrap-display"><td><?php _e("Background on/off color",'news-ticker-benaceur'); ?> </td></div></br>
					</tr>
</div>
<?php } ?>