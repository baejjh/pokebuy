<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Stores extends CI_Controller {

	public function __construct()
	{
    	parent::__construct();
  		$this->load->view('template/shopping_header');
  	}	
	public function index()
	{
		$display['products'] = $this->Store->get_all_products();
		var_dump($display);
		die();
		$display['category'] = $this->Store->get_all_categories();
		$this->load->view('store', $display);
	}
	public function category_store($id) {
		// pagination, with explanation @ https://ellislab.com/codeigniter/user-guide/libraries/pagination.html
		//  more pagination tips https://github.com/soyosolution/CodeIgniter-pagination-library
		// more more pagination tips http://www.storycon.us/ci3/libraries/pagination.html
		$this->load->library('pagination');
		$config['base_url'] = 'http://localhost:8888/stores/category_store';
		$config['total_rows'] = 50;
		$config['per_page'] = 10; 
		$config['num_links'] = 2;
		$config['first_link'] = 'first';
		$config['last_link'] = 'last';
		$config['next_link'] = 'next';
		$config['prev_link'] = '&lt;';
		$config['display_pages'] = FALSE;
		// $config['anchor_class'] = 'pagination_links';
		$this->pagination->initialize($config); 
		echo $this->pagination->create_links();
		//end of pagination code
		$this->load->model('Store');
		$this->Store->get_all_categories();
		$display['category'] = $id;
		$display['products'] = $this->Store->get_all_by_category($id);
		$this->load->view('store', $display);
	}
}//end of Controller curly