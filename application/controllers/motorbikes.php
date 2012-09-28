<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Motorbikes extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->template->load(THEME);
	}
	
	function models() {
		
		$models = array('motorbike_model');
		$this->load->model($models);
		$this->load->helper('text');
		
		$data = array(
			'models' => $this->motorbike_model->getModels(0,50)
		);
		
		$this->load->view('pages/motorbikes/models', $data);
			
	}
	
}

/* End of file motorbikes.php */
/* Location: ./application/controllers/motorbikes.php */