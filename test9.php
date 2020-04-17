<?php 
include('header/conn.php');

$s = "SELECT * FROM gatepassmgmt WHERE id = 7";
$se = mysqli_query($conn, $s);
$sel = mysqli_fetch_array($se);

//echo $sel['accessorie'];

$data = $sel['accessorie'];
$explode = explode(',', $data);

//echo $explode;

foreach($explode as $explodes){
	
	$a = "SELECT * FROM accessories where id = '".$explodes."'";
	$ac = mysqli_query($conn , $a);
	$acc = mysqli_fetch_array($ac);
	echo $acc['name'];
	echo ",";
}
 ?>
