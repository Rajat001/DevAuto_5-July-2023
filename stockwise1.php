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



		<form method="POST" name="stockdepartment" action="#" class="form-horizontal">

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
		
		<div id="stock_no_value_div">
		<input type="text" id="stock_no_value" name="stockNo" value="<?php echo $add_stock; ?>" placeholder="Enter Stock No." class="form-control" readonly>
		</div>

		</div>
		
		<div class="form-group">
		<label id="font-color-label">Challan Date </label>
		
		 <input type="date" id="challanDate" name="challanDate" class="form-control datepicker" placeholder="Date Picker Here" required />
		</div>


		<div class="form-group">
		<label id="font-color-label">Challan No</label>
		<input id="challanNo" name="challanNo" type="text" placeholder="Enter Challan No" class="form-control" required>
		</div>

		<div class="form-group">
		<label id="font-color-label">Dealer Name</label>
	
		<select class="form-control" id="dealerNameIdd">
		<option value="">----Select----</option>		
		<?php 
		$s = "SELECT * FROM dealername";
		$se = mysqli_query($conn, $s);
		While($sel = mysqli_fetch_array($se)){		?>

		<option value="<?php echo $sel['makeId']; ?>"><?php echo $sel['name']; ?></option>
		<?php } ?>

		</select>
		</div>

		<div class="form-group">
		<label id="font-color-label">Model Make</label>		
		
		<select class="form-control" id="modelmakenamesection" disabled="disabled">
		<option value=""> ---- Select ----</option>
		</select>			
		</div>

		<div class="form-group">
		<label id="font-color-label">Model</label>	
		<select id="modelnamesection" name="model" class="form-control"  disabled="disabled">
			<option value="">------- Select --------</option>
		</select>
		</div>


		<script type="text/javascript">

				$(document).ready(function(){
				$(document).on('change','#dealerNameIdd' , function(){
				var dealerNameIdd = $(this).val();
				if(dealerNameIdd != ""){
				$.ajax({
				url : "get-data.php",
				type : "POST",
				data : {dealerNameIdd : dealerNameIdd},
				success:function(response){
				if(response != ''){
				
				$("#modelmakenamesection").removeAttr('disabled','disabled').html(response);
				}
				}
				})
				}	
				}); 

				$(document).on('change','#modelmakenamesection', function() {
				var modelnamesection_id = $(this).val();
				if(modelnamesection_id != "") {  
				$.ajax({
				url:"get-data.php",
				type:'POST',
				data:{modelnamesection_id:modelnamesection_id},
				success:function(response) {
				if(response != '') {
				$("#modelnamesection").removeAttr('disabled','disabled').html(response);
				
				}
				}
				});
				} 
				});

				});

		</script>

		<div class="form-group">
		<label id="font-color-label">Model SubType</label>
		<select id="modelSubtype" name="modelSubtype" class="selectpicker" data-title="Select" data-style="btn-default btn-outline" data-menu-style="dropdown-blue" required>
		<option value="">Select</option>
		<option value="Drum">Drum</option>
		<option value="Disc">Disc</option>
		</select>
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
		<input id="modelColor" name="modelColor" type="text" placeholder="Enter Model Color" class="form-control"required>
		</div>

		<div class="form-group" id="">
		<label id="font-color-label">CHASSIS NO</label>
		<input id="chasisNo" name="chasisNo" type="text" placeholder="Enter CHASSIS No" class="form-control">
		</div>

		
		<div class="form-group">
		<label id="font-color-label">Engine No</label>
		<input id="engineNo" name="engineNo" type="text" placeholder="Enter Engine No" class="form-control" required>
		</div>



		<div class="form-group">
		<label id="font-color-label">Stock Location</label>
		<select id="stockLocation" name="stockLocation" class="selectpicker" data-title="Select" data-style="btn-default btn-outline" data-menu-style="dropdown-blue" required>
		<option value="">Select</option>
		<option value="Showroom">Showroom</option>
		<option value="Banquet">Banquet</option>
		<option value="Basement">Basement</option>
		<option value="Other">Other</option>
		</select>
		</div>

		<div class="form-group" id="">
		<label id="font-color-label">Short Item</label>
		<input id="shortItem" name="shortItem" type="text" placeholder="Enter Short Item Details" class="form-control">
		</div>

		<div class="form-group" id="">
		<label id="font-color-label">Any Dent</label>
		<input id="anyDent" name="anyDent" type="text" placeholder="Description of Any Dent..." class="form-control">
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

