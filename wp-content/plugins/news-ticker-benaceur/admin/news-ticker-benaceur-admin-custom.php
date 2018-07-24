<style type="text/css">
#news-ticker-benaceur-font .news-ticker-benaceur-colwrap{position:relative;width:120px;}	
#news-ticker-benaceur-font .news-ticker-benaceur-colwrap .news-ticker-benaceur-color-inp{ border: 1px solid #EA2F22;  width: 103px; text-align:center;} 	
#news-ticker-benaceur-font .news-ticker-benaceur-colwrap2{position:relative;}	
#news-ticker-benaceur-font .news-ticker-benaceur-colwrap2 .news-ticker-benaceur-color-inp{ border: 1px solid #EA2F22;  width: 103px; text-align:center;} 	
#news-ticker-benaceur-font .news-ticker-benaceur-colsel{background: url(<?php echo '' . plugins_url( 'admin/color_picker.png', dirname(__FILE__) ) . ''; ?>) no-repeat scroll 0 0 rgba(0, 0, 0, 0); background-size: 22px 24px; cursor: pointer; height: 24px;  position: absolute;  top:1px; width: 23px; } 
#news-ticker-benaceur-font .news-ticker-benaceur-colsel .farbtastic{display:none;position:absolute;top:8px;z-index:1;}

input[type="text"] {
	border: 0 none;	
	font-family: Tahoma;
	color: #000;
	font-size: 12px;
	line-height: 1;
	font-weight:normal;
	width: 360px;
	height: 24px;
	margin-bottom: 8px;
	padding: .35em 1em;
}
.styled-select-ntb select {
    color:#fff;
    border:1px solid #999999; 
    border-radius:5px;
    background-color:#9B005E;
	font-family: Tahoma;
	font-size: 13px;
	line-height: 1;
	font-weight:bold;
	width: auto;
	max-height: 200px;
	margin-bottom: 8px;
	padding: .35em 1em;
}
.button-primary-m-nab { 
    background-color:#2F76EC;
	border: 0 none;
	border-radius: 3px;
	font-family: Tahoma;
	color: #fff;
	font-size: 14px;
	line-height: 1;
	width: auto;
	height: auto;
	padding: .45em 1em;
	cursor: pointer;
   transition:background linear .3s;                 
   -moz-transition:background linear .3s;
   -webkit-transition:background linear .3s;
   transition:background linear .3s;
  }  
.button-primary-m-nab:hover{
   background:#4584EE;
   transition:background linear .3s;                 
   -moz-transition:background linear .3s;
   -webkit-transition:background linear .3s;
   transition:background linear .3s;
}

.successModal {
    display: block;
    position: fixed;
    top: 45%;
    left: 25%;
    width: auto;
    height: auto;
    padding: 5px 20px;
    border: 1px solid green;
    background-color: #EFE;
    z-index:1002;
    overflow: auto;
    -moz-border-radius: 15px; 
    -webkit-border-radius: 15px;
    -moz-box-shadow: 5px 5px 10px #cfcfcf;
    -webkit-box-shadow: 5px 5px 10px #cfcfcf;
}
.bold-3 {margin-bottom:6px;}
.code-insert-ntb {background:<?php echo $ntb_cust_color_back_input; ?>;padding:4px;}
#col-nontb{color:<?php echo $ntb_cust_color_font; ?>;}

