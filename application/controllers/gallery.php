<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gallery extends CI_Controller {
    
    /**
     * The default constructor of the Gallery Controller
     * Loaded first when this controller is called.
     * All the necessary global files are loaded here.
     */
    function __construct() {
        parent::__construct();
    }
    
    /**
     * The function called when a user does not specify any function on the browser.
     */
    function index() {
       redirect('gallery/list_models');
    }
    
    /**
     * Displays list of motorbike models with details on each model.
     */
    function list_models() {
        
        $this->load->model('motorbike_model');
        
		$data = array(
            'newModels' => $this->motorbike_model->newMotorBikes()
        );
		
		$this->template->load(THEME,$data);
        
    }
    
    
}

/* End of file gallery.php */
/* Location: ./application/controllers/gallery.php */