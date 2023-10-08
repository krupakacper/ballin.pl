<?php

function shop_component($product_name = '', $product_price = 0, $product_id = null, $product_type = '', $product_img = '', $product_quantity = 0) {
   
   //Check if product is available
   if($product_quantity>0) $availability = 'available'; else $availability = 'inaccessible';

   //Check product type to choose product icon
   switch ($product_type) {
         case 't-shirt':
            $product_icon = 'src="assets/img/icons/clothes/t-shirt-yellow.svg"';
            break;
         case 'blouse':
            $product_icon = 'src="assets/img/icons/clothes/blouse-violet.svg"';
            break;
         case 'cap':
            $product_icon = 'src="assets/img/icons/clothes/cap-red.svg"';
            break;
   }

   //Element code
   $element = '
      <div class="window-container big product-ratio">
         <div class="window-container-topbar">
            <div class="window-container-topbar-left">
               <img class="window-container-icon" '.$product_icon.' alt="Ikonka produktu">
            </div>            
            <button class="window-container-close-icon">
               <img src="assets/img/icons/close-small.svg" alt="Ikonka zamknij">
            </button>
         </div>
         <a href="character.php?product='.$product_name.'&id='.$product_id.'" class="white-window-container">
            <img class="product-img" src="'.$product_img.'" alt="Zdjęcie produktu '.$product_name.'"/>
         </a>            
         <div class="default-product-data">
            <div class="default-product-quantity">'.$availability.'</div>
            <div class="default-product-price">'.$product_price.' PLN<img class="corner" src="assets/img/elem-parts/corner.svg"></div>
         </div>
      </div>
   ';

   echo $element;

}

function twitter_component($product_tw_prof = '', $product_tw_img = 0, $product_price = 0, $product_quantity = 0) {
   $element = '
      <div class="twitter-post">

         <div class="twitter-post-topbar">
            <div class="twitter-profile-img"><img src="'.$product_tw_prof.'" alt="Twitter profile image"></div>
            <img class="twitter-more-dots" src="assets/img/icons/three-dots.svg" alt="Ikonka więcej">
         </div>

         <a class="twitter-post-img" href="character.php"><img src="'.$product_tw_img.'" alt="Twitter product post image"></a>

         <footer class="twitter-post-footer">
            <div class="twitter-footer-col twitter-price">
               <img src="assets/img/icons/price-icon.svg" alt="Ikona ceny">
               '.$product_price.'
            </div>
            <div class="twitter-footer-col twitter-quantity">
               <img src="assets/img/icons/box.svg" alt="Ikona ilości produktów">
               '.$product_quantity.'
            </div>
            <div class="twitter-footer-col twitter-person">
               <img src="assets/img/icons/person-icon.svg" alt="Ikona ilości zakupów">
               1
            </div>
         </footer>

      </div>
   ';
   echo $element;

}

function cart_product_component($product_id = null, $product_name = '', $product_img = '') {
   $element = '
      <form class="product" id="cart-product" action="cart.php?action=remove&id='.$product_id.'" method="post">
         <div class="product-left">
            <img src="'.$product_img.'" alt="Zdjęcie produktu '.$product_id.'">
            '.$product_name.'
         </div>
         <button class="btn-primary cart-delete-btn" type="submit">
            Delete
         </button>
      </form>
   ';
   echo $element;
}

function cart_product_data_component($product_id = null, $product_size = '', $product_price = 0) {
   $element = '
   <tr><td class="icon-cell"><img src="assets/img/icons/cart/size-icon.svg" alt="Rozmiar">Size</td><td>'.$product_size.'</td></tr>
   <tr><td class="icon-cell"><img src="assets/img/icons/cart/quantity-icon.svg" alt="Ilość">Quantity</td><td>1</td></tr>
   <tr class="not-dashed-border-row"><td class="icon-cell"><img src="assets/img/icons/cart/price-icon.svg" alt="Cena">Price</td><td>'.$product_price.'</td></tr>
   ';
   echo $element;
}

function explorer_component($product_id = null, $product_name = '', $product_img = '') {

   //Element code
   $element = '
      <a href="character.php?product='.$product_name.'&id='.$product_id.'" class="explorer-product">
         <img class="product-img" src="'.$product_img.'" alt="Explore '.$product_name.'"/>
      </a>
   ';

   return $element;

}

?>