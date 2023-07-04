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