<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manage extends CI_Controller {

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
		$data = array();
		
		$this->template->load(THEME,$data);
	}
	
	function login_form_ajax_process() {
	    if ($this->input->post('username')) {
			
			$this->load->library('form_validation');
			
			$config = array(
               array(
                     'field'   => 'username', 
                     'label'   => lang('username_label'), 
                     'rules'   => 'required'
                  ),
               array(
                     'field'   => 'password', 
                     'label'   => lang('password_label'), 
                     'rules'   => 'required'
                  )
            );

			$this->form_validation->set_rules($config);
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			
			if ($this->form_validation->run() == FALSE)
			{
				print validation_errors();
			}
			else
			{
				$this->load->model('account_handler');
				
				if ($this->account_handler->login($this->input->post('username'), $this->input->post('password'))) {
					print 'success';
				} else {
					print '<div class="error">'.lang('invalid_login_label').'</div>';	
				}
			}
				
		}
	}
	
	function login_form_ajax() {
		
		if ($this->input->post('username')) {
			
			$this->load->library('form_validation');
			
			$config = array(
               array(
                     'field'   => 'username', 
                     'label'   => lang('username_label'), 
                     'rules'   => 'required'
                  ),
               array(
                     'field'   => 'password', 
                     'label'   => lang('password_label'), 
                     'rules'   => 'required'
                  )
            );

			$this->form_validation->set_rules($config);
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			
			if ($this->form_validation->run() == FALSE)
			{
				print validation_errors();
			}
			else
			{
				$this->load->model('account_handler');
				
				if ($this->account_handler->login($this->input->post('username'), $this->input->post('password'))) {
					print 'success';
				} else {
					print '<div class="error">'.lang('invalid_login_label').'</div>';	
				}
			}
				
		} else {
		
			$this->load->view('common/login-form-ajax');
		
		}
			
	}
	
	function logout() {
		$this->session->sess_destroy();
		redirect(base_url());	
	}
}

/* End of file manage.php */
/* Location: ./application/controllers/manage.php */
