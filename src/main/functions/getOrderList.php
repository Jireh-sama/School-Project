<?php

if (isset($_SESSION['id'])) {
  $userId = $_SESSION['id'];
  // Get all items we Ordered 
  $orderListQuery = "SELECT * FROM order_list WHERE user_id=$userId";
  $getOrderList = mysqli_query($conn, $orderListQuery);

  $orderItemId = array();
  $orderItemQuantity = array();
  $orderItemTotal = array();
  $orderItemName = array();
  if (mysqli_num_rows($getOrderList) > 0) {
    while ($orderListRow = mysqli_fetch_assoc($getOrderList)) {
      $orderItemId[] = $orderListRow['item_id'];
      $orderItemName[] = $orderListRow['item_name'];
      $orderItemQuantity[] = $orderListRow['item_quantity'];
      $orderItemTotal[] = $orderListRow['total'];
    }
  }else {
    echo 'No Order Found on order list';
  }
}


