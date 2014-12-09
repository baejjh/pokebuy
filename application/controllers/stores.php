<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Stores extends CI_Controller {

	public function __construct()
	{
    	parent::__construct();
  		$this->load->view('template/shopping_header');
  	}	
  	public function index()
	{
		$this->load->view('store');
	}
}//end of Controller curly