<?php
class YoPressHelperModule{
	
	public function init(){
		
	}
	
	public static function getImageSize($img, $size) {
		
		$components  = explode('/', $img);
		$file = array_pop($components);
		
		// test for sized file
		if(preg_match('/\-[0-9].*x[0-9]{1,4}\./', $file)){
			$file = preg_replace('/\-[0-9].*x[0-9]{1,4}\./', '.', $file);
		}
	
		$filePices = explode('.', $file);	
		
		$ext = array_pop($filePices);
		
		$file = str_replace('.'.$ext, '-'.$size.'.'.$ext, $file);
		
		$f = implode('/', $components).'/'.$file;

		$test = explode('uploads', $f);
		
		if(!file_exists(WP_CONTENT_DIR.'/uploads/'.$test[1])){
			$f = $img;
		}
		
		return $f;
	}
}
?>
