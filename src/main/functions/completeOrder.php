<?php
require '../config/conn.php';


if (isset($_POST['itemQuantity']) && isset($_POST['itemId'])) {
  $itemQuantity = explode(",", $_POST['itemQuantity']);
  $itemId = explode(",", $_POST['itemId']);

  print_r($itemQuantity);
  print_r($itemId);

  $quantitySelector = 0;
  foreach($itemId as $id){
    $query = "UPDATE item_inventory SET stock=stock - $itemQuantity[$quantitySelector] WHERE id='$id'";
    if(!mysqli_query($conn, $query)){
      echo("Error description: " . $mysqli -> error);
    }
    $quantitySelector++;
  }
  mysqli_query($conn, "DELETE FROM order_list");
  mysqli_query($conn, "DELETE FROM selected_item_id");
}else {
  echo('itemQuantity or itemId values not found');
}
