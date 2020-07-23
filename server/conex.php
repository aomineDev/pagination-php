<?php
	$host = 'localhost';
	$user = 'root';
	$password = '';
	$database = 'listado';
	
	mysql_connect($host, $user, $password);
	mysql_select_db($database);

	mysql_set_charset('utf8');
?>
