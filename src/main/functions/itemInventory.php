<?php
$itemInventoryQuery = "SELECT * FROM item_inventory";
$getItemInventory = mysqli_query($conn, $itemInventoryQuery);
$itemNames = array();
$itemPrices = array();
$itemStocks = array();
$itemID = array();
if (mysqli_num_rows($getItemInventory) > 0) {
  while ($row = mysqli_fetch_assoc($getItemInventory)) {
    $itemNames[] = $row['name'];
    $itemPrices[] = $row['price'];
    $itemStocks[] = $row['stock'];
    $itemID[] = $row['id'];
  }
}
