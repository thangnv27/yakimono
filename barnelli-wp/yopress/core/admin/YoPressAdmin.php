<?php
/**
 * YoPress Admin page, handle displaying the setting page and managing theme
 * options
 */
class YoPressAdmin  {

	/**
	 * Register Menu Page and topbar menu item
	 */
	public function adminMenu() {
		if (!is_admin()) {
			wp_die( __t('You do not have sufficient permissions to access this page.') );
		}

		add_theme_page( 'YoPress settings', 'YoPress settings', 'manage_options', YoPressBase::instance()->getAdminPageId(), array($this, 'adminPage') );
		
		//add_action( 'wp_before_admin_bar_render', array($this,'adminBarMenu') );
		
		if(isset($_POST[YoPressFormModel::FORM_NAME])) {
			add_action('admin_head', array($this, 'saveAlert'));
		}
	}

	/* 
	 * Admin Top Bar Menu 
	 */
	public function adminBarMenu() {
		global $wp_admin_bar;
		$wp_admin_bar->add_menu( array(
			'parent' => false,
			'id' => 'yopress_settings', 
			'title' => __t('YoPress'), 
			'href' => admin_url('themes.php?page='.YoPressBase::instance()->getAdminPageId()),
			'meta' => false
		));
	}
	
	/*
	 * Display alert after save
	 */
	function saveAlert() {
		wp_enqueue_script('yopress_admin_alert_script', YoPressBase::instance()->getCoreUrl().'/admin/js/yopressAdminAlert.js', array('jquery'));
	}

	/*
	 * Render the admin setting page
	 */
	public function adminPage() {
		require_once get_template_directory().'/admin/admin.php';
		
		YoPressBase::instance()->webView->renderPath('admin/views/adminWrapper', array('pages' => YoPressBase::instance()->getAdminPages(), 'settings' => YoPressBase::instance()->getAdminPageSettings()));
		wp_enqueue_script('yopress_admin_script', YoPressBase::instance()->getCoreUrl().'/admin/js/yopressAdmin.js', array('jquery'));
		wp_register_style('yopress_admin_style', YoPressBase::instance()->getCoreUrl() . '/admin/css/yopress_admin.css', array(),'','');
		wp_enqueue_style('yopress_admin_style');
	}	
}
?>