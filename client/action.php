<?php
	// Add a product to the cart table
    if (isset($_POST['addItem'])) {
        $productName = $_POST['productName'];
        $productPrice = $_POST['productPrice'];
        $productQty = $_POST['productQty'];
        $productImage = $_POST['productImage'];
        $totalPrice = $_POST['productPrice'] * $_POST['productQty'];

        $sql = "SELECT * FROM cart WHERE CustomerID = '$userID' AND ProductName = '$productName'";

        $result = mysqli_query($conn, $sql);

        $rows = mysqli_num_rows($result);

        if ($rows > 0) {
          echo '<div class="cartMessage" onclick="this.remove();">This product has already been added to your Cart. You can update its quantity from the cart.</div>';
        } else {
          $sql2 = "INSERT INTO cart (CustomerID, ProductName, ProductPrice, ProductQty, ProductImage, TotalPrice) VALUES ('$userID', '$productName', '$productPrice', '$productQty', '$productImage', '$totalPrice')";

            $result2 = mysqli_query($conn, $sql2);

            if ($result2) {
                echo '<div class="cartMessage" onclick="this.remove();">Item is added to your Cart!</div>';
            } else {
                echo '<script>alert("Something went wrong. Please try again.")</script>';
                echo '<script>window.location="products.php"</script>';
            }
        }
  	}

  	// Update item quantity and price in the cart table
  if (isset($_POST['updateQty'])) {
    $updateID = $_POST['cartID'];
    $price = $_POST['price'];
    $qty = $_POST['qty'];
    
    $updatePrice = $price * $qty;

    $sql = "UPDATE cart SET TotalPrice = $updatePrice, ProductQty = $qty WHERE CartID = $updateID";

    $result = mysqli_query($conn, $sql);

    if ($result) {
      echo '<div class="cartMessage" onclick="this.remove();">Item quantity has been updated!</div>';
    }
  }

  // Remove a single product
  if (isset($_POST['delItem'])) {

    $deleteID = mysqli_real_escape_string($conn, $_POST['delCartID']);

    $sql = "DELETE FROM cart WHERE CartID = '$deleteID'";

    $result = mysqli_query($conn, $sql);

    if ($result) {
      // Go back to the cart page
    }else {
      echo '<script>alert("Something went wrong. Please try again.")<script>';
      echo '<script>window.location="cart.php"</script>';
    }
  }

?>