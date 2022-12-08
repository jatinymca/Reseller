<?php
@ob_start();
@session_start();
error_reporting(0);
date_default_timezone_set('asia/calcutta');
$now = date('Y-m-d H:i:s');
$today = date('Y-m-d');
// DB Info
$sLoacl = true; ### Local Cofiguration
//$sLoacl = false; ### Server Cofiguration

if($sLoacl == true)
{
	define('sDBHOST','localhost');
	define('sDBUSERNAME','root');
	define('sDBPASSWORD','xspl#!#!@123');
	define('sDBNAME','vertage');
	define('sHOST','http://localhost/vert-age_dialer'); 		// for site url
	 
}
else
{
    define('sDBHOST','localhost');
	define('sDBUSERNAME','root');
	define('sDBPASSWORD','xspl#!#!@123');
	define('sDBNAME','vertage');
	define('sHOST','http://localhost/vert-age_dialer'); 
	 
}

$actuals_link		= 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$prerequestURL 		= $_SERVER['REQUEST_URI'];
$pathcaseu 			= parse_url($actuals_link, PHP_URL_PATH);
$segmentschunks 	= explode('/', $pathcaseu);
 // print_r($segmentschunks);
############## Auto class Add ############
if (in_array("controller", $segmentschunks)) 
{

	function __autoload($class_name) 
	{    
		echo $class_name;
		//require_once "../classes/".strtolower($class_name).'.php';
		echo "../classes/".strtolower($class_name).'.php';
	}
}
else
{
	function __autoload($class_name) 
	{    echo $class_name;
		//require_once "classes/".strtolower($class_name).'.php';
		echo "classes/".strtolower($class_name).'.php';
	}
}	
################# ALL Meta Title file include #################
 
 

?>



