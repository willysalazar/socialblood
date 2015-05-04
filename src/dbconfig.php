<?php
$isLocal = false;

// IRR 0327
// 00294432035

if ($isLocal)
{    
	define('DB_SERVER', 'localhost');
	define('DB_USERNAME', 'root');    // DB username
	define('DB_PASSWORD', 'usbw');    // DB password
	define('DB_DATABASE', 'socialblood');      // DB name

} else
{    
	define('DB_SERVER', 'MYSQL5006.Smarterasp.net');
	define('DB_USERNAME', '98e699_social');    // DB username
	define('DB_PASSWORD', 'senac@123');    // DB password
	define('DB_DATABASE', 'db_98e699_social');      // DB name

}
$connection = mysql_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD) or die( "Unable to connect");
$database = mysql_select_db(DB_DATABASE) or die( "Unable to select database");

