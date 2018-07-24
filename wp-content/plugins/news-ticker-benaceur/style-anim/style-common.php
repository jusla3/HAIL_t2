<style>
	.news-ticker-ntb {
	    <?php if (is_rtl() && $dir == 'ltr') { ?>	
		direction:ltr;
	    <?php } else if (!is_rtl() && $dir == 'rtl') { ?>
		direction:rtl;
	    <?php } ?>	
	}

	<?php if ( !in_array($ntb_st, array('TickerNTB','ScrollNTB')) ) { ?>
    .news-ticker-ntb ul {margin-top: <?php echo $ntb_padding_top; ?>px; margin-bottom: <?php echo $ntb_padding_bottom; ?>px;}
	<?php } ?>

	<?php if ($ntb_st != 'TickerNTB') { ?>
	
	<?php if (!is_rtl() && $dir != 'rtl' || is_rtl() && $dir == 'ltr') { ?>
	#next-button-ntb:before {content: "\003E";}
	#prev-button-ntb:before {content: "\003C";}
    <?php } else { ?>	
	#next-button-ntb:before {content: "\003C";}
	#prev-button-ntb:before {content: "\003E";}
    <?php } ?>	
	<?php } else { ?>
	<?php if (is_rtl() && $dir != 'ltr' || !is_rtl() && $dir == 'rtl') { ?>
	#next-button-ntb:before {content: "\003C";}
	#prev-button-ntb:before {content: "\003E";}
    <?php } else { ?>	
	#next-button-ntb:before {content: "\003E";}
	#prev-button-ntb:before {content: "\003C";}
    <?php } ?>	
	<?php } ?>
	
    #next-button-ntb, #prev-button-ntb {
	font-weight: <?php echo $ntb_PrevNext_weight;?>;
	top:<?php echo $ntb_PrevNext_top;?>px;
    font-size:<?php echo $ntb_PrevNext_font_size; ?>px;
	color:<?php echo $ntb_PrevNext_color; ?>;
	}
	.news-ticker-ntb span { font-family:<?php echo $ntb_title_font_family; ?>; }
	
	.news-ticker-ntb a { text-decoration:none; }

</style>
