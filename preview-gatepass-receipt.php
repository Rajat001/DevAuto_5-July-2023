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
</style>

</head>

<!--
<body class="body" onload="gatepass_receipt()">
-->
<body>
<div class="container" style="width: 1322px;">

<br>

    <p style="text-align: center;"> 

<a href="gatepass-receipt.php?id=<?php echo $getid; ?>">
<button class="btn btn-success">PRINT</button>
</a>
</p>

<div class="row">
<div class="col-md-12">
<div class="panel panel-default" style="border-color: #4e73df;">

<div class="panel-body">
<div class="table-responsive">
<table class="table table-condensed">

<!-- Section For Adding Starts-->    
<thead>

<tr style="color: white; font-size: 21px; background-color: black;">
<td style="border: 1px solid black;" colspan="13"> 


<strong style="margin-left: 536px;">
DELIVERY RECEIPT
</strong>


<strong style="margin-left: 300px;">
Mob.: 93196 26386
</strong>

</td>
</tr>



<tr>
<td colspan="13" style="border: 1px solid black;" > 
<div>
<img src="tvs-logo.jpg" width="200px" height="140px">    

<p style="font-size: 70px; font-weight: 900; margin-left: 300px; margin-top: -142px;">DEV AUTOMOBILES</p>


<p style="font-size: 28px; font-weight: 900; margin-left: 451px; margin-top: -23px;">( A Unit Of Dev Trading Co )</p>

</div>
</td>
</tr>


<tr>
<td colspan="13" style="border: 1px solid black;" class="text-center"> 
<p style="font-size: 20px; font-weight: 800; margin-left: 60px;"> 
#91 Plot No 7, Main Road, Near Masjid, Mandawali, Delhi - 110092
</p>
</td>
</tr>


</thead>
<!-- Section For Adding End-->
<thead>
<tr>
<td colspan="2" style="border: 1px solid black;"><p style="font-size: 18px; font-weight: 800;"> 
GatePass No. :- <?php echo $sel['gatePassNo'];?> </p></td>

<td  colspan="7" style="border: 1px solid black; border-right-style: hidden;" class="text-right"></td>
<td colspan="4" style="border: 1px solid black; " class="text-right"> 
<p style="font-size: 18px; font-weight: 800; margin-right: 20px; border-left-style: hidden;">Date :- <?php  echo date('d/m/Y',strtotime($sel['currDate']));?>
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
<td colspan="13" style="border: 1px solid black;" class="text-center"> 
<p style="font-size: 22px; font-weight: 800; margin-left: 60px;"> Received with DEV AUTOMOBILES, New Delhi </p>
</td>
</tr>


<tr><td></td></tr>
<tr>
<td colspan="13" style="border: 1px solid black;"><span style="font-size: 24px;"><p>One Brand New &nbsp; <span style="font-weight: 900;";> <?php echo $mod['name']; ?> </span> &nbsp;Bearing the following particulars in perfect Order and good condition . Tools and equipments completed as supplied by the manufacture.</p></td>   
</tr>




<tr>

<td colspan="7" style="border: 1px solid black; ">

<p style="font-size: 24px; ">Cash Receipt No. <?php echo $sel['receiptNo'];

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
<p style="font-size: 24px; ">Financed by <strong><?php echo $fin['name']; ?></strong></p> 
<p style="font-size: 24px; ">Engine No. <span style="font-weight: 700;";><?php echo $stoc['engineNo']; ?>  </span></p>  
<p style="font-size: 24px; ">Service Book No. <strong><?php echo $sel['serviceBook']; ?></strong></p> 




</td>
<td colspan="6" style="border: 1px solid black; font-size: 24px;">
<p style="font-size: 24px; ">Total Payment Receivable. <strong>Rs.</strong> 
<strong class="paymentReceivable"> <?php echo $sel['paymentReceivable']; ?> </strong></p>

<p style="font-size: 24px; "> <!--Payment Received --> EMI Detail 
<strong>

    Rs. 

    <?php 
    $pay_rececive = $sel['receiptAmt'] + $sel['receiptAmtOne'] + $sel['receiptAmtTwo'] + $sel['receiptAmtThree'] + $sel['receiptAmtFour'] + $sel['receiptAmtFive'] + $sel['receiptAmtSix'] + $sel['receiptAmtSeven'] + 
        $sel['receiptAmtEight'];
    echo $pay_rececive;

    ?>

