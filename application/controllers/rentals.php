<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rentals extends CI_Controller {

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
		redirect('rentals/rentals_list');
	}
	
	/**
	 * Displays list of rentals
	 */
	function rentals_list() {
		
		try {
			/* This is only for the autocompletion */
			$crud = new grocery_CRUD();
         
			$crud->set_table(RENTAL_TABLE);
			$crud->set_subject('Rental');	
			$crud->set_relation('customer_id', CUSTOMER_TABLE,'{first_name} {last_name}');		
			$crud->set_relation('motorbike_id', MOTORBIKE_TABLE,'{plate_number} - {description}');	
			$crud->display_as('motorbike_id', 'Motor Bike')
				  ->display_as('customer_id', 'Customer');
			$crud->unset_delete();
			$crud->where('status', 'current');
			$crud->required_fields('customer_id', 'motorbike_id', 'start_date', 'end_date', 'date_rented', 'price_per_day');
			
			$output = $crud->render();
			
			$data = array(
		        'output' => $output
		    );
	
		    $this->template->load(THEME, $data);
			
		} catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}					
		
	}
	
}

/* End of file rentals.php */
/* Location: ./application/controllers/rentals.php */