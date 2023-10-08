<?php

require_once('../../php-guts/CreateDb.php');
$database = new CreateDb();

if(isset($_POST['new_status'])) {
   $order_id = $_POST['order_id'];
   $new_order_status = $_POST['new_status'];
   $result = $database->setOrderStatus($order_id, $new_order_status);
   echo $result;
}

?>