<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_info extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}
	public function admin_register($admin)
	{
	    $query = "INSERT INTO admins (email, password, created_at, updated_at) VALUES (?,?,NOW(),NOW())";
	    $values = array($admin['email'], $admin['password']); 
	    $this->db->query($query, $values);
	    return $this->db->insert_id();
	}
	public function check_admin($email)
	{
		return $this->db->query("SELECT * FROM admins WHERE email = ?", $email)->row_array();
	}	
	public function get_all_products()
	{
		return $this->db->query("SELECT * FROM products")->result_array();
		//need to retrieve images too
	}
	public function get_all_products_limit($start_row, $per_page)
	{
		$query = "SELECT * FROM products WHERE id >= ? AND id < ?";
		$values = array($start_row, $per_page);
		return $this->db->query($query, $values)->result_array();
		//need to retrieve images too
	}
	public function add_new_product($new_product)
	{
		$query = "INSERT INTO products (name, description, price, inventory_count, main_image, created_at, updated_at) VALUES (?,?,?,?,?,?,?)";
	    $values = array($new_product['name'], $new_product['description'],$new_product['price'],$new_product['inventory_count'], $new_product['main_image'], date("M j Y, g:iA"), date("M j Y, g:iA")); 
	    return $this->db->query($query, $values);
	}
	public function edit_product_by_id($_____)
	{
		$query = "UPDATE products (name, description, price, inventory_count, main_image, created_at, updated_at) VALUES (?,?,?,?,?,?,?) WHERE id = ?";
		//how does this query work?
		//from sql: "UPDATE `products` SET `inventory_count`='12' WHERE `id`='4'"
	}
	public function organize_by_status($status_name)
	//need to get it by status id first and then get status name
	{
		return $this->db->query(
			"SELECT orders.id, billing_customer_id, order_date, billing_address_id, total, status_id, status
			 FROM orders LEFT JOIN statuses
				ON orders.status_id = statuses.id
			 WHERE status = ?", $status_name);
	}
	public function delete_product_by_id($id)
	{
		return $this->db->query("DELETE FROM products WHERE id = ?", $id);
	}
	public function get_all_orders()
	{
		return $this->db->query("SELECT * FROM orders")->result_array();
		//need to retrieve images too
	}
	public function get_all_status()
	{
		return $this->db->query("SELECT * FROM statuses")->result_array();
	}
}

?>