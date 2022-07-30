<?php
  
  confirm_logged_in();
  
  if($_SESSION['SITE']!='TSB'){ exit(0);}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>CCBOC Inventory System</title>
  <link rel="icon" href="https://www.freeiconspng.com/uploads/sales-icon-7.png">

  <!-- Custom fonts for this template-->
  <link href="<?php echo $baseURL ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?php echo $baseURL ?>/css/syle.css" rel="stylesheet">
  <link href="<?php echo $baseURL ?>/css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="<?php echo $baseURL ?>/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body id="page-top">
          
  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink2"></i>
        </div>
        <div class="sidebar-brand-text mx-3"><?php echo $_SESSION['SITE'] ?> -  CCBOC Inventory System</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="<?php echo $baseURL ?>pages">
          <i class="fas fa-fw fa-home"></i>
          <span>Home</span></a>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        
      </div>
      <!-- Tables Buttons -->
      <li class="nav-item">
        <a class="nav-link" href="<?php echo $baseURL ?>pages/site">
          <i class="fas fa-fw fa-user"></i>
          <span>Site</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo $baseURL ?>pages/employee.php">
          <i class="fas fa-fw fa-user"></i>
          <span>Employee</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo $baseURL ?>pages/user.php">
          <i class="fas fa-fw fa-users"></i>
          <span>Accounts</span></a>
      </li>
      
	  
	  <li class="nav-item">
        <a class="nav-link" href="prod_category_add.php">
          <i class="fas fa-fw fa-user"></i>
          <span>Category</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo $baseURL ?>pages/product.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Product</span></a>
      </li>
     
      <li class="nav-item">
        <a class="nav-link" href="<?php echo $baseURL ?>pages/stock.php">
          <i class="fas fa-fw fa-archive"></i>
          <span>Stock</span></a>
      </li>
	  
	  <li class="nav-item">
        <a class="nav-link" href="<?php echo $baseURL ?>pages/transaction/">
          <i class="fas fa-fw fa-retweet"></i>
          <span>Transaction</span></a>
      </li>
      

      <li class="nav-item">
        <a class="nav-link" href="<?php echo $baseURL ?>pages/supplier.php">
          <i class="fas fa-fw fa-cogs"></i>
          <span>Supplier</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->
    <?php include_once 'topbar.php'; ?>
