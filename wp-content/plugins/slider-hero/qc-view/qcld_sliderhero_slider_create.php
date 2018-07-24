<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly


function qcld_sliderhero_sliders_type() { ?>
	
	<div class="qchero_sliders_list_wrapper">
		<div class="sliderhero_menu_title">
			<h2 style="font-size: 26px;">Slider-Hero</h2>
		</div>
		<p class="hero_create_slider_header">Choose an Effect to Start Creating a New Slider. Choose "No Effect" if You Want a Simple Image Slider or only Video Background.</p>
		<div class="form_wrapper_sliderhero">
			
			<div class="hero-intro-effect">
				<a href="<?php echo admin_url( 'admin.php?page=Slider-Hero&task=addslider&type=intro'); ?>">
					<img src="<?php echo QCLD_sliderhero_IMAGES.'/intro_effect.jpg' ?>" alt="Intro Builder" />
					
				</a>
			</div>
			<div class="effect_selection_area">
				<a href="<?php echo admin_url( 'admin.php?page=Slider-Hero&task=addslider&type=no_effect'); ?>">
					<img src="<?php echo QCLD_sliderhero_IMAGES.'/no-effect.jpg' ?>" alt="" />
					<p>No Effect</p>
				</a>
				
				
				<a href="<?php echo admin_url( 'admin.php?page=Slider-Hero&task=addslider&type=particle'); ?>">
					<img src="<?php echo QCLD_sliderhero_IMAGES.'/default.jpg' ?>" alt="" />
					<p>Particle Effect</p>
				</a>
				<a href="<?php echo admin_url( 'admin.php?page=Slider-Hero&task=addslider&type=particle_snow'); ?>">
					<img src="<?php echo QCLD_sliderhero_IMAGES.'/snow.jpg' ?>" alt="" />
					<p>Snow Effect</p>
				</a>

				
				<a href="<?php echo admin_url( 'admin.php?page=Slider-Hero&task=addslider&type=particle_nasa'); ?>">
					<img src="<?php echo QCLD_sliderhero_IMAGES.'/nasa.jpg' ?>" alt="" />
					<p>NASA</p>
				</a>
				<a href="<?php echo admin_url( 'admin.php?page=Slider-Hero&task=addslider&type=particle_bubble'); ?>">
					<img src="<?php echo QCLD_sliderhero_IMAGES.'/bubble.jpg' ?>" alt="" />
					<p>Bubble</p>
				</a>
				<a href="<?php echo admin_url( 'admin.php?page=Slider-Hero&task=addslider&type=nyan_cat'); ?>">
					<img src="<?php echo QCLD_sliderhero_IMAGES.'/nyan_cat.jpg' ?>" alt="" />
					<p>Nyan Cat</p>
				</a>
				<a href="<?php echo admin_url( 'admin.php?page=Slider-Hero&task=addslider&type=torus'); ?>">
					<img src="<?php echo QCLD_sliderhero_IMAGES.'/torus.jpg' ?>" alt="" />
					<p>Torus of Cubes</p>
				</a>
				<div style="clear:both"></div>
				<div class="hero_pro_effects">
					
					<div class="unlink-pro">
						<img src="<?php echo QCLD_sliderhero_IMAGES.'/aeronautics.jpg' ?>" alt="Aeronautics Effect" />
						<p>Aeronautics Effect<span>[PRO]</span></p>
					</div>				
					<div class="unlink-pro">
						<img src="<?php echo QCLD_sliderhero_IMAGES.'/antigravity.jpg' ?>" alt="Antigravity Flow" />
						<p>Antigravity Flow<span>[PRO]</span></p>
					</div>
					
					<div class="unlink-pro">
						<img src="<?php echo QCLD_sliderhero_IMAGES.'/animated_cloud.jpg' ?>" alt="Animated Cloud" />
						<p>Animated Cloud<span>[PRO]</span></p>
					</div>
					
					
					
					<div class="unlink-pro">
						<img src="<?php echo QCLD_sliderhero_IMAGES.'/ballsgravity.jpg' ?>" alt="Balls & Gravity Effect" />
						<p>Balls & Gravity Effect<span>[PRO]</span></p>
					</div>
					
					<div class="unlink-pro">
						<img src="<?php echo QCLD_sliderhero_IMAGES.'/bird.png' ?>" alt="Bird Flying Effect" />
						<p>Bird Flying Effect<span>[PRO]</span></p>
					</div>
					
					<div class="unlink-pro">
						<img src="<?php echo QCLD_sliderhero_IMAGES.'/blob.jpg' ?>" alt="Blob Effect" />
						<p>Blob Effect<span>[PRO]</span></p>
					</div>
					
					<div class="unlink-pro">
						<img src="<?php echo QCLD_sliderhero_IMAGES.'/glitch.jpg' ?>" alt="Blade Effect" />
						<p>Blade Effect<span>[PRO]</span></p>
					</div>
					<div class="unlink-pro">
						<img src="<?php echo QCLD_sliderhero_IMAGES.'/blur.jpg' ?>" alt="Blur Effect" />
						<p>Blur Effect<span>[PRO]</span></p>
					</div>
					
					<div class="unlink-pro">
						<img src="<?php echo QCLD_sliderhero_IMAGES.'/campfire.jpg' ?>" alt="Campfire" />
						<p>Campfire<span>[PRO]</span></p>
					</div>
					<div class="unlink-pro">
						<img src="<?php echo QCLD_sliderhero_IMAGES.'/circle.jpg' ?>" alt="Circle Circle Intersection" />
						<p>Circle Circle Intersection<span>[PRO]</span></p>
					</div>
					<div class="unlink-pro">
						<img src="<?php echo QCLD_sliderhero_IMAGES.'/cloudysky.jpg' ?>" alt="Cloudy Sky Effect" />
						<p>Cloudy Sky Effect<span>[PRO]</span></p>
					</div>				
					<div class="unlink-pro">
						<img src="<?php echo QCLD_sliderhero_IMAGES.'/confetti.jpg' ?>" alt="Confetti Effect" />
						<p>Confetti Effect<span>[PRO]</span></p>
					</div>
					<div class="unlink-pro">
						<img src="<?php echo QCLD_sliderhero_IMAGES.'/cosmic_web.jpg' ?>" alt="Cosmic Web" />
						<p>Cosmic Web<span>[PRO]</span></p>
					</div>				
					<div class="unlink-pro">
						<img src="<?php echo QCLD_sliderhero_IMAGES.'/colorful_particle.jpg' ?>" alt="Colorful Particle" />
						<p>Colorful Particle<span>[PRO]</span></p>
					</div>
					<div class="unlink-pro">
						<img src="<?php echo QCLD_sliderhero_IMAGES.'/cursorandpaint.jpg' ?>" alt="Cursor And Paint" />
						<p>Cursor And Paint<span>[PRO]</span></p>
					</div>
					
					<div class="unlink-pro">
						<img src="<?php echo QCLD_sliderhero_IMAGES.'/daynight.jpg' ?>" alt="Day Night Effect" />
						<p>Day Night Effect<span>[PRO]</span></p>
					</div>
					<div class="unlink-pro">
						<img src="<?php echo QCLD_sliderhero_IMAGES.'/division.jpg' ?>" alt="Division Effect" />
						<p>Division Effect<span>[PRO]</span></p>
					</div>
					<div class="unlink-pro">
						<img src="<?php echo QCLD_sliderhero_IMAGES.'/directional.jpg' ?>" alt="Directional Force" />
						<p>Directional Force<span>[PRO]</span></p>
					</div>
					<div class="unlink-pro">
						<img src="<?php echo QCLD_sliderhero_IMAGES.'/distance.jpg' ?>" alt="Distance" />
						<p>Distance<span>[PRO]</span></p>
					</div>
					
					<div class="unlink-pro">
						<img src="<?php echo QCLD_sliderhero_IMAGES.'/electric_clock.jpg' ?>" alt="Electric Clock" />
						<p>Electric Clock<span>[PRO]</span></p>
					</div>

					<div class="unlink-pro">
						<img src="<?php echo QCLD_sliderhero_IMAGES.'/firework.jpg' ?>" alt="Firework" />
						<p>Firework<span>[PRO]</span></p>
					</div>
					
					<div class="unlink-pro">
						<img src="<?php echo QCLD_sliderhero_IMAGES.'/fizzy_sparks.jpg' ?>" alt="Fizzy Sparks" />
						<p>Fizzy Sparks<span>[PRO]</span></p>
					</div>
					
					<div class="unlink-pro">
						<img src="<?php echo QCLD_sliderhero_IMAGES.'/floatrain.jpg' ?>" alt="Float and Rain" />
						<p>Float and Rain<span>[PRO]</span></p>
					</div>
					
					<div class="unlink-pro">
						<img src="<?php echo QCLD_sliderhero_IMAGES.'/floatingleafs.png' ?>" alt="Floating Leafs" />
						<p>Floating Leafs<span>[PRO]</span></p>
					</div>
					
					<div class="unlink-pro">
						<img src="<?php echo QCLD_sliderhero_IMAGES.'/flowingcircle.jpg' ?>" alt="Flowing Circle Effect" />
						<p>Flowing Circle Effect<span>[PRO]</span></p>
					</div>
					<div class="unlink-pro">
						<img src="<?php echo QCLD_sliderhero_IMAGES.'/flyingrocket.jpg' ?>" alt="Flying Rocket Effect" />
						<p>Flying Rocket Effect<span>[PRO]</span></p>
					</div>

					<div class="unlink-pro">
						<img src="<?php echo QCLD_sliderhero_IMAGES.'/grid.jpg' ?>" alt="Grid Effect" />
						<p>Grid Effect<span>[PRO]</span></p>
					</div>

					
					
					<div class="unlink-pro">
						<img src="<?php echo QCLD_sliderhero_IMAGES.'/corruption.jpg' ?>" alt="Helix Corruption" />
						<p>Helix Corruption<span>[PRO]</span></p>
					</div>
					<div class="unlink-pro">
						<img src="<?php echo QCLD_sliderhero_IMAGES.'/chaos.jpg' ?>" alt="Helix Chaos" />
						<p>Helix Chaos<span>[PRO]</span></p>
					</div>
					
					<div class="unlink-pro">
						<img src="<?php echo QCLD_sliderhero_IMAGES.'/helix_multiple.jpg' ?>" alt="Helix Multiple" />
						<p>Helix Multiple<span>[PRO]</span></p>
					</div>
					
					<div class="unlink-pro">
						<img src="<?php echo QCLD_sliderhero_IMAGES.'/hero_404.jpg' ?>" alt="Glitch" />
						<p>Glitch<span>[PRO]</span></p>
					</div>

					<div class="unlink-pro">
						<img src="<?php echo QCLD_sliderhero_IMAGES.'/iconsahedron.jpg' ?>" alt="Iconsahedron Effect" />
						<p>Iconsahedron Effect<span>[PRO]</span></p>
					</div>
					<div class="unlink-pro">
						<img src="<?php echo QCLD_sliderhero_IMAGES.'/line.jpg' ?>" alt="Intersecting Line Effect" />
						<p>Intersecting Line Effect<span>[PRO]</span></p>
					</div>
					
					

					<div class="unlink-pro">
						<img src="<?php echo QCLD_sliderhero_IMAGES.'/just_cloud.jpg' ?>" alt="Just Cloud" />
						<p>Just Cloud<span>[PRO]</span></p>
					</div>

					<div class="unlink-pro">
						<img src="<?php echo QCLD_sliderhero_IMAGES.'/link_particle.jpg' ?>" alt="Link Particle" />
						<p>Link Particle<span>[PRO]</span></p>
					</div>
					
					<div class="unlink-pro">
						<img src="<?php echo QCLD_sliderhero_IMAGES.'/liquid_landscape.jpg' ?>" alt="Liquid Landscape" />
						<p>Liquid Landscape<span>[PRO]</span></p>
					</div>

					<div class="unlink-pro">
						<img src="<?php echo QCLD_sliderhero_IMAGES.'/matrix.jpg' ?>" alt="Matrix Effect" />
						<p>Matrix Effect<span>[PRO]</span></p>
					</div>
					<div class="unlink-pro">
						<img src="<?php echo QCLD_sliderhero_IMAGES.'/metaballs.jpg' ?>" alt="Metaballs" />
						<p>Metaballs<span>[PRO]</span></p>
					</div>
					<div class="unlink-pro">
						<img src="<?php echo QCLD_sliderhero_IMAGES.'/microcosm.jpg' ?>" alt="Microcosm Effect" />
						<p>Microcosm Effect<span>[PRO]</span></p>
					</div>
					
					<div class="unlink-pro">
						<img src="<?php echo QCLD_sliderhero_IMAGES.'/svg_animation.jpg' ?>" alt="Moving Color Wave" />
						<p>Moving Color Wave<span>[PRO]</span></p>
					</div>

								
					<div class="unlink-pro">
						<img src="<?php echo QCLD_sliderhero_IMAGES.'/neno_hexagon.jpg' ?>" alt="Neno Hexagon" />
						<p>Neno Hexagon<span>[PRO]</span></p>
					</div>

					<div class="unlink-pro">
						<img src="<?php echo QCLD_sliderhero_IMAGES.'/noise_particle.jpg' ?>" alt="Noise Effect" />
						<p>Noise Effect<span>[PRO]</span></p>
					</div>
					

					<div class="unlink-pro">
						<img src="<?php echo QCLD_sliderhero_IMAGES.'/orbital.jpg' ?>" alt="Orbital Effect" />
						<p>Orbital Effect<span>[PRO]</span></p>
					</div>

					
					<div class="unlink-pro">
						<img src="<?php echo QCLD_sliderhero_IMAGES.'/helix.jpg' ?>" alt="Particle Helix" />
						<p>Particle Helix<span>[PRO]</span></p>
					</div>
					
					<div class="unlink-pro">
						<img src="<?php echo QCLD_sliderhero_IMAGES.'/particle_system.jpg' ?>" alt="Particle System" />
						<p>Particle System<span>[PRO]</span></p>
					</div>
					
					<div class="unlink-pro">
						<img src="<?php echo QCLD_sliderhero_IMAGES.'/pretent_hacker.jpg' ?>" alt="Hacker" />
						<p>Hacker<span>[PRO]</span></p>
					</div>
					<div class="unlink-pro">
						<img src="<?php echo QCLD_sliderhero_IMAGES.'/physics_bug.jpg' ?>" alt="Physics Bug" />
						<p>Physics Bug<span>[PRO]</span></p>
					</div>
					<div class="unlink-pro">
						<img src="<?php echo QCLD_sliderhero_IMAGES.'/racing_particles.jpg' ?>" alt="Racing Particles" />
						<p>Racing Particles<span>[PRO]</span></p>
					</div>
					<div class="unlink-pro">
						<img src="<?php echo QCLD_sliderhero_IMAGES.'/rain.jpg' ?>" alt="Rain Effect" />
						<p>Rain Effect<span>[PRO]</span></p>
					</div>
					<div class="unlink-pro">
						<img src="<?php echo QCLD_sliderhero_IMAGES.'/rainy_season.jpg' ?>" alt="rainy_season" />
						<p>Rainy Season<span>[PRO]</span></p>
					</div>
					
					<div class="unlink-pro">
						<img src="<?php echo QCLD_sliderhero_IMAGES.'/rays_particles.jpg' ?>" alt="Rays and Particles" />
						<p>Rays and Particles<span>[PRO]</span></p>
					</div>
					<div class="unlink-pro">
						<img src="<?php echo QCLD_sliderhero_IMAGES.'/ripples.jpg' ?>" alt="Ripples" />
						<p>Ripples Effect<span>[PRO]</span></p>
					</div>
					
					
					<div class="unlink-pro">
						<img src="<?php echo QCLD_sliderhero_IMAGES.'/hero_game.jpg' ?>" alt="Play or Work?" />
						<p>Play or Work?<span>[PRO]</span></p>
					</div>

					
					<div class="unlink-pro">
						<img src="<?php echo QCLD_sliderhero_IMAGES.'/rainofline.jpg' ?>" alt="Rain Of Line" />
						<p>Rain Of Line<span>[PRO]</span></p>
					</div>
					
					<div class="unlink-pro">
						<img src="<?php echo QCLD_sliderhero_IMAGES.'/rising_cubes.jpg' ?>" alt="Rising and falling cubes" />
						<p>Rising and falling cubes<span>[PRO]</span></p>
					</div>

					<div class="unlink-pro">
						<img src="<?php echo QCLD_sliderhero_IMAGES.'/shapanimation.jpg' ?>" alt="Shape Animation" />
						<p>Shape Animation<span>[PRO]</span></p>
					</div>
					
					<div class="unlink-pro">
						<img src="<?php echo QCLD_sliderhero_IMAGES.'/space_elevator.jpg' ?>" alt="Space Elevator" />
						<p>Space Elevator<span>[PRO]</span></p>
					</div>
					
									
					<div class="unlink-pro">
						<img src="<?php echo QCLD_sliderhero_IMAGES.'/squidematics.jpg' ?>" alt="Squidematics" />
						<p>Squidematics<span>[PRO]</span></p>
					</div>	
					<div class="unlink-pro">
						<img src="<?php echo QCLD_sliderhero_IMAGES.'/stars.jpg' ?>" alt="Stars Effect" />
						<p>Stars Effect<span>[PRO]</span></p>
					</div>				
					<div class="unlink-pro">
						<img src="<?php echo QCLD_sliderhero_IMAGES.'/stellar.jpg' ?>" alt="Stellar Cloud" />
						<p>Stellar Cloud<span>[PRO]</span></p>
					</div>
					
					<div class="unlink-pro">
						<img src="<?php echo QCLD_sliderhero_IMAGES.'/stripe-cube.jpg' ?>" alt="Stripe Cude Effect" />
						<p>Stripe Cube Effect<span>[PRO]</span></p>
					</div>

					
					<div class="unlink-pro">
						<img src="<?php echo QCLD_sliderhero_IMAGES.'/subvisual.png' ?>" alt="Subvisual" />
						<p>Subvisual<span>[PRO]</span></p>
					</div>
					

					<div class="unlink-pro">
						<img src="<?php echo QCLD_sliderhero_IMAGES.'/tagcanvas.jpg' ?>" alt="Tag Canvas" />
						<p>Tag Canvas<span>[PRO]</span></p>
					</div>
					
					<div class="unlink-pro">
						<img src="<?php echo QCLD_sliderhero_IMAGES.'/header_banner.jpg' ?>" alt="The Great Attractor" />
						<p>The Great Attractor<span>[PRO]</span></p>
					</div>
					
					<div class="unlink-pro">
						<img src="<?php echo QCLD_sliderhero_IMAGES.'/thibaut.jpg' ?>" alt="Thibaut" />
						<p>Thibaut<span>[PRO]</span></p>
					</div>
					<div class="unlink-pro">
						<img src="<?php echo QCLD_sliderhero_IMAGES.'/tiny_galaxy.jpg' ?>" alt="Tiny Galaxy Effect" />
						<p>Tiny Galaxy Effect<span>[PRO]</span></p>
					</div>
					<div class="unlink-pro">
						<img src="<?php echo QCLD_sliderhero_IMAGES.'/torus.jpg' ?>" alt="Torus of Cubes" />
						<p>Torus of Cubes<span>[PRO]</span></p>
					</div>

					<div class="unlink-pro">
						<img src="<?php echo QCLD_sliderhero_IMAGES.'/water.jpg' ?>" alt="Water Effect" />
						<p>Water Effect<span>[PRO]</span></p>
					</div>
					
					<div class="unlink-pro">
						<img src="<?php echo QCLD_sliderhero_IMAGES.'/wave.jpg' ?>" alt="Wave Effect" />
						<p>Wave Effect<span>[PRO]</span></p>
					</div>
					
					<div class="unlink-pro">
						<img src="<?php echo QCLD_sliderhero_IMAGES.'/wave_animation.jpg' ?>" alt="Wave Animation Effect" />
						<p>Wave Animation Effect<span>[PRO]</span></p>
					</div>
					
					<div class="unlink-pro">
						<img src="<?php echo QCLD_sliderhero_IMAGES.'/waaave.jpg' ?>" alt="Waaave Canvas" />
						<p>Waaave Canvas<span>[PRO]</span></p>
					</div>
					<div class="unlink-pro">
						<img src="<?php echo QCLD_sliderhero_IMAGES.'/walkingbg.jpg' ?>" alt="Walking Background" />
						<p>Walking Background<span>[PRO]</span></p>
					</div>
					<div class="unlink-pro">
						<img src="<?php echo QCLD_sliderhero_IMAGES.'/wrap_speed.jpg' ?>" alt="Wrap Speed" />
						<p>Warp Speed<span>[PRO]</span></p>
					</div>
					<div class="unlink-pro">
						<img src="<?php echo QCLD_sliderhero_IMAGES.'/water_swimming.jpg' ?>" alt="Water Swimming" />
						<p>Water Swimming<span>[PRO]</span></p>
					</div>
					<div class="unlink-pro">
						<img src="<?php echo QCLD_sliderhero_IMAGES.'/waving_cloth.jpg' ?>" alt="Waving Cloth" />
						<p>Waving Cloth<span>[PRO]</span></p>
					</div>
					
					<div class="unlink-pro">
						<img src="<?php echo QCLD_sliderhero_IMAGES.'/waterdroplet.jpg' ?>" alt="Water Droplet" />
						<p>Water Droplet<span>[PRO]</span></p>
					</div>
					<div class="unlink-pro">
						<img src="<?php echo QCLD_sliderhero_IMAGES.'/wormhole.jpg' ?>" alt="Wormhole Effect" />
						<p>Wormhole Effect<span>[PRO]</span></p>
					</div>
					<div class="unlink-pro">
						<img src="<?php echo QCLD_sliderhero_IMAGES.'/wordcloud.jpg' ?>" alt="Word Cloud" />
						<p>Word Cloud<span>[PRO]</span></p>
					</div>

					<div class="unlink-pro">
						<img src="<?php echo QCLD_sliderhero_IMAGES.'/valentine.jpg' ?>" alt="Valentine Effect" />
						<p>Valentine Effect<span>[PRO]</span></p>
					</div>
					
					<div class="unlink-pro">
						<img src="<?php echo QCLD_sliderhero_IMAGES.'/ygekpg.jpg' ?>" alt="Ygekpg Effect" />
						<p>Ygekpg Effect<span>[PRO]</span></p>
					</div>
				</div>
				
			</div>			
		</div>

	</div>
	<?php
}

