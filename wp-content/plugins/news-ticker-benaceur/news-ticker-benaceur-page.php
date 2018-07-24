<?php 

function news_ticker_benaceur_post() {
	require_once ('includes/news-ticker-benaceur-panel-var.php');
// L comments	
$args_comms = array(
    'status' => $ntb_comment_status,
	'number' => $ntb_num_posts,
	'post__in' => ( $ntb_include_exclude_id == 'include_id' ) ? $ntb_cat : '',
	'post__not_in' => ( $ntb_include_exclude_id == 'exclude_id' ) ? $ntb_cat : '',
	'post_type' => $ntb_post_type,
);
$comments_list = get_comments($args_comms);
// L comments	
	if ($ntb_st != 'ScrollNTB') {
	?>
			 <div class="news-ticker-ntb">
		 <?php if (!$ntb_disable_title && $ntb_st != 'TickerNTB') {	?>	 
		 <span><?php if (!empty($ntb_title_ltr) && !is_rtl()) { echo $ntb_title_ltr; } elseif (!empty($ntb_title_rtl) && is_rtl()) { echo $ntb_title_rtl; } else { if (!is_rtl()) { echo 'Latest news'; } else { echo 'آخر الأخبار'; } } ?></span>
		 <?php } ?>
	<?php
	}
// 
$catID_b = explode( ',', $ntb_cat );
foreach ($catID_b as &$value){
    $value = '-' . trim($value);
}
$ntb_cat_excl = implode(',', $catID_b);
// 	
     if ($ntb_cat_tax == 'category') {
	 $lp = array(
			'post_type' => $ntb_post_type,
			'posts_per_page' => $ntb_num_posts,
			'cat'  => ( $ntb_include_exclude_id == 'include_id' ) ? $ntb_cat : $ntb_cat_excl,
			'order' => 'DESC',
			'post_status' => $ntb_post_status
				);
	 } else {
	 $catID_tax = array_map('trim', explode(',', $ntb_cat));
	 $lp = array(
			'post_type' => $ntb_post_type,
			'posts_per_page' => $ntb_num_posts,
			'tax_query' => array(
		    array(
			'taxonomy' => $ntb_cat_tax,
			'field' => 'id',
			'terms' => $catID_tax
		    )
	        ),
			'order' => 'DESC',
			'post_status' => $ntb_post_status
				);
	 }	 
				
			if ($ntb_st == 'ScrollNTB') {
			include_once ('style-anim/scrollntb.php');
            } elseif ($ntb_st == 'Scroll_Up_NTB') {
			include_once ('style-anim/no-scrollntb-scroll_up.php');
			} elseif ($ntb_st == 'fadein') {
			include_once ('style-anim/no-scrollntb-fadeIn.php');
			} elseif ($ntb_st == 'TickerNTB') {
			if ($ntb_enable_style_mobile) {	
			include_once ('style-anim/no-scrollntb-Ti-t2.php');
			} else {
			include_once ('style-anim/no-scrollntb-Ti.php');
			}
            } elseif ($ntb_st == 'typing_2') {
			include_once ('style-anim/no-scrollntb-two-typ_2.php');	
			} else {
			include_once ('style-anim/no-scrollntb-two.php');	
			}
			
			include_once ('style-anim/style-common.php');	
}	
add_action( 'wp_news_ticker_benaceur', 'news_ticker_benaceur_post' );

if ( !get_option( 'news_ticker_benaceur_disable_this_font' ) )  { ?>
<style>
@font-face {
  font-family: 'DroidKufi_Ben';
  src: url(<?php echo '' . plugins_url( 'font/DroidKufi-Regular.eot' , __FILE__ ) . ''; ?>);
  src: url(<?php echo '' . plugins_url( 'font/DroidKufi-Regular.eot' , __FILE__ ) . ''; ?>?#iefix) format("embedded-opentype"),
       url(<?php echo '' . plugins_url( 'font/droidkufi-regular.ttf' , __FILE__ ) . ''; ?>) format("truetype");
}
</style>
<?php }
