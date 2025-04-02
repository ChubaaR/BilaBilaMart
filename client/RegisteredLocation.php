<?php
  include("registeredClientHeader.php");
?>


     <!-- Section and main content--------------------------------------- -->
     <div class="Content">
        <main> 
            <h2 style="margin-top: 35px;"><img src="../images/location.png" alt="Location" width="20" height=auto style="display: inline-block; margin-right: 10px;"> Our Locations </h2>
        </main>
    </div>
    
    <div class="Content" style="margin-top: 30px;">
        <table>
            
            <tr>
                <th><u>Segi Kota Damansara</u></th>
                <th><u>Kiara Walk</u></th>
                <th><u>Seni Mont Kiara</u></th>
            </tr>
    
            <tr>
                <td>No.9, Jalan Teknologi, Taman Sains Selangor, PJU 5, Kota Damansara, 47810 Petaling Jaya, Selangor, Malaysia.</td>
                <td>Lot No. D-B1-1B, Kiara Walk, Kiara Designer Suites, No. 18, Jalan Kiara 3, Mont Kiara, 50480 Kuala Lumpur, Malaysia.</td>
                <td>LG3-2, Seni Mont Kiara, Changkat Duta Kiara, Mont Kiara, 50480 Kuala Lumpur, Malaysia.</td>
            </tr>
    
            <tr>
                <th><u>Asia Pacific University (APU)</u></th>
                <th><u>MSU Shah Alam</u></th>
                <th><u>Tunku Abdul Rahman (TAR) UMT</u></th>
            </tr>
    
            <tr>
                <td>Ground Floor, Block J1, Asia Pacific University, Technology Park Malaysia, Bukit Jalil, 57000 Kuala Lumpur, Wilayah Persekutuan Kuala Lumpur, Malaysia.</td>
                <td>S0204 & S0205, University Drive, Off Persiaran Olahraga, Section 13, 40100 Shah Alam, Selangor, Malaysia.</td>
                <td>G/S11, Red Bricks Cafeteria, Tunku Abdul Rahman University of Management and Technology (TAR UMT), Jalan Genting Kelang, Setapak, 53300 Kuala Lumpur.</td>
            </tr>
    
        </table>
    </div>




 <!--
    - FOOTER
  -->

  <footer>

    <div class="footer-nav">

      <div class="container">

        <!--follow us-->
        <ul class="footer-nav-list">

          <li class="footer-nav-item">
            <h2 class="nav-title">CONNECT WITH US</h2>
          </li>

          <li>
            <ul class="social-link">

              <li class="footer-nav-item">
                <a href="#" class="footer-nav-link">
                  <ion-icon name="logo-instagram"></ion-icon>
                  <p>@BilaBilaMart</p>
                </a>
              </li>

              <li class="footer-nav-item">
                <a href="#" class="footer-nav-link">
                  <p>@BilaBilaMart</p>
                </a>
              </li>

            </ul>
          </li>
          <ul class="social-link">

            <li class="footer-nav-item">
              <a href="#" class="footer-nav-link">
                <ion-icon name="logo-facebook"></ion-icon>
                <p>@BilaBilaMart</p>
              </a>
            </li>

          </ul>
        </ul>

        <!--contact-->
        <ul class="footer-nav-list">

          <li class="footer-nav-item">
            <h2 class="nav-title">Contact</h2>
          </li>

          <li class="footer-nav-item flex">
            <div class="icon-box">
              <ion-icon name="phone-portrait-outline"></ion-icon> <!-- Mobile phone outline -->
            </div>


            <a href="tel:+6011-234-0021" class="footer-nav-link">011 234 0021</a>
          </li>

          <li class="footer-nav-item flex">
            <div class="icon-box">
              <ion-icon name="call-outline"></ion-icon> <!-- telephone icon -->
            </div>

            <a href="tel:+603-2241-6634" class="footer-nav-link">03 2241 6634</a>
          </li>

        </ul>


        <!--products-->
        <ul class="footer-nav-list">
        
          <li class="footer-nav-item">
            <h2 class="nav-title">Products</h2>
          </li>
        
          <li class="footer-nav-item">
            <a href="#" class="footer-nav-link">Prices drop</a>
          </li>
        
          <li class="footer-nav-item">
            <a href="#" class="footer-nav-link">New products</a>
          </li>
        
          <li class="footer-nav-item">
            <a href="#" class="footer-nav-link">Best sales</a>
          </li>
        
          <li class="footer-nav-item">
            <a href="#" class="footer-nav-link">Contact us</a>
          </li>
        
          <li class="footer-nav-item">
            <a href="#" class="footer-nav-link">Sitemap</a>
          </li>
        
        </ul>



      </div>

    </div>

  </footer>



  

  <!--
    - custom js link
  -->
  <script src="./assets/js/script.js"></script>
  <script src="https://unpkg.com/ionicons@5.5.2/dist/ionicons.js"></script>

  <!--
    - ionicon link
  -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>













  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>

  <script type="text/javascript">
  $(document).ready(function() {

    // Send product details in the server
    $(".addItemBtn").click(function(e) {
      e.preventDefault();
      var $form = $(this).closest(".form-submit");
      var pid = $form.find(".pid").val();
      var pname = $form.find(".pname").val();
      var pprice = $form.find(".pprice").val();
      var pimage = $form.find(".pimage").val();
      var pcode = $form.find(".pcode").val();

      var pqty = $form.find(".pqty").val();

      $.ajax({
        url: 'action.php',
        method: 'post',
        data: {
          pid: pid,
          pname: pname,
          pprice: pprice,
          pqty: pqty,
          pimage: pimage,
          pcode: pcode
        },
        success: function(response) {
          $("#message").html(response);
          window.scrollTo(0, 0);
          load_cart_item_number();
        }
      });
    });
    load_cart_item_number();

    function load_cart_item_number() {
      $.ajax({
        url: 'action.php',
        method: 'get',
        data: {
          cartItem: "cart_item"
        },
        success: function(response) {
          $("#cart-item").html(response);
        }
      });
    }
  });
  </script>
</body>

</html>
