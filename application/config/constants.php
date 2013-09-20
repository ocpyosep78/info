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
define('POST_TYPE_DRAFT',						1);
define('USER_TYPE_ADMINISTRATOR',				1);
define('USER_TYPE_MEMBER',						2);

define('CATEGORY',								'category');
define('COMMENT',								'comment');
define('CONTACT',								'contact');
define('LINK_SHORT',							'link_short');
define('PAGE_STATIC',							'page_static');
define('POST',									'post');
define('POST_TAG',								'post_tag');
define('POST_TYPE',								'post_type');
define('REQUEST',								'request');
define('SCRAPE_CONTENT',						'scrape_content');
define('SCRAPE_MASTER',							'scrape_master');
define('SHOUT_CONTENT',							'shout_content');
define('SHOUT_MASTER',							'shout_master');
define('TAG',									'tag');
define('USER',									'user');
define('USER_TYPE',								'user_type');