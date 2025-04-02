<?php
	include("adminHeader.php");
 	require('../config/dbconnect.php');

  	if(isset($_POST['view'])) {
	  	$viewID = $_POST['viewID'];

	   	// Retrieve all records from the orders table
		$sql = "SELECT * FROM orders WHERE OrderID = $viewID";

		// Make query and get the result
		$result = mysqli_query($conn, $sql);

	}

	while($order = mysqli_fetch_array($result)) {
?>
<h1 class="moreDetails">More Order Details</h1>
	<table class="detailsTable" width="80%" border="1" cellpadding="10px">
		<thead>
			<tr>
				<th>Order ID</th>
				<th>Product Name</th>
				<th>Quantity</th>
				<th>Total (RM)</th>
				<th>Delivery Address</th>
			</tr>
		</thead>

		<tbody>
			<tr>
				<td><?php echo $order['OrderID']; ?></td>
				<td><?php echo $order['OrderProducts']; ?></td>
				<td><?php echo $order['OrderQty']; ?></td>
				<td><?php echo $order['OrderAmount']; ?></td>
				<td><?php echo $order['OrderAddress']; ?></td>
			</tr>
		</tbody>
	</table>
<?php } ?>

<?php include("adminFooter.php");  ?>
