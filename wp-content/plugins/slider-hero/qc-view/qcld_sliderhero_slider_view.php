<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly


function qcld_sliderhero_sliders_view_list( $rows ) { ?>
	
	<div class="qchero_sliders_list_wrapper">
		<div class="sliderhero_menu_title">
			<h2 style="font-size: 26px;">Slider Hero</h2>
			
		</div>
		<div class="slider_hero_button">
			<a class="add-slider" title="<?php _e('Create new slider', 'Slider-Hero'); ?>" href="<?php echo wp_nonce_url(admin_url('admin.php?page=Slider-Hero&task=slidertype'), 'sliderhero_slidertype'); ?>">
			Create New Slider &nbsp;<i class="fa fa-plus"></i></a>
		</div>
		<div class="qchero_slider_table_area">
  <div class="slider_hero_table">
    
    <div class="slider_hero_row header">
      <div class="slider_hero_cell">
        <?php _e('Name', 'Slider-Hero') ?>
      </div>
      <div class="slider_hero_cell">
        <?php _e('Type', 'Slider-Hero') ?>
      </div>
      <div class="slider_hero_cell">
        <?php _e('Slides', 'Slider-Hero'); ?>
      </div>
	  <div class="slider_hero_cell">
        <?php _e('Shortcode', 'Slider-Hero'); ?>
      </div>
	  <div class="slider_hero_cell">
        <?php _e('Duplicate', 'Slider-Hero'); ?>
      </div>
      <div class="slider_hero_cell">
        <?php _e('Remove', 'Slider-Hero'); ?>
      </div>
    </div>
<?php foreach ($rows as $row) { ?>
    <div class="slider_hero_row">
      <div class="slider_hero_cell">
        <a href="<?php echo wp_nonce_url( admin_url('admin.php?page=Slider-Hero&task=editslider&type='.$row->type.'&id=' . $row->id),'sliderhero_editslider_'.$row->id ); ?>"><?php echo stripslashes_deep($row->title); ?></a>
      </div>
      <div class="slider_hero_cell">
        <?php echo $row->type; ?>
      </div>
      <div class="slider_hero_cell">
        <?php echo $row->count; ?>
      </div>
	  <div class="slider_hero_cell">
        <?php echo '[qcld_hero id='.$row->id.']'; ?>
      </div>
	  <div class="slider_hero_cell">
        <a title="duplicate" class="hero_list_duplicate"
		   href="<?php echo wp_nonce_url( admin_url('admin.php?page=Slider-Hero&task=heroduplicateslider&id=' . $row->id), 'slider_hero_duplicateslider_' . $row->id , 'slider_hero_duplicate_nonce') ?>">Copy</a>
      </div>
      <div class="slider_hero_cell">
		<a title="delete" class="hero_delete" onclick="return confirm('Are you sure to delete this slider?')" href="<?php echo wp_nonce_url( admin_url('admin.php?page=Slider-Hero&task=removeslider&id=' . $row->id), 'qcld_sliderhero_removeslider_' . $row->id ) ?>">Delete</a>
      </div>
    </div>
<?php } ?>   

  </div>

	<div class="slider_hero_image">
		
	</div>  
		</div>
	</div>
	<?php
}