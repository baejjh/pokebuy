<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pokes extends CI_Controller {
	
	public function index()
	{
		$this->load->model('Poke');
		$user_poke_history['user'] = $this->Poke->count_poked($this->session->userdata['record']['id']);
		$user_poke_history['all_users'] = $this->Poke->get_all_users();
		// var_dump($user_poke_history['all_users']);
		// die('here');
		$this->load->view('pokes_view', $user_poke_history);
	}
	public function add_poke($id)
	{
		// var_dump($id);
		// die('here');
		$this->load->model('Poke');
		$this->Poke->add_poke($id);
		redirect('/pokes_page');
	}
}
