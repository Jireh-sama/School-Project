<?php 
    require '../config/conn.php';

    if(isset($_POST['id'])){

        $selectedItemID = $_POST['id'];
        $itemIdExist = mysqli_query($conn, "SELECT * FROM selected_item_id");
        if(mysqli_num_rows($itemIdExist) > 0){
            mysqli_query($conn, "UPDATE selected_item_id set selectedItemID=$selectedItemID");
        }else {
            mysqli_query($conn, "INSERT INTO selected_item_id(selectedItemID) VALUES('$selectedItemID')");
        }
    }else {
        echo "POST ID NOT FOUND";
    }
    
?>
