<?php
/**
 * Class for rendering views, also got some usefull functions like listing 
 * categories
 * 
 * TODO: 
 * refactor render system...
 */
class YoPressWebView {
	/**
	 * Render view from web folder
	 */
	public function render($viewName, $vars = array(), $htmlOptions = array(), $path = false) {
		extract($vars);
		$opts = '';
		if(is_array($htmlOptions) && count($htmlOptions) >= 1) {
			foreach ($htmlOptions as $key => $val) {
				$opts .= ' '.$key.'="'.$val.'" ';
			}
		}

		$basePath = YoPressBase::instance()->getCorePath();
		if($path){
			$viewPath = $basePath.$viewName.'.php';
		} else {
			$viewPath = $basePath.'/web/views/'.$viewName.'.php';
		}
		if(file_exists($viewPath)){
			require $viewPath;
		}
	}
	
	/**
	 * Render any view, $viewName is complete path to file
	 * 
	 * @param type $viewName
	 * @param type $vars
	 * @param type $htmlOptions
	 */
	public function renderPath($viewName, $vars = array(), $htmlOptions = array()){
		$this->render($viewName, $vars, $htmlOptions, true);
	}
	
	
	/* Move to some helper clases */
	
	/**
	 * Render a dropdown with all categories
	 * 
	 * @param type $name
	 * @param type $selected
	 * @param type $htmlOptions
	 */
	public function categorySelect($name, $selected = null, $htmlOptions = array(), $prepend = array()) {
		$args = array(
			'orderby'		=> 'name',
			'order'			=> 'ASC',
			'hide_empty'	=> 0,
			'taxonomy'		=> 'category',
		);

		$categories = get_categories($args);
		if(count($prepend) > 0){
			$categories = array_merge($prepend, $categories);
		}
		
		$this->render('categorySelectView', array('yopressname' => $name, 'categories' => $categories, 'selectedValue' => $selected), $htmlOptions);

	}
	
	
	/* Move to some helper clases */
	/**
	 * Get the categories as raw array
	 * 
	 * @return array
	 */
	public function categoryArray() {
		$args = array(
			'orderby'		=> 'name',
			'order'			=> 'ASC',
			'hide_empty'	=> 0,
			'taxonomy'		=> 'category',
		);

		$returnArray = array();
		$catObjects = get_categories($args);
		foreach($catObjects as $obj){
			$returnArray[] = get_object_vars($obj);
		}
		return $returnArray;
	}

	/* Move to some helper clases */
	public function author(){
		$this->render('themeAuthor', array(), array());
	}
	
	/**
	 * Render post options with fb,twitter,g+ and read more
	 */
	public function renderPostOptions() {
		$this->render('postOptions', array());
	}	
}
?>
