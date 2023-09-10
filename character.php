<!DOCTYPE html>
<html lang="pl">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Product | Ballin.pl</title>

   <!-- LINK CSS -->
   <link rel="stylesheet" href="assets/css/main.css">
   <link rel="stylesheet" href="assets/css/product.css">

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



   <!-------------------------------->
   <!------- PRODUCT DETAILS -------->
   <!-------------------------------->

   <div class="content-container no-scrollbar-container">

      <!-- Products (images) -->
      <div class="products-boxes">


         <!-- Current product -->
         <div class="window-container big product-ratio">

            <div class="window-container-topbar">
               <div class="window-container-topbar-left">
                  <img class="window-container-icon" src="assets/img/icons/clothes/t-shirt-yellow.svg" alt="Ikonka produktu">
               </div>
               <!-- <img class="window-container-close-icon" src="assets/img/icons/close-small.svg" alt="Ikonka zamknij"> -->               
               <button class="window-container-close-icon">
                  <img src="assets/img/icons/close-small.svg" alt="Ikonka zamknij">
               </button>
            </div>

            <div class="white-window-container">

            </div>
            <div class="default-product-data">
               <div class="default-product-quantity">available</div>
               <div class="default-product-price">289 PLN<img class="corner" src="assets/img/elem-parts/corner.svg"></div>
            </div>

         </div>


         <!-- Related products -->
         <div class="related-products">

            <div class="window-container small product-ratio">

               <div class="window-container-topbar">
                  <div class="window-container-topbar-left">
                     <img class="window-container-icon" src="assets/img/icons/clothes/cap-blue.svg" alt="Ikonka produktu">
                  </div>
                  <img class="window-container-close-icon" src="assets/img/icons/close-small.svg" alt="Ikonka zamknij">
               </div>
   
               <div class="white-window-container">
   
               </div>
               <div class="default-product-data">
                  <div class="default-product-quantity default-product-data-empty"></div>
                  <div class="default-product-price default-product-data-empty"><img class="corner" src="assets/img/elem-parts/corner.svg"></div>
               </div>
   
            </div>

            <div class="window-container small product-ratio">

               <div class="window-container-topbar">
                  <div class="window-container-topbar-left">
                     <img class="window-container-icon" src="assets/img/icons/clothes/poliver-violet.svg" alt="Ikonka produktu">
                  </div>
                  <img class="window-container-close-icon" src="assets/img/icons/close-small.svg" alt="Ikonka zamknij">
               </div>
   
               <div class="white-window-container">
   
               </div>
               <div class="default-product-data">
                  <div class="default-product-quantity default-product-data-empty"></div>
                  <div class="default-product-price default-product-data-empty"><img class="corner" src="assets/img/elem-parts/corner.svg"></div>
               </div>
   
            </div>

         </div>


      </div>

      
      <!-- Details (character.exe) -->
      <div class="window-container big character-exe">

         <!-- topbar -->
         <div class="window-container-topbar">
            <div class="window-container-topbar-left">
               <img class="window-container-icon" src="assets/img/icons/character-icon.svg" alt="Ikonka produktu">
               Character.exe
            </div>
            <img class="window-container-close-icon" src="assets/img/icons/close-small.svg" alt="Ikonka zamknij">
         </div>


         <div class="character-data-container">


            <!-- row 1 -->
            <div class="character-row-1">
               name.surname
            </div>


            <!-- row 2 -->
            <div class="character-row-2">

               <div class="character-prof">
               </div>
               <div class="character-details">
                  <div class="character-prices">
                     <span>Price</span>
                     <span>Stock</span>
                     <span>Apiece</span>
                  </div>
                  <div class="character-buttons">
                     <button class="btn-primary">
                        XS/S/M/L/XL
                     </button>
                     <button class="btn-secondary">
                        Add to cart
                     </button>
                  </div>
               </div>

            </div>


            <!-- row 3 -->
            <div class="character-row-3">

               <div class="character-buttons character-info-tabs-buttons">
                  <button class="btn-primary">Opis</button>
                  <button class="btn-primary">Rozmiary</button>
                  <button class="btn-primary">Dostawa</button>
                  <button class="btn-primary">Zwrot</button>
               </div>

               <!-- white text box for product info -->
               <div class="product-info-container">
                  <div class="white-window-container white-window-container-100h">
                     <div class="product-info">
                        
                        <!-- description tab -->
                        <div class="product-info-content product-description">
                           <p>
                              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque nec neque nec nisl tempus consequat. Sed eget sapien vestibulum, aliquam felis ac, pulvinar nulla. Morbi pretium semper nunc, nec luctus sem sodales ut. Curabitur a posuere odio. Nam porta volutpat lacinia. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Pellentesque vel dignissim diam. Donec eu dui in augue elementum feugiat non nec elit. Integer aliquam, metus id consectetur viverra, enim dolor elementum ipsum, ac tincidunt nisi dui vitae enim. Donec tempus, sapien nec sodales elementum, augue nisl feugiat felis, quis blandit eros odio vel tellus. Maecenas lobortis dolor quis velit hendrerit, eu fringilla purus pellentesque. Nunc molestie est ut est finibus congue. Curabitur at tortor erat. Nulla faucibus, sem a scelerisque elementum, quam ligula maximus enim, quis finibus dui urna ut orci. In vitae tortor laoreet, cursus risus nec, dictum nulla. Nullam interdum elit a tellus faucibus placerat. Aliquam non justo eget felis luctus molestie vitae vel nisi. Curabitur in dui feugiat, porta urna sed, placerat augue. Nunc ac odio ullamcorper, finibus diam feugiat, tempor turpis. Maecenas non ipsum blandit, bibendum leo eget, ornare libero. Suspendisse potenti. Etiam vitae tortor tempus, malesuada libero ac, sodales nisl. Quisque volutpat turpis sit amet commodo placerat.
                           </p>
                        </div>
                        
                        <!-- sizes tab -->
                        <div class="product-info-content product-sizes">
                           <img class="sizes-table" src="assets/img/graphics/sizes-table.svg" alt="Tabela rozmiarów">
                           <img class="sizes-measure" src="assets/img/graphics/sizes-measure.svg" alt="Instrukcja pomiaru wymiarów">
                        </div>
                        
                        <!-- shipping tab -->
                        <div class="product-info-content product-shipping">
                           <p>Paczkomat InPost</p>
                           <p>Kurier DPD</p>
                           <p>Kurier DHL</p>
                        </div>
                        
                        <!-- return tab -->
                        <div class="product-info-content product-return">
                           <p>
                              Etiam tempor accumsan nisl, non bibendum dolor rhoncus sed. Suspendisse porttitor mi eu viverra fermentum. Curabitur lobortis massa in dolor hendrerit cursus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Vivamus pharetra tellus ante, vel tempor est imperdiet et. Aenean ornare sem velit, in tempus massa rhoncus quis. Fusce convallis velit lacinia, malesuada mauris vitae, commodo felis. Sed mauris urna, ultrices nec mattis nec, maximus in risus. Sed venenatis, lorem et vehicula auctor, lacus magna pellentesque odio, eu varius libero ligula id ex. Maecenas tempor libero ac magna ultricies condimentum. Vestibulum ac lacinia nulla. Nam a sollicitudin risus. Fusce dui augue, porttitor eget purus a, maximus dictum leo.
                           </p>
                        </div>
                        
                     </div>
                  </div> 
                  <div class="default-product-data">
                     <div class="default-product-quantity"></div>
                     <div class="default-product-price"><img class="corner" src="assets/img/elem-parts/corner.svg"></div>
                  </div>
               </div>
            </div>


         </div>

      </div>

   </div>
   

   <!------------------------------->
   <!------- FOOTER TOOLBAR -------->
   <!------------------------------->

   <?php include 'website-parts/footer.php'; ?>

</div>


<!-- Default JS -->
<script src="assets/js/jquery.js"></script>
<script src="assets/js/main.js"></script>

<!-- Additional JS -->
<script src="assets/js/product.js"></script>

</body>
</html>