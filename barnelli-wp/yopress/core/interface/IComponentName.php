<?php
/*
 * Interface for multicomponents to determine its internal name
 */
interface IComponentName {
	/**
	 * @return string Returns name of component passed from config
	 */
	public function componentName();
	
}

?>
