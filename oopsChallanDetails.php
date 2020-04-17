<?php
require_once("header/dbcontroller.php");
$db_handle = new DBController();
if(!empty($_POST["keyword"])) {
$query ="SELECT * FROM stockmgmt WHERE chasisNo like '" . $_POST["keyword"] . "%' ORDER BY chasisNo LIMIT 0,6";
$result = $db_handle->runQuery($query);
if(!empty($result)) {
?>
<ul id="country-list">
<?php
foreach($result as $country) {
?>


<li onClick="selectCountry('<?php echo $country["chasisNo"]; ?>');"><?php echo $country["chasisNo"]  ; ?></li>
<?php } ?>
</ul>
<?php }
else{
	
	echo "<li> No Records Found </li>";
}

} ?>