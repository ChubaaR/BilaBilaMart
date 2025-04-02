<?php
	include("adminHeader.php");
?>

<div class="title">
	<h1>Home</h1>
</div>

<div class="dashboard">
	<a href="viewCustomers.php">
		<button><i class="fa fa-users fa-5x" aria-hidden="true"></i><h2>View Customers</h2></button>
	</a>
	<a href="viewProductLists.php">
		<button><i class="fa fa-th-large fa-5x" aria-hidden="true"></i><h2>Manage Products</h2></button>
	</a>
</div>

<div class="dashboard">
	<a href="manageCategories.php">
		<button><i class="fa fa-bars fa-5x" aria-hidden="true"></i><h2>Manage Categories</h2></button>
	</a>
	<a href="manageOrders.php">
		<button><i class="fa fa-shopping-bag fa-5x" aria-hidden="true"></i><h2>Manage Orders</h2></button>
	</a>
</div>

<?php include("adminFooter.php");  ?>

