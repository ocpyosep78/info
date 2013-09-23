<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

define('FOPEN_READ',							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE',		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE',					'ab');
define('FOPEN_READ_WRITE_CREATE',				'a+b');
define('FOPEN_WRITE_CREATE_STRICT',				'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');

define('SHA_SECRET',							'1nf09u3');
define('POST_STATUS_DRAFT',						1);
define('POST_STATUS_PUBLISH',					2);
define('USER_TYPE_ADMINISTRATOR',				1);
define('USER_TYPE_MEMBER',						2);

define('CATEGORY',								'category');
define('CONTACT',								'contact');
define('PAGE_STATIC',							'page_static');
define('POST',									'post');
define('POST_STATUS',							'post_status');
define('POST_TAG',								'post_tag');
define('TAG',									'tag');
define('USER',									'user');
define('USER_TYPE',								'user_type');