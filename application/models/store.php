<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Store extends CI_Model {
	
	public function get_all_categories()
	{
		return $this->db->query("SELECT * FROM categories")->result_array();
	}
	public function get_all_in_category($id) 
	{
		$query = "SELECT products.id, products.name, products.price, products.description, products.main_image_id, categories.name AS category FROM products
				  LEFT JOIN product_categories
				  ON products.id = product_categories.product_id
				  LEFT JOIN categories 
				  ON product_categories.category_id = categories.id
				  WHERE category_id = ?";
		$value = array($id);
		return $this->db->query($query, $value)->result_array();
	}
	public function get_all_products() 
	{
		$query = "SELECT * FROM products";
		return $this->db->query($query)->result_array();
	}
	public function product_buy($id) 
	{
		$query = "SELECT * FROM products WHERE id = {$id}";
		return $this->db->query($query)->row_array();
	}
	public function get_product_by_name($name) 
	{
		$query = "SELECT * FROM products WHERE name = ?";
		$value = array($name);
		return $this->db->query($query, $value)->result_array();
	}
	public function get_states() 
	{
		return $this->db->query("SELECT id, abbreviation FROM states")->result_array();
	}
	public function submit_order($data)
	{
		// $query = "INSERT INTO orders_has_products (order_id, product_id, price, quantity_ordered) VALUES (1,?,?,?)";
		// $values = $order;
		// $result = $this->db->query($query, $values);


		// $query1 = "INSERT INTO addresses (address, address2, city, state_id, created_at, updated_at) VALUES (?,?,?,?,NOW(),NOW())";
		// $values = array($data['address'], $data['address2'], $data['city'], $data['state']);
		// $this->db->query($query1, $values);
		// $result1 = $this->db->insert_id();

		// $query3 = "INSERT INTO customers (first_name, last_name, created_at, updated_at) VALUES (?,?,NOW(), NOW())";
		// $values3 = array($data['first_name'], $data['last_name']);
		// $this->db->query($query3, $values3);
		// $result3 = $this->db->insert_id();

		// $query2 = "INSERT INTO orders (billing_address_id, shipping_address_id, billing_customer_id, shipping_customer_id, status_id, created_at, updated_at) 
		// 		   VALUES ($result1, $result1, $result3, $result3, 1, NOW(), NOW())";
		// $this->db->query($query2);
		// $result2 = $this->db->insert_id();

		$result2 = 2;
		$query4 = "INSERT INTO orders_has_products (order_id, product_id) VALUES (?,?)";
		$values4;
		$what = NULL;
		foreach($data['products'] as $product) {
			$values4 = array($result2, (int)$product['id']);
			$what += implode($values4);
		}
		$test = implode($values4);
		var_dump($values4);
		die();
		return $this->db->query($query4, $values4);

	}

}