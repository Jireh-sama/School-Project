<?php
  $query = "SELECT * FROM item_inventory";

  $result = mysqli_query($conn, $query);
  
  $itemNames = array();
  $itemPrices = array();
  $itemStocks = array();
  
  if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)){
      $itemNames[] = $row['name'];
      $itemPrices[] = $row['price'];
      $itemStocks[] = $row['stock'];
    }
  }



  
?>