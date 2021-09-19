<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['login'] = 'AuthController';
$route['daftar'] = 'AuthController/daftar';


$route['default_controller'] = 'AuthController';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
