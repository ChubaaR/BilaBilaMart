<?php
	include("adminHeader.php");
	require('../config/dbconnect.php');

  	// Delete a single category
	if (isset($_POST['deleteCategory'])) {
		$deleteID = $_POST['delCategoryID'];

		$sql = "DELETE FROM category WHERE CategoryID = '$deleteID'";

		$result = mysqli_query($conn, $sql);

		if ($result) {
		  // Go back to the manage category page
		} else {
		  echo '<script>alert("Something went wrong. Please try again.")<script>';
		  echo '<script>window.location="manageCategories.php"</script>';
		}
	}
?>
<div class="title">
	<h1>Product Categories</h1>
</div>
 
<a href="addCategory.php"><button class="addButton" type="button" name="addCategory" value="ADD NEW CATEGORY">ADD NEW CATEGORY</button></a>

<table border="1" width="90%" class="title categoryTable">
	<thead>
		<tr>
			<th>Category ID</th>
			<th>Category Name</th>
			<th colspan="2">Actions</th>
		</tr>
	</thead>

	<?php
		// Retrieve all records from the category table
		$sql = "SELECT * FROM category";

		// Make query and get the result
		$result = mysqli_query($conn, $sql);

		while($category = mysqli_fetch_array($result)) {
	?>
	<tbody>
		<tr>
			<td><?php echo $category['CategoryID']; ?></td>
			<td><?php echo $category['CategoryName']; ?></td>
			<td style="width: 20%;">
				<form method="POST" action="updateCategory.php">
					<input type="hidden" name="updateCategoryID" value="<?php echo $category['CategoryID']; ?>">
					<a href="updateCategory.php"><input class="actionBtn" style="background-color: orange; width: 100px;" type="submit" name="editCategory" value="Edit Name" style="width: 100px;"></a>
				</form>
			</td>
			<td>
				<form method="POST" action="manageCategories.php">
					<input type="hidden" name="delCategoryID" value="<?php echo $category['CategoryID']; ?>">
					<input class="actionBtn" style="background-color: #E74C3C; width: 65px;" type="submit" name="deleteCategory" value="Delete" onclick="return confirm('Are you sure you want to delete this category?');" style="width: 70px;">
				</form>
			</td>
		</tr>
	</tbody>
	<?php } ?>
</table>

<?php include("adminFooter.php");  ?>