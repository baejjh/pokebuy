<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_info extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}
	public function admin_register($admins)
	{
	    $query = "INSERT INTO admins (email, password, created_at, updated_at) VALUES (?,?,?,?)";
	    $values = array($admins['email'], $admins['password'], date("M j Y, g:iA"), date("M j Y, g:iA")); 
	    return $this->db->query($query, $values);
	}
	public function check_admin($email)
	{
		return $this->db->query("SELECT * FROM admins WHERE email = ?", $email)->row();
	}	
}

?>