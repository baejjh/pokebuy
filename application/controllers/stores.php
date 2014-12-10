<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Stores extends CI_Controller {

	public function __construct()
	{
    	parent::__construct();
    	$display['cart_num'] = $this->cart->total_items();
  		$this->load->view('template/shopping_header', $display);
  	}	
	public function index()
	{
		$this->load->model('Store');
		$display['products'] = $this->Store->get_all_products();
		$display['categories'] = $this->Store->get_all_categories();
		$this->load->view('store', $display);
	}
	public function category_store($id) {
		$this->load->model('Store');
		$display['category'] = $id;
		$display['products'] = $this->Store->get_all_in_category($id);
		$this->load->view('store', $display);
	}
	public function product_store($id) {
		// // pagination, with explanation @ https://ellislab.com/codeigniter/user-guide/libraries/pagination.html
		// //  more pagination tips https://github.com/soyosolution/CodeIgniter-pagination-library
		// // more more pagination tips http://www.storycon.us/ci3/libraries/pagination.html
		// $this->load->library('pagination');
		// $config['base_url'] = 'http://localhost:8888/stores/category_store';
		// $config['total_rows'] = 50;
		// $config['per_page'] = 10; 
		// $config['num_links'] = 2;
		// $config['first_link'] = 'first';
		// $config['last_link'] = 'last';
		// $config['next_link'] = 'next';
		// $config['prev_link'] = '&lt;';
		// $config['display_pages'] = FALSE;
		// // $config['anchor_class'] = 'pagination_links';
		// $this->pagination->initialize($config); 
		// echo $this->pagination->create_links();
		//end of pagination code

		$this->load->model('Store');
		$this->Store->get_all_in_category();
		$display['category'] = $id;
		$display['products'] = $this->Store->product_buy($id);
		$this->load->view('store', $display);
	}
	public function product_buy($id) {
		$this->load->model('Store');
		$display['id'] = $this->Store->product_buy($id);
		// $display['category'] = $id;
		$this->load->view('cart', $display);
	}
	public function show_cart() {
		$data['products'] = $this->cart->contents();
		$this->load->view('cart', $data);
	}

	public function add_to_cart($id) {
		$this->load->model('Store');
		$product = $this->Store->product_buy($id);
		$data[] = array(
			 	'id'      => $product['id'],
            	'qty'     => 1,
             	'price'   => $product['price'],
              	'name'    => $product['name']);
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
}//end of Controller curly