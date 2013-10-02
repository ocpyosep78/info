<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
$is_website = true;

$url_arg = preg_replace('/(^\/|\/$)/i', '', @$_SERVER['argv'][0]);
$array_arg = explode('/', $url_arg);

if (count($array_arg) >= 1) {
	$key = $array_arg[0];
	if (in_array($key, array( 'panel' ))) {
		$is_website = false;
	}
}

if ($is_website) {
	$route['(semua|gaya-hidup|hiburan|pendidikan|teknologi|aneh)'] = "website/category";
	$route['(semua|gaya-hidup|hiburan|pendidikan|teknologi|aneh)/(:any)'] = "website/category";
	$route['(:num)/(:num)/(:any)'] = "website/detail";
	$route['rss'] = "website/rss";
	$route['tag'] = "website/tag";
	$route['tag/(:any)'] = "website/tag";
	$route['login'] = "website/login";
	$route['login/(:any)'] = "website/login";
	$route['logout'] = "website/logout";
	$route['submit'] = "website/submit";
	$route['submit/(:any)'] = "website/submit";
	$route['register'] = "website/register";
	$route['register/(:any)'] = "website/register";
}

$route['panel'] = "panel/home";

$route['default_controller'] = "website/home";
$route['404_override'] = '';