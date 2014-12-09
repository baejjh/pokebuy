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
	public function get_all_products()
	{
		return $this->db->query("SELECT * FROM products")->result_array();
	}
	public function add_new_product($new_product)
	{
		$query = "INSERT INTO products (name, description, price, inventory_count, main_image, created_at, updated_at) VALUES (?,?,?,?,?,?,?)";
	    $values = array($new_product['name'], $new_product['description'],$new_product['price'],$new_product['inventory_count'], $new_product['main_image'], date("M j Y, g:iA"), date("M j Y, g:iA")); 
	    return $this->db->query($query, $values);
	}
}

?>