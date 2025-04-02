<?php
  include("clientHeader.php");
  require('action.php');
?>
  <!-- Displaying Products -->
  <div class="container">

          <!--
            - PRODUCT GRID
          -->

          <div class="product-main">
            
      <div class="header-search-container">
 
        <!--The option beside enter your product name search-->
        <div class="desktop-menu-category-list">

          <li class="menu-category">
            <a href="#" class="menu-title">Category</a>

            <ul class="dropdown-list">

              <li class="dropdown-item">
                <a href="Instant Food.php">Instant Food</a>
              </li>

              <li class="dropdown-item">
                <a href="Frozen Food.php">Frozen Food</a>
              </li>

              <li class="dropdown-item">
                <a href="Snack.php">Snacks</a>
              </li>

              <li class="dropdown-item">
                <a href="Beverage.php">Beverage</a>
              </li>

              <li class="dropdown-item">
                <a href="Health Care.php">Health Care</a>
              </li>

              <li class="dropdown-item">
                <a href="Personal Care.php">Personal Care</a>
              </li>

              <li class="dropdown-item">
                <a href="Pet Product.php">Pet Products</a>
              </li>

            </ul>
          </li>

        </div>
      </div>
</div>


            <h2 class="titleP">Personal Care</h2>


    <div id="message"></div>
    <div class="row mt-2 pb-3">
      <?php
        include '../config/dbconnect.php';
        $stmt = $conn->prepare('SELECT * FROM product  WHERE ProductCategoryID=6');
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()):
      ?>
      <div class="col-sm-6 col-md-4 col-lg-3 mb-2">
        <!--box---------->
        <div class="product-box">
            <img src="../images/<?= $row['ProductImage'] ?>" alt="pack">
            <strong><?= $row['ProductName'] ?></strong>
            RM<span class="price"><?= number_format($row['ProductPrice'],2) ?></span>
            <form method="POST" action="Personal Care.php">
            
            <label class="itemDetails">Quantity: </label>
            <input class="qtyNum" type="number" name="productQty" value="1" min="1" max="50" class="qtySize">
                                  
              <!--cart-btn------->
            <button type="submit" name="addItem" class="cart-btn add-to-cart">
                <i class="fas fa-shopping-bag"></i> Add Cart
                <input type="hidden" name="productName" value="<?= $row['ProductName'] ?>">
                <input type="hidden" name="productImage" value="<?= $row['ProductImage'] ?>">
                <input type="hidden" name="productPrice" value="<?= $row['ProductPrice'] ?>">
            </button>                    
          </form>
        </div>
      </div>
      <?php endwhile; ?>
    </div>
  </div>

<?php
  include("clientFooter.php");
?>