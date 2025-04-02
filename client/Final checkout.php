<?php
  include("clientHeader.php");
?>
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
            color: black; /* Set font color to black */
        }

        tbody tr {
            border-bottom: none; /* Remove border for rows */
        }

        tbody td {
            border: none; /* Remove borders for cells */
            background-color: white;
        }

  .table-wrapper {
    position: relative; /* relative position to allow absolute positioning within */
  }

.btn-wrapper {
  position: absolute; /* absolute position within the table wrapper */
  bottom: 0;
  right: 0;
  margin-top: 50px;
  margin-bottom: -50px;
  }

.btn-primary {
  top: 30px;
  bottom: 30;
  color: white;
  background-color: black;
  border-radius: 0.25rem;
 }

.summary {
  margin-left: 40px;
  width: 115%;
}

.summary.td {
  background-color: blue;
}

.gray-background {
  background-color: rgb(238, 237, 237);
  
}

.row {
  display:flex;
  flex-wrap: wrap;
  margin-right: 50px;
  margin-left: 15px;
  padding-bottom: 50px;
  table-color: grey;
}

</style>
<!--end of style didn't include in other file-->

<body>


<!--start of header-->
   <!--
    - HEADER
  -->

<div class="title" style="font-size: 30px;"><b>Checkout</b></div>
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
      </tr>
    </thead>

    <tbody>
      <?php
        $grand_total = 0;
        $num = 1;

        $stmt = $conn->prepare("SELECT * FROM cart WHERE CustomerID = $userID");
        $stmt->execute();
        $result = $stmt->get_result(); 
        while ($cartItem = $result->fetch_assoc()):
      ?>
              <tr>
                <td><?= $num; ?></td>
                <td><img src="../images/<?= $cartItem['ProductImage'] ?>" width="100"></td>
                <td><?= $cartItem['ProductName'] ?></td>
                <td>RM<?= number_format($cartItem['ProductPrice'], 2); ?></td>
                <td>
                  <?= $cartItem['ProductQty'] ?>
                </td>
                <td>RM<?= number_format($cartItem['TotalPrice'], 2); ?></td>
              </tr>
              <?php 
                $grand_total += $cartItem['TotalPrice'];
                $num++;

                endwhile;
              ?>

              <tr><td colspan="6" style="background-color: lightseagreen;"></td></tr>
            </tbody>

            <!--start invoice summary-->
        <?php
          // Get cart items to calculate the subtotal
          $stmt = $conn->prepare("SELECT * FROM cart");
          $stmt->execute();
          $cart_items = $stmt->get_result();

          // Calculate the subtotal by summing the total_price of each cart item
          $subtotal = 0;
          foreach ($cart_items as $item) {
              $subtotal += $item['TotalPrice'];
          }

          // // Apply a voucher discount (example: fixed discount of RM 50)
          // $voucher_discount = 50;

          // Apply a voucher discount (example: 5% discount)
          $voucher_discount = 0.05;

          // Calculate shipping tax (example: a percentage of the subtotal)
          $shipping_tax_rate = 0.06; // 6% shipping tax
          $shipping_tax = $subtotal * $shipping_tax_rate;

          // Calculate the final total
          $total = (($subtotal-($subtotal * $voucher_discount)) + $shipping_tax);

          // Display the invoice summary
        ?>
                      <!-- Apply gray background class to tbody -->
          <tfoot class="gray-background">
            <tr>
              <td colspan="5">Subtotal</td>
              <td><?= number_format($subtotal, 2) ?></td>
            </tr>
            
            <tr>
              <td colspan="5">Shipping Tax (6%)</td>
              <td>+ <?= number_format($shipping_tax, 2) ?></td>
            </tr>

            <tr>
              <td colspan="5"><strong>Total</strong></td>
              <td><strong>RM <?= number_format($total, 2) ?></strong></td>
            </tr>

            <tr>
              <td colspan="6" style="background-color: lightseagreen; text-align:right;">
            <?= 
              $OrderProducts = "";
              $OrderQty = 0;
              foreach($cart_items as $i){
                    $OrderProducts.=$i['ProductName']. "(".$i['ProductQty']. "), ";
                    $OrderQty+=$i['ProductQty'];
                  }
              $OrderProducts = rtrim($OrderProducts, ", ");
              $_SESSION['OrderItems'] = $OrderProducts;
              $_SESSION['Ordertotal'] = $total;
              $_SESSION['OrderQty'] = $OrderQty;
          ?>
          <a href="placeOrder.php" class="btn btn-primary" style="background-color: black; color: white;"><b>Place Order</b></a>
          </td>
          </tr>
         </tfoot>
          </table>
<!--end invoice summary-->
          
        </div>

<!--end checkout form-->       

<?php
  include("clientFooter.php");
?>
