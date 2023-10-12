<?php

require_once('../../../php-guts/CreateDb.php');
$database = new CreateDb();

if(isset($_POST['product_id'])) {

   $id = $_POST['product_id'];
   $database->deleteProduct($id);
   $productFolderName = '../../../assets/img/products/product-'.$id;

   $i = new DirectoryIterator($productFolderName);

   foreach($i as $f) {
      if($f->isFile()) {
         unlink($f->getRealPath());
      } else if(!$f->isDot() && $f->isDir()) {
         rmdir($f->getRealPath());
      }
   }
   rmdir($productFolderName);

   echo "Hejuńka, usunąłeś mnie: ".$_POST['product_id'];

}

?>