<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model("user_model");
        $this->load->library('form_validation');
    }


	public function index()
	{
		if($this->input->post()){
            if($this->user_model->Login()) redirect(site_url('admin'));
        }
		$this->load->view('login');
	}
	public function logout()
    {
        
        $this->session->sess_destroy();
        redirect(site_url('login'));
    }
	
}
