<?php

class YoPressThumbnalizer {

	public function __construct() {
		
	}
	
	public function regenarate(){
		$images = $this->getImages();
		
		foreach($images as $image){
			$fullsizepath = get_attached_file( $image->ID );

			if ( false === $fullsizepath || ! file_exists( $fullsizepath ) )
				$this->die_json_error_msg( $image->ID, sprintf( __( 'The originally uploaded image file cannot be found at %s', 'regenerate-thumbnails' ), '<code>' . esc_html( $fullsizepath ) . '</code>' ) );

			$metadata = wp_generate_attachment_metadata( $image->ID, $fullsizepath );

			if ( is_wp_error( $metadata ) )
				$this->die_json_error_msg( $image->ID, $metadata->get_error_message() );
			if ( empty( $metadata ) )
				$this->die_json_error_msg( $image->ID, __( 'Unknown failure reason.', 'regenerate-thumbnails' ) );

		
			wp_update_attachment_metadata( $image->ID, $metadata );
		}
	}
	
	private function getImages(){
		global $wpdb;
		
		$images = array();
		$images = $wpdb->get_results( "SELECT ID FROM $wpdb->posts WHERE post_type = 'attachment' AND post_mime_type LIKE 'image/%' ORDER BY ID DESC" );
		

		return $images;
	}


}

?>
