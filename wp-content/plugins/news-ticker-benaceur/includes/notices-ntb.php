<?php
add_action('admin_notices', 'NTB_notice');

function NTB_notice() {

if ( current_user_can( 'administrator' ) )
{

	global $current_user;
	$user_id = $current_user->ID;
    $nden_n = ntb_21_09_16_en_ntb;
	
	if ( ! get_user_meta($user_id, 'NTB_notice_ignore_n') ) {
		    ?>
			<div class="updated" id="<?php echo $nden_n;  ?>" style="background:#FFE3AD; margin-top:30px; margin-bottom:-20px;"><p>
			<span class="hov-mib-en" onmouseup="setcookie('<?php echo $nden_n;  ?>',1)" style="color:#009999;"><strong><span style="margin-top:1px;" class="dashicons dashicons-dismiss"></span> &nbsp;</strong></span>
			<span style="color:red; font-weight: bold;" id="txtClignotantNTB"><?php _e("Important",'news-ticker-benaceur'); ?></span>&nbsp; <?php _e('my latest plugin,perhaps you might be interested <a target="_blank" href="https://wordpress.org/plugins/restrict-usernames-emails-characters/">Restrict Usernames Emails Characters</a>', 'news-ticker-benaceur'); ?>
			</p></div>
			
<style>.hov-mib-en:hover {cursor:pointer;}</style>			
			
<script type="text/javascript">
function CheckCookieNab(<?php echo $nden_n;  ?>){
 if (cookie(<?php echo $nden_n;  ?>)){
  document.getElementById(<?php echo $nden_n;  ?>).style.display='none';
 }
}

function setcookie(<?php echo $nden_n;  ?>,days){
 document.cookie=<?php echo $nden_n;  ?>+'=true;expires='+(new Date(new Date().getTime()+(1000*60*60*24*30*12)).toGMTString())+';path=/'; //one years
 document.getElementById(<?php echo $nden_n;  ?>).style.display='none';
}

function cookie(<?php echo $nden_n;  ?>){
 var re=new RegExp(<?php echo $nden_n;  ?>+'[^;]+','i');
 if (document.cookie.match(re)){
  return document.cookie.match(re)[0].split("=")[1];
 }
 return null;
}

 CheckCookieNab('<?php echo $nden_n;  ?>');
</script>

<script type="text/javascript"> 
var clignotement = function(){ 
   if (document.getElementById('txtClignotantNTB').style.visibility=='visible'){ 
      document.getElementById('txtClignotantNTB').style.visibility='hidden'; 
   } 
   else{ 
   document.getElementById('txtClignotantNTB').style.visibility='visible'; 
   } 
}; 
periode = setInterval(clignotement, 800); 
</script>

<?php
}
}	
}
?>
