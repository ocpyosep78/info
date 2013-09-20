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
	
} else {
	$route['panel'] = "panel/home";
}

$route['default_controller'] = "website/home";
$route['404_override'] = '';