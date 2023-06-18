<?php
    require './conn.php';

    if (isset($_POST['id']) && isset($_POST['quantity'])) {
        $itemId = $_POST['id'];
        $itemQuantity = $_POST['quantity'];
        $itemQuery = mysqli_query($conn, "SELECT * FROM item_inventory WHERE id=$itemId");
        $item = mysqli_fetch_assoc($itemQuery);
        $total = $item['price'] * $itemQuantity;
        $setOrderQuery = mysqli_query($conn, "INSERT INTO order_receipt(item_id, item_quantity, total) VALUES('$itemId', '$itemQuantity', '$total')");
    }else {
        echo ('Variable Item or Quantity Not Found');
    }


