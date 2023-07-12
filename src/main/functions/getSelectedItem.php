<?php
require '../config/conn.php';
$SelectedItemQuery = "SELECT * FROM selected_item_id";
$getSelectedItem = mysqli_query($conn, $SelectedItemQuery);
$selectedItem = mysqli_fetch_assoc($getSelectedItem);
$myitemID = $selectedItem['selectedItemID'];
$ItemInventoryQuery = "SELECT * FROM item_inventory WHERE id=$myitemID";
$getItemInventory = mysqli_query($conn, $ItemInventoryQuery);
$myitem = mysqli_fetch_assoc($getItemInventory);
echo $myitem['id'] . "," . $myitem['name'] . "," . $myitem['price'] . "," . $myitem['stock'];
