<?php
	require_once('header/conn.php');
	$gatePassNo=mysqli_real_escape_string($conn, $_POST['gatePassNo']);
	$chasisNo=mysqli_real_escape_string($conn, $_POST['chasisNo']);
	$receiptdata=mysqli_real_escape_string($conn, $_POST['receiptdata']);	
	$amount =mysqli_real_escape_string($conn, $_POST['amount']); 


	$receiptoptionone=mysqli_real_escape_string($conn, $_POST['receiptoptionone']);
	$receiptdatatwo=mysqli_real_escape_string($conn, $_POST['receiptdatatwo']);	
	$amounttwo =mysqli_real_escape_string($conn, $_POST['amounttwo']); 

	$receiptoptiontwo=mysqli_real_escape_string($conn, $_POST['receiptoptiontwo']);
	$receiptdatathree=mysqli_real_escape_string($conn, $_POST['receiptdatathree']);	
	$amountthree =mysqli_real_escape_string($conn, $_POST['amountthree']); 

	$receiptoptionthree=mysqli_real_escape_string($conn, $_POST['receiptoptionthree']);
	$receiptdatafour=mysqli_real_escape_string($conn, $_POST['receiptdatafour']);	
	$amountfour =mysqli_real_escape_string($conn, $_POST['amountfour']); 

	$receiptoptionfour=mysqli_real_escape_string($conn, $_POST['receiptoptionfour']);
	$receiptdatafive=mysqli_real_escape_string($conn, $_POST['receiptdatafive']);	
	$amountfive =mysqli_real_escape_string($conn, $_POST['amountfive']); 


	$receiptoptionfive=mysqli_real_escape_string($conn, $_POST['receiptoptionfive']);
	$receiptdatasix=mysqli_real_escape_string($conn, $_POST['receiptdatasix']);	
	$amountsix =mysqli_real_escape_string($conn, $_POST['amountsix']); 

	$receiptoptionsix=mysqli_real_escape_string($conn, $_POST['receiptoptionsix']);
	$receiptdataseven=mysqli_real_escape_string($conn, $_POST['receiptdataseven']);	
	$amountseven =mysqli_real_escape_string($conn, $_POST['amountseven']); 

	$receiptoptionseven=mysqli_real_escape_string($conn, $_POST['receiptoptionseven']);
	$receiptdataeight=mysqli_real_escape_string($conn, $_POST['receiptdataeight']);	
	$amounteight =mysqli_real_escape_string($conn, $_POST['amounteight']); 

	$receiptoptioneight=mysqli_real_escape_string($conn, $_POST['receiptoptioneight']);
	$receiptdatanine=mysqli_real_escape_string($conn, $_POST['receiptdatanine']);	
	$amountnine =mysqli_real_escape_string($conn, $_POST['amountnine']);

	// $modelmakenamesection =mysqli_real_escape_string($conn, $_POST['modelmakenamesection']);
	// $modelnamesection =mysqli_real_escape_string($conn, $_POST['modelnamesection']);
	// $modelSubtype =mysqli_real_escape_string($conn, $_POST['modelSubtype']);
	// $modelColor =mysqli_real_escape_string($conn, $_POST['modelColor']);
	// $chasisNo =mysqli_real_escape_string($conn, $_POST['chasisNo']);
	// $engineNo =mysqli_real_escape_string($conn, $_POST['engineNo']);	
	// $stockLocation =mysqli_real_escape_string($conn, $_POST['stockLocation']);
	// $shortItem =mysqli_real_escape_string($conn, $_POST['shortItem']);
	// $anyDent =mysqli_real_escape_string($conn, $_POST['anyDent']);


	$sql2 = "INSERT INTO `gatepassmgmt`( `gatePassNo`,`chasisNo`,`receiptNo`,`receiptAmt`,`receiptNoOne`,`receiptAmtOne`,`receiptNoTwo`,`receiptAmtTwo`,`receiptNoThree`,`receiptAmtThree`,`receiptNoFour`,`receiptAmtFour`,`receiptNoFive`,`receiptAmtFive`,`receiptNoSix`,`receiptAmtSix`,`receiptNoSeven`,`receiptAmtSeven`,`receiptNoEight`,`receiptAmtEight`) 
	VALUES ('$gatePassNo','$chasisNo','$receiptdata','$amount','$receiptdatatwo','$amounttwo','$receiptdatathree','$amountthree','$receiptdatafour','$amountfour','$receiptdatafive','$amountfive','$receiptdatasix','$amountsix','$receiptdataseven','$amountseven','$receiptdataeight','$amounteight')";


	$sql3 = "INSERT INTO `gatepassmgmt`( `gatePassNo`,`chasisNo`,`receiptNo`,`receiptAmt`,`receiptNoOne`,`receiptAmtOne`,`receiptNoTwo`,`receiptAmtTwo`,`receiptNoThree`,`receiptAmtThree`,`receiptNoFour`,`receiptAmtFour`,`receiptNoFive`,`receiptAmtFive`,`receiptNoSix`,`receiptAmtSix`,`receiptNoSeven`,`receiptAmtSeven`,`receiptNoEight`,`receiptAmtEight`,`receiptOneOpt`,`receiptTwoOpt`,`receiptThreeOpt`,`receiptOptFour`,`receiptOptFive`,`receiptOptSix`,`receiptOptSeven`,`receiptOptEight`) 

	VALUES ('$gatePassNo','$chasisNo','$receiptdata','$amount','$receiptdatatwo','$amounttwo','$receiptdatathree','$amountthree','$receiptdatafour','$amountfour','$receiptdatafive','$amountfive','$receiptdatasix','$amountsix','$receiptdataseven','$amountseven','$receiptdataeight','$amounteight','$receiptdatanine','$amountnine','$receiptoptionone','$receiptoptiontwo','$receiptoptionthree','$receiptoptionfour','$receiptoptionfive','$receiptoptionsix','$receiptoptionseven','$receiptoptioneight')";

	$sql4 = "INSERT INTO `gatepassmgmt`( `gatePassNo`,`chasisNo`,`receiptNo`,`receiptAmt`,`receiptNoOne`,`receiptAmtOne`,`receiptNoTwo`,`receiptAmtTwo`,`receiptNoThree`,`receiptAmtThree`,`receiptNoFour`,`receiptAmtFour`,`receiptNoFive`,`receiptAmtFive`,`receiptNoSix`,`receiptAmtSix`,`receiptNoSeven`,`receiptAmtSeven`,`receiptNoEight`,`receiptAmtEight`,`receiptOptOne`,`receiptOptTwo`,`receiptOptThree`,`receiptOptFour`,`receiptOptFive`,`receiptOptSix`,`receiptOptSeven`,`receiptOptEight`)
	VALUES ('$gatePassNo','$chasisNo','$receiptdata','$amount','$receiptdatatwo','$amounttwo','$receiptdatathree','$amountthree','$receiptdatafour','$amountfour','$receiptdatafive','$amountfive','$receiptdatasix','$amountsix','$receiptdataseven','$amountseven','$receiptdataeight','$amounteight','$receiptdatanine','$amountnine','$receiptoptionone','$receiptoptiontwo','$receiptoptionthree','$receiptoptionfour','$receiptoptionfive','$receiptoptionsix','$receiptoptionseven','$receiptoptioneight')";


	if (mysqli_query($conn, $sql4)) {
		//echo json_encode(array("statusCode"=>200));
		
	} 
	else {
		//echo json_encode(array("statusCode"=>201));
		echo "Contact to Server Provider ";
	}
	//mysqli_close($conn);
?>