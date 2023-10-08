<?php  

// Start session
session_start();

// Create instance of CreateDb class
require_once('php-guts/CreateDb.php');
$database = new CreateDb();

// Get product id from url
$product_id = $_GET['id'];

// Get product data from database
$result = $database->getProduct($product_id);
while($row = mysqli_fetch_assoc($result)) {
   //get standard data
   $product_id = $row['id'];
   $product_name = $row['product_name'];
   $product_price = $row['product_price'];
   $product_type = $row['product_type'];
   $product_quantity = $row['product_quantity'];
   $product_sizes = $database->getSizes($product_id);
   //get images to array
   $product_images = $row['product_images'];
   $product_images_array = explode(",",$product_images);
   $product_img = $product_images_array[0];
}


// Check product type to choose product icon
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

// Add to cart
if(isset($_POST['add_to_cart'])) {

   $item_array = array(
      'product_id' => $_POST['product_id'],
      'product_name' => $_POST['product_name'],
      'product_price' => $_POST['product_price'],
      'product_size' => $_POST['product_size'],
      'product_img' => $_POST['product_img']
   );

   //check if cart is already created
   if(isset($_SESSION['cart'])) {
      $item_array_id = array_column($_SESSION['cart'], "product_id");
      //chech if this product is already in cart
      if(in_array($_POST['product_id'], $item_array_id)) {
         echo '<script>alert("This product is already in cart")</script>';
      } else {
         echo '<script>console.log("is not in cart")</script>';
         array_push($_SESSION['cart'], $item_array);
      }
   } else {
      //create new session variable for cart
      $_SESSION['cart'] = array();
      //add product to cart
      array_push($_SESSION['cart'], $item_array);
   }
}

?>



<!DOCTYPE html>
<html lang="pl">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title><?php echo $product_name; ?> | Ballin.pl</title>

   <!-- LINK CSS -->
   <link rel="stylesheet" href="assets/css/main.css">
   <link rel="stylesheet" href="assets/css/character.css">

</head>
<body>

<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>


<!------------------------>
<!------- DESKTOP -------->
<!------------------------>

