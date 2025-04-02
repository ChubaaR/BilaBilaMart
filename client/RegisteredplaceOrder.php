<?php
	include("registeredClientHeader.php");

    $username = $_SESSION['username'];
      $userID = $_SESSION['userID'];

      if (!isset($userID)) {
        header("Location: index.php");
      }

	if(isset($_POST['sOpt']))
	{
		$store = stripcslashes($_POST['store']);
		$shippingOpt = stripcslashes($_POST['shippingOpt']);
		$_SESSION['store'] = $store;
		$_SESSION['shippingOpt'] = $shippingOpt;

		// $sql = "INSERT INTO orders (PickupAddress) VALUES ('$store')";

		// $result = mysqli_query($conn, $sql);

		if($shippingOpt == "Self-pickup") {
			echo '<script>window.location="RegisteredSelfPickup.php"</script>';
		} else {
			echo '<script>window.location="registeredDelivery.php"</script>';
		}

	}
?>

<div class="title"><b style="font-size: 30px;">Place Order</b></div>

<main class="placeOrderMain">
	<h2>Shipping Option</h2>
	<form method="POST" action="RegisteredplaceOrder.php">
	
		<p><label>Self-pickup / Delivery:</label></p>
		<select name="shippingOpt" required>
			<option value="" selected disabled>Choose Option</option>
			<option value="Self-pickup">Self-pickup</option>
			<option value="Delivery">Delivery</option>
		</select>

		<p><label>Choose a store:</label></p>
		<select name="store" required>
			<option value="" selected disabled>Select nearest store</option>
			<option value="Segi Kota Damansara">Segi Kota Damansara</option>
			<option value="Kiara Walk">Kiara Walk</option>
			<option value="Seni Mont Kiara">Seni Mont Kiara</option>
			<option value="Asia Pacific University (APU)">Asia Pacific University (APU)</option>
			<option value="MSU Shah Alam">MSU Shah Alam</option>
			<option value="TAR UMT">TAR UMT</option>
		</select>

		<p style="color: red;">Note : Payments are to be made physically once goods received through cash or online payment</p>

		<input type="submit" name="sOpt" value="Submit">
	</form>
</main>

<?php
	include("clientFooter.php");
?>