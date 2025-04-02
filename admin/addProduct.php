<?php
	include("adminHeader.php");
	require('../config/dbconnect.php');

  	// To keep the values in the fields of the form
	$newName = $newPrice = $newQty = '';

  	// Create an array to store the error messages
	$errors = array('nameError' => '', 'priceError' => '');

  	if(isset($_POST['addProduct'])) {
 	 	$newName = stripcslashes($_POST['productName']);
		$newName = mysqli_real_escape_string($conn, $newName);
		$newPrice = stripcslashes($_POST['productPrice']);
		$newPrice = mysqli_real_escape_string($conn, $newPrice);
		$newQty = stripcslashes($_POST['productQty']);
		$newQty = mysqli_real_escape_string($conn, $newQty);
		$newCategoryID = stripcslashes($_POST['selectCategory']);

		// Check if the product name exist in the product table
		$check_productName = "SELECT ProductName FROM product WHERE ProductName = '$newName'";

		// Make query and get the result
		$result = mysqli_query($conn, $check_productName);
		$count = mysqli_num_rows($result);

		$fileName = $_FILES['productImage']['name'];
		$fileSize = $_FILES['productImage']['size'];
		$fileTempName = $_FILES['productImage']['tmp_name'];
		$validImgExt = ['jpeg', 'jpg', 'png', 'webp', 'avif'];
		$imgExt = explode('.', $fileName);
		$imgExt = strtolower(end($imgExt));

		if (!in_array($imgExt, $validImgExt)) {
			echo "<script>alert('Invalid Image Extension')</script>";
        } else if($fileSize > 10000000) {
        	echo "<script>alert('Image size is too large')</script>";
        } else {
        	$newImgName = uniqid();
        	$newImgName .= '.' . $imgExt;

        	move_uploaded_file($fileTempName, '../images/' . $newImgName);
        }

		$pattern = '/^\d+(:?[.]\d{2})$/';

		if($count > 0) {
			// If the product name exists in the database, the administrator is prompted to enter a different name
			$errors['nameError'] = 'Product name exists';

		} else if (preg_match($pattern, $newPrice) == '0') {
			$errors['priceError'] = 'Please enter a valid price';

		} else {
			$sql = "INSERT INTO product (ProductName, ProductPrice, ProductQty, ProductImage, ProductCategoryID) VALUES ('$newName', '$newPrice', '$newQty', '$newImgName', '$newCategoryID')";

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

<form class="updateProduct" method="POST" action="addProduct.php" enctype="multipart/form-data">
	<h1 class="addEditProductTitle">Add Product Details</h1>

	<div>
		<label for="pName">Product Name:</label><br>
		<input type="text" id="pName" name="productName" value="<?php echo htmlspecialchars($newName) ?>" required>
		<div class="priceError"><?php echo $errors['nameError']; ?></div>
	</div>

	<div>
		<label for="uPrice">Unit Price:</label><br>
		<input type="text" id="uPrice" name="productPrice" value="<?php echo htmlspecialchars($newPrice) ?>" required>
		<div class="priceError"><?php echo $errors['priceError']; ?></div>
	</div>

	<div>
		<label for="qty">Quantity:</label><br>
		<input type="number" id="qty" name="productQty" value="<?php echo htmlspecialchars($newQty) ?>" min="1" required>
	</div>

	<div>
		<label>Category:</label>
		<select name="selectCategory" required>
			<?php
				// Retrieve all records from the category table
				$sql = "SELECT * FROM category";

				// Make query and get the result
				$result = mysqli_query($conn, $sql);
			?>

			<option value="" selected disabled>--Category--</option>
			<?php while($category = mysqli_fetch_array($result)) { ?>
				<option value="<?php echo $category['CategoryID']; ?>"><?php echo $category['CategoryName']; ?></option>
			<?php } ?>
		</select>
	</div>

	<div>
		<label>Upload Product Image:</label><br>
		<input type="file" name="productImage" accept=".jpg, .jpeg, .png, .webp, .avif" value="" required style="height: 50px; width: 300px; align-content: center;">
	</div>

	<div>
		<input class="saveButton" style="width: 10%; padding-left: 0px;" type="submit" name="addProduct" value="SAVE" required>
	</div>
</form>

<?php include("adminFooter.php");  ?>