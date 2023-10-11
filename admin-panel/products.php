<?php

require_once('../php-guts/CreateDb.php');
require_once('assets-admin/php/admin-components.php');

// create instance of CreateDb class
$database = new CreateDb();

// echo '<span style="color:white;">';

// echo '</span>';
?>

<!DOCTYPE html>
<html lang="pl">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Products | Ballin.pl</title>

   <!-- LINK CSS -->
   <link rel="stylesheet" href="assets-admin/css/main.css">

   <!-- <script>
      if ( window.history.replaceState ) {
         window.history.replaceState( null, null, window.location.href );
      }
   </script> -->

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

            <form class="product element new-product-form" method="post" enctype="multipart/form-data" action="assets-admin/php/add-new-product.php">

               <div class="product-img new-product-img">
                  <strong class="order-header">Dodaj zdjęcia:</strong>
                  <fieldset name="product_images" id="new-product-images">
                     <div class="new-img-input-row"><label>1. </label><input type="file" name="new-img[]" class="new-product-img-input" id="new-img-1" accept="image/png, image/jpeg, image/webp" required></div>
                  </fieldset>
                  <button id="add-product-img-btn" type="button">
                     <img src="assets-admin/img/icons/plus-icon.svg">
                  </button>
               </div>

               <div class="product-data-col1">
                  <div class="data-row">
                     <strong>Nazwa produktu: </strong><span><input id="product-name" name="product_name" type="text" required></input></span>
                  </div>
                  <div class="data-row">
                     <strong>Cena: </strong><span><input id="product-price" name="product_price" type="number" min="0" required></input> zł</span>
                  </div>
               </div>

               <div class="product-data-col2">
                  <div class="data-row type-row">
                     <label for="type"><strong>Typ: </strong></label>
                     <select name="product_type" id="type" required>
                        <option value="" disabled selected>Wybierz typ</option>
                        <option value="blouse">Blouse</option>
                        <option value="t-shirt">T-Shirt</option>
                        <option value="cap">Cap</option>
                     </select>
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
                           <div class="size-cell"><input id="product-size-xs" name="xs" type="number" min="0" required></input></div><hr>
                           <div class="size-cell"><input id="product-size-" name="s" type="number" min="0" required></input></div><hr>
                           <div class="size-cell"><input id="product-size-" name="m" type="number" min="0" required></input></div><hr>
                           <div class="size-cell"><input id="product-size-" name="l" type="number" min="0" required></input></div><hr>
                           <div class="size-cell"><input id="product-size-" name="xl" type="number" min="0" required></input></div>
                        </div>
                     </div>
                     
                  </div>
               </div>

               <div class="product-action-btns new-product-action-btns">
                  <button type="submit" class="action-btn new-product-save" name="new-product-submit">
                     <strong>Save</strong>
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
   <script src="../assets/js/jquery.js"></script>
   <script src="assets-admin/js/main.js"></script>

   <!-- ONSITE JAVASCRIPT -->
   <script>
      // New product functions:
      const productImgInputs = $(".new-product-img-input");
      const addNewProductImgBtn = $("#add-product-img-btn");
      const newImgDeleteBtn = $(".delete-new-img");

      let newImgCount = productImgInputs.length;

      addNewProductImgBtn.click(function() {
         newImgCount += 1;
         newProductImgInput = '<div class="new-img-input-row"><label><span class="new-img-count">'+newImgCount+'</span>. </label><input type="file" name="new-img[]" class="new-product-img-input" id="new-img-'+newImgCount+'" accept="image/png, image/jpeg, image/webp" required><button type="button" class="delete-new-img" onclick="deleteImgInput(this)"><img src="assets-admin/img/icons/plus-icon.svg"></button></div>';
         $("#new-product-images").append(newProductImgInput);
      });

      console.log($(productImgInputs[0]).find('label'));

      function deleteImgInput(elem) {
         $(elem).parent('.new-img-input-row').remove();
         newImgCount -= 1;

         let allCounts = $('.new-img-count');
         console.log(allCounts);
         for (var i = 0; i < allCounts.length; i++) {
            let newCount = i+2;
            currentCountElem = allCounts[i];
            $(currentCountElem).html(newCount);
         }
      }


      // Delete Product
      function deleteProduct(id) {
         $.ajax({
            url: 'http://localhost/ballin.pl/admin-panel/assets-admin/php/delete-product.php',
            data: {
               product_id: id
            },
            type: 'POST',
            success: function(result) {
               console.log(result);
               location.reload();
            }
         });
      }
      
   </script>


</body>
</html>