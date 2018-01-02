<?php

class WidgetModule {
	
	/**
	 * Render the widgets requested in $ids array
	 * 
	 * @global type $wp_registered_widgets
	 * @global type $sidebars_widgets
	 * @global type $wp_registered_widget_controls
	 * @param type $ids array of wideget ids its the widget name, the same you
	 * pass in config i.e adboxwidget
	 */
	function renderWidgetsByIds($ids) {
		global $wp_registered_widgets, $sidebars_widgets, $wp_registered_widget_controls;

		$sort = $wp_registered_widgets;
		usort($sort, '_sort_name_callback');
		$done = array();

		foreach ($sort as $widget) {
			if (in_array($widget['callback'], $done, true)) // We already showed this multi-widget
				continue;

			$sidebar = is_active_widget($widget['callback'], $widget['id'], false, false);
			$done[] = $widget['callback'];

			if (!isset($widget['params'][0]))
				$widget['params'][0] = array();
		
			$args = array(
				'widget_id' => $widget['id'],
				'widget_name' => $widget['name'],
				'_display' => 'template'
			);
			

			if (isset($wp_registered_widget_controls[$widget['id']]['id_base']) && 
				isset($widget['params'][0]['number'])) {
				$id_base = $wp_registered_widget_controls[$widget['id']]['id_base'];
				$args['_temp_id'] = "$id_base-__i__";
				$args['_multi_num'] = next_widget_id_number($id_base);
				$args['_add'] = 'multi';
			} else {
				$args['_add'] = 'single';
				if ($sidebar)
					$args['_hide'] = '1';
				}

			if (in_array($id_base, $ids) ){
					$args = wp_list_widget_controls_dynamic_sidebar(
							array(0 => $args, 1 => $widget['params'][0])
					);
					call_user_func_array('wp_widget_control', $args);
			}
		}
	}
	
	
	function renderRegisteredSidebars(){
		global $wp_registered_sidebars;
		
		foreach ( $wp_registered_sidebars as $sidebar => $registered_sidebar ) {
			if ( false !== strpos( $registered_sidebar['class'], 'inactive-sidebar' ) || 'orphaned_widgets' == substr( $sidebar, 0, 16 ) ) {
				$wrap_class = 'widgets-holder-wrap';
				if ( !empty( $registered_sidebar['class'] ) )
					$wrap_class .= ' ' . $registered_sidebar['class']; ?>

				<div class="<?php echo esc_attr( $wrap_class ); ?>">
					<div class="sidebar-name">
						<div class="sidebar-name-arrow"><br /></div>
						<h3><?php echo esc_html( $registered_sidebar['name'] ); ?>
							<span class="spinner"></span>
						</h3>
					</div>
					<div class="widget-holder inactive">
						<?php wp_list_widget_controls( $registered_sidebar['id'] );?>
						<div class="clear"></div>
					</div>
				</div>
			<?php
			}
		}
	}
	
	function renderRightRegisteredSidebars(){
			$i = 0;
			global $wp_registered_sidebars;
			foreach ( $wp_registered_sidebars as $sidebar => $registered_sidebar ) {
				if ( false !== strpos( $registered_sidebar['class'], 'inactive-sidebar' ) || 'orphaned_widgets' == substr( $sidebar, 0, 16 ) )
					continue;

				$wrap_class = 'widgets-holder-wrap';
				if ( !empty( $registered_sidebar['class'] ) )
					$wrap_class .= ' sidebar-' . $registered_sidebar['class'];

				if ( $i )
					$wrap_class .= ' closed'; ?>

				<div class="<?php echo esc_attr( $wrap_class ); ?>">
				<div class="sidebar-name">
				<div class="sidebar-name-arrow"><br /></div>
				<h3><?php echo esc_html( $registered_sidebar['name'] ); ?>
				<span class="spinner"></span></h3></div>
				<?php wp_list_widget_controls( $sidebar ); // Show the control forms for each of the widgets in this sidebar ?>
					
					
				</div>
			<?php
				$i++;
			} 
	}
}
?>
