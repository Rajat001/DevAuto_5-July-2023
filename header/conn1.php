<?php 

$host = "localhost";
$username = "i3mgyrr8hlzp";
$password = "9953255919_Ra";
$dbname = "automart";

$conn = mysqli_connect($host, $username, $password, $dbname);

if(!$conn){
	 //die('Connection failed'. mysqli_connect_error());
	 //echo "Not Connected to Database";
	 echo "<script> window.open('login.php','_self') </script>";
	
}else{
	 //echo "Connected Success";
}

?>