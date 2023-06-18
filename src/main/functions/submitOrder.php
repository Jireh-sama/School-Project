<?php
    require '../config/conn.php';

    if (isset($_POST['id']) && isset($_POST['quantity'])) {


        // Transfer the ID and Quantity Value from AJAX to PHP
        $itemId = $_POST['id']; 
        $itemQuantity = $_POST['quantity']; 

        // Select the row in the DB that is equal to the ID 
        $itemQuery = mysqli_query($conn, "SELECT * FROM item_inventory WHERE id=$itemId"); 
        $item = mysqli_fetch_assoc($itemQuery);

        // Getting the names of the Selected Items as well as Calculating for the Total
        $itemName = $item['name'];
        $total = $item['price'] * $itemQuantity;

        //Insert The Id, name, quantity and total to the order_list table 
        $setOrderQuery = mysqli_query($conn, "INSERT INTO order_list(item_id, item_name, item_quantity, total) VALUES('$itemId', '$itemName', '$itemQuantity', '$total')");
    }else {
        echo ('Variable ID or Quantity Not Found');
    }


