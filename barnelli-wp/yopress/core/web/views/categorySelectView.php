<select name="<?php echo $yopressname;?>" <?php echo $opts;?>>
<?php
	foreach ($categories as $cat) {
		$selected = selected((int)$cat->cat_ID, (int)$selectedValue, false);
		
		echo '<option value="'.$cat->cat_ID.'" '.$selected.'>'.$cat->cat_name.'</option>';
	}
?>
</select>