<?php 

	require_once('header/conn.php');

if(!empty(isset($_POST['challanCheck']))){

    $output = "";
	$s = "SELECT * FROM `stockmgmt` WHERE `chasisNo` LIKE '%".$_POST['challanCheck']."%' AND `status` = '0'";	
	$se = mysqli_query($conn , $s);
	
	$output = '<ul class="list-unstyled" style="background: cornflowerblue; color: black;
    font-size: 17px;  border-radius: 4px;  text-align: center; cursor: pointer; font-weight: 700;">';
	if(mysqli_num_rows($se) > 0){

		while($row = mysqli_fetch_array($se)){

			//$output .= '<li>' .$sel['chasisNo'] . '</li>';
			 $s = "SELECT * FROM makername WHERE id = '".$row['modelMake']."'";
              $se = mysqli_query($conn , $s);
              $sel = mysqli_fetch_array($se);

              $sm = "SELECT * FROM modelname WHERE id = '".$row['model']."'";
              $sem = mysqli_query($conn , $sm);
              $selm = mysqli_fetch_array($sem);

              //$output .= '<li>'.$row["chasisNo"] ." , ". $sel["name"] ." , " . $selm['name']  . " , " .$row["stockLocation"] .'</li>';

			  $output .= '<li>'.$row["chasisNo"] .'</li>';
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

