 <?php
	include 'konekcija.php';
	$id=$_POST['id'];
	$q = "DELETE FROM kolaci WHERE id='$id'";
	if (mysqli_query($dblink, $q)) {
		echo json_encode(array("statusCode"=>200));
	} 
	else {
		echo json_encode(array("statusCode"=>201));
	}
	mysqli_close($dblink);
?>