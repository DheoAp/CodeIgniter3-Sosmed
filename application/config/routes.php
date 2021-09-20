<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['login'] = 'AuthController';
$route['daftar'] = 'AuthController/daftar';

$route['admin/home'] = 'admin/HomeController';
$route['detail/post/(:num)'] = 'admin/HomeController/detail_post/$1';
$route['detail/(:num)'] = 'admin/HomeController/detail/$1';
$route['logout'] = 'admin/HomeController/logout';

$route['default_controller'] = 'AuthController';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
