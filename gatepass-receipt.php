<?php 
if(isset($_GET['id'])){
include ('header/conn.php');
$getid = mysqli_escape_string($conn,$_GET['id']);


$s = "SELECT * FROM gatepassmgmt where id = '".$getid."'";
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


<div class="container" style="width: 1090px;">
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
DELIVERY RECEIPT
</strong>


<strong style="margin-left: 192px;">
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
<td colspan="2" style="border: 1px solid black; border-left: 0px solid; "><p style="font-size: 18px; font-weight: 800; width: 50px;"> 
GatePass No. :- <?php echo $sel['gatePassNo'];?> </p></td>

<td  colspan="7" style="border: 1px solid black; border-right-style: hidden;" class="text-right"></td>
<td colspan="4" style="border: 1px solid black;  border-right: 0px solid;" class="text-right"> 
<p style="font-size: 18px; font-weight: 800; margin-left: 220px; border-left-style: hidden; width: 50px;">Date :- <?php  echo date('d/m/Y',strtotime($sel['currDate']));?>
</p>
</td>
</tr>
</thead>
<tbody>

<?php 

$Chasisno = $sel['chasisNo'];
$st = "SELECT * FROM `stockmgmt` WHERE `chasisNo` = '$Chasisno'";
$sto = mysqli_query($conn , $st);
$stoc = mysqli_fetch_array($sto);
$model = $stoc['model'];

$mo = "SELECT `name` FROM `makername` WHERE `id` = '".$model."'";
$mod = mysqli_query($conn , $mo);
$mod = mysqli_fetch_array($mod);

$re = "SELECT * FROM `receiptmgmt` WHERE `receiptNo` = '".$sel['receiptNo']."'";
$rec = mysqli_query($conn, $re);
$rece = mysqli_fetch_array($rec);
$financeMode = $rece['financeMode'];

$f = "SELECT * FROM `financemode` WHERE `id` = '".$financeMode."'";
$fi = mysqli_query($conn, $f);
$fin = mysqli_fetch_array($fi);
?>

<tr>
<td colspan="13" style="border: 1px solid black; border-left: 0px solid; border-right: 0px solid;" class="text-center"> 
<p style="font-size: 22px; font-weight: 800; margin-left: 250px; width: 50px;"> Received with DEV AUTOMOBILES, New Delhi </p>
</td>
</tr>


<tr><td></td></tr>
<tr>
<td colspan="13" style="border: 1px solid black; border-left: 0px solid; border-right: 0px solid;">
<p style="font-size: 24px; width: 50px; ">One Brand New &nbsp; <span style="font-weight: 900;";> <?php echo $mod['name']; ?> </span> &nbsp;  Bearing the following particulars in perfect Order and good  <br> condition. Tools and equipments completed as supplied by the manufacture.</p></td>   
</tr>




<tr>

<td colspan="7" style="border: 1px solid black; border-left: 0px solid; ">
<p style="font-size: 24px; width: 50px;">Cash Receipt No. <?php echo $sel['receiptNo'];

if($sel['receiptOptOne'] == 2){

echo "," . $sel['receiptNoOne'];  
}
if($sel['receiptOptTwo'] == 2){
echo "," . $sel['receiptNoTwo'];  
}

if($sel['receiptOptThree'] == 2){
echo "," . $sel['receiptNoThree'];  
}

if($sel['receiptOptFour'] == 2){
echo "," . $sel['receiptNoFour'];  
}

if($sel['receiptOptFive'] == 2){
echo "," . $sel['receiptNoFive'];  
}

if($sel['receiptOptSix'] == 2){
echo "," . $sel['receiptNoSix'];  
}

if($sel['receiptOptSeven'] == 2){
echo "," . $sel['receiptNoSeven'];  
}

if($sel['receiptOptEight'] == 2){
echo "," . $sel['receiptNoEight'];  
}

?> 
</p>  
<p style="font-size: 24px; width: 50px;">Financed by <strong><?php echo $fin['name']; ?></strong></p> 
<p style="font-size: 24px; width: 50px;">Engine No. <span style="font-weight: 700;";><?php echo $stoc['engineNo']; ?>  </span></p>  
<p style="font-size: 24px; width: 50px;">Service Book No. <strong><?php echo $sel['serviceBook']; ?></strong></p> 

</td>
<td colspan="6" style="border: 1px solid black; font-size: 24px;">
<p style="font-size: 24px; width: 50px;"> Payment Receivable. <strong>Rs.</strong> 
<strong class="paymentReceivable"> <?php echo $sel['paymentReceivable']; ?> </strong></p>

<p style="font-size: 24px; width: 50px;"> Payment Received 
<strong>

    Rs. 

    <?php 
    $pay_rececive = $sel['receiptAmt'] + $sel['receiptAmtOne'] + $sel['receiptAmtTwo'] + $sel['receiptAmtThree'] + $sel['receiptAmtFour'] + $sel['receiptAmtFive'] + $sel['receiptAmtSix'] + $sel['receiptAmtSeven'] + 
        $sel['receiptAmtEight'];
    echo $pay_rececive;

    ?>
    <!-- 
<span class="amt" style="display: none;">
<?php // echo $sel['receiptAmt'] ;
//?>
</span>

<span class="amtOne" style="display: none;">
<?php
//if($sel['receiptOptOne'] == 2){
//echo  $sel['receiptAmtOne'];  
//}else{
  //  echo "0";
//} 
?></span>

<span class="amtTwo" style="display: none;"> <?php
//if($sel['receiptOptTwo'] == 2){
//echo "," . $sel['receiptAmtTwo'];  
//}else{
 //   echo "0";
//}
//?></span>

//<span class="amtThree" style="display: none;"><?php
//if($sel['receiptOptThree'] == 2){
//echo "," . $sel['receiptAmtThree'];  
//}else{
//    echo "0";
//}
//?></span>

<span class="amtFour" style="display: none;"><?php
//if($sel['receiptOptFour'] == 2){
//echo "," . $sel['receiptFour'];  
//}else{
  //  echo "0";
//}
//?></span>

<span class="amtFive" style="display: none;"><?php
//if($sel['receiptOptFive'] == 2){
//echo "," . $sel['receiptAmtFive'];  
//}else{
 //   echo "0";
//}
//?></span>

<span class="amtSix" style="display: none;"> <?php
//if($sel['receiptOptSix'] == 2){
//echo "," . $sel['receiptAmtSix'];  
//}else{
 //   echo "0";
//}
//?></span>

<span class="amtSeven" style="display: none;"><?php
//if($sel['receiptOptSeven'] == 2){
//echo "," . $sel['receiptAmtSeven'];  
//}else{
 //   echo "0";
//}
//?></span>

<span class="amtEight" style="display: none;"><?php
//if($sel['receiptOptEight'] == 2){
//echo "," . $sel['receiptAmtEight'];  
//}else{
 //   echo "0";
//}                                
//?></span>
 -->


</strong>

<!-- Start-->

<!-- <strong>Rs.</strong><strong id="payment_received"></strong> 
 -->
<!-- End -->

</p>
<p style="font-size: 24px; width: 50px;">Balance Amount <strong>Rs. 

<?php 
$paymentReceivable = $sel['paymentReceivable'];
$result =  $paymentReceivable - $pay_rececive;
echo $result;
?>

</strong>  <!-- <strong id="amtbalance"> </strong> --> </p>
<p style="font-size: 24px; width: 50px;"> Chasis No. <span style="font-weight: 700;";>  <?php echo $stoc['chasisNo']; ?> </span></p>  
<p style="font-size: 24px; width: 50px;">Colour <span style="font-weight: 700;";>  <?php echo $stoc['modelColor']; ?> </span></p>
</td>   

</tr>


<tr><td></td></tr>

<tr>

<td colspan="7" style="border: 1px solid black; font-size: 24px; border-left: 0px solid; ">

<p style="text-align: center;"> <strong> <u>ITEMS</u> </strong>  </p>

<p style="width: 50px;">


Items Given : <br> <span style="font-weight: 700;"> 
<u>

<?php
$data = $sel['accessorie'];
$explode = explode(',', $data);
foreach($explode as $explodes){
    
$a = "SELECT * FROM accessories where id = '".$explodes."'";
$ac = mysqli_query($conn , $a);
$acc = mysqli_fetch_array($ac);
echo wordwrap($acc['name'],25,"<br>\n");
echo ",";
}
?>
</u> </span> 

</p>

<p style="width: 50px;">


Items Short Supplied : <br> <span style="font-weight: 700;";> <u> <?php echo wordwrap($sel['shortItem'],25,"<br>\n"); ?> </u> </span> 

</p>
<p style="width: 50px;">Delivery _____________ Km.</p>
<p style="width: 50px;">Date . <?php  echo date('d/m/Y',strtotime($sel['currDate']));?></p>

<p style="text-align: center;"> <strong><u> OLD EXCHANGE</u> </strong></p>
<p style="width: 50px;">Vehicle Name.
<strong>
<?php 
if($rece['exVehOpt'] == 1 ){
	echo $rece['exVehModel'];
}else if($rece['exVehOpt'] == 2){
	echo "Nil";
}
?>	
</strong>
</p>
<p style="width: 50px;">Vehicle No.  
<strong>
<?php 
if($rece['exVehOpt'] == 1 ){
	echo $rece['exVehNo'];
}else if($rece['exVehOpt'] == 2){
	echo "Nil";
}
?>	
</strong>
</p>
<p style="text-align: center;"> <strong><u> SALES MANAGER</u> </strong>  </p>
<p>Name.  

<span style="font-weight: 700;";> <?php echo $sel['salesPerson']; ?> </span>
</p>


</td>

<td colspan="6" style="border: 1px solid black; font-size: 24px; border-right: 0px solid;">
<p style="text-align: center; margin-left: -185px;"> <strong><u> DOCUMENTS / TOOLS</u> </strong>  </p>
<p style="font-weight: 700; width: 50px;">Owner's Manual with Service Book</p>
<p style="font-weight: 700; width: 50px;">Invoice, Insurance Cover Note,</p>    
<p style="font-weight: 700; width: 50px;">Registration Slip, One Tool Kit </p>
<p style="font-weight: 700; width: 50px;">Ex-showroom Room, New Delhi</p>
<p style="font-weight: 700; width: 50px;">Signature _________</p>

<br>
<p style="width: 50px;">Name. <strong><?php echo $rece['cusName'];?></strong> </p>
<p style="width: 50px;">Address. <strong> <?php echo wordwrap($sel['address'],30,"<br>\n"); ?></strong> </p>

<p style="width: 50px;">Remark. <strong> <?php echo wordwrap($sel['remark'],30,"<br>\n"); ?></strong> </p>


<p style="font-weight: 700;">Party's TIN</p>
</td>   
</tr>


<tr style="border: 1px solid black; font-size: 24px; border-left: 0px solid; border-right: 0px solid;   ">


<td colspan="13">

<p style="font-size: 22px; font-weight: 800; margin-left: 105px; width: 50px;"> Vehicle Taken Delivery Without Reg. No. Customers Fully Own Risk
</p>

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
else{
echo "<script> window.location.href = 'gate-pass.php'; </script>";
}

?>