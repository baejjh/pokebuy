<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admins extends CI_Controller
{
	public function __construct()
	{
    	parent::__construct();
  		$this->load->view('template/admin_header');
  	}	
	public function admin_register()
	{	
		$post_data = $this->input->post();

		$this->load->model('admin_info');
		$this->admin_info->admin_register($post_data);

		$this->load->view('admin/login');

		// $this->load->library('form_validation');

		// $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');
		// $this->form_validation->set_rules('password', 'Password', 'trim|required');
		// $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|matches[password]');
		
		// if($this->form_validation->run() === FALSE)
		// {
		// 	$data['status'] = FALSE;
		// 	$data['error_message'] = validation_errors();
		// }
		// else
		// {
		// 	$this->load->model('admin_info');
		// 	$register_user = $this->admin_info->add_user($this->input->post());
			
		// 	if($register_user)
		// 	{
		// 		$data["status"] = TRUE; 

		// 		//since this function is use by add user and user login, http referer will let us know where post data came from
		// 		if($_SERVER['HTTP_REFERER'] == base_url("/admin/register"))
		// 			$data["success_message"] = "Registration successful! You can now <a href='admin/login'>login</a>!";
		// 		else
		// 			$data["success_message"] = "User is sucessfully added!";
		// 	}
		// 	else
		// 	{
		// 		$data["status"] = FALSE;
		// 		$data["error_message"] = "Registration failed! Please Try Again!";
		// 	}	
		// }
	}

	//ajax handle user login
	public function admin_login()
	{	
		$post_data = $this->input->post();

		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		
		if($this->form_validation->run() === FALSE)
		{
			$data['status'] = FALSE;
			$data['error_message'] = validation_errors();
		}
		else //if validation is correct
		{	
			$user = $post_data["email"];

			$this->load->model('admin_info');
			$admin = $this->admin_info->check_admin($user);			
		}
		$this->load->view('admin/dashboard', $admin);
	}
	public function redirect_to_register()
	{
		$this->load->view('admin/register');
	}
	public function redirect_to_dashboard()
	{
		$this->load->view('admin/dashboard'); //problem: $email on dashboard is undefined
	}
	public function redirect_to_login()
	{
		$this->load->view('admin/login');
	}
	public function continue_as_guest()
	{
		$this->load->view('store');
	}
	public function redirect_to_orders()
	{
		$this->load->view('admin/orders');
	}
	public function redirect_to_products()
	{
		$this->load->view('admin/products');
	}
	public function admin_logoff()
	{
		//unset session and then you have to:
		$this->load->view('store'); //doesn't go to the store. it goes back to admin
	}
}