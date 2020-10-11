<?php
	include_once('db_connect.php');

	/*//$host = 'balarama.db.elephantsql.com';
	$host = 'postgres://klgnatol:iPgPhCeNQliewRmoHsOh6Ch6eGCttF5h@balarama.db.elephantsql.com:5432/klgnatol';
	$user = 'klgnatol';
	$pass = 'iPgPhCeNQliewRmoHsOh6Ch6eGCttF5h';
	$database = 'klgnatol';
 
	$options = array(
    	PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    	PDO::ATTR_EMULATE_PREPARES => false
	);
 
	$pdo = new PDO("mysql:host=$host;dbname=$database", $user, $pass, $options);*/

	function saveContactData($pdo) {
		$data = [];
		$data['first_name'] = $_GET['first_name'];
		$data['last_name'] = $_GET['last_name'];
		$data['email'] = $_GET['email'];
		$data['phone'] = $_GET['phone'];

		$sql = "INSERT INTO `cars` (`first_name`, `last_name`, `email`, `phone`) VALUES (:first_name, :last_name, :email, :phone)";
 
		$statement = $pdo->prepare($sql);
 
		$statement->bindValue(':first_name', $data['first_name']);
		$statement->bindValue(':last_name', $data['last_name']);
		$statement->bindValue(':email', $date['email']);
		$statement->bindValue(':phone', $data['phone']);
 
		$inserted = $statement->execute();
	}
?>