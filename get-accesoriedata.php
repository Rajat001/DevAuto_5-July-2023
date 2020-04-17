<?php
require_once('header/conn.php');

if (!empty(isset($_POST['accessorieId']))) {
  
  $qry = "select * from subAccessories where accessoriesId='".mysqli_real_escape_string($conn,$_POST['accessorieId'])."' order by id";
  $res = mysqli_query($conn, $qry);
  if(mysqli_num_rows($res) > 0) {
    echo '<option value="">------- Select -------</option>';
    while($row = mysqli_fetch_object($res)) {
      echo '<option value="'.$row->id.'">'.$row->name.'</option>';
    }
  } else {
    echo '<option value=""> No Record </option>';
  }

}else if(!empty(isset($_POST['subaccessorieId']))) {

  $qry = "select * from subAccessories where id=".mysqli_real_escape_string($conn,$_POST['subaccessorieId'])." order by id";
  $res = mysqli_query($conn, $qry);
  if(mysqli_num_rows($res) > 0) {
    
    while($row = mysqli_fetch_object($res)) {
      echo '<option value="'.$row->id.'">'.$row->cost.'</option>';
    }
  } else {
    echo '<option value=""> No Record </option>';
  }

}

?>