<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Stores extends CI_Controller {

	public function index()
	{
		$display['categories'] = $this->Store->get_all_categories();
		$this->load->view('store', $display);
	}

	public function category_store($id) {
		$this->load->model('Store');
		$this->Store->get_all_categories();
		$display['category'] = $id;
		$display['products'] = $this->Store->get_all_by_category($id);
		$this->load->view('store', $display);
	}
}//end of Controller curly