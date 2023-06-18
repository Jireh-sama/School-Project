<?php 
    require 'conn.php';

    if(isset($_POST['id'])){

        $selectedItemID = $_POST['id'];
        $itemIdExist = mysqli_query($conn, "SELECT * FROM sitemid");
        if(mysqli_num_rows($itemIdExist) > 0){
            mysqli_query($conn, "UPDATE sitemid set selectedItemID=$selectedItemID");
        }else {
            mysqli_query($conn, "INSERT INTO sitemid(selectedItemID) VALUES('$selectedItemID')");
        }
    }else {
        echo "POST ID NOT FOUND";
    }
    
?>
