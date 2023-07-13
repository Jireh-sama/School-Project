<?php
require '../config/conn.php';

if (isset($_POST['itemId']) && isset($_POST['itemQuantity'])) {
  
  $userId = $_SESSION['id'];
  // Transfer the ID and Quantity Value from AJAX to PHP
  $itemId = $_POST['itemId'];
  $itemQuantity = $_POST['itemQuantity'];

  // Select the row in the DB that is equal to the ID 
  $itemQuery = "SELECT * FROM item_inventory WHERE id=$itemId";
  $getitem = mysqli_query($conn, $itemQuery);
  $item = mysqli_fetch_assoc($getitem);

  // Getting the names of the Selected Items as well as Calculating for the Total
  $itemName = $item['name'];
  $total = $item['price'] * $itemQuantity;

  $checkDuplicateQuery = "SELECT * FROM order_list WHERE item_name='$itemName' AND user_id='$userId'";
  $checkDuplicate = mysqli_query($conn, $checkDuplicateQuery);
  if (mysqli_num_rows($checkDuplicate) > 0) {
    // If Item is Already Previously Ordered we will just update it
    $updateOrderQuery = "UPDATE order_list SET item_quantity=item_quantity + $itemQuantity, total=total + $total WHERE item_name='$itemName'";
    $updateOrder = mysqli_query($conn, $updateOrderQuery);
  } else {
    //Insert The Id, name, quantity and total to the order_list table
    $orderQuery = "INSERT INTO order_list(user_id, item_id, item_name, item_quantity, total) 
        VALUES('$userId', '$itemId', '$itemName', '$itemQuantity', '$total')";
    $setOrderQuery = mysqli_query($conn, $orderQuery);
  }
} else {
  echo ('Variable ID or Quantity Not Found');
}
