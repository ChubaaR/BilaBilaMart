<?php
	include("adminHeader.php");
?>
<div class="title">
	<h1>Categories</h1>
</div>

<div class="categories">
	<?php 
		// Retrieve all the records from the category table
		$sql = "SELECT * FROM category";

		// Make query and get the result
		$result = mysqli_query($conn, $sql);

		// Display all the categories
		while($category = mysqli_fetch_array($result)) { 
	?>
	<form method="POST" action="manageProducts.php">
		<input type="hidden" name="categoryID" value="<?php echo $category['CategoryID']; ?>">
		<a href="manageProducts.php">
			<input type="submit" name="viewProducts" value="<?php echo $category['CategoryName']; ?>">
		</a>
	</form>
	<?php } ?>
</div>

<?php include("adminFooter.php");  ?>