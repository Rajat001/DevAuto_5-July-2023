<?php 
session_start();
if(!isset($_SESSION['name']) && !isset($_GET['id'])){
echo "<script> window.open('login.php', '_self')</script>";
}else{

$getId = $_GET['id'];
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
<h4 class="card-title">Edit User  </h4>
</div>
<div class="card-body ">

<?php 


$u = "SELECT * FROM `register` WHERE id = '".$getId."'";
$us = mysqli_query($conn , $u);
$use = mysqli_fetch_array($us);


if(isset($_POST['add'])){
	$name = mysqli_real_escape_string($conn, $_POST['name']);
	$role = mysqli_real_escape_string($conn, $_POST['role']);
	$status = mysqli_real_escape_string($conn, $_POST['status']);
	$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
	
	if(empty($name)){
	echo "<p id='errorone' style='text-align:center;
	background-color: red;
	border-radius: 6px;
	color: white;
	font-size: 22px; margin-left:288px;
	width: 380px;
	'>
	User Name Cannot Be Empty
	</p>";}

	else if(empty($role)){
		echo "<p id='errorone' style='text-align:center;
	background-color: red;
	border-radius: 6px;
	color: white;
	font-size: 22px; margin-left:288px;
	width: 380px;
	'>
	Role  Cannot Be Empty
	</p>";
	}

	else if(empty($status)){
		echo "<p id='errorone' style='text-align:center;
	background-color: red;
	border-radius: 6px;
	color: white;
	font-size: 22px; margin-left:288px;
	width: 380px;
	'>
	Status Cannot Be Empty
	</p>";
	}
	
		else if(empty($pwd)){
		echo "<p id='errorone' style='text-align:center;
	background-color: red;
	border-radius: 6px;
	color: white;
	font-size: 22px; margin-left:288px;
	width: 380px;
	'>
	Password Cannot Be Empty
	</p>";
	}
	else{

	$upd = "UPDATE 	`register` SET `name` = '$name' , `role` = '$role' , `status` = '$status' , `pwd`='$pwd' WHERE `id` = '".$getId."'";
	$Updated = mysqli_query($conn, $upd);
	if($Updated){
		echo "<script>  alert('Updated Successfully') </script>";
		echo "<script> window.open('edit-userdetails.php?id=$getId','_self')</script>";
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
<label class="col-sm-2 control-label"><b> User Name : </b></label>
<div class="col-sm-10">
<div class="form-group has-success">
<input type="text" name="name" value="<?php echo $use['name']; ?>" class="form-control" required="">
</div>
</div>
</div>


<div class="row">
<label class="col-sm-2 control-label"><b> Role : </b></label>
<div class="col-sm-5">

<div class="form-group has-success">
<select name="role" class="selectpicker" data-title="Select" data-style="btn-default btn-outline" data-menu-style="dropdown-blue" required="">

<option value=""> Select</option>
<option value="admin" <?php if($use['role'] == 'admin'){echo "'selected': selected"; }?> > Admin</option>
<option value="employee" <?php if($use['role'] == 'employee'){echo "'selected': selected"; }?> > Employee </option>
</select>
</div>
</div>
</div>

<div class="row">
<label class="col-sm-2 control-label"><b> Status : </b></label>
<div class="col-sm-5">

<div class="form-group has-success">
<select name="status" class="selectpicker" data-title="Select" data-style="btn-default btn-outline" data-menu-style="dropdown-blue" required="">

<option value=""> Select</option>
<option value="Not Active" <?php if($use['status'] == 'Not Active'){echo "'selected': selected"; }?>> Not Active</option>
<option value="Active" <?php if($use['status'] == 'Active'){echo "'selected': selected"; }?>> Active </option>
</select>
</div>
</div>
</div>

<div class="row">
<label class="col-sm-2 control-label"><b> Password : </b></label>
<div class="col-sm-10">
<div class="form-group has-success">
<input type="text" name="pwd" value="<?php echo $use['pwd']; ?>" class="form-control" required="">
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
<button type="submit" name="add" class="btn btn-fill btn-primary">Update</button>
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
<th width="5%"> Serial No.</th>
<th> User Name</th>
<th> Role </th>
<th> Status </th>
<th> Pwd </th>
<th> Edit </th>
</tr>
</thead>

<tbody>

<?php 

//$s = "select * FROM dealername";

$s = "SELECT * FROM `register`";
$se = mysqli_query($conn , $s);
$i=0;
while ($sel = mysqli_fetch_array($se)) {
	$i++;
?>


<tr>
<td><?php echo $i; ?></td>
<td><?php echo $sel['name']?></td>
<td><?php echo $sel['role']?></td>
<td><?php echo $sel['status']?></td>
<td><?php echo $sel['pwd']?></td>
<td><a href="edit-userdetails.php?id=<?php echo $sel['id']; ?>"><button class="btn btn-primary"> Edit </button></a></td>
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