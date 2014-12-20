<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_controllers extends CI_Controller {
	
	public function index()
	{
		$this->load->view('login_view');
	}
	public function register()
	{
		$first_name = $this->input->post('first_name');
		$last_name = $this->input->post('last_name');
		$screen_name = $this->input->post('screen_name');
		$email = $this->input->post('email');
		$birth_day = $this->input->post('birth_day');
		$birth_month = $this->input->post('birth_month');
		$birth_year = $this->input->post('birth_year');
		$password = $this->input->post('password');
		$password_confirm = $this->input->post('password_confirm');
		$this->load->model('login_model');
		// var_dump($birth_day);
		// die('here');
		$this->login_model->register($first_name, $last_name, $screen_name, $email, $password);
		// var_dump($user);
		// die('here');
		$this->load->view('login_view');
	}
	public function login()
	{
		$email = $this->input->post('email');
		$this->load->model('login_model');
		$display['user'] = $this->login_model->login($email);
		// $this->session->set_userdata('user', $user);
		var_dump($display);
		die('here');
		$this->load->view('welcome_view', $display);
	}
} //end of controller curly	