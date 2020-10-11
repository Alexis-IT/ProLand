<?php 
	$host = 'balarama.db.elephantsql.com';
	//$host = 'postgres://klgnatol:iPgPhCeNQliewRmoHsOh6Ch6eGCttF5h@balarama.db.elephantsql.com:5432/klgnatol';
	$user = 'klgnatol';
	$pass = 'iPgPhCeNQliewRmoHsOh6Ch6eGCttF5h';
	//$database = 'klgnatol';
	$db = 'klgnatol';
 
	/*$options = array(
    	PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    	PDO::ATTR_EMULATE_PREPARES => false
	);
 
	$pdo = new PDO($host, $user, $pass, $options);*/


 // Open a PostgreSQL connection
 $con = pg_connect("host=$host dbname=$db user=$user password=$pass")
   or die ("Could not connect to server\n");

?>