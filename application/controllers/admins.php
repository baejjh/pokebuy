<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admins extends CI_Controller
{
	public function __construct()
	{
    	parent::__construct();
    	$this->load->model('admin_info');
  		$this->load->view('template/admin_header');
  	}

//Guest enters the link from the store, they get directed to the register page:
  	public function redirect_to_register()
	{
		$this->load->view('admin/register');
	}
	public function redirect_to_login()
	{
		$this->load->view('admin/login');
	}

//Once Guest gets to the page, they have the option of 
// 1. Registering as Admin
// 2. Redirect to Login Page if Guest = Admin
// 3. Enter as a Guest (back to Store)
	public function admin_register()
	{		
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');
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
			$this->admin_info->admin_register($post_data);
		}
	}

//When Admin Logs In
	public function admin_login()
	{	
		$post_data = $this->input->post();

		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		
		if($this->form_validation->run() === FALSE)
		{
			$data['status'] = FALSE;
			$data['error_message'] = validation_errors();
			redirect('admin/login');
		}
		else //if validation is correct
		{	
			$user = $post_data["email"];
			$admin = $this->admin_info->check_admin($user);	
			$this->load->view('admin/dashboard', $admin);		
		}
	}

//Once the Admin has access, the Dashboards have:
//GO BACK TO THE DASHBOARD
	public function redirect_to_dashboard()
	{
		$this->load->view('admin/dashboard'); //problem: $email on dashboard is undefined
	}
//GO BACK TO THE ORDERS
	public function redirect_to_orders()
	{
		//retrieve status names for dropdown menus
		$var['statuses'] = $this->admin_info->get_all_status();
		$var['orders'] = $this->admin_info->get_all_orders();
		$this->load->view('admin/orders', $var);
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
	public function show_products()
	{	
		//left it open for pagination doodles
	}
	public function redirect_to_products()
	{
		$this->load->library('pagination');
//PROBLEM
//$start_row value keeps returning boolean of false when it should be a number: $this->uri->segment(3);
		$start_row 		= 1; //temporarily set to 1 instead of $this->uri->segment(3)
		$total_rows		= $this->db->count_all('products'); //both correctly outputs the data size: $this->db->get('products')->num_rows();
		$per_page 		= 10;			

		$config['base_url'] 	= base_url() . 'products';
		$config['total_rows']	= $total_rows;
		$config['per_page'] 	= $per_page; //display per page    
		// $config['use_page_numbers'] = TRUE; //show the the actual page number rather than $this->uri->segment(*numbers)
		
		$this->pagination->initialize($config);
//PROBLEM
//no links are created!
		$this->view_data['pagination_links'] 	= $this->pagination->create_links();
		$this->view_data['products'] 		 	= $this->admin_info->get_all_products_limit($start_row, $per_page);

		$this->load->view('admin/products', $this->view_data);
	} 
	//As Admin, you can edit, delete, add products inside admin/products view
		public function edit_product($id)
		{
			//MODAL GOES HERE!
			// $this->load->model('admin_info');
			// $var = $this->admin_info->edit_product_by_id($user);	
			// $this->load->view('admin/products', $var);	
		}
		public function delete_product($id)
		{
			//you delete, and get all product loaded again before load->view
			$var = $this->admin_info->delete_product_by_id($user);	
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
				// //image upload for product
				// $config = array(
				// 	'upload_path' => "./uploads/",
				// 	'allowed_types' => "gif|jpg|png|jpeg|pdf",
				// 	'overwrite' => TRUE,
				// 	'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
				// 	'max_height' => "768",
				// 	'max_width' => "1024"
				// );
				// $this->load->library('upload', $config);
				// if($this->upload->do_upload())
				// {
				// $data = array('upload_data' => $this->upload->data());
				// $this->load->view('upload_success',$data);
				// }
				// else
				// {
				// $error = array('error' => $this->upload->display_errors());
				// $this->load->view('file_view', $error);
				// }

				// //add new db
				// $post_data = $this->input->post();
				// $this->load->model('admin_info');
				// $this->admin_info->add_new_product($post_data);

				$this->load->view('admin/new_product', $new_product);
				//load a success message
			}
//GO BACK TO THE STORE AFTER A LOGOFF
	public function admin_logoff()
	{
		$this->session->sess_destroy();
		redirect('stores'); //doesn't go to the store. it goes back to admin
	}
}