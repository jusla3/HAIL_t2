<?php
if ( !function_exists( 'add_action' ) ) {
	echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
	exit;
}
function qcld_show_preview_items_fnc(){
$id = sanitize_text_field($_POST['sid']);

global $wpdb;
$query   = $wpdb->prepare( "SELECT * FROM " . QCLD_TABLE_SLIDERS . " WHERE id = '%d' ", $id );
$_slider = $wpdb->get_results( $query );
$query   = $wpdb->prepare( "SELECT * FROM " . QCLD_TABLE_SLIDES . " WHERE sliderid = '%d' ORDER BY ordering DESC", $id );
$_slide = $wpdb->get_results( $query );

	if(!function_exists('deleteSpacesNewlines')) {
		function deleteSpacesNewlines($str) {
			return preg_replace(array('/\r/', '/\n/'), '',$str);
		}
	}
	if(!$_slider) {
		echo '<h3 style="color: #FF0011;">qcld_slider '.$_id.' does not exist</h3>';
		return;
	}
	$sliderID = intval($_slider[0]->id);
	$style = json_decode($_slider[0]->style);
	$params = json_decode($_slider[0]->params);
	$customs = json_decode($_slider[0]->custom);
	$title = $_slider[0]->title;
	$bg_image_url = $_slider[0]->bg_image_url;
	$description = $params->description;
	$paramsJson = deleteSpacesNewlines($_slider[0]->params);
	$styleJson = deleteSpacesNewlines($_slider[0]->style);
	$customJson = deleteSpacesNewlines($_slider[0]->custom);
	if(!$sliderID) {
		echo '<h3 style="color: #FF0011;">qcld_slider '.$_id.' was removed</h3>';
		return;
	}


?>

	<div id="sm-modal" class="slider_hero_modal">

		<!-- Modal content -->
		<div class="modal-content" style="width: 95%;">
			<span class="close"><?php _e( "X", 'Slider Hero' ); ?></span>
			<h3><?php _e( "Preview", 'Slider Hero' ); ?></h3>
			<hr/>

<style>
#particles-js{
  max-width: 100% !important;
  height: 87vh !important;
  overflow-x: hidden;
  overflow-y: hidden;
 
<?php

if(isset($_slider[0]->bg_gradient) and strlen($_slider[0]->bg_gradient)>2){
	echo str_replace('"','',$_slider[0]->bg_gradient);
}else{
?>
  background-color: <?php echo ($params->background==''?'red':esc_attr($params->background)); ?>;
  <?php if($bg_image_url!=''): ?>
  background-image: url('<?php echo esc_url($bg_image_url); ?>') !important;
  <?php endif; ?>
<?php
}
?> 

  background-size: cover;
  background-position: 50% 50%;
  background-repeat: no-repeat;
  position:relative;
}

<?php 
if($_slider[0]->type=='intro'):
?>
#particles-js .eachAnim {
font-family: "Lato", Arial, sans-serif;
    font-weight: 300;
    font-size: 50px;
    text-align: center;
    width: 100%;
    color: #fff;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100%;
	z-index: 999;
    position: absolute;
	line-height: normal;
	background-size: cover !important;
    background-position: center center !important;
}
#particles-js canvas{
	position: absolute;
    top: 0;
}
<?php endif; ?>

#particles-js .qcld_hero_content_area{
	position:absolute;
	
	width: 100%;
	<?php 
	if(isset($params->content) && $params->content=='top'){
		echo 'top: '.(isset($params->contentspace)&&$params->contentspace!=''?esc_attr($params->contentspace):'50px').';';
	}elseif(isset($params->content) && $params->content=='bottom'){
		echo 'bottom: '.(isset($params->contentspace)&&$params->contentspace!=''?esc_attr($params->contentspace):'50px').';';
	}else{
		echo 'top:50%;';
	}
	?>
}

.qcld_hero_content_area h2{

width: 100%;
padding: 0px 46px !important;
box-sizing: border-box;
}
.qcld_hero_content_area p{

width: 100%;
padding: 0px 46px;
box-sizing: border-box;
}

