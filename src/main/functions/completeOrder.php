<?php
    require '../config/conn.php';
    mysqli_query($conn, "DELETE FROM order_list");
    mysqli_query($conn, "DELETE FROM selected_item_id");
?>