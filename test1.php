<form>
	
	Case One :
		<select onchange="getmodel(this.value)">
		<option value=""> Select </option>	
		<?php 
		require_once('header/conn.php');
		$s = "SELECT * FROM dealername ORDER BY name DESC";
		$se = mysqli_query($conn, $s);
		While($sel = mysqli_fetch_array($se)){
		?>
		<!--<span style=""> <?php //echo $sel['id'];?></span> -->
		<option value="<?php echo $sel['makeId']; ?>"><?php echo $sel['name']; ?></option>
		
		<?php } ?>
		
		</select>

<br>

Case Two :	

<select id="make_name_here" onchange="getmake(this.value)">	
	<option>
		
	</option>
</select>
<br>
Case Three :	

<select id="model_name_here" >	
	<option>
		
	</option>
</select>
		<script>
		function getmodel(val) {
		$.ajax({
		type: "POST",
		url: "model-name1.php",
		data:'model='+val,
		success: function(data){
		$("#make_name_here").html(data);
		}
		});				
		}

		function getmake(val) {
		$.ajax({
		type: "POST",
		url: "model-make-name.php",
		data:'modelmake='+val,
		success: function(data){
		$("#model_name_here").html(data);
		}
		});				
		}
		</script>
</form>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>