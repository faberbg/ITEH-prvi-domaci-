<?php
include "konekcija.php";
    $id=$_POST['id'];
    $naziv=$_POST['naziv'];
	$opis=$_POST['opis'];
	$cena=$_POST['cena'];
	$posno=$_POST['posno'];
	$kategorija = $_POST['kategorija'];


if (isset($_POST['id']) && isset($_POST['naziv']) && isset($_POST['opis']) && isset($_POST['cena'])
    && isset($_POST['posno']) && isset($_POST['kategorija'])) {

        $q = "UPDATE kolaci set id='$id', naziv='$naziv', opis='$opis', 
            cena='$cena', posno='$posno', kategorija='$kategorija' where id=$id";

    if (mysqli_query($dblink, $q)) {
		echo json_encode(array("statusCode"=>200));
	} 
	else {
		echo json_encode(array("statusCode"=>201));
	}
	mysqli_close($dblink);
}
?>
