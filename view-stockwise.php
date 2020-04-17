<?php 
session_start();
if(!isset($_SESSION['name']) && !isset($_GET['id'])){
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
<h4 class="card-title">Add Stock </h4>
</div>
<div class="card-body ">

		<?php 
		 $s = "SELECT * FROM stockmgmt WHERE id = '".$_GET['id']."' ";
		 $se = mysqli_query($conn, $s);
		 $sel = mysqli_fetch_array($se);
			
		?>

		<form method="POST" name="stockdepartment" action="#" class="form-horizontal">

	

		<div class="row">
		<div class="col-md-6">
		<div class="card stacked-form">

		<div class="card-body ">

		<div class="form-group">
		<label id="font-color-label">Stock No</label>
		
	
		
		<div id="stock_no_value_div">
		<input style="font-size: 21px; font-weight: 800;" type="text" id="stock_no_value" name="stockNo" value="<?php echo $sel['stockNo']; ?>" placeholder="Enter Stock No." class="form-control" readonly>
		</div>

		</div>
		
		<div class="form-group">
		<label id="font-color-label">Challan Date </label>
		
		 <input style="color: #3b5998; font-size: 21px; font-weight: 800;" type="date" id="challanDate" name="challanDate" class="form-control datepicker" placeholder="Date Picker Here" value="<?php echo $sel['challanDate']; ?>" readonly />
		</div>


		<div class="form-group">
		<label id="font-color-label">Challan No</label>
		<input style="color: #3b5998; font-size: 21px; font-weight: 800;" id="challanNo" name="challanNo" type="text" placeholder="Enter Challan No" class="form-control" value="<?php echo $sel['challanNo']; ?>" readonly>
		</div>

		<div class="form-group">
		<label id="font-color-label">Dealer Name</label>
	
		<input style="color: #3b5998; font-size: 21px; font-weight: 800;" id="challanNo" name="challanNo" type="text" placeholder="Enter Challan No" class="form-control" value="<?php echo $sel['dealerName']; ?>" readonly>
		</div>

		<div class="form-group">
		<label id="font-color-label">Model Make</label>		
		
		<?php
		$m = "SELECT name FROM `makername` WHERE `id` = '".$sel['modelMake']."'";
		$mo = mysqli_query($conn, $m);
		$mod = mysqli_fetch_array($mo);

		$mod1= "SELECT name FROM `modelname` WHERE `id` = '".$sel['model']."'";
		$mode = mysqli_query($conn, $mod1);
		$model = mysqli_fetch_array($mode);
		?>

		<input style="color: #3b5998; font-size: 21px; font-weight: 800;" id="challanNo" name="challanNo" type="text" placeholder="Enter Challan No" class="form-control" value="<?php echo $mod['name']; ?>" readonly>			
		</div>

		<div class="form-group">
		<label id="font-color-label">Model</label>	
		<input style="color: #3b5998; font-size: 21px; font-weight: 800;" id="challanNo" name="challanNo" type="text" placeholder="Enter Challan No" class="form-control" value="<?php echo $model['name']; ?>" readonly>
		</div>


		<div class="form-group">
		<label id="font-color-label">Model SubType</label>
		<input style="color: #3b5998; font-size: 21px; font-weight: 800;" id="challanNo" name="challanNo" type="text" placeholder="Enter Challan No" class="form-control" value="<?php echo $sel['modelSubtype']; ?>" readonly>
		</div>

		</div>

		</div>
		</div>


		<div class="col-md-6">
		<div class="card stacked-form">

		<div class="card-body ">

		<div class="form-group" id="hidden-stock-no-sid-box" >
		<label id="font-color-label"></label>
		<input type="text" placeholder="" class="form-control">
		</div>



		<div class="form-group">
		<label id="font-color-label">Model Color</label>
		<input style="color: #3b5998; font-size: 21px; font-weight: 800;" id="modelColor" name="modelColor" type="text" placeholder="Enter Model Color" class="form-control" value="<?php echo $sel['modelColor']; ?>"readonly>
		</div>

		<div class="form-group" id="">
		<label id="font-color-label">CHASSIS NO</label>
		<input style="color: #3b5998; font-size: 21px; font-weight: 800;" id="chasisNo" name="chasisNo" type="text" placeholder="Enter CHASSIS No" class="form-control" value="<?php echo $sel['chasisNo']; ?>" readonly>
		</div>

		
		<div class="form-group">
		<label id="font-color-label">Engine No</label>
		<input style="color: #3b5998; font-size: 21px; font-weight: 800;" id="engineNo" name="engineNo" type="text" placeholder="Enter Engine No" class="form-control" value="<?php echo $sel['engineNo']; ?>" readonly>
		</div>



		<div class="form-group">
		<label id="font-color-label">Stock Location</label>
		<input style="color: #3b5998; font-size: 21px; font-weight: 800;" id="challanNo" name="challanNo" type="text" placeholder="Enter Challan No" class="form-control" value="<?php echo $sel['stockLocation']; ?>" readonly>
		</div>

		<div class="form-group" id="">
		<label id="font-color-label">Short Item</label>
		<input style="color: #3b5998; font-size: 21px; font-weight: 800;" id="shortItem" name="shortItem" type="text" placeholder="Enter Short Item Details" class="form-control" value="<?php echo $sel['shortItem']; ?>" readonly>
		</div>

		<div class="form-group" id="">
		<label id="font-color-label">Any Dent</label>
		<input style="color: #3b5998; font-size: 21px; font-weight: 800;" id="anyDent" name="anyDent" type="text" placeholder="Description of Any Dent..." class="form-control" value="<?php echo $sel['anyDent']; ?>" readonly>
		</div>

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


<?php
require_once('header/footer.php');
 } ?>