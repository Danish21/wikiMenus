<?php


function login($username, $password) {
	$username = sanitize($username);	
	$password = md5($password);
	$query = mysql_query("SELECT COUNT(*) FROM users WHERE username='$username' AND password='$password'");
	return (mysql_result($query,0) == 1) ? $username : false;
}

function sanitize($data) {
	return mysql_real_escape_string($data);
}

?>