<?php include 'website-parts/desktop.php'; ?>



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
                  <img class="window-container-icon" <?php echo $product_icon ?> alt="Ikonka produktu">
               </div>            
               <button class="window-container-close-icon">
                  <img src="assets/img/icons/close-small.svg" alt="Ikonka zamknij">
               </button>
            </div>

            <div class="white-window-container product-images">
               <img class="product-img product-current-image" src="<?php echo $product_images_array[0] ?>" alt="Zdjęcie produktu <?php $product_name ?>">
               <button class="arrow-btn arrow-left"><img src="assets/img/elem-parts/product-img-slider-arrow-left.svg" alt="strzałka w lewo"></button>
               <button class="arrow-btn arrow-right"><img src="assets/img/elem-parts/product-img-slider-arrow-right.svg" alt="strzałka w prawo"></button>
            </div>

            <div class="default-product-data">
               <div class="default-product-quantity"><?php if($product_quantity>0) echo 'available'; else echo 'inaccessible'; ?></div>
               <div class="default-product-price"><?php echo $product_price ?> PLN<img class="corner" src="assets/img/elem-parts/corner.svg"></div>
            </div>

         </div>


         <!-- Related products -->
         <div class="related-products">

            <div class="window-container small product-ratio">

               <div class="window-container-topbar">
                  <div class="window-container-topbar-left">
                     <img class="window-container-icon" <?php echo $product_icon ?> alt="Ikonka produktu">
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
                     <img class="window-container-icon" <?php echo $product_icon ?> alt="Ikonka produktu">
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
                     <span>Price <?php echo $product_price ?></span>
                     <span>Stock <?php echo $product_quantity ?></span>
                     <span>Apiece 1</span>
                  </div>
                  <form class="character-buttons" id="add-to-cart-form" method="POST">
                     <select name="product_size" id="product-size" class="btn-primary" required>
                        <option value="" disabled selected>XS/S/M/L/XL</option>
                        <option value="XS" <?php if($product_sizes['xs']<=0) echo 'disabled'; ?>>XS</option>
                        <option value="S"<?php if($product_sizes['s']<=0) echo 'disabled'; ?>>S</option>
                        <option value="M"<?php if($product_sizes['m']<=0) echo 'disabled'; ?>>M</option>
                        <option value="L"<?php if($product_sizes['l']<=0) echo 'disabled'; ?>>L</option>
                        <option value="XL"<?php if($product_sizes['xl']<=0) echo 'disabled'; ?>>XL</option>                        
                     </select>
                     <input type="hidden" value="<?php echo $product_id ?>" name="product_id">
                     <input type="hidden" value="<?php echo $product_name ?>" name="product_name">
                     <input type="hidden" value="<?php echo $product_price ?>" name="product_price">
                     <input type="hidden" value="<?php echo $product_img ?>" name="product_img">
                     <button class="btn-secondary" type="submit" name="add_to_cart">
                        Add to cart
                     </button>
                  </form>
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

                           <?php

                              //Check product type to choose product description
                              switch ($product_type) {
                                 case 't-shirt':
                                    $product_descripiton = '
                                       <!-- T-shirt description -->
                                       <h3>Szyte w Polsce, dzięki czemu masz pewność co do jakości wykończenia</h3>

                                       <ul>
                                          <li>100% bawełna dla Twojej wygody</li>
                                          <li>Krój oversize z opuszczonymi ramionami, który pomoże Ci wyróżnić się z tłumu</li>
                                          <li>U góry wykończone ściągaczem dla większej elegancji</li>
                                          <li>Wysokiej jakości nadruk, którego żadne pranie nie zniszczy</li>
                                          <li>Limitowana ilość żebyś mógł/mogła poczuć się jeszcze bardziej wyjątkowo</li>
                                       </ul>
                                    ';
                                    break;
                                 case 'blouse':
                                    $product_descripiton = '
                                       <!-- Blouse description -->
                                       <h3>Szyte w Polsce, dzięki czemu masz pewność co do jakości wykończenia</h3>
            
                                       <ul>
                                          <li>80% bawełny i 20% poliestru żeby bluza była wytrzymała i służyła Ci jak najdłużej</li>
                                          <li>Krój oversize z opuszczonymi ramionami, który pomoże Ci wyróżnić się z tłumu</li>
                                          <li>Kaptur i kieszeń kangurka z przodu</li>
                                          <li>Na dole wykończone ściągaczem dla większej elegancji</li>
                                          <li>Wysokiej jakości nadruk, którego żadne pranie nie zniszczy</li>
                                          <li>Limitowana ilość żebyś mógł/mogła poczuć się jeszcze bardziej wyjątkowo</li>
                                       </ul>
                                    ';
                                    break;
                                 case 'cap':
                                    $product_descripiton = '
                                       <!-- Cap description -->            
                                       <ul>
                                          <li>Czarna czapka z daszkiem</li>
                                          <li>Regulowana z tyłu</li>
                                          <li>Wysokiej jakości, trwały haft z przodu.</li>
                                       </ul>
                                    ';
                                    break;
                              }
                              echo $product_descripiton;

                           ?>
                           

                        </div>
                        
                        <!-- sizes tab -->
                        <div class="product-info-content product-sizes">
                           <?php
                              //Check product type to choose product description
                              switch ($product_type) {
                                 case 't-shirt':
                                    $product_sizes = '
                                       <img class="sizes-table" src="assets/img/graphics/sizes-table-tshirt.svg" alt="Tabela rozmiarów">
                                       <img class="sizes-measure" src="assets/img/graphics/sizes-measure-tshirt.svg" alt="Instrukcja pomiaru wymiarów">
                                    ';
                                    break;
                                 case 'blouse':
                                    $product_sizes = '
                                       <img class="sizes-table" src="assets/img/graphics/sizes-table-blouse.svg" alt="Tabela rozmiarów">
                                       <img class="sizes-measure" src="assets/img/graphics/sizes-measure-blouse.svg" alt="Instrukcja pomiaru wymiarów">
                                    ';
                                    break;
                                 case 'cap':
                                    $product_sizes = '
                                       <img class="sizes-table" src="assets/img/graphics/sizes-table-blouse.svg" alt="Tabela rozmiarów">
                                       <img class="sizes-measure" src="assets/img/graphics/sizes-measure-blouse.svg" alt="Instrukcja pomiaru wymiarów">
                                    ';
                                    break;
                              }
                              echo $product_sizes;
                           ?>
                        </div>
                        
                        <!-- shipping tab -->
                        <div class="product-info-content product-shipping">

                           <p>Zamówienia realizujemy do 2 dni roboczych, zwykle trwa to poniżej 24h.</p>

                           <h3>1. Jaki jest czas dostawy?</h3>

                           <p>Kurier dostarcza paczki w ciągu 1-2 dni roboczych. Dokładamy wszelkich starań, aby Twoje zamówienie dotarło do Ciebie jak najszybciej.</p>

                           <h3>2. Jakie są dostępne formy wysyłki?</h3>

                           <ul>
                              <li>paczkomaty InPost</li>
                              <li>kurier DPD</li>
                              <li>kurier DHL</li>
                           </ul>

                           <p>Doskonale rozumiemy, że każdy ma jakieś doświadczenia z firmami kurierskimi dlatego u nas to Ty wybierasz najbardziej dogodną dla siebie opcję.</p>

                           <h3>3. Jaki jest koszt wysyłki?</h3>

                           <p>Dla wszystkich przewoźników jest on taki sam i wynosi 12 zł. Wysyłka jest darmowa dla zamówień powyżej 300 zł.</p>

                           <h3>4. Jak mogę śledzić swoje zamówienie?</h3>

                           <p>W momencie wysyłki zamówienia otrzymujesz e-mail z numerem do śledzenia paczki. Dzięki temu możesz sprawdzić aktualny status przesyłki.</p>

                        </div>
                        
                        <!-- return tab -->
                        <div class="product-info-content product-return">

                           <p>Zależy nam na Twojej pełnej satysfakcji, dlatego zakupiony produkt możesz bez problemu zwrócić do 20 dni roboczych od dnia otrzymania zamówienia.</p>

                           <h3>1. Jak dokonać zwrotu?</h3>

                           <ul>
                              <li>Upewnij się, że zwracany produkt nie nosi żadnych śladów użytkowania lub uszkodzeń, a także zawiera oryginalne metki, opakowanie i dowód zakupu</li>
                              <li>Wypełnij formularz zwrotu i umieść go w paczce</li>
                              <li>Wyślij do nas paczkę za pośrednictwem wybranego przez siebie przewoźnika</li>
                           </ul>

                           <p>Pieniądze zostaną Ci zwrócone natychmiastowo po rozpatrzeniu reklamacji.</p>

                           <h3>2. Ile dni mam na zwrot?</h3>

                           <p>Jesteśmy pewni swojej jakości, dlatego dajemy Ci aż 20 dni roboczych na zrobienie zwrotu.</p>

                           <h3>3. Kiedy otrzymam zwrot pieniędzy?</h3>

                           <p>Pieniądze zwracamy w ciągu 14 dni roboczych. Zazwyczaj trwa to jednak znacznie krócej, ponieważ od razu po rozpatrzeniu zwrotu zlecamy wypłatę środków.</p>

                           <h3>4. Na jakie dane nadać przesyłkę zwrotną i kto ją opłaca?</h3>

                           <p>Paczkę wyślij na adres:<br>
                           „BALLIN MOB Marcin Barłowski”<br>
                           ul. Łukasińskiego 30A/10<br>
                           71-215 Szczecin<br>
                           tel. 723932079</p>

                           <p>Zwrot kosztów obejmuje cenę produktu, jak i pierwszej wysyłki. Koszt wysyłki zwrotnej pokrywa klient.</p>

                           <h3>5. Gdzie znajdę formularz zwrotu?</h3>

                           <p>Formularz zwrotu do pobrania znajdziesz po tym linkiem. Jeśli nie masz możliwości wydrukowania go, napisz do nas, a zrobimy to online.</p>

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

<!-- Additional JS -->
<script src="assets/js/character.js"></script>

<!-- On page JavaScript -->
<script>

   window.onload = (event) => {
      // Product images slider
      const arrowLeft = document.querySelector('.arrow-left img');
      const arrowRight = document.querySelector('.arrow-right');
      const currentImage = document.querySelector('.product-current-image');
      const productImages = <?php echo json_encode($product_images_array) ?>;

      let imgCount = 0;

      arrowLeft.addEventListener('click', function() {
         if(imgCount == 0) {
            imgCount = productImages.length - 1;
            console.log(imgCount);
         }
         else imgCount--;
         currentImage.src = productImages[imgCount];
      });

      arrowRight.addEventListener('click', function() {
         if(imgCount == (productImages.length - 1)) {
            imgCount = 0;
            console.log(imgCount);
         }
         else imgCount++;
         currentImage.src = productImages[imgCount];
      });
   }

</script>

</body>
</html>