<!DOCTYPE html>
<html lang="pl">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Thank you | Ballin.pl</title>

   <!-- LINK CSS -->
   <link rel="stylesheet" href="assets/css/main.css">
   <link rel="stylesheet" href="assets/css/thank-you.css">

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



   <!---------------------->
   <!------- PAINT -------->
   <!---------------------->

   <div class="content-container content-container-block no-scrollbar-container">

         <div class="window-container big app-container">
            <div class="window-container-topbar">
               <div class="window-container-topbar-left">
                  <img class="window-container-icon" src="assets/img/icons/paint-icon.svg" alt="Ikonka produktu">
                  Untitled
               </div>
               <div class="window-container-icons">
                  <img class="window-container-close-icon" src="assets/img/icons/minimize.svg" alt="Ikonka zamknij">
                  <img class="window-container-close-icon" src="assets/img/icons//maximize.svg" alt="Ikonka zamknij">
                  <img class="window-container-close-icon" src="assets/img/icons/close-small.svg" alt="Ikonka zamknij">
               </div>
            </div>

            <p class="app-tabs">
               <span>Thank</span>
               <span>For</span>
               <span>Your</span>
               <span>Support</span>
            </p>

            <div class="paint-working-part">
               <div class="paint-main">
                  <div class="paint-tools"><img src="assets/img/elem-parts/paint-toolbar.svg" alt="Pasek narzędzi paint"></div>
                  <div class="paint-canvas white-window-container">
                     <img class="canvas-drawing" src="assets/img/elem-parts/paint-drawing.svg" alt="We will arive soon">
                     <img class="canvas-writing" src="assets/img/elem-parts/paint-writing.svg" alt="Check your e-mail">
                  </div>
               </div>
               <div class="paint-colors"><img src="assets/img/elem-parts/paint-colors.svg" alt="Pasek kolorów paint"></div>
            </div>

            <div class="default-product-data">
               <div class="default-product-price dpp-1"> Contact us if you have any questions</div>
               <div class="default-product-price dpp-2"></div>
               <div class="default-product-price dpp-3"></div>
               <img class="corner" src="assets/img/elem-parts/corner.svg">
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