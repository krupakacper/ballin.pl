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
   <title>Twitter | Ballin.pl</title>

   <!-- LINK CSS -->
   <link rel="stylesheet" href="assets/css/main.css">
   <link rel="stylesheet" href="assets/css/twitter.css">

</head>
<body>


<!------------------------>
<!------- DESKTOP -------->
<!------------------------>

<?php include 'website-parts/desktop.php'; ?>




   <!------------------------>
   <!------- TWITTER -------->
   <!------------------------>

   <div class="content-container content-container-twitter no-scrollbar-container">

      <?php 
         //display all twitter product posts
         $result = $database->getProduct();
         while($row = mysqli_fetch_assoc($result)) {
            twitter_component($row['product_tw_prof'], $row['product_tw_img'], $row['product_price'], $row['product_quantity']);
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