<?php

	include('header/conn.php') ;

if ($_FILES["idproofdocument"]["name"]) {
	# code...
	$test = explode(".", $_FILES["idproofdocument"]["name"]);
	$extension = end($test);
	$name = rand(100, 999) . '.' . $extension;
	$location = './idproofdoc/'.$name;
	move_uploaded_file($_FILES["idproofdocument"]["tmp_name"], $location);
	//echo "<img src="'.height="150" width="225" class="img-thumbnail".'">";

	//$namedetail = $_POST['namedetail'];
	$in = "INSERT INTO test(`name`) VALUES ('$name')";
	$ins = mysqli_query($conn , $in);
	if($ins){
	echo '<img src="'.$location.'" height="150" width="225" class="img-thumbnail">';	
	}else{
	echo "<script> alert('Image Not Uploaded') </script> ";
	}
}

?>