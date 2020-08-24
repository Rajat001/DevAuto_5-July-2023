<?php 
// Database configuration 

// $dbHost     = "localhost"; 
// $dbUsername = "root"; 
// $dbPassword = ""; 
// $dbName     = "automart"; 

// // Create database connection 
// $conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName); 

// // Check connection 
// if ($conn->connect_error) { 
// die("Connection failed: " . $db->connect_error); 
// }

//$conn_acc1 = new PDO("mysql:host=localhost; dbname=automart;","i3mgyrr8hlzp","9953255919_Ra");

//$conn_acc = new PDO("mysql:host=localhost; dbname=automart;","i3mgyrr8hlzp","9953255919_Ra");

//$conn_acc = new PDO("mysql:host=localhost; dbname=automart;","root","");

$conn_acc = new PDO("mysql:host=localhost; dbname=automart_;","rajat","rajat@9711461442");

function fill_select_box($conn_acc, $category_id){ // This Function is Not Working Becoz of [ $category_id ]
	$query = "SELECT * FROM accessories WHERE id = '".$category_id."'";
	$statement = $conn_acc->prepare($query);
	$statement ->execute();
	$result = $statement->fetchAll();
	$output = "";

	foreach($result as $row){
		$output .= '<option value="'.$row['id'].'">'.$row['name'].'</option>';
	}
	return $output;
}

// Rajat Function Starts
function fill_select_boxOne($conn_acc){
	$query = "SELECT * FROM accessories";
	$statement = $conn_acc->prepare($query);
	$statement ->execute();
	$result = $statement->fetchAll();
	$output = "";

	foreach($result as $row){
		$output .= '<option value="'.$row['id'].'">'.$row['name'].'</option>';
	}
	return $output;
}
// Rajat Function End


function select_sub_accessories($conn_acc, $accId){
	$query = "SELECT * FROM subaccessories WHERE accessoriesId = '".$accId."'";
	$statement = $conn_acc->prepare($query);
	$statement ->execute();
	$result = $statement->fetchAll();
	$output = "";

	foreach($result as $row){
		$output .= '<option id="color" value="'.$row['id'].'">' .$row['name']. ' , Cost  :- (' .$row['cost']. ')'.'  </option>';
	}
	return $output;
}

?>

<style type="text/css">
	#color{
		color: red;
		font-weight: 800;
	}
</style>
