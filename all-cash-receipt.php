<?php 
session_start();
if(!isset($_SESSION['name'])){
echo "<script> window.open('login.php', '_self')</script>";
}else{

require_once('header/header.php');
require_once('header/conn.php');
?>

<link href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<!-- Bootstrap core JavaScript-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Page level plugin JavaScript--><script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>

<div class="content">
<div class="container-fluid">
<div class="row">

<div class="col-md-12">
<div class="card ">
<div class="card-header ">
<h4 class="card-title">All Cash Receipt </h4>
</div>
<div class="card-body">

<div class="container">
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="background-color: white; ">
<thead>
<tr>
<th> Serial No.</th>
<th> Receipt No.</th>
<th> Customer Name</th>
<th> For</th>
<th> Finance Mode</th>
<th> Amount Paid</th>
<th> Pay Via</th>
<th> Ex-Vehicle Model</th>
<th> Ex-Vehicle No </th>
<th> Ex-Vehicle Amt. </th>
<th> Print </th>

<?php 
$select_u = "SELECT `name` , `role` FROM `register` WHERE `name` = '".$_SESSION['name']."'";
$select_us = mysqli_query($conn , $select_u);
$select_user = mysqli_fetch_array($select_us); 
if($select_user['role'] == 'admin'){
?>
<th> Updated Date/Time </th>

<?php } ?>
<th> View/ Edit </th>

</tr>
</thead>

<tbody>

<?php 

//$s = "select * FROM dealername";
$s = "SELECT `makername`.`id` , `makername`.`name` AS `makeName` , `dealername`.`makeId` , `dealername`.`name` AS `dealerName` FROM `dealername` LEFT JOIN `makername` ON `makername`.`id` = `dealername`.`makeId`" ;

$s1 = "SELECT * FROM `receiptmgmt`" ;

$se = mysqli_query($conn , $s1);
$i=0;
while ($sel = mysqli_fetch_array($se)) {
	$i++;
?>


<tr>
<td><?php echo $i; ?></td>
<td><?php echo $sel['receiptNo']?></td>
<td><?php echo $sel['cusName']?></td>
<td><?php echo $sel['forName']?></td>
<td><?php echo $sel['financeMode']?></td>
<td><?php echo $sel['amtPaid']?></td>
<td><?php echo $sel['payVia']?></td>
<td><?php if($sel['exVehOpt'] == 1){ echo "YES"; } else if($sel['exVehOpt'] == 2){echo "NO";}?></td>

<td><?php echo $sel['exVehModel']?></td>
<td><?php echo $sel['exVehAmt']?></td>

<?php 

if($select_user['role'] == 'admin'){
?>
<td><?php echo $sel['updatedTimeDate']?></td>

<td><a href="edit-cash-receipt.php?id=<?php echo $sel['id']; ?>"><button class="btn btn-primary"> Edit </button></a></td>
<?php } else {?>
<td><a href="view-cash-receipt.php?id=<?php echo $sel['id']; ?>"><button class="btn btn-success"> View </button></a></td>

<?php } ?>
<td><a href="dev-receipt.php?id=<?php echo $sel['id']; ?>"><button class="btn btn-info"> Print </button></a></td>
</tr>

<?php } ?>
</tbody>
</table>

</div>

</div>
</div>
</div>
</div>
</div>
</div>


<script>
$(document).ready(function() {
$('#dataTable').DataTable();
});
</script>
<?php
require_once('header/footer.php');
 } ?>