</strong>

<!-- Start-->

<!-- <strong>Rs.</strong><strong id="payment_received"></strong> 
 -->
<!-- End -->

</p>
<p style="font-size: 24px;"> <!-- Balance Amount -->  EMI / Month <strong>Rs. 

<?php 
$paymentReceivable = $sel['paymentReceivable'];
$result =  $paymentReceivable - $pay_rececive;
echo $result;
?>

</strong>  <!-- <strong id="amtbalance"> </strong> --> </p>
<p style="font-size: 24px; "> Chasis No. <span style="font-weight: 700;";>  <?php echo $stoc['chasisNo']; ?> </span></p>  
<p style="font-size: 24px; ">Colour <span style="font-weight: 700;";>  <?php echo $stoc['modelColor']; ?> </span></p>

</td>   

</tr>

<tr><td></td></tr>

<tr>

<td colspan="7" style="border: 1px solid black; font-size: 24px;">


<p style="text-align: center;"> <strong> <u>ITEMS</u> </strong>  </p>

<p style="">


Items Given : 
<table style="width:90%; ">
<tr style=" ">
<th style="">
    <?php
    $acc_data = $sel['accessorie'];
    $acc_explode = explode(',', $acc_data);
    foreach($acc_explode as $acc_explodes){

    $a = "SELECT * FROM accessories where id = '".$acc_explodes."'";
    $ac = mysqli_query($conn , $a);
    $acc = mysqli_fetch_array($ac);

    echo $acc['name'] ." , " . "<br>";
    }
    ?>
</th>
<th style=" ">
    <?php
    $sub_acc_data = $sel['subAccessorie'];
    $sub_acc_explode = explode(',', $sub_acc_data);
    foreach($sub_acc_explode as $sub_acc_explodes){

    $sub_a = "SELECT * FROM subaccessories where id = '".$sub_acc_explodes."'";
    $sub_ac = mysqli_query($conn , $sub_a);
    $sub_acc = mysqli_fetch_array($sub_ac);

    echo " ( " .$sub_acc['name'] ." )" . "<br>";
    }
    ?>
</th> 

</tr>


</table>

<br> 

</p>

<p style="">


Items Short Supplied : <br> <u style="font-weight: 700;"> 
     <?php echo wordwrap($sel['shortItem'],40,"<br>\n"); 
    
    ?> 
 
</u> 

</p>
<p style="">Delivery _____________ Km.</p>
<p style="">Date . <?php  echo date('d/m/Y',strtotime($sel['currDate']));?></p>

<p style="text-align: center;"> <strong><u> OLD EXCHANGE</u> </strong></p>
<p style="">Vehicle Name.
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
<p style="">Vehicle No.  
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

<td colspan="6" style="border: 1px solid black; font-size: 24px;">

<p style="text-align: center; margin-left: -185px;"> <strong><u> DOCUMENTS / TOOLS</u> </strong>  </p>
<p style="font-weight: 700;">Owner's Manual with Service Book</p>
<p style="font-weight: 700;">Invoice, Insurance Cover Note,</p>    
<p style="font-weight: 700;">Registration Slip, One Tool Kit </p>
<p style="font-weight: 700;">Ex-showroom Room, New Delhi</p>
<p style="font-weight: 700;">Signature _________</p>

<br>
<p style="">Name : <strong><?php echo $rece['cusName'];?></strong> </p>
<p style="">Address : <strong> <?php echo wordwrap($sel['address'],30,"<br>\n"); ?></strong> </p>

<p style="">Remark : <strong> <?php echo wordwrap($sel['remark'],30,"<br>\n"); ?></strong> </p>


<p style="font-weight: 700;">Party's TIN</p>

</td>   
</tr>


<tr style="border: 1px solid black; font-size: 24px;">


<td colspan="13">

<p style="font-size: 22px; font-weight: 800; margin-left: 245px; "> Vehicle Taken Delivery Without Reg. No. Customers Fully Own Risk
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


<p style="text-align: center;"> 
<a href="gatepass-receipt.php?id=<?php echo $getid; ?>">
<button class="btn btn-success">PRINT</button>
</a>
</p>
<br><br><br>

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