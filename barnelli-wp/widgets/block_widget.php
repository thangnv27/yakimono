<?php

function BarnelliBlockWidgetLoad() {
	register_widget('BarnelliBlockWidget');
}

class BarnelliBlockWidget extends WP_Widget {

	function BarnelliBlockWidget() {
		$widgetOptions = array('classname' => 'BarnelliBlockWidget', 'description' => '');
		$controlOptions = array('id_base' => 'BarnelliBlockWidget');
		$this->WP_Widget('BarnelliBlockWidget', 'Barnelli: Block', array('description' => __('Displays block element from restaurant.', THEME_NAME)), array());
	}

	function widget($args, $instance) {
		extract($args);
		echo $before_widget;

		include_once THEME_INCLUDES . '/helpers.php';

		$block =  $instance['block'];
		$indexesArray = explode(',', YSettings::g('restaurant_grid_indexes',''));
		array_pop($indexesArray);
		foreach ($indexesArray as $index) {
			if ($index != '0') {
			$indexName = YSettings::g('theme_grid_name_'.$index);	
				if ($indexName == $block) {
					echo '<div class="square">';
					echo barnelli_generateBlock($index, 'grid_square');
					echo '</div>';
				}
			}
		}

		echo $after_widget;
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;

		$instance['block'] = $new_instance['block'];

		return $instance;
	}

	function form($instance) {
		$defaults = array('block' => '');

		$instance = wp_parse_args((array) $instance, $defaults);
		?>
		<p>
			<label for=""><?php _e('Block', THEME_NAME); ?></label>
			<select name="<?php echo $this->get_field_name('block'); ?>" id="<?php echo $this->get_field_id('block');?>">
				<?php
				$indexesArray = explode(',', YSettings::g('restaurant_grid_indexes',''));
				array_pop($indexesArray);
				foreach ($indexesArray as $index) {
					if ($index != '0') {
						$name = YSettings::g('theme_grid_name_'.$index);
						echo $name;
						echo '<option name="'.$name.' " '.selected($instance['block'], $name, false).'>'.$name.'</option>';	
					}
				}
				?>
			</select>
		</p>
		<?php
	}
}
?>