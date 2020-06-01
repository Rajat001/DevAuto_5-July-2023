<?php 

require_once('header/conn.php');
$chasisNo = 'rc1234';
$select_c = "SELECT `chasisNo` FROM `stockmgmt` WHERE `chasisNo` = '".mysqli_real_escape_string($conn ,$chasisNo)."'";
$select_ch = mysqli_query($conn , $select_c);
$select_cha = mysqli_fetch_array($select_ch);
//echo $select_cha['chasisNo'];

if(mysqli_num_rows($select_ch) == 1){
    echo "Data Exit";
}else{
    echo "Data Not Exist";
}

?>


echo "<p id='errorone' style='text-align:center;
background-color: red;
border-radius: 6px;
color: white;
font-size: 22px;
'>
Date Cannot be Empty
</p>";