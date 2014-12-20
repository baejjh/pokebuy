<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Model {

	public function add_user($name,$alias,$email,$password,$dob)
	{	
		$query = "INSERT INTO users (name, alias, email, password, date_of_birth, created_at, updated_at) VALUES (?, ?, ?, ?, ?, NOW(), NOW()) ";
		$values = array($name,$alias,$email,$password,$dob);
		return $this->db->query($query,$values);
	}
	public function get_user($email)
	{
		$query = "SELECT * FROM users WHERE email = ?";
		$values = array($email);
		return $this->db->query($query,$values)->row_array();
	}
}