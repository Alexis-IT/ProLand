<?php
	/*$host = 'localhost';
	$user = 'root';
	$pass = '';
	$database = 'test';*/
 
	/*$options = array(
    	PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    	PDO::ATTR_EMULATE_PREPARES => false
	);
 
	$pdo = new PDO("mysql:host=$host;dbname=$database", $user, $pass, $options);*/

	include_once('db_connect.php');


	function requestData($pdo) {
		$data = [];
		$data['id'] = $_GET['id'];

		try {

    		$sql = 'SELECT "ExpertizeYear","PricePerSqMeter" FROM "public"."newpr" WHERE "LandID"=:id LIMIT 1'
			//$sql = 'SELECT "ExpertizeYear","PricePerSqMeter" FROM "public"."newpr" WHERE "LandID"=:id LIMIT 1'

			$statement = $pdo->prepare($sql);
			$statement->bindValue(':id', $data['']);

    		$q = $pdo->query($sql);
    		$q->setFetchMode(PDO::FETCH_ASSOC);

    		$row = $q->fetch();


    			$sql = 'SELECT "indeksacia" FROM "public"."indeksanew" WHERE ""=:year LIMIT 1';

    			$q = $pdo->query($sql);
    			$q->setFetchMode(PDO::FETCH_ASSOC);


    			return $_GET['square']*$row['PricePerSqMeter'];

		} catch (PDOException $e) {
    		die("Could not connect to the database $dbname :" . $e->getMessage());
		}

		/* $sql = "INSERT INTO `cars` (`first_name`, `last_name`, `email`, `phone`) VALUES (:first_name, :last_name, :email, :phone)";
 
		$statement = $pdo->prepare($sql);
 
		$statement->bindValue(':first_name', $data['first_name']);
		$statement->bindValue(':last_name', $data['last_name']);
		$statement->bindValue(':email', $date['email']);
		$statement->bindValue(':phone', $data['phone']);
 
		$inserted = $statement->execute(); */
	}
?>