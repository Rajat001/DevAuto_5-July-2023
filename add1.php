<?php 
require_once('header/conn.php');
?>

<div class="alert alert-success alert-dismissible" id="success" style="display:none;">
	  <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
</div> 

<div class="alert alert-success alert-dismissible" id="alert_message" style="display:none;">
	  <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
</div>

<form id="fupForm" >
	<label>Name</label>
	<input type="text" name="name" id="name">
<br>
	<label>city</label>
	<input type="text" name="city" id="city">

<br><br>
	<select id="selectdata">
		<option value="">select</option>

		<?php 

		$s = "SELECT * FROM dealername";
		$se = mysqli_query($conn, $s);
		while($sel = mysqli_fetch_array($se)){

		?>

		<option value="<?php echo $sel['id']; ?>"> <?php echo $sel['name']; ?> </option>

		<?php } ?>
		
	</select>
<br><br>

	<input type="button" name="" id="butsave" value="Add Data" >
</form>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>

	$(document).ready(function(){
		$("#butsave").click(function(){
			var name = $("#name").val();
			var city = $("#city").val();
			var selectdata = $("#selectdata").val();

			console.log("starting Ajax");
		if(name!="" && city!=""){
			$.ajax({
				url : "ajaxadd1.php",
				type : "POST",
				data : {
					name : name,
					city :city,
					selectdata: selectdata
				},

				success:function(data){

					$('#name').val('');
					$('#city').val('');
					alert("Data Added To Database");
					$("#success").show();
					$('#success').html('Data added successfully !');
					$("#success").delay(3000).fadeOut();
					
				}
			});
			}else{
				
				$("#alert_message").show();
				$("#alert_message").html("Please Fill All The Fields");
				$("#alert_message").delay(2000).fadeOut();
			}


		});
	});

</script>


