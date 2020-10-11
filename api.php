<?php
	//include_once('db_connect.php');

	function getRegions() {
		include('db_connect.php');
		$sql = 'SELECT DISTINCT "District" FROM "public"."newpr" ORDER BY "District" ASC';
 		$query = $sql;
 		$results = pg_query($con, $query) or die('Query failed: ' . pg_last_error());
 		$rows = pg_fetch_all($results);
 		pg_close($con);
 		return json_encode($rows);
	}

	function getDistricts($region) {
		include('db_connect.php');
		$sql = 'SELECT DISTINCT "Region" FROM "public"."newpr" WHERE "District"='."'".$region."'".' ORDER BY "Region" ASC';
 		$query = $sql;
 		$results = pg_query($con, $query) or die('Query failed: ' . pg_last_error());
 		$rows = pg_fetch_all($results);
 		pg_close($con);
 		return json_encode($rows);
	}

	function getCities($region, $district) {
		include('db_connect.php');
		$sql = 'SELECT DISTINCT "Name" FROM "public"."newpr" WHERE "District"='."'".$region."'".' AND "Region"='."'".$district."'".' ORDER BY "Name" ASC';
		$query = $sql;
 		$results = pg_query($con, $query) or die('Query failed: ' . pg_last_error());
 		$rows = pg_fetch_all($results);
 		pg_close($con);
 		return json_encode($rows);
	}

	function calculatePrice($region, $district, $city, $area) {
		include('db_connect.php');
		//$sql = 'SELECT DISTINCT "Name" FROM "public"."newpr" WHERE "District"='."'".$region."'".' AND "Region"='."'".$district."'".' ORDER BY "Name" ASC';
		$sql = 'SELECT "ExpertizeYear","PricePerSqMeter" FROM "public"."newpr"  WHERE "District"='."'".$region."'".' AND "Region"='."'".$district."'".' AND "Name"='."'".$city."'".' LIMIT 1';
		$query = $sql;
 		$results = pg_query($con, $query) or die('Query failed: ' . pg_last_error());
 		$row = pg_fetch_row($results);

 		#var_dump($row);
 		#die;

 		//$year = $row[0]['ExpertizeYear'];
 		//$price = $row[0]['PricePerSqMeter'];

 		$year = $row[0];
 		$price = $row[1];

 		$sql = 'SELECT "indeksacia" FROM "public"."indeksanew" WHERE "Year"='.$year.' LIMIT 1';
		$query = $sql;
 		$results = pg_query($con, $query) or die('Query failed: ' . pg_last_error());
 		$row = pg_fetch_row($results);
 		$multiplier = $row[0];
 		pg_close($con);
 		$result =  (float)($price)*(float)($area)*(float)($multiplier);
 		return $result;
	}


	if($_GET['type'] == 'regions') {
		echo getRegions();
	}

	if($_GET['type'] == 'districts') {
		echo getDistricts($_GET['region']);
	}


	if($_GET['type'] == 'cities') {
		echo getCities($_GET['region'], $_GET['district']);
	}

	if($_GET['type'] == 'calculate') {
		echo calculatePrice($_GET['region'], $_GET['district'], $_GET['city'], $_GET['area']);
	}

	//print_r(getRegions());
	//print_r(getDistricts("ЛЬВІВСЬКА"));
	//print_r(getCyties("ЛЬВІВСЬКА", "САМБІРСЬКИЙ РАЙОН"));
?>