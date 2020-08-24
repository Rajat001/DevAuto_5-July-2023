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

<style type="text/css">
	#font-color-label{
		color: black;
		font-weight: 800;
	}
	#hidden-stock-no-sid-box{
		visibility: hidden;
	}

	#hidden-model-color-sid-box{
		visibility: hidden;
	}
	#model_name_here{
		width: 460px;
	    border-radius: 3px;
	    height: 40px;
	}
	#stock_no_value{
		 color: red;
    	font-size: larger;
    	width: auto;
	}
</style>


<div class="content">
<div class="container-fluid">
<div class="row">

<div class="col-md-12">
<div class="card ">
<div class="card-header ">
<h4 class="card-title" style="font-size: 20px; font-weight: 700; color: forestgreen;">
	<b> UnSold Stock </b> 
</h4>
</div>
<div class="card-body ">

</div>
</div>

</div>
<div class="container">
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="background-color: white; ">
<thead>
<tr>
<th width="5%"> Stock No.</th>
<th> Challan Date</th>
<th> Challan No</th>
<th> Dealer Name </th>

<th> Model Name</th>
<th> Model</th>
<!--
<th> Model SubType</th>
<th> Model Color</th>
-->
<th> Chasis No</th>
<th> Engine No</th>
<!--
<th> Stock Location</th>
<th> Short Item</th>
<th> Any Dent </th>
-->
<th>Status</th>
<th>Action</th>

</tr>
</thead>

<tbody>

<?php 

$s = "select * FROM stockmgmt WHERE `status` = '0'";
$se = mysqli_query($conn , $s);
$i=0;
while ($sel = mysqli_fetch_array($se)) {
	$i++;

$d = "SELECT name FROM `dealername` WHERE `id` = '".$sel['dealerName']."'";
$de = mysqli_query($conn, $d);
$dea = mysqli_fetch_array($de);

$m = "SELECT name FROM `makername` WHERE `id` = '".$sel['modelMake']."'";
$mo = mysqli_query($conn, $m);
$mod = mysqli_fetch_array($mo);

$mod1= "SELECT name FROM `modelname` WHERE `id` = '".$sel['model']."'";
$mode = mysqli_query($conn, $mod1);
$model = mysqli_fetch_array($mode);
?>


<tr>
<td><?php echo $sel['stockNo']; ?></td>
<td><?php echo $sel['challanDate']; ?></td>
<td><?php echo $sel['challanNo']; ?></td>
<td>
<?php 
$dealer = "SELECT `name` FROM `dealername` WHERE `id` = '".$sel['dealerName']."'";
$dealer_n = mysqli_query($conn , $dealer);
$dealer_na = mysqli_fetch_array($dealer_n);
echo $dealer_na['name'];
?>
</td>

<td><?php echo $mod['name']?></td>
<td><?php echo $model['name']?></td>
<!--
<td><?php // echo $sel['modelSubtype']?></td>
<td><?php // echo $sel['modelColor']?></td>
-->	
<td><?php echo $sel['chasisNo']?></td>
<td><?php echo $sel['engineNo']?></td>
<!--
<td><?php // echo $sel['stockLocation']?></td>
<td><?php // echo $sel['shortItem']?></td>
<td><?php // echo $sel['anyDent']?></td>
-->

<td>  
<?php if($sel['status'] == 0 ){
?>
<button type="button" class="btn btn-success btn-sm">InStock</button>
<?php	
}
?>

</td>

<td> <a href="view-stockwise.php?id=<?php echo $sel['id']; ?>"><button class="btn btn-primary">View</button> </a></td>

</tr>

<?php } ?>
</tbody>
</table>
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