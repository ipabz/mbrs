<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customers extends CI_Controller {
	
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
		redirect('customers/customers_list');
	}
	
	/**
	 * Display's list of customers
	 *
	 */
	function customers_list() {
			
		try {
			/* This is only for the autocompletion */
			$crud = new grocery_CRUD();
         
			$crud->set_table(CUSTOMER_TABLE);
			$crud->set_subject('Customer');			
			$crud->required_fields('first_name', 'last_name', 'current_address', 'email_address', 'contact_number');
			$crud->add_fields('first_name', 'last_name', 'current_address', 'email_address', 'contact_number');
			$crud->edit_fields('first_name', 'last_name', 'current_address', 'email_address', 'contact_number');
			$crud->callback_insert(array($this, '_callback_add_date'));
			$output = $crud->render();
			
			$data = array(
		        'output' => $output
		    );
	
		    $this->template->load(THEME, $data);
			
		} catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}				
			
	}
	
	/**
	 * Function automatically called when adding a new customer.
	 * It adds a date and time of the action
	 */
	function _callback_add_date($postValues,$temp='') {
		
		$postValues['date_registered'] = @date('Y-m-d H:i:s');
		
		return $this->db->insert(CUSTOMER_TABLE, $postValues);
		
	}
	
}


/* End of file customers.php */
/* Location: ./application/controllers/customers.php */