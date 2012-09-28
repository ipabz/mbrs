<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('getHeader') ) {
	
	function getHeader() {
		$ci = &get_instance();
		$theme = $ci->session->userdata('theme');
		
		$ci->load->theme($theme.'/header');
	}
	
} 


if ( ! function_exists('getFooter') ) {
	
	function getFooter() {
		$ci = &get_instance();
		$theme = $ci->session->userdata('theme');
		
		$ci->load->theme($theme.'/footer');
	}
	
} 

if ( ! function_exists('getHeaderTags') ) {
	
	function getHeaderTags() {
		$ci = &get_instance();
		$theme = $ci->session->userdata('theme');
		
		$ci->template->getHeaderTags();
		
		$addOn = '<script type="text/javascript">var base_url = "'.base_url().'"; var site_url = "'.site_url().'";</script>';
		
		print $addOn;
	}
	
} 

if ( ! function_exists('getTitle') ) {
	
	function getTitle() {
		$ci = &get_instance();
		$ci->load->helper('inflector');
	
		$controller_name = $ci->uri->segment(1);
		$function_name = $ci->uri->segment(2);
		$title = '';
		
		if ($controller_name) {
			$title = ucwords(humanize($controller_name));
			
			if ($function_name) {
				$title .= ' | '.ucwords(humanize($function_name)); 
			}
		}
		
		if ($title != '') {
			$title .= ' | ' . SITE_TITLE;
		} else {
			$title = SITE_TITLE;	
		}
		
		print $title;
		
	}
	
} 


if ( ! function_exists('getPage') ) {
	
	function getPage() {
		$ci = &get_instance();
		
		$controller_name = $ci->uri->segment(1);
		$function_name = $ci->uri->segment(2);
		
		if ($controller_name) {
			
			if ($function_name) {
				$ci->load->view('pages/'.$controller_name.'/'.$function_name);
			} else {
				$ci->load->view('pages/'.$controller_name.'/'.$controller_name);
			}
			
		} else {
			$ci->load->view('pages/default/default');
		}
		
	}
	
} 

if ( ! function_exists('themePath') ) {
	
	function themePath() {
		$ci = &get_instance();
		
		return base_url().'templates/'.$ci->session->userdata('theme').'/';
		
	}
	
} 


if ( ! function_exists('getMenus') ) {
	
	function getMenus($type='main') {
		$ci = &get_instance();
		$ci->load->library('site_menus');
		$menus = array();
		
		switch($type) {
			
			case 'main':
				$menus = $ci->site_menus->getMainMenus();
				break;
			
		}
		
		return $menus;
		
	}
	
}

if ( ! function_exists('currentMenu') ) {
	
	function currentMenu() {
		$ci = &get_instance();
		$ci->load->helper('inflector');
		$currentMenu = $ci->uri->segment(1);
		
		if ($currentMenu) {
			return strtolower(humanize($currentMenu));
		}
		
		return 'home';
		
	}
	
}

if ( ! function_exists('sliderImages') ) {
	
	function sliderImages() {
		$ci = &get_instance();
		
		return $ci->template->getSliderImages();
		
	}
	
}

if ( ! function_exists('adminPanel') ) {
	
	function adminPanel() {
		$ci = &get_instance();
		
		print $ci->load->view('common/admin-panel');
		
	}
	
}

if ( ! function_exists('isLogined') ) {
	
	function isLogined() {
		$ci = &get_instance();
		
		if ($ci->session->userdata('admin_id')) {
			return TRUE;
		}
		
		return FALSE;
		
	}
	
}



?>