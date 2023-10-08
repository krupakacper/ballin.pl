<?php

require_once('../php-guts/CreateDb.php');
require_once('assets-admin/admin-components.php');

// create instance of CreateDb class
$database = new CreateDb();

?>

<!DOCTYPE html>
<html lang="pl">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Products | Ballin.pl</title>

   <!-- LINK CSS -->
   <link rel="stylesheet" href="assets-admin/css/main.css">

</head>
<body>
   
   <div class="panel-wrapper">

      <!-- Left Sidebar Navigation -->
      <div class="left-sidebar">
         <nav class="admin-menu">
            <ul>
               <li><a href="orders.php"><strong>Orders</strong></a></li>
               <li class="current-page"><a><strong>Products</strong></a></li>
            </ul>
         </nav>
      </div>

      <!-- Panel -->
      <main class="panel-content-wrapper">
         <div class="filters-wrapper">
            <form action="" id="filters-form">
               <button id="new-product-btn" type="button">
                  <img src="assets-admin/img/icons/plus-icon.svg">
               </button>
               <select name="" id="">
                  <option value="">Filtruj</option>
               </select>
               <input type="text" name="" id="" placeholder="Szukaj">
            </form>

            <form class="product element">

               <div class="product-img">
                  <img src="../'.$product_img.'" alt="Zdjęcie produktu">
               </div>

               <div class="product-data-col1">
                  <div class="data-row">
                     <strong>Nazwa produktu: </strong><span><input id="product-name" type="text"></input></span>
                  </div>
                  <div class="data-row">
                     <strong>Cena: </strong><span><input id="product-price" type="number"></input> zł</span>
                  </div>
               </div>

               <div class="product-data-col2">
                  <div class="data-row type-row">
                     <strong>Typ: </strong><span><i>type</i></span>
                  </div>
                  <div class="sizes-wrapper">
                     <strong class="order-header">Rozmiary:</strong>
                     <div class="sizes-table">
                        <div class="sizes-row sizes-row-top">
                           <div class="size-cell">XS</div><hr>
                           <div class="size-cell">S</div><hr>
                           <div class="size-cell">M</div><hr>
                           <div class="size-cell">L</div><hr>
                           <div class="size-cell">XL</div>
                        </div>
                        <div class="sizes-row sizes-row-bottom">
                           <div class="size-cell"><input id="product-size-xs" type="number"></input></div><hr>
                           <div class="size-cell"><input id="product-size-" type="number"></input></div><hr>
                           <div class="size-cell"><input id="product-size-" type="number"></input></div><hr>
                           <div class="size-cell"><input id="product-size-" type="number"></input></div><hr>
                           <div class="size-cell"><input id="product-size-" type="number"></input></div>
                        </div>
                     </div>
                     
                  </div>
               </div>

               <div class="product-action-btns">
                  <button class="action-btn product-delete-btn">
                     <img src="assets-admin/img/icons/delete-icon.svg" alt="Przycisk usuń">
                  </button>
                  <button class="action-btn product-edit-btn">
                     <img src="assets-admin/img/icons/edit-icon.svg" alt="Przycisk edytuj">
                  </button>
               </div>

            </form>
         </div>
         <div class="panel-content">

            <?php

               $result = $database->getProduct();

               while($row = mysqli_fetch_assoc($result)) {

                  $product_images = $row['product_images'];
                  $product_imgages_array = explode(",",$product_images);

                  $product_sizes = $database->getSizes($row['id']);

                  //display orders
                  product_component($product_imgages_array[0], $row['product_name'], $row['id'], $row['product_price'], $row['product_type'], $product_sizes);

               }

            ?>


         </div>
      </main>
      
   </div>


   <!-- LINK JS SCRIPTS -->
   <script src="assets-admin/js/main.js"></script>


</body>
</html>