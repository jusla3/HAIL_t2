<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit

function qcld_sliderhero_edit_slider_view( $_row, $_id, $_slider ) {
    function qcldsliderherodeleteSpacesNewlines( $str ) {
        return preg_replace( array( '/\r/', '/\n/' ), '', $str );
    }

    $style   = json_decode( $_slider[0]->style );
    $params  = json_decode( $_slider[0]->params );
    $customs = json_decode( ( $_slider[0]->custom ) );

	
    $paramsJson = qcldsliderherodeleteSpacesNewlines( $_slider[0]->params );
    $styleJson  = qcldsliderherodeleteSpacesNewlines( $_slider[0]->style );
    $customJson = qcldsliderherodeleteSpacesNewlines( $_slider[0]->custom );

    $count = 0;
    foreach ( $_row as $slide ) {
        if ( $slide->published == 0 ) {
            continue;
        }
        $count ++;
    }; 
	//print_r($_slider[0]->bg_gradient);exit;

	?>
    <script>
        

        // initialize slider values in slider admin page
        var qcheror = {
            id: '<?php echo $_id;?>',
            name: '<?php echo $_slider[0]->title;?>',
            params: JSON.parse('<?php echo $paramsJson;?>'),
            style: JSON.parse('<?php echo $styleJson;?>'),
            custom: JSON.parse('<?php echo $customJson;?>'),
            count: parseInt('<?php echo $count;?>'),
			deleteslide: '',
            length: 0,

            slides: {}
        };
        <?php
        $Slidecount = 0;
        foreach ($_row as $row) {
        $Slidecount ++;
        $customSlideJson = qcldsliderherodeleteSpacesNewlines( $row->custom );
        $image_link = esc_js( html_entity_decode( $row->image_link, ENT_COMPAT, 'UTF-8' ) );
        $description = esc_js( html_entity_decode( $row->description, ENT_COMPAT, 'UTF-8' ) );
        $title = esc_js( html_entity_decode( $row->title, ENT_COMPAT, 'UTF-8' ) );
        ?>
        // initialize slider's slides's values in slider admin page
        qcheror['slides']['slide' + '<?php echo $row->id;?>'] = {};
        qcheror['slides']['slide' + '<?php echo $row->id;?>']['id'] = '<?php echo $row->id;?>';
        qcheror.slides['slide' + '<?php echo $row->id;?>']['title'] = '<?php echo $title;?>';
        qcheror.slides['slide' + '<?php echo $row->id;?>']['description'] = '<?php echo $description;?>';
        qcheror.slides['slide' + '<?php echo $row->id;?>']['image_link'] = '<?php echo $image_link;?>';
        qcheror.slides['slide' + '<?php echo $row->id;?>']['url'] = '<?php echo $row->thumbnail;?>';
        qcheror.slides['slide' + '<?php echo $row->id;?>']['type'] = '<?php echo $row->type;?>';
        qcheror.slides['slide' + '<?php echo $row->id;?>']['published'] = +'<?php echo $row->published;?>';
        qcheror.slides['slide' + '<?php echo $row->id;?>']['ordering'] = +'<?php echo $row->ordering;?>';
        qcheror.slides['slide' + '<?php echo $row->id;?>']['custom'] = JSON.parse('<?php echo $customSlideJson;?>');
        <?php
        }?>
        qcheror.length = +'<?php echo $Slidecount;?>';
    </script>
		<style>
			<?php if($_slider[0]->type=='intro'): ?>
				.mce-container, .qcheroitem-edit-description{display:none !important;}
				.hero_slide_inputs{display:none !important;}
				.qcheroitem-add-btn1{display:none !important;}
				.qcheroitem-btn2-sw{display:none !important;}
			<?php else: ?>
				.qcheroitem-stomp-config{display:none !important;}
				.hero_configuration_info{display:none;}
			<?php endif; ?>
		</style>	
		
    <div class="qchero_slider_view_wrapper">
        <div id="qchero_slider_view">
            <div class="add_slide_container">
                <a id="add_image"><span><?php _e( 'Add Slide', 'qchero' ); ?></span><span><i style="color:#000" class="fa fa-plus"
                                                                 aria-hidden="true"></i></span></a>
            </div>

            <div class="qchero_slider_images_list_wrapper">
                <ul id="qchero_slider_images_list">
                    <?php if ( ! count( $_row ) ) {
                        ; ?>
                        <li class="noimage">
							<span class="noimage-add" href="#">No Slides!</span>
                        </li>
                        <?php
                    }
                    foreach ( $_row as $rows ) {
                        switch ( $rows->type ) {

                            default: ?>
                                <li id="qcheroitem_<?php echo $rows->id; ?>" class="qcheroitem">
                                    <div class="qcheroitem-img-container">
										<div class="qcheroitem-image">
											<div class="slide_image_container">
											<?php if(isset($rows->image_link) and $rows->image_link!=''): ?>
												<img src="<?php echo $rows->image_link; ?>" />
												<span class="qchero_slide_image_remove" data-slide-id="<?php echo $rows->id; ?>" title="Remove image">X</span>
											<?php else: ?>
												<button class="qchero_slide_image_upload" data-slide-id="<?php echo $rows->id; ?>">Upload Image</button>
											<?php endif; ?>
											</div>
										</div>
										
										<div class="slider-hero-slide-number">
											<span class="slide-number-title">Slide</span>
											<span class="slide-order-number"><?php echo esc_attr($rows->ordering); ?></span>
										</div>
										
                                        <div class="qcheroitem-properties">
                                            <b><a href="#" class="quick_edit"
                                                  data-slide-id="<?php echo esc_attr($rows->id); ?>"><i
                                                        class="fa fa-compress" aria-hidden="true"></i><span>Collapse</span></a></b>
                                            </a>
                                            <b><a href="#" class="qchero_remove_image"
                                                  data-slide-id="<?php echo esc_attr($rows->id); ?>"><i class="fa fa-remove"
                                                                                              aria-hidden="true"></i><span>Remove</span></a></b>
                                            <b><label href="#" class="qchero_on_off_image"><input style="margin-top: 0px;"
                                                        data-slide-id="<?php echo $rows->id; ?>"
                                                        class="slide-checkbox" <?php if ( $rows->published == 1 ) {
                                                        echo 'checked  value="1"';
														}else{echo 'value="0"';} ?>
                                                        type="checkbox"/><span><span style="margin-top: 2px;">Published</span></label></b>
											<b style="margin-right:0px;cursor:move"><i class="fa fa-arrows" aria-hidden="true"></i><span>Move</span></b>
                                        </div>
                                        <form class="qchero-nodisplay">
                                            <input type="text" class="qcheroitem-edit-title"
                                                   value="<?php echo wp_unslash( $rows->title ); ?>">
                                            <textarea
                                                class="qcheroitem-edit-description" placeholder="Subtitle"><?php echo ($rows->description==''?'':qchero_text_sanitize( $rows->description )); ?></textarea>
												
											<div class="hero_configuration_info">
												<?php 
													$config = json_decode(wp_unslash(htmlspecialchars_decode($rows->stomp)));
												?>
												<?php if(isset($config->hero_stomp_animation) && $config->hero_stomp_animation!=''): ?>
												<div class="hero_config_item">
													<p><span>Animation: </span><?php echo $config->hero_stomp_animation; ?></p>
												</div>
												<?php endif; ?>
												<?php if(isset($config->hero_stomp_delay) && $config->hero_stomp_delay!=''): 
												$delay_time = $delay_time+$config->hero_stomp_delay;
												?>
												<div class="hero_config_item">
													<p><span>Delay: </span><?php echo $config->hero_stomp_delay; ?></p>
												</div>
												<?php endif; ?>
												
												<?php if(isset($config->hero_stomp_fontsize) && $config->hero_stomp_fontsize!=''): ?>
												<div class="hero_config_item">
													<p><span>Font Size: </span><?php echo $config->hero_stomp_fontsize; ?></p>
												</div>
												<?php endif; ?>
												
												<?php if(isset($config->hero_stomp_text_color) && $config->hero_stomp_text_color!=''): ?>
												<div class="hero_config_item">
													<p style="color:<?php echo $config->hero_stomp_text_color; ?>"><span>Font</span></p>
												</div>
												<?php endif; ?>
												
												<?php if(isset($config->hero_stomp_background_color) && $config->hero_stomp_background_color!=''): ?>
												<div class="hero_config_item">
													<p style="color:<?php echo $config->hero_stomp_background_color; ?>"><span>Background</span></p>
												</div>
												<?php endif; ?>
												
												
											</div>	
											
											<input type="hidden" class="qcheroitem-add-btn"
                                                   value="<?php echo wp_unslash( esc_js($rows->btn) ); ?>" placeholder="Add Button">
											<input type="button" class="qcheroitem-add-btn1" style="width: 99%;border: 0px solid #ddd;" value="<?php echo (isset($rows->btn)&&strlen($rows->btn)>10)?'Edit Button':'Add A Button';?>" />  
											<input type="hidden" class="qcheroitem-add-url" value="<?php echo esc_attr($rows->image_link); ?>">
											<input type="button" data-ordering="<?php echo $rows->ordering; ?>" class="qcheroitem-stomp-config" style="width: 99%;border: 1px solid #ddd;" value="<?php echo (isset($rows->stomp)&&strlen($rows->stomp)>10)?'Edit Configuration':'Add Configuration';?>" />
											
											<input type="hidden" class="qcheroitem-stomp-value"
                                                   value="<?php echo wp_unslash( esc_js($rows->stomp) ); ?>" />
                                            <input type="hidden" class="qcheroitem-ordering"
                                                   value="<?php echo esc_attr($rows->ordering); ?>">
                                        </form>
										</div>
                                </li>
                                <?php
                        }
                    } ?>
                </ul>
                <button id="save_slider">Save Slide Changes</button>
            
			</div>
        </div>
        
		
        <div id="qchero_slider_edit">
		
			<div class="sliderhero_menu_title effect_title" style="margin-left: 1.5%;margin-bottom: 10px;width: 95.3%;margin-top: 7px;">
				<h2 style="font-size: 26px;text-align:left;"><?php 
					if($_slider[0]->type=='torus'){
						echo 'Torus of Cubes';
					}elseif($_slider[0]->type=='no_effect'){
						echo 'No Effect';
					}elseif($_slider[0]->type=='particle'){
						echo 'Particle Effect';
					}elseif($_slider[0]->type=='particle_snow'){
						echo 'Snow Effect';
					}elseif($_slider[0]->type=='particle_nasa'){
						echo 'NASA';
					}elseif($_slider[0]->type=='particle_bubble'){
						echo 'Bubble';
					}elseif($_slider[0]->type=='nyan_cat'){
						echo 'Nyan Cat';
					}elseif($_slider[0]->type=='intro'){
						echo 'Intro Builder';
					}
				?>
				</h2>
				<div class="right_form_effect">
					
						<select name="effect" id="effect" style="display: inline-block;">
							<option value="no_effect" <?php echo (isset($_slider[0]->type)&&$_slider[0]->type=='no_effect'?'selected="selected"':''); ?> disabled>No Effect</option>
							<option value="intro" <?php echo (isset($_slider[0]->type)&&$_slider[0]->type=='intro'?'selected="selected"':''); ?> disabled>Intro Builder</option>
							<option value="aeronautics" <?php echo (isset($_slider[0]->type)&&$_slider[0]->type=='aeronautics'?'selected="selected"':''); ?> disabled>Aeronautics Effect</option>
							
							<option value="antigravity" <?php echo (isset($_slider[0]->type)&&$_slider[0]->type=='antigravity'?'selected="selected"':''); ?> disabled>Antigravity Effect</option>
							
							<option value="ballsgravity" <?php echo (isset($_slider[0]->type)&&$_slider[0]->type=='ballsgravity'?'selected="selected"':''); ?> disabled>Balls & Gravity Effect</option>
							<option value="bird" <?php echo (isset($_slider[0]->type)&&$_slider[0]->type=='bird'?'selected="selected"':''); ?> disabled>Bird Flying Effect</option>
							<option value="blade" <?php echo (isset($_slider[0]->type)&&$_slider[0]->type=='blade'?'selected="selected"':''); ?> disabled>Blade Effect</option>
							
							<option value="blob" <?php echo (isset($_slider[0]->type)&&$_slider[0]->type=='blob'?'selected="selected"':''); ?> disabled>Blob Effect</option>
							
							<option value="blur" <?php echo (isset($_slider[0]->type)&&$_slider[0]->type=='blur'?'selected="selected"':''); ?> disabled>Blur Effect</option>
							
							
							<option value="campfire" <?php echo (isset($_slider[0]->type)&&$_slider[0]->type=='campfire'?'selected="selected"':''); ?> disabled>Campfire</option>
							
							<option value="circle" <?php echo (isset($_slider[0]->type)&&$_slider[0]->type=='circle'?'selected="selected"':''); ?> disabled>Circle Effect</option>
							
							<option value="confetti" <?php echo (isset($_slider[0]->type)&&$_slider[0]->type=='confetti'?'selected="selected"':''); ?> disabled>Confetti Effect</option>
							<option value="cloudysky" <?php echo (isset($_slider[0]->type)&&$_slider[0]->type=='cloudysky'?'selected="selected"':''); ?> disabled>Cloudy Sky Effect</option>
							<option value="cosmic_web" <?php echo (isset($_slider[0]->type)&&$_slider[0]->type=='cosmic_web'?'selected="selected"':''); ?> disabled>Cosmic Web Effect</option>
							<option value="colorful_particle" <?php echo (isset($_slider[0]->type)&&$_slider[0]->type=='colorful_particle'?'selected="selected"':''); ?> disabled>Colorful Particle</option>
							<option value="cursorandpaint" <?php echo (isset($_slider[0]->type)&&$_slider[0]->type=='cursorandpaint'?'selected="selected"':''); ?> disabled>Cursor And Paint Effect</option>
							
							
							
							
							<option value="daynight" <?php echo (isset($_slider[0]->type)&&$_slider[0]->type=='daynight'?'selected="selected"':''); ?> disabled>Day Night Effect</option>
							<option value="division" <?php echo (isset($_slider[0]->type)&&$_slider[0]->type=='division'?'selected="selected"':''); ?> disabled>Division Effect</option>
							<option value="directional" <?php echo (isset($_slider[0]->type)&&$_slider[0]->type=='directional'?'selected="selected"':''); ?> disabled>Directional Effect</option>
							<option value="distance" <?php echo (isset($_slider[0]->type)&&$_slider[0]->type=='distance'?'selected="selected"':''); ?> disabled>Distance Effect</option>
							
							
							<option value="electric_clock" <?php echo (isset($_slider[0]->type)&&$_slider[0]->type=='electric_clock'?'selected="selected"':''); ?> disabled>Electric Clock</option>
							
							
							<option value="flowingcircle" <?php echo (isset($_slider[0]->type)&&$_slider[0]->type=='flowingcircle'?'selected="selected"':''); ?> disabled>Flowing Circle Effect</option>
							
							<option value="fizzy_sparks" <?php echo (isset($_slider[0]->type)&&$_slider[0]->type=='fizzy_sparks'?'selected="selected"':''); ?> disabled>Fizzy Sparks</option>
							
							<option value="firework" <?php echo (isset($_slider[0]->type)&&$_slider[0]->type=='firework'?'selected="selected"':''); ?> disabled>Firework</option>
							
							<option value="floatrain" <?php echo (isset($_slider[0]->type)&&$_slider[0]->type=='floatrain'?'selected="selected"':''); ?> disabled>Float Rain Effect</option>
							<option value="floatingleafs" <?php echo (isset($_slider[0]->type)&&$_slider[0]->type=='floatingleafs'?'selected="selected"':''); ?> disabled>Floating Leafs Effect</option>
							<option value="flyingrocket" <?php echo (isset($_slider[0]->type)&&$_slider[0]->type=='flyingrocket'?'selected="selected"':''); ?> disabled>Flying Rocket Effect</option>
							
							<option value="grid" <?php echo (isset($_slider[0]->type)&&$_slider[0]->type=='grid'?'selected="selected"':''); ?> disabled>Grid Effect</option>

							
							
							<option value="chaos" <?php echo (isset($_slider[0]->type)&&$_slider[0]->type=='chaos'?'selected="selected"':''); ?> disabled>Helix Chaos</option>
							
							<option value="corruption" <?php echo (isset($_slider[0]->type)&&$_slider[0]->type=='corruption'?'selected="selected"':''); ?> disabled>Helix Corruption Effect</option>
							
							<option value="helix_multiple" <?php echo (isset($_slider[0]->type)&&$_slider[0]->type=='helix_multiple'?'selected="selected"':''); ?> disabled>Helix Multiple Effect</option>
							
							<option value="hero_404" <?php echo (isset($_slider[0]->type)&&$_slider[0]->type=='hero_404'?'selected="selected"':''); ?> disabled>Glitch</option>
							
							<option value="iconsahedron" <?php echo (isset($_slider[0]->type)&&$_slider[0]->type=='iconsahedron'?'selected="selected"':''); ?> disabled>Iconsahedron Effect</option>
							
							<option value="just_cloud" <?php echo (isset($_slider[0]->type)&&$_slider[0]->type=='just_cloud'?'selected="selected"':''); ?> disabled>Just Cloud</option>
							
							<option value="line" <?php echo (isset($_slider[0]->type)&&$_slider[0]->type=='line'?'selected="selected"':''); ?> disabled>Line Effect</option>
							
							<option value="liquid_landscape" <?php echo (isset($_slider[0]->type)&&$_slider[0]->type=='liquid_landscape'?'selected="selected"':''); ?> disabled>Liquid Landscape</option>
							
							<option value="link_particle" <?php echo (isset($_slider[0]->type)&&$_slider[0]->type=='link_particle'?'selected="selected"':''); ?> disabled>Link Particle</option>
							
							<option value="matrix" <?php echo (isset($_slider[0]->type)&&$_slider[0]->type=='matrix'?'selected="selected"':''); ?> disabled>Matrix Effect</option>
							<option value="metaballs" <?php echo (isset($_slider[0]->type)&&$_slider[0]->type=='metaballs'?'selected="selected"':''); ?> disabled>Metaballs Effect</option>
							<option value="microcosm" <?php echo (isset($_slider[0]->type)&&$_slider[0]->type=='microcosm'?'selected="selected"':''); ?> disabled>Microcosm Effect</option>
							<option value="svg_animation" <?php echo (isset($_slider[0]->type)&&$_slider[0]->type=='svg_animation'?'selected="selected"':''); ?> disabled>Moving Color Wave</option>
							
							<option value="nyan_cat" <?php echo (isset($_slider[0]->type)&&$_slider[0]->type=='nyan_cat'?'selected="selected"':''); ?> disabled>Nyan Cat Effect</option>
							<option value="neno_hexagon" <?php echo (isset($_slider[0]->type)&&$_slider[0]->type=='neno_hexagon'?'selected="selected"':''); ?> disabled>Neno Hexagon Effect</option>
							<option value="noise_effect" <?php echo (isset($_slider[0]->type)&&$_slider[0]->type=='noise_effect'?'selected="selected"':''); ?> disabled>Noise Effect</option>
							
							<option value="orbital" <?php echo (isset($_slider[0]->type)&&$_slider[0]->type=='orbital'?'selected="selected"':''); ?> disabled>Orbital Effect</option>
							
							<option value="particle" <?php echo (isset($_slider[0]->type)&&$_slider[0]->type=='particle'?'selected="selected"':''); ?> disabled>Particle Effect</option>
							<option value="particle_system" <?php echo (isset($_slider[0]->type)&&$_slider[0]->type=='particle_system'?'selected="selected"':''); ?> disabled>Particle System</option>
							
							<option value="particle_snow" <?php echo (isset($_slider[0]->type)&&$_slider[0]->type=='particle_nasa'?'selected="selected"':''); ?> disabled>Particle Nasa Effect</option>
							<option value="particle_snow" <?php echo (isset($_slider[0]->type)&&$_slider[0]->type=='particle_snow'?'selected="selected"':''); ?> disabled>Particle Snow Effect</option>
							<option value="particle_bubble" <?php echo (isset($_slider[0]->type)&&$_slider[0]->type=='particle_bubble'?'selected="selected"':''); ?> disabled>Particle bubble Effect</option>
							<option value="helix" <?php echo (isset($_slider[0]->type)&&$_slider[0]->type=='helix'?'selected="selected"':''); ?> disabled>Particle Helix Effect</option>
							<option value="physics_bug" <?php echo (isset($_slider[0]->type)&&$_slider[0]->type=='physics_bug'?'selected="selected"':''); ?> disabled>Physics Bug Effect</option>
							
							<option value="play_or_work" <?php echo (isset($_slider[0]->type)&&$_slider[0]->type=='play_or_work'?'selected="selected"':''); ?> disabled>Play or Work?</option>
							
							<option value="pretend_hacker" <?php echo (isset($_slider[0]->type)&&$_slider[0]->type=='pretend_hacker'?'selected="selected"':''); ?> disabled>Hacker</option>
							
							
							<option value="racing_particles" <?php echo (isset($_slider[0]->type)&&$_slider[0]->type=='racing_particles'?'selected="selected"':''); ?> disabled>Racing Particles</option>
							
							<option value="rain" <?php echo (isset($_slider[0]->type)&&$_slider[0]->type=='rain'?'selected="selected"':''); ?> disabled>Rain Effect</option>
							<option value="rainy_season" <?php echo (isset($_slider[0]->type)&&$_slider[0]->type=='rainy_season'?'selected="selected"':''); ?> disabled>Rainy Season</option>
							
							<option value="rays_particles" <?php echo (isset($_slider[0]->type)&&$_slider[0]->type=='rays_particles'?'selected="selected"':''); ?> disabled>Rays and Particles</option>
							
							<option value="rainofline" <?php echo (isset($_slider[0]->type)&&$_slider[0]->type=='rainofline'?'selected="selected"':''); ?> disabled>Rain of Line Effect</option>
							
							<option value="rising_cubes" <?php echo (isset($_slider[0]->type)&&$_slider[0]->type=='rising_cubes'?'selected="selected"':''); ?> disabled>Rising Cubes</option>
							
							<option value="stars" <?php echo (isset($_slider[0]->type)&&$_slider[0]->type=='stars'?'selected="selected"':''); ?> disabled>Stars Effect</option>
							
							
							<option value="stellar" <?php echo (isset($_slider[0]->type)&&$_slider[0]->type=='stellar'?'selected="selected"':''); ?> disabled>Stellar Effect</option>
							<option value="shapeanimation" <?php echo (isset($_slider[0]->type)&&$_slider[0]->type=='shapeanimation'?'selected="selected"':''); ?> disabled>Shape Animation Effect</option>
							<option value="space_elevator" <?php echo (isset($_slider[0]->type)&&$_slider[0]->type=='space_elevator'?'selected="selected"':''); ?> disabled>Space Elevator</option>
							
							<option value="squidematics" <?php echo (isset($_slider[0]->type)&&$_slider[0]->type=='squidematics'?'selected="selected"':''); ?> disabled>Squidematics Effect</option>
							<option value="subvisual" <?php echo (isset($_slider[0]->type)&&$_slider[0]->type=='subvisual'?'selected="selected"':''); ?> disabled>Subvisual Effect</option>
							
							
							
							<option value="tagcanvas" <?php echo (isset($_slider[0]->type)&&$_slider[0]->type=='tagcanvas'?'selected="selected"':''); ?> disabled>Tag Canvas Effect</option>
							
							<option value="header_banner" <?php echo (isset($_slider[0]->type)&&$_slider[0]->type=='header_banner'?'selected="selected"':''); ?> disabled>The Great Attractor</option>
							
							<option value="tiny_galaxy" <?php echo (isset($_slider[0]->type)&&$_slider[0]->type=='tiny_galaxy'?'selected="selected"':''); ?> disabled>Tiny Galaxy Effect</option>
							<option value="thibaut" <?php echo (isset($_slider[0]->type)&&$_slider[0]->type=='thibaut'?'selected="selected"':''); ?> disabled>Thibaut Effect</option>
							<option value="torus" <?php echo (isset($_slider[0]->type)&&$_slider[0]->type=='torus'?'selected="selected"':''); ?> disabled>Torus Effect</option>
							<option value="valentine" <?php echo (isset($_slider[0]->type)&&$_slider[0]->type=='valentine'?'selected="selected"':''); ?> disabled>Valentine Effect</option>
							
							<option value="water" <?php echo (isset($_slider[0]->type)&&$_slider[0]->type=='water'?'selected="selected"':''); ?> disabled>Water Effect</option>
							<option value="wave" <?php echo (isset($_slider[0]->type)&&$_slider[0]->type=='wave'?'selected="selected"':''); ?> disabled>Wave Effect</option>
							
							<option value="wave_animation" <?php echo (isset($_slider[0]->type)&&$_slider[0]->type=='wave_animation'?'selected="selected"':''); ?> disabled>Wave Animation Effect</option>
							
							<option value="waaave" <?php echo (isset($_slider[0]->type)&&$_slider[0]->type=='waaave'?'selected="selected"':''); ?> disabled>Waaave Effect</option>
							<option value="warp_speed" <?php echo (isset($_slider[0]->type)&&$_slider[0]->type=='warp_speed'?'selected="selected"':''); ?> disabled>Warp Speed Effect</option>
							<option value="walkingbackground" <?php echo (isset($_slider[0]->type)&&$_slider[0]->type=='walkingbackground'?'selected="selected"':''); ?> disabled>Walking Background Effect</option>
							
							<option value="waving_cloth" <?php echo (isset($_slider[0]->type)&&$_slider[0]->type=='waving_cloth'?'selected="selected"':''); ?> disabled>Waving Cloth</option>
							
							<option value="waterdroplet" <?php echo (isset($_slider[0]->type)&&$_slider[0]->type=='waterdroplet'?'selected="selected"':''); ?> disabled>Water Droplet</option>
							<option value="water_swimming" <?php echo (isset($_slider[0]->type)&&$_slider[0]->type=='water_swimming'?'selected="selected"':''); ?> disabled>Water Swimming Effect</option>
							<option value="wordcloud" <?php echo (isset($_slider[0]->type)&&$_slider[0]->type=='wordcloud'?'selected="selected"':''); ?> disabled>Word Cloud Effect</option>
							<option value="wormhole" <?php echo (isset($_slider[0]->type)&&$_slider[0]->type=='wormhole'?'selected="selected"':''); ?> disabled>Wormhole</option>
							
							<option value="ygekpg" <?php echo (isset($_slider[0]->type)&&$_slider[0]->type=='ygekpg'?'selected="selected"':''); ?> disabled>Ygekpg Effect</option>

						</select>
						<input type="hidden" name="page" value="Slider-Hero" />
						<input type="hidden" name="task" value="changeeffect" />
						<input type="hidden" name="id" value="<?php echo $_id; ?>" />
						
						<button class="effect_change_button">Change & Save<span class="hero_pro_features">[PRO]</span></button>
					
					
				</div>
			</div>
		
			<div class="sliderhero_menu_title" style="margin-left: 1.5%;margin-bottom: 10px;width: 95.3%;margin-top: 7px;">
				<h2 style="font-size: 26px;"><?php echo wp_unslash($_slider[0]->title); ?></h2>
                    <a class="qchero_save_all" href="#">Save</a>
					<a class="qchero_preview" href="#" data-id="<?php echo $_id; ?>" style="margin-right: 12px;">Save & Preview</a>	
                			
			</div>
            <div class="settings">
				
			    <div class="menu">
				
                    <ul>
                        <li rel="general"><a href="#" class="active">General Settings</a></li>
                        <li rel="display-setting"><a href="#" class="">Display Settings</a></li>
                        <li rel="audio-setting"><a href="#" class="">Audio Settings <span class="hero_pro_features">[PRO]</span></a></li>
                        <li rel="video-settings"><a href="#" class="">Video Settings</a></li>
                        <li rel="Effect-setting"><a href="#" class="">Effect Settings <span class="hero_pro_features">[PRO]</span></a></li>
                        <li rel="arrows"><a href="#" class="">Arrows <span class="hero_pro_features">[PRO]</span></a></li>
                        <li rel="shortcodes"><a href="#">Shortcode</a></li>
                    </ul>
                </div>
                <div class="menu-content">
                    <ul class="main-content">
                        <li class="general active">
                            <ul id="general-settings">
                                <li class="style designstyle"><label for="qchero-name">Name:</label><input class="myElements" id="qcheror-name"
                                                                                                name="cs[name]" type="text"
                                                                                                value="<?php echo stripslashes_deep($_slider[0]->title); ?>"/>
                                </li>
                                <li class="style designstyle"><label for="qcslide-width">Width(px):</label><input class="myElements" style="width:40%" id="qcslide-width" name="style[width]"type="number" value="<?php echo esc_attr($style->width); ?>"/>
								
								<span style="    color: #000;
    margin-right: 4px;
    display: inline-block;
    margin-left: 20px;">Custom:</span> <input class="myElements" name="style[fullwidth]" style="display: inline-block;width: 13px;height: 16px;margin: 0px;float: none;" type="radio" value="0" <?php 
									if(isset($style->screenoption) and $style->screenoption=='0'){
										echo "checked";
									}else{
										echo "checked";
									}
								?>/>
								<span style="    color: #000;
    margin-right: 4px;
    display: inline-block;
    margin-left: 20px;">Full Width:</span> <input class="myElements" name="style[fullwidth]" style="display: inline-block;width: 13px;height: 16px;margin: 0px;float: none;" type="radio" value="1" <?php 
									if(isset($style->screenoption) and $style->screenoption=='1'){
										echo "checked";
									}
								?>/>
<span style="    color: #000;
    margin-right: 4px;
    display: inline-block;
    margin-left: 20px;">Full Screen:</span> <input class="myElements" name="style[fullwidth]" style="display: inline-block;width: 13px;height: 16px;margin: 0px;float: none;" type="radio" value="2" <?php 
									if(isset($style->screenoption) and $style->screenoption=='2'){
										echo "checked";
									}
								?>/>
								<span style="    color: #000;
    margin-right: 4px;
    display: inline-block;
    margin-left: 20px;padding: 10px 0px;">Auto:</span> <input class="myElements" name="style[fullwidth]" style="display: inline-block;width: 13px;height: 16px;margin: 0px;float: none;" type="radio" value="3" <?php 
									if(isset($style->screenoption) and $style->screenoption=='3'){
										echo "checked";
									}
								?>/>								
                                </li>
                                <li class="style designstyle"><label for="qcslide-height">Height(px):</label><input class="myElements" id="qcslide-height"
                                                                                                        name="style[height]"
                                                                                                        type="number"
                                                                                                        value="<?php echo esc_attr($style->height); ?>"/>
                                </li>
                                							

                            </ul>
							<div style="clear:both"></div>
							<div class="othersetting">
									<div class="params deseffect customitemstyle">
										<label class="customlevel" for="qchero-effect-interval"><?php _e('Slide Delay Time', 'qchero'); ?>:</label>
										<input class="myElements" style="width: 96%;" type="number" name="params[effect][interval]"
											   value="<?php echo esc_attr($params->effect->interval); ?>">
									</div>
									
									<div class="params deseffect customitemstyle">
										<label class="customlevel" for="qchero-effect-interval"><?php _e('Slide Padding Time', 'qchero'); ?>:</label>
										<input class="myElements" style="width: 96%;" type="number" name="params[paddingtime]"
											   value="<?php echo (isset($params->paddingtime)&&$params->paddingtime!=''?$params->paddingtime:'500'); ?>">
									</div>
									
									<div class="params customitemstyle">
										<label class="customlevel" for="qchero-background-color" style="display: inline-block;">Auto slide</label> 
										<select name="params[stopslide]" style="width: 96%;">
											<option value="0" <?php echo (isset($params->stopslide)&& $params->stopslide==0?'selected="selected"':''); ?>>On</option>
											<option value="1" <?php echo (isset($params->stopslide)&& $params->stopslide==1?'selected="selected"':''); ?>>Off</option>
										</select>
									</div>
									<div class="params customitemstyle">
										<label class="customlevel" for="qchero-background-color" style="display: inline-block;">Slide Repeat <span class="hero_pro_features">[PRO]</span></label> 
										<select disabled style="width: 96%;">
											<option value="" >None</option>
											
										</select>
									</div>
									<div class="params customitemstyle" >
										<label class="customlevel" for="qchero-caption-text-color" style="display: inline-block;">Random Slide</label> 
										<select name="params[randomslide]" style="width: 96%;">
											<option value="0" <?php echo (isset($params->randomslide)&& $params->randomslide==0?'selected="selected"':''); ?>>Off</option>
											<option value="1" <?php echo (isset($params->randomslide)&& $params->randomslide==1?'selected="selected"':''); ?>>On</option>
										</select>
									</div>
									
									<div class="params deseffect customitemstyle">
                                    <label class="customlevel" for="qcslide-effect-slideffect"><?php _e('Title Alignment', 'qcslide'); ?>:</label>
									<select class="myElements" name="params[title][align]" style="width: 96%;">
										
										
										<option value="left" <?php echo ($params->title->align=='left'?'selected="selected"':''); ?>><?php _e('Left', 'qcslide'); ?></option>
										
										<option value="center" <?php echo ($params->title->align=='center'?'selected="selected"':''); ?>><?php _e('Center', 'qcslide'); ?></option>
										
										<option value="right" <?php echo ($params->title->align=='right'?'selected="selected"':''); ?>><?php _e('Right', 'qcslide'); ?></option>
										
										
									</select>
                                    
                                </div>
								<div class="params deseffect customitemstyle">
                                    <label class="customlevel" for="qcslide-effect-slideffect"><?php _e('Description Alignment', 'qcslide'); ?>:</label>
									<select class="myElements" name="params[description][align]" style="width: 96%;">
										
										
										<option value="left" <?php echo ($params->description->align=='left'?'selected="selected"':''); ?>><?php _e('Left', 'qcslide'); ?></option>
										
										<option value="center" <?php echo ($params->description->align=='center'?'selected="selected"':''); ?>><?php _e('Center', 'qcslide'); ?></option>
										
										<option value="right" <?php echo ($params->description->align=='right'?'selected="selected"':''); ?>><?php _e('Right', 'qcslide'); ?></option>
										
										
									</select>
                                    
                                </div>
								
								<div class="params deseffect customitemstyle">
                                    <label class="customlevel" for="qcslide-effect-slideffect"><?php _e('Button Alignment', 'qcslide'); ?>:</label>
									<select class="myElements" name="params[button1][align]" style="width: 96%;">
										
										
										<option value="left" <?php echo ($params->button1->align=='left'?'selected="selected"':''); ?>><?php _e('Left', 'qcslide'); ?></option>
										
										<option value="center" <?php echo ($params->button1->align=='center'?'selected="selected"':''); ?>><?php _e('Center', 'qcslide'); ?></option>
										
										<option value="right" <?php echo ($params->button1->align=='right'?'selected="selected"':''); ?>><?php _e('Right', 'qcslide'); ?></option>
										
										
									</select>
                                    
                                </div>	
								<div style="clear:both"></div>
								<div class="params deseffect customitemstyle">
									<label class="customlevel" for="qchero-effect-interval"><?php _e('Slider End Redirect Url', 'qchero'); ?> <span class="hero_pro_features">[PRO]</span></label>
									<input class="myElements" style="width: 96%;" type="text"
										   value="" disabled>
								</div>
								<?php if($_slider[0]->type=='intro'): ?>
								<div class="params deseffect customitemstyle">
									<label class="customlevel" for="qchero-effect-interval"><?php _e('Slider End Load New slider', 'qchero'); ?> <span class="hero_pro_features">[PRO]</span></label>
									<select class="myElements" style="width: 96%;" disabled>
										<option value="" >None</option>
									</select>
								</div>
								<?php endif; ?>
								<div class="params deseffect customitemstyle">
									<label class="customlevel" for="qchero-effect-interval"><?php _e('Slider Redirect Delay', 'qchero'); ?> <span class="hero_pro_features">[PRO]</span></label>
									<input class="myElements" style="width: 96%;" type="number"
										   value="" disabled>
								</div>
								
							</div>
							<div style="clear:both"></div>
	
                            <div id="general-view" >
								<div class="hero_content_left" style="float:left;width:50%">
									<div class="general_view_left">
										Vertically Order Title, Subtitle & Button Positions.
									</div>
									<div id="qchero-slider-construct" >
										<div id="qchero-construct-vertical"></div>
										<div id="qchero-construct-horizontal"></div>
										<div id="qchero-title-construct" data="title" class="qchero_construct">
											<div class="constructor_text" style="margin-left:5px;color:#565855">Title</div>
										</div>
										
										<div id="qchero-button1-construct" data="button1" class="qchero_construct">
											<div class="constructor_text" style="margin-left:5px;color:#565855">Button</div>
										</div>
										
										<div id="qchero-description-construct" data="description" class="qchero_construct">
											<div class="constructor_text" style="margin-left:5px;color:#565855">Description</div>
										</div>

										<div id="zoom" class="sizer">
										</div>
										<a id="qchero_remove" title="Remove Element"><i class="fa fa-remove"
																						 aria-hidden="true"></i></a>
									</div>
								</div>
								<div class="hero_content_right" style="float: left;margin-left: 80px;margin-top: 100px;">
									<?php if($_slider[0]->type!='intro'): ?>
									<div class="params">
										<label class="customlevel" for="qcslide-effect-slideffect"><?php _e('Content Start From', 'qcslide'); ?>:</label>
										<select class="myElements" name="params[content]" style="width: 96%;">
											
											
											<option value="center" <?php echo (isset($params->content) && $params->content=='center'?'selected="selected"':''); ?>><?php _e('Center', 'qcslide'); ?></option>
											
											<option value="top" <?php echo (isset($params->content) && $params->content=='top'?'selected="selected"':''); ?>><?php _e('Top', 'qcslide'); ?></option>
											
											<option value="bottom" <?php echo (isset($params->content) && $params->content=='bottom'?'selected="selected"':''); ?>><?php _e('Bottom', 'qcslide'); ?></option>
											
											
										</select>
										
									</div>
									<div class="params deseffect">
										<label class="customlevel" for="qcslide-effect-slideffect"><?php _e('Content Margin from Top or Bottom', 'qcslide'); ?></label>
										<input class="myElements" style="width: 96%;" type="text" name="params[contentspace]"
												   value="<?php echo (isset($params->contentspace) && $params->contentspace!=''?esc_attr($params->contentspace):''); ?>" placeholder="Ex: 50px or 10%" />
										
									</div>
									
									<div class="params deseffect">
										<label class="customlevel" for="qcslide-effect-slideffect"><?php _e('Title Bottom Margin', 'qcslide'); ?><span class="hero_pro_features">[PRO]</span></label>
										<input class="myElements" style="width: 96%;" type="text" disabled placeholder="Ex: 50px or 10%" />

									</div>
									<div class="params deseffect">
										<label class="customlevel" for="qcslide-effect-slideffect"><?php _e('Description Bottom Margin', 'qcslide'); ?><span class="hero_pro_features">[PRO]</span></label>
										<input class="myElements" style="width: 96%;" type="text" disabled placeholder="Ex: 50px or 10%" />
										
									</div>
									
									<div class="params deseffect">
										<label class="customlevel" for="qcslide-effect-slideffect"><?php _e('Button Bottom Margin', 'qcslide'); ?><span class="hero_pro_features">[PRO]</span></label>
										<input class="myElements" style="width: 96%;" type="text" disabled placeholder="Ex: 50px or 10%" />
										
									</div>
									
									<?php endif; ?>
								</div>
							</div>
                        </li>
						<li class="display-setting">
							<div style="clear:both"></div>
							<h2>Color & Background Section</h2>
							<hr/>
							
							<div class="params othersetting" style="display: inline-block; float: left; width: 25%;">
								<label class="customlevel" for="qchero-caption-text-color">Title Background Color <span class="hero_pro_features">[PRO]</span></label> <input type="text" name="" class="color-field myElements" value="" />
							</div>
							<div class="params othersetting" style="display: inline-block; float: left; width: 25%;">
								<label class="customlevel" for="qchero-caption-text-color">Title Color</label> <input type="text" name="params[titlecolor]" class="color-field myElements" value="<?php echo (isset($params->titlecolor)?esc_attr($params->titlecolor):''); ?>" />
							</div>
							<div class="params othersetting" style="display: inline-block; float: left; width: 25%;">
									<label class="customlevel" for="qchero-caption-text-color">Desctiption Color</label> <input type="text" name="params[descriptioncolor]" class="color-field myElements" value="<?php echo (isset($params->descriptioncolor)?esc_attr($params->descriptioncolor):''); ?>" />
							</div>
							
							<div class="params othersetting" style="display: inline-block; float: left; width: 25%;">
									<label class="customlevel" for="qchero-caption-text-color">Canvas Opacity <span class="hero_pro_features">[PRO]</span></label> <input type="text" name="" class="myElements" placeholder="Ex: 0.5" value="" disabled/>
							</div>
							<div style="clear:both"></div>
							<div class="params titleffect customitemstyle">
								<label class="customlevel" for="qcslide-effect-slideffect"><?php _e('Top Decoration', 'qcslide'); ?> <span class="hero_pro_features">[PRO]</span></label>
								<select class="myElements" name="" disabled>
									<option value="">None</option>
									
								</select>
								
							</div>
							<div class="params othersetting" style="display: inline-block; float: left; width: 25%;">
								<label class="customlevel" for="qchero-background-color">Top Decoration Color <span class="hero_pro_features">[PRO]</span></label> <input type="text" name="" class="color-field" value="" />
							</div>
							<div class="params titleffect customitemstyle">
								<label class="customlevel" for="qcslide-effect-slideffect"><?php _e('Bottom Decoration', 'qcslide'); ?> <span class="hero_pro_features">[PRO]</span></label>
								<select class="myElements" name="" disabled>
									<option value="">None</option>
									
								</select>
								
							</div>
							
							<div class="params othersetting" style="display: inline-block; float: left; width: 25%;">
								<label class="customlevel" for="qchero-background-color">Bottom Decoration Color <span class="hero_pro_features">[PRO]</span></label> <input type="text" name="" class="color-field" value="" />
							</div>
							
							
							<div style="clear:both"></div>
							<p style="color:red;font-size: 15px;margin: 10px 0px;">* Please note that some effects are not Transparent and do <b>NOT</b> support slider background Color, Image, Gradient or Video!</p>
							
							<div class="params othersetting" style="display: inline-block; float: left; width: 25%;">
								<label class="customlevel" for="qchero-background-color">Background Color</label> <input type="text" name="params[background]" class="color-field" value="<?php echo (isset($params->background)?esc_attr($params->background):''); ?>" />
							</div>
							
							<div class="othersetting" style="display: inline-block; float: left; width: 25%;">
								<div class="params customitemstyle" style="width:100%;">
									
									<label class="customlevel" for="bg_image_url">Background Image</label>
									<input type="hidden" name="cs[bg_image_url]" id="bg_image_url" class="regular-text" value="<?php echo esc_attr($_slider[0]->bg_image_url); ?>">
									<input type="button" name="upload-btn" id="bg-upload-btn" class="button-secondary" value="Upload Image">
								</div>
								<div style="clear:both"></div>
								<div id="bg_preview_img">
								
								<?php 
									if($_slider[0]->bg_image_url != '') :
								?>
									<span class="remove_bg_image">X</span>
									<img src="<?php echo esc_attr($_slider[0]->bg_image_url); ?>" alt="" />
								<?php endif; ?>
								</div>
							

							</div>
							<div class="othersetting" style="display: inline-block; float: left;width: 25%;">
									<div class="params customitemstyle" style="width:100%;">
									
									<label class="customlevel" for="bg_image_url">Background Gradient</label>
									<input type="hidden" name="cs[bg_gradient]" id="bg_gradient" class="regular-text" value='<?php echo str_replace('"','',preg_replace('/\\\\/', '', $_slider[0]->bg_gradient)); ?>' />
									<input type="button" name="upload-btn" id="bg_gradient_select" class="button-secondary" value="Select Gradient">

								</div>
								<?php
									if(isset($_slider[0]->bg_gradient) and strlen($_slider[0]->bg_gradient)>5){
								?>
									<div style="clear:both"></div>
									<div id="gradient_view" style="display:inline-block;<?php echo str_replace('"','',preg_replace('/\\\\/', '', $_slider[0]->bg_gradient)); ?>">
										<span class="remove_gradient">x</span>
									</div>
								<?php 
									}else{
								?>	
									<div style="clear:both"></div>
									<div id="gradient_view">
										<span class="remove_gradient">x</span>
									</div>
								<?php
									}
								?>

							</div>
							
							<div class="othersetting" style="display: inline-block; float: left; width: 25%;">
								
								<div class="params customitemstyle" style="width:100%;">
									
									<label class="customlevel" for="bg_video">Background Image Effect<span class="hero_pro_features">[PRO]</span></label>
									<select class="myElements" >
									
										<option value="">None</option>
										<option disabled value="parallax" <?php echo (isset($params->bgimageeffect)&&$params->bgimageeffect=='parallax'?'selected="selected"':''); ?>>Parallax Effect</option>
										<option disabled value="ken-burn" <?php echo (isset($params->bgimageeffect)&&$params->bgimageeffect=='ken-burn'?'selected="selected"':''); ?>>Ken Burn Effect</option>
										
																	
									</select>
									
								</div>
								

							</div>
							
							<div style="clear:both"></div>
								<p style="color:red;font-size: 15px;">* Please note that slide (background) image effect will only work if you put image in slide</p>
								<div class="params titleffect customitemstyle">
                                    <label class="customlevel" for="qcslide-effect-slideffect"><?php _e('Slide Image Effect', 'qcslide'); ?> <span class="hero_pro_features">[PRO]</span></label>
									<select class="myElements" name="">
										<option value="">Fade</option>
										<option value="" disabled>Slide Left</option>
										<option value="" disabled>Slide Right</option>
										<option value="" disabled>Slide Top</option>
										<option value="" disabled>Slide Bottom</option>
										
									</select>
                                    
                                </div>
							<div style="clear:both"></div>
							<h2>Effect Section</h2>
							<hr/>
<div class="tab">
  <button class="tablinks active" onclick="openCity(event, 'animatecss')">Animate Css & Custom</button>
  <?php if($_slider[0]->type!='intro'): ?>
  <button class="tablinks" onclick="openCity(event, 'letterfx')">Letter Fx</button>
  <?php endif; ?>
</div>

<div id="animatecss" class="tabcontent" style="display:block">
<?php 
require(QCLD_sliderhero_view.'/slider_hero_tab_animate_css_section.php');
?>
</div>

<div id="letterfx" class="tabcontent">
<?php
if($_slider[0]->type!='intro'):
	require(QCLD_sliderhero_view.'/slider_hero_tab_letterfx.php');
endif;
?>
</div>
						<div style="clear:both"></div>
							<h2>Control Section</h2>
							<hr>
							<div class="othersetting">


								<div class="params customitemstyle">
									<label class="customlevel" for="qchero-background-color" style="display:block">Content Offset(Left & Right)</label> 
									<input type="text" placeholder="45px or 10%" value="<?php echo (isset($params->contentoffset)&& $params->contentoffset!=''?$params->contentoffset:''); ?>" name="params[contentoffset]" />
								</div>
								
								
								<div class="params customitemstyle" >
									<label class="customlevel" for="qchero-caption-text-color" style="display: block;">Arrows</label> 
									<select name="params[hidearrow]">
										<option value="0" <?php echo (isset($params->hidearrow)&& $params->hidearrow==0?'selected="selected"':''); ?>>Show</option>
										<option value="1" <?php echo (isset($params->hidearrow)&& $params->hidearrow==1?'selected="selected"':''); ?>>Hide</option>
									</select>
								</div>
								<div class="params customitemstyle" >
									<label class="customlevel" for="qchero-caption-text-color" style="display: block;">Bottom Navigation</label> 
									<select name="params[hidenavigation]">
										<option value="0" <?php echo (isset($params->hidenavigation)&& $params->hidenavigation==0?'selected="selected"':''); ?>>Show</option>
										<option value="1" <?php echo (isset($params->hidenavigation)&& $params->hidenavigation==1?'selected="selected"':''); ?>>Hide</option>
									</select>
								</div>
								
								
								
								<div class="params customitemstyle" >
									<label class="customlevel" for="qchero-caption-text-color" style="display: inline-block;">Show Restart Button</label> 
									<select name="params[herorestart]">
										<option value="0" <?php echo (isset($params->herorestart)&& $params->herorestart==0?'selected="selected"':''); ?>>Show</option>
										<option value="1" <?php echo (isset($params->herorestart)&& $params->herorestart==1?'selected="selected"':''); ?>>Hide</option>
									</select>
								</div>
								
								<div style="clear:both"></div>
								<div class="params customitemstyle" >
									<label class="customlevel" for="qchero-caption-text-color" style="display: inline-block;">Show Pause Button</label> 
									<select name="params[heropause]">
										<option value="0" <?php echo (isset($params->heropause)&& $params->heropause==0?'selected="selected"':''); ?>>Show</option>
										<option value="1" <?php echo (isset($params->heropause)&& $params->heropause==1?'selected="selected"':''); ?>>Hide</option>
									</select>
								</div>
										
							</div>	
							<h2>Font Section</h2>
							<hr>							
							<div class="othersetting">
								<div class="params titlefontsize customitemstyle">
                                    <label class="customlevel" for="qchero-title-fontsize">Title Font Size(px)</label>
									<input class="myElements" type="number" name="params[titlefontsize]" value="<?php echo esc_attr($params->titlefontsize); ?>"  />
                                </div>
								<div class="params descfontsize customitemstyle">
                                    <label class="customlevel" for="qchero-desc-fontsize">Description Font Size(px)</label>
									<input class="myElements" type="number" name="params[descfontsize]" value="<?php echo esc_attr($params->descfontsize); ?>"  />
                                </div>	
								<div class="params titlefontsize customitemstyle">
                                    <label class="customlevel" for="qchero-title-fontsize">Title Line Height(px)</label>
									<input class="myElements" type="number" name="params[titlefontheight]" value="<?php echo esc_attr($params->titlefontheight); ?>"  />
                                </div>
								<div class="params descfontsize customitemstyle">
                                    <label class="customlevel" for="qchero-desc-fontsize">Description Line Height(px)</label>
									<input class="myElements" type="number" name="params[descfontheight]" value="<?php echo esc_attr($params->descfontheight); ?>"  />
                                </div>	
									
								
								
							</div>
						</li>
						<li class="video-settings">
							<div class="othersetting" style="display: inline-block; float: left; width: 25%;">
								<div class="params customitemstyle" style="width:100%;">
									
									<label class="customlevel" for="video">Use Video Background</label>
									<select name="params[video]" id="sh_video" class="myElements">
										<option value="">None</option>
										<option value="custom" <?php echo (isset($params->video)&& $params->video=='custom'?'selected="selected"':''); ?> disabled>Custom Video (pro)</option>
										<option value="youtube" <?php echo (isset($params->video)&& $params->video=='youtube'?'selected="selected"':''); ?>>Youtube Video</option>
										<option value="vimeo" <?php echo (isset($params->video)&& $params->video=='vimeo'?'selected="selected"':''); ?> disabled>Vimeo Video (pro)</option>
									</select>
									
								</div>
								
							</div>
							

							<div class="othersetting" style="display: inline-block; float: left; width: 25%;<?php echo (isset($params->video)&& $params->video=='youtube'?'display:block;':'display:none;'); ?>" id="sh_youtube_video">
								<div class="params customitemstyle" style="width:100%;">
									
									<label class="customlevel" for="bg_video">Background Video (Youtube)</label>
									<input type="text" name="params[bg_video_youtube]" id="bg_video_youtube" placeholder="Video ID" class="myElements" value="<?php echo (isset($params->bg_video_youtube)&& $params->bg_video_youtube!=''?$params->bg_video_youtube:''); ?>">
									
								</div>
								

							</div>
							
							<div class="othersetting" style="display: inline-block; float: left; width: 25%;<?php echo (isset($params->video)&& $params->video!=''?'display:block;':'display:none;'); ?>;" id="sh_video_loop">
								<div class="params customitemstyle" style="width:100%;">
									
									<label class="customlevel" for="video_loop">Video Loop<span class="hero_pro_features">[PRO]</span></label>
									<select name="params[video_loop]" id="video_loop" disabled class="myElements">
										<option value="0" <?php echo (isset($params->video_loop)&& $params->video_loop=='0'?'selected="selected"':''); ?>>False</option>
										<option value="1" <?php echo (isset($params->video_loop)&& $params->video_loop=='1'?'selected="selected"':''); ?>>True</option>
										
									</select>
									
								</div>

							</div>
							<div class="othersetting" style="display: inline-block; float: left; width: 25%;<?php echo (isset($params->video)&& $params->video!=''?'display:block;':'display:none;'); ?><?php echo (isset($params->video)&& $params->video=='vimeo'?'display:none;':'') ?>;" id="sh_video_mute">
								<div class="params customitemstyle" style="width:100%;">
									
									<label class="customlevel" for="video_mute">Video Mute <span class="hero_pro_features">[PRO]</span></label>
									<select name="params[video_mute]" id="video_mute" class="myElements" disabled>
										<option value="">None</option>
										<option value="1" <?php echo (isset($params->video_mute)&& $params->video_mute=='1'?'selected="selected"':''); ?>>True</option>
										<option value="0" <?php echo (isset($params->video_mute)&& $params->video_mute=='0'?'selected="selected"':''); ?>>False</option>
									</select>
									
								</div>
								

							</div>
							<div class="othersetting" style="display: inline-block; float: left; width: 25%;<?php echo (isset($params->video)&& $params->video!=''?'display:block;':'display:none;'); ?>;" id="sh_video_overlay">
								<div class="params customitemstyle" style="width:100%;">
									
									<label class="customlevel" for="video_overlay">Video Overlay <span class="hero_pro_features">[PRO]</span></label>
									<select name="params[video_overlay]" id="video_overlay" class="myElements" disabled>
										<option value="">None</option>
										<option value="0" <?php echo (isset($params->video_overlay)&& $params->video_overlay=='0'?'selected="selected"':''); ?>>False</option>
										<option value="1" <?php echo (isset($params->video_overlay)&& $params->video_overlay=='1'?'selected="selected"':''); ?>>True</option>
										
									</select>
									
								</div>
								

							</div>
							
							<div class="othersetting" style="display: inline-block; float: left; width: 25%;<?php echo (isset($params->video)&& $params->video!=''?'display:block;':'display:none;'); ?>;" id="sh_video_overlay_color">
								<div class="params customitemstyle" style="width:100%;">
									<label class="customlevel" for="qchero-background-color">Video Overlay Color <span class="hero_pro_features">[PRO]</span></label> <input type="text" name="params[video_overlay_color]" class="color-field" value="<?php echo (isset($params->video_overlay_color)?esc_attr($params->video_overlay_color):''); ?>" disabled />
								</div>

							</div>
							
							<div class="othersetting" style="display: inline-block; float: left; width: 25%;<?php echo (isset($params->video)&& $params->video!=''?'display:block;':'display:none;'); ?>;" id="sh_video_overlay_opacity">
							
								<div class="params customitemstyle" style="width:100%;">
									<label class="customlevel" for="qchero-background-color">Video Overlay opacity <span class="hero_pro_features">[PRO]</span></label> <input type="text" name="params[video_overlay_opacity]" class="myElements" placeholder="0.4" value="<?php echo (isset($params->video_overlay_opacity)?esc_attr($params->video_overlay_opacity):''); ?>" disabled />
								</div>

							</div>						
						</li>
						<li class="Effect-setting">
							<!--<div class="othersetting" style="position:relative">
								
								<div class="params customitemstyle">
									<label class="customlevel" for="qchero-background-color">Particle Type</label> <select name="params[particle_type]">
											<option value="circle" <?php echo (isset($params->particle_type) &&$params->particle_type=='circle'?'selected="selected"':''); ?>>Circle</option>
											<option value="edge" <?php echo (isset($params->particle_type) && $params->particle_type=='edge'?'selected="selected"':''); ?>>Edge</option>
											<option value="triangle" <?php echo (isset($params->particle_type) && $params->particle_type=='triangle'?'selected="selected"':''); ?>>Triangle</option>
											<option value="polygon" <?php echo (isset($params->particle_type)&&$params->particle_type=='polygon'?'selected="selected"':''); ?>>Polygon</option>
											<option value="star" <?php echo (isset($params->particle_type)&&$params->particle_type=='star'?'selected="selected"':''); ?>>Star</option>
											<option value="image" <?php echo (isset($params->particle_type)&&$params->particle_type=='image'?'selected="selected"':''); ?>>Image</option>
									</select>
								</div>
								<div class="params customitemstyle">
									<label class="customlevel" for="qchero-caption-text-color">Interactivity</label> <select name="params[interactivity]">
											<option value="">None</option>
											<option value="grab" <?php echo (isset($params->interactivity)&&$params->interactivity=='grab'?'selected="selected"':''); ?>>Grab</option>
											<option value="repulse" <?php echo (isset($params->interactivity)&&$params->interactivity=='repulse'?'selected="selected"':''); ?>>Repulse</option>
									</select>
								</div>
								<div class="params customitemstyle">
									<label class="customlevel" for="qchero-caption-text-color">Particle Color</label> <input type="text" name="params[particle_color]" class="color-field myElements" value="<?php echo (isset($params->particle_color)?esc_attr($params->particle_color):''); ?>" />
								</div>
								<div class="params customitemstyle">
									<label class="customlevel" for="qchero-caption-text-color">Line Linked Color</label> <input type="text" name="params[linelink_color]" class="color-field myElements" value="<?php echo (isset($params->linelink_color)?esc_attr($params->linelink_color):''); ?>" />
								</div>	
							</div>	-->	
							<div class="othersetting" style="position:relative;height: 88px;">
								<div style=" height: 100%;  width: 100%; position: absolute;opacity: 0.7;z-index: 999;background: #ddd;">
									<img src="<?php echo QCLD_sliderhero_IMAGES;?>/Screenshot_2.jpg" />
								</div>
	
							</div>
						</li>
						<li class="arrows">
							<div class="othersetting" style="position:relative;height: 145px;">
								<div style=" height: 100%;  width: 100%; position: absolute;opacity: 0.7;z-index: 999;background: #ddd;">
									<img src="<?php echo QCLD_sliderhero_IMAGES;?>/Screenshot_1.jpg" />
								</div>
	
							</div>						
						</li>
						<li class="audio-setting">
							<div class="othersetting" style="position:relative;height: 145px;">
								<div style=" height: 100%;  width: 100%; position: absolute;opacity: 0.7;z-index: 999;background: #ddd;">
									<img src="<?php echo QCLD_sliderhero_IMAGES;?>/Screenshot_5.jpg" />
								</div>
	
							</div>						
						</li>
                        <li class="shortcodes">
							<div class="shortcodes-contents">
								<div style="margin-bottom: 12px;">
									Copy & paste the shortcode directly into any WordPress post or page.
									<p style="font-size: 18px;line-height: 34px;color: #000;">[qcld_hero id=<?php echo intval($_slider[0]->id); ?>]</p>
								</div>
								<span>OR</span>
								<div>
									Copy & paste this code into a template file to include the slideshow within your
                                    theme.
                                    <p style="font-size: 18px;line-height: 34px;color: #000;">&lt;?php echo do_shortcode("[qcld_hero id=<?php echo intval($_slider[0]->id); ?>]"); ?&gt;</p>
								</div>
							</div>
						</li>
                    </ul>
                </div>
            </div>
        
        <div id="qchero_slide_edit" style="display:none;">
            <input class="title" name="title" value=""/>
            <input class="description" name="description" value=""/>
            <div class="content">
                <span id="logo">Logo</span>
                <div class="contents">

                </div>
            </div>
        </div>
        <div id="qchero_slider_preview_popup">

        </div>
        <div id="qchero_slider_preview">
            <div class="qchero_close" style="position:fixed;top: 12%;right: 6%;"><i class="fa fa-remove"
                                                                                     aria-hidden="true"></i></div>
        </div>
        <!--SLIDER-->
        <style>

            /*** title ***/
            .qchero_bullets {
                position: absolute;

            }

            .qchero_bullets div, .qchero_bullets div:hover, .qchero_bullets .av {
                position: absolute;
                /* size of bullet elment */
                width: 12px;
                height: 12px;
                border-radius: 10px;
                filter: alpha(opacity=70);
                opacity: .7;
                overflow: hidden;
                cursor: pointer;
                border: #4B4B4B 1px solid;
            }



            .qchero_bullets .bulletav {
                background-color: #74B8CF !important;
                border: #fff 1px solid;
            }

            .qchero_bullets .dn, .qchero_bullets .dn:hover {
                background-color: #555555;
            }



            /*** title ***/
            .qcherotitle {
                box-sizing: border-box;
                padding: 1%;
                overflow: hidden;
            }

            .qcherotitle h3 {
                margin: 0;
                padding: 0;
                word-wrap: break-word;
                width: 100%;
                text-align: center;
                font-size: inherit !important;
            }


        </style>
    </div>
    <div id="qchero_slider_title_styling" class="qchero-styling main-content">
        <div class="qchero_close"><i class="fa fa-remove" aria-hidden="true"></i></div>
        <span class="popup-type" data="off"><img
                src="<?php echo QCLD_sliderhero_IMAGES . "/light_1.png"; ?>"></span>
        <form id="qchero-title-styling" class="params">
            <input type="hidden" class="width" name="params[title][style][width]" rel="px"
                   value="<?php echo esc_attr($params->title->style->width); ?>">
            <input type="hidden" class="height" name="params[title][style][height]" rel="px"
                   value="<?php echo esc_attr($params->title->style->height); ?>">
            <input type="hidden" class="top" name="params[title][style][top]" rel="0"
                   value="<?php echo esc_attr($params->title->style->top); ?>">
            <input type="hidden" class="left" name="params[title][style][left]" rel="0"
                   value="<?php echo esc_attr($params->title->style->left); ?>">
            
        </form>
        <div class="qchero_content">
            <div class="qchero_title">
                <div class="qchero_title_child"></div>
                <span class="title">Title</span>
            </div>
        </div>
    </div>
	
    <div id="qchero_slider_button1_styling" class="qchero-styling main-content">
        <div class="qchero_close"><i class="fa fa-remove" aria-hidden="true"></i></div>
        <span class="popup-type" data="off"><img
                src="<?php echo QCLD_sliderhero_IMAGES . "/light_1.png"; ?>"></span>
        <form id="qchero-button1-styling" class="params">
            <input type="hidden" class="width" name="params[button1][style][width]" rel="px"
                   value="<?php echo esc_attr($params->button1->style->width); ?>">
            <input type="hidden" class="height" name="params[button1][style][height]" rel="px"
                   value="<?php echo esc_attr($params->button1->style->height); ?>">
            <input type="hidden" class="top" name="params[button1][style][top]" rel="0"
                   value="<?php echo esc_attr($params->button1->style->top); ?>">
            <input type="hidden" class="left" name="params[button1][style][left]" rel="0"
                   value="<?php echo esc_attr($params->button1->style->left); ?>">
            
        </form>
        <div class="qchero_content">
            <div class="qchero_button1">
                <div class="qchero_button1_child"></div>
                <span class="title">button1</span>
            </div>
        </div>
    </div>
	
    <div id="qchero_slider_description_styling" class="qchero-styling main-content">
        <div class="qchero_close"><i class="fa fa-remove" aria-hidden="true"></i></div>
        <span class="popup-type" data="off"><img
                src="<?php echo QCLD_sliderhero_IMAGES . "/light_1.png"; ?>"></span>
        <form id="qchero-description-styling" class="params">
            <input type="hidden" class="width" name="params[description][style][width]" rel="px"
                   value="<?php echo esc_attr($params->description->style->width); ?>">
            <input type="hidden" class="height" name="params[description][style][height]" rel="px"
                   value="<?php echo esc_attr($params->description->style->height); ?>">
            <input type="hidden" class="top" name="params[description][style][top]" rel="0"
                   value="<?php echo esc_attr($params->description->style->top); ?>">
            <input type="hidden" class="left" name="params[description][style][left]" rel="0"
                   value="<?php echo esc_attr($params->description->style->left); ?>">
            
        </form>
        <div class="qchero_content">
            <div class="qchero_description">
                <div class="qchero_description_child"></div>
                <span class="description">description</span>
            </div>
        </div>
    </div>
<div id="qchero_loading_overlay" style="display:none;">
	<div><img src="<?php echo QCLD_sliderhero_IMAGES . "/loading_1.gif"; ?>"/></div>
</div>	
    <style>
        #qchero_slider_preview_popup {
            display: none;
            position: fixed;
            height: 100%;
            width: 100%;
            background: #000000;
            opacity: 0.7;
            top: 0;
            left: 0;
            z-index: 9998;
        }

        #qchero_slider_preview {
            padding: 40px;
            overflow-y: scroll;
            overflow: overlay;
            display: none;
            position: fixed;
            height: 80%;
            width: 90%;
            background: #f1f1f1;
            opacity: 1;
            top: 10%;
            left: 5%;
            z-index: 10000;
            box-sizing: border-box;
        }

        .qchero-custom-styling .qchero_content .qchero_custom .qchero_img {
            box-sizing: border-box;
            border-style: solid !important;
        }

        .qchero-custom-styling .qchero_content .qchero_custom img {
            width: 100%;
            height: 100%;
            max-width: 100%;
            max-height: 100%;
            display: block;
        }

        .qcheroimg {
            overflow: hidden;
            box-sizing: border-box;
            box-sizing: border-box;
        }

        #qchero_slider_preview .qchero_content {
            position: absolute;
            background: #FBABAB;
            width: 100%;
            height: 100%;
        }

        #qchero-slider-construct {
            width: 214px;
            height: 500px;
            position: relative;
            background-size: 100% 100%;
            background-repeat: no-repeat;
            overflow: hidden;
            background: rgba(223, 223, 223, 0.36);
            background-size: 100% 100%;
            background-repeat: no-repeat;
            box-sizing: border-box;
            -moz-box-shadow: inset 0 0 1px #000000;
            -webkit-box-shadow: inset 0 0 1px #000000;
            box-shadow: inset 0 0 1px #000000;

        }

        .qchero_construct {
            max-width: <?php echo absint($style->width);?>px;
            max-height: <?php echo absint($style->height);?>px;
            position: absolute;
            width: 100px;
            height: 50px;
            margin: 0;
            padding: 0;
            word-wrap: break-word;
            background: green;
            display: inline-block;
            -webkit-touch-callout: none;
            -webkit-user-select: none;
            -khtml-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            cursor: move;
			text-align:center;
        }

        img.qchero_construct {
            width: 100px;
            height: auto;
        }

        #qchero-title-construct {
            position: absolute;
            min-width: 100%;
            width: <?php echo absint($params->title->style->width);?>px;
            height: <?php echo absint($params->title->style->height);?>px;
            background: transparent;
            cursor: move;
            top: <?php echo esc_attr($params->title->style->top);?>;
            left: <?php echo esc_attr($params->title->style->left);?>;
            opacity: 0.9;
            color: rgb(86, 88, 85);
            filter: alpha(opacity=<?php echo abs($params->title->style->opacity);?>);
            border: 2px dashed #898989;
            word-wrap: break-word;
            overflow: hidden;
            -webkit-touch-callout: none;
            -webkit-user-select: none;
            -khtml-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            box-sizing: border-box;
			text-align:center;
        }
        #qchero-button1-construct {
            position: absolute;
            min-width: 100%;
            width: <?php echo absint($params->button1->style->width);?>px;
            height: <?php echo absint($params->button1->style->height);?>px;
            background: transparent;
            cursor: move;
            top: <?php echo esc_attr($params->button1->style->top);?>;
            left: <?php echo esc_attr($params->button1->style->left);?>;
            opacity: 0.9;
            color: rgb(86, 88, 85);
            filter: alpha(opacity=<?php echo abs($params->title->style->opacity);?>);
            border: 2px dashed #898989;
            word-wrap: break-word;
            overflow: hidden;
            -webkit-touch-callout: none;
            -webkit-user-select: none;
            -khtml-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            box-sizing: border-box;
			text-align:center;
        }

        #qchero-description-construct {
            position: absolute;
            min-width: 100%;
            width: <?php echo absint($params->description->style->width);?>px;
            height: <?php echo absint($params->description->style->height);?>px;
            background: <?php echo ("#".$params->description->style->background->color);?>;
            background: transparent;

            cursor: move;
            top: <?php echo esc_attr($params->description->style->top);?>;
            left: <?php echo esc_attr($params->description->style->left);?>;
            opacity: 0.9;
            color: rgb(86, 88, 85);
            border: 2px dashed #898989;
            filter: alpha(opacity=<?php echo abs($params->description->style->opacity);?>);
            word-wrap: break-word;
            overflow: hidden;
            -webkit-touch-callout: none;
            -webkit-user-select: none;
            -khtml-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            box-sizing: border-box;
        }

        #qchero-custom-construct {
            position: absolute;
            min-width: 50px;
            cursor: move;
            word-wrap: break-word;
            overflow: hidden;
            -webkit-touch-callout: none;
            -webkit-user-select: none;
            -khtml-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }


        #qchero-description-construct #qchero_remove {
            opacity: 0;
        }
    </style>
</div>
<div class="hero_bottom_save_button" style="display:none">
	<a class="qchero_save_all2" href="#">Save</a>
</div>
    <?php
}
