<?php
	function conexion(){

	$host = "host=dpg-cr6g04lumphs73b4hod0-a.oregon-postgres.render.com";
	$port = "port=5432";
	$dbname = "dbname=dbclase_u9wu";
	$user = "user=dbclase_u9wu_user";
	$password = "password=qf9rFKDsMjhSaHSEMZYaMHpNYIygVhzm";

	$db = pg_connect("$host $port $dbname $user $password");

	return $db;
}
?>
