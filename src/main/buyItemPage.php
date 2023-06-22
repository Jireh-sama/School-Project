<?php
  require './config/conn.php';

  $getSelectedItem = mysqli_query($conn, 'SELECT * FROM selected_item_id');
  $selectedItem = mysqli_fetch_assoc($getSelectedItem);
  $myitemID = $selectedItem['selectedItemID'];
  $myquery = mysqli_query($conn, "SELECT * FROM item_inventory WHERE id=$myitemID");
  $myitem = mysqli_fetch_assoc($myquery);

  echo $myitem['id'].",".$myitem['name'].",".$myitem['price'];