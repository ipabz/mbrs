<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Motorbikes extends CI_Controller {

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
	public function index()
	{
	    
		//redirect('motorbikes/motorbikes');
		
	}
	
	/**
	 * Display's list of motorbikes.
	 * It loads the view: pages/motorbikes/motorbikes
	 */
	function list_motorbikes() {
		
		$output = '';
	    
	    try{
			/* This is only for the autocompletion */
			$crud = new grocery_CRUD();
         
			//$crud->set_theme('datatables');
			$crud->set_table(MOTORBIKE_TABLE);
			$crud->set_subject('Motor Bike');
			$crud->set_relation('model_id', MODEL_TABLE,'name');
			$crud->display_as('model_id', 'Model Name')
				  ->display_as('plate_number', 'Plate Number');
			$crud->required_fields('plate_number', 'price', 'model_id');
			$crud->add_fields('model_id', 'description', 'price', 'plate_number');
			$crud->edit_fields('model_id', 'description', 'price', 'plate_number');
			$crud->columns('plate_number', 'model_id','description','price', 'date_added');
			$crud->callback_insert( array( $this, '_callback_add_motorbike'));
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
	 * Callback function on insertion of new motorbike.
	 * It adds date and time of insertion.
	 */
	function _callback_add_motorbike($postValues, $temp='') {
		
			$postValues['date_added'] = @date('Y-m-d H:i:s');
			
			return $this->db->insert(MOTORBIKE_TABLE, $postValues);
			
	}
	
	/**
	 * This is the function called when a user wants to see the list of
	 * motorbike models.
	 *
	 * 
	 */
	function models() {
		
		$models = array('motorbike_model');
		$this->load->model($models);
		$this->load->helper('text');
		
		$models = $this->motorbike_model->getModels(0,50);
		
		$output = '';
	    
	    try{
			/* This is only for the autocompletion */
			$crud = new grocery_CRUD();
         
			//$crud->set_theme('datatables');
			$crud->set_table(MODEL_TABLE);
			$crud->set_subject('Motor Bike Model');
			//$crud->set_relation('model_id', MODEL_TABLE,'name');
			//$crud->display_as('model_id', 'Model Name')
				//  ->display_as('plate_number', 'Plate Number');
			$crud->required_fields('name', 'price');
			//$crud->add_fields('model_id', 'description', 'price', 'plate_number');
			//$crud->edit_fields('model_id', 'description', 'price', 'plate_number');
			//$crud->columns('plate_number', 'model_id','description','price', 'date_added');
			//$crud->callback_insert( array( $this, '_callback_add_motorbike'));
			$output = $crud->render();
			
			$data = array(
		        'output' => $output,
		        'models' => $models
		    );
	
		    $this->template->load(THEME, $data);
			
		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
			
	}
	
}

/* End of file motorbikes.php */
/* Location: ./application/controllers/motorbikes.php */
