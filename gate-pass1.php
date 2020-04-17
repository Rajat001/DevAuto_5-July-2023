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
<script src="header/typeahead.min.js"></script>


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
		<h4 class="card-title"> Generate Gate Pass </h4>
		</div>
		<div class="card-body ">

		

		<form method="POST" name="" action="#" class="form-horizontal">

		<div class="row">
		<div class="col-md-6">
		<div class="card stacked-form">

		<div class="card-body ">


		<?php 
		$a = "SELECT * FROM receiptmgmt ORDER BY id DESC";
		$ad = mysqli_query($conn, $a);
		$add = mysqli_fetch_array($ad);
		$receiptNo =  1 + $add['receiptNo'];		
		?>

		<div class="form-group" id="">
		<label id="font-color-label">Cash Receipt No. </label>
		<input style="color: red;  font-size: larger;  width: auto;" id="shortItem" name="receiptNo" value="<?php echo $receiptNo; ?>" type="text" placeholder="Cash Receipt No." class="form-control" readonly>
		</div>

		</div>

		</div>
		</div>


		<div class="col-md-6">
		<div class="card stacked-form">

		<div class="card-body ">

	
		</div>

		</div>
		</div>
	
		</div>

<div class="row">
<div class="col-sm-2">
</div>
<div class="col-sm-10">
<div class="row">
<div class="col-md-4">
</div>
<div class="col-md-4">
<div class="form-group">

<input type="submit" class="btn btn-fill btn-info" name="add" id="addstockdata11" value="Add Data" >

</div>
</div>
<div class="col-md-4">

</div>
</div>
</div>
</div>
</form>



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