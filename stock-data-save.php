<?php
	require_once('header/conn.php');
	$stock_no_value=mysqli_real_escape_string($conn, $_POST['stock_no_value']);
	$challanDate=mysqli_real_escape_string($conn, $_POST['challanDate']);
	$challanNo=mysqli_real_escape_string($conn, $_POST['challanNo']);	
	$dealerNameIdd =mysqli_real_escape_string($conn, $_POST['dealerNameIdd']); 	
	$modelmakenamesection =mysqli_real_escape_string($conn, $_POST['modelmakenamesection']);
	$modelnamesection =mysqli_real_escape_string($conn, $_POST['modelnamesection']);
	$modelSubtype =mysqli_real_escape_string($conn, $_POST['modelSubtype']);
	$modelColor =mysqli_real_escape_string($conn, $_POST['modelColor']);
	$chasisNo =mysqli_real_escape_string($conn, $_POST['chasisNo']);
	$engineNo =mysqli_real_escape_string($conn, $_POST['engineNo']);	
	$stockLocation =mysqli_real_escape_string($conn, $_POST['stockLocation']);
	$shortItem =mysqli_real_escape_string($conn, $_POST['shortItem']);
	$anyDent =mysqli_real_escape_string($conn, $_POST['anyDent']);
	$status = "0";

	$sql1 = "INSERT INTO `stockmgmt`( `stockNo`, `challanDate`, `dealerName`,`challanNo`,`modelMake`,`model`,`modelSubtype`,`modelColor`,`chasisNo`,`engineNo`,`stockLocation`,`shortItem`,`anyDent`,`status`) 
	VALUES ('$stock_no_value','$challanDate','$dealerNameIdd','$challanNo','$modelmakenamesection','$modelnamesection','$modelSubtype','$modelColor','$chasisNo','$engineNo','$stockLocation','$shortItem','$anyDent','".mysqli_real_escape_string($conn, $status)."')";

	if (mysqli_query($conn, $sql1)) {
		//echo json_encode(array("statusCode"=>200));
		
	} 
	else {
		//echo json_encode(array("statusCode"=>201));
		echo "Contact to Server Provider ";
	}
	//mysqli_close($conn);
?>