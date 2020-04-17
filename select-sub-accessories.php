<?php 

include "conn_accessories.php";

echo select_sub_accessories($conn_acc , $_POST['category_id']);

?>