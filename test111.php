<?php 
require_once('header/conn.php');	
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

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

<br>
	<div class="form-group">
	<label id="font-color-label">Model Make</label>		

	<select class="form-control" id="modelmakenamesection" disabled="disabled">
	<option value=""> ---- Select ----</option>
	</select>			
	</div>
<br>
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





			<?php
require_once('header/conn.php');

if (isset($_POST['dealerNameIdd'])) {
  
  $qry = "select * from makername where id='".mysqli_real_escape_string($conn,$_POST['dealerNameIdd'])."' order by id";

  $res = mysqli_query($conn, $qry);
  
  if(mysqli_num_rows($res) > 0) {
    echo '<option value="">------- Select -------</option>';
    while($row = mysqli_fetch_object($res)) {
      echo '<option value="'.$row->id.'">'.$row->name.'</option>';
    }
  } else {
    echo '<option value=""> No Record </option>';
  }

}else if(isset($_POST['modelnamesection_id'])) {

  $qry = "select * from modelname where makerid=".mysqli_real_escape_string($conn,$_POST['modelnamesection_id'])." order by id";
  $res = mysqli_query($conn, $qry);
  if(mysqli_num_rows($res) > 0) {
    echo '<option value="">------- Select -------</option>';
    while($row = mysqli_fetch_object($res)) {
      echo '<option value="'.$row->id.'">'.$row->name.'</option>';
    }
  } else {
    echo '<option value=""> No Record </option>';
  }

}

?>