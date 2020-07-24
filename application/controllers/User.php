<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model("user_m");
        $this->load->library('form_validation');
    }


	public function index()
	{
		if($this->input->post()){
            if($this->user_m->Login()) redirect(site_url('user'));
        }
		$this->load->view('login');
	}
	public function logout()
    {
        // hancurkan semua sesi
        $this->session->sess_destroy();
        redirect(site_url('login'));
    }
	
}
