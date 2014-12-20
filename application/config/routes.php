<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/
// routes for the login-register page
$route['default_controller'] 	= "mains";
$route['register'] 	= "mains/try_reg";
$route['logout'] 	= "mains/logout";
$route['login'] 	= "mains/try_login";
$route['404_override'] 			= '';

// routes for the pokes view
$route['pokes_page'] 	= "pokes/index";
$route['add_poke/(:num)'] 	= "pokes/add_poke/$1";


// //admin/login
// $route['login'] 				= "admins/admin_login";
// $route['login_page'] 			= "admins/redirect_to_login";
// $route['new_admin'] 			= "admins/admin_register";
// $route['register'] 				= "admins/redirect_to_register";
// $route['guest'] 				= "stores";
// $route['store'] 				= "stores";
// $route['admin']					= "admins/redirect_to_login";

// // header
// $route['dashboard'] 			= "admins/redirect_to_dashboard";
// $route['orders']				= "admins/redirect_to_orders";
// $route['products']				= "admins/redirect_to_products";
// $route['logoff'] 				= "admins/admin_logoff";

// //orders view
// $route['orders/(:num)']			= "admins/redirect_to_orders/$1";
// $route['sort_orders'] 			= "admins/sort_orders_by_status";
// $route['submitted_order/(:num)']= "admins/redirect_to_one_order/$1";
// $route['update_status']			= "admins/update_order_status";

// //products view
// $route['products/(:num)']		= "admins/redirect_to_products/$1";
// $route['add_product'] 			= "admins/redirect_to_new_product";
// $route['sort_products']			= "admins/sort_products";
// $route['edit_product/(:num)']	= "admins/edit_product";

// //new_products view
// $route['edit_product/(:num)'] 	= "admins/edit_product/$1";
// $route['delete_product/(:num)'] = "admins/delete_product/$1";

// //stores
// $route['categories/(:num)'] 	= "stores/order_by/$1";
// $route['view_product/(:num)'] 	= "stores/view_product/$1";
// $route['buy/(:num)'] 			= "stores/product_buy/$1";
// $route['add_cart/(:num)'] 		= "stores/add_to_cart/$1";
// $route['search_product'] 		= "stores/sort_orders_by_status";
// $route['order_by'] 				= "stores/sort_orders_by_status";
// $route['order_by/(:num)'] 		= "stores/sort_orders_by_status/$1";
// $route['store/(:num)']			= "stores/index";

// // shopping cart
// $route['cart']					= "stores/show_cart";
// $route['add_cart/(:num)'] 		= "stores/add_to_cart/$1";
// $route['delete']				= "stores/delete_from_cart";
// $route['update_quantity']		= "stores/update_cart_quantity";
// $route['submit_order']			= "stores/submit_order";
// $route['success']				= "stores/order_success";

/* End of file routes.php */
/* Location: ./application/config/routes.php */