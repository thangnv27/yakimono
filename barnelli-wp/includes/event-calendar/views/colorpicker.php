<div id="yocalcolorpicker" style="display:none"></div>
<div><button id="yocal-getstyle-colors" class="button" style="margin-bottom:10px"><?php _e('Get selected style colors', 'YoPressEventCalendar');?></button></div>
<?php foreach($colors as $key => $title) : ?>
	<span style="width:200px; display: block; float: left"><?php _e($title, 'YoPressEventCalendar');?> :</span>
	<input type="text" name="<?php echo  $this->nameFormAttribute('color'.$key);?>"
	   value="<?php echo $this->valueForAttribute('color'.$key);?>"
	   class="yocalendarColorPicker" data-default-color="#fff" id="<?php echo 'color'.$key;?>"/>
	<br/>
<?php endforeach; ?>

<script>
	var yocalstyles = <?php echo json_encode($this->styles)?>;
</script>