<input type="button" class="btn btn-fill btn-info" name="" id="addstockdata" value="Add Data" >

</div>
</div>
<div class="col-md-4">

</div>
</div>
</div>
</div>
</form>


		<script>
	
		$(document).ready(function(){
		$("#addstockdata").click(function(){
			var stock_no_value = $("#stock_no_value").val();
			var challanDate = $("#challanDate").val();
			var challanNo = $("#challanNo").val();			
			var dealerNameIdd = $("#dealerNameIdd").val();
			var modelmakenamesection = $("#modelmakenamesection").val();
			var modelnamesection = $("#modelnamesection").val();
			var modelSubtype = $("#modelSubtype").val();
			var modelColor = $("#modelColor").val();
			var chasisNo = $("#chasisNo").val();
			var engineNo = $("#engineNo").val();
			var stockLocation = $("#stockLocation").val();
			var shortItem = $("#shortItem").val();
			var anyDent = $("#anyDent").val();

			console.log("starting Ajax");	
		if(stock_no_value!=="" && challanDate!=="" && challanNo !=="" && dealerNameIdd!=="" && modelmakenamesection!== "" && modelnamesection!== "" && modelSubtype!== "" && modelColor!== "" && chasisNo!=="" && engineNo!=="" && stockLocation!=="" && shortItem!=="" && anyDent!==""){
			$.ajax({
				url : "stock-data-save.php",
				type : "POST",
				data : {
					stock_no_value : stock_no_value,
					challanDate :challanDate,
					dealerNameIdd : dealerNameIdd,
					challanNo : challanNo,
					modelmakenamesection : modelmakenamesection,
					modelnamesection : modelnamesection,
					modelSubtype : modelSubtype,
					modelColor : modelColor,
					chasisNo: chasisNo,
					engineNo : engineNo,
					stockLocation : stockLocation,
					shortItem : shortItem,
					anyDent : anyDent					
				},

				success:function(data){

					$('#challanDate').val('');
					$('#dealerNameIdd').val('');
					$('#challanNo').val('');
					$('#modelmakenamesection').val('');
					$('#modelnamesection').val('');
					$('#modelSubtype').val('');
					$('#modelColor').val('');
					$('#chasisNo').val('');
					$('#engineNo').val('');
					$('#stockLocation').val('');
					$('#shortItem').val('');
					$('#anyDent').val('');

					
					alert("Data Added To Database");
					location.reload();
					
				}
			});
			}
				else if($('#challanDate').val() == ""){
				$("#challanDate").focus();
				}
				else if($('#challanNo').val() == ""){
				$("#challanNo").focus();

				}else if($('#dealerNameIdd').val() == ""){
				$("#dealerNameIdd").focus();

				}else if($('#modelmakenamesection').val() == ""){
				$("#modelmakenamesection").focus();
				}else if($('#modelnamesection').val() == ""){
				$("#modelnamesection").focus();
				}else if($('#modelSubtype').val() == ""){
				$("#modelSubtype").focus();
				}else if($('#modelColor').val() == ""){
				$("#modelColor").focus();
				}else if($('#chasisNo').val() == ""){
				$("#chasisNo").focus();
				}else if($('#engineNo').val() == ""){
				$("#engineNo").focus();
				}else if($('#stockLocation').val() == ""){
				$("#stockLocation").focus();
				}else if($('#shortItem').val() == ""){
				$("#shortItem").focus();
				}else if($('#anyDent').val() == ""){
				$("#anyDent").focus();
				}	
				else{
				
				alert("Please Fill All The Fields");
				
				//$("#alert_message").html("Please Fill All The Fields");
				// $("#alert_message").show();
				// $("#alert_message").delay(2000).fadeOut();
			}
		});
	});
		</script>

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

$m = "SELECT name FROM `makername` WHERE `id` = '".$sel['modelMake']."'";
$mo = mysqli_query($conn, $m);
$mod = mysqli_fetch_array($mo);

$mod1= "SELECT name FROM `modelname` WHERE `id` = '".$sel['model']."'";
$mode = mysqli_query($conn, $mod1);
$model = mysqli_fetch_array($mode);
?>


<tr>
<td><?php echo $i; ?></td>
<td><?php echo $sel['challanDate']?></td>
<td><?php echo $sel['challanNo']?></td>


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
<td> <a href="view-stockwise.php?id=<?php echo $add['id']; ?>"><button class="btn btn-primary btn-sm">View</button> </a></td>
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