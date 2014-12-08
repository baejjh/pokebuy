<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboards extends CI_Controller {

	public function index()
	{
		$this->load->view('admin/login');
	}
}//end of Controller curly