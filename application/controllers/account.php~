<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Account extends CI_Controller {
	
	/**
	 * - Default Constructor.
	 * - Automatically called when this class is invoke.
	 * - This will load the grocery_CRUD library
	 */
	function __construct() {
		parent::__construct();
		$this->load->library('grocery_CRUD');	
	}	
	
	/**
	 * Index Page for this controller.
	 *
    * This is the default function called when a user does not specify
    * a function on the URL.
	 */
	function index() {
		redirect('account/account_list');
	}
	
	/**
	 * Display's list of accounts
	 */
	function account_list() {
		
		if ($this->session->userdata('admin_id') != '1') {		
			if ($this->uri->segment(3) != 'edit') {
				redirect('account/account_list/edit/'.$this->session->userdata('admin_id'));	
			}
		}
		
		try{
			/* This is only for the autocompletion */
			$crud = new grocery_CRUD();
         
			$crud->set_table(ADMIN_TABLE);
			$crud->set_subject('Account');			
			$crud->required_fields('first_name', 'last_name', 'username', 'password');
			$crud->columns('first_name', 'last_name', 'username', 'date_created');
			$crud->add_fields('first_name', 'last_name', 'username', 'password');
			$crud->edit_fields('first_name', 'last_name', 'username', 'password');
			$crud->callback_insert(array($this, '_callback_add_account'));
			$crud->callback_update(array($this, '_callback_edit_account'));
			$crud->callback_add_field('password', array($this, '_callback_password_field'));
			$crud->callback_edit_field('password', array($this, '_callback_password_field'));
			$output = $crud->render();
			
			$data = array(
		        'output' => $output
		    );
	
		    $this->template->load(THEME, $data);
			
		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}	
		
		
		
	}
	
	/**
	 * - Function automatically called when adding an account.
	 * - this will encrypt the password inputed by a user and add a current date on insertion
	 */
	function _callback_add_account($postValues, $temp = '') {
		
		$postValues['password'] = sha1($postValues['password']);
		$postValues['date_created'] = @date('Y-m-d H:i:s');
		
		return $this->db->insert(ADMIN_TABLE, $postValues);
		
	}
	
	/**
	 * - Function automatically called when adding and editing an account.
	 * - replaces the default field into a password field.
	 */
	function _callback_password_field() {
		return '<input type="password" name="password" value="" />';	
	}
	
	/**
	 * - Function automatically called when editing an account.
	 * - this will encrypt the password inputed by a user if any and unset if leave blank
	 */
	function _callback_edit_account($postValues, $primary = '') {
		
		if (trim($postValues['password']) == '') {
			unset($postValues['password']);
		} else {
			$postValues['password'] = sha1($postValues['password']);
		}
		
		unset($postValues['date_created']);
		
		return $this->db->update(ADMIN_TABLE, $postValues, array('admin_id'=>$primary));
		
	}
	
}

/* End of file account.php */
/* Location: ./application/controllers/account.php */
