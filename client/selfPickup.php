<?php
	include("clientHeader.php");

	// Add customer details to the orders table after submitted the form
	if(isset($_POST['placeOrder']))
	{
		$name = stripcslashes($_POST['fullName']);
		$name = mysqli_real_escape_string($conn, $name);
		$phone = stripcslashes($_POST['phoneNum']);
		$phone = mysqli_real_escape_string($conn, $phone);
		$total = $_SESSION['Ordertotal'];
		$OrderProducts = $_SESSION['OrderItems'];
		$store = $_SESSION['store'];
		$shippingOpt = $_SESSION['shippingOpt'];
		$OrderQty = $_SESSION['OrderQty'];

		$orderStatus = "Pending";
		$paymentStatus = "Unpaid";

		$sql = "INSERT INTO orders (CustName, OrderProducts, OrderQty, OrderAmount, PickupStore, OrderPhoneNum, OrderStatus, PaymentStatus) 
		VALUES ('$name', '$OrderProducts', '$OrderQty', '$total','$store','$phone', '$orderStatus', '$paymentStatus')";


		$result = mysqli_query($conn, $sql);

		if ($result) {
			header("Location: OrderSuccessful.php");
		} else{
			echo '<script>alert("Something went wrong. Please try again")</script>';
			echo '<script>window.location="selfPickup.php"</script>';
		}
	}
?>

<div class="title" style="font-size: 30px;"><b>Self-pickup</b></div>

<main class="selfPickupMain">
	<h2>Contact Information</h2>
	<form class="placeOrderForm" method="POST" action="selfPickup.php">
		<textFN>
			<div>
				<p><label for="name">Full name:</label></p>
				<input id="name" type="text" name="fullName" placeholder="Enter Full Name" required>

				<p><label for="phoneNo">Phone Number:</label></p>
				<input id="phoneNo" type="tel" name="phoneNum" placeholder="Enter Phone Number" pattern="[0-9]{3}[0-9]{8}" required> 
			</div>
			 

		<textbutton>
			<p><input type="submit" name="placeOrder" value="PLACE ORDER" required></input></p>
		</textbutton>
		</textFN>
	</form>
</main>

<?php
	include("clientFooter.php");
?>