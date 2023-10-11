<?php

require_once('../php-guts/CreateDb.php');
require_once('assets-admin/php/admin-components.php');

// create instance of CreateDb class
$database = new CreateDb();

// $x = [
//    'name' => 'create',
//    'password' => 'pass',
//    'staff' => [
//       'panel' => 'admin',
//       'jeff' => 'guy',
//    ]
// ];

// $xx = serialize($x);
// $xxx = implode($x);

// print_r($xx);
// echo '<br>';
// echo $xx;
// echo '<br>';
// echo $xxx;

?>

<!DOCTYPE html>
<html lang="pl">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Orders | Ballin.pl</title>

   <!-- LINK CSS -->
   <link rel="stylesheet" href="assets-admin/css/main.css">

   <style>
      .panel-content-wrapper {
         border-top-left-radius: 0;
      }
   </style>

</head>
<body>
   
   <div class="panel-wrapper">

      <!-- Left Sidebar Navigation -->
      <div class="left-sidebar">
         <nav class="admin-menu">
            <ul>
               <li class="current-page"><a><strong>Orders</strong></a></li>
               <li><a href="products.php"><strong>Products</strong></a></li>
            </ul>
         </nav>
      </div>

      <!-- Panel -->
      <main class="panel-content-wrapper">
         <div class="filters-wrapper">
            <form action="" id="filters-form">
               <select name="" id="">
                  <option value="">Sortuj</option>
               </select>
               <select name="" id="">
                  <option value="">Filtruj</option>
               </select>
               <input type="text" name="" id="" placeholder="Szukaj">
            </form>
         </div>
         <div class="panel-content">

            <?php

               $result = $database->getOrders();

               while($row = mysqli_fetch_assoc($result)) {

                  $products = unserialize($row['products']);

                  //display orders
                  order_component($row['id'], $row['order_value'], $row['order_date'], $row['order_status'], $row['client_name'], $row['last_name'], $row['street'], $row['postal_code'], $row['city'], $row['phone'], $row['email'], $products, $row['shipping_method'], $row['payment_method'], $row['order_notes']);

               }

            ?>

         </div>
      </main>
      
   </div>


   <!-- LINK JS SCRIPTS -->
   <script src="../assets/js/jquery.js"></script>
   <script src="assets-admin/js/main.js"></script>


</body>
</html>