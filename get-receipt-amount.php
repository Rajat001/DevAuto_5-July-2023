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

else if(!empty($_POST['receiptdatatwo'])){
    $data = array();
    
    
    require_once('header/conn.php');

    //get user data from the database
    //$query = $conn->query("SELECT * FROM receiptmgmt WHERE receiptNo = {$_POST['receiptdata']}");


    $s = "SELECT * FROM receiptmgmt WHERE receiptNo = {$_POST['receiptdatatwo']}";
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

else if(!empty($_POST['receiptdatathree'])){
    $data = array();
    
    
    require_once('header/conn.php');

    //get user data from the database
    //$query = $conn->query("SELECT * FROM receiptmgmt WHERE receiptNo = {$_POST['receiptdata']}");


    $s = "SELECT * FROM receiptmgmt WHERE receiptNo = {$_POST['receiptdatathree']}";
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

else if(!empty($_POST['receiptdatafour'])){
    $data = array();
    
    
    require_once('header/conn.php');

    //get user data from the database
    //$query = $conn->query("SELECT * FROM receiptmgmt WHERE receiptNo = {$_POST['receiptdata']}");


    $s = "SELECT * FROM receiptmgmt WHERE receiptNo = {$_POST['receiptdatafour']}";
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

else if(!empty($_POST['receiptdatafive'])){
    $data = array();
    
    
    require_once('header/conn.php');

    //get user data from the database
    //$query = $conn->query("SELECT * FROM receiptmgmt WHERE receiptNo = {$_POST['receiptdata']}");


    $s = "SELECT * FROM receiptmgmt WHERE receiptNo = {$_POST['receiptdatafive']}";
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

else if(!empty($_POST['receiptdatasix'])){
    $data = array();
    
    
    require_once('header/conn.php');

    //get user data from the database
    //$query = $conn->query("SELECT * FROM receiptmgmt WHERE receiptNo = {$_POST['receiptdata']}");


    $s = "SELECT * FROM receiptmgmt WHERE receiptNo = {$_POST['receiptdatasix']}";
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

else if(!empty($_POST['receiptdataseven'])){
    $data = array();
    
    
    require_once('header/conn.php');

    //get user data from the database
    //$query = $conn->query("SELECT * FROM receiptmgmt WHERE receiptNo = {$_POST['receiptdata']}");


    $s = "SELECT * FROM receiptmgmt WHERE receiptNo = {$_POST['receiptdataseven']}";
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

else if(!empty($_POST['receiptdataeight'])){
    $data = array();
    
    
    require_once('header/conn.php');

    //get user data from the database
    //$query = $conn->query("SELECT * FROM receiptmgmt WHERE receiptNo = {$_POST['receiptdata']}");


    $s = "SELECT * FROM receiptmgmt WHERE receiptNo = {$_POST['receiptdataeight']}";
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
else if(!empty($_POST['receiptdatanine'])){
    $data = array();
    
    
    require_once('header/conn.php');

    //get user data from the database
    //$query = $conn->query("SELECT * FROM receiptmgmt WHERE receiptNo = {$_POST['receiptdata']}");


    $s = "SELECT * FROM receiptmgmt WHERE receiptNo = {$_POST['receiptdatanine']}";
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