<?php
  include("clientHeader.php");
  require("action.php");

  // Remove all products at once
  if (isset($_POST['deleteAll'])) {

    $sql = "DELETE FROM cart";
    $result = mysqli_query($conn, $sql);

    $query = "ALTER TABLE cart MODIFY `CartID`int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT = 0";
    $alterResult = mysqli_query($conn, $query);

    if ($result) {
      header("Location: index.php");
    }else {
      echo '<script>alert("Something went wrong. Please try again.")<script>';
      echo '<script>window.location="cart.php"</script>';
    }
  }
?>
    <!--style didn't include in other file-->
    <style>

      table {
            border-radius: 15px; /* Adjust to make the edges more or less curvy */
            overflow: hidden; /* To ensure inner elements don't have sharp corners */
            border-collapse: collapse;
            width: 90%;
            margin-left: auto;
            margin-right: auto;
        }

        /* Style for thead */
        thead {
            background-color: black;
            color: white;
        }

        /* Style for tbody: white background, no borders, black font */
        tbody {
            background-color: white; /* Set background to white */
            border: none; /* Remove borders */
            color: black; /* Set font color to black */
        }

        tbody tr {
            border-bottom: none; /* Remove border for rows */
        }

        tbody td {
            border: none; /* Remove borders for cells */
            background-color: white;
        }
    
    </style>
  <!--end of style didn't include in other file-->
<body>

<div class="title" style="font-size: 30px;"><b>My Cart</b></div>
<!--end of header-->

<!--start checkout form-->
<div>
  <table class="table-bordered table-striped text-center">
    <thead>
              <tr>
                <th>No</th>
                <th>Product</th>
                <th>Name</th>
                <th>Unit Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Delete Product</th>
              </tr>
            </thead>
            <tbody>
              <?php

                $grandTotal = 0;
                $num = 1;

                // Get all the records from the cart table
                $sql = "SELECT * FROM cart WHERE CustomerID = $userID";

                // Make query and get the result
                $result = mysqli_query($conn, $sql);
                
                while($cartItem = mysqli_fetch_array($result)) {
              ?>
              <tr>
                <td><?= $num; ?></td>
                <td><img src="../images/<?= $cartItem['ProductImage'] ?>" width="100"></td>
                <td><?= $cartItem['ProductName'] ?></td>
                <td>RM<?= $cartItem['ProductPrice']; ?></td>
                <td>
                  <form method="POST" action="cart.php">
                    <input type="hidden" name="cartID" value="<?php echo $cartItem['CartID']; ?>">
                    <input type="hidden" name="price" value="<?php echo $cartItem['ProductPrice']; ?>">
                    <div class="d-flex align-items-center">
                    <input type="number" name="qty" class="form-control itemQty" value="<?php echo $cartItem['ProductQty']; ?>" min="1" max="50">
                    <button type="submit" name="updateQty" value="Update" class="btn btn-success">
                      <i class="fas fa-edit"></i>
                    </button>
                  </div>
                  </form>
                </td>
                <td>RM<?= $cartItem['TotalPrice']; ?></td>
                <td>
                  <form method="POST" action="cart.php">
                    <input type="hidden" name="delCartID" value="<?php echo $cartItem['CartID']; ?>">
                    <button class="text-danger lead" type="submit" name="delItem" onclick="return confirm('Are you sure want to remove this product?');"><i class="fas fa-trash-alt"></i></button>
                </form>
                </td>
              </tr>
              <?php 
                $grandTotal += $cartItem['TotalPrice'];
                $num++; 
              ?>
              <?php } ?>
              <tr>
                <td colspan="3">
                  <form method="POST" action="cart.php">
                    <a href="index.php" class="btn btn-success" style="background-color: turquoise; color: white;"><i class="fas fa-cart-plus"></i>&nbsp;&nbsp;Continue Shopping</a>
                    <button href="cart.php" type="submit" name="deleteAll" class="badge-danger badge p-1" onclick="return confirm('Are you sure want to clear your cart?');"><i class="fas fa-trash"></i>Remove All</button>
                  </form>
                </td>                
                <td colspan="2"><b>Grand Total</b></td>
                <td><b>RM<?php echo number_format($grandTotal, 2); ?></b></td>
                <td>
                  <a style="background-color: black; color: white; "href="Final checkout.php" class="btn btn-info <?= ($grandTotal > 1) ? '' : 'disabled'; ?>">Checkout</a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

<!--end checkout form-->

<?php
  include("clientFooter.php");
?>
