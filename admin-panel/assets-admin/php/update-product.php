<?php

require_once('../../../php-guts/CreateDb.php');
$database = new CreateDb();

if(isset($_POST['product_data'])) {
   $id = $_POST['product_data']['id'];
   $newName = $_POST['product_data']['name'];
   $newPrice = $_POST['product_data']['price'];
   $newXS = $_POST['product_data']['sizes']['xs'];
   $newS = $_POST['product_data']['sizes']['s'];
   $newM = $_POST['product_data']['sizes']['m'];
   $newL = $_POST['product_data']['sizes']['l'];
   $newXL = $_POST['product_data']['sizes']['xl'];

   $database->updateProduct($id, $newName, $newPrice, $newXS, $newS, $newM, $newL, $newXL);
}


?>