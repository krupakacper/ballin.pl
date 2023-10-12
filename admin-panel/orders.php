<?php

require_once('../php-guts/CreateDb.php');
require_once('assets-admin/php/admin-components.php');

// create instance of CreateDb class
$database = new CreateDb();


$products_sql = "SELECT * FROM orders ORDER BY order_date DESC";

// Filters
if(isset($_GET['search'])) {
   $search = $_GET['search'];
   if(isset($_GET['status'])) {
      $status = $_GET['status'];
   } else $status = '';
   if(isset($_GET['sort'])) {
      $sort = $_GET['sort'];
   } else $sort = '';

   // All filters
   if($search != '' && $status != '' && $sort != '') {
      $products_sql = "SELECT * FROM orders WHERE order_status = '$status' AND client_name LIKE '%$search%' OR last_name LIKE '%$search%' OR street  LIKE '%$search%'OR postal_code LIKE '%$search%' OR city LIKE '%$search%' OR phone LIKE '%$search%' OR email LIKE '%$search%' OR shipping_method LIKE '%$search%' OR order_notes LIKE '%$search%' OR payment_method LIKE '%$search%' OR products LIKE '%$search%' ORDER BY $sort";
   } // Text search and status 
   else if ($search != '' && $status != '') {
      $products_sql = "SELECT * FROM orders WHERE order_status = '$status' AND client_name LIKE '%$search%' OR last_name LIKE '%$search%' OR street  LIKE '%$search%'OR postal_code LIKE '%$search%' OR city LIKE '%$search%' OR phone LIKE '%$search%' OR email LIKE '%$search%' OR shipping_method LIKE '%$search%' OR order_notes LIKE '%$search%' OR payment_method LIKE '%$search%' OR products LIKE '%$search%' ORDER BY order_date DESC";
   } // Text search and sorting  
   else if ($search != '' && $sort != '') {
      $products_sql = "SELECT * FROM orders WHERE client_name LIKE '%$search%' OR last_name LIKE '%$search%' OR street  LIKE '%$search%'OR postal_code LIKE '%$search%' OR city LIKE '%$search%' OR phone LIKE '%$search%' OR email LIKE '%$search%' OR shipping_method LIKE '%$search%' OR order_notes LIKE '%$search%' OR payment_method LIKE '%$search%' OR products LIKE '%$search%' ORDER BY $sort";
   } // Status and sorting  
   else if ($status != '' && $sort != '') {
      $products_sql = "SELECT * FROM orders WHERE order_status = '$status' ORDER BY $sort";
   } // Status
   else if ($status != '') {
      $products_sql = "SELECT * FROM orders WHERE order_status = '$status' ORDER BY order_date DESC";
   } // Sorting
   else if ($sort != '') {
      $products_sql = "SELECT * FROM orders ORDER BY $sort";
   } // Text search
   else if ($search != '') {
      $products_sql = "SELECT * FROM orders WHERE client_name LIKE '%$search%' OR last_name LIKE '%$search%' OR street  LIKE '%$search%'OR postal_code LIKE '%$search%' OR city LIKE '%$search%' OR phone LIKE '%$search%' OR email LIKE '%$search%' OR shipping_method LIKE '%$search%' OR order_notes LIKE '%$search%' OR payment_method LIKE '%$search%' OR products LIKE '%$search%' ORDER BY order_date DESC";
   }

}

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
               <select name="sort" id="">
                  <option value="" disabled selected>Sortuj</option>
                  <option value="order_date DESC">Data (rosnąco)</option>
                  <option value="order_date ASC">Data (malejąco)</option>
               </select>
               <select name="status" id="">
                  <option value="" disabled selected>Filtruj</option>
                  <option value="">Wszystkie</option>
                  <option value="nieopłacone">Nieopłacone</option>
                  <option value="opłacone">Opłacone</option>
                  <option value="wysłane">Wysłane</option>
                  <option value="dostarczone">Dostarczone</option>
               </select>
               <input type="text" name="search" id="" placeholder="Szukaj">
               <button type="submit" id="submit-filters">Zastosuj</button>
            </form>
         </div>
         <div class="panel-content">

            <?php

               $result = $database->getOrders($products_sql);

               


               if ($result->num_rows > 0) {
                  while($row = mysqli_fetch_assoc($result)) {
                     $products = unserialize($row['products']);   
                     //display orders
                     order_component($row['id'], $row['order_value'], $row['order_date'], $row['order_status'], $row['client_name'], $row['last_name'], $row['street'], $row['postal_code'], $row['city'], $row['phone'], $row['email'], $products, $row['shipping_method'], $row['payment_method'], $row['order_notes']);   
                  }
               } else {
                  echo "Nie znaleziono zamówień";
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