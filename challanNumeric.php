<?php 

$conn = mysqli_connect("localhost", "root", "", "automart");

if(!empty(isset($_POST['challan']))){

    $output = "";
	$s = "SELECT * FROM `stockmgmt` WHERE `chasisNo` LIKE '%".$_POST['challan']."%'";	
	$se = mysqli_query($conn , $s);
	
	$output = '<ul style="background: cornflowerblue; color: white;
    font-size: 17px;  border-radius: 4px;  text-align: center; cursor: pointer;">';
	if(mysqli_num_rows($se) > 0){

		while($sel = mysqli_fetch_array($se)){

			$output .= '<li>' .$sel['chasisNo'] . '</li>';
		}
	}else{
		$output .= '<li> Chasis No Not Found </li>';
	}

	$output .= '</ul>';
	echo $output;

}else{
	echo "Error";
}

?> 

