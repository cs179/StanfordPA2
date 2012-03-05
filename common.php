<?php
	//let's define constants here
	define("DB_USER","npstanford");
	define("DB_PASS","C17910");
	define("DB_HOST","localhost");
	define("DB_NAME","PA2");

	//create a DB connection
	$link = mysql_connect(DB_HOST, DB_USER, DB_PASS) or die('Could not connect to mysql server.');
	mysql_select_db(DB_NAME);
?>