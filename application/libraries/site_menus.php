<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site_menus {
	
	private $ci = NULL;
	
	function __construct() {
		$this->ci = &get_instance();	
	}
	
	function getMainMenus() {
		
		$menus = array(
			lang('home_label') => base_url(),
			lang('gallery_label') => site_url('gallery'),
			lang('about_us_label') => site_url('about_us'),
			lang('contact_us_label') => site_url('contact_us')
		);
		
		return $menus;
		
	}
	
}

/* End of file site_menus.php */
/* Location: ./application/libraries/site_menus.php */