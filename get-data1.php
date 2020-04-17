<?php require_once('header/conn.php'); 

if (isset($_POST['continent_id'])) {
  
  $qry = "select * from makername where id='".mysqli_real_escape_string($conn,$_POST['continent_id'])."' order by id";
  $res = mysqli_query($conn, $qry);
  if(mysqli_num_rows($res) > 0) {
    echo '<option value="">------- Select 2 -------</option>';
    while($row = mysqli_fetch_object($res)) {
      echo '<option value="'.$row->id.'">'.$row->name.'</option>';
    }
  } else {
    echo '<option value="">No Record</option>';
  }

} else if(isset($_POST['country_id'])) {

  $qry = "select * from modelname where makerid=".mysqli_real_escape_string($conn,$_POST['country_id'])." order by id";
  $res = mysqli_query($conn, $qry);
  if(mysqli_num_rows($res) > 0) {
    echo '<option value="">------- Select -------</option>';
    while($row = mysqli_fetch_object($res)) {
      echo '<option value="'.$row->id.'">'.$row->name.'</option>';
    }
  } else {
    echo '<option value="">No Record</option>';
  }

} else if(isset($_POST['state_id'])) {

  $qry = "select * from cities where state_id=".mysqli_real_escape_string($conn,$_POST['state_id'])." order by city";
  $res = mysqli_query($conn, $qry);
  if(mysqli_num_rows($res) > 0) {
    echo '<option value="">------- Select -------</option>';
    while($row = mysqli_fetch_object($res)) {
      echo '<option value="'.$row->city_id.'">'.$row->city.'</option>';
    }
  } else {
    echo '<option value="">No Record</option>';
  }
}

?>