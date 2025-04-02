<?php
	include("clientHeader.php");

	// Add customer details to the orders table after submitted the form
	if(isset($_POST['placeOrder']))
	{
		$name = stripcslashes($_POST['fullName']);
		$name = mysqli_real_escape_string($conn, $name);
		$phone = stripcslashes($_POST['phoneNum']);
		$phone = mysqli_real_escape_string($conn, $phone);
		$date = stripcslashes($_POST['deliveryDate']);
		$date = mysqli_real_escape_string($conn, $date);
		$email = stripcslashes($_POST['emailAddress']);
		$email = mysqli_real_escape_string($conn, $email);
		$address = stripcslashes($_POST['address']);
		$address = mysqli_real_escape_string($conn, $address);
		$total = $_SESSION['Ordertotal'];
		$OrderProducts = $_SESSION['OrderItems'];
		$store = $_SESSION['store'];
		$shippingOpt = $_SESSION['shippingOpt'];
		$OrderQty = $_SESSION['OrderQty'];

		$orderStatus = "Pending";
		$paymentStatus = "Unpaid";

		$sql = "INSERT INTO orders (CustName, CustEmail, OrderProducts, OrderDate, OrderQty, OrderAmount, OrderAddress, PickupStore, OrderPhoneNum,  OrderStatus, PaymentStatus)
		        VALUES ('$name','$email','$OrderProducts','$date', '$OrderQty', '$total', '$address','$store', '$phone','$orderStatus', '$paymentStatus')";


		$result = mysqli_query($conn, $sql);

		if ($result) {
			header("Location: OrderSuccessful.php");
		} else{
			echo '<script>alert("Something went wrong. Please try again")</script>';
			echo '<script>window.location="delivery.php"</script>';
		}
	}
?>

<div class="title"><b style="font-size: 30px;">Delivery</b></div>

<main class="deliveryMain">
	<h2>Billing Address</h2>
	<form class="placeOrderForm" method="POST" action="delivery.php">
		<table>
			<tr>
				<td>
					<label for="name">Full name:</label>
					<input id="name" type="text" name="fullName" placeholder="Enter Full Name" required>
				</td>

				<td>
					<label for="phoneNo">Phone Number:</label>
					<input id="phoneNo" type= "tel" name="phoneNum" placeholder="Enter Phone Number" pattern="[0-9]{3}[0-9]{8}" required> 
				</td>

				<td>
					<label for="dDate">Select Date:</label> 
					<input id="dDate" type= "date" name="deliveryDate" required>
				</td>
			</tr>

			<tr>
				<td>
					<label for="email">Email:</label>
					<input id="email" type="email" placeholder="Enter Email Address" name="emailAddress" required>
				</td>

				<td>
					<label for="address">Address:</label> 
					<input id="address" type="text" name="address" placeholder="Enter Full Address" required>
				</td>
				<td>
					<textbutton>
						<p><input type="submit" name="placeOrder" value="PLACE ORDER" required></input></p>
					</textbutton>
				</td>
			</tr>
		</table>
	</form>
</main>

<?php
	include("clientFooter.php");
?>