<?php	

require_once('header/conn.php');

if(!empty($_POST["modelmake"])) {

$modelmake = $_POST["modelmake"];
//$subject = trim(substr($subject1, 0, 1));
$query ="SELECT * FROM modelname WHERE makerid = '$modelmake'";
$query_s = mysqli_query($conn, $query);

//$results = $db_handle->runQuery($query);
?>

<?php
while($sub_cat_name = mysqli_fetch_array($query_s)){
?>
<option value="<?php echo $sub_cat_name["id"]; ?>"><?php echo $sub_cat_name["name"]; ?></option>
<?php
}
}

?>