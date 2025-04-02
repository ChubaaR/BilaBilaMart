<?php
	include("registeredClientHeader.php");
?>

<div style="text-align: center; border: 1px solid black; margin-top: 50px;">
	<h1>Thank You For Your Purchase!</h1>
</div>

<?php
	// Delete all the records in the cart table based on the user ID
	$sql = "DELETE FROM cart WHERE CustomerID = '$userID'";

	$result = mysqli_query($conn, $sql);
?>