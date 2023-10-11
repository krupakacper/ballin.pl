<?php

require_once('../../../php-guts/CreateDb.php');
$database = new CreateDb();

// Add new product to database
if(isset($_POST['new-product-submit'])) {

   // Check number of products images
   $numOfNewImgs = count($_FILES['new-img']['name']);

   // Array of allowed extensions
   $allowed_ext = array('jpg', 'jpeg', 'png', 'webp');
   $product_images_directories = '';

   //check if extensions are valid
   $is_valid = array();
   //filenames   
   for($i = 0; $i < $numOfNewImgs; $i++) {
      $file_name = $_FILES['new-img']['name'][$i];
      if($file_name == '' && $file_name == null) {
         array_push($is_valid, 'false');
      } else {         
         //get image extension
         $file_name_exploded = explode('.', $file_name);
         $file_actual_ext = strtolower(end($file_name_exploded));

         if(in_array($file_actual_ext, $allowed_ext)) {
            array_push($is_valid, 'true');
         } else {
            array_push($is_valid, 'false');
         }
      }
   }
   //errors
   for($i = 0; $i < $numOfNewImgs; $i++) {
      $file_error = $_FILES['new-img']['error'][$i];
      if($file_error === 1) {
         array_push($is_valid, 'false');
         echo '<script>alert("ERROR!")</script>';
      } else {
         array_push($is_valid, 'true');
      }
   }

   
   // Add those images to the new created folder
   if(array_search('false', $is_valid)) {
      echo '<script>alert("Błąd podczas wgrywania plików!")</script>';
   } else {

      $file_error = $_FILES['new-img-tw-prof']['error'];
      if($file_error === 1) {
         array_push($is_valid, 'false');
         echo '<script>alert("ERROR!")</script>';
      } else {
         array_push($is_valid, 'true');
      }


      $product_name = $_POST['product_name'];
      $product_price = $_POST['product_price'];
      $product_type = $_POST['product_type'];
      $product_sizes = array(
         'xs' => $_POST['xs'],
         's' => $_POST['s'],
         'm' => $_POST['m'],
         'l' => $_POST['l'],
         'xl' => $_POST['xl']
      );


      $id = $database->setProduct($product_name, $product_price, $product_type, $product_sizes);
    

      // Create folder for images
      $newProductFolderName = '../../../assets/img/products/product-'.$id;
      if (!is_dir($newProductFolderName)) {
         mkdir($newProductFolderName, 0777, true);
      }


      // Add images to folder
      for($i = 0; $i < $numOfNewImgs; $i++) {         
         //get current image data
         $file_name = $_FILES['new-img']['name'][$i];
         $file_tmp_name = $_FILES['new-img']['tmp_name'][$i];

         $file_name_exploded = explode('.', $file_name);
         $file_actual_ext = strtolower(end($file_name_exploded));

         //add images to string
         $file_name_new = $file_name_exploded[0].'.'.$file_actual_ext;

         $imageDir = 'assets/img/products/product-'.$id;
         $imageLocation = $imageDir.'/'.$file_name_new;
         $product_images_directories = $product_images_directories.$imageLocation.',';
         $product_images = rtrim($product_images_directories, ",");

         //add images to new folder
         $file_name_new = $file_name_exploded[0].'.'.$file_actual_ext;
         $file_destionation = $newProductFolderName.'/'.$file_name_new;
         move_uploaded_file($file_tmp_name, $file_destionation);  
      }

       

      // Add tw prof img to folder
      $file_name = $_FILES['new-img-tw-prof']['name'];
      $file_tmp_name = $_FILES['new-img-tw-prof']['tmp_name'];

      $file_name_exploded = explode('.', $file_name);
      $file_actual_ext = strtolower(end($file_name_exploded));

      //add images to new folder
      $file_name_new_tw_prof = $file_name_exploded[0].'.'.$file_actual_ext;
      $file_destionation_tw_prof = $newProductFolderName.'/'.$file_name_new_tw_prof;
      move_uploaded_file($file_tmp_name, $file_destionation_tw_prof);

       
      // Add tw img to folder
      $file_name = $_FILES['new-img-tw']['name'];
      $file_tmp_name = $_FILES['new-img-tw']['tmp_name'];

      $file_name_exploded = explode('.', $file_name);
      $file_actual_ext = strtolower(end($file_name_exploded));

      //add images to new folder
      $file_name_new_tw = $file_name_exploded[0].'.'.$file_actual_ext;
      $file_destionation = $newProductFolderName.'/'.$file_name_new_tw;
      move_uploaded_file($file_tmp_name, $file_destionation);

      $product_tw = $imageDir.'/'.$file_name_new_tw;
      $product_tw_prof = $imageDir.'/'.$file_name_new_tw_prof;


      $database->setProductImgs($id, $product_images, $product_tw, $product_tw_prof);
      
   }
   

   header('Location: ../../products.php');
}



?>