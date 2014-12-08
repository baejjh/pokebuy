<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Stores extends CI_Controller {

	public function index()
	{
		$this->load->view('store');
	}
}//end of Controller curly