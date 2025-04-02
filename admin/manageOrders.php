<?php
	include("adminHeader.php");
 	require('../config/dbconnect.php');

  	// Update order details
  	if(isset($_POST['updateOrder'])) {
  	 	$updateID = $_POST['orderID'];
 	 	$updateOrderStatus = stripcslashes($_POST['orderStatus']);
		$updateOrderStatus = mysqli_real_escape_string($conn, $updateOrderStatus);
		$updatePaymentStatus = stripcslashes($_POST['payStatus']);
		$updatePaymentStatus = mysqli_real_escape_string($conn, $updatePaymentStatus);

		$sql = "UPDATE orders SET OrderStatus = '$updateOrderStatus', PaymentStatus = '$updatePaymentStatus' WHERE OrderID = '$updateID'";

	  	$result = mysqli_query($conn, $sql);

	  	if ($result) {
	    	echo '<script>alert("Status Successfully Updated!")</script>';
			echo '<script>window.location="manageOrders.php"</script>';
	    } else {
			echo '<script>alert("Something went wrong. Please try again.")<script>';
			echo '<script>window.location="manageOrders.php"</script>';
		 }
	}
?>
<div class="title">
	<h1>Orders</h1>
</div>
<h1 class="orderTitle">Order details</h1>
<table class="orderTable" border="1" width="90%">
	<thead>
		<tr>
			<th>Order ID</th>
			<th>Customer</th>
			<th>Contact Number</th>
			<th>Order Date</th>
			<th>Order Status</th>
			<th>Payment Status</th>
			<th>Action</th>
			<th>More Details</th>
		</tr>
	</thead>
	<?php
		// Retrieve all records from the orders table
		$sql = "SELECT * FROM orders";

		$result = mysqli_query($conn, $sql);

		while($order = mysqli_fetch_array($result)) {
	?>
	<tbody>
		<tr>
			<td><?php echo $order['OrderID']; ?></td>
			<td><?php echo $order['CustName']; ?></td>
			<td><?php echo $order['OrderPhoneNum']; ?></td>
			<td><?php echo $order['OrderDate']; ?></td>

			<form method="POST" action="manageOrders.php">
				<td>
					<input type="hidden" name="orderID" value="<?php echo $order['OrderID']; ?>">
					<select style="width: 100px;" name="orderStatus" required>
						<option value="" selected disabled><?php echo $order['OrderStatus']; ?></option>
						<option value="Pending">Pending</option>
						<option value="Delivered">Delivered</option>
						<option value="Picked Up">Picked Up</option>
					</select>
				</td>
				<td>
					<select style="width: 90px;" name="payStatus" required>
						<option value="" selected disabled><?php echo $order['PaymentStatus']; ?></option>
						<option value="Unpaid">Unpaid</option>
						<option value="Paid">Paid</option>
					</select>
				</td>
				<td>
					<input class="actionBtn" style="background-color: orange; width: 80px;" type="submit" name="updateOrder" value="Update">
				</td>
			</form>

			<form class="orderBtn" method="POST" action="viewProductDetails.php">
				<td>
					<input type="hidden" name="viewID" value="<?php echo $order['OrderID']; ?>">
					<a href="viewProductDetails.php"><input class="actionBtn" style="background-color: orange; width: 90px;" type="submit" name="view" value="View"></a>
				</td>
			</form>
		</tr>
	</tbody>
	<?php } ?>
</table>

<?php include("adminFooter.php");  ?>