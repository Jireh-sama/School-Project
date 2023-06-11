<?php
  $query = "SELECT * FROM item_inventory";

  $result = mysqli_query($conn, $query);
  
  $itemArray = array();
  
  if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)){
      $itemArray[] = $row['name'];
    }
  }
?>