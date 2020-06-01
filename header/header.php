<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="assets/img/favicon.html">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Dev Automobile</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!-- Canonical SEO -->
    <link rel="canonical" href="https://www.creative-tim.com/product/light-bootstrap-dashboard-pro" />
    <!--  Social tags      -->
    <meta name="keywords" content="creative tim, html dashboard, html css dashboard, web dashboard, bootstrap 4 dashboard, bootstrap 4, css3 dashboard, bootstrap 4 admin, light bootstrap 4 dashboard, frontend, responsive bootstrap dashboard">
    <meta name="description" content="Forget about boring dashboards, get a bootstrap 4 admin template designed to be simple and beautiful.">
    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="Light Bootstrap Dashboard PRO by Creative Tim">
    <meta itemprop="description" content="Forget about boring dashboards, get a bootstrap 4 admin template designed to be simple and beautiful.">
    <meta itemprop="image" content="../../../s3.amazonaws.com/creativetim_bucket/products/34/original/opt_lbd_pro_thumbnail.jpg">
    <!-- Twitter Card data -->
    <meta name="twitter:card" content="product">
    <meta name="twitter:site" content="@creativetim">
    <meta name="twitter:title" content="Light Bootstrap Dashboard PRO by Creative Tim">
    <meta name="twitter:description" content="Forget about boring dashboards, get a bootstrap 4 admin template designed to be simple and beautiful.">
    <meta name="twitter:creator" content="@creativetim">
    <meta name="twitter:image" content="../../../s3.amazonaws.com/creativetim_bucket/products/34/original/opt_lbd_pro_thumbnail.jpg">
    <meta name="twitter:data1" content="Light Bootstrap Dashboard PRO by Creative Tim">
    <meta name="twitter:label1" content="Product Type">
    <meta name="twitter:data2" content="$39">
    <meta name="twitter:label2" content="Price">
    <!-- Open Graph data -->
    <meta property="og:title" content="Light Bootstrap Dashboard PRO by Creative Tim" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="index.php" />
    <meta property="og:image" content="../../../s3.amazonaws.com/creativetim_bucket/products/34/original/opt_lbd_pro_thumbnail.jpg" />
    <meta property="og:description" content="Forget about boring dashboards, get a bootstrap 4 admin template designed to be simple and beautiful." />
    <meta property="og:site_name" content="Creative Tim" />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />

    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <!-- CSS Files -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/light-bootstrap-dashboard790f.css?v=2.0.1" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="assets/css/demo.css" rel="stylesheet" />
    <!-- Google Tag Manager -->
    <!-- End Google Tag Manager -->
    </head>

    <style type="text/css">
        
    #logo-text{z
        color:yellow;
    }    
    </style>


    <body>
      <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKDMSK6"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <div class="wrapper">
        <div class="sidebar" data-color="orange" data-image="assets/img/sidebar-5.jpg">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

        Tip 2: you can also add an image using data-image tag
    -->
            <div class="sidebar-wrapper">
                <div class="logo">
                  
                    <a href="https://www.creative-tim.com/" class="simple-text logo-normal">
                     &nbsp;&nbsp;&nbsp;  <b id="logo-text">Dev</b>AutoMobile
                    </a>
                </div>
                <div class="user">
                    <div class="photo">
                        <img src="assets/img/sidebar-1.jpg" />
                    </div>
                    <div class="info ">
                        <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                            <span>  
                                <!--<b class="caret"></b>-->
                                <b style="color:#FFFF00;">
                                <?php echo $_SESSION['name'] ; ?>
                            </b>
                            </span>
                        </a>                    
                    </div>
                </div>
                <ul class="nav">
                    <li class="nav-item ">
                        <a class="nav-link" href="index.php">
                            <i class="nc-icon nc-chart-pie-35"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <?php 
                    include('header/conn.php');
                    $select_u = "SELECT `name` , `role` FROM `register` WHERE `name` = '".$_SESSION['name']."'";
                    $select_us = mysqli_query($conn , $select_u);
                    $select_user = mysqli_fetch_array($select_us); 
                    if($select_user['role'] == 'admin'){
                    ?>                    
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#other-Staff-add">
                            <i class="nc-icon nc-notes"></i>
                            <p>
                                Staff Section
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse " id="other-Staff-add">
                            <ul class="nav">
                                
                                <li class="nav-item ">
                                    <a class="nav-link" href="add-salesman.php">
                                        <span class="sidebar-mini">C</span>
                                        <span class="sidebar-normal">Add SalesPerson Staff </span>
                                    </a>
                                </li> 

                                <li class="nav-item ">
                                    <a class="nav-link" href="add-pd.php">
                                        <span class="sidebar-mini">C</span>
                                        <span class="sidebar-normal">Add PD</span>
                                    </a>
                                </li> 

                                <li class="nav-item ">
                                    <a class="nav-link" href="add-user.php">
                                        <span class="sidebar-mini">A</span>
                                        <span class="sidebar-normal">Add Staff Account</span>
                                    </a>
                                </li> 
                                
                            </ul>
                        </div>                         
                    </li> 
<?php }?>

                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#componentsExamples1">
                            <i class="nc-icon nc-app"></i>
                            <p>
                                Dealer Section 
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse " id="componentsExamples1">
                            <ul class="nav">
                                <li class="nav-item ">
                                    <a class="nav-link" href="add-dealer.php">
                                        <span class="sidebar-mini">A</span>
                                        <span class="sidebar-normal">Add Dealer</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                                   <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#other-Accessorie-add">
                            <i class="nc-icon nc-notes"></i>
                            <p>
                                Accessorie Section
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse " id="other-Accessorie-add">
                            <ul class="nav">
                                
                                <li class="nav-item ">
                                    <a class="nav-link" href="add-accessories.php">
                                        <span class="sidebar-mini">A</span>
                                        <span class="sidebar-normal">Add Accessories</span>
                                    </a>
                                </li> 

                                <li class="nav-item ">
                                <a class="nav-link" href="add-accessories-detail.php">
                                <span class="sidebar-mini">A</span>
                                <span class="sidebar-normal">Add Sub Accessories
                                </span>
                                </a>
                                </li> 
                            </ul>
                        </div> 
                    </li>

                                        <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#other-Finance-add">
                            <i class="nc-icon nc-notes"></i>
                            <p>
                                Finance Section 
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse " id="other-Finance-add">
                            <ul class="nav">
                                <li class="nav-item ">
                                    <a class="nav-link" href="add-paymode.php">
                                        <span class="sidebar-mini">C</span>
                                        <span class="sidebar-normal">Add Payment Mode</span>
                                    </a>
                                </li>                                                      
                                <li class="nav-item ">
                                    <a class="nav-link" href="add-finance.php">
                                        <span class="sidebar-mini">C</span>
                                        <span class="sidebar-normal">Add Finance Mode</span>
                                    </a>
                                </li> 
                            </ul>
                        </div>                         
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#componentsExamples2">
                            <i class="nc-icon nc-app"></i>
                            <p>
                               Vehicle Make Name <br> &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                &nbsp;&nbsp;&nbsp;&nbsp;    
                                Section 
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse " id="componentsExamples2">
                            <ul class="nav">
                                <li class="nav-item ">
                                    <a class="nav-link" href="add-make.php">
                                        <span class="sidebar-mini">A</span>
                                        <span class="sidebar-normal">Add Name</span>
                                    </a>
                                </li>
                      
                               <li class="nav-item ">
                                    <a class="nav-link" href="add-model.php">
                                        <span class="sidebar-mini">A</span>
                                        <span class="sidebar-normal">Add Model Name</span>
                                    </a>
                                </li>

                                <li class="nav-item ">
                                    <a class="nav-link" href="addModelColor.php">
                                        <span class="sidebar-mini">A</span>
                                        <span class="sidebar-normal">Add Color</span>
                                    </a>
                                </li>

                                <li class="nav-item ">
                                    <a class="nav-link" href="addStockLocation.php">
                                        <span class="sidebar-mini">A</span>
                                        <span class="sidebar-normal">Add Stock Location</span>
                                    </a>
                                </li>                               
                            </ul>
                        </div>
                    </li>
                     

                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#formsExamples1">
                            <i class="nc-icon nc-notes"></i>
                            <p>
                                StockWise
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse " id="formsExamples1">
                            <ul class="nav">
                                <li class="nav-item ">
                                    <a class="nav-link" href="stockwise.php">
                                        <span class="sidebar-mini">S</span>
                                        <span class="sidebar-normal">Add Stock</span>
                                    </a>
                                </li>                           
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#formsExamples22">
                            <i class="nc-icon nc-notes"></i>
                            <p>
                                Cash Receipt 
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse " id="formsExamples22">
                            <ul class="nav">
                                <li class="nav-item ">
                                    <a class="nav-link" href="receipt-wise.php">
                                        <span class="sidebar-mini">C</span>
                                        <span class="sidebar-normal">Generate Cash Receipt</span>
                                    </a>
                                </li>

                                <li class="nav-item ">
                                    <a class="nav-link" href="all-cash-receipt.php">
                                        <span class="sidebar-mini">C</span>
                                        <span class="sidebar-normal"> All Cash Receipt </span>
                                    </a>
                                </li>

                            </ul>
                        </div>                         
                    </li>


