<?php

if (!@function_exists('__get_custom_data_full_path'))
{
	$_ENV['RAINLOOP_OWNCLOUD'] = true;
	function __get_custom_data_full_path()
	{
		$sData = rtrim(trim(OC::$server->getSystemConfig()->getValue('datadirectory', '')), '\\/').'/';
		return @is_dir($sData) ? $sData.'rainloop-storage' : '';
	}
}

if (!defined('APP_VERSION'))
{
	define('APP_VERSION', '1.16.0');
	define('APP_VERSION_TYPE', 'community');
	define('APP_INDEX_ROOT_FILE', __FILE__);
	define('APP_INDEX_ROOT_PATH', str_replace('\\', '/', rtrim(dirname(__FILE__), '\\/').'/'));
}

if (file_exists(APP_INDEX_ROOT_PATH.'rainloop/v/'.APP_VERSION.'/include.php'))
{
	include APP_INDEX_ROOT_PATH.'rainloop/v/'.APP_VERSION.'/include.php';
}
else
{
	echo '[105] Missing version directory';
	exit(105);
}