.qcld_hero_content_area h2{
<?php 
if(isset($params->titlefontsize) and $params->titlefontsize!=''){
	echo 'font-size: '.esc_attr($params->titlefontsize).'px;';	
}else{
	echo 'font-size: 54px;';
}
?>
<?php 
if(isset($params->titlecolor) and $params->titlecolor!=''){
	echo 'color: '.esc_attr($params->titlecolor).';';	
}else{
	echo 'color: #fff;';
}
if(isset($params->title->align) and $params->title->align!=''){
	echo 'text-align: '.esc_attr($params->title->align).';';	
}
?>
<?php if(isset($params->contentoffset) && $params->contentoffset!=''):?>
	padding: 0px <?php echo $params->contentoffset; ?> !important;
<?php else: ?>
	padding: 0px 10% !important;
<?php endif; ?>

text-shadow: initial;
}
.hero_slider_btn{

	padding: 0px 46px;
<?php 
if(isset($params->button1->align) and $params->button1->align!=''){
	echo 'text-align: '.esc_attr($params->button1->align).';';	
}

?>
<?php if(isset($params->contentoffset) && $params->contentoffset!=''):?>
	padding: 0px <?php echo $params->contentoffset; ?> !important;
<?php else: ?>
	padding: 0px 10% !important;
<?php endif; ?>
}

.qcld_hero_content_area p{
<?php 
if(isset($params->descriptioncolor) and $params->descriptioncolor!=''){
	echo 'color: '.esc_attr($params->descriptioncolor).';';	
}else{
	echo 'color: #fff;';
}
?>

<?php 
if(isset($params->descfontsize) and $params->descfontsize!=''){
	echo 'font-size: '.esc_attr($params->descfontsize).'px;';	
	echo 'line-height: '.esc_attr($params->descfontsize).'px;';	
}else{
	echo 'font-size: 26px;';
	echo 'line-height: 26px;';
	
}
if(isset($params->description->align) and $params->description->align!=''){
	echo 'text-align: '.esc_attr($params->description->align).';';	
}
?>
<?php if(isset($params->contentoffset) && $params->contentoffset!=''):?>
	padding: 0px <?php echo $params->contentoffset; ?> !important;
<?php else: ?>
	padding: 0px 10% !important;
<?php endif; ?>
}
#particles-js .slider-x-lead-title, #particles-js .hero_slider_btn, #particles-js .slider-x-item-title{margin: 30px 0px;}

#particles-js<?php echo intval($_id); ?> .slider-x-lead-title{
<?php if(isset($params->titlebottommargin)&&$params->titlebottommargin!=''): ?>
	margin-bottom: <?php echo $params->titlebottommargin; ?>;
<?php endif; ?>	
}

#particles-js<?php echo intval($_id); ?> .slider-x-item-title{
<?php if(isset($params->descriptionbottommargin)&&$params->descriptionbottommargin!=''): ?>
	margin-bottom: <?php echo $params->descriptionbottommargin; ?>;
<?php endif; ?>	
}

#particles-js<?php echo intval($_id); ?> .hero_slider_btn{
<?php if(isset($params->buttonbottommargin)&&$params->buttonbottommargin!=''): ?>
	margin-bottom: <?php echo $params->buttonbottommargin; ?>;
<?php endif; ?>	
}

</style>

<?php 
$odarr = array(
	'title'			=> str_replace('%','',$params->title->style->top),
	'description'	=> str_replace('%','',$params->description->style->top),
	'button'		=> str_replace('%','',$params->button1->style->top)
);

asort($odarr);
?>

<div id="particles-js">

<?php foreach($_slide as $slide) : 

if($slide->published=='1') :

