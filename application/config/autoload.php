<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$autoload['packages'] = array();
$autoload['libraries'] = array('database', 'session');
$autoload['helper'] = array( 'date', 'common', 'url', 'mcrypt' );
$autoload['config'] = array();
$autoload['language'] = array();
$autoload['model'] = array(
	'Category_model', 'Contact_model', 'User_model', 'User_Type_model', 'Post_model', 'Post_Tag_model', 'Tag_model', 'Page_Static_model',
	'Post_Status_model', 'Comment_model'
);
