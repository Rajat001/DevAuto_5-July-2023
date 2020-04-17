<?php 


define('HOSTNAMESS','localhost');
define('DB_USERNAMESS','i3mgyrr8hlzp');
define('DB_PASSWORDSS','9953255919_Ra');
define('DB_NAMESS','automart');

$conn = mysqli_connect(HOSTNAMESS, DB_USERNAMESS, DB_PASSWORDSS, DB_NAMESS);

if(!$conn){
	echo "Server Is Down Please Try After Sometime";
}else{
	//echo "Connected To Database...";
}

?>