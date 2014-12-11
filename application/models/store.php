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
			{$where} ";
		return $this->db->query($query, $value)->result_array();
	}
	public function get_all_products() 
	{
		$query = "SELECT * FROM products";
		return $this->db->query($query)->result_array();
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
}