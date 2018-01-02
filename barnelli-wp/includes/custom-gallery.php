<?php
/* Custom Gallery */

function barnelli_gallery($attr) {
	$post = get_post();

	static $instance = 0;
	$instance++;

	if (!empty($attr['ids'])) {
		// 'ids' is explicitly ordered, unless you specify otherwise.
		if (empty($attr['orderby'])) {
			$attr['orderby'] = 'post__in';
		}

		$attr['include'] = $attr['ids'];
	}

	// Allow plugins/themes to override the default gallery template.
	$output = apply_filters('post_gallery', '', $attr);

	if ($output != '') {
		return $output;
	}

	// We're trusting author input, so let's at least make sure it looks like a valid orderby statement
	if (isset($attr['orderby'])) {
		$attr['orderby'] = sanitize_sql_orderby($attr['orderby']);

		if (!$attr['orderby']) {
			unset($attr['orderby']);
		}

	}

	if (is_page_template('reservation-template.php')) {
		extract(shortcode_atts(array(
			'order'      => 'ASC',
			'orderby'    => 'menu_order ID',
			'id'         => $post ? $post->ID : 0,
			'itemtag'    => 'dl',
			'icontag'    => 'dt',
			'captiontag' => 'dd',
			'size'       => 'reservation_thumb',
			'include'    => '',
			'exclude'    => '',
			'link'       => ''
		), $attr, 'gallery'));

		$id = intval($id);

		if ('RAND' == $order) {
			$orderby = 'none';	
		}

		if (!empty($include)) {
			$_attachments = get_posts( array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );

			$attachments = array();

			foreach ( $_attachments as $key => $val ) {
				$attachments[$val->ID] = $_attachments[$key];
			}

		} elseif ( !empty($exclude) ) {
			$attachments = get_children( array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
		} else {
			$attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
		}

		if (empty($attachments)) {
			return '';
		}

		if (is_feed()) {
			$output = "\n";

			foreach ($attachments as $att_id => $attachment) {
				$output .= wp_get_attachment_link($att_id, $size, true) . "\n";
			}

			return $output;
		}

		$itemtag = tag_escape($itemtag);
		$captiontag = tag_escape($captiontag);
		$icontag = tag_escape($icontag);
		$valid_tags = wp_kses_allowed_html( 'post' );

		if (!isset($valid_tags[$itemtag])) {
			$itemtag = 'dl';
		}

		if (!isset($valid_tags[$captiontag])) {
			$captiontag = 'dd';
		}

		if (!isset($valid_tags[$icontag])) {
			$icontag = 'dt';
		}

		$float = is_rtl() ? 'right' : 'left';
		$selector = "gallery-{$instance}";
		$size_class = sanitize_html_class( $size );
		$output = "<div id=\"slider-res\" class=\"owl-carousel owl-theme gallery-size-$size_class\">";

		$i = 0;

		foreach ($attachments as $id => $attachment) {
			$big_attributes = wp_get_attachment_image_src($id, 'colorbox_thumb');
			$image_attributes = wp_get_attachment_image_src($id, 'reservation_thumb');
			$image_meta  = wp_get_attachment_metadata($id);
			$orientation = '';

			if (isset($image_meta['height'], $image_meta['width'])) {
				$orientation = ( $image_meta['height'] > $image_meta['width'] ) ? 'portrait' : 'landscape';
			}

			$output .= '<figure class="item"><img src="'.$image_attributes[0].'" alt="" /></figure>';
		}

		$output .= "</div>\n";

		return $output;
	} else {

		extract(shortcode_atts(array(
			'order'      => 'ASC',
			'orderby'    => 'menu_order ID',
			'id'         => $post ? $post->ID : 0,
			'itemtag'    => 'dl',
			'icontag'    => 'dt',
			'captiontag' => 'dd',
			'columns'    => 3,
			'size'       => 'gallery_thumb',
			'include'    => '',
			'exclude'    => '',
			'link'       => ''
		), $attr, 'gallery'));

		$id = intval($id);

		if ('RAND' == $order) {
			$orderby = 'none';	
		}

		if (!empty($include)) {
			$_attachments = get_posts( array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );

			$attachments = array();
			foreach ($_attachments as $key => $val) {
				$attachments[$val->ID] = $_attachments[$key];
			}
		} elseif (!empty($exclude)) {
			$attachments = get_children( array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
		} else {
			$attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
		}

		if (empty($attachments)) {
			return '';
		}

		if (is_feed()) {
			$output = "\n";

			foreach ($attachments as $att_id => $attachment) {
				$output .= wp_get_attachment_link($att_id, $size, true) . "\n";
			}

			return $output;
		}

		$itemtag = tag_escape($itemtag);
		$captiontag = tag_escape($captiontag);
		$icontag = tag_escape($icontag);
		$valid_tags = wp_kses_allowed_html('post');

		if (!isset($valid_tags[$itemtag])) {
			$itemtag = 'dl';
		}

		if (!isset($valid_tags[$captiontag])) {
			$captiontag = 'dd';
		}
			
		if (!isset($valid_tags[$icontag])) {
			$icontag = 'dt';
		}

		$columns = intval($columns);
		$itemwidth = $columns > 0 ? floor(100/$columns) : 100;
		$float = is_rtl() ? 'right' : 'left';

		$selector = "gallery-{$instance}";
		
		$size_class = sanitize_html_class($size);

		$output = "<div class=\"blog-gallery gallery-columns-$columns gallery-size-$size_class\">";

		$i = 0;
		foreach ($attachments as $id => $attachment) {

			$big_attributes = wp_get_attachment_image_src($id, 'colorbox_thumb');
			$image_attributes = wp_get_attachment_image_src($id, 'gallery_thumb');
			$image_meta  = wp_get_attachment_metadata($id);

			$orientation = '';
			if (isset($image_meta['height'], $image_meta['width'])) {
				$orientation = ($image_meta['height'] > $image_meta['width']) ? 'portrait' : 'landscape';
			}

			$output .= '<a href="'.$big_attributes[0].'" class="gallery gallery group1" data-djax-exclude="true" rel="group"><figure><img src="'.$image_attributes[0].'" alt="" />';

			if (trim($attachment->post_excerpt)) {
				$output .= '<div class="title">'.$attachment->post_excerpt.'</div>';
			}

			$output .= '</figure></a>';

			if ($columns > 0 && ++$i % $columns == 0) {
				$output .= '<br style="clear: both" />';
			}
		}

		$output .= "</div>\n";

		return $output;
	}
}
?>