<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admins extends CI_Controller
{
	public function __construct()
	{
    	parent::__construct();
    	$this->load->model('admin_info');
    	if(!empty($this->session->userdata('loggedin'))) {
    		$data['loggedin'] = $this->session->userdata('loggedin');
  			$this->load->view('template/admin_header', $data);
  		}
  	}

//Guest enters the link from the store, they get directed to the register page:
  	public function redirect_to_register()
	{
		$data['errors'] = $this->session->flashdata('errors');
		$this->load->view('admin/register', $data);
	}
	public function redirect_to_login()
	{
		$data['errors'] = $this->session->flashdata('errors');
		$this->load->view('admin/login', $data);
	}


//ADMIN REGISTER

//Once Guest gets to the page, they have the option of 
// 1. Registering as Admin
// 2. Redirect to Login Page if Guest = Admin
// 3. Enter as a Guest (back to Store)
	public function admin_register()
	{		
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[admins.email]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|matches[password]');
		
		if($this->form_validation->run() === FALSE)
		{
			$this->session->set_flashdata('errors', validation_errors());
			redirect('register');
		}
		else 
		{
			$post_data = $this->input->post();
			$this->load->model('Admin_info');
			$result = $this->Admin_info->admin_register($post_data);
			if($result > 0) {
				$this->session->set_userdata('admin_id', $result);
				$this->session->set_userdata('loggedin', TRUE);
				redirect('dashboard');
			}
			else
			{
				$this->session->set_flashdata('errors', '<p>There was an error</p>');
				redirect('register');
			}
		}
	}



//ADMIN LOGIN
	public function admin_login()
	{
		$post_data = $this->input->post();
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		
		if($this->form_validation->run() === FALSE)
		{
			$this->session->set_flashdata('errors', validation_errors());
			redirect('login_page');
		}
		else //if validation is correct
		{
			$user = $post_data["email"];
			$this->load->model('Admin_info');
			$admin = $this->Admin_info->check_admin($user);

			if($admin['password'] == $post_data['password']) {
				$this->session->set_userdata('loggedin', TRUE);
				redirect('dashboard', $admin);	
			} 
			else 
			{
				$this->session->set_flashdata('errors', '<p>The email and password combination do not match our </p>');
				redirect('login_page');
			}	
		}
	}

//Once the Admin has access, the Dashboards have:
//GO BACK TO THE DASHBOARD
	public function redirect_to_dashboard()
	{
		if(empty($this->session->userdata('loggedin'))) {
			redirect('admin');
		}
		$this->load->view('admin/dashboard'); //problem: $email on dashboard is undefined
	}



//GO BACK TO THE ORDERS
	public function redirect_to_orders()
	{
		if(empty($this->session->userdata('loggedin'))) {
			redirect('admin');
		}
		//retrieve status names for dropdown menus
		$var['statuses'] = $this->admin_info->get_all_status_types();
		$var['orders'] = $this->admin_info->show_all_orders();
		
		$this->load->view('admin/orders', $var);
	}
	public function redirect_to_one_order($id)
	{
		$var['statuses'] = $this->admin_info->get_all_status_types();
		$var['one_order'] = $this->admin_info->show_one_order_view($id);
		// var_dump($var);
		// die('hi');
		$this->load->view('admin/one_order', $var);
	}
	public function sort_orders_by_status($status_name)
	{
		$var['statuses'] = $this->admin_info->get_all_status();
		$var['orders'] = $this->admin_info->organize_by_status($status_name);
		$this->load->view('admin/orders', $var);
	}
	public function status_update($id, $status)
	{
	}


//GO BACK TO THE PRODUCTS
	public function redirect_to_products()
	{
		if(empty($this->session->userdata('loggedin'))) {
			redirect('admin');
		}
		$this->load->library('pagination');
//PROBLEM
//$start_row value keeps returning boolean of false when it should be a number: $this->uri->segment(3);
		$start_row 		= 1; //temporarily set to 1 instead of $this->uri->segment(3)
		$total_rows		= $this->db->count_all('products'); //both correctly outputs the data size: $this->db->get('products')->num_rows();
		$per_page 		= 10;	

		//pagination details		
		$config['base_url'] 	= base_url() . 'products';
		$config['total_rows']	= $total_rows;
		$config['per_page'] 	= $per_page; //display per page    
		$config['use_page_numbers'] = TRUE; //show the the actual page number rather than $this->uri->segment(*numbers)
		$this->pagination->initialize($config);

		$var['pagination_links']= $this->pagination->create_links();
		$var['products'] 		= $this->admin_info->get_all_products_limit($per_page);
		// var_dump($var);
		// die();
		$this->load->view('admin/products', $var);
	} 
	//As Admin, you can edit, delete, add products inside admin/products view
		public function edit_product($id)
		{
			//MODAL INFO GOES HERE
			
			//$var = $this->admin_info->edit_product_by_id($user);
			//redirect('admin/products');

			// $this->load->model('admin_info');
			// $var['products'] = $this->admin_info->edit_product_by_id($user);	
			// $this->load->view('admin/products', $var);	
		}
		public function delete_product($id)
		{
			$this->admin_info->delete_product_by_id($id);

			$var['products'] = $this->admin_info->get_all_products();
			$this->load->view('admin/products', $var);	
		}
		//When Admin wants to add a product, they get directed to a new page
		public function redirect_to_new_product()
		{
			$this->load->view('admin/new_product');
		}
			//New product add page has this function that returns the Admin
			//back to admin/product upon product submission succcess
			public function add_new_product()
			{
				//add new db
				$this->form_validation->set_rules('name', 'Name', 'trim|required');
				$this->form_validation->set_rules('description', 'description', 'trim|optional');
				$this->form_validation->set_rules('price', 'Price', 'trim|required');
				$this->form_validation->set_rules('inventory_count', 'Inventory Count', 'trim|required');
				//set rule for image

				if($this->form_validation->run() === FALSE)
				{
					$this->session->set_flashdata('errors', validation_errors());
					redirect('new_product');
				}
				else 
				{
					$post_data = $this->input->post();
					$this->load->model('Admin_info');
					$result = $this->Admin_info->add_new_product($post_data);
					if($result > 0) {
						$this->session->set_userdata('product_id', $result);
						$this->session->set_userdata('add_products', TRUE);
						redirect('products');
					}
					else
					{
						$this->session->set_flashdata('errors', '<p>There was an error</p>');
						redirect('new_product');
					}
				}
			}



//BACK TO THE STORE AFTER A LOGOFF
	public function admin_logoff()
	{
		$this->session->sess_destroy();
		redirect('stores'); //doesn't go to the store. it goes back to admin
	}
}