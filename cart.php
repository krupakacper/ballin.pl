<?php

session_start();

require_once('php-guts/CreateDb.php');
require_once('php-guts/components.php');

// create instance of CreateDb class
$database = new CreateDb();

if(isset($_GET['action'])) {
   if($_GET['action'] == 'remove') {
      foreach($_SESSION['cart'] as $key => $value) {
         if($value['product_id'] == $_GET['id']) {
            unset($_SESSION['cart'][$key]);
            $_SESSION['cart'] = array_values($_SESSION['cart']);
            echo '<script>window.location = "cart.php"</script>';
         }
      }
      if(count($_SESSION['cart']) == 0){
         unset($_SESSION['cart']);
      }
   }
}

?>

<!DOCTYPE html>
<html lang="pl">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Cart | Ballin.pl</title>

   <!-- LINK CSS -->
   <link rel="stylesheet" href="assets/css/main.css">
   <link rel="stylesheet" href="assets/css/cart.css">

</head>
<body>


<!------------------------>
<!------- DESKTOP -------->
<!------------------------>

<?php include 'website-parts/desktop.php'; ?>



   <!--------------------->
   <!------- CART -------->
   <!--------------------->

   <div class="content-container no-scrollbar-container" id="cart-form">


      <!------- SHIPPING.EXE -------->

      <form class="window-container big client-data-form">

         <!-- topbar -->
         <div class="window-container-topbar">
            <div class="window-container-topbar-left">
               Shipping.exe
            </div>
            <img class="window-container-close-icon" src="assets/img/icons/close-small.svg" alt="Ikonka zamknij">
         </div>


         <div class="cart-form-order-data">


            <!-- row 1 -->
            <div class="cart-form-row">
               <p><img src="assets/img/icons/order-data-icon.svg" alt="Dane zamówienia ikonka">
               Dane zamówienia</p>
            </div>


            <!-- row 2 -->
            <div class="cart-form-row">
               <label for="name"><span>Name:</span><input id="name" type="text" name="name"></label>
               <label for="last-name"><span>Last name:</span><input id="last-name" type="text" name="last_name"></label>
            </div>


            <!-- row 3 -->
            <div class="cart-form-row">
               <label for="street"><span>Street:</span><input id="street" type="text" name="street"></label>
               <label for="postal-code"><span>Postal code:</span><input id="postal-code" type="text" name="postal_code"></label>
               <label for="city"><span>City:</span><input id="city" type="text" name="city"></label>
            </div>  


            <!-- row 4 -->
            <div class="cart-form-row">
               <label for="phone"><span>Phone:</span><input id="phone" type="tel" name="phone"></label>
               <label for="email"><span>Email:</span><input id="email" type="email" name="email"></label>
            </div> 


            <!-- row 5 -->
            <div class="cart-form-row shipping-method">

               <p>Choose shipping method:</p>

               <fieldset id="shipping-method">
                  <label for="shippingMethod1"><input type="radio" id="shippingMethod1" name="shipping_method" value="Paczkomat InPost">Paczkomat InPost</label>   
                  <label for="shippingMethod2"><input type="radio" id="shippingMethod2" name="shipping_method" value="DPD">DPD</label>
                  <label for="shippingMethod3"><input type="radio" id="shippingMethod3" name="shipping_method" value="DHL">DHL</label>
               </fieldset>
               

            </div> 


            <!-- row 6 -->
            <div class="cart-form-row">

               <label for="order-notes">Order notes (optional):</label>

               <textarea id="order-notes" name="order_notes" rows="5" style="resize: vertical" placeholder="np. numer paczkomatu"></textarea>

            </div>              


         </div>

      </form>

      
      <!-- CART COLLUMN 2 -->
      <div class="cart-col-2">

         
         <!------- PRODUCT.EXE -------->
         <div class="window-container big">

            <!-- topbar -->
            <div class="window-container-topbar">
               <div class="window-container-topbar-left">
                  Product.exe
               </div>
               <img class="window-container-close-icon" src="assets/img/icons/close-small.svg" alt="Ikonka zamknij">
            </div>           

            <div class="cart-form-order-data">
               <p class="cart-product-name">Justice Hoodie</p>

               <div class="cart-products-container">

                  <div class="white-window-container cart-products">
                     
                  <?php 
                     //display all products in cart and count total
                     $total = 12; //12 is charge for delivery
                     //create array of products for creating order
                     $order_products = array();
                     if(isset($_SESSION['cart']) && count($_SESSION['cart'])>0){
                        $count = count($_SESSION['cart']);
                        for($i=0;$i<$count;$i++) {
                           cart_product_component($_SESSION['cart'][$i]['product_id'], $_SESSION['cart'][$i]['product_name'], $_SESSION['cart'][$i]['product_img']);
                           $total += $_SESSION['cart'][$i]['product_price'];
                           //push the product to order array
                           $product = array(
                              'name' => $_SESSION['cart'][$i]['product_name'],
                              'size' => $_SESSION['cart'][$i]['product_size'],
                              'price' => $_SESSION['cart'][$i]['product_price'],
                              'id' => $_SESSION['cart'][$i]['product_id']
                           );
                           array_push($order_products, $product);
                        }
                     }
                     else echo 'Cart is empty';
                  ?>

                  </div>
                  
                  <div class="white-window-container white-window-container-100h cart-product-details">
                     <table>
                        <tr class="table-header"><th class="table-header-col1">Name</th><th class="table-header-col2">Data</th></tr>

                        <tr><td class="icon-cell"><img src="assets/img/icons/cart/size-icon.svg" alt="Rozmiar">Size</td><td class="size">-</td></tr>
                        <tr><td class="icon-cell"><img src="assets/img/icons/cart/quantity-icon.svg" alt="Ilość">Quantity</td><td>1</td></tr>
                        <tr class="not-dashed-border-row"><td class="icon-cell"><img src="assets/img/icons/cart/price-icon.svg" alt="Cena">Price</td><td class="price">-</td></tr>

                        <tr class="dashed-border-row"><td class="icon-cell"><img src="assets/img/icons/cart/shipping-icon.svg" alt="Dostawa">Shipping</td><td>12</td></tr>
                        <tr><td class="icon-cell"><img src="assets/img/icons/cart/total-icon.svg" alt="Razem">Total</td><td>
                           <?php
                              //count total
                              if(isset($_SESSION['cart'])) {
                                 echo $total;
                              }
                              else echo '-';
                           ?>
                        </td></tr>
                     </table>
                  </div>

               </div>
            </div>

            <div class="default-product-data">
               <div class="default-product-price"><img class="corner" src="assets/img/elem-parts/corner.svg"></div>
            </div>

         </div>

         
         <!------- PAYMENT.EXE -------->
         <form class="window-container big payment-form">

            <!-- topbar -->
            <div class="window-container-topbar">
               <div class="window-container-topbar-left">
                  Payment.exe
               </div>
               <img class="window-container-close-icon" src="assets/img/icons/close-small.svg" alt="Ikonka zamknij">
            </div>    
            
            <div class="cart-form-order-data">
               <!-- payment method -->
               <div class="payment-method-row">
                  <img src="assets/img/graphics/paperclip.webp" alt="Spinacz z Worda">

                  <div class="payment-method">
                     <p>Choose payment method:</p>
                     
                     <fieldset id="payment-method">
                        <label for="paymentMethod1"><input type="radio" id="paymentMethod1" name="payment_method" value="Przelewy24">Przelewy24</label>                                   
                        <label for="paymentMethod2"><input type="radio" id="paymentMethod2" name="payment_method" value="PayPal">PayPal</label>                  
                        <label for="paymentMethod3"><input type="radio" id="paymentMethod3" name="payment_method" value="Przelew bankowy">Przelew bankowy</label>
                     </fieldset>
                     
                  </div>
               </div>
               
               <hr class="payment-exe-divider">
               <input type="hidden" id="total" name="total" value="<?php if(isset($_SESSION['cart'])) echo $total; ?>
               ">

               <!-- submit cart form -->
               <div class="cart-submit">
                  <div class="cart-checkbox-terms">
                     <label for="terms_n_condition"><input type="checkbox" name="terms_n_condition" id="terms_n_condition">I agree <a href="#">terms and condition</a>*</label>
                  </div>
                  <button class="btn-primary submit-btn" type="submit">
                     Place order
                  </button>
               </div>
            </div>

         </form>


      </div>

   </div>
   

   <!------------------------------->
   <!------- FOOTER TOOLBAR -------->
   <!------------------------------->

   <?php include 'website-parts/footer.php'; ?>
   


<!-- Default JS -->
<script src="assets/js/jquery.js"></script>
<script src="assets/js/main.js"></script>

<!-- Additional JS -->
<script src="assets/js/cart.js"></script>

<script>
   // Save products to session storage
   $(document).ready(function() {
      const products = <?php echo json_encode($order_products); ?>;
      sessionStorage.setItem('order_products', JSON.stringify(products));
   });   

   // Set up cart data
   const cart = <?php echo json_encode($_SESSION['cart']); ?>;
   console.log(cart);
   // document.querySelector('.product').classList.add('current-product');
   $('.product').first().addClass('current-product')
   $('.size').html(cart[0]['product_size']);
   $('.price').html(cart[0]['product_price']);
   // console.log($('.product')[0]);

   // Change displayed cart data
   $('.product').click(function(event) {
      index = $(this).index();

      //change current product
      $('.product').removeClass('current-product');
      $(this).addClass('current-product');

      //change displayed current product data
      $('.size').html(cart[index]['product_size']);
      $('.price').html(cart[index]['product_price']);
      

      //save info which tab was open last
      localStorage.setItem("LastCurrentProduct", index);
   });
</script>


</body>
</html>