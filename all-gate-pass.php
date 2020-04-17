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
<h4 class="card-title">All Gate Pass  </h4>
</div>
<div class="card-body">

<div class="container">
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="background-color: white; ">
<thead>
<tr>
<th> GatePass NO.</th>
<th> CHASIS NO.</th>
<th> COST</th>
<th> IDENTITY PROOF (ID CARD)</th>
<th> ADDRESS </th>
<th> SHORT ITEM </th>
<th> SALES PERSON  </th>
<th> REMARK</th>
<th> PD </th>
<?php 
$select_u = "SELECT `name` , `role` FROM `register` WHERE `name` = '".$_SESSION['name']."'";
$select_us = mysqli_query($conn , $select_u);
$select_user = mysqli_fetch_array($select_us); 
if($select_user['role'] == 'admin'){
?>
<th> Udpated Date/Time </th>
<?php } ?>
<th> View/ Edit </th>
<th> View/Print </th>
</tr>
</thead>

<tbody>

<?php 

//$s = "select * FROM dealername";
$s = "SELECT `makername`.`id` , `makername`.`name` AS `makeName` , `dealername`.`makeId` , `dealername`.`name` AS `dealerName` FROM `dealername` LEFT JOIN `makername` ON `makername`.`id` = `dealername`.`makeId`" ;

$s1 = "SELECT * FROM `gatepassmgmt`" ;

$se = mysqli_query($conn , $s1);
$i=0;
while ($sel = mysqli_fetch_array($se)) {
	$i++;
?>

<tr>
<td><?php echo $sel['gatePassNo']?></td>
<td><?php echo $sel['chasisNo']?></td>
<td><?php echo $sel['paymentReceivable']?></td>
<td><?php echo $sel['idProofCard']?></td>
<td><?php echo wordwrap($sel['address'] , 15, "<br>\n"); ?>
</td>
<td><?php echo $sel['shortItem']?></td>
<td><?php echo $sel['salesPerson']?></td>
<td><?php echo wordwrap($sel['remark'] , 15, "<br>\n");?></td>
<td><?php echo $sel['pD']?></td>

<?php 

if($select_user['role'] == 'admin'){
?>

<td><?php
// $date1 = strtr($sel['updatedTimeDate'], '/', '-');
// echo date('Y-m-d H:i', strtotime($date1));
	echo $sel['updatedTimeDate'];
	?></td>

<td><a href="edit-gate-pass1.php?id=<?php echo $sel['id']; ?>"><button class="btn btn-primary"> Edit </button></a></td>

<?php } else {?>
<td><a href="view-gate-pass.php?id=<?php echo $sel['id']; ?>"><button class="btn btn-warning"> View </button></a></td>

<?php } ?>



<td><a href="preview-gatepass-receipt.php?id=<?php echo $sel['id']; ?>"><button class="btn btn-info"> Print View </button></a></td>

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