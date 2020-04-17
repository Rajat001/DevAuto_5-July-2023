<?php 
session_start();

if(!isset($_SESSION['name']) && !isset($_GET['id'])){
echo "<script> window.open('gate-pass.php', '_self')</script>";
}else{

include ('header/conn.php');
$getid = mysqli_escape_string($conn,$_GET['id']);
$s = "SELECT * FROM  receiptmgmt where id = '".$getid."'";
$se = mysqli_query($conn , $s);
$sel = mysqli_fetch_array($se);
?>

<!DOCTYPE html>
<html>
<head>
<title></title>

<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<style>
.body{
display: none;
}

@media print {
.body {
display: block;
}
}

@page {
size: auto;   /* auto is the initial value */
margin: 0;  /* this affects the margin in the printer settings */
}
</style>

</head>


<body class="body" onload="gatepass_receipt()">


<div class="container" style="width: 1090px; margin-top: 100px;">
<br>

<div class="row">
<div class="col-md-12">
<div class="panel panel-default" style="border-color: #4e73df;">

<div class="panel-body">
<div class="table-responsive">


<table class="table table-condensed">

<!-- Section For Adding Starts-->    
<thead>

<tr style="color: white; font-size: 21px; background-color: black; ">
<td style="border: 1px solid black; border-left: 0px solid; border-right: 0px solid;" colspan="13"> 


<strong style="margin-left: 424px;">
RECEIPT <?php //echo $sel['cusName'] ;?>
</strong>


<strong style="margin-left: 280px;">
Mob.: 93196 26386   
</strong>

</td>
</tr>



<tr>
<td colspan="13" style="border: 1px solid black; border-left: 0px solid; border-right: 0px solid;" > 
<div>
<img src="tvs-logo.jpg" width="200px" height="140px">    

<p style="font-size: 70px; font-weight: 900; margin-left: 225px; margin-top: -142px; width: 50px;">DEV AUTOMOBILES</p>


<p style="font-size: 28px; font-weight: 900; margin-left: 370px; margin-top: -23px; width: 50px; margin-bottom: 16px; ">( A Unit Of Dev Trading Co )</p>

</div>
</td>
</tr>


<tr>
<td colspan="13" style="border: 1px solid black; border-left: 0px solid; border-right: 0px solid;" class="text-center"> 
<p style="font-size: 22px; font-weight: 800; margin-left: 130px; width: 50px;"> 
#91 Plot No 7, Main Road, Near Masjid, Mandawali, Delhi - 110092
</p>
</td>
</tr>


</thead>
<!-- Section For Adding End-->
<thead>
<tr>
<td colspan="2" style="border: 1px solid black; border-left: 0px solid; border-right-style: hidden;  "><p style="font-size: 18px; font-weight: 800; width: 50px;"> 
Receipt No. :- <?php echo $sel['receiptNo'];?> </p></td>

<td  colspan="7" style="border: 1px solid black; border-right-style: hidden;" class="text-right"></td>
<td colspan="4" style="border: 1px solid black;  border-right: 0px solid;" class="text-right"> 
<p style="font-size: 18px; font-weight: 800; margin-left: 720px; border-left-style: hidden; width: 50px;">Date :- <?php  echo date('d/m/Y',strtotime($sel['date']));?>
</p>
</td>
</tr>
</thead>
<tbody>

<?php 

// $Chasisno = $sel['chasisNo'];
// $st = "SELECT * FROM `stockmgmt` WHERE `chasisNo` = '$Chasisno'";
// $sto = mysqli_query($conn , $st);
// $stoc = mysqli_fetch_array($sto);
// $model = $stoc['model'];

// $mo = "SELECT `name` FROM `makername` WHERE `id` = '".$model."'";
// $mod = mysqli_query($conn , $mo);
// $mod = mysqli_fetch_array($mod);

// $re = "SELECT * FROM `receiptmgmt` WHERE `receiptNo` = '".$sel['receiptNo']."'";
// $rec = mysqli_query($conn, $re);
// $rece = mysqli_fetch_array($rec);
// $financeMode = $rece['financeMode'];

// $f = "SELECT * FROM `financemode` WHERE `id` = '".$financeMode."'";
// $fi = mysqli_query($conn, $f);
// $fin = mysqli_fetch_array($fi);
?>



<tr>
<td colspan="13" style="border: 1px solid black; border-left: 0px solid; border-right: 0px solid;">

<p style="font-size: 24px; width: 50px; " > Received with thanks from  &nbsp; <strong><u> <?php echo $sel['cusName'];?> </u> </strong> <br>
    for  &nbsp; <strong> <u><?php echo $sel['forName'];?> </u></strong>  &nbsp; Phone &nbsp; <strong><u><?php echo $sel['mobile'];?> </u></strong>  &nbsp; Cash/Finance 
	<strong><u>
    <?php
	$fi = "SELECT `name` FROM financemode WHERE `id` = '".$sel['financeMode']."'";	
	$fin = mysqli_query($conn ,$fi);
	$fina = mysqli_fetch_array($fin);
    echo $fina['name'];
	?> 
</u></strong>
	<br>
    Sum of Rupees &nbsp; <strong><u><?php echo $sel['amtPaid'];?> </u></strong>  &nbsp; <br>
    By  Cash / Cheque / Draft No. / Paytm / UPI / Other ________________ Dated <strong><u><?php  echo date('d/m/Y',strtotime($sel['date']));?></u></strong> <br>
    Vehicle Exchanged Yes / No Exchange Vehicle No. &nbsp; <strong><u><?php echo $sel['exVehNo'];?> </u></strong>  &nbsp;  <br> Exchange Vehicle Amount &nbsp; <strong><u><?php echo $sel['exVehAmt'];?> </u></strong>  &nbsp; 
  

</p>

</td>   
</tr>




<tr style="border: 1px solid black; font-size: 24px; border-left: 0px solid; border-right: 0px solid;   ">


<td colspan="13">


</td>   

</tr>

</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</div>
</body>

<script type="text/javascript">
// var $amt = $('.amt').text();
// var $amtOne = $('.amtOne').text();
// var $amtTwo = $('.amtTwo').text();
// var $amtThree = $('.amtThree').text();
// var $amtFour = $('.amtFour').text();
// var $amtFive = $('.amtFive').text();
// var $amtSix = $('.amtSix').text();
// var $amtSeven = $('.amtSeven').text();
// var $amtEight = $('.amtEight').text();        

// var $paymentReceiv = $('.paymentReceivable').text();
// var $paymentReceivable = parseInt($paymentReceiv, 10);

// var $payment_received = parseInt($amt, 10) + parseInt($amtOne , 10) + parseInt($amtTwo , 10) + parseInt($amtThree , 10) + parseInt($amtFour , 10) + parseInt($amtFive , 10) + parseInt($amtSix , 10) + parseInt($amtSeven , 10) + parseInt($amtEight , 10);

// document.getElementById('payment_received').innerHTML = $payment_received;
// var $amtbalance = $paymentReceivable - $payment_received;
// document.getElementById('amtbalance').innerHTML = $amtbalance;

</script>


<script> 
function gatepass_receipt() {
window.print();
}
</script>
</html>


<?php
}


?>