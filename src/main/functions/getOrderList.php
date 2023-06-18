<?php
    // This will get all the items that we Ordered 
    $orderListQuery = mysqli_query($conn, "SELECT * FROM order_list");

    $orderItemId = array();
    $orderItemQuantity = array();
    $orderItemTotal = array();
    $orderItemName = array();
    if (mysqli_num_rows($orderListQuery) > 0) {
        while($orderListRow = mysqli_fetch_assoc($orderListQuery)){
          $orderItemId[] = $orderListRow['item_id'];
          $orderItemName[] = $orderListRow['item_name'];
          $orderItemQuantity[] = $orderListRow['item_quantity'];
          $orderItemTotal[] = $orderListRow['total'];
        }
    }
?>