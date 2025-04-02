<?php
  include("registeredClientHeader.php");
  require('action.php');
?>

  <!--starting-->
  

  <!-- Displaying Products -->
  <div class="container">

          <!--
            - PRODUCT GRID
          -->

          <div class="product-main">
            
      <div class="header-search-container">

      <?php
      include '../config/dbconnect.php';
      $name = "";

      $queryCondition = "";
      if (! empty($_POST["search"])) {
      $searchTerms = array($_POST["search"]);
      foreach ($searchTerms as $k => $v) {
      if (! empty($v)) {
        $queryCondition .= " WHERE ProductName LIKE '%" . $v . "%'";
        $name = $v;

      }
    }
  }
$orderby = " ORDER BY ProductID DESC";
$sql = "SELECT * FROM product " . $queryCondition;
$href = 'index.php';
$query = $sql . $orderby;
$stmt = $conn->prepare($query);
?>
          <form name="frmSearch" method="post" action="">
              <input type="search" name="search" class="search-field" value="<?php echo $name; ?>" placeholder="Enter your product name...">
    
              <button class="search-btn" type="submit" name="go">
                <ion-icon name="search-outline"></ion-icon>
              </button>
          </form>

        <!--The option beside enter your product name search-->
        <div class="desktop-menu-category-list">

          <li class="menu-category">
            <a href="#" class="menu-title">Category</a>

            <ul class="dropdown-list">

              <li class="dropdown-item">
                <a href="Registered Instant Food.php">Instant Food</a>
              </li>

              <li class="dropdown-item">
                <a href="Registered Frozen Food.php">Frozen Food</a>
              </li>

              <li class="dropdown-item">
                <a href="Registered Snack.php">Snacks</a>
              </li>

              <li class="dropdown-item">
                <a href="Registered Beverage.php">Beverage</a>
              </li>

              <li class="dropdown-item">
                <a href="Registered Health Care.php">Health Care</a>
              </li>

              <li class="dropdown-item">
                <a href="Registered Personal Care.php">Personal Care</a>
              </li>

              <li class="dropdown-item">
                <a href="Registered Pet Product.php">Pet Products</a>
              </li>

            </ul>
          </li>

        </div>
      </div>
</div>


            <h2 class="titleP">All Products</h2>


    <div id="message"></div>
    <div class="row mt-2 pb-3">
      <?php
        // include '../config/dbconnect.php';
        if(empty($stmt))
        {$stmt = $conn->prepare('SELECT * FROM product');}
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
            <form method="POST" action="Registeredproducts.php">
            
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

  <!-- Ionicon search -->
  <script src="https://unpkg.com/ionicons@5.5.2/dist/ionicons.js"></script>

<?php
  include("clientFooter.php");
?>