?>

	<?php if($_slider[0]->type=='intro'): 
			
			if($slide->stomp!=''){
				$config = json_decode(wp_unslash(htmlspecialchars_decode($slide->stomp)));
			}else{
				$config = '';
			}
	?>
		<div class="eachAnim" data-id="<?php echo $slide->ordering; ?>" data-animtype="<?php echo (isset($config->hero_stomp_animation) && $config->hero_stomp_animation!=''?$config->hero_stomp_animation:'zoomIn'); ?>" data-delay="<?php echo (isset($config->hero_stomp_delay) && $config->hero_stomp_delay!=''?$config->hero_stomp_delay:'500'); ?>" 
		data-fontsize="<?php echo (isset($config->hero_stomp_fontsize) && $config->hero_stomp_fontsize!=''?$config->hero_stomp_fontsize:''); ?>" data-fontweight="<?php echo (isset($config->hero_stomp_font_weight) && $config->hero_stomp_font_weight!=''?$config->hero_stomp_font_weight:''); ?>" data-letterspacing="<?php echo (isset($config->hero_stomp_letter_spacing) && $config->hero_stomp_letter_spacing!=''?$config->hero_stomp_letter_spacing:''); ?>" data-color="<?php echo (isset($config->hero_stomp_text_color) && $config->hero_stomp_text_color!=''?$config->hero_stomp_text_color:''); ?>" style="display:none;<?php echo (isset($slide->image_link) && $slide->image_link!=''?'background:url('.$slide->image_link.')no-repeat':''); ?>;<?php echo (isset($config->hero_stomp_background_color)&&$config->hero_stomp_background_color!=''?'background-color:'.$config->hero_stomp_background_color:''); ?>" data-fontfamily="<?php echo (isset($config->hero_intro_font_family)&&$config->hero_intro_font_family!=''?$config->hero_intro_font_family:''); ?>">
			<?php echo wp_unslash(htmlspecialchars_decode($slide->title)); ?>
		</div>
		
		
	<?php else: ?>
	
	<div class="qcld_hero_content_area">

		<?php 
		foreach($odarr as $key=>$val ){
			if($key=='title'){
			?>
				<h2 class="slider-x-lead-title"><?php echo wp_unslash( esc_js($slide->title)); ?></h2>
			<?php
			}elseif($key=='description'){
			?>
				<p class="slider-x-item-title"><?php echo wp_unslash(htmlspecialchars_decode($slide->description)); ?></p>
			<?php
			}else{
			?>
				<?php
				if($slide->btn!=''){
				$btn = json_decode(wp_unslash(htmlspecialchars_decode($slide->btn)));
				?>
						<div class="hero_slider_btn">
							<style type="text/css">

							.slider_hero_btn_cls_one{
								<?php if($btn->button_border=='square') : ?>
								border-radius: 0px;
							<?php else : ?>
								border-radius: 35px 35px;
							<?php endif ?>
							<?php if($btn->button_style=='full_background') : ?>
								background: <?php echo esc_attr($btn->button_background_color); ?>;
							<?php else: ?>
								background: none;
							<?php endif; ?>
								border: 2px solid <?php echo esc_attr($btn->button_background_color); ?> !important;
								padding: 12px 20px;
								box-sizing: content-box;
								
							<?php 
								if(isset($btn->button_font_size) && $btn->button_font_size!=''):
							?>
								font-size: <?php echo $btn->button_font_size ?> !important;
							<?php else: ?>
								font-size: 16px;
							<?php endif; ?>
							
							<?php 
								if(isset($btn->button_letter_spacing) && $btn->button_letter_spacing!=''):
							?>
								letter-spacing: <?php echo $btn->button_letter_spacing ?> !important;
							<?php endif; ?>
							
							<?php 
								if(isset($btn->button_font_weight) && $btn->button_font_weight!=''):
							?>
								font-weight: <?php echo $btn->button_font_weight ?> !important;
							<?php endif; ?>
							
							
								text-decoration: none;
								min-width:100px;
								
								color: <?php echo esc_attr($btn->button_color); ?> !important;
								margin-right: 10px;
								
								text-shadow: none;
								display: -webkit-inline-flex;
								-webkit-box-orient: vertical;
								-webkit-box-direction: normal;
								-webkit-flex-direction: column;
								-webkit-box-pack: center;
								-webkit-flex-pack: center;
								-webkit-justify-content: center;
								-webkit-flex-align: center;
								-webkit-align-items: center;
								vertical-align: middle;
							}
							.slider_hero_btn_cls_one:hover{
								<?php if($btn->button_hover_color!='') : ?>
								color:<?php echo esc_attr($btn->button_hover_color); ?>!important;
								<?php endif; ?>
								<?php if($btn->button_background_hover_color!=''): ?>
								<?php if($btn->button_style=='full_background'): ?>
								background: <?php echo esc_attr($btn->button_background_hover_color); ?>;
								<?php else: ?>
								background: none;
								<?php endif; ?>
								
								border: 2px solid <?php echo esc_attr($btn->button_background_hover_color); ?> !important;
								<?php endif; ?>
								text-shadow: none;
							}
									
							</style>
							<a href="<?php echo esc_url($btn->button_url); ?>" target="<?php echo esc_attr($btn->button_target); ?>" class="slider_hero_btn_cls_one"><?php echo esc_attr($btn->button_text); ?></a>	
						</div>

				<?php } ?>			
			<?php 
			}
		}
		?>
		


		
	</div>
	<?php endif; ?>
