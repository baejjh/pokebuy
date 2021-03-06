<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Stores extends CI_Controller {

	public function __construct()
	{
    	parent::__construct();
    	$display['cart_num'] = $this->cart->total_items();
  		$this->load->view('template/shopping_header', $display);
  	}	
	public function index($page = 0)
	{
		$this->load->model('Store');
		$count = $this->Store->count_products();
		$config = array();
		$config['base_url'] = base_url().'/store/';
		$config['total_rows'] = $count['count(id)'];
		$config['per_page'] = 10;
		$config['uri_segment'] = 2;
		$config['first_link'] = 'first';
		$config['last_link'] = 'last';
		$config['next_link'] = 'next';
		$config['prev_link'] = '&lt;';
		$this->pagination->initialize($config); 
		$start = $this->uri->segment(2);
		$display['links'] = $this->pagination->create_links();
		$display['products'] = $this->Store->pagination($config["per_page"], $start);
		$display['categories'] = $this->Store->get_all_categories();
		$display['count'] = $count;
	
		$this->load->view('store', $display);
	}
	public function category_store($id) {
		$this->load->model('Store');
		$display['category'] = $id;
		if ($this->input->post('selected_order')) {
		$display['products'] = $this->Store->get_all_in_category_by_order($id);
		}
		else
		{
		$display['products'] = $this->Store->get_all_in_category($id);
		}
		$this->load->view('store', $display);
	}
	public function view_product($id) {
		$this->load->model('Store');
		$display['similar_products'] = $this->Store->get_all_in_category($id);
		// /var_dump($display);
		// die('here');
		$display['displayed_product'] = $this->Store->product_buy($id);
		// echo "<pre>";
		// print_r($display['product']);
		// die('here');
		// $display['similar_products']['images'] = $this->Store->get_all_images();
		// var_dump($display);
		// die('here');
		// $image_id = $display['similar_products']['images'][$id]['id'];
		$display['displayed_product']['image'] = $this->Store->get_image_by_product_id($id);
		// echo "<pre>";	
		// print_r($display);
		// die('here');
		$this->load->view('product', $display);
		// var_dump($display);
		// die('here');
	}
	public function to_product($new_id){
		$this->load->model('Store');
		$display['similar_products'] = $this->Store->get_all_in_category($new_id);
		$display['displayed_product'] = $this->Store->product_buy($new_id);
		$display['displayed_product']['image'] = $this->Store->get_image_by_product_id($new_id);
		$this->load->view('product', $display);
	}
	public function product_buy($id) {
		$this->load->model('Store');
		$display['id'] = $this->Store->product_buy($id);
		$this->load->view('cart', $display);
	}
	public function show_cart() {
		$data['errors'] = $this->session->flashdata('errors');
		$data['products'] = $this->cart->contents();
		$this->load->model('Store');
		$data['states'] = $this->Store->get_states();
		$this->load->view('cart', $data);
	}
	public function add_to_cart($id) {
		$qty;
		if(!empty($this->input->post('qty'))) {
			$qty = $this->input->post('qty');
		} else {
			$qty = 1;
		}
		$this->load->model('Store');
		$product = $this->Store->product_buy($id);
		$data[] = array(
			 	'id'      => $product['id'],
            	'qty'     => $qty,
             	'price'   => $product['price'],
              	'name'    => $product['name'],
				'inventory' => $product['inventory_count']);
		$this->cart->insert($data);
		redirect('cart');
	}
	public function delete_from_cart() {
		$rowid = $this->input->post('rowid');
		$data = array(
               'rowid' => $rowid,
               'qty'   => 0);
		$this->cart->update($data);
		redirect('cart');
	}
	public function update_cart_quantity() {
		$product = $this->input->post();
		$data = array(
      			'rowid' => $product['rowid'],
               	'qty'   => $product['qty']);
		$this->cart->update($data);
		redirect('cart');
	}
	public function search_product() {
		$name = $this->input->post('name');

		$this->load->model('Store');
		$display['products'] = $this->Store->get_product_by_name($name, selectiontype);
		$display['name'] = $this->input->post('name');
		$display['categories'] = $this->Store->get_all_categories();
		$this->load->view('store', $display);
	}
	public function sort_orders_by_status() {
		$word_search = $this->input->post('word_search');
		$category = $this->input->post('category');
		$selected_order = $this->input->post('selected_order');
		if (!isset($word_search)) {
			$word_search = NULL;
		}
		if (!isset($category)) {
			$category = NULL;
		}
		if (!isset($selected_order)) {
			$selected_order = NULL;
		}
		// $this->load->model('Store');
		// $display['products'] = $this->Store->get_category_with_search_by_order($selected_order, $word_search, $category);
		// $display['categories'] = $this->Store->get_all_categories();
		// $this->load->view('store', $display);
		//////////////////////////////////////
		$this->load->model('Store');
		$count = $this->Store->count_products();
		$config = array();
		$config['base_url'] = base_url().'/order_by/';
		$config['total_rows'] = $count['count(id)'];
		$config['per_page'] = 10;
		$config['uri_segment'] = 2;
		$config['first_link'] = 'first';
		$config['last_link'] = 'last';
		$config['next_link'] = 'next';
		$config['prev_link'] = '&lt;';
		$this->pagination->initialize($config); 
		$start = $this->uri->segment(2);
		$display['links'] = $this->pagination->create_links();
		$display['products'] = $this->Store->get_category_with_search_by_order($selected_order, $word_search, $category, $config["per_page"], $start);
		$display['categories'] = $this->Store->get_all_categories();
		$display['count'] = $count;
	
		$this->load->view('store', $display);

	}
	public function submit_order() {
		$post = $this->input->post();
		
		$this->form_validation->set_rules('first_name', 'First Name', 'required|alpha|min_length[2]');
		$this->form_validation->set_rules('last_name', 'Last Name', 'required|alpha|min_length[2]');
		$this->form_validation->set_rules('address', 'Address', 'required|min_length[3]');
		$this->form_validation->set_rules('address2', 'Address 2', 'min_length[2]]');
		$this->form_validation->set_rules('city', 'City', 'required|min_length[2]');
		$this->form_validation->set_rules('zip_code', 'Zipcode', 'required|min_length[5]|max_length[10]');

		if(empty($post['billing'])) {
			$this->form_validation->set_rules('billing_first_name', 'Billing First Name', 'required|alpha|min_length[2]');
			$this->form_validation->set_rules('billing_last_name', 'Billing Last Name', 'required|alpha|min_length[2]');
			$this->form_validation->set_rules('billing_address', 'Billing Address', 'required|min_length[3]');
			$this->form_validation->set_rules('billing_address2', 'Billing Address 2', 'min_length[2]');
			$this->form_validation->set_rules('billing_city', 'Billing City', 'required|min_length[2]');
			$this->form_validation->set_rules('billing_zip_code', 'Billing Zipcode', 'required|min_length[5]|max_length[10]');
			$post['billing'] = 'different';
		} else {
			$post['billing_first_name'] = $post['first_name'];
			$post['billing_last_name'] = $post['last_name'];
			$post['billing_address'] = $post['address'];
			$post['billing_address2'] = $post['address2'];
			$post['billing_city'] = $post['city'];
			$post['billing_state'] = $post['state'];
			$post['billing_zip_code'] = $post['zip_code'];
		}
		if($this->form_validation->run() === FALSE) {
			$this->session->set_flashdata('errors', validation_errors());
			redirect('cart');
		}
		$data['products'] = $this->cart->contents();
		$data['customer'] = $post;
		$this->load->model('Store');
		$test = $this->Store->submit_order($data);
		$this->cart->destroy();
		redirect('success');
	}
	public function order_success() {
		$this->load->view('success');
	}
	public function pagination() {
		$config['base_url'] = 'http://example.com/index.php/test/page/';
		$config['total_rows'] = 200;
		$config['per_page'] = 20; 

		$this->pagination->initialize($config); 

		echo $this->pagination->create_links();
	}

}//end of Controller curly