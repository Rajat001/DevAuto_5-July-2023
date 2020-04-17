<?php

require_once('header/conn.php');

if(!empty($_POST['receipt'])){
    $data = array();
    
    $receipt = mysqli_real_escape_string($_POST['receipt']);

	$query = mysqli_query($conn, "SELECT * FROM receiptmgmt WHERE receiptNo LIKE '%$receipt%'");

	if(mysqli_num_rows($query) > 0){
	$userData = mysqli_fetch_assoc($query);
	$data['status'] = 'ok';
	$data['result'] = $userData;
	}else{
	$data['status'] = 'err';
	$data['result'] = '';
	}
    
    echo json_encode($data);

}
?>