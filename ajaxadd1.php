<?php
	require_once('header/conn.php');

	if(!empty(isset($_POST['name'])) && !empty(isset($_POST['city'])) ){
	$name=$_POST['name'];
	$city=$_POST['city'];
	$selectdata = $_POST['selectdata'];
	
	$sql = "INSERT INTO `test`( `name`, `city`,`datadropdown`) 
	VALUES ('$name','$city','$selectdata')";
	if (mysqli_query($conn, $sql)) {
		//echo json_encode(array("statusCode"=>200));
		echo "Data Added To Database";
	} 
	else {
		//echo json_encode(array("statusCode"=>201));
		echo "Data Not Added To Database";
	}
	}
	//mysqli_close($conn);
?>
 