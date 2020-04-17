<?php 
session_start();
if(!isset($_SESSION['name'])){
echo "<script> window.open('login.php', '_self')</script>";
}else{

require_once('header/header.php');
require_once('header/conn.php');

if($_GET['id']){
$id = $_GET['id'];
$g = "SELECT * FROM `gatepassmgmt` WHERE id = '".$id."'";
$ga = mysqli_query($conn,$g);
$gate = mysqli_fetch_array($ga);
}else{
echo "<script> window.open('all-gate-pass.php', '_self')</script>";	
}
?>

<link href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<!-- Bootstrap core JavaScript-->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


<!-- Page level plugin JavaScript-->
<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>

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

	<script>
		function validateForm(){

		function myTrim(x) {
		return x.replace(/^\s+|\s+$/gm,'');
		}
		
		if(myTrim($('#editgatepass').find('input[name=chasisNo]').val()) == ""){	
		$("#chasisNo").focus();
		alert('Please Add CHASIS NO.');
		return false;
		}
		else if(myTrim($('#editgatepass').find('input[name=paymentReceivable]').val()) == ""){	
		$("#paymentReceivable").focus();
		alert('Please Add Cost.');
		return false;
		}
		else if(myTrim($('#editgatepass').find('input[name=receiptdata]').val()) == ""){	
		$("#receiptdata").focus();
		alert('Please Add Receipt No.');
		return false;
		}

			else if(myTrim($('#editgatepass').find('select[name=idproofdocument]').val()) ==""){
		$('#idproofdocument').focus();
		alert('Please Select IDENTITY PROOF Card ');
		return false;
		}	
	
	}
	</script>


	<?php

	if(isset($_POST['add-gate-pass'])){	

	$gatePassNo=mysqli_real_escape_string($conn, $_POST['gatePassNo']);
	$chasisNo=mysqli_real_escape_string($conn, $_POST['chasisNo']);
	$receiptdata=mysqli_real_escape_string($conn, $_POST['receiptdata']);	
	$amount =mysqli_real_escape_string($conn, $_POST['amount']); 


	$receiptoptiononee=mysqli_real_escape_string($conn, $_POST['receiptoptionone']);
	if($receiptoptiononee == 1){
	$receiptoptionone = 1;
	$receiptdatatwo	= 0;
	$amounttwo = 0;
	}else if($receiptoptiononee == 2){
	$receiptoptionone=mysqli_real_escape_string($conn, $_POST['receiptoptionone']);
	$receiptdatatwo=mysqli_real_escape_string($conn, $_POST['receiptdatatwo']);	
	$amounttwo =mysqli_real_escape_string($conn, $_POST['amounttwo']); 
	}

	$receiptoptiontwoo=mysqli_real_escape_string($conn, $_POST['receiptoptiontwo']);

	if($receiptoptiontwoo == 1){
	$receiptoptiontwo = 1;
	$receiptdatathree	= 0;
	$amountthree = 0;
	}else if($receiptoptiontwoo == 2){
	$receiptoptiontwo= 2;
	$receiptdatathree=mysqli_real_escape_string($conn, $_POST['receiptdatathree']);	
	$amountthree =mysqli_real_escape_string($conn, $_POST['amountthree']); 
	}

	$receiptoptionthreee=mysqli_real_escape_string($conn, $_POST['receiptoptionthree']);
	if($receiptoptionthreee == 1){
	$receiptoptionthree = 1;
	$receiptdatafour	= 0;
	$amountfour = 0;
	}else if($receiptoptionthreee == 2){
	$receiptoptionthree= 2;
	$receiptdatafour=mysqli_real_escape_string($conn, $_POST['receiptdatafour']);	
	$amountfour =mysqli_real_escape_string($conn, $_POST['amountfour']);
	}

	$receiptoptionfourr=mysqli_real_escape_string($conn, $_POST['receiptoptionfour']);
	if($receiptoptionfourr == 1){
	$receiptoptionfour = 1;
	$receiptdatafive = 0;
	$amountfive = 0;
	}else if($receiptoptionfourr == 2){
	$receiptoptionfour= 2;
	$receiptdatafive=mysqli_real_escape_string($conn, $_POST['receiptdatafive']);
	$amountfive =mysqli_real_escape_string($conn, $_POST['amountfive']); 
	}

	$receiptoptionfivee=mysqli_real_escape_string($conn, $_POST['receiptoptionfive']);

	if($receiptoptionfivee == 1){
	$receiptoptionfive = 1;
	$receiptdatasix	= 0;
	$amountsix = 0;
	}
	else if($receiptoptionfivee == 2){
	$receiptoptionfive= 2;
	$receiptdatasix=mysqli_real_escape_string($conn, $_POST['receiptdatasix']);	
	$amountsix =mysqli_real_escape_string($conn, $_POST['amountsix']); 
	}


	$receiptoptionsixx=mysqli_real_escape_string($conn, $_POST['receiptoptionsix']);
	
	if($receiptoptionsixx == 1){
	$receiptoptionsix = 1;
	$receiptdataseven	= 0;
	$amountseven = 0;
	}
	else if($receiptoptionsixx == 2){
	$receiptoptionsix= 2;
	$receiptdataseven=mysqli_real_escape_string($conn, $_POST['receiptdataseven']);	
	$amountseven =mysqli_real_escape_string($conn, $_POST['amountseven']); 
	}

	$receiptoptionsevenn=mysqli_real_escape_string($conn, $_POST['receiptoptionseven']);
		if($receiptoptionsevenn == 1){
	$receiptoptionseven = 1;
	$receiptdataeight	= 0;
	$amounteight = 0;
	}
	else if($receiptoptionsevenn == 2){
	$receiptoptionseven= 2;
	$receiptdataeight=mysqli_real_escape_string($conn, $_POST['receiptdataeight']);	
	$amounteight =mysqli_real_escape_string($conn, $_POST['amounteight']); 
}	


	$receiptoptioneightt=mysqli_real_escape_string($conn, $_POST['receiptoptioneight']);
	
	if($receiptoptioneightt == 1){
	$receiptoptioneight = 1;
	$receiptdatanine	= 0;
	$amountnine = 0;
	}
	else if($receiptoptioneightt == 2){
	$receiptoptioneight= 2;
	$receiptdatanine=mysqli_real_escape_string($conn, $_POST['receiptdatanine']);	
	$amountnine =mysqli_real_escape_string($conn, $_POST['amountnine']);
}	



	$idproofdocument =mysqli_real_escape_string($conn, $_POST['idproofdocument']);
	

	//idproofdoc
	$uploadDir = 'idproofdoc/'; 
	$idproofdoc = basename($_FILES["idproofdoc"]["name"]); 
    $targetFilePath = $uploadDir . $idproofdoc; 
    
    if($idproofdoc){		
    (move_uploaded_file($_FILES["idproofdoc"]["tmp_name"], $targetFilePath));
    $uploadedFileIdDoc = $idproofdoc; 
	}
	else {
		 $uploadedFileIdDoc = $gate['idProofdoc'];
	}

    	//idproofdoc
	$uploadDir1 = 'invoiceDoc/';
	$invoiceDoc = basename($_FILES["invoiceDoc"]["name"]); 
    $targetFilePath1 = $uploadDir1 . $invoiceDoc; 
    
    if($invoiceDoc){
	(move_uploaded_file($_FILES["invoiceDoc"]["tmp_name"], $targetFilePath1));
    $uploadedinvoiceDoc = $invoiceDoc; 
	}else{
	$uploadedinvoiceDoc = $gate['invoiceDoc'];
    }
    

        	//idproofdoc

	$uploadDir2 = 'insuranceDoc/'; 
	$insuranceDoc = basename($_FILES["insuranceDoc"]["name"]); 
    $targetFilePath2 = $uploadDir2 . $insuranceDoc; 
    if($insuranceDoc){
	(move_uploaded_file($_FILES["insuranceDoc"]["tmp_name"], $targetFilePath2));
    $uploadedinsuranceDoc = $insuranceDoc; 
	}else{
	$uploadedinsuranceDoc = $gate['insuranceDoc'];
    }
	
    //rcDoc
	$uploadDir3 = 'rcDoc/'; 

	$rcDoc = basename($_FILES["rcDoc"]["name"]); 
    $targetFilePath3 = $uploadDir3 . $rcDoc; 
    
    if($rcDoc){
	(move_uploaded_file($_FILES["rcDoc"]["tmp_name"], $targetFilePath3));
    $uploadedrcDoc = $rcDoc; 
	}else{
	$uploadedrcDoc = $gate['rcDoc'];
    }
	
    $salesPerson =mysqli_real_escape_string($conn, $_POST['salesPerson']);
    $pD =mysqli_real_escape_string($conn, $_POST['pD']);
    $shortItem =mysqli_real_escape_string($conn, $_POST['shortItem']);

    $paymentReceivable =mysqli_real_escape_string($conn, $_POST['paymentReceivable']);

    $address =mysqli_real_escape_string($conn, $_POST['address']);
	$remark =mysqli_real_escape_string($conn, $_POST['remark']);

	$serviceBook =mysqli_real_escape_string($conn, $_POST['serviceBook']);
	$deliveryKm =mysqli_real_escape_string($conn, $_POST['deliveryKm']);

			if($_POST['accessorie_update'] == 1) {
			$accessorie_update = $_POST['accessorie_update'];
			$update = "UPDATE `gatepassmgmt` SET `chasisNo` = '$chasisNo' , 
			`receiptNo` = '$receiptdata' ,
			`receiptAmt` = '$amount' ,
			`receiptNoOne` = '$receiptdatatwo' ,
			`receiptAmtOne` = '$amounttwo' ,
			`receiptNoTwo` = '$receiptdatathree' ,
			`receiptAmtTwo` = '$amountthree' ,
			`receiptNoThree` = '$receiptdatafour' ,
			`receiptAmtThree` = '$amountfour' ,
			`receiptNoFour` = '$receiptdatafive' ,
			`receiptAmtFour` = '$amountfive' ,
			`receiptNoFive` = '$receiptdatasix' ,
			`receiptAmtFive` = '$amountsix' ,
			`receiptNoSix` = '$receiptdataseven' ,
			`receiptAmtSix` = '$amountseven' ,
			`receiptNoSeven` = '$receiptdataeight' ,
			`receiptAmtSeven` = '$amounteight' ,
			`receiptNoEight` = '$receiptdatanine' ,
			`receiptAmtEight` = '$amountnine' ,
			`receiptOptOne` = '$receiptoptionone' ,
			`receiptOptTwo` = '$receiptoptiontwo' ,
			`receiptOptThree` = '$receiptoptionthree' ,
			`receiptOptFour` = '$receiptoptionfour' ,
			`receiptOptFive` = '$receiptoptionfive' ,
			`receiptOptSix` = '$receiptoptionsix' ,
			`receiptOptSeven` = '$receiptoptionseven' ,
			`receiptOptEight` = '$receiptoptioneight',
			`salesPerson` = '$salesPerson' ,
			`pD` = '$pD' ,
			`shortItem` = '$shortItem' ,			
			`paymentReceivable` = '$paymentReceivable' ,
			`address` = '$address' ,
			`remark` = '$remark' ,
			`serviceBook` = '$serviceBook' ,
			`deliveryKm` = '$deliveryKm' ,
			`idProofCard` = '$idproofdocument' ,
			`idProofdoc` = '$uploadedFileIdDoc' ,
			`invoiceDoc` = '$uploadedinvoiceDoc' ,
			`insuranceDoc` = '$uploadedinsuranceDoc' ,
			`rcDoc` = '$uploadedrcDoc' ,
			`updatedTimeDate` = NOW(),
			`accessorie_update` = '$accessorie_update' WHERE id = '".$_GET['id']."' ";

			$update_query = mysqli_query($conn, $update);
			
			if ($update_query) {
			echo "<script> alert('Gate Pass Updated Successfully') </script>";			
			echo "<script> window.open('edit-gate-pass1.php?id=$id','_self') </script>"	;	
			}
			else {			
			//	echo "Contact to Server Provider ";
			echo "<script> alert('Something Gone Wrong') </script>";		
			}
			}
			else if($_POST['accessorie_update'] == 2){
			$accessorie_update = $_POST['accessorie_update'];
			$accessorie = implode(',' , $_POST['accessorie']);
			$subAccessorie = implode(',', $_POST['subAccessorie']);

			$update = "UPDATE `gatepassmgmt` SET `chasisNo` = '$chasisNo' , 
			`receiptNo` = '$receiptdata' ,
			`receiptAmt` = '$amount' ,
			`receiptNoOne` = '$receiptdatatwo' ,
			`receiptAmtOne` = '$amounttwo' ,
			`receiptNoTwo` = '$receiptdatathree' ,
			`receiptAmtTwo` = '$amountthree' ,
			`receiptNoThree` = '$receiptdatafour' ,
			`receiptAmtThree` = '$amountfour' ,
			`receiptNoFour` = '$receiptdatafive' ,
			`receiptAmtFour` = '$amountfive' ,
			`receiptNoFive` = '$receiptdatasix' ,
			`receiptAmtFive` = '$amountsix' ,
			`receiptNoSix` = '$receiptdataseven' ,
			`receiptAmtSix` = '$amountseven' ,
			`receiptNoSeven` = '$receiptdataeight' ,
			`receiptAmtSeven` = '$amounteight' ,
			`receiptNoEight` = '$receiptdatanine' ,
			`receiptAmtEight` = '$amountnine' ,
			`receiptOptOne` = '$receiptoptionone' ,
			`receiptOptTwo` = '$receiptoptiontwo' ,
			`receiptOptThree` = '$receiptoptionthree' ,
			`receiptOptFour` = '$receiptoptionfour' ,
			`receiptOptFive` = '$receiptoptionfive' ,
			`receiptOptSix` = '$receiptoptionsix' ,
			`receiptOptSeven` = '$receiptoptionseven' ,
			`receiptOptEight` = '$receiptoptioneight',
			`accessorie` = '$accessorie',
			`subAccessorie` = '$subAccessorie',
			`salesPerson` = '$salesPerson' ,
			`pD` = '$pD' ,
			`shortItem` = '$shortItem' ,			
			`paymentReceivable` = '$paymentReceivable' ,
			`address` = '$address' ,
			`remark` = '$remark' ,
			`serviceBook` = '$serviceBook' ,
			`deliveryKm` = '$deliveryKm' ,
			`idProofCard` = '$idproofdocument' ,
			`idProofdoc` = '$uploadedFileIdDoc' ,
			`invoiceDoc` = '$uploadedinvoiceDoc' ,
			`insuranceDoc` = '$uploadedinsuranceDoc' ,
			`rcDoc` = '$uploadedrcDoc' ,
			`updatedTimeDate` = NOW(),
			`accessorie_update` = '$accessorie_update' WHERE id = '".$_GET['id']."' ";

			$update_query = mysqli_query($conn, $update);

			if ($update_query) {
			echo "<script> alert('Gate Pass Updated Successfully') </script>";		
			echo "<script> window.open('edit-gate-pass1.php?id=$id','_self') </script>"	;
			}
			else {			
			
			echo "<script> alert('Server Error') </script>";		
			
			
			}
			}		

		}
		?>

		<form method="POST" name="editgatepass" id="editgatepass" action="#" class="form-horizontal"  enctype="multipart/form-data" onsubmit="return validateForm()" >

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

		<div class="form-group" id="">
		<label id="font-color-label"> GatePass No. </label>
		<input style="color: red;  font-size: larger;  width: auto;" id="gatePassNo" name="gatePassNo" value="<?php echo $gate['gatePassNo']; ?>" type="text" placeholder="Cash Receipt No." class="form-control" readonly>
		</div>




		<!-- Here Start For Typehead Concepts -->

<!-- 		<script type="text/javascript">
		$(document).ready(function(){
		$('.search-box input[type="text"]').on("keyup input", function(){
		/* Get input value on change */
		var inputVal = $(this).val();
		var resultDropdown = $(this).siblings(".resultChallanDetails");
		if(inputVal.length){
		$.get("jquery_searchdata.php", {term: inputVal}).done(function(data){
		// Display the returned data in browser
		resultDropdown.html(data);
		});
		} else{
		resultDropdown.empty();
		}
		});

		// Set search input value on click of resultChallanDetails item
		$(document).on("click", ".resultChallanDetails p", function(){
		$(this).parents(".search-box").find('input[type="text"]').val($(this).text());
		$(this).parent(".resultChallanDetails").empty();
		});
		});
		</script> -->

		<div class="form-group">
		<label id="font-color-label"> Chasis No. </label>
		</div>

		<div class="search-box">
		<input type="text" class="form-control" autocomplete="off" id="chasisNo" name="chasisNo" placeholder="Enter Challan No" value="<?php echo $gate['chasisNo']; ?>" style="font-weight: 900; color: crimson;"/ >
		<div class="resultChallanDetails" style="margin-top: 10px;"></div>
		</div>

		<!-- Here End For Typehead Concepts -->
		
		<center id="font-color-label" style="color: ;">OR</center>
		<center id="font-color-label" style="color: blue;">( Check Details Using Chasis No ) </center>

		<div class="form-group">
		<label id="font-color-label"><u> Chasis No </u> / <u> Manufacturer </u>  / <u> Model</u> / <u> Colour </u>  / <u> StockLocation </u> </label>
		
		<input id="challanCheck" name="" type="text" autocomplete="off" placeholder="Enter Challan No" class="form-control" style="font-weight: 900; color: crimson;">
		</div>	

		<div id="challanCheckList" style="margin-top: 10px;"></div> 	

		<!-- Start For Check Challan No / Stock Location-->
		<script type="text/javascript">
			
		$(document).ready(function(){

		$("#challanCheck").keyup(function(){
		var challanCheck = $(this).val();
		if(challanCheck != ""){
		$.ajax({
		url : "challanCheckListDetail.php",
		method : "POST",
		data : {challanCheck : challanCheck},
		success:function(data){
		$("#challanCheckList").fadeIn();
		$("#challanCheckList").html(data);
		}
		});     
		}
		});

		$(document).on('click','li', function(){
		$("#challanCheck").val($(this).text());
		$("#challanCheckList").fadeOut();
		});
		});

		</script>
		<!-- End For Check Challan No / Stock Location-->	

<br><br>

				<div style="border: 2px; border-style: solid; color: #ff0080; border-radius: 5px;">
		<label id="font-color-label"> &nbsp;  <span style="color:red; font-size:20px;"> *</span> Receipt Wise</label>
		<div class="col-sm-12">
		<div class="row">  	
		<div class="col-md-3">
		<div class="form-group">
<input type="text" id="receiptdata" name="receiptdata" value="<?php echo $gate['receiptNo']; ?>"  class="form-control" placeholder="Receipt No." >
		</div>
		</div>
		<div class="col-md-3">
		<div class="form-group">
<input type="text" id="amount" name="amount" class="form-control" value="<?php echo $gate['receiptAmt']; ?>" placeholder="Amount" readonly="" style="color: black; font-size: 16px; font-weight: 800;">
		</div>
		</div>
		
		<div class="col-md-3">
		<div class="form-group">
		
		<p id="receiptdetailone" style="display: none; border: 1px; border-style: solid; color: #ff0080; text-align: center;"> 

		<span style="color:black; font-weight: 700;">Customer Name :-</span> <span id="cusName"></span> <br>
		<span style="color:black; font-weight: 700;">Mobile :-</span> <span id="mobile"></span> <br>
		<span style="color:black; font-weight: 700;">Date :-</span> <span id="date"></span>

		</p>

		</div>
		</div>

		<div class="col-md-3">
		<div class="form-group">
<input type="button" id="getreceipt" class="btn btn-info" value="View" placeholder=".col-md-5">

		</div>
		</div>

		</div>
		<!-- Start Fee Details -->
		<script type="text/javascript">
		$(document).ready(function(){
		$('#getreceipt').on('click',function(){
		var receiptdata = $('#receiptdata').val();
		var receiptdatatwo  = $('#receiptdatatwo').val();
		var receiptdatathree  = $('#receiptdatathree').val();

		var receiptdatafour  = $('#receiptdatafour').val();

		var receiptdatafive  = $('#receiptdatafive').val();

		var receiptdatasix  = $('#receiptdatasix').val();

		var receiptdataseven  = $('#receiptdataseven').val();

		var receiptdataeight  = $('#receiptdataeight').val();

		var receiptdatanine  = $('#receiptdatanine').val();

		$.ajax({
		type:'POST',
		url:'get-receipt-amount.php',
		dataType: "json",
		data:{receiptdata:receiptdata},
		success:function(data){
		if(receiptdata == receiptdatatwo){
		alert("Receipt Cannot Be Same 1!!!");
		$( "#receiptdatatwo" ).val('');
		$( "#amounttwo" ).val('');
		$( "#cusNametwo" ).empty('');
		$( "#mobiletwo" ).empty('');
		$( "#datetwo" ).empty('');	
		$( "#receiptdetailtwo" ).hide();
		}
		else if(receiptdata == receiptdatathree){
		alert("Receipt Cannot Be Same !!!");
		$( "#receiptdatathree" ).val('');
			$( "#amountthree" ).val('');
		$( "#cusNamethree" ).empty('');
		$( "#mobilethree" ).empty('');
		$( "#datethree" ).empty('');	
		$( "#receiptdetailthree" ).hide();
		}
		else if(receiptdata == receiptdatafour){
		alert("Receipt Cannot Be Same !!!");
		$( "#receiptdatafour" ).val('');
		$( "#amountfour" ).val('');
		$( "#cusNamefour" ).empty('');
		$( "#mobilefour" ).empty('');
		$( "#datefour" ).empty('');	
		$( "#receiptdetailfour" ).hide();
		}
		else if(receiptdata == receiptdatafive){
		alert("Receipt Cannot Be Same !!!");
		$( "#receiptdatafive" ).val('');
		$( "#amountfive" ).val('');
		$( "#cusNamefive" ).empty('');
		$( "#mobilefive" ).empty('');
		$( "#datefive" ).empty('');	
		$( "#receiptdetailfive" ).hide();
		}
		else if(receiptdata == receiptdatasix){
		alert("Receipt Cannot Be Same !!!");
		$( "#receiptdatasix" ).val('');
		$( "#amountsix" ).val('');
		$( "#cusNamesix" ).empty('');
		$( "#mobilesix" ).empty('');
		$( "#datesix" ).empty('');	
		$( "#receiptdetailsix" ).hide();
		}
		else if(receiptdata == receiptdataseven){
		alert("Receipt Cannot Be Same !!!");
		$( "#receiptdataseven" ).val('');
		$( "#amountseven" ).val('');
		$( "#cusNameseven" ).empty('');
		$( "#mobileseven" ).empty('');
		$( "#dateseven" ).empty('');	
		$( "#receiptdetailseven" ).hide();
		} 
		else if(receiptdata == receiptdataeight){
		alert("Receipt Cannot Be Same !!!");
		$( "#receiptdataeight" ).val('');
		$( "#amounteight" ).val('');
		$( "#cusNameeight" ).empty('');
		$( "#mobileeight" ).empty('');
		$( "#dateeight" ).empty('');	
		$( "#receiptdetaileight" ).hide();
		}
		else if(receiptdata == receiptdatanine){
		alert("Receipt Cannot Be Same !!!");
		$( "#receiptdatanine" ).val('');
		$( "#amountnine" ).val('');
		$( "#cusNamenine" ).empty('');
		$( "#mobilenine" ).empty('');
		$( "#datenine" ).empty('');	
		$( "#receiptdetailnine" ).hide();
		}
		else 
		if(data.status == 'ok'){
		$('#amount').val(data.result.amtPaid);
		$('#cusName').text(data.result.cusName);
		$('#mobile').text(data.result.mobile);
		$('#date').text(data.result.date);
		$('#receiptdetailone').show();
		}
		else{
		//$('.user-content').slideUp();
		alert("Receipt Not Exist");
		$( "#amount" ).val('');
		$( "#cusName" ).empty();
		$( "#mobile" ).empty();
		$('#receiptdetailone').hide();
		} 
		}
		});
		});
		});
		</script>
		<!-- End Fee Details -->
		</div>


		<?php if($gate['receiptOptOne'] == 1){
		?>	
		<script>
		$(document).ready(function () {
		$("#receiptoptiononeshow").hide();
		});
		</script>               
		<?php } else if($gate['receiptOptOne'] == 2) {?>
		<script>
		$(document).ready(function () {
		$("#receiptoptiononeshow").show();
		});
		</script>               
		<?php } ?>	
	
		<label id="font-color-label"> &nbsp;   Receipt Wise (One) </label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;		
		<select id="receiptoptionone" name="receiptoptionone" class="btn btn-default btn-outline">
		<option value="1" <?php if($gate['receiptOptOne'] == '1') echo 'selected="selected"';?> > No </option>
		<option value="2" <?php if($gate['receiptOptOne'] == '2') echo 'selected="selected"';?> > Yes </option>
		</select>


		
		<div class="col-sm-12" id="receiptoptiononeshow" style="display: none;">
		<div class="row">
		<div class="col-md-3">
		<div class="form-group">
<input type="text" id="receiptdatatwo" name="receiptdatatwo" value="<?php echo $gate['receiptNoOne']; ?>"   class="form-control" placeholder="Receipt No.">
		</div> 
		</div>
		<div class="col-md-3">
		<div class="form-group">
<input type="text" id="amounttwo" name="amounttwo" class="form-control" placeholder="Amount" value="<?php echo $gate['receiptAmtOne']; ?>" readonly=""  style="color: black; font-size: 16px; font-weight: 800;">
		</div>
		</div>
		
		<div class="col-md-3">
		<div class="form-group">
		
		<p id="receiptdetailtwo" style="display: none; border: 1px; border-style: solid; color: #ff0080; text-align: center;"> 

		<span style="color:black; font-weight: 700;">Customer Name :-</span> <span id="cusNametwo"></span> <br>
		<span style="color:black; font-weight: 700;">Mobile :-</span> <span id="mobiletwo"></span> <br>
		<span style="color:black; font-weight: 700;">Date :-</span> <span id="datetwo"></span>

		</p>
			
		</div>
		</div>

		<div class="col-md-3">
		<div class="form-group">
<input type="button" id="getreceipttwo" class="btn btn-info" value="View" placeholder=".col-md-5">

		</div>
		</div>
		</div>
		</div>

		<!-- Start Fee Details -->
		<script type="text/javascript">
		$(document).ready(function(){
		$('#getreceipttwo').on('click',function(){
		var receiptdatatwo = $('#receiptdatatwo').val();
		
		var receiptdata = $('#receiptdata').val();
		
		var receiptdatathree  = $('#receiptdatathree').val();

		var receiptdatafour  = $('#receiptdatafour').val();

		var receiptdatafive  = $('#receiptdatafive').val();

		var receiptdatasix  = $('#receiptdatasix').val();

		var receiptdataseven  = $('#receiptdataseven').val();

		var receiptdataeight  = $('#receiptdataeight').val();

		var receiptdatanine  = $('#receiptdatanine').val();

		$.ajax({
		type:'POST',
		url:'get-receipt-amount.php',
		dataType: "json",
		data:{receiptdatatwo:receiptdatatwo},
		success:function(data){
		if(receiptdatatwo == receiptdata){
		alert("Receipt Cannot Be Same !!!");
		$( "#receiptdata" ).val('');
		$( "#amount" ).val('');
		$( "#cusName" ).empty('');
		$( "#mobile" ).empty('');
		$( "#date" ).empty('');	
		$( "#receiptdetailone" ).hide();

		}
		
		else if(receiptdatatwo == receiptdatathree){
		alert("Receipt Cannot Be Same !!!");
		$( "#receiptdatathree" ).val('');

		$( "#amountthree" ).val('');
		$( "#cusNamethree" ).empty('');
		$( "#mobilethree" ).empty('');
		$( "#datethree" ).empty('');	
		$( "#receiptdetailthree" ).hide();
		}

		else if(receiptdatatwo == receiptdatafour){
		alert("Receipt Cannot Be Same !!!");
		$( "#receiptdatafour" ).val('');

		$( "#amountfour" ).val('');
		$( "#cusNamefour" ).empty('');
		$( "#mobilefour" ).empty('');
		$( "#datefour" ).empty('');	
		$( "#receiptdetailfour" ).hide();
		}

		else if(receiptdatatwo == receiptdatafive){
		alert("Receipt Cannot Be Same !!!");
		$( "#receiptdatafive" ).val('');

		$( "#amountfive" ).val('');
		$( "#cusNamefive" ).empty('');
		$( "#mobilefive" ).empty('');
		$( "#datefive" ).empty('');	
		$( "#receiptdetailfive" ).hide();
		}

				else if(receiptdatatwo == receiptdatasix){
		alert("Receipt Cannot Be Same !!!");
		$( "#receiptdatasix" ).val('');

		$( "#amountseven" ).val('');
		$( "#cusNamesix" ).empty('');
		$( "#mobilesix" ).empty('');
		$( "#datesix" ).empty('');	
		$( "#receiptdetailsix" ).hide();
		}

						else if(receiptdatatwo == receiptdataseven){
		alert("Receipt Cannot Be Same !!!");
		$( "#receiptdataseven" ).val('');

		$( "#amountseven" ).val('');
		$( "#cusNameseven" ).empty('');
		$( "#mobileseven" ).empty('');
		$( "#dateseven" ).empty('');	
		$( "#receiptdetailseven" ).hide();
		}

								else if(receiptdatatwo == receiptdataeight){
		alert("Receipt Cannot Be Same !!!");
		$( "#receiptdataeight" ).val('');

		$( "#amounteight" ).val('');
		$( "#cusNameeight" ).empty('');
		$( "#mobileeight" ).empty('');
		$( "#dateeight" ).empty('');	
		$( "#receiptdetaileight" ).hide();
		}

										else if(receiptdatatwo == receiptdatanine){
		alert("Receipt Cannot Be Same !!!");
		$( "#receiptdatanine" ).val('');

		$( "#amountnine" ).val('');
		$( "#cusNamenine" ).empty('');
		$( "#mobilenine" ).empty('');
		$( "#datenine" ).empty('');	
		$( "#receiptdetailnine" ).hide();
		}

		else if(data.status == 'ok'){
		$('#amounttwo').val(data.result.amtPaid);
		$('#cusNametwo').text(data.result.cusName);
		$('#mobiletwo').text(data.result.mobile);
		$('#datetwo').text(data.result.date);
		$('#receiptdetailtwo').show();
		}
		else{
		
		alert("Receipt Not Exist");
		$( "#amounttwo" ).val('');
		$( "#cusNametwo" ).empty();
		$( "#mobiletwo" ).empty();
		$('#receiptdetailtwo').hide();
		} 
		}
		});
		});
		});
		</script>
		<!-- End Fee Details -->

		<br>

		<?php if($gate['receiptOptTwo'] == 1){
		?>	
		<script>
		$(document).ready(function () {
		$("#receiptoptiontwoshow").hide();
		});
		</script>               
		<?php } else if($gate['receiptOptTwo'] == 2) {?>
		<script>
		$(document).ready(function () {
		$("#receiptoptiontwoshow").show();
		});
		</script>               
		<?php } ?>	

		<!-- Receipt Second STARTS-->
		<label id="font-color-label"> &nbsp;   Receipt Wise (Two) </label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;		&nbsp;&nbsp;
		<select id="receiptoptiontwo" name="receiptoptiontwo" class="btn btn-default btn-outline">
		<option value="1" <?php if($gate['receiptOptTwo'] == '1') echo 'selected="selected"';?>> No </option>
		<option value="2" <?php if($gate['receiptOptTwo'] == '2') echo 'selected="selected"';?>> Yes </option>
		</select>

		<div class="col-sm-12" id="receiptoptiontwoshow" style="display: none;">
		<div class="row">
		<div class="col-md-3">
		<div class="form-group">
		<input type="text" id="receiptdatathree" name="receiptdatathree" class="form-control" value="<?php echo $gate['receiptNoTwo']; ?>" placeholder="Receipt No.">
		</div>
		</div>
		<div class="col-md-3">
		<div class="form-group">
		<input type="text" id="amountthree" name="amountthree" class="form-control" placeholder="Amount" readonly="" value="<?php echo $gate['receiptAmtTwo']; ?>"  style="color: black; font-size: 16px; font-weight: 800;">
		</div>
		</div>
		
		<div class="col-md-3">
		<div class="form-group">
		
		<p id="receiptdetailthree" style="display: none; border: 1px; border-style: solid; color: #ff0080; text-align: center;"> 

		<span style="color:black; font-weight: 700;">Customer Name :-</span> <span id="cusNamethree"></span> <br>
		<span style="color:black; font-weight: 700;">Mobile :-</span> <span id="mobilethree"></span> <br>
		<span style="color:black; font-weight: 700;">Date :-</span> <span id="datethree"></span>

		</p>

		</div>
		</div>

		<div class="col-md-3">
		<div class="form-group">
<input type="button" id="getreceiptthree" class="btn btn-info" value="View" placeholder=".col-md-5">

		</div>
		</div>
		</div>
		</div>
		<!-- Receipt Second End -->

		<!-- Start Fee Details -->
		<script type="text/javascript">
		$(document).ready(function(){
		$('#getreceiptthree').on('click',function(){
		var receiptdatathree = $('#receiptdatathree').val();
		
				var receiptdatatwo = $('#receiptdatatwo').val();
		
		var receiptdata = $('#receiptdata').val();
		
		var receiptdatafour  = $('#receiptdatafour').val();

		var receiptdatafive  = $('#receiptdatafive').val();

		var receiptdatasix  = $('#receiptdatasix').val();

		var receiptdataseven  = $('#receiptdataseven').val();

		var receiptdataeight  = $('#receiptdataeight').val();

		var receiptdatanine  = $('#receiptdatanine').val();

		$.ajax({
		type:'POST',
		url:'get-receipt-amount.php',
		dataType: "json",
		data:{receiptdatathree:receiptdatathree},
		success:function(data){
		if(receiptdatathree == receiptdata){
		alert("Receipt Cannot Be Same !!!");
		$( "#receiptdata" ).val('');
		$( "#amount" ).val('');
		$( "#cusName" ).empty('');
		$( "#mobile" ).empty('');
		$( "#date" ).empty('');	
		$( "#receiptdetailone" ).hide();
		}else if(receiptdatathree == receiptdatatwo){
		alert("Receipt Cannot Be Same !!!");
		$( "#receiptdatatwo" ).val('');

		$( "#amounttwo" ).val('');
		$( "#cusNametwo" ).empty('');
		$( "#mobiletwo" ).empty('');
		$( "#datetwo" ).empty('');	
		$( "#receiptdetailtwo" ).hide();
		} 
		else if(receiptdatathree == receiptdatafour){
		alert("Receipt Cannot Be Same !!!");
		$( "#receiptdatafour" ).val('');

		$( "#amountfour" ).val('');
		$( "#cusNamefour" ).empty('');
		$( "#mobilefour" ).empty('');
		$( "#datefour" ).empty('');	
		$( "#receiptdetailfour" ).hide();
		}
		else if(receiptdatathree == receiptdatafive){
		alert("Receipt Cannot Be Same !!!");
		$( "#receiptdatafive" ).val('');

		$( "#amountfive" ).val('');
		$( "#cusNamefive" ).empty('');
		$( "#mobilefive" ).empty('');
		$( "#datefive" ).empty('');	
		$( "#receiptdetailfive" ).hide();
		}
		else if(receiptdatathree == receiptdatasix){
		alert("Receipt Cannot Be Same !!!");
		$( "#receiptdatasix" ).val('');

		$( "#amountsix" ).val('');
		$( "#cusNamesix" ).empty('');
		$( "#mobilesix" ).empty('');
		$( "#datesix" ).empty('');	
		$( "#receiptdetailsix" ).hide();
		}
		else if(receiptdatathree == receiptdataseven){
		alert("Receipt Cannot Be Same !!!");
		$( "#receiptdataseven" ).val('');

		$( "#amountseven" ).val('');
		$( "#cusNameseven" ).empty('');
		$( "#mobileseven" ).empty('');
		$( "#dateseven" ).empty('');	
		$( "#receiptdetailseven" ).hide();

		}
		else if(receiptdatathree == receiptdataeight){
		alert("Receipt Cannot Be Same !!!");
		$( "#receiptdataeight" ).val('');

		$( "#amounteight" ).val('');
		$( "#cusNameeight" ).empty('');
		$( "#mobileeight" ).empty('');
		$( "#dateeight" ).empty('');	
		$( "#receiptdetaileight" ).hide();
		}
		else if(receiptdatathree == receiptdatanine){
		alert("Receipt Cannot Be Same !!!");
		$( "#receiptdatanine" ).val('');

		$( "#amountnine" ).val('');
		$( "#cusNamenine" ).empty('');
		$( "#mobilenine" ).empty('');
		$( "#datenine" ).empty('');	
		$( "#receiptdetailnine" ).hide();
		}
		else if(data.status == 'ok'){
		$('#amountthree').val(data.result.amtPaid);
		$('#cusNamethree').text(data.result.cusName);
		$('#mobilethree').text(data.result.mobile);
		$('#datethree').text(data.result.date);
		$('#receiptdetailthree').show();
		}
		else{
		//$('.user-content').slideUp();
		alert("Receipt Not Exist");
		$( "#amountthree" ).val('');
		$( "#cusNamethree" ).empty();
		$( "#mobilethree" ).empty();
		$('#receiptdetailthree').hide();
		} 
		}
		});
		});
		});
		</script>
		<!-- End Fee Details -->

		<br>

		<?php if($gate['receiptOptThree'] == 1){
		?>	
		<script>
		$(document).ready(function () {
		$("#receiptoptionthreeshow").hide();
		});
		</script>               
		<?php } else if($gate['receiptOptThree'] == 2) {?>
		<script>
		$(document).ready(function () {
		$("#receiptoptionthreeshow").show();
		});
		</script>               
		<?php } ?>	


		<!-- Receipt Third STARTS-->
		<label id="font-color-label"> &nbsp;   Receipt Wise (Three) </label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;		
		<select id="receiptoptionthree" name="receiptoptionthree" class="btn btn-default btn-outline">
		<option value="1" <?php if($gate['receiptOptThree'] == '1') echo 'selected="selected"';?> > No </option>
		<option value="2" <?php if($gate['receiptOptThree'] == '2') echo 'selected="selected"';?> > Yes </option>
		</select>

		<div class="col-sm-12" id="receiptoptionthreeshow" style="display: none;">
		<div class="row">
		<div class="col-md-3">
		<div class="form-group">
<input type="text" id="receiptdatafour" value="<?php echo $gate['receiptNoThree']; ?>" name="receiptdatafour" class="form-control" placeholder="Receipt No.">
		</div>
		</div>
		<div class="col-md-3">
		<div class="form-group">
<input type="text" id="amountfour" name="amountfour" class="form-control" placeholder="Amount" value="<?php echo $gate['receiptAmtFour']; ?>"  readonly=""  style="color: black; font-size: 16px; font-weight: 800;">
		</div>
		</div>
		
		<div class="col-md-3">
		<div class="form-group">
		
<p id="receiptdetailfour" style="display: none; border: 1px; border-style: solid; color: #ff0080; text-align: center;"> 

		<span style="color:black; font-weight: 700;">Customer Name :-</span> <span id="cusNamefour"></span> <br>
		<span style="color:black; font-weight: 700;">Mobile :-</span> <span id="mobilefour"></span> <br>
		<span style="color:black; font-weight: 700;">Date :-</span> <span id="datefour"></span>

		</p>	
		</div>
		</div>

		<div class="col-md-3">
		<div class="form-group">
		<input type="button" id="getreceiptfour" class="btn btn-info" value="View" placeholder=".col-md-5">

		</div>
		</div>
		</div>
		</div>


				<!-- Start Fee Details -->
		<script type="text/javascript">
		$(document).ready(function(){
		$('#getreceiptfour').on('click',function(){
		var receiptdatafour = $('#receiptdatafour').val();
		
		var receiptdatathree = $('#receiptdatathree').val();
		
				var receiptdatatwo = $('#receiptdatatwo').val();
		
		var receiptdata = $('#receiptdata').val();
		

		var receiptdatafive  = $('#receiptdatafive').val();

		var receiptdatasix  = $('#receiptdatasix').val();

		var receiptdataseven  = $('#receiptdataseven').val();

		var receiptdataeight  = $('#receiptdataeight').val();

		var receiptdatanine  = $('#receiptdatanine').val();
		$.ajax({
		type:'POST',
		url:'get-receipt-amount.php',
		dataType: "json",
		data:{receiptdatafour:receiptdatafour},
		success:function(data){
		if(receiptdatafour == receiptdatathree){
		alert("Receipt Cannot Be Same !!!");
		$( "#receiptdatathree" ).val('');

		$( "#amountthree" ).val('');
		$( "#cusNamethree" ).empty('');
		$( "#mobilethree" ).empty('');
		$( "#datethree" ).empty('');	
		$( "#receiptdetailthree" ).hide();

		}else if(receiptdatafour == receiptdatatwo){
		alert("Receipt Cannot Be Same !!!");
		$( "#receiptdatatwo" ).val('');

		$( "#amounttwo" ).val('');
		$( "#cusNametwo" ).empty('');
		$( "#mobiletwo" ).empty('');
		$( "#datetwo" ).empty('');	
		$( "#receiptdetailtwo" ).hide();

		}else if(receiptdatafour == receiptdata){
		alert("Receipt Cannot Be Same !!!");
		$( "#receiptdata" ).val('');

		$( "#amount" ).val('');
		$( "#cusName" ).empty('');
		$( "#mobile" ).empty('');
		$( "#date" ).empty('');	
		$( "#receiptdetailone" ).hide();

		} else if(receiptdatafour == receiptdatafive){
		alert("Receipt Cannot Be Same !!!");
		$( "#receiptdatafive" ).val('');

		$( "#amountfive" ).val('');
		$( "#cusNamefive" ).empty('');
		$( "#mobilefive" ).empty('');
		$( "#datefive" ).empty('');	
		$( "#receiptdetailfive" ).hide();

		} else if(receiptdatafour == receiptdatasix){
		alert("Receipt Cannot Be Same !!!");
		$( "#receiptdatasix" ).val('');

		$( "#amountsix" ).val('');
		$( "#cusNamesix" ).empty('');
		$( "#mobilesix" ).empty('');
		$( "#datesix" ).empty('');	
		$( "#receiptdetailsix" ).hide();

		} else if(receiptdatafour == receiptdataseven){
		alert("Receipt Cannot Be Same !!!");
		$( "#receiptdataseven" ).val('');

		$( "#amountseven" ).val('');
		$( "#cusNameseven" ).empty('');
		$( "#mobileseven" ).empty('');
		$( "#dateseven" ).empty('');	
		$( "#receiptdetailseven" ).hide();

		}  else if(receiptdatafour == receiptdataeight){
		alert("Receipt Cannot Be Same !!!");
		$( "#receiptdataeight" ).val('');

		$( "#amounteight" ).val('');
		$( "#cusNameeight" ).empty('');
		$( "#mobileeight" ).empty('');
		$( "#dateeight" ).empty('');	
		$( "#receiptdetaileight" ).hide();

		} else if(receiptdatafour == receiptdatanine){
		alert("Receipt Cannot Be Same !!!");
		$( "#receiptdatanine" ).val('');

		$( "#amountnine" ).val('');
		$( "#cusNamenine" ).empty('');
		$( "#mobilenine" ).empty('');
		$( "#datenine" ).empty('');	
		$( "#receiptdetailnine" ).hide();

		}   
		else if(data.status == 'ok'){
		$('#amountfour').val(data.result.amtPaid);
		$('#cusNamefour').text(data.result.cusName);
		$('#mobilefour').text(data.result.mobile);
		$('#datefour').text(data.result.date);
		$('#receiptdetailfour').show();
		}
		else{
		//$('.user-content').slideUp();
		alert("Receipt Not Exist");
		$( "#amountfour" ).val('');
		$( "#cusNamefour" ).empty();
		$( "#mobilefour" ).empty();
		$('#receiptdetailfour').hide();
		} 
		}
		});
		});
		});
		</script>
		<!-- End Fee Details -->
		<!-- Receipt Third End -->
<br>

					<?php if($gate['receiptOptFour'] == 1){
			?>	
			<script>
			$(document).ready(function () {
			$("#receiptoptionfourshow").hide();
			});
			</script>               
			<?php } else if($gate['receiptOptFour'] == 2) {?>
			<script>
			$(document).ready(function () {
			$("#receiptoptionfourshow").show();
			});
			</script>               
			<?php } ?>	
		<!-- Receipt Four STARTS-->
		<label id="font-color-label"> &nbsp;   Receipt Wise (Four) </label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<select id="receiptoptionfour" name="receiptoptionfour" class="btn btn-default btn-outline">
		<option value="1" <?php if($gate['receiptOptFour'] == '1') echo 'selected="selected"';?>> No </option>
		<option value="2" <?php if($gate['receiptOptFour'] == '2') echo 'selected="selected"';?>> Yes </option>
		</select>

		<div class="col-sm-12" id="receiptoptionfourshow" style="display: none;">
		<div class="row">
		<div class="col-md-3">
		<div class="form-group">
		<input type="text" id="receiptdatafive" name="receiptdatafive" class="form-control" value="<?php echo $gate['receiptNoFour']; ?>" placeholder="Receipt No.">
		</div>
		</div>
		<div class="col-md-3">
		<div class="form-group">
		<input type="text" id="amountfive" name="amountfive" class="form-control" placeholder="Amount" value="<?php echo $gate['receiptAmtFour']; ?>" readonly=""  style="color: black; font-size: 16px; font-weight: 800;">
		</div>
		</div>
		
		<div class="col-md-3">
		<div class="form-group">
		
	<p id="receiptdetailfive" style="display: none; border: 1px; border-style: solid; color: #ff0080; text-align: center;"> 

		<span style="color:black; font-weight: 700;">Customer Name :-</span> <span id="cusNamefive"></span> <br>
		<span style="color:black; font-weight: 700;">Mobile :-</span> <span id="mobilefive"></span> <br>
		<span style="color:black; font-weight: 700;">Date :-</span> <span id="datefive"></span>

		</p>	
		</div>
		</div>

		<div class="col-md-3">
		<div class="form-group">
		<input type="button" id="getreceiptfive" class="btn btn-info" value="View" placeholder=".col-md-5">

		</div>
		</div>
		</div>
		</div>

						<!-- Start Fee Details -->
		<script type="text/javascript">
		$(document).ready(function(){
		$('#getreceiptfive').on('click',function(){
		var receiptdatafive = $('#receiptdatafive').val();
		
		var receiptdatafour = $('#receiptdatafour').val();
		
		var receiptdatathree = $('#receiptdatathree').val();
		
				var receiptdatatwo = $('#receiptdatatwo').val();
		
		var receiptdata = $('#receiptdata').val();
		

		var receiptdatasix  = $('#receiptdatasix').val();

		var receiptdataseven  = $('#receiptdataseven').val();

		var receiptdataeight  = $('#receiptdataeight').val();

		var receiptdatanine  = $('#receiptdatanine').val();

		$.ajax({
		type:'POST',
		url:'get-receipt-amount.php',
		dataType: "json",
		data:{receiptdatafive:receiptdatafive},
		success:function(data){
		if(receiptdatafive == receiptdatafour){
		alert("Receipt Cannot Be Same !!!");
		$( "#receiptdatafour" ).val('');

		$( "#amountfour" ).val('');
		$( "#cusNamefour" ).empty('');
		$( "#mobilefour" ).empty('');
		$( "#datefour" ).empty('');	
		$( "#receiptdetailfour" ).hide();

		}else if(receiptdatafive == receiptdatathree){
		alert("Receipt Cannot Be Same !!!");
		$( "#receiptdatathree" ).val('');

		$( "#amountthree" ).val('');
		$( "#cusNamethree" ).empty('');
		$( "#mobilethree" ).empty('');
		$( "#datethree" ).empty('');	
		$( "#receiptdetailthree" ).hide();

		} else if(receiptdatafive == receiptdatatwo){
		alert("Receipt Cannot Be Same !!!");
		$( "#receiptdatatwo" ).val('');

		$( "#amounttwo" ).val('');
		$( "#cusNametwo" ).empty('');
		$( "#mobiletwo" ).empty('');
		$( "#datetwo" ).empty('');	
		$( "#receiptdetailtwo" ).hide();

		} else if(receiptdatafive == receiptdata){
		alert("Receipt Cannot Be Same !!!");
		$( "#receiptdata" ).val('');

		$( "#amount" ).val('');
		$( "#cusName" ).empty('');
		$( "#mobile" ).empty('');
		$( "#date" ).empty('');	
		$( "#receiptdetailone" ).hide();

		}  else if(receiptdatafive == receiptdatasix){
		alert("Receipt Cannot Be Same !!!");
		$( "#receiptdatasix" ).val('');

		$( "#amountsix" ).val('');
		$( "#cusNamesix" ).empty('');
		$( "#mobilesix" ).empty('');
		$( "#datesix" ).empty('');	
		$( "#receiptdetailsix" ).hide();

		}  else if(receiptdatafive == receiptdataseven){
		alert("Receipt Cannot Be Same !!!");
		$( "#receiptdataseven" ).val('');

		$( "#amountseven" ).val('');
		$( "#cusNameseven" ).empty('');
		$( "#mobileseven" ).empty('');
		$( "#dateseven" ).empty('');	
		$( "#receiptdetailseven" ).hide();

		} 
		  else if(receiptdatafive == receiptdataeight){
		alert("Receipt Cannot Be Same !!!");
		$( "#receiptdataeight" ).val('');

		$( "#amounteight" ).val('');
		$( "#cusNameeight" ).empty('');
		$( "#mobileeight" ).empty('');
		$( "#dateeight" ).empty('');	
		$( "#receiptdetaileight" ).hide();

		} 
		  else if(receiptdatafive == receiptdatanine){
		alert("Receipt Cannot Be Same !!!");
		$( "#receiptdatanine" ).val('');

		$( "#amountnine" ).val('');
		$( "#cusNamenine" ).empty('');
		$( "#mobilenine" ).empty('');
		$( "#datenine" ).empty('');	
		$( "#receiptdetailnine" ).hide();

		} 
		else if(data.status == 'ok'){
		$('#amountfive').val(data.result.amtPaid);
		$('#cusNamefive').text(data.result.cusName);
		$('#mobilefive').text(data.result.mobile);
		$('#datefive').text(data.result.date);
		$('#receiptdetailfive').show();
		}
		else{
		//$('.user-content').slideUp();
		alert("Receipt Not Exist");
		$( "#amountfive" ).val('');
		$( "#cusNamefive" ).empty();
		$( "#mobilefive" ).empty();
		$('#receiptdetailfive').hide();
		} 
		}
		});
		});
		});
		</script>
		<!-- End Fee Details -->
		<!-- Receipt Four End -->

		<br>

					<?php if($gate['receiptOptFive'] == 1){
			?>	
			<script>
			$(document).ready(function () {
			$("#receiptoptionfiveshow").hide();
			});
			</script>               
			<?php } else if($gate['receiptOptFive'] == 2) {?>
			<script>
			$(document).ready(function () {
			$("#receiptoptionfiveshow").show();
			});
			</script>               
			<?php } ?>	

		<!-- Receipt Five STARTS-->
		<label id="font-color-label"> &nbsp;   Receipt Wise (Five) </label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	&nbsp;&nbsp; 	
		<select id="receiptoptionfive" name="receiptoptionfive" class="btn btn-default btn-outline">
		<option value="1" <?php if($gate['receiptOptFive'] == '1') echo 'selected="selected"';?>> No </option>
		<option value="2" <?php if($gate['receiptOptFive'] == '2') echo 'selected="selected"';?>> Yes </option>
		</select>

		<div class="col-sm-12" id="receiptoptionfiveshow" style="display: none;">
		<div class="row">
		<div class="col-md-3">
		<div class="form-group">
		<input type="text" id="receiptdatasix" name="receiptdatasix" class="form-control" value="<?php echo $gate['receiptNoFive']; ?>" placeholder="Receipt No.">
		</div>
		</div>
		<div class="col-md-3">
		<div class="form-group">
		<input type="text" id="amountsix" name="amountsix" class="form-control" placeholder="Amount" value="<?php echo $gate['receiptAmtSix']; ?>"  readonly=""  style="color: black; font-size: 16px; font-weight: 800;">
		</div>
		</div>
		
		<div class="col-md-3">
		<div class="form-group">
		
<p id="receiptdetailsix" style="display: none; border: 1px; border-style: solid; color: #ff0080; text-align: center;"> 

		<span style="color:black; font-weight: 700;">Customer Name :-</span> <span id="cusNamesix"></span> <br>
		<span style="color:black; font-weight: 700;">Mobile :-</span> <span id="mobilesix"></span> <br>
		<span style="color:black; font-weight: 700;">Date :-</span> <span id="datesix"></span>

		</p>	
		</div>
		</div>

		<div class="col-md-3">
		<div class="form-group">
		<input type="button" id="getreceiptsix" class="btn btn-info" value="View" placeholder=".col-md-5">

		</div>
		</div>
		</div>
		</div>

								<!-- Start Fee Details -->
		<script type="text/javascript">
		$(document).ready(function(){
		$('#getreceiptsix').on('click',function(){
		var receiptdatasix = $('#receiptdatasix').val();
		
		var receiptdatafive = $('#receiptdatafive').val();
		
		var receiptdatafour = $('#receiptdatafour').val();
		
		var receiptdatathree = $('#receiptdatathree').val();
		
				var receiptdatatwo = $('#receiptdatatwo').val();
		
		var receiptdata = $('#receiptdata').val();

		var receiptdataseven  = $('#receiptdataseven').val();

		var receiptdataeight  = $('#receiptdataeight').val();

		var receiptdatanine  = $('#receiptdatanine').val();

		$.ajax({
		type:'POST',
		url:'get-receipt-amount.php',
		dataType: "json",
		data:{receiptdatasix:receiptdatasix},
		success:function(data){
		if(receiptdatasix == receiptdatafive){
		alert("Receipt Cannot Be Same !!!");
		$( "#receiptdatafive" ).val('');

		$( "#amountfive" ).val('');
		$( "#cusNamefive" ).empty('');
		$( "#mobilefive" ).empty('');
		$( "#datefive" ).empty('');	
		$( "#receiptdetailfive" ).hide();

		}else if(receiptdatasix == receiptdatafour){
		alert("Receipt Cannot Be Same !!!");
		$( "#receiptdatafour" ).val('');

		$( "#amountfour" ).val('');
		$( "#cusNamefour" ).empty('');
		$( "#mobilefour" ).empty('');
		$( "#datefour" ).empty('');	
		$( "#receiptdetailfour" ).hide();

		}else if(receiptdatasix == receiptdatathree){
		alert("Receipt Cannot Be Same !!!");
		$( "#receiptdatathree" ).val('');

		$( "#amountthree" ).val('');
		$( "#cusNamethree" ).empty('');
		$( "#mobilethree" ).empty('');
		$( "#datethree" ).empty('');	
		$( "#receiptdetailthree" ).hide();

		}else if(receiptdatasix == receiptdatatwo){
		alert("Receipt Cannot Be Same !!!");
		$( "#receiptdatatwo" ).val('');

		$( "#amounttwo" ).val('');
		$( "#cusNametwo" ).empty('');
		$( "#mobiletwo" ).empty('');
		$( "#datetwo" ).empty('');	
		$( "#receiptdetailtwo" ).hide();

		}else if(receiptdatasix == receiptdata){
		alert("Receipt Cannot Be Same !!!");
		$( "#receiptdata" ).val('');

		$( "#amount" ).val('');
		$( "#cusName" ).empty('');
		$( "#mobile" ).empty('');
		$( "#date" ).empty('');	
		$( "#receiptdetailone" ).hide();

		}else if(receiptdatasix == receiptdataseven){
		alert("Receipt Cannot Be Same !!!");
		$( "#receiptdataseven" ).val('');

		$( "#amountsix" ).val('');
		$( "#cusNamesix" ).empty('');
		$( "#mobilesix" ).empty('');
		$( "#datesix" ).empty('');	
		$( "#receiptdetailsix" ).hide();

		}else if(receiptdatasix == receiptdataeight){
		alert("Receipt Cannot Be Same !!!");
		$( "#receiptdataeight" ).val('');

		$( "#amounteight" ).val('');
		$( "#cusNameeight" ).empty('');
		$( "#mobileeight" ).empty('');
		$( "#dateeight" ).empty('');	
		$( "#receiptdetaileight" ).hide();

		}else if(receiptdatasix == receiptdatanine){
		alert("Receipt Cannot Be Same !!!");
		$( "#receiptdatanine" ).val('');

		$( "#amountnine" ).val('');
		$( "#cusNamenine" ).empty('');
		$( "#mobilenine" ).empty('');
		$( "#datenine" ).empty('');	
		$( "#receiptdetailnine" ).hide();

		}
		else if(data.status == 'ok'){
		$('#amountsix').val(data.result.amtPaid);
		$('#cusNamesix').text(data.result.cusName);
		$('#mobilesix').text(data.result.mobile);
		$('#datesix').text(data.result.date);
		$('#receiptdetailsix').show();
		}
		else{
		//$('.user-content').slideUp();
		alert("Receipt Not Exist");
		$( "#amountsix" ).val('');
		$( "#cusNamesix" ).empty();
		$( "#mobilesix" ).empty();
		$('#receiptdetailsix').hide();
		} 
		}
		});
		});
		});
		</script>
		<!-- End Fee Details -->
		<!-- Receipt Five End -->


		<br>

					<?php if($gate['receiptOptSix'] == 1){
			?>	
			<script>
			$(document).ready(function () {
			$("#receiptoptionsixshow").hide();
			});
			</script>               
			<?php } else if($gate['receiptOptSix'] == 2) {?>
			<script>
			$(document).ready(function () {
			$("#receiptoptionsixshow").show();
			});
			</script>               
			<?php } ?>	
		<!-- Receipt Six STARTS-->
		<label id="font-color-label"> &nbsp;   Receipt Wise (Six) </label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;		
		<select id="receiptoptionsix" name="receiptoptionsix" class="btn btn-default btn-outline">
		<option value="1" <?php if($gate['receiptOptSix'] == '1') echo 'selected="selected"';?>> No </option>
		<option value="2" <?php if($gate['receiptOptSix'] == '2') echo 'selected="selected"';?>> Yes </option>
		</select>

		<div class="col-sm-12" id="receiptoptionsixshow" style="display: none;">
		<div class="row">
		<div class="col-md-3">
		<div class="form-group">
		<input type="text" id="receiptdataseven" name="receiptdataseven" class="form-control" value="<?php echo $gate['receiptNoSix']; ?>" placeholder="Receipt No.">
		</div>
		</div>
		<div class="col-md-3">
		<div class="form-group">
		<input type="text" id="amountseven" name="amountseven" class="form-control" placeholder="Amount" value="<?php echo $gate['receiptAmtSix']; ?>" readonly=""  style="color: black; font-size: 16px; font-weight: 800;" >
		</div>
		</div>
		
		<div class="col-md-3">
		<div class="form-group">
		
<p id="receiptdetailseven" style="display: none; border: 1px; border-style: solid; color: #ff0080; text-align: center;"> 

		<span style="color:black; font-weight: 700;">Customer Name :-</span> <span id="cusNameseven"></span> <br>
		<span style="color:black; font-weight: 700;">Mobile :-</span> <span id="mobileseven"></span> <br>
		<span style="color:black; font-weight: 700;">Date :-</span> <span id="dateseven"></span>

		</p>	
		</div>
		</div>

		<div class="col-md-3">
		<div class="form-group">
		<input type="button" id="getreceiptseven" class="btn btn-info" value="View" placeholder=".col-md-5">

		</div>
		</div>
		</div>
		</div>

										<!-- Start Fee Details -->
		<script type="text/javascript">
		$(document).ready(function(){
		$('#getreceiptseven').on('click',function(){
		var receiptdataseven = $('#receiptdataseven').val();
		
		var receiptdatasix = $('#receiptdatasix').val();
		
		var receiptdatafive = $('#receiptdatafive').val();
		
		var receiptdatafour = $('#receiptdatafour').val();
		
		var receiptdatathree = $('#receiptdatathree').val();
		
		var receiptdatatwo = $('#receiptdatatwo').val();			
		
		var receiptdata = $('#receiptdata').val();

		var receiptdataeight  = $('#receiptdataeight').val();

		var receiptdatanine  = $('#receiptdatanine').val();

		$.ajax({
		type:'POST',
		url:'get-receipt-amount.php',
		dataType: "json",
		data:{receiptdataseven:receiptdataseven},
		success:function(data){
		if(receiptdataseven == receiptdatasix){
		alert("Receipt Cannot Be Same !!!");
		$( "#receiptdatasix" ).val('');

		$( "#amountsix" ).val('');
		$( "#cusNamesix" ).empty('');
		$( "#mobilesix" ).empty('');
		$( "#datesix" ).empty('');	
		$( "#receiptdetailsix" ).hide();

		}else if(receiptdataseven == receiptdatafive){
		alert("Receipt Cannot Be Same !!!");
		$( "#receiptdatafive" ).val('');

		$( "#amountfive" ).val('');
		$( "#cusNamefive" ).empty('');
		$( "#mobilefive" ).empty('');
		$( "#datefive" ).empty('');	
		$( "#receiptdetailfive" ).hide();

		}else if(receiptdataseven == receiptdatafour){
		alert("Receipt Cannot Be Same !!!");
		$( "#receiptdatafour" ).val('');

		$( "#amountfour" ).val('');
		$( "#cusNamefour" ).empty('');
		$( "#mobilefour" ).empty('');
		$( "#datefour" ).empty('');	
		$( "#receiptdetailfour" ).hide();

		}else if(receiptdataseven == receiptdatathree){
		alert("Receipt Cannot Be Same !!!");
		$( "#receiptdatathree" ).val('');

		$( "#amountthree" ).val('');
		$( "#cusNamethree" ).empty('');
		$( "#mobilethree" ).empty('');
		$( "#datethree" ).empty('');	
		$( "#receiptdetailthree" ).hide();

		}else if(receiptdataseven == receiptdata){
		alert("Receipt Cannot Be Same !!!");
		$( "#receiptdata" ).val('');

		$( "#amount" ).val('');
		$( "#cusName" ).empty('');
		$( "#mobile" ).empty('');
		$( "#date" ).empty('');	
		$( "#receiptdetailone" ).hide();

		}else if(receiptdataseven == receiptdataeight){
		alert("Receipt Cannot Be Same !!!");
		$( "#receiptdataeight" ).val('');

		$( "#amounteight" ).val('');
		$( "#cusNameeight" ).empty('');
		$( "#mobileeight" ).empty('');
		$( "#dateeight" ).empty('');	
		$( "#receiptdetaileight" ).hide();


		}else if(receiptdataseven == receiptdatanine){
		alert("Receipt Cannot Be Same !!!");
		$( "#receiptdatanine" ).val('');

		$( "#amountnine" ).val('');
		$( "#cusNamenine" ).empty('');
		$( "#mobilenine" ).empty('');
		$( "#datenine" ).empty('');	
		$( "#receiptdetailnine" ).hide();


		}else if(receiptdataseven == receiptdatatwo){
		alert("Receipt Cannot Be Same !!!");
		$( "#receiptdatatwo" ).val('');

		$( "#amounttwo" ).val('');
		$( "#cusNametwo" ).empty('');
		$( "#mobiletwo" ).empty('');
		$( "#datetwo" ).empty('');	
		$( "#receiptdetailtwo" ).hide();

		}  
		else if(data.status == 'ok'){
		$('#amountseven').val(data.result.amtPaid);
		$('#cusNameseven').text(data.result.cusName);
		$('#mobileseven').text(data.result.mobile);
		$('#dateseven').text(data.result.date);
		$('#receiptdetailseven').show();
		}
		else{
		//$('.user-content').slideUp();
		alert("Receipt Not Exist");
		$( "#amountseven" ).val('');
		$( "#cusNameseven" ).empty();
		$( "#mobileseven" ).empty();
		$('#receiptdetailseven').hide();
		} 
		}
		});
		});
		});
		</script>
		<!-- End Fee Details -->

		<!-- Receipt Six End -->


				<br>

								<?php if($gate['receiptOptSeven'] == 1){
			?>	
			<script>
			$(document).ready(function () {
			$("#receiptoptionsevenshow").hide();
			});
			</script>               
			<?php } else if($gate['receiptOptSeven'] == 2) {?>
			<script>
			$(document).ready(function () {
			$("#receiptoptionsevenshow").show();
			});
			</script>               
			<?php } ?>	

		<!-- Receipt Seven STARTS-->
		<label id="font-color-label"> &nbsp;   Receipt Wise (Seven) </label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;		
		<select id="receiptoptionseven" name="receiptoptionseven" class="btn btn-default btn-outline">
		<option value="1" <?php if($gate['receiptOptSeven'] == '1') echo 'selected="selected"';?>> No </option>
		<option value="2" <?php if($gate['receiptOptSeven'] == '2') echo 'selected="selected"';?>> Yes </option>
		</select>

		<div class="col-sm-12" id="receiptoptionsevenshow" style="display: none;">
		<div class="row">
		<div class="col-md-3">
		<div class="form-group">
		<input type="text" id="receiptdataeight" name="receiptdataeight" class="form-control" value="<?php echo $gate['receiptNoSeven']; ?>" placeholder="Receipt No.">
		</div>
		</div>
		<div class="col-md-3">
		<div class="form-group">
		<input type="text" id="amounteight" name="amounteight" class="form-control" placeholder="Amount" value="<?php echo $gate['receiptAmtSeven']; ?>"  readonly=""  style="color: black; font-size: 16px; font-weight: 800;">
		</div>
		</div>
		
		<div class="col-md-3">
		<div class="form-group">
		
<p id="receiptdetaileight" style="display: none; border: 1px; border-style: solid; color: #ff0080; text-align: center;"> 

		<span style="color:black; font-weight: 700;">Customer Name :-</span> <span id="cusNameeight"></span> <br>
		<span style="color:black; font-weight: 700;">Mobile :-</span> <span id="mobileeight"></span> <br>
		<span style="color:black; font-weight: 700;">Date :-</span> <span id="dateeight"></span>

		</p>	
		</div>
		</div>

		<div class="col-md-3">
		<div class="form-group">
		<input type="button" id="getreceipteight" class="btn btn-info" value="View" placeholder=".col-md-5">

		</div>
		</div>
		</div>
		</div>

												<!-- Start Fee Details -->
		<script type="text/javascript">
		$(document).ready(function(){
		$('#getreceipteight').on('click',function(){
		var receiptdataeight = $('#receiptdataeight').val();
		
		var receiptdataseven = $('#receiptdataseven').val();
		
		var receiptdatasix = $('#receiptdatasix').val();
		
		var receiptdatafive = $('#receiptdatafive').val();
		
		var receiptdatafour = $('#receiptdatafour').val();
		
		var receiptdatathree = $('#receiptdatathree').val();
		
		var receiptdatatwo = $('#receiptdatatwo').val();			
		
		var receiptdata = $('#receiptdata').val();


		var receiptdatanine  = $('#receiptdatanine').val();

		$.ajax({
		type:'POST',
		url:'get-receipt-amount.php',
		dataType: "json",
		data:{receiptdataeight:receiptdataeight},
		success:function(data){
		if(receiptdataeight == receiptdataseven){
		alert("Receipt Cannot Be Same !!!");
		$( "#receiptdataseven" ).val('');

		$( "#amountseven" ).val('');
		$( "#cusNameseven" ).empty('');
		$( "#mobileseven" ).empty('');
		$( "#dateseven" ).empty('');	
		$( "#receiptdetailseven" ).hide();

		}else if(receiptdataeight == receiptdatasix){
		alert("Receipt Cannot Be Same !!!");
		$( "#receiptdatasix" ).val('');

		$( "#amountsix" ).val('');
		$( "#cusNamesix" ).empty('');
		$( "#mobilesix" ).empty('');
		$( "#datesix" ).empty('');	
		$( "#receiptdetailsix" ).hide();

		}else if(receiptdataeight == receiptdatafive){
		alert("Receipt Cannot Be Same !!!");
		$( "#receiptdatafive" ).val('');

		$( "#amountfive" ).val('');
		$( "#cusNamefive" ).empty('');
		$( "#mobilefive" ).empty('');
		$( "#datefive" ).empty('');	
		$( "#receiptdetailfive" ).hide();

		}else if(receiptdataeight == receiptdatafour){
		alert("Receipt Cannot Be Same !!!");
		$( "#receiptdatafour" ).val('');

		$( "#amountfour" ).val('');
		$( "#cusNamefour" ).empty('');
		$( "#mobilefour" ).empty('');
		$( "#datefour" ).empty('');	
		$( "#receiptdetailfour" ).hide();

		}else if(receiptdataeight == receiptdatathree){
		alert("Receipt Cannot Be Same !!!");
		$( "#receiptdatathree" ).val('');

		$( "#amountthree" ).val('');
		$( "#cusNamethree" ).empty('');
		$( "#mobilethree" ).empty('');
		$( "#datethree" ).empty('');	
		$( "#receiptdetailthree" ).hide();

		}else if(receiptdataeight == receiptdatatwo){
		alert("Receipt Cannot Be Same !!!");
		$( "#receiptdatatwo" ).val('');

		$( "#amounttwo" ).val('');
		$( "#cusNametwo" ).empty('');
		$( "#mobiletwo" ).empty('');
		$( "#datetwo" ).empty('');	
		$( "#receiptdetailtwo" ).hide();

		}else if(receiptdataeight == receiptdata){
		alert("Receipt Cannot Be Same !!!");
		$( "#receiptdata" ).val('');

		$( "#amount" ).val('');
		$( "#cusName" ).empty('');
		$( "#mobile" ).empty('');
		$( "#date" ).empty('');	
		$( "#receiptdetailone" ).hide();

		}
		else if(receiptdataeight == receiptdatanine){
		alert("Receipt Cannot Be Same !!!");
		$( "#receiptdatanine" ).val('');

		$( "#amountnine" ).val('');
		$( "#cusNamenine" ).empty('');
		$( "#mobilenine" ).empty('');
		$( "#datenine" ).empty('');	
		$( "#receiptdetailnine" ).hide();

		} 
		else if(data.status == 'ok'){
		$('#amounteight').val(data.result.amtPaid);
		$('#cusNameeight').text(data.result.cusName);
		$('#mobileeight').text(data.result.mobile);
		$('#dateeight').text(data.result.date);
		$('#receiptdetaileight').show();
		}
		else{
		//$('.user-content').slideUp();
		alert("Receipt Not Exist");
		$( "#amounteight" ).val('');
		$( "#cusNameeight" ).empty();
		$( "#mobileeight" ).empty();
		$('#receiptdetaileight').hide();
		} 
		}
		});
		});
		});
		</script>
		<!-- End Fee Details -->
		<!-- Receipt Seven End -->

						<br>
									<?php if($gate['receiptOptEight'] == 1){
			?>	
			<script>
			$(document).ready(function () {
			$("#receiptoptioneightshow").hide();
			});
			</script>               
			<?php } else if($gate['receiptOptEight'] == 2) {?>
			<script>
			$(document).ready(function () {
			$("#receiptoptioneightshow").show();
			});
			</script>               
			<?php } ?>	

		<!-- Receipt Eight STARTS-->
		<label id="font-color-label"> &nbsp;   Receipt Wise (Eight) </label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;		
		<select id="receiptoptioneight" name="receiptoptioneight" class="btn btn-default btn-outline">
		<option value="1" <?php if($gate['receiptOptEight'] == '1') echo 'selected="selected"';?>> No </option>
		<option value="2" <?php if($gate['receiptOptEight'] == '2') echo 'selected="selected"';?>> Yes </option>
		</select>

		<div class="col-sm-12" id="receiptoptioneightshow" style="display: none;">
		<div class="row">
		<div class="col-md-3">
		<div class="form-group">
		<input type="text" id="receiptdatanine" name="receiptdatanine" class="form-control" value="<?php echo $gate['receiptNoEight']; ?>" placeholder="Receipt No.">
		</div>
		</div>
		<div class="col-md-3">
		<div class="form-group">
		<input type="text" id="amountnine" name="amountnine" class="form-control" placeholder="Amount" value="<?php echo $gate['receiptAmtEight']; ?>" readonly=""  style="color: black; font-size: 16px; font-weight: 800;">
		</div>
		</div>
		
		<div class="col-md-3">
		<div class="form-group">
		
<p id="receiptdetailnine" style="display: none; border: 1px; border-style: solid; color: #ff0080; text-align: center;"> 

		<span style="color:black; font-weight: 700;">Customer Name :-</span> <span id="cusNamenine"></span> <br>
		<span style="color:black; font-weight: 700;">Mobile :-</span> <span id="mobilenine"></span> <br>
		<span style="color:black; font-weight: 700;">Date :-</span> <span id="datenine"></span>

		</p>	
		</div>
		</div>

		<div class="col-md-3">
		<div class="form-group">
		<input type="button" id="getreceiptnine" class="btn btn-info" value="View" placeholder=".col-md-5">

		</div>
		</div>
		</div>
		</div>

														<!-- Start Fee Details -->
		<script type="text/javascript">
		$(document).ready(function(){
		$('#getreceiptnine').on('click',function(){
		var receiptdatanine = $('#receiptdatanine').val();
		
		var receiptdataeight = $('#receiptdataeight').val();
		
		var receiptdataseven = $('#receiptdataseven').val();
		
		var receiptdatasix = $('#receiptdatasix').val();
		
		var receiptdatafive = $('#receiptdatafive').val();
		
		var receiptdatafour = $('#receiptdatafour').val();
		
		var receiptdatathree = $('#receiptdatathree').val();
		
		var receiptdatatwo = $('#receiptdatatwo').val();			
		
		var receiptdata = $('#receiptdata').val();

		$.ajax({
		type:'POST',
		url:'get-receipt-amount.php',
		dataType: "json",
		data:{receiptdatanine:receiptdatanine},
		success:function(data){
		if(receiptdatanine == receiptdataeight){
		alert("Receipt Cannot Be Same !!!");
		$( "#receiptdataeight" ).val('');

		$( "#amounteight" ).val('');
		$( "#cusNameeight" ).empty('');
		$( "#mobileeight" ).empty('');
		$( "#dateeight" ).empty('');	
		$( "#receiptdetaileight" ).hide();

		}else if(receiptdatanine == receiptdataseven){
		alert("Receipt Cannot Be Same !!!");
		$( "#receiptdataseven" ).val('');

		$( "#amountseven" ).val('');
		$( "#cusNameseven" ).empty('');
		$( "#mobileseven" ).empty('');
		$( "#dateseven" ).empty('');	
		$( "#receiptdetailseven" ).hide();

		}else if(receiptdatanine == receiptdatasix){
		alert("Receipt Cannot Be Same !!!");
		$( "#receiptdatasix" ).val('');

		$( "#amountsix" ).val('');
		$( "#cusNamesix" ).empty('');
		$( "#mobilesix" ).empty('');
		$( "#datesix" ).empty('');	
		$( "#receiptdetailsix" ).hide();

		}else if(receiptdatanine == receiptdatafive){
		alert("Receipt Cannot Be Same !!!");
		$( "#receiptdatafive" ).val('');

		$( "#amountfive" ).val('');
		$( "#cusNamefive" ).empty('');
		$( "#mobilefive" ).empty('');
		$( "#datefive" ).empty('');	
		$( "#receiptdetailfive" ).hide();

		}else if(receiptdatanine == receiptdatafour){
		alert("Receipt Cannot Be Same !!!");
		$( "#receiptdatafour" ).val('');

		$( "#amountfour" ).val('');
		$( "#cusNamefour" ).empty('');
		$( "#mobilefour" ).empty('');
		$( "#datefour" ).empty('');	
		$( "#receiptdetailfour" ).hide();

		}else if(receiptdatanine == receiptdatathree){
		alert("Receipt Cannot Be Same !!!");
		$( "#receiptdatathree" ).val('');

		$( "#amountthree" ).val('');
		$( "#cusNamethree" ).empty('');
		$( "#mobilethree" ).empty('');
		$( "#datethree" ).empty('');	
		$( "#receiptdetailthree" ).hide();

		}else if(receiptdatanine == receiptdatatwo){
		alert("Receipt Cannot Be Same !!!");
		$( "#receiptdatatwo" ).val('');

		$( "#amounttwo" ).val('');
		$( "#cusNametwo" ).empty('');
		$( "#mobiletwo" ).empty('');
		$( "#datetwo" ).empty('');	
		$( "#receiptdetailtwo" ).hide();

		}else if(receiptdatanine == receiptdata){
		alert("Receipt Cannot Be Same !!!");
		$( "#receiptdata" ).val('');

		$( "#amount" ).val('');
		$( "#cusName" ).empty('');
		$( "#mobile" ).empty('');
		$( "#date" ).empty('');	
		$( "#receiptdetailone" ).hide();

		} 
		else if(data.status == 'ok'){
		$('#amountnine').val(data.result.amtPaid);
		$('#cusNamenine').text(data.result.cusName);
		$('#mobilenine').text(data.result.mobile);
		$('#datenine').text(data.result.date);
		$('#receiptdetailnine').show();
		}
		else{
		//$('.user-content').slideUp();
		alert("Receipt Not Exist");
		$( "#amountnine" ).val('');
		$( "#cusNamenine" ).empty();
		$( "#mobilenine" ).empty();
		$('#receiptdetailnine').hide();
		} 
		}
		});
		});
		});
		</script>
		<!-- End Fee Details -->
		<!-- Receipt Eight End -->

		<script type="text/javascript">
			
				
		$(document).ready(function(){
		$('#receiptoptionone').on('change', function() {
		if ( this.value == '2')
		{
		$("#receiptoptiononeshow").show();
		}
		else if (this.value == '1')
		{
		$("#receiptoptiononeshow").hide();
		}
		});

		// Receipt Two ...
		$('#receiptoptiontwo').on('change', function() {
		if ( this.value == '2')
		{
		$("#receiptoptiontwoshow").show();
		}
		else if (this.value == '1')
		{
		$("#receiptoptiontwoshow").hide();
		}
		});


		// Receipt Third
		$('#receiptoptionthree').on('change', function() {
		if ( this.value == '2')
		{
		$("#receiptoptionthreeshow").show();
		}
		else if (this.value == '1')
		{
		$("#receiptoptionthreeshow").hide();
		}
		});

		// Receipt Four
		$('#receiptoptionfour').on('change', function() {
		if ( this.value == '2')
		{
		$("#receiptoptionfourshow").show();
		}
		else if (this.value == '1')
		{
		$("#receiptoptionfourshow").hide();
		}
		});

		// Receipt Five
		$('#receiptoptionfive').on('change', function() {
		if ( this.value == '2')
		{
		$("#receiptoptionfiveshow").show();
		}
		else if (this.value == '1')
		{
		$("#receiptoptionfiveshow").hide();
		}
		});

		// Receipt Six
		$('#receiptoptionsix').on('change', function() {
		if ( this.value == '2')
		{
		$("#receiptoptionsixshow").show();
		}
		else if (this.value == '1')
		{
		$("#receiptoptionsixshow").hide();
		}
		});

		// Receipt Seven
		$('#receiptoptionseven').on('change', function() {
		if ( this.value == '2')
		{
		$("#receiptoptionsevenshow").show();
		}
		else if (this.value == '1')
		{
		$("#receiptoptionsevenshow").hide();
		}
		});

		// Receipt Eight
		$('#receiptoptioneight').on('change', function() {
		if ( this.value == '2')
		{
		$("#receiptoptioneightshow").show();
		}
		else if (this.value == '1')
		{
		$("#receiptoptioneightshow").hide();
		}
		});

		});

		</script>

		</div>	

		<script type="text/javascript">
		
		$(document).ready(function(){
		$('#getamt').on('click',function(){
		var receipt = $('#receipt').val();
		$.ajax({
		type: 'POST',
		url : 'get-receipt.php',
		dataType : "json",
		success:function(data){
		if(data.success == 'ok'){
		$('#receiptamt').val(data.result.amtPaid);	
		}else{
		alert('Sorry Receipt Not Found');
		}
		}	
		});
		});
		});

		</script>

			

		<div class="form-group">
		<label id="font-color-label"> Remark </label>
		
		<textarea name="remark" id="cceditor2" rows="4" cols="50">
			<?php echo $gate['remark'];?>
		</textarea>
		<br>
		<p class="error" style="color: red;"></p>
		</div>


			<div class="form-group">
		<label id="font-color-label"> Service Book No. </label>
		
		<input name="serviceBook" onkeypress="return ServiceBook(event)" type="text" class="form-control" value="<?php echo $gate['serviceBook'];?>"  autocomplete="off" style="font-weight: 900; color: crimson;">
		</div>	
<script type="text/javascript">
function ServiceBook(evt){
var charCode = (evt.which) ? evt.which : evt.keyCode
if (charCode > 31 && (charCode < 48 || charCode > 57))
return false;
return true;
}
</script>
		<div class="form-group">
		<label id="font-color-label"> Delivery (km....) </label>
		
		<input name="deliveryKm" onkeypress="return Deliverykm(event)" type="text" class="form-control" autocomplete="off" style="font-weight: 900; color: crimson;" value="<?php echo $gate['deliveryKm'];?>">
		</div>	
		<script type="text/javascript">
		function Deliverykm(evt){
		var charCode = (evt.which) ? evt.which : evt.keyCode
		if (charCode > 31 && (charCode < 48 || charCode > 57))
		return false;
		return true;
		}
		</script>
		</div>

		</div>
		</div>


		<div class="col-md-6">
		<div class="card stacked-form">

		<div class="card-body ">

		<div class="form-group">
			<label id="font-color-label">Cost</label>
			<input type="text" class="form-control" style="font-weight: 900; color: crimson;" value="<?php echo $gate['paymentReceivable'];?>" name="paymentReceivable" id="paymentReceivable" onkeypress="return CostNumeric(event)">
		</div>
		
		<script type="text/javascript">
		function CostNumeric(evt){
		var charCode = (evt.which) ? evt.which : evt.keyCode
		if (charCode > 31 && (charCode < 48 || charCode > 57))
		return false;
		return true;
		}
		</script>
			
		<div class="form-group">
			<label id="font-color-label">Identity Proof (ID Card)</label>
			<select id="idproofdocument" name="idproofdocument" class="form-control" >
				<option value="">Select</option>
				<option value="Voter Id Card" <?php if($gate['idProofCard'] == 'Voter Id Card') echo 'selected="selected"';?> >Voter Id Card</option>
				<option value="Adhar Card" <?php if($gate['idProofCard'] == 'Adhar Card') echo 'selected="selected"';?> >Adhar Card</option>
				<option value="PanCard" <?php if($gate['idProofCard'] == 'PanCard') echo 'selected="selected"';?> >PanCard</option>
				<option value="Driving Licence" <?php if($gate['idProofCard'] == 'Driving Licence') echo 'selected="selected"';?> >Driving Licence</option>
			</select>
		</div>


		<div class="form-group">
		<label id="font-color-label"> Upload ( ID Proof )</label> 
		<input id="idproofdoc" name="idproofdoc" type="file" placeholder="Enter Challan No" class="form-control" >
		<br>
		<img height="100" width="100" src="idproofdoc/<?php echo $gate['idProofdoc']; ?>">
		<br>
		</div>

		<div class="form-group">
		<label id="font-color-label"> Upload Invoice </label>
		
		<input id="" name="invoiceDoc" type="file" class="form-control" >
		<br>
		<img height="100" width="100" src="invoiceDoc/<?php echo $gate['invoiceDoc']; ?>">
		<br>
		</div>


		<div class="form-group">
		<label id="font-color-label"> Upload Insurance  </label>
	
		<input id="" name="insuranceDoc" type="file" class="form-control" >
			<br>
		<img height="100" width="100" src="insuranceDoc/<?php echo $gate['insuranceDoc']; ?>">
		<br>
		</div>

		<div class="form-group">
		<label id="font-color-label"> Upload RC  </label>
		
		<input id="" name="rcDoc" type="file" class="form-control" >
		<br>
		<img height="100" width="100" src="rcDoc/<?php echo $gate['rcDoc']; ?>">
		<br>
		</div>

		<!-- Apply Ckeditor Here Starts-->
		<script src="ckeditor/ckeditor.js"></script>
		<!-- Apply Ckeditor Here End-->

		<div class="form-group">
		<label id="font-color-label"> Address </label>
		<!--<input id="" name="shortItem" type="text" class="form-control">-->

		
		<textarea name="address" id="cceditor1" rows="4" cols="50" required>
		<?php echo $gate['address'];?>
		</textarea>
		</div>


		<div class="form-group">
		<label id="font-color-label"> Short Item </label>
		<!--<input id="" name="shortItem" type="text" class="form-control">-->

		
		<textarea name="shortItem" id="cceditor" rows="4" cols="50">
		<?php echo $gate['shortItem'];?>
		</textarea>
		</div>

		<div class="form-group">
		<label id="font-color-label">Sales Person</label>
		<select name="salesPerson" class="form-control" required>
		<option value="">Select</option>
		<?php 
		$sale = "SELECT * FROM salesman ORDER BY name DESC";
		$sales = mysqli_query($conn, $sale);
		While($sales_m = mysqli_fetch_array($sales)){
		?>
		<option value="<?php echo $sales_m["name"]; ?>" <?php if($gate['salesPerson'] == $sales_m["name"] ) echo 'selected="selected"';?> ><?php echo $sales_m["name"]; ?></option>
		<?php } ?>


		</select>
		</div>


		<div class="form-group">
		<label id="font-color-label">PD</label>
		<select name="pD" class="form-control" required>
		<option value="">Select</option>
		<?php 
		$sale = "SELECT * FROM pd ORDER BY name DESC";
		$sales = mysqli_query($conn, $sale);
		While($sales_m = mysqli_fetch_array($sales)){
		?>
		<option value="<?php echo $sales_m["name"]; ?>" <?php if($gate['pD'] == $sales_m["name"] ) echo 'selected="selected"';?> ><?php echo $sales_m["name"]; ?></option>
		<?php } ?>

		</select>
		</div>


		<div class="form-group">
		<label id="font-color-label">Additional ACCESSORIES Given To Customer </label>
		<!-- Edit Section Starts-->
		<select id="accessorie_update" name="accessorie_update">
		<option value="1"> No </option>
		<option value="2"> Yes </option>
		</select>
		<script type="text/javascript">
		$(document).ready(function(){
		$('#accessorie_update').on('change', function() {
		if ( this.value == '1')
		{
		$("#Accessories_Amount_Section").css("background-color","yellow");
		$("#Accessories_Amount_Section").css("color","red");
		$("#Accessories_Amount_Section").css('text-decoration','none');

		$("#Accessories_Amount_Section").css('border-radius','10px');
		$("#Accessories_Amount_Section").css('font-size','16px');
		$("#Accessories_Amount_Section").css('font-weight','600');		
		}
		else if (this.value == '2')
		{
		$("#Accessories_Amount_Section").css("background-color","red");
		$("#Accessories_Amount_Section").css("color","yellow");
		$("#Accessories_Amount_Section").css('text-decoration','line-through');

		$("#Accessories_Amount_Section").css('border-radius','10px');
		$("#Accessories_Amount_Section").css('font-size','16px');
		$("#Accessories_Amount_Section").css('font-weight','600');
		}
		});
		});
		</script>
		<br><br>

		<div class="container" id="Accessories_Amount_Section" style="background-color: yellow; border-radius:10px; font-size: 16px; font-weight:600; color: red;">
		<?php
		
		$acces = $gate['accessorie'];	
		$sub_acces = $gate['subAccessorie'];
		$acces_explode = explode(',', $acces);
		$sub_acces_explode = explode(',', $sub_acces);

		foreach($acces_explode as $acces_explode_name){
		
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
		<!-- Edit Section Ends-->



		</div>


		<!-- Start Add For Accessories -->
		<?php 
		include('conn_accessories.php');
		?>

		<script type="text/javascript">
			$(document).ready(function(){
				$('#accessorie_update').on('change', function() {
					if ( this.value == '1'){
						$("#addnewaccessorie").hide();
					}else if ( this.value == '2'){
						$("#addnewaccessorie").show();
					}
				});
				});
		</script>


		<div class="form-group" id="addnewaccessorie" style="display: none;">
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

<input type="submit" class="btn btn-fill btn-info" name="add-gate-pass" id="addgatepass1" value="Update" >

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