<?php

if (isset($_SESSION['id'])) {
  $userId = $_SESSION['id'];
  // Get all items we Ordered 
  $orderListQuery = mysqli_query($conn, "SELECT * FROM order_list WHERE user_id=$userId");

  $orderItemId = array();
  $orderItemQuantity = array();
  $orderItemTotal = array();
  $orderItemName = array();
  if (mysqli_num_rows($orderListQuery) > 0) {
    while ($orderListRow = mysqli_fetch_assoc($orderListQuery)) {
      $orderItemId[] = $orderListRow['item_id'];
      $orderItemName[] = $orderListRow['item_name'];
      $orderItemQuantity[] = $orderListRow['item_quantity'];
      $orderItemTotal[] = $orderListRow['total'];
    }
  }
}


