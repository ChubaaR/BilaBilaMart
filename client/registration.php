<?php
	include("clientheader.php");
	// Destroy session
			session_destroy();

	// Create an array to store the error messages
	$errors = array('usernameError' => '', 'emailError' => '', 'rePasswordError' => '');

	// To keep the values in the fields of the form
	$username = $email = $password = $rePassword = '';

	if (isset($_POST['signUp'])) {
		$username = stripcslashes($_POST['username']);
		$username = mysqli_real_escape_string($conn, $username);
		$email = stripcslashes($_POST['email']);
		$email = mysqli_real_escape_string($conn, $email);
		$password = stripcslashes($_POST['password']);
		$password = mysqli_real_escape_string($conn, $password);
		$rePassword = stripcslashes($_POST['rePassword']);

		// Check if the username already exist in the database
		$check_username = "SELECT CustomerName FROM customer WHERE CustomerName = '$username'";

		// Check if the email already exist in the database
		$check_email = "SELECT CustomerEmail FROM customer WHERE CustomerEmail = '$email'";

		// Make query and get the result
		$username_result = mysqli_query($conn, $check_username);
		$email_result = mysqli_query($conn, $check_email);

		$count_username = mysqli_num_rows($username_result);
		$count_email = mysqli_num_rows($email_result);

		if ($count_username > 0) {
			// If the username exists in the database, the customer is prompted to enter a different username
			$errors['usernameError'] = 'Username exists';
		} else if ($count_email > 0) {
			// If the email exists in the database, the customer is prompted to enter a different email
			$errors['emailError'] = 'Email exists';
		} else if ($rePassword !== $password) { // Check if the re-enter password is the same as the password
			$errors['rePasswordError'] = 'Passwords are not same';
		} else {
			// If the username and email do not exist and the passwords are the same, the entered information will be stored in the database
			$sql = "INSERT INTO customer (CustomerName, CustomerEmail, CustomerPassword) VALUES ('$username', '$email', '" . md5($password) . "')";

			$result = mysqli_query($conn, $sql);

			if ($result) {
				header("Location: regSuccessfully.php");
			} else {
				echo '<script>alert("Something went wrong. Please try again.")<script>';
				echo '<script>window.location="registration.php"</script>';
			}
		}
	}
?>

<form class="form registration" method="POST" action="registration.php">
	<h1>Sign Up</h1>
	<label for="username">Username:</label><br>
	<input class="formInput" id="username" value="<?php echo htmlspecialchars($username) ?>" name="username" type="text" name="username" placeholder="Enter Username" size="35" maxlength="31" required><br>
	<div><?php echo $errors['usernameError']; ?></div>

	<label for="email">Email:</label><br>
	<input class="formInput" id="email" value="<?php echo htmlspecialchars($email) ?>" name="email" type="email" name="email" placeholder="Enter Email" size="35" maxlength="100" required><br>
	<div><?php echo $errors['emailError']; ?></div>

	<label for="password">Password:</label><br>
	<input class="formInput" id="password" value="<?php echo htmlspecialchars($password) ?>" name="password" type="password" name="password" placeholder="Enter Password" size="35" minlength="6" maxlength="50" required><br>
	<div></div>

	<label for="rePassword">Re-enter Password:</label><br>
	<input class="formInput" id="rePassword" value="<?php echo htmlspecialchars($password) ?>" name="rePassword" type="password" name="password" placeholder="Re-enter Password" size="35" minlength="6" maxlength="50" required><br>
	<div><?php echo $errors['rePasswordError']; ?></div>

	<input class="formButton registerBtn" type="submit" name="signUp" value="SIGN UP" required style="width: 25%;"><br>
	<p>Have an account?</p>
	<p><a href="login.php">LOG IN</a></p>
</form>

<?php include("clientFooter.php"); ?>