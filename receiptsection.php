
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<form>
	<label> Amount Value</label>
	<input type="text" name="" id="receipt">
	<br>
	<br>
	<input type="text" name="" id="amtPaid">
	<br>
	<br>
	<input type="button" name="" id="getamt" value="Get Amount">
</form>


	<script>

	$(document).ready(function(){
	$('#getamt').on('click',function(){
	var receipt = $('#receipt').val();
	$.ajax({
	type:'POST',
	url:'get-receipt.php',
	dataType: "json",
	data:{receipt:receipt},
	success:function(data){
	if(data.status == 'ok'){
	$('#amtPaid').val(data.result.amtPaid);
	}else{
	alert("Not Found Data Sorry...");
	} 
	}
	});
	});
	});

	</script>


