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

$route['default_controller'] 	= "stores";
$route['404_override'] 			= 'add_new_product';
$route['login'] 				= 'admins/admin_login';

// header
$route['dashboard'] 			= "admins/redirect_to_dashboard";
$route['orders']				= "admins/redirect_to_orders";
$route['products/(:num)'] 		= "admins/redirect_to_products/$1";
$route['logoff'] 				= "admins/admin_logoff";

//products view
$route['register'] 				= "admins/redirect_to_register";
$route['new_admin'] 			= "admins/admin_register";
$route['add_product'] 			= "admins/redirect_to_new_product";

//new_products view
$route['new_product'] 			= "admins/add_new_product";
$route['edit_product/(:num)'] 	= "admins/edit_product/$1";
$route['delete_product/(:num)'] = "admins/delete_product/$1";

//admin/login
$route['guest'] = "admins/continue_as_guest";


/* End of file routes.php */
/* Location: ./application/config/routes.php */