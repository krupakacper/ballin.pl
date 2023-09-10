<!DOCTYPE html>
<html lang="pl">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Shop | Ballin.pl</title>

   <!-- LINK CSS -->
   <link rel="stylesheet" href="assets/css/main.css">

</head>
<body>


<!------------------------>
<!------- DESKTOP -------->
<!------------------------>

<div class="desktop">

   <div class="desktop-folders">
      <div class="desktop-folder menu-folder">
         <img class="cart-desktop-folder" src="assets/img/elem-parts/menu.webp" alt="Ikonka menu">
         <span>Menu</span>
      </div>
         
      <div class="desktop-folder cart-folder" id="cart-folder">
         <img class="cart-desktop-folder" src="assets/img/elem-parts/cart-empty.webp" alt="Ikonka pustego koszyka">
         <span>Orders</span>
      </div>
   </div>

   <!-- empty cart warning -->
   <dialog id="empty-cart-modal">
      <div class="window-container-topbar">
         <div class="window-container-topbar-left">
            Warning
         </div>
         <button class="window-container-close-icon" id="close-empty-cart-modal">
            <img src="assets/img/icons/close-small.svg" alt="Ikonka zamknij">
         </button>
      </div>
      <div class="empty-cart-modal-content">
         <p>
            <img src="assets/img/icons/access-denied-icon.svg" alt="Ikonka odmowy dostępu">
            Access is denied. Your cart is empty.
         </p>
         <button class="btn-primary btn-primary-dashed" id="close-empty-cart-modal">OK</button>
      </div>
   </dialog>



   <!--------------------->
   <!------- SHOP -------->
   <!--------------------->

   <div class="content-container no-scrollbar-container">

         <div class="window-container big product-ratio">
            <div class="window-container-topbar">
                  <img class="window-container-icon" src="assets/img/icons/clothes/t-shirt-violet.svg" alt="Ikonka produktu">
                  <img class="window-container-close-icon" src="assets/img/icons/close-small.svg" alt="Ikonka zamknij">
            </div>
            <a href="character.php" class="white-window-container"></a>            
            <div class="default-product-data">
               <div class="default-product-quantity">available</div>
               <div class="default-product-price">300 PLN<img class="corner" src="assets/img/elem-parts/corner.svg"></div>
            </div>
         </div>

         <div class="window-container big product-ratio">
            <div class="window-container-topbar">
                  <img class="window-container-icon" src="assets/img/icons/clothes/hoodie-yellow.svg" alt="Ikonka produktu">
                  <img class="window-container-close-icon" src="assets/img/icons/close-small.svg" alt="Ikonka zamknij">
            </div>
            <a href="character.php" class="white-window-container"></a>            
            <div class="default-product-data">
               <div class="default-product-quantity">available</div>
               <div class="default-product-price">620 PLN<img class="corner" src="assets/img/elem-parts/corner.svg"></div>
            </div>
         </div>

         <div class="window-container big product-ratio">
            <div class="window-container-topbar">
                  <img class="window-container-icon" src="assets/img/icons/clothes/poliver-blue.svg" alt="Ikonka produktu">
                  <img class="window-container-close-icon" src="assets/img/icons/close-small.svg" alt="Ikonka zamknij">
            </div>
            <a href="character.php" class="white-window-container"></a>  
            <div class="default-product-data">
               <div class="default-product-quantity">available</div>
               <div class="default-product-price">450 PLN<img class="corner" src="assets/img/elem-parts/corner.svg"></div>
            </div>
         </div>

         <div class="window-container big product-ratio">
            <div class="window-container-topbar">
                  <img class="window-container-icon" src="assets/img/icons/clothes/cap-red.svg" alt="Ikonka produktu">
                  <img class="window-container-close-icon" src="assets/img/icons/close-small.svg" alt="Ikonka zamknij">
            </div>
            <a href="character.php" class="white-window-container"></a>  
            <div class="default-product-data">
               <div class="default-product-quantity">available</div>
               <div class="default-product-price">130 PLN<img class="corner" src="assets/img/elem-parts/corner.svg"></div>
            </div>
         </div>

         <div class="window-container big product-ratio">
            <div class="window-container-topbar">
                  <img class="window-container-icon" src="assets/img/icons/clothes/cap-yellow.svg" alt="Ikonka produktu">
                  <img class="window-container-close-icon" src="assets/img/icons/close-small.svg" alt="Ikonka zamknij">
            </div>
            <a href="character.php" class="white-window-container"></a>  
            <div class="default-product-data">
               <div class="default-product-quantity">available</div>
               <div class="default-product-price">180 PLN<img class="corner" src="assets/img/elem-parts/corner.svg"></div>
            </div>
         </div>

         <div class="window-container big product-ratio">
            <div class="window-container-topbar">
                  <img class="window-container-icon" src="assets/img/icons/clothes/t-shirt-blue.svg" alt="Ikonka produktu">
                  <img class="window-container-close-icon" src="assets/img/icons/close-small.svg" alt="Ikonka zamknij">
            </div>
            <a href="character.php" class="white-window-container"></a>  
            <div class="default-product-data">
               <div class="default-product-quantity">available</div>
               <div class="default-product-price">295 PLN<img class="corner" src="assets/img/elem-parts/corner.svg"></div>
            </div>
         </div>

      </div>

   </div>

   

   <!------------------------------->
   <!------- FOOTER TOOLBAR -------->
   <!------------------------------->

   <?php include 'website-parts/footer.php'; ?>

</div>


<script src="assets/js/main.js"></script>

</body>
</html>