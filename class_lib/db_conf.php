<?php
error_reporting(E_ALL ^ E_NOTICE);
	ini_set('display_errors', "1");
define( 'DB_HOST', "localhost" ); // set database host
define( 'DB_USER', "root" ); // set database user
define( 'DB_PASS', "" );
define( 'DB_PORT', "3306"); // set port
define('DB_NAME',"hollandtest");
define('CHARSET',"set character set utf8");
define( 'SEND_ERRORS_TO', 'josaha1244@gmail.com' );
define( 'DISPLAY_DEBUG', true ); //display db errors?

$connection = mysqli_connect('127.0.0.1','root','','hollandtest');
mysqli_query($connection,"set character set utf8");
?>
