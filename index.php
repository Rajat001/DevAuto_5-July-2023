<?php 
session_start();

if(!isset($_SESSION['name'])){
echo "<script> window.open('login.php', '_self')</script>";
}else{

require_once('header/header.php');
?>
<div class="content">
<div class="container-fluid">
<div class="row">
<div class="col-lg-3 col-sm-6">
<div class="card card-stats">
<div class="card-body ">
<div class="row">
<div class="col-5">
<div class="icon-big text-center icon-warning">
<i class="nc-icon nc-chart text-warning"></i>
</div>
</div>
<div class="col-7">
<div class="numbers">
<p class="card-category">Total Stocks</p>
<h4 class="card-title">

<?php 
$s = "SELECT COUNT(*) AS totalStock FROM stockmgmt";
$st = mysqli_query($conn , $s);
$sto = mysqli_fetch_array($st);
echo $sto['totalStock'];
?>


</h4>
</div>
</div>
</div>
</div>
<div class="card-footer ">
<hr>
<div class="stats">

<?php 
$uso = "SELECT COUNT(*) AS totalStockUnSold FROM stockmgmt WHERE `status` = '0'";
$usol = mysqli_query($conn , $uso);
$usold = mysqli_fetch_array($usol);
?>


Total UnSold : <?php echo $usold['totalStockUnSold'];?>
<br>

<?php 
$so = "SELECT COUNT(*) AS totalStockSold FROM stockmgmt WHERE `status` = '1'";
$sol = mysqli_query($conn , $so);
$sold = mysqli_fetch_array($sol);

?>
Total Sold :  <?php echo $sold['totalStockSold'];?>

</div>
</div>
</div>
</div>
<div class="col-lg-3 col-sm-6">
<div class="card card-stats">
<div class="card-body ">
<div class="row">
<div class="col-5">
<div class="icon-big text-center icon-warning">
<i class="nc-icon nc-light-3 text-success"></i>
</div>
</div>
<div class="col-7">
<div class="numbers">
<p class="card-category">Total Cash Receipt </p>
<h4 class="card-title">
	<?php 
$r = "SELECT COUNT(*) AS totalReceipt FROM receiptmgmt";
$re = mysqli_query($conn , $r);
$rec = mysqli_fetch_array($re);
echo $rec['totalReceipt'];
?>

</h4>
</div>
</div>
</div>
</div>
<div class="card-footer ">
<hr>
<div class="stats">

</div>
</div>
</div>
</div>
<div class="col-lg-3 col-sm-6">
<div class="card card-stats">
<div class="card-body ">
<div class="row">
<div class="col-5">
<div class="icon-big text-center icon-warning">
<i class="nc-icon nc-vector text-danger"></i>
</div>
</div>
<div class="col-7">
<div class="numbers">
<p class="card-category">Total Employee</p>
<h4 class="card-title">	
	<?php 
$s = "SELECT COUNT(*) AS totalSales FROM salesman";
$sa = mysqli_query($conn , $s);
$sal = mysqli_fetch_array($sa);
echo $sal['totalSales'];
?></h4>
</div>
</div>
</div>
</div>
<div class="card-footer ">
<hr>
<div class="stats">

</div>
</div>
</div>
</div>
<div class="col-lg-3 col-sm-6">
<div class="card card-stats">
<div class="card-body ">
<div class="row">
<div class="col-5">
<div class="icon-big text-center icon-warning">
<i class="nc-icon nc-favourite-28 text-primary"></i>
</div>
</div>
<div class="col-7">
<div class="numbers">
<p class="card-category">Total Gate Pass Generated</p>
<h4 class="card-title"><?php 
$g = "SELECT COUNT(*) AS totalGatePass FROM gatepassmgmt";
$ga = mysqli_query($conn , $g);
$gat = mysqli_fetch_array($ga);
echo $gat['totalGatePass'];
?></h4>
</div>
</div>
</div>
</div>
<div class="card-footer ">
<hr>
<div class="stats">

</div>
</div>
</div>
</div>
</div>

<div class="row">
<div class="col-md-4">
<div class="card ">
<div class="card-header ">
<h4 class="card-title">Email Statistics</h4>
<p class="card-category">Last Campaign Performance</p>
</div>
<div class="card-body ">
<div id=chartEmail class="ct-chart ct-perfect-fourth"></div>
</div>
<div class="card-footer ">
<div class="legend">
<i class="fa fa-circle text-info"></i> Open
<i class="fa fa-circle text-danger"></i> Bounce
<i class="fa fa-circle text-warning"></i> Unsubscribe
</div>
<hr>
<div class="stats">
<i class="fa fa-clock-o"></i> Campaign sent 2 days ago
</div>
</div>
</div>
</div>
<div class="col-md-8">
<div class="card ">
<div class="card-header ">
<h4 class="card-title">Users Behavior</h4>
<p class="card-category">24 Hours performance</p>
</div>
<div class="card-body ">
<div id=chartHours class="ct-chart"></div>
</div>
<div class="card-footer ">
<div class="legend">
<i class="fa fa-circle text-info"></i> Open
<i class="fa fa-circle text-danger"></i> Click
<i class="fa fa-circle text-warning"></i> Click Second Time
</div>
<hr>
<div class="stats">
<i class="fa fa-history"></i> Updated 3 minutes ago
</div>
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-md-6">
<div class="card ">
<div class="card-header ">
<h4 class="card-title">2017 Sales</h4>
<p class="card-category">All products including Taxes</p>
</div>
<div class="card-body ">
<div id="chartActivity" class="ct-chart"></div>
</div>
<div class="card-footer ">
<div class="legend">
<i class="fa fa-circle text-info"></i> Tesla Model S
<i class="fa fa-circle text-danger"></i> BMW 5 Series
</div>
<hr>
<div class="stats">
<i class="fa fa-check"></i> Data information certified
</div>
</div>
</div>
</div>
<div class="col-md-6">
<div class="card  card-tasks">
<div class="card-header ">
<h4 class="card-title">Tasks</h4>
<p class="card-category">Backend development</p>
</div>
<div class="card-body ">
<div class="table-full-width">
<table class="table">
<tbody>
<tr>
<td>
<div class="form-check">
<label class="form-check-label">
<input class="form-check-input" type="checkbox" value="">
<span class="form-check-sign"></span>
</label>
</div>
</td>
<td>Sign contract for "What are conference organizers afraid of?"</td>
<td class="td-actions text-right">
<button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-link">
<i class="fa fa-edit"></i>
</button>
<button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-link">
<i class="fa fa-times"></i>
</button>
</td>
</tr>
<tr>
<td>
<div class="form-check">
<label class="form-check-label">
<input class="form-check-input" type="checkbox" value="" checked>
<span class="form-check-sign"></span>
</label>
</div>
</td>
<td>Lines From Great Russian Literature? Or E-mails From My Boss?</td>
<td class="td-actions text-right">
<button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-link">
<i class="fa fa-edit"></i>
</button>
<button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-link">
<i class="fa fa-times"></i>
</button>
</td>
</tr>
<tr>
<td>
<div class="form-check">
<label class="form-check-label">
<input class="form-check-input" type="checkbox" value="" checked>
<span class="form-check-sign"></span>
</label>
</div>
</td>
<td>Flooded: One year later, assessing what was lost and what was found when a ravaging rain swept through metro Detroit
</td>
<td class="td-actions text-right">
<button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-link">
<i class="fa fa-edit"></i>
</button>
<button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-link">
<i class="fa fa-times"></i>
</button>
</td>
</tr>
<tr>
<td>
<div class="form-check">
<label class="form-check-label">
<input class="form-check-input" type="checkbox" checked>
<span class="form-check-sign"></span>
</label>
</div>
</td>
<td>Create 4 Invisible User Experiences you Never Knew About</td>
<td class="td-actions text-right">
<button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-link">
<i class="fa fa-edit"></i>
</button>
<button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-link">
<i class="fa fa-times"></i>
</button>
</td>
</tr>
<tr>
<td>
<div class="form-check">
<label class="form-check-label">
<input class="form-check-input" type="checkbox" value="">
<span class="form-check-sign"></span>
</label>
</div>
</td>
<td>Read "Following makes Medium better"</td>
<td class="td-actions text-right">
<button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-link">
<i class="fa fa-edit"></i>
</button>
<button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-link">
<i class="fa fa-times"></i>
</button>
</td>
</tr>
<tr>
<td>
<div class="form-check">
<label class="form-check-label">
<input class="form-check-input" type="checkbox" value="" checked>
<span class="form-check-sign"></span>
</label>
</div>
</td>
<td>Unfollow 5 enemies from twitter</td>
<td class="td-actions text-right">
<button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-link">
<i class="fa fa-edit"></i>
</button>
<button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-link">
<i class="fa fa-times"></i>
</button>
</td>
</tr>
</tbody>
</table>
</div>
</div>
<div class="card-footer ">
<hr>
<div class="stats">
<i class="now-ui-icons loader_refresh spin"></i> Updated 3 minutes ago
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<?php 
require_once('header/footer.php');
}
?>


