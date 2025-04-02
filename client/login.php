<?php
	include("clientHeader.php");

	$error = '';

	// To keep the values in the fields of the form
	$username = $password = '';

	if (isset($_POST['login'])) {
		$username = stripcslashes($_POST['username']);
		$username = mysqli_real_escape_string($conn, $username);
		$password = stripcslashes($_POST['password']);
		$password = mysqli_real_escape_string($conn, $password);

		// Check if the username and password exist in the customer table
		$sql = "SELECT * FROM customer WHERE CustomerName = '$username' AND CustomerPassword = '" . md5($password) . "'";

		// Check if the username and password exist in the administrator table
		$sql2 = "SELECT * FROM administrator WHERE AdminName = '$username' AND AdminPassword = '" . md5($password) . "'";

		// Make query and get the result
		$result = mysqli_query($conn, $sql) OR die(mysql_error());
		$result2 = mysqli_query($conn, $sql2) OR die(mysql_error());

		// Delete all the records in the cart table based on the temp ID
		$sql3 = "DELETE FROM cart WHERE CustomerID = '$userID'";

		$result3 = mysqli_query($conn, $sql3);

		if (mysqli_num_rows($result) > 0) {
			$rows = mysqli_fetch_array($result, MYSQLI_ASSOC);

			// Create username and user ID session
		 	$_SESSION['username'] = $rows['CustomerName'];
			$_SESSION['userID'] = $rows['CustomerID'];

			// Go to the main page
		 	header("Location: main.php");

		} else if (mysqli_num_rows($result2) > 0) {

			header("Location: ../admin/adminDashboard.php");

		} else {
			$error = 'Incorrect Username / Password. Please try again.';
		}
	}
?>
	
<form class="form login" method="POST" action="login.php" style="height: 550px;">
	<h1>Log In</h1>
	<label for="username">Username:</label><br>
	<input class="formInput" id="username" value="<?php echo htmlspecialchars($username) ?>" type="text" name="username" placeholder="Enter Username" maxlength="31" required style="width: 70%;"><br>

	<label for="password">Password:</label><br>
	<input class="formInput " id="password" value="<?php echo htmlspecialchars($password) ?>" type="password" name="password" placeholder="Enter Password" minlength="6" required style="width: 70%;"><br>
	<div><?php echo $error; ?></div>

	<input class="formButton loginBtn" type="submit" name="login" value="LOG IN" required style="width: 30%;"><br>
	<p>Didn't have an account?</p>
	<p><a href="registration.php">SIGN UP NOW</a></p>
</form>

<?php include("clientFooter.php"); ?>