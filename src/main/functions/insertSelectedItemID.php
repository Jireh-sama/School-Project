<?php
require '../config/conn.php';
if (isset($_POST['id'])) {
  $selectedItemID = $_POST['id'];
  $itemIdExistQuery = "SELECT * FROM selected_item_id";
  $itemIdExist = mysqli_query($conn, $itemIdExistQuery);
  if (mysqli_num_rows($itemIdExist) > 0) {
    $updateIdQuery = "UPDATE selected_item_id set selectedItemID=$selectedItemID";
    mysqli_query($conn, $updateIdQuery);
  } else {
    $insertIdQuery = "INSERT INTO selected_item_id(selectedItemID) VALUES('$selectedItemID')";
    mysqli_query($conn, $insertIdQuery);
  }
} else {
  echo "POST ID NOT FOUND";
}
