<?php
    require('../config/dbconnect.php');
    session_start();

    $_SESSION['userID'] = 0;
    $userID = $_SESSION['userID'];

    // Get all the records from the cart table
    $sql = "SELECT * FROM cart WHERE CustomerID = $userID";

    // Make query and get the result
    $result = mysqli_query($conn, $sql);

    // Get the total number of rows in the cart table
    $numOfItem = mysqli_num_rows($result);
?>
<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Title of project -->
	<title>BilaBilaMart</title>

    <!-- Links -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css' />
    
    <!--Font Awesome  -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>    
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Yeseva+One&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="../images/logo.png"/>  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/style2.css">
    <link rel="stylesheet" type="text/css" href="../css/client.css">
    <link rel="stylesheet" type="text/css" href="../css/form.css">


</head>

<body style="background-color: lightseagreen;">
	 <header>

        <!-- Navigation -->
        <nav class="navigation">
    
            <!-- logo -->
            <a href="index.php" class="logo">
                <img src="../images/logo.png">
            </a>

           <!--menu-btn---->
            <input type="checkbox" class="menu-btn" id="menu-btn">
            <label for="menu-btn" class="menu-icon">
                <span class="nav-icon"></span>
            </label>
    
            <!-- menu -->
            <ul class="menu">
                <li><a href="index.php">Home</a></li>
                <li><a href="products.php">Products</a></li>
                <li><a href="location.php">Locations</a></li>
            </ul>

            <!--right-nav-->
            <div class="right-nav">
                <!--cart----->
                <a href="cart.php" class="cart">
                     <i class="fas fa-shopping-cart"><?php echo $numOfItem; ?></i>   
                </a>
            </div>
            <div class="right-nav">
                <a href="login.php" class="profile">
                    <i class="fas fa-user"></i>
               </a>
            </div>
        </nav>

    </header>