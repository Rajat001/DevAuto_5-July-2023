<form>
	
	Case One :
		<select onchange="getmodel(this.value)">

		<?php 
		require_once('header/conn.php');
		$s = "SELECT * FROM makername ORDER BY name DESC";
		$se = mysqli_query($conn, $s);
		While($sel = mysqli_fetch_array($se)){
		?>

		<option value="<?php echo $sel['id']; ?>"><?php echo $sel['name']; ?></option>
		<?php } ?>
		</select>

<br>

Case Two :

<select id="model_name_here" >
	<option>
		
	</option>
</select>


		<script>
		function getmodel(val) {
		$.ajax({
		type: "POST",
		url: "model-name.php",
		data:'model='+val,
		success: function(data){
		$("#model_name_here").html(data);
		}
		});				
		}
		</script>
</form>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>