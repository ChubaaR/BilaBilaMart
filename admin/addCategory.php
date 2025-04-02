<?php
	include("adminHeader.php");
	require('../config/dbconnect.php');

  	$newName = $error = '';

  	if(isset($_POST['addCategory'])) {
 	 	$newName = stripcslashes($_POST['categoryName']);
		$newName = mysqli_real_escape_string($conn, $newName);

		// Check if the category name exist in the category table
		$check_categoryName = "SELECT CategoryName FROM category WHERE CategoryName = '$newName'";

		// Make query and get the result
		$result = mysqli_query($conn, $check_categoryName);

		$count = mysqli_num_rows($result);

		if ($count > 0) {
			// If the category name exists in the database, the administrator is prompted to enter a different name
			$error = 'Category name exists';
		} else {
			// If the category name does not exist, the name will be stored in the database
			$sql = "INSERT INTO category (CategoryName) VALUES ('$newName')";

			$result = mysqli_query($conn, $sql);

			if ($result) {
	       		header("Location: manageCategories.php");
		    } else {
				echo '<script>alert("Something went wrong. Please try again.")<script>';
				echo '<script>window.location="manageCategories.php"</script>';
			}
		}	  	
	}
?>
<div class="title">
	<h1>Product</h1>
</div>

<form class="updateProduct" method="POST" action="addCategory.php">
	<h1>Add New Category</h1>
	<div>
		<label for="cName">Category Name:</label><br>
		<input type="text" id="cName" name="categoryName" value="<?php echo htmlspecialchars($newName) ?>" required>
		<div><?php echo $error; ?></div>
	</div>

	<div>
		<input class="saveButton" style="width: 10%; padding-left: 0px;" type="submit" name="addCategory" value="SAVE" required>
	</div>
</form>

<?php include("adminFooter.php");  ?>