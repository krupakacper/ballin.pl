<?php   

function cart_folder_empty() {
   $empty_cart = '
      <button class="desktop-folder cart-folder" id="cart-folder">
         <img class="cart-desktop-folder" src="assets/img/elem-parts/cart-empty.webp" alt="Ikonka menu">    
         <span>Orders</span>
      </button>

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
   ';
   echo $empty_cart;
}

function cart_folder_filled($count) {
   $filled_cart = '
      <button class="desktop-folder cart-folder" id="cart-folder">
         <a href="cart.php" style="display: flex; flex-direction: column; align-items: center; color: var(--white); text-decoration: none;">
            <span class="cart-count">'.$count.'</span>
            <img class="cart-desktop-folder" src="assets/img/elem-parts/cart-filled.webp" alt="Ikonka menu">   
            <span>Orders</span>
         </a>
      </button>
   ';
   echo $filled_cart;
}

?>

<div class="desktop">

      <button class="desktop-folder menu-folder" id="menu-folder">
         <img class="cart-desktop-folder" src="assets/img/elem-parts/menu.webp" alt="Ikonka menu">
         <span>Menu</span>
         <!-- desktop menu -->
         <div id="desktop-menu" class="window-container">
            <ul>
               <li><a href="shop.php">Shop</a></li>
               <li><a href="#">Sweatshirts</a></li>
               <li><a href="#">Tees</a></li>
               <li><a href="#">Caps</a></li>
               <li><a href="twitter.php">Characters</a></li>
               <li><a href="support.php">Support</a></li>
            </ul>
         </div>
      </button>
         
      <?php
         if(isset($_SESSION['cart'])) {
            $count = count($_SESSION['cart']);
            if($count>0) {
               cart_folder_filled($count);
            }
            else cart_folder_empty();
         }
         else cart_folder_empty();
      ?>
      

   <div class="website-wrapper no-scrollbar-container">