<?php
if(!empty($_POST['receiptdata'])){
    $data = array();
    
    
    require_once('header/conn.php');

    //get user data from the database
    //$query = $conn->query("SELECT * FROM receiptmgmt WHERE receiptNo = {$_POST['receiptdata']}");


    $s = "SELECT * FROM receiptmgmt WHERE receiptNo = {$_POST['receiptdata']}";
    $query = mysqli_query($conn , $s);
    
    if($query->num_rows > 0){
        $userData = $query->fetch_assoc();
        $data['status'] = 'ok';
        $data['result'] = $userData;
    }else{
        $data['status'] = 'err';
        $data['result'] = '';
    }
    
    //returns data as JSON format
    echo json_encode($data);
}

else if(!empty($_POST['receiptdataone'])){
    $data = array();
    
    
    require_once('header/conn.php');

    //get user data from the database
    //$query = $conn->query("SELECT * FROM receiptmgmt WHERE receiptNo = {$_POST['receiptdata']}");


    $s = "SELECT * FROM receiptmgmt WHERE receiptNo = {$_POST['receiptdataone']}";
    $query = mysqli_query($conn , $s);
    
    if($query->num_rows > 0){
        $userData = $query->fetch_assoc();
        $data['status'] = 'ok';
        $data['result'] = $userData;
    }else{
        $data['status'] = 'err';
        $data['result'] = '';
    }
    
    //returns data as JSON format
    echo json_encode($data);
}
?>