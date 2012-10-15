<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reservations extends CI_Controller {

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
		redirect('reservations/reservations_list');
	}
	
	/**
	 * Displays list of reservations
	 */
	function reservations_list() {
		
		try {
			/* This is only for the autocompletion */
			$crud = new grocery_CRUD();
         
			$crud->set_table(RESERVATION_TABLE);
			$crud->set_subject('Reservation');	
			$crud->set_relation('customer_id', CUSTOMER_TABLE,'{first_name} {last_name}');		
			$crud->set_relation('motorbike_id', MOTORBIKE_TABLE,'{plate_number} - {description}');	
			$crud->display_as('motorbike_id', 'Motor Bike')
				  ->display_as('customer_id', 'Customer');
			$crud->required_fields('customer_id', 'motorbike_id', 'start_date', 'end_date', 'date_reserved');
			$crud->callback_insert(array($this, '_changedBikeStatus'));
			$crud->callback_delete(array($this, '_revertStat'));
			
			$output = $crud->render();
			
			$data = array(
		        'output' => $output
		    );
	
		    $this->template->load(THEME, $data);
			
		} catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}					
		
	}
	

	function _revertStat($primary) {

		$query = $this->db->get_where(RESERVATION_TABLE, array('reservation_id'=>$primary));
		$row = $query->row_array();	

		$data = array(
			'status' => 'available'
		);
		
		$this->db->where('motorbike_id', $row['motorbike_id']);
		$this->db->update(MOTORBIKE_TABLE, $data);

		return $this->db->delete(RESERVATION_TABLE, array('reservation_id'=>$primary));

	}

	function _changedBikeStatus($post,$temp="") {
		
		$data = array(
			'status' => 'unavailable'
		);
		
		$this->db->where('motorbike_id', $post['motorbike_id']);
		$this->db->update(MOTORBIKE_TABLE, $data);
		
		$post['start_date'] = @date('Y-m-d', @strtotime($post['start_date']));
		$post['end_date'] = @date('Y-m-d', @strtotime($post['end_date']));
		$post['date_reserved'] = @date('Y-m-d H:i:s', @strtotime($post['date_reserved']));	
		
		return $this->db->insert(RESERVATION_TABLE, $post);

	}

	function check_availability() {
		
		if ( $this->input->post() ) {
			
			$startDate = $this->input->post('start-date');
			$endDate = $this->input->post('end-date');

			if ( $startDate != '' && $endDate != '' ) {

				
				
			}
			

		} else {
			
			print 'Please specify a start date and an end date.';

		}

	}
}

/* End of file reservations.php */
/* Location: ./application/controllers/reservations.php */
