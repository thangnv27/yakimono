<?php
/*
 * Interface for object that are linked as dependencies
 */
interface IDependencyObject {
	/*
	 * Register hooks for scripts, styles, called once percomponent after
	 * regisrering them
	 */
	public function registerHooks($action, $avaiableActions=array());
	
	/**
	 * Register settings on admin page, called if is_admin() && pageId =
	 * YoPressBase::instance()->getAdminPageId match
	 */
	public function registerAdminSettings();
	
	/*
	 * Used to determine if component have already registered it scripts
	 */
	public function registered();
}
?>
