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
		$categories = $this->Store->get_all_categories();
		$this->session->set_userdata('categories', $categories);
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
	public function product_store($id) {
		$this->load->model('Store');
		$display['products'] = $this->Store->product_buy($id);
		$this->load->view('product', $display);
	}
	public function product_buy($id) {
		$this->load->model('Store');
		$display['id'] = $this->Store->product_buy($id);
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
		$this->load->view('store', $display);
	}
	public function order_by() {
		$this->load->model('Store');
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
		$display['products'] = $this->Store->get_category_with_search_by_order($selected_order, $word_search, $category);
		$categories = $this->Store->get_all_categories();
		$this->session->set_userdata('categories', $categories);
		$this->load->view('store', $display);
	}
}//end of Controller curly