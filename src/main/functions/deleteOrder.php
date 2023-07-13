<?php
  require '../config/conn.php';
if (isset($_POST['itemName'])) {
  $itemName = $_POST['itemName'];
  $deleteOrderQuery = "DELETE FROM order_list WHERE item_name='$itemName'";
  $deleteOrder = mysqli_query($conn, $deleteOrderQuery);
  echo ($itemName . "Succesfully Deleted");
} else {
  echo "item_name not found on Delete Order";
}
