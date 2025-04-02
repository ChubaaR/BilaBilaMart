<?php
    include("registeredClientHeader.php");

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
          $sql = "INSERT INTO cart (CustomerID, ProductName, ProductPrice, ProductQty, ProductImage, TotalPrice) VALUES ('$userID', '$productName', '$productPrice', '$productQty', '$productImage', '$totalPrice')";

            $result = mysqli_query($conn, $sql);

            if ($result) {
                echo '<div class="cartMessage" onclick="this.remove();">Item is added to your Cart!</div>';
            } else {
                echo '<script>alert("Something went wrong. Please try again.")</script>';
                echo '<script>window.location="index.php"</script>';
            }
        }
  }
?>
    <!-- Banner -->
    <section id="banner">
        <div class="slideshow-container">

            <div class="mySlides fade">
              <img src="../images/slide1.jpg">
            </div>
            
            <div class="mySlides fade">
              <img src="../images/slide2.jpg" >
            </div>
            
            <div class="mySlides fade">
              <img src="../images/slide3.jpg" >
            </div>
            
            <div class="mySlides fade">
              <img src="../images/slide4.jpg">
            </div>
            
            </div>
            <br>
        <!--text------->
        <div class="banner-text">
            <h1>Not your typical Malaysian convenience grocer.</h1>
            <strong>#Everyday Essentials</strong>
           
        </div>

        <script>
            var slideIndex = 0;
            showSlides();
            
            function showSlides() {
              var i;
              var slides = document.getElementsByClassName("mySlides");
              for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";  
              }
              slideIndex++;
              if (slideIndex > slides.length) {slideIndex = 1}    
              slides[slideIndex-1].style.display = "block"; 
              setTimeout(showSlides, 1800); 
            }
            </script>
    </section>
    <!-- Banner end -->

    <!-- Popular products -->
    <section id="popular-product">
         <!--heading-------------->
         <div class="product-heading">
            <h3>Popular Products</h3>
        </div>

        <!-- Box container -->
        <div class="category-container">
            <table>
                <?php 
                    $sql = "SELECT * FROM category";
                    $result = mysqli_query($conn, $sql);

                    while($category = mysqli_fetch_array($result)) {
                        $categoryNum = $category['CategoryID'];
                        $categoryName = $category['CategoryName'];
                        $sql2 = "SELECT * FROM product WHERE ProductCategoryID = $categoryNum";
                        $result2 = mysqli_query($conn, $sql2);

                        $num = 0;       
                ?>
                <tr>
                    <?php 
                        while($product = mysqli_fetch_array($result2)) { 
                            if($num < 3) {
                    ?>
                    <td style="padding: 5px;">
                        <!-- Box -->
                        <div class="product-box">
                            <img src="../images/<?php echo $product['ProductImage']; ?>" alt="Product Image">
                            <strong><?php echo $product['ProductName']; ?></strong>
                            RM<span class="price"><?php echo $product['ProductPrice']; ?></span>
                            <form method="POST" action="main.php">
                                <label class="itemDetails">Quantity: </label>
                                <input class="qtyNum" type="number" name="productQty" value="1" min="1" max="50" class="qtySize">
                                        
                                <!--cart-btn------->
                                <button type="submit" name="addItem" class="cart-btn add-to-cart">
                                    <i class="fas fa-shopping-bag"></i>Add to Cart
                                    <input type="hidden" name="productName" value="<?php echo $product['ProductName']; ?>">
                                    <input type="hidden" name="productImage" value="<?php echo $product['ProductImage']; ?>">
                                    <input type="hidden" name="productPrice" value="<?php echo $product['ProductPrice']; ?>">
                                </button>
                            </form>
                        </div>
                    </td>
                    <?php $num++; } } ?>
                    <td>
                       <!-- Box -->
                       <a href="<?php echo 'Registered ' . $categoryName ?>.php" class="category-box">
                           <span><?php echo $categoryName ?></span>
                       </a>
                    </td>
                </tr>
                <?php }  ?>
            </table>       
        </div>
   </section>
    <!-- Popular products end -->

<?php include("clientFooter.php"); ?>


