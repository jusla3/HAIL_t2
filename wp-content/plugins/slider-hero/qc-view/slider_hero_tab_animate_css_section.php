<div class="othersetting">
								<div class="params titleffect customitemstyle">
                                    <label class="customlevel" for="qcslide-effect-slideffect"><?php _e('Title In Effect', 'qcslide'); ?>:</label>
									<select class="myElements" name="params[titleffect]">
										<option value="">Normal</option>
										<option value="bounceInLeft" <?php echo ($params->titleffect=='bounceInLeft'?'selected="selected"':''); ?>>bounceInLeft</option>
										
										<option value="bounceInRight" <?php echo ($params->titleffect=='bounceInRight'?'selected="selected"':''); ?>>bounceInRight</option>
										<option value="rotateInDownLeft" <?php echo ($params->titleffect=='rotateInDownLeft'?'selected="selected"':''); ?>>rotateInDownLeft</option>
										<option value="rotateInDownRight" <?php echo ($params->titleffect=='rotateInDownRight'?'selected="selected"':''); ?>>rotateInDownRight</option>
										
										<option value="fadeInLeft" <?php echo ($params->titleffect=='fadeInLeft'?'selected="selected"':''); ?>>fadeInLeft</option>
										<option value="fadeInRight" <?php echo ($params->titleffect=='fadeInRight'?'selected="selected"':''); ?>>fadeInRight</option>
										<option value="slideInLeft" <?php echo ($params->titleffect=='slideInLeft'?'selected="selected"':''); ?>>slideInLeft</option>
										<option value="slideInRight" <?php echo ($params->titleffect=='slideInRight'?'selected="selected"':''); ?>>slideInRight</option>
										<option value="zoomInLeft" <?php echo ($params->titleffect=='zoomInLeft'?'selected="selected"':''); ?>>zoomInLeft</option>
										<option value="zoomInRight" <?php echo ($params->titleffect=='zoomInRight'?'selected="selected"':''); ?>>zoomInRight</option>
										<option value="zoomInUp" <?php echo ($params->titleffect=='zoomInUp'?'selected="selected"':''); ?>>zoomInUp</option>
										<option value="zoomInDown" <?php echo ($params->titleffect=='zoomInDown'?'selected="selected"':''); ?>>zoomInDown</option>
										<option value="flipInX" <?php echo ($params->titleffect=='flipInX'?'selected="selected"':''); ?>>flipInX</option>
										<option value="flipInY" <?php echo ($params->titleffect=='flipInY'?'selected="selected"':''); ?>>flipInY</option>
										<option value="swing" <?php echo ($params->titleffect=='swing'?'selected="selected"':''); ?>>swing</option>
										<option value="rubberBand" <?php echo ($params->titleffect=='rubberBand'?'selected="selected"':''); ?>>rubberBand</option>
										<option value="flash" <?php echo ($params->titleffect=='flash'?'selected="selected"':''); ?>>flash</option>
										<option value="wobble" <?php echo ($params->titleffect=='wobble'?'selected="selected"':''); ?>>wobble</option>
										<option value="rollIn" <?php echo ($params->titleffect=='rollIn'?'selected="selected"':''); ?>>rollIn</option>
										
									</select>
                                    
                                </div>
								<div class="params deseffect customitemstyle">
		<label class="customlevel" for="qcslide-effect-slideffect"><?php _e('Title Out Effect', 'qcslide'); ?>:</label>
		<select class="myElements" name="params[titleouteffect]">
			<option value="">Normal</option>
										
			
			<option value="bounce" <?php echo (isset($params->titleouteffect) && $params->titleouteffect=='bounce'?'selected="selected"':''); ?>>Bounce</option>
			<option value="flash" <?php echo (isset($params->titleouteffect) && $params->titleouteffect=='flash'?'selected="selected"':''); ?>>Flash</option>
			<option value="pulse" <?php echo (isset($params->titleouteffect) && $params->titleouteffect=='pulse'?'selected="selected"':''); ?>>Pulse</option>
			<option value="rubberBand" <?php echo (isset($params->titleouteffect) && $params->titleouteffect=='rubberBand'?'selected="selected"':''); ?>>RubberBand</option>
			<option value="shake" <?php echo (isset($params->titleouteffect) && $params->titleouteffect=='shake'?'selected="selected"':''); ?>>Shake</option>
			<option value="headShake" <?php echo (isset($params->titleouteffect) && $params->titleouteffect=='headShake'?'selected="selected"':''); ?>>HeadShake</option>
			<option value="swing" <?php echo (isset($params->titleouteffect) && $params->titleouteffect=='swing'?'selected="selected"':''); ?>>Swing</option>
			<option value="tada" <?php echo (isset($params->titleouteffect) && $params->titleouteffect=='tada'?'selected="selected"':''); ?>>Tada</option>
			<option value="wobble" <?php echo (isset($params->titleouteffect) && $params->titleouteffect=='wobble'?'selected="selected"':''); ?>>Wobble</option>
			<option value="jello" <?php echo (isset($params->titleouteffect) && $params->titleouteffect=='jello'?'selected="selected"':''); ?>>Jello</option>

			<option value="bounceOut" <?php echo (isset($params->titleouteffect) && $params->titleouteffect=='bounceOut'?'selected="selected"':''); ?>>BounceOut</option>
			<option value="bounceOutDown" <?php echo (isset($params->titleouteffect) && $params->titleouteffect=='bounceOutDown'?'selected="selected"':''); ?>>BounceOutDown</option>
			<option value="bounceOutLeft" <?php echo (isset($params->titleouteffect) && $params->titleouteffect=='bounceOutLeft'?'selected="selected"':''); ?>>BounceOutLeft</option>
			<option value="bounceOutRight" <?php echo (isset($params->titleouteffect) && $params->titleouteffect=='bounceOutRight'?'selected="selected"':''); ?>>BounceOutRight</option>
			<option value="bounceOutUp" <?php echo (isset($params->titleouteffect) && $params->titleouteffect=='bounceOutUp'?'selected="selected"':''); ?>>BounceOutUp</option>

			<option value="fadeOut" <?php echo (isset($params->titleouteffect) && $params->titleouteffect=='fadeOut'?'selected="selected"':''); ?>>FadeOut</option>
			<option value="fadeOutDown" <?php echo (isset($params->titleouteffect) && $params->titleouteffect=='fadeOutDown'?'selected="selected"':''); ?>>FadeOutDown</option>
			<option value="fadeOutDownBig" <?php echo (isset($params->titleouteffect) && $params->titleouteffect=='fadeOutDownBig'?'selected="selected"':''); ?>>FadeOutDownBig</option>
			<option value="fadeOutLeft" <?php echo (isset($params->titleouteffect) && $params->titleouteffect=='fadeOutLeft'?'selected="selected"':''); ?>>FadeOutLeft</option>
			<option value="fadeOutLeftBig" <?php echo (isset($params->titleouteffect) && $params->titleouteffect=='fadeOutLeftBig'?'selected="selected"':''); ?>>FadeOutLeftBig</option>
			<option value="fadeOutRight" <?php echo (isset($params->titleouteffect) && $params->titleouteffect=='fadeOutRight'?'selected="selected"':''); ?>>FadeOutRight</option>
			<option value="fadeOutRightBig" <?php echo (isset($params->titleouteffect) && $params->titleouteffect=='fadeOutRightBig'?'selected="selected"':''); ?>>FadeOutRightBig</option>
			<option value="fadeOutUp" <?php echo (isset($params->titleouteffect) && $params->titleouteffect=='fadeOutUp'?'selected="selected"':''); ?>>FadeOutUp</option>
			<option value="fadeOutUpBig" <?php echo (isset($params->titleouteffect) && $params->titleouteffect=='fadeOutUpBig'?'selected="selected"':''); ?>>FadeOutUpBig</option>

			<option value="flipOutX" <?php echo (isset($params->titleouteffect) && $params->titleouteffect=='flipOutX'?'selected="selected"':''); ?>>FlipOutX</option>
			<option value="flipOutY" <?php echo (isset($params->titleouteffect) && $params->titleouteffect=='flipOutY'?'selected="selected"':''); ?>>FlipOutY</option>

			<option value="lightSpeedOut" <?php echo (isset($params->titleouteffect) && $params->titleouteffect=='lightSpeedOut'?'selected="selected"':''); ?>>LightSpeedOut</option>

			<option value="rotateOut" <?php echo (isset($params->titleouteffect) && $params->titleouteffect=='rotateOut'?'selected="selected"':''); ?>>RotateOut</option>
			<option value="rotateOutDownLeft" <?php echo (isset($params->titleouteffect) && $params->titleouteffect=='rotateOutDownLeft'?'selected="selected"':''); ?>>RotateOutDownLeft</option>
			<option value="rotateOutDownRight" <?php echo (isset($params->titleouteffect) && $params->titleouteffect=='rotateOutDownRight'?'selected="selected"':''); ?>>RotateOutDownRight</option>
			<option value="rotateOutUpLeft" <?php echo (isset($params->titleouteffect) && $params->titleouteffect=='rotateOutUpLeft'?'selected="selected"':''); ?>>RotateOutUpLeft</option>
			<option value="rotateOutUpRight" <?php echo (isset($params->titleouteffect) && $params->titleouteffect=='rotateOutUpRight'?'selected="selected"':''); ?>>RotateOutUpRight</option>
			<option value="hinge" <?php echo (isset($params->titleouteffect) && $params->titleouteffect=='hinge'?'selected="selected"':''); ?>>Hinge</option>
			<option value="jackInTheBox" <?php echo (isset($params->titleouteffect) && $params->titleouteffect=='jackInTheBox'?'selected="selected"':''); ?>>JackInTheBox</option>

			<option value="rollOut" <?php echo (isset($params->titleouteffect) && $params->titleouteffect=='rollOut'?'selected="selected"':''); ?>>RollOut</option>

			<option value="zoomOut" <?php echo (isset($params->titleouteffect) && $params->titleouteffect=='zoomOut'?'selected="selected"':''); ?>>ZoomOut</option>
			<option value="zoomOutDown" <?php echo (isset($params->titleouteffect) && $params->titleouteffect=='zoomOutDown'?'selected="selected"':''); ?>>ZoomOutDown</option>
			<option value="zoomOutLeft" <?php echo (isset($params->titleouteffect) && $params->titleouteffect=='zoomOutLeft'?'selected="selected"':''); ?>>ZoomOutLeft</option>
			<option value="zoomOutRight" <?php echo (isset($params->titleouteffect) && $params->titleouteffect=='zoomOutRight'?'selected="selected"':''); ?>>ZoomOutRight</option>
			<option value="zoomOutUp" <?php echo (isset($params->titleouteffect) && $params->titleouteffect=='zoomOutUp'?'selected="selected"':''); ?>>ZoomOutUp</option>

			<option value="slideOutDown" <?php echo (isset($params->titleouteffect) && $params->titleouteffect=='slideOutDown'?'selected="selected"':''); ?>>SlideOutDown</option>
			<option value="slideOutLeft" <?php echo (isset($params->titleouteffect) && $params->titleouteffect=='slideOutLeft'?'selected="selected"':''); ?>>SlideOutLeft</option>
			<option value="slideOutRight" <?php echo (isset($params->titleouteffect) && $params->titleouteffect=='slideOutRight'?'selected="selected"':''); ?>>SlideOutRight</option>
			<option value="slideOutUp" <?php echo (isset($params->titleouteffect) && $params->titleouteffect=='slideOutUp'?'selected="selected"':''); ?>>SlideOutUp</option>
			

											
										
		</select>
                                    
    </div>
                                <div class="params deseffect customitemstyle">
                                    <label class="customlevel" for="qcslide-effect-slideffect"><?php _e('Description In Effect', 'qcslide'); ?>:</label>
									<select class="myElements" name="params[deseffect]">
										<option value="">Normal</option>
										<option value="bounceInLeft" <?php echo ($params->deseffect=='bounceInLeft'?'selected="selected"':''); ?>>bounceInLeft</option>
										
										<option value="bounceInRight" <?php echo ($params->deseffect=='bounceInRight'?'selected="selected"':''); ?>>bounceInRight</option>
										<option value="rotateInDownLeft" <?php echo ($params->deseffect=='rotateInDownLeft'?'selected="selected"':''); ?>>rotateInDownLeft</option>
										<option value="rotateInDownRight" <?php echo ($params->deseffect=='rotateInDownRight'?'selected="selected"':''); ?>>rotateInDownRight</option>
										
										<option value="fadeInLeft" <?php echo ($params->deseffect=='fadeInLeft'?'selected="selected"':''); ?>>fadeInLeft</option>
										<option value="fadeInRight" <?php echo ($params->deseffect=='fadeInRight'?'selected="selected"':''); ?>>fadeInRight</option>
										<option value="slideInLeft" <?php echo ($params->deseffect=='slideInLeft'?'selected="selected"':''); ?>>slideInLeft</option>
										<option value="slideInRight" <?php echo ($params->deseffect=='slideInRight'?'selected="selected"':''); ?>>slideInRight</option>
										<option value="zoomInLeft" <?php echo ($params->deseffect=='zoomInLeft'?'selected="selected"':''); ?>>zoomInLeft</option>
										<option value="zoomInRight" <?php echo ($params->deseffect=='zoomInRight'?'selected="selected"':''); ?>>zoomInRight</option>
										<option value="zoomInUp" <?php echo ($params->deseffect=='zoomInUp'?'selected="selected"':''); ?>>zoomInUp</option>
										<option value="zoomInDown" <?php echo ($params->deseffect=='zoomInDown'?'selected="selected"':''); ?>>zoomInDown</option>
										<option value="flipInX" <?php echo ($params->deseffect=='flipInX'?'selected="selected"':''); ?>>flipInX</option>
										<option value="flipInY" <?php echo ($params->deseffect=='flipInY'?'selected="selected"':''); ?>>flipInY</option>
										<option value="swing" <?php echo ($params->deseffect=='swing'?'selected="selected"':''); ?>>swing</option>
										<option value="rubberBand" <?php echo ($params->deseffect=='rubberBand'?'selected="selected"':''); ?>>rubberBand</option>
										<option value="flash" <?php echo ($params->deseffect=='flash'?'selected="selected"':''); ?>>flash</option>
										<option value="wobble" <?php echo ($params->deseffect=='wobble'?'selected="selected"':''); ?>>wobble</option>
										<option value="rollIn" <?php echo ($params->deseffect=='rollIn'?'selected="selected"':''); ?>>rollIn</option>
										
									</select>
                                    
                                </div>
