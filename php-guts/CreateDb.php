<?php

class CreateDb {

   public $servername;
   public $username;
   public $password;
   public $dbname;
   public $connection;


   //class constructor
   public function __construct($dbname = 'ballin', $servername = 'localhost', $username = 'root', $password = '') {

      $this->dbname = $dbname;
      $this->servername = $servername;
      $this->username = $username;
      $this->password = $password;

      //create connection
      $this->connection = mysqli_connect($servername, $username, $password);

      //check connection
      if(!$this->connection) {
         die("Connection failed: ".mysqli_connect_error());
      }

      //create query
      $sql = "CREATE DATABASE IF NOT EXISTS $dbname";
      //execute query
      if(mysqli_query($this->connection, $sql)) {

         $this->connection = mysqli_connect($servername, $username, $password, $dbname);

         //create new table for Products
         $sql = 'CREATE TABLE IF NOT EXISTS products (
            id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            product_name VARCHAR(255) NOT NULL,
            product_price FLOAT,
            product_type VARCHAR(100),
            product_images VARCHAR(500),
            product_quantity INT(11),
            product_tw_img VARCHAR(255),
            product_tw_prof VARCHAR(255),
            product_sizes VARCHAR(255)
         );';

         if(!mysqli_query($this->connection, $sql)) {
            echo "Error creating table: ".mysqli_error($this->connection);
         }

         //create new table for Orders
         $sql = 'CREATE TABLE IF NOT EXISTS orders (
            id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            client_data VARCHAR(255),
            shipping_method VARCHAR(255),
            order_notes VARCHAR(1000),
            payment_method VARCHAR(255),
            order_status VARCHAR(255),
            order_value FLOAT,
            products VARCHAR(1000),
            order_date DATETIME
         );';

         if(!mysqli_query($this->connection, $sql)) {
            echo "Error creating table: ".mysqli_error($this->connection);
         }

         //create new table for Explorer
         $sql = 'CREATE TABLE IF NOT EXISTS explorer (
            id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            product_id INT(11),
            product_image VARCHAR(255)
         );';

         if(!mysqli_query($this->connection, $sql)) {
            echo "Error creating table: ".mysqli_error($this->connection);
         }

      } else {
         return false;
      }

   }


   //get product from database
   public function getProduct($id = null) {
      if($id == null) $sql = "SELECT * FROM products";
      else $sql = "SELECT * FROM products WHERE id = $id";
            
      $result = mysqli_query($this->connection, $sql);
      if(mysqli_num_rows($result) > 0) {
         return $result;
      }
      else echo "Error getting data: ".mysqli_error($this->connection);
   }


   //get product sizes from database
   public function getSizes($id = null) {
      $sql = "SELECT product_sizes FROM products WHERE id='$id'";
      $result = mysqli_query($this->connection, $sql);
      if(mysqli_query($this->connection, $sql)) {
         $row = mysqli_fetch_assoc($result);
         $sizes = $row['product_sizes'];
         return unserialize(base64_decode($sizes));
      }
      else echo "Error getting data: ".mysqli_error($this->connection);
   }


   //update product sizes in database
   public function updateSizes($id = null, $xs = null, $s = null, $m = null, $l = null, $xl = null) {

      $sizes = $this->getSizes($id);
      if($xs!==null) $sizes['xs'] = $xs;
      if($s!==null) $sizes['s'] = $s;
      if($m!==null) $sizes['m'] = $m;
      if($l!==null) $sizes['l'] = $l;
      if($xl!==null) $sizes['xl'] = $xl;
      
      $sizes_sql = base64_encode(serialize($sizes));
      $sql = "UPDATE products SET product_sizes='$sizes_sql' WHERE id='$id'";
      // $result = mysqli_query($this->connection, $sql);
      if(!mysqli_query($this->connection, $sql)) {
         echo "Error updating data: ".mysqli_error($this->connection);
      }
   }


   //get explorer data
   public function getExplorer() {
      $sql = "SELECT * FROM explorer";
            
      $result = mysqli_query($this->connection, $sql);
      if(mysqli_num_rows($result) > 0) {
         return $result;
      }
      else echo "Error getting data: ".mysqli_error($this->connection);
   }


   //set order
   public function setOrder($order) {      
      date_default_timezone_set('Europe/Warsaw');
      $date = date("d.m.Y H:i");
      $timestamp = strtotime($date);

      print_r($order);

      $client_name = $order['client_data']['name'];
      $last_name = $order['client_data']['last_name'];
      $street = $order['client_data']['address']['street'];
      $postal_code = $order['client_data']['address']['postal_code'];
      $city = $order['client_data']['address']['city'];
      $phone = $order['client_data']['contact_details']['phone'];
      $email = $order['client_data']['contact_details']['email'];
      $shipping_method = $order['shipping_method'];
      $order_notes = $order['order_notes'];
      $payment_method = $order['payment_method'];
      $order_status = $order['order_status'];
      $order_value = $order['order_value'];
      $products = serialize($order['products']);
      $order_date = date('Y-m-d H:i:s', $timestamp);

      $sql = "INSERT INTO `orders`(`client_name`, `last_name`, `street`, `postal_code`, `city`, `phone`, `email`, `shipping_method`, `order_notes`, `payment_method`, `order_status`, `order_value`, `products`, `order_date`) VALUES ('$client_name','$last_name','$street','$postal_code','$city','$phone','$email','$shipping_method','$order_notes','$payment_method','$order_status','$order_value','$products','$order_date')";
      
      if(!mysqli_query($this->connection, $sql)) {
         echo "Error setting data: ".mysqli_error($this->connection);
      }
   }


   //get orders from database
   public function getOrders($query = null) {
      if($query != null) $sql = $query;
      else $sql = "SELECT * FROM orders";
            
      $result = mysqli_query($this->connection, $sql);
      if(mysqli_num_rows($result) > 0) {
         return $result;
      }
      else echo "Error getting data: ".mysqli_error($this->connection);
   }


   //set new order status
   public function setOrderStatus($id = null, $status = 'brak') {
      $sql = "UPDATE orders SET order_status ='$status' WHERE id='$id'";
      if(mysqli_query($this->connection, $sql)) {
         return 'Hejunia! Status zmieniony.';
      }
      else echo "Error getting data: ".mysqli_error($this->connection);
   }


}

?>