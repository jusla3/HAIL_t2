<!-- Simple Tile Style -->
<div class="DivChecksimpleTileSt boxTS"></div>
<!-- Simple Tile Style -->

<!-- Radius Tile Style -->
<div class="DivCheckradiusTileSt boxTS">
<table class="form-table">
				<?php if (!is_rtl() && $dir != 'rtl' || is_rtl() && $dir == 'ltr') { ?>
                <tr valign="top">
                    <th style="font-size: 13px;font-weight:normal;" scope="row"><?php _e('Top left', 'news-ticker-benaceur'); ?></th>
                    <td>
					<div class="sm_benaceurlist_caps_input-ntb"><input style="font-weight:bold;max-width:100px;text-align:center;" type="text" name="news_ticker_benaceur_title_styles_topleft_le" value="<?php echo $ntb_title_styles_topleft_le; ?>" /></div>
                   </td>
                </tr>
                <tr valign="top">
                    <th style="font-size: 13px;font-weight:normal;" scope="row"><?php _e('Top right', 'news-ticker-benaceur'); ?></th>
                    <td>
					<div class="sm_benaceurlist_caps_input-ntb"><input style="font-weight:bold;max-width:100px;text-align:center;" type="text" name="news_ticker_benaceur_title_styles_topright_le" value="<?php echo $ntb_title_styles_topright_le; ?>" /></div>
                   </td>
                </tr>
				<?php } else { ?>
                <tr valign="top">
                    <th style="font-size: 13px;font-weight:normal;" scope="row"><?php _e('Top left', 'news-ticker-benaceur'); ?></th>
                    <td>
					<div class="sm_benaceurlist_caps_input-ntb"><input style="font-weight:bold;max-width:100px;text-align:center;" type="text" name="news_ticker_benaceur_title_styles_topleft_ri" value="<?php echo $ntb_title_styles_topleft_ri; ?>" /></div>
                   </td>
                </tr>
                <tr valign="top">
                    <th style="font-size: 13px;font-weight:normal;" scope="row"><?php _e('Top right', 'news-ticker-benaceur'); ?></th>
                    <td>
					<div class="sm_benaceurlist_caps_input-ntb"><input style="font-weight:bold;max-width:100px;text-align:center;" type="text" name="news_ticker_benaceur_title_styles_topright_ri" value="<?php echo $ntb_title_styles_topright_ri; ?>" /></div>
                   </td>
                </tr>
				<?php } ?>
                <tr valign="top">
                    <th style="font-size: 13px;font-weight:normal;" scope="row"><?php _e('Bottom right', 'news-ticker-benaceur'); ?></th>
                    <td>
					<div class="sm_benaceurlist_caps_input-ntb"><input style="font-weight:bold;max-width:100px;text-align:center;" type="text" name="news_ticker_benaceur_title_styles_bottomright" value="<?php echo $ntb_title_styles_bottomright; ?>" /></div>
                   </td>
                </tr>
                <tr valign="top">
                    <th style="font-size: 13px;font-weight:normal;" scope="row"><?php _e('Bottom left', 'news-ticker-benaceur'); ?></th>
                    <td>
					<div class="sm_benaceurlist_caps_input-ntb"><input style="font-weight:bold;max-width:100px;text-align:center;" type="text" name="news_ticker_benaceur_title_styles_bottomleft" value="<?php echo $ntb_title_styles_bottomleft; ?>" /></div>
                   </td>
                </tr>
</table>
</div>
<!-- Radius Tile Style -->