<div class="params deseffect customitemstyle">
		<label class="customlevel" for="qcslide-effect-slideffect"><?php _e('Description Out Effect', 'qcslide'); ?>:</label>
		<select class="myElements" name="params[descouteffect]">
			<option value="">Normal</option>
												
			<option value="bounce" <?php echo (isset($params->descouteffect) && $params->descouteffect=='bounce'?'selected="selected"':''); ?>>Bounce</option>
			<option value="flash" <?php echo (isset($params->descouteffect) && $params->descouteffect=='flash'?'selected="selected"':''); ?>>Flash</option>
			<option value="pulse" <?php echo (isset($params->descouteffect) && $params->descouteffect=='pulse'?'selected="selected"':''); ?>>Pulse</option>
			<option value="rubberBand" <?php echo (isset($params->descouteffect) && $params->descouteffect=='rubberBand'?'selected="selected"':''); ?>>RubberBand</option>
			<option value="shake" <?php echo (isset($params->descouteffect) && $params->descouteffect=='shake'?'selected="selected"':''); ?>>Shake</option>
			<option value="headShake" <?php echo (isset($params->descouteffect) && $params->descouteffect=='headShake'?'selected="selected"':''); ?>>HeadShake</option>
			<option value="swing" <?php echo (isset($params->descouteffect) && $params->descouteffect=='swing'?'selected="selected"':''); ?>>Swing</option>
			<option value="tada" <?php echo (isset($params->descouteffect) && $params->descouteffect=='tada'?'selected="selected"':''); ?>>Tada</option>
			<option value="wobble" <?php echo (isset($params->descouteffect) && $params->descouteffect=='wobble'?'selected="selected"':''); ?>>Wobble</option>
			<option value="jello" <?php echo (isset($params->descouteffect) && $params->descouteffect=='jello'?'selected="selected"':''); ?>>Jello</option>

			<option value="bounceOutDown" <?php echo (isset($params->descouteffect) && $params->descouteffect=='bounceOutDown'?'selected="selected"':''); ?>>BounceOutDown</option>
			<option value="bounceOutLeft" <?php echo (isset($params->descouteffect) && $params->descouteffect=='bounceOutLeft'?'selected="selected"':''); ?>>BounceOutLeft</option>
			<option value="bounceOutRight" <?php echo (isset($params->descouteffect) && $params->descouteffect=='bounceOutRight'?'selected="selected"':''); ?>>BounceOutRight</option>
			<option value="bounceOutUp" <?php echo (isset($params->descouteffect) && $params->descouteffect=='bounceOutUp'?'selected="selected"':''); ?>>BounceOutUp</option>

			<option value="fadeOut" <?php echo (isset($params->descouteffect) && $params->descouteffect=='fadeOut'?'selected="selected"':''); ?>>FadeOut</option>
			<option value="fadeOutDown" <?php echo (isset($params->descouteffect) && $params->descouteffect=='fadeOutDown'?'selected="selected"':''); ?>>FadeOutDown</option>
			<option value="fadeOutDownBig" <?php echo (isset($params->descouteffect) && $params->descouteffect=='fadeOutDownBig'?'selected="selected"':''); ?>>FadeOutDownBig</option>
			<option value="fadeOutLeft" <?php echo (isset($params->descouteffect) && $params->descouteffect=='fadeOutLeft'?'selected="selected"':''); ?>>FadeOutLeft</option>
			<option value="fadeOutLeftBig" <?php echo (isset($params->descouteffect) && $params->descouteffect=='fadeOutLeftBig'?'selected="selected"':''); ?>>FadeOutLeftBig</option>
			<option value="fadeOutRight" <?php echo (isset($params->descouteffect) && $params->descouteffect=='fadeOutRight'?'selected="selected"':''); ?>>FadeOutRight</option>
			<option value="fadeOutRightBig" <?php echo (isset($params->descouteffect) && $params->descouteffect=='fadeOutRightBig'?'selected="selected"':''); ?>>FadeOutRightBig</option>
			<option value="fadeOutUp" <?php echo (isset($params->descouteffect) && $params->descouteffect=='fadeOutUp'?'selected="selected"':''); ?>>FadeOutUp</option>
			<option value="fadeOutUpBig" <?php echo (isset($params->descouteffect) && $params->descouteffect=='fadeOutUpBig'?'selected="selected"':''); ?>>FadeOutUpBig</option>

			<option value="flipOutX" <?php echo (isset($params->descouteffect) && $params->descouteffect=='flipOutX'?'selected="selected"':''); ?>>FlipOutX</option>
			<option value="flipOutY" <?php echo (isset($params->descouteffect) && $params->descouteffect=='flipOutY'?'selected="selected"':''); ?>>FlipOutY</option>

			<option value="lightSpeedOut" <?php echo (isset($params->descouteffect) && $params->descouteffect=='lightSpeedOut'?'selected="selected"':''); ?>>LightSpeedOut</option>


			<option value="rotateOut" <?php echo (isset($params->descouteffect) && $params->descouteffect=='rotateOut'?'selected="selected"':''); ?>>RotateOut</option>
			<option value="rotateOutDownLeft" <?php echo (isset($params->descouteffect) && $params->descouteffect=='rotateOutDownLeft'?'selected="selected"':''); ?>>RotateOutDownLeft</option>
			<option value="rotateOutDownRight" <?php echo (isset($params->descouteffect) && $params->descouteffect=='rotateOutDownRight'?'selected="selected"':''); ?>>RotateOutDownRight</option>
			<option value="rotateOutUpLeft" <?php echo (isset($params->descouteffect) && $params->descouteffect=='rotateOutUpLeft'?'selected="selected"':''); ?>>RotateOutUpLeft</option>
			<option value="rotateOutUpRight" <?php echo (isset($params->descouteffect) && $params->descouteffect=='rotateOutUpRight'?'selected="selected"':''); ?>>RotateOutUpRight</option>
			<option value="hinge" <?php echo (isset($params->descouteffect) && $params->descouteffect=='hinge'?'selected="selected"':''); ?>>Hinge</option>

			<option value="zoomOut" <?php echo (isset($params->descouteffect) && $params->descouteffect=='zoomOut'?'selected="selected"':''); ?>>ZoomOut</option>
			<option value="zoomOutDown" <?php echo (isset($params->descouteffect) && $params->descouteffect=='zoomOutDown'?'selected="selected"':''); ?>>ZoomOutDown</option>
			<option value="zoomOutLeft" <?php echo (isset($params->descouteffect) && $params->descouteffect=='zoomOutLeft'?'selected="selected"':''); ?>>ZoomOutLeft</option>
			<option value="zoomOutRight" <?php echo (isset($params->descouteffect) && $params->descouteffect=='zoomOutRight'?'selected="selected"':''); ?>>ZoomOutRight</option>
			<option value="zoomOutUp" <?php echo (isset($params->descouteffect) && $params->descouteffect=='zoomOutUp'?'selected="selected"':''); ?>>ZoomOutUp</option>

			<option value="slideOutDown" <?php echo (isset($params->descouteffect) && $params->descouteffect=='slideOutDown'?'selected="selected"':''); ?>>SlideOutDown</option>
			<option value="slideOutLeft" <?php echo (isset($params->descouteffect) && $params->descouteffect=='slideOutLeft'?'selected="selected"':''); ?>>SlideOutLeft</option>
			<option value="slideOutRight" <?php echo (isset($params->descouteffect) && $params->descouteffect=='slideOutRight'?'selected="selected"':''); ?>>SlideOutRight</option>
			<option value="slideOutUp" <?php echo (isset($params->descouteffect) && $params->descouteffect=='slideOutUp'?'selected="selected"':''); ?>>SlideOutUp</option>
			
										
										
		</select>
		
	</div>

								
								<div class="params titleffect customitemstyle">
                                    <label class="customlevel" for="qcslide-effect-slideffect"><?php _e('Button In Effect', 'qcslide'); ?> <span class="hero_pro_features">[PRO]</span></label>
									<select class="myElements" name="" disabled>
										<option value="">None</option>
										
									</select>
                                    
                                </div>
								<div class="params titleffect customitemstyle">
                                    <label class="customlevel" for="qcslide-effect-slideffect"><?php _e('Button Out Effect', 'qcslide'); ?> <span class="hero_pro_features">[PRO]</span></label>
									<select class="myElements" name="" disabled>
										<option value="">None</option>
										
									</select>
                                    
                                </div>
								
								
									
							</div>