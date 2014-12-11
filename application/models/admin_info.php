<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_info extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}


//ADMIN
	public function admin_register($admin)
	{
	    $query = "INSERT INTO admins
	    			(email, password, created_at, updated_at)
	    		  VALUES (?,?,NOW(),NOW())";
	    $values = array(
		    		$admin['email'],
		    		$admin['password']
	    		  ); 
	    $this->db->query($query, $values);
	    return $this->db->insert_id();
	}
	public function check_admin($email)
	{
		return $this->db->query("SELECT * FROM admins
								 WHERE email = ?", $email)
						->row_array();
	}



//PRODUCTS
	public function get_all_products()
	{
		return $this->db
		->query("SELECT products.id AS 'item_id',
					    products.name AS 'item_name',
				        products.inventory_count AS 'item_inventory',
				        products.quantity_sold AS 'item_sold',
				        products.main_image_id AS 'item_img_id',
				      	products.price AS 'item_price',
				        categories.name AS 'item_category',
					    images.location AS 'item_main_img_url',
				        images.name AS 'item_img_description'
				FROM products
				LEFT JOIN images_has_products ON products.id = images_has_products.product_id
				LEFT JOIN images ON images.id = images_has_products.image_id
				LEFT JOIN product_categories ON products.id = product_categories.product_id
				LEFT JOIN categories ON categories.id = product_categories.category_id
				GROUP BY products.id")
		//WHERE products.active = 1 for inactive/deleted products to not display
			            ->result_array();
		//need to retrieve images too
	}
	public function get_all_products_limit($start_row, $per_page)
	{
		$query= "SELECT products.id AS 'item_id',
					    products.name AS 'item_name',
				        products.inventory_count AS 'item_inventory',
				        products.quantity_sold AS 'item_sold',
				        products.main_image_id AS 'item_img_id',
				        products.price AS 'item_price',
				        categories.name AS 'item_category',
					    images.location AS 'item_main_img_url',
				        images.name AS 'item_img_description'
				FROM products
				LEFT JOIN images_has_products ON products.id = images_has_products.product_id
				LEFT JOIN images ON images.id = images_has_products.image_id
				LEFT JOIN product_categories ON products.id = product_categories.product_id
				LEFT JOIN categories ON categories.id = product_categories.category_id
				GROUP BY products.id
				LIMIT $per_page";
		$values = array(
					$per_page
				  );
		return $this->db->query($query, $values)->result_array();
		//need to retrieve images too
	}
	public function add_new_product($new_product)
	{
		$query = "INSERT INTO products
					(name, description, price, main_image_id, inventory_count, created_at, updated_at, active)
				  VALUES (?,?,?, 3,?,NOW(),NOW(),0)";
	    $values = array(
		    		$new_product['name'],
		    		$new_product['description'],
		    		$new_product['price'],
		    		$new_product['inventory_count']
	    		  ); 
	    return $this->db->query($query, $values);
	}
	public function edit_product_by_id($new_info)
	{
		// UPDATE:
		// how does this query work?
		// from sql:
		// "UPDATE `products` SET `inventory_count`='12' WHERE `id`='4'"
		$query= "START TRANSACTION;
				SELECT products.id AS 'item_id',
						products.name AS 'item_name',
						products.inventory_count AS 'item_inventory',
						products.quantity_sold AS 'item_sold',
						products.main_image_id AS 'item_img_id',
						products.price AS 'item_price',
						categories.name AS 'item_category',
						images.location AS 'item_main_img_url',
						images.name AS 'item_img_description'
				FROM products
				LEFT JOIN images_has_products ON products.id = images_has_products.product_id
				LEFT JOIN images ON images.id = images_has_products.image_id
				LEFT JOIN product_categories ON products.id = product_categories.product_id
				LEFT JOIN categories ON categories.id = product_categories.category_id
				WHERE products.id = 1 FOR UPDATE;
				UPDATE products SET products.name = ?;";
		$values = array(
					$new_info
				  );
		return $this->db->query($query, $values)->result_array();
		
	}
	public function delete_product_by_id($id)
	{
		$query = "UPDATE products
				  SET active = '1'
				  WHERE id = ?"; //set active status to false
	    $values = $id;
	    return $this->db->query($query, $values);
	}

//CATEGORIES
	public function get_all_categories()
	{
		return $this->db
		->query("SELECT
					categories.name AS 'category_name',
					categories.id AS 'category_id'
				 FROM categories")
		->result_array();
	}
	public function add_new_category($category_name)
	{	
		$query = "INSERT INTO categories
					(name, active, created_at, updated_at)
				  VALUES (?, 0, NOW(), NOW())";
	    $values = $category_name;
	    return $this->db->query($query, $values);
	}
	public function edit_categories_by_id($id, $new_name)
	{
		$query = "UPDATE categories
					(name, updated_at)
				  VALUES (?, NOW())
				  WHERE id = ?";
	    $values = array(
	    			$new_name,
	    			$id
	    		  );
	    return $this->db->query($query, $values);
	}
	public function delete_category_by_id($id)
	{
		$query = "INSERT INTO category (active)
				  VALUES (0)
				  WHERE id = ?"; //set active status to false
	    $values = $id;
	    return $this->db->query($query, $values);
	}

//ORDERS
	public function get_all_status_types()
	{
		return $this->db->query("SELECT * FROM statuses")->result_array();
	}
	function show_all_orders()
	{
		return $this->db
		->query("SELECT orders.id AS 'order_id',
				    CONCAT_WS(' ',customers.first_name,customers.last_name) AS 'biller_full_name',
			        orders.created_at AS 'order_submitted',
			        CONCAT_WS(' ',addresses.address,addresses.address2) AS 'billing_address_street',
			        CONCAT_WS(', ',addresses.city,states.abbreviation) AS 'billing_address_city_state',
			        addresses.zip_code AS 'billing_address_zip',
			        orders.total AS 'order_total',
			        statuses.status AS 'order_status'
				FROM orders
				LEFT JOIN customers ON orders.billing_customer_id = customers.id
				LEFT JOIN addresses ON orders.billing_address_id = addresses.id
				LEFT JOIN states ON states.id = addresses.state_id
				LEFT JOIN statuses ON orders.status_id = statuses.id
				GROUP BY orders.id")
		->result_array();
	}
	public function show_one_order_view($id)
	{
		return $this->db
		->query("SELECT orders.id AS 'order_id',
					orders.created_at AS 'order_submitted',
					orders.updated_at AS 'changes_submitted',
					CONCAT_WS(' ',billing_customers.first_name, billing_customers.last_name) AS 'biller_full_name',
					CONCAT_WS(' ',billing_addresses.address, billing_addresses.address2) AS 'billing_address_street',
					CONCAT_WS(', ',billing_addresses.city, billing_states.abbreviation) AS 'billing_address_city_state',
					billing_addresses.zip_code AS 'billing_address_zip',
					CONCAT_WS(' ',shipping_customers.first_name, shipping_customers.last_name) AS 'shipper_full_name',
					CONCAT_WS(' ',shipping_addresses.address, shipping_addresses.address2) AS 'shipping_address_street',
					CONCAT_WS(', ',shipping_addresses.city, shipping_states.abbreviation) AS 'shipping_address_city_state',
					shipping_addresses.zip_code AS 'shipping_address_zip',
					orders.subtotal AS 'order_subtotal',
					orders.shipping_price AS 'order_shipping_cost',
					orders.total AS 'order_total',
					statuses.status AS 'order_status',
					products.id AS 'item_id',
					products.name AS 'item_name',
					orders_has_products.quantity_ordered AS 'item_quantity',
					orders_has_products.price AS 'item_single_price',
					orders_has_products.price * orders_has_products.quantity_ordered AS 'item_total_price',
				    images.location AS 'item_main_img_url',
					images.name AS 'item_img_description'
				FROM orders
				LEFT JOIN customers AS billing_customers ON orders.billing_customer_id = billing_customers.id
				LEFT JOIN addresses AS billing_addresses ON orders.billing_address_id = billing_addresses.id
				LEFT JOIN customers AS shipping_customers ON orders.shipping_customer_id = shipping_customers.id
				LEFT JOIN addresses AS shipping_addresses ON orders.shipping_address_id = shipping_addresses.id

				LEFT JOIN states AS billing_states ON billing_addresses.state_id = billing_states.id
				LEFT JOIN states AS shipping_states ON shipping_addresses.state_id = shipping_states.id

				LEFT JOIN statuses ON orders.status_id = statuses.id
				LEFT JOIN orders_has_products ON orders.id = orders_has_products.id
				LEFT JOIN products ON orders_has_products.product_id = products.id
				LEFT JOIN images_has_products ON products.id = images_has_products.product_id
				LEFT JOIN images ON images.id = images_has_products.image_id
				WHERE orders.id = ?", $id)
		->result_array();
		//need to retrieve images too
	}
	public function organize_by_status($status_name)
	//need to get it by status id first and then get status name
	{
		return $this->db->query(
			"SELECT orders.id, billing_customer_id, order_date, billing_address_id, total, status_id, status
			 FROM orders
			 LEFT JOIN statuses
	   		 	ON orders.status_id = statuses.id
			 WHERE status = ?", $status_name);
	}
	public function get_orders_by_search_status($selected_status, $word_search) 
	{
		$where = "";
		if ($selected_status == 'Pending') {
			if ($word_search != NULL) {
				$where = "WHERE statuses.status LIKE '%{$selected_status}%'
							  AND customers.first_name LIKE '%{$word_search}%'
							  OR customers.last_name LIKE '%{$word_search}%'
							  OR orders.id LIKE '%{$word_search}%'
							  OR addresses.zip_code LIKE '%{$word_search}%'
               			  ORDER BY orders.created_at ASC"; //old one first
			}
			else if ($word_search == NULL) {
				$where = "WHERE statuses.status LIKE '%{$selected_status}%' ORDER BY orders.created_at ASC";
			}
		}
		else if ($selected_status == 'Ordered') {
			if ($word_search != NULL) {
				$where = "WHERE statuses.status LIKE '%{$selected_status}%'
							  AND customers.first_name LIKE '%{$word_search}%'
							  OR customers.last_name LIKE '%{$word_search}%'
							  OR orders.id LIKE '%{$word_search}%'
							  OR addresses.zip_code LIKE '%{$word_search}%'
               			  ORDER BY orders.created_at ASC"; //old one first
			}
			else if ($word_search == NULL) {
				$where = "WHERE statuses.status LIKE '%{$selected_status}%' ORDER BY orders.created_at ASC";
			}
		}
		else if ($selected_status == 'Shipped') {
			if ($word_search != NULL) {
				$where = "WHERE statuses.status LIKE '%{$selected_status}%'
							  AND customers.first_name LIKE '%{$word_search}%'
							  OR customers.last_name LIKE '%{$word_search}%'
							  OR orders.id LIKE '%{$word_search}%'
							  OR addresses.zip_code LIKE '%{$word_search}%'
               			  ORDER BY orders.created_at ASC"; //old one first
			}
			else if ($word_search == NULL) {
				$where = "WHERE statuses.status LIKE '%{$selected_status}%' ORDER BY orders.created_at ASC";
			}
		}
		else if ($selected_status == 'Returned') {
			if ($word_search != NULL) {
				$where = "WHERE statuses.status LIKE '%{$selected_status}%'
							  AND customers.first_name LIKE '%{$word_search}%'
							  OR customers.last_name LIKE '%{$word_search}%'
							  OR orders.id LIKE '%{$word_search}%'
							  OR addresses.zip_code LIKE '%{$word_search}%'
               			  ORDER BY orders.created_at ASC"; //old one first
			}
			else if ($word_search == NULL) {
				$where = "WHERE statuses.status LIKE '%{$selected_status}%' ORDER BY orders.created_at ASC";
			}
		}
		else if ($selected_status == NULL) {
			if ($word_search != NULL) {
				$where = "WHERE statuses.status LIKE '%{$selected_status}%'
							  AND customers.first_name LIKE '%{$word_search}%'
							  OR customers.last_name LIKE '%{$word_search}%'
							  OR orders.id LIKE '%{$word_search}%'
							  OR addresses.zip_code LIKE '%{$word_search}%'
               			  ORDER BY orders.created_at ASC"; //old one first
			}
			else if ($word_search == NULL) {
				$where = "";
			}
		}
		$query = "SELECT orders.id AS 'order_id',
				    CONCAT_WS(' ',customers.first_name,customers.last_name) AS 'biller_full_name',
			        orders.created_at AS 'order_submitted',
			        CONCAT_WS(' ',addresses.address,addresses.address2) AS 'billing_address_street',
			        CONCAT_WS(', ',addresses.city,states.abbreviation) AS 'billing_address_city_state',
			        addresses.zip_code AS 'billing_address_zip',
			        orders.total AS 'order_total',
			        statuses.status AS 'order_status'
				FROM orders
				LEFT JOIN customers ON orders.billing_customer_id = customers.id
				LEFT JOIN addresses ON orders.billing_address_id = addresses.id
				LEFT JOIN states ON states.id = addresses.state_id
				LEFT JOIN statuses ON orders.status_id = statuses.id
				{$where} ";
		return $this->db->query($query)->result_array();
	}
}
?>