
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<form>
<label id="font-color-label">  Accessories </label>

<select class="form-control" id="accessorieId">  
<option value="">----Select----</option>		
<?php 
include 'header/conn.php';
$s = "SELECT * FROM accessories";
$se = mysqli_query($conn, $s);
While($sel = mysqli_fetch_array($se)){		?>

<option value="<?php echo $sel['id']; ?>"><?php echo $sel['name']; ?></option>
<?php } ?>

</select>

<br><br>

<div class="form-group">
<label id="font-color-label">Sub Accessories</label>		

<select class="form-control" id="subaccessorieId" disabled="disabled"> 
<option value=""> ---- Select ----</option>
</select>			
</div>
<br>

<label>Cost :- </label>

<select class="form-control" id="cost" disabled="disabled">
<option value=""> </option>
</select>			

</form>

		<script type="text/javascript">

		$(document).ready(function(){
		$(document).on('change','#accessorieId' , function(){
		var accessorieId = $(this).val();
		if(accessorieId != ""){
		$.ajax({
		url : "get-accesoriedata.php",
		type : "POST",
		data : {accessorieId : accessorieId},
		success:function(response){
		if(response != ''){

		$("#subaccessorieId").removeAttr('disabled','disabled').html(response);
		}
		}
		})
		}	
		}); 

		$(document).on('change','#subaccessorieId', function() {
		var subaccessorieId = $(this).val();
		if(subaccessorieId != "") {  
		$.ajax({
		url : "get-accesoriedata.php",
		type:'POST',
		data:{subaccessorieId:subaccessorieId},
		success:function(response) {
		if(response != '') {
		$("#cost").removeAttr('disabled','disabled').html(response);

		}
		}
		});
		} 
		});

		});

		</script>





