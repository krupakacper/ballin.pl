<?php

require_once('CreateDb.php');

$database = new CreateDb();
$order = $_POST['order'];
$result = $database->setOrder($order);

echo 'Zamówienie złożone!';
?>