<?php 
endif;
endforeach;
?>
</div>
<script type="text/javascript">
function getOffset1( el ) {
    var _x = 0;
    var _y = 0;
    while( el && !isNaN( el.offsetLeft ) && !isNaN( el.offsetTop ) ) {
        _x += el.offsetLeft - el.scrollLeft;
        _y += el.offsetTop - el.scrollTop;
        el = el.offsetParent;
    }
    return { top: _y, left: _x };
}
jQuery(document).ready(function($){
	<?php if($_slider[0]->type!='intro') : ?>
    $.fn.sliderX.defaults = {
		
		sliderWidth: 800,
		sliderHeight:500,
		
		//sliderBackground:'<?php echo $params->background != ''? esc_attr($params->background):'#eb484d' ?>',
		
        pauseTime: <?php echo esc_attr($params->effect->interval); ?>,
        startSlide: 0,
		
		titlePositionTop:<?php echo esc_attr(str_replace(array('px','%'),'',$params->title->style->top)) ?>,
		
		titlePositionLeft:'0%',
		
		descPositionTop:<?php echo esc_attr(str_replace(array('px','%'),'',$params->description->style->top)) ?>,
		
		descPositionLeft:'0%',
		
		//titleTextAnimation:'pulse',
		titleTextColor:'<?php echo $params->titlecolor != ''? esc_attr($params->titlecolor):'#000' ?>',
		arrowClass: '<?php echo $params->arrow != ''? esc_attr($params->arrow):'qc-sliderX' ?>',
		descriptionTextColor:'<?php echo $params->descriptioncolor != ''? esc_attr($params->descriptioncolor):'#000' ?>',
		
		titleFontSize:'<?php echo $params->titlefontsize != ''? esc_attr($params->titlefontsize):'20' ?>',
		
		descriptionFontSize:'<?php echo $params->descfontsize != ''? esc_attr($params->descfontsize):'30' ?>',
		<?php 
		if(isset($style->screenoption) and $style->screenoption=='1'){
		?>
		fullWidth:false,
		<?php
		}else{
		?>
		fullWidth:false,
		<?php
		}
		?>
		<?php 
		if(isset($style->screenoption) and $style->screenoption=='2'){
		?>
		fullScreen:false,
		<?php
		}else{
		?>
		fullScreen:false,
		<?php
		}
		?>
		<?php 
		if(isset($style->screenoption) and $style->screenoption=='3'){
		?>
		Screenauto:false,
		<?php
		}else{
		?>
		Screenauto:false,
		<?php
		}
		?>		
		<?php 
			if(count($_slide)>1){
		?>
		directionCon:true,
		bottomCon:true,
		slideStart: true,
		<?php
			}else{
		?>
		directionCon:false,
		bottomCon:false,
		slideStart: false,
		<?php
			}
		?>
		prevSlideText:'Previous',
		nextSlideText:'Next',
		titleAnimation: '<?php echo ($params->titleffect!=''?esc_attr($params->titleffect):'normal') ?>',
		desAnimation: '<?php echo ($params->deseffect!=''?esc_attr($params->deseffect):'normal') ?>',
		contentposition: '<?php echo (isset($params->content) && $params->content!=''?$params->content:'center') ?>',
		mainId: 'particles-js',
        beforeChange: function(){
			//alert("i am changing..");
		}
    };   
        jQuery('#particles-js').sliderX();
	<?php else: ?>
		$('#particles-js').changeWords({
			time: 800,
			animate: "zoomIn",
			selector: ".eachAnim",
			mainId: 'particles-js',
			sliderWidth:<?php echo esc_attr($style->width); ?>,
			sliderHeight:<?php echo esc_attr($style->height); ?>,
			<?php 
			if(isset($style->screenoption) and $style->screenoption=='1'){
			?>
			fullWidth:true,
			<?php
			}else{
			?>
			fullWidth:false,
			<?php
			}
			?>
			<?php 
			if(isset($style->screenoption) and $style->screenoption=='2'){
			?>
			fullScreen:true,
			<?php
			}else{
			?>
			fullScreen:false,
			<?php
			}
			?>
			<?php 
			if(isset($style->screenoption) and $style->screenoption=='3'){
			?>
			Screenauto:true,
			<?php
			}else{
			?>
			Screenauto:false,
			<?php
			}
			?>
			<?php 
				if(isset($params->repeat) and $params->repeat=='0'){
				?>
				repeat: false,
				<?php
				}else{
				?>
				repeat: true,
				<?php
				}
			?>
			redirecturl: '<?php echo (isset($params->slidendredirect) && $params->slidendredirect!=''?esc_attr($params->slidendredirect):'') ?>',
			
			redirectdelay: '<?php echo (isset($params->slideredirectdelay) && $params->slideredirectdelay!=''?esc_attr($params->slideredirectdelay):'') ?>',
			
			loadnewslider: '<?php echo (isset($params->newsliderafterend) && $params->newsliderafterend!=''?$params->newsliderafterend:0); ?>'
			
		  });
	<?php endif; ?>

<?php if($_slider[0]->type=='particle') : ?>
particlesJS("particles-js", {
  "particles": {
    "number": {
      "value": 80,
      "density": {
        "enable": true,
        "value_area": 800
      }
    },
    "color": {
      "value": "#ffffff"
    },
    "shape": {
      "type": "circle",
      "stroke": {
        "width": 0,
        "color": "#000000"
      },
      "polygon": {
        "nb_sides": 5
      },
      "image": {
        "src": "img/github.svg",
        "width": 100,
        "height": 100
      }
    },
    "opacity": {
      "value": 0.5,
      "random": false,
      "anim": {
        "enable": false,
        "speed": 1,
        "opacity_min": 0.1,
        "sync": false
      }
    },
    "size": {
      "value": 3,
      "random": true,
      "anim": {
        "enable": false,
        "speed": 40,
        "size_min": 0.1,
        "sync": false
      }
    },
    "line_linked": {
      "enable": true,
      "distance": 150,
      "color": "#ffffff",
      "opacity": 0.4,
      "width": 1
    },
    "move": {
      "enable": true,
      "speed": 6,
      "direction": "none",
      "random": false,
      "straight": false,
      "out_mode": "out",
      "bounce": false,
      "attract": {
        "enable": false,
        "rotateX": 600,
        "rotateY": 1200
      }
    }
  },
  "interactivity": {
    "detect_on": "canvas",
    "events": {
      "onhover": {
        "enable": true,
        "mode": "repulse"
      },
      "onclick": {
        "enable": true,
        "mode": "push"
      },
      "resize": true
    },
    "modes": {
      "grab": {
        "distance": 400,
        "line_linked": {
          "opacity": 1
        }
      },
      "bubble": {
        "distance": 400,
        "size": 40,
        "duration": 2,
        "opacity": 8,
        "speed": 3
      },
      "repulse": {
        "distance": 200,
        "duration": 0.4
      },
      "push": {
        "particles_nb": 4
      },
      "remove": {
        "particles_nb": 2
      }
    }
  },
  "retina_detect": true
});
<?php elseif($_slider[0]->type=='particle_snow') : ?>
particlesJS("particles-js", {
  "particles": {
    "number": {
      "value": 400,
      "density": {
        "enable": true,
        "value_area": 800
      }
    },
    "color": {
      "value": "#fff"
    },
    "shape": {
      "type": "circle",
      "stroke": {
        "width": 0,
        "color": "#000000"
      },
      "polygon": {
        "nb_sides": 5
      },
      "image": {
        "src": "img/github.svg",
        "width": 100,
        "height": 100
      }
    },
    "opacity": {
      "value": 0.5,
      "random": true,
      "anim": {
        "enable": false,
        "speed": 1,
        "opacity_min": 0.1,
        "sync": false
      }
    },
    "size": {
      "value": 10,
      "random": true,
      "anim": {
        "enable": false,
        "speed": 40,
        "size_min": 0.1,
        "sync": false
      }
    },
    "line_linked": {
      "enable": false,
      "distance": 500,
      "color": "#ffffff",
      "opacity": 0.4,
      "width": 2
    },
    "move": {
      "enable": true,
      "speed": 6,
      "direction": "bottom",
      "random": false,
      "straight": false,
      "out_mode": "out",
      "bounce": false,
      "attract": {
        "enable": false,
        "rotateX": 600,
        "rotateY": 1200
      }
    }
  },
  "interactivity": {
    "detect_on": "canvas",
    "events": {
      "onhover": {
        "enable": true,
        "mode": "bubble"
      },
      "onclick": {
        "enable": true,
        "mode": "repulse"
      },
      "resize": true
    },
    "modes": {
      "grab": {
        "distance": 400,
        "line_linked": {
          "opacity": 0.5
        }
      },
      "bubble": {
        "distance": 400,
        "size": 4,
        "duration": 0.3,
        "opacity": 1,
        "speed": 3
      },
      "repulse": {
        "distance": 200,
        "duration": 0.4
      },
      "push": {
        "particles_nb": 4
      },
      "remove": {
        "particles_nb": 2
      }
    }
  },
  "retina_detect": true
});
<?php elseif($_slider[0]->type=='particle_nasa') : ?>
particlesJS("particles-js", {
  "particles": {
    "number": {
      "value": 160,
      "density": {
        "enable": true,
        "value_area": 800
      }
    },
    "color": {
      "value": "#ffffff"
    },
    "shape": {
      "type": "circle",
      "stroke": {
        "width": 0,
        "color": "#000000"
      },
      "polygon": {
        "nb_sides": 5
      },
      "image": {
        "src": "img/github.svg",
        "width": 100,
        "height": 100
      }
    },
    "opacity": {
      "value": 1,
      "random": true,
      "anim": {
        "enable": true,
        "speed": 1,
        "opacity_min": 0,
        "sync": false
      }
    },
    "size": {
      "value": 3,
      "random": true,
      "anim": {
        "enable": false,
        "speed": 4,
        "size_min": 0.3,
        "sync": false
      }
    },
    "line_linked": {
      "enable": false,
      "distance": 150,
      "color": "#ffffff",
      "opacity": 0.4,
      "width": 1
    },
    "move": {
      "enable": true,
      "speed": 1,
      "direction": "none",
      "random": true,
      "straight": false,
      "out_mode": "out",
      "bounce": false,
      "attract": {
        "enable": false,
        "rotateX": 600,
        "rotateY": 600
      }
    }
  },
  "interactivity": {
    "detect_on": "canvas",
    "events": {
      "onhover": {
        "enable": true,
        "mode": "bubble"
      },
      "onclick": {
        "enable": true,
        "mode": "repulse"
      },
      "resize": true
    },
    "modes": {
      "grab": {
        "distance": 400,
        "line_linked": {
          "opacity": 1
        }
      },
      "bubble": {
        "distance": 250,
        "size": 0,
        "duration": 2,
        "opacity": 0,
        "speed": 3
      },
      "repulse": {
        "distance": 400,
        "duration": 0.4
      },
      "push": {
        "particles_nb": 4
      },
      "remove": {
        "particles_nb": 2
      }
    }
  },
  "retina_detect": true
});
<?php elseif($_slider[0]->type=='particle_bubble') : ?>
particlesJS("particles-js", {
  "particles": {
    "number": {
      "value": 6,
      "density": {
        "enable": true,
        "value_area": 800
      }
    },
    "color": {
      "value": "#1b1e34"
    },
    "shape": {
      "type": "polygon",
      "stroke": {
        "width": 0,
        "color": "#000"
      },
      "polygon": {
        "nb_sides": 6
      },
      "image": {
        "src": "img/github.svg",
        "width": 100,
        "height": 100
      }
    },
    "opacity": {
      "value": 0.3,
      "random": true,
      "anim": {
        "enable": false,
        "speed": 1,
        "opacity_min": 0.1,
        "sync": false
      }
    },
    "size": {
      "value": 160,
      "random": false,
      "anim": {
        "enable": true,
        "speed": 10,
        "size_min": 40,
        "sync": false
      }
    },
    "line_linked": {
      "enable": false,
      "distance": 200,
      "color": "#ffffff",
      "opacity": 1,
      "width": 2
    },
    "move": {
      "enable": true,
      "speed": 8,
      "direction": "none",
      "random": false,
      "straight": false,
      "out_mode": "out",
      "bounce": false,
      "attract": {
        "enable": false,
        "rotateX": 600,
        "rotateY": 1200
      }
    }
  },
  "interactivity": {
    "detect_on": "canvas",
    "events": {
      "onhover": {
        "enable": false,
        "mode": "grab"
      },
      "onclick": {
        "enable": false,
        "mode": "push"
      },
      "resize": true
    },
    "modes": {
      "grab": {
        "distance": 400,
        "line_linked": {
          "opacity": 1
        }
      },
      "bubble": {
        "distance": 400,
        "size": 40,
        "duration": 2,
        "opacity": 8,
        "speed": 3
      },
      "repulse": {
        "distance": 200,
        "duration": 0.4
      },
      "push": {
        "particles_nb": 4
      },
      "remove": {
        "particles_nb": 2
      }
    }
  },
  "retina_detect": true
});
<?php elseif($_slider[0]->type=='nyan_cat') : ?>
particlesJS("particles-js", {
  "particles": {
    "number": {
      "value": 100,
      "density": {
        "enable": false,
        "value_area": 800
      }
    },
    "color": {
      "value": "#ffffff"
    },
    "shape": {
      "type": "star",
      "stroke": {
        "width": 0,
        "color": "#000000"
      },
      "polygon": {
        "nb_sides": 5
      },
      "image": {
        "src": "http://wiki.lexisnexis.com/academic/images/f/fb/Itunes_podcast_icon_300.jpg",
        "width": 100,
        "height": 100
      }
    },
    "opacity": {
      "value": 0.5,
      "random": false,
      "anim": {
        "enable": false,
        "speed": 1,
        "opacity_min": 0.1,
        "sync": false
      }
    },
    "size": {
      "value": 4,
      "random": true,
      "anim": {
        "enable": false,
        "speed": 40,
        "size_min": 0.1,
        "sync": false
      }
    },
    "line_linked": {
      "enable": false,
      "distance": 150,
      "color": "#ffffff",
      "opacity": 0.4,
      "width": 1
    },
    "move": {
      "enable": true,
      "speed": 14,
      "direction": "left",
      "random": false,
      "straight": true,
      "out_mode": "out",
      "bounce": false,
      "attract": {
        "enable": false,
        "rotateX": 600,
        "rotateY": 1200
      }
    }
  },
  "interactivity": {
    "detect_on": "canvas",
    "events": {
      "onhover": {
        "enable": false,
        "mode": "grab"
      },
      "onclick": {
        "enable": true,
        "mode": "repulse"
      },
      "resize": true
    },
    "modes": {
      "grab": {
        "distance": 200,
        "line_linked": {
          "opacity": 1
        }
      },
      "bubble": {
        "distance": 400,
        "size": 40,
        "duration": 2,
        "opacity": 8,
        "speed": 3
      },
      "repulse": {
        "distance": 200,
        "duration": 0.4
      },
      "push": {
        "particles_nb": 4
      },
      "remove": {
        "particles_nb": 2
      }
    }
  },
  "retina_detect": true
});
<?php endif ?>

});
var mainId = '<?php echo "particles-js"; ?>';
</script>
<?php if($_slider[0]->type=='torus') : //torus Script ?>
	<script src="<?php echo QCLD_sliderhero_js . "/torus.js?time=".time(); ?>" type="text/javascript"></script>
<?php endif; ?>



<!--End of Scripting Area for Preview-->
		</div>
	</div>
	
<?php
exit;
}
add_action( 'wp_ajax_qcld_show_preview_items', 'qcld_show_preview_items_fnc');
?>