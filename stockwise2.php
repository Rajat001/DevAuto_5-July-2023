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
<h4 class="card-title">Add Stock </h4>
</div>
<div class="card-body ">

<?php 

if(isset($_POST['add'])){
	
	$stockNo = mysqli_real_escape_string($conn, $_POST['stockNo']);
	$challanDate = mysqli_real_escape_string($conn, $_POST['challanDate']);
	$challanNo = mysqli_real_escape_string($conn, $_POST['challanNo']);
	$dealerName = mysqli_real_escape_string($conn, $_POST['dealerName']);
	$modelMake = mysqli_real_escape_string($conn, $_POST['modelMake']);
	$model = mysqli_real_escape_string($conn, $_POST['model']);
	$modelSubtype = mysqli_real_escape_string($conn, $_POST['modelSubtype']);
	$modelColor = mysqli_real_escape_string($conn, $_POST['modelColor']);
	$chasisNo = mysqli_real_escape_string($conn, $_POST['chasisNo']);
	$engineNo = mysqli_real_escape_string($conn, $_POST['engineNo']);
	$stockLocation = mysqli_real_escape_string($conn, $_POST['stockLocation']);

	if(empty($stockNo) && empty($challanDate)  && empty($challanNo)  && empty($dealerName)  && empty($modelMake)  && empty($model)  && empty($modelSubtype)  && empty($modelColor)  && empty($chasisNo)  && empty($engineNo)  && empty($stockLocation)){
		
	}else{

	$a = "INSERT INTO stockmgmt (`stockNo`,`challanDate`,`challanNo`,`dealerName`,`modelMake`,`model`,`modelSubtype`,`modelColor`,`chasisNo`,`engineNo`,`stockLocation`) VALUES ('$stockNo','$challanDate','$challanNo','$dealerName','$modelMake','$model','$modelSubtype','$modelColor','$chasisNo','$engineNo','$stockLocation')";
	$ad = mysqli_query($conn, $a);

	// echo $ad;
	// die;	

	if($ad){
		echo "<script>  alert('Added Successfully') </script>";
		echo "<script> window.open('stockwise.php','_self')</script>";
	}else{
		echo "<script>  alert('Not Added') </script>";
	}
	}
}
?>

		<form method="POST" action="#" class="form-horizontal">
		<div class="row">
		</div>
		<div class="row">
		<div class="col-md-6">
		<div class="card stacked-form">

		<div class="card-body ">

		<div class="form-group">
		<label id="font-color-label">Stock No</label>
		
		<?php 
		 $a = "SELECT * FROM stockmgmt ORDER BY id DESC";
		 $ad = mysqli_query($conn, $a);
		 $add = mysqli_fetch_array($ad);
		 $add_stock =  1 + $add['stockNo'];		
		?>
		
		<input type="text" id="stock_no_value" name="stockNo" value="<?php echo $add_stock; ?>" placeholder="Enter Stock No." class="form-control" readonly>
		
		</div>
	

		<div class="form-group">
		<label id="font-color-label">Dealer Name</label>
	
		<select class="form-control" id="continent">
		<option>----Select----</option>		
		<?php 
		$s = "SELECT * FROM dealername ORDER BY id DESC";
		$se = mysqli_query($conn, $s);
		While($sel = mysqli_fetch_array($se)){
		?>

		<option value="<?php echo $sel['makeId']; ?>"><?php echo $sel['name']; ?></option>
		<?php } ?>

		</select>
		</div>

		<div class="form-group">
		<label id="font-color-label">Model Make</label>		
		
		<select class="form-control" id="country" disabled="disabled">
		<option> ---- Select ----</option>
		</select>			
		</div>

		<div class="form-group">
		<label id="font-color-label">Model</label>	
		<select name="state" class="form-control" id="state" disabled="disabled"><option>------- Select --------</option></select>
		</div>


		<script type="text/javascript">
		$(document).ready(function() {
		//Change in continent dropdown list will trigger this function and
		//generate dropdown options for county dropdown
		$(document).on('change','#continent', function() {
		var continent_id = $(this).val();
		if(continent_id != "") {
		$.ajax({
		url:"get-data1.php",
		type:'POST',
		data:{continent_id:continent_id},
		success:function(response) {
		//var resp = $.trim(response);
		if(response != '') {
		$("#country").removeAttr('disabled','disabled').html(response);
		$("#state, #city").attr('disabled','disabled').html("<option value=''>------- Select --------</option>");
		} else {
		$("#country, #state, #city").attr('disabled','disabled').html("<option value=''>------- Select --------</option>");
		}
		}
		});
		} else {
		$("#country, #state, #city").attr('disabled','disabled').html("<option value=''>------- Select --------</option>");
		}
		});
		//Change in coutry dropdown list will trigger this function and
		//generate dropdown options for state dropdown
		$(document).on('change','#country', function() {
		var country_id = $(this).val();
		if(country_id != "") {  
		$.ajax({
		url:"get-data1.php",
		type:'POST',
		data:{country_id:country_id},
		success:function(response) {
		//var resp = $.trim(response);
		if(response != '') {
		$("#state").removeAttr('disabled','disabled').html(response);
		$("#city").attr('disabled','disabled').html("<option value=''>------- Select --------</option>");
		}
		else $("#state, #city").attr('disabled','disabled').html("<option value=''>------- Select --------</option>");
		}
		});
		} else {
		$("#state, #city").attr('disabled','disabled').html("<option value=''>------- Select --------</option>");
		}
		});
		//Change in state dropdown list will trigger this function and
		//generate dropdown options for city dropdown
		$(document).on('change','#state', function() {
		var state_id = $(this).val();
		if(state_id != "") {
		$.ajax({
		url:"get-data1.php",
		type:'POST',
		data:{state_id:state_id},
		success:function(response) {
		if(response != '') $("#city").removeAttr('disabled','disabled').html(response);
		else $("#city").attr('disabled','disabled').html("<option value=''>------- Select --------</option>");
		}
		});
		} else {
		$("#city").attr('disabled','disabled').html("<option value=''>------- Select --------</option>");
		}
		});
		});
		</script>

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
<button type="submit" name="add" class="btn btn-fill btn-info">ADD</button>
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
<div class="container">
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="background-color: white; ">
<thead>
<tr>
<th width="5%"> Serial No.</th>
<th> Challan Date</th>
<th> Challan No</th>
<th> Dealer Name</th>
<th> Chasis No</th>
<th> Engine No</th>
<th>Action</th>
</tr>
</thead>

<tbody>

<?php 

$s = "select * FROM stockmgmt";
$se = mysqli_query($conn , $s);
$i=0;
while ($sel = mysqli_fetch_array($se)) {
	$i++;

$d = "SELECT name FROM `dealername` WHERE `id` = '".$sel['dealerName']."'";
$de = mysqli_query($conn, $d);
$dea = mysqli_fetch_array($de);

?>


<tr>
<td><?php echo $i; ?></td>
<td><?php echo $sel['challanDate']?></td>
<td><?php echo $sel['challanNo']?></td>
<td><?php echo $dea['name']?></td>
<td><?php echo $sel['chasisNo']?></td>
<td><?php echo $sel['engineNo']?></td>
<td><button class="btn btn-primary btn-sm">View</button></td>
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