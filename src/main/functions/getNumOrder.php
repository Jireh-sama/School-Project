<?php
  require '../config/conn.php';
  $userId = $_SESSION['id'];
  $orderListQuery = "SELECT * FROM order_list WHERE user_id = '$userId'";
  $getOrderList = mysqli_query($conn, $orderListQuery);
  if(mysqli_num_rows($getOrderList) > 0){
    echo mysqli_num_rows($getOrderList);
  }else { 
    echo 'No Order Found on order list';
  }
?>