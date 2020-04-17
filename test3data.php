	<?php
//fetch.php

$request = mysqli_real_escape_string($conn, $_POST["query"]);

require_once('header/conn.php');

$query = "SELECT * FROM stockmgmt WHERE challanNo LIKE '%".$request."%'";

$result = mysqli_query($conn, $query);

$data = array();

if(mysqli_num_rows($result) > 0)
{
 while($row = mysqli_fetch_assoc($result))
 {
  $data[] = $row["challanNo"];
 }
 echo json_encode($data);
}else{
	echo "No Data Found";
}

?>