	<?php 
	session_start();
	if(!isset($_SESSION['name'])){
	echo "<script> window.open('login.php', '_self')</script>";
	}else{

	require_once('header/header.php');
	include('header/conn.php');

	$s = "SELECT * FROM gatepassmgmt WHERE id = '7'";
	$se = mysqli_query($conn , $s);
	$sel = mysqli_fetch_array($se);
	$acces = $sel['accessorie'];	
	$sub_acces = $sel['subAccessorie'];
	$acces_explode = explode(',', $acces);
	$sub_acces_explode = explode(',', $sub_acces);

	foreach($acces_explode as $acces_explode_name){
		//echo $acces_explode_name;
	$accessorie_n = "SELECT `name` FROM `accessories` WHERE id ='".$acces_explode_name."'";	
	$accessorie_na = mysqli_query($conn , $accessorie_n);
	$accessorie_nam = mysqli_fetch_array($accessorie_na);
	echo $accessorie_nam['name'];
	echo " " . "," . " ";
	}

	echo "<br>";
	echo "<br>";
	$sub_accessorie_total = 0;
	foreach($sub_acces_explode as $sub_acces_explode_name){
	
	$sub_accessorie_n = "SELECT `name`,`cost` FROM `subaccessories` WHERE id ='".$sub_acces_explode_name."'";	
	$sub_accessorie_na = mysqli_query($conn , $sub_accessorie_n);
	$sub_accessorie_nam = mysqli_fetch_array($sub_accessorie_na);
	echo $sub_accessorie_nam['name'];
	//echo "<br>";
	echo " " . "," . " ";
	$sub_accessorie_total+= $sub_accessorie_nam['cost'];
	}
	echo "<br><br>";
	echo  "<b>Total Accessories Cost :- </b>" .  $sub_accessorie_total; // Total Accessories Cost
	
	?>

	<link href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css" rel="stylesheet">
	<!-- Bootstrap core JavaScript-->

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


	<!-- Page level plugin JavaScript--><script src="	https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>

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
	<form method="POST" name="" action="#" class="form-horizontal"  enctype="multipart/form-data">

		<div class="row">
		<div class="col-md-6">
		<div class="card stacked-form">

		<div class="card-body ">

		<?php 
		$a = "SELECT * FROM gatepassmgmt ORDER BY id DESC";
		$ad = mysqli_query($conn, $a);
		$add = mysqli_fetch_array($ad);
		$gatePassNo =  1 + $add['gatePassNo'];		
		?>

		<div class="form-group"> 
		<label id="font-color-label">Cash Receipt No. </label>
		<input style="color: red;  font-size: larger;  width: auto;" id="gatePassNo" name="gatePassNo" value="<?php echo $gatePassNo; ?>" type="text" placeholder="Cash Receipt No." class="form-control" readonly>
	
		<!-- Accessories ADD / DELETE Section STARTS-->	
		<br><br>

		<label>Change Accessories / Add Accessories </label>
		
		<select id="accessorie_update">
		<option value="1"> No </option>
		<option value="2"> Yes </option>
		</select>

		<script>
		$(document).ready(function () {
		$showvalue = $("#receiptoptionone").val();	
		if($showvalue == 2){
		$("#receiptoptiononeshow").css("background-color","red")
		$("#receiptoptiononeshow").css('text-decoration','line-through');
		}
		else if($showvalue == 1){
		$("#receiptoptiononeshow").css("background-color","yellow");
		$("#receiptoptiononeshow").css('text-decoration','none');
		}		
		});
		</script>


		<script type="text/javascript">
		$(document).ready(function(){
		$('#accessorie_update').on('change', function() {
		if ( this.value == '1')
		{
		$("#Accessories_Amount_Section").css("background-color","yellow");
		$("#Accessories_Amount_Section").css("color","black");
		$("#Accessories_Amount_Section").css('text-decoration','none');

		$("#Accessories_Amount_Section").css('border-radius','10px');
		$("#Accessories_Amount_Section").css('font-size','16px');
		$("#Accessories_Amount_Section").css('font-weight','600');		
		}
		else if (this.value == '2')
		{
		$("#Accessories_Amount_Section").css("background-color","red");
		$("#Accessories_Amount_Section").css("color","white");
		$("#Accessories_Amount_Section").css('text-decoration','line-through');

		$("#Accessories_Amount_Section").css('border-radius','10px');
		$("#Accessories_Amount_Section").css('font-size','16px');
		$("#Accessories_Amount_Section").css('font-weight','600');
		}
		});
		});
		</script>
		<br><br>

		<div class="container" id="Accessories_Amount_Section" style="background-color: yellow; border-radius:10px; font-size: 16px; font-weight:600; ">
		<?php
		// Below Code Is Also Running ABOVE ::: 
		$s = "SELECT * FROM gatepassmgmt WHERE id = '7'";
		$se = mysqli_query($conn , $s);
		$sel = mysqli_fetch_array($se);
		$acces = $sel['accessorie'];	
		$sub_acces = $sel['subAccessorie'];
		$acces_explode = explode(',', $acces);
		$sub_acces_explode = explode(',', $sub_acces);

		foreach($acces_explode as $acces_explode_name){
		//echo $acces_explode_name;
		$accessorie_n = "SELECT `name` FROM `accessories` WHERE id ='".$acces_explode_name."'";	
		$accessorie_na = mysqli_query($conn , $accessorie_n);
		$accessorie_nam = mysqli_fetch_array($accessorie_na);
		echo $accessorie_nam['name'];
		echo " " . "," . " ";
		}

		echo "<br>";
		echo "<br>";
		$sub_accessorie_total = 0;
		foreach($sub_acces_explode as $sub_acces_explode_name){

		$sub_accessorie_n = "SELECT `name`,`cost` FROM `subaccessories` WHERE id ='".$sub_acces_explode_name."'";	
		$sub_accessorie_na = mysqli_query($conn , $sub_accessorie_n);
		$sub_accessorie_nam = mysqli_fetch_array($sub_accessorie_na);
		echo $sub_accessorie_nam['name'];
		//echo "<br>";
		echo " " . "," . " ";
		$sub_accessorie_total+= $sub_accessorie_nam['cost'];
		}
		echo "<br><br>";
		echo  "<b>Total Accessories Cost :- </b>" .  $sub_accessorie_total; // Total Accessories Cost
		?>
		</div>
		<!-- Accessories ADD / DELETE Section ENDS-->	
		</div>	
		</div>
		</div>
		</div>


		<div class="col-md-6">
		<div class="card stacked-form">
		<div class="card-body ">
		<!-- Start Add For Accessories -->
		<?php 
		include('conn_accessories.php');
		?>
		<div class="form-group">
		<label id="font-color-label">ADD ACCESSORIES</label>
<div class="table-responsive">
<table class="table table-bordered" id="item_table">
<thead>
<tr>

<th>Accessories</th>
<th>Sub Accessories</th>

<th> <button type="button" name="add" class="btn btn-success btn-xs add"><span class="nc-icon nc-simple-add"></span></button></th>
</tr>
</thead>
<tbody>

</tbody>
</table>

</div>
		</div>

	<script type="text/javascript">
	$(document).ready(function(){
	var count = 0;
	$(document).on('click','.add',function(){
	count++;
	var html = '';
	html += '<tr>';


	html +='<td> <select name="accessorie[]" class="form-control item_category" data-sub_category_id="'+count+'"><option value=""> Select Category </option> <?php echo fill_select_boxOne($conn_acc) ?> </select> </td>';

	html += '<td> <select name="subAccessorie[]" class="form-control item_sub_category" id="item_sub_category'+count+'"> <option value=""> Select Sub Category </option> </select></td>';


	html += '<td> <button type="button" name="remove" class="btn btn-danger btn-xs remove"> <span class="nc-icon nc-simple-remove icon-bold"></span></button></td>';
	$('tbody').append(html);
	});


	$(document).on('click','.remove',function(){
	$(this).closest('tr').remove();
	});

	$(document).on('change','.item_category',function(){
	var category_id = $(this).val();
	var sub_category_id = $(this).data('sub_category_id');
	$.ajax({
	url : "select-sub-accessories.php",
	method : "POST",
	data : {category_id : category_id},
	success:function(data){
	var html = '<option value="" > Select Sub Category </option>';
	html += data;
	$("#item_sub_category" +sub_category_id).html(html);
	}
	});
	});

	});	
	</script>



<style type="text/css">
	.item_sub_category{
		color: #3349FF;
		font-weight: 800;
	}
</style>
	
		<!-- End Add For Accessories -->



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

<input type="submit" class="btn btn-fill btn-info" name="add-gate-pass" id="addgatepass1" value="Add" >

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
		$("#addgatepass").click(function(){
			var gatePassNo = $("#gatePassNo").val();
			var chasisNo = $("#chasisNo").val();
			var receiptdata = $("#receiptdata").val();			
			var amount = $("#amount").val();
			
			var receiptdatatwo = $("#receiptdatatwo").val();			
			var amounttwo = $("#amounttwo").val();
			var receiptdatathree = $("#receiptdatathree").val();			
			var amountthree = $("#amountthree").val();
			var receiptdatafour = $("#receiptdatafour").val();			
			var amountfour = $("#amountfour").val();
			
			var receiptdatafive = $("#receiptdatafive").val();			
			var amountfive = $("#amountfive").val();
			

			var receiptdatasix = $("#receiptdatasix").val();			
			var amountsix = $("#amountsix").val();
			var receiptdataseven = $("#receiptdataseven").val();			
			var amountseven = $("#amountseven").val();
			var receiptdataeight = $("#receiptdataeight").val();			
			var amounteight = $("#amounteight").val();
			var receiptdatanine = $("#receiptdatanine").val();			
			var amountnine = $("#amountnine").val();

			
			var receiptoptionone = $("#receiptoptionone").val();
			var receiptoptiontwo = $("#receiptoptiontwo").val();
			var receiptoptionthree = $("#receiptoptionthree").val();
			var receiptoptionfour = $("#receiptoptionfour").val();
			var receiptoptionfive = $("#receiptoptionfive").val();
			var receiptoptionsix = $("#receiptoptionsix").val();
			var receiptoptionseven = $("#receiptoptionseven").val();
			var receiptoptioneight = $("#receiptoptioneight").val();
		
			console.log("starting Ajax");	
		
		if(gatePassNo!=="" )
			{
			$.ajax({
				url : "gatepass-data-save.php",
				type : "POST",
				data : {
					gatePassNo : gatePassNo,
					chasisNo :chasisNo,
					receiptdata : receiptdata,
					amount : amount,

					receiptdatatwo : receiptdatatwo,
					amounttwo : amounttwo,
					receiptdatathree : receiptdatathree,
					amountthree : amountthree,
					receiptdatafour : receiptdatafour,
					amountfour : amountfour,
					receiptdatafive : receiptdatafive,
					amountfive : amountfive,
					receiptdatasix : receiptdatasix,
					amountsix : amountsix,
					receiptdataseven : receiptdataseven,
					amountseven : amountseven,
					receiptdataeight :receiptdataeight,
					amounteight : amounteight,
					receiptdatanine : receiptdatanine,
					amountnine : amountnine,
					
					receiptoptionone: receiptoptionone,
					receiptoptiontwo : receiptoptiontwo,
					receiptoptionthree : receiptoptionthree,
					receiptoptionfour : receiptoptionfour,
					receiptoptionfive : receiptoptionfive,
					receiptoptionsix : receiptoptionsix,
					receiptoptionseven : receiptoptionseven,
					receiptoptioneight : receiptoptioneight

					// challanNo : challanNo,
					// modelmakenamesection : modelmakenamesection,
					// modelnamesection : modelnamesection,
					// modelSubtype : modelSubtype,
					// modelColor : modelColor,
					// chasisNo: chasisNo,
					// engineNo : engineNo,
					// stockLocation : stockLocation,
					// shortItem : shortItem,
					// anyDent : anyDent					
				},

				success:function(data){

					// $('#challanDate').val('');
					// $('#dealerNameIdd').val('');
					// $('#challanNo').val('');
					// $('#modelmakenamesection').val('');
					// $('#modelnamesection').val('');
					// $('#modelSubtype').val('');
					// $('#modelColor').val('');
					// $('#chasisNo').val('');
					// $('#engineNo').val('');
					// $('#stockLocation').val('');
					// $('#shortItem').val('');
					// $('#anyDent').val('');

					
					alert("Data Added To Database");
					location.reload();
					
				}
			});
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

</div>

</div>
</div>

	
<!-- Comment Section For Show All Data for gate Pass -->
<!-- <div class="container">
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="background-color: white; ">
<thead>
<tr>
<th width="5%"> GatePass No</th>
<th> Chasis No</th>
<th> SalesPerson</th>
<th> Id Proof</th>
<th> Invoice </th>
<th> Insurance </th>
<th> RC </th>
</tr>
</thead>
<tbody>
<?php 
//$ga = "select * FROM gatepassmgmt";
//$gat = mysqli_query($conn , $ga);
//$i=0;
//while ($gate = mysqli_fetch_array($gat)) {
//	$i++;
?>
<tr>
<td><?php// echo $gate['gatePassNo']?></td>
<td><?php// echo $gate['chasisNo']?></td>
<td><?php// echo $gate['salesPerson']?></td>
<td><img src="idproofdoc/<?php// echo $gate['idProofdoc']?>" width="50px" height="50px"></td>
<td><img src="invoiceDoc/<?php// echo $gate['invoiceDoc']?>" width="50px" height="50px"></td>
<td><img src="insuranceDoc/<?php// echo $gate['insuranceDoc']?>" width="50px" height="50px"></td>
<td><img src="rcDoc/<?php //echo $gate['rcDoc']?>" width="50px" height="50px"></td>
</tr>
<?php //} ?>
</tbody>
</table>
</div>
 -->
<!-- Comment Section Ends-->


<script>
// This is Added For cKeditor start
CKEDITOR.replace('cceditor2');
CKEDITOR.replace('cceditor1');
CKEDITOR.replace('cceditor');
// This is Added For cKeditor end
$(document).ready(function() {
$('#dataTable').DataTable();
});
</script>
<?php
require_once('header/footer.php');
 } ?>