<li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#formsExamples223">
                            <i class="nc-icon nc-notes"></i>
                            <p>
                                Gate Pass
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse " id="formsExamples223">
                            <ul class="nav">
                                 <li class="nav-item ">
                                    <a class="nav-link" href="gate-pass.php">
                                        <span class="sidebar-mini">G</span>
                                        <span class="sidebar-normal"> Generate GatePass</span>
                                    </a>
                                </li>    

                                <li class="nav-item ">
                                    <a class="nav-link" href="all-gate-pass.php">
                                        <span class="sidebar-mini">G</span>
                                        <span class="sidebar-normal"> ALL GatePass</span>
                                    </a>
                                </li>                         
                            </ul>
                        </div>                         
                    </li>

                </ul>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg ">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <div class="navbar-minimize">
                            <button id="minimizeSidebar" class="btn btn-warning btn-fill btn-round btn-icon d-none d-lg-block">
                                <i class="fa fa-ellipsis-v visible-on-sidebar-regular"></i>
                                <i class="fa fa-navicon visible-on-sidebar-mini"></i>
                            </button>
                        </div>
                        <a class="navbar-brand" href="index.php"> Dashboard </a>
                    </div>
                    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end">
                      
                        <ul class="navbar-nav">          
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="https://example.com/" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="nc-icon nc-button-power"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                 <a href="logout.php" class="dropdown-item text-danger">
                                        <i class="nc-icon nc-button-power"></i> Log out
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
