<?php
	include("adminHeader.php");
?>
<div class="title">
	<h1>Customer</h1>
</div>

<table class="custTable" border="1" width="90%" align="center">
	<thead>
		<tr>
			<th>Customer ID</th>
			<th>Customer Name</th>
			<th>Customer Email</th>
			<th>Register Date</th>
		</tr>
	</thead>

	<?php
		// Retrieve all the records from the customer table
		$sql = "SELECT * FROM customer";

		// Make query and get the result
		$result = mysqli_query($conn, $sql);

		// Display all the customers
		while($customer = mysqli_fetch_array($result)) {
	?>
	<tbody>
		<tr>
			<td><?php echo $customer['CustomerID']; ?></td>
			<td><?php echo $customer['CustomerName']; ?></td>
			<td><?php echo $customer['CustomerEmail']; ?></td>
			<td><?php echo $customer['register_date']; ?></td>
		</tr>
	</tbody>
	<?php } ?>
</table>

<?php include("adminFooter.php");  ?>