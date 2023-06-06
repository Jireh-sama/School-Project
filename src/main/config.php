<?php
    session_start();
    $conn = mysqli_connect('localhost', 'root', '', 'kuyaj');
    if(!$conn){
        echo"<script>alert('Not connected to the Database')</script>";
    }
?>