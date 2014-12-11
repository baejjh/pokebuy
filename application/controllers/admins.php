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
		$this->load->view('admin/dashboard');
	}



//GO BACK TO THE ORDERS
	public function redirect_to_orders()
	{
		if(empty($this->session->userdata('loggedin'))) {
			redirect('admin');
		}
		$config = array();
		$config['base_url'] = base_url().'/orders/';
		$config['total_rows'] = $this->db->count_all('orders');;
		$config['per_page'] = 10;
		$config['uri_segment'] = 2;
		$config['first_link'] = 'first';
		$config['last_link'] = 'last';
		$config['next_link'] = 'next';
		$config['prev_link'] = '&lt;';
		$this->pagination->initialize($config); 
		$start = $this->uri->segment(2);
		$var['links'] = $this->pagination->create_links();
		$var['orders'] = $this->admin_info->show_all_orders($config["per_page"], $start);
		$var['statuses'] = $this->admin_info->get_all_status_types();
		$var['count'] = $config['total_rows'];
		$this->load->view('admin/orders', $var);
	}
	public function redirect_to_one_order($id)
	{
		$var['statuses'] = $this->admin_info->get_all_status_types();
		$var['items_in_order'] = $this->admin_info->show_one_order_view($id);

		$this->load->view('admin/one_order', $var);
	}
public function sort_orders_by_status()
	{
		$word_search = $this->input->post('word_search');
		$selected_order = $this->input->post('selected_status');
		if (!isset($word_search)) {
			$word_search = NULL;
		}
		if (!isset($selected_status)) {
			$selected_status = NULL;
		}
		$var['orders'] = $this->admin_info->get_orders_by_search_status($selected_status, $word_search);
		$var['statuses'] = $this->admin_info->get_all_status_types();
		$this->session->set_userdata('statuses', $var);
		$this->load->view('admin/orders', $var);
	}
	public function update_order_status()
	{
		$var['status_id'] = $this->input->post('status_id');
		$var['order_id'] = $this->input->post('order_id');
		$result = $this->admin_info->update_order_status($var);
		redirect('orders');
	}


//GO BACK TO THE PRODUCTS
	public function redirect_to_products()
	{
		if(empty($this->session->userdata('loggedin'))) {
			redirect('admin');
		}
		$config = array();
		$config['base_url'] = base_url().'/products/';
		$config['total_rows'] = $this->db->count_all('products');;
		$config['per_page'] = 10;
		$config['uri_segment'] = 2;
		$config['first_link'] = 'first';
		$config['last_link'] = 'last';
		$config['next_link'] = 'next';
		$config['prev_link'] = '&lt;';
		$this->pagination->initialize($config); 
		$start = $this->uri->segment(2);
		$var['links'] = $this->pagination->create_links();
		$var['products'] = $this->admin_info->get_all_products_limit($config["per_page"], $start);
		$var['categories'] = $this->admin_info->get_all_categories();
		$var['count'] = $config['total_rows'];
		$this->load->view('admin/products', $var);
	} 
	public function sort_products()
	{
		$product_search = $this->input->post('product_search');
		$var['products']	 	= $this->admin_info->sort_products_by_name_id($product_search);
		$var['categories'] 		= $this->admin_info->get_all_categories();
		
		$this->load->view('admin/products', $var);
	}
//As Admin, you can edit, delete, add products inside admin/products view
	public function edit_product($id)
	{
		$new_info = $this->input->post();
		$selected_order = $this->input->post('selected_status');
		if ('edit_category') {
			// $this->admin_info->edit_product_by_id($new_info);
			// $this->admin_info->edit_categories_by_id($category_id, $category_new_name);
			// redirect('products#openModal');
			$this->load->view('admin/products', $var);	
		}
		else if ('delete_category') {
			$this->admin_info->delete_category_by_id($id);
			$this->load->view('admin/products', $var);	
		}
		else if ('add_category') {
			$this->admin_info->add_new_category($new_info);
			redirect('products#openModal');
		}
		else if ('edit_product') {
			$this->load->view('admin/products', $var);	
		}
		else if ('preview_edit_product') {
			$this->admin_info->get_all_products();
			$this->load->view('admin/products', $var);	
		}
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