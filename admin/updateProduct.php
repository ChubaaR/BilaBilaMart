<?php
	include("adminHeader.php");
	require('../config/dbconnect.php');
	
  	$error = '';

  	if(isset($_POST['editProduct'])) {
	  	$updateProductID = $_POST['updateProductID'];
	   	$sql = "SELECT * FROM product WHERE ProductID = $updateProductID";

	   	// Make query and get the result
	  	$result2 = mysqli_query($conn, $sql);

	  	// Get the selected product details
	  	$product = mysqli_fetch_array($result2);

	  	$pCat = $product['ProductCategoryID'];
  	}
    
  	 if(isset($_POST['updateProduct'])) {
  	 	$updateID = $_POST['productID'];
 	 	$updateName = stripcslashes($_POST['productName']);
		$updateName = mysqli_real_escape_string($conn, $updateName);
		$updatePrice = stripcslashes($_POST['productPrice']);
		$updatePrice = mysqli_real_escape_string($conn, $updatePrice);
		$updateQty = stripcslashes($_POST['productQty']);
		$updateQty = mysqli_real_escape_string($conn, $updateQty);
		$updateCategoryID = stripcslashes($_POST['selectCategory']);

		$pattern = '/^\d+(:?[.]\d{2})$/';

		if(preg_match($pattern, $updatePrice) == '0') {
			$error = 'Please enter a valid price';

			$sql = "SELECT * FROM product WHERE ProductID = $updateID";

		   	// Make query and get the result
		  	$result = mysqli_query($conn, $sql);

		  	// Get the selected product details
		  	$product = mysqli_fetch_array($result);

		} else {
			$sql = "UPDATE product SET ProductName = '$updateName', ProductPrice = '$updatePrice', ProductQty = '$updateQty', ProductCategoryID = '$updateCategoryID' WHERE ProductID = '$updateID'";

	  	 	$result = mysqli_query($conn, $sql);

	  	 	if ($result) {
	       		header("Location: viewProductLists.php");
	       	} else {
				echo '<script>alert("Something went wrong. Please try again.")<script>';
				echo '<script>window.location="viewProductLists.php"</script>';
			}
		}
  	}
?>

<div class="title">
	<h1>Products</h1>
</div>

<form class="updateProduct" method="POST" action="updateProduct.php">
	<h1 class="productTitle">Edit Product Details</h1>
	<input type="hidden" name="productID" value="<?php echo $product['ProductID']; ?>">

	<div>
		<label for="pName">Product Name:</label><br>
		<input type="text" id="pName" name="productName" value="<?php echo $product['ProductName']; ?>" required><br>
	</div>

	<div>
		<label for="uPrice">Unit Price:</label><br>
		<input type="text" id="uPrice" name="productPrice" value="<?php echo $product['ProductPrice']; ?>" required><br>
		<div class="priceError"><?php echo $error; ?></div>
	</div>

	<div>
		<label for="qty">Quantity:</label><br>
		<input type="number" id="qty" name="productQty" value="<?php echo $product['ProductQty']; ?>" min="1" required>
	</div>

	<div>
		<label>Category:</label>
		<select name="selectCategory" required>
			<?php
				// Retrieve all records from the category table
				$sql = "SELECT * FROM category WHERE CategoryID = $pCat";

				// Make query and get the result
				$result = mysqli_query($conn, $sql);

				while($category = mysqli_fetch_array($result)) {
			?>
				<option value="<?php echo $category['CategoryID']; ?>"><?php echo $category['CategoryName']; ?></option>
			<?php } ?>

			<?php
				$sql = "SELECT * FROM category WHERE CategoryID != $pCat";

				$result = mysqli_query($conn, $sql);

				while($category = mysqli_fetch_array($result)) {
			?>
				<option value="<?php echo $category['CategoryID']; ?>"><?php echo $category['CategoryName']; ?></option>
			<?php } ?>
		</select>
	</div>



	<div>
		<input class="saveButton" style="width: 10%; padding-left: 0px;" type="submit" name="updateProduct" value="SAVE" required>
	</div>
</form>

<?php include("adminFooter.php");  ?>