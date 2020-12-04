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
$default_controller = "home";
$controller_exceptions = array('contact', 'profile', 'signup', 'login', 'logout', 'search', 'apply');
$route['default_controller'] = $default_controller;

foreach($controller_exceptions as $v) {
	$route[$v] = "$default_controller/".$v;
	$route[$v."/(.*)"] = "$default_controller/".$v.'/$1';
}


//Routing controller Company
$admin_controller = "company";
$admin_exceptions = array('newsupply', 'manage', 'info');
$route['admin'] = $admin_controller;
foreach($admin_exceptions as $v) {
	$route[$v] = "$admin_controller/".$v;
	$route[$v."/(.*)"] = "$admin_controller/".$v.'/$1';
}


//Routing controller CMS
$CMS_controller = "admin";
$CMS_exceptions = array('insert', 'update', 'delete');
$route['admin'] = $CMS_controller;
foreach($CMS_exceptions as $v) {
	$route[$v] = "$CMS_controller/".$v;
	$route[$v."/(.*)"] = "$CMS_controller/".$v.'/$1';
}

$route['admin/:num'] = "admin/index/$1";

// $route['company/:num'] = "admin/index/$1";



// $route["^((?!\b".implode('\b|\b', $controller_exceptions)."\b).*)$"] = $default_controller.'/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
