<?php
  $host = "127.0.0.1";
  $port = "5432";
  $dbname = "trabajofinal";
  $user = "postgres";
  $password = "1234";
	$dsn = "pgsql:host={$host};port={$port};dbname={$dbname}";
	
	try {
		$conn = new PDO($dsn, $user, $password);
		$conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch (Exception $e) {
		echo "error" . $e->getMessage();
	}
?>