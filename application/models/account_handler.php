<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account_handler extends CI_Model {
	
	function __construct() {
		parent::__construct();	
	}
	
	function login($username, $password) {
		
		$condition = array(
			'username' => $username,
			'password' => sha1($password)
		);
		
		$query = $this->db->get_where(ADMIN_TABLE, $condition);
		
		if ($query->num_rows() > 0) {
			
			$admin = $query->row_array();
			unset($admin['password']);
			$this->session->set_userdata($admin);
			
			return TRUE;
		}
		
		return FALSE;
		
	}
		
}

/* End of file account_handler.php */
/* Location: ./application/models/account_handler.php */