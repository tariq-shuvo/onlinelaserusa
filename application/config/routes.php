<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['capabilities']='welcome/capabilities';
$route['capabilities/high-speed-laser-blanking']='welcome/high_speed_laser_blanking';
$route['design-guidelines']='welcome/guidelines';
$route['videos']='welcome/videos';
$route['contact']='welcome/contact';
$route['blog']='welcome/blog';
$route['cart']='welcome/cart';
$route['quote']='welcome/quote';

//Start customer login views
$route['user/custom_quote']='website/customer/custom_quote';
$route['user/subscription']='website/customer/subscription';
$route['user/contact']='website/customer/contact';
$route['user/login']='website/customer/login';
$route['user/registration']='website/customer/register';
$route['user/forgot']='website/customer/forgot';
$route['user/reset/(:any)']='website/customer/reset/$1';
//End customer login views

//Start customer authentication router
$route['customer/auth/registration']='authentication/auth/c_register';
$route['customer/auth/login']='authentication/auth/c_login';
$route['customer/auth/logout']='authentication/auth/c_logout';
$route['customer/auth/forgot']='authentication/auth/c_forgot';
$route['customer/auth/verification/(:any)']='authentication/auth/c_verification/$1';
$route['customer/auth/reset']='authentication/auth/c_reset';
//End customer authentication router

//Start admin authentication router
$route['admin/auth/register']='authentication/auth/a_register';
$route['admin/auth/login']='authentication/auth/a_login';
$route['admin/auth/forgot']='authentication/auth/a_forgot';
$route['admin/auth/verification/(:any)']='authentication/auth/a_verification/$1';
$route['admin/auth/reset']='authentication/auth/a_reset';
//End admin authentication router

//Start squareup payment
$route['squareup/payment']='squareup/payment/checkout';
//End squareup payment

//Start paypal payment
$route['paypal/payment']='paypal/payment/checkout';
$route['paypal/update']='paypal/payment/update';
$route['paypal/cancel']='paypal/payment/cancel';
//End paypal payment

$route['cart/add']='shopping/cart/add';
$route['cart/all']='shopping/cart/all';
$route['cart/update']='shopping/cart/update';
$route['cart/delete/(:any)']='shopping/cart/delete/$1';
$route['checkout']='welcome/checkout';
$route['checkout/review']='welcome/review';
$route['checkout/payment']='welcome/payment';
$route['checkout/confirmation']='welcome/confirmation';
$route['download/(:any)'] = "welcome/download/$1";
$route['default_controller'] = 'welcome';
$route['404_override'] = 'welcome/not_found';
$route['translate_uri_dashes'] = FALSE;
