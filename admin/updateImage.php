<?php
	include("adminHeader.php");
	require('../config/dbconnect.php');

  	if(isset($_POST['changeImg'])) {
	  	$updateImgID = $_POST['updateImgID'];
	   	$sql = "SELECT * FROM product WHERE ProductID = $updateImgID";

	   	// Make query and get the result
	  	$result = mysqli_query($conn, $sql);

	  	// Get the selected product details
	  	$product = mysqli_fetch_array($result);
  	}
    
  	if(isset($_POST['updateImg'])) {
		$imgID = $_POST['imgID'];
		$fileName = $_FILES['productImage']['name'];
		$fileTempName = $_FILES['productImage']['tmp_name'];
		$validImgExt = ['jpeg', 'jpg', 'png', 'webp', 'avif'];
		$imgExt = explode('.', $fileName);
		$imgExt = strtolower(end($imgExt));

		if (!in_array($imgExt, $validImgExt)) {
			echo "<script>alert('Invalid Image Extension.')</script>";
        } else {
        	$newImgName = uniqid();
        	$newImgName .= '.' . $imgExt;

        	move_uploaded_file($fileTempName, '../images/' . $newImgName);

        	$sql = "UPDATE product SET ProductImage = '$newImgName' WHERE ProductID = '$imgID'";

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

<form class="updateProduct" method="POST" action="updateImage.php" enctype="multipart/form-data">
	<h1 class="productTitle">Update Product Image</h1>
	<input type="hidden" name="imgID" value="<?php echo $product['ProductID']; ?>">

	<div class="updateImage">
		<img src="../images/<?php echo $product['ProductImage']; ?>" alt="product image" height="150" width="100">
	</div>

	<div>
		<label>Upload Image:</label><br>
		<input type="file" name="productImage" accept=".jpg, .jpeg, .png, .webp, .avif" value="" required style="height: 50px; width: 300px; align-content: center;">
	</div>

	<div>
		<input class="saveButton" style="width: 10%; padding-left: 0px;" type="submit" name="updateImg" value="SAVE" required>
	</div>
</form>

<?php include("adminFooter.php");  ?>