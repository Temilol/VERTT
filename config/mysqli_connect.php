<?php
// Database Connection
  define('DB_USER', 'root');
	define('DB_PASSWORD', '');
	define('DB_HOST', 'localhost');
	define('DB_NAME', 'id6870583_vertt');

	$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	if ($conn->connect_error) {
	 	die('Could not connect to MySQL ' . mysqli_connect_error());
	}
?>