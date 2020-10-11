<?php
	include_once('db_connect.php');

	function getRegions($pdo) {
		$sql = 'SELECT DISTINCT "District" FROM "public"."newpr"';
 
		$statement = $pdo->prepare($sql);
 
		$inserted = $statement->execute();

		$inserted->setFetchMode(PDO::FETCH_ASSOC);

		return $inserted;

		//$row = $inserted->fetch();
	}

	echo getRegions($pdo);
?>