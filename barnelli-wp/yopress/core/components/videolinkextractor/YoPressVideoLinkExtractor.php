<?php

class YoPressVideoLinkExtractor extends YoPressComponent {
	function linkifyYouTubeURLs($text) {
			$text = preg_replace('~
			# Match non-linked youtube URL in the wild. (Rev:20111012)
			https?://         # Required scheme. Either http or https.
			(?:[0-9A-Z-]+\.)? # Optional subdomain.
			(?:               # Group host alternatives.
			  youtu\.be/      # Either youtu.be,
			| youtube\.com    # or youtube.com followed by
			  \S*             # Allow anything up to VIDEO_ID,
			  [^\w\-\s]       # but char before ID is non-ID char.
			)                 # End host alternatives.
			([\w\-]{11})      # $1: VIDEO_ID is exactly 11 chars.
			(?=[^\w\-]|$)     # Assert next char is non-ID or EOS.
			(?!               # Assert URL is not pre-linked.
			  [?=&+%\w]*      # Allow URL (query) remainder.
			  (?:             # Group pre-linked alternatives.
			    [\'"][^<>]*>  # Either inside a start tag,
			  | </a>          # or inside <a> element text contents.
			  )               # End recognized pre-linked alts.
			)                 # End negative lookahead assertion.
			[?=&+%\w-]*        # Consume any URL (query) remainder.
			~ix', 
			'$1',
			$text);
		return $text;
	}

	public function extract($data) {
		preg_match_all('/http(|s):\/\/(|.*)youtu(\.be|be)+([^ \'"\n]+)/', $data, $matches, PREG_OFFSET_CAPTURE);			
		preg_match_all('/http(|s):\/\/(|.*)vimeo.com+([^ \'"\n]+)/', $data, $vimMatches, PREG_OFFSET_CAPTURE);

		$videos = array_merge($matches[0], $vimMatches[0]);
		$returnData = array();
		
		foreach($videos as $links) {
			$linkId = $this->linkifyYouTubeURLs($links[0]);
				if($linkId != '') {
					preg_match('/http(|s):\/\/vimeo/', $linkId, $matches, PREG_OFFSET_CAPTURE);
					if(count($matches) >=1){
						$link = preg_replace('/http(|s):\/\/vimeo.com\//', 'http://player.vimeo.com/video/', $linkId);
					} else {
						$link = 'http://www.youtube.com/embed/'.$linkId;
					}
				}

			$returnData[] = array('linkId' => $linkId, 'link' => $link);

		}

		return $returnData;
	}
	
	public function componentFolderName(){
		return 'videolinkextractor';
	}
	
	public function componentPath(){
		return __DIR__;
	}
}
?>
