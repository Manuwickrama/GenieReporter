<!DOCTYPE html>
<html>
<head>
	@include('partials.header',['title'=>"Mouse Test"])
</head>
<body>
	@include('partials.sidebar')
<?php

	$dsn = '4D:host=10.10.10.26;port=19812;charset=UTF-8';
	$user = 'Back Office User';
	$pass = 'bianca';

	// Connection to the server
	$db = new PDO($dsn,$user,$pass);

	// Creating the SQL statement
	// 50 Year olds who have not been seen in the past 12 months.
	$YearAgo = date("Y-m-d H:i:s",strtotime('-13 month'));
	$sql1 = "SELECT FirstName,Surname,HomePhone,MobilePhone,LastSeenDate,DOB,ChartOrNHS,Age,Inactive FROM Patient WHERE Postcode LIKE '%2880%' AND Surname = 'Mouse'";
	//echo $sql1;
	//$sql = 'SELECT FullName,FirstName,Surname,HomePhone,MobilePhone,LastSeenDate,DOB,ChartOrNHS FROM Patient WHERE Surname=\'mouse\'';
	try {
		$stmt = $db->prepare($sql1);
		$stmt->execute();
	} catch (PDOException $e) {
		echo 'Database Error:'.$e;
	}

$results_array = $stmt->fetchAll();
	echo '<div class="container-fluid">';
	echo '<div class="panel panel-default">';
	echo '<div class="panel-heading"><b>'.'Patients with the Surname MOUSE'.'</b></div>';

?>
	@include('partials.tableS')
</body>
</html>