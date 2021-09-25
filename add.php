<?php
	include 'konekcija.php';
	$naziv=$_POST['naziv'];
	$opis=$_POST['opis'];
	$cena=$_POST['cena'];
	$posno=$_POST['posno'];
	$kategorija = $_POST['kategorija'];
    $q = "INSERT INTO kolaci (naziv, opis, cena, posno, kategorija) 
	VALUES ('$naziv','$opis','$cena','$posno','$kategorija')";
	if (mysqli_query($dblink, $q)) {
		echo json_encode(array("statusCode"=>200));
	} 
	else {
		echo json_encode(array("statusCode"=>201));
	}
	mysqli_close($dblink);
?>