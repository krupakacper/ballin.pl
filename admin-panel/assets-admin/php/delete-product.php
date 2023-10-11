<?php

require_once('../../../php-guts/CreateDb.php');
$database = new CreateDb();

if(isset($_POST['product_id'])) {

   $id = $_POST['product_id'];

   $database->deleteProduct($id);
   echo "Hejuńka, usunąłeś mnie: ".$_POST['product_id'];

}

?>