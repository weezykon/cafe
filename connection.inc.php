<?php
	$week = new Datetime('+1 week');
	setcookie('key', 'value', $week->getTimestamp(), '/', null, null, true); 

	error_reporting(E_ALL ^ E_DEPRECATED);

	define ("DB_HOST", "localhost"); // set database host

	define ("DB_USER", "root"); // set database user

	define ("DB_PASS",""); // set database password

	define ("DB_NAME","cette"); // set database name



	$link = mysql_connect(DB_HOST, DB_USER, DB_PASS) or die("Couldn't make connection.");

	$db = mysql_select_db(DB_NAME, $link) or die("Couldn't select database");

?>