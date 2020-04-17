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
<h4 class="card-title"> <?php //echo $_GET['id']; ?> Edit Cash Receipt </h4>
</div>
<div class="card-body ">

		<script>
		function validateForm(){

		function myTrim(x) {
		return x.replace(/^\s+|\s+$/gm,'');
		}
		
		if(myTrim($('#editreceipt').find('input[name=date]').val()) == ""){	
		$("#challanDate").focus();
		alert('Please Add Challan Date');
		return false;
		}

		else if(myTrim($('#editreceipt').find('input[name=cusName]').val()) == ""){
		$("#cusName").focus();
		alert('Please Add Customer Name');
		return false;	
		}

		else if(myTrim($('#editreceipt').find('input[name=forName]').val()) ==""){
		$("#forName").focus();
		alert("Please Add For");
		return false;
		}

		else if(myTrim($('#editreceipt').find('input[name=mobile]').val()) ==""){
		$('#mobile').focus();
		alert('Please Add Mobile No');
		return false;
		}

		else if($('#mobile').val().length !== 10  ){
		$('#mobile').focus();
		alert('Mobile Number Should Be 10 Digit');
		return false;
		}

		else if(myTrim($('#editreceipt').find('select[name=financeMode]').val()) ==""){
		$('#financeMode').focus();
		alert('Please Select FinanceMode ');
		return false;
		}	

		else if(myTrim($('#editreceipt').find('input[name=amtPaid]').val()) ==""){
		$('#amtPaid').focus();
		alert('Please Add Initial Amount');
		return false;
		}
		
		else if(myTrim($('#editreceipt').find('select[name=payVia]').val()) ==""){
		$('#payVia').focus();
		alert('Please Select PayVia Mode');
		return false;
		}

		else if($('#editreceipt').find('select[name=payVia]').val() =="Cheque" && myTrim($('#editreceipt').find('input[name=cheqDate]').val()) == ""){
		$('#cheqDate').focus();
		alert('Please Select Cheque Date');
		return false;
		}

		else if($('#editreceipt').find('select[name=exVehOpt]').val() == 1 && myTrim($('#editreceipt').find('input[name=exVehModel]').val()) == ""){
		$('#exVehModel').focus();
		alert('Please Add Exchange Vehicle Model Name');
		return false;
		}

		else if($('#editreceipt').find('select[name=exVehOpt]').val() == 1 && myTrim($('#editreceipt').find('input[name=exVehNo]').val()) == ""){
		$('#exVehNo').focus();
		alert('Please Add Exchange Vehicle Number');
		return false;
		}

		else if($('#editreceipt').find('select[name=exVehOpt]').val() == 1 && myTrim($('#editreceipt').find('input[name=exVehAmt]').val()) == ""){
		$('#exVehAmt').focus();
		alert('Please Add Exchange Vehicle Model Amount');
		return false;
		}
		}
		</script>



		<?php 
		$c = "SELECT * FROM `receiptmgmt` WHERE id='".$_GET['id']."'";
		$ca = mysqli_query($conn , $c);
		$cas = mysqli_fetch_array($ca);

		if(isset($_POST['edit'])){
		
		$receiptNo = mysqli_real_escape_string($conn, $_POST['receiptNo']);
		$date = mysqli_real_escape_string($conn, $_POST['date']);
		$cusName = mysqli_real_escape_string($conn, $_POST['cusName']);
		$forName = mysqli_real_escape_string($conn, $_POST['forName']);
		$mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
		$financeMode = mysqli_real_escape_string($conn, $_POST['financeMode']);
		$amtPaid = mysqli_real_escape_string($conn, $_POST['amtPaid']);
		
		$paymentVia = mysqli_real_escape_string($conn, $_POST['payVia']);
		
		if($paymentVia !== "Cheque"){
		$payVia =  $paymentVia;
		$cheqDate = "NIL";	   	
		}else if($paymentVia == "Cheque"){
		$payVia =  $paymentVia;
		$cheqDate = mysqli_real_escape_string($conn, $_POST['cheqDate']);
		}


		$exVehOption = mysqli_real_escape_string($conn, $_POST['exVehOpt']);
		
		if($exVehOption == 1 ){
        
        $exVehOpt = $exVehOption;
		$exVehModel = mysqli_real_escape_string($conn, $_POST['exVehModel']);
		$exVehNo = mysqli_real_escape_string($conn, $_POST['exVehNo']);
		$exVehAmt = mysqli_real_escape_string($conn, $_POST['exVehAmt']);
		
		}
		else if($exVehOption == 2){
		
		$exVehOpt = $exVehOption;
		$exVehModel = "NIL";
		$exVehNo = "NIL";
		$exVehAmt = "NIL";
		
		}

		

		if(empty($date)){
		echo "<p id='errorone' style='text-align:center;
		background-color: red;
		border-radius: 6px;
		color: white;
		font-size: 22px;
		'>
		Date Cannot be Empty
		</p>";

		echo "<script type='text/javascript'> 
		$(document).ready( function() {
		$('#errorone').delay(4000).fadeOut();
		});
		</script>";				

		}

		else if(empty($cusName)){
		echo "<p id='errortwo' style='text-align:center;
		background-color: red;
		border-radius: 6px;
		color: white;
		font-size: 22px;
		'>
		Customer Name Cannot be Empty
		</p>";

		echo "<script type='text/javascript'> 
		$(document).ready( function() {
		$('#errortwo').delay(4000).fadeOut();
		});
		</script>";									

		}


		else if(empty($forName)){
		echo "<p id='errorthree' style='text-align:center;
		background-color: red;
		border-radius: 6px;
		color: white;
		font-size: 22px;
		'>
		FOR Cannot be Empty
		</p>";


		echo "<script type='text/javascript'> 
		$(document).ready( function() {
		$('#errorthree').delay(4000).fadeOut();
		});
		</script>";										
		}

		else if(empty($mobile)){
		echo "<p id='errorfour' style='text-align:center;
		background-color: red;
		border-radius: 6px;
		color: white;
		font-size: 22px;
		'>
		MOBILE NO. Cannot be Empty
		</p>";


		echo "<script type='text/javascript'> 
		$(document).ready( function() {
		$('#errorfour').delay(4000).fadeOut();
		});
		</script>";										
		}



		else if(empty($financeMode)){
		echo "<p id='errorfive' style='text-align:center;
		background-color: red;
		border-radius: 6px;
		color: white;
		font-size: 22px;
		'>
		MODEL OF FINANCE Cannot be Empty
		</p>";


		echo "<script type='text/javascript'> 
		$(document).ready( function() {
		$('#errorfive').delay(4000).fadeOut();
		});
		</script>";										
		}

		else if(empty($amtPaid)){
		echo "<p id='errorsix' style='text-align:center;
		background-color:red;
		border-radius: 6px;
		color: white;
		font-size: 22px;
		'>
		INITIAL AMOUNT PAID Cannot be Empty
		</p>";


		echo "<script type='text/javascript'> 
		$(document).ready( function() {
		$('#errorsix').delay(4000).fadeOut();
		});
		</script>";						

		}

		else if(empty($paymentVia)){
		echo "<p id='errorseven' style='text-align:center;
		background-color: red;
		border-radius: 6px;
		color: white;
		font-size: 22px;
		'>
		PAYMENT VIA Cannot be Empty
		</p>";


		echo "<script type='text/javascript'> 
		$(document).ready( function() {
		$('#errorseven').delay(4000).fadeOut();
		});
		</script>";						

		}

		else if(empty($exVehOption)){
		echo "<p id='erroreight' style='text-align:center;
		background-color: red;
		border-radius: 6px;
		color: white;
		font-size: 22px;
		'>
		EXCHANGE VEHICLE MODEL DETAILS Cannot be Empty
		</p>";

		echo "<script type='text/javascript'> 
		$(document).ready( function() {	
		$('#erroreight').delay(4000).fadeOut();
		});
		</script>";										
		}

		else{

		$up = "UPDATE receiptmgmt SET `date` ='$date',
				cusName ='$cusName',
				forName ='$forName',
				mobile ='$mobile',
				financeMode ='$financeMode',
				amtPaid ='$amtPaid',
				payVia ='$payVia',
				cheqDate ='$cheqDate',
				exVehOpt ='$exVehOpt',
				exVehModel ='$exVehModel',
				exVehNo ='$exVehNo',
				updatedTimeDate = NOW(),
				exVehAmt ='$exVehAmt'WHERE id = '".$cas['id']."'";

		$ad = mysqli_query($conn, $up);

		if($ad){
		$editreceiptid = $cas['id'];	
		echo "<script>  alert('Updated Successfully') </script>";
		echo "<script> window.open('edit-cash-receipt.php?id=$editreceiptid','_self')</script>";
		}else{
		echo "<script>  alert('Not Updated') </script>";
		}
		}
		}
		?>

		<form method="POST" name="editreceipt" id="editreceipt" action="#" class="form-horizontal" onsubmit="return validateForm()">

		<div class="row">
		<div class="col-md-6">
		<div class="card stacked-form">

		<div class="card-body ">

		<div class="form-group" id="">
		<label id="font-color-label">Cash Receipt No. </label>
		<input style="color: red;  font-size: larger;  width: auto;" id="shortItem" name="receiptNo" value="<?php echo $cas['receiptNo']; ?>" type="text" placeholder="Cash Receipt No." class="form-control" readonly>
		</div>


		<div class="form-group">
		<label id="font-color-label">Date </label>		
		<input type="date" id="challanDate" name="date" class="form-control" placeholder="Date Picker Here" value="<?php echo $cas['date']; ?>" />
		</div>

		<div class="form-group" id="">
		<label id="font-color-label">Customer Name</label>
		<input id="cusName" name="cusName" type="text" placeholder="Enter Customer Name" value="<?php echo $cas['cusName']; ?>" class="form-control">
		</div>

		<div class="form-group">
		<label id="font-color-label"> For </label>
		<input id="forName" name="forName" type="text" placeholder="Enter Customer  For Name"  value="<?php echo $cas['forName']; ?>" class="form-control">
		</div>

		<script type="text/javascript">
		function mobileNo(evt){
		var charCode = (evt.which) ? evt.which : evt.keyCode
		if (charCode > 31 && (charCode < 48 || charCode > 57))
		return false;
		return true;
		}



		</script>

		<div class="form-group">
		<label id="font-color-label"> Mobile No.  </label>
		<input id="mobile" name="mobile" type="text" placeholder="Enter Mobile No" class="form-control" onkeypress="return mobileNo(event)" value="<?php echo $cas['mobile']; ?>">
		</div>

		</div>

		</div>
		</div>


		<div class="col-md-6">
		<div class="card stacked-form">

		<div class="card-body ">


		
		<div class="form-group" >
		<label id="font-color-label">Model Of Finance</label>
		<select id="financeMode" name="financeMode" class="selectpicker" data-title="Select" data-style="btn-default btn-outline" data-menu-style="dropdown-blue" >
		<option value="">Select</option>
		<?php 
		$s_f = "SELECT `id`,`name` FROM `financemode`";
		$se_fi = mysqli_query($conn,$s_f);
		while($sel_fin = mysqli_fetch_array($se_fi)){
		?>
		<option value="<?php echo $sel_fin['id']; ?>"
			<?php if($sel_fin['id']==$cas['financeMode']) echo 'selected="selected"'; ?>><?php echo $sel_fin['name']; ?>
		</option>
		<?php } ?>
		</select>
		</div>
		
		
		<div class="form-group">
		<label id="font-color-label"> Initial Amount Paid </label>
		<input id="amtPaid" name="amtPaid" type="text" placeholder="Enter Amount" class="form-control" value="<?php echo $cas['amtPaid']; ?>">
		</div>
		
		
		<div class="form-group">
		<label id="font-color-label">Payment Via</label>

		<select id="payVia" name="payVia" class="selectpicker" data-title="Select" data-style="btn-default btn-outline" data-menu-style="dropdown-blue">
		
		<option value="">Select</option>

		<?php 
		$sp = "SELECT name FROM `paymode`";
		$se = mysqli_query($conn,$sp);
		while($sel_pay = mysqli_fetch_array($se)){
		$paymodename = mysqli_real_escape_string($conn,$sel_pay['name']);
		?>
		
		<option value="<?php echo $sel_pay['name']; ?>"
			<?php  if($sel_pay['name'] == $cas['payVia']) echo 'selected="selected"'; ?>><?php  echo $sel_pay['name']; ?>
		</option>

		<?php } ?>
		</select>
		

		</div>
		
		<script type="text/javascript">
		$(document).ready(function(){
		$('#exchange_veh_detail').on('change', function() {
		if ( this.value == '1')
		{
		$("#Exchange-yes-no").show();
		}
		else
		{
		$("#Exchange-yes-no").hide();
		}
		});

		$('#payVia').on('change', function() {
		if ( this.value == 'Cheque')
		{
		$("#payment_via_check_date").show();
		}
		else
		{
		$("#payment_via_check_date").hide();
		}
		});

		});

		</script>	

		<div class="form-group" id="payment_via_check_date" style="display: none;">
		<label id="font-color-label">Cheque Date </label>		
		<input type="date" id="cheqDate" name="cheqDate" class="form-control datepicker" value="<?php echo $cas['cheqDate']; ?>" />
		</div>
		

		<!-- Div Show Starts -->
		<?php 
		if($cas['exVehOpt'] == 1){
		?>				
		<script>
		$(document).ready(function () {
		$("#Exchange-yes-no").show();
		});
		</script>				
		<?php } ?>

		<?php 
		if($cas['payVia'] == 'Cheque'){
		?>				
		<script>
		$(document).ready(function () {
		$("#payment_via_check_date").show();
		});
		</script>				
		<?php } ?>




		<!-- Div Show Ends -->

		<div class="form-group">
		<label id="font-color-label">Exchange Vehicle Model Details</label>
		<select id="exchange_veh_detail" name="exVehOpt" class="selectpicker" data-title="Select" data-style="btn-default btn-outline" data-menu-style="dropdown-blue">
		
		<option value="1" <?php if($cas['exVehOpt'] == '1') echo 'selected="selected"';?> >Yes</option>
		<option value="2" <?php if($cas['exVehOpt'] == '2') echo 'selected="selected"'; ?> >No</option>			
		 
		</select>
		</div>
		
		
		<div id="Exchange-yes-no" style="display: none;">
		
		<div class="form-group" >
		<label id="font-color-label"> Exchange Vehicle Model </label>		
		<input type="text" id="exVehModel" name="exVehModel" class="form-control datepicker" placeholder="Enter Vehicle Model" value="<?php echo $cas['exVehModel'];?>" />
		</div>
		
		<div class="form-group" >
		<label id="font-color-label"> Exchange Vehicle No. </label>		
		<input type="text" id="exVehNo" name="exVehNo" class="form-control datepicker" placeholder="Enter Vehicle No." value="<?php echo $cas['exVehNo'];?>" />
		</div>

		<div class="form-group" >
		<label id="font-color-label"> Exchange Vehicle Amount </label>		
		<input type="text" id="exVehAmt" name="exVehAmt" class="form-control datepicker" placeholder="Enter Vehicle Amount" value="<?php echo $cas['exVehAmt'] ;?>" />
		</div>

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

<input type="submit" class="btn btn-fill btn-info" name="edit" id="addstockdata11" value="Edit" >

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
				alert('Please Add Challan Date');
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
			}
		});
	});
		</script>

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