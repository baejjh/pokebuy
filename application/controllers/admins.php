<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admins extends CI_Controller
{
	public function __construct()
	{
    	parent::__construct();
    	$data['loggedin'] = $this->session->userdata('loggedin');
  		$this->load->view('template/admin_header', $data);
  	}	
	public function admin_register()
	{
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|matches[password]');
		
		if($this->form_validation->run() === FALSE)
		{
			var_dump(validation_errors());
			die('errors');
			$this->session->set_flashdata('errors', validation_errors());
			redirect('register');
		} 
		else 
		{
			die('here');
			$post_data = $this->input->post();

			$this->load->model('Admin_info');
			$this->Admin_info->admin_register($post_data);
		}
	}
	public function redirect_to_register()
	{
		$this->load->view('admin/register');
	}

	//ajax handle user login
	public function admin_login()
	{	
		$post_data = $this->input->post();
		var_dump($post_data['password']);

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

			$this->load->model('admin_info');
			$admin = $this->admin_info->check_admin($user);
			var_dump($admin['password']);

			if($admin['password'] == $post_data['password']) {
				redirect('dashboard', $admin);
			}	
			die('still in this function');	
		}
	}
	public function redirect_to_login()
	{
		$this->load->view('admin/login');
	}
	public function redirect_to_new_product()
	{
		$this->load->view('admin/new_product');
	}
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
		$this->load->model('admin_info');
		$var = $this->admin_info->delete_product_by_id($user);	
		$this->load->view('admin/products', $var);	
	}
	public function redirect_to_dashboard()
	{
		$this->load->view('admin/dashboard'); //problem: $email on dashboard is undefined
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
		$this->load->library('pagination');
		$this->db->select('main_image, id, name, inventory_count, quantity_sold');

		$data['base_url'] 		= base_url() . 'products';
		$data['total_rows']		= $this->db->get('products')->num_rows();
		$data['per_page'] 		= 30; //display per page    
		$data['num_links'] 		= 5; // "5 links shown"
		$data['records']			= $this->db->select('main_image, id, name, inventory_count, quantity_sold')->
			get('products', $data['per_page'], $this->uri->segment(3));
		$data['use_page_numbers'] = TRUE; //show the the actual page number rather than $this->uri->segment(*numbers)

		$this->pagination->initialize($data);

		$this->load->model('admin_info');
		$data['products']=$this->admin_info->get_all_products($per_page, $row);
		$this->load->view('admin/products', $data);
	}
	public function admin_logoff()
	{
		$this->session->sess_destroy();
		redirect('stores'); //doesn't go to the store. it goes back to admin
	}
}