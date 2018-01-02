<?php
/*
 * Interface for components that can be switched in component switcher
 * so that they are able to run itself on web page
 */
interface IRunableComponent {
	/*
	 * Component must implement run method called on user site
	 */
	public function run($config = array());
}
?>