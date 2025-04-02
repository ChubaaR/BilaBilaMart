<?php
    require('../config/dbconnect.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>BilaBilaMart</title>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Yeseva+One&display=swap" rel="stylesheet">

    <link rel="shortcut icon" href="../images/logo.png"/>  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/admin.css">
    <link rel="stylesheet" type="text/css" href="../css/form.css">

</head>

<body>
	 <header>

        <!-- Navigation -->
        <nav class="navigation">
    
            <!-- logo -->
            <a href="adminDashboard.php" class="logo">
                <img src="../images/logo.png">
            </a>

           <!--menu-btn---->
            <input type="checkbox" class="menu-btn" id="menu-btn">
            <label for="menu-btn" class="menu-icon">
                <span class="nav-icon"></span>
            </label>
    
            <!-- menu -->
            <ul class="menu">
                <li><a href="adminDashboard.php">Home</a></li>
                <li><a href="viewCustomers.php">Customers</a></li>
                <li><a href="viewProductLists.php">Products</a></li>
                <li><a href="manageCategories.php">Categories</a></li>
                <li><a href="manageOrders.php">Orders</a></li>
            </ul>
    
            <!--right-nav-->
            <div class="right-nav">
                <a href="../client/logout.php" class="profile" onclick="return confirm('Are you sure you want to Logout?');">
                    <i class="fas fa-user"></i>
               </a>
            </div>
        </nav>

    </header>