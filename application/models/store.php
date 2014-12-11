<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Store extends CI_Model {
	public function get_all_images()
	{
		return $this->db->query("SELECT images.location, products.id, products.name FROM images LEFT JOIN products ON images.id = products.id ORDER BY products.id")->result_array();
	}
	public function get_image_by_product_id($id)
	{
		$query = "SELECT * FROM images WHERE images.id = ?";
		$value = array($id);
		return $this->db->query($query, $value)->result_array();
	}
	public function get_all_categories()
	{
		return $this->db->query("SELECT * FROM categories")->result_array();
	}
	public function get_all_in_category($id)
	{
		$query = "SELECT products.id, products.name, products.price, products.description, products.main_image_id, images.location, categories.name AS category FROM products
			LEFT JOIN product_categories
			ON products.id = product_categories.product_id
			LEFT JOIN categories 
			ON product_categories.category_id = categories.id
            LEFT JOIN images
            ON products.id = images.product_id
			WHERE category_id = ?";
		$value = array($id);
		return $this->db->query($query, $value)->result_array();
	}
	public function get_all_for_index()
	{
		$query = "SELECT products.id, products.name, products.price, products.description, products.main_image_id, images.location, categories.name AS category FROM products
			LEFT JOIN product_categories
			ON products.id = product_categories.product_id
			LEFT JOIN categories 
			ON product_categories.category_id = categories.id
            LEFT JOIN images
            ON products.id = images.product_id
            GROUP BY products.id";
			return $this->db->query($query)->result_array();
	}
	public function get_category_with_search_by_order($selected_order, $word_search, $category) 
	{
		$where = "";
		$value = array();
		if ($selected_order == 'low_price') {
			if ($word_search != NULL && $category != NULL) {
				$where = "WHERE category_id = ? AND products.name LIKE '%{$word_search}%' ORDER BY price ASC";
				$value = array($category);
			}
			else if ($word_search != NULL && $category == NULL) {
				$where = "WHERE products.name LIKE '%{$word_search}%' ORDER BY price ASC";
			}
			else if ($word_search == NULL && $category != NULL) {
				$where = "WHERE category_id = ? ORDER BY price ASC";
				$value = array($category);
			}
			else if ($word_search == NULL && $category == NULL) {
				$where = "ORDER BY price ASC";
			}
		}
		else if ($selected_order == 'high_price') {
			if ($word_search != NULL && $category != NULL) {
				$where = "WHERE category_id = ? AND products.name LIKE '%{$word_search}%' ORDER BY price DESC";
				$value = array($category);
			}
			else if ($word_search != NULL && $category == NULL) {
				$where = "WHERE products.name LIKE '%{$word_search}%' ORDER BY price DESC";
			}
			else if ($word_search == NULL && $category != NULL) {
				$where = "WHERE category_id = ? ORDER BY price DESC";
				$value = array($category);
			}
			else if ($word_search == NULL && $category == NULL) {
				$where = "ORDER BY price DESC";
			}
		}
		else if ($selected_order == 'most_popular') {
			if ($word_search != NULL && $category != NULL) {
				$where = "WHERE category_id = ? AND products.name LIKE '%{$word_search}%' ORDER BY quantity_sold DESC";
				$value = array($category);
			}
			else if ($word_search != NULL && $category == NULL) {
				$where = "WHERE products.name LIKE '%{$word_search}%' ORDER BY quantity_sold DESC";
			}
			else if ($word_search == NULL && $category != NULL) {
				$where = "WHERE category_id = ? ORDER BY quantity_sold DESC";
				$value = array($category);
			}
			else if ($word_search == NULL && $category == NULL) {
				$where = "ORDER BY quantity_sold DESC";
			}
		}
		else if ($selected_order == NULL) {
			if ($word_search != NULL && $category != NULL) {
				$where = "WHERE category_id = ? AND products.name LIKE '%{$word_search}%' ORDER BY price DESC";
				$value = array($category);
			}
			else if ($word_search != NULL && $category == NULL) {
				$where = "WHERE products.name LIKE '%{$word_search}%' ORDER BY price DESC";
			}
			else if ($word_search == NULL && $category != NULL) {
				$where = "WHERE category_id = ? ORDER BY price DESC";
				$value = array($category);
			}
			else if ($word_search == NULL && $category == NULL) {
				$where = "ORDER BY price DESC";
			}
		}
		$query = "SELECT products.id, products.name, products.price, products.description, products.main_image_id, categories.name 
			AS category FROM products
			LEFT JOIN product_categories
			ON products.id = product_categories.product_id
			LEFT JOIN categories 
			ON product_categories.category_id = categories.id
            LEFT JOIN images
            ON products.id = images.product_id {$where}";
		return $this->db->query($query, $value)->result_array();
	}
	public function get_all_products(){
		$result['count'] = $this->db->query("SELECT count(id) FROM products");
		$query = "SELECT * FROM products";
		$result = $this->db->query($query)->result_array();
		return $result;
	}
	public function get_all_products_by_order($selected_order, $word_search, $category) 
	{		
		if ($selected_order == 'low_price') {
			$query = "SELECT * FROM products WHERE ORDER BY price ASC";
			return $this->db->query($query)->result_array();
		}
		elseif ($selected_order == 'high_price') {
			$query = "SELECT * FROM products ORDER BY price DESC";
			return $this->db->query($query)->result_array();
		}
		elseif ($selected_order == 'most_popular') {
			$query = "SELECT * FROM products ORDER BY quantity_sold DESC";
			return $this->db->query($query)->result_array();
		}
	}
	public function product_buy($id) 
	{
		$query = "SELECT * FROM products WHERE id = {$id}";
		return $this->db->query($query)->row_array();
	}
	public function get_product_by_name($name) 
	{
		$query = "SELECT * FROM products WHERE name LIKE '%{$name}%' ORDER BY name ASC";
		$value = array($name);
		return $this->db->query($query)->result_array();
	}
	public function get_states() 
	{
		return $this->db->query("SELECT id, abbreviation FROM states")->result_array();
	}
	public function submit_order($data)
	{
		$customer = $data['customer'];
		$total = $customer['total'];
		$result = "NULL";
		$result2 = "NULL";
		if($customer['billing'] == "different") {
			$query = "INSERT INTO addresses (address, address2, city, state_id, zip_code, created_at, updated_at) VALUES (?,?,?,?,?,NOW(),NOW())";
			$values = array($customer['billing_address'], $customer['billing_address2'], $customer['billing_city'], $customer['billing_state'], $customer['billing_zip_code']);
			$this->db->query($query, $values);
			$result = $this->db->insert_id();
		} 
		$query1 = "INSERT INTO addresses (address, address2, city, state_id, zip_code, created_at, updated_at) VALUES (?,?,?,?,?,NOW(),NOW())";
		$values1 = array($customer['address'], $customer['address2'], $customer['city'], $customer['state'], $customer['zip_code']);
		$this->db->query($query1, $values1);
		$result1 = $this->db->insert_id();

		if($customer['billing'] == "different") {
			$query2 = "INSERT INTO customers (first_name, last_name, created_at, updated_at) VALUES (?,?,NOW(), NOW())";
			$values2 = array($customer['billing_first_name'], $customer['billing_last_name']);
			$this->db->query($query2, $values2);
			$result2 = $this->db->insert_id();
		}
		$query3 = "INSERT INTO customers (first_name, last_name, created_at, updated_at) VALUES (?,?,NOW(), NOW())";
		$values3 = array($customer['first_name'], $customer['last_name']);
		$this->db->query($query3, $values3);
		$result3 = $this->db->insert_id();

		$query4 = "INSERT INTO orders (billing_address_id, shipping_address_id, billing_customer_id, shipping_customer_id, status_id, subtotal, total, created_at, updated_at) 
				   VALUES ($result, $result1, $result2, $result3, 2, ".$customer['total'].", ".$customer['total'].", NOW(), NOW())";
		$this->db->query($query4);
		$result4 = $this->db->insert_id();

		$values5 = NULL;
		foreach($data['products'] as $product) {
			$what = "(".$result4.", ".$product['id'].", ".$product['price'].", ".$product['qty'].", NOW(), NOW())";
			$values5[] = $what;
		}
		$query5 = "INSERT INTO orders_has_products (order_id, product_id, price, quantity_ordered, created_at, updated_at) VALUES ".implode(',',$values5);
		$this->db->query($query5);

		foreach($data['products'] as $product) {
			$query6 = "UPDATE products SET inventory_count = inventory_count-".$product['qty'].", quantity_sold = quantity_sold+".$product['qty'].", updated_at = NOW() WHERE id = ".$product['id'];
			$result6 = $this->db->query($query6);
		}

		return;
	}

	public function count_products() {
		return $this->db->query("SELECT count(id) FROM products")->row_array();
	}

	public function pagination($limit, $start) {
		$query = "SELECT products.id, products.name, products.price, products.description, products.main_image_id, images.location, categories.name AS category FROM products
			LEFT JOIN product_categories
			ON products.id = product_categories.product_id
			LEFT JOIN categories 
			ON product_categories.category_id = categories.id
            LEFT JOIN images
            ON products.id = images.product_id
            GROUP BY products.id
            LIMIT ?,? ";
         $values = array((int)$start, $limit);
        return $this->db->query($query, $values)->result_array();
	}

}