th {min-width:150px;}
.switch-handle-w  {min-width:200px;margin-top:7px;}
.switch-nab {
  position: relative;
  display: inline-block;
  vertical-align: top;
  width: 56px;
  height: 20px;
  padding: 3px;
  background-color: white;
  border-radius: 18px;
  box-shadow: inset 0 -1px white, inset 0 1px 1px rgba(0, 0, 0, 0.05);
  cursor: pointer;
  background-image: -webkit-linear-gradient(top, #eeeeee, white 25px);
  background-image: -moz-linear-gradient(top, #eeeeee, white 25px);
  background-image: -o-linear-gradient(top, #eeeeee, white 25px);
  background-image: linear-gradient(to bottom, #eeeeee, white 25px);
}

.switch-input {
  position: absolute;
  top: 0;
  left: 0;
  opacity: 0;
}

.switch-label {
  position: relative;
  display: block;
  height: inherit;
  font-size: 11px;
  font-weight: bold;
  text-transform: uppercase;
  background: #eceeef;
  border-radius: inherit;
  box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.12), inset 0 0 2px rgba(0, 0, 0, 0.15);
  -webkit-transition: 0.15s ease-out;
  -moz-transition: 0.15s ease-out;
  -o-transition: 0.15s ease-out;
  transition: 0.15s ease-out;
  -webkit-transition-property: opacity background;
  -moz-transition-property: opacity background;
  -o-transition-property: opacity background;
  transition-property: opacity background;
}
.switch-label:before, .switch-label:after {
  position: absolute;
  top: 50%;
  margin-top: -.5em;
  line-height: 1;
  -webkit-transition: inherit;
  -moz-transition: inherit;
  -o-transition: inherit;
  transition: inherit;
}
.switch-label:before {
  content: attr(data-off);
  right: 11px;
  color: #aaa;
  text-shadow: 0 1px rgba(255, 255, 255, 0.5);
}
.switch-label:after {
  content: attr(data-on);
  left: 11px;
  color: white;
  text-shadow: 0 1px rgba(0, 0, 0, 0.2);
  opacity: 0;
}
.switch-input:checked ~ .switch-label {
  background:<?php echo $ntb_cust_color_switch_input; ?>;
  box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.15), inset 0 0 3px rgba(0, 0, 0, 0.2);
}
.switch-input:checked ~ .switch-label:before {
  opacity: 0;
}
.switch-input:checked ~ .switch-label:after {
  opacity: 1;
}

.switch-handle {
  position: absolute;
  top: 4px;
  left: 4px;
  width: 18px;
  height: 18px;
  background: white;
  border-radius: 10px;
  box-shadow: 1px 1px 5px rgba(0, 0, 0, 0.2);
  background-image: -webkit-linear-gradient(top, white 40%, #f0f0f0);
  background-image: -moz-linear-gradient(top, white 40%, #f0f0f0);
  background-image: -o-linear-gradient(top, white 40%, #f0f0f0);
  background-image: linear-gradient(to bottom, white 40%, #f0f0f0);
  -webkit-transition: left 0.15s ease-out;
  -moz-transition: left 0.15s ease-out;
  -o-transition: left 0.15s ease-out;
  transition: left 0.15s ease-out;
}
.switch-handle:before {
  content: '';
  position: absolute;
  top: 50%;
  left: 50%;
  margin: -6px 0 0 -6px;
  width: 12px;
  height: 12px;
  background: #f9f9f9;
  border-radius: 6px;
  box-shadow: inset 0 1px rgba(0, 0, 0, 0.02);
  background-image: -webkit-linear-gradient(top, #eeeeee, white);
  background-image: -moz-linear-gradient(top, #eeeeee, white);
  background-image: -o-linear-gradient(top, #eeeeee, white);
  background-image: linear-gradient(to bottom, #eeeeee, white);
}
.switch-input:checked ~ .switch-handle {
  left: 40px;
  box-shadow: -1px 1px 5px rgba(0, 0, 0, 0.2);
}

.switch {
  margin: 5px auto;
  position: relative;
}

.switch label {
  width: 100%;
  height: 100%;
  position: relative;
  display: block;
}

.switch input {
  top: 0; 
  right: 0; 
  bottom: 0; 
  left: 0;
  opacity: 0;
  z-index: 100;
  position: absolute;
  width: 100%;
  height: 100%;
  cursor: pointer;
}

.switch.demo1 {
  width: 80px;
  height: 80px;
}

.switch.demo1 label {
  border-radius: 50%;
  background: #eaeaea;
  box-shadow: 
      0 3px 5px rgba(0,0,0,0.25),
      inset 0 1px 0 rgba(255,255,255,0.3),
      inset 0 -5px 5px rgba(100,100,100,0.1),
      inset 0 5px 5px rgba(255,255,255,0.3);
}

.switch.demo1 label:after {
  content: "";
  position: absolute;
  top: -8%; right: -8%; bottom: -8%; left: -8%;
  z-index: -1;
  border-radius: inherit;
  background: #ddd;
  background: -moz-linear-gradient(#ccc, #fff);
  background: -ms-linear-gradient(#ccc, #fff);
  background: -o-linear-gradient(#ccc, #fff);
  background: -webkit-gradient(linear, 0 0, 0 100%, from(#ccc), to(#fff));
  background: -webkit-linear-gradient(#ccc, #fff);
  background: linear-gradient(#ccc, #fff);
  box-shadow: 
    inset 0 2px 1px rgba(0,0,0,0.15),
    0 2px 5px rgba(200,200,200,0.1);
}

.switch.demo1 label:before {
  content: "";
  position: absolute;
  width: 20%;
  height: 20%;
  border-radius: inherit;
  left: 40%;
  top: 40%;
  background: #969696;
  background: radial-gradient(40% 35%, #ccc, #969696 60%);
  box-shadow:
      inset 0 2px 4px 1px rgba(0,0,0,0.3),
      0 1px 0 rgba(255,255,255,1),
      inset 0 1px 0 white;
}

.switch.demo1 input:checked ~ label {
  background: #dedede;
  background: -moz-linear-gradient(#dedede, #fdfdfd);
  background: -ms-linear-gradient(#dedede, #fdfdfd);
  background: -o-linear-gradient(#dedede, #fdfdfd);
  background: -webkit-gradient(linear, 0 0, 0 100%, from(#dedede), to(#fdfdfd));
  background: -webkit-linear-gradient(#dedede, #fdfdfd);
  background: linear-gradient(#dedede, #fdfdfd);
}

.switch.demo1 input:checked ~ label:before {
  background: #25d025;
  background: radial-gradient(40% 35%, #5aef5a, #25d025 60%);
  box-shadow:
      inset 0 3px 5px 1px rgba(0,0,0,0.1),
      0 1px 0 rgba(255,255,255,0.4),
      0 0 10px 2px rgba(0, 210, 0, 0.5);
}
<?php $mar1 = is_rtl() ? '30' : '5' ; $mar2 = is_rtl() ? '10' : '0' ; $mar3 = is_rtl() ? '80' : '40' ;  ?>
@media (min-width: 959px) {
#wpcontent-benaceur-ntb {
  margin:40px 60px 40px <?php echo $mar3; ?>px;
}
}
@media (max-width: 960px) {
#wpcontent-benaceur-ntb {
  margin:40px 20px 40px <?php echo $mar1; ?>px;
}
}
@media (max-width: 330px) {
#wpcontent-benaceur-ntb {
  margin:40px 10px 40px <?php echo $mar2; ?>px;
}
}
#wpcontent-benaceur-ntb {
  padding:10px 10px 20px 10px;
  border:solid 0px #000000;
  border-radius:5px;
  box-shadow: 6px 5px 8px #000000;
  background-color:<?php echo $ntb_cust_color_back; ?>;
}
#wpcontent-benaceur-nab-top {
  background: url(https://ps.w.org/news-ticker-benaceur/assets/banner-772x250.png) no-repeat top;
  background-size: 100% 210px;
  margin: 0px auto 0;
  height:210px;
  width:100%;
}
#wpcontent-benaceur-ntb form ,#wpcontent-benaceur-ntb form  th,#wpcontent-benaceur-ntb h2,#wpcontent-benaceur-ntb h3   {
  color:<?php echo $ntb_cust_color_font; ?>;
}
#wpcontent-benaceur-ntb textarea,#wpcontent-benaceur-ntb input ,#wpcontent-benaceur-ntb select{
  color:<?php echo $ntb_cust_color_font; ?>;
  border:1px solid #999999; 
  border-radius:5px;
  background-color:<?php echo $ntb_cust_color_back_input; ?>;
}
#wpcontent-benaceur-ntb textarea {
  -moz-transition: all 0.4s ease-in-out;
  -webkit-transition: all 0.4s ease-in-out;
  -o-transition: all 0.4s ease-in-out;
  -ms-transition: all 0.4s ease-in-out;
  transition: all 0.4s ease-in-out;
}
#wpcontent-benaceur-ntb textarea:hover,#wpcontent-benaceur-ntb textarea:focus {
  background:#B3006B;
  -moz-transition: all 0.4s ease-in-out;
  -webkit-transition: all 0.4s ease-in-out;
  -o-transition: all 0.4s ease-in-out;
  -ms-transition: all 0.4s ease-in-out;
  transition: all 0.4s ease-in-out;
}
#wpcontent-benaceur-ntb textarea {width:90%;}
.sm_benaceurlist_caps_input-ntb input[type="text"]{color:#fff;font-weight:bold;width:60%;height:32px;border-radius:10px;height:30px;
    background-color: rgba(215, 40, 40, 0.9);
    background: rgba(215, 40, 40, 0.9);
}
#bt-ntbCat {margin-top:1px;margin-bottom:12px;}
.to-tr {width:60%;border:0.1em solid #999999;margin-bottom:6px;}
.to-tr2 {width:30%;border:0.1em solid #999999;margin-bottom:6px;}
.to-tr3 {width:40%;border:0.1em solid #999999;margin-bottom:6px;}

.option-box {display:inline-block; padding-left: 10px;}
.colwrap-display {display:inline-block;}
.bold-3 {margin-bottom:6px;}
.bold-4 {margin-top:8px;}
.hov-button-primary-sub a:link {color:white;text-decoration: none;} .hov-button-primary-sub a:visited {color:white;} .hov-button-primary-sub a:active,.hov-button-primary-sub a:hover {olor:white;}

.button-secondary-ntb-hid-1 {
	-moz-box-shadow: 0px 10px 14px -7px #276873;
	-webkit-box-shadow: 0px 10px 14px -7px #276873;
	box-shadow: 0px 10px 14px -7px #276873;
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #599bb3), color-stop(1, #408c99));
	background:-moz-linear-gradient(top, #599bb3 5%, #408c99 100%);
	background:-webkit-linear-gradient(top, #599bb3 5%, #408c99 100%);
	background:-o-linear-gradient(top, #599bb3 5%, #408c99 100%);
	background:-ms-linear-gradient(top, #599bb3 5%, #408c99 100%);
	background:linear-gradient(to bottom, #599bb3 5%, #408c99 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#599bb3', endColorstr='#408c99',GradientType=0);
	background-color:#599bb3;
	-moz-border-radius:8px;
	-webkit-border-radius:8px;
	border-radius:8px;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:Arial;
	font-size:20px;
	font-weight:bold;
	padding:11px 28px;
	text-decoration:none;
	text-shadow:0px 1px 0px #3d768a;
}
.button-secondary-ntb-hid-1:hover {
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #408c99), color-stop(1, #599bb3));
	background:-moz-linear-gradient(top, #408c99 5%, #599bb3 100%);
	background:-webkit-linear-gradient(top, #408c99 5%, #599bb3 100%);
	background:-o-linear-gradient(top, #408c99 5%, #599bb3 100%);
	background:-ms-linear-gradient(top, #408c99 5%, #599bb3 100%);
	background:linear-gradient(to bottom, #408c99 5%, #599bb3 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#408c99', endColorstr='#599bb3',GradientType=0);
	background-color:#408c99;
}
.button-secondary-ntb-hid-1:active {
	position:relative;
	top:1px;
}

  #sub-ntbMyplugins a:link,#sub-ntbMyplugins a:visited {color:white;}
  #sub-ntbMyplugins a:hover {color:#D4D4D4;text-decoration:none;
  -webkit-transition: all 0.5s ease-out;
  -moz-transition: all 0.5s ease-out;
  -o-transition: all 0.5s ease-out;
  transition: all 0.5s ease-out;
  }
</style>
