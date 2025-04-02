<?php
	include("adminHeader.php");
	require('../config/dbconnect.php');

  	if(isset($_POST['editCategory'])) {
	  	$updateCategoryID = $_POST['updateCategoryID'];
	   	$sql = "SELECT * FROM category WHERE CategoryID = $updateCategoryID";

	   	// Make query and get the result
	  	$result = mysqli_query($conn, $sql);

	  	// Get the selected category name
	  	$category = mysqli_fetch_array($result);
  	}

  	if(isset($_POST['updateCategory'])) {
  	 	$updateID = $_POST['categoryID'];
 	 	$updateName = stripcslashes($_POST['categoryName']);
		$updateName = mysqli_real_escape_string($conn, $updateName);

		$sql = "UPDATE category SET CategoryName = '$updateName' WHERE CategoryID = '$updateID'";

	  	$result = mysqli_query($conn, $sql);

	  	if ($result) {
	       	header("Location: manageCategories.php");
	    } else {
			echo '<script>alert("Something went wrong. Please try again.")<script>';
			echo '<script>window.location="manageCategories.php"</script>';
		}
	}
?>
<div class="title">
	<h1>Product</h1>
</div>

<form class="updateProduct" method="POST" action="updateCategory.php">
	<h1 class="productTitle">Edit Category Name</h1>
	<input type="hidden" name="categoryID" value="<?php echo $category['CategoryID']; ?>">

	<div>
		<label for="cName">Category Name:</label><br>
		<input type="text" id="cName" name="categoryName" value="<?php echo $category['CategoryName']; ?>" required><br>
	</div>

	<div>
		<input class="saveButton" style="width: 10%; padding-left: 0px;" type="submit" name="updateCategory" value="SAVE" required>
	</div>
</form>

<?php include("adminFooter.php");  ?>