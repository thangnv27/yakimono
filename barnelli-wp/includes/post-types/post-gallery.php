<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

function barnelli_post_images_box() {
	global $post;
	?>
	<div id="portfolio_images_container">
		<ul class="portfolio_images">
			<?php
				if ( metadata_exists( 'post', $post->ID, '_portfolio_image_gallery' ) ) {
					$portfolio_image_gallery = get_post_meta( $post->ID, '_portfolio_image_gallery', true );
				} else {
					// Backwards compat
					$attachment_ids = get_posts( 'post_parent=' . $post->ID . '&numberposts=-1&post_type=attachment&orderby=menu_order&order=ASC&post_mime_type=image&fields=ids&meta_key=_vgc_wp_exclude_image&meta_value=0' );
					$attachment_ids = array_diff( $attachment_ids, array( get_post_thumbnail_id() ) );
					$portfolio_image_gallery = implode( ',', $attachment_ids );
				}

				$attachments = array_filter( explode( ',', $portfolio_image_gallery ) );

				if ( $attachments )
					foreach ( $attachments as $attachment_id ) {
						echo '<li class="image" data-attachment_id="' . $attachment_id . '">
							' . wp_get_attachment_image( $attachment_id, 'thumbnail' ) . '
							<ul class="actions">
								<li><a href="#" class="delete" title="' . __( 'Delete image', 'vgc-wp' ) . '">' . __( 'Delete', 'vgc-wp' ) . '</a></li>
							</ul>
						</li>';
					}
			?>
		</ul>

		<input type="hidden" id="portfolio_image_gallery" name="portfolio_image_gallery" value="<?php echo esc_attr( $portfolio_image_gallery ); ?>" />

	</div>
	<p class="add_portfolio_images hide-if-no-js">
		<a href="#"><?php _e( 'Add gallery images', 'vgc-wp' ); ?></a>
	</p>
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			// Uploading files
			var portfolio_gallery_frame;
			var $image_gallery_ids = $('#portfolio_image_gallery');
			var $portfolio_images = $('#portfolio_images_container ul.portfolio_images');

			jQuery('.add_portfolio_images').on( 'click', 'a', function(event) {
				var $el = $(this);
				var attachment_ids = $image_gallery_ids.val();
				event.preventDefault();
				// If the media frame already exists, reopen it.
				if (portfolio_gallery_frame) {
					portfolio_gallery_frame.open();
					return;
				}
				// Create the media frame.
				portfolio_gallery_frame = wp.media.frames.downloadable_file = wp.media({
					// Set the title of the modal.
					title: '<?php _e( 'Add Images to Gallery', 'vgc-wp' ); ?>',
					button: {
						text: '<?php _e( 'Add to gallery', 'vgc-wp' ); ?>',
					},
					multiple: true
				});
				// When an image is selected, run a callback.
				portfolio_gallery_frame.on('select', function() {
					var selection = portfolio_gallery_frame.state().get('selection');
					selection.map(function(attachment) {
						attachment = attachment.toJSON();
						if (attachment.id) {
							attachment_ids = attachment_ids ? attachment_ids + "," + attachment.id : attachment.id;
							$portfolio_images.append('\
								<li class="image" data-attachment_id="' + attachment.id + '">\
									<img src="' + attachment.url + '" />\
									<ul class="actions">\
										<li><a href="#" class="delete" title="<?php _e( 'Delete image', 'vgc-wp' ); ?>"><?php _e( 'Delete', 'vgc-wp' ); ?></a></li>\
									</ul>\
								</li>');
						}
					});

					$image_gallery_ids.val(attachment_ids);
				});

				// Finally, open the modal.
				portfolio_gallery_frame.open();
			});

			// Image ordering
			$portfolio_images.sortable({
				items: 'li.image',
				cursor: 'move',
				scrollSensitivity:40,
				forcePlaceholderSize: true,
				forceHelperSize: false,
				helper: 'clone',
				opacity: 0.65,
				placeholder: 'wc-metabox-sortable-placeholder',
				start:function(event,ui) {
					ui.item.css('background-color','#f6f6f6');
				},
				stop:function(event,ui) {
					ui.item.removeAttr('style');
				},
				update: function(event, ui) {
					var attachment_ids = '';
					$('#portfolio_images_container ul li.image').css('cursor','default').each(function() {
						var attachment_id = jQuery(this).attr('data-attachment_id');
						attachment_ids = attachment_ids + attachment_id + ',';
					});
					$image_gallery_ids.val(attachment_ids);
				}
			});
			// Remove images
			$('#portfolio_images_container').on('click', 'a.delete', function() {
				$(this).closest('li.image').remove();
				var attachment_ids = '';

				$('#portfolio_images_container ul li.image').css('cursor','default').each(function() {
					var attachment_id = jQuery(this).attr('data-attachment_id');
					attachment_ids = attachment_ids + attachment_id + ',';
				});

				$image_gallery_ids.val(attachment_ids);

				return false;
			});
		});
	</script>
	<?php
}
