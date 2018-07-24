<?php

function news_ticker_benaceur_page_options() {
	
	$settings = get_settings_ntb();
		global $wp_roles;

		if ( !isset( $wp_roles ) ) {
			$wp_roles = new WP_Roles();
		}
		$roles = $wp_roles->get_names();
        $roles = array_map( 'translate_user_role', $roles );
		
        include ('includes/news-ticker-benaceur-panel-var.php');
		?>
		
<br />
<style type="text/css">
<?php if (is_rtl()) { ?>
@import url(http://fonts.googleapis.com/earlyaccess/droidarabickufi.css);
@media (min-width: 959px) {
.main-NTB {margin:0px 60px 0px 105px;}
}
@media (max-width: 960px) {
.main-NTB {margin:0px 20px 0px 55px;}
}
@media (max-width: 330px) {
.main-NTB {margin:0px 10px 0px 37px;}
}
.koalapse__content-NTB p {font-family: 'Droid Arabic Kufi', sans-serif;font-size:14px;}
h3.koalapse__title-NTB {font-family: 'Droid Arabic Kufi', Tahoma, Arial, sans-serif;}
.koalapse__title-NTB:after {left: 1rem;} .koalapse__title-NTB {text-align: right;}
.DroidArabicKufi {font-family: 'Droid Arabic Kufi', sans-serif;}
<?php } else { ?>
@media (min-width: 959px) {
.main-NTB {margin:0px 85px 0px 42px;}
}
@media (max-width: 960px) {
.main-NTB {margin:0px 47px 0px 6px;}
}
@media (max-width: 330px) {
.main-NTB {margin:0px 37px 0px 3px;}
}
.koalapse__content-NTB p {font-family:sans-serif;font-size:15px;}
h3.koalapse__title-NTB {font-family: Tahoma, Arial, sans-serif;}
.koalapse__title-NTB:after {right: 1rem;} .koalapse__title-NTB {text-align: left;}
<?php } ?>

<?php if ($ntb_styles_options_p != 'theme_standard') { ?>
.main-NTB {margin-bottom:-20px;}
<?php } ?>

<?php if ($ntb_styles_options_p == 'theme_standard') { ?>
#up-sec-sett1,#up-sec-sett2,#up-sec-sett3,#up-sec-sett4,#up-sec-sett5 {right:165px;left:165px;}
<?php } else { ?>
#up-sec-sett1,#up-sec-sett2,#up-sec-sett3,#up-sec-sett4 {right:200px;left:230px;}
#up-sec-sett5 {right:200px;left:270px;}
<?php } ?>

</style>

<?php if (isset($_GET['settings-updated']) && $GLOBALS['pagenow'] == NTB_BEN_O_G && isset($_GET['page']) && $_GET['page'] == NS_TR_BEN){ ?>
<style>
#setting-error-settings_updated {display:none;}
@media only screen and (max-width: 510px) { #message.updated {max-width:200px;  }}
@media only screen and (min-width: 511px) { #message.updated {width:270px;  }}
#message.updated {
    position:fixed; top:200px;  
	background:green; color:#fff; opacity:0.8; z-index:8;
    border: 1px solid #77CB39; border-radius: 4px; padding: 6px 20px; text-align:center;
}
</style>
	<div id="message" class="updated">
        <p><strong style="opacity:1; font-size:15px;"><?php _e('Settings saved successfully.', 'news-ticker-benaceur') ?></strong></p>
    </div>
<script>
(function($) {
    $('html, body').animate({scrollTop: $('.ntb-scroll44').position().top}, 1);
    $('html, body').animate({scrollTop: $('.koalapse__title-NTB.op5').position().top}, 1500);
})(jQuery);
</script>	
<?php } else { ?>
<style>
	/* -- version -- */
.ntb-mm411112 {
	    max-width:95%;
	    min-width:95%;
	    background:#F4A297;
		color:#000;
font-family: 'Droid Arabic Kufi', sans-serif;font-size:15px;
}
 .ntb-mm411112-backgroundRed{
        background:#F2897B;
    }
  .ntb-mm411112 #ntb-mm411112-divtoBlink{	
		padding:10px;
        color:#493838;
    }
/* -- version -- */
</style>

<div style='display:none;' class='ntb-mm4111172p'><?php wp_ntb_msg_update_func();  ?></div>
<?php } ?>	

<div id="ntb-top-import-setts"></div>

        <div class="main-NTB">
            <!-- Content goes here -->
            <div class="koalapse-NTB">
                <h3 class="koalapse__title-NTB op1" data-panel="panel-1"><span><span class="dashicons dashicons-admin-tools"></span> <?php _e("Support",'news-ticker-benaceur'); ?></span></h3>
                <div style="display: none;" class="koalapse__content-NTB op1" data-panel="panel-1">
                    <p><?php _e("You can ask questions about plugin and settings via this topic:",'news-ticker-benaceur'); ?> <a target="_blank" href="http://benaceur-php.com/1747.aspx" >http://benaceur-php.com/?p=1747</a> </p>
                </div>
                <h3 class="koalapse__title-NTB op2"><span style="margin-top:-1px;" class="dashicons dashicons-admin-multisite"></span> <?php _e("Contribute to translation of plugin",'news-ticker-benaceur'); ?></h3>
                <div style="display: none;" class="koalapse__content-NTB op2">
                    <p><?php _e('If you want to translate this plugin to your language then send me the translation files via:', 'news-ticker-benaceur'); ?> <a target="_blank" href="http://benaceur-php.com/?p=32" >http://benaceur-php.com/contact</a> </p>
                </div>
                <h3 class="koalapse__title-NTB op3"><span style="margin-top:-1px;" class="dashicons dashicons-megaphone"></span> <?php _e("Very important",'news-ticker-benaceur'); ?></h3>
                <div style="display: none;" class="koalapse__content-NTB op3">
                    <p><?php _e('1- If you use a caching plugin, it is necessary in most cases to clear the cache after each animation change', 'news-ticker-benaceur'); ?></p>
                    <p><?php _e('2- Note for developers: When you use (query_posts) to identify articles that appear in the home page, for example, or in search page or ... must be taken into account that it affects the inclusion or exclusion articles that appear in the ticker, and to avoid this problem, and so as not to interfere with the insertion or exception settings for latest articles, must use this condition: $query->is_main_query()', 'news-ticker-benaceur'); ?></p>
                </div>
                <h3 class="koalapse__title-NTB op4"><span style="margin-top:-2px;" class="dashicons dashicons-admin-users"></span> http://benaceur-php.com</h3>
                <div style="display: none;" class="koalapse__content-NTB op4">
                    <p><?php _e("Visit plugin site:",'news-ticker-benaceur'); ?> <a target="_blank" href="http://benaceur-php.com">http://benaceur-php.com</a> </p>
                </div>
                <h3 class="koalapse__title-NTB op5"><span style="margin-top:-1px;" class="dashicons dashicons-search"></span> <?php _e("Quick access to all settings",'news-ticker-benaceur'); ?></h3>
                <div style="display: none;" class="koalapse__content-NTB op5">
                    <div class="NTBP4577" id="click-setting-ntb1"><a><?php _e('General settings', 'news-ticker-benaceur'); ?></a></div>
                    <div class="NTBP4577" id="click-setting-ntb1a"><a><?php _e('Settings of hide', 'news-ticker-benaceur'); ?></a></div>
                    <div class="NTBP4577" id="click-setting-ntb1b"><a><?php _e('Title settings', 'news-ticker-benaceur'); ?></a></div>
                    <div class="NTBP4577" id="click-setting-ntb2"><a><?php _e('Animation', 'news-ticker-benaceur'); ?></a></div>
                    <div class="NTBP4577" id="click-setting-ntb3"><a><?php _e('Settings of style', 'news-ticker-benaceur');?></a></div>
                    <div class="NTBP4577" id="click-setting-ntb4"><a><?php _e("Remove all settings and data of the plugin from database/Remove [wp_news_ticker_benaceur_short_code]",'news-ticker-benaceur'); ?></a></div>
                    <div class="NTBP4577" id="click-setting-ntb5"><a><?php _e("export and import all settings",'news-ticker-benaceur'); ?></a></div>
                </div>
            </div>
        </div>
		
    <div id="wpcontent-benaceur-ntb"><div id="wpcontent-benaceur-nab-top"></div>
            <h2><?php _e('News-Ticker-Benaceur', 'news-ticker-benaceur'); echo ' V '. ntb_version(); ?></h2>
<div id="col-nontb">
<p><?php _e('Note: After activating the plugin Put the following line in the place (in template) where you bar to appear:', 'news-ticker-benaceur'); ?></p>
<span class="code-insert-ntb">&lt;?php if (has_action('wp_news_ticker_benaceur')) wp_news_ticker_benaceur_(); ?></span>
<p><?php _e('or put this short code (in post or page):', 'news-ticker-benaceur'); ?></p>
<span class="code-insert-ntb">[wp_news_ticker_benaceur_short_code]</span>
<br /><br /><hr>
</div>

<div id="go1-setting-ntb"></div><br />
        <h3 style="font-family: 'Droid Arabic Kufi', sans-serif;"><?php _e('General settings', 'news-ticker-benaceur'); ?><span style="font-size:30px;position:absolute;margin-top:-4px;cursor: pointer;" id="up-sec-sett1" class="dashicons dashicons-arrow-up-alt2"></span></h3>
        <form id="ntb1" name="myOptionsForm4" method="post" action="options.php#ntb1"  >
            <?php settings_fields( 'news_ticker_benaceur_group' ); 
				do_settings_sections( 'news_ticker_benaceur_group' );
			?>

<table class="form-table">
	<tr>
		<td>
    <div class="switch demo1">
                        <input type="checkbox"  value="1" <?php if ($ntb_enable_plug) echo 'checked="checked"';  ?> name="news_ticker_benaceur_enable_plug" />
                        <label></label>
	</div>
	<center><div style="margin-top:10px;" ><?php _e("Enable plugin",'news-ticker-benaceur'); ?></div></center>
		</td>
	</tr>
</table>
<table class="form-table44">
	
                 <tr valign="top">
                    
                    <td>
				<div class="bold-3"><select style="min-width:150px;text-align:center;"  name="news_ticker_benaceur_latest_p_c"  class="form-table-lat-com-pos">
				<option value="latest_posts" <?php selected('latest_posts', $ntb_latest_p_c); ?>><?php _e("Latest posts", 'news-ticker-benaceur'); ?></option>
				<option value="latest_comments" <?php selected('latest_comments', $ntb_latest_p_c); ?>><?php _e("Latest comments", 'news-ticker-benaceur'); ?></option>
				</select></div>
                </tr>
				
<br />
</table><br />

<div class="to-tr2"></div>
<br />
<div id="news-ticker-benaceur-font">
<table>
					<tr>
						<td>
						<div class="colwrap-display"><div class="news-ticker-benaceur-colwrap">
						<div class="bold-3"><select style="min-width:110px;text-align:center;"  name="news_ticker_benaceur_links_admin_bar_menu" class="news-ticker-benaceur-color-inp"><option value="menu" <?php selected('menu', get_option( 'news_ticker_benaceur_links_admin_bar_menu' )); ?>><?php _e('Menu', 'news-ticker-benaceur'); ?></option><option value="submenu" <?php selected('submenu', get_option( 'news_ticker_benaceur_links_admin_bar_menu' )); ?>><?php _e('Submenu', 'news-ticker-benaceur'); ?></option></select></div>
						</div></div>
						</td>
					</tr>
<tr valign="top"><td  scope="row"><?php _e('Enable News Ticker Benaceur on admin bar in frontend', 'news-ticker-benaceur'); ?></td><td><label class="switch-nab"><input type="checkbox" name="news_ticker_benaceur_links_admin_bar_front" class="switch-input" value="1"<?php if( $ntb_links_admin_bar_front) { echo 'checked="checked"'; } ?>/><span class="switch-label" data-on="On" data-off="Off"></span><span class="switch-handle"></span></label></td></tr>
<tr valign="top"><td scope="row"><?php _e('Enable News Ticker Benaceur on admin bar in admin panel', 'news-ticker-benaceur'); ?></td><td><label class="switch-nab"><input type="checkbox" name="news_ticker_benaceur_links_admin_bar_admin" class="switch-input" value="1"<?php if( $ntb_links_admin_bar_admin) { echo 'checked="checked"'; } ?>/><span class="switch-label" data-on="On" data-off="Off"></span><span class="switch-handle"></span></label></td></tr>
</table>
</div>
<br />
<div class="to-tr2"></div>
<div id="go1a-setting-ntb"></div><br />
			<table class="form-table">
                <tr>  
                    <th style="font-size: 13px;font-weight:normal;" scope="row"><div class="dd"><?php _e('Hide for visitors', 'news-ticker-benaceur'); ?></div><span style="position:absolute;margin-top:-18px;font-size:30px;cursor:pointer;" id="up-sec-sett2" class="dashicons dashicons-arrow-up-alt2"></span></th>
                    <td> 
					<label class="switch-nab">				

	                    <input type="checkbox" class="switch-input" name="news_ticker_benaceur_for_visitors" value="1" <?php if( get_option('news_ticker_benaceur_for_visitors')) { echo 'checked="checked"'; } ?>/>
                        <span class="switch-label" data-on="On" data-off="Off"></span>
                        <span class="switch-handle"></span>
                   </label>
				   </td>
                </tr>
                <tr>  
                    <th style="font-size: 13px;font-weight:normal;" scope="row"><div class="dd"><?php _e('Hide for all users', 'news-ticker-benaceur'); ?></div></th>
                    <td> 
					<label class="switch-nab">				

	                    <input type="checkbox" class="switch-input" name="news_ticker_benaceur_for_users" value="1" <?php if( get_option('news_ticker_benaceur_for_users')) { echo 'checked="checked"'; } ?>/>
                        <span class="switch-label" data-on="On" data-off="Off"></span>
                        <span class="switch-handle"></span>
                   </label>
				   </td>
                </tr>
				<tr>    
                	<th style="font-size: 13px;font-weight:normal;" scope="row"><?php _e('Hide for this group(s) (You can select more than one group)', 'news-ticker-benaceur'); ?></th>
                    <td>
					<div class="checkbox">				
<div class="styled-select-ntb">
<select name="news_ticker_benaceur_for_role_x[]" id="news_ticker_benaceur_for_role_x" style="min-width:150px; font-weight: bold; height: auto;" multiple="multiple">
<option style="color: #C4C4C4;" value="" select="select"><?php _e('Remove Selection', 'news-ticker-benaceur'); ?></option>

						    	<?php
									$rolexcap_ntb = $settings[ 'rolexcap_ntb' ];

									foreach ( $roles as $role => $name ) {
								?>
<option value="<?php echo esc_attr( $role ); ?>"<?php selected( in_array( $role, $rolexcap_ntb ) ); ?>><?php echo esc_html( $name ); ?></option>
								<?php
									}
								?>
</select>
</div></div>
                    </td>
                </tr>
                <tr valign="top">
                    <th style="font-size: 13px;font-weight:normal;" scope="row"><?php _e('Hide for this user id', 'news-ticker-benaceur'); ?></th>
                    
                    <td>
					<div class="sm_benaceurlist_caps_input-ntb"><input style="font-weight:bold;" type="text" name="news_ticker_benaceur_for_user_id" placeholder="<?php _e( 'Enter here the user id', 'news-ticker-benaceur' ); ?>" value="<?php echo get_option('news_ticker_benaceur_for_user_id'); ?>" /></div>
                    &nbsp;&nbsp;<em><?php _e( 'Separate between id by commas, for example: 2,16,223', 'news-ticker-benaceur' ); ?></em></td>
                    
                </tr>
                <tr>  
                    <th style="font-size: 13px;font-weight:normal;" scope="row"><div class="dd"><?php _e('Hide for all except administrator', 'news-ticker-benaceur'); ?></div></th>
                    <td> 
					<label class="switch-nab">				

	                    <input type="checkbox" class="switch-input" name="news_ticker_benaceur_for_all_expt_admin" value="1" <?php if( get_option('news_ticker_benaceur_for_all_expt_admin')) { echo 'checked="checked"'; } ?>/>
                        <span class="switch-label" data-on="On" data-off="Off"></span>
                        <span class="switch-handle"></span>
                   </label>
				   </td>
                </tr>
				</table>
<input type='button' style="min-width:130px;margin-bottom:20px;margin-top:20px;"  id='H-ntbSelpage' class="button-secondary" value='<?php _e('Hide in:', 'news-ticker-benaceur'); ?>';>
<div id="H2-ntbSelpage" style="display:none;">
<table class="form-table">
                <tr>  
                    <th style="font-size: 13px;font-weight:normal;" scope="row"><div class="dd"><?php _e('home', 'news-ticker-benaceur'); ?></div></th>
                    <td> 
					<label class="switch-nab">				

	                    <input type="checkbox" class="switch-input" name="news_ticker_benaceur_in_home" value="1" <?php if( get_option('news_ticker_benaceur_in_home')) { echo 'checked="checked"'; } ?>/>
                        <span class="switch-label" data-on="On" data-off="Off"></span>
                        <span class="switch-handle"></span>
                   </label>
				   </td>
                </tr>
                <tr>  
                    <th style="font-size: 13px;font-weight:normal;" scope="row"><div class="dd"><?php _e('category page', 'news-ticker-benaceur'); ?></div></th>
                    <td> 
					<label class="switch-nab">				

	                    <input type="checkbox" class="switch-input" name="news_ticker_benaceur_in_category" value="1" <?php if( get_option('news_ticker_benaceur_in_category')) { echo 'checked="checked"'; } ?>/>
                        <span class="switch-label" data-on="On" data-off="Off"></span>
                        <span class="switch-handle"></span>
                   </label>
				   </td>
                </tr>
                <tr>  
                    <th style="font-size: 13px;font-weight:normal;" scope="row"><div class="dd"><?php _e("author page", 'news-ticker-benaceur'); ?></div></th>
                    <td> 
					<label class="switch-nab">				

	                    <input type="checkbox" class="switch-input" name="news_ticker_benaceur_in_author" value="1" <?php if( get_option('news_ticker_benaceur_in_author')) { echo 'checked="checked"'; } ?>/>
                        <span class="switch-label" data-on="On" data-off="Off"></span>
                        <span class="switch-handle"></span>
                   </label>
				   </td>
                </tr>
                <tr>  
                    <th style="font-size: 13px;font-weight:normal;" scope="row"><div class="dd"><?php _e("search page", 'news-ticker-benaceur'); ?></div></th>
                    <td> 
					<label class="switch-nab">				

	                    <input type="checkbox" class="switch-input" name="news_ticker_benaceur_in_search" value="1" <?php if( get_option('news_ticker_benaceur_in_search')) { echo 'checked="checked"'; } ?>/>
                        <span class="switch-label" data-on="On" data-off="Off"></span>
                        <span class="switch-handle"></span>
                   </label>
				   </td>
                </tr>
                <tr>  
                    <th style="font-size: 13px;font-weight:normal;" scope="row"><div class="dd"><?php _e('single post (in post)', 'news-ticker-benaceur'); ?></div></th>
                    <td> 
					<label class="switch-nab">				

	                    <input type="checkbox" class="switch-input" name="news_ticker_benaceur_in_single" value="1" <?php if( get_option('news_ticker_benaceur_in_single')) { echo 'checked="checked"'; } ?>/>
                        <span class="switch-label" data-on="On" data-off="Off"></span>
                        <span class="switch-handle"></span>
                   </label>
				   </td>
                </tr>
                <tr valign="top">
                    <th style="font-size: 13px;font-weight:normal;" scope="row"><?php _e('ID of post', 'news-ticker-benaceur'); ?></th>
                    
                    <td>
					<div class="sm_benaceurlist_caps_input-ntb"><input style="font-weight:bold;" type="text" name="news_ticker_benaceur_in_single_id" placeholder="<?php _e( 'Leave blank to activate All', 'news-ticker-benaceur' ); ?>" value="<?php echo $ntb_in_single_id; ?>" /></div>
                    &nbsp;&nbsp;<em><?php _e( 'Separate between id by commas, for example: 2,16,223', 'news-ticker-benaceur' ); ?></em></td>
                    
                </tr>
<br />				
                <tr>  
                    <th style="font-size: 13px;font-weight:normal;" scope="row"><div class="dd"><?php _e('pages', 'news-ticker-benaceur'); ?></div></th>
                    <td> 
					<label class="switch-nab">				

	                    <input type="checkbox" class="switch-input" name="news_ticker_benaceur_in_page" value="1" <?php if( get_option('news_ticker_benaceur_in_page')) { echo 'checked="checked"'; } ?>/>
                        <span class="switch-label" data-on="On" data-off="Off"></span>
                        <span class="switch-handle"></span>
                   </label>
				   </td>
                </tr>
                <tr valign="top">
                    <th style="font-size: 13px;font-weight:normal;" scope="row"><?php _e('ID of page', 'news-ticker-benaceur'); ?></th>
                    
                    <td>
					<div class="sm_benaceurlist_caps_input-ntb"><input style="font-weight:bold;" type="text" name="news_ticker_benaceur_in_page_id" placeholder="<?php _e( 'Leave blank to activate All', 'news-ticker-benaceur' ); ?>" value="<?php echo $ntb_in_page_id; ?>" /></div>
                    &nbsp;&nbsp;<em><?php _e( 'Separate between id by commas, for example: 2,16,223', 'news-ticker-benaceur' ); ?></em></td>
                    
                </tr>
</table>
<br /><br />
</div>
<span class="ntb-scroll44"></span>

<div class="to-tr2"></div>

<table style="margin-bottom:-50px;" class="form-table">
                 <tr valign="top">
                    <th style="font-size: 13px;font-weight:normal;" scope="row"><?php _e('Choose the post type (You can select more than one type)', 'news-ticker-benaceur'); ?></th>
                    <td>
				<div class="bold-3"><select style="min-width:150px; text-align:center; height:auto;"  name="news_ticker_benaceur_post_type[]" multiple="multiple">
<?php
  $post_type_ntb = (array) $ntb_post_type;
  $post_types = get_post_types( array( 'public' => true ), 'names' );  
  
  foreach ( $post_types as $post_type ) {
	if ($post_type != 'attachment') {  
?>
<option value="<?php echo esc_attr( $post_type ); ?>"<?php selected( in_array( $post_type, $post_type_ntb ) ); ?>><?php echo esc_attr( $post_type ); ?></option>
<?php
	}
}
?>
				</select></div>
				</td>
                </tr>
</table>

	<span class="fsub_lat-pos-ntb box_lat-com">				

<table style="margin-top:35px; margin-bottom:-50px;" class="form-table">
<?php $ntb_post__status = (array) $ntb_post_status; ?>
                 <tr valign="top">
                    <th style="font-size: 13px;font-weight:normal;" scope="row"><?php _e('Choose the post status (You can select more than one status)', 'news-ticker-benaceur'); ?></th>
                    <td>
				<div class="bold-3"><select style="min-width:150px; text-align:center; height:auto;"  name="news_ticker_benaceur_post_status[]"  multiple="multiple">
				<option value="publish" <?php selected( in_array( 'publish', $ntb_post__status ) ); ?>><?php _e("publish", 'news-ticker-benaceur'); ?></option>
				<option value="pending" <?php selected( in_array( 'pending', $ntb_post__status ) ); ?>><?php _e("pending", 'news-ticker-benaceur'); ?></option>
				<option value="trash" <?php selected( in_array( 'trash', $ntb_post__status ) ); ?>><?php _e("trash", 'news-ticker-benaceur'); ?></option>
				<option value="draft" <?php selected( in_array( 'draft', $ntb_post__status ) ); ?>><?php _e("draft", 'news-ticker-benaceur'); ?></option>
				<option value="future" <?php selected( in_array( 'future', $ntb_post__status ) ); ?>><?php _e("future", 'news-ticker-benaceur'); ?></option>
				<option value="private" <?php selected( in_array( 'private', $ntb_post__status ) ); ?>><?php _e("private", 'news-ticker-benaceur'); ?></option>
				<option value="auto-draft" <?php selected( in_array( 'auto-draft', $ntb_post__status ) ); ?>><?php _e("auto-draft", 'news-ticker-benaceur'); ?></option>
				<option value="inherit" <?php selected( in_array( 'inherit', $ntb_post__status ) ); ?>><?php _e("inherit", 'news-ticker-benaceur'); ?></option>
				</select>
				<em><a style="color:#0451f7;" target="_blank" href="https://codex.wordpress.org/Post_Status">post status</a></em>
				</div>
				</td>
                </tr>
</table>
				
	</span>	
	
	<span class="fsub_lat-com-ntb box_lat-com">				

<table style="margin-top:35px; margin-bottom:-60px;" class="form-table">
                 <tr valign="top">
                    <th style="font-size: 13px;font-weight:normal;" scope="row"><?php _e('Choose the post status (You can select more than one status)', 'news-ticker-benaceur'); ?></th>
                    <td>
				<div class="bold-3"><select style="min-width:150px; text-align:center;"  name="news_ticker_benaceur_comment_status">
				<option value="approve" <?php selected('approve', $ntb_comment_status); ?>><?php _e("approve", 'news-ticker-benaceur'); ?></option>
				<option value="hold" <?php selected('hold', $ntb_comment_status); ?>><?php _e("pending", 'news-ticker-benaceur'); ?></option>
				<option value="all" <?php selected('all', $ntb_comment_status); ?>><?php _e("all", 'news-ticker-benaceur'); ?></option>
				</select></div>
				</td>
                </tr>
</table>
				
	</span>	

<table class="form-table">

                 <tr valign="top">
                    <th style="font-size: 13px;font-weight:normal;" scope="row"><span class="fsub_lat-pos-ntb box_lat-com"><?php _e('Choose the name of taxonomy', 'news-ticker-benaceur'); ?></span></th>
                    
                    <td>
<span class="fsub_lat-pos-ntb_hide-sel">
				
				<div class="bold-3"><select style="min-width:150px;text-align:center;"  name="news_ticker_benaceur_for_cat_tax"  class="news-ticker-benaceur-color-tax">
<?php
  $taxonomies_ntb = array($ntb_cat_tax);
  //$taxonomies = get_taxonomies();
  $taxonomies = get_object_taxonomies( 'post' );
  
  foreach ( $taxonomies as $taxonomy ) {
?>
<option value="<?php echo esc_attr( $taxonomy ); ?>"<?php selected( in_array( $taxonomy, $taxonomies_ntb ) ); ?>><?php echo esc_attr( $taxonomy ); ?></option>
<?php
}
?>
				</select></div>
                </span>
				</tr>
				
                <tr valign="top">
                    <th style="font-size: 13px;font-weight:normal;" scope="row">
					<span class="fsub_lat-pos-ntb box_lat-com">
					<span class="fsub_cat-or-tax-ntb box_cat-tax"><?php _e('category id', 'news-ticker-benaceur'); ?></span>
					<span class="fsub_tax-or-cat-ntb box_cat-tax"><?php _e('taxonomy id', 'news-ticker-benaceur'); ?></span>
					</span>
					<span class="fsub_lat-com-ntb box_lat-com"><?php _e('post id', 'news-ticker-benaceur'); ?></span>
					</th>
                    <td>
					<div class="sm_benaceurlist_caps_input-ntb"><input style="font-weight:bold;" type="text" name="news_ticker_benaceur_for_cat" placeholder="<?php if ($ntb_cat_tax == 'category') { _e( 'Leave blank to activate All', 'news-ticker-benaceur' ); } else { _e( 'Enter the id', 'news-ticker-benaceur' ); } ?>" value="<?php echo get_option('news_ticker_benaceur_for_cat'); ?>" />
<span class="fsub_tax-ntb"><span class="fsub_lat-pos-ntb_hide-sel">
<input type='button' style="margin-top:-5px;" id='bt-ntbCat' class="button-secondary" value='<?php _e('Display all categories', 'news-ticker-benaceur'); ?>';>
</span></span>
<div id="sub-ntbCat" style="display: none;">		
<?php
  echo '<div>
<table width="80%" cellspacing="1" style="border:1px solid #999999;background:#A4A4A4;">
	<tr>
		<td align="center" width="75%" style="border-left:1px solid #999999;"><b>'. __('Name cat', 'news-ticker-benaceur') .'</b></td>
		<td align="center" width="25%"><b>'. __('id cat', 'news-ticker-benaceur') .'</b></td>
	</tr>
</table>  </div>';
$cats = get_categories();
foreach($cats as $category) {
  echo '<div>
<table width="80%" cellspacing="1" style="border:1px solid #999999;">
	<tr>
		<td align="center" width="75%" style="border-left:1px solid #999999;">' . $category->cat_name .'</td>
		<td align="center" width="25%">'. $category->term_id .'</td>
	</tr>
</table>  </div>';
}
?>
<br /><br />
</div>

					</div>
                    &nbsp;&nbsp;<em><?php _e( 'Separate between id by commas, for example: 2,16,223', 'news-ticker-benaceur' ); ?></em></td>
                    
                </tr>
				
					<tr>
						<td>
					<span class="fsub_tax-ntb">	
                   <input type="radio" name="news_ticker_benaceur_include_exclude_id" value="include_id" <?php if( $ntb_include_exclude_id == 'include_id') echo 'checked';?> >
				    </span>   
					   </td>
                    <div class="colwrap-display">&nbsp;&nbsp;<td><span class="fsub_tax-ntb">
					<span class="fsub_lat-pos-ntb box_lat-com"><?php _e("Include cat id",'news-ticker-benaceur'); ?></span>
					<span class="fsub_lat-com-ntb box_lat-com"><?php _e("Include post id",'news-ticker-benaceur'); ?></span>
					</span></td></div>
					</tr><br />
					<tr> 
						<td>
					<span class="fsub_tax-ntb">	
                   <input type="radio" name="news_ticker_benaceur_include_exclude_id" value="exclude_id" <?php if( $ntb_include_exclude_id == 'exclude_id')echo 'checked';?> >
					 </span> 	
						</td>
                    <div class="colwrap-display">&nbsp;&nbsp;<td><span class="fsub_tax-ntb">
					<span class="fsub_lat-pos-ntb box_lat-com"><?php _e("Exclude cat id",'news-ticker-benaceur'); ?></span>
					<span class="fsub_lat-com-ntb box_lat-com"><?php _e("Exclude post id",'news-ticker-benaceur'); ?></span>
					</span></td></div>
					</tr><br />
					
					
					
</table>
<div id="go1b-setting-ntb"></div>
<div class="to-tr2"></div>
			  <br />
			  
              <table class="form-table">
			  <?php _e('Choose one title for each site according direction if your multilingual site', 'news-ticker-benaceur'); ?>
                <tr valign="top">
                    <th style="font-size: 13px;font-weight:normal;" scope="row"><span style="font-size:30px;position:absolute;margin-top:-4px;cursor: pointer;" id="up-sec-sett3" class="dashicons dashicons-arrow-up-alt2"></span><?php _e('The title ltr', 'news-ticker-benaceur'); ?></th>
                    <td>
					<div class="sm_benaceurlist_caps_input-ntb"><input style="font-weight:bold;max-width:250px;" type="text" name="news_ticker_benaceur_title_ltr" value="<?php if (!empty($ntb_title_ltr)) { echo $ntb_title_ltr; } else { echo 'Latest news'; } ?>" /></div>
                   </td>
                </tr>
                <tr valign="top">
                    <th style="font-size: 13px;font-weight:normal;" scope="row"><?php _e('The title rtl', 'news-ticker-benaceur'); ?></th>
                    <td>
					<div class="sm_benaceurlist_caps_input-ntb"><input style="font-weight:bold;max-width:250px;" type="text" name="news_ticker_benaceur_title_rtl" value="<?php if (!empty($ntb_title_rtl)) { echo $ntb_title_rtl; } else { echo 'آخر الأخبار'; } ?>" /></div>
                   </td>
                </tr>
                <tr>  
                    <th style="font-size: 13px;font-weight:normal;" scope="row"><div class="dd"><?php _e('Disable Title', 'news-ticker-benaceur'); ?></div></th>
                    <td> 
					<label class="switch-nab">				

	                    <input type="checkbox" class="switch-input" name="news_ticker_benaceur_disable_title" value="1" <?php if( $ntb_disable_title) { echo 'checked="checked"'; } ?>/>
                        <span class="switch-label" data-on="On" data-off="Off"></span>
                        <span class="switch-handle"></span>
                   </label>
				   </td>
                </tr>
                <tr>  
                    <th style="font-size: 13px;font-weight:normal;" scope="row"><div class="dd"><?php _e('Title animation pulsate', 'news-ticker-benaceur'); ?></div></th>
                    <td> 
					<label class="switch-nab">				

	                    <input type="checkbox" class="switch-input"  name="news_ticker_benaceur_title_anim_pulsate" value="1" <?php  if( !empty($ntb_title_anim_pulsate) ) { echo 'checked="checked"'; } ?>/>
                        <span class="switch-label" data-on="On" data-off="Off"></span>
                        <span class="switch-handle"></span>
                   </label>
				   </td>
                </tr>
                 <tr valign="top">
                    <th style="font-size: 13px;font-weight:normal;" scope="row"><?php _e('Title styles', 'news-ticker-benaceur'); ?></th>
                    
                    <td>
				<div class="bold-3"><select style="min-width:100px;text-align:center;"  name="news_ticker_benaceur_title_styles"  class="news-ticker-benaceur-styl-tit">
				<option value="simpleTileSt" <?php selected('simpleTileSt', $ntb_title_styles); ?>><?php _e('Simple', 'news-ticker-benaceur'); ?></option>
				<option value="radiusTileSt" <?php selected('radiusTileSt', $ntb_title_styles); ?>><?php _e('Radius', 'news-ticker-benaceur'); ?></option>
				</select></div>
                </tr>
				</table>
      <?php include_once ('includes/styles-title.php'); ?>
			  --------------
              <table class="form-table">
                <tr valign="top">
                    <th style="font-size: 13px;font-weight:normal;" scope="row"><?php _e('Numbre of posts or comments', 'news-ticker-benaceur'); ?></th>
                    <td>
					<div class="sm_benaceurlist_caps_input-ntb"><input style="font-weight:bold;max-width:100px;text-align:center;" type="text" name="news_ticker_benaceur_num_posts" value="<?php echo $ntb_num_posts; ?>" /></div>
                   </td>
                </tr>
              </table>
              <table class="form-table">
                <tr valign="top">
                    <th style="font-size: 13px;font-weight:normal;" scope="row"><?php _e('Direction', 'news-ticker-benaceur'); ?></th>
                    
                    <td>
				<div class="bold-3"><select style="min-width:100px;text-align:center;"  name="news_ticker_benaceur_dir" class="news-ticker-benaceur-color-inp">
				<option value="auto" <?php selected('auto', $ntb_dir); ?>><?php _e('Auto', 'news-ticker-benaceur'); ?></option>
				<option value="ltr" <?php selected('ltr', $ntb_dir); ?>><?php _e('LTR', 'news-ticker-benaceur'); ?></option>
				<option value="rtl" <?php selected('rtl', $ntb_dir); ?>><?php _e('RTL', 'news-ticker-benaceur'); ?></option></select>
                </tr>
            </table>
<table class="form-table">
                <tr valign="top">
                    <th style="font-size: 13px;font-weight:normal;" scope="row"><?php _e('Number of letters of Title', 'news-ticker-benaceur'); ?></th>
                    <td>
					<div class="sm_benaceurlist_caps_input-ntb"><input style="font-weight:bold;max-width:100px;text-align:center;" type="text" name="news_ticker_benaceur_expt_txt_title" value="<?php echo $ntb_expt_txt_title; ?>" /></div>
                   </td>
                </tr>
                <tr valign="top">
                    <th style="font-size: 13px;font-weight:normal;" scope="row"><?php _e('Number of letters of Comments', 'news-ticker-benaceur'); ?></th>
                    <td>
					<div class="sm_benaceurlist_caps_input-ntb"><input style="font-weight:bold;max-width:100px;text-align:center;" type="text" name="news_ticker_benaceur_expt_txt_comm" value="<?php echo $ntb_expt_txt_comm; ?>" /></div>
                   </td>
                </tr>
</table>
					<p><?php submit_button(); ?></p>
        </form>
		<div id="progress-ntb1"><?php _e("Please wait...",'news-ticker-benaceur'); ?></div>
    <form id="ntb2" action="options.php#ntb2-2" method="post">
            <?php settings_fields( 'news_ticker_benaceur_group' ); ?>
	  <input type="hidden"  name="ntb_group_reset" value="1" <?php if(empty($ntb_group_reset) ) { echo 'checked="checked"'; } ?>/>
      <input type="submit" value="<?php _e('Click to reset properties plugin', 'news-ticker-benaceur');?>" class="button-secondary" />
    </form>
	<div id="progress-ntb2"><?php _e("Please wait...",'news-ticker-benaceur'); ?></div>

<br />
<center><div class="to-tr3"></div></center>
<div id="go2-setting-ntb"></div><br />
<span id="ntb4-4"></span>
<form id="ntb3" method="post" action="options.php#ntb3" enctype="multipart/form-data">
            <?php settings_fields( 'news_ticker_benaceur_group_anim'); 
				do_settings_sections( 'news_ticker_benaceur_group_anim' );
			?>
<table class="form-table">
                 <tr valign="top">
                    <th style="font-size: 13px;font-weight:normal;" scope="row"><span style="font-size:30px;position:absolute;margin-top:-4px;cursor: pointer;" id="up-sec-sett4" class="dashicons dashicons-arrow-up-alt2"></span><?php _e('Animation', 'news-ticker-benaceur'); ?></th>
                    
                    <td>
				<div class="bold-3"><select  style="min-width:100px;text-align:center;"  name="news_ticker_benaceur_style"  class="news-ticker-benaceur-color-inp selAnim" >
				<option value="fadein" <?php selected('fadein', $ntb_st); ?>><?php _e('FadeIn', 'news-ticker-benaceur'); ?></option>
				<option value="Scroll_Up_NTB" <?php selected('Scroll_Up_NTB', $ntb_st); ?>><?php _e('Slide-Up-Down', 'news-ticker-benaceur'); ?></option>
				<option value="ScrollNTB" <?php selected('ScrollNTB', $ntb_st); ?>><?php _e('Scroll-H', 'news-ticker-benaceur'); ?></option>
				<option value="fade" <?php selected('fade', $ntb_st); ?>><?php _e('Fade', 'news-ticker-benaceur'); ?></option>
				<option value="curtainY" <?php selected('curtainY', $ntb_st); ?>><?php _e('Curtain Ver', 'news-ticker-benaceur'); ?></option>
				<option value="curtainX" <?php selected('curtainX', $ntb_st); ?>><?php _e('Curtain Hor', 'news-ticker-benaceur'); ?></option>
				<option value="turnUp" <?php selected('turnUp', $ntb_st); ?>><?php _e('Turn Up', 'news-ticker-benaceur'); ?></option>
				<option value="turnDown" <?php selected('turnDown', $ntb_st); ?>><?php _e('Turn Down', 'news-ticker-benaceur'); ?></option>
				<option value="turnLeft" <?php selected('turnLeft', $ntb_st); ?>><?php _e('Turn Left', 'news-ticker-benaceur'); ?></option>
				<option value="turnRight" <?php selected('turnRight', $ntb_st); ?>><?php _e('Turn Right', 'news-ticker-benaceur'); ?></option>
				<option value="slideY" <?php selected('slideY', $ntb_st); ?>><?php _e('Slide', 'news-ticker-benaceur'); ?></option>
				<option value="slideX" <?php selected('slideX', $ntb_st); ?>><?php _e('Slide Hor', 'news-ticker-benaceur'); ?></option>
				<option value="growX" <?php selected('growX', $ntb_st); ?>><?php _e('Grow Hor', 'news-ticker-benaceur'); ?></option>
				<option value="growY" <?php selected('growY', $ntb_st); ?>><?php _e('Grow Ver', 'news-ticker-benaceur'); ?></option>
				<option value="scrollLeft" <?php selected('scrollLeft', $ntb_st); ?>><?php _e('Scroll left', 'news-ticker-benaceur'); ?></option>
				<option value="scrollRight" <?php selected('scrollRight', $ntb_st); ?>><?php _e('Scroll right', 'news-ticker-benaceur'); ?></option>
				<option value="fadeUp" <?php selected('fadeUp', $ntb_st); ?>><?php _e('Fade Up', 'news-ticker-benaceur'); ?></option>
				<option value="fadeLR" <?php selected('fadeLR', $ntb_st); ?>><?php _e('Fade LR', 'news-ticker-benaceur'); ?></option>
				<option value="fadeZoom" <?php selected('fadeZoom', $ntb_st); ?>><?php _e('Fade Zoom', 'news-ticker-benaceur'); ?></option>
				<option value="zoom" <?php selected('zoom', $ntb_st); ?>><?php _e('Zoom', 'news-ticker-benaceur'); ?></option>
				<option value="shuffle" <?php selected('shuffle', $ntb_st); ?>><?php _e('Shuffle', 'news-ticker-benaceur'); ?></option>
				<option value="toss" <?php selected('toss', $ntb_st); ?>><?php _e('Toss', 'news-ticker-benaceur'); ?></option>
				<option value="blindZ" <?php selected('blindZ', $ntb_st); ?>><?php _e('Blind bott', 'news-ticker-benaceur'); ?></option>
				<option value="uncover" <?php selected('uncover', $ntb_st); ?>><?php _e('Uncover', 'news-ticker-benaceur'); ?></option>
				<option value="simple" <?php selected('simple', $ntb_st); ?>><?php _e('Simple', 'news-ticker-benaceur'); ?></option>
				<option value="TickerNTB" <?php selected('TickerNTB', $ntb_st); ?>><?php _e('Typing 1', 'news-ticker-benaceur'); ?></option>
				<option value="typing_2" <?php selected('typing_2', $ntb_st); ?>><?php _e('Typing 2', 'news-ticker-benaceur'); ?></option>
				</select></div>
                </tr>
</table>

      <?php include_once ('includes/option-anim.php'); ?>
					<p><?php submit_button(); ?></p>
</form>

      <?php include_once ('includes/image-attachment-scrollntb.php'); ?>

<div id="progress-ntb3"><?php _e("Please wait...",'news-ticker-benaceur'); ?></div>
    <form id="ntb4" action="options.php#ntb4-4" method="post">
            <?php settings_fields( 'news_ticker_benaceur_group_anim' ); ?>
	  <input type="hidden"  name="ntb_group_anim_reset" value="1" <?php if(empty($ntb_group_anim_reset) ) { echo 'checked="checked"'; } ?>/>
      <input type="submit" value="<?php _e('Click to reset Properties animations', 'news-ticker-benaceur');?>" class="button-secondary" />
	</form>
	<div id="progress-ntb4"><?php _e("Please wait...",'news-ticker-benaceur'); ?></div>

<br /><center><div class="to-tr3"></div></center><br />
<div id="news-ticker-benaceur-font">
<span id="ntb5-5"></span>
  <form id="ntb5" method="post" action="options.php#ntb5-5" >
            <?php settings_fields( 'news_ticker_benaceur_group_sty'); 
				do_settings_sections( 'news_ticker_benaceur_group_sty' );
			?>
<div id="go3-setting-ntb"></div><br /><br />
	<div class="option-box">
<label><b><font face="Arial" size="4"><span style="font-size:30px;position:absolute;margin-top:-4px;cursor: pointer;" id="up-sec-sett5" class="dashicons dashicons-arrow-up-alt2"></span><?php _e('Settings of style', 'news-ticker-benaceur');?>:</font></b></label><br /><br />
					<tr>
						<td>
							<div class="colwrap-display"><div class="news-ticker-benaceur-colwrap">
								<input type="text" name="news_ticker_benaceur_color_back_" id="news-ticker-benaceur-colorScheme_a" class="news-ticker-benaceur-color-inp" value="<?php echo $ntb_color_back; ?>"  />
								<div class="news-ticker-benaceur-colsel news-ticker-benaceur-colorScheme_a"></div>
							</div></div>
						</td>
						<div class="colwrap-display"><td><?php _e("Background color",'news-ticker-benaceur'); ?> </td></div><br />
					</tr>
					<tr>
						<td>
							<div class="colwrap-display"><div class="news-ticker-benaceur-colwrap">
								<input type="text" id="news-ticker-benaceur-txtclr_a" class="news-ticker-benaceur-color-inp" value="<?php echo $ntb_color_text_back; ?>" name="news_ticker_benaceur_color_text_back" />
								<div class="news-ticker-benaceur-colsel news-ticker-benaceur-txtclr_a"></div>
							</div></div>
						</td>
						<div class="colwrap-display"><td><?php _e("Text color",'news-ticker-benaceur'); ?> </td></div><br />
					</tr>
					<tr>
						<td>
							<div class="colwrap-display"><div class="news-ticker-benaceur-colwrap">
								<input type="text" name="news_ticker_benaceur_color_back_title" id="news-ticker-benaceur-background2clr_a" class="news-ticker-benaceur-color-inp" value="<?php echo $ntb_color_back_title; ?>"  />
								<div class="news-ticker-benaceur-colsel news-ticker-benaceur-background2clr_a"></div>
							</div></div>
						</td>
						<div class="colwrap-display"><td><?php _e("Background color of title",'news-ticker-benaceur'); ?> </td></div><br />
					</tr>
					<tr>
						<td>
							<div class="colwrap-display"><div class="news-ticker-benaceur-colwrap">
								<input type="text" name="news_ticker_benaceur_color_text_title" id="news-ticker-benaceur-TextTitleclr_a" class="news-ticker-benaceur-color-inp" value="<?php echo $ntb_color_text_title; ?>"  />
								<div class="news-ticker-benaceur-colsel news-ticker-benaceur-TextTitleclr_a"></div>
							</div></div>
						</td>
						<div class="colwrap-display"><td><?php _e("Text color of title (if animation pulsate is disabled)",'news-ticker-benaceur'); ?> </td></div><br />
					</tr>
					<tr>
						<td>
							<div class="colwrap-display"><div class="news-ticker-benaceur-colwrap">
								<input type="text" id="news-ticker-benaceur-borderclr_a" class="news-ticker-benaceur-color-inp" value="<?php echo $ntb_color_border; ?>" name="news_ticker_benaceur_color_border" />
								<div class="news-ticker-benaceur-colsel news-ticker-benaceur-borderclr_a"></div>
							</div></div>
						</td>
						<div class="colwrap-display"><td><?php _e("Border color",'news-ticker-benaceur'); ?> </td></div><br />
					</tr>
					<tr>
						<td>
							<div class="colwrap-display"><div class="news-ticker-benaceur-colwrap">
								<input type="text" id="news-ticker-benaceur-borderclr-title_a" class="news-ticker-benaceur-color-inp" value="<?php echo $ntb_color_border_title; ?>" name="news_ticker_benaceur_color_border_title" />
								<div class="news-ticker-benaceur-colsel news-ticker-benaceur-borderclr-title_a"></div>
							</div></div>
						</td>
						<div class="colwrap-display"><td><?php _e("Border color (Title)",'news-ticker-benaceur'); ?> </td></div><br />
					</tr>
					<tr>
						<td>
							<div class="colwrap-display"><div class="news-ticker-benaceur-colwrap">
								<input type="text" id="news-ticker-benaceur-hoverclr_a" class="news-ticker-benaceur-color-inp" value="<?php echo $ntb_a_hover; ?>" name="news_ticker_benaceur_a_hover" />
								<div class="news-ticker-benaceur-colsel news-ticker-benaceur-hoverclr_a"></div>
							</div></div>
						</td>
						<div class="colwrap-display"><td><?php _e("Hover color",'news-ticker-benaceur'); ?> </td></div><br />
					</tr>
					<tr>
						<td>
							<div class="colwrap-display"><div class="news-ticker-benaceur-colwrap">
								<input type="text" id="news-ticker-benaceur-txtclr_a" class="news-ticker-benaceur-color-inp" value="<?php echo $ntb_border_title; ?>" name="news_ticker_benaceur_border_title" />
							</div></div>
						</td>
						<div class="colwrap-display"><td><?php _e("border (Title)",'news-ticker-benaceur'); ?> </td></div><br />
					</tr>
					<tr>
						<td>
							<div class="colwrap-display"><div class="news-ticker-benaceur-colwrap">
								<input type="text" id="news-ticker-benaceur-txtclr_a" class="news-ticker-benaceur-color-inp" value="<?php echo $ntb_border_top; ?>" name="news_ticker_benaceur_border_top" />
							</div></div>
						</td>
						<div class="colwrap-display"><td><?php _e("border top",'news-ticker-benaceur'); ?> </td></div><br />
					</tr>
					<tr>
						<td>
							<div class="colwrap-display"><div class="news-ticker-benaceur-colwrap">
								<input type="text" id="news-ticker-benaceur-txtclr_a" class="news-ticker-benaceur-color-inp" value="<?php echo $ntb_border_bottom; ?>" name="news_ticker_benaceur_border_bottom" />
							</div></div>
						</td>
						<div class="colwrap-display"><td><?php _e("border bottom",'news-ticker-benaceur'); ?> </td></div><br />
					</tr>
					<tr>
						<td>
							<div class="colwrap-display"><div class="news-ticker-benaceur-colwrap">
								<input type="text" id="news-ticker-benaceur-txtclr_a" class="news-ticker-benaceur-color-inp" value="<?php echo $ntb_border_right; ?>" name="news_ticker_benaceur_border_right" />
							</div></div>
						</td>
						<div class="colwrap-display"><td><?php _e("border right",'news-ticker-benaceur'); ?> </td></div><br />
					</tr>
					<tr>
						<td>
							<div class="colwrap-display"><div class="news-ticker-benaceur-colwrap">
								<input type="text" id="news-ticker-benaceur-txtclr_a" class="news-ticker-benaceur-color-inp" value="<?php echo $ntb_border_left; ?>" name="news_ticker_benaceur_border_left" />
							</div></div>
						</td>
						<div class="colwrap-display"><td><?php _e("border left",'news-ticker-benaceur'); ?> </td></div><br />
					</tr>
					<tr>
						<td>
							<div class="colwrap-display"><div class="news-ticker-benaceur-colwrap">
								<input type="text" id="news-ticker-benaceur-txtclr_a" class="news-ticker-benaceur-color-inp" value="<?php echo $ntb_border_radius; ?>" name="news_ticker_benaceur_border_radius" />
							</div></div>
						</td>
						<div class="colwrap-display"><td><?php _e("border radius",'news-ticker-benaceur'); ?> </td></div><br />
					</tr>
					<tr>
						<td>
							<div class="colwrap-display"><div class="news-ticker-benaceur-colwrap">
								<input type="text" class="news-ticker-benaceur-color-inp" value="<?php echo $ntb_opacity; ?>" name="news_ticker_benaceur_opacity" />
							</div></div>
						</td>
						<div class="colwrap-display"><td><?php _e("The level of transparency 1-0.1",'news-ticker-benaceur'); ?> </td></div><br />
					</tr>
					<div class="colwrap-display-media-only ltr"></div>
					<tr>
						<td>
							<div class="colwrap-display"><div class="news-ticker-benaceur-colwrap">
								<input type="text" class="news-ticker-benaceur-color-inp" value="<?php echo $ntb_width; ?>" name="news_ticker_benaceur_width" />
							</div></div>
						</td>
						<div class="colwrap-display"><div class="wwid"><td ><?php _e("Width by adding: px or % (It is recommended to use % if your theme uses the percentage in width,",'news-ticker-benaceur'); ?><br /><?php _e("and use px if your theme uses the pixels in width.)",'news-ticker-benaceur'); ?></td></div></div><br />
					</tr>
					<div class="colwrap-display-media-only ltr"></div>
					<tr>
						<td>
							<div class="colwrap-display"><div class="news-ticker-benaceur-colwrap">
								<input type="text" class="news-ticker-benaceur-color-inp" value="<?php echo $ntb_height; ?>" name="news_ticker_benaceur_height" />
							</div></div>
						</td>
						<div class="colwrap-display"><td><?php _e("Height",'news-ticker-benaceur'); ?> </td></div><br />
					</tr>
					<tr>
						<td>
							<div class="colwrap-display"><div class="news-ticker-benaceur-colwrap">
								<input type="text" class="news-ticker-benaceur-color-inp" value="<?php echo $ntb_line_height_title; ?>" name="news_ticker_benaceur_line_height_title" />
							</div></div>
						</td>
						<div class="colwrap-display"><td><?php _e("line height (Title)",'news-ticker-benaceur'); ?> </td></div><br />
					</tr>
					<tr>
						<td>
							<div class="colwrap-display"><div class="news-ticker-benaceur-colwrap">
								<input type="text" class="news-ticker-benaceur-color-inp" value="<?php echo $ntb_width_title_background; ?>" name="news_ticker_benaceur_width_title_background" />
							</div></div>
						</td>
						<div class="colwrap-display"><td><?php _e("Width of title background",'news-ticker-benaceur'); ?> </td></div><br />
					</tr>
					<tr>
						<td>
							<div class="colwrap-display"><div class="news-ticker-benaceur-colwrap">
								<input type="text" class="news-ticker-benaceur-color-inp" value="<?php echo $ntb_padding_top; ?>" name="news_ticker_benaceur_padding_top" />
							</div></div>
						</td>
						<div class="colwrap-display"><td><?php _e("padding top",'news-ticker-benaceur'); ?> </td></div><br />
					</tr>
					<tr>
						<td>
							<div class="colwrap-display"><div class="news-ticker-benaceur-colwrap">
								<input type="text" class="news-ticker-benaceur-color-inp" value="<?php echo $ntb_padding_bottom; ?>" name="news_ticker_benaceur_padding_bottom" />
							</div></div>
						</td>
						<div class="colwrap-display"><td><?php _e("padding bottom",'news-ticker-benaceur'); ?> </td></div><br />
					</tr>
					<tr>
						<td>
							<div class="colwrap-display"><div class="news-ticker-benaceur-colwrap">
								<input type="text" class="news-ticker-benaceur-color-inp" value="<?php echo $ntb_padding_top_title; ?>" name="news_ticker_benaceur_padding_top_title" />
							</div></div>
						</td>
						<div class="colwrap-display"><td><?php _e("padding top (Title)",'news-ticker-benaceur'); ?> </td></div><br />
					</tr>
					<tr>
						<td>
							<div class="colwrap-display"><div class="news-ticker-benaceur-colwrap">
								<input type="text" class="news-ticker-benaceur-color-inp" value="<?php echo $ntb_margin_top; ?>" name="news_ticker_benaceur_margin_top" />
							</div></div>
						</td>
						<div class="colwrap-display"><td><?php _e("margin top",'news-ticker-benaceur'); ?> </td></div><br />
					</tr>
					<tr>
						<td>
							<div class="colwrap-display"><div class="news-ticker-benaceur-colwrap">
								<input type="text" class="news-ticker-benaceur-color-inp" value="<?php echo $ntb_margin_bottom; ?>" name="news_ticker_benaceur_margin_bottom" />
							</div></div>
						</td>
						<div class="colwrap-display"><td><?php _e("margin bottom",'news-ticker-benaceur'); ?> </td></div><br />
					</tr>
					<tr>
						<td>
							<div class="news-ticker-benaceur-colwrap2">
								<input type="text" class="news-ticker-benaceur-color-inp" value="<?php echo $ntb_font_family; ?>" name="news_ticker_benaceur_font_family" />
						&nbsp;&nbsp;&nbsp;&nbsp;<?php _e("Font family",'news-ticker-benaceur'); ?> /
                               <input type="checkbox"  value="enable" <?php checked('enable', get_option( 'news_ticker_benaceur_disable_this_font' )); ?> name="news_ticker_benaceur_disable_this_font" />
                        <?php _e("Disable this font: DroidKufi_Ben ",'news-ticker-benaceur'); ?>
							</div>
						</td>
					</tr>
					<tr>
						<td>
							<div class="colwrap-display"><div class="news-ticker-benaceur-colwrap">
								<input type="text" class="news-ticker-benaceur-color-inp" value="<?php echo $ntb_font_size; ?>" name="news_ticker_benaceur_font_size" />
							</div></div>
						</td>
						<div class="colwrap-display"><td><?php _e("Font size",'news-ticker-benaceur'); ?> </td></div><br />
					</tr>
					<tr>
						<td>
							<div class="colwrap-display"><div class="news-ticker-benaceur-colwrap">
								<input type="text" class="news-ticker-benaceur-color-inp" value="<?php echo $ntb_title_font_family; ?>" name="news_ticker_benaceur_title_font_family" />
							</div></div>
						</td>
						<div class="colwrap-display"><td><?php _e("Font family (title)",'news-ticker-benaceur'); ?> </td></div><br />
					</tr>
					<tr>
						<td>
							<div class="colwrap-display"><div class="news-ticker-benaceur-colwrap">
								<input type="text" class="news-ticker-benaceur-color-inp" value="<?php echo $ntb_font_size_title; ?>" name="news_ticker_benaceur_font_size_title" />
							</div></div>
						</td>
						<div class="colwrap-display"><td><?php _e("Font size (title)",'news-ticker-benaceur'); ?> </td></div><br />
					</tr>
					<tr>
						<td>
						<div class="colwrap-display"><div class="news-ticker-benaceur-colwrap">
						<div class="bold-3"><select  name="news_ticker_benaceur_font_weight" class="news-ticker-benaceur-color-inp"><option value="normal" <?php selected('normal', $ntb_font_weight); ?>><?php _e('Normal', 'news-ticker-benaceur'); ?></option><option value="bold" <?php selected('bold', $ntb_font_weight); ?>><?php _e('Bold', 'news-ticker-benaceur'); ?></option></select></div>
						</div></div>
						</td>
						<div class="colwrap-display"><td><?php _e("Font weight",'news-ticker-benaceur'); ?> </td></div><br />
					</tr>
					<tr>
						<td>
						<div class="colwrap-display"><div class="news-ticker-benaceur-colwrap">
						<div class="bold-3"><select  name="news_ticker_benaceur_text_shadow" class="news-ticker-benaceur-color-inp"><option value="no" <?php selected('no', $ntb_text_shadow); ?>><?php _e('no', 'news-ticker-benaceur'); ?></option><option value="5px 5px 5px" <?php selected('5px 5px 5px', $ntb_text_shadow); ?>><?php _e('yes', 'news-ticker-benaceur'); ?></option></select></div>
						</div></div>
						</td>
						<div class="colwrap-display"><td><?php _e("text shadow",'news-ticker-benaceur'); ?> </td></div><br />
					</tr>
					<tr>
						<td>
							<div class="colwrap-display"><div class="news-ticker-benaceur-colwrap">
								<input type="text" id="news-ticker-benaceur-textshadowclr_a" class="news-ticker-benaceur-color-inp" value="<?php echo $ntb_text_shadow_color; ?>" name="news_ticker_benaceur_text_shadow_color" />
								<div class="news-ticker-benaceur-colsel news-ticker-benaceur-textshadowclr_a"></div>
							</div></div>
						</td>
						<div class="colwrap-display"><td><?php _e("text shadow color",'news-ticker-benaceur'); ?> </td></div><br />
					</tr>
					<tr>
						<td>
						<div class="colwrap-display"><div class="news-ticker-benaceur-colwrap">
						<div class="bold-3"><select  name="news_ticker_benaceur_box_shadow" class="news-ticker-benaceur-color-inp"><option value="no" <?php selected('no', $ntb_box_shadow); ?>><?php _e('no', 'news-ticker-benaceur'); ?></option><option value="0px 1px 3px" <?php selected('0px 1px 3px', $ntb_box_shadow); ?>><?php _e('yes', 'news-ticker-benaceur'); ?></option></select></div>
						</div></div>
						</td>
						<div class="colwrap-display"><td><?php _e("box shadow",'news-ticker-benaceur'); ?> </td></div><br />
					</tr>
					<tr>
						<td>
							<div class="colwrap-display"><div class="news-ticker-benaceur-colwrap">
								<input type="text" id="news-ticker-benaceur-boxshadowclr_a" class="news-ticker-benaceur-color-inp" value="<?php echo $ntb_box_shadow_color; ?>" name="news_ticker_benaceur_box_shadow_color" />
								<div class="news-ticker-benaceur-colsel news-ticker-benaceur-boxshadowclr_a"></div>
							</div></div>
						</td>
						<div class="colwrap-display"><td><?php _e("box shadow color",'news-ticker-benaceur'); ?> </td></div><br />
					</tr>
					<tr>
						<td>
							<div class="colwrap-display"><div class="news-ticker-benaceur-colwrap">
								<input type="text" id="news-ticker-benaceur-txtclr_a" class="news-ticker-benaceur-color-inp" value="<?php echo $ntb_box_shadow_v; ?>" name="news_ticker_benaceur_box_shadow_v" />
							</div></div>
						</td>
						<div class="colwrap-display"><td><?php _e("box shadow pixel",'news-ticker-benaceur'); ?> </td></div><br />
					</tr>
					<tr>
						<td>
							<div class="colwrap-display"><div class="news-ticker-benaceur-colwrap">
								<input type="text" id="news-ticker-benaceur-PrevNext-color_a" class="news-ticker-benaceur-color-inp" value="<?php echo $ntb_PrevNext_color; ?>" name="news_ticker_benaceur_PrevNext_color" />
								<div class="news-ticker-benaceur-colsel news-ticker-benaceur-PrevNext-color_a"></div>
							</div></div>
						</td>
						<div class="colwrap-display"><td><?php _e("Color of prev/next button",'news-ticker-benaceur'); ?> </td></div><br />
					</tr>
					<tr>
						<td>
							<div class="colwrap-display"><div class="news-ticker-benaceur-colwrap">
								<input type="text" class="news-ticker-benaceur-color-inp" value="<?php echo $ntb_PrevNext_font_size; ?>" name="news_ticker_benaceur_PrevNext_font_size" />
							</div></div>
						</td>
						<div class="colwrap-display"><td><?php _e("Font size of prev/next button",'news-ticker-benaceur'); ?> </td></div><br />
					</tr>
					<tr>
						<td>
						<div class="colwrap-display"><div class="news-ticker-benaceur-colwrap">
						<div class="bold-3"><select  name="news_ticker_benaceur_PrevNext_weight" class="news-ticker-benaceur-color-inp"><option value="normal" <?php selected('normal', $ntb_PrevNext_weight); ?>><?php _e('Normal', 'news-ticker-benaceur'); ?></option><option value="bold" <?php selected('bold', $ntb_PrevNext_weight); ?>><?php _e('Bold', 'news-ticker-benaceur'); ?></option></select></div>
						</div></div>
						</td>
						<div class="colwrap-display"><td><?php _e("Weight of prev/next button",'news-ticker-benaceur'); ?> </td></div><br />
					</tr>
					<tr>
						<td>
							<div class="colwrap-display"><div class="news-ticker-benaceur-colwrap">
								<input type="text" class="news-ticker-benaceur-color-inp" value="<?php echo $ntb_PrevNext_top; ?>" name="news_ticker_benaceur_PrevNext_top" />
							</div></div>
						</td>
						<div class="colwrap-display"><td><?php _e("distance top the prev/next button",'news-ticker-benaceur'); ?> </td></div><br />
					</tr>
<br /><div class="to-tr2"></div>
<p><?php _e("Enable this feature (style of mobile) if your theme uses the percentage % in the width of the site",'news-ticker-benaceur'); ?></p>
                <tr>  
                    <td> 
					<label class="switch-nab">				

	                    <input type="checkbox" class="switch-input" name="news_ticker_benaceur_enable_style_mobile" value="1" <?php if( $ntb_enable_style_mobile) { echo 'checked="checked"'; } ?>/>
                        <span class="switch-label" data-on="On" data-off="Off"></span>
                        <span class="switch-handle"></span>
                   </label>
       &nbsp;&nbsp;&nbsp; <td style="font-size: 13px;font-weight:normal;"><?php _e('Enable style of mobile', 'news-ticker-benaceur'); ?></td>
				   </td>
                </tr>
				<br /><br />
					<tr>
						<td>
							<div class="colwrap-display"><div class="news-ticker-benaceur-colwrap">
								<input type="text" class="news-ticker-benaceur-color-inp" value="<?php echo $ntb_screen_max_width; ?>" name="news_ticker_benaceur_screen_max_width" />
							</div></div>
						</td>
						<div class="colwrap-display"><td><?php _e("In a screen where the maximum width is",'news-ticker-benaceur'); ?> </td></div><br />
					</tr>
					<tr>
						<td>
							<div class="colwrap-display"><div class="news-ticker-benaceur-colwrap">
								<input type="text" class="news-ticker-benaceur-color-inp" value="<?php echo $ntb_screen_min_width; ?>" name="news_ticker_benaceur_screen_min_width" />
							</div></div>
						</td>
						<div class="colwrap-display"><td><?php _e("In a screen where the minimum width is",'news-ticker-benaceur'); ?> </td></div><br />
					</tr>
					<tr>
						<td>
							<div class="colwrap-display"><div class="news-ticker-benaceur-colwrap">
								<input type="text" class="news-ticker-benaceur-color-inp" value="<?php echo $ntb_height_mobile; ?>" name="news_ticker_benaceur_height_mobile" />
							</div></div>
						</td>
						<div class="colwrap-display"><td><?php _e("Height",'news-ticker-benaceur'); ?> </td></div><br />
					</tr>
					<tr>
						<td>
							<div class="colwrap-display"><div class="news-ticker-benaceur-colwrap">
								<input type="text" class="news-ticker-benaceur-color-inp" value="<?php echo $ntb_padding_top_mobile; ?>" name="news_ticker_benaceur_padding_top_mobile" />
							</div></div>
						</td>
						<div class="colwrap-display"><td><?php _e("padding top",'news-ticker-benaceur'); ?> </td></div><br />
					</tr>
					<tr>
						<td>
							<div class="colwrap-display"><div class="news-ticker-benaceur-colwrap">
								<input type="text" class="news-ticker-benaceur-color-inp" value="<?php echo $ntb_padding_right_left_mobile ?>" name="news_ticker_benaceur_padding_right_left_mobile" />
							</div></div>
						</td>
						<?php if (is_rtl() && $dir != 'ltr') { ?>
						<div class="colwrap-display"><td><?php _e("padding right",'news-ticker-benaceur'); ?> </td></div><br />
						<?php } elseif (!is_rtl() && $dir == 'rtl') { ?>
						<div class="colwrap-display"><td><?php _e("padding right",'news-ticker-benaceur'); ?> </td></div><br />
						<?php } else { ?>
						<div class="colwrap-display"><td><?php _e("padding left",'news-ticker-benaceur'); ?> </td></div><br />
						<?php } ?>
					</tr>
					<tr>
						<td>
							<div class="colwrap-display"><div class="news-ticker-benaceur-colwrap">
								<input type="text" class="news-ticker-benaceur-color-inp" value="<?php echo $ntb_min_height_mobile; ?>" name="news_ticker_benaceur_min_height_mobile" />
							</div></div>
						</td>
						<div class="colwrap-display"><td><?php _e("min height (Slide-Up-Down)",'news-ticker-benaceur'); ?> </td></div><br />
					</tr>
					<tr>
						<td>
							<div class="colwrap-display"><div class="news-ticker-benaceur-colwrap">
								<input type="text" class="news-ticker-benaceur-color-inp" value="<?php echo $ntb_line_height_mobile; ?>" name="news_ticker_benaceur_line_height_mobile" />
							</div></div>
						</td>
						<div class="colwrap-display"><td><?php _e("The distance between the lines",'news-ticker-benaceur'); ?> </td></div><br />
					</tr>
<p><?php _e("Or choose:",'news-ticker-benaceur'); ?></p>
                <tr>  
                    <td> 
					<label class="switch-nab">				

	                    <input type="checkbox" class="switch-input" name="news_ticker_benaceur_disable_in_screen_max_width" value="1" <?php if( $ntb_disable_in_screen_max_width) { echo 'checked="checked"'; } ?>/>
                        <span class="switch-label" data-on="On" data-off="Off"></span>
                        <span class="switch-handle"></span>
                   </label>
       &nbsp;&nbsp;&nbsp; <td style="font-size: 13px;font-weight:normal;"><?php _e('Hide the news ticker in a screen where the width is less than', 'news-ticker-benaceur'); ?></td>
				   </td>
                </tr>
				<br /><br />
					<tr>
						<td>
							<div class="colwrap-display"><div class="news-ticker-benaceur-colwrap">
								<input type="text" class="news-ticker-benaceur-color-inp" value="<?php echo $ntb_v_screen_max_width; ?>" name="news_ticker_benaceur_v_screen_max_width" />
							</div></div>
						</td>
						<div class="colwrap-display"><td><?php _e("The smaller width than",'news-ticker-benaceur'); ?> </td></div><br />
					</tr>
<br /><div class="to-tr2"></div><br />
					<tr>
						<td>
						<div class="colwrap-display"><div class="news-ticker-benaceur-colwrap">
						<div class="bold-3">
						<select id="NTBshowelemselect" style="min-width:137px;text-align:center;"  name="news_ticker_benaceur_styles_options_p" class="news-ticker-benaceur-color-inp">
						<option value="theme_one" <?php selected('theme_one', $ntb_styles_options_p); ?>><?php _e('Orange Theme', 'news-ticker-benaceur'); ?></option>
						<option value="theme_custom" <?php selected('theme_custom', $ntb_styles_options_p); ?>><?php _e('Custom Theme', 'news-ticker-benaceur'); ?></option>
						<option value="theme_standard" <?php selected('theme_standard', $ntb_styles_options_p); ?>><?php _e('Standard theme', 'news-ticker-benaceur'); ?></option>
						</select></div>
						</div></div>
						</td>
						<div class="colwrap-display">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<td><?php _e("Styles options page",'news-ticker-benaceur'); ?> </td></div><br />
					</tr>
					      <?php  require ('includes/news-ticker-benaceur-styles-p-options.php'); ?>
<br /><div class="to-tr2"></div><br />
                <tr>  
                    <td> 
					<label class="switch-nab">				

	                    <input type="checkbox" class="switch-input" name="news_ticker_benaceur_hide_icon_evol_plug" value="1" <?php if( $ntb_hide_icon_evol_plug) { echo 'checked="checked"'; } ?>/>
                        <span class="switch-label" data-on="On" data-off="Off"></span>
                        <span class="switch-handle"></span>
                   </label>
       &nbsp;&nbsp;&nbsp; <td style="font-size: 13px;font-weight:normal;"><?php _e('Hide the plugin rating icon', 'news-ticker-benaceur'); ?></td>
				   </td>
                </tr>
				<br /><br />
					<tr>
						<td>
							<div class="colwrap-display"><div class="news-ticker-benaceur-colwrap">
								<input type="text" class="news-ticker-benaceur-color-inp" value="<?php echo $time_export_sett_gmt; ?>" name="news_ticker_benaceur_time_export_sett_gmt" />
							</div></div>
						</td>
						<div class="colwrap-display"><td><?php _e("Export time the XML file GMT+",'news-ticker-benaceur'); ?> </td></div><br />
					</tr>

					<br /><p><?php submit_button(); ?></p>
				</div>	
			</form>
			<div id="progress-ntb5"><?php _e("Please wait...",'news-ticker-benaceur'); ?></div>
<span id="ntb6-6"></span>
    <form id="ntb6" action="options.php#ntb6-6" method="post">
            <?php settings_fields( 'news_ticker_benaceur_group_sty' ); ?>
	  <input type="hidden"  name="ntb_group_sty_reset" value="1" <?php if(empty($ntb_group_sty_reset) ) { echo 'checked="checked"'; } ?>/>
      <input type="submit" value="<?php _e('Click to reset style properties plugin', 'news-ticker-benaceur');?>" class="button-secondary" />
    </form>
	<div id="progress-ntb6"><?php _e("Please wait...",'news-ticker-benaceur'); ?></div>

<div id="go4-setting-ntb"></div><br />
<br /><div class="to-tr"></div>
    <form id="ntb7" action="options.php#ntb7" method="post">
            <?php
			settings_fields( 'news_ticker_benaceur_group_op' ); 
			do_settings_sections( 'news_ticker_benaceur_group_op' );
			?>
<table style="margin-top:20px;" >
	
					<tr>
						<td>
                   <input type="radio" name="news_ticker_benaceur_delete_all_options" value="delete_opt" <?php if( $ntb_delete_all_options == 'delete_opt')echo 'checked';?> >
                    <td><?php _e("Remove all settings and data of the plugin from database when the plugin is disabled",'news-ticker-benaceur'); ?><span style="font-size:30px;position:absolute;right:270px;left:270px;margin-top:19px;cursor: pointer;" id="up-sec-sett6" class="dashicons dashicons-arrow-up-alt2"></span></td>
						</td>
					</tr>
					<tr> 
						<td>
                   <input type="radio" name="news_ticker_benaceur_delete_all_options" value="no_delete_opt" <?php if( $ntb_delete_all_options == 'no_delete_opt')echo 'checked';?> >
						</td>
                   <td><?php _e("Do not delete",'news-ticker-benaceur'); ?></td>
					</tr>
</table>
<br /><div class="to-tr2"></div>
<table style="margin-top:20px;" >
					<tr>
						<td>
                   <input type="radio" name="news_ticker_benaceur_ntb_st_code" value="remove" <?php if( $NTB_st_code == 'remove')echo 'checked';?> >
                    <td><?php _e("Remove [wp_news_ticker_benaceur_short_code] from posts and pages when the plugin is disabled (is recommended that take a copy of the database before this operation)",'news-ticker-benaceur'); ?></td>
						</td>
					</tr>
					<tr> 
						<td>
                   <input type="radio" name="news_ticker_benaceur_ntb_st_code" value="not_remove" <?php if( $NTB_st_code == 'not_remove')echo 'checked';?> >
						</td>
                   <td><?php _e("Do not remove",'news-ticker-benaceur'); ?></td>
					</tr>
</table>
					<p><?php submit_button(); ?></p>
    </form>
	<div id="progress-ntb7"><?php _e("Please wait...",'news-ticker-benaceur'); ?></div>

<div id="progress-ntb0"><?php _e("in progress save all changes ...",'news-ticker-benaceur'); ?></div>
<span class="submit-ntb0"><input type="submit" name="submit" style="background:#505050; color:#fff; padding:6px; cursor: pointer;" id="ntb0" class="button-benTheme"  value="<?php _e("Save all changes",'news-ticker-benaceur'); ?>"  /></span><br /><br /><br />

    <form id="ntb8" action="options.php#ntb8" method="post">
            <?php settings_fields( 'news_ticker_benaceur_all_reset' ); 
			?>
	  <input type="hidden"  name="ntb_all_reset" value="1" <?php if(empty($ntb_all_reset) ) { echo 'checked="checked"'; } ?>/>
      <input type="submit" value="<?php _e('Reset all settings', 'news-ticker-benaceur');?>" class="button-secondary" />
    </form>
	<div id="progress-ntb8"><?php _e("Please wait...",'news-ticker-benaceur'); ?></div>

<br />
<br /><br />
<div id="sub-ntbMyplugins" style="display:none;">
<a target="_blank" href="https://wordpress.org/plugins/news-ticker-benaceur/">news-ticker-benaceur</a><br /><br />
<a target="_blank" href="https://wordpress.org/plugins/notification-msg-interface-benaceur/">notification-msg-interface-benaceur</a><br /><br />
<a target="_blank" href="https://wordpress.org/plugins/notification-admin-panel-benaceur/">notification-admin-panel-benaceur</a><br /><br />
<a target="_blank" href="https://wordpress.org/plugins/month-name-translation-benaceur/">month-name-translation-benaceur</a><br /><br />
<a target="_blank" href="https://wordpress.org/plugins/restrict-usernames-emails-characters/">Restrict Usernames Emails Characters</a><br /><br />
</div>
<input type='button'  id='bt-ntbMyplugins' class="button-secondary-ntb-hid-1" value='<?php _e('My plugins', 'news-ticker-benaceur'); ?>';>
  </div></div>
  
<!-- import export -->
<div id="go5-setting-ntb"></div><br />
		<div class="metabox-holder">
			<div style="max-width:97%;" class="postbox">
				<h3><span class="DroidArabicKufi"><?php _e('Export settings', 'news-ticker-benaceur');?></span></h3>
				<div class="inside">
					<p><?php _e('Export all plugin settings in an XML file that helps you to save all your settings for reuse here or at another location with ease.', 'news-ticker-benaceur');?></p>
					<form method="post">
						<p><input type="hidden" name="ntb_action" value="export_settings" /></p>
						<p>
							<?php wp_nonce_field( 'ntb_export_nonce', 'ntb_export_nonce' ); ?>
							<?php submit_button( __( 'Export' ), 'secondary', 'submit', false ); ?>
						</p>
					</form>
				</div><!-- .inside -->
			</div><!-- .postbox -->

			<div style="max-width:97%;" class="postbox">
				<h3><span class="DroidArabicKufi"><?php _e('Import settings', 'news-ticker-benaceur');?></span></h3>
				<div class="inside">
					<p><?php _e('Click on "Import" to restore all your saved settings from the XML file', 'news-ticker-benaceur');?></p>
					<form method="post" enctype="multipart/form-data">
						<p>
							<input type="file" name="NTB_import_file"/>
						</p>
						<p>
							<input type="hidden" name="ntb_action" value="import_settings" />
							<?php wp_nonce_field( 'ntb_import_nonce', 'ntb_import_nonce' ); ?>
							<?php submit_button( __( 'Import' ), 'secondary', 'submit', false ); ?>
						</p>
					</form>
				</div><!-- .inside -->
			</div><!-- .postbox -->
		</div><!-- .metabox-holder -->
<!-- import export -->
  
<?php if(empty($ntb_hide_icon_evol_plug)) {?>
<div class="hov-button-primary-sub"><div class="button button-primary"><a target="_blank" href="https://wordpress.org/support/view/plugin-reviews/news-ticker-benaceur?filter=5"><?php _e('Do not forget to rate the plugin', 'news-ticker-benaceur');?></a></div></div>
<?php } ?>
	<div id="NTB-up-page"></div>
	
<style type="text/css">
@media (min-width: 401px) {
input#ntb0.button-benTheme {width:300px !important;}
}
@media (max-width: 400px) {
input#ntb0.button-benTheme {width:98% !important;}	
}
#NTB-up-page {
  height:60px;
  width:60px;
  <?php if ( is_rtl() ) { ?>
  background: url(<?php echo '' . plugins_url( 'admin/top-r.png', __FILE__ ) . ''; ?>) no-repeat ;
  float:left;
  margin-left:100px;
  <?php } else { ?>
  background: url(<?php echo '' . plugins_url( 'admin/top-l.png', __FILE__ ) . ''; ?>) no-repeat ;
  float:right;
  margin-right:60px;
  <?php } ?>
  cursor: pointer;
  }
#NTBshowdiv{display:none;}

.hidden-selected-fadein{display:none;}

    #progress-ntb1,#progress-ntb2,#progress-ntb3,#progress-ntb4,
	#progress-ntb5,#progress-ntb6,#progress-ntb7,#progress-ntb8,#progress-ntb0
	{ 
	background:green;
    color: #fff; 
	font-size:16px;
    -moz-box-shadow: -5px 19px 5px #000000;
    -webkit-box-shadow: -5px 19px 5px #000000;
    box-shadow: -5px 19px 5px #000000;
	margin:0 auto;
	margin-top:-80px;
	left:0px;
	right:0px;
	padding:10px;
	width:250px;
	height:0px;
	border-radius:6px;
	position:absolute;
    display: none;
    }
	.heightAuto{
    height:auto;
    }
	
@media only screen and (max-width: 900px) {
.colwrap-display-media-only {margin-top:20px;margin-bottom:20px;}
.wwid {margin-top:-35px;position:absolute;word-wrap: break-word;max-width: 310px;}
}	
<?php if (is_rtl()) { ?>
@media only screen and (min-width: 901px) {
.wwid {margin-top:-25px;position:absolute;word-wrap: break-word;}
}
#message.updated {margin-right: 25%;}
<?php } else { ?>
@media only screen and (min-width: 901px) {
.colwrap-display-media-only.ltr {margin-top:20px;margin-bottom:20px;}
.wwid {margin-top:-35px;position:absolute;word-wrap: break-word;max-width: 510px;}
}
#message.updated {margin-left: 25%;}
<?php } ?>

.ntb-new {background:url(<?php echo plugins_url( 'img/ntb-new.gif', __FILE__ ) ; ?>) no-repeat ;width:33px; height:11px;}

#wpcontent-benaceur-ntb input::-moz-placeholder {color: #C8C8C8;}
#wpcontent-benaceur-ntb input:-moz-placeholder {color: #C8C8C8;}
#wpcontent-benaceur-ntb input::-webkit-input-placeholder { color: #C8C8C8;}
#wpcontent-benaceur-ntb input:-ms-input-placeholder { color: #C8C8C8;}

#wpcontent-benaceur-ntb input:focus::-moz-placeholder { color:transparent; }
#wpcontent-benaceur-ntb input:focus:-moz-placeholder { color:transparent; }
#wpcontent-benaceur-ntb input:focus::-webkit-placeholder { color:transparent; }
#wpcontent-benaceur-ntb input:focus:-ms-placeholder { color:transparent; }

</style>

	  <?php if ($GLOBALS['pagenow'] == NTB_BEN_O_G && isset($_GET['page']) && $_GET['page'] == NS_TR_BEN) { 
        	if ($ntb_styles_options_p == 'theme_one') { 
	        include ('admin/news-ticker-benaceur-admin-one.php'); 
	        } elseif ($ntb_styles_options_p == 'theme_custom' ) {
		    include ('admin/news-ticker-benaceur-admin-custom.php');
	        } elseif ($ntb_styles_options_p == 'theme_standard' ) {
		    include ('admin/news-ticker-benaceur-admin-stand.php');
		}
	    } ?>


<script>
(function($) {
        $('#H-ntbSelpage').click(function() {
                $('#H2-ntbSelpage').slideToggle("slow");
        });
})(jQuery);
</script>

<script type="text/javascript">
(function($) {
    $("#ntb0").click(function() {
        $.post( $("#ntb1").attr("action"), $("#ntb1").serialize() );
        $.post( $("#ntb3").attr("action"), $("#ntb3").serialize() );
        $.post( $("#ntb5").attr("action"), $("#ntb5").serialize() );
        $.post( $("#ntb7").attr("action"), $("#ntb7").serialize(),
              function() {
                 alert("<?php _e("All changes saved successfully, close this message!",'news-ticker-benaceur'); ?>"); location.reload();
              });
      });
})(jQuery);
</script>

<?php  }	
