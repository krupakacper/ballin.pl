<?php

session_start();

require_once('php-guts/CreateDb.php');
require_once('php-guts/components.php');

// create instance of CreateDb class
$database = new CreateDb();

?>

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

<?php include 'website-parts/desktop.php'; ?>



   <!--------------------->
   <!------- SHOP -------->
   <!--------------------->

   <div class="content-container no-scrollbar-container">         

         <?php 
            // Display all products

            //prepare data for products and explorer
            $result = $database->getProduct();
            $explorer_result = $database->getExplorer();
            $explorer_products = '';

            //prepare explorer
            if ($explorer_result->num_rows > 0) {
               while($row = mysqli_fetch_assoc($explorer_result)) {
                  $explorer_products = $explorer_products.explorer_component($row['product_id'], $row['product_name'], $row['product_image']);
               }
               $explorer = '
                  <div class="window-container big product-ratio">
                     <div class="window-container-topbar">
                        <div class="window-container-topbar-left">
                           <img class="window-container-icon" src="assets/img/icons/explorer-icon.svg" alt="Ikonka produktu">
                           Explorer
                        </div>            
                        <button class="window-container-close-icon">
                           <img src="assets/img/icons/close-small.svg" alt="Ikonka zamknij">
                        </button>
                     </div>
                     <div class="white-window-container explorer-white">
                        '.$explorer_products.'
                     </div>
                     <div class="explorer-navigation">
                        <button type="button" class="btn-primary explorer-btn" id="back-btn"><img src="assets/img/elem-parts/product-img-slider-arrow-left.svg" alt="Poprzedni produkt"><span>Back</span></button>
                        <button type="button" class="btn-primary explorer-btn" id="next-btn"><span>Next</span><img src="assets/img/elem-parts/product-img-slider-arrow-right.svg" alt="Następny produkt"></button>
                     </div>
                  </div>
               ';
            }
            

            $counter = 0;

            if ($result->num_rows > 0) {
               while($row = mysqli_fetch_assoc($result)) {
                  //display explorer
                  $counter++;
                  if($counter%3 == 0) {
                     echo $explorer;
                  }

                  //display product
                  $product_images = $row['product_images'];
                  $product_imgages_array = explode(",",$product_images);

                  shop_component($row['product_name'], $row['product_price'], $row['id'], $row['product_type'], $product_imgages_array[0], $row['product_quantity']);
               }
            } else {
               echo "Nie znaleziono produktów";
            }
            
         ?>

   </div>

   
   
   <!------------------------------->
   <!------- FOOTER TOOLBAR -------->
   <!------------------------------->

   <?php include 'website-parts/footer.php'; ?>



<script src="assets/js/main.js"></script>

</body>
</html>