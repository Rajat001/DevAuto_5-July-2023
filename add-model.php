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

<div class="content">
<div class="container-fluid">
<div class="row">

<div class="col-md-12">
<div class="card ">
<div class="card-header ">
<h4 class="card-title">Add Model Name</h4>
</div>
<div class="card-body ">

<?php 

if(isset($_POST['add'])){
	$name = mysqli_real_escape_string($conn, $_POST['name']);
	
	$maker_id = mysqli_real_escape_string($conn, $_POST['maker_id']);
	if(empty($name)){
		
	}else{

	$a = "INSERT INTO modelname (`makerid`,`name`) VALUES ('$maker_id','$name')";
	$ad = mysqli_query($conn, $a);
	
	if($ad){
		echo "<script>  alert('Added Successfully') </script>";
		echo "<script> window.open('add-model.php','_self')</script>";
	}else{
		echo "<script>  alert('Not Added') </script>";
	}
	}
}
?>

<form method="POST" action="#" class="form-horizontal">
<div class="row">
</div>


<div class="row">
<label class="col-sm-2 control-label"><b> Make Name : </b></label>
<div class="col-sm-6">
<div class="form-group has-success">

<select name="maker_id" class="selectpicker" data-title="Select" data-style="btn-default btn-outline" data-menu-style="dropdown-blue">

<?php 
$s = "SELECT * FROM makername ORDER BY name DESC";
$se = mysqli_query($conn, $s);
While($sel = mysqli_fetch_array($se)){
?>

<option value="<?php echo $sel['id']; ?>"><?php echo $sel['name']; ?></option>
<?php } ?>

</select>

</div>
</div>
</div>


<div class="row">
<label class="col-sm-2 control-label"><b> Model Name : </b></label>
<div class="col-sm-6">
<div class="form-group has-success">
<input type="text" name="name" class="form-control" required>
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
<button type="submit" name="add" class="btn btn-fill btn-info">ADD</button>
</div>
</div>
<div class="col-md-4">

</div>
</div>


</div>


</div>
</form>
</div>
</div>

</div>
<div class="container">
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="background-color: white; ">
<thead>
<tr>
<th width="5%"> Sno.</th>
<th> Make Name</th>
<th> Model Name</th>
<th>Action</th>
</tr>
</thead>

<tbody>

<?php 



$s = "select * FROM makername";
$s = "SELECT `makername`.`name` AS `maker_names`, `modelname`.`name` AS `model_names` FROM `modelname` LEFT JOIN `makername` ON `makername`.`id` = `modelname`.`makerid`";
$se = mysqli_query($conn , $s);
$i=0;
while ($sel = mysqli_fetch_array($se)) {
	$i++;
?>


<tr>
<td><?php echo $i; ?></td>
<td><?php echo $sel['maker_names']?></td>
<td><?php echo $sel['model_names']?></td>
<td><button class="btn btn-primary btn-sm">Edit</button></td>
</tr>

<?php } ?>
</tbody>
</table>
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