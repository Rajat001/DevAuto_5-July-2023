<?php 
// define('HOSTNAMESSa','localhost');
// define('DB_USERNAMESSa','i3mgyrr8hlzp');
// define('DB_PASSWORDSSa','9953255919_Ra');
// define('DB_NAMESSa','automart');

// define('HOSTNAMESSa','localhost');
// define('DB_USERNAMESSa','root');
// define('DB_PASSWORDSSa','Magic@1234@');
// define('DB_NAMESSa','automart');


//$conn1 = mysqli_connect(HOSTNAMESSa, DB_USERNAMESSa, DB_PASSWORDSSa, DB_NAMESSa);

//$conn = mysqli_connect('localhost','root','','automart');
//$conn = mysqli_connect('localhost','rajat','rajat@9711461442','automart_');
$conn = mysqli_connect('localhost','root','Magic@1234@','automart');

if(!$conn){
	echo "Server Is Down Please Try After Sometime";
}else{
	//echo "Connected To Database...";
}

?>