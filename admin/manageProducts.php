<?php
	include("adminHeader.php");

  	// Delete a single product
	if (isset($_POST['delete'])) {
		$deleteID = $_POST['delProductID'];

		// Delete a product based on the product ID
		$sql = "DELETE FROM product WHERE ProductID = '$deleteID'";

		// Make query and get the result
		$result = mysqli_query($conn, $sql);

		if ($result) {
		  header("Location: viewProductLists.php");
		} else {
		  echo '<script>alert("Something went wrong. Please try again.")<script>';
		  echo '<script>window.location="viewProductLists.php"</script>';
		}
	}
?>
<div class="title">
	<h1>Products</h1>
</div>

<a href="addProduct.php"><button class="addButton" type="button" name="add" value="ADD NEW PRODUCT">ADD NEW PRODUCT</button></a>

<table border="1" width="90%" class="manageProduct">
	<thead>
		<tr>
			<th>Product ID</th>
			<th>Image</th>
			<th>Name</th>
			<th>Unit Price (RM)</th>
			<th>Quantity</th>
			<th colspan="3">Actions</th>
		</tr>
	</thead>

<?php
  	if(isset($_POST['viewProducts'])) {
	  	$categoryID = $_POST['categoryID'];

	  	// Retrieve all the records from the product table based on the category ID
	   	$sql = "SELECT * FROM product WHERE ProductCategoryID = $categoryID";

	  	$result = mysqli_query($conn, $sql);

	  	while($product = mysqli_fetch_array($result)) {
?>
	<tbody>	
		<tr>
			<td style="width: 6%;"><?php echo $product['ProductID']; ?></td>
			<td style="width: 10%;"><img src="../images/<?php echo $product['ProductImage']; ?>" alt="Product Image" width="80px" height="100px"></td>
			<td style="width: 25%;"><?php echo $product['ProductName']; ?></td>
			<td style="width: 10%;"><?php echo $product['ProductPrice']; ?></td>
			<td style="width: 7%;"><?php echo $product['ProductQty']; ?></td>
			<td style="width: 7%;">
				<form method="POST" action="updateProduct.php">
					<input type="hidden" name="updateProductID" value="<?php echo $product['ProductID']; ?>">
					<a href="updateProduct.php"><input class="actionBtn" style="background-color: orange; width: 110px;" type="submit" name="editProduct" value="Edit Details"></a>
				</form>
			</td>
			<td style="width: 7%;">
				<form method="POST" action="updateImage.php">
					<input type="hidden" name="updateImgID" value="<?php echo $product['ProductID']; ?>">
					<a href="updateImage.php"><input class="actionBtn" style="background-color: orange; width: 115px;" type="submit" name="changeImg" value="Update Image"></a>
				</form>
			</td>
			<td style="width: 7%;">
				<form method="POST" action="manageProducts.php">
					<input type="hidden" name="delProductID" value="<?php echo $product['ProductID']; ?>">
					<input class="actionBtn" style="background-color: #E74C3C; width: 65px;" type="submit" name="delete" value="Delete" onclick="return confirm('Are you sure you want to delete this product?');">
				</form>
			</td>
		</tr>
	</tbody>
	<?php } } ?>
</table>

<?php include("adminFooter